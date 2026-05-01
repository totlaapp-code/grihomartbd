<?php $__env->startSection('maincontent'); ?>

    <?php $__env->startSection('title'); ?>
        <?php echo e(env('APP_NAME')); ?>-See Profile
    <?php $__env->stopSection(); ?>
<?php
    $admin=App\Models\Admin::where('id',Auth::guard('admin')->user()->id)->first();
?>
<div class="container-fluid pt-4 px-4">
    
        <div class="bg-secondary rounded h-100 p-4">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <h6 class="mb-4">My Profile - <?php echo e($admin->name); ?></h6>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" value="<?php echo e($admin->name); ?>" id="floatingInput" placeholder="Your name here" required>
                                <label for="floatingInput" style="color: red">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" value="<?php echo e($admin->email); ?>" id="floatingInput" placeholder="name@ayebazar.com" required>
                                <label for="floatingInput" style="color: red">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="phone" value="<?php echo e($admin->phone); ?>" id="floatingInput" placeholder="Type Phone" required>
                                <label for="floatingInput" style="color: red">Phone</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="address" value="<?php echo e($admin->address); ?>" id="floatingInput" placeholder="Address" required>
                                <label for="floatingInput" style="color: red">Address</label>
                            </div>
                            <div class="form-group mb-3">
                                 <lable>Choode Region</lable>
                                 <select name="region" class="form-control" required>
                                     <option value="Islam" <?php if($admin->region=='Islam'): ?> selected <?php endif; ?>>Islam</option>
                                     <option value="Hinduism" <?php if($admin->region=='Hinduism'): ?> selected <?php endif; ?>>Hinduism</option>
                                     <option value="Christianity" <?php if($admin->region=='Christianity'): ?> selected <?php endif; ?>>Christianity</option>
                                     <option value="Buddhism" <?php if($admin->region=='Buddhism'): ?> selected <?php endif; ?>>Buddhism</option>
                                 </select>
                            </div>
                            <div class="form-group mb-3">
                                 <lable>Choode Gender</lable>
                                 <select name="gender" class="form-control" required>
                                     <option value="Male" <?php if($admin->region=='Male'): ?> selected <?php endif; ?>>Male</option>
                                     <option value="Female" <?php if($admin->region=='Female'): ?> selected <?php endif; ?>>Female</option> 
                                 </select>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="quaification" value="<?php echo e($admin->quaification); ?>" id="floatingInput" placeholder="Qualification" required>
                                <label for="floatingInput" style="color: red">Qualification</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="designation" value="<?php echo e($admin->designation); ?>" id="floatingInput" placeholder="Designation" required>
                                <label for="floatingInput" style="color: red">Designation</label>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="floatingInput" style="color: red">Nid</label>
                                <input type="file" class="form-control" name="nid" id="floatingInput"  > 
                                <img src="<?php echo e(asset($admin->nid)); ?>" style="width:120px;">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="floatingInput" style="color: red">Join Letter</label>
                                <input type="file" class="form-control" name="join_letter" id="floatingInput"  > 
                                <img src="<?php echo e(asset($admin->join_letter)); ?>" style="width:120px;">
                            </div>
                            
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" >
                                <label for="floatingPassword" style="color: red">Password</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" onchange="checkpassword()" name="confirmpassword" id="floatingConfirmPassword" placeholder="Confirm Password" >
                                <label for="floatingPassword" style="color: red">Confirm Password</label>
                                <label for="floatingPassword" id="checkText" style="color: red;display:none">Password does not match !</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="father_name" value="<?php echo e($admin->father_name); ?>" id="floatingInput" placeholder="Your father name here" required>
                                <label for="floatingInput" style="color: red">Father Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="father_phone" value="<?php echo e($admin->father_phone); ?>" id="floatingInput" placeholder="Father phone here" required>
                                <label for="floatingInput" style="color: red">Father Phone</label>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="floatingInput" style="color: red">Father Nid</label>
                                <input type="file" class="form-control" name="father_nid" id="floatingInput"  > 
                                <img src="<?php echo e(asset($admin->father_nid)); ?>" style="width:120px;">
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="mother_name" value="<?php echo e($admin->mother_name); ?>" id="floatingInput" placeholder="Your mother name here" required>
                                <label for="floatingInput" style="color: red">Mother Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="mother_phone" value="<?php echo e($admin->mother_phone); ?>" id="floatingInput" placeholder="Mother phone here" required>
                                <label for="floatingInput" style="color: red">Mother Phone</label>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="floatingInput" style="color: red">Mother Nid</label>
                                <input type="file" class="form-control" name="mother_nid" id="floatingInput"  > 
                                <img src="<?php echo e(asset($admin->mother_nid)); ?>" style="width:120px;">
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="local_guardian" value="<?php echo e($admin->local_guardian); ?>" id="floatingInput" placeholder="Local Guardian" required>
                                <label for="floatingInput" style="color: red">Local Guardian Name</label>
                            </div> 
                            
                            <div class="form-group mb-3">
                                <label for="floatingInput" style="color: red">Local Guardian Nid</label>
                                <input type="file" class="form-control" name="localguardian_nid" id="floatingInput"  > 
                                <img src="<?php echo e(asset($admin->localguardian_nid)); ?>" style="width:120px;">
                            </div>
                            <div class="form-group mb-3">
                                <label for="floatingInput" style="color: red">House Electricity Bill</label>
                                <input type="file" class="form-control" name="house_electricity_bill" id="floatingInput"  > 
                                <img src="<?php echo e(asset($admin->house_electricity_bill)); ?>" style="width:120px;">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="floatingInput" style="color: red">CV File</label>
                                <input type="file" class="form-control" name="cv" id="floatingInput"  > 
                                <img src="<?php echo e(asset($admin->cv)); ?>" style="width:120px;">
                            </div>
                             
                            

                            
                        </div>
                         
                    </div>

                </div>
            </div>
        </div>
     
</div>

<script>

    function checkpassword(){
        var pass =$('#floatingPassword').val();
        var confirmpass =$('#floatingConfirmPassword').val();
        if(pass==confirmpass){
            $('#floatingConfirmPassword').css('border','none');
        }else{

            $('#floatingConfirmPassword').css('border','1px solid white');
        }
    }

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/grihomar/public_html/resources/views/admin/settings/accountsettings.blade.php ENDPATH**/ ?>