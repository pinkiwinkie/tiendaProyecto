@extends('plantilla')
@section('titulo', 'Ficha users')
@section('contenido')
<form action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email" value="{{$user->email}}"
        id="email">
        @if ($errors->has('titulo'))
        <div class="text-danger">
        {{ $errors->first('titulo') }}
        </div>
        @endif

    </div>
    <div class="form-group">
        <label for="rol">Rol:</label>
        <input type="text" class="form-control" name="rol" value="{{$user->rol}}"
        id="rol">
        @if ($errors->has('rol'))
        <div class="text-danger">
        {{ $errors->first('rol') }}
        </div>
        @endif

    </div>
    
    <input type="submit" name="enviar" value="Enviar"
    class="btn btn-dark btn-block">
</form>
@endsection