<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Incompleteorder;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use App\Models\Size;
use App\Models\Zone;

class CartController extends Controller
{



    public function addtocart(Request $request)
    {
      
      $pid = $request->product_id;
      $cartProduct = Product::find($pid); 
        if ($request->price > 0) {
            $price = $request->price;
            Cart::add([
                'id' => $request->product_id,
                'name' => $cartProduct->ProductName,
                'price' => $price,
                'qty' => $request->qty,
                'weight' => 1,
                'image' => $cartProduct->ProductImage,
                'options' => [
                    'code' => $cartProduct->ProductSku,
                    'size' => $request->size,
                    'color' => $request->color,
                    'sigment' => $request->sigment,
                    'inside_dhaka' => $cartProduct->inside_dhaka,
                    'outside_dhaka' => $cartProduct->outside_dhaka,
                ],

            ]);
        } else {
            $size = Size::where('product_id', $cartProduct->id)->first();
            $price =$size->SalePrice;
            Cart::add([
                'id' => $request->product_id,
                'name' => $cartProduct->ProductName,
                'price' => $price,
                'qty' => $request->qty,
                'weight' => 1,
                'image' => $cartProduct->ProductImage,
                'options' => [
                    'code' => $cartProduct->ProductSku,
                    'size' => $size->size,
                    'color' => $request->color,
                    'sigment' => $request->sigment,
                    'inside_dhaka' => $cartProduct->inside_dhaka,
                    'outside_dhaka' => $cartProduct->outside_dhaka,
                ],

            ]);
        }

        // Send CAPI AddToCart event
        $fbEventId = 'atc_' . $pid . '_' . uniqid();
        \App\Services\FacebookPixelService::sendCapiEvent('AddToCart', [], [
            'currency' => 'BDT',
            'value' => (float)$price * (int)$request->qty,
            'content_ids' => [(string)$pid],
            'content_type' => 'product',
            'content_name' => $cartProduct->ProductName,
        ], $fbEventId);

        // Flash to session for browser tracking on redirect
        Session::flash('fb_add_to_cart_event', [
            'eventId' => $fbEventId,
            'product_id' => (string)$pid,
            'price' => (float)$price,
            'name' => $cartProduct->ProductName,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'fbEventId' => $fbEventId,
                'product_id' => $pid,
                'price' => $price,
                'name' => $cartProduct->ProductName,
            ]);
        }

        return redirect('checkout');
      
    }


    public function updatecart(Request $request)
    {
        $rowId = $request->rowId;
        Cart::update($rowId, $request->qty);

        $quentity = [
            'qty' => $request->qty,
        ];
        return response()->json($quentity, 200);
    }

    public function destroy(Request $request)
    {
        Cart::remove($request->rowId);
        $olditem = count(Cart::content());
        if ($olditem == '0') {
            Cart::destroy();
            return response()->json('empty', 200);
        }
        $cartProducts = Cart::content();
        return view('webview.content.product.cartproductmodal')->with('cartProducts', $cartProducts);
    }

    public function getcartcontent()
    {
        $cartProducts = Cart::content();
        return view('webview.content.product.cartproductmodal')->with('cartProducts', $cartProducts);
    }

    public function getcheckcartcontent()
    {
        $cartProducts = Cart::content();
        return view('webview.content.product.checkcartview')->with('cartProducts', $cartProducts);
    }

    public function cartcontent()
    {
        $cartProducts = Cart::content();
        $num = count($cartProducts);
        $am = Cart::subtotal();
        $arr = ['item' => $num, 'amount' => $am];
        return response()->json($arr, 200);
    }

    public function cart()
    {
        return view('webview.content.cart.cart');
    }

    public function city(Request $request)
    {
        if (isset($request['q'])) {
            $cites = City::query()->where([
                ['cityName', 'like', '%' . $request['q'] . '%'],
                ['status', 'like', 'Active'],
                ['courier_id', '=', 1]
            ])->get();
        } else {
            $cites = City::query()->where([
                ['status', 'Active'],
                ['courier_id', '=', 1]
            ])->get();
        }
        $city = array();
        foreach ($cites as $item) {
            $city[] = array(
                "id" => $item['id'],
                "text" => $item['cityName']
            );
        }
        return json_encode($city);
    }

    public function zone(Request $request)
    {
        if (isset($request['q'])) {
            $zones = Zone::query()->where([
                ['zoneName', 'like', '%' . $request['q'] . '%'],
                ['courier_id', '=', 1],
                ['status', 'Active'],
                ['city_id', 'like',  $request['cityID']]
            ])->get();
        } else {
            $zones = Zone::query()->where([
                ['courier_id', 'like',  1],
                ['city_id', 'like',  $request['cityID']],
                ['status', 'Active']
            ])->get();
        }
        $zone = array();
        foreach ($zones as $item) {
            $zone[] = array(
                "id" => $item['id'],
                "text" => $item['zoneName']
            );
        }
        return json_encode($zone);
    }

    public function ipblock()
    {
        return view('webview.content.cart.ipblock');
    }
    public function emptycart()
    {
        return view('webview.content.cart.emptycart');
    }

    public function existorder()
    {
        return view('webview.content.cart.existorder');
    }

    public function loadcart()
    {
        $cartProducts = Cart::content();
        return view('webview.content.cart.summery')->with('cartProducts', $cartProducts);
    }

    public function checkout()
    {
        $cartProducts = Cart::content();
        foreach($cartProducts as $cartProduct) {
            $product = Product::find($cartProduct->id);
            if($product) {
                $cartProduct->inside_dhaka = $product->inside_dhaka;
                $cartProduct->outside_dhaka = $product->outside_dhaka;
            }
        }

        $fbEventId = 'ic_' . uniqid();
        $productIds = $cartProducts->pluck('id')->map(function($id) {
            return (string)$id;
        })->toArray();
        $totalAmount = (float)str_replace(',', '', Cart::subtotal());

        \App\Services\FacebookPixelService::sendCapiEvent('InitiateCheckout', [], [
            'currency' => 'BDT',
            'value' => $totalAmount,
            'content_ids' => $productIds,
            'content_type' => 'product',
        ], $fbEventId);

        return view('webview.content.cart.checkout')->with('cartProducts', $cartProducts)->with('fbEventId', $fbEventId);
    }
    public function payment()
    {
        if (Session::has('system_verify_status')) {
            $data = (object) Session::get('system_verify_status');
            $orders = new \stdClass();
            $orders->id = 0; // Mock ID for GS flow
            $orders->invoiceID = $data->invoiceID;
            $orders->status = 'Pending';
            $orders->subTotal = $data->totalAmount;
            $orders->deliveryCharge = 0;
            $orders->vat = 0;
            $orders->paymentAmount = 0;
            $orders->discountCharge = 0;
            $orders->customers = (object) [
                'customerName' => $data->customerName,
                'customerPhone' => $data->customerPhone,
                'customerAddress' => $data->customerAddress
            ];
            return view('webview.content.cart.payment')->with('orders', $orders);
        }
        $orders = Order::with(['customers', 'orderproducts', 'couriers', 'cities', 'zones', 'admins'])->where('id', Session::get('order_id'))->first();
        return view('webview.content.cart.payment')->with('orders', $orders);
    }

    public function complete()
    {
        $id = Session::get('order_id');
        $order =  Order::with([
            'orderproducts' => function ($query) {
                $query->select('id', 'order_id', 'productName', 'quantity', 'productPrice');
            },
            'admins' => function ($query) {
                $query->select('id', 'name');
            },
        ])->join('customers', 'customers.order_id', '=', 'orders.id')
            ->select('orders.*', 'customers.order_id', 'customers.customerPhone', 'customers.customerName', 'customers.customerAddress')
            ->where('orders.id', $id)
            ->first();
        return view('webview.content.cart.complete', ['order' => $order]);
    }
}
