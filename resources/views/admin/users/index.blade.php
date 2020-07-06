@extends("layout.admin")

@section("main-content")

    <div class=" offset-lg-2">

        <div class="table-responsive">
            <h2 class="pull-left">Users</h2>

            <table class="table">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th class="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                  
                    @foreach($users as $user)
                        
                        <tr>

                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Action">

{{--                                    <button type="button"  class="btn  btn-outline-secondary"--}}
{{--                                            data-toggle="modal"--}}
{{--                                            data-target="#editModel{{$user->id}}">Edit</button>--}}
                                    <button type="button" class="btn  btn-outline-danger"
                                            data-toggle="modal"
                                            data-target="#deleteModel{{$user->id}}">Delete</button>

                                </div>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </table>

           
        </div>
        <div class="row mb-4 text-center mb-4">
            <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
                {{ $users->links()}}
            </div>
        </div>
    </div>






{{--    <!-- Modal Add model -->--}}
{{--    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalCenterTitle">Add New Product Category </h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form action="{{route("categories.store")}}" method="POST">--}}
{{--                        {{method_field('POST')}}--}}
{{--                        {{csrf_field()}}--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="InputName">Product Category Name</label>--}}
{{--                            <input type="text" value="" class="form-control" name="$user->name"--}}
{{--                                   id="exampleInputName" aria-describedby="Product Category Name" placeholder="Enter Product Category Name">--}}
{{--                            <small id="emailHelp"  class="form-text text-muted">Product Category Name</small>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="InputDescription">Product Category Description</label>--}}
{{--                            <input type="text" value="" class="form-control" name="categoryDescription"--}}
{{--                                   id="InputDescription" aria-describedby="Product Category Description" placeholder="Enter Product Category Description">--}}

{{--                        </div>--}}

{{--                        <button type="submit" class="btn btn-outline-info">Add</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    @foreach($users as $user)
{{--        <!-- Edit Modal -->--}}
{{--        <div class="modal fade" id="editModel{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--            <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit - {{$user->name}}</h5>--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <form action="{{route("categories.update",["id"=>$user->id])}}" method="POST">--}}
{{--                            {{method_field('PUT')}}--}}
{{--                            {{csrf_field()}}--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="InputName">Product Category Name</label>--}}
{{--                                <input type="text" value="{{$user->name}}" class="form-control" name="$user->name"--}}
{{--                                       id="exampleInputName" aria-describedby="Product Category Name" placeholder="Enter Product Category Name">--}}
{{--                                <small id="emailHelp"  class="form-text text-muted">Product Category Name</small>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="InputDescription">Product Category Description</label>--}}
{{--                                <input type="text" value="{{$user->email}}" class="form-control" name="categoryDescription"--}}
{{--                                       id="InputDescription" aria-describedby="Product Category Description" placeholder="Enter Product Category Description">--}}

{{--                            </div>--}}

{{--                            <button type="submit" class="btn btn-outline-info">Save Changes</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!--Delete Modal -->
        <div class="modal fade" id="deleteModel{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Deletion of {{$user->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class="text-center" action="{{route("admin.users.delete",["id"=>$user->id])}}" method="POST">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="InputName">Are you Sure You Want To Delete User {{$user->name}} ?</label>

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


