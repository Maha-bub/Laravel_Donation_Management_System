@extends('frontend.layout.master')

@section('content')
    <!-- Hero Section Start -->
    <div class="breadcrumb-wrapper fix bg-cover" style="background-image: url(assets/img/inner-page/breadcrumb.png);">
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Donation Now</h1>
                </div>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="index.html">
                            Home
                        </a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                        Donation Now
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Donation Section Start -->
    <section class="donation-section-2 section-padding fix">
        <div class="container">
            <div class="donation-wrapper-2">
                <div class="row g-4">
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="donation-card-item-2 mt-0">
                            <div class="left-shape">
                                <img src="{{ asset('') }}frontent-assets/img/home-2/donation/shape-1.png" alt="img">
                            </div>
                            <div class="donation-image">
                                <img src="{{ asset('') }}frontent-assets/img/home-2/donation/01.jpg" alt="img">
                                <div class="news-layer-wrapper">
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/home-2/donation/01.jpg');"></div>
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/home-2/donation/01.jpg');"></div>
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/home-2/donation/01.jpg');"></div>
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/home-2/donation/01.jpg');"></div>
                                </div>
                            </div>
                            <div class="donation-content">
                                <h4>
                                    <a href="donation-details.html">Help Children Poor Insurance & Medical</a>
                                </h4>
                                <div class="pro-items">
                                    <div class="progress">
                                        <div class="progress-value style-two"></div>
                                    </div>
                                </div>
                                <ul class="donate-list">
                                    <li>
                                        Raised - $ 16,020.00
                                    </li>
                                    <li>
                                        <span>Goal - $60,000.00</span>
                                    </li>
                                </ul>
                                <a href="donation-details.html" class="theme-btn style-2">Donte Now <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                        <div class="donation-card-item-2 mt-0">
                            <div class="left-shape">
                                <img src="{{ asset('') }}frontent-assets/img/home-2/donation/shape-2.png" alt="img">
                            </div>
                            <div class="donation-image">
                                <img src="{{ asset('') }}frontent-assets/img/home-2/donation/02.jpg" alt="img">
                                <div class="news-layer-wrapper">
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/home-2/donation/02.jpg');"></div>
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/home-2/donation/02.jpg');"></div>
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/home-2/donation/02.jpg');"></div>
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/home-2/donation/02.jpg');"></div>
                                </div>
                            </div>
                            <div class="donation-content">
                                <h4>
                                    <a href="donation-details.html">Help us touch their lives of these youths</a>
                                </h4>
                                <div class="pro-items style-2">
                                    <div class="progress">
                                        <div class="progress-value style-two"></div>
                                    </div>
                                </div>
                                <ul class="donate-list">
                                    <li>
                                        Raised - $ 16,020.00
                                    </li>
                                    <li>
                                        <span>Goal - $60,000.00</span>
                                    </li>
                                </ul>
                                <a href="donation-details.html" class="theme-btn">Donte Now <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                        <div class="donation-card-item-2 mt-0">
                            <div class="left-shape">
                                <img src="{{ asset('') }}frontent-assets/img/home-2/donation/shape-3.png" alt="img">
                            </div>
                            <div class="donation-image">
                                <img src="{{ asset('') }}frontent-assets/img/home-2/donation/03.jpg" alt="img">
                                <div class="news-layer-wrapper">
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/home-2/donation/03.jpg');"></div>
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/home-2/donation/03.jpg');"></div>
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/home-2/donation/03.jpg');"></div>
                                    <div class="news-layer-image"
                                        style="background-image: url('assets/img/home-2/donation/03.jpg');"></div>
                                </div>
                            </div>
                            <div class="donation-content">
                                <h4>
                                    <a href="donation-details.html">Raise found for clean & Healthy Water</a>
                                </h4>
                                <div class="pro-items style-3">
                                    <div class="progress">
                                        <div class="progress-value style-two"></div>
                                    </div>
                                </div>
                                <ul class="donate-list">
                                    <li>
                                        Raised - $ 16,020.00
                                    </li>
                                    <li>
                                        <span>Goal - $60,000.00</span>
                                    </li>
                                </ul>
                                <a href="donation-details.html" class="theme-btn style-3">Donte Now <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Section Start -->
    <section class="feature-skill section-padding fix bg-cover"
        style="background-image: url(assets/img/inner-page/bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="feature-skill-content">
                        <h6 class="wow fadeInUp">Each Drop Creates The Sea</h6>
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">
                            A concrete help for the causes
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay=".5s">
                            Charity is the act of giving selflessly to those in need, whether through humanity, making the
                            bring hope to the less fortunate.
                        </p>
                        <div class="progress-area">
                            <div class="progress-wrap">
                                <div class="pro-items wow fadeInUp" data-wow-delay=".3s">
                                    <div class="pro-head">
                                        <h6 class="title">
                                            Donation Collection
                                        </h6>
                                        <span class="point">
                                            90%
                                        </span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-value"></div>
                                    </div>
                                </div>
                                <div class="pro-items wow fadeInUp" data-wow-delay=".5s">
                                    <div class="pro-head">
                                        <h6 class="title">
                                            Successful Events
                                        </h6>
                                        <span class="point">
                                            70%
                                        </span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-value style-two"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="contact.html" class="theme-btn wow fadeInUp" data-wow-delay=".3s">More Info Later <i
                                class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section Start -->
    <section class="pricing-section section-padding fix">
        <div class="container">
            <div class="section-title style-2">
                <span class="sub-title wow fadeInUp">Pricing Plan</span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    <span>T</span>he terms and conditions <br> sect your plan
                </h2>
            </div>
            <div class="pricing-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="pricing-card-item-2 wow fadeInLeft" data-wow-delay=".3s">
                            <div class="content">
                                <h3>Free this plan</h3>
                                <p>
                                    Charity not only helps to reduce suffering but also fosters a sense of unity and shared
                                    responsibility in difference life.
                                </p>
                            </div>
                            <h3 class="number">$00</h3>
                        </div>
                        <div class="pricing-card-item-2 wow fadeInLeft" data-wow-delay=".5s">
                            <div class="content">
                                <h3>Standard this plan this plan</h3>
                                <p>
                                    Charity not only helps to reduce suffering but also fosters a sense of unity and shared
                                    responsibility in difference life.
                                </p>
                            </div>
                            <h3 class="number">$60</h3>
                        </div>
                        <div class="pricing-card-item-2 mb-0 wow fadeInLeft" data-wow-delay=".7s">
                            <div class="content">
                                <h3>Premium this plan</h3>
                                <p>
                                    Charity not only helps to reduce suffering but also fosters a sense of unity and shared
                                    responsibility in difference life.
                                </p>
                            </div>
                            <h3 class="number">$90</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pricing-right-card wow fadeInRight" data-wow-delay=".3s">
                            <ul class="pricing-list">
                                <li>
                                    <i class="fa-solid fa-check-double"></i>
                                    We are privileged to work.
                                </li>
                                <li>
                                    <i class="fa-solid fa-check-double"></i>
                                    24/7 system monitoring
                                </li>
                                <li>
                                    <i class="fa-solid fa-check-double"></i>
                                    Encourage team member
                                </li>
                                <li>
                                    <i class="fa-solid fa-check-double"></i>
                                    remote best support
                                </li>
                            </ul>
                            <div class="pricing-button">
                                <a href="pricing.html" class="theme-btn">Choose Your Plan <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                        <div class="pricing-right-card wow fadeInRight" data-wow-delay=".5s">
                            <ul class="pricing-list">
                                <li>
                                    <i class="fa-solid fa-check-double"></i>
                                    We are privileged to work.
                                </li>
                                <li>
                                    <i class="fa-solid fa-check-double"></i>
                                    24/7 system monitoring
                                </li>
                                <li>
                                    <i class="fa-solid fa-check-double"></i>
                                    Encourage team member
                                </li>
                                <li>
                                    <i class="fa-solid fa-check-double"></i>
                                    remote best support
                                </li>
                            </ul>
                            <div class="pricing-button">
                                <a href="pricing.html" class="theme-btn">Choose Your Plan <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                        <div class="pricing-right-card mb-0 wow fadeInRight" data-wow-delay=".7s">
                            <ul class="pricing-list">
                                <li>
                                    <i class="fa-solid fa-check-double"></i>
                                    We are privileged to work.
                                </li>
                                <li>
                                    <i class="fa-solid fa-check-double"></i>
                                    24/7 system monitoring
                                </li>
                                <li>
                                    <i class="fa-solid fa-check-double"></i>
                                    Encourage team member
                                </li>
                                <li>
                                    <i class="fa-solid fa-check-double"></i>
                                    remote best support
                                </li>
                            </ul>
                            <div class="pricing-button">
                                <a href="pricing.html" class="theme-btn">Choose Your Plan <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cta-bg-section-4 Start -->
    <section class="cta-bg-section-4 section-padding bg-cover"
        style="background-image: url(assets/img/inner-page/cta-bg.jpg);">
        <div class="container">
            <div class="cta-bg-wrapper-4">
                <div class="cta-content wow fadeInUp" data-wow-delay=".3s">
                    <h3>Write Us More Information On Danations</h3>
                    <p>Charity is the giving selflessly to those in need, whether through humanity, making the bring hope to
                        the fortunate.</p>
                </div>
                <a href="contact.html" class="theme-btn wow fadeInUp" data-wow-delay=".3s">Downloads Now <i
                        class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
    </section>
@endsection
