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
    $response = Http::withToken("Token1234")->post('http://tiendapi/api/carts', [
      'idProduct' => $request->get('idProduct'),
      'idUser' => auth()->user()->id,
      'quantity' => $request->get('quantity')
    ]);
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
    $idUser = $id;
    if ($idUser != auth()->user()->id) {
      $idUser = auth()->user()->id;
    }
    $response = Http::withToken("Token1234")->get('http://tiendapi/api/carts/' . $idUser);
    $carts = json_decode($response->body(), true);
    $products = [];

    foreach ($carts as $cart) {
      $product = Product::find($cart['idProduct']);
      if ($product) {
        $products[] = [
          'id' => $product['id'],
          'name' => $product['name'],
          'price' => $product['price'],
          'photo' => $product['photo'],
          'quantity' => $cart['quantity'],
          'idCart' => $cart['id']
        ];
      }
    }

    $total = 0;
    foreach ($products as $product) {
      $total += $product['price'] * $product['quantity'];
    }

    return view('cart.cart', compact('products', 'total'));
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
    $quantity = $request->get('quantity');

    $response = Http::withToken("Token1234")->put('http://tiendapi/api/carts/' . $id, [
      'quantity' => $quantity
    ]);

    if ($response->successful()) {
      if ($quantity == 0) {
        return $this->destroy($id);
      } else {
        return redirect()->route('cart.show', auth()->user()->id);
      }
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $response = Http::withToken("Token1234")->delete('http://tiendapi/api/carts/' . $id);
    if ($response->successful()) {
      return redirect()->route('cart.show', auth()->user()->id);
    }
  }

  public function amountCart()
  {
    $userId = auth()->user()->id;
    $response = Http::withToken("Token1234")->get('http://tiendapi/api/carts/' . $userId);

    if ($response->successful()) {
      $cart = $response->json();
      $totalProducts = 0;
      foreach ($cart as $product) {
        $totalProducts += $product['quantity'];
      }
      return $totalProducts;
    }
  }
}
