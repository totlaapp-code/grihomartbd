@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Best online shop in Bangladesh
@endsection

@section('meta')
    <meta name="description" content="Online shopping in Bangladesh for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta name="keywords" content="{{env('APP_NAME')}}, online store bd, online shop bd, Organic fruits, Thai, UK, Korea, China, cosmetics, Jewellery, bags, dress, mobile, accessories, automation Products,">


    <meta itemprop="name" content="Best Online Shopping in Bangladesh | {{env('APP_NAME')}}">
    <meta itemprop="description" content="Best online shopping in Bangladesh for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta itemprop="image" content="{{env('APP_URL')}}public/rankone1.avif">

    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Best Online Shopping in Bangladesh | {{env('APP_NAME')}}">
    <meta property="og:description" content="Online shopping in BD for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta property="og:image" content="{{env('APP_URL')}}public/rankone1.avif">
    <meta property="image" content="{{env('APP_URL')}}public/rankone1.avif" />
    <meta property="url" content="{{env('APP_URL')}}">
    <meta itemprop="image" content="{{env('APP_URL')}}public/rankone1.avif">
    <meta property="twitter:card" content="{{env('APP_URL')}}public/rankone1.avif" />
    <meta property="twitter:title" content="Best Online Shopping in Bangladesh | {{env('APP_NAME')}}" />
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta name="twitter:image" content="{{env('APP_URL')}}public/rankone1.avif">
@endsection
<style>
    .product{
            margin-top: 4px !important;
    }

    /* Product Grid Equal Height Fix */
    .product_item_inner {
        height: 100%;
        display: flex;
        flex-direction: column;
        background: #fff;
        border: 1px solid #eee;
        padding-bottom: 10px;
        position: relative;
    }
    .product-text {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        padding: 10px !important;
    }
    .pro_name {
        height: 44px; /* Fixed height for 2 lines */
        overflow: hidden;
        margin-bottom: 5px;
    }
    .pro_name a {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 22px;
        font-weight: 500;
        color: #333;
    }

    #featureimagess{
        width: 100%;
        padding: 0px;
        padding-top: 0;
        /*max-height:200px;*/
    }
    #checked {
        color: orange;
    }
    .side-menu .nav > li > a::after {
        right: 15px !important;
    }

    /* Equal height fix for category boxes */
    .cat-row {
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
    }
    .cat-row > div {
        display: flex;
    }
    .cat_item {
        width: 100%;
    }

    /* Mobile: smaller icons */
    @media (max-width: 768px) {
        #catimg {
            width: 55px !important;
            height: 55px !important;
            object-fit: contain;
        }
    }
</style>

<style>
    /* Modern Hero Slider Styling & Instant Render (No delay on reload) */
    #slider.owl-carousel {
        display: block !important;
    }
    #slider.owl-carousel:not(.owl-loaded) .hero-slider-item:not(:first-child) {
        display: none !important;
    }
    .hero-slider-item {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
    }
    .hero-slider-item img {
        width: 100%;
        height: auto;
        max-height: 420px;
        object-fit: cover;
        border-radius: 8px;
        display: block;
    }
    @media (max-width: 768px) {
        .hero-slider-item {
            border-radius: 6px;
        }
        .hero-slider-item img {
            max-height: 180px;
            border-radius: 6px;
        }
    }

    /* Modern Category Card Styling */
    .cat-grid-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        padding: 6px 0;
    }
    .cat-grid-item {
        flex: 1 1 calc(16.666667% - 10px);
        max-width: calc(16.666667% - 10px);
    }
    @media (max-width: 992px) {
        .cat-grid-item {
            flex: 1 1 calc(25% - 9px);
            max-width: calc(25% - 9px);
        }
    }
    .cat-circle-card {
        background: #ffffff;
        border: 1px solid #f1f5f9;
        border-radius: 12px;
        padding: 14px 8px;
        text-align: center;
        transition: all 0.25s ease;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        text-decoration: none !important;
    }
    .cat-circle-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(118, 184, 42, 0.18);
        border-color: #76b82a;
    }
    .cat-icon-wrapper {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 6px;
        transition: background 0.25s ease;
    }
    .cat-circle-card:hover .cat-icon-wrapper {
        background: #eef8e3;
    }
    .cat-icon-wrapper img {
        width: 32px;
        height: 32px;
        object-fit: contain;
    }
    .cat-card-title {
        font-size: 12px;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        line-height: 1.2;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        word-break: break-word;
    }

    /* Mobile: 2-Row Horizontal Swipe Layout (Shopee/Daraz Style) */
    @media (max-width: 768px) {
        .cat-container-mobile {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        .cat-grid-wrapper {
            display: grid;
            grid-template-rows: repeat(2, 1fr);
            grid-auto-flow: column;
            grid-auto-columns: calc(25% - 6px);
            gap: 8px;
            overflow-x: auto;
            overflow-y: hidden;
            padding: 6px 12px 10px 12px;
            margin: 0;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }
        .cat-grid-wrapper::-webkit-scrollbar {
            display: none;
        }
        .cat-grid-item {
            padding: 0;
            flex: none;
            max-width: none;
            scroll-snap-align: start;
        }
        .cat-circle-card {
            padding: 8px 4px;
            border-radius: 10px;
        }
        .cat-icon-wrapper {
            width: 44px;
            height: 44px;
            margin-bottom: 4px;
        }
        .cat-icon-wrapper img {
            width: 26px;
            height: 26px;
        }
        .cat-card-title {
            font-size: 11px;
            font-weight: 600;
        }
    }
</style>

<!-- Full-Width Hero Slider -->
<div class="container-fluid px-2 px-lg-4 pt-2" style="overflow: hidden;">
    <div class="row m-0">
        <div class="col-12 p-0">
            <div class="owl-carousel owl-theme" id="slider">
                @forelse ($sliders as $slider)
                    <div class="hero-slider-item" style="margin: 0 !important;">
                        <a href="{{ $slider->slider_btn_link }}">
                            <img src="{{ asset($slider->slider_image) }}" alt="Slider Image" @if($loop->first) loading="eager" fetchpriority="high" @endif>
                        </a>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Modern Circular Categories Grid (2-Row Horizontal Swipe on Mobile) -->
<div class="container-fluid px-2 px-lg-4 py-2 cat-container-mobile">
    <div class="cat-grid-wrapper">
        @forelse ($categories as $category)
            <div class="cat-grid-item">
                <a href="{{ url('products/category/' . $category->slug) }}" class="cat-circle-card">
                    <div class="cat-icon-wrapper">
                        <img src="{{ asset($category->category_icon) }}" alt="{{ $category->category_name }}">
                    </div>
                    <p class="cat-card-title">{{ \Illuminate\Support\Str::limit($category->category_name, 16) }}</p>
                </a>
            </div>
        @empty
        @endforelse
    </div>
</div>


<!-- Promotional Products -->
<div class="container-fluid px-2 px-lg-4 pb-2">
    @if(count($topproducts)>0) 
        <div class="pb-2 bg-white row m-0 rounded-3 shadow-sm">
            <div class="col-12" style="padding-left: 0;display: flex;justify-content: space-between;">
                <div class="px-2 pt-0 p-md-3 d-flex justify-content-between" style="padding-bottom:4px !important;padding-top: 8px !important;">
                    <h4 class="m-0"><b>Promotional Offers</b></h4>
                </div>
            </div>
            <div class="col-12 px-1">
                <div class="owl-carousel " id="promotionalofferSlide">
                    @forelse ($topproducts as $promotional)
                        @php
                            $firstpro = $promotional->firstpro;
                            $dis = $promotional->discount_percent;
                        @endphp
                        @if(isset($firstpro))
                            <div class="item" id="featuredproduct">
                                <div class="product-micro-row">
                                     <div class="product_item_inner"> 
                                        <div class="product-image">
                                            <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                                                <img src="{{ asset($promotional->ProductImage) }}">
                                            </a>
                                        </div>
                                        <span style="position: absolute;top: 0;background: green;width: 50px;color: white;border-radius: 4px;font-weight: bold;font-size: 12px;">&nbsp;{{$dis}}% off</span>
                                        <!-- /.product-image -->
                             
                                        <div class="product-text" style="background: white;">
                                            <div class="pro_name">
                                             <a href="{{ url('view-product/' . $promotional->ProductSlug) }}" id="f_pro_name">{{ \Illuminate\Support\Str::limit($promotional->ProductName, 100) }}</a>
                                            </div>
                                             
                                            <div class="d-flex my-2" style="justify-content:center">
                                                <div class="star" style="padding-top: 5px;">
                                                    <span style="font-weight: bold;color:black;font-size:10px">({{ $promotional->review_count }})</span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                     
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                @if(isset($firstpro->sizes[0]))
                                                    <del class="old-product-price strong-400" style="color:red">৳
                                                    {{ round($firstpro->sizes[0]->RegularPrice) }}</del>
                                                <span
                                                    class="product-price strong-600" style="color:black">৳ {{ round($firstpro->sizes[0]->SalePrice) }}</span>
                                                @endif
                                            </div>
                                            
                                        </div>
                                         
                                  </div>
                                </div>
                                <!-- /.product-micro-row -->
                                    
                            </div>
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>
            
            <div class="text-center">
                 <a href="{{ url('promotional/products') }}" class="mb-0 btn btn-sm text-center" style="padding: 3px 8px;height: 26px;color: white;font-weight: bold;margin-top:9px;font-size:15px;background: #94DC10;border: 1px solid #94DC10;">VIEW ALL</a>
            </div>
        </div> 
    @else
    @endif 
    
    @if(count($bestSelleingProducts)>0)
        <div class="pb-2 bg-white row m-0 my-3 rounded-3 shadow-sm">
            <div class="col-12" style="padding-left: 0;display: flex;justify-content: space-between;">
                <div class="px-2 pt-0 p-md-3 d-flex justify-content-between" style="padding-bottom:4px !important;padding-top: 8px !important;">
                    <h4 class="m-0"><b>Best Selling</b></h4>
                </div>
            </div>
            <div class="col-12 px-1">
                <div class="owl-carousel " id="bestSellingSlide">
                    @forelse ($bestSelleingProducts as $promotional)
                        @php
                            $firstpro = $promotional->firstpro;
                            $dis = $promotional->discount_percent;
                        @endphp
                        @if(isset($firstpro))
                            <div class="item" id="featuredproduct">
                                <div class="product-micro-row">
                                     <div class="product_item_inner"> 
                                        
                                        <div class="product-image">
                                            <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                                                <img src="{{ asset($promotional->ProductImage) }}">
                                            </a>
                                        </div>
                                        <span style="position: absolute;top: 0;background: green;width: 50px;color: white;border-radius: 4px;font-weight: bold;font-size: 12px;">&nbsp;{{$dis}}% off</span>
                                        <!-- /.product-image -->
                             
                                        <div class="product-text" style="background: white;">
                                            <div class="pro_name">
                                             <a href="{{ url('view-product/' . $promotional->ProductSlug) }}" id="f_pro_name">{{ \Illuminate\Support\Str::limit($promotional->ProductName, 100) }}</a>
                                            </div>
                                             
                                            <div class="d-flex my-2" style="justify-content:center">
                                                <div class="star" style="padding-top: 5px;">
                                                    <span style="font-weight: bold;color:black;font-size:10px">({{ $promotional->review_count }})</span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                     
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                @if(isset($firstpro->sizes[0]))
                                                    <del class="old-product-price strong-400" style="color:red">৳
                                                    {{ round($firstpro->sizes[0]->RegularPrice) }}</del>
                                                <span
                                                    class="product-price strong-600" style="color:black">৳ {{ round($firstpro->sizes[0]->SalePrice) }}</span>
                                                @endif
                                            </div>
                                            
                                        </div>
                                         
                                  </div>
                                </div>
                                <!-- /.product-micro-row -->
                                    
                            </div>
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>
            
            <div class="text-center">
                 <a href="{{ url('promotional/products') }}" class="mb-0 btn btn-sm text-center" style="padding: 3px 8px;height: 26px;color: white;font-weight: bold;margin-top:9px;font-size:15px;background: #94DC10;border: 1px solid #94DC10;">VIEW ALL</a>
            </div>
        </div> 
    @else
    @endif 

    <div class="row m-0 gutters-10 px-lg-0">
        @if (count($adds) == '2')
            @forelse ($adds as $add)
                <div class="col-lg-6 col-6 ps-lg-0">
                    <div class="mb-1 media-banner mb-lg-0">
                        <a href="{{ $add->add_link }}" target="_blank" class="banner-container">
                            <img src="{{ asset($add->add_image) }}" alt="{{ env('APP_NAME') }}"
                                class="img-fluid ls-is-cached lazyloaded">
                        </a>
                    </div>
                </div>
            @empty
            @endforelse
        @else
            @forelse ($adds as $add)
                <div class="col-lg-12 col-12 ps-0">
                    <div class="mb-1 media-banner mb-lg-0">
                        <a href="{{ $add->add_link }}" target="_blank" class="banner-container">
                            <img src="{{ asset($add->add_image) }}" alt="{{ env('APP_NAME') }}"
                                class="img-fluid ls-is-cached lazyloaded">
                        </a>
                    </div>
                </div>
            @empty
            @endforelse
        @endif
    </div>
 
    @forelse ($categoryproducts as $key=>$categoryproduct)
        @if (count($categoryproduct->mainproducts) > 0)
                <div class="pb-3 bg-white row m-0 my-3 rounded-3 shadow-sm" style="overflow: hidden;">
                    <div class="col-12" style="padding-left: 0;display: flex;justify-content: space-between;">
                        <div class="px-2 pt-0 p-md-3 d-flex justify-content-between" style="padding-bottom:4px !important;padding-top: 8px !important;">
                            <h4 class="m-0"><b>{{ $categoryproduct->category_name }}</b></h4>
                        </div>
                    </div>
    
                    @forelse ($categoryproduct->mainproducts as $product)
                        @php
                            $firstcatepro = $product->firstpro;
                            $dis = $product->discount_percent;
                        @endphp
                        @if(isset($firstcatepro))
                            <div class="my-1 px-1 col-6 col-md-4 col-lg-2">
                                <div class="product-micro-row">
                                     <div class="product_item_inner">
                                       
                                        <div class="product-image">
                                            <a href="{{ url('view-product/' . $product->ProductSlug) }}">
                                                <img src="{{ asset($product->ProductImage) }}">
                                            </a>
                                        </div>
                                        <span style="position: absolute;top: 0;background: green;width: 50px;color: white;border-radius: 4px;font-weight: bold;font-size: 12px;">&nbsp;{{$dis}}% off</span>
                                        <!-- /.product-image -->
                                                              <div class="product-text" style="background: white;">
                                            <div class="pro_name">
                                             <a href="{{ url('view-product/' . $product->ProductSlug) }}" id="f_pro_name">{{ \Illuminate\Support\Str::limit($product->ProductName, 100) }}</a>
                                            </div>
                                             
                                            <div class="d-flex my-2" style="justify-content:center">
                                                <div class="star" style="padding-top: 5px;">
                                                    <span style="font-weight: bold;color:black;font-size:10px">({{ $product->review_count }})</span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                     
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                @if(isset($firstcatepro->sizes[0]))
                                                    <del class="old-product-price strong-400" style="color:red">৳
                                                        {{ round($firstcatepro->sizes[0]->RegularPrice) }}</del>
                                                    <span  class="product-price strong-600" style="color:black">৳ {{ round($firstcatepro->sizes[0]->SalePrice) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                    @endforelse
    
                <div class="text-center">
                     <a href="{{url('products/category/'.$categoryproduct->slug)}}" class="mb-0 btn btn-sm text-center" style="padding: 3px 8px;height: 26px;color: white;font-weight: bold;margin-top:9px;font-size:15px;background: #94DC10;border: 1px solid #94DC10;">VIEW ALL</a>
                </div>
              
                </div>
            
        @else
        @endif
    
    @empty
    @endforelse

    <div class="row m-0 gutters-10 px-lg-0">
        @if (count($addbottoms) == '2')
            @forelse ($addbottoms as $add)
                <div class="col-lg-6 col-6 ps-lg-0">
                    <div class="mb-1 media-banner mb-lg-0">
                        <a href="{{ $add->add_link }}" target="_blank" class="banner-container">
                            <img src="{{ asset($add->add_image) }}" alt="{{ env('APP_NAME') }}"
                                class="img-fluid ls-is-cached lazyloaded">
                        </a>
                    </div>
                </div>
            @empty
            @endforelse
        @else
            @forelse ($addbottoms as $add)
                <div class="col-lg-12 col-12 pr-lg-0">
                    <div class="mb-1 media-banner mb-lg-0">
                        <a href="{{ $add->add_link }}" target="_blank" class="banner-container">
                            <img src="{{ asset($add->add_image) }}" alt="{{ env('APP_NAME') }}"
                                class="img-fluid ls-is-cached lazyloaded">
                        </a>
                    </div>
                </div>
            @empty
            @endforelse
        @endif 
        
    </div>
</div>

@if($medias->count() > 0)
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="container p-0">
                    <div class="row pt-2 pb-2">
                        <div class="px-2 p-md-3 pt-0" style="padding-bottom:4px !important;padding-top: 8px !important;">
                            <h4 class="m-0" style="text-align: center;padding-bottom: 12px;font-size: 30px;"><b>{{ env('APP_NAME') }} Multimedia</b></h4>
                        </div>
                        @forelse ($medias as $media)
                            <div class="col-6 col-md-3 col-lg-3 mb-4">
                                <iframe width="100%"
                                    src="https://www.youtube.com/embed/{{ $media->menu_banner }}">
                                </iframe>
                            </div>
                        @empty
                            <h2 class="p-4 text-center"><b>No media found...</b></h2>
                        @endforelse
                    </div>

                </div>

            </div>
            <!-- /.col -->
        </div>
    </div>
@endif
    <!-- /.container -->

@if (Auth::id())
    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
@else
    <input type="hidden" name="user_id" id="user_id" >
@endif

@if (Auth::id())
    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
@else
    <input type="hidden" name="user_id" id="user_id" >
@endif

<script>
    function givereactlike(id) {
        $.ajax({
            type: 'GET',
            url: '{{ url('give/react/') }}'+'/like',
            data: {
                'user_id': $('#user_id').val(),
                'product_id': id,
            },

            success: function(data) {
                if (data.sigment == 'like') {
                    $('#promotionalofferSlide #likereactof' + id).text(data.total);
                    $('#promotionalofferSlide #likereactdone' + id).css('color', 'green');
                    $('#propro #likereactof' + id).text(data.total);
                    $('#propro #likereactdone' + id).css('color', 'green');
                }else if (data.sigment == 'unlike') {
                    $('#promotionalofferSlide #likereactof' + id).text(data.total);
                    $('#promotionalofferSlide #likereactdone' + id).css('color', 'black');
                    $('#propro #likereactof' + id).text(data.total);
                    $('#propro #likereactdone' + id).css('color', 'black');
                }else {

                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    function givereactlove(id) {
        $.ajax({
            type: 'GET',
            url: '{{ url('give/react/') }}'+'/love',
            data: {
                'user_id': $('#user_id').val(),
                'product_id': id,
            },

            success: function(data) {
                if (data.sigment == 'love') {
                    $('#promotionalofferSlide #lovereactof' + id).text(data.total);
                    $('#promotionalofferSlide #lovereactdone' + id).css('color', 'red');
                    $('#propro #lovereactof' + id).text(data.total);
                    $('#propro #lovereactdone' + id).css('color', 'red');
                } else {
                    $('#promotionalofferSlide #lovereactof' + id).text(data.total);
                    $('#promotionalofferSlide #lovereactdone' + id).css('color', 'black');
                    $('#propro #lovereactof' + id).text(data.total);
                    $('#propro #lovereactdone' + id).css('color', 'black');
                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }
</script>
@endsection
