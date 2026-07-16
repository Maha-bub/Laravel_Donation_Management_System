<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Donation Details</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.donations.index')); ?>">Donations</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Donation #<?php echo e($item->id); ?></h4>
                    <a class="btn btn-sm btn-info" href="<?php echo e(route('admin.donations.index')); ?>"><i
                            class="fas fa-arrow-left"></i> Back</a>
                </div><!--end card-header-->
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <th style="width:180px;">Donor Name</th>
                            <td><?php echo e($item->name); ?></td>
                        </tr>
                        <tr>
                            <th>Campaign</th>
                            <td><?php echo e($item->campaign->name ?? '-'); ?></td>
                        </tr>
                        <tr>
                            <th>Amount</th>
                            <td>৳<?php echo e(number_format((float) $item->amount)); ?></td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td><?php echo e($item->payment_method); ?></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><?php echo e($item->created_at->format('d M Y, h:i A')); ?></td>
                        </tr>
                    </table>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_Donation_Management_System\resources\views/admin/donations/show.blade.php ENDPATH**/ ?>