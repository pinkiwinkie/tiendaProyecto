<nav class='d-flex align-items-center justify-content-center p-2 bg-dark'>
  <ul class="m-0">
    <li>
      
      <form action="{{ route('login') }}" method="GET">
        @method('GET')
        @csrf
        <button>Login</button>
      </form>
      @if(auth()->check())
      
      <a class="text-light text-decoration-none text-primary text-lg" href="{{ route('logout') }}">Logout</a>
      
      @endif
    </li>
  </ul>
</nav>
  