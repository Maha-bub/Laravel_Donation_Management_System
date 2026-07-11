 <header id="header-sticky" class="header-1">
     <div class="container-fluid">
         <div class="mega-menu-wrapper">
             <div class="header-main">
                 <div class="header-left">
                     <div class="logo">
                         <a href="" class="header-logo">
                             <img src="{{ asset('') }}frontent-assets/img/logo/black-logo.svg" alt="logo-img">
                         </a>
                     </div>
                 </div>
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

                                         <li>
                                             <a href="{{ route('projects.build-masjid') }}">
                                                 <i class="fas fa-mosque me-2"></i>
                                                 Build a Masjid
                                             </a>
                                         </li>

                                         <li>
                                             <a href="{{ route('projects.house') }}">
                                                 <i class="fas fa-home me-2"></i>
                                                 Donate a House
                                             </a>
                                         </li>

                                         <li>
                                             <a href="{{ route('projects.quran') }}">
                                                 <i class="fas fa-book-open me-2"></i>
                                                 Donate a Quran
                                             </a>
                                         </li>

                                         <li>
                                             <a href="{{ route('projects.emergency-aid') }}">
                                                 <i class="fas fa-hand-holding-medical me-2"></i>
                                                 Emergency Aid
                                             </a>
                                         </li>

                                         <li>
                                             <a href="{{ route('projects.feed-daily') }}">
                                                 <i class="fas fa-bowl-rice me-2"></i>
                                                 Feed Daily
                                             </a>
                                         </li>

                                         <li>
                                             <a href="{{ route('projects.tubewell') }}">
                                                 <i class="fas fa-tint me-2"></i>
                                                 Tubewell / Gift of Water
                                             </a>
                                         </li>

                                         <li>
                                             <a href="{{ route('projects.healing') }}">
                                                 <i class="fas fa-heartbeat me-2"></i>
                                                 Healing Bangladesh
                                             </a>
                                         </li>

                                         <li>
                                             <a href="{{ route('projects.income-generating') }}">
                                                 <i class="fas fa-seedling me-2"></i>
                                                 Income Generating
                                             </a>
                                         </li>

                                         <li>
                                             <a href="{{ route('projects.yateem') }}">
                                                 <i class="fas fa-child me-2"></i>
                                                 Sponsored A Yateem
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
