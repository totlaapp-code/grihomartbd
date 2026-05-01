<?php $__env->startSection('maincontent'); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(env('APP_NAME')); ?>-<?php echo e($productdetails->ProductName); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="description" content="Online shopping in Bangladesh for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta name="keywords" content="<?php echo e(env('APP_NAME')); ?>, online store bd, online shop bd, Organic fruits, Thai, UK, Korea, China, cosmetics, Jewellery, bags, dress, mobile, accessories, automation Products,">
    <meta itemprop="name" content="<?php echo e($productdetails->ProductName); ?>">
    <meta itemprop="description" content="Best online shopping in Bangladesh for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta itemprop="image" content="<?php echo e(env('APP_URL')); ?><?php echo e($productdetails->ProductImage); ?>">

    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>product/<?php echo e($productdetails->ProductSlug); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo e($productdetails->ProductName); ?>">
    <meta property="og:description" content="Online shopping in BD for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta property="og:image" content="<?php echo e(env('APP_URL')); ?><?php echo e($productdetails->ProductImage); ?>">
    <meta property="image" content="<?php echo e(env('APP_URL')); ?><?php echo e($productdetails->ProductImage); ?>" />
    <meta property="url" content="<?php echo e(env('APP_URL')); ?>product/<?php echo e($productdetails->ProductSlug); ?>">
    <meta itemprop="image" content="<?php echo e(env('APP_URL')); ?><?php echo e($productdetails->ProductImage); ?>">
    <meta property="twitter:card" content="<?php echo e(env('APP_URL')); ?><?php echo e($productdetails->ProductImage); ?>" />
    <meta property="twitter:title" content="<?php echo e($productdetails->ProductName); ?>" />
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>product/<?php echo e($productdetails->ProductSlug); ?>">
    <meta name="twitter:image" content="<?php echo e(env('APP_URL')); ?><?php echo e($productdetails->ProductImage); ?>">
<?php $__env->stopSection(); ?>
<style>
.order_now_btn{
        transition: transform 0.3s ease-in-out;
    animation: pulse 1.5s ease-in-out infinite;
}
.call_now_btn {
    height: 45px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.product-code p {
    display: inline-block;
    color: rgb(255, 255, 255);
    line-height: 0;
    margin-bottom: 10px;
    background: rgb(1, 105, 56);
    padding: 0px 10px;
    border-top: 15px solid transparent;
    border-bottom: 15px solid transparent;
    border-right: 15px solid rgb(255, 255, 255);
}

.qty-cart {
    width: auto;
    display: flex;
    align-items: center;
    column-gap: 20px;
}

.qty-cart .quantity {
    position: relative;
    border: 1px solid #222;
    height: 40px;
    overflow: hidden;
    width: 130px;
    margin-top: 10px;
}

.quantity input {
    position: relative;
    text-align: center;
    font-size: 16px;
    height: 100%;
    width: 100%;
    pointer-events: none;
    font-weight: 500;
}
@media  only screen and (max-width: 600px) {

.description img{
        width: 260px !important;
}
}

.star {
    font-size: 8px !important;
}

    .animate-charcter {
        text-transform: uppercase;
        background-image: linear-gradient( -225deg, #231557 0%, #44107a 29%, #ff1361 67%, #fff800 100% );
        background-size: auto auto;
        background-clip: border-box;
        background-size: 200% auto;
        color: #fff;
        background-clip: text;
        text-fill-color: transparent;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: textclip 2s linear infinite;
    }

    #formTextBtn {
        width: 92%;
        font-size: 18px;
        padding: 4px;
        border-radius: 0;
        border-image: linear-gradient(to right, #2d2dff, #ff2601) 1;
    }

    #formText {
        width: 95%;
        font-size: 18px;
        padding: 4px;
        border-radius: 0;
        border-image: linear-gradient(to right, #2d2dff, #ff2601) 1;
    }

    .stss {
        font-size: 14px;
        padding: 2px 5px;
        background: green;
        border-radius: 50%;
        margin-right: 2px;
        color: white;
        font-weight: bold;
    }

    .sizetext {
        color: 000;
        background: #fff;
    }

    .colortext {
        color: #000;
        background: #fff;
    }

    #buttonplus {
    position: absolute;
    right: 0;
    bottom: 0;
    z-index: 1;
    height: 40px;
    line-height: 40px;
    width: 40px;
    border-left: 1px solid #222;
    text-align: center;
    font-size: 26px;
    cursor: pointer;
    }

    #buttonminus {
    position: absolute;
    left: 0;
    bottom: 0;
    z-index: 1;
    height: 40px;
    line-height: 40px;
    width: 40px;
    border-right: 1px solid #222;
    text-align: center;
    font-size: 40px;
    cursor: pointer;
    }

    #checked {
        color: orange;
    }

</style>
<!-- Body -->

<div class="mt-2 body-content" id="top-banner-and-menu">
    <div class='container' id="loadproduct">
        <div class='row single-product'>
            <div class='p-0 col-md-12'>
                <div class="detail-block">
                    <div class="row wow fadeInUp">

                        <div class="col-xs-12 col-sm-12 col-md-6 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <?php if(json_decode($productdetails->PostImage)): ?>
                                    <div id="sync1" class="owl-carousel owl-theme">
                                        <div class="items">
                                            <img class="w-100 h-100" src="<?php echo e(asset($productdetails->ProductImage)); ?>"
                                                alt="" style="border-radius: 4px;">
                                        </div>
                                        <?php $__empty_1 = true; $__currentLoopData = json_decode($productdetails->PostImage); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="items">
                                                <img class="w-100 h-100" src="<?php echo e(asset('public/images/product/slider')); ?>/<?php echo e($image); ?>"
                                                    alt="" style="border-radius: 4px;">
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </div>
                                    <div id="sync2" class="owl-carousel owl-theme" style="padding-top: 10px;">
                                        <div class="items">
                                            <img class="w-100 h-100"
                                                style="padding:6px;border:1px solid;border-radius: 4px;"
                                                src="<?php echo e(asset($productdetails->ProductImage)); ?>" alt="">
                                        </div>
                                        <?php $__empty_1 = true; $__currentLoopData = json_decode($productdetails->PostImage); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="items">
                                                <img class="w-100 h-100"
                                                    style="padding:6px;border:1px solid;border-radius: 4px;"
                                                    src="<?php echo e(asset('public/images/product/slider')); ?>/<?php echo e($image); ?>" alt="">
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="items">
                                        <img class="w-100 h-100" src="<?php echo e(asset($productdetails->ProductImage)); ?>"
                                            alt="" style="border-radius: 4px;">
                                    </div>
                                <?php endif; ?>

                            </div>
                            <!-- /.single-product-gallery -->
                        </div>
                        <!-- /.gallery-holder -->
                        <div class="col-sm-12 col-md-6 product-info-block" id="paddingnone">
                            <div class="product-info" id="productinfo">
                                <h1 class="name" style="margin-top:16px !important;padding-bottom: 6px;font-size: 20px !important; line-height: 25px;"> <?php echo e($productdetails->ProductName); ?></h1>
                                
                                 <div class="col-6">
                                    <?php if(App\Models\Size::where('product_id', $productdetails->id)->first()): ?>
                                        <div class="product-price strong-700"
                                            style="color:black;font-weight:bold;padding-top: 6px;" id="productPriceAmount">
                                            <span id="salePrice"><?php echo e(App\Models\Size::where('product_id', $productdetails->id)->first()->SalePrice); ?></span> TK
                                            <?php if(App\Models\Size::where('product_id', $productdetails->id)->first()->Discount>0): ?> &nbsp;<del class="old-product-price strong-400" style="color: #797474;font-size: 22px;"><?php echo e(round(App\Models\Size::where('product_id',$productdetails->id)->first()->RegularPrice)); ?></del><?php endif; ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="product-price strong-700"
                                            style="color:black;font-weight:bold;padding-top: 6px;" id="productPriceAmount">
                                            <span id="salePrice" style="color:black;font-weight:bold;"><?php echo e(App\Models\Weight::where('product_id', $productdetails->id)->first()->SalePrice); ?></span> TK
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="mt-2 mb-2 row">
                                    <?php if(empty(json_decode($singlemain->RelatedProductIds))): ?>
                                    <?php else: ?>
                                        <div class="mb-2 col-12 col-md-12 colorpart">
                                            <div class="d-flex">
                                                <h4 id="productselect" class="m-0"><b style="font-size:14px">Select Color:</b></h4>
                                                <div class="d-flex mx-3">
                                                    <div class="colorinfo">
                                                        <?php $__empty_1 = true; $__currentLoopData = json_decode($singlemain->RelatedProductIds); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$ids): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <?php
                                                                $prodinfo=App\Models\Product::where('id',$ids->productID)->where('status','Active')->first();
                                                            ?>
                                                            <?php if(isset($prodinfo)): ?>
                                                                <input type="radio" class="m-0" id="relproduct<?php echo e($prodinfo->id); ?>" hidden name="relproduct" onclick="getrelproduct('<?php echo e($prodinfo->id); ?>','<?php echo e($singlemain->id); ?>')">
                                                                <label class="relproduct ms-0" id="relproducttext<?php echo e($prodinfo->id); ?>" for="relproduct<?php echo e($prodinfo->id); ?>" style="border: 1px solid #000;padding: 0px;" onclick="getrelproduct('<?php echo e($prodinfo->id); ?>','<?php echo e($singlemain->id); ?>')">
                                                                    <img src="<?php echo e(asset($prodinfo->ProductImage)); ?>" alt="" style="width:60px; height:60px;">
                                                                </label>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    

                                    <?php if(count($sizesolds) < 1): ?>
                                    <?php else: ?>
                                        <div class="col-12 col-md-12 colorpart">
                                           <div class="d-flex my-2">
                                                <h4 id="resellerprice" class="m-0"><b style="font-size:14px">Select Size: </b></h4>
                                                <div class="sizeinfo mx-3">
                                                    <?php $__empty_1 = true; $__currentLoopData = $sizesolds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sizesold): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <?php if($sizesold->available_stock>2): ?>
                                                        <input type="hidden" name="regularpriceofsize"
                                                            id="regularpriceofsize<?php echo e($sizesold->size); ?>"
                                                            value="<?php echo e($sizesold->RegularPrice); ?>">
                                                        <input type="hidden" name="salepriceofsize"
                                                            id="salepriceofsize<?php echo e($sizesold->size); ?>"
                                                            value="<?php echo e($sizesold->SalePrice); ?>">
                                                        <input type="radio" class="m-0" hidden
                                                            id="size<?php echo e($sizesold->size); ?>" name="size"
                                                            onclick="getsize('<?php echo e($sizesold->size); ?>')">
                                                        <label class="sizetext ms-0" id="sizetext<?php echo e($sizesold->size); ?>"
                                                            for="size<?php echo e($sizesold->size); ?>"
                                                            style="border: 1px solid #e4e4e4;font-size:18px;font-weight:bold;padding: 0px 8px;border-radius: 2px;margin-right:4px;margin-bottom:4px;"
                                                            onclick="getsize('<?php echo e($sizesold->size); ?>')"><?php echo e($sizesold->size); ?></label>
                                                        <?php else: ?>
                                                        <input type="hidden" name="regularpriceofsize"
                                                            id="regularpriceofsize<?php echo e($sizesold->size); ?>"
                                                            value="<?php echo e($sizesold->RegularPrice); ?>">
                                                        <input type="hidden" name="salepriceofsize"
                                                            id="salepriceofsize<?php echo e($sizesold->size); ?>"
                                                            value="<?php echo e($sizesold->SalePrice); ?>">
                                                        <input type="radio" class="m-0" hidden
                                                            id="size<?php echo e($sizesold->size); ?>" name="size" >
                                                        <label class="sizetext ms-0" id="sizetext<?php echo e($sizesold->size); ?>"
                                                            for="size<?php echo e($sizesold->size); ?>"
                                                            style="border: 1px solid #e4e4e4;    color: rgb(151 150 150) !important;font-size:18px;font-weight:bold;padding: 0px 8px;border-radius: 2px;margin-right:4px;margin-bottom:4px;" ><del><?php echo e($sizesold->size); ?> </del> </label>
                                                        <?php endif; ?>
    
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <?php endif; ?>
                                                </div>
                                           </div>
                                            
                                        </div>
                                    <?php endif; ?>
                                    <?php if(count($weightolds) < 1): ?>
                                    <?php else: ?>
                                        <div class="col-12 col-md-12 colorpart">
                                            <h4 id="resellerprice" class="m-0"><b style="font-size:14px">সিলেক্ট করে কনফার্ম করুনঃ</b></h4>
                                            <div class="sizeinfo">
                                                <?php $__empty_1 = true; $__currentLoopData = $weightolds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <input type="hidden" name="regularpriceofsize"
                                                        id="regularpriceofsize<?php echo e($weight->id); ?>"
                                                        value="<?php echo e($weight->RegularPrice); ?>">
                                                    <input type="hidden" name="salepriceofsize"
                                                        id="salepriceofsize<?php echo e($weight->id); ?>"
                                                        value="<?php echo e($weight->SalePrice); ?>">
                                                    <input type="hidden" name="weightsigmrnt"
                                                        id="weightsigmrnt<?php echo e($weight->id); ?>"
                                                        value="<?php echo e($weight->weight); ?>">
                                                    <input type="radio" class="m-0" hidden
                                                        id="size<?php echo e($weight->id); ?>" name="size"
                                                        onclick="getweight('<?php echo e($weight->id); ?>')">
                                                    <label class="weighttext ms-0"
                                                        id="weighttext<?php echo e($weight->id); ?>"
                                                        for="size<?php echo e($weight->id); ?>"
                                                        style="border: 1px solid #e4e4e4;font-size:16px;font-weight:bold;padding: 0px 6px;border-radius: 2px;margin-right:4px;margin-bottom:4px;"
                                                        onclick="getweight('<?php echo e($weight->id); ?>')"><?php echo e($weight->weight); ?></label>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="product-code">
                                    <p>
                                        <span>প্রোডাক্ট কোড : </span><?php echo e($productdetails->ProductSku); ?>

                                    </p>
                                </div>
                             

                                <div class="stock-container info-container m-t-10" style="margin-top:5px;">
                                    <div class="row" style="margin-bottom:5px;">
                                        <div class="col-12 qty-cart">
                                            <div class="pr-2 d-flex quantity">
                                                <span class="btn-sm" id="buttonminus" onclick="minus()">-</span>
                                                   <input type="text" class="form-control"  value="1" id="qtyval">
                                                <span class="btn-sm" id="buttonplus" onclick="plus()">+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.stock-container -->
                                
                                <div class="row">
                                  <div class="col-6">
                                    <div class="text-center quantity-container info-container" style="width: 100%; float: left;">
                                     <form name="form" action="<?php echo e(url('add-to-cart')); ?>" id="submitaddtocart" method="POST"
                                        enctype="multipart/form-data"
                                        style="text-align: center;">
                                        <?php echo method_field('POST'); ?>
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="color" id="product_colororder" value="<?php echo e($varients[0]->color); ?>">
                                        <input type="hidden" name="size" id="product_sizeorder" value="">
                                        <input type="hidden" name="sigment" id="product_sigmentorder" value="">
                                        <input type="hidden" name="price" id="product_priceorder" value="">

                                        <input type="hidden" name="product_id" value=" <?php echo e($productdetails->id); ?>" hidden>
                                        <input type="hidden" name="qty" value="1" id="qtyoror">
                                        <button type="submit"
                                            class="mb-0 ml-2 btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now"
                                            style="background:#016938;;color:white;width: 100%;font-size: 17px;">
                                            কার্টে যোগ করুন 
                                        </button>
                                     </form>
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <div class="text-center quantity-container info-container" style="width: 100%;float: left;">
                                     <form name="form" action="<?php echo e(url('add-to-cart')); ?>" id="submitaddtocart" method="POST"
                                        enctype="multipart/form-data"
                                        style="text-align: center;">
                                        <?php echo method_field('POST'); ?>
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="color" id="product_colororder" value="<?php echo e($varients[0]->color); ?>">
                                        <input type="hidden" name="size" id="product_sizeorder" value="">
                                        <input type="hidden" name="sigment" id="product_sigmentorder" value="">
                                        <input type="hidden" name="price" id="product_priceorder" value="">

                                        <input type="hidden" name="product_id" value=" <?php echo e($productdetails->id); ?>" hidden>
                                        <input type="hidden" name="qty" value="1" id="qtyoror">
                                        <button type="submit"
                                            class="order_now_btn mb-0 ml-2 btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now"
                                            style="background: #ED145B;color:white;width: 100%;font-size: 17px;">
                                            অর্ডার করুন
                                        </button>
                                     </form>
                                    </div>
                                  </div>
                                  
                                  <div class="col-12">
                                      <div>
                                          <a class="btn btn-success w-100 call_now_btn" href="tel: <?php echo e(App\Models\Basicinfo::first()->phone_one); ?>"><i class="fa-solid fa-phone mx-2"></i> <?php echo e(App\Models\Basicinfo::first()->phone_one); ?></a>
                                      </div>
                                  </div>
                                  <div class="col-12">
                                      <div class="mt-md-2 mt-2">
                                        <div class="del_charge_area">
                                            <div class="alert alert-info text-xs">
                                                <div class="flext_area d-flex text-center">
                                                    <i class="fa-solid fa-truck-fast"></i>
                                                    <div class="mx-3">
                                                       <span>Outside Dhaka  <?php echo e($shipping->outside_dhaka_charge); ?> Taka <br></span>
                                                       <span>Inside Dhaka  <?php echo e($shipping->inside_dhaka_charge); ?> Taka <br></span>
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
    
                            </div>
                            <!-- /.product-info -->
                        </div>
                        <!-- /.col-sm-7 -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.col -->
            <div class="clearfix"></div>
        </div>
        <div class="row single-product">
            <div class="p-0 col-md-12">
                <div class="product-tabs inner-bottom-xs wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell" style="display: inline-flex;">
                                <li class="active"><a data-bs-toggle="tab" id="istteb"
                                        href="#description">DESCRIPTION</a></li>
                            </ul>
                            <!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-12">

                            <div class="tab-content">

                                <div id="description" class="tab-pane active">
                                    <div class="product-tab">
                                        <p class="text"><?php echo $productdetails->ProductDetails; ?></p>
                                        <?php if(isset($productdetails->youtube_embade)): ?>
                                            <br>
                                            <div class="card">
                                                <div class="card-body">
                                                    <iframe width="100%" height="315"
                                                        src="https://www.youtube.com/embed/<?php echo e($productdetails->youtube_embade); ?>">
                                                    </iframe>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->



                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>


            </div>
        </div>

        <?php if(App\Models\Size::where('product_id', $productdetails->id)->first()): ?>
            <input type="hidden" id="gtmprice" value="<?php echo e(App\Models\Size::where('product_id', $productdetails->id)->first()->SalePrice); ?>">
            <input type="hidden" id="gtmdiscount" value="<?php echo e(App\Models\Size::where('product_id', $productdetails->id)->first()->RegularPrice-App\Models\Size::where('product_id', $productdetails->id)->first()->SalePrice); ?>">
        <?php else: ?>
            <input type="hidden" id="gtmprice" value="<?php echo e(App\Models\Weight::where('product_id', $productdetails->id)->first()->SalePrice); ?>">
            <input type="hidden" id="gtmdiscount" value="<?php echo e(App\Models\Weight::where('product_id', $productdetails->id)->first()->RegularPrice-App\Models\Weight::where('product_id', $productdetails->id)->first()->SalePrice); ?>">
        <?php endif; ?>

        <input type="hidden" id="gtmproductname" value="<?php echo e($productdetails->ProductName); ?>">
        <input type="hidden" id="gtmcategory" value="<?php echo e(App\Models\Category::where('id',$productdetails->category_id)->first()->category_name); ?>">
        <input type="hidden" id="gtmproductid" value="<?php echo e($productdetails->id); ?>">
        <input type="hidden" id="gtmproductsku" value="<?php echo e($productdetails->ProductSku); ?>">

        <script>
            $(document).ready( function(){

                var sync1 = $("#sync1");
                var sync2 = $("#sync2");
                var slidesPerPage = 4; //globaly define number of elements per page
                var syncedSecondary = true;

                sync1.owlCarousel({
                    items: 1,
                    slideSpeed: 2000,
                    autoplay: false,
                    dots: false,
                    loop: true,
                    responsiveRefreshRate: 200,
                    navText: [
                        '<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
                        '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
                    ],
                }).on('changed.owl.carousel', syncPosition);

                sync2
                    .on('initialized.owl.carousel', function() {
                        sync2.find(".owl-item").eq(0).addClass("current");
                    })
                    .owlCarousel({
                        margin: 6,
                        items: slidesPerPage,
                        dots: false,
                        nav: true,
                        smartSpeed: 200,
                        slideSpeed: 500,
                        slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                        responsiveRefreshRate: 100
                    }).on('changed.owl.carousel', syncPosition2);

                function syncPosition(el) {
                    //if you set loop to false, you have to restore this next line
                    //var current = el.item.index;

                    //if you disable loop you have to comment this block
                    var count = el.item.count - 1;
                    var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                    if (current < 0) {
                        current = count;
                    }
                    if (current > count) {
                        current = 0;
                    }

                    //end block

                    sync2
                        .find(".owl-item")
                        .removeClass("current")
                        .eq(current)
                        .addClass("current");
                    var onscreen = sync2.find('.owl-item.active').length - 1;
                    var start = sync2.find('.owl-item.active').first().index();
                    var end = sync2.find('.owl-item.active').last().index();

                    if (current > end) {
                        sync2.data('owl.carousel').to(current, 100, true);
                    }
                    if (current < start) {
                        sync2.data('owl.carousel').to(current - onscreen, 100, true);
                    }
                }

                function syncPosition2(el) {
                    if (syncedSecondary) {
                        var number = el.item.index;
                        sync1.data('owl.carousel').to(number, 100, true);
                    }
                }

                sync2.on("click", ".owl-item", function(e) {
                    e.preventDefault();
                    var number = $(this).index();
                    sync1.data('owl.carousel').to(number, 300, true);
                });


                $('#AddToCartForm').submit(function(e) {
                    e.preventDefault();
                    $('#processing').css({
                        'display': 'flex',
                        'justify-content': 'center',
                        'align-items': 'center'
                    })
                    $('#processing').modal('show');
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo e(url('add-to-cart')); ?>',
                        processData: false,
                        contentType: false,
                        data: new FormData(this),

                        success: function(data) {
                            updatecart();
                            $.ajax({
                                type: 'GET',
                                url: '<?php echo e(url('get-cart-content')); ?>',

                                success: function(response) {
                                    $('#cartViewModal .modal-body').empty().append(
                                        response);
                                },
                                error: function(error) {
                                    console.log('error');
                                }
                            });
                            $('#processing').modal('hide');
                            $('#cartViewModal').modal('show');
                        },
                        error: function(error) {
                            console.log('error');
                        }
                    });
                });

                // document.getElementById("istteb").click();
                $('#owl-single-product').owlCarousel({
                    items: 1,
                    itemsTablet: [768, 1],
                    itemsDesktop: [1199, 1],
                    autoplay: true,
                    loop: true,
                    autoplayTimeout: 1000,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    dots: true,

                });
            });

            var gtmprice=$('#gtmprice').val();
            var gtmqty=$('#proQuantity').val();
            var gtmid=$('#gtmproductid').val();
            var gtmsku=$('#gtmproductsku').val();
            var gtmproductname=$('#gtmproductname').val();
            var gtmcategory=$('#gtmcategory').val();
            var gtmdiscount=$('#gtmdiscount').val();

            window.dataLayer = window.dataLayer || [];
            dataLayer.push({
                ecommerce: null
            });
            dataLayer.push({
                event: "view_item",
                ecommerce: {
                    currency: "BDT",
                    value: gtmprice,
                    items: [{
                        item_id: gtmid,
                        item_name: gtmproductname,
                        index: 0,
                        price: gtmprice,
                        discount: gtmdiscount,
                        item_brand: 'greenieagro.com',
                        item_category: gtmcategory,
                        currency: "BDT",
                        quantity: 1,
                    }]

                }
            });

        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                document.getElementById('submitaddtocart').addEventListener('submit', function(event) {
                    window.dataLayer = window.dataLayer || [];
                    dataLayer.push({
                        ecommerce: null
                    });
                    dataLayer.push({
                        event: "add_to_cart",
                        ecommerce: {
                            currency: "BDT",
                            value: gtmprice,
                            items: [{
                                item_id: gtmid,
                                item_name: gtmproductname,
                                index: 0,
                                price: gtmprice,
                                discount: gtmdiscount,
                                item_brand: 'greenieagro.com',
                                item_category: gtmcategory,
                                currency: "BDT",
                                quantity: $('#qtyoror').val()
                            }]
                        }
                    });
                });
            });
        </script>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                <section class="pb-2 section featured-product wow fadeInUp" id="cateoryPro" style="margin-bottom:0px !important">
                    <h3 class="section-title" style="padding: 8px; margin-bottom: 0;">Related products</h3>
                    <div class="owl-carousel related-owl-carousel featured-carousel owl-theme outer-top-xs" id="relatedCarousel">
                        <?php $__empty_1 = true; $__currentLoopData = $relatedproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                                $firstpro=App\Models\Product::with([
                                    'sizes' => function ($query) {
                                        $query->select('id','product_id','Discount','RegularPrice','SalePrice')->take(1);
                                    }
                                    ])->where('id',json_decode($promotional->RelatedProductIds)[0]->productID)->select('id','ProductName')->first();

                                $review = App\Models\Review::where('product_id', $firstpro->id)->avg(
                                                                'rating',
                                                            );
                            ?>
                            <?php if(isset($firstpro)): ?>
                                <div class="item" id="featuredproduct">
                                     <div class="product-micro-row">
                                     <div class="product_item_inner">
                                         <div class="sale-badge">
                                            <div class="sale-badge-inner">
                                                <div class="sale-badge-box">
                                                    <span class="sale-badge-text">
                                                        7% ছাড়
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="product-image">
                                            <a href="<?php echo e(url('view-product/' . $promotional->ProductSlug)); ?>">
                                                <img src="<?php echo e(asset($promotional->ProductImage)); ?>">
                                            </a>
                                        </div>
                                        <!-- /.product-image -->
                             
                                        <div class="product-text" style="padding-bottom: 4px !important;background: white;">
                                            <div class="pro_name">
                                             <a href="<?php echo e(url('view-product/' . $promotional->ProductSlug)); ?>" id="f_pro_name"><?php echo e(\Illuminate\Support\Str::limit($promotional->ProductName, 35)); ?></a>
                                             
                                            <div class="d-flex my-2" style="justify-content:center">
                                                <div class="star" style="padding-top: 5px;">
                                                    <span style="font-weight: bold;color:black;font-size:10px">(<?php echo e(App\Models\Review::where('product_id', $promotional->id)->get()->count()); ?>)</span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                     
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <del class="old-product-price strong-400" style="color:red">৳
                                                    <?php echo e(round($firstpro->sizes[0]->RegularPrice)); ?></del>
                                                <span
                                                    class="product-price strong-600" style="color:black">৳ <?php echo e(round($firstpro->sizes[0]->SalePrice)); ?></span>
                                            </div>
                                            
                                          </div>
                                        </div>
                                        <div class="pro_btn">
                                          <form name="form" action="<?php echo e(url('add-to-cart')); ?>" method="POST" enctype="multipart/form-data" style="width: 100%;float: left;text-align: center;">
                                                <?php echo method_field('POST'); ?>
                                                <?php echo csrf_field(); ?>
                                                <input type="text" name="color" id="product_colorold" hidden>
                                                <input type="text" name="size" id="product_sizeold" hidden>
                                                <input type="text" name="product_id" value="<?php echo e($firstpro->id); ?>" hidden>
                                                <input type="text" name="qty" value="1" id="qtyor" hidden>
                                                <button class="btn  btn-sm mb-0 btn-block"  id="purcheseBtn">অর্ডার করুন</button>
                                            </form>
                                        </div>
                                  </div>
                                </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

            </div>
        </div>
    </div>
    <!-- /.container -->
</div>




<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
<?php if(Auth::id()): ?>
    <input type="hidden" name="user_id" id="user_id" value="<?php echo e(Auth::id()); ?>">
<?php else: ?>
    <input type="hidden" name="user_id" id="user_id" >
<?php endif; ?>

<script>

    function givereactlike(id) {
        $.ajax({
            type: 'GET',
            url: '<?php echo e(url('give/react/')); ?>'+'/like',
            data: {
                'user_id': $('#user_id').val(),
                'product_id': id,
            },

            success: function(data) {
                if (data.sigment == 'like') {
                    $('#relatedCarousel #likereactof' + id).text(data.total);
                    $('#relatedCarousel #likereactdone' + id).css('color', 'green');
                }else if (data.sigment == 'unlike') {
                    $('#relatedCarousel #likereactof' + id).text(data.total);
                    $('#relatedCarousel #likereactdone' + id).css('color', 'black');
                }else {

                }

                if (data.sigment == 'like') {
                    $('#productinfo #likereactof' + id).text(data.total);
                    $('#productinfo #likereactdone' + id).css('color', 'green');
                }else if (data.sigment == 'unlike') {
                    $('#productinfo #likereactof' + id).text(data.total);
                    $('#productinfo #likereactdone' + id).css('color', 'black');
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
            url: '<?php echo e(url('give/react/')); ?>'+'/love',
            data: {
                'user_id': $('#user_id').val(),
                'product_id': id,
            },

            success: function(data) {
                if (data.sigment == 'love') {
                    $('#relatedCarousel #lovereactof' + id).text(data.total);
                    $('#relatedCarousel #lovereactdone' + id).css('color', 'red');
                } else {
                    $('#relatedCarousel #lovereactof' + id).text(data.total);
                    $('#relatedCarousel #lovereactdone' + id).css('color', 'black');
                }
                if (data.sigment == 'love') {
                    $('#productinfo #lovereactof' + id).text(data.total);
                    $('#productinfo #lovereactdone' + id).css('color', 'red');
                } else {
                    $('#productinfo #lovereactof' + id).text(data.total);
                    $('#productinfo #lovereactdone' + id).css('color', 'black');
                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

</script>

<script>
    function getrelproduct(product_id, mainpro_id) {
        $('#processing').css({
            'display': 'flex',
            'justify-content': 'center',
            'align-items': 'center'
        })
        $('#processing').modal('show');
        $.ajax({
            type: 'GET',
            url: '<?php echo e(url('load/related-product')); ?>',
            data:{
                'product_id':product_id,
                'mainproduct_id':mainpro_id
            },
            success: function(response) {
                $('#processing').modal('hide');
                $('#loadproduct').empty().append(response);
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    function givelike(id) {
        $.ajax({
            type: 'GET',
            url: '<?php echo e(url('give/like')); ?>',
            data: {
                'user_id': $('#user_id').val(),
                'product_id': $('#product_id').val(),
                'review_id': id,
            },

            success: function(data) {
                if (data.status == 'like') {
                    $('#likeof' + data.review_id).text(data.total);
                    $('#likedone' + data.review_id).css('color', 'green');
                } else {
                    $('#likeof' + data.review_id).text(data.total);
                    $('#likedone' + data.review_id).css('color', 'black');
                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    function giveshare(id) {
        $.ajax({
            type: 'GET',
            url: '<?php echo e(url('give/share')); ?>',
            data: {
                'user_id': $('#user_id').val(),
                'product_id': $('#product_id').val(),
                'review_id': id,
            },

            success: function(data) {
                if (data.status == 'share') {
                    $('#shareof' + data.review_id).text(data.total);
                    $('#sharedone' + data.review_id).css('color', 'red');
                } else {
                    $('#shareof' + data.review_id).text(data.total);
                    $('#sharedone' + data.review_id).css('color', 'black');
                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }


    function checked(id) {
        if (id == 1) {
            $('#checked' + id).css('color', 'orange');
            $('#checked2').css('color', 'black');
            $('#checked3').css('color', 'black');
            $('#checked4').css('color', 'black');
            $('#checked5').css('color', 'black');
        } else if (id == 2) {
            $('#checked1').css('color', 'orange');
            $('#checked' + id).css('color', 'orange');
            $('#checked3').css('color', 'black');
            $('#checked4').css('color', 'black');
            $('#checked5').css('color', 'black');
        } else if (id == 3) {
            $('#checked1').css('color', 'orange');
            $('#checked2').css('color', 'orange');
            $('#checked' + id).css('color', 'orange');
            $('#checked4').css('color', 'black');
            $('#checked5').css('color', 'black');
        } else if (id == 4) {
            $('#checked1').css('color', 'orange');
            $('#checked2').css('color', 'orange');
            $('#checked3').css('color', 'orange');
            $('#checked' + id).css('color', 'orange');
            $('#checked5').css('color', 'black');
        } else if (id == 5) {
            $('#checked1').css('color', 'orange');
            $('#checked2').css('color', 'orange');
            $('#checked3').css('color', 'orange');
            $('#checked4').css('color', 'orange');
            $('#checked' + id).css('color', 'orange');
        } else {

        }

        $('#rating').val(id);
    }

    function loadreview() {
        $.ajax({
            type: 'GET',
            url: '<?php echo e(url('load/review')); ?>',

            success: function(response) {
                $('#reviewload').empty().append(response);
            },
            error: function(error) {
                console.log('error');
            }
        });
    }

    $(document).ready(function() {

        loadreview();

        $('#AddReview').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '<?php echo e(url('review/store')); ?>',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    swal({
                        title: "Success!",
                        icon: "success",
                    });
                },
                error: function(error) {
                    console.log('error');
                }
            });
        });

        $('#relatedCarousel').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            responsiveClass: true,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 5,
                }
            }
        });

    });


    function minus() {
        var avqty = $('#qtyval').val();
        if (avqty == 1) {

        } else {
            qty = Number(avqty) - 1;
            $('#qtyval').val(qty);
            $('#qtyor').val(qty);
            $('#qtyoror').val(qty);
            $('#qtyad').val(qty);
        }
    }

    function plus() {
        var avqty = $('#qtyval').val();
        if (avqty == 10) {

        } else {
            qty = Number(avqty) + 1;
            $('#qtyval').val(qty);
            $('#qtyor').val(qty);
            $('#qtyoror').val(qty);
            $('#qtyad').val(qty);
        }
    }



    function getcolor(color, key) {
        $("#sync1").data('owl.carousel').to(key, 300, true);
        $('#product_color').val(color);
        $('#product_colororder').val(color);
        $('.colortext').css('color','#000');
        $('.colortext').css('border','1px solid');
        $('#colortext'+color).css('border','2px solid');
        $('.sizetext').css('color', '#000');
        $('.sizetext').css('background', '#fff');
    }

    function getsize(size) {
        $('#product_sizeorder').val(size);
        var reg = $('#regularpriceofsize' + size).val();
        var sale = $('#salepriceofsize' + size).val();
        $('#product_price').val(sale);
        $('#product_priceorder').val(sale);
        $('#salePrice').html(sale);

        $('.sizetext').css('color', '#000');
        $('.sizetext').css('background', '#fff');
        $('#sizetext' + size).css('color', '#fff');
        $('#sizetext' + size).css('background', '#613EEA');
        $('#product_sigmentorder').val('');
    }

    function getweight(weight) {
        var sig=$('#weightsigmrnt' + weight).val();
        $('#product_sigmentorder').val(sig);
        var reg = $('#regularpriceofsize' + weight).val();
        var sale = $('#salepriceofsize' + weight).val();
        $('#product_price').val(sale);
        $('#product_priceorder').val(sale);
        $('#salePrice').html(sale);

        $('.weighttext').css('color', '#000');
        $('.weighttext').css('background', '#fff');
        $('#weighttext' + weight).css('color', '#fff');
        $('#weighttext' + weight).css('background', '#613EEA');
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('webview.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/grihomar/public_html/resources/views/webview/content/product/details.blade.php ENDPATH**/ ?>