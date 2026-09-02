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

    /* ── Professional Banner: max-height like Daraz / Shopify ── */
    .hero-slider-item {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        width: 100%;
        /* Clamp height: never taller than 480px on desktop */
        max-height: 480px;
    }
    .hero-slider-item img {
        width: 100%;
        height: 100%;
        max-height: 480px;
        display: block;
        border-radius: 8px;
        /* Fill the capped height, crop sides if needed (standard ecom behavior) */
        object-fit: cover;
        object-position: center;
    }

    /* Tablet: slightly smaller */
    @media (max-width: 992px) {
        .hero-slider-item,
        .hero-slider-item img {
            max-height: 380px;
        }
    }

    /* Mobile: image fills width, natural height preserved (no crop) */
    @media (max-width: 576px) {
        .hero-slider-item,
        .hero-slider-item img {
            max-height: none;
            height: auto;
            border-radius: 4px;
            object-fit: fill; /* show full image on mobile, no crop */
        }
    }


    /* ── Category Section ── */
    .cat-section-below {
        background: #ffffff;
        border-radius: 18px;
        box-shadow: 0 2px 16px rgba(0,0,0,0.07);
        padding: 24px 20px 20px;
    }
    .cat-section-below .cat-grid-wrapper {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 6px;
    }
    /* Hide items after 12th on large screen */
    .cat-section-below .cat-grid-item:nth-child(n+13) {
        display: none;
    }
    .cat-section-below .cat-grid-item {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .cat-section-below .cat-circle-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-decoration: none !important;
        transition: all 0.22s ease;
        width: 100%;
        padding: 14px 8px 12px;
        background: transparent;
        border: none;
        border-radius: 14px;
    }
    .cat-section-below .cat-circle-card:hover {
        background: #f8f4ff;
        transform: translateY(-4px);
        box-shadow: 0 6px 20px rgba(100,60,200,0.08);
    }
    .cat-section-below .cat-icon-wrapper {
        width: 90px;
        height: 90px;
        background: transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
        transition: transform 0.22s ease;
        flex-shrink: 0;
    }
    .cat-section-below .cat-circle-card:hover .cat-icon-wrapper {
        transform: scale(1.08);
    }
    .cat-section-below .cat-icon-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    .cat-section-below .cat-card-title {
        font-size: 12px;
        font-weight: 600;
        color: #1e293b;
        text-align: center;
        line-height: 1.35;
        margin: 0;
        word-break: break-word;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        width: 100%;
    }
    /* Tablet: 6 per row */
    @media (max-width: 992px) {
        .cat-section-below .cat-grid-wrapper {
            grid-template-columns: repeat(6, 1fr);
            gap: 8px;
        }
        .cat-section-below .cat-grid-item:nth-child(n+13) {
            display: flex;
        }
        .cat-section-below .cat-icon-wrapper {
            width: 70px;
            height: 70px;
            margin-bottom: 8px;
        }
    }
    /* Mobile: 3 per row (2 rows = 6 visible), rest hidden */
    @media (max-width: 576px) {
        .cat-section-below {
            border-radius: 14px;
            padding: 14px 10px 14px;
        }
        .cat-section-below .cat-grid-wrapper {
            grid-template-columns: repeat(3, 1fr);
            gap: 12px 8px;
        }
        .cat-section-below .cat-grid-item {
            padding: 0;
        }
        /* Hide items after 6th on mobile */
        .cat-section-below .cat-grid-item:nth-child(n+7) {
            display: none;
        }
        .cat-section-below .cat-circle-card {
            padding: 8px 4px 10px;
            border-radius: 12px;
        }
        .cat-section-below .cat-icon-wrapper {
            width: 70px;
            height: 70px;
            margin-bottom: 7px;
        }
        .cat-section-below .cat-card-title {
            font-size: 11px;
            font-weight: 600;
        }
    }
</style>

<!-- Full-Width Hero Slider -->
<div class="container-fluid px-2 px-lg-4 pt-2" style="overflow: hidden;">
    <div class="owl-carousel owl-theme" id="slider">
        @forelse ($sliders as $slider)
            <div class="hero-slider-item" style="margin: 0 !important; border-radius: 12px; overflow: hidden;">
                <a href="{{ $slider->slider_btn_link }}">
                    <img src="{{ asset($slider->slider_image) }}" alt="Slider Image" @if($loop->first) loading="eager" fetchpriority="high" @endif style="border-radius: 12px;">
                </a>
            </div>
        @empty
        @endforelse
    </div>
</div>

<!-- Categories Below Hero (Rounded) -->
<div class="container-fluid px-2 px-lg-4 pt-2 mb-3 mb-lg-4">
    <div class="cat-section-below">
        <div class="cat-grid-wrapper">
            @forelse ($categories as $category)
                <div class="cat-grid-item">
                    <a href="{{ url('products/category/' . $category->slug) }}" class="cat-circle-card">
                        <div class="cat-icon-wrapper">
                            <img src="{{ asset($category->category_icon) }}" alt="{{ $category->category_name }}">
                        </div>
                        <p class="cat-card-title">{{ \Illuminate\Support\Str::limit($category->category_name, 30) }}</p>
                    </a>
                </div>
            @empty
            @endforelse
        </div>
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
                 <a href="{{ url('promotional/products') }}" class="mb-0 btn btn-sm text-center" style="padding: 3px 8px;height: 26px;color: white;font-weight: bold;margin-top:9px;font-size:15px;background: var(--color-primary);border: 1px solid var(--color-primary);">VIEW ALL</a>
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
                 <a href="{{ url('promotional/products') }}" class="mb-0 btn btn-sm text-center" style="padding: 3px 8px;height: 26px;color: white;font-weight: bold;margin-top:9px;font-size:15px;background: var(--color-primary);border: 1px solid var(--color-primary);">VIEW ALL</a>
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
                     <a href="{{url('products/category/'.$categoryproduct->slug)}}" class="mb-0 btn btn-sm text-center" style="padding: 3px 8px;height: 26px;color: white;font-weight: bold;margin-top:9px;font-size:15px;background: var(--color-primary);border: 1px solid var(--color-primary);">VIEW ALL</a>
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
