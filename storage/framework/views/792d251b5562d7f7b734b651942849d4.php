<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Site Settings</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.settings.index')); ?>">Settings</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item active">Edit Settings</li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->

    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Edit Site Settings</h4>
                    <a class="btn btn-sm btn-info" href="<?php echo e(route('admin.settings.index')); ?>"><i
                            class="fas fa-arrow-left"></i> Back</a>
                </div><!--end card-header-->

                <div class="card-body pt-0">
                    <form action="<?php echo e(route('admin.settings.update', $item->id)); ?>" enctype="multipart/form-data"
                        method="POST">
                        <?php echo method_field('PUT'); ?>
                        <?php echo $__env->make('admin.settings.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </form>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Xampp\htdocs\Laravel_Donation_Management_System\resources\views/admin/settings/edit.blade.php ENDPATH**/ ?>