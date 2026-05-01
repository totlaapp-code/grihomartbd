<?php $__env->startSection('maincontent'); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(env('APP_NAME')); ?>-<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<div class="body-content outer-top-xs">
    <div class="breadcrumb pt-2">
        <div class="container">
            <div class="row">
                <div class="breadcrumb-inner p-0">
                    <ul class="list-inline list-unstyled mb-0">
                        <li><a href="#"
                                style="text-transform: capitalize !important;color: #888;padding-right: 12px;font-size: 12px;">Home
                                > <?php echo e($title); ?>

                            </a></li>
                    </ul>
                </div>
                <!-- /.breadcrumb-inner -->
            </div>
        </div>
        <!-- /.container -->
    </div>
</div>

<div class="container">
    <div class="row mt-4">
        <div class="col-12 p-0">
            <div class="body-content outer-top-xs p-2" style="background: white !important;">
                <?php if(request()->segment(count(request()->segments())) == 'contact_us'): ?>
                    <?php
                        $basicinfo = App\Models\Basicinfo::first();
                    ?>

                    <div class="body-content">
                        <div class="container">
                            <div class="contact-page">
                                <div class="row">
                                    <div class="col-12 contact-map outer-bottom-vs"></div>
                                    <div class="col-md-12 contact-info">
                                        <div class="contact-title">
                                            <h4>Information</h4>
                                        </div>

                                        <div class="address clearfix"><?php echo e($basicinfo->address); ?>

                                        </div>
                                        <br>

                                        <div class="clearfix phone-no">+(88) <?php echo e($basicinfo->phone_one); ?><br> +(88)
                                            <?php echo e($basicinfo->phone_two); ?></div>

                                        <div class="clearfix email"><a
                                                href="mailto:<?php echo e($basicinfo->email); ?>"><?php echo e($basicinfo->email); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.contact-page -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                <?php else: ?>
                    <?php echo $value->value; ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>

<style>
    .breadcrumb {
        padding: 5px 0;
        border-bottom: 1px solid #e9e9e9;
        background-color: #fafafa;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('webview.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/grihomar/public_html/resources/views/webview/content/information/info.blade.php ENDPATH**/ ?>