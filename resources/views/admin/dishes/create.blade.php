@extends('layouts.admin')

@section('content')
    <div class="container">

        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dishes') }}
        </h2>
        @include('layouts.partials.validation-messages')

        <div class="card p-4 mb-4 bg-white shadow rounded-lg">
            <div class="table-responsive">
                <form action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <small id="name" class="form-text text-muted">Add the Name of your Dish</small>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}"
                            required>
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <small id="name" class="form-text text-muted">Add the Price of your Dish</small>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <small id="name" class="form-text text-muted">Add the Image of your Dish</small>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <small id="name" class="form-text text-muted">Add the Description of your Dish</small>
                    </div>

                    <div class="mb-3">
                        <label for="visible" class="form-label">Available:</label>
                        <input type="hidden" name="visible" value="0">
                        <input type="checkbox" class="form-check-input" id="visible" name="visible" value="1"
                            {{ old('visible') ? 'checked' : '' }} style="width:2rem; height: 2rem;">
                        @error('visible')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <small id="name" class="form-text text-muted">Set if this Dish is Available</small>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">Create</button>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/validations/dishForm.js') }}"></script>
    @endpush
@endsection
