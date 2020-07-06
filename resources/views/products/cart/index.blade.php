@extends("layout.master")
@section("main-content")
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">


                <!-- Shopping cart table -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" class="border-0 bg-light">
                                <div class="p-2 px-3 text-uppercase">Product
                                </div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Price</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Quantity</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Remove</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartProducts as $cartProduct)
                        <tr>
                            <th scope="row" class="border-0">
                                <div class="p-2">
                                    <a href="{{route("products.show",["id"=>$cartProduct->model->id])}}"><img
                                         src="{{asset("storage/".$cartProduct->model->productFeaturedImage)}}"
                                        alt="" width="70"
                                        class="img-fluid rounded shadow-sm"></a>
                                    <div
                                        class="ml-3 d-inline-block align-middle">
                                        <h6 class="mb-0 font-weight-normal d-block" >
                                            <span href="#" class=" ">
                                                {{$cartProduct->name}}</span></h6>
                                        <span class="text-muted font-weight-normal font-italic d-block">Categories :
                                            @foreach($cartProduct->model->categories as $category )
                                                {{$category->categoryName.","}}
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                            </th>
                            <td class="border-0 align-middle">
                                <strong>{{$cartProduct->price}}</strong></td>
                            <td class="border-0 align-middle"><strong>{{$cartProduct->qty}}</strong>
                            </td>
                            <td class="border-0 align-middle">

                                <a href="{{route("products.cart.destroy",["id"=>$cartProduct->rowId])}}" class="text-dark btn btn-outline-danger btn-xs"><i class="fa fa-trash text-dark"></i>  </a></td>
                        </tr>
                       @endforeach
                        </tbody>
                    </table>
                </div>


            </div>


            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">


                <div class="col-lg-12">
                    <div
                        class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">
                        Order summary
                    </div>
                    <div class="p-4">
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom">
                                <strong class="text-muted">Order
                                    Subtotal </strong><strong>{{Cart::subtotal()}}</strong>
                            </li>
                            <li class="d-flex justify-content-between py-3 border-bottom">
                                <strong class="text-muted">Shipping and
                                    handling</strong><strong>$0.0</strong>
                            </li>
                            <li class="d-flex justify-content-between py-3 border-bottom">
                                <strong class="text-muted">Tax</strong><strong>{{Cart::tax()}}</strong>
                            </li>
                            <li class="d-flex justify-content-between py-3 border-bottom">
                                <strong class="text-muted">Total</strong>
                                <h5 class="font-weight-bold">${{Cart::total()}}</h5>
                            </li>
                        </ul>

                        <p class="font-italic mb-4">Shipping and additional
                            costs are calculated based on values you have
                            entered.</p>

                        <a href="#"
                           class="btn btn-lg btn-outline-info  py-2 btn-block">Proceed to checkout</a>

                    </div>
                </div>


            </div>
        </div>

    </div>



@endsection
