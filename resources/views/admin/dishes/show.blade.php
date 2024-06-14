@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="col-6">
                <img src="{{ $dish->image }}" class="card-img-top" alt="{{ $dish->name }}">
            </div>
            <div class="col-6">
                <h2 class="fs-4 text-secondary my-4">
                    {{ $dish->name }}
                </h2>
                <p>{{ $dish->description }}</p>
                <div class="metadata">
                    <p>{{ $dish->price }}</p>
                    @if ($dish->visibility == 1)
                        <p>Visible</p>
                    @elseif ($dish->visibility == 0)
                        <p>Not Visible</p>
                    @endif
                    
                </div>
            </div>
        </div>
    @endsection
