<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $product = new Product();
    $product->name = 'Vinilo Hombres G';
    $product->description = 'La primavera single vinilo del año 1991 David Summers';
    $product->photo = 'hombresG.png';
    $product->price = '8';
    $product->save();

    $product = new Product();
    $product->name = 'Vinilo Michael Buble';
    $product->description = 'Higher black vinyl';
    $product->photo = 'michaelBuble.png';
    $product->price = '26';
    $product->save();

    $product = new Product();
    $product->name = 'Vinilo Michael Jackson';
    $product->description = 'Michael Jackson Thriller disco de vinilo';
    $product->photo = 'michaelJackson.png';
    $product->price = '221';
    $product->save();

    $product = new Product();
    $product->name = 'Vinilo Nick Cave & Warren Ellis';
    $product->description = 'Australian Carnage. Live At The Sydney Opera House';
    $product->photo = 'nickCave.png';
    $product->price = '24';
    $product->save();

    $product = new Product();
    $product->name = 'Vinilo Nino Bravo';
    $product->description = 'disco pequeño vinilo ,nino bravo';
    $product->photo = 'ninoBravo.png';
    $product->price = '15';
    $product->save();

    $product = new Product();
    $product->name = 'Vinilo Frank Sinatra';
    $product->description = 'DISCO VINILO FRANK SINATRA - COLLECTED 2LPS VINYL';
    $product->photo = 'sinatra.png';
    $product->price = '50';
    $product->save();

    $product = new Product();
    $product->name = 'Vinilo Tchaikovsky';
    $product->description = 'DISCO VINILO ANTIGUO. SWAN LAKE. ANSERMET. L ORCHESTRE DE LA SUISSE ROMANDE. EL LAGO DE LOS CISNES. de TCHAIKOVSKY';
    $product->photo = 'tchaikovsky.png';
    $product->price = '89';
    $product->save();

    $product = new Product();
    $product->name = 'Vinilo Beethoven';
    $product->description = 'DISCO VINILO ANTIGUO. Heroic Beethoven. 2 vinilos.';
    $product->photo = 'beethoven.png';
    $product->price = '33';
    $product->save();
  }
}
