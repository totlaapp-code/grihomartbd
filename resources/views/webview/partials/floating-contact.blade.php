{{-- Floating Contact Buttons --}}
<div id="message" style="display:none;">
    {{-- Messenger --}}
    <a href="{{ $basicinfo->messanger ?? '#' }}" target="_blank"
        class="position-fixed rounded-circle shadow text-white text-decoration-none d-flex align-items-center justify-content-center"
        style="bottom:245px; right:14px; width:46px; height:46px; background:#0084FF; z-index:1111;"
        title="Messenger">
        <i class="fa-brands fa-facebook-messenger fs-5"></i>
    </a>
    {{-- Call --}}
    <a href="tel:+88{{ $basicinfo->wp_1 ?? '' }}"
        class="position-fixed rounded-circle shadow text-white text-decoration-none d-flex align-items-center justify-content-center"
        style="bottom:185px; right:14px; width:46px; height:46px; background:#0288d1; z-index:1111;"
        title="Call Us">
        <i class="fa-solid fa-phone fs-5"></i>
    </a>
    {{-- WhatsApp --}}
    <a href="https://wa.me/+88{{ $basicinfo->wp_1 ?? '' }}?text=I%20am%20interested" target="_blank"
        class="position-fixed rounded-circle shadow text-white text-decoration-none d-flex align-items-center justify-content-center"
        style="bottom:125px; right:14px; width:46px; height:46px; background:#25D366; z-index:1111;"
        title="WhatsApp">
        <i class="fa-brands fa-whatsapp fs-4"></i>
    </a>
</div>

{{-- Open Button (headset) - shown by default --}}
<a href="javascript:void(0);" onclick="showmessage()" id="showm"
    class="position-fixed rounded-circle shadow text-white text-decoration-none"
    style="bottom:60px; right:14px; width:50px; height:50px; background:#e91e63; z-index:1111; display:flex; align-items:center; justify-content:center;"
    title="Contact Options">
    <i class="fa-solid fa-headset fs-5" id="shimg"></i>
</a>

{{-- Close Button - hidden by default --}}
<a href="javascript:void(0);" onclick="hidemessage()" id="crossm"
    class="position-fixed rounded-circle shadow text-white text-decoration-none"
    style="bottom:60px; right:14px; width:50px; height:50px; background:#444; z-index:1111; display:none; align-items:center; justify-content:center;"
    title="Close">
    <i class="fa-solid fa-xmark fs-5" id="crimg"></i>
</a>
