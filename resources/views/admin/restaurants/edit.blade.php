@extends('layouts.admin')

@section('content')
    <section class="p-2">
        <div>
            <h2>{{ $restaurant->name }}</h2>
            <p>Edit your Restaurant Data</p>
        </div>

        <form name="restaurantForm" onsubmit="return validateRestaurantForm()"
            action="{{ route('admin.restaurants.update', $restaurant) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $restaurant->name) }}" placeholder="es.Locanda Team 6" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <small id="name" class="form-text text-muted">Edit the Name of your Restaurant</small>
            </div>


            <div class="row mb-2">
                <div class="col-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" value="{{ old('address', $restaurant->address) }}" placeholder="es.Via Italia n* 6"
                        required>
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <small id="name" class="form-text text-muted">Edit the Address of your Restaurant</small>
                </div>


                <div class="col-3">
                    <label for="phone_number" class="form-label">Phone number</label>
                    <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                        name="phone_number" value="{{ old('phone_number', $restaurant->phone_number) }}"
                        placeholder="es.3334567810">
                    @error('phone_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <small id="name" class="form-text text-muted">Edit the Phone Number of your Restaurant</small>
                </div>


                <div class="col-3">
                    <label for="contact_email" class="form-label">Contact email</label>
                    <input type="text" class="form-control @error('contact_email') is-invalid @enderror"
                        id="contact_email" name="contact_email"
                        value="{{ old('contact_email', $restaurant->contact_email) }}" placeholder="es.example@gmail.com"
                        required>
                    @error('contact_email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <small id="name" class="form-text text-muted">Edit the Email for your Restaurant</small>
                </div>
            </div>


            <div class="row mb-2">
                <div class="col">
                    @if ($restaurant->thumb)
                        <img width="140" src="{{ asset('storage/' . $restaurant->thumb) }}"
                            alt="{{ $restaurant->name }}">
                    @endif
                    <label for="thumb" class="form-label">Thumb</label>
                    <input type="file" class="form-control @error('thumb') is-invalid @enderror" id="thumb"
                        name="thumb">
                    @error('thumb')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <small id="name" class="form-text text-muted">Edit the Thumb of your Restaurant</small>
                </div>


                <div class="col">
                    @if ($restaurant->logo)
                        <img width="140" src="{{ asset('storage/' . $restaurant->logo) }}"
                            alt="{{ $restaurant->name }}">
                    @endif
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
                        name="logo">
                    @error('logo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <small id="name" class="form-text text-muted">Edit the Logo of your Restaurant</small>
                </div>
            </div>

            @if ($errors->any())
                <label for="type" class="form-label">Type of restaurants</label>
                <div class="d-flex gap-3">
                    @foreach ($typeList as $type)
                        <div class="form-check text-center">
                            <input name="typeList[]" class="form-check-input" type="checkbox" value="{{ $type->id }}"
                                id="type-{{ $type->id }}"
                                {{ in_array($type->id, old('typeList', [])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="type-{{ $type->id }}">{{ $type->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('typeList')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            @else
                <label for="type" class="form-label">Type of restaurants</label>
                <div class="d-flex gap-3">
                    @foreach ($typeList as $type)
                        <div class="form-check text-center">
                            <input name="typeList[]" class="form-check-input" type="checkbox" value="{{ $type->id }}"
                                id="type-{{ $type->id }}"
                                {{ $restaurant->types()->find($type->id) ? 'checked' : '' }} />
                            <label class="form-check-label" for="type-{{ $type->id }}">{{ $type->name }}</label>
                        </div>
                    @endforeach
                </div>
            @endif
            <small id="name" class="form-text text-muted">Edit the Type of your Restaurant</small>

            <div class="mb-2">
                <label for="vat" class="form-label">Vat</label>
                <input type="text" class="form-control @error('vat') is-invalid @enderror" id="vat"
                    name="vat" value="{{ old('vat', $restaurant->vat) }}" placeholder="es.11111111111" required>
                @error('vat')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <small id="name" class="form-text text-muted">Edit the Vat of your Restaurant</small>
            </div>
            <button type="submit" class="btn btn-primary m-2">Submit Changes</button>
        </form>
    </section>

    @push('scripts')
        <script src="{{ asset('js/validations/restaurantForm.js') }}"></script>
    @endpush

@endsection
