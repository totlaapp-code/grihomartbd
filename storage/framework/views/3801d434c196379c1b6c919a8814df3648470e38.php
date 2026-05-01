<div class="products best-product" id="cateoryPro">
    <?php if(count($searchcontents) > 0): ?>
        <?php $__empty_1 = true; $__currentLoopData = $searchcontents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-6 col-md-4 col-lg-2 mb-4">
            <div class="product">
                    <div class="product-micro">
                        <div class="row product-micro-row">
                            <div class="col-12">
                                <div class="product-image" style="position: relative;">
                                    <div class="image text-center">
                                        <a href="<?php echo e(url('product/' . $categoryproduct->ProductSlug)); ?>">
                                            <img src="<?php echo e(asset($categoryproduct->ViewProductImage)); ?>"
                                                alt="<?php echo e($categoryproduct->ProductName); ?>" id="featureimage">
                                        </a>
                                    </div>
                                    <?php if(App\Models\Size::where('product_id',$categoryproduct->id)->first()): ?>
                                        <span id="discountpart"> <p id="pdis">SAVE ৳<?php echo e(round(App\Models\Size::where('product_id',$categoryproduct->id)->first()->Discount)); ?></p></span>
                                    <?php else: ?>
                                        <span id="discountpart"> <p id="pdis">SAVE ৳<?php echo e(round(App\Models\Weight::where('product_id',$categoryproduct->id)->first()->Discount)); ?></p></span>
                                    <?php endif; ?>

                                </div>
                                <!-- /.product-image -->
                            </div>
                            <!-- /.col -->
                            <div class="col-12">
                                <div class="infofe p-md-3 p-2" style="border: 1px solid #e3e1e1;border-top:none;">
                                    <div class="product-info">
                                        <h2 class="name text-truncate" id="f_name"><a
                                                href="<?php echo e(url('product/' . $categoryproduct->ProductSlug)); ?>"
                                                id="f_pro_name"><?php echo e($categoryproduct->ProductName); ?></a>
                                        </h2>
                                    </div>
                                    <?php
                                        $review = App\Models\Review::where('product_id', $categoryproduct->id)->avg(
                                            'rating',
                                        );
                                    ?>
                                    <div class="d-flex" style="justify-content:space-between">
                                        <div class="star" style="padding-top: 5px;">
                                            <span style="font-weight: bold;color:black;font-size:10px">(<?php echo e(App\Models\Review::where('product_id', $categoryproduct->id)->get()->count()); ?>)</span>
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
                                        <div class="like">
                                            <div class="d-flex" style="justify-content: space-around;font-size: 14px;">
                                                <span style="padding-right:14px;"><span class="sts" style="padding-right: 2px;font-size:12px;"
                                                        id="likereactof<?php echo e($categoryproduct->id); ?>"><?php echo e(App\Models\React::where('product_id', $categoryproduct->id)->where('sigment','like')->get()->count()); ?></span><i
                                                        <?php if(App\Models\React::where('product_id', $categoryproduct->id)->whereIn('user_id', [\Request::ip(),Auth::id()])->where('sigment','like')->first()): ?> style="color:green !important" <?php endif; ?> class="fas fa-thumbs-up" id="likereactdone<?php echo e($categoryproduct->id); ?>"
                                                        onclick="givereactlike(<?php echo e($categoryproduct->id); ?>)"></i></span>
                                                <span><span class="sts" style="padding-right: 2px;font-size:12px;"
                                                        id="lovereactof<?php echo e($categoryproduct->id); ?>"><?php echo e(App\Models\React::where('product_id', $categoryproduct->id)->where('sigment','love')->get()->count()); ?></span><i
                                                        <?php if(App\Models\React::where('product_id', $categoryproduct->id)->whereIn('user_id', [\Request::ip(),Auth::id()])->where('sigment','love')->first()): ?> style="color:red !important" <?php endif; ?> class="fas fa-heart" id="lovereactdone<?php echo e($categoryproduct->id); ?>"
                                                        onclick="givereactlove(<?php echo e($categoryproduct->id); ?>)"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(App\Models\Size::where('product_id',$categoryproduct->id)->first()): ?>
                                    <div class="price-box">
                                        <del class="old-product-price strong-400">৳
                                            <?php echo e(round(App\Models\Size::where('product_id',$categoryproduct->id)->first()->RegularPrice)); ?></del>
                                        <span
                                            class="product-price strong-600">৳ <?php echo e(round(App\Models\Size::where('product_id',$categoryproduct->id)->first()->SalePrice)); ?></span>
                                    </div>
                                    <?php else: ?>
                                    <div class="price-box">
                                        <del class="old-product-price strong-400">৳
                                            <?php echo e(round(App\Models\Weight::where('product_id',$categoryproduct->id)->first()->RegularPrice)); ?></del>
                                        <span
                                            class="product-price strong-600">৳ <?php echo e(round(App\Models\Weight::where('product_id',$categoryproduct->id)->first()->SalePrice)); ?></span>
                                    </div>
                                    <?php endif; ?>

                                </div>

                                <a href="<?php echo e(url('product/' . $categoryproduct->ProductSlug)); ?>">
                                <button class="btn btn-danger btn-sm mb-0 btn-block"
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
    <?php else: ?>
        <div class="product" id="categoryslider" style="text-align: center">
            No Products found !............
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/grihomar/public_html/resources/views/webview/content/product/search.blade.php ENDPATH**/ ?>