<div class="site-navbar-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                <form action="{{ route('search') }}" method="GET" class="site-block-top-search">
                    <span class="icon icon-search2"></span>
                    <input type="text" name="search" class="form-control border-0" placeholder="Search">
                </form>
            </div>
            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                <div class="site-logo">
                    <a href="/" class="js-logo-clone">News</a>
                </div>
            </div>
            <div class="col-6 col-md-4 order-3 order-md-3 d-flex justify-content-end">
                <ul class="navbar-nav d-flex flex-row ms-auto mb-0">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item ms-3"> <!-- Add margin start to separate the items -->
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        @if (Auth::user()->type == 'member')
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Đăng xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Đăng xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        {{ __('Bảng điều khiển') }}
                                    </a>
                                </div>
                            </li>
                        @endif
                    @endguest
                </ul>
            </div>


        </div>
    </div>
</div>
