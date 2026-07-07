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
                        <li class="breadcrumb-item"><a href="{{ route('donations.index') }}">Donations</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item"><a href="{{ route('donations.create') }}">New Donation</a>
                        </li><!--end nav-item-->

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
                    <a class="btn btn-sm btn-info " href="{{ route('donations.index') }}"><i class="fas fa-arrow-left"></i>
                        Back Table</a>


                </div><!--end card-header-->

                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                <div class="card-body pt-0">
                    <form class="row g-3 needs-validation" action="{{ route('donations.store') }}"
                        enctype="multipart/form-data" method="POST" novalidate>
                        @csrf
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="validationCustom01"
                                value="{{ old('name') }}" required>
                            {{-- <div class="valid-feedback">
                                Write your project name!
                            </div> --}}
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Campaigns</label>
                            <select class="form-select" name="campaigns" id="validationCustom04" required>
                                <option selected disabled value="">Choose Category</option>
                                <option selected  value="">Choose Category</option>
                                <option selected  value="">Choose Category</option>
                               
                            </select>
                            <div class="invalid-feedback">
                                Please select a category.
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustomUsername" class="form-label">Amount</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">৳</span>
                                <input type="text" name="amount" class="form-control" id="validationCustomUsername"
                                    aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please choose goal amount.
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Amount</label>
                            <textarea name="amount" class="form-control row-3" id="validationCustom02" required></textarea>
                            <div class="valid-feedback">
                                Add a short description.
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Status</label>
                            <select class="form-select" id="validationCustom04" name="status">
                                <option value="">Campaign Status</option>
                                <option value="0">Active</option>
                                <option value="1">Deactive</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="photo">Upload Campaign Image:</label>

                            <div id="drop-area"
                                class="border border-2 border-secondary border-dashed rounded-4 p-4 text-center position-relative"
                                style="height: 260px; cursor:pointer; border-style:dashed !important;">

                                <input class="form-control d-none" id="photo" name="photo" type="file"
                                    accept="image/*" required>

                                <div id="upload-content">
                                    <i class="fas fa-cloud-upload-alt fs-1 text-primary mb-3"></i>

                                    <h6 class="mb-2">Drag & Drop your image here</h6>

                                    <p class="text-muted mb-2">
                                        or <span class="text-primary fw-semibold">Click to browse</span>
                                    </p>

                                    <small class="text-muted">
                                        JPG, PNG, WEBP etc.
                                    </small>
                                </div>

                                <img id="preview-image" src="" class="d-none w-100 h-100 rounded-3"
                                    style="object-fit: cover;">
                            </div>

                            <div class="invalid-feedback">
                                Photo is required.
                            </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const dropArea = document.getElementById('drop-area');
            const input = document.getElementById('photo');
            const preview = document.getElementById('preview-image');

            dropArea.addEventListener('click', () => input.click());

            input.addEventListener('change', function() {
                if (this.files.length) {
                    showPreview(this.files[0]);
                }
            });

            ['dragenter', 'dragover'].forEach(event => {
                dropArea.addEventListener(event, function(e) {
                    e.preventDefault();
                    dropArea.classList.add('border-primary', 'bg-light');
                });
            });

            ['dragleave', 'drop'].forEach(event => {
                dropArea.addEventListener(event, function(e) {
                    e.preventDefault();
                    dropArea.classList.remove('border-primary', 'bg-light');
                });
            });

            dropArea.addEventListener('drop', function(e) {

                const files = e.dataTransfer.files;

                if (files.length) {
                    input.files = files;
                    showPreview(files[0]);
                }
            });

            function showPreview(file) {

                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');

                    document.getElementById('upload-content').classList.add('d-none');
                };

                reader.readAsDataURL(file);
            }

        });
    </script>
@endpush
