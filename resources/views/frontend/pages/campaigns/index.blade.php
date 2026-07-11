@extends('frontend.layout.master')

@section('content')
    <div class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url({{ asset('') }}frontent-assets/img/inner-page/breadcrumb.png);">
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Our Campaigns</h1>
                </div>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="{{ route('home') }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                        Campaigns
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Campaigns Section Start -->
    <section class="donation-section section-padding fix">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <span class="sub-title wow fadeInUp">Lets Start Donating</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        <span>A</span>ll Active Donation Causes
                    </h2>
                </div>
            </div>
            <div class="donation-wrapper">
                <div class="row">
                    @forelse ($campaigns as $index => $campaign)
                        @php
                            $goal = (float) $campaign->goal_amount;
                            $raised = (float) ($campaign->donations_sum_amount ?? 0);
                            $percent = $goal > 0 ? min(100, round(($raised / $goal) * 100)) : 0;
                            $styleClass = $index % 4 === 0 ? '' : 'style-' . (($index % 4) + 1);
                        @endphp
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay=".{{ (($index % 4) + 1) * 2 }}s">
                            <div class="donation-card-item">
                                <div class="donation-image">
                                    <img src="{{ asset('images/' . $campaign->image) }}" alt="{{ $campaign->name }}">
                                    <div class="right-shape">
                                        <img src="{{ asset('') }}frontent-assets/img/home-1/donation/shape.png"
                                            alt="img">
                                    </div>
                                </div>
                                <div class="donation-content">
                                    <h4>
                                        <a href="{{ route('campaigns.show', $campaign->id) }}">{{ $campaign->name }}</a>
                                    </h4>
                                    <p>
                                        {{ \Illuminate\Support\Str::limit($campaign->description, 90) }}
                                    </p>
                                    <div class="pro-items {{ $styleClass }}">
                                        <div class="progress">
                                            <div class="progress-value" style="animation:none; width: {{ $percent }}%;">
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="donate-list">
                                        <li>
                                            <span>Goal :</span> ৳{{ number_format($goal) }}
                                        </li>
                                        <li>
                                            <span>Raised:</span> ৳{{ number_format($raised) }}
                                        </li>
                                    </ul>
                                    <a href="{{ route('donation', ['campaign_id' => $campaign->id]) }}"
                                        class="theme-btn {{ $styleClass }}">Donate Now <i
                                            class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>No active campaigns right now. Please check back soon.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
