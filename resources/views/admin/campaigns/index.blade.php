@extends('admin.master')
@push('styles')
    <link href="{{ asset('') }}assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />
@endpush


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
                            <li class="breadcrumb-item"><a href="#">Tables</a>
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
                        <h4 class="card-title mb-0">Donor List</h4>
                        <a class="btn btn-sm btn-info " href="{{ route('campaignlist.create') }}">New Campaign <i
                                class="fas fa-arrow-right"></i> </a>


                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable_2">
                                <thead class="">
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Goal_amount</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                <img src="{{ asset('images/' . $item->image) }}" alt="Campaign Image"
                                                    width="60" height="60" class="rounded">
                                            </td>
                                            <td>{{ $item->name }} <br>
                                                <span>{{ $category->name ?? 'N/A' }}</span>
                                            </td>
                                            <td>{{ $item->category_id }}</td>
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
                                                    <i class="fas fa-edit"></i>Edit
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
                                    @endforeach
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



@push('scripts')
    <script src="{{ asset('') }}assets/libs/simple-datatables/umd/simple-datatables.js"></script>
    <script src="{{ asset('') }}assets/js/pages/datatable.init.js"></script>
@endpush
