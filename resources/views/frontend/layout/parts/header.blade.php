 <header id="header-sticky" class="header-1">
     <div class="container-fluid">
         <div class="mega-menu-wrapper">
             <div class="header-main">
                 <div class="header-left">
                     {{-- logo div --}}
                     <div class="logo">

                         <a href="{{ route('home') }}" class="header-logo">
                             @if (!empty($siteSettings?->logo))
                                 <img src="{{ asset('storage/' . $siteSettings->logo) }}" alt="logo-img" width="200px"
                                     height="100px" !important>
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

                                         @if ($navCampaigns->isNotEmpty())
                                             <li
                                                 style="padding: 8px 20px 4px; font-size: 12px; text-transform: uppercase; letter-spacing: .5px; opacity: .6; border-top: 1px solid rgba(0,0,0,.08); margin-top: 6px;">
                                                 Active Campaigns
                                             </li>
                                             @foreach ($navCampaigns as $navCampaign)
                                                 <li>
                                                     <a href="{{ route('campaigns.show', $navCampaign->id) }}">
                                                         <i class="fas fa-hand-holding-heart me-2"></i>
                                                         {{ $navCampaign->name }}
                                                     </a>
                                                 </li>
                                             @endforeach
                                         @endif
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

                     <div class="header-button">
                         <a href="{{ route('donation') }}" class="btn btn-success btn-sm">
                             Donte Now <i class="fa-solid fa-arrow-right"></i>
                         </a>
                     </div>
                     @guest
                         <div class="header-button me-2">
                             <a href="{{ route('login') }}" class="btn btn-success btn-sm">
                                 <i class="fa-solid fa-right-to-bracket"></i> Login
                             </a>
                         </div>
                     @else
                         @php
                             $dashboardRoute = match (auth()->user()->role ?? null) {
                                 'admin' => route('admin.dashboard'),
                                 'donor' => route('donor.dashboard'),
                                 'volunteer' => route('volunteer.dashboard'),
                                 default => route('dashboard'),
                             };
                         @endphp
                         <div class="header-button me-2">
                             <a href="{{ $dashboardRoute }}" class="btn btn-success btn-sm">
                                 <i class="fa-solid fa-user"></i> {{ auth()->user()->name }}
                             </a>
                         </div>
                     @endguest

                 </div>
             </div>
         </div>
     </div>
 </header>
