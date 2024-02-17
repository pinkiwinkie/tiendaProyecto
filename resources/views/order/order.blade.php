@extends('plantilla')
@section('titulo', 'Pedido')
@section('contenido')
  <h2>Detalles del Pedido</h2>
  <table>
    <tr>
      <th>Producto</th>
      <th>Cantidad</th>
    </tr>
    @forelse($carts as $cart)
      <tr>
        <td>{{ $cart['idProduct'] }}</td>
        <td>{{ $cart['quantity'] }}</td>
      </tr>
      @empty
    @endforelse
  </table>
@endsection
