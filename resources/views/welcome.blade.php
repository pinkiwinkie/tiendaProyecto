@extends('plantilla')
@section('titulo', 'Inicio')
@section('contenido')

<div class="container mt-5">
  <div class="d-flex">
    <div class="row">
      @forelse($data as $product)
        <div class="card me-2 ms-2 col-3 mb-2" style="width: 18rem;">
          <img src="{{ asset('img/'. $product->photo) }}" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">{{$product->price}}€</p>
            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Ver producto</a>
          </div>
        </div>
      @empty
        <p>No hay productos</p>
      @endforelse
    </div>
  </div>
</div>
@endsection