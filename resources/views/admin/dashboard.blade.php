@extends('admin.master')
@push('styles')
@endpush

@section('content')
    <div class="container-fluid col-md-12">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="d-flex align-items-center gap-2">

                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Approx</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <div class="row g-4">

            <!-- Left Side -->
            <div class="col-lg-7">
                <div class="card bg-globe-img  h-100 shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-center">

                        <span class="text-muted text-uppercase fw-semibold">
                            Total Raised Amount
                        </span>

                        <h2 class="fw-bold mt-3 mb-2">
                            {{ number_format((float) $totalRaised, 2) }}
                            <small class="fs-5 text-muted">BDT</small>
                        </h2>

                        <p class="text-muted mb-0">
                            Total donation collected from all active campaigns.
                        </p>

                    </div>
                    <div>
                        <p>Download Donations Report</p>
                        <div class="d-flex col-4 gap-2">

                            <a class="btn btn-sm btn-outline-secondary "
                                href="{{ route('admin.reports.donations.export', ['type' => 'csv']) }}">
                                <i class="fas fa-file-csv"></i> Export CSV
                            </a>
                            <a class="btn btn-sm btn-outline-danger"
                                href="{{ route('admin.reports.donations.export', ['type' => 'pdf']) }}">
                                <i class="fas fa-file-pdf"></i> Export PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side -->
            <div class="col-lg-5">
                <div class="row g-3">

                    <!-- Total Campaign -->
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm bg-corner-img">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted text-uppercase mb-1 fs-13">
                                        Total Campaign
                                    </p>
                                    <h3 class="mb-0">{{ $totalCampaigns }}</h3>
                                </div>

                                <div
                                    class="thumb-md border border-primary rounded d-flex align-items-center justify-content-center">
                                    <i class="iconoir-megaphone fs-22 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Active -->
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm bg-corner-img">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted text-uppercase mb-1 fs-13">
                                        Active Campaign
                                    </p>
                                    <h3 class="mb-0 text-success">{{ $activeCampaigns }}</h3>
                                </div>

                                <div
                                    class="thumb-md border border-success rounded d-flex align-items-center justify-content-center">
                                    <i class="iconoir-check-circle fs-22 text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Completed -->
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm bg-corner-img">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted text-uppercase mb-1 fs-13">
                                        Completed Campaign
                                    </p>
                                    <h3 class="mb-0 text-primary">{{ $completedCampaigns }}</h3>
                                </div>

                                <div
                                    class="thumb-md border border-primary rounded d-flex align-items-center justify-content-center">
                                    <i class="iconoir-check-circle fs-22 text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Closed -->
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm bg-corner-img">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted text-uppercase mb-1 fs-13">
                                        Closed Campaign
                                    </p>
                                    <h3 class="mb-0 text-warning">{{ $inactiveCampaigns }}</h3>
                                </div>

                                <div
                                    class="thumb-md border border-warning rounded d-flex align-items-center justify-content-center">
                                    <i class="iconoir-xmark-circle fs-22 text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Donor -->
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm bg-corner-img">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="text-muted text-uppercase mb-1 fs-13">
                                        Total Donor
                                    </p>
                                    <h3 class="mb-0 text-danger">{{ $totalDonors }}</h3>
                                </div>

                                <div
                                    class="thumb-md border border-danger rounded d-flex align-items-center justify-content-center">
                                    <i class="iconoir-user fs-22 text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div><!--end row-->



    </div> <!--end col-->
@endsection



@push('scripts')
@endpush
