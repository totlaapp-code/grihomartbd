@if(config('services.facebook.pixel_id'))
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '{{ config('services.facebook.pixel_id') }}');
fbq('track', 'PageView');

@if(session()->has('fb_add_to_cart_event'))
@php $atc = session('fb_add_to_cart_event'); @endphp
if (typeof fbq !== 'undefined') {
    fbq('track', 'AddToCart', {
        content_name: "{{ $atc['name'] }}",
        content_ids: ["{{ $atc['product_id'] }}"],
        content_type: 'product',
        value: Number("{{ $atc['price'] }}"),
        currency: 'BDT'
    }, {
        eventID: "{{ $atc['eventId'] }}"
    });
}
@endif
</script>
<noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id={{ config('services.facebook.pixel_id') }}&ev=PageView&noscript=1"/></noscript>
<!-- End Facebook Pixel Code -->
@endif

{!! $basicinfo->google_analytics ?? '' !!}

@if(env('GTM_ID'))
    @php
        $gtmHost = env('GTM_SERVER_DOMAIN', 'www.googletagmanager.com');
        $gtmHost = preg_replace('/^https?:\/\//i', '', rtrim($gtmHost, '/'));
    @endphp
<!-- Google Tag Manager (Stape.io / sGTM & Web-GTM Compatible) -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://{{ $gtmHost }}/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','{{ env("GTM_ID") }}');</script>
<!-- End Google Tag Manager -->
@endif

@if(env('GA_ID'))
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GA_ID') }}"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', '{{ env("GA_ID") }}');
</script>
@endif
