<nav class='d-flex align-items-center justify-content-center p-2 bg-dark'>
  <ul class="m-0">
    <li>
      @if(auth()->check())
        <li>
          <h4>Bienvenido {{auth()->user()->name}}</h4>
        </li>
        <form action="{{ route('login') }}" method="GET">
          @method('GET')
          @csrf
          <button>Login</button>
        </form>
        <li>
          <a class="text-light text-decoration-none text-primary text-lg" href="{{ route('logout') }}">Logout</a>
        </li>
        @if(auth()->user()->rol=="admin")
        <li>
          <a class="text-light text-decoration-none text-primary text-lg" href="{{ route('user.index') }}">Crud</a>
        </li>
        @endif
      @endif
    </li>
  </ul>
</nav>
  