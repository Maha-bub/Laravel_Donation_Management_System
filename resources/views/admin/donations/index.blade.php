@extends('admin.master')

@section('content')
    <div class="container-fluid col-12">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Datatable</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Approx</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item"><a href="{{ route('admin.donations.index') }} ">Donation</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item active">Datatable</li>
                        </ol>
                    </div>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Donations</h4>
                        <a class="btn btn-sm btn-info " href="{{ route('admin.donations.create') }}">Add Donations <i
                                class="fas fa-arrow-right"></i> </a>


                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable_2">
                                <thead class="">
                                    <tr>
                                        <th>Id</th>
                                        <th>Donor Name</th>
                                        <th>Campaign</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->campaign->name ?? '-' }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ $item->payment_method }}</td>
                                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                            <td class="text-nowrap">
                                                <!-- View -->
                                                <a href="{{ route('admin.donations.show', $item->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-eye"></i> View
                                                </a>

                                                <!-- Edit -->
                                                <a href="{{ route('admin.donations.edit', $item->id) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>

                                                <!-- Delete -->
                                                <form action="{{ route('admin.donations.destroy', $item->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this donation?')">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No donations found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div>
                                <p>Download Donations Report</p>
                                <div class="d-flex gap-2 mb-3 flex-wrap">
                                    <a href="{{ route('admin.donations.index', ['period' => 'today']) }}"
                                        class="btn btn-sm {{ request('period') === 'today' ? 'btn-primary' : 'btn-outline-secondary' }}">
                                        Today
                                    </a>
                                    <a href="{{ route('admin.donations.index', ['period' => 'weekly']) }}"
                                        class="btn btn-sm {{ request('period') === 'weekly' ? 'btn-primary' : 'btn-outline-secondary' }}">
                                        This Week
                                    </a>
                                    <a href="{{ route('admin.donations.index', ['period' => 'monthly']) }}"
                                        class="btn btn-sm {{ request('period') === 'monthly' ? 'btn-primary' : 'btn-outline-secondary' }}">
                                        This Month
                                    </a>
                                    <a href="{{ route('admin.donations.index') }}"
                                        class="btn btn-sm {{ !request('period') && !request('date_from') ? 'btn-primary' : 'btn-outline-secondary' }}">
                                        All Time
                                    </a>
                                </div>

                                <div class="d-flex col-4 gap-2">

                                    <a class="btn btn-sm btn-outline-secondary"
                                        href="{{ route(
                                            'admin.reports.donations.export',
                                            array_filter([
                                                'type' => 'csv',
                                                'period' => request('period'),
                                                'date_from' => request('date_from'),
                                                'date_to' => request('date_to'),
                                            ]),
                                        ) }}">
                                        <i class="fas fa-file-csv"></i> Export CSV
                                    </a>

                                    <a class="btn btn-sm btn-outline-danger"
                                        href="{{ route(
                                            'admin.reports.donations.export',
                                            array_filter([
                                                'type' => 'pdf',
                                                'period' => request('period'),
                                                'date_from' => request('date_from'),
                                                'date_to' => request('date_to'),
                                            ]),
                                        ) }}">
                                        <i class="fas fa-file-pdf"></i> Export PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->
    </div><!-- container -->
@endsection
