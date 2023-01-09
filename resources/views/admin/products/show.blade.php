@extends("layout.admin")
@section("main-content")
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          {!! html_entity_decode($product->productIframe) !!}

                <div class="border border-light mb-4">
                    <div class="card">
                        <div class="card-header">
                            Product Details
                        </div>
                        <div class="card-body">


                            <table  class="table table-hover" id="product-show">
                                <thead></thead>
                                {{--['productName','productSlugName','productPrice','productDescription',
                                    'productFeaturedImage','productLongDescription','productRelease','productOwner',
                                    'productUrl','productDownloadLink','productIframe','productDownloadLimit'];--}}
                                <tbody >
                                <tr>
                                    <th>Title </th>
                                    <td><p>{{$product->productName}}</p></td>
                                </tr>
                                <tr>
                                    <th>Description:</th>
                                    <td><p>{{$product->productDescription}}</p></td>
                                </tr>
                                <tr >
                                    <th>Price </th>
                                    <td><p>{{$product->price($product->productPrice)}}</p></td>
                                </tr>
                                <tr>
                                    <th>Detailed Description</th>
                                    <td><p> {{$product->productLongDescription}}</p></td>
                                </tr>

                                <tr>
                                    <th>productUrl:</th>
                                    <td><a href="{{$product->productUrl}}">{{$product->productUrl}}</a></td>
                                </tr>
                                <tr>
                                    <th>Download Link:</th>
                                    <td><p>{{$product->productDownloadLink}}</p></td>
                                </tr>

                                <tr>
                                    <th>Download Limit:</th>
                                    <td><p>{{$product->productDownloadLimit}}</p></td>
                                </tr>
                                <tr>
                                    <th>Release:</th>
                                    <td><p>{{$product->productRelease==1?"New Release":""}}</p></td>
                                </tr>
                                <tr>
                                    <th>productUrl:</th>
                                    <td><p>{{$product->productUrl}}</p></td>
                                </tr>
                                <tr>
                                    <th>product Type:</th>
                                    <td><p>{{$product->productType->productTypeName}}</p></td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


                <table class="table table-hover ">
                    <thead>
                    <div class="card-header">
                        Product Category
                    </div>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Category</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product->categories as $key =>$category)

                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{$category->categoryName}}</td>

                    </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
<hr/>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="card-header">
                        Other Details
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$product->productOwner}}</h5>
                        <p class="card-text">{{$product->productName}}</p>
                        <div class="border border-light">

                            <img src="{{asset("storage/$product->productFeaturedImage")}}"
                                 class="card-img-top rounded" alt="...">
                        </div>

                        <a href="{{route("admin.products.edit",["id"=>$product->id])}}" class="btn btn-outline-danger mt-4 col-md-12">Edit Product</a>
                    </div>
                </div>

            </div>

        </div>
        <div class="row mt-5 mb-5 4"> RELATED MESSAGES
        </div>

        <div class="row mt-5">


            <div class="row">

                @foreach ( $products as $product)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-2">
                        <div class="product-grid2">
                            <div class="product-image2">
                                <a href="{{route("admin.products.show",['slugName'=>$product->productSlugName])}}">
                                    <img class="pic-2" src="{{asset("storage/$product->productFeaturedImage")}}">
                                    <img class="pic-1" src="{{asset("storage/$product->productFeaturedImage")}}">
                                </a>
                                <ul class="social">
                                    <li><a href="{{route("admin.products.show",['slugName'=>$product->productSlugName])}}" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                <a  class="add-to-cart" href="{{route("admin.products.show",['slugName'=>$product->productSlugName])}}">New release</a>
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
