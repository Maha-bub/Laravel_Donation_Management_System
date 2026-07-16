<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('')); ?>assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Content-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Categories</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->


        <div class="row justify-content-center col-12">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Category List</h4>
                        <a class="btn btn-sm btn-primary " href="<?php echo e(route('admin.category.create')); ?>">Add New Category<i
                                class="fas fa-arrow-right"></i></a>


                    </div><!--end card-header-->
                    <div class="card-body pt-0">

                        
                        <?php if(session('success')): ?>
                            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                        <?php endif; ?>
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                        <?php endif; ?>

                        <div class="table-responsive">
                            <table class="table datatable" id="datatable_2">
                                <thead class="">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Campaigns</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($item->id); ?></td>
                                            <td><?php echo e($item->name); ?></td>
                                            <td><?php echo e($item->campaigns_count); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.category.edit', $item->id)); ?>"
                                                    class="btn btn-xs btn-warning">Edit</a>

                                                <form action="<?php echo e(route('admin.category.destroy', $item->id)); ?>"
                                                    method="POST" style="display:inline"
                                                    onsubmit="return confirm('Delete this category?')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button class="btn btn-xs btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="4" class="text-center">No categories found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-sm btn-primary csv">Export CSV</button>
                            <button type="button" class="btn btn-sm btn-primary sql">Export SQL</button>
                            <button type="button" class="btn btn-sm btn-primary txt">Export TXT</button>
                            <button type="button" class="btn btn-sm btn-primary json">Export JSON</button>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->
    </div><!-- container -->
<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('')); ?>assets/libs/simple-datatables/umd/simple-datatables.js"></script>
    <script src="<?php echo e(asset('')); ?>assets/js/pages/datatable.init.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_Donation_Management_System\resources\views/admin/category/index.blade.php ENDPATH**/ ?>