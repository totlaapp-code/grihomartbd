<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Orderproduct;
use App\Models\Comment;
use App\Models\Product;
use DB;
use App\Models\Admin;
use App\Models\Usecoupon;
use App\Models\User;
use App\Models\Basicinfo;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Incompleteorder;
use App\Models\Zone;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use App\Services\SmsNetBdService;

class OrderController extends Controller
{
    public function incomplete(Request $request)
    {
        $products = Cart::content();
        $exinc = Incompleteorder::where('status', 'Incomplete')->where('customerPhone', $request->customerPhone)->first();
        if (isset($exinc)) {
            return response()->json('Exist');
        } else {
            $incorder = new Incompleteorder();
            $incorder->customerName = $request->customerName;
            $incorder->customerAddress = $request->customerAddress;
            $incorder->customerPhone = $request->customerPhone;
            $incorder->customerNote = $request->customerNote;
            $incorder->subTotal = $request->ordersubtotalprice;
            $incorder->deliveryCharge = $request->deliveryCharge;
            $incorder->orderDate = date('Y-m-d');
            $incorder->status = 'Incomplete';
            $incorder->cartproducts = $products;
            $incorder->save();
        }
        return response()->json($incorder);
    }

    public function pressorder(Request $request)
    {
        $block = User::where('ip', \Request::ip())->where('status', 'Block')->first();
        if ($block) {
            return redirect('ip-block');
        }
        $products = Cart::content();
        $userIp = \Request::ip();
        $deviceId = $request->input('device_id');
        $customerPhone = $request->customerPhone;
        $twentyFourHoursAgo = Carbon::now()->subHours(24);

        $excutomer = Customer::where('customerPhone', $customerPhone)->latest()->first();
        if (isset($excutomer)) {
            $exorder = Order::where('id', $excutomer->order_id)->first();
            if ($exorder) {
                $isPendingStatus = in_array($exorder->status, ['Pending', 'Packaging', 'Ready to Ship', 'Hold']);
                $isWithin24Hours = $exorder->created_at ? Carbon::parse($exorder->created_at)->gte($twentyFourHoursAgo) : false;
                if ($isPendingStatus || $isWithin24Hours) {
                    \Yoeunes\Toastr\Facades\Toastr::warning('দুঃখিত, ২৪ ঘণ্টায় ১টির বেশি অর্ডার অনুমোদিত নয়। আপনার একটি অর্ডার প্রক্রিয়াধীন রয়েছে।', 'Warning', ["positionClass" => "toast-top-center"]);
                    return redirect('/exist-order');
                }
            }
        }

        if (\Schema::hasColumn('orders', 'ip_address')) {
            $recentOrderExist = Order::where('created_at', '>=', $twentyFourHoursAgo)
                ->where(function ($query) use ($userIp, $deviceId) {
                    $query->where('ip_address', $userIp);
                    if (!empty($deviceId)) {
                        $query->orWhere('device_id', $deviceId);
                    }
                })
                ->first();

            if ($recentOrderExist) {
                \Yoeunes\Toastr\Facades\Toastr::warning('দুঃখিত, আপনার ডিভাইস বা আইপি থেকে ২৪ ঘণ্টায় ১টির বেশি অর্ডার অনুমোদিত নয়।', 'Warning', ["positionClass" => "toast-top-center"]);
                return redirect('/exist-order');
            }
        }

        if (!Session::has('cart')) {
            return redirect('/empty-cart');
        } elseif (Cart::count() == 0) {
            return redirect('/empty-cart');
        } else {
            $order = new Order();


            $exuser = User::where('email', $request->customerPhone)->first();
            if (isset($exuser)) {
                Auth::login($exuser);
                $order->user_id = $exuser->id;
            } else {
                $user = new User();
                $user->name = $request->customerName;
                $user->email = $request->customerPhone;
                $otp = random_int(100000, 999999);
                $user->otp = $otp;
                $otppass = $otp;
                $user->active_status = 0;
                $user->ip = $userIp;
                $user->password = Hash::make($request->customerPhone);
                $user->save();

                Auth::login($user);
                $order->user_id = $user->id;
            }


            $order->store_id = 1;
            $order->web_id = 'Website';
            $order->invoiceID = $this->uniqueID();
            if (\Schema::hasColumn('orders', 'ip_address')) {
                $order->ip_address = $userIp;
                $order->device_id = $deviceId;
            }
            $order->deliveryCharge = $request->deliveryCharge;
            $order->city_id = $request->city_id;
            $order->zone_id = $request->zone_id;
            $vat = Basicinfo::first();
            if ($vat->vat_status == 'On') {
                $vat = intval($request->subTotal * ($vat->vat / 100));
            } else {
                $vat = 0;
            }
            $total = $request->subTotal + $request->deliveryCharge + $vat;
            $order->vat = $vat;
            $order->orderDate = date('Y-m-d');
            if (isset($request->coupon_code)) {
                $use = Usecoupon::where('user_id', Auth::id())->where('code', $request->coupon_code)->first();
                if (isset($use)) {
                } else {
                    $couponuse = new Usecoupon();
                    $couponuse->user_id = Auth::id();
                    $couponuse->coupon_id = optional(Coupon::where('code', $request->coupon_code)->first())->id;
                    $couponuse->code = $request->coupon_code;
                    $couponuse->date = date('Y-m-d');
                    $couponuse->save();

                    $order->coupon_code = $request->coupon_code;
                    $coupon = Session::get('availablecoupon');
                    if ($coupon->type == 'Amount') {
                        $discount = $coupon->amount;
                    } else {
                        $discount = $total * ($coupon->amount / 100);
                    }
                    $order->discountCharge = $discount;
                    $order->subTotal = $total - $discount;
                }
            } else {
                $order->subTotal = $total;
            }

            if ($request->paymentType == 1) {
                $order->payment_type_id = $request->paymentType;
                $paymentuser = User::where('id', Auth::id())->first();
                if ($paymentuser->available_coin > $total) {
                    $paymentuser->available_coin = $paymentuser->available_coin - $total;
                    $paymentuser->used_coin = $paymentuser->used_coin + $total;
                    $order->paymentAmount = $total;
                    $paymentuser->update();
                    $order->subTotal = 0;
                } else {
                    $paymentuser->used_coin = $paymentuser->used_coin + $paymentuser->available_coin;
                    $order->paymentAmount = $paymentuser->available_coin;
                    $order->subTotal = $request->subTotal - $paymentuser->available_coin;
                    $paymentuser->available_coin = 0;
                    $paymentuser->update();
                }
            } elseif ($request->paymentType == 3) {
            } else {
                $order->payment_type_id = $request->paymentType;
            }

            $order->customerNote = $request->customerNote;

            $result = $order->save();
            if ($result) {
                $customer = new Customer();
                $customer->order_id = $order->id;
                $customer->customerName = $request->customerName;
                $customer->customerPhone = $request->customerPhone;
                $city = City::where('id', $request->city_id)->first();
                $zone = Zone::where('id', $request->zone_id)->first();
                if (isset($city) && isset($zone)) {
                    $customer->customerAddress = $request->customerAddress . ', ' . $zone->zoneName . ', ' . $city->cityName;
                } else {
                    $customer->customerAddress = $request->customerAddress;
                }
                $customer->save();
                foreach ($products as $product) {
                    $orderProducts = new Orderproduct();
                    $orderProducts->order_id = $order->id;
                    $orderProducts->product_id = $product->id;
                    $dbProduct = Product::find($product->id);
                    $orderProducts->productCode = $product->options['code'] ?? ($dbProduct ? $dbProduct->ProductSku : 'N/A');
                    if ($product->options['color'] == 'undefined') {
                    } else {
                        $orderProducts->color = $product->options['color'];
                    }

                    if ($product->options['size'] == 'undefined') {
                    } else {
                        $orderProducts->size = $product->options['size'];
                    }

                    if ($product->options['sigment'] == 'undefined') {
                    } else {
                        $orderProducts->sigment = $product->options['sigment'];
                    }

                    $orderProducts->productName = $product->name;
                    $orderProducts->quantity = $product->qty;
                    $orderProducts->productPrice = $product->price;
                    $orderProducts->save();
                }
                
                

                // $sendstatus = Http::get('http://bulksmsbd.net/api/smsapi?api_key=3z2e9owl4PGXLakGMAmv&type=text&number='.$customer->customerPhone.'&senderid=GRIHOMARTBD.COM&message=আপনার অর্ডারটি প্লেস হয়েছে, শীগ্রই আমাদের প্রতিনিধি কল করে অর্ডারটি কনফার্ম করবেন। ORDER ID : '.$order->invoiceID.' , Hotline: 01888173003 , Visit: www.grihomartbd.com');
                $exinc = Incompleteorder::where('status', 'Incomplete')->where('customerPhone', $request->customerPhone)->first();
                if (isset($exinc)) {
                    $exinc->delete();
                }
                $notification = new Comment();
                $notification->order_id = $order->id;
                $notification->comment =  $order->invoiceID ;
                $notification->admin_id = $order->admin_id;
                $notification->save();

                $basicinfo = \App\Models\Basicinfo::first();
                
                if ($basicinfo && $basicinfo->otp_system == 'OFF') {
                    // Purchase CAPI handled by stape.io sGTM

                    Cart::destroy();
                    Session::forget('couponcode');
                    Session::forget('availablecoupon');
                    Session::put('ordersubtotal', $request->subTotal);
                    Session::put('orderdeliverycharge', $request->deliveryCharge);
                    Session::put('order_id', $order->id);
                    Session::put('successfulor', 'successfulor');
                    return redirect('order-received');
                } else {
                    // --- OTP: Generate, save, send SMS ---
                    $otp = (string) random_int(100000, 999999);
                    $order->otp = $otp;
                    $order->otp_verified = false;
                    $order->otp_attempts = 0;
                    $order->otp_expires_at = Carbon::now()->addMinutes(15);
                    $order->save();

                    SmsNetBdService::sendOtp($request->customerPhone, $otp, $order->invoiceID);

                    Cart::destroy();
                    Session::forget('couponcode');
                    Session::forget('availablecoupon');
                    Session::put('ordersubtotal', $request->subTotal);
                    Session::put('orderdeliverycharge', $request->deliveryCharge);
                    Session::put('order_id', $order->id);
                    Session::put('successfulor', 'successfulor');
                    
                    return redirect('order-received');
                }
            } else {
                Customer::where('order_id', '=', $order->id)->delete();
                Orderproduct::where('order_id', '=', $order->id)->delete();
                Comment::where('order_id', '=', $order->id)->delete();
                Order::where('id', '=', $order->id)->delete();
                $response['status'] = 'failed';
                $response['message'] = 'Unsuccessful to press order';
            }
        }
    }

    public function uniqueID()
    {
        $lastOrder = Order::latest('id')->first();
        if ($lastOrder) {
            $orderID = $lastOrder->id + 1;
        } else {
            $orderID = 1;
        }

        return 'GA001' . $orderID;
    }

    // ─── OTP Verification ────────────────────────────────────────────────────

    public function showOtpPage($orderId)
    {
        $order = Order::findOrFail($orderId);
        $customer = Customer::where('order_id', $orderId)->first();
        return view('otp-verify', compact('order', 'customer'));
    }

    public function verifyOtp(Request $request)
    {
        $order = Order::findOrFail($request->order_id);

        // Already verified
        if ($order->otp_verified) {
            if ($request->ajax()) return response()->json(['status' => 'success', 'message' => 'অর্ডার আগেই নিশ্চিত হয়েছে!']);
            return redirect('order-received')->with('message', 'অর্ডার আগেই নিশ্চিত হয়েছে!');
        }

        // Max attempts check
        if ($order->otp_attempts >= 3) {
            if ($request->ajax()) return response()->json(['status' => 'error', 'message' => 'সর্বোচ্চ ৩টি চেষ্টা শেষ। অনুগ্রহ করে আমাদের সাথে যোগাযোগ করুন।']);
            return back()->withErrors(['otp' => 'সর্বোচ্চ ৩টি চেষ্টা শেষ। অনুগ্রহ করে আমাদের সাথে যোগাযোগ করুন।']);
        }

        // OTP expiry check
        if ($order->otp_expires_at && Carbon::now()->gt($order->otp_expires_at)) {
            if ($request->ajax()) return response()->json(['status' => 'error', 'message' => 'OTP মেয়াদ শেষ হয়ে গেছে। Resend করুন।']);
            return back()->withErrors(['otp' => 'OTP মেয়াদ শেষ হয়ে গেছে। Resend করুন।']);
        }

        // OTP match check
        if ($request->otp !== $order->otp) {
            $order->otp_attempts += 1;
            $order->save();
            $remaining = 3 - $order->otp_attempts;
            if ($request->ajax()) return response()->json(['status' => 'error', 'message' => 'OTP সঠিক নয়। আরও ' . $remaining . 'টি সুযোগ বাকি।']);
            return back()->withErrors(['otp' => 'OTP সঠিক নয়। আরও ' . $remaining . 'টি সুযোগ বাকি।']);
        }

        // ✅ OTP correct → confirm order
        $order->otp_verified = true;
        $order->otp = null; // clear otp for security
        $order->status = 'Confirmed';
        $order->save();

        // Purchase CAPI handled by stape.io sGTM

        Session::put('order_id', $order->id);
        
        if ($request->ajax()) return response()->json(['status' => 'success', 'message' => 'অর্ডার সফলভাবে নিশ্চিত হয়েছে!']);
        
        \Yoeunes\Toastr\Facades\Toastr::success('অর্ডার সফলভাবে নিশ্চিত হয়েছে!', 'Confirmed', ["positionClass" => "toast-top-center"]);
        return redirect('order-received');
    }

    public function resendOtp(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $customer = Customer::where('order_id', $order->id)->first();

        if ($order->otp_verified) {
            return response()->json(['status' => 'already_verified']);
        }

        // Generate fresh OTP
        $otp = (string) random_int(100000, 999999);
        $order->otp = $otp;
        $order->otp_attempts = 0;
        $order->otp_expires_at = Carbon::now()->addMinutes(15);
        $order->save();

        SmsNetBdService::sendOtp($customer->customerPhone, $otp, $order->invoiceID);

        return response()->json(['status' => 'sent']);
    }

    public function updatepaymentmethood(Request $request)
    {
        $order = Order::where('id', $request->order_id)->first();
        $order->Payment = $request->payment_option;
        $order->update();
        Session::put('successfulor', 'successfulor');
        return redirect('order/complete');
    }

    public function getorder()
    {
        $from = date('Y-m-d' . ' 00:00:00', time()); //need a space after dates.
        $to = date('Y-m-d' . ' 24:60:60', time());


        $now = Carbon::now();
        $yesterday = Carbon::now()->subDays(5);

        $orders = DB::table('orders')->orderBy('id', 'DESC')->whereBetween('created_at', [$yesterday, $now])->take(200)->get();

        $orders->map(function ($order) {
            $order->products = DB::table('orderproducts')
                ->leftjoin('products', 'orderproducts.product_id', '=', 'products.id')
                ->where('orderproducts.order_id', $order->id)->select('products.*', 'orderproducts.*')->get();
            return $order;
        });

        $orders->map(function ($order) {
            $order->customers = DB::table('customers')->where('customers.order_id', $order->id)->select('customers.id', 'customers.order_id', 'customers.customerName', 'customers.customerPhone', 'customers.customerAddress')->get();
            return $order;
        });

        return response()->json($orders, 201);
    }

    public function getproduct()
    {
        $products = Product::select('id', 'ProductName', 'ProductSlug', 'ProductSku', 'ProductRegularPrice', 'ProductSalePrice', 'ProductImage', 'ViewProductImage', 'status')->where('status', 'Active')->get();
        $response = [
            'status' => 's',
            'products' => $products,
        ];
        return $products;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response('');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return response('');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return response('');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        return response('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        return response('');
    }
}
