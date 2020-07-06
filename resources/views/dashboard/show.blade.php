@extends("layout.master")

@section("main-content")

    {{--     Videos player--}}
    <div class="col-lg-12 col-md-12  col-sm-12  col-xs-12  ">

        @if($selectedProduct->productSource == 1 &&  $selectedProduct->product_type_id != 1)
{{--            <x-video_player :selectedProduct="$selectedProduct"/>--}}
            @component("components.video_player",['selectedProduct' => $selectedProduct])@endcomponent
        @elseif($selectedProduct->productSource == 2 &&  $selectedProduct->product_type_id != 1)
{{--            <x-audio_player :selectedProduct="$selectedProduct"/>--}}
            @component("components.audio_player",['selectedProduct' => $selectedProduct])@endcomponent
        @elseif($selectedProduct->productSource == 3 &&  $selectedProduct->product_type_id != 1)
{{--            <x-iframe_player :selectedProduct="$selectedProduct"/>--}}
            @component("components.iframe_player",['selectedProduct' => $selectedProduct])@endcomponent
        @endif


        {{--    Purchased--}}
        <hr/>
        <div>
            <h5 class="mb-4">Purchased Messages</h5>
        </div>


        <div class="row text-center">
{{--            <x-purchased_products :purchasedProducts="$purchasedProducts"/>--}}
{{--            <x-purchased_products :purchasedProducts="$purchasedProducts"/>--}}
{{--            <x-purchased_products :purchasedProducts="$purchasedProducts"/>--}}
{{--            <x-purchased_products :purchasedProducts="$purchasedProducts"/>--}}
            @component("components.purchased_products",['purchasedProducts' => $purchasedProducts])@endcomponent
        </div>


        <hr/>
        <div>
            <h5>Related Messages</h5>
        </div>


        <div class="row">
{{--            <x-related_message/>--}}
            @component("components.related_message",['purchasedProducts' => $purchasedProducts])@endcomponent
        </div>
    </div>

@endsection
