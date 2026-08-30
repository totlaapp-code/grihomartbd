

{{--
  TRACKING — GTM + stape.io sGTM
  GA4: GTM-এর ভেতরে GA4 tag আছে, আলাদা gtag.js লাগে না।
  FB Pixel: fbq('init') শুধু — বাকি সব GTM Partner Integration + sGTM।
--}}

@if(env('GTM_ID'))
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','{{ env("GTM_ID") }}');</script>
<!-- End Google Tag Manager -->
@endif

{{-- GA4: GTM-এর ভেতরে GA4 tag handle করছে। আলাদা gtag.js দরকার নেই। --}}

{{-- FACEBOOK PIXEL — fbq('init') only. GTM Partner Integration + sGTM handles all events. --}}
@if(config('services.facebook.pixel_id'))
<!-- Facebook Pixel Code (browser) — dedup via eventID with sGTM CAPI -->
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
{{-- All events handled by GTM Partner Integration + sGTM. No manual fbq() needed. --}}
</script>
<!-- End Facebook Pixel Code -->
@endif

{{-- Legacy google_analytics field (DB) --}}
{!! $basicinfo->google_analytics ?? '' !!}

