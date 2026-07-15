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
    {{-- <section class="donation-section-2 section-padding fix">
        <div class="container">
            <div class="donation-wrapper-2">
                <div class="row g-4">
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="donation-card-item-2 mt-0">
                            <div class="left-shape">
                                <img src="{{ asset('') }}frontent-assets/img/home-2/donation/shape-1.png"
                                    alt="img">
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
                                <img src="{{ asset('') }}frontent-assets/img/home-2/donation/shape-2.png"
                                    alt="img">
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
                                <img src="{{ asset('') }}frontent-assets/img/home-2/donation/shape-3.png"
                                    alt="img">
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
    </section> --}}

    <!-- Donation-Details Section Start -->
    {{-- <section class="donation-details-section section-padding fix">
        <div class="container">
            <div class="donation-details-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="donation-details-left">
                            <h3>Honorary Mayor Fundraiser Campaign</h3>
                            <ul class="list">
                                <li>Animals</li>
                                <li class="style-2">By Admin</li>
                                <li class="style-2">July 26,2023</li>
                            </ul>
                            <p>
                                Charity is the act of giving selflessly to those in need, whether through financial aid,
                                resources, or time. It reflects kindness, compassion, and humanity, making the bring hope to
                                the less fortunate.
                            </p>
                            <div class="details-image">
                                <img src="assets/img/inner-page/donation-details/01.jpg" alt="img">
                            </div>
                            <h3>Help Children Rise Out Of Probert</h3>
                            <p class="mb-4">
                                Charity is the act of giving selflessly to those in need, whether through financial aid,
                                resources, or time. It reflects kindness, compassion.
                            </p>
                            <h5>Support Where It Counts.</h5>
                            <div class="radius-box">
                                <div class="box-ber">
                                    <div class="shape">
                                        <img src="assets/img/inner-page/donation-details/shape.png" alt="img">
                                    </div>
                                    <h5>Notice: Test mode is enabled while in test mode no live donations are processed.
                                    </h5>
                                </div>
                            </div>
                            <h5>Your Donation:</h5>
                            <div class="donation-display">
                                <span class="currency">$</span>
                                <span id="donation-amount">100</span>
                            </div>
                            <div class="donation-options">
                                <button class="donation-btn" data-amount="50">50</button>
                                <button class="donation-btn" data-amount="100">100</button>
                                <button class="donation-btn" data-amount="200">200</button>
                                <button id="custom-btn">Custom</button>
                            </div>
                            <h5>Select Payment Method</h5>
                            <div class="select-item">
                                <label>
                                    <input type="radio" name="donation">
                                    Test Donation
                                </label>
                                <label>
                                    <input type="radio" name="donation">
                                    Offline Donation
                                </label>
                                <label>
                                    <input type="radio" name="donation" checked>
                                    Credit Card
                                </label>
                            </div>
                            <a href="donation-details.html" class="theme-btn">Donte Now <i
                                    class="fa-solid fa-arrow-right-long"></i></a>
                            <h3 class="text">Details Information</h3>
                            <form action="#" id="contact-form" method="POST">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <input type="text" name="name" id="name1"
                                                placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <input type="text" name="name" id="name2" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <input type="text" name="name" id="email"
                                                placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <input type="text" name="subject" id="number"
                                                placeholder="Your Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-clt">
                                            <input type="text" name="email" id="address"
                                                placeholder="Your Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-clt">
                                            <textarea name="message" id="message" placeholder="Type your message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="theme-btn ">
                                            Save Information <i class="fa-solid fa-arrow-right-long"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="donation-details-sideber">
                            <div class="donation-details-sideber-box">
                                <h4>Categories</h4>
                                <ul class="donation-list">
                                    <li>
                                        Animals <span>(20)</span>
                                    </li>
                                    <li>
                                        Children <span>(30)</span>
                                    </li>
                                    <li>
                                        Ecology <span>(40)</span>
                                    </li>
                                    <li>
                                        Medical <span>(50)</span>
                                    </li>
                                    <li>
                                        Wildlife <span>(60)</span>
                                    </li>
                                </ul>
                            </div>
                            <h4 class="text">Categories</h4>
                            <div class="details-post-area">
                                <div class="details-items">
                                    <div class="details-thumb">
                                        <img src="assets/img/inner-page/donation-details/post-1.jpg" alt="img">
                                    </div>
                                    <div class="details-content">
                                        <h5>
                                            <a href="donation-details.html">
                                                How To Engage Millennials In Charity Work.
                                            </a>
                                        </h5>
                                        <ul>
                                            <li>
                                                26 Jul 2025 . By Admin
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details-items">
                                    <div class="details-thumb">
                                        <img src="assets/img/inner-page/donation-details/post-2.jpg" alt="img">
                                    </div>
                                    <div class="details-content">
                                        <h5>
                                            <a href="donation-details.html">
                                                Creating Long-Term Partnerships With Donors.
                                            </a>
                                        </h5>
                                        <ul>
                                            <li>
                                                26 Jul 2025 . By Admin
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details-items">
                                    <div class="details-thumb">
                                        <img src="assets/img/inner-page/donation-details/post-3.jpg" alt="img">
                                    </div>
                                    <div class="details-content">
                                        <h5>
                                            <a href="donation-details.html">
                                                The Importance Of Corporate Social Responsibility.
                                            </a>
                                        </h5>
                                        <ul>
                                            <li>
                                                26 Jul 2025 . By Admin
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details-items">
                                    <div class="details-thumb">
                                        <img src="assets/img/inner-page/donation-details/post-4.jpg" alt="img">
                                    </div>
                                    <div class="details-content">
                                        <h5>
                                            <a href="donation-details.html">
                                                Ways To Promote Your Non-Profit On Social Media.
                                            </a>
                                        </h5>
                                        <ul>
                                            <li>
                                                26 Jul 2025 . By Admin
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details-items">
                                    <div class="details-thumb">
                                        <img src="assets/img/inner-page/donation-details/post-5.jpg" alt="img">
                                    </div>
                                    <div class="details-content">
                                        <h5>
                                            <a href="donation-details.html">
                                                How Technology Is Changing The Charity Sector.
                                            </a>
                                        </h5>
                                        <ul>
                                            <li>
                                                26 Jul 2025 . By Admin
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-bg bg-cover"
                                style="background-image: url(assets/img/inner-page/donation-details/bg.jpg);">
                                <div class="donation-contact-content">
                                    <div class="icon">
                                        <i class="fa-light fa-phone-volume"></i>
                                    </div>
                                    <h5>Our Free Helping Is Open 24/7</h5>
                                    <h6>
                                        <a href="tel:+4065550120">+406 555 0120</a>
                                    </h6>
                                    <a href="contact.html" class="theme-btn border-btn">Get Help Now <i
                                            class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Feature Section Start -->
    {{-- <section class="feature-skill section-padding fix bg-cover"
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
    </section> --}}

    <!-- Pricing Section Start -->
    {{-- <section class="pricing-section section-padding fix">
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
    </section> --}}

    <!-- Cta-bg-section-4 Start -->
    {{-- <section class="cta-bg-section-4 section-padding bg-cover"
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
    </section> --}}
    <section class="py-5 bg-light">
        <div class="container">

            <div class="card border-0 shadow-lg overflow-hidden rounded-4">

                <div class="row g-0">

                    <!-- ===========================
                                LEFT PAYMENT SIDEBAR
                            ============================ -->

                    <div class="col-lg-4 bg-success text-white">

                        <div class="p-5 h-100 d-flex flex-column">

                            <h2 class="fw-bold mb-2">
                                Accepted Payments
                            </h2>

                            <p class="text-white-50 mb-4">
                                All transactions are encrypted &
                                secure.
                            </p>

                            <!-- Secure Notice -->

                            <div
                                class="alert alert-success border border-light-subtle bg-white bg-opacity-10 text-white rounded-3">

                                <div class="d-flex align-items-center">

                                    <i class="fas fa-shield-alt fs-4 me-3"></i>

                                    <div>

                                        <strong>
                                            Secure Gateway
                                        </strong>

                                        <div class="small">
                                            You will be redirected to a secure payment gateway.
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <h6 class="text-uppercase mt-4 mb-3 text-warning">
                                Payment Methods
                            </h6>

                            <!-- Payment -->

                            <div class="list-group list-group-flush">

                                <div class="list-group-item bg-white bg-opacity-10 border rounded-3 mb-3 text-white">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div class="d-flex align-items-center">

                                            <i class="fas fa-mobile-alt fs-4 me-3"></i>

                                            <span>
                                                bKash (Online)
                                            </span>

                                        </div>

                                        <i class="fas fa-check-circle text-success"></i>

                                    </div>

                                </div>

                                <div class="list-group-item bg-white bg-opacity-10 border rounded-3 mb-3 text-white">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div class="d-flex align-items-center">

                                            <i class="fas fa-wallet fs-4 me-3"></i>

                                            <span>
                                                Nagad / Rocket
                                            </span>

                                        </div>

                                        <i class="fas fa-check-circle text-success"></i>

                                    </div>

                                </div>

                                <div class="list-group-item bg-white bg-opacity-10 border rounded-3 mb-3 text-white">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div class="d-flex align-items-center">

                                            <i class="fas fa-credit-card fs-4 me-3"></i>

                                            <span>
                                                Visa / MasterCard
                                            </span>

                                        </div>

                                        <i class="fas fa-check-circle text-success"></i>

                                    </div>

                                </div>

                                <div class="list-group-item bg-white bg-opacity-10 border rounded-3 text-white">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div class="d-flex align-items-center">

                                            <i class="fas fa-university fs-4 me-3"></i>

                                            <span>
                                                Bank Transfer
                                            </span>

                                        </div>

                                        <i class="fas fa-check-circle text-success"></i>

                                    </div>

                                </div>

                            </div>

                            <div class="mt-auto">

                                <div class="card bg-warning bg-opacity-10 border-warning mt-5">

                                    <div class="card-body">

                                        <small class="text-warning fw-bold">
                                            Emergency Contact
                                        </small>

                                        <h4 class="fw-bold text-white mb-0">
                                            +8801792861249
                                        </h4>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- ===========================
                                RIGHT FORM
                            ============================ -->

                    <div class="col-lg-8 bg-white">

                        <div class="p-5">

                            <h2 class="fw-bold">
                                Complete Your Donation
                            </h2>

                            <p class="text-muted mb-4">
                                Fill in your details to proceed securely.
                            </p>

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $e)
                                            <li>{{ $e }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('donation.store') }}" method="POST" id="donate-form">

                                @csrf

                                <div class="row g-4">

                                    <!-- Project -->

                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">
                                            Select Project
                                        </label>

                                        <select class="form-select" name="campaign_id" required>

                                            <option value="" disabled {{ old('campaign_id', $selectedCampaignId) ? '' : 'selected' }}>
                                                Choose Project
                                            </option>

                                            @forelse ($campaigns as $campaign)
                                                <option value="{{ $campaign->id }}"
                                                    {{ (string) old('campaign_id', $selectedCampaignId) === (string) $campaign->id ? 'selected' : '' }}>
                                                    {{ $campaign->name }}
                                                </option>
                                            @empty
                                                <option value="" disabled>No active campaigns available</option>
                                            @endforelse

                                        </select>

                                    </div>

                                    <!-- Intention -->

                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">
                                            Donation Intention
                                        </label>

                                        <select class="form-select">

                                            <option selected>
                                                Choose Intention
                                            </option>

                                            <option>
                                                Zakat
                                            </option>

                                            <option>
                                                Sadaqah
                                            </option>

                                            <option>
                                                General Donation
                                            </option>

                                        </select>

                                    </div>

                                    <!-- Name -->

                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">
                                            Your Name
                                        </label>

                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}" placeholder="Enter Full Name" required>

                                    </div>

                                    <!-- Mobile -->

                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">
                                            Mobile Number
                                        </label>

                                        <input type="text" name="phone" class="form-control"
                                            value="{{ old('phone') }}" placeholder="01XXXXXXXXX">

                                    </div>

                                    <!-- City -->

                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">
                                            City
                                        </label>

                                        <input type="text" name="city" class="form-control"
                                            value="{{ old('city') }}" placeholder="Enter Your City">

                                    </div>

                                    <!-- Address -->

                                    <div class="col-md-6">

                                        <label class="form-label fw-semibold">
                                            Address
                                        </label>

                                        <input type="text" name="address" class="form-control"
                                            value="{{ old('address') }}" placeholder="Full Address">

                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">
                                            Email Address
                                        </label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email') }}" placeholder="example@email.com" required>
                                    </div>

                                    <!-- Anonymous Donation -->
                                    <div class="col-md-6 d-flex align-items-end">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="anonymous">
                                            <label class="form-check-label" for="anonymous">
                                                Donate Anonymously
                                            </label>
                                        </div>
                                    </div>

                                    <!-- ===========================
            DONATION AMOUNT
    =========================== -->

                                    <div class="col-12">

                                        <label class="form-label fw-bold fs-5">
                                            Select Donation Amount
                                        </label>

                                        <div class="d-flex flex-wrap gap-3">

                                            <input type="radio" class="btn-check" name="amount" id="amount1"
                                                value="200" checked>

                                            <label class="btn btn-outline-success px-4" for="amount1">
                                                ৳200
                                            </label>

                                            <input type="radio" class="btn-check" name="amount" id="amount2"
                                                value="500">

                                            <label class="btn btn-outline-success px-4" for="amount2">
                                                ৳500
                                            </label>

                                            <input type="radio" class="btn-check" name="amount" id="amount3"
                                                value="1000">

                                            <label class="btn btn-outline-success px-4" for="amount3">
                                                ৳1000
                                            </label>

                                            <input type="radio" class="btn-check" name="amount" id="amount4"
                                                value="2000">

                                            <label class="btn btn-outline-success px-4" for="amount4">
                                                ৳2000
                                            </label>

                                            <input type="radio" class="btn-check" name="amount" id="amount5"
                                                value="5000">

                                            <label class="btn btn-outline-success px-4" for="amount5">
                                                ৳5000
                                            </label>

                                        </div>

                                    </div>

                                    <!-- Custom Amount -->

                                    <div class="col-12">

                                        <label class="form-label fw-semibold">
                                            Or Enter Custom Amount
                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text">
                                                ৳
                                            </span>

                                            <input type="number" name="custom_amount" min="1" class="form-control"
                                                placeholder="Enter Amount">

                                        </div>

                                    </div>

                                    <!-- ===========================
          PAYMENT METHOD
    =========================== -->

                                    <div class="col-12">

                                        <label class="form-label fw-bold fs-5">
                                            Payment Method
                                        </label>

                                        <div class="row g-3">

                                            <div class="col-md-4">

                                                <input class="btn-check" type="radio" name="payment_method" id="bkash"
                                                    value="bKash" checked>

                                                <label class="btn btn-outline-success w-100 py-3" for="bkash">

                                                    <i class="fas fa-mobile-alt d-block fs-3 mb-2"></i>

                                                    bKash

                                                </label>

                                            </div>

                                            <div class="col-md-4">

                                                <input class="btn-check" type="radio" name="payment_method" id="nagad"
                                                    value="Nagad">

                                                <label class="btn btn-outline-success w-100 py-3" for="nagad">

                                                    <i class="fas fa-wallet d-block fs-3 mb-2"></i>

                                                    Nagad

                                                </label>

                                            </div>

                                            <div class="col-md-4">

                                                <input class="btn-check" type="radio" name="payment_method" id="card"
                                                    value="Visa/Master">

                                                <label class="btn btn-outline-success w-100 py-3" for="card">

                                                    <i class="far fa-credit-card d-block fs-3 mb-2"></i>

                                                    Visa / Master

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <!-- Message -->

                                    <div class="col-12">

                                        <label class="form-label">
                                            Message (Optional)
                                        </label>

                                        <textarea rows="4" class="form-control" placeholder="Write your message..."></textarea>

                                    </div>

                                    <!-- Terms -->

                                    <div class="col-12">

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" id="agree">

                                            <label class="form-check-label" for="agree">

                                                I agree to the Terms &
                                                Conditions and Privacy Policy.

                                            </label>

                                        </div>

                                    </div>

                                    <!-- Donate Button -->

                                    <div class="col-12">

                                        <button class="btn btn-success btn-lg w-100 py-3">

                                            <i class="fas fa-heart me-2"></i>

                                            Donate Securely

                                        </button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    
@endsection
