 <!-- leftbar-tab-menu -->
 <div class="startbar d-print-none">
     <!--start brand-->
     <div class="brand">
         <a href="index.html" class="logo">
             <span>
                 <img src="<?php echo e(asset('')); ?>assets/images/logo_dark.png" alt="logo-small" class="logo-sm">
             </span>
             <span class="">
                 <img src="<?php echo e(asset('')); ?>assets/images/logo_dark.png" alt="logo-large" width="150px" height="150px"
                     class="logo-light">
                 <img src="<?php echo e(asset('')); ?>assets/images/logo_dark.png" alt="logo-large" width="150px"
                     height="100px" class="logo-dark">
             </span>
         </a>
     </div>
     <!--end brand-->
     <!--start startbar-menu-->
     <div class="startbar-menu">
         <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
             <div class="d-flex align-items-start flex-column w-100">
                 <!-- Navigation -->
                 <ul class="navbar-nav mb-auto w-100">

                     <li class="nav-item">
                         <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
                             <i class="iconoir-report-columns menu-icon"></i>
                             <span>Dashboard</span>
                             <span class="badge text-bg-info ms-auto">overview</span>
                         </a>
                     </li><!--end nav-item-->
                     <li class="nav-item">
                         <a class="nav-link" href="<?php echo e(route('admin.donations.index')); ?>">
                             <i class="iconoir-hand-cash menu-icon"></i>
                             <span>Donations</span>
                             <span class="badge text-bg-info ms-auto">Total</span>
                         </a>
                     </li><!--end nav-item-->
                     <li class="nav-item">
                         <a class="nav-link" href="<?php echo e(route('admin.category.index')); ?>">
                             <i class="iconoir-view-grid menu-icon"></i>
                             <span>Categories</span>

                         </a>
                     </li><!--end nav-item-->
                     <li class="nav-item">
                         <a class="nav-link" href="<?php echo e(route('admin.campaignlist.index')); ?>">
                             <i class="iconoir-megaphone menu-icon"></i>
                             <span>Campaigns</span>
                         </a>
                     </li><!--end nav-item-->
                     <li class="nav-item">
                         <a class="nav-link" href="<?php echo e(route('admin.donorlist.index')); ?>">
                             <i class="iconoir-user menu-icon"></i>
                             <span>Donor List</span>
                         </a>
                     </li><!--end nav-item-->
                     <li class="nav-item">
                         <a class="nav-link" href="<?php echo e(route('admin.volunteerlist.index')); ?>">
                            <i class="iconoir-group menu-icon"></i>
                             <span>Volunteers</span>
                         </a>
                     </li><!--end nav-item-->
                     <li class="nav-item">
                         <a class="nav-link" href="<?php echo e(route('admin.settings.index')); ?>">
                             <i class="iconoir-settings menu-icon"></i>
                             <span>Settings</span>
                         </a>
                     </li><!--end nav-item-->
                     <li class="nav-item">
                         <a class="nav-link" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                             aria-expanded="false" aria-controls="sidebarTables">
                             
                             <span>Tables</span>
                         </a>
                         <div class="collapse " id="sidebarTables">
                             <ul class="nav flex-column">
                                 <li class="nav-item">
                                     <a class="nav-link" href="tables-datatable.html">Datatables</a>
                                 </li>
                             </ul>
                         </div>
                     </li>

                 </ul><!--end navbar-nav--->

             </div>
         </div>
     </div>
 </div>
 <div class="startbar-overlay d-print-none"></div>
<?php /**PATH C:\Xampp\htdocs\Laravel_Donation_Management_System\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>