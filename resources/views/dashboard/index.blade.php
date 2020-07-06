@extends("layout.master")

@section("main-content")

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 div-dashboard mb-4">
        {{--        --}}{{--     Videos player--}}
        {{--        <div class="row mb-3 video-player">--}}
        {{--            <div class="col-lg-8 col-md-8  col-sm-6  col-xs-12  ">--}}

        {{--                <video--}}
        {{--                    src="https://vimeo.com/user96437585/download/333092893/0f6dc17767"--}}
        {{--                    controls autoplay width="100%"></video>--}}
        {{--            </div>--}}

        {{--            <div class="col-lg-4 col-md-4  col-sm-6  col-xs-12 ">--}}

        {{--                <x-related_message/>--}}
        {{--            </div>--}}

        {{--        </div>--}}

        {{--    Title--}}
        <div class="text-center mt-4">
            <h2 class="mb-4">Purchased Messages</h2>
        </div>
{{--        laravel 7.x--}}
       {{-- <div class="row text-center">
            <x-purchased_products :purchasedProducts="$purchasedProducts"/>
            <x-purchased_products :purchasedProducts="$purchasedProducts"/>
            <x-purchased_products :purchasedProducts="$purchasedProducts"/>
            <x-purchased_products :purchasedProducts="$purchasedProducts"/>
        </div>--}}

        <div class="row text-center">
{{--            <x-purchased_products :purchasedProducts="$purchasedProducts"/>--}}
            @component("components.purchased_products",['purchasedProducts' => $purchasedProducts])@endcomponent
            @component("components.purchased_products",['purchasedProducts' => $purchasedProducts])@endcomponent
            @component("components.purchased_products",['purchasedProducts' => $purchasedProducts])@endcomponent
            @component("components.purchased_products",['purchasedProducts' => $purchasedProducts])@endcomponent
        </div>

    </div>

@endsection
