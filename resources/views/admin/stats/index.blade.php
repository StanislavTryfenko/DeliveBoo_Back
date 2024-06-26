@extends('layouts.admin')

@section('content')


    <div style="width:75%;">
        {!! $chartjs->render() !!}
    </div>
@endsection

