<?php $__env->startSection('maincontent'); ?>
    <?php $__env->startSection('title'); ?>
        <?php echo e(env('APP_NAME')); ?>- Users
    <?php $__env->stopSection(); ?>
<style>
    div#roleinfo_length {
        color: red;
    }
    div#roleinfo_filter {
        color: red;
    }
    div#roleinfo_info {
        color: red;
    }
</style>

<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="h-100 bg-secondary rounded p-4 pb-0">
                <div class="d-flex"  style="width: 100%;float:left;">
                    <h6 class="mb-0">Block Users List</h6>
                </div> 
                
                <form action="<?php echo e(url('admin/block-now')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="d-flex"  style="width: 50%;float:right;">
                        <input type="text" name="number" id="number" class="form-control" style="width:200px">
                        <button class="btn btn-warning">Submit </button>
                    </div> 
                </form>
                
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="data-tables">
                    <table class="table table-dark" id="roleinfo" width="100%"  style="text-align: center;">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>User</th>
                                <th>Phone</th>  
                                <th>Status</th>  
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = App\Models\User::where('status','Block')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="">
                                    <td><?php echo e($user->id); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td> 
                                    <td><?php echo e($user->status); ?> <a class="btn btn-danger btn-sm" href="<?php echo e(url('admin/unblock',$user->id)); ?>">Unblock</a></td>  
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>

 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/grihomar/public_html/resources/views/backend/content/users/block.blade.php ENDPATH**/ ?>