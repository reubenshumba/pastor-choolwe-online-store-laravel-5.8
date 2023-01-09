@extends("layout.master")

@section("main-content")

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4" id="div_profile">

        <div><h2>My Profile</h2></div>


        <div class="row mb-3 " id="profile_image">

            <div class="col-lg-6 col-md-6  col-sm-6  col-xs-12  ">
                <div class="border border-light">
                    <img src="{{asset("products-images/product.jpg")}} "
                         class="card-img-top rounded" alt="...">
                </div>
            </div>

            <div class="col-lg-6 col-md-6  col-sm-6  col-xs-12 form-row "
                 id="profile_details">
                <form method="post" action="">
                    <div class="form-group row ">
                        <label for="staticEmail"
                               class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control"
                                   id="staticEmail" value="email@example.com">
                        </div>
                    </div>
                    <div class="row">
                        <label for="name"
                               class="col-sm-2 col-form-label">Name</label>
                        <div class="col" id="name">
                            <input type="text" class="form-control"
                                   placeholder="First name" value="REUBEN "
                                   readonly>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control"
                                   placeholder="Last name" value="SHUMBA"
                                   readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="country" class="col-sm-2 col-form-label">Country</label>
                        <div class="col-sm-10">
                            <input type="text" readonly
                                   class="form-control-plaintext" id="country"
                                   value="Zambia">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <input type="text" readonly
                                   class="form-control-plaintext" id="gender"
                                   value="Male">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-info">Edit
                        Profile
                    </button>

                    {{csrf_field()}}

                </form>

            </div>

        </div>


        <br/>
        <hr/>


        {{--     Purchased messages--}}

        <div class="container">

            <div class="row mb-3 site_links  ">

                <div class="col-lg-4 col-md-4 col-sm-6  col-xs-12">
                    <div class="text-center mb-4">
                        <h4>Links</h4>

                    </div>
                    <ul class="list-group list-group-flush">
                        <a href="{{route('dashboard.index')}}"><li class="list-group-item">Dashboard </li></a>
                        <a href="{{ route('products.cart.index') }}"> <li class="list-group-item"><span class="badge badge-primary badge-pill"></span>
                            Cart <span class="badge badge-primary badge-pill">{{Cart::count()}} </span></li>  </a>
                        <a href="{{route('dashboard.index')}}"> <li class="list-group-item"><span class="badge badge-primary badge-pill">142</span>
                            Purchased Messages </li></a>

                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6  col-xs-12">
                    <div class="text-center mb-4">
                        <h4>Send us an email</h4>
                    </div>
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" placeholder="Partnership">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-outline-info form-control">Send
                        </button>
                    </form>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-6  col-xs-12">
                    <div class="text-center mb-4 " >
                        <h4>You can contact us</h4>
                        <ul class="list-group list-group-flush" style="text-align: left">
                            <li class="list-group-item">Pastor Choolwe</li>
                            <li class="list-group-item">info@pastorchoolwe.org</li>
                            <li class="list-group-item">+26095x xxx xxx</li>
                            <li class="list-group-item">facebook</li>

                            </ul>
                        </div>

                    </div>

                </div>
                </div>


            </div>
        </div>

    </div>
@endsection
