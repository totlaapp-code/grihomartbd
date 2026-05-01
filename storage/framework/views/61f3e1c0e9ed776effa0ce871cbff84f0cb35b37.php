<div class="row pt-2 pb-2" id="cateoryPro" style="background: white;">

    <?php $__empty_1 = true; $__currentLoopData = $slugproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            $firstcatepro=App\Models\Product::where('id',json_decode($categoryproduct->RelatedProductIds)[0]->productID)->first();
        ?>
        <?php if(isset($firstcatepro)): ?>
            <div class="col-6 col-md-4 col-lg-3 mb-2">
               <div class="product-micro-row">
                     <div class="product_item_inner">
                        <div class="product-image">
                            <a href="<?php echo e(url('view-product/' . $categoryproduct->ProductSlug)); ?>">
                                <img src="<?php echo e(asset($categoryproduct->ProductImage)); ?>">
                            </a>
                        </div>
                        <?php
                            $sizesss=App\Models\Size::where('product_id',$firstcatepro->id)->first();
                            $dis=intval(($sizesss->Discount/$sizesss->RegularPrice)*100);
                        ?>
                        
                        <?php if(isset($sizesss)): ?>
                            
                            <span style="position: absolute;top: 0;background: green;width: 50px;color: white;border-radius: 4px;font-weight: bold;font-size: 12px;">&nbsp;<?php echo e($dis); ?>% off</span>
                        <?php else: ?>
                             
                        <?php endif; ?>
                        <!-- /.product-image -->
                        <div class="product-text" style="padding-bottom: 4px !important;background: white;">
                            <div class="pro_name">
                             <a href="<?php echo e(url('view-product/' . $categoryproduct->ProductSlug)); ?>" id="f_pro_name"><?php echo e($categoryproduct->ProductName); ?></a>
                             
                            <div class="d-flex my-2" style="justify-content:center">
                                <div class="star" style="padding-top: 5px;">
                                    <span style="font-weight: bold;color:black;font-size:10px">(<?php echo e(App\Models\Review::where('product_id', $categoryproduct->id)->get()->count()); ?>)</span>
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
                                <span class="product-price strong-600" style="color:black">৳ <?php echo e(round($firstcatepro->sizes[0]->SalePrice)); ?></span>
                            </div>
                            
                          </div>
                        </div>
                         <div class="pro_btn">
                          <form name="form" action="<?php echo e(url('add-to-cart')); ?>" method="POST" enctype="multipart/form-data" style="width: 100%;float: left;text-align: center;">
                                <?php echo method_field('POST'); ?>
                                <?php echo csrf_field(); ?>
                                <input type="text" name="color" id="product_colorold" hidden>
                                <input type="text" name="size" id="product_sizeold" hidden>
                                <input type="text" name="product_id" value="<?php echo e($firstcatepro->id); ?>" hidden>
                                <input type="text" name="qty" value="1" id="qtyor" hidden>
                                <button class="btn  btn-sm mb-0 btn-block"  id="purcheseBtn">অর্ডার করুন</button>
                            </form>
                        </div>
                 </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <h2 class="p-4 text-center"><b>No Products found...</b></h2>
    <?php endif; ?>
</div>
<?php /**PATH /home/grihomar/public_html/resources/views/webview/content/product/slugview.blade.php ENDPATH**/ ?>