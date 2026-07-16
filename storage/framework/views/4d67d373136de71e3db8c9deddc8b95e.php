 <header id="header-sticky" class="header-1">
     <div class="container-fluid">
         <div class="mega-menu-wrapper">
             <div class="header-main">
                 <div class="header-left">
                     
                     <div class="logo">

                         <a href="<?php echo e(route('home')); ?>" class="header-logo">
                             <?php if(!empty($siteSettings?->logo)): ?>
                                 <img src="<?php echo e(asset('storage/' . $siteSettings->logo)); ?>" alt="logo-img" width="200px" height="100px" !important>
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
                                         <li>
                                             <a href="<?php echo e(route('projects.school-bags')); ?>">
                                                 <i class="fas fa-school me-2"></i>
                                                 School Bags
                                             </a>
                                         </li>

                                         <li>
                                             <a href="<?php echo e(route('projects.build-masjid')); ?>">
                                                 <i class="fas fa-mosque me-2"></i>
                                                 Build a Masjid
                                             </a>
                                         </li>

                                         <li>
                                             <a href="<?php echo e(route('projects.house')); ?>">
                                                 <i class="fas fa-home me-2"></i>
                                                 Donate a House
                                             </a>
                                         </li>

                                         <li>
                                             <a href="<?php echo e(route('projects.quran')); ?>">
                                                 <i class="fas fa-book-open me-2"></i>
                                                 Donate a Quran
                                             </a>
                                         </li>

                                         <li>
                                             <a href="<?php echo e(route('projects.emergency-aid')); ?>">
                                                 <i class="fas fa-hand-holding-medical me-2"></i>
                                                 Emergency Aid
                                             </a>
                                         </li>

                                         <li>
                                             <a href="<?php echo e(route('projects.feed-daily')); ?>">
                                                 <i class="fas fa-bowl-rice me-2"></i>
                                                 Feed Daily
                                             </a>
                                         </li>

                                         <li>
                                             <a href="<?php echo e(route('projects.tubewell')); ?>">
                                                 <i class="fas fa-tint me-2"></i>
                                                 Tubewell / Gift of Water
                                             </a>
                                         </li>

                                         <li>
                                             <a href="<?php echo e(route('projects.healing')); ?>">
                                                 <i class="fas fa-heartbeat me-2"></i>
                                                 Healing Bangladesh
                                             </a>
                                         </li>

                                         <li>
                                             <a href="<?php echo e(route('projects.income-generating')); ?>">
                                                 <i class="fas fa-seedling me-2"></i>
                                                 Income Generating
                                             </a>
                                         </li>

                                         <li>
                                             <a href="<?php echo e(route('projects.yateem')); ?>">
                                                 <i class="fas fa-child me-2"></i>
                                                 Sponsored A Yateem
                                             </a>
                                         </li>

                                         <?php if($navCampaigns->isNotEmpty()): ?>
                                             <li style="padding: 8px 20px 4px; font-size: 12px; text-transform: uppercase; letter-spacing: .5px; opacity: .6; border-top: 1px solid rgba(0,0,0,.08); margin-top: 6px;">
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
                     <a href="#" class="main-header__search search-toggler">
                         <i class="fa-regular fa-magnifying-glass"></i>
                     </a>

                     <?php if(auth()->guard()->guest()): ?>
                         <div class="header-button me-2">
                             <a href="<?php echo e(route('login')); ?>" class="theme-btn style-2">
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
                             <a href="<?php echo e($dashboardRoute); ?>" class="theme-btn style-2">
                                 <i class="fa-solid fa-user"></i> <?php echo e(auth()->user()->name); ?>

                             </a>
                         </div>
                     <?php endif; ?>

                     <div class="header-button">
                         <a href="<?php echo e(route('donation')); ?>" class="theme-btn">
                             Donte Now <i class="fa-solid fa-arrow-right"></i>
                         </a>
                     </div>
                     <div class="header__hamburger d-xl-none my-auto">
                         <div class="sidebar__toggle">
                             <i class="fas fa-bars"></i>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </header>
<?php /**PATH C:\Xampp\htdocs\Laravel_Donation_Management_System\resources\views/frontend/layout/parts/header.blade.php ENDPATH**/ ?>