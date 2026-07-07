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
                                <option selected disabled value="">Choose Campaigns</option>
                                @foreach ($campains as $campain)
                                    <option value="{{ $campain->id }}">
                                        {{ $campain->campaign }}
                                    </option>
                                @endforeach


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


                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Payment Method</label>
                            <select class="form-select" id="validationCustom04" name="payment_method">
                                <option value="">Choose one</option>
                                <option value="0">Bkash</option>
                                <option value="1">Nagad</option>
                            </select>
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
