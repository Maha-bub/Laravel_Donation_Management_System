@extends('frontend.layout.master')

@section('content')
    @php
        $goal = (float) $campaign->goal_amount;
        $raised = (float) ($campaign->donations_sum_amount ?? 0);
        $percent = $goal > 0 ? min(100, round(($raised / $goal) * 100)) : 0;
    @endphp

    <div class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url({{ asset('') }}frontent-assets/img/inner-page/breadcrumb.png);">
        <div class="container">
            <div class="page-heading">
                <div class="breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ $campaign->name }}</h1>
                </div>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="{{ route('campaigns.index') }}">Campaigns</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                        {{ $campaign->name }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Campaign Details Section Start -->
    <section class="section-padding fix">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="donation-image mb-4">
                        <img src="{{ asset('images/' . $campaign->image) }}" alt="{{ $campaign->name }}"
                            class="w-100 rounded-3">
                    </div>

                    @if ($campaign->category)
                        <span class="sub-title d-inline-block mb-2">{{ $campaign->category->name }}</span>
                    @endif

                    <h2 class="mb-3">{{ $campaign->name }}</h2>

                    <p class="text-muted">
                        {{ $campaign->description }}
                    </p>
                </div>

                <div class="col-lg-4">
                    <div class="donation-card-item p-4 border rounded-3">
                        <div class="donation-content">
                            <div class="pro-items mb-2">
                                <div class="progress">
                                    <div class="progress-value" style="animation:none; width: {{ $percent }}%;"></div>
                                </div>
                            </div>
                            <ul class="donate-list mb-3">
                                <li>
                                    <span>Goal :</span> ৳{{ number_format($goal) }}
                                </li>
                                <li>
                                    <span>Raised:</span> ৳{{ number_format($raised) }}
                                </li>
                            </ul>
                            <p class="text-muted mb-3">{{ $percent }}% of the goal has been raised so far.</p>
                            <a href="{{ route('donation', ['campaign_id' => $campaign->id]) }}"
                                class="theme-btn w-100 text-center d-block">
                                Donate Now <i class="fa-solid fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @if ($relatedCampaigns->isNotEmpty())
                <div class="section-title mt-5 mb-4">
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">
                        <span>O</span>ther Ongoing Campaigns
                    </h2>
                </div>
                <div class="row g-4">
                    @foreach ($relatedCampaigns as $related)
                        <div class="col-lg-4 col-md-6">
                            <div class="donation-card-item">
                                <div class="donation-image">
                                    <img src="{{ asset('images/' . $related->image) }}" alt="{{ $related->name }}">
                                </div>
                                <div class="donation-content">
                                    <h4>
                                        <a href="{{ route('campaigns.show', $related->id) }}">{{ $related->name }}</a>
                                    </h4>
                                    <a href="{{ route('donation', ['campaign_id' => $related->id]) }}" class="theme-btn">
                                        Donate Now <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
