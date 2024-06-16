@extends('layouts.admin')

@section('content')
 <div class="container">

  <h2 class="fs-4 text-secondary my-4">
   {{ __('Dishes') }}
  </h2>
  <div class="container">
   <h4>
    Aggiungi un nuovo piatto
    <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">
     <i class="fa-solid fa-plus"></i>
    </a>
   </h4>

  </div>

  <div class="card p-4 mb-4 bg-white shadow rounded-lg">
   <div class="table-responsive">
    <table class="table">
     <thead>
      <tr>
       <th scope="col">#</th>
       <th scope="col">Image</th>
       <th scope="col">Name</th>
       <th scope="col">Price</th>
       <th scope="col">Description</th>
       <th scope="col">Actions</th>
      </tr>
     </thead>
     <tbody>
      @foreach ($dishes as $dish)
       <tr>
        <td scope="row">{{ $dish->id }}</td>
        <td>
         @if (str_starts_with($dish->image, 'http'))
          <img src="{{ $dish->image }}" alt="{{ $dish->name }}" width="100">
         @else
          <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" width="100">
         @endif
        </td>
        <td>{{ $dish->name }}</td>
        <td>{{ $dish->price }}</td>
        <td>{{ $dish->description }}</td>
        <td>
         <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-primary">Show</a>
         <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-primary">Edit</a>
         <a href="{{ route('admin.dishes.destroy', $dish) }}" class="btn btn-danger">Delete</a>
        </td>
       </tr>
      @endforeach
     </tbody>
    </table>
   </div>


  </div>

 </div>
@endSection
