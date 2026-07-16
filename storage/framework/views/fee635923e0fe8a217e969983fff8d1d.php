<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Site Settings</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Site Settings</h4>
                        <?php if($items->isEmpty()): ?>
                            <a class="btn btn-sm btn-primary" href="<?php echo e(route('admin.settings.create')); ?>">
                                Add Site Settings <i class="fas fa-arrow-right"></i>
                            </a>
                        <?php endif; ?>
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable_2">
                                <thead>
                                    <tr>
                                        <th>Logo</th>
                                        <th>Favicon</th>
                                        <th>Site Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Social Links</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <?php if($item->logo): ?>
                                                    <img src="<?php echo e(asset('storage/' . $item->logo)); ?>" width="50"
                                                        height="50" style="object-fit:cover; border-radius:4px;">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('assets/images/logo_dark.png')); ?>" width="50"
                                                        height="50" style="object-fit:cover; border-radius:4px;">
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($item->favicon): ?>
                                                    <img src="<?php echo e(asset('storage/' . $item->favicon)); ?>" width="32"
                                                        height="32" style="object-fit:cover; border-radius:4px;">
                                                <?php else: ?>
                                                    <span class="text-muted">Default</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($item->site_name); ?></td>
                                            <td><?php echo e($item->site_email); ?></td>
                                            <td><?php echo e($item->site_phone); ?></td>
                                            <td><?php echo e($item->address); ?></td>
                                            <td>
                                                <?php if($item->facebook_url): ?>
                                                    <a href="<?php echo e($item->facebook_url); ?>" target="_blank"><i
                                                            class="fab fa-facebook-f me-2"></i></a>
                                                <?php endif; ?>
                                                <?php if($item->twitter_url): ?>
                                                    <a href="<?php echo e($item->twitter_url); ?>" target="_blank"><i
                                                            class="fab fa-twitter me-2"></i></a>
                                                <?php endif; ?>
                                                <?php if($item->instagram_url): ?>
                                                    <a href="<?php echo e($item->instagram_url); ?>" target="_blank"><i
                                                            class="fab fa-instagram me-2"></i></a>
                                                <?php endif; ?>
                                                <?php if($item->youtube_url): ?>
                                                    <a href="<?php echo e($item->youtube_url); ?>" target="_blank"><i
                                                            class="fab fa-youtube"></i></a>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-nowrap">
                                                <a href="<?php echo e(route('admin.settings.edit', $item->id)); ?>"
                                                    class="btn btn-xs btn-warning">Edit</a>

                                                <form action="<?php echo e(route('admin.settings.destroy', $item->id)); ?>"
                                                    method="POST" style="display:inline"
                                                    onsubmit="return confirm('Delete site settings? The site will fall back to defaults.')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button class="btn btn-xs btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="8" class="text-center">
                                                No settings configured yet. Click "Add Site Settings" to create one.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->
    </div><!-- container -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Xampp\htdocs\Laravel_Donation_Management_System\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>