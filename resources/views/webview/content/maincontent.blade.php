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

<div class="container-fluid p-0 px-lg-3 pt-lg-2" style="overflow: hidden;">
    <div class="row m-0">
     <!-- Sidebar -->
        <div class="col-lg-3 d-none d-lg-block sidebar pe-lg-2 ps-0">
             <div class="rounded-top text-center my-0" style="background-color:#94DC10;">
                <h5 class="py-2 text-white my-0">CATEGORIES</h5>
            </div>
            <div class="side-menu animate-dropdown outer-bottom-xs">
                <nav class="yamm megamenu-horizontal" role="navigation" style="padding-top: 6px;">
                    <ul class="nav m-0">
                        @forelse ($categories as $maincategory)
                            @if($loop->iteration <= 8)
                                @if (count($maincategory->subcategories) > 0)
                                    <li class="dropdown menu-item">
                                        <a href="{{ url('products/category/' . $maincategory->slug) }}"
                                            class="dropdown-toggle" data-bs-hover="dropdown"> <img
                                                src="{{ asset($maincategory->category_icon) }}"
                                                alt="{{ $maincategory->category_name }}"
                                                style="width: 22px !important;margin-top: -5px;">
                                            <span style="margin-left:6px">{{ $maincategory->category_name }}</span></a>
                                        <ul class="dropdown-menu mega-menu">
                                            <li class="yamm-content" style="padding-bottom: 5px;padding-top: 5px;">
                                                <ul class="links list-unstyled">
                                                    <div class="row">
                                                        @foreach ($maincategory->subcategories as $subcategory)
                                                            <div class="col-sm-12 col-md-4 pt-1 pb-1" id="subcategoryhover" style="width: 100%;">
                                                                <li><a href="{{ url('products/sub/category/' . $subcategory->slug) }}"
                                                                        style="color:#666666">{{ $subcategory->sub_category_name }}</a>
                                                                </li>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </ul>
                                                <!-- /.row -->
                                            </li>
                                            <!-- /.yamm-content -->
                                        </ul>
                                        <!-- /.dropdown-menu -->
                                    </li>
                                @else
                                    <li class="dropdown menu-item">
                                        <a href="{{ url('products/category/' . $maincategory->slug) }}"
                                            class="dropdown-toggle text-truncate" data-bs-hover="dropdown"><img
                                                src="{{ asset($maincategory->category_icon) }}"
                                                alt="{{ $maincategory->category_name }}"
                                                style="width: 22px !important;margin-top: -5px;"><span style="margin-left:6px">{{ $maincategory->category_name }}</span></a>
                                        <!-- /.dropdown-menu -->
                                    </li>
                                @endif
                            @endif
                        @empty
                        @endforelse
                        
                        @if(count($categories) > 8)
                            <li class="dropdown menu-item">
                                <a href="#" class="dropdown-toggle" style="background: #f9f9f9; font-weight: bold; color: #94DC10 !important;">
                                    <i class="fa fa-plus-circle" style="margin-right: 6px; font-size: 16px;"></i>
                                    <span>More Categories</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
              
    <div class="col-12 col-lg-9 p-0 ps-lg-3">
        <div class="owl-carousel owl-theme" id="slider">
            @forelse ($sliders as $slider)
                <div class="item" style="margin:0 !important;">
                    <a href="{{ $slider->slider_btn_link }}">
                    <img  src="{{ asset($slider->slider_image) }}" style="width: 100%; height: auto;">
                    </a>
                </div>
            @empty
            @endforelse
        </div>
    </div>
    
</div>
</div>


<div class="container p-0 my-4 mb-2 mt-lg-4 pt-lg-4" style="overflow: hidden;">
    <div class="row m-0 cat-row"> 
        @forelse ($categories as $category)
            <div class="col-lg-2 col-4 mb-2" data-aos="fade-left" data-aos-duration="10">
               <div class="cat_item">
                    <a href="{{ url('products/category/' . $category->slug) }}">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset($category->category_icon) }}" id="catimg">
                    </div>
                    <p id="catp" style="font-weight:bold;color: black;">{{ \Illuminate\Support\Str::limit($category->category_name, 10) }}</p>
                </a>
               </div>
            </div>
        @empty
    
        @endforelse 
    </div>
</div>


<!-- Promotional Products -->
<div class="container p-0 pb-2" style="overflow: hidden;">
    @if(count($topproducts)>0) 
        <div class="pb-2 bg-white row m-0">
            <div class="col-12" style="padding-left: 0;display: flex;justify-content: space-between;">
                <div class="px-2 pt-0 p-md-3 d-flex justify-content-between" style="padding-bottom:4px !important;padding-top: 8px !important;">
                    <h4 class="m-0"><b>Promotional Offers</b></h4>
                </div>
            </div>
            <div class="col-12 px-1">
                <div class="owl-carousel " id="promotionalofferSlide">
                    @forelse ($topproducts as $promotional)
                        @php
                            $relatedIds = json_decode($promotional->RelatedProductIds);
                            $firstpro = null;
                            $dis = 0;
                            if (!empty($relatedIds) && isset($relatedIds[0]->productID)) {
                                $firstpro=App\Models\Product::with([
                                    'sizes' => function ($query) {
                                        $query->select('id','product_id','Discount','RegularPrice','SalePrice')->take(1);
                                    }
                                    ])->where('id', $relatedIds[0]->productID)->select('id','ProductName')->first();
                                
                                if ($firstpro && count($firstpro->sizes) > 0 && $firstpro->sizes[0]->RegularPrice > 0) {
                                    $dis=intval(($firstpro->sizes[0]->Discount/$firstpro->sizes[0]->RegularPrice)*100);
                                }
                            }
                       @endphp
                        @if(isset($firstpro))
                            <div class="item" id="featuredproduct" data-aos="fade-right" data-aos-duration="10">
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
                                                    <span style="font-weight: bold;color:black;font-size:10px">({{ App\Models\Review::where('product_id', $promotional->id)->get()->count() }})</span>
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
        <div class="pb-2 bg-white row m-0">
            <div class="col-12" style="padding-left: 0;display: flex;justify-content: space-between;">
                <div class="px-2 pt-0 p-md-3 d-flex justify-content-between" style="padding-bottom:4px !important;padding-top: 8px !important;">
                    <h4 class="m-0"><b>Best Selling</b></h4>
                </div>
            </div>
            <div class="col-12 px-1">
                <div class="owl-carousel " id="bestSellingSlide">
                    @forelse ($bestSelleingProducts as $promotional)
                        @php
                            $relatedIds = json_decode($promotional->RelatedProductIds);
                            $firstpro = null;
                            $dis = 0;
                            if (!empty($relatedIds) && isset($relatedIds[0]->productID)) {
                                $firstpro=App\Models\Product::with([
                                    'sizes' => function ($query) {
                                        $query->select('id','product_id','Discount','RegularPrice','SalePrice')->take(1);
                                    }
                                    ])->where('id', $relatedIds[0]->productID)->select('id','ProductName')->first();
                                
                                if ($firstpro && count($firstpro->sizes) > 0 && $firstpro->sizes[0]->RegularPrice > 0) {
                                    $dis=intval(($firstpro->sizes[0]->Discount/$firstpro->sizes[0]->RegularPrice)*100);
                                }
                            }
                       @endphp
                        @if(isset($firstpro))
                            <div class="item" id="featuredproduct" data-aos="fade-right" data-aos-duration="10">
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
                                                    <span style="font-weight: bold;color:black;font-size:10px">({{ App\Models\Review::where('product_id', $promotional->id)->get()->count() }})</span>
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

    <div class="row m-0 gutters-10">
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
                <div class="pb-0 bg-white row m-0 my-2" data-aos="fade-right" data-aos-duration="10" style="overflow: hidden;">
                    <div class="col-12" style="padding-left: 0;display: flex;justify-content: space-between;">
                        <div class="px-2 pt-0 p-md-3 d-flex justify-content-between" style="padding-bottom:4px !important;padding-top: 8px !important;">
                            <h4 class="m-0"><b>{{ $categoryproduct->category_name }}</b></h4>
                        </div>
                    </div>
    
                    @forelse ($categoryproduct->mainproducts as $product)
                        @php
                            $relatedIds = json_decode($product->RelatedProductIds);
                            $firstcatepro = null;
                            $dis = 0;
                            if (!empty($relatedIds) && isset($relatedIds[0]->productID)) {
                                $firstcatepro=App\Models\Product::with([
                                    'sizes' => function ($query) {
                                        $query->select('id','product_id','Discount','RegularPrice','SalePrice')->take(1);
                                    }
                                    ])->where('id', $relatedIds[0]->productID)->select('id','ProductName')->first();
                                
                                if ($firstcatepro && count($firstcatepro->sizes) > 0 && $firstcatepro->sizes[0]->RegularPrice > 0) {
                                    $dis=intval(($firstcatepro->sizes[0]->Discount/$firstcatepro->sizes[0]->RegularPrice)*100);
                                }
                            }
                        @endphp
                        @if(isset($firstcatepro))
                            <div class="my-1 px-1 col-6 col-md-4 col-lg-3" fade-direction="left" fade-time="1">
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
                                                    <span style="font-weight: bold;color:black;font-size:10px">({{ App\Models\Review::where('product_id', $product->id)->get()->count() }})</span>
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

    <div class="row m-0 gutters-10">
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
