@extends('layouts.admin')

@section('content')
 <div class="container">
  <h2>Modifica {{ $dish->name }}</h2>
  @include('layouts.partials.validation-messages')

  <form action="{{ route('admin.dishes.update', $dish) }}" method="post" enctype="multipart/form-data">
   @csrf
   @method('PUT')

   <div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $dish->name) }}">
    @error('name')
     <div class="text-danger">{{ $message }}</div>
    @enderror
   </div>

   <div class="mb-3">
    <label for="price" class="form-label">Prezzo</label>
    <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $dish->price) }}">
    @error('price')
     <div class="text-danger">{{ $message }}</div>
    @enderror
   </div>

   <div class="mb-3">
    <label for="image" class="form-label">Immagine</label>
    <input type="file" class="form-control" id="image" name="image">
    @error('image')
     <div class="text-danger">{{ $message }}</div>
    @enderror
   </div>

   <div class="mb-3">
    <label for="description" class="form-label">Descrizione</label>
    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $dish->description) }}</textarea>
    @error('description')
     <div class="text-danger">{{ $message }}</div>
    @enderror
   </div>

   <div class="mb-3">
    <label for="visibile" class="form-label">Visibile sul sito:</label>
    <input type="checkbox" class="form-check-input" id="visible" name="visible" value="0"
     {{ old('visible', $dish->visibility) ? 'checked' : '' }} style="width:2rem; height: 2rem;">
    @error('visibility')
     <div class="text-danger">{{ $message }}</div>
    @enderror
   </div>

   <button type="submit" class="btn btn-primary w-100 mt-3">Salva modifiche</button>

  </form>
 </div>
@endSection
