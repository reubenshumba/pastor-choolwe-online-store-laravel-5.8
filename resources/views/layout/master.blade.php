<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link href="{{URL::to('css/app.css')}}"
          rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600"
          rel="stylesheet">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
          crossorigin="anonymous">

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link href="{{URL::to('css/product.css')}}"
          rel="stylesheet">

</head>
<body class="pl-0 pr-0 p-2">
<div class="p-2">

   <div class="row ">
       <div class="col-12">
           @include("partial.top-header")
           <hr/>
       </div>
   </div>

    <div class="row">
        <div class="col-lg-2 col-md-2 hidden-sm-down hidden-xs-down">
            @include("partial.side-bar")
        </div>

        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <div class="">
                @include("partial.header")

            </div>
            <div class="row pt-1">

                <div class="10 col-md-10 col-sm-12 col-xs-12 p-2">
                    @include("partial.alerts")
                    @include("partial.notification")

                </div>

            </div>

            <div class="row ">
                @yield("main-content")

            </div>

        </div>
    </div>

    <div class="row">
        <div class="">
            <div class=" mt-5 pb-5 ">
                <span class=" p-4 mb-4" style="margin-bottom: 10px">  </span>
            </div>

        </div>

    </div>


</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
<script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>

</body>
</html>
