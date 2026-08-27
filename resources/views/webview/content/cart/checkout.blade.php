@extends('webview.master')

@section('maincontent')
    @section('title')
        {{ env('APP_NAME') }}-Checkout
    @endsection
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        #remqty {
            background: var(--color-secondary);
            border-radius: 0;
            color: white;
            padding: 5px;
            line-height: 0px;
        }

        #addqty {
            background: var(--color-primary);
            border-radius: 0;
            color: white;
            padding: 5px;
            line-height: 0px;
        }

        #couponoption {
            display: none;
        }

        #coupontext {
            display: none;
        }

        #coupontext1 {
            display: none;
        }

        #cointext {
            display: none;
        }

        #cointext2 {
            display: none;
        }
    </style>

    @php
        $availablecoup = App\Models\Coupon::where('status', 'Active')->where('validity', '>=', date('Y-m-d'))->first();
        $vat = App\Models\Basicinfo::first();
        $cities = App\Models\City::where('status', 'Active')->get();
    @endphp

    {{-- //no cart --}}
    @if (!Session::has('cart'))
        <div class="container pb-5 mb-sm-4">
            <div class="pt-5">
                <div class="py-3 card mt-sm-3" style="min-height: 309px;">
                    <div class="text-center card-body">
                        <h2 class="pb-3 h4">কোন প্রোডাক্ট নেই</h2>
                        <a class="mt-3 btn btn-primary" href="{{ url('/') }}">প্রোডাক্ট বাছাই করুন</a>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Cart::count() == 0)
        <div class="container pb-5 mb-sm-4">
            <div class="pt-5">
                <div class="py-3 card mt-sm-3" style="min-height: 309px;">
                    <div class="text-center card-body">
                        <h2 class="pb-3 h4">কোন প্রোডাক্ট নেই</h2>
                        <a class="mt-3 btn btn-primary" href="{{ url('/') }}">প্রোডাক্ট বাছাই করুন</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <br>
        <section class="section-content padding-y bg slidetop">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <aside class="mb-4 card">
                            <article class="card-body">
                                <header class="mb-4">
                                    <p class="text-center" style="font-size: 16px;">অর্ডারটি কনফার্ম করতে আপনার নাম, ঠিকানা,
                                        মোবাইল নাম্বার, লিখে <span class="text-danger"> Confirm Order</span> বাটনে ক্লিক
                                        করুন
                                    </p>
                                </header>
                                @php
                                    $coupon = Session::get('availablecoupon');
                                    $couponcode = Session::get('couponcode');
                                @endphp
                                <form action="{{ url('press/order') }}" method="POST" class="from-prevent-multiple-submits">
                                    @csrf
                                    <input type="hidden" name="device_id" id="device_id">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Name </label>
                                            <input type="text" id="customerName" name="customerName" @if (Auth::id())
                                            value="{{ Auth::guard('web')->user()->name }}" @else @endif
                                                placeholder="Your Name" required class="form-control"
                                                style=" background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                        </div>
                                        @if (Auth::id())
                                            <input type="text" id="user_id" name="user_id" @if (Auth::id())
                                            value="{{ Auth::guard('web')->user()->id }}" @else @endif hidden>
                                        @else
                                        @endif
                                        <input type="hidden" name="paymentType" value="" id="paymentType">
                                        <div class="form-group col-12">
                                            <label>Address </label>
                                            <input type="text" id="customerAddress" name="customerAddress"
                                                placeholder="Your Address" required class="form-control"
                                                style=" background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Phone Number</label>
                                            <input type="text" minlength="11" maxlength="11" onchange="incorder()"
                                                pattern="[0-1]{2}[0-9]{6}[0-9]{3}" id="customerPhone" @if (Auth::id())
                                                value="{{ Auth::guard('web')->user()->phone }}" @else @endif
                                                name="customerPhone" required class="form-control"
                                                placeholder="Your Phone Number">
                                        </div>
                                        <input type="hidden" name="coupon_code" @if (isset($couponcode))
                                        value="{{ $couponcode }}" @else @endif id="coupon_code">
                                        <textarea id="ordersubtotalprice" name="subTotal" cols="10" rows="5"
                                            hidden>{{ Cart::subtotalFloat() }}</textarea>
                                        <div class="form-group col-sm-12">
                                            <label>Select Area </label>
                                            @php
                                                $basicInfo = App\Models\Basicinfo::first();
                                                $max_inside = (int)$basicInfo->inside_dhaka_charge;
                                                $max_outside = (int)$basicInfo->outside_dhaka_charge;

                                                $has_free_inside = false;
                                                $has_free_outside = false;
                                                $custom_inside_set = false;
                                                $custom_outside_set = false;
                                                $highest_custom_inside = 0;
                                                $highest_custom_outside = 0;

                                                foreach ($cartProducts as $cp) {
                                                    if (isset($cp->inside_dhaka)) {
                                                        $val = (int)$cp->inside_dhaka;
                                                        $custom_inside_set = true;
                                                        if ($val === 0) {
                                                            $has_free_inside = true;
                                                        }
                                                        if ($val > $highest_custom_inside) {
                                                            $highest_custom_inside = $val;
                                                        }
                                                    }
                                                    if (isset($cp->outside_dhaka)) {
                                                        $val = (int)$cp->outside_dhaka;
                                                        $custom_outside_set = true;
                                                        if ($val === 0) {
                                                            $has_free_outside = true;
                                                        }
                                                        if ($val > $highest_custom_outside) {
                                                            $highest_custom_outside = $val;
                                                        }
                                                    }
                                                }

                                                if ($has_free_inside) {
                                                    $max_inside = 0;
                                                } elseif ($custom_inside_set) {
                                                    $max_inside = $highest_custom_inside;
                                                }

                                                if ($has_free_outside) {
                                                    $max_outside = 0;
                                                } elseif ($custom_outside_set) {
                                                    $max_outside = $highest_custom_outside;
                                                }
                                            @endphp
                                            <select id="deliveryCharge" name="deliveryCharge" class="form-control"
                                                onchange="setdeliverychargr()">
                                                <option value="{{ $max_outside }}">ঢাকার সিটির বাহির
                                                    ({{ $max_outside }})</option>
                                                <option value="{{ $max_inside }}">ঢাকা সিটির মধ্যে
                                                    ({{ $max_inside }})</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Customer Note:</label>
                                            <textarea class="form-control" id="customerNote" name="customerNote"
                                                rows="2"></textarea>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" id="orderConfirm"
                                                class="btn btn-lg btn-styled from-prevent-multiple-submits btn-base-1 btn-block btn-icon-left strong-500 hov-bounce hov-shaddow buy-now"
                                                style="background:var(--color-primary);color:white;font-size:22px !important;width:100%;border-radius:4px;">
                                                <i class="spinner fa fa-spinner fa-spin"></i> Confirm Order
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row d-none">
                                        <div class="text-center col-12">
                                            <div class="tab-pane fade" id="coin" role="tabpanel" aria-labelledby="coin-tab">
                                                @if (Auth::id())
                                                    @if (Auth::user()->available_coin > 0)
                                                        <div class="mb-3 d-flex">
                                                            <i class="fas fa-check-circle"
                                                                style="font-size: 22px;margin-top: 3px; margin-right: 8px; color: var(--color-primary);"></i>
                                                            <label style="font-size: 20px;"> You have <span
                                                                    style="color: var(--color-primary);font-weight:bold"
                                                                    id="totalcoin">{{ Auth::user()->available_coin }}</span>
                                                                coin for available !</label>
                                                        </div>
                                                        <button type="submit" id="orderConfirmCoin"
                                                            class="btn btn-lg btn-styled from-prevent-multiple-submits btn-base-1 btn-block btn-icon-left strong-500 hov-bounce hov-shaddow buy-now"
                                                            style="background:#120d3f;color:white;font-size:22px !important;width:100%;border-radius:4px;">
                                                            <i class="spinner fa fa-spinner fa-spin"></i> Confirm Order
                                                        </button>
                                                    @else
                                                        <div class="mb-3 d-flex">
                                                            <i class="fas fa-check-circle"
                                                                style="font-size: 22px;margin-top: 3px; margin-right: 8px; color: gray;"></i>
                                                            <label style="font-size: 20px;color:gray"> You have <span
                                                                    style="color: gray;font-weight:bold"
                                                                    id="totalcoin">{{ Auth::user()->available_coin }}</span>
                                                                coin for available !</label>
                                                        </div>
                                                        <button type="submit" id="orderConfirmCoin" disabled
                                                            class="btn btn-lg btn-styled from-prevent-multiple-submits btn-base-1 btn-block btn-icon-left strong-500 hov-bounce hov-shaddow buy-now"
                                                            style="background:#120d3f;color:white;font-size:22px !important;width:100%;border-radius:4px;">
                                                            <i class="spinner fa fa-spinner fa-spin"></i> Confirm Order
                                                        </button>
                                                    @endif
                                                @else
                                                @endif

                                            </div><!-- end tab-pane-->
                                            <div class="tab-pane fade show active" id="credit-card" role="tabpanel"
                                                aria-labelledby="credit-card-tab">
                                                <button type="submit" id="orderConfirm"
                                                    class="btn btn-lg btn-styled from-prevent-multiple-submits btn-base-1 btn-block btn-icon-left strong-500 hov-bounce hov-shaddow buy-now"
                                                    style="background:#120d3f;color:white;font-size:22px !important;width:100%;border-radius:4px;">
                                                    <i class="spinner fa fa-spinner fa-spin"></i> Confirm Order
                                                </button>
                                            </div><!-- end tab-pane-->

                                            <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-tab">
                                                <div class="contact-form-action">
                                                    <div class="row">

                                                        <div class="col-lg-12">
                                                            <div class="text-center btn-box">
                                                                <button id="sslczPayBtn"
                                                                    style="background: var(--color-primary); color: white; width: 100%; font-size: 22px !important; display: inline;"
                                                                    token="if you have any token validation"
                                                                    postdata="your javascript arrays or objects which requires in backend"
                                                                    order="If you already have the transaction generated for current order"
                                                                    endpoint="{{ url('/pay-via-ajax') }}"> Pay & Confirm
                                                                    Order
                                                                </button>
                                                            </div>
                                                        </div><!-- end col-lg-12 -->
                                                    </div>
                                                </div><!-- end contact-form-action -->
                                            </div><!-- end tab-pane-->
                                        </div>
                                    </div>
                                </form>
                            </article> <!-- card-body.// -->
                        </aside>
                    </div>
                    <div class="col-12 col-md-6 orderDetails mt-3 mt-md-0">
                        <aside class="card">
                            <article class="card-body">
                                <header class="mb-2">
                                    <h4 class="card-title" style="font-size: 16px;margin: 0;font-weight: bold;">Order
                                        Summary </h4>
                                </header>
                                <div class="row">
                                <div class="table-responsive">
                                    <table class="table border-bottom" style="border: none;">
                                        @forelse ($cartProducts as $cartProduct)
                                            <tr class="cart-item" id="productcart{{ $cartProduct->rowId }}">
                                                @php
                                                    $proImgSrc = $cartProduct->options->image ?? $cartProduct->image ?? null;
                                                    if (!$proImgSrc) {
                                                        $pModel = \App\Models\Product::find($cartProduct->id);
                                                        $proImgSrc = $pModel ? $pModel->ProductImage : '';
                                                    }
                                                    $proImgSrc = str_replace('public/', '', $proImgSrc);
                                                @endphp
                                                <td class="product-image" id="proImgDiv" style="width: 80px; vertical-align: top;">
                                                    <a href="#" class="mr-3">
                                                        <img class=" ls-is-cached lazyloaded" src="{{ asset($proImgSrc) }}"
                                                            id="proImg" style="width: 70px; height: 70px; object-fit: cover; border-radius: 5px;" alt="{{ $cartProduct->name }}">
                                                    </a>
                                                </td>

                                                <td class="product-total" style="width: 80px;" hidden>
                                                    <span>৳ <span id="pricetotal{{ $cartProduct->rowId }}"
                                                            class="price">{{ $cartProduct->qty * $cartProduct->price }}</span></span>
                                                </td>

                                                <td class="product-name">
                                                    <span class="pr-4 d-block w-100" id="proName">{{ $cartProduct->name }}</span>
                                                    <div class="ext w-100">
                                                        <div class="price">
                                                            <span class="pr-3 d-block" id="proPrice">৳
                                                                {{ $cartProduct->price }}</span>
                                                            <span class="pt-0 pr-3 d-block" id="proPrice"> <small
                                                                    style="color: #000000;font-size: 16px;font-weight: bold;">
                                                                    @if (isset($cartProduct->options['size']))
                                                                        Size : {{ $cartProduct->options['size'] }},&nbsp;
                                                                    @endif
                                                                    @if (isset($cartProduct->options['size']))
                                                                        Color : {{ $cartProduct->options['color'] }},&nbsp;
                                                                    @endif
                                                                    @if (isset($cartProduct->options['sigment']))
                                                                        Sigment : {{ $cartProduct->options['sigment'] }}
                                                                    @endif
                                                                </small></span>
                                                        </div>
                                                        <div class="qtyinfo d-flex align-items-center flex-nowrap mt-2">
                                                             <div class="input-group input-group--style-2 mb-0"
                                                                 style="width: 130px; flex-shrink: 0;">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-number"
                                                                        onclick="remnum('{{ $cartProduct->rowId }}')" id="remqty"
                                                                        type="button" style="height: 30px; width: 30px; display: flex; align-items: center; justify-content: center; padding: 0;">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>
                                                                </span>
                                                                <input type="text" name="quantity[{{ $cartProduct->id }}]"
                                                                    id="QuantityPeo{{ $cartProduct->rowId }}"
                                                                    class="form-control input-number text-center" placeholder="1"
                                                                    value="{{ $cartProduct->qty }}" min="1" max="10"
                                                                    style="margin: 0; height: 30px; padding: 0;"
                                                                    onchange="updateQuantity('{{ $cartProduct->rowId }}', this)">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-number"
                                                                        onclick="updatenum('{{ $cartProduct->rowId }}')" id="addqty"
                                                                        type="button" style="height: 30px; width: 30px; display: flex; align-items: center; justify-content: center; padding: 0;">
                                                                        <i class="fas fa-plus"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            <a type="button" id="proDelCart"
                                                                style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; font-size: 18px; color: #ff0000; margin-left: 10px; cursor: pointer; transform: translateY(-10px);"
                                                                onclick="removeFromCart('{{ $cartProduct->rowId }}')">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <input type="text" name="productP" id="priceOf{{ $cartProduct->rowId }}"
                                                    value="{{ $cartProduct->price }}" hidden>

                                            </tr>
                                        @empty
                                        @endforelse
                                    </table>
                                </div>

                                    {{-- @if (Auth::id() && isset($availablecoup)) --}}
                                    <div class="d-flex">
                                        <input style="margin: 0;width: 20px;" @if (isset($coupon)) checked value="No" @else
                                        value="Yes" @endif type="checkbox" id="havecoupon" name="havecoupon"
                                            onclick="havecoupon();">
                                        <label for="havecoupon" style="font-size: 20px;"> Have
                                            coupon ?</label>
                                    </div>
                                    {{-- @endif --}}
                                    <div id="couponoption" @if (isset($coupon)) style="display:inline-block !important" @endif
                                        style="margin-top: 12px;">
                                        <div class="d-flex justify-content-between">
                                            <input type="text" name="couponcode" @if (isset($coupon))
                                            value="{{ $coupon->code }}" @endif id="couponcode" class="form-control"
                                                style="width: 80%;border-radius: 6px;">
                                            <button class="btn btn-theme btn-sm" style="font-size: 18px;color: white;"
                                                onclick="applycoupon()">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <input type="text" name="size" value="{{ $cartProduct->options->size }}" hidden>
                            <input type="text" name="color" value="{{ $cartProduct->options->color }}" hidden>

                            <article class="card-body border-top">
                                <dl class="row">
                                    <dt class="col-8">Subtotal: </dt>
                                    <dd class="text-right col-4"><strong>৳ <span
                                                id="subtotalprice">{{ Cart::subtotalFloat() }}</span> </strong></dd>

                                    <dt class="col-8">Delivery charge: </dt>

                                    <dd class="text-right col-4 text-danger"><strong>৳
                                            <span id="dinamicdalivery">{{ $max_outside }}</span>
                                        </strong></dd>
                                    @if (isset($coupon))
                                        <dt class="col-8" style="color: var(--color-primary)">Coupon Discount: </dt>
                                        @if ($coupon->type == 'Amount')
                                            <dd class="text-right col-4" style="color: var(--color-primary)"><strong>৳
                                                    <span id="coupondiscount" style="color: var(--color-primary)">{{ $coupon->amount }}</span>
                                                </strong></dd>
                                        @else
                                            <dd class="text-right col-4" style="color: var(--color-primary)"><strong>
                                                    <span id="coupondiscount" style="color: var(--color-primary)">৳
                                                    </span>
                                                </strong>{{ intval(Cart::subtotalFloat() * ($coupon->amount / 100)) }}</dd>
                                        @endif
                                    @else
                                        <dt class="col-8" style="color: var(--color-primary)" id="coupontext1">Coupon Discount: </dt>
                                        <dd class="text-right col-4" id="coupontext" style="color: var(--color-primary)"><strong>৳
                                                <span id="coupondiscount" style="color: var(--color-primary)">0
                                                </span>
                                            </strong></dd>
                                    @endif

                                    <dt class="col-8" id="cointext">Coin Use: </dt>
                                    <dd class="text-right col-4" id="cointext2"><strong>৳ <span id="coinuse">0</span>
                                        </strong></dd>

                                    @if ($vat->vat_status == 'On')
                                        <dt class="col-8">Vat:</dt>
                                        <dd class="text-right col-4"><strong class="h5 text-dark">৳
                                                <span>{{ intval(Cart::subtotalFloat() * ($vat->vat / 100)) }}</span></strong>
                                        </dd>
                                        <input type="hidden" id="vatamount"
                                            value="{{ intval(Cart::subtotalFloat() * ($vat->vat / 100)) }}">
                                    @else
                                        <dt class="col-8" style="display:none">Vat:</dt>
                                        <dd class="text-right col-4" style="display:none"><strong class="h5 text-dark">৳
                                                <span>0</span></strong></dd>
                                        <input type="hidden" id="vatamount" value="0">
                                    @endif
                                    <dt class="col-8">Total:</dt>
                                    <dd class="text-right col-4"><strong class="h5 text-dark">৳ <span
                                                id="totalamount"></span></strong></dd>
                                </dl>

                            </article>

                        </aside>
                    </div>

                </div>
            </div>
        </section>
        <br>
    @endif



    <script type="text/javascript">
        // Clear the previous ecommerce object.
        dataLayer.push({
            ecommerce: null
        });

        // Push the begin_checkout event to dataLayer.
        dataLayer.push({
            event: "begin_checkout",
            ecommerce: {
                currency: "BDT",
                value: Number("<?php echo Cart::subtotalFloat(); ?>"),
                items: [
                    @foreach ($cartProducts as $cartInfo)
                                                                {
                        item_name: "{{ $cartInfo->name }}",
                        item_id: Number("<?php    echo $cartInfo->id; ?>"),
                        price: Number("<?php    echo $cartInfo->price; ?>"),
                        item_size: "{{ $cartInfo->options->size }}",
                        item_color: "{{ $cartInfo->options->color }}",
                        currency: "BDT",
                        quantity: {{ $cartInfo->qty ?? 0 }}
                                                                },
                    @endforeach
                                                        ]
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <style>
        #myTab.nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            padding: 8px;
            border: 3px solid #0f6b8b;
            border-radius: 4px;

        }

        #myTab.nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link {
            color: black;

        }

        #myTab {
            border: none;
        }

        .icon-element {
            display: block;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            background-color: #287dfa;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            position: relative;
            font-size: 25px;
            color: #fff;
        }



        .spinner {
            display: none;
        }

        @media only screen and (min-width: 768px) {
            #proName {
                font-size: 18px;
            }

            #proPrice {
                font-size: 18px;
                padding: 6px;
                padding-left: 0;
            }

            .input-number {
                height: 39px;
            }

            #proDelCart {
                width: 30px;
                padding-top: 2px;
                font-size: 20px;
            }

            #proImgDiv {
                max-width: 110px;
            }

            #proImg {
                width: 100px;
            }

        }

        @media only screen and (max-width: 767px) {
            .input-group--style-2 .input-group-btn>.btn {
                background: 0 0;
                border-color: #e6e6e6;
                color: #818a91;
                font-size: 8px;
                padding-top: 6px;
                padding-bottom: 6px;
                cursor: pointer;
            }

            .input-number {
                height: 26px;
            }

            #proDelCart {
                width: 30px;
                font-size: 18px;
            }

            #proImg {
                max-width: 50px;
            }
        }
    </style>

    <script>
        function incorder() {
            $.ajax({
                type: 'GET',
                url: 'incomplete-order',
                data: {
                    customerName: $('#customerName').val(),
                    customerAddress: $('#customerAddress').val(),
                    customerPhone: $('#customerPhone').val(),
                    ordersubtotalprice: $('#ordersubtotalprice').val(),
                    deliveryCharge: $('#deliveryCharge').val(),
                    customerNote: $('#customerNote').val(),
                },

                success: function (data) {
                    console.log(data);
                },
                error: function (error) {
                    console.log('error');
                }
            });
        }

        function showbtn(idname) {
            if (idname == 'sslczPayBtn') {
                $('#orderConfirmCoin').css('display', 'none');
                $('#orderConfirm').css('display', 'none');
                $('#' + idname).css('display', 'inline');
                $('#paymentType').val(3);
                $('#cointext').css('display', 'none');
                $('#cointext2').css('display', 'none');
                $('#coinuse').html('0');
                calculation();
            } else if (idname == 'orderConfirmCoin') {
                $('#sslczPayBtn').css('display', 'none');
                $('#orderConfirm').css('display', 'none');
                $('#' + idname).css('display', 'inline');
                $('#paymentType').val(1);
                var coin = $('#totalcoin').html();
                $('#cointext').css('display', 'inline');
                $('#cointext2').css('display', 'inline');
                $('#coinuse').html(coin);
                calculation();
            } else {
                $('#sslczPayBtn').css('display', 'none');
                $('#orderConfirmCoin').css('display', 'none');
                $('#' + idname).css('display', 'inline');
                $('#paymentType').val(2);
                $('#cointext').css('display', 'none');
                $('#cointext2').css('display', 'none');
                $('#coinuse').html('0');
                calculation();
            }
        }
        $(document).ready(function () {

            $("#city_id").select2({
                placeholder: "Select a City",
                dropdownParent: $('#citydatatbl'),
                allowClear: true,
                ajax: {
                    data: function (params) {
                        var query = {
                            q: params.term,
                        };
                        return query;
                    },
                    type: 'GET',
                    url: '{{ url('delivery/cities') }}',
                    processResults: function (data) {
                        var data = $.parseJSON(data);
                        return {
                            results: data
                        };
                    }
                }
            });


            $("#zone_id").select2({
                placeholder: "Select a Zone",
                dropdownParent: $('#xonedatatbl'),
                allowClear: true,
                ajax: {
                    data: function (params) {
                        var query = {
                            q: params.term,
                            cityID: $("#city_id").val()
                        };
                        return query;
                    },
                    type: 'GET',
                    url: '{{ url('delivery/zones') }}',
                    processResults: function (data) {
                        var data = $.parseJSON(data);
                        return {
                            results: data
                        };
                    }
                }
            });


            $('#sslczPayBtn').css('display', 'none');
            $('#orderConfirmCoin').css('display', 'none');

            $('#paypal-tab').on('click', function () {
                $('#paymentMethod').val('Online Payment');
            });
            $('#credit-card-tab').on('click', function () {
                $('#paymentMethod').val('Manual Payment');
            });
            $('#sslczPayBtn').on('click', function () {
                var obj = {};
                obj.cus_name = $('#customerName').val();
                obj.cus_address = $('#customerAddress').val();
                obj.cus_phone = $('#customerPhone').val();
                obj.type = 'Hotel Booking';
                obj.subTotal = $('#subTotal').val();
                obj.email = $('#email').val();
                obj.address = $('#address').val();
                obj.city = $('#city').val();
                obj.state = $('#state').val();
                obj.zip = $('#zip').val();
                obj.country = $('#country').val();
                $('#sslczPayBtn').prop('postdata', obj);
            });
        });

        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(
                    7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
                loader);
        })(window, document);
    </script>
    @php
        $zones = App\Models\Zone::all();
    @endphp

    <script>
        var zones = @json($zones);

        function applycoupon() {
            var code = $('#couponcode').val();
            if (code == '') {
                window.alert('Please Input a valid Coupon.');
            } else {
                $.ajax({
                    type: 'GET',
                    url: 'check-coupon',
                    data: {
                        coupon_code: code,
                    },

                    success: function (data) {
                        if (data.status == 'invalid') {
                            $('#coupontext').css('display', 'none');
                            $('#coupontext1').css('display', 'none');
                            $('#coupondiscount').text(data.discount);
                            $('#coupon_code').val('');
                            calculation();
                            toastr.error('Please Input a valid Coupon.');
                        } else if (data.status == 'false') {
                            $('#coupontext').css('display', 'none');
                            $('#coupontext1').css('display', 'none');
                            $('#coupondiscount').text(data.discount);
                            $('#coupon_code').val('');
                            calculation();
                            toastr.error('You have already use this coupon.');
                        } else {
                            $('#coupontext').css('display', 'inline');
                            $('#coupontext1').css('display', 'inline');
                            $('#coupondiscount').text(data.discount);
                            $('#coupon_code').val(code);
                            calculation();
                            toastr.success('coupon applied successfully !');
                        }
                    },
                    error: function (error) {
                        console.log('error');
                    }
                });
            }
        }

        function havecoupon() {
            var v = $('#havecoupon').val();
            if (v == 'Yes') {
                $('#couponoption').css('display', 'inline-block');
                $('#havecoupon').val('No');
                $('#couponcode').val('');
            } else {
                $.ajax({
                    type: 'GET',
                    url: 'reset-coupon',

                    success: function (data) {
                        if (data == 'valid') {
                            $('#couponoption').css('display', 'none');
                            $('#havecoupon').val('Yes');
                            $('#couponcode').val('');
                            location.reload();
                        } else {
                            $('#couponoption').css('display', 'none');
                            $('#havecoupon').val('Yes');
                            $('#couponcode').val('');
                            window.alert('Please Input a valid Coupon.');
                        }
                    },
                    error: function (error) {
                        console.log('error');
                    }
                });

            }
        }

        function updatenum(id) {
            var num = $('#QuantityPeo' + id).val();
            var fv = Number(num) + 1;
            if (fv > 9) {

            } else {
                $('#QuantityPeo' + id).val(fv);
                $.ajax({
                    type: 'POST',
                    url: 'update-cart',

                    data: {
                        _token: '{{ csrf_token() }}',
                        rowId: id,
                        qty: fv,
                    },

                    success: function (data) {
                        $('#QuantityPeo' + id).val(data.qty);
                        updateQuantity(id);

                    },
                    error: function (error) {
                        console.log('error');
                    }
                });
            }
        }

        function remnum(id) {
            var num = $('#QuantityPeo' + id).val();
            var fv = Number(num) - 1;
            if (fv < 1) {

            } else {
                $('#QuantityPeo' + id).val(fv);
                $.ajax({
                    type: 'POST',
                    url: 'update-cart',

                    data: {
                        _token: '{{ csrf_token() }}',
                        rowId: id,
                        qty: fv,
                    },

                    success: function (data) {
                        $('#QuantityPeo' + id).val(data.qty);
                        updateQuantity(id);

                    },
                    error: function (error) {
                        console.log('error');
                    }
                });

            }

        }

        function setdeliverychargr() {
            var deliverycharge = Number($('#deliveryCharge').val());
            console.log("Selected Delivery Charge:", deliverycharge);
            $('#dinamicdalivery').html(deliverycharge);
            $('#dinamicdaliveryLG').html(deliverycharge);
            var subprice = Number($('#subtotalprice').html());
            var totalprice = subprice + deliverycharge;

            $('#totalamount').html(totalprice.toFixed(2));

        }
        function updateQuantity(rowId) {
            var quantity = $('#QuantityPeo' + rowId).val();
            var price = $('#priceOf' + rowId).val();
            var producttotal = quantity * price;

            var prevPrice = $('#pricetotal' + rowId).html();
            if (producttotal > prevPrice) {
                var subPrice = Number($('#subtotalprice').html());
                var updatesubprice = subPrice - (-price);
                $('#subtotalprice').html(updatesubprice);
                //ordersubtotal
                $('#ordersubtotalprice').html(updatesubprice);
                //cart number
                var prevcart = $('#cartNumber').html();
                var cartUpdate = prevcart - (-1);
                $('#cartNumber').html(cartUpdate);

            } else {
                //cart number
                var prevcart = $('#cartNumber').html();
                var cartUpdate = prevcart - 1;
                $('#cartNumber').html(cartUpdate);

                var subPrice = Number($('#subtotalprice').html());
                var updatesubprice = subPrice - price;
                $('#subtotalprice').html(updatesubprice);
                $('#ordersubtotalprice').html(updatesubprice);

            }
            //mincart
            $('#minQty' + rowId).html(quantity);
            $('#minsubtotalprice').html(updatesubprice);
            //total price part
            var deliverycharge = $('#deliveryCharge').val();
            var coupon = Number($('#coupondiscount').html());
            var vat = Number($('#vatamount').val());
            var totalprice = updatesubprice + vat - (-deliverycharge) - coupon;
            $('#totalamount').html(totalprice);

            $('#pricetotal' + rowId).html(producttotal);

            $.ajax({
                type: 'POST',
                url: 'update-cart',

                data: {
                    _token: '{{ csrf_token() }}',
                    rowId: rowId,
                    qty: quantity,
                },

                success: function (data) {
                    $('#QuantityPeo' + rowId).val(data.qty);

                },
                error: function (error) {
                    console.log('error');
                }
            });

        }

        function removeFromCart(rowId) {
            var thisprice = $('#pricetotal' + rowId).html();
            var subPrice = Number($('#subtotalprice').html());
            var updatesubprice = subPrice - thisprice;
            $('#subtotalprice').html(updatesubprice);

            //order subtotal
            $('#ordersubtotalprice').html(updatesubprice);

            var deliverycharge = $('#deliveryCharge').val();
            var coupon = Number($('#coupondiscount').html());
            var vat = Number($('#vatamount').val());
            var totalprice = updatesubprice + vat - (-deliverycharge) - coupon;
            $('#totalamount').html(totalprice);
            //cart number
            var quantity = $('#QuantityPeo' + rowId).val();
            var prevcart = $('#cartNumber').html();
            var cartUpdate = prevcart - quantity;
            $('#cartNumber').html(cartUpdate);

            $.ajax({
                type: 'POST',
                url: 'remove-cart',
                data: {
                    _token: '{{ csrf_token() }}',
                    rowId: rowId,
                },

                success: function (data) {
                    $('#productcart' + rowId).css('display', 'none');
                    if (data == 'empty') {
                        location.reload();
                    }
                },
                error: function (error) {
                    console.log('error');
                }
            });
        }

        window.onload = (event) => {
            var subPrice = Number($('#subtotalprice').html());
            //total price part
            var deliverycharge = $('#deliveryCharge').val();
            var coupon = Number($('#coupondiscount').html());
            var vat = Number($('#vatamount').val());
            var totalprice = subPrice + vat - (-deliverycharge) - coupon;
            $('#totalamount').html(totalprice)

        };

        function calculation() {
            var subPrice = Number($('#subtotalprice').html());
            var coinuse = Number($('#coinuse').html());
            var deliverycharge = Number($('#deliveryCharge').val());
            var coupon = Number($('#coupondiscount').html());
            var vat = Number($('#vatamount').val());
            var preTotal = subPrice + vat + Number(deliverycharge) - coupon;
            if (coinuse > preTotal) {
                coinuse = preTotal;
                $('#coinuse').html(preTotal.toFixed(2)); // update HTML also if needed
            }
            var totalprice = preTotal - coinuse;
            $('#totalamount').html(totalprice.toFixed(2));
        }


        // function calculation() {
        //     var subPrice = Number($('#subtotalprice').html());
        //     var coinuse = $('#coinuse').html();
        //     var deliverycharge = $('#deliveryCharge').val();
        //     var coupon = Number($('#coupondiscount').html());
        //     var vat = Number($('#vatamount').val());
        //     var totalprice = subPrice + vat - (-deliverycharge) - coupon - coinuse;
        //     $('#totalamount').html(totalprice)
        // }
    </script>

    <script type="text/javascript">
        (function () {
            function getDeviceId() {
                let deviceId = localStorage.getItem('gm_device_id');
                if (!deviceId) {
                    let canvas = document.createElement('canvas');
                    let ctx = canvas.getContext('2d');
                    let txt = 'grihomart_fp_1.0';
                    ctx.textBaseline = "top";
                    ctx.font = "14px 'Arial'";
                    ctx.textBaseline = "alphabetic";
                    ctx.fillStyle = "#f60";
                    ctx.fillRect(125,1,62,20);
                    ctx.fillStyle = "#069";
                    ctx.fillText(txt, 2, 15);
                    let canvasData = canvas.toDataURL();
                    
                    let fpString = [
                        navigator.userAgent,
                        navigator.language,
                        screen.colorDepth,
                        screen.width + 'x' + screen.height,
                        new Date().getTimezoneOffset(),
                        canvasData
                    ].join('||');

                    let hash = 0;
                    for (let i = 0; i < fpString.length; i++) {
                        let char = fpString.charCodeAt(i);
                        hash = ((hash << 5) - hash) + char;
                        hash |= 0;
                    }
                    deviceId = 'dev_' + Math.abs(hash) + '_' + Math.random().toString(36).substring(2, 9);
                    localStorage.setItem('gm_device_id', deviceId);
                }
                return deviceId;
            }

            document.addEventListener('DOMContentLoaded', function () {
                let devInput = document.getElementById('device_id');
                if (devInput) {
                    devInput.value = getDeviceId();
                }
            });

            $('.from-prevent-multiple-submits').on('submit', function () {
                let devInput = document.getElementById('device_id');
                if (devInput && !devInput.value) {
                    devInput.value = getDeviceId();
                }
                $('.from-prevent-multiple-submits').attr('disabled', 'true');
                $('.spinner').css('display', 'inline');
            });
        })();
    </script>
    <script>
    if (typeof fbq !== 'undefined') {
        fbq('track', 'InitiateCheckout', {
            content_ids: [@foreach ($cartProducts as $cartProduct) "{{ $cartProduct->id }}", @endforeach],
            content_type: 'product',
            value: Number("{{ (float)str_replace(',', '', Cart::subtotal()) }}"),
            currency: 'BDT'
        }, {
            eventID: "{{ $fbEventId ?? '' }}"
        });
    }
    </script>
@endsection