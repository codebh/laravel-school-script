@extends('layouts.user')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="">All Posts</h1><br>
        </div>
        <hr>
        <div class="row justify-content-center">

            <ul class="list-group list-group-horizontal-md justify_co">
                @if(count($categories) >0)
                    @foreach($categories as $category)

                <a class="list-group-item list-group-item-action" href="/category/{{$category->id}}">{{$category->ca_name}}</a>
                 @endforeach
                @endif
            </ul>
        </div>
        <hr>
        <div class="row  justify-content-center">
            <h3>{{$posts->links()}}</h3>
        </div>
        <hr>
        <div class="row">

               @if(count($posts)>0)
                   @foreach($posts as $post)
                       <div class="col-md-4" style="margin-top: 10px">
                           <div class="card" >
                               <img src="{{asset('storage/posts/'.$post->p_image)}}" height="350px" class="card-img-top" alt="...">
                               <div class="card-body">
                                   <h5 class="card-title">{{$post->p_title}}</h5>

                                      <div class="row">
                                          <div class="col-md-8">
                                              <p class="pull-left">{{$post->created_at}}</p>

                                          </div>

                                          <div class="col-md-4 pull-right">
                                              <p class="pull-right badge badge-danger">{{$post->category->ca_name}}</p>

                                          </div>
                                      </div>
                                   <hr>
                                   <a href="{{route('post.show',$post->id)}}" class="btn btn-primary btn-block">More Info</a>
                               </div>
                           </div>
                       </div>
                   @endforeach
               @endif
           </div>
    </div>

@endsection