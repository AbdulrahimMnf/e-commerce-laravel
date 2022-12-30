    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">E-Commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @role('admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Stock
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a></li>
                                <li><a class="dropdown-item" href="{{ route('products.index') }}">Products</a></li>
                                <li>
                                    <hr>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('sales.index') }}">Sales</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Accounts
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a></li>
                                <li><a class="dropdown-item" href="{{ route('users.index') }}">Users</a></li>
                            </ul>
                        </li>
                    @endrole


                    @if (session('cart'))
                        <a href="{{ route('cart') }}" class="btn btn-primary btn-block"> Cart </a>
                    @endif

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif


                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <div class="d-flex">
                            <input class="form-control me-2" type="text" value="{{ Auth::user()->name }}" disabled>
                            <button class="btn btn-outline-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">Logout</button>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>
    {{-- End Navbar --}}
