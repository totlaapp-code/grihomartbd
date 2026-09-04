<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> @yield('title') </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset(App\Models\Basicinfo::first()->logo)}}">
    <link rel="shortcut icon" type="image/png" href="{{asset(App\Models\Basicinfo::first()->logo)}}"/>
    {{-- link include --}}
    @include('backend.partials.links.css')

    @yield('subcss')
    <style>
        .scrollable-element {
          scrollbar-color: red yellow !important;
        }
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: red;
        }

        /* Fix profile dropdown — prevent white flicker on hover */
        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255,255,255,0.9);
        }
        .navbar-dark .navbar-nav .nav-link:hover,
        .navbar-dark .navbar-nav .nav-link:focus {
            color: #fff;
            background: transparent;
        }
        /* Sidebar toggler */
        .sidebar-toggler {
            color: rgba(255,255,255,0.85) !important;
        }
        .sidebar-toggler:hover {
            color: #fff !important;
        }
        /* Profile pill button */
        .profile-btn:hover {
            background: rgba(0,0,0,0.4) !important;
            border-color: rgba(255,255,255,0.3) !important;
        }
        /* Dark dropdown menu — override Bootstrap light hover */
        .admin-dropdown {
            background: #2d3748 !important;
        }
        .admin-dropdown .dropdown-item {
            color: #e2e8f0 !important;
            background: transparent !important;
            font-size: 14px;
        }
        .admin-dropdown .dropdown-item:hover,
        .admin-dropdown .dropdown-item:focus {
            background: rgba(255,255,255,0.1) !important;
            color: #fff !important;
        }
        .admin-dropdown .logout-item {
            color: #fc8181 !important;
        }
        .admin-dropdown .logout-item:hover {
            color: #fff !important;
            background: rgba(252,129,129,0.2) !important;
        }
        .admin-dropdown .dropdown-divider {
            border-color: #4a5568 !important;
        }

        /* Mobile Responsive Container & Spacing Optimization */
        @media (max-width: 768px) {
            /* Reduce global excessive container padding on mobile */
            .container-fluid.pt-4.px-4 {
                padding-top: 12px !important;
                padding-left: 8px !important;
                padding-right: 8px !important;
            }
            .bg-secondary.rounded.h-100.p-4,
            .bg-secondary.rounded.p-4 {
                padding: 14px 10px !important;
                border-radius: 10px !important;
            }
            .card-body {
                padding: 12px 10px !important;
            }
        }
    </style>
</head>

<body style="font-size:14px !important;">
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('backend.partials.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('backend.partials.header')
            <!-- Navbar End -->


            <!-- Sale & Revenue Start  main content-->
            @yield('maincontent')
            <!-- Widgets End -->


            <!-- Footer Start -->
            @include('backend.partials.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    {{-- js link includes --}}
    @include('backend.partials.links.js')

    @yield('subjs')

    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
</body>

</html>
