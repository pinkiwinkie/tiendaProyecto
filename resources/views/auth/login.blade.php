@extends('plantilla')
@section('titulo', 'Login')
@section('contenido')
<h1 class="col-12 d-flex justify-content-center align-items-center mt-2">Login</h1>
@if (!empty($error))
<div class="text-danger ">
{{ $error }}
</div>
@endif
<form class="col-12 d-flex flex-column justify-content-center align-items-center" action="{{ route('login') }}" method="POST">
@csrf
<div class="form-group col-6">
<label for="email">Email:</label>
<input type="text" class="form-control"
name="email" id="email" />
</div>
<div class="form-group col-6">
<label for="password">Password:</label>
<input type="password" class="form-control"
name="password" id="password" />
</div>
<input type="submit" name="enviar" value="Enviar"
class="btn btn-dark btn-block col-6 mt-3">
</form>
@endsection