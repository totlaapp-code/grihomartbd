<style>
    /* ==============================================
       GRIHOMART HEADER — uses :root CSS Variables
       Color change করতে custom-style.css এর :root দেখুন
       ============================================== */

    .header-style-pro {
        background: var(--color-header-bg);
        box-shadow: var(--shadow-md);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    /* ── Top Announcement Bar ── */
    .pro-top-bar {
        background: var(--color-topbar-bg);
        color: rgba(255,255,255,0.75);
        padding: 6px 0;
        font-size: 13px;
        font-weight: 500;
        border-bottom: 1px solid rgba(255,255,255,0.06);
    }
    .pro-top-bar strong,
    .pro-top-bar span { color: #fff; }
    .pro-top-bar a {
        color: var(--color-primary-light);
        text-decoration: none;
        transition: color var(--transition);
    }
    .pro-top-bar a:hover { color: var(--color-primary); }

    /* ── Main Header ── */
    .pro-main-header {
        padding: 10px 0;
        background: var(--color-header-bg);
        border-bottom: 1px solid rgba(255,255,255,0.07);
    }

    /* ── Search Box ── */
    .pro-search-box {
        max-width: 580px !important;
        width: 100% !important;
        margin: 0 auto !important;
        display: flex !important;
        align-items: center !important;
        height: 44px !important;
        border: 2px solid var(--color-primary) !important;
        border-radius: var(--radius-sm) !important;
        overflow: hidden !important;
        background: #fff !important;
        box-sizing: border-box !important;
        padding: 0 !important;
        float: none !important;
        transition: border-color var(--transition) !important;
    }
    .pro-search-box:focus-within {
        border-color: var(--color-primary-light) !important;
        box-shadow: 0 0 0 3px rgba(255,107,0,.15) !important;
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
        color: var(--color-text) !important;
        background: #fff !important;
        float: none !important;
        width: auto !important;
    }
    .pro-search-box button,
    .pro-search-box button.search-btn {
        width: 52px !important;
        height: 40px !important;
        background: var(--color-primary) !important;
        color: #fff !important;
        border: 0 !important;
        outline: none !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        cursor: pointer !important;
        font-size: 16px !important;
        margin: 0 !important;
        padding: 0 !important;
        border-radius: 0 !important;
        transition: background var(--transition) !important;
    }
    .pro-search-box button.search-btn:hover {
        background: var(--color-primary-dark) !important;
    }

    /* ── Right Side Action Items ── */
    .pro-header-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 18px;
    }
    .pro-action-item {
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        color: var(--color-header-text);
        transition: color var(--transition);
    }
    .pro-action-item:hover { color: var(--color-primary); }

    .pro-icon-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.12);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        position: relative;
        color: var(--color-header-text);
        transition: all var(--transition);
    }
    .pro-action-item:hover .pro-icon-circle {
        background: var(--color-primary);
        border-color: var(--color-primary);
        color: #fff;
    }

    /* Phone text in header */
    .pro-action-item .pro-action-text {
        display: flex;
        flex-direction: column;
        line-height: 1.2;
    }
    .pro-action-item .pro-action-text small {
        font-size: 11px;
        color: rgba(255,255,255,0.5);
    }
    .pro-action-item .pro-action-text span {
        font-size: 13px;
        font-weight: 600;
        color: var(--color-header-text);
    }

    .pro-cart-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background: var(--color-danger);
        color: #fff;
        font-size: 10px;
        font-weight: 700;
        min-width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid var(--color-header-bg);
    }

    /* ==============================================
       MOBILE HEADER (< 992px)
       ============================================== */
    @media (max-width: 991px) {
        .desktop-pro-header { display: none !important; }

        .mobile-pro-header-wrapper {
            display: block !important;
            padding: 8px 15px 10px;
            background: var(--color-header-bg);
            border-bottom: 1px solid rgba(255,255,255,0.07);
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
            color: var(--color-header-text) !important;
            padding: 0 !important;
            margin: 0 !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 38px !important;
            height: 38px !important;
            cursor: pointer !important;
        }
        .mobile-brand-logo {
            display: inline-flex !important;
            align-items: center !important;
            height: 38px !important;
        }
        .mobile-brand-logo img {
            max-height: 38px !important;
            width: auto !important;
            object-fit: contain !important;
            /* Logo white/bright on dark bg */
            filter: brightness(1.1);
        }
        .mobile-action-icon-btn {
            color: var(--color-header-text) !important;
            font-size: 18px !important;
            text-decoration: none !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 38px !important;
            height: 38px !important;
            border-radius: 50% !important;
            background: rgba(255,255,255,0.08) !important;
            border: 1px solid rgba(255,255,255,0.12) !important;
            transition: all var(--transition) !important;
        }
        .mobile-action-icon-btn:hover {
            background: var(--color-primary) !important;
            border-color: var(--color-primary) !important;
            color: #fff !important;
        }

        /* Mobile Search Bar */
        .mobile-search-input-group {
            display: flex !important;
            align-items: center !important;
            width: 100% !important;
            border: 2px solid var(--color-primary) !important;
            border-radius: var(--radius-full) !important;
            overflow: hidden !important;
            background: #fff !important;
            height: 40px !important;
            margin-top: 8px !important;
            box-sizing: border-box !important;
            padding: 0 !important;
            box-shadow: 0 2px 8px rgba(255,107,0,.2) !important;
        }
        .mobile-search-input-group input,
        .mobile-search-input-group input.mobile-search-field {
            flex: 1 !important;
            height: 36px !important;
            border: 0 !important;
            outline: none !important;
            box-shadow: none !important;
            padding: 0 16px !important;
            font-size: 13px !important;
            background: transparent !important;
            color: var(--color-text) !important;
            margin: 0 !important;
        }
        .mobile-search-input-group button,
        .mobile-search-input-group button.mobile-search-btn {
            height: 36px !important;
            width: 44px !important;
            background: var(--color-primary) !important;
            color: #fff !important;
            border: 0 !important;
            outline: none !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 14px !important;
            cursor: pointer !important;
            border-radius: 0 var(--radius-full) var(--radius-full) 0 !important;
            padding: 0 !important;
            margin: 0 !important;
            transition: background var(--transition) !important;
        }
        .mobile-search-input-group button.mobile-search-btn:hover {
            background: var(--color-primary-dark) !important;
        }
    }

    @media (min-width: 992px) {
        .mobile-pro-header-wrapper { display: none !important; }
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
                            <div class="d-none d-xl-block pro-action-text">
                                <small>Call Us</small>
                                <span>{{ $basicinfo->phone_one }}</span>
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
    <div id="mySidepanel" class="sidepanel shadow-lg">
        <div class="side-menu-header" style="background: var(--color-header-bg);">
            <div class="side-menu-close" onclick="closeNav()">
                <i class="fas fa-close"></i>
            </div>
            <div class="px-3 pb-3 side-login" style="padding-top: 15px;">
                <span style="font-size: 18px; color: #ffffff; font-weight: bold;">Categories</span>
            </div>
        </div>
        <div class="p-2 bg-white">
            <div class="list-group list-group-flush border-0">
                @forelse ($categories as $category)
                    <a href="{{ url('products/category/' . $category->slug) }}" class="list-group-item list-group-item-action border-0 d-flex align-items-center py-3" style="font-size: 15px; color: #333; font-weight: 500; border-bottom: 1px solid #f1f5f9 !important;">
                        <img src="{{ asset($category->category_icon) }}" alt="icon" style="width: 28px; height: 28px; min-width: 28px; margin-right: 10px; object-fit: contain; border-radius: 4px;" onerror="this.style.display='none'">
                        <span style="flex: 1; min-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $category->category_name }}</span>
                        <i class="fas fa-chevron-right ms-auto text-muted" style="font-size: 12px; min-width: 12px; margin-left: 8px;"></i>
                    </a>
                @empty
                @endforelse
            </div>
        </div>
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
