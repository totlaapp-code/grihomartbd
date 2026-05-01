<?php $__env->startSection('maincontent'); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(env('APP_NAME')); ?>-Track Order
<?php $__env->stopSection(); ?>

<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class="breadcrumb pt-2">
        <div class="container">
            <div class="row">
                <div class="breadcrumb-inner p-0">
                    <ul class="list-inline list-unstyled mb-0">
                        <li><a href="#"
                                style="text-transform: capitalize !important;color: #888;padding-right: 12px;font-size: 12px;">Home
                                > Track > <span class="active"></span>Order</span>
                            </a></li>
                    </ul>
                </div>
                <!-- /.breadcrumb-inner -->
            </div>
        </div>
        <!-- /.container -->
    </div>
    <section class="mt-1 mb-3">
        <div class="container">
            <div class="px-2 py-1 p-md-3 bg-white shadow-sm">
                <div class="search-area pb-4">
                    <h4 class="m-0 text-center pb-4"> <b>Track You Order Now</b> </h4>
                    <form method="POST" action="<?php echo e(url('track-now')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="control-group d-flex">
                            <input class="search-field m-0" name="invoiceID" placeholder="Enter your phone number">
                            <button type="submit" class="search-button"></button>
                        </div>
                    </form>
                </div>
            </div> 
            <?php if(count($orders)>0): ?>
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>  
                    <div class="col-md-8 m-auto">
                        <div class="card mt-4">
                            <div class="card-header py-2 px-3 heading-6 strong-600 clearfix">
                                <div class="float-left" style="color: red;text-align:center"> <b>Current Status : Order has been <?php echo e($order->status); ?></b> </div>
                            </div>
                            <div class="card-body pb-0">
                                <table class="details-table table" style="border:none">
                                    <tbody style="border:none">
                                        <tr style="border:none">
                                            <td class="w-50 strong-600" style="border:none;font-size: 18px;">Order ID:</td>
                                            <td style="border:none;font-size: 18px;"><?php echo e($order->invoiceID); ?></td>
                                        </tr>
                                        <tr style="border:none">
                                            <td class="w-50 strong-600" style="border:none;font-size: 18px;">Order Status:</td>
                                            <td style="border:none;font-size: 18px;">Order has been <?php echo e($order->status); ?></td>
                                        </tr>
                                        <tr style="border:none">
                                            <td class="w-50 strong-600" style="border:none;font-size: 18px;">Customer Name:</td>
                                            <td style="border:none;font-size: 18px;"><?php echo e($order->customers->customerName); ?></td>
                                        </tr>
                                        <tr style="border:none">
                                            <td class="w-50 strong-600" style="border:none;font-size: 18px;">Customer Phone:</td>
                                            <td style="border:none;font-size: 18px;"><?php echo e($order->customers->customerPhone); ?></td>
                                        </tr>
                                        <tr style="border:none">
                                            <td class="w-50 strong-600" style="border:none;font-size: 18px;">Customer address:</td>
                                            <td style="border:none;font-size: 18px;"><?php echo e($order->customers->customerAddress); ?> </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card">
                                    <div class="card-header py-2 px-3 heading-6 strong-600 clearfix">
                                        <ul class="process-steps clearfix">
                                            <?php if($order->status == 'Pending' || $order->status == 'Hold'): ?>
                                                <li>
                                                    <div class="icon" style="background:#e62e04;color:white">1</div>
                                                    <div class="title" style="color:red">Pending</div>
                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <div class="icon">1</div>
                                                    <div class="title">Pending</div>
                                                </li>
                                            <?php endif; ?>
                                            <?php if($order->status == 'Ready to Ship' ||
                                                $order->status == 'Packaging'): ?>
                                                <li>
                                                    <div class="icon" style="background:#e62e04;color:white">2</div>
                                                    <div class="title" style="color:red">Confirmed</div>
                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <div class="icon">2</div>
                                                    <div class="title">Confirmed</div>
                                                </li>
                                            <?php endif; ?>
            
                                            <?php if($order->status == 'Shipped'): ?>
                                                <li>
                                                    <div class="icon" style="background:#e62e04;color:white">3</div>
                                                    <div class="title" style="color:red">On Going</div>
                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <div class="icon">3</div>
                                                    <div class="title">On Going</div>
                                                </li>
                                            <?php endif; ?>
            
                                            <?php if($order->status == 'Completed'): ?>
                                                <li>
                                                    <div class="icon" style="background:#e62e04;color:white">4</div>
                                                    <div class="title" style="color:red">Delivered</div>
                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <div class="icon">4</div>
                                                    <div class="title">Canceled</div>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                         <table class="">
                                            <tr>
                                                <th style="width: 60%">Product</th>
                                                <th style="width: 20%">Quantity</th>
                                                <th style="width: 20%">Price</th>
                                            </tr>
                                            <?php
                                            $products = DB::table('orderproducts')->where('order_id', '=', $order->id)->get();
                                            foreach ($products as $product) { ?>
                                            <tr>
                                                <td><img src="<?php echo e(asset(App\Models\Product::where('id',$product->product_id)->first()->ProductImage)); ?>" style="width:60px">
                                                    <?php echo e($product->productName); ?> <?php if($product->color && $product->size): ?>
                                                        (Colour: <?php echo e($product->color); ?> , Size: <?php echo e($product->size); ?>)
                                                    <?php elseif($product->size): ?>
                                                        (Size: <?php echo e($product->size); ?>)
                                                    <?php elseif($product->color): ?>
                                                        (Size: <?php echo e($product->color); ?>)
                                                    <?php else: ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($product->quantity); ?></td>
                                                <td><?php echo e($product->productPrice); ?> Tk</td>
                                            </tr>
                                            <?php } ?>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="1" style="border: none;"></td>
                                                    <th>Delivery : </th>
                                                    <td><?php echo e($order->deliveryCharge); ?> Tk</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="1" style="border: none;"></td>
                                                    <th>Total : </th>
                                                    <td><?php echo e($order->subTotal+$order->paymentAmount+$order->discountCharge); ?> Tk</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="1" style="border: none;"></td>
                                                    <th>Discount : </th>
                                                    <td><?php if($order->discountCharge>0): ?><?php echo e($order->discountCharge); ?><?php else: ?> 0 <?php endif; ?> Tk</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="1" style="border: none;"></td>
                                                    <th>Paid : </th>
                                                    <td><?php if($order->paymentAmount>0): ?><?php echo e($order->paymentAmount); ?><?php else: ?> 0 <?php endif; ?> Tk</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="1" style="border: none;"></td>
                                                    <th>Due : </th>
                                                    <td><?php echo e($order->subTotal); ?> Tk</td>
                                                </tr>
                                
                                        </table>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                      
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="card mt-4">
                        <div class="card-header py-2 px-3 heading-6 strong-600 clearfix">
                            <div class="float-left" style="color: red;text-align:center">No Records Found.Please call
                                our customer care or use Live Chat
                            </div>
                        </div>
                    </div>
            <?php endif; ?> 
            <?php else: ?>
            
            <?php endif; ?>
        </div>
    </section>

</div>

<style>
    .process-steps {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .process-steps li {
        width: 25%;
        float: left;
        text-align: center;
        position: relative;
    }

    .process-steps li .icon {
        height: 30px;
        width: 30px;
        margin: auto;
        background: #fff;
        border-radius: 50%;
        line-height: 30px;
        font-size: 14px;
        font-weight: 700;
        color: #adadad;
        position: relative;
    }

    .process-steps li .title {
        font-weight: 600;
        font-size: 13px;
        color: #777;
        margin-top: 8px;
        margin-bottom: 0;
    }

    .process-steps li+li:after {
        position: absolute;
        content: "";
        height: 3px;
        width: calc(100% - 30px);
        background: #fff;
        top: 14px;
        z-index: 0;
        right: calc(50% + 15px);
    }

    .breadcrumb {
        padding: 5px 0;
        border-bottom: 1px solid #e9e9e9;
        background-color: #fafafa;
    }

    .search-area .search-button {
        border-radius: 0px 3px 3px 0px;
        display: inline-block;
        float: left;
        margin: 0px;
        padding: 5px 15px 6px;
        text-align: center;
        background-color: #e62e04;
        border: 1px solid #e62e04;
    }

    .search-area .search-button:after {
        color: #fff;
        content: "\f002";
        font-family: fontawesome;
        font-size: 16px;
        line-height: 9px;
        vertical-align: middle;
    }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('webview.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hazzamar/grihomartbd.com/resources/views/webview/content/cart/trackorder.blade.php ENDPATH**/ ?>