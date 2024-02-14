@extends('plantilla')
@section('titulo', 'Carrito')
@section('contenido')
<div id="cart-container" class="container my-5">
  <table>
    <tr>
      <th>Imagen</th>
      <th>Nombre</th>
      <th>Cantidad</th>
      <th>Precio</th>
      <th>Importe</th>
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
            <div class="d-flex justify-content-between align-items-center pe-3">
              <div class="form-group">
                <label for="cantidad"></label>
                <input type="text" class="form-control w-75" name="quantity" value="1">
              </div>
              <input type="submit" name="enviar" value="Actualizar"
              class="btn btn-dark btn-block">
            </div>
        </form>
        </td>
        <td>{{$product->price}}€</td>
        <td>Hola {{-- Cambiar el controlador por un array asociativo para guardar el producto y su cantidad --}}</td>
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
<div class="container my-5 d-flex justify-content-end">
  <p>Total: </p>
  <button class="btn btn-info">Confirmar pedido</button>
</div>
@endsection