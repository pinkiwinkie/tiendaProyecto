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
        <td><img src="{{ asset('img/'.$product['photo'])}}" alt=""></td>
        <td>{{$product['name']}}</td>
        <td>
          <form action="{{ route('cart.update', $product['idCart']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="d-flex justify-content-between align-items-center pe-3">
              <div class="form-group">
                <label for="cantidad"></label>
                <input type="text" class="form-control w-75" name="quantity" value={{$product['quantity']}}>
              </div>
              <input type="submit" class="btn btn-warning" name="enviar" value="Actualizar"
              class="btn btn-dark btn-block">
            </div>
        </form>
        </td>
        <td>{{$product['price']}}€</td>
        <td>{{ $product['price'] * $product['quantity'] }}€</td>
        <td>
          <form action="{{ route('cart.destroy', $product['idCart']) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Borrar" />
          </form>
        </td>
      </tr>
      @empty
      <p>El carrito está vacío</p>
    @endforelse
  </table>
</div>
<div class="container my-5 d-flex justify-content-around align-items-center">
  <p style="font-size: 1.5em; background: rgb(196, 144, 226); border-radius: 5px">Total: <span><strong>{{ $total }}€</strong></span></p>
  <a href="" class="btn btn-info d-flex align-items-center">Confirmar pedido</a>
  <a href="{{ route('home') }}" class="btn btn-success d-flex align-items-center">Seguir comprando</a>
</div>
@endsection