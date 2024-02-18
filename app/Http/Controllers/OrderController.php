<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
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
    $order = new Order();
    $order->idUser = auth()->user()->id;
    $order->dateOrder = now();
    $order->save();

    $response = Http::withToken("Token1234")->get('http://tiendapi/api/carts/' . auth()->user()->id);
    $carts = json_decode($response->body(), true);
    $counter = 0;
    foreach ($carts as $cart) {
      $orderLine = new OrderLine();
      $orderLine->idOrder = $order->id;
      $orderLine->nLine = $counter++;
      $orderLine->idProduct = $cart['idProduct'];
      $orderLine->quantity = $cart['quantity'];
      $orderLine->save();
    }

    $response = Http::withToken("Token1234")->delete('http://tiendapi/api/carts/destroy2/' . auth()->user()->id);

    return redirect()->route('order.show', compact('order'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
    $latestOrder = Order::where('idUser', auth()->user()->id)
      ->latest('dateOrder')
      ->first();
    $orderLines = OrderLine::where('idOrder', $latestOrder->id)->get();
    $user = auth()->user();

    $total = 0;
    $productPrices = [];
    $productNames = [];
    foreach ($orderLines as $orderLine) {
      $product = Product::find($orderLine->idProduct);

      $subtotal = $product->price * $orderLine->quantity;

      $total += $subtotal;
      $productPrices[$product->id] = $product->price;
      $productNames[$product->id] = $product->name;
    }

    return view('order.order', compact('latestOrder', 'orderLines', 'total', 'productPrices', 'user', 'productNames'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function edit(Order $order)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Order $order)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function destroy(Order $order)
  {
    //
  }
}
