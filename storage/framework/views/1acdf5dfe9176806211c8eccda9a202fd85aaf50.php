<?php $__env->startSection('maincontent'); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(env('APP_NAME')); ?>-Search Products
<?php $__env->stopSection(); ?>

<style>
    #checked {
        color: orange;
    }
    .star{
        font-size: 8px !important;
    }

    #featureimageCt {
        height: 300px;
        width: auto;
        padding: 2px;
        padding-top: 0;
    }
    @media  only screen and (max-width: 600px) {
       #featureimageCt {
            height: 220px;
            width: auto;
            padding: 2px;
            padding-top: 0;
        }
    }
</style>
<div class="body-content outer-top-xs">
    <div class="breadcrumb pt-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner p-0">
                        <ul class="list-inline list-unstyled mb-0">
                            <li><a href="#"
                                    style="text-transform: capitalize !important;color: #888;padding-right: 12px;font-size: 12px;">Home
                                    > Search > <span class="active"></span>Products</span>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.breadcrumb-inner -->
            </div>
        </div>
        <!-- /.container -->
    </div>


    <div class='container'>
        <div class='row'>
            <!-- /.sidebar -->
            <div class='col-md-12' id="cateoryPro">
                <div class="container" >

                    <div class="row pt-2 pb-2" style="background: white;">

                        <?php $__empty_1 = true; $__currentLoopData = $searchproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <?php
                                $firstcatepro=App\Models\Product::where('id',json_decode($product->RelatedProductIds)[0]->productID)->first();
                            ?>
                            <?php if(isset($firstcatepro)): ?>
                                <div class="mb-2 col-6 col-md-4 col-lg-2">
                                    <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col-12">
                                                        <div class="product-image" style="position: relative;">
                                                            <div class="text-center image">
                                                                <a href="<?php echo e(url('view-product/' . $product->ProductSlug)); ?>">
                                                                    <img src="<?php echo e(asset($product->ProductImage)); ?>" >
                                                                </a>
                                                            </div> 
                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-12">
                                                        <div class="p-2 infofe p-md-2" style="border-top:none;background: white;">
                                                            <div class="product-info">
                                                                <h2 class="name text-truncate" id="f_name"><a
                                                                        href="<?php echo e(url('view-product/' . $product->ProductSlug)); ?>"
                                                                        id="f_pro_name"><?php echo e($firstcatepro->ProductName); ?></a>
                                                                </h2>
                                                            </div>
        
                                                            <div class="d-flex" style="justify-content:space-between">
                                                                <div class="star" style="padding-top: 5px;">
                                                                    <span style="font-weight: bold;color:black;font-size:10px">(<?php echo e(App\Models\Review::where('product_id', $firstcatepro->id)->select('id')->get()->count()); ?>)</span>
                                                                     
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span>
                                                                        <span class="fas fa-star" id="checked"></span> 
                                                                </div>
        
                                                            </div>
        
                                                           <div class="price-box">
                                                                <del class="old-product-price strong-400">৳
                                                                    <?php echo e(round($firstcatepro->sizes[0]->RegularPrice)); ?></del>
                                                                <span
                                                                    class="product-price strong-600">৳ <?php echo e(round($firstcatepro->sizes[0]->SalePrice)); ?></span>
                                                            </div>
        
                                                        </div>
        
                                                        <a href="<?php echo e(url('view-product/' . $product->ProductSlug)); ?>">
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
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h2 class="p-4 text-center"><b>No Products found...</b></h2>
                        <?php endif; ?>
                    </div>

                </div>
                <!-- /.category-product -->


                <!-- /.tab-content -->
                <div class="clearfix filters-container">
                    <div class="text-right">
                        <div class="pagination-container">

                        </div>
                        <!-- /.pagination-container -->
                    </div>
                    <!-- /.text-right -->

                </div>
                <!-- /.filters-container -->

            </div>
            <!-- /.col -->
        </div>

        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->

</div>
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
                    $('#cateoryPro #likereactof' + id).text(data.total);
                    $('#cateoryPro #likereactdone' + id).css('color', 'orange');
                }else if (data.sigment == 'unlike') {
                    $('#cateoryPro #likereactof' + id).text(data.total);
                    $('#cateoryPro #likereactdone' + id).css('color', 'black');
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
                    $('#cateoryPro #lovereactof' + id).text(data.total);
                    $('#cateoryPro #lovereactdone' + id).css('color', 'orange');
                } else {
                    $('#cateoryPro #lovereactof' + id).text(data.total);
                    $('#cateoryPro #lovereactdone' + id).css('color', 'black');
                }
            },
            error: function(error) {
                console.log('error');
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('webview.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hazzamar/grihomartbd.com/resources/views/webview/content/product/mainsearch.blade.php ENDPATH**/ ?>