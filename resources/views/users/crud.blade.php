@extends('plantilla')
@section('titulo', 'Login')
@section('contenido')
  <h1>Crud</h1>

  <table>
    <tr>
      <th>Email</th>
      <th>Rol</th>
    </tr>
    @forelse($users as $user)
      <tr>
        <td>{{$user->email}}</td>
        <td>{{$user->rol}}</td>
        <td><a href="">Borrar</a></td>
        <td><a href="{{route('user.edit', $user->id)}}">Editar</a></td>
      </tr>
      @empty
        <p>No hay users</p>
    @endforelse
  </table>
@endsection