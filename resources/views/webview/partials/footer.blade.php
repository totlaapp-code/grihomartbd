<style>
    .line{
        height: 5px;
        width: 30px;
        background-color: white;
        margin-bottom: 15px;

    }
    .info_text{
        color: white;
    }

</style> 

<footer id="footer" class="p-0 footer color-bg">


    <div class="pt-4 footer-bottom">
        <div class="container">
            <div class="row">
                  <div class="col-12 col-md-3" id="left">
                    <div class="row">
                        <div class="col-12">
                            <div class="module-heading">
                                <h4 class="module-title">About</h4>
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.module-heading -->
                    <div class="row">
                        <div class="col-12">
                            <div class="module-body">
                                <p style="color: white">{{ $basicinfo->footer_text }} </p>

                            </div>
                        </div>
                    </div> 
                    <!-- /.module-body -->
                </div>
                
                 <!-- /.col -->
                <div class="col-12 col-md-3" id="left">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                        <div class="line"></div>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class="toggle-footer" style="font-size: 16px;">
                            <li class="media">
                                <small style="color: white; font-size: 16px;">Address:</small>
                                <div class="media-body" style="color: white;">
                                    {{$basicinfo->address}}
                                </div>
                            </li>
                            <div class="lineb"></div>

                            <li class="media">
                                <small style="color: white; font-size: 16px;">Phone:</small>
                                <div class="media-body" style="color: white;">
                                    <a href="tel:+88{{ $basicinfo->phone_one }}" style="color: white;">+(88) {{ $basicinfo->phone_one }}</a><br>
                                    <a href="tel:+88{{ $basicinfo->phone_two }}" style="color: white;">+(88) {{ $basicinfo->phone_two }}</a><br> 
                                     <a href="mailto:{{ $basicinfo->email }}" style="color: white;">Email:<br> {{ $basicinfo->email }}</a><br> 
                                </div>
                            </li>

                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-12 col-md-3" id="left">
                    <div class="module-heading">
                        <h4 class="module-title">Information</h4>
                        <div class="line"></div>
                    </div>

                    <div class="module-body">
                        <ul class='list-unstyled' style="font-size: 16px;">
                            <li class="first"><a class="info_text" title="Your Account" href="{{ url('venture/about_us') }}">About us</a></li>
                            <div class="lineb"></div>
                            <li><a class="info_text" href="{{ url('venture/contact_us') }}" title="Suppliers">Contact Us</a></li>
                            <div class="lineb"></div>
                            <li><a class="info_text" href="{{ url('venture/terms_codition') }}" title="Terms & Conditions">Terms & Conditions</a></li>
                            <div class="lineb"></div>
                            <li><a class="info_text" href="{{ url('venture/faq') }}" title="faq">FAQ</a></li> 

                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
               



                <div class="col-12 col-md-3" id="left">
                    <div class="module-heading">
                        <h4 class="module-title">LIKE US ON FACEBOOK</h4>
                        <div class="line"></div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 no-padding social" style="text-align: center;">
                            <ul class="mb-4 link d-flex justify-content-between">
                                <li class="fb pull-left" style="    margin-top: 4px;">
                                    <a target="_blank" rel="nofollow" href="{{ $basicinfo->facebook }}"
                                        title="Facebook"></a>
                                </li>
                                <li class="youtube pull-left" style="    margin-top: 4px;">
                                    <a target="_blank" rel="nofollow" href="{{ $basicinfo->youtube }}" title="Youtube"></a>
                                </li>
                                <li class="pull-left">
                                    <a target="_blank" href="{{ $basicinfo->linkedin }}" title="Instagram">
                                        <img src="{{asset('public/instagram.png')}}" style="width:43px;">
                                    </a>
                                </li>
                                <li class="pull-left">
                                    <a target="_blank" href="{{ $basicinfo->twitter }}" title="Google Maps">
                                        <img src="{{asset('public/google-maps.png')}}" style="width:40px;">
                                    </a>
                                </li>
                                <li class="pull-left">
                                    <a target="_blank" href="{{ $basicinfo->pinterest }}" title="Tiktok">
                                        <img src="{{asset('public/video.png')}}" style="width:40px;">
                                    </a>
                                </li>
                            </ul>
                             
                        </div>
                    </div>

                </div>
                <!-- /.col -->



            </div>
         <div class="pt-3 pb-2 row">

            <div class="col-12">
                <div class="module-heading">
                    <p class="text-center module-title" style="font-size: 12px;">Copyright © 2025 - {{ env('APP_NAME') }}.com</p>
                </div>
            </div>
            </div>

        </div>
    </div>


</footer>

