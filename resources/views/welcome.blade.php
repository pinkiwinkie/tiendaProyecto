@extends('plantilla')
@section('titulo', 'Inicio')
@section('contenido')

@forelse($data as $product)
<div>
  <h1>{{$product->name}}</h1>
  <img src="{{ asset('img/'. $product->photo) }}" alt="">
  <p>{{$product->price}}</p>
  <button>Ver producto</button>
</div>
@empty
<p>No hay productos</p>
@endforelse

@endsection

