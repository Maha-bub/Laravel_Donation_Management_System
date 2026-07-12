<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Edit Campaign</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.campaignlist.index')); ?>">Campaigns</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item active">Edit</li><!--end nav-item-->
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Edit Campaign</h4>
                    <a class="btn btn-sm btn-info" href="<?php echo e(route('admin.campaignlist.index')); ?>"><i class="fas fa-arrow-left"></i>
                        Back</a>
                </div><!--end card-header-->

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($e); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="card-body pt-0">
                    <form class="row g-3" action="<?php echo e(route('admin.campaignlist.update', $campaignlist->id)); ?>"
                        enctype="multipart/form-data" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="col-md-6">
                            <label for="name" class="form-label">Campaign Title</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="<?php echo e(old('name', $campaignlist->name)); ?>" maxlength="100" required>
                        </div>

                        <div class="col-md-6">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="" disabled>Choose Category</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"
                                        <?php echo e(old('category_id', $campaignlist->category_id) == $category->id ? 'selected' : ''); ?>>
                                        <?php echo e($category->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Short Description</label>
                            <textarea name="description" class="form-control row-3" id="description" maxlength="500" rows="3"><?php echo e(old('description', $campaignlist->description)); ?></textarea>
                        </div>

                        <div class="col-md-4">
                            <label for="goal_amount" class="form-label">Goal Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">৳</span>
                                <input type="number" step="0.01" min="1" name="goal_amount" class="form-control"
                                    id="goal_amount" value="<?php echo e(old('goal_amount', $campaignlist->goal_amount)); ?>" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date"
                                value="<?php echo e(old('start_date', optional($campaignlist->start_date)->format('Y-m-d'))); ?>">
                        </div>

                        <div class="col-md-4">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" class="form-control" id="end_date"
                                value="<?php echo e(old('end_date', optional($campaignlist->end_date)->format('Y-m-d'))); ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($statusOption); ?>"
                                        <?php echo e(old('status', $campaignlist->status) == $statusOption ? 'selected' : ''); ?>>
                                        <?php echo e($statusOption); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="photo">Featured Image</label>
                            <?php if($campaignlist->image): ?>
                                <div class="mb-2">
                                    <img src="<?php echo e(asset('images/' . $campaignlist->image)); ?>" width="80"
                                        style="border-radius:4px;">
                                </div>
                            <?php endif; ?>
                            <input class="form-control" id="photo" name="photo" type="file" accept="image/*">
                            <small class="text-muted">Leave empty to keep the current image.</small>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-warning" type="submit">Update Campaign</button>
                        </div>
                    </form><!--end form-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Xampp\htdocs\Laravel_Donation_Management_System\resources\views/admin/campaigns/edit.blade.php ENDPATH**/ ?>