@extends("layout.master")

@section("main-content")

    @foreach ( $products as $product)
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="" style="padding: 5px">
                <div class="card">
                  <span class="border border-info zoom">
                   <a href="{{route("products.show",['id'=>$product->id])}}">
                       <img src="{{asset("products-images/product.jpg")}}"
                            class="card-img-top rounded" alt="...">
                   </a>
                </span>

                    <div class="card-body">
                        <p class="card-text">{{$product->productName}} </p>
                        <h5 class="card-title color-info">K{{$product->amount}}</h5>
                    </div>
                </div>
            </div>

        </div>

    @endforeach


    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="" style="padding: 2px">
            <div class="card">
                  <span class="border border-info zoom">
                   <a href="{{route("products.show",['id'=>1])}}">
                       <img src="{{asset("products-images/product.jpg")}}"
                            class="card-img-top rounded" alt="...">
                   </a>
                </span>

                <div class="card-body">
                    <h5 class="card-title">K120</h5>
                    <p class="card-text">Some quick example </p>
{{--                    <a href="#" class="btn btn-outline-info">Add to--}}
{{--                        Cart</a>--}}
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="" style="padding: 2px">
            <div class="card">
                  <span class="border border-info zoom">
                   <a href="{{route("products.show",['id'=>1])}}">
                       <img src="{{asset("products-images/product.jpg")}}"
                            class="card-img-top rounded" alt="...">
                   </a>
                </span>

                <div class="card-body">
                    <h5 class="card-title">K120</h5>
                    <p class="card-text">Some quick example </p>
{{--                    <a href="#" class="btn btn-outline-info">Add to--}}
{{--                        Cart</a>--}}
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="" style="padding: 2px">
            <div class="card">
                   <span class="border border-info zoom">
                   <a href="{{route("products.show",['id'=>1])}}">
                       <img src="{{asset("products-images/product.jpg")}}"
                            class="card-img-top rounded" alt="...">
                   </a>
                </span>

                <div class="card-body">
                    <h5 class="card-title">K120</h5>
                    <p class="card-text">Some quick example </p>
{{--                    <a href="#" class="btn btn-outline-info">Add to--}}
{{--                        Cart</a>--}}
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="" style="padding: 2px">
            <div class="card">
                 <span class="border border-info zoom">
                   <a href="{{route("products.show",['id'=>1])}}">
                       <img src="{{asset("products-images/product.jpg")}}"
                            class="card-img-top rounded" alt="...">
                   </a>
                </span>

                <div class="card-body">
                    <h5 class="card-title">K120</h5>
                    <p class="card-text">Some quick example </p>
                    <a href="#" class="btn btn-outline-info">Add to
                        Cart</a>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="" style="padding: 2px">
            <div class="card">
                  <span class="border border-info zoom">
                   <a href="{{route("products.show",['id'=>1])}}">
                       <img src="{{asset("products-images/product.jpg")}}"
                            class="card-img-top rounded" alt="...">
                   </a>
                </span>

                <div class="card-body">
                    <h5 class="card-title">K120</h5>
                    <p class="card-text">Some quick example </p>
                    <a href="#" class="btn btn-outline-info">Add to
                        Cart</a>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="" style="padding: 2px">
            <div class="card">
                   <span class="border border-info zoom">
                   <a href="{{route("products.show",['id'=>1])}}">
                       <img src="{{asset("products-images/product.jpg")}}"
                            class="card-img-top rounded" alt="...">
                   </a>
                </span>

                <div class="card-body">
                    <h5 class="card-title">K120</h5>
                    <p class="card-text">Some quick example </p>
                    <a href="#" class="btn btn-outline-info">Add to
                        Cart</a>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="" style="padding: 2px">
            <div class="card">
                   <span class="border border-info zoom">
                   <a href="{{route("products.show",['id'=>1])}}">
                       <img src="{{asset("products-images/product.jpg")}}"
                            class="card-img-top rounded" alt="...">
                   </a>
                </span>

                <div class="card-body">
                    <h5 class="card-title">K120</h5>
                    <p class="card-text">Some quick example </p>
                    <a href="#" class="btn btn-outline-info">Add to
                        Cart</a>
                </div>
            </div>
        </div>

    </div>


@endsection
