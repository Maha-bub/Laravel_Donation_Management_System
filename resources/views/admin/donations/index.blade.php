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

        {{-- @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif --}}


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
                                                <form action="{{ route('admin.donations.destroy', $item->id) }}" method="POST"
                                                    class="d-inline">
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
                            <button type="button" class="btn btn-sm btn-primary csv">Export CSV</button>
                            <button type="button" class="btn btn-sm btn-primary sql">Export SQL</button>
                            <button type="button" class="btn btn-sm btn-primary txt">Export TXT</button>
                            <button type="button" class="btn btn-sm btn-primary json">Export JSON</button>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->
    </div><!-- container -->
@endsection
