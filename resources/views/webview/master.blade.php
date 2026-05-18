<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>@yield('title')</title> 

    @yield('meta')

    @include('webview.partials.links.header')
    <link rel="icon" type="image/x-icon" href="{{asset(App\Models\Basicinfo::first()->logo)}}">
    <link rel="shortcut icon" type="image/png" href="{{asset(App\Models\Basicinfo::first()->logo)}}"/>
    @yield('subhead')
    <style>
    
         #crimg:hover{
            transform:rotate(360deg);
            /* Firefox */
            -moz-transition: all .5s ease-in;
            -webkit-transition: all .5s ease-in;
            -o-transition: all .5s ease-in;
            transition: all .5s ease-in;
        }
         #shimg:hover{
            transform:rotate(360deg);
            /* Firefox */
            -moz-transition: all .5s ease-in;
            -webkit-transition: all .5s ease-in;
            -o-transition: all .5s ease-in;
            transition: all .5s ease-in;
        }
        #message{
            display:none;
        }
        #crossm{
            display:none;
        }
        #crossms{
            display:none;
        }
        #hideser {
            display: none;
            float: left;
            padding: 0;
        }
        .header-top-inner {
            padding: 4px;
        }
        #subcategoryhover li {
            border-bottom: 1px solid #eee;
        }

        #subcategoryhover a:hover {
            color: #c30909 !important
        }


        #discountpart{
            position: absolute;
            top: 0px;
            right: 0px;
            background: red;
            border-radius: 16px 0% 0% 16px;
            height: 20px;
            width: 60px;
            box-shadow: 1px 1px 10px 1px #05050522;

        }
        #discountparttwo{
            background: #ff0a01;
            border-radius: 50%;
            height: 32px;
            width: 32px;
            float: left;

        }
        #pdis{
            font-size: 10px;
            margin: 0;
            padding-top: 2px;
            float: right;
            color: white;
            font-weight: bold;
            padding-right: 4px;
        }
      

        #sync1 .items img:hover{
            transform: scale(1.4);
        }
        #sync1 .items img{
            transition: .5s;
        }

        #posit {
            position: fixed;
            left: 0;
            z-index: 1111;
            top: 50%;
            background: #000000;
            height: 40px;
            width: 55px;
            text-align: end;
            border-radius: 0px;
        }

    </style>
    
    

    {!!$basicinfo->facebook_pixel!!}
    {!!$basicinfo->google_analytics!!}

    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MRMGGHKN');</script>
<!-- End Google Tag Manager -->


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CQSBT9VB53"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-CQSBT9VB53');
    </script>

</head>

<body class="main-body">
 
   <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRMGGHKN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


    <!-- header -->
    @include('webview.partials.header')
    <!-- header end -->


    <!-- Body -->
    <div class="body-content" id="top-banner-and-menu">
        {{-- //main content --}}
        @yield('maincontent')
        {{-- //main content End --}}
    </div>
    <!-- Body end -->

    <!-- === FOOTER === -->
    @include('webview.partials.footer')
    <!-- === FOOTER : END === -->
   
       <div class="bottom-navbar b-block d-lg-none" style="overflow: hidden;">
        <div class="container">
            <div class="row">
                <div class="logo-bar-icons col-lg-12 col" style="margin: 0px">
                    <ul class="inline-links d-flex justify-content-between align-items-center" style="margin: 0; padding: 0; list-style: none; width: 100%;">
                        <li class="text-center" style="flex: 1;">
                            <a href="javascript:void(0);" onclick="openNav()" class="nav-cart-box" style="display: flex; flex-direction: column; align-items: center; text-decoration: none;">
                                <img src="{{ asset('public/menu-bottom.png') }}" alt="" style="width: 25px;">
                                <span style="color: black; font-size: 11px; margin-top: 2px;">Category</span>
                            </a>
                        </li>
                        
                        <li class="text-center" style="flex: 1;">
                            <a class="nav-cart-box" href="tel:{{$basicinfo->phone_one}}" style="display: flex; flex-direction: column; align-items: center; text-decoration: none;">
                                <img src="{{ asset('public/phone-call.png') }}" alt="" style="width: 25px;">
                                <span style="color: black; font-size: 11px; margin-top: 2px;">Call</span>
                            </a>
                        </li>
                        
                        <li class="text-center" style="flex: 1;">
                            <a class="nav-cart-box" href="{{ url('/') }}" style="display: flex; flex-direction: column; align-items: center; text-decoration: none;">
                                <img src="{{ asset('public/home.png') }}" alt="" width="25px">
                                <span style="color: black; font-size: 11px; margin-top: 2px;">Home</span>
                            </a>
                        </li>
                        
                        <li class="text-center" style="flex: 1;">
                            <a href="{{ url('/checkout') }}" class="nav-cart-box" style="display: flex; flex-direction: column; align-items: center; text-decoration: none;">
                                <img src="{{ asset('public/shopping.png') }}" alt="" style="width: 28px;">
                                <span style="color: black; font-size: 11px; margin-top: 2px;">Shop</span>
                            </a>
                        </li>
                        <li class="text-center" style="flex: 1;">
                            <a class="nav-cart-box" href="{{ url('login') }}" style="display: flex; flex-direction: column; align-items: center; text-decoration: none;">
                                <img src="{{ asset('public/user.png') }}" alt="" style="width: 25px;">
                                <span style="color: black; font-size: 11px; margin-top: 2px;">Login</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!--Footer Js-->
    @include('webview.partials.links.footer')

    @yield('subfooter')

    <div id="message">

        <a href="{{$basicinfo->messanger}}" target="_blank" style="position: fixed;bottom: 290px;right: 6px;z-index:1111">
            <img src="{{asset('public/messenger.png')}}" style="height:60px;border-radius:50%">
        </a>
        <a href="tel:+88{{ $basicinfo->wp_1 }}" target="_blank" style="position: fixed;bottom: 220px;right: 6px;z-index:1111">
            <img src="{{asset('public/telephone.png')}}" style="height:60px;border-radius:50%">
        </a>

        <a href="https://wa.me/+88{{ $basicinfo->wp_1 }}?text=I%20am%20interested" style="position: fixed;bottom: 150px;right: 6px;z-index:1111">
            <img src="{{asset('public/whatsappns.png')}}" style="height:60px;border-radius:50%">
        </a>
        <!--<a href="https://wa.me/+88{{ $basicinfo->wp_2 }}?text=I%20am%20interested" target="_blank" style="position: fixed;bottom: 90px;right: 6px;z-index:1111">-->
        <!--    <img src="{{asset('public/whatsappns.png')}}" style="height:60px;border-radius:50%">-->
        <!--</a>-->
    </div>

    <a href="javascript:void(0);"  onclick="showmessage()" id="showm" style="position: fixed;bottom: 70px;right: 6px;z-index:1111">
        <img src="{{asset('public/livec-removebg-preview.png')}}" style="height:60px;" id="shimg">
    </a>
    <a href="javascript:void(0);" onclick="hidemessage()" id="crossm" style="position: fixed;bottom: 70px;right: 6px;z-index:1111">
        <img src="{{asset('public/refuse.png')}}" style="height:60px;" id="crimg">
    </a>

    {{-- model cart --}}

    <div class="modal" id="processing">
        <div class="modal-dialog">
            <div class="modal-content" style="text-align: center;background: none;">
                <i class="spinner fa fa-spinner fa-spin"
                    style="color: #ffffff; font-size: 70px;  padding: 22px;"></i>
            </div>
        </div>
    </div>


    <div class="modal" id="cartViewModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="AddToCartModel" style="padding-top: 0">

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span
                            aria-hidden="true">Add
                            More Products</span></button>
                    <a href="{{ url('checkout') }}" class="btn btn-primary">Submit Order</a>
                </div>
            </div>
        </div>
    </div>

    <div id="cartcount">
        @if (count(\Cart::content())>0)
        <div id="posit" type="button" onclick="checkcartview()">
            <span style="font-size: 22px;line-height: 50px;color: white;">{{ count(\Cart::content()) }}</span><img src="{{ asset('public/add-to-cart.png') }}" style="margin-top: -18px;height: 25px;padding-right: 8px;">
        </div>
        @endif
    </div>

    {{-- csrf --}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    {!!$basicinfo->chat_box!!}

    <script>

        window.onscroll = function() {
            myFunction()
        };

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }

        function checkcartview(){
            $.ajax({
                type: 'GET',
                url: '{{ url('get-cart-content') }}',

                success: function(response) {
                    $('#cartViewModal .modal-body').empty().append(
                        response);
                },
                error: function(error) {
                    console.log('error');
                }
            });
            $('#processing').modal('hide');
            $('#cartViewModal').modal('show');
        }


      function showmessage(){
            $('#showm').css('display','none');
            $('#showms').css('display','none');
            $('#crossms').css('display','inline');
            $('#crossm').css('display','inline');
            $("#message").fadeIn('slow');
        }
        function hidemessage(){
            $('#showm').css('display','inline');
            $('#showms').css('display','inline');
            $('#crossms').css('display','none');
            $('#crossm').css('display','none');
            $("#message").fadeOut('slow');
        }
        
        $(document).ready(function() {
            var idval = $('#CountSlider').val();

            $('#slider').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 1500,
                autoplayHoverPause: true,
                responsiveClass: true,
                dots: false,
                nav: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 1,
                    }
                }
            });

            $('#youtube').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsiveClass: true,
                dots: false,
                nav: false,
                responsive: {
                    0: {
                        items: 2,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 4,
                    }
                }
            });

            $('#categorySlide').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsiveClass: true,
                dots: false,
                nav: true,
                responsive: {
                    0: {
                        items: 3,
                    },
                    600: {
                        items: 3,
                    },
                    768: {
                        items: 4,
                    },
                    1000: {
                        items: 8,
                    }
                }
            });

            $('#promotionalofferSlide').owlCarousel({
                loop: true,
                margin: 5,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsiveClass: true,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 2,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 5,
                    }
                }
            });
            
            $('#bestSellingSlide').owlCarousel({
                loop: true,
                margin: 5,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsiveClass: true,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 2,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 5,
                    }
                }
            });

            $('#featuredProductSlide').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsiveClass: true,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 3,
                    },
                    600: {
                        items: 3,
                    },
                    1000: {
                        items: 6,
                    }
                }
            });

            $('#bestsellingproductSlide').owlCarousel({
                loop: true,
                margin: 0,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsiveClass: true,
                dots: false,
                nav: true,
                responsive: {
                    0: {
                        items: 2,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 4,
                    }
                }
            });

            for (let i = 0; i < idval; i++) {

                $('#CategoryProductSlide' + [i]).owlCarousel({
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 2500,
                    lazyLoad: true,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 3,
                        },
                        600: {
                            items: 3,
                        },
                        1000: {
                            items: 6,
                        }
                    }
                });
            }



        });

        var token = $("input[name='_token']").val();

        function addtocart(product_id) {
            $('#processing').css({
                'display': 'flex',
                'justify-content': 'center',
                'align-items': 'center'
            })
            $('#processing').modal('show');
            $.ajax({
                type: 'POST',
                url: '{{ url('add-to-cart') }}',
                data: {
                    _token: token,
                    product_id: product_id,
                    qty: '1',
                },

                success: function(data) {
                    updatecart();
                    $.ajax({
                        type: 'GET',
                        url: '{{ url('get-cart-content') }}',

                        success: function(response) {
                            $('#cartViewModal .modal-body').empty().append(
                                response);
                        },
                        error: function(error) {
                            console.log('error');
                        }
                    });
                    $('#processing').modal('hide');
                    $('#cartViewModal').modal('show');
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        function buynow(product_id) {
            $('#processing').css({
                'display': 'flex',
                'justify-content': 'center',
                'align-items': 'center'
            })
            $('#processing').modal('show');
            $.ajax({
                type: 'POST',
                url: '{{ url('add-to-cart') }}',
                data: {
                    _token: token,
                    product_id: product_id,
                    qty: '1',
                },

                success: function(data) {
                    updatecart();
                    if (data == 'success') {
                        window.location.href = '{{ url('checkout') }}';
                        $('#processing').modal('hide');
                    }
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }


        function removeFromCartItem(rowId) {

            $.ajax({
                type: 'POST',
                url: '{{ url('remove-cart') }}',
                data: {
                    _token: token,
                    rowId: rowId,
                },

                success: function(response) {

                    updatecart();
                    swal({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Product remove from your Cart',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    if (response == 'empty') {
                        $('#loadingreload').css({
                            'display': 'flex',
                            'justify-content': 'center',
                            'align-items': 'center'
                        })
                        $('#loadingreload').modal('show');
                        $('#cartViewModal').modal('hide');
                        location.reload();
                    } else {
                        $('#cartViewModal .modal-body').empty().append(
                            response);
                        $('#cartViewModal').modal('show');
                    }


                },
                error: function(error) {
                    console.log('error');
                }
            });
        }



        function upQuantity() {
            var qty = $('#proQuantity').val();
            if (qty >= 10) {

            } else {
                var b = parseInt(qty);
                var cq = b + 1;
                $('#proQuantity').val(cq);
                $('#qty').val(cq);
                $('#qtyor').val(cq);
            }
        }

        function downQuantity() {
            var qty = $('#proQuantity').val();
            if (qty <= 1) {

            } else {
                var b = parseInt(qty);
                var cq = b - 1;
                $('#proQuantity').val(cq);
                $('#qty').val(cq);
                $('#qtyor').val(cq);
            }


        }

        function checkcart() {
            $.ajax({
                type: 'GET',
                url: '{{ url('get-checkcart-content') }}',

                success: function(response) {
                    $('#checkcartview').html('');
                    $('#checkcartview').append(
                        response);
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        function removeFromCartItemHead(rowId) {

            $.ajax({
                type: 'POST',
                url: '{{ url('remove-cart') }}',
                data: {
                    _token: token,
                    rowId: rowId,
                },

                success: function(response) {
                    if (response == 'empty') {
                        $('#loadingreload').css({
                            'display': 'flex',
                            'justify-content': 'center',
                            'align-items': 'center'
                        })
                        $('#loadingreload').modal('show');
                        toastr.success('Product remove from Cart');
                        checkcart();
                        viewcart();
                        updatecart();
                        location.reload();
                    } else {
                        console.log('hi');
                        toastr.success('Product remove from Cart');
                        checkcart();
                        viewcart();
                        updatecart();
                    }


                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        function viewcart() {
            $.ajax({
                type: 'get',
                url: '{{ url('load-cart') }}',

                success: function(response) {
                    $('#cart-summary').empty().append(
                        response);
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        function updatecart() {
            $.ajax({
                type: 'get',
                url: '{{ url('update-cart') }}',

                success: function(response) {
                    $('.basket-item-count').html(response.item);
                    $('.cartamountvalue').html(response.amount);
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        function searchproduct() {
            var search = $('#modalsearchinput').val();
            $.ajax({
                type: 'GET',
                url: '{{ url('get-search-content') }}',
                data: {
                    _token: token,
                    search: search,
                },

                success: function(response) {
                    $('#searchproductlist').html('');
                    $('#searchproductlist').append(
                        response);
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        $(document).ready(function() {
            $('img').lazyload();
        });
    </script>
      <script>
            $(document).ready(function () {
                $('#searchToggleIcon').on('click',function ()
                {
                    $('#nav-item').toggle();
                    $('#pro-search-form').toggleClass('d-none');

                });

            });

        </script>

</body>

</html>
