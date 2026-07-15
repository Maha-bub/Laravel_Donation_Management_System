 <header id="header-sticky" class="header-1">
     <div class="container-fluid">
         <div class="mega-menu-wrapper">
             <div class="header-main">
                 <div class="header-left">
                     
                     <div class="logo">

                         <a href="<?php echo e(route('home')); ?>" class="header-logo">
                             <?php if(!empty($siteSettings?->logo)): ?>
                                 <img src="<?php echo e(asset('storage/' . $siteSettings->logo)); ?>" alt="logo-img">
                             <?php else: ?>
                                 <img src="<?php echo e(asset('')); ?>frontent-assets/img/logo/black-logo.svg" alt="logo-img">
                             <?php endif; ?>
                         </a>



                     </div>
                 </div>

                 
                 <div class="mean__menu-wrapper">
                     <div class="main-menu">
                         <nav id="mobile-menu">
                             <ul>
                                 <li class="has-dropdown active menu-thumb">
                                     <a href="<?php echo e(route('home')); ?>">
                                         Home
                                     </a>
                                 </li>
                                 <li class="has-dropdown">
                                     <a href="#">
                                         Projects
                                         <i class="fas fa-angle-down"></i>
                                     </a>

                                     <ul class="submenu">
                                         <?php if($navCampaigns->isNotEmpty()): ?>
                                             <li
                                                 style="padding: 8px 20px 4px; font-size: 12px; text-transform: uppercase; letter-spacing: .5px; opacity: .6; border-top: 1px solid rgba(0,0,0,.08); margin-top: 6px;">
                                                 Active Campaigns
                                             </li>
                                             <?php $__currentLoopData = $navCampaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navCampaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <li>
                                                     <a href="<?php echo e(route('campaigns.show', $navCampaign->id)); ?>">
                                                         <i class="fas fa-hand-holding-heart me-2"></i>
                                                         <?php echo e($navCampaign->name); ?>

                                                     </a>
                                                 </li>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         <?php endif; ?>

                                     </ul>
                                 </li>

                                 <li>
                                     <a href="<?php echo e(route('campaigns.index')); ?>">Campaigns</a>
                                 </li>
                                 <li>
                                     <a href="<?php echo e(route('about')); ?>">About Us</a>
                                 </li>
                                 <li>
                                     <a href="news-details.html">
                                         Gallery
                                     </a>
                                 </li>
                                 <li>
                                     <a href="<?php echo e(route('contact')); ?>">Contact Us</a>
                                 </li>
                             </ul>
                         </nav>
                     </div>
                 </div>

                 
                 <div class="header-right d-flex justify-content-end align-items-center">
                     <div class="header-button">
                         <a href="<?php echo e(route('donation')); ?>" class="btn btn-success btn-sm">
                             Donte Now <i class="fa-solid fa-arrow-right"></i>
                         </a>
                     </div>
                     

                     <?php if(auth()->guard()->guest()): ?>
                         <div class="header-button me-2">
                             <a href="<?php echo e(route('login')); ?>" class="btn btn-success btn-sm">
                                 <i class="fa-solid fa-right-to-bracket"></i> Login
                             </a>
                         </div>
                     <?php else: ?>
                         <?php
                             $dashboardRoute = match (auth()->user()->role ?? null) {
                                 'admin' => route('admin.dashboard'),
                                 'donor' => route('donor.dashboard'),
                                 'volunteer' => route('volunteer.dashboard'),
                                 default => route('dashboard'),
                             };
                         ?>
                         <div class="header-button me-2">
                             <a href="<?php echo e($dashboardRoute); ?>" class="btn btn-success btn-sm">
                                 <i class="fa-solid fa-user"></i> <?php echo e(auth()->user()->name); ?>

                             </a>
                         </div>
                     <?php endif; ?>

                 </div>
             </div>
         </div>
     </div>
 </header>
<?php /**PATH C:\xampp\htdocs\Laravel_Donation_Management_System\resources\views/frontend/layout/parts/header.blade.php ENDPATH**/ ?>