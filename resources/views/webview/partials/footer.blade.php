<style>
    /* ==============================================
       HEADER-MATCHING MODERN LIGHT FOOTER STYLING
       ============================================== */
    .pro-footer {
        background-color: #ffffff;
        color: #475569;
        font-size: 14px;
        border-top: 3px solid var(--color-primary);
        position: relative;
    }
    
    /* Top Features Highlight Bar */
    .pro-footer-features {
        background-color: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        padding: 20px 0;
    }
    .pro-feature-item {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .pro-feature-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #ffffff;
        color: var(--color-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
    }
    .pro-feature-title {
        font-weight: 700;
        color: #1e293b;
        font-size: 14px;
        margin: 0;
    }
    .pro-feature-desc {
        font-size: 12px;
        color: #64748b;
        margin: 0;
    }

    /* Footer Main Body */
    .pro-footer-main {
        padding: 38px 0 20px 0;
        background-color: #ffffff;
    }
    .pro-footer-title {
        color: #1e293b;
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 16px;
        position: relative;
        display: inline-block;
    }
    .pro-footer-title::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 32px;
        height: 3px;
        background: var(--color-primary);
        border-radius: 2px;
    }
    
    .pro-footer-text {
        line-height: 1.6;
        color: #475569;
        font-size: 13.5px;
    }

    .pro-footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .pro-footer-links li {
        margin-bottom: 10px;
    }
    .pro-footer-links a {
        color: #475569;
        text-decoration: none;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 500;
    }
    .pro-footer-links a:hover {
        color: var(--color-primary);
        transform: translateX(4px);
    }
    .pro-footer-links a i {
        font-size: 11px;
        color: var(--color-primary);
    }

    /* Contact Details */
    .pro-contact-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .pro-contact-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 14px;
        color: #475569;
    }
    .pro-contact-icon {
        color: #ffffff;
        background-color: var(--color-primary);
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        flex-shrink: 0;
        margin-top: 2px;
    }
    .pro-contact-item a {
        color: #475569;
        text-decoration: none;
        transition: color 0.2s ease;
    }
    .pro-contact-item a:hover {
        color: var(--color-primary);
    }

    /* Social Buttons */
    .pro-social-btns {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .pro-social-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #f1f5f9;
        color: #1e293b;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        text-decoration: none !important;
        transition: all 0.25s ease;
        border: 1px solid #e2e8f0;
    }
    .pro-social-btn:hover {
        background: var(--color-primary);
        color: #ffffff;
        transform: translateY(-3px);
        border-color: var(--color-primary);
        box-shadow: 0 4px 10px rgba(118, 184, 42, 0.25);
    }

    /* Copyright Bar */
    .pro-footer-bottom {
        background: var(--color-header-bg);
        color: #ffffff;
        padding: 14px 0;
        font-size: 13.5px;
        font-weight: 500;
    }
    .pro-footer-bottom p, .pro-footer-bottom span {
        color: #ffffff !important;
    }
    
    /* Mobile Fixed Bottom Nav Gap */
    @media (max-width: 991px) {
        .pro-footer-bottom {
            padding-bottom: 70px !important; /* Space for sticky mobile bottom nav */
        }
        .pro-footer-main {
            padding: 25px 0 10px 0;
        }
        .pro-footer-col {
            margin-bottom: 22px;
        }
    }
</style>

<footer class="pro-footer">
    <!-- Top Highlights / Features Bar -->
    <div class="pro-footer-features">
        <div class="container-fluid px-2 px-lg-4">
            <div class="row g-3">
                <div class="col-6 col-md-3">
                    <div class="pro-feature-item">
                        <div class="pro-feature-icon">
                            <i class="fa-solid fa-truck-fast"></i>
                        </div>
                        <div>
                            <h6 class="pro-feature-title">Fast Delivery</h6>
                            <p class="pro-feature-desc">All over Bangladesh</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="pro-feature-item">
                        <div class="pro-feature-icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <div>
                            <h6 class="pro-feature-title">100% Authentic</h6>
                            <p class="pro-feature-desc">Quality Guaranteed</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="pro-feature-item">
                        <div class="pro-feature-icon">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <div>
                            <h6 class="pro-feature-title">Cash On Delivery</h6>
                            <p class="pro-feature-desc">Pay After Checking</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="pro-feature-item">
                        <div class="pro-feature-icon">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <div>
                            <h6 class="pro-feature-title">Customer Support</h6>
                            <p class="pro-feature-desc">Dedicated Helpline</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Footer Body -->
    <div class="pro-footer-main">
        <div class="container-fluid px-2 px-lg-4">
            <div class="row g-4">
                <!-- About Column -->
                <div class="col-12 col-md-6 col-lg-4 pro-footer-col">
                    <div class="mb-3">
                        @if(!empty($basicinfo->logo))
                            <img src="{{ asset($basicinfo->logo) }}" alt="{{ env('APP_NAME') }}" style="max-height: 48px; width: auto; object-fit: contain;">
                        @else
                            <h4 class="fw-bold m-0" style="color: var(--color-primary);">{{ env('APP_NAME') }}</h4>
                        @endif
                    </div>
                    <p class="pro-footer-text pe-lg-3">
                        {{ $basicinfo->footer_text }}
                    </p>
                    <!-- Social Links -->
                    <div class="mt-3">
                        <h6 class="fw-bold mb-2" style="font-size: 13px; color: #1e293b;">Follow Us:</h6>
                        <div class="pro-social-btns">
                            @if(!empty($basicinfo->facebook))
                                <a href="{{ $basicinfo->facebook }}" target="_blank" class="pro-social-btn" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                            @endif
                            @if(!empty($basicinfo->youtube))
                                <a href="{{ $basicinfo->youtube }}" target="_blank" class="pro-social-btn" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                            @endif
                            @if(!empty($basicinfo->linkedin))
                                <a href="{{ $basicinfo->linkedin }}" target="_blank" class="pro-social-btn" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                            @endif
                            @if(!empty($basicinfo->twitter))
                                <a href="{{ $basicinfo->twitter }}" target="_blank" class="pro-social-btn" title="Location"><i class="fa-solid fa-location-dot"></i></a>
                            @endif
                            @if(!empty($basicinfo->pinterest))
                                <a href="{{ $basicinfo->pinterest }}" target="_blank" class="pro-social-btn" title="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Contact Info Column -->
                <div class="col-12 col-md-6 col-lg-4 pro-footer-col">
                    <h5 class="pro-footer-title">Contact Details</h5>
                    <ul class="pro-contact-list">
                        @if(!empty($basicinfo->address))
                            <li class="pro-contact-item">
                                <span class="pro-contact-icon"><i class="fa-solid fa-location-dot"></i></span>
                                <div>
                                    <strong class="d-block mb-1" style="font-size: 13px; color: #1e293b;">Address:</strong>
                                    <span>{{ $basicinfo->address }}</span>
                                </div>
                            </li>
                        @endif
                        @if(!empty($basicinfo->phone_one) || !empty($basicinfo->phone_two))
                            <li class="pro-contact-item">
                                <span class="pro-contact-icon"><i class="fa-solid fa-phone"></i></span>
                                <div>
                                    <strong class="d-block mb-1" style="font-size: 13px; color: #1e293b;">Phone:</strong>
                                    @if(!empty($basicinfo->phone_one))
                                        <a href="tel:+88{{ $basicinfo->phone_one }}" class="d-block">+(88) {{ $basicinfo->phone_one }}</a>
                                    @endif
                                    @if(!empty($basicinfo->phone_two))
                                        <a href="tel:+88{{ $basicinfo->phone_two }}" class="d-block">+(88) {{ $basicinfo->phone_two }}</a>
                                    @endif
                                </div>
                            </li>
                        @endif
                        @if(!empty($basicinfo->email))
                            <li class="pro-contact-item">
                                <span class="pro-contact-icon"><i class="fa-solid fa-envelope"></i></span>
                                <div>
                                    <strong class="d-block mb-1" style="font-size: 13px; color: #1e293b;">Email:</strong>
                                    <a href="mailto:{{ $basicinfo->email }}">{{ $basicinfo->email }}</a>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>

                <!-- Quick Information Links Column -->
                <div class="col-12 col-md-6 col-lg-4 pro-footer-col">
                    <h5 class="pro-footer-title">Information Links</h5>
                    <ul class="pro-footer-links">
                        <li><a href="{{ url('venture/about_us') }}"><i class="fa-solid fa-chevron-right"></i> About Us</a></li>
                        <li><a href="{{ url('venture/contact_us') }}"><i class="fa-solid fa-chevron-right"></i> Contact Us</a></li>
                        <li><a href="{{ url('venture/terms_codition') }}"><i class="fa-solid fa-chevron-right"></i> Terms & Conditions</a></li>
                        <li><a href="{{ url('venture/faq') }}"><i class="fa-solid fa-chevron-right"></i> Frequently Asked Questions (FAQ)</a></li>
                        <li><a href="{{ url('track-order') }}"><i class="fa-solid fa-chevron-right"></i> Track Your Order</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Copyright Bar -->
    <div class="pro-footer-bottom text-center">
        <div class="container-fluid px-2 px-lg-4">
            <div class="row align-items-center">
                <div class="col-12">
                    <p class="m-0">Copyright © {{ date('Y') }} - <span class="fw-bold">{{ env('APP_NAME') }}</span>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
