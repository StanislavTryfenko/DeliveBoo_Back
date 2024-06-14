@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!$restaurant)
                            {{-- Form create restaurant --}}
                            <form action="{{ route('admin.restaurants.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="my-2">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" >
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="my-2">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address">
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="my-2">
                                    <label for="phone_number" class="form-label">Phone number</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number">
                                    @error('phone_number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="my-2">
                                    <label for="contact_email" class="form-label">Contact email</label>
                                    <input type="text" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" name="contact_email">
                                    @error('contact_email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="my-2">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                                    @error('logo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="my-2">
                                    <label for="thumb" class="form-label">Thumb</label>
                                    <input type="file" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb">
                                    @error('thumb')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="my-2">
                                    <label for="vat" class="form-label">Vat</label>
                                    <input type="text" class="form-control @error('vat') is-invalid @enderror" id="vat" name="vat">
                                    @error('vat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        @else
                            <div class="h2">{{ $restaurant->name }}</div>
                            <div class="h2">{{ $restaurant->address }}</div>
                            <div class="h2">{{ $restaurant->phone_number }}</div>
                            <div class="h2">{{ $restaurant->contact_email }}</div>
                            <div class="h2">{{ $restaurant->logo }}</div>
                            <div class="h2">{{ $restaurant->thumb }}</div>
                            <div class="h2">{{ $restaurant->vat }}</div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
