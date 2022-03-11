@extends('votation.layout')
@section('content-votation')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="row m-4">
            @if (!is_null($voter))
                <h1 class="text-center col-md-12">PUESTO: {{ $voter->place }}</h1>
                <h1 class="text-center col-md-12">MESA: {{ $voter->table }}</h1>
                <a class="btn btn-lg btn-primary text-center" href="{{ route('votaciones.index') }}">NUEVA CONSULTA</a>
            @else
                <h1 class="text-center col-md-12">NO SE ENCUENTRA REGISTRADO EN EL SISTEMA</h1>
                <a class="btn btn-lg btn-primary text-center" href="{{ route('votaciones.index') }}">NUEVA CONSULTA</a>
            @endif
        </div>
    </div>
@endsection
