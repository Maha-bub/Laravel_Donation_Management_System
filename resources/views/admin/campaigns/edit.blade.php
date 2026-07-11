@extends('admin.master')
@push('styles')
@endpush

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                <h4 class="page-title">Edit Campaign</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.campaignlist.index') }}">Campaigns</a>
                        </li><!--end nav-item-->
                        <li class="breadcrumb-item active">Edit</li><!--end nav-item-->
                    </ol>
                </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Edit Campaign</h4>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.campaignlist.index') }}"><i class="fas fa-arrow-left"></i>
                        Back</a>
                </div><!--end card-header-->

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body pt-0">
                    <form class="row g-3" action="{{ route('admin.campaignlist.update', $campaignlist->id) }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <label for="name" class="form-label">Campaign Title</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ old('name', $campaignlist->name) }}" maxlength="100" required>
                        </div>

                        <div class="col-md-6">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="" disabled>Choose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $campaignlist->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Short Description</label>
                            <textarea name="description" class="form-control row-3" id="description" maxlength="500" rows="3">{{ old('description', $campaignlist->description) }}</textarea>
                        </div>

                        <div class="col-md-4">
                            <label for="goal_amount" class="form-label">Goal Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">৳</span>
                                <input type="number" step="0.01" min="1" name="goal_amount" class="form-control"
                                    id="goal_amount" value="{{ old('goal_amount', $campaignlist->goal_amount) }}" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date"
                                value="{{ old('start_date', optional($campaignlist->start_date)->format('Y-m-d')) }}">
                        </div>

                        <div class="col-md-4">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" class="form-control" id="end_date"
                                value="{{ old('end_date', optional($campaignlist->end_date)->format('Y-m-d')) }}">
                        </div>

                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                @foreach ($statuses as $statusOption)
                                    <option value="{{ $statusOption }}"
                                        {{ old('status', $campaignlist->status) == $statusOption ? 'selected' : '' }}>
                                        {{ $statusOption }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="photo">Featured Image</label>
                            @if ($campaignlist->image)
                                <div class="mb-2">
                                    <img src="{{ asset('images/' . $campaignlist->image) }}" width="80"
                                        style="border-radius:4px;">
                                </div>
                            @endif
                            <input class="form-control" id="photo" name="photo" type="file" accept="image/*">
                            <small class="text-muted">Leave empty to keep the current image.</small>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-warning" type="submit">Update Campaign</button>
                        </div>
                    </form><!--end form-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->
@endsection
