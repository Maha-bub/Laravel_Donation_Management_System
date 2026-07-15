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
                                         <li>
                                             <a href="<?php echo e(route('projects.school-bags')); ?>">
                                                 <i class="fas fa-school me-2"></i>
                                                 School Bags
                                             </a>
                                         </li>

                                       
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
<?php /**PATH C:\xampp\htdocs\Laravel_Donation_Management_System\resources\views/frontend/layout/parts/header.blade.php ENDPATH**/ ?>