@extends('plantilla')
@section('titulo', 'Página de producto')
@section('contenido')

<h5 class="titleCart">Página de producto</h5>
<div class="container mt-5 d-flex justify-content-center">
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4 d-flex align-items-center">
        <img src="{{ asset('img/'. $product->photo) }}" class="img-fluid rounded-start" alt="">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{$product->name}}</h5>
          <p class="card-text">{{$product->description}}</p>
          <p class="card-text">{{$product->price}}€</p>
          <form action="{{ route('cart.store')}}" method="POST">
            @csrf
            <input type="number" class="form-control" name="productId" value="{{$product->id}}">
            <input type="number" class="form-control" name="quantity" value="1" min="1">
            <button type="submit" class="btn btn-primary mt-4">Añadir a la cesta</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection