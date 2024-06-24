@extends('layouts.admin')

@section('content')
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-12">
                <h2>I tuoi ordini</h2>


                {{-- counter --}}
                @if ($orders->isNotEmpty())
                    <div class="col-4 py-2">
                        <div class="card p-2 shadow-sm">
                            <span class="fw-bold">Ordini ricevuti - {{ $orders->count() }}</span>
                        </div>
                    </div>
                @endif
            </div>

            {{-- tabella --}}
            @if ($orders->isNotEmpty())
                <div class="table-responsive" id="my_table">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Prezzo totale</th>
                                <th scope="col">Data</th>
                                <th scope="col">Stato dell'ordine</th>
                                <th scope="col">Dettagli ordine</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($orders as $order)
                                <tr>
                                    <td scope="row">{{ $order->id }}</td>
                                    <td scope="row">{{ $order->total_price }}</td>
                                    <td scope="row">{{ $order->date }}</td>
                                    <td scope="row">{{ $order->status }}</td>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $order) }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <hr>
                            <h5>Nessun ordine ricevuto finora</h5>
                            <p>Attualmente non hai ancora ricevuto ordini.</p>
            @endif
            </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
