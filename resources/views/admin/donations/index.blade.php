@extends('admin.master')

@section('content')
    <div class="container-fluid col-12">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Datatable</h4>
                    <div class="">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Approx</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item"><a href="#">Donation</a>
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
                        <a class="btn btn-sm btn-info " href="{{ route('donations.create') }}">Add Donations <i
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
                                    <tr>
                                        <td>1</td>
                                        <td>Mahabub</td>
                                        <td>School Bag Donation</td>
                                        <td>500</td>
                                        <td>Bkash</td>
                                        <td>02-05-2026</td>
                                        <td>View|Edit|Delete</td>
                                    </tr>
                                    {{-- @forelse ($items as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                <img src="{{ asset('images/' . $item->image) }}" alt="Campaign Image"
                                                    width="60" height="60" class="rounded">
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->category->name ?? 'N/A' }}</td>
                                            <td>
                                                {{ $item->goal_amount }}
                                            </td>
                                            <td>
                                                <span class="badge {{ $item->status == 0 ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $item->status == 0 ? 'Active' : 'Deactive' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="me-2"></span>

                                                <!-- Edit Icon Button -->
                                                <a href="{{ route('campaignlist.edit', $item->id) }}"
                                                    class="text-primary me-2" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <!-- Delete Icon Button -->
                                                <form action="{{ route('campaignlist.destroy', $item->id) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Are you sure?')">
                                                    @csrf

                                                    @method('DELETE')

                                                    <button class="btn p-0 border-0 text-danger" type="submit">
                                                        <i class="fas fa-trash-alt"></i>Delete
                                                    </button>
                                                </form>


                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No campaigns found.</td>
                                        </tr>
                                    @endforelse --}}

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
