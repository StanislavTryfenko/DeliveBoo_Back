@extends('layouts.admin')

@section('content')
    <h1>pagina modifica</h1>
    <form action="{{ route('admin.restaurants.update',$restaurant) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="my-2">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}" placeholder="es.Locanda Team 6">
            <small id="name" class="form-text text-muted">type here the name of your business</small>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="my-2">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                value="{{ old('address') }}" placeholder="es.Via Italia n* 6">
            <small id="name" class="form-text text-muted">type here the full address of your business</small>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="my-2">
            <label for="phone_number" class="form-label">Phone number</label>
            <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                name="phone_number" value="{{ old('phone_number') }}" placeholder="es.333 456 7810">
            <small id="name" class="form-text text-muted">type here the phone number of your business</small>
            @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="my-2">
            <label for="contact_email" class="form-label">Contact email</label>
            <input type="text" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email"
                name="contact_email" value="{{ old('contact_email') }}" placeholder="es.example@gmail.com">
            <small id="name" class="form-text text-muted">type here the contact email of your business</small>
            @error('contact_email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="my-2">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
            <small id="name" class="form-text text-muted">add your logo image</small>
            @error('logo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="my-2">
            <label for="thumb" class="form-label">Thumb</label>
            <input type="file" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb">
            <small id="name" class="form-text text-muted">add an image that rapresent your business</small>
            @error('thumb')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="my-2">
            <label for="vat" class="form-label">Vat</label>
            <input type="text" class="form-control @error('vat') is-invalid @enderror" id="vat" name="vat"
                value="{{ old('vat') }}" placeholder="es.11111111111">
            <small id="name" class="form-text text-muted">type here your VAT number</small>
            @error('vat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
