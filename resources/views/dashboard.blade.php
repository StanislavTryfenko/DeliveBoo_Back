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
                        @if ($restaurant)
                            Form create restaurant
                        @elseif($restaurant)
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
