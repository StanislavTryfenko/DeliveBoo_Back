@extends('layouts.admin')

@section('content')

<div class="container-fluid p-4">

  <div class="container-fluid p-4">

    <h2>Modifica {{ $dish->name }}</h2>
    @include('layouts.partials.validation-messages')

    <form onsubmit="return validateDishForm()" name="dishForm" action="{{ route('admin.dishes.update', $dish) }}"

        method="post" enctype="multipart/form-data" class="w-50">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label"><strong>Nome:</strong></label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $dish->name) }}"
                required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label"><strong>Immagine:</strong></label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label"><strong>Descrizione:</strong></label>
            <textarea class="form-control" id="description" name="description"
                rows="3">{{ old('description', $dish->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="row mb-3">
            <div class="col-6">
                <label for="price" class="form-label"><strong>Prezzo:</strong></label>
                <div class="input-group">
                    <span class="input-group-text">€</span>
                    <input type="text" class="form-control" id="price" aria-label="amount" name="price"
                        value="{{ old('price', $dish->price) }}" required>
                </div>
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="visible" class="form-label w-100">
                    Disponibile
                    <span class="position-relative">
                        <i class="bi bi-info-circle-fill text-info" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Indica se i clienti possono vedere questo prodotto sulla tua pagina e sono in grado di inserirlo nel proprio carrello"></i>
                    </span>
                </label>
                <input type="checkbox" class="form-check-input" id="visible" name="visible" value="1" {{ old('visible', $dish->visible) ? 'checked' : '' }} style="width:2rem; height: 2rem;">
                @error('visible')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-12 d-flex justify-content-center gap-2 py-4">
            <button type="submit"
                class="btn border-2 border-primary rounded-pill btn-sm p-2 btn_pills text-primary fw-bold">Salva
                modifiche</button>
            <a href="{{ route('admin.dishes.index') }}"
                class="btn border-2 border-secondary rounded-pill btn-sm p-2 btn_pills text-secondary fw-bold">
                Torna al menu
            </a>
        </div>

      method="post" enctype="multipart/form-data" class="w-50">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $dish->name) }}"
          required>
        @error('name')
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

      <div class="row mb-3">
        <div class="col-6">
          <label for="price" class="form-label">Prezzo</label>
          <div class="input-group">
            <span class="input-group-text">€</span>
            <input type="text" class="form-control" id="price" aria-label="amount" name="price"
              value="{{ old('price', $dish->price) }}" required>
          </div>
          @error('price')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-6">
          <label for="visible" class="form-label w-100">
            Visibile
            <span class="position-relative">
              <i class="bi bi-info-circle-fill text-info" data-bs-toggle="tooltip" data-bs-placement="top"
                title="Indica se i clienti possono vedere questo prodotto sulla tua pagina e sono in grado di inserirlo nel proprio carrello"></i>
            </span>
          </label>
          <input type="checkbox" class="form-check-input" id="visible" name="visible" value="1"
            {{ old('visible', $dish->visible) ? 'checked' : '' }} style="width:2rem; height: 2rem;">
          @error('visible')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="col-12 d-flex justify-content-center gap-2 py-4">
        <button type="submit"
          class="btn border-2 border-primary rounded-pill btn-sm p-2 btn_pills text-primary fw-bold">salva
          modifiche</button>
        <a href="{{ route('admin.dishes.index') }}"
          class="btn border-2 border-secondary rounded-pill btn-sm p-2 btn_pills text-secondary fw-bold">
          torna al menu
        </a>
      </div>


    </form>

    @push('scripts')

        <script src="{{ asset('js/validations/dishForm.js') }}"></script>
    @endpush
</div>
@endSection

      <script src="{{ asset('js/validations/dishForm.js') }}"></script>
    @endpush
  </div>
@endSection

