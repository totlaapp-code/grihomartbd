<?php $__env->startSection('maincontent'); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(env('APP_NAME')); ?>-<?php echo e($productdetails->ProductName); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="description" content="Online shopping in Bangladesh for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta name="keywords" content="Rashibd, online store bd, online shop bd, Organic fruits, Thai, UK, Korea, China, cosmetics, Jewellery, bags, dress, mobile, accessories, automation Products,">
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

@media  only screen and (max-width: 600px) {

.description img{
        width: 260px !important;
}
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
        font-size: 18px;
        border: 1px solid;
        padding: 3px 14px;
        border-radius: 0px;
        height: 34px;
        margin: 0;
        line-height: 4px;
        background: green;
        color: white;
        border: 1px solid green;
    }

    #buttonminus {
        font-size: 18px;
        border: 1px solid;
        padding: 3px 14px;
        border-radius: 0px;
        height: 34px;
        margin: 0;
        line-height: 4px;
        background: red;
        color: white;
        border: 1px solid red;
    }

    #checked {
        color: orange;
    }
    .star{
        font-size: 8px !important;
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
                                <h1 class="name"
                                    style="margin-top:16px !important;padding-bottom: 6px;border-bottom: 1px solid #dfd6d6;font-size: 20px !important; line-height: 25px;">
                                    <?php echo e($productdetails->ProductName); ?></h1>

                                <div class="mt-2 mb-2 row">
                                    
                                    <?php if(empty(json_decode($singlemain->RelatedProductIds))): ?>
                                    <?php else: ?>
                                        <div class="mb-2 col-12 col-md-12 colorpart">
                                            <h4 id="productselect" class="m-0"><b style="font-size:14px">প্রডাক্ট এর কালার সিলেক্ট করুনঃ </b></h4>
                                            <div class="d-flex">
                                                <div class="colorinfo">
                                                    <?php $__empty_1 = true; $__currentLoopData = json_decode($singlemain->RelatedProductIds); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$ids): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <?php
                                                            $prodinfo=App\Models\Product::where('id',$ids->productID)->first();
                                                        ?>
                                                        <?php if(isset($prodinfo)): ?>
                                                            <input type="radio" class="m-0" id="relproduct<?php echo e($prodinfo->id); ?>" hidden name="relproduct" onclick="getrelproduct('<?php echo e($prodinfo->id); ?>','<?php echo e($singlemain->id); ?>')">
                                                            <label class="relproduct ms-0" id="relproducttext<?php echo e($prodinfo->id); ?>" for="relproduct<?php echo e($prodinfo->id); ?>" style="border: 1px solid #000;padding: 0px;" onclick="getrelproduct('<?php echo e($prodinfo->id); ?>','<?php echo e($singlemain->id); ?>')">
                                                                <img src="<?php echo e(asset($prodinfo->ProductImage)); ?>" alt="" style="width:60px;">
                                                            </label>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="mt-2 col-12 col-md-12 colorpart">
                                        <div id="breaftext">
                                            <?php echo $productdetails->ProductBreaf; ?>

                                        </div>
                                    </div>
                                    <?php if(count($sizesolds) < 1): ?>
                                    <?php else: ?>
                                        <div class="col-12 col-md-12 colorpart">
                                            <h4 id="resellerprice" class="m-0"><b style="font-size:14px">নিচে সাইজ সিলেক্ট করুনঃ </b></h4>
                                            <div class="sizeinfo">
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
                                <p for="" style=" margin: 0; padding-top: 1px;text-align:left">Product Code : <?php echo e($productdetails->ProductSku); ?></p>

                                    <?php
                                    $review = App\Models\Review::where('product_id', $productdetails->id)->avg(
                                        'rating',
                                    );
                                ?>
                                <div class="d-flex" style="justify-content:space-between">
                                    <div class="star" style="padding-top: 10px;">
                                        <span style="font-size:16px;" >
                                        (<?php echo e(App\Models\Review::where('product_id', $productdetails->id)->get()->count()); ?><span style="font-size: 12px"> reviews</span>)
                                        </span>
                                        <?php if(intval($review) == 1): ?>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                        <?php elseif(intval($review) == 2): ?>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                        <?php elseif(intval($review) == 3): ?>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                        <?php elseif(intval($review) == 4): ?>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;"></span>
                                        <?php elseif(intval($review) == 5): ?>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                        <?php else: ?>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                            <span class="fas fa-star" style="font-size:16px;" id="checked"></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="like">
                                        <div class="d-flex" style="justify-content: space-around;font-size: 20px;">
                                            <span style="padding-right: 14px;font-size: 30px;"><span class="sts" style="padding-right: 6px;font-size: 20px;"
                                                    id="likereactof<?php echo e($productdetails->id); ?>"><?php echo e(App\Models\React::where('product_id', $productdetails->id)->where('sigment','like')->get()->count()); ?></span><i
                                                    <?php if(App\Models\React::where('product_id', $productdetails->id)->whereIn('user_id', [\Request::ip(),Auth::id()])->where('sigment','like')->first()): ?> style="color:green !important" <?php endif; ?> class="fas fa-thumbs-up" id="likereactdone<?php echo e($productdetails->id); ?>"
                                                    onclick="givereactlike(<?php echo e($productdetails->id); ?>)"></i></span>
                                            <span style="font-size: 30px;"><span class="sts" style="padding-right: 6px;font-size: 20px;"
                                                    id="lovereactof<?php echo e($productdetails->id); ?>"><?php echo e(App\Models\React::where('product_id', $productdetails->id)->where('sigment','love')->get()->count()); ?></span><i
                                                    <?php if(App\Models\React::where('product_id', $productdetails->id)->whereIn('user_id', [\Request::ip(),Auth::id()])->where('sigment','love')->first()): ?> style="color:red !important" <?php endif; ?> class="fas fa-heart" id="lovereactdone<?php echo e($productdetails->id); ?>"
                                                    onclick="givereactlove(<?php echo e($productdetails->id); ?>)"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.rating-reviews -->

                                <div class="stock-container info-container m-t-10"
                                    style="margin-top:5px;border-bottom: 1px solid #dfd6d6;">
                                    <div class="row" style="margin-bottom:5px;">
                                        <div class="col-6">
                                            <?php if(App\Models\Size::where('product_id', $productdetails->id)->first()): ?>
                                                <div class="product-price strong-700"
                                                    style="color:black;font-weight:bold;padding-top: 6px;" id="productPriceAmount">
                                                    <span id="salePrice"><?php echo e(App\Models\Size::where('product_id', $productdetails->id)->first()->SalePrice); ?></span> TK
                                                    <?php if(App\Models\Size::where('product_id', $productdetails->id)->first()->Discount>0): ?> &nbsp;<del class="old-product-price strong-400" style="color: #fe0909;font-size: 20px;"><?php echo e(round(App\Models\Size::where('product_id',$productdetails->id)->first()->RegularPrice)); ?></del><?php endif; ?>
                                                </div>
                                            <?php else: ?>
                                                <div class="product-price strong-700"
                                                    style="color:black;font-weight:bold;padding-top: 6px;" id="productPriceAmount">
                                                    <span id="salePrice" style="color:black;font-weight:bold;"><?php echo e(App\Models\Weight::where('product_id', $productdetails->id)->first()->SalePrice); ?></span> TK
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-6">
                                            <div class="pr-2 d-flex" style="justify-content: right;padding-right: 4px;">
                                                <button class="btn btn-sm" id="buttonminus" onclick="minus()">-</button>
                                                <div class="cart-quantity" style="height: 33px;">
                                                    <div class="quant-input">
                                                        <input type="text" class="form-control" style="font-size: 20px;height: fit-content;height: 34px;padding:0px;width: 80px;text-align: center;" value="1" id="qtyval">
                                                    </div>
                                                </div>
                                                <button class="btn btn-sm" id="buttonplus" onclick="plus()">+</button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.stock-container -->
                                <div class="text-center quantity-container info-container"
                                    style="width: 100%;border-bottom: 1px solid #dfd6d6; float: left;">

                                    <form name="form" action="<?php echo e(url('add-to-cart')); ?>" method="POST"
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
                                            style="background:#000;color:white;width: 100%;font-size: 17px;">
                                            অর্ডার করুন
                                        </button>
                                    </form>

                                    <p for="" class="mt-4" style=" margin: 0; padding-top: 1px;text-align:justify">বিঃদ্রঃ: আপনার ডেলিভারি লোকেশন যদি ঢাকার বাহিরে হয়, আপনাকে অবশ্যই বিকাশের মাধ্যম <?php echo e(App\Models\Basicinfo::first()->outside_dhaka_charge); ?> টাকা ডেলিভারি চার্জ অগ্রিম প্রদান করতে হবে । আপনি অর্ডার করে দিন অতিশিগ্রই আমাদের প্রতিনিধি আপনার সাথে যোগাযোগ করবে ।</p>
                                    <p for="" class="mt-4" style=" margin: 0; padding-top: 1px;text-align:justify"> বিঃদ্রঃ: আপনার কম্পিউটার বা মোবাইল স্ক্রীন রেজুলেশন উপর নির্ভর করে, পণ্যের রঙ সামান্য পরিবর্তিত হতে পারে।</p>

                                    <p class="m-0 mb-2" style="text-align: left"><strong style="font-size: 18px;color: black;font-weight: bold;"><i class="fas fa-truck"></i> Delivery Charge: Inside Dhaka - <?php echo e(App\Models\Basicinfo::first()->inside_dhaka_charge); ?> tk.</strong></p>
                                    <p class="m-0 mb-2" style="text-align: left"><strong style="font-size: 18px;color: black;font-weight: bold;"><i class="fas fa-truck"></i> Delivery Charge: Outside Dhaka - <?php echo e(App\Models\Basicinfo::first()->outside_dhaka_charge); ?> tk.</strong></p>
                                    <p class="m-0 mb-2" style="text-align: left"><strong style="font-size: 18px;color: black;font-weight: bold;"><i class="fas fa-check"></i> Order today and receive it within <?php echo e(App\Models\Basicinfo::first()->insie_dhaka); ?>.</strong></p>
                                    <p class="m-0 mb-2" style="text-align: left"><strong style="font-size: 18px;color: black;font-weight: bold;"><i class="fas fa-thumbs-up"></i>Quality Product</strong></p>
                                </div>

                                <div class="text-center quantity-container info-container"
                                    style="width: 100%;border-bottom: 1px solid #dfd6d6; float: left;">
                                    <div class="" style="justify-content: left;width: 50%;float: left;text-align: center;">
                                        <a class="btn" id="formTextBtn" href="tel:<?php echo e(App\Models\Basicinfo::first()->phone_one); ?>"><i class="fas fa-phone"></i> <span class="animate-charcter"> <?php echo e(App\Models\Basicinfo::first()->phone_one); ?></span> </a>
                                    </div>
                                    <div style="width: 50%;float: left;text-align: center;">
                                        <a class="btn" id="formText" href="https://wa.me/+88<?php echo e(App\Models\Basicinfo::first()->wp_1); ?>?text=I%20am%20interested"> <img src="<?php echo e(asset('public/whatsappns.png')); ?>" style="width: 22px;border-radius: 50%;margin-top: -2px;" alt=""><span class="animate-charcter"> <?php echo e(App\Models\Basicinfo::first()->wp_1); ?></span> </a>
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

                <!-- /.product-tabs -->

                <div class="product-tabs inner-bottom-xs wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell"
                                style="display: flex;justify-content: space-between;">
                                <li class="active"><a data-bs-toggle="tab" id="istteb" href="#review"
                                        style="margin-top: 10px;"> See Our
                                        Products Review</a></li>
                                <li>
                                    <button class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"
                                        style="margin:0px;margin-top: 10px;margin-right: 20px;">Leave
                                        Review</button>
                                </li>
                            </ul>
                            <!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-12">

                            <div class="tab-content ">
                                <!-- /.tab-pane -->

                                <div id="review" class="tab-pane active show">
                                    <div class="product-tab">

                                        <div class="product-reviews">

                                            <div class="row">
                                                <div class="col-lg-7 col-12">
                                                    <div class="review" id="reviewload">

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.reviews -->
                                        </div>

                                    </div>
                                    <!-- /.product-tab -->
                                </div>
                                <!-- /.tab-pane -->

                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="m-0 modal-title">Give Rating And Review</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form name="form" id="AddReview" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3 form-group">
                                        <div class="star">
                                            <span class="fas fa-star" onclick="checked('1')" id="checked1"></span>
                                            <span class="fas fa-star" onclick="checked('2')" id="checked2"></span>
                                            <span class="fas fa-star" onclick="checked('3')" id="checked3"></span>
                                            <span class="fas fa-star" onclick="checked('4')" id="checked4"></span>
                                            <span class="fas fa-star" onclick="checked('5')" id="checked5"></span>
                                        </div>
                                    </div>
                                    <input type="hidden" value="<?php echo e($productdetails->id); ?>" name="product_id"
                                        id="product_id">
                                    <div class="mb-3 form-group">
                                        <label for="floatingInput">Message</label>
                                        <textarea class="form-group" name="messages" id="messages"></textarea>
                                    </div>
                                    <input type="hidden" name="rating" id="rating">
                                    <?php if(Auth::id()): ?>
                                        <input type="hidden" value="<?php echo e(Auth::id()); ?>" name="user_id"
                                            id="user_id">
                                    <?php else: ?>
                                    <?php endif; ?>
                                    <div class="mt-4 mb-4">
                                        <input class="form-control form-control-lg" name="file" id="file"
                                            type="file">
                                    </div>
                                    <br>
                                    <div class="mt-2 form-group" style="text-align: right">
                                        <?php if(Auth::id()): ?>
                                        <div class="submitBtnSCourse">
                                            <button type="submit" name="btn" data-bs-dismiss="modal"
                                                class="btn btn-dark btn-block" style="float: left">Close</button>
                                            <button type="submit" name="btn"
                                                class="btn btn-primary AddCourierBtn btn-block">Save</button>
                                        </div>
                                        <?php else: ?>
                                        <a class="btn btn-info" style="width: 100%;color: white;">Please login to give review</a>
                                        <?php endif; ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
        </script>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                <section class="pb-2 section featured-product wow fadeInUp" id="cateoryPro" style="margin-bottom:0px !important">
                    <h3 class="section-title"
                        style="border-bottom: 1px solid #e62e04;    padding: 8px;margin-bottom: 0;">Related
                        products</h3>
                    <div class="owl-carousel related-owl-carousel featured-carousel owl-theme outer-top-xs"
                        id="relatedCarousel">
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
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col-12">
                                                        <div class="product-image" style="position: relative;">
                                                            <div class="text-center image">
                                                                <a href="<?php echo e(url('view-product/' . $promotional->ProductSlug)); ?>">
                                                                    <img src="<?php echo e(asset($promotional->ProductImage)); ?>"
                                                                        alt="<?php echo e($promotional->ProductName); ?>" id="featureimagess">
                                                                </a>
                                                            </div>

                                                            <span id="discountpart"> <p id="pdis">SAVE ৳<?php echo e(round($firstpro->sizes[0]->Discount)); ?></p></span>

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-12">
                                                        <div class="p-2 infofe p-md-2" style="padding-bottom: 4px !important;background: white;">
                                                            <div class="product-info">
                                                                <h2 class="name text-truncate" id="f_name"><a
                                                                        href="<?php echo e(url('view-product/' . $promotional->ProductSlug)); ?>"
                                                                        id="f_pro_name"><?php echo e($promotional->ProductName); ?></a></h2>
                                                            </div>


                                                            <div class="d-flex" style="justify-content:space-between">
                                                                <div class="star" style="padding-top: 5px;">
                                                                    <span style="font-weight: bold;color:black;font-size:10px">(<?php echo e(App\Models\Review::where('product_id', $promotional->id)->get()->count()); ?>)</span>
                                                                    <?php if(intval($review) == 1): ?>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star"></span>
                                                                        <span class="fas fa-star"></span>
                                                                        <span class="fas fa-star"></span>
                                                                        <span class="fas fa-star"></span>
                                                                    <?php elseif(intval($review) == 2): ?>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star"></span>
                                                                        <span class="fas fa-star"></span>
                                                                        <span class="fas fa-star"></span>
                                                                    <?php elseif(intval($review) == 3): ?>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star"></span>
                                                                        <span class="fas fa-star"></span>
                                                                    <?php elseif(intval($review) == 4): ?>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star"></span>
                                                                    <?php elseif(intval($review) == 5): ?>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                    <?php else: ?>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                    <?php endif; ?>
                                                                </div>

                                                            </div>

                                                            <div class="price-box">
                                                                <del class="old-product-price strong-400">৳
                                                                    <?php echo e(round($firstpro->sizes[0]->RegularPrice)); ?></del>
                                                                <span
                                                                    class="product-price strong-600">৳ <?php echo e(round($firstpro->sizes[0]->SalePrice)); ?></span>
                                                            </div>

                                                        </div>
                                                        <a href="<?php echo e(url('view-product/' . $promotional->ProductSlug)); ?>">
                                                            <button class="mb-0 btn btn-danger btn-sm btn-block"
                                                                    style="width: 100%;border-radius: 0%;" id="purcheseBtn">অর্ডার করুন</button>
                                                        </a>

                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

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
                    items: 6,
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

<?php echo $__env->make('webview.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/grihomar/public_html/resources/views/webview/content/product/datacheck.blade.php ENDPATH**/ ?>