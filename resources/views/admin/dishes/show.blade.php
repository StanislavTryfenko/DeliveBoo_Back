@extends('layouts.admin')

@section('content')
  <div class="container-fluid">
    <div class="row p-4">
      {{-- immagine --}}
      <div class="col-3 p-2">
        @if ($dish->image != null)
          <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" class="rounded img-fluid">
        @else
          <img src="https://placehold.co/500x500" alt="restaurant placeholder" class="rounded img-fluid">
        @endif
      </div>
      {{-- metadata --}}
      <div class="col-9">
        <h2 class="text-secondary my-4">
          {{ $dish->name }}
        </h2>
        <h5>Descrizione:</h5>
        <p>{{ $dish->description }}</p>
        <div class="metadata">
          <h5>Prezzo impostato</h5>
          <p>€ {{ $dish->price }}</p>
          @if ($dish->visible == 1)
            <p>
              Attualmente visible
              <span class="position-relative">
                <i class="bi bi-info-circle-fill text-info" data-bs-toggle="tooltip" data-bs-placement="top"
                  title="Indica se i clienti possono vedere questo prodotto sulla tua pagina e sono in grado di inserirlo nel proprio carrello"></i>
              </span>
            </p>
          @elseif ($dish->visibile == 0)
            <p>
              Attualmente non visibile
              <span class="position-relative">
                <i class="bi bi-info-circle-fill text-info" data-bs-toggle="tooltip" data-bs-placement="top"
                  title="Indica se i clienti possono vedere questo prodotto sulla tua pagina e sono in grado di inserirlo nel proprio carrello"></i>
              </span>
            </p>
          @endif
        </div>
      </div>
      {{-- azioni --}}
      <div class="col-10 d-flex justify-content-center gap-2 py-4">
        <a href="{{ route('admin.dishes.edit', $dish) }}"
          class="btn border-2 border-primary rounded-pill btn-sm p-2 btn_pills text-primary fw-bold">
          modifica
        </a>
        <a href="{{ route('admin.dishes.index') }}"
          class="btn border-2 border-secondary rounded-pill btn-sm p-2 btn_pills text-secondary fw-bold">
          torna al menu
        </a>
      </div>
    </div>
  </div>
@endsection
