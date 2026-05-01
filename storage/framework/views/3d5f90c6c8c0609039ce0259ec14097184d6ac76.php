<?php $__env->startSection('maincontent'); ?>
    <?php $__env->startSection('title'); ?>
        <?php echo e(env('APP_NAME')); ?>- Admins
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
                <div class="d-flex align-items-center justify-content-between"  style="width: 50%;float:left;">
                    <h6 class="mb-0">Admins List</h6>
                </div>
                <div class="" style="width: 50%;float:left;">
                    <a href="<?php echo e(route('admin.admins.create')); ?>" class="btn btn-dark" style="color:red;float: right"> + Create Admin</a>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="data-tables">
                    <table class="table table-dark" id="roleinfo" width="100%"  style="text-align: center;">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Admin</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="">
                                    <td><?php echo e($admin->id); ?></td>
                                    <td><?php echo e($admin->name); ?></td>
                                    <td><?php echo e($admin->email); ?></td>
                                    <td style="width:600px">
                                        <?php $__empty_2 = true; $__currentLoopData = $admin->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                            <span class="badge badge-info mr-2" style="    background: #790707;">
                                                <?php echo e($role->name); ?>

                                            </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(url('admin/print',$admin->id)); ?>" target="_blank" type="button" class="btn btn-primary btn-sm mt-2"><i class="fa-solid fa-print"></i></a>
                                        <a href="<?php echo e(route('admin.admins.show',$admin->id)); ?>" type="button" class="btn btn-primary btn-sm mt-2"><i class="bi bi-eye"></i></a>
                                        <a href="<?php echo e(route('admin.admins.edit',$admin->id)); ?>" type="button" class="btn btn-primary btn-sm mt-2"><i class="bi bi-pencil-square"></i></a>
                                        <a href="<?php echo e(route('admin.admins.destroy',$admin->id)); ?>" onclick="event.preventDefault(); document.getElementById('delete-admin-<?php echo e($admin->id); ?>').submit(); " class="btn btn-primary btn-sm mt-2"><i class="bi bi-archive"></i></a>

                                        <form id="delete-admin-<?php echo e($admin->id); ?>" action="<?php echo e(route('admin.admins.destroy',$admin->id)); ?>" method="post">
                                            <?php echo method_field('delete'); ?>
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </td>
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

<script>
$(document).ready( function () {
    $('#roleinfo').DataTable();
} );
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hazzamar/grihomartbd.com/resources/views/backend/content/admins/index.blade.php ENDPATH**/ ?>