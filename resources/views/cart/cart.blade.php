@extends('plantilla')
@section('titulo', 'Carrito')
@section('contenido')
<div>
  <table>
    <tr>
      <th>Imagen</th>
      <th>Nombre</th>
      <th>Cantidad</th>
      <th>Precio</th>
      <th>Acciones</th>
    </tr>
    @forelse($products as $product)
      <tr>
        <td><img src="{{ asset('img/'.$product->photo)}}" alt=""></td>
        <td>{{$product->name}}</td>
        <td>
          <form action="" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="cantidad"></label>
              <input type="text" class="form-control" name="quantity" value="1">
            </div>
            <input type="submit" name="enviar" value="Actualizar"
            class="btn btn-dark btn-block">
        </form>
        </td>
        <td>{{$product->price}}€</td>
        <td>
          <form action="" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Borrar" />
          </form>
        </td>
      </tr>
      @empty
    @endforelse
  </table>
</div>
@endsection