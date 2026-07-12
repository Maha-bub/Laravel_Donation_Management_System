<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Campaign Details</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.campaignlist.index')); ?>">Campaigns</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item active"><?php echo e($campaign->name); ?></li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card">
                <img src="<?php echo e(asset('images/' . $campaign->image)); ?>" class="card-img-top" alt="<?php echo e($campaign->name); ?>"
                    style="height:220px;object-fit:cover;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h4 class="mb-0"><?php echo e($campaign->name); ?></h4>
                        <span class="badge <?php echo e($campaign->status_badge_class); ?>"><?php echo e($campaign->status); ?></span>
                    </div>
                    <p class="text-muted mb-1">Category: <?php echo e($campaign->category->name ?? 'N/A'); ?></p>
                    <p class="text-muted mb-3"><?php echo e($campaign->description ?: 'No description provided.'); ?></p>

                    <div class="progress mb-2" style="height: 10px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo e($campaign->progress); ?>%;"></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">৳<?php echo e(number_format($campaign->raised_amount, 2)); ?> raised</small>
                        <small class="text-muted"><?php echo e($campaign->progress); ?>% of ৳<?php echo e(number_format($campaign->goal_amount, 2)); ?></small>
                    </div>

                    <hr>

                    <ul class="list-unstyled mb-0">
                        <li class="mb-1"><strong>Start Date:</strong> <?php echo e(optional($campaign->start_date)->format('d M Y') ?? '—'); ?></li>
                        <li class="mb-1"><strong>End Date:</strong> <?php echo e(optional($campaign->end_date)->format('d M Y') ?? '—'); ?></li>
                        <li class="mb-1"><strong>Created By:</strong> <?php echo e($campaign->creator->name ?? 'N/A'); ?></li>
                        <li class="mb-1"><strong>Created At:</strong> <?php echo e($campaign->created_at->format('d M Y')); ?></li>
                        <li class="mb-1"><strong>Donation Count:</strong> <?php echo e($campaign->donations_count); ?></li>
                    </ul>

                    <div class="d-flex gap-2 mt-3">
                        <a href="<?php echo e(route('admin.campaignlist.edit', $campaign->id)); ?>" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="<?php echo e(route('admin.campaignlist.destroy', $campaign->id)); ?>" method="POST"
                            onsubmit="return confirm('Move this campaign to trash?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Recent Donations (<?php echo e($campaign->donations_count); ?> total)</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Donor</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $recentDonations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($donation->name); ?></td>
                                        <td>৳<?php echo e(number_format((float) $donation->amount, 2)); ?></td>
                                        <td><?php echo e($donation->payment_method); ?></td>
                                        <td><?php echo e($donation->created_at->format('d M Y')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No donations yet for this campaign.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Xampp\htdocs\Laravel_Donation_Management_System\resources\views/admin/campaigns/show.blade.php ENDPATH**/ ?>