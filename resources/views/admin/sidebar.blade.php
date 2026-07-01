 <!-- leftbar-tab-menu -->
 <div class="startbar d-print-none">
     <!--start brand-->
     <div class="brand">
         <a href="index.html" class="logo">
             <span>
                 <img src="{{ asset('') }}assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
             </span>
             <span class="">
                 <img src="{{ asset('') }}assets/images/logo-light.png" alt="logo-large" class="logo-lg logo-light">
                 <img src="{{ asset('') }}assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
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
                         <a class="nav-link" href="{{route('admin.dashboard')}}">
                             <i class="iconoir-report-columns menu-icon"></i>
                             <span>Dashboard</span>
                             <span class="badge text-bg-info ms-auto">overview</span>
                         </a>
                     </li><!--end nav-item-->
                     <li class="nav-item">
                         <a class="nav-link" href="index.html">
                             {{-- <i class="iconoir-report-columns menu-icon"></i> --}}
                             <span>Donations</span>
                             <span class="badge text-bg-info ms-auto">Total</span>
                         </a>
                     </li><!--end nav-item-->
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('campaignlist.index') }}">
                             {{-- <i class="iconoir-report-columns menu-icon"></i> --}}
                             <span>Campaigns</span>
                         </a>
                     </li><!--end nav-item-->
                     <li class="nav-item">
                         <a class="nav-link" href="{{route('donorlist.index')}}">
                             {{-- <i class="iconoir-report-columns menu-icon"></i> --}}
                             <span>Donor List</span>
                         </a>
                     </li><!--end nav-item-->
                     <li class="nav-item">
                         <a class="nav-link" href="#sidebarTables" data-bs-toggle="collapse" role="button"
                             aria-expanded="false" aria-controls="sidebarTables">
                             {{-- <i class="iconoir-list menu-icon"></i> --}}
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
