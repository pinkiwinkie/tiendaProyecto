@extends('plantilla')
@section('titulo', 'Pedido')
@section('contenido')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1 class="text-center">Pedido de {{ $user->name }}</h1>
        </div>
        <div class="card-body">
          <p class="text-center" style="font-size: 1.2em">Fecha del pedido: {{ $latestOrder->dateOrder }}</p>
          <h2 class="text-center">Líneas de pedido:</h2>
          <ul class="list-group text-center">
            @foreach ($orderLines as $orderLine)
              <li class="list-group-item" style="font-size: 1.2em">
                {{ $productNames[$orderLine->idProduct] }} - Cantidad: {{ $orderLine->quantity }} -
                Precio unitario: {{ $productPrices[$orderLine->idProduct] }}€ -
                Importe: {{ $orderLine->quantity * $productPrices[$orderLine->idProduct] }}€
              </li>
            @endforeach
          </ul>
          <h2 class="text-center mt-3">Total del pedido: {{ $total }}€</h2>
          <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="btn btn-secondary w-25">Volver al inicio</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection