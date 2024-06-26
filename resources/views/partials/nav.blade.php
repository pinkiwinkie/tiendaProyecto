<nav class='navbar navbar-expand-lg navbar-dark bg-secondary'>
  @if(auth()->check())
    <h4>Bienvenido {{auth()->user()->name}}</h4>
    <ul class="">
      <li class="nav-item">
        <a class="text-light text-decoration-none text-primary text-lg" href="{{ route('home') }}">Inicio</a>
      </li>
      @if(auth()->user()->rol=="admin")
      <li class="nav-item">
        <a class="text-light text-decoration-none text-primary text-lg" href="{{ route('user.index') }}">Crud</a>
      </li>
      @endif
      <li class="nav-item position-relative">
        <a href="{{ route('cart.show', auth()->user()->id) }}" class="text-light text-decoration-none text-primary text-lg">
          <i class="bi bi-cart-fill"></i>
        </a>
        @php
          $amountProducts = app('App\Http\Controllers\CartController')->amountCart();
        @endphp
        @if ($amountProducts > 0)
          <div class="cart-badge" style="text-align-center">{{ $amountProducts }}</div>
        @endif
      </li>
      <li class="nav-item">
        <a class="text-light text-decoration-none text-primary text-lg" href="{{ route('logout') }}">Logout</a>
      </li>
    </ul>
  @endif
</nav>
