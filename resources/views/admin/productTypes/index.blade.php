@extends("layout.admin")

@section("main-content")

    <div class=" offset-lg-2">

        <div class="table-responsive">
            <h2 class="pull-left">Product Type</h2><button type="button" class="btn  btn-outline-info pull-right" data-toggle="modal" data-target="#exampleModalCenter">Add</button>
            <table class="table">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Type</th>
                        <th scope="col">Description</th>
                        <th class="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php  $count=0; @endphp

                    @foreach($productTypes as $productType)
                        @php  $count++; @endphp
                    <tr>

                        <th scope="row">{{$count}}</th>
                        <td>{{$productType->productTypeName}}</td>
                        <td>{{$productType->productTypeDescription}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Action">

                                <button type="button"  class="btn  btn-outline-secondary" data-toggle="modal" data-target="#editModel{{$productType->id}}">Edit</button>
                                <button type="button" class="btn  btn-outline-danger"  data-toggle="modal" data-target="#deleteModel{{$productType->id}}">Delete</button>

                            </div>

                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </table>

            <button type="button" class="btn  btn-outline-info pull-right" data-toggle="modal" data-target="#exampleModalCenter">Add</button>
        </div>
        <div class="row mb-4 text-center mb-4">
            <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
                {{ $productTypes->links()}}
            </div>
        </div>
    </div>






    <!-- Modal Add model -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add New Product Type </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route("productTypes.store")}}" method="POST">
                        {{method_field('POST')}}
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="InputName">Product Type Name</label>
                            <input type="text" value="" class="form-control" name="productTypeName"
                                   id="exampleInputName" aria-describedby="Product Type Name" placeholder="Enter Product Type Name">
                            <small id="emailHelp"  class="form-text text-muted">Product Type Name</small>
                        </div>
                        <div class="form-group">
                            <label for="InputDescription">Product Type Description</label>
                            <input type="text" value="" class="form-control" name="productTypeDescription"
                                   id="InputDescription" aria-describedby="Product Type Description" placeholder="Enter Product Type Description">

                        </div>

                        <button type="submit" class="btn btn-outline-info">Add</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @foreach($productTypes as $productType)
    <!-- Edit Modal -->
    <div class="modal fade" id="editModel{{$productType->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit - {{$productType->productTypeName}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route("productTypes.update",["id"=>$productType->id])}}" method="POST">
                        {{method_field('PUT')}}
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="InputName">Product Type Name</label>
                            <input type="text" value="{{$productType->productTypeName}}" class="form-control" name="productTypeName"
                                   id="exampleInputName" aria-describedby="Product Type Name" placeholder="Enter Product Type Name">
                            <small id="emailHelp"  class="form-text text-muted">Product Type Name</small>
                        </div>
                        <div class="form-group">
                            <label for="InputDescription">Product Type Description</label>
                            <input type="text" value="{{$productType->productTypeDescription}}" class="form-control" name="productTypeDescription"
                                   id="InputDescription" aria-describedby="Product Type Description" placeholder="Enter Product Type Description">

                        </div>

                        <button type="submit" class="btn btn-outline-info">Save Changes</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!--Delete Modal -->
    <div class="modal fade" id="deleteModel{{$productType->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Delete of {{$productType->productTypeName}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="text-center" action="{{route("productTypes.delete",["id"=>$productType->id])}}" method="POST">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="InputName">Are you Sure ?</label>

                        </div>

                        <button type="submit" class="btn btn-outline-danger">Yes Delete</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    @endforeach
@endsection


