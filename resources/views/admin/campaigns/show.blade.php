@extends('admin.master')
@push('styles')
@endpush

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Campaign Details</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.campaignlist.index') }}">Campaigns</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item active">{{ $campaign->name }}</li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card">
                <img src="{{ asset('images/' . $campaign->image) }}" class="card-img-top" alt="{{ $campaign->name }}"
                    style="height:220px;object-fit:cover;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h4 class="mb-0">{{ $campaign->name }}</h4>
                        <span class="badge {{ $campaign->status_badge_class }}">{{ $campaign->status }}</span>
                    </div>
                    <p class="text-muted mb-1">Category: {{ $campaign->category->name ?? 'N/A' }}</p>
                    <p class="text-muted mb-3">{{ $campaign->description ?: 'No description provided.' }}</p>

                    <div class="progress mb-2" style="height: 10px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $campaign->progress }}%;"></div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">৳{{ number_format($campaign->raised_amount, 2) }} raised</small>
                        <small class="text-muted">{{ $campaign->progress }}% of ৳{{ number_format($campaign->goal_amount, 2) }}</small>
                    </div>

                    <hr>

                    <ul class="list-unstyled mb-0">
                        <li class="mb-1"><strong>Start Date:</strong> {{ optional($campaign->start_date)->format('d M Y') ?? '—' }}</li>
                        <li class="mb-1"><strong>End Date:</strong> {{ optional($campaign->end_date)->format('d M Y') ?? '—' }}</li>
                        <li class="mb-1"><strong>Created By:</strong> {{ $campaign->creator->name ?? 'N/A' }}</li>
                        <li class="mb-1"><strong>Created At:</strong> {{ $campaign->created_at->format('d M Y') }}</li>
                        <li class="mb-1"><strong>Donation Count:</strong> {{ $campaign->donations_count }}</li>
                    </ul>

                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('admin.campaignlist.edit', $campaign->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.campaignlist.destroy', $campaign->id) }}" method="POST"
                            onsubmit="return confirm('Move this campaign to trash?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Recent Donations ({{ $campaign->donations_count }} total)</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Donor</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recentDonations as $donation)
                                    <tr>
                                        <td>{{ $donation->name }}</td>
                                        <td>৳{{ number_format((float) $donation->amount, 2) }}</td>
                                        <td>{{ $donation->payment_method }}</td>
                                        <td>{{ $donation->created_at->format('d M Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No donations yet for this campaign.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
@endsection
