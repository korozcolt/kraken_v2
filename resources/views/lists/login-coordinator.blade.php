@extends('lists.layout')
@section('content-list')
<main class="form-signin">
    <form action={{ route('listados.income') }} method="post">
      @csrf
      <img class="mb-4" src="{{ asset('images/logo.png') }}" alt="kRAkEN logo" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Por favor, ingrese su Cedula y su clave</h1>
  
      <div class="form-floating">
        <input type="number" name="dni" class="form-control" id="floatingInput" placeholder="92000111">
        <label for="floatingInput">Cedula</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Contraseña</label>
      </div>
  
      
      <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
      <p class="mt-5 mb-3 text-muted">© 2022</p>
    </form>
  </main>
  @endsection