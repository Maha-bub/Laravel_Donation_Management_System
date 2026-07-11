@extends('admin.master')
@push('styles')
@endpush


@section('content')
    <div class="container-fluid col-12">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Campaign Management</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item active">Campaigns</li>
                        </ol>
                    </div>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Dashboard statistics --}}
        <div class="row g-3 mb-3">
            <div class="col-6 col-md-2">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <p class="text-muted text-uppercase mb-1 fs-13">Total Campaigns</p>
                        <h4 class="mb-0">{{ $stats['total'] }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <p class="text-muted text-uppercase mb-1 fs-13">Active</p>
                        <h4 class="mb-0 text-success">{{ $stats['active'] }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <p class="text-muted text-uppercase mb-1 fs-13">Completed</p>
                        <h4 class="mb-0 text-primary">{{ $stats['completed'] }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <p class="text-muted text-uppercase mb-1 fs-13">Total Goal</p>
                        <h4 class="mb-0">৳{{ number_format($stats['total_goal'], 2) }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <p class="text-muted text-uppercase mb-1 fs-13">Total Raised</p>
                        <h4 class="mb-0 text-success">৳{{ number_format($stats['total_raised'], 2) }}</h4>
                    </div>
                </div>
            </div>
        </div>

        @if ($topCampaign)
            <div class="alert alert-light border d-flex align-items-center gap-2 mb-3">
                <i class="fas fa-trophy text-warning"></i>
                <span>Top performing campaign: <strong>{{ $topCampaign->name }}</strong>
                    (৳{{ number_format($topCampaign->raised_amount, 2) }} raised)</span>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="card-title mb-0">{{ $showTrashed ? 'Trashed Campaigns' : 'Campaign List' }}</h4>
                        <div class="d-flex gap-2">
                            @if ($showTrashed)
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.campaignlist.index') }}">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                            @else
                                <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.campaignlist.index', ['trashed' => 1]) }}">
                                    <i class="fas fa-trash-alt"></i> Trashed
                                </a>
                                <a class="btn btn-sm btn-info" href="{{ route('admin.campaignlist.create') }}">
                                    New Campaign <i class="fas fa-arrow-right"></i>
                                </a>
                            @endif
                        </div>
                    </div><!--end card-header-->

                    @unless ($showTrashed)
                        <div class="card-body pb-0">
                            <form method="GET" action="{{ route('admin.campaignlist.index') }}" class="row g-2 align-items-end">
                                <div class="col-md-3">
                                    <label class="form-label mb-1">Search Title</label>
                                    <input type="text" name="search" class="form-control form-control-sm"
                                        value="{{ $filters['search'] ?? '' }}" placeholder="Search by title...">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label mb-1">Category</label>
                                    <select name="category_id" class="form-select form-select-sm">
                                        <option value="">All</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ (string) ($filters['category_id'] ?? '') === (string) $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label mb-1">Status</label>
                                    <select name="status" class="form-select form-select-sm">
                                        <option value="">All</option>
                                        @foreach ($statuses as $statusOption)
                                            <option value="{{ $statusOption }}"
                                                {{ ($filters['status'] ?? '') === $statusOption ? 'selected' : '' }}>
                                                {{ $statusOption }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label mb-1">Ending From</label>
                                    <input type="date" name="end_from" class="form-control form-control-sm"
                                        value="{{ $filters['end_from'] ?? '' }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label mb-1">Ending To</label>
                                    <input type="date" name="end_to" class="form-control form-control-sm"
                                        value="{{ $filters['end_to'] ?? '' }}">
                                </div>
                                <div class="col-md-1 d-flex gap-1">
                                    <button type="submit" class="btn btn-sm btn-primary" title="Filter">
                                        <i class="fas fa-filter"></i>
                                    </button>
                                    <a href="{{ route('admin.campaignlist.index') }}" class="btn btn-sm btn-outline-secondary" title="Reset">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label mb-1">Sort By</label>
                                    <select name="sort_by" class="form-select form-select-sm">
                                        <option value="created_at" {{ ($filters['sort_by'] ?? 'created_at') === 'created_at' ? 'selected' : '' }}>Newest</option>
                                        <option value="name" {{ ($filters['sort_by'] ?? '') === 'name' ? 'selected' : '' }}>Title</option>
                                        <option value="goal_amount" {{ ($filters['sort_by'] ?? '') === 'goal_amount' ? 'selected' : '' }}>Goal Amount</option>
                                        <option value="donations_sum_amount" {{ ($filters['sort_by'] ?? '') === 'donations_sum_amount' ? 'selected' : '' }}>Raised Amount</option>
                                        <option value="end_date" {{ ($filters['sort_by'] ?? '') === 'end_date' ? 'selected' : '' }}>End Date</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label mb-1">Direction</label>
                                    <select name="sort_dir" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="desc" {{ ($filters['sort_dir'] ?? 'desc') === 'desc' ? 'selected' : '' }}>Desc</option>
                                        <option value="asc" {{ ($filters['sort_dir'] ?? '') === 'asc' ? 'selected' : '' }}>Asc</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    @endunless

                    <div class="card-body pt-2">
                        <div class="table-responsive">
                            <table class="table" id="datatable_2">
                                <thead class="">
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Goal</th>
                                        <th>Raised</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('images/' . $item->image) }}" alt="Campaign Image"
                                                    width="50" height="50" class="rounded">
                                            </td>
                                            <td>
                                                @if ($showTrashed)
                                                    {{ $item->name }}
                                                @else
                                                    <a href="{{ route('admin.campaignlist.show', $item->id) }}">{{ $item->name }}</a>
                                                @endif
                                            </td>
                                            <td>{{ $item->category->name ?? 'N/A' }}</td>
                                            <td>৳{{ number_format($item->goal_amount, 2) }}</td>
                                            <td>৳{{ number_format($item->raised_amount, 2) }}</td>
                                            <td style="min-width:120px;">
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: {{ $item->progress }}%;"></div>
                                                </div>
                                                <small class="text-muted">{{ $item->progress }}%</small>
                                            </td>
                                            <td>
                                                <span class="badge {{ $item->status_badge_class }}">
                                                    {{ $item->status }}
                                                </span>
                                            </td>
                                            <td>{{ optional($item->end_date)->format('d M Y') ?? '—' }}</td>
                                            <td>
                                                @if ($showTrashed)
                                                    <form action="{{ route('admin.campaignlist.restore', $item->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn p-0 border-0 text-success me-2" type="submit" title="Restore">
                                                            <i class="fas fa-undo"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.campaignlist.forceDelete', $item->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Permanently delete this campaign? This cannot be undone.')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn p-0 border-0 text-danger" type="submit" title="Delete Permanently">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('admin.campaignlist.show', $item->id) }}"
                                                        class="text-secondary me-2" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.campaignlist.edit', $item->id) }}"
                                                        class="text-primary me-2" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.campaignlist.destroy', $item->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Move this campaign to trash?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn p-0 border-0 text-danger" type="submit" title="Delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">No campaigns found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <button type="button" class="btn btn-sm btn-primary csv">Export CSV</button>
                                    <button type="button" class="btn btn-sm btn-primary json">Export JSON</button>
                                </div>
                                <div>
                                    {{ $items->links() }}
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->
    </div><!-- container -->
@endsection


@push('scripts')
    <script src="{{ asset('') }}assets/libs/simple-datatables/umd/simple-datatables.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dataTable_2 = new simpleDatatables.DataTable("#datatable_2", {
                searchable: false,
                paging: false,
                sortable: false,
            });

            const csvBtn = document.querySelector('button.csv');
            if (csvBtn) {
                csvBtn.addEventListener('click', () => {
                    dataTable_2.export({ type: 'csv', download: true, filename: 'campaigns' });
                });
            }

            const jsonBtn = document.querySelector('button.json');
            if (jsonBtn) {
                jsonBtn.addEventListener('click', () => {
                    dataTable_2.export({ type: 'json', download: true, filename: 'campaigns' });
                });
            }
        });
    </script>
@endpush
