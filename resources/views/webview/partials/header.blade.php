<style>
    /* ==============================================
       PROFESSIONAL E-COMMERCE HEADER STYLING
       ============================================== */
    
    .header-style-pro {
        background: #ffffff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    /* Top Bar Styling */
    .pro-top-bar {
        background: #76b82a;
        color: #ffffff;
        padding: 6px 0;
        font-size: 13px;
        font-weight: 600;
    }

    .pro-top-bar a {
        color: #ffffff;
        text-decoration: none;
    }

    .pro-top-bar a:hover {
        text-decoration: underline;
    }

    /* Main Header Layout */
    .pro-main-header {
        padding: 12px 0;
        background: #ffffff;
        border-bottom: 1px solid #f1f5f9;
    }

    /* Hardened Desktop Search Box */
    .pro-search-box {
        max-width: 580px !important;
        width: 100% !important;
        margin: 0 auto !important;
        display: flex !important;
        align-items: center !important;
        height: 44px !important;
        border: 2px solid #76b82a !important;
        border-radius: 8px !important;
        overflow: hidden !important;
        background: #ffffff !important;
        box-sizing: border-box !important;
        padding: 0 !important;
        float: none !important;
    }

    .pro-search-box input,
    .pro-search-box input.search-input {
        flex: 1 !important;
        height: 40px !important;
        line-height: 40px !important;
        border: 0 !important;
        outline: none !important;
        box-shadow: none !important;
        padding: 0 16px !important;
        margin: 0 !important;
        font-size: 14px !important;
        color: #1e293b !important;
        background: #ffffff !important;
        float: none !important;
        width: auto !important;
    }

    .pro-search-box button,
    .pro-search-box button.search-btn {
        width: 55px !important;
        height: 40px !important;
        background: #76b82a !important;
        color: #ffffff !important;
        border: 0 !important;
        outline: none !important;
        box-shadow: none !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        cursor: pointer !important;
        font-size: 16px !important;
        margin: 0 !important;
        padding: 0 !important;
        float: none !important;
        border-radius: 0 !important;
        transition: background 0.2s ease !important;
    }

    .pro-search-box button.search-btn:hover {
        background: #64a021 !important;
    }

    /* Right Side Action Items */
    .pro-header-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 20px;
    }

    .pro-action-item {
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: #1e293b;
        transition: color 0.2s ease;
    }

    .pro-action-item:hover {
        color: #76b82a;
    }

    .pro-icon-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        position: relative;
        color: #334155;
        transition: all 0.2s ease;
    }

    .pro-action-item:hover .pro-icon-circle {
        background: #76b82a;
        border-color: #76b82a;
        color: #ffffff;
    }

    .pro-cart-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background: #ef4444;
        color: #ffffff;
        font-size: 10px;
        font-weight: 700;
        min-width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #ffffff;
    }

    /* ==============================================
       MOBILE HEADER STYLING (< 992px)
       ============================================== */
    @media (max-width: 991px) {
        .desktop-pro-header {
            display: none !important;
        }
        
        .mobile-pro-header-wrapper {
            display: block !important;
            padding: 8px 15px 10px;
            background: #ffffff;
            border-bottom: 1px solid #f1f5f9;
        }

        .mobile-pro-header-top {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            height: 40px !important;
        }

        .mobile-menu-trigger {
            border: none !important;
            background: transparent !important;
            font-size: 22px !important;
            color: #1e293b !important;
            padding: 0 !important;
            margin: 0 !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 38px !important;
            height: 38px !important;
            line-height: 1 !important;
            cursor: pointer !important;
        }

        .mobile-brand-logo {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            height: 38px !important;
        }

        .mobile-brand-logo img {
            max-height: 38px !important;
            width: auto !important;
            object-fit: contain !important;
        }

        .mobile-action-icon-btn {
            color: #1e293b !important;
            font-size: 18px !important;
            text-decoration: none !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 38px !important;
            height: 38px !important;
            border-radius: 50% !important;
            background: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
            line-height: 1 !important;
        }

        /* Clean Mobile Search Bar */
        .mobile-search-input-group {
            display: flex !important;
            align-items: center !important;
            width: 100% !important;
            border: 2px solid #76b82a !important;
            border-radius: 50px !important;
            overflow: hidden !important;
            background: #ffffff !important;
            height: 40px !important;
            box-shadow: 0 2px 6px rgba(107, 184, 23, 0.12) !important;
            margin-top: 8px !important;
            box-sizing: border-box !important;
            padding: 0 !important;
        }

        .mobile-search-input-group input,
        .mobile-search-input-group input.mobile-search-field {
            flex: 1 !important;
            height: 36px !important;
            line-height: 36px !important;
            border: 0 !important;
            border-style: none !important;
            outline: none !important;
            box-shadow: none !important;
            padding: 0 16px !important;
            font-size: 13px !important;
            background: transparent !important;
            color: #1e293b !important;
            margin: 0 !important;
            width: 100% !important;
        }

        .mobile-search-input-group button,
        .mobile-search-input-group button.mobile-search-btn {
            height: 36px !important;
            width: 44px !important;
            background: #76b82a !important;
            color: #ffffff !important;
            border: 0 !important;
            outline: none !important;
            box-shadow: none !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 14px !important;
            cursor: pointer !important;
            border-radius: 0 50px 50px 0 !important;
            padding: 0 !important;
            margin: 0 !important;
        }
    }

    @media (min-width: 992px) {
        .mobile-pro-header-wrapper {
            display: none !important;
        }
        .desktop-pro-header {
            display: flex !important;
            align-items: center;
        }
    }
</style>

<header class="header-style-pro">
    <!-- Top Announcement Bar -->
    <div class="pro-top-bar">
        <div class="container-fluid px-lg-4">
            <div class="row align-items-center">
                <div class="col-md-9 col-12">
                    <marquee behavior="scroll" direction="left" scrollamount="5" style="margin: 0; padding: 0;">
                        🛍️ {{ $basicinfo->marquee_text }}
                    </marquee>
                </div>
                <div class="col-md-3 d-none d-md-block text-end">
                    @if(!empty($basicinfo->phone_one))
                        <i class="fa-solid fa-headset me-1"></i> Helpline: <a href="tel:{{ $basicinfo->phone_one }}">{{ $basicinfo->phone_one }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Desktop Main Header (>= 992px) -->
    <div class="pro-main-header d-none d-lg-block">
        <div class="container-fluid px-lg-4">
            <div class="desktop-pro-header row align-items-center">
                <!-- Logo -->
                <div class="col-lg-3">
                    <a href="{{ url('/') }}" class="d-inline-block">
                        <img src="{{ asset($basicinfo->logo) }}" alt="Logo" style="max-height: 52px; width: auto; object-fit: contain;">
                    </a>
                </div>

                <!-- Search Box -->
                <div class="col-lg-6">
                    <form action="{{ url('search') }}" method="GET" style="margin: 0 !important; padding: 0 !important;">
                        <div class="pro-search-box">
                            <input type="text" name="search" class="search-input" placeholder="Search for products..." required>
                            <button type="submit" class="search-btn" title="Search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Actions -->
                <div class="col-lg-3">
                    <div class="pro-header-actions">
                        <!-- Hotline Badge -->
                        @if(!empty($basicinfo->phone_one))
                        <a href="tel:{{ $basicinfo->phone_one }}" class="pro-action-item" title="Call Us">
                            <div class="pro-icon-circle">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="d-none d-xl-block" style="line-height: 1.2;">
                                <small style="font-size: 11px; color: #64748b; display: block;">Call Us</small>
                                <span style="font-size: 13px; font-weight: 700; color: #1e293b;">{{ $basicinfo->phone_one }}</span>
                            </div>
                        </a>
                        @endif

                        <!-- Account / User -->
                        <a href="{{ Auth::id() ? 'javascript:void(0);' : url('login') }}" onclick="{{ Auth::id() ? 'openProfileNav()' : '' }}" class="pro-action-item" title="Account">
                            <div class="pro-icon-circle">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        </a>

                        <!-- Shopping Cart -->
                        <a href="javascript:void(0);" onclick="checkcartview()" class="pro-action-item" title="Cart">
                            <div class="pro-icon-circle">
                                <i class="fa-solid fa-bag-shopping"></i>
                                <span class="pro-cart-badge">{{ intval(Cart::count()) }}</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile App Header Layout (< 992px) -->
    <div class="mobile-pro-header-wrapper d-lg-none">
        <div class="mobile-pro-header-top">
            <!-- Left: Hamburger Category Drawer Button -->
            <button type="button" onclick="openNav()" class="mobile-menu-trigger" aria-label="Menu">
                <i class="fa-solid fa-bars-staggered"></i>
            </button>

            <!-- Center: Brand Logo -->
            <a href="{{ url('/') }}" class="mobile-brand-logo">
                <img src="{{ asset($basicinfo->logo) }}" alt="Logo">
            </a>

            <!-- Right: Cart Icon ONLY -->
            <a href="javascript:void(0);" onclick="checkcartview()" class="mobile-action-icon-btn position-relative" title="Cart">
                <i class="fa-solid fa-bag-shopping"></i>
                <span class="pro-cart-badge">{{ intval(Cart::count()) }}</span>
            </a>
        </div>

        <!-- Integrated Clean Mobile Search Bar -->
        <form action="{{ url('search') }}" method="GET" style="margin: 0 !important; padding: 0 !important;">
            <div class="mobile-search-input-group">
                <input type="text" name="search" class="mobile-search-field" placeholder="Search for products..." required>
                <button type="submit" class="mobile-search-btn" title="Search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>
    </div>

    <!-- Mobile Category Drawer -->
    <div id="mySidepanel" class="sidepanel">
        <div class="side-menu-header">
            <div class="side-menu-close" onclick="closeNav()">
                <i class="fas fa-close"></i>
            </div>
            <div class="px-3 pb-3 side-login" style="padding-top: 12px; padding-left: 10px;">
                <span style="font-size: 16px; color: #ffffff; font-weight: bold;">Categories</span>
            </div>
        </div>
        <ul class="level1-styles collapse show" id="id0">
            @forelse ($categories as $category)
                <li>
                    <a href="{{ url('products/category/' . $category->slug) }}">{{ $category->category_name }}</a>
                </li>
            @empty
            @endforelse
        </ul>
    </div>

    <!-- Profile Sidepanel Drawer -->
    <div id="myProfileSidepanel" class="sidepanel">
        <div class="side-menu-header">
            <div class="side-menu-close" onclick="clossProfileNav()">
                <i class="fas fa-close"></i>
            </div>
            <div class="px-3 pb-3 side-login" style="padding-top: 12px; padding-left: 10px;">
                @if(Auth::guard('web')->check())
                    <h4 class="m-0 text-left" style="color: white; font-size: 16px; text-transform: uppercase;">{{ Auth::guard('web')->user()->name }}</h4>
                    <h4 class="m-0 text-left" style="color: white; font-size: 14px;">{{ Auth::guard('web')->user()->email }}</h4>
                @endif
            </div>
        </div>
        <div class="py-0 widget-profile-menu">
            <ul class="categories categories--style-3">
                <li class="p-0"><a href="{{ url('user/dashboard') }}"><i class="fas fa-dashboard category-icon"></i> Dashboard</a></li>
                <li class="p-0"><a href="{{ url('user/wallets') }}"><i class="fas fa-wallet category-icon"></i> Wallet</a></li>
                <li class="p-0"><a href="{{ url('user/purchase_history') }}"><i class="fas fa-file-text category-icon"></i> Orders</a></li>
                <li class="p-0"><a href="{{ url('track-order') }}"><i class="fas fa-file-text category-icon"></i> Track Order</a></li>
                <li class="p-0"><a href="{{ url('user/profile') }}"><i class="fas fa-user category-icon"></i> Manage Profile</a></li>
                <li class="p-0"><a href="{{ url('logout') }}"><i class="fas fa-comment category-icon"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</header>
