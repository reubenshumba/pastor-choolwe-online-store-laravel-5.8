@extends("layout.master")

@section("main-content")

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
                    <li><a href="{{route("products.cart.add",["id"=>$product->id])}}" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
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
    <div class="row mb-4 text-center">
        <div class="col-lg-12 col-md-12 col-sm-12">
            {{ $products->links()}}
        </div>
    </div>
@endsection
