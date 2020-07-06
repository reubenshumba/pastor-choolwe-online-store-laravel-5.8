{{--     Purchased messages--}}
    @foreach($purchasedProducts as $purchasedProduct)

        @if($purchasedProduct->product_type_id == 1)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="product-grid2 shadow">
                    <div class="product-image2">
                        <a href="#">
                            <img class="pic-2"
                                 src="{{asset("storage/$purchasedProduct->productFeaturedImage")}}">
                            <img class="pic-1"
                                 src="{{asset("storage/$purchasedProduct->productFeaturedImage")}}">
                        </a>

                            <a class="add-to-cart"
                               href="#">
                                {{$purchasedProduct->productName}} (PDF)</a>


                    </div>
                    <div class="product-content">
                        <h3 class="title">{{$purchasedProduct->productName}}</h3>

                        <a href="#"
                           class="btn btn-outline-info">Download</a>
                    </div>
                </div>

            </div>
        @else
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mt-4">
                <div class="product-grid2 shadow">
                    <div class="product-image2">
                        <a href="{{route("dashboard.show",['id'=>$purchasedProduct->id])}}">
                            <img class="pic-2"
                                 src="{{asset("storage/$purchasedProduct->productFeaturedImage")}}">
                            <img class="pic-1"
                                 src="{{asset("storage/$purchasedProduct->productFeaturedImage")}}">
                        </a>

                        @if($purchasedProduct->product_type_id == 1)
                            <a class="add-to-cart"
                               href="{{route("dashboard.show",['id'=>$purchasedProduct->id])}}">
                                {{$purchasedProduct->productName}} (PDF)</a>
                        @elseif($purchasedProduct->product_type_id == 2)
                            <a class="add-to-cart"
                               href="{{route("dashboard.show",['id'=>$purchasedProduct->id])}}">
                                {{$purchasedProduct->productName}} (AUDIO)</a>
                        @elseif($purchasedProduct->product_type_id == 3)
                            <a class="add-to-cart"
                               href="{{route("dashboard.show",['id'=>$purchasedProduct->id])}}">
                                {{$purchasedProduct->productName}} (VIDEO)</a>
                        @endif

                    </div>
                    <div class="product-content">
                        <h3 class="title">{{$purchasedProduct->productName}}</h3>
                        @if($purchasedProduct->product_type_id != 1)
                            <a href="{{route('dashboard.show',['id'=>$purchasedProduct->id])}}"
                               class="btn btn-outline-primary">Play</a>
                        @endif

                        <a href="{{$purchasedProduct->productDownloadLink}}"
                           class="btn btn-outline-info">Download</a>
                    </div>
                </div>

            </div>
        @endif



    @endforeach
<div class="mb-4"></div>
