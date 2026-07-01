@extends('admin.master')
@push('styles')
@endpush

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Edit Campaign</h4>
                    <a class="btn btn-sm btn-info" href="{{ route('campaignlist.index') }}"><i class="fas fa-arrow-left"></i>
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
                    <form class="row g-3" action="{{ route('campaignlist.update', $campaignList->id) }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ old('name', $campaignList->name) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="" disabled>Choose Category</option>
                                @foreach (['Education', 'Health', 'Disaster Relief', 'Food', 'Other'] as $cat)
                                    <option value="{{ $cat }}"
                                        {{ old('category', $campaignList->category) == $cat ? 'selected' : '' }}>
                                        {{ $cat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control row-3" id="description">{{ old('description', $campaignList->description) }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="goal_amount" class="form-label">Goal Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">৳</span>
                                <input type="text" name="goal_amount" class="form-control" id="goal_amount"
                                    value="{{ old('goal_amount', $campaignList->goal_amount) }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="0" {{ old('status', $campaignList->status) == 0 ? 'selected' : '' }}>
                                    Active</option>
                                <option value="1" {{ old('status', $campaignList->status) == 1 ? 'selected' : '' }}>
                                    Deactive</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="photo">Campaign Image</label>
                            @if ($campaignList->image)
                                <div class="mb-2">
                                    <img src="{{ asset('images/' . $campaignList->image) }}" width="80"
                                        style="border-radius:4px;">
                                </div>
                            @endif
                            <input class="form-control" id="photo" name="photo" type="file" accept="image/*">
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
