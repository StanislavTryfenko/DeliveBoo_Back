@extends('layouts.admin')

@section('content')
    <div class="container-fluid p-4">

        <h1>stats</h1>

        <div style="width:75%;">
            {!! $chartjs->render() !!}
        </div>

    </div>
@endsection
