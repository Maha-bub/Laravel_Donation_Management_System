@extends('admin.master')
@push('styles')
    <link href="{{ asset('') }}assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <!-- Page Content-->

    <div class="container-fluid">
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


        <div class="row justify-content-center col-12">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Category List</h4>
                        <a class="btn btn-sm btn-primary " href="{{ route('admin.category.create') }}">Add New Category <i
                                class="fas fa-arrow-right"></i></a>


                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Category Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    required>
                            </div>




                            <button type="submit" class="btn btn-primary w-100">Save Donor</button>
                        </form>
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
