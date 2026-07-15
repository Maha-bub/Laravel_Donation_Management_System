<?php $__env->startSection('content'); ?>
    <div class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url(<?php echo e(asset('')); ?>frontent-assets/img/inner-page/breadcrumb.png);">
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Our Campaigns</h1>
                </div>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="<?php echo e(route('home')); ?>">
                            Home
                        </a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                        Campaigns
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Campaigns Section Start -->
    <section class="donation-section section-padding fix">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <span class="sub-title wow fadeInUp">Lets Start Donating</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        <span>A</span>ll Active Donation Causes
                    </h2>
                </div>
            </div>
            <div class="donation-wrapper">
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $goal = (float) $campaign->goal_amount;
                            $raised = (float) ($campaign->donations_sum_amount ?? 0);
                            $percent = $goal > 0 ? min(100, round(($raised / $goal) * 100)) : 0;
                            $styleClass = $index % 4 === 0 ? '' : 'style-' . (($index % 4) + 1);
                        ?>
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay=".<?php echo e((($index % 4) + 1) * 2); ?>s">
                            <div class="donation-card-item">
                                <div class="donation-image">
                                    <img src="<?php echo e(asset('images/' . $campaign->image)); ?>" alt="<?php echo e($campaign->name); ?>">
                                    <div class="right-shape">
                                        <img src="<?php echo e(asset('')); ?>frontent-assets/img/home-1/donation/shape.png"
                                            alt="img">
                                    </div>
                                </div>
                                <div class="donation-content">
                                    <h4>
                                        <a href="<?php echo e(route('campaigns.show', $campaign->id)); ?>"><?php echo e($campaign->name); ?></a>
                                    </h4>
                                    <p>
                                        <?php echo e(\Illuminate\Support\Str::limit($campaign->description, 90)); ?>

                                    </p>
                                    <div class="pro-items <?php echo e($styleClass); ?>">
                                        <div class="progress">
                                            <div class="progress-value" style="animation:none; width: <?php echo e($percent); ?>%;">
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="donate-list">
                                        <li>
                                            <span>Goal :</span> ৳<?php echo e(number_format($goal)); ?>

                                        </li>
                                        <li>
                                            <span>Raised:</span> ৳<?php echo e(number_format($raised)); ?>

                                        </li>
                                    </ul>
                                    <a href="<?php echo e(route('donation', ['campaign_id' => $campaign->id])); ?>"
                                        class="theme-btn <?php echo e($styleClass); ?>">Donate Now <i
                                            class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-12 text-center">
                            <p>No active campaigns right now. Please check back soon.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel_Donation_Management_System\resources\views/frontend/pages/campaigns/index.blade.php ENDPATH**/ ?>