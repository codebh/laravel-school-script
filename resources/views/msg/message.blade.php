@if(session('msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('msg')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>


@endif

@if(session('del'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{session('del')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>


@endif

@if(count($errors) > 0)
        @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>  {{$error}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        @endforeach
@endif