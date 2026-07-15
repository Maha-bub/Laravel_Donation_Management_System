 <header id="header-sticky" class="header-1">
     <div class="container-fluid">
         <div class="mega-menu-wrapper">
             <div class="header-main">
                 <div class="header-left">
                     {{-- logo div --}}
                     <div class="logo">

                         <a href="{{ route('home') }}" class="header-logo">
                             @if (!empty($siteSettings?->logo))
                                 <img src="{{ asset('storage/' . $siteSettings->logo) }}" alt="logo-img">
                             @else
                                 <img src="{{ asset('') }}frontent-assets/img/logo/black-logo.svg" alt="logo-img">
                             @endif
                         </a>



                     </div>
                 </div>

                 {{-- Nav menu Div --}}
                 <div class="mean__menu-wrapper">
                     <div class="main-menu">
                         <nav id="mobile-menu">
                             <ul>
                                 <li class="has-dropdown active menu-thumb">
                                     <a href="{{ route('home') }}">
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
                                             <a href="{{ route('projects.school-bags') }}">
                                                 <i class="fas fa-school me-2"></i>
                                                 School Bags
                                             </a>
                                         </li>

                                       
                                     </ul>
                                 </li>

                                 <li>
                                     <a href="{{ route('campaigns.index') }}">Campaigns</a>
                                 </li>
                                 <li>
                                     <a href="{{ route('about') }}">About Us</a>
                                 </li>
                                 <li>
                                     <a href="news-details.html">
                                         Gallery
                                     </a>
                                 </li>
                                 <li>
                                     <a href="{{ route('contact') }}">Contact Us</a>
                                 </li>
                             </ul>
                         </nav>
                     </div>
                 </div>

                 {{-- Header Right  Btn and Search --}}
                 <div class="header-right d-flex justify-content-end align-items-center">
                     <a href="#" class="main-header__search search-toggler">
                         <i class="fa-regular fa-magnifying-glass"></i>
                     </a>
                     <div class="header-button">
                         <a href="{{ route('donation') }}" class="theme-btn">
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
