<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('')); ?>assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container-fluid col-12">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Datatable</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Approx</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item"><a href="#">Tables</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item active">Datatable</li>
                        </ol>
                    </div>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>


        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Campaign List</h4>
                        <a class="btn btn-sm btn-info " href="<?php echo e(route('admin.campaignlist.create')); ?>">New Campaign <i
                                class="fas fa-arrow-right"></i> </a>


                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable_2">
                                <thead class="">
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Goal_amount</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($item->id); ?></td>
                                            <td>
                                                <img src="<?php echo e(asset('images/' . $item->image)); ?>" alt="Campaign Image"
                                                    width="60" height="60" class="rounded">
                                            </td>
                                            <td><?php echo e($item->name); ?></td>
                                            <td><?php echo e($item->category->name ?? 'N/A'); ?></td>
                                            <td>
                                               <?php echo e($item->goal_amount); ?> 
                                            </td>
                                            <td>
                                                 <span class="badge <?php echo e($item->status == 0 ? 'bg-success' : 'bg-danger'); ?>">
                                                    <?php echo e($item->status == 0 ? 'Active' : 'Deactive'); ?>

                                                </span>
                                            </td>
                                            <td>
                                                <span class="me-2"></span>

                                                <!-- Edit Icon Button -->
                                                <a href="<?php echo e(route('admin.campaignlist.edit', $item->id)); ?>"
                                                    class="text-primary me-2" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <!-- Delete Icon Button -->
                                                <form action="<?php echo e(route('admin.campaignlist.destroy', $item->id)); ?>"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Are you sure?')">
                                                    <?php echo csrf_field(); ?>

                                                    <?php echo method_field('DELETE'); ?>

                                                    <button class="btn p-0 border-0 text-danger" type="submit">
                                                        <i class="fas fa-trash-alt"></i>Delete
                                                    </button>
                                                </form>


                                            </td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="7" class="text-center">No campaigns found.</td>
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

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Xampp\htdocs\Laravel_Donation_Management_System\resources\views/admin/campaigns/index.blade.php ENDPATH**/ ?>