<nav class='navbar navbar-expand-lg navbar-dark bg-secondary'>
  @if(auth()->check())
    <h4>Bienvenido {{auth()->user()->name}}</h4>
    <ul class="">
      @if(auth()->user()->rol=="admin")
      <li class="nav-item">
        <a class="text-light text-decoration-none text-primary text-lg" href="{{ route('user.index') }}">Crud</a>
      </li>
      @endif
      <li class="nav-item">
        <a href="#" class="text-light text-decoration-none text-primary text-lg">
          <i class="bi bi-cart-fill"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="text-light text-decoration-none text-primary text-lg" href="{{ route('logout') }}">Logout</a>
      </li>
    </ul>
  @endif
</nav>
