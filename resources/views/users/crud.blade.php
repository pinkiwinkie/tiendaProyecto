@extends('plantilla')
@section('titulo', 'Login')
@section('contenido')
  <h1>Crud</h1>
  <div class="d-flex justify-content-around align-items-center">
    <div>
      <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name"
            id="name" value="{{ old('name') }}">
            @if ($errors->has('name'))
            <div class="text-danger">
              {{ $errors->first('name') }}
            </div>
          @endif
        </div>
        <div class="form-group">
            <label for="surname">Apellido:</label>
            <input type="text" class="form-control" name="surname"
            id="surname" value="{{ old('surname') }}">
            @if ($errors->has('surname'))
            <div class="text-danger">
              {{ $errors->first('surname') }}
            </div>
          @endif
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" name="email"
          id="email" value="{{ old('email') }}">
          @if ($errors->has('email'))
            <div class="text-danger">
              {{ $errors->first('email') }}
            </div>
          @endif
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" name="pwd"
          id="pwd">
          @if ($errors->has('password'))
            <div class="text-danger">
              {{ $errors->first('password') }}
            </div>
          @endif
        </div>
        <div class="form-group mb-4">
          <label for="rol">Rol:</label>
          <select class="form-control" name="rol" id="rol">
            <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="customer" {{ old('rol') == 'customer' ? 'selected' : '' }}>Customer</option>
          </select>
          @if ($errors->has('rol'))
            <div class="text-danger">
              {{ $errors->first('rol') }}
            </div>
          @endif
        </div>
        
        
        <input class="btn btn-info" type="submit" name="enviar" value="Enviar"
        class="btn btn-dark btn-block">
    </form>
    </div>
    <div>
      <table>
        <tr>
          <th>Email</th>
          <th>Rol</th>
        </tr>
        @forelse($users as $user)
          <tr>
            <td>{{$user->email}}</td>
            <td>{{$user->rol}}</td>
            <td>
              <a href="{{ route('user.destroy', $user) }}">
                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" class="btn btn-danger" value="Borrar usuario" />
                </form>
              </a>
            </td>
            <td><a class="btn btn-warning" href="{{route('user.edit', $user->id)}}">Editar</a></td>
          </tr>
          @empty
            <p>No hay users</p>
        @endforelse
      </table>
    </div>
  </div>
  
@endsection