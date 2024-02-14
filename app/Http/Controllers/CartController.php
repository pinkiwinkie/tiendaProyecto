<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //dd($request->all());
    //añadir producto 
    //llamar vista del carrito
    $response = Http::withToken("Token1234")->post('http://tiendapi/api/carts', [
      'idProduct' => $request->get('idProduct'),
      'idUser' => auth()->user()->id,
      'quantity' => $request->get('quantity')      
    ]);
    var_dump($response->body());
    if ($response->successful()) {
      return redirect()->route('cart.show', auth()->user()->id);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //var_dump("hola");
    $response = Http::withToken("Token1234")->get('http://tiendapi/api/carts/' . $id);
    $carts = json_decode($response->body(), true);
    $products = [];
    foreach ($carts as $cart) {
      $product = Product::find($cart['idProduct']);
      if ($product) {
        $products[] = $product;
      } 
    }
    return view('cart.cart', compact('products'));
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
