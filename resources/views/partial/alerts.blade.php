
{{--error--}}
@if(count($errors->all()))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> </strong>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(Session::has('info'))
    <div class="alert alert-info  alert-dismissible fade show" role="alert">
        {{Session::get("info")}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(Session::has('primary'))

    <div class="alert alert-primary  alert-dismissible fade show"  role="alert">
        {{Session::get("primary")}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(Session::has('dark'))

    <div class="alert alert-dark  alert-dismissible fade show" role="alert">
        {{Session::get("dark")}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(Session::has('warning'))

    <div class="alert alert-warning  alert-dismissible fade show" role="alert">
        {{Session::get("warning")}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(Session::has('success'))

    <div class="alert alert-success  alert-dismissible fade show" role="alert">
        {!! Session::get("success")!!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(Session::has('secondary'))

    <div class="alert alert-secondary  alert-dismissible fade show" role="alert">
        {{Session::get("secondary")}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

