<style>
    .top-menu .menus ul {
        display: flex;
        flex-wrap: nowrap;
        margin: 0;
        padding: 0;
        list-style: none;
        overflow-x: auto;
        scrollbar-width: none;
    }
    .top-menu .menus ul::-webkit-scrollbar {
        display: none;
    }
    .top-menu .menus ul li {
        white-space: nowrap;
    }
    .top-menu .menus ul li a {
        color: black;
        text-align: center;
        padding: 12px 12px !important;
        text-decoration: none;
        font-weight: bold;
        display: block;
    }

    /* Visibility and Layout Control */
    @media (max-width: 991px) {
        .desktop-header-view {
            display: none !important;
        }
        .mobile-header-view {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            width: 100% !important;
            height: 60px !important;
            padding: 0 15px !important;
            flex-wrap: nowrap !important;
        }
    }
    @media (min-width: 992px) {
        .mobile-header-view {
            display: none !important;
        }
        .desktop-header-view {
            display: flex !important;
        }
    }
</style>
<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-barhead animate-dropdown" >
        <div class="header-top-inner ">
           <marquee behavior="" direction="" style="color:#fff;font-size:17px;font-weight:700;"> {{ $basicinfo->marquee_text }}</marquee>
        </div>
    </div>
 
    <div class="main-header" id="myHeader" style="background: #fff; border-bottom: 1px solid #e9e9e9; padding: 10px 0; position: relative; z-index: 1000;">
        <div class="container">
            <!-- Desktop View -->
            <div class="desktop-header-view row align-items-center" style="margin: 0;">
                <div class="col-lg-2 ps-0">
                    <a href="{{ url('/') }}" style="display: flex; align-items: center;">
                        <img src="{{ asset($basicinfo->logo) }}" alt="" style="max-height: 60px; width: auto;">
                    </a>
                </div>
                <div class="col-lg-5 top-menu">
                    <div class="menus">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>
                                <a class="category-btn dropdown-toggle" id="shopDropdown" data-bs-toggle="dropdown" style="font-weight:700;cursor: pointer;color:#222;font-size:16px;display: block;position: relative;">Product</a>
                                <div class="dropdown-menu p-3 submenu-container" aria-labelledby="shopDropdown">
                                    <div class="row">
                                        @foreach ($categories as $category)
                                            <div class="col submenu-column">
                                                <h6 style="margin:6px auto;"><a href="{{ url('products/category/' . $category->slug) }}">{{ strtoupper($category->category_name) }}</a></h6>
                                                <ul>
                                                    @foreach ($category->subcategories as $subcategory)
                                                        <li><a href="{{ url('products/sub/category/' . $subcategory->slug) }}">{{ $subcategory->sub_category_name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <li><a href="{{url('venture/contact_us')}}">Contact</a></li>
                            <li><a href="{{url('venture/about_us')}}">About-Us</a></li>
                            <li><a href="{{url('promotional/products')}}">Best Selling</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <form action="{{ url('search') }}" method="GET" style="margin: 0;">
                        <div style="display: flex; border: 1px solid #ddd; border-radius: 4px; overflow: hidden; height: 40px; align-items: stretch;">
                            <input name="search" placeholder="Search here..." style="flex: 1; border: none; padding: 0 15px; outline: none; font-size: 14px; height: 100%;">
                            <button type="submit" style="background: #000; border: none; width: 50px; color: #fff; display: flex; align-items: center; justify-content: center; height: 100%; cursor: pointer; padding: 0;">
                                <i class="fa-solid fa-magnifying-glass" style="font-size: 18px;"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2 d-flex justify-content-end align-items-center pe-0">
                    <div style="margin-right: 20px;">
                        <a href="{{ Auth::id() ? '#' : url('login') }}" onclick="{{ Auth::id() ? 'openProfileNav()' : '' }}" style="color: #000; font-size: 20px;"><i class="fa-solid fa-user"></i></a>
                    </div>
                    <div class="dropdown-cart">
                        <a href="javascript:void(0);" onclick="checkcartview()" style="position: relative; text-decoration: none; color: #000; display: flex; align-items: center;">
                            <i class="fa-solid fa-bag-shopping" style="font-size: 24px;"></i>
                            <span style="position: absolute; top: -10px; right: -12px; background: #ff7000; color: #fff; font-size: 10px; min-width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; border-radius: 50%; font-weight: bold;">{{ intval(Cart::count()) }}</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mobile View -->
            <div class="mobile-header-view" style="padding: 0 15px !important;">
                <div style="width: 15%; height: 100%; display: flex; align-items: center; justify-content: flex-start;">
                    <button type="button" onclick="openNav()" style="border: none; background: transparent; padding: 0; display: flex; align-items: center; justify-content: center; margin: 0; height: 100%; color: #120d3f; font-size: 24px;">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
                <div style="width: 70%; height: 100%; display: flex; align-items: center; justify-content: center;">
                    <a href="{{ url('/') }}" style="display: flex; align-items: center; justify-content: center; height: 100%;">
                        <img src="{{ asset($basicinfo->logo) }}" alt="" style="max-height: 55px; width: auto; display: block; vertical-align: middle;">
                    </a>
                </div>
                <div style="width: 15%; height: 100%; display: flex; align-items: center; justify-content: flex-end;">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#searchPopup" style="margin-right: 15px; color: #000; font-size: 20px; display: flex; align-items: center; justify-content: center; height: 100%;">
                         <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <div class="dropdown-cart" style="display: flex; align-items: center; height: 100%;">
                        <a href="javascript:void(0);" onclick="checkcartview()" style="text-decoration: none; color: #000; display: flex; align-items: center; justify-content: center; height: 100%;">
                            <div style="position: relative; display: flex; align-items: center; justify-content: center;">
                                <i class="fa-solid fa-bag-shopping" style="font-size: 22px;"></i>
                                <span style="position: absolute; top: -8px; right: -10px; background: #ff7000; color: #fff; font-size: 9px; min-width: 15px; height: 15px; display: flex; align-items: center; justify-content: center; border-radius: 50%; font-weight: bold;">{{ intval(Cart::count()) }}</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- side bar panel start -->
    <div id="mySidepanel" class="sidepanel">
        <div class="side-menu-header ">
            <div class="side-menu-close" onclick="closeNav()">
                <i class="fas fa-close"></i>
            </div>
            <div class="px-3 pb-3 side-login" style="padding-top: 12px;padding-bottom: 15px; padding-left: 10px;">
                <a href=""></a>
                <a style="font-size: 16px" href="#">Categories</a>
            </div>
        </div>
        <ul class="level1-styles collapse show" id="id0">
             
            @forelse ($categories as $category)
                <li>
                    <a href="{{ url('products/category/' . $category->slug) }}">{{ $category->category_name }} </a>
                </li>
            @empty
            @endforelse

        </ul>
    </div>

     <!-- side bar panel start -->
     <div id="myProfileSidepanel" class="sidepanel">
        <div class="side-menu-header ">
            <div class="side-menu-close" onclick="clossProfileNav()">
                <i class="fas fa-close"></i>
            </div>
            <div class="px-3 pb-3 side-login" style="padding-top: 12px;padding-bottom: 15px; padding-left: 10px;">
                @if(Auth::guard('web')->check())
                   @if(Auth::guard('web')->user()->profile))
                        <img src="{{ asset(Auth::guard('web')->user()->profile) }}" alt="" id="profileImage">
                    @else
                        <img src="{{ asset('public/backend/img/user.jpg') }}" alt="" id="profileImage">
                    @endif
                <h4 class="m-0 text-left" style="color: white;font-size: 16px;text-transform: uppercase;">{{ Auth::guard('web')->user()->name }}</h4>
                <h4 class="m-0 text-left" style="color: white;font-size: 16px;">{{ Auth::guard('web')->user()->email }}</h4>
                @else
                @endif


            </div>
        </div>
        <div class="py-0 widget-profile-menu">
            <ul class="categories categories--style-3">
                <li class="p-0">
                    <a href="{{ url('user/dashboard') }}" class="active">
                        <i class="fas fa-dashboard category-icon"></i>
                        <span class="category-name">
                            Dashboard
                        </span>
                    </a>
                </li>

                <li class="p-0">
                    <a href="{{ url('user/wallets') }}" class="">
                        <i class="fas fa-wallet category-icon"></i>
                        <span class="category-name">
                            Wallet </span>
                    </a>
                </li>

                <li class="p-0">
                    <a href="{{ url('user/purchase_history') }}" class="">
                        <i class="fas fa-file-text category-icon"></i>
                        <span class="category-name">
                            Orders </span>
                    </a>
                </li>

                <li class="p-0">
                    <a href="{{ url('track-order') }}" class="">
                        <i class="fas fa-file-text category-icon"></i>
                        <span class="category-name">
                            Track Order
                        </span>
                    </a>
                </li>
                <li class="p-0">
                    <a href="{{ url('user/profile') }}" class="">
                        <i class="fas fa-user category-icon"></i>
                        <span class="category-name">
                            Manage Profile
                        </span>
                    </a>
                </li>
                <li class="p-0">
                    <a href="{{ url('logout') }}" class="">
                        <i class="fas fa-comment category-icon"></i>
                        <span class="category-name">
                            Logout
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- side bar panel end -->
</header>

<!-- Search Popup Modal -->
<div class="modal fade" id="searchPopup" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 0px !important">
            <div class="modal-body" style="padding: 0px;">
                <div class="modalsearch-area">
                    <div class="control-group d-flex justify-content-between">
                        <input class="mb-0 search-field" id="modalsearchinput" onkeyup="searchproduct()"
                            placeholder="Search here...">
                        <a class="search-button" data-bs-dismiss="modal" href="#"></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="searchproductlist" style="background: white;margin: 10px;height: auto;overflow: scroll;">

    </div>
</div>

<style>
    #profileImage {
        border-radius: 50%;
        padding: 0px;
        padding-bottom: 8px;
        padding-top: 10px;
    }

    .sidebar-widget-title {
        position: relative;
    }

    .sidebar-widget-title:before {
        content: "";
        width: 100%;
        height: 1px;
        background: #eee;
        position: absolute;
        left: 0;
        right: 0;
        top: 50%;
    }

    .py-3 {
        padding-bottom: 1rem !important;
    }

    .sidebar-widget-title span {
        background: #fff;
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.2em;
        position: relative;
        padding: 8px;
        color: #dadada;
    }

    ul.categories {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    ul.categories--style-3>li {
        border: 0;
    }

    ul.categories>li {
        border-bottom: 1px solid #f1f1f1;
    }

    .widget-profile-menu a i {
        opacity: 0.6;
        font-size: 13px !important;
        top: 0 !important;
        width: 18px;
        height: 18px;
        text-align: center;
        line-height: 18px;
        display: inline-block;
        margin-right: 0.5rem !important;
    }

    .category-name {
        color: black;
        font-size: 18px;
    }

    .category-icon {
        font-size: 18px;
        color: black;
    }
    .modalsearch-area .search-field {
        border: medium none;
        padding: 10px;
        border-right: none;
        float: left;
    }

    .modalsearch-area .search-button {
        display: inline-block;
        float: left;
        margin-top: -1px;
        padding: 6px 15px 7px;
        text-align: center;
        background-color: #000000;
        border: 1px solid #000000;
    }

    .modalsearch-area .search-button:after {
        color: #fff;
        content: "\f00d";
        font-family: fontawesome;
        font-size: 24px;
        line-height: 9px;
        vertical-align: middle;
    }
    #hideser{
       display:none; 
    }
</style>
<script>
    function showser() {
        var s=$('#valcheck').val();
        if(s=='0'){
            $('#valcheck').val('1');
            $('#hideser').css('display','none');
        }else{
            $('#valcheck').val('0');
            $('#hideser').css('display','inline');

        }
    }
    function showserBig() {
        var s=$('#valcheck').val();
        if(s=='0'){

            $('#valcheck').val('1');
            $('#hideser').css('display','inline');

        }else{

            $('#valcheck').val('0');
            $('#hideser').css('display','none');

        }
    }
</script>
