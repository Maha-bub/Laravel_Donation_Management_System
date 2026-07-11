<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container-fluid col-12">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Campaign Management</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item active">Campaigns</li>
                        </ol>
                    </div>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        
        <div class="row g-3 mb-3">
            <div class="col-6 col-md-2">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <p class="text-muted text-uppercase mb-1 fs-13">Total Campaigns</p>
                        <h4 class="mb-0"><?php echo e($stats['total']); ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <p class="text-muted text-uppercase mb-1 fs-13">Active</p>
                        <h4 class="mb-0 text-success"><?php echo e($stats['active']); ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <p class="text-muted text-uppercase mb-1 fs-13">Completed</p>
                        <h4 class="mb-0 text-primary"><?php echo e($stats['completed']); ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <p class="text-muted text-uppercase mb-1 fs-13">Total Goal</p>
                        <h4 class="mb-0">৳<?php echo e(number_format($stats['total_goal'], 2)); ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <p class="text-muted text-uppercase mb-1 fs-13">Total Raised</p>
                        <h4 class="mb-0 text-success">৳<?php echo e(number_format($stats['total_raised'], 2)); ?></h4>
                    </div>
                </div>
            </div>
        </div>

        <?php if($topCampaign): ?>
            <div class="alert alert-light border d-flex align-items-center gap-2 mb-3">
                <i class="fas fa-trophy text-warning"></i>
                <span>Top performing campaign: <strong><?php echo e($topCampaign->name); ?></strong>
                    (৳<?php echo e(number_format($topCampaign->raised_amount, 2)); ?> raised)</span>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="card-title mb-0"><?php echo e($showTrashed ? 'Trashed Campaigns' : 'Campaign List'); ?></h4>
                        <div class="d-flex gap-2">
                            <?php if($showTrashed): ?>
                                <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.campaignlist.index')); ?>">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                            <?php else: ?>
                                <a class="btn btn-sm btn-outline-danger" href="<?php echo e(route('admin.campaignlist.index', ['trashed' => 1])); ?>">
                                    <i class="fas fa-trash-alt"></i> Trashed
                                </a>
                                <a class="btn btn-sm btn-info" href="<?php echo e(route('admin.campaignlist.create')); ?>">
                                    New Campaign <i class="fas fa-arrow-right"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div><!--end card-header-->

                    <?php if (! ($showTrashed)): ?>
                        <div class="card-body pb-0">
                            <form method="GET" action="<?php echo e(route('admin.campaignlist.index')); ?>" class="row g-2 align-items-end">
                                <div class="col-md-3">
                                    <label class="form-label mb-1">Search Title</label>
                                    <input type="text" name="search" class="form-control form-control-sm"
                                        value="<?php echo e($filters['search'] ?? ''); ?>" placeholder="Search by title...">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label mb-1">Category</label>
                                    <select name="category_id" class="form-select form-select-sm">
                                        <option value="">All</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"
                                                <?php echo e((string) ($filters['category_id'] ?? '') === (string) $category->id ? 'selected' : ''); ?>>
                                                <?php echo e($category->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label mb-1">Status</label>
                                    <select name="status" class="form-select form-select-sm">
                                        <option value="">All</option>
                                        <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($statusOption); ?>"
                                                <?php echo e(($filters['status'] ?? '') === $statusOption ? 'selected' : ''); ?>>
                                                <?php echo e($statusOption); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label mb-1">Ending From</label>
                                    <input type="date" name="end_from" class="form-control form-control-sm"
                                        value="<?php echo e($filters['end_from'] ?? ''); ?>">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label mb-1">Ending To</label>
                                    <input type="date" name="end_to" class="form-control form-control-sm"
                                        value="<?php echo e($filters['end_to'] ?? ''); ?>">
                                </div>
                                <div class="col-md-1 d-flex gap-1">
                                    <button type="submit" class="btn btn-sm btn-primary" title="Filter">
                                        <i class="fas fa-filter"></i>
                                    </button>
                                    <a href="<?php echo e(route('admin.campaignlist.index')); ?>" class="btn btn-sm btn-outline-secondary" title="Reset">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label mb-1">Sort By</label>
                                    <select name="sort_by" class="form-select form-select-sm">
                                        <option value="created_at" <?php echo e(($filters['sort_by'] ?? 'created_at') === 'created_at' ? 'selected' : ''); ?>>Newest</option>
                                        <option value="name" <?php echo e(($filters['sort_by'] ?? '') === 'name' ? 'selected' : ''); ?>>Title</option>
                                        <option value="goal_amount" <?php echo e(($filters['sort_by'] ?? '') === 'goal_amount' ? 'selected' : ''); ?>>Goal Amount</option>
                                        <option value="donations_sum_amount" <?php echo e(($filters['sort_by'] ?? '') === 'donations_sum_amount' ? 'selected' : ''); ?>>Raised Amount</option>
                                        <option value="end_date" <?php echo e(($filters['sort_by'] ?? '') === 'end_date' ? 'selected' : ''); ?>>End Date</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label mb-1">Direction</label>
                                    <select name="sort_dir" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="desc" <?php echo e(($filters['sort_dir'] ?? 'desc') === 'desc' ? 'selected' : ''); ?>>Desc</option>
                                        <option value="asc" <?php echo e(($filters['sort_dir'] ?? '') === 'asc' ? 'selected' : ''); ?>>Asc</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>

                    <div class="card-body pt-2">
                        <div class="table-responsive">
                            <table class="table" id="datatable_2">
                                <thead class="">
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Goal</th>
                                        <th>Raised</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <img src="<?php echo e(asset('images/' . $item->image)); ?>" alt="Campaign Image"
                                                    width="50" height="50" class="rounded">
                                            </td>
                                            <td>
                                                <?php if($showTrashed): ?>
                                                    <?php echo e($item->name); ?>

                                                <?php else: ?>
                                                    <a href="<?php echo e(route('admin.campaignlist.show', $item->id)); ?>"><?php echo e($item->name); ?></a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($item->category->name ?? 'N/A'); ?></td>
                                            <td>৳<?php echo e(number_format($item->goal_amount, 2)); ?></td>
                                            <td>৳<?php echo e(number_format($item->raised_amount, 2)); ?></td>
                                            <td style="min-width:120px;">
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: <?php echo e($item->progress); ?>%;"></div>
                                                </div>
                                                <small class="text-muted"><?php echo e($item->progress); ?>%</small>
                                            </td>
                                            <td>
                                                <span class="badge <?php echo e($item->status_badge_class); ?>">
                                                    <?php echo e($item->status); ?>

                                                </span>
                                            </td>
                                            <td><?php echo e(optional($item->end_date)->format('d M Y') ?? '—'); ?></td>
                                            <td>
                                                <?php if($showTrashed): ?>
                                                    <form action="<?php echo e(route('admin.campaignlist.restore', $item->id)); ?>"
                                                        method="POST" class="d-inline">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <button class="btn p-0 border-0 text-success me-2" type="submit" title="Restore">
                                                            <i class="fas fa-undo"></i>
                                                        </button>
                                                    </form>
                                                    <form action="<?php echo e(route('admin.campaignlist.forceDelete', $item->id)); ?>"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Permanently delete this campaign? This cannot be undone.')">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button class="btn p-0 border-0 text-danger" type="submit" title="Delete Permanently">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('admin.campaignlist.show', $item->id)); ?>"
                                                        class="text-secondary me-2" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('admin.campaignlist.edit', $item->id)); ?>"
                                                        class="text-primary me-2" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="<?php echo e(route('admin.campaignlist.destroy', $item->id)); ?>"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Move this campaign to trash?')">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button class="btn p-0 border-0 text-danger" type="submit" title="Delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="9" class="text-center">No campaigns found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <button type="button" class="btn btn-sm btn-primary csv">Export CSV</button>
                                    <button type="button" class="btn btn-sm btn-primary json">Export JSON</button>
                                </div>
                                <div>
                                    <?php echo e($items->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->
    </div><!-- container -->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('')); ?>assets/libs/simple-datatables/umd/simple-datatables.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dataTable_2 = new simpleDatatables.DataTable("#datatable_2", {
                searchable: false,
                paging: false,
                sortable: false,
            });

            const csvBtn = document.querySelector('button.csv');
            if (csvBtn) {
                csvBtn.addEventListener('click', () => {
                    dataTable_2.export({ type: 'csv', download: true, filename: 'campaigns' });
                });
            }

            const jsonBtn = document.querySelector('button.json');
            if (jsonBtn) {
                jsonBtn.addEventListener('click', () => {
                    dataTable_2.export({ type: 'json', download: true, filename: 'campaigns' });
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Xampp\htdocs\Laravel_Donation_Management_System\resources\views/admin/campaigns/index.blade.php ENDPATH**/ ?>