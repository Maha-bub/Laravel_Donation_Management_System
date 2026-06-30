@extends('admin.master')
@push('styles')
@endpush

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Validation</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Approx</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item"><a href="#">Forms</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item active">Validation</li>
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Create a campaign</h4>
                    <a class="btn btn-sm btn-info " href="{{ route('campaignlist.index') }}"><i class="fas fa-arrow-left"></i> Back</a>


                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Name</label>
                            <input type="name" name="name" class="form-control" id="validationCustom01"
                                value="{{ old('name') }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Category</label>
                            <select class="form-select" id="validationCustom04" required>

                                <option selected disabled value="">Choose Category</option>

                                <option>...</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Description</label>
                            <textarea type="text" name="category" class="form-control row-3" id="validationCustom02" required></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustomUsername" class="form-label">Goal Amount</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">৳</span>
                                <input type="text" name="goal_amount" class="form-control" id="validationCustomUsername"
                                    aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Status</label>
                            <select class="form-select" id="validationCustom04" name="status">
                                <option value="">Campaign Status</option>
                                <option value="0">Active</option>
                                <option value="1">Deactive</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="photo">Upload Student Image:</label>
                            <input class="form-control" id="photo" name="photo" type="file" required>
                            <div class="invalid-feedback">Photo is required.</div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary justify-content-end" type="submit">Submit form</button>
                        </div>
                    </form><!--end form-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->

    </div><!--end row-->
@endsection

@push('scripts')
    <script src="{{ asset('') }}assets/js/pages/form-validation.js"></script>
@endpush
