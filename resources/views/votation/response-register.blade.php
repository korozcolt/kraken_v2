@extends('votation.layout')
@section('content-votation')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="row m-4">
            <h1 class="text-center col-md-12">{{ $success }}</h1>
            <a class="btn btn-lg btn-primary text-center" href="{{ route('votaciones.index') }}">NUEVA CONSULTA</a>
        </div>
    </div>
@endsection
