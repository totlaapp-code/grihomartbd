<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <strong>Customer Info</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group" id="storenamepart">
                            <label for="storeID">Store Name</label><br>
                            <select id="storeID" class="form-control" disabled>
                                <option value="1"><?php echo e(env('APP_NAME')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="invoiceID">Invoice Number</label>
                            <input type="text" readonly class="form-control" style="cursor: not-allowed;"
                                id="invoiceID" value="<?php echo e($order->invoiceID); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="customerName">Customer Name</label>
                            <input type="text" class="form-control" id="customerName"
                                value="<?php echo e($order->customerName); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="customerPhone">Customer Phone</label>
                            <input type="text" class="form-control" id="customerPhone"
                                value="<?php echo e($order->customerPhone); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="customerAddress">Customer Address</label>
                            <textarea name="" class="form-control" placeholder="Customer Address" id="customerAddress" rows="2"><?php echo e($order->customerAddress); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb-1">
                        <div class="form-group" id="courierdatatbl">
                            <label for="courierID">Courier Name</label><br>
                            <select id="courierID" class="form-control">
                                <option value="<?php echo e($order->courier_id); ?>"><?php echo e($order->courierName); ?></option>
                            </select>
                            <?php
                            use App\Models\Courier;
                            $couriers = Courier::all();

                            ?>
                            <script>
                                var couriers = <?php echo json_encode($couriers); ?>;
                            </script>
                        </div>
                    </div>
                    <div class="col-lg-12 hasCity mb-1" style="display:none">
                        <div class="form-group" id="citydatatbl">
                            <label for="cityID">City Name</label><br>
                            <select id="cityID" type="text" class="form-control">
                                <option value="<?php echo e($order->city_id); ?>"><?php echo e($order->cityName); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 hasZone mb-1" style="display:none">
                        <div class="form-group" id="xonedatatbl">
                            <label for="zoneID">Zone Name</label><br>
                            <select id="zoneID" type="text" class="form-control">
                                <option value="<?php echo e($order->zone_id); ?>"><?php echo e($order->zoneName); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12 hasArea mb-1" style="display:none">
                        <div class="form-group" id="xonedatatbld">
                            <label for="areaID">Area Name</label><br>
                            <select id="areaID" type="text" class="form-control">
                                <option value="<?php echo e($order->area_id); ?>"><?php echo e($order->areaName); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12 mb-1">
                        <div class="form-group">
                            <label for="customerNote">Customer Notes</label>
                            <textarea name="" class="form-control" placeholder="Customer Notes" id="customerNote" rows="2"><?php echo e($order->customerNote); ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="customerAddress">Courier Tracking Link</label>
                            <textarea name="courier_tracking_link" class="form-control" placeholder="Courier Tracking Link" id="courier_tracking_link" rows="1"><?php echo e($order->courier_tracking_link); ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="consigment_id">Courier ID</label>
                            <input type="text" class="form-control" id="consigment_id"
                                value="<?php echo e($order->consigment_id); ?>">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="orderDate">Order Date</label>
                            <input type="text" class="form-control datepicker" value="<?php echo e($order->orderDate); ?>"
                                id="orderDate">
                        </div>
                    </div>
                    <?php if($order->completeDate): ?>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="completeDate">Complete Date</label>
                                <input type="text" class="form-control datepicker" id="completeDate"
                                    value="<?php echo e($order->completeDate); ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <strong>Product Info</strong>
            </div>
            <div class="card-body">
                <table id="productTable" style="width: 100% !important;"
                    class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Code</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="display: none">
                                    <input type="hidden" id="prd" value="old"><input type="text" class="productID" style="width:80px;" value="<?php echo e($product->product_id); ?>"></td>
                                <td>
                                    <span class="Color"> <input type="text" name="color" id="ProductColor"  value="<?php echo e($product->color); ?>" style="    max-width: 60px;"><br><a target="_blank" href="<?php echo e(url('view-product',App\Models\Product::where('id', $product->product_id)->first()->ProductSlug)); ?>"><img src="<?php echo e(asset(App\Models\Product::where('id',$product->product_id)->first()->ProductImage)); ?>" style="width:60px;margin-top:6px;"></a> </span>
                                </td>
                                <td>
                                    <span class="Size">
                                        <select class="form-control" name="size" id="ProductSize" style="width: 70px;">
                                            <option value="">Choose</option>
                                            <?php $__currentLoopData = App\Models\Size::where('product_id',$product->product_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($sz->size); ?>" <?php if($product->size==$sz->size): ?> selected <?php endif; ?>><?php echo e($sz->size); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </span>
                                </td>
                                <td><span class="productCode"><?php echo e($product->productCode); ?></span></td>
                                <td>
                                    <span class="productName"><?php echo e($product->productName); ?><br>
                                        <select class="form-control" name="sigment" id="sigment" style="width: 250px;">
                                            <option value="">Choose</option>
                                            <?php $__currentLoopData = App\Models\Weight::where('product_id',$product->product_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($wi->weight); ?>" <?php if($product->sigment==$wi->weight): ?> selected <?php endif; ?>><?php echo e($wi->weight); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </span>
                                </td>
                                <td><input type="number" class="productQuantity form-control" style="width:80px;" value="<?php echo e($product->quantity); ?>"></td>
                                <td><input type="text" name="productPrice" class="productPrice" value="<?php echo e($product->productPrice); ?>" style="max-width: 60px;"></td>
                                <td><button class="btn btn-sm btn-danger delete-btn"><i class="fa fa-trash"></i></button></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <select id="productID" type="text" style="width: 100%;" class="form-control">
                                    <option value="">Select Product</option>
                                </select>
                            </td>
                        </tr>
                    </tfoot>

                </table>
                <br>

                <br>

                <div class="row">
                  
                    
                    <div class="col-md-6">
                        
                        <div class="form-group mb-2" id="paymntidname">
                            <label>Payment</label> <br>
                            <select id="paymentTypeID" class="form-control select2">
                                <option value="<?php echo e($order->payment_type_id); ?>"><?php echo e($order->paymentTypeName); ?>

                                </option>
                            </select>
                        </div>

                        <div class="form-group paymentID mb-2" id="paymentIDname">
                            <select id="paymentID" class="form-control mb-2" style="width: 100%;">
                                <option value="<?php echo e($order->payment_id); ?>"><?php echo e($order->paymentNumber); ?></option>
                            </select>
                        </div>
                        <div class="form-group paymentAgentNumber">
                            <input type="text" class="form-control" id="paymentAgentNumber"
                                placeholder="Enter Bkash Agent Number" value="<?php echo e($order->paymentAgentNumber); ?>">
                        </div>
                        <div class="form-group d-none">
                            <label>Memo Number</label>
                            <input type="text" class="form-control" id="memo"
                                placeholder="Enter Memo Number"
                                <?php if($order->memo): ?> value="<?php echo e($order->memo); ?>"
                            <?php else: ?> <?php endif; ?>>
                        </div>
                        <div class="form-group">
                            <label for="inputState" class="col-form-label">Choose Status</label>
                            <select id="orderStatus" class="form-control"> 
                                <option value="Pending" <?php if($order->status=='Pending'): ?> selected <?php endif; ?> >Pending</option>
                                <option value="Hold" <?php if($order->status=='Hold'): ?> selected <?php endif; ?> >Hold</option>
                                <option value="Ready to Ship" <?php if($order->status=='Ready to Ship'): ?> selected <?php endif; ?> >Ready to Ship</option>
                                <option value="Packaging" <?php if($order->status=='Packaging'): ?> selected <?php endif; ?> >Packaging</option>
                                <option value="Shipped" <?php if($order->status=='Shipped'): ?> selected <?php endif; ?> >Shipped</option>
                                <option value="Cancelled" <?php if($order->status=='Cancelled'): ?> selected <?php endif; ?> >Cancelled</option>
                                <option value="Completed" <?php if($order->status=='Completed'): ?> selected <?php endif; ?> >Completed</option>
                                <option value="Del. Failed" <?php if($order->status=='Del. Failed'): ?> selected <?php endif; ?> >Del. Failed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <?php if(isset($order->coupon_code)): ?>
                            <div class="form-group row mb-2">
                                <label for="fname"
                                    class="col-sm-4 text-right control-label col-form-label">Coupon</label>
                                <div class="col-sm-8">
                                    <span class="form-control" id="coupon"
                                        style="cursor: not-allowed;"><?php echo e($order->coupon_code); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group row mb-2">
                            <label for="fname" class="col-sm-4 text-right control-label col-form-label">Sub
                                Total</label>
                            <div class="col-sm-8">
                                <span class="form-control" id="subtotal"
                                    style="cursor: not-allowed;"><?php echo e($order->subTotal); ?></span>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="fname"
                                class="col-sm-4 text-right control-label col-form-label">Delivery</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e($order->deliveryCharge); ?>"
                                    id="deliveryCharge">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="fname"
                                class="col-sm-4 text-right control-label col-form-label">Discount</label>
                            <div class="col-sm-8">
                                <input type="text" value="<?php echo e($order->discountCharge); ?>" class="form-control"
                                    id="discountCharge">
                            </div>
                        </div>

                        <div class="form-group row paymentAmount mb-2">
                            <label for="fname"
                                class="col-sm-4 text-right control-label col-form-label">Payment</label>
                            <div class="col-sm-8">
                                <input type="text" value="<?php echo e($order->paymentAmount); ?>" class="form-control"
                                    id="paymentAmount">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname"
                                class="col-sm-4 text-right control-label col-form-label">Total</label>
                            <div class="col-sm-8">
                                <span class="form-control" id="total" style="cursor: not-allowed;">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">

                <button type="button" style="width: 100%;padding: 8px;font-size: 22px;" id="btn-update" value="<?php echo e($order->id); ?>"
                    class="btn btn-block btn-primary"><i class="fa fa-save"></i> Update Order</button>

            </div>


        </div>
    </div>
</div>
<div class="row mt-4 pt-3">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <strong>Order Status</strong>
            </div>
            <div class="card-body">
                <label for="status">Add Note</label>
                <div class="input-group">
                    <input type="text" id="comment" class="form-control" placeholder="Add Notes">
                    <div class="input-group-append">
                        <button class="btn btn-success waves-effect waves-light" id="updateComment"
                            type="button">Update Note</button>
                    </div>
                </div>
                <br>
                <table id="orderCommentTable" style="border-top: 1px solid;" data-id="<?php echo e($order->id); ?>" style="width: 100% !important;"
                    class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Created At</th>
                            <th>Notes</th>
                            <th>User</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>


            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <strong>Old Order</strong>
            </div>
            <div class="card-body">
                <table id="oldOrderTable" style="width: 100% !important;border-top: 1px solid;" data-id="<?php echo e($order->id); ?>"
                    class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Invoice ID</th>
                            <th>Customer Info</th>
                            <th>Products</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>User</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>


            </div>
        </div>


    </div>
</div>
<?php /**PATH /home/hazzamar/grihomartbd.com/resources/views/admin/content/order/edit.blade.php ENDPATH**/ ?>