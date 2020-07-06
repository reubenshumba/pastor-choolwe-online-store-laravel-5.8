@extends("layout.admin")

@section("main-content")

<div class="col-lg-12 ">


    <div class="table-responsive">
        <h2 class="pull-left">Products In Store</h2>
        <a href="{{route("admin.products.create")}}">
            <button type="button" class="btn  btn-outline-info pull-right">
                <span class="fa fa-plus "></span> Add
            </button>
        </a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col"> Price</th>
                <th scope="col">Description</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Release</th>
                {{--                        <th scope="col">productUrl</th>--}}
                {{--                        <th scope="col">Downloadable</th>--}}
                <th scope="col">Download Limit</th>
                <th scope="col">Details</th>
                <th class="col">Action</th>
            </tr>
            </thead>
            <tbody>


            @foreach($products as $product)

                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$product->productName}}</td>
                    <td>{{$product->price($product->productPrice)}}</td>
                    <td>{{$product->productDescription}}
                    </td>
                    <td>
                        <img
                            src="{{asset("storage/$product->productFeaturedImage")}}"
                            class="card-img-top rounded" alt="..."></td>

                    <td>{{$product->productRelease==1?"New Released":" "}}</td>

                    <td>{{$product->productDownloadLimit}}</td>
                    <td>
                        <button type="button"
                                class="btn  btn-outline-success"
                                data-toggle="modal"
                                data-target="#more{{$product->id}}Model">
                            <span class="fa fa-search-plus "></span>
                        </button>
                    </td>
                    <td>
                        <div class="btn-group" role="group"
                             aria-label="Action">
                            <a href="{{route("admin.products.show",["slugName"=>$product->ProductSlugName])}}">
                                <button type="button"
                                        class="btn  btn-outline-primary"
                                        data-toggle="modal"
                                        data-target="#editModel{{$product->id}}">
                                    <span class="fa fa-eye "></span> View
                                </button>
                            </a>
                            <a href="{{route("admin.products.edit",["id"=>$product->id])}}">
                                <button type="button"
                                        class="btn  btn-outline-secondary">
                                    <span class="fa fa-edit "></span> Edit
                                </button>
                            </a>
                            <button type="button"
                                    class="btn  btn-outline-danger"
                                    data-toggle="modal"
                                    data-target="#deleteModel{{$product->id}}">
                                <span class="fa fa-trash "></span> Delete
                            </button>

                        </div>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a href="{{route("admin.products.create")}}">
            <button type="button" class="btn  btn-outline-info pull-right">
                <span class="fa fa-plus "> </span> Add</button>
        </a>
    </div>
    <div class="row mb-4 text-center mb-4">
        <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
            {{ $products->links()}}
        </div>
    </div>
</div>



<div class="col-lg-12 ">
    <hr/>
    <div class="table-responsive mt-4 ">
        <h2 class="pull-left mb-3">Trashed Products</h2>

        <table class="table table-hover mt-4">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Featured Image</th>
                <th scope="col">Trashed</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($trashed as $trash)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$trash->productName}}</td>
                <td>{{$trash->productDescription}}</td>
                <td>
                    <img  height="40px"
                        src="{{asset("storage/$trash->productFeaturedImage")}}"
                        class="" alt="..."></td>
                </td>
                <td>{{$trash->productName}}</td>
                <td>
                    <div class="btn-group" role="group"
                         aria-label="Action">

                        <button type="button"
                                class="btn  btn-outline-secondary"
                                data-toggle="modal"
                                data-target="#restoreModel{{$trash->id}}">
                            <span class="fa fa-trash "></span> Restore
                        </button>
                        <button type="button"
                                class="btn  btn-danger"
                                data-toggle="modal"
                                data-target="#forceDeleteModel{{$trash->id}}">
                            <span class="fa fa-trash "></span> Permanent Delete
                        </button>

                    </div>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row mb-4 text-center mb-4">
        <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
            {{ $trashed->links()}}
        </div>
    </div>

    <div class="mb-4">

    </div>

</div>


@foreach($products as $product)
    <!--magnify Modal -->
    <div class="modal fade" id="more{{$product->id}}Model" tabindex="-1"
         role="dialog" aria-labelledby="exampleModalCenterTitle2"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle2">
                         {{$product->productName}}</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body ">
                    <h3>links</h3>
                    <span class="list-group-item">Url : {{$product->productUrl}}</span>
                    <span class="list-group-item">Download Link: {{$product->productDownloadLink}}</span>
                    <br/><br/>
                    <h3>Categories</h3>
                    <ul class="list-group mt4">

                        @foreach($product->categories as $category)
                        <li class="list-group-item">{{$category->categoryName}}</li>
                        @endforeach

                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close
                    </button>

                </div>
            </div>
        </div>
    </div>


    <!--Delete Modal -->
    <div class="modal fade" id="deleteModel{{$product->id}}" tabindex="-1"
         role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        Confirm Delete of {{$product->productName}}</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="text-center"
                          action="{{route("admin.products.delete",["id"=>$product->id,"forceDelete"=>0])}}"
                          method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="InputName">Are you Sure You Want To
                                DELETE this product ?</label>

                        </div>

                        <button type="submit"
                                class="btn btn-outline-danger">Yes Delete
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close
                    </button>

                </div>
            </div>
        </div>
    </div>



@endforeach
@foreach($trashed as $product)
    <!--Restore Modal -->
    <div class="modal fade" id="restoreModel{{$product->id}}" tabindex="-1"
         role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        Confirm to restore {{$product->productName}}</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="text-center"
                          action="{{route("admin.products.delete",["id"=>$product->id,"forceDelete"=>1])}}"
                          method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="InputName">Are you Sure You Want To
                                RESTORE his Product ?</label>

                        </div>

                        <button type="submit"
                                class="btn btn-outline-success">Yes Restore
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close
                    </button>

                </div>
            </div>
        </div>
    </div>

    <!--permanent Delete Modal -->
    <div class="modal fade" id="forceDeleteModel{{$product->id}}" tabindex="-1"
         role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        Confirm Delete of {{$product->productName}}</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="text-center"
                          action="{{route("admin.products.delete",["id"=>$product->id,"forceDelete"=>-1])}}"
                          method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="InputName">Are you Sure You Want To Permanently
                                Delete the product ?</label>

                        </div>

                        <button type="submit"
                                class="btn btn-outline-danger">Yes Delete
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close
                    </button>

                </div>
            </div>
        </div>
    </div>

@endforeach
@endsection


