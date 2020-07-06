<div class="row row-cols-2 ">
    <div class="col-lg-6 col-md-6 hidden-sm col-xs-hidden pull-left pt-2">

        <img src="{{asset("pcdl.png")}}" class="rounded"
             height="75px" alt="...">

    </div>

    <div class="col-lg-6 col-md-6 hidden-sm col-xs-hidden pull-right">

        @guest
            @if (Route::has('register'))
                <div class="col-xs-4">
                    <ul style="list-style: none;display: inline;">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>

                        </li>
                        <li class="nav-item">

                            <a class="nav-link " href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    </ul>
                </div>


            @endif
        @else



        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="#"> {{ Auth::user()->name }} </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent1"
                    aria-controls="navbarSupportedContent1" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle border border-light" href="#"
                           id="navbarDropdown1" role="button"
                           data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <img src="{{asset("products-images/product.jpg")}}" class="rounded-circle"
                                 height="40px" alt="...">
                        </a>
                        <div class="dropdown-menu"
                             aria-labelledby="navbarDropdown1">
                            <a class="dropdown-item" href="{{route("profile.index")}}">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route("dashboard.index")}}">Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('products.cart.index') }}">My Cart
                                <span class="badge badge-info"> {{Cart::count()}}</span></a>
                            <div class="dropdown-divider"> </div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                {!! csrf_field() !!}
                            </form>

                        </div>
                    </li>

                </ul>

            </div>
        </nav>
        @endguest
    </div>

</div>
