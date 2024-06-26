@extends('layouts.admin')

@section('content')
  <div class="container-fluid p-4">
    <div class="row p-2" id="stats">
      <div class="col-12">
        <h2>Statistiche</h2>

        <form action="{{ route('admin.stats.index') }}" method="GET">
          <label for="year">Seleziona l'anno:</label>
          <select name="year" id="year">
            @for ($i = date('Y'); $i >= 2022; $i--)
              <option value="{{ $i }}" {{ $i == $selectedYear ? 'selected' : '' }}>{{ $i }}
              </option>
            @endfor
          </select>
          <button type="submit" class="btn btn-primary rounded border">vai</button>
        </form>
      </div>
    </div>

    <div class="row py-2">
      <div class="col-8">
        <h5>Numero di vendite</h5>
        <div class="card p-3">
          {!! $chartjs->render() !!}
        </div>
      </div>
      <div class="col-12">

      </div>
    </div>


  </div>
@endsection
