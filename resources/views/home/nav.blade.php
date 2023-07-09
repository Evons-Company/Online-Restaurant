<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand food" href="#">FOODIED</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/" >Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/menu') }}">Menu</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{ url('/cart') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cart
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{ url('/contact') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Contact
            </a>
          </li>
          
          @if (Route::has('login'))
          @auth
          <li class="nav-item dropdown">

                <img class="h-8 w-8 rounded-full object-cover nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 3rem;height: 3rem;border-radius: 9999px;" src="{{Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /> 
            <span class="caret"></span></a>
                
             <ul class="dropdown-menu">
                @if (Auth::user()->status == 'admin')
                <li><a class="dropdown-item"  href="{{ url('dashboard') }}">Dashboard</a></li>
                @else

                @endif
                  <li><a class="dropdown-item"  href="{{ url('user/profile') }}">Profile</a></li>
                  <li><a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form></li>
             </ul>
          </li>
       @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              SignUp
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
              {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
            </ul>

            
          </li>
          @endauth
          @endif
        </ul>
        <a href="{{ url('/show_cart') }}"><i class="fa-solid fa-cart-shopping shopping"></i></a>
        <form action="{{ url('product_search') }}" method="get" class="d-flex" role="search">
          <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>