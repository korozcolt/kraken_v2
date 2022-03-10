@extends('votation.layout')
@section('content-votation')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="row m-4">
            <h1 class="text-center col-md-12">Votaciones 13 de Marzo</h1>
            <h1 class="text-center col-md-12">Vota 101 Partido de la U!</h1>
            <a href="{{ route('votaciones.consulta') }}" class="btn btn-block btn-lg btn-primary m-3">CONSULTA</a>
            <a href="{{ route('votaciones.registro') }}" class="btn btn-block btn-lg btn-warning m-3">REGISTRO</a>
        </div>
    </div>
@endsection
