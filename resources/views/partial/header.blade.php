<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route("main.index")}}">All <span class="sr-only">(current)</span></a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Video</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Audio</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Books</a>--}}
{{--            </li>--}}

            @if( isset($productTypes))
                @foreach($productTypes as $productType)
                    <li class="nav-item">
                        <a class="nav-link"  href="#">{{$productType->productTypeName}}</a>
                    </li>
                @endforeach
            @endif

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Shopping Cart  <span class="badge badge-primary badge-pill">{{Cart::count()}} </span>g
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('products.cart.index') }}">Cart  <span class="badge badge-primary badge-pill">{{Cart::count()}} </span> </a>
                    <a class="dropdown-item" href="{{ route('products.cart.index') }}">Check Out</a>
                    <div class="dropdown-divider"></div>
{{--                    <a class="dropdown-item" href="#">Something else here</a>--}}
                </div>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

