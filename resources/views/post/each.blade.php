@extends('layouts.user')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class=""> {{$categories->ca_name}} posts</h1><br>
        </div>
        <hr>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('post.index')}}">All Posts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$categories->ca_name}}</li>
                </ol>
            </nav>

        <hr>

        <div class="row">

            @if(count($posts)>0)
                @foreach($posts as $post)
                    <div class="col-md-4" style="margin-top: 10px">
                        <div class="card" >
                            <img src="{{asset('storage/posts/'.$post->p_image)}}" class="card-img-top" alt="..." height="350px">
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
                @else
               <div class="col-md-12">
                   <div class="alert alert-danger alert-dismissible fade show" role="alert">
                       <strong>No posts</strong>
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
               </div>
            @endif
        </div>
    </div>

@endsection