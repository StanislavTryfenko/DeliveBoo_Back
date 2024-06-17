@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">

      {{-- add your restaurant here --}}
      @if ($restaurant === null)
      <section>
      @include('layouts.partials.restaurant.creation')
      </section>
    @else

        {{-- my restaurant --}}
        <section id="my_restaurant">

        <div class="row py-2">
          {{-- thumb image --}}
          <div class="col-auto py-2">
          @if($restaurant->thumb != null)
        <img src="{{ asset('storage/' . $restaurant->thumb) }}" alt="{{ $restaurant->name }}"
        style="width: 200px; height: 200px" class="rounded">
      @else
      <img src="https://placehold.co/200x200" alt="restaurant placeholder" class="rounded">
    @endif
          </div>
          {{-- name and contacts --}}
          <div class="col-auto d-flex py-4">
          <div class="col-auto">
            <h2 class="text-left">{{ $restaurant->name }}</h2>
            <div class="contacts">
            <p><i class="fa-solid fa-location-dot"></i>{{ $restaurant->address }}</p>
            <p><i class="fa-solid fa-envelope"></i>{{ $restaurant->contact_email }}</p>
            <p><i class="fa-solid fa-phone"></i> {{ $restaurant->phone_number }}</p>
            @foreach ($restaurant->types as $type)
        <span> {{ $type->name }};</span>
      @endforeach
            </div>
          </div>
          </div>
          {{-- edit --}}
          <div class="col-auto p-4 text-end">
          <a href="{{ route('admin.restaurants.edit', $restaurant) }}">
            <i class="fa-solid fa-pen"></i>
          </a>
          </div>
        </div>

      </div>

      </div>
    </div>
    </section>
  @endif
@endsection