@extends('layouts.admin')

@section('content')
    <h1>pagina modifica</h1>
    <form action="{{ route('admin.restaurants.update',$restaurant) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="my-2">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$restaurant->name}}"> 
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="my-2">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{$restaurant->address}}">
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="my-2">
            <label for="phone_number" class="form-label">Phone number</label>
            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                name="phone_number" value="{{$restaurant->phone_number}}">
            @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="my-2">
            <label for="contact_email" class="form-label">Contact email</label>
            <input type="text" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email"
                name="contact_email" value="{{$restaurant->contact_email}}">
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
            <input type="text" class="form-control @error('vat') is-invalid @enderror" id="vat" name="vat" value="{{$restaurant->vat}}">
            @error('vat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
