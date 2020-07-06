@extends("layout.master")
@section("main-content")
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">

                <div class="border border-light shadow">
                    <img src="{{asset("storage/$product->productFeaturedImage")}}"
                         class="card-img-top rounded" alt="...">
                </div>

                <div class="border border-light shadow-sm">
                    <div class="card">
                        <div class="card-header">
                            Description
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>{{$product->productDescription}}</p>
                                <footer class="blockquote-footer">by
                                    <cite title="Source Title">Pastor Choolwe Phd</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">

                <div class="card shadow-sm">
                    <div class="card-header">
                        {{$product->productName}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">K{{$product->productPrice}}</h5>
                        <p class="card-text">{{$product->productName}}</p>
                        <a href="{{route("products.cart.add",["id"=>$product->id])}}" class="btn btn-outline-info">Add To Cart</a>
                    </div>
                </div>

            </div>

        </div>


        <div class="row mt-5">
            <div class="row mt-5 mb-5 pl-4"> RELATED MESSAGES
                <br/></div>

            <div class="row">

                @foreach ( $products as $product)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-2">
                        <div class="product-grid2 shadow">
                            <div class="product-image2">
                                <a href="{{route("products.show",['id'=>$product->id])}}">
                                    <img class="pic-2" src="{{asset("storage/$product->productFeaturedImage")}}">
                                    <img class="pic-1" src="{{asset("storage/$product->productFeaturedImage")}}">
                                </a>
                                <ul class="social">
                                    <li><a href="{{route("products.show",['id'=>$product->id])}}" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                <a  class="add-to-cart" href="{{route("products.show",['id'=>$product->id])}}">New release</a>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#">{{$product->productName}} </a></h3>
                                <span class="price">K{{$product->productPrice}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

    </div>


@endsection
