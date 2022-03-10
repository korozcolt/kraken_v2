@extends('votation.layout')
@section('content-votation')
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="row m-4">
            <h1 class="text-center col-md-12">Votaciones 13 de Marzo</h1>
            <h1 class="text-center col-md-12">Vota 101 Partido de la U!</h1>
            <form action="{{ route('votaciones.registroDni') }}" method="post" class="form col-md-12 m-4">
                {{ csrf_field() }}
                <div class="form-outline">
                    <input type="number" id="dni" name="dni" class="form-control" placeholder="Cedula"
                        aria-label="Search" />
                </div>
                <div class="text-center m-4">
                    <button type="submit" class="btn btn-primary btn-lg btn-block m-2">REGISTRAR</button>
                </div>
            </form>
        </div>
    </div>
@endsection
