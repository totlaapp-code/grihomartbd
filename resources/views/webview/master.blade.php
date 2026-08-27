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
    <link rel="stylesheet" href="{{ asset('public/frontend/css/custom-style.css') }}">
    @yield('subhead')

    @include('webview.partials.tracking')
</head>

<body class="main-body">
 
   @if(env('GTM_ID'))
       @php
           $gtmHost = env('GTM_SERVER_DOMAIN', 'www.googletagmanager.com');
           $gtmHost = preg_replace('/^https?:\/\//i', '', rtrim($gtmHost, '/'));
       @endphp
   <!-- Google Tag Manager (noscript - Stape.io sGTM Ready) -->
   <noscript><iframe src="https://{{ $gtmHost }}/ns.html?id={{ env('GTM_ID') }}"
   height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
   <!-- End Google Tag Manager (noscript) -->
   @endif

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
   
    <!-- Mobile Navigation -->
    @include('webview.partials.mobile-nav')

    <!--Footer Js-->
    @include('webview.partials.links.footer')

    @yield('subfooter')

    <!-- Floating Contact Icons -->
    @include('webview.partials.floating-contact')

    <!-- Modals & Cart Count -->
    @include('webview.partials.modals')

    {{-- csrf --}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    {!!$basicinfo->chat_box!!}

    <script src="{{ asset('public/frontend/js/custom-scripts.js') }}"></script>
</body>

</html>
