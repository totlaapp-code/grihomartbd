<?php $__env->startSection('maincontent'); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(env('APP_NAME')); ?>-Best online shop in Bangladesh
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="description" content="Online shopping in Bangladesh for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta name="keywords" content="<?php echo e(env('APP_NAME')); ?>, online store bd, online shop bd, Organic fruits, Thai, UK, Korea, China, cosmetics, Jewellery, bags, dress, mobile, accessories, automation Products,">


    <meta itemprop="name" content="Best Online Shopping in Bangladesh | <?php echo e(env('APP_NAME')); ?>">
    <meta itemprop="description" content="Best online shopping in Bangladesh for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta itemprop="image" content="<?php echo e(env('APP_URL')); ?>public/rankone1.avif">

    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Best Online Shopping in Bangladesh | <?php echo e(env('APP_NAME')); ?>">
    <meta property="og:description" content="Online shopping in BD for beauty products, men, women, kids, fashion items, clothes, electronics, home appliances, gadgets, watch, many more.">
    <meta property="og:image" content="<?php echo e(env('APP_URL')); ?>public/rankone1.avif">
    <meta property="image" content="<?php echo e(env('APP_URL')); ?>public/rankone1.avif" />
    <meta property="url" content="<?php echo e(env('APP_URL')); ?>">
    <meta itemprop="image" content="<?php echo e(env('APP_URL')); ?>public/rankone1.avif">
    <meta property="twitter:card" content="<?php echo e(env('APP_URL')); ?>public/rankone1.avif" />
    <meta property="twitter:title" content="Best Online Shopping in Bangladesh | <?php echo e(env('APP_NAME')); ?>" />
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta name="twitter:image" content="<?php echo e(env('APP_URL')); ?>public/rankone1.avif">
<?php $__env->stopSection(); ?>
<style>
    .product{
            margin-top: 4px !important;

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
    .star{
        font-size: 10px !important;
    }
</style>

<div class="container-fluid p-0 pt-lg-2">
    <div class="p-0 row">
     <!-- Sidebar -->
        <div class="col-lg-3 d-none d-lg-block sidebar pe-0 ps-0">
             <div class="rounded-top text-center my-0" style="background-color:#94DC10;">
                <h5 class="py-2 text-white my-0">CATEGORIES</h5>
            </div>
            <div class="side-menu animate-dropdown outer-bottom-xs">
                <nav class="yamm megamenu-horizontal" role="navigation" style="padding-top: 6px;">
                    <ul class="nav m-0">
                        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maincategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php if(count($maincategory->subcategories) > 0): ?>
                                <li class="dropdown menu-item">
                                    <a href="<?php echo e(url('products/category/' . $maincategory->slug)); ?>"
                                        class="dropdown-toggle" data-bs-hover="dropdown"> <img
                                            src="<?php echo e(asset($maincategory->category_icon)); ?>"
                                            alt="<?php echo e($maincategory->category_name); ?>"
                                            style="width: 22px !important;margin-top: -5px;">
                                        <span style="margin-left:6px"><?php echo e($maincategory->category_name); ?></span></a>
                                    <ul class="dropdown-menu mega-menu">
                                        <li class="yamm-content" style="padding-bottom: 5px;padding-top: 5px;">
                                            <ul class="links list-unstyled">
                                                <div class="row">
                                                    <?php $__currentLoopData = $maincategory->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-sm-12 col-md-4 pt-1 pb-1" id="subcategoryhover" style="width: 100%;">
                                                            <li><a href="<?php echo e(url('products/sub/category/' . $subcategory->slug)); ?>"
                                                                    style="color:#666666"><?php echo e($subcategory->sub_category_name); ?></a>
                                                            </li>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </ul>
                                            <!-- /.row -->
                                        </li>
                                        <!-- /.yamm-content -->
                                    </ul>
                                    <!-- /.dropdown-menu -->
                                </li>
                            <?php else: ?>
                                <li class="dropdown menu-item">
                                    <a href="<?php echo e(url('products/category/' . $maincategory->slug)); ?>"
                                        class="dropdown-toggle text-truncate" data-bs-hover="dropdown"><img
                                            src="<?php echo e(asset($maincategory->category_icon)); ?>"
                                            alt="<?php echo e($maincategory->category_name); ?>"
                                            style="width: 22px !important;margin-top: -5px;"><span style="margin-left:6px"><?php echo e($maincategory->category_name); ?></span></a>
                                    <!-- /.dropdown-menu -->
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
              
    <div class="col-12 col-lg-9">
        <div class="owl-carousel owl-theme" id="slider">
            <?php $__empty_1 = true; $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="item" style="margin:0 !important;">
                    <a href="<?php echo e($slider->slider_btn_link); ?>">
                    <img  src="<?php echo e(asset($slider->slider_image)); ?>">
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
        </div>
    </div>
    
</div>
</div>


<div class="container p-0 my-4 mb-2 mt-lg-4 pt-lg-4">
    <div class="row"> 
        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-lg-2 col-4 mb-2" data-aos="fade-left" data-aos-duration="10">
               <div class="cat_item">
                    <a href="<?php echo e(url('products/category/' . $category->slug)); ?>" >
                    <div class="d-flex justify-content-center" >
                        <img  src="<?php echo e(asset($category->category_icon)); ?>" id="catimg">
                    </div>
                    <p id="catp" style="font-weight:bold;color: black;"><?php echo e(\Illuminate\Support\Str::limit($category->category_name, 10)); ?></p>
                </a>
               </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    
        <?php endif; ?> 
    </div>
</div>


<!-- Promotional Products -->
<div class="container p-0 pb-2 ">
    <?php if(count($topproducts)>0): ?> 
        <div class="pb-2 bg-white row">
            <div class="col-12" style="padding-left: 0;display: flex;justify-content: space-between;">
                <div class="px-2 pt-0 p-md-3 d-flex justify-content-between" style="padding-bottom:4px !important;padding-top: 8px !important;">
                    <h4 class="m-0"><b>Promotional Offers</b></h4>
                </div>
            </div>
            <div class="col-12 px-1">
                <div class="owl-carousel " id="promotionalofferSlide">
                    <?php $__empty_1 = true; $__currentLoopData = $topproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $firstpro=App\Models\Product::with([
                                'sizes' => function ($query) {
                                    $query->select('id','product_id','Discount','RegularPrice','SalePrice')->take(1);
                                }
                                ])->where('id',json_decode($promotional->RelatedProductIds)[0]->productID)->select('id','ProductName')->first();
    
                                     $dis=intval(($firstpro->sizes[0]->Discount/$firstpro->sizes[0]->RegularPrice)*100)

                       ?>
                        <?php if(isset($firstpro)): ?>
                            <div class="item" id="featuredproduct" data-aos="fade-right" data-aos-duration="10">
                                <div class="product-micro-row">
                                     <div class="product_item_inner"> 
                                        <div class="product-image">
                                            <a href="<?php echo e(url('view-product/' . $promotional->ProductSlug)); ?>">
                                                <img src="<?php echo e(asset($promotional->ProductImage)); ?>">
                                            </a>
                                        </div>
                                        <span style="position: absolute;top: 0;background: green;width: 50px;color: white;border-radius: 4px;font-weight: bold;font-size: 12px;">&nbsp;<?php echo e($dis); ?>% off</span>
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
                                         
                                  </div>
                                </div>
                                <!-- /.product-micro-row -->
                                    
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="text-center">
                 <a href="<?php echo e(url('promotional/products')); ?>" class="mb-0 btn btn-sm text-center" style="padding: 3px 8px;height: 26px;color: white;font-weight: bold;margin-top:9px;font-size:15px;background: #94DC10;border: 1px solid #94DC10;">VIEW ALL</a>
            </div>
        </div> 
    <?php else: ?>
    <?php endif; ?> 
    
    <?php if(count($bestSelleingProducts)>0): ?> 
        <div class="pb-2 bg-white row">
            <div class="col-12" style="padding-left: 0;display: flex;justify-content: space-between;">
                <div class="px-2 pt-0 p-md-3 d-flex justify-content-between" style="padding-bottom:4px !important;padding-top: 8px !important;">
                    <h4 class="m-0"><b>Best Selling</b></h4>
                </div>
            </div>
            <div class="col-12 px-1">
                <div class="owl-carousel " id="bestSellingSlide">
                    <?php $__empty_1 = true; $__currentLoopData = $bestSelleingProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $firstpro=App\Models\Product::with([
                                'sizes' => function ($query) {
                                    $query->select('id','product_id','Discount','RegularPrice','SalePrice')->take(1);
                                }
                                ])->where('id',json_decode($promotional->RelatedProductIds)[0]->productID)->select('id','ProductName')->first();
            $dis=intval(($firstpro->sizes[0]->Discount/$firstpro->sizes[0]->RegularPrice)*100)

                             
                       ?>
                        <?php if(isset($firstpro)): ?>
                            <div class="item" id="featuredproduct" data-aos="fade-right" data-aos-duration="10">
                                <div class="product-micro-row">
                                     <div class="product_item_inner"> 
                                        
                                        <div class="product-image">
                                            <a href="<?php echo e(url('view-product/' . $promotional->ProductSlug)); ?>">
                                                <img src="<?php echo e(asset($promotional->ProductImage)); ?>">
                                            </a>
                                        </div>
                                        <span style="position: absolute;top: 0;background: green;width: 50px;color: white;border-radius: 4px;font-weight: bold;font-size: 12px;">&nbsp;<?php echo e($dis); ?>% off</span>
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
                                         
                                  </div>
                                </div>
                                <!-- /.product-micro-row -->
                                    
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="text-center">
                 <a href="<?php echo e(url('promotional/products')); ?>" class="mb-0 btn btn-sm text-center" style="padding: 3px 8px;height: 26px;color: white;font-weight: bold;margin-top:9px;font-size:15px;background: #94DC10;border: 1px solid #94DC10;">VIEW ALL</a>
            </div>
        </div> 
    <?php else: ?>
    <?php endif; ?> 

    <div class="row gutters-10">
        <?php if(count($adds) == '2'): ?>
            <?php $__empty_1 = true; $__currentLoopData = $adds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $add): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-lg-6 col-6 ps-lg-0">
                    <div class="mb-1 media-banner mb-lg-0">
                        <a href="<?php echo e($add->add_link); ?>" target="_blank" class="banner-container">
                            <img src="<?php echo e(asset($add->add_image)); ?>" alt="<?php echo e(env('APP_NAME')); ?>"
                                class="img-fluid ls-is-cached lazyloaded">
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
        <?php else: ?>
            <?php $__empty_1 = true; $__currentLoopData = $adds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $add): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-lg-12 col-12 ps-0">
                    <div class="mb-1 media-banner mb-lg-0">
                        <a href="<?php echo e($add->add_link); ?>" target="_blank" class="banner-container">
                            <img src="<?php echo e(asset($add->add_image)); ?>" alt="<?php echo e(env('APP_NAME')); ?>"
                                class="img-fluid ls-is-cached lazyloaded">
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
 
    <?php $__empty_1 = true; $__currentLoopData = $categoryproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$categoryproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if(count($categoryproduct->mainproducts) > 0): ?>
                <div class="pb-0 bg-white row my-2" data-aos="fade-right" data-aos-duration="10">
                    <div class="col-12" style="padding-left: 0;display: flex;justify-content: space-between;">
                        <div class="px-2 pt-0 p-md-3 d-flex justify-content-between" style="padding-bottom:4px !important;padding-top: 8px !important;">
                            <h4 class="m-0"><b><?php echo e($categoryproduct->category_name); ?></b></h4>
                        </div>
                    </div>
    
                    <?php $__empty_2 = true; $__currentLoopData = $categoryproduct->mainproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                        <?php
                            $firstcatepro=App\Models\Product::with([
                                'sizes' => function ($query) {
                                    $query->select('id','product_id','Discount','RegularPrice','SalePrice')->take(1);
                                }
                                ])->where('id',json_decode($product->RelatedProductIds)[0]->productID)->select('id','ProductName')->first();
    
                                        $dis=intval(($firstcatepro->sizes[0]->Discount/$firstcatepro->sizes[0]->RegularPrice)*100)

                        ?>
                        <?php if(isset($firstcatepro)): ?>
                            <div class="my-1 px-1 col-6 col-md-4 col-lg-3" fade-direction="left" fade-time="1">
                                <div class="product-micro-row">
                                     <div class="product_item_inner">
                                       
                                        <div class="product-image">
                                            <a href="<?php echo e(url('view-product/' . $product->ProductSlug)); ?>">
                                                <img src="<?php echo e(asset($product->ProductImage)); ?>">
                                            </a>
                                        </div>
                                        <span style="position: absolute;top: 0;background: green;width: 50px;color: white;border-radius: 4px;font-weight: bold;font-size: 12px;">&nbsp;<?php echo e($dis); ?>% off</span>
                                        <!-- /.product-image -->
                             
                                        <div class="product-text" style="padding-bottom: 4px !important;background: white;">
                                            <div class="pro_name">
                                             <a href="<?php echo e(url('view-product/' . $product->ProductSlug)); ?>" id="f_pro_name"><?php echo e(\Illuminate\Support\Str::limit($product->ProductName, 35)); ?></a>
                                             
                                            <div class="d-flex my-2" style="justify-content:center">
                                                <div class="star" style="padding-top: 5px;">
                                                    <span style="font-weight: bold;color:black;font-size:10px">(<?php echo e(App\Models\Review::where('product_id', $product->id)->get()->count()); ?>)</span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                        <span class="fas fa-star" id="checked"></span>
                                                     
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <del class="old-product-price strong-400" style="color:red">৳
                                                    <?php echo e(round($firstcatepro->sizes[0]->RegularPrice)); ?></del>
                                                <span  class="product-price strong-600" style="color:black">৳ <?php echo e(round($firstcatepro->sizes[0]->SalePrice)); ?></span>
                                            </div>
                                            
                                          </div>
                                        </div>
                                      
                                 </div>
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                    <?php endif; ?>
    
                <div class="text-center">
                     <a href="<?php echo e(url('products/category/'.$categoryproduct->slug)); ?>" class="mb-0 btn btn-sm text-center" style="padding: 3px 8px;height: 26px;color: white;font-weight: bold;margin-top:9px;font-size:15px;background: #94DC10;border: 1px solid #94DC10;">VIEW ALL</a>
                </div>
              
                </div>
            
        <?php else: ?>
        <?php endif; ?>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>

    <div class="row gutters-10">
        <?php if(count($addbottoms) == '2'): ?>
            <?php $__empty_1 = true; $__currentLoopData = $addbottoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $add): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-lg-6 col-6 ps-lg-0">
                    <div class="mb-1 media-banner mb-lg-0">
                        <a href="<?php echo e($add->add_link); ?>" target="_blank" class="banner-container">
                            <img src="<?php echo e(asset($add->add_image)); ?>" alt="<?php echo e(env('APP_NAME')); ?>"
                                class="img-fluid ls-is-cached lazyloaded">
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
        <?php else: ?>
            <?php $__empty_1 = true; $__currentLoopData = $addbottoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $add): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-lg-12 col-12 pr-lg-0">
                    <div class="mb-1 media-banner mb-lg-0">
                        <a href="<?php echo e($add->add_link); ?>" target="_blank" class="banner-container">
                            <img src="<?php echo e(asset($add->add_image)); ?>" alt="<?php echo e(env('APP_NAME')); ?>"
                                class="img-fluid ls-is-cached lazyloaded">
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
        <?php endif; ?> 
        
    </div>
</div>

<?php if($medias->count() > 0): ?>
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="container p-0">
                    <div class="row pt-2 pb-2">
                        <div class="px-2 p-md-3 pt-0" style="padding-bottom:4px !important;padding-top: 8px !important;">
                            <h4 class="m-0" style="text-align: center;padding-bottom: 12px;font-size: 30px;"><b><?php echo e(env('APP_NAME')); ?> Multimedia</b></h4>
                        </div>
                        <?php $__empty_1 = true; $__currentLoopData = $medias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-6 col-md-3 col-lg-3 mb-4">
                                <iframe width="100%"
                                    src="https://www.youtube.com/embed/<?php echo e($media->menu_banner); ?>">
                                </iframe>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h2 class="p-4 text-center"><b>No media found...</b></h2>
                        <?php endif; ?>
                    </div>

                </div>

            </div>
            <!-- /.col -->
        </div>
    </div>
<?php endif; ?>
    <!-- /.container -->

<?php if(Auth::id()): ?>
    <input type="hidden" name="user_id" id="user_id" value="<?php echo e(Auth::id()); ?>">
<?php else: ?>
    <input type="hidden" name="user_id" id="user_id" >
<?php endif; ?>

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
            url: '<?php echo e(url('give/react/')); ?>'+'/love',
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('webview.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/grihomar/public_html/resources/views/webview/content/maincontent.blade.php ENDPATH**/ ?>