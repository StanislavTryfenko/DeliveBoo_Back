@extends('layouts.admin')

@section('content')

    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dishes') }}
        </h2>
        <div class="card p-4 mb-4 bg-white shadow rounded-lg">
            <div class="table-responsive">
                <form action="{{ route('admin.dishes.update', $dish) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $dish->name) }}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $dish->price) }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $dish->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="visibility" class="form-label">Disponibilità</label>
                        <input type="checkbox" class="form-control" id="visibility" name="visibility" value="1">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Crea</button>
                </form>
            </div>
        </div>
    </div>

@endSection