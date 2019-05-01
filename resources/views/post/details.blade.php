@extends('layouts.user')
@section('content')

            <div class="jumbotron">
                <div class="row">
                <div class="col-md-12">
                    @include('msg.message')
                </div>
                </div>
                <div class="row">
                    <h1 class="display-4 text-center">the details of the post {{$posts->p_title}}</h1>
                </div>
                <hr>
                <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('storage/posts/'.$posts->p_image)}}" width="350px" height="262px" alt="">
                </div>

                <div class="col-md-8">
                    <table class="table table-bordered table-striped  ">
                        <thead class="text-center">
                        <tr class="table-info">

                            <th scope="col">Title</th>
                            <th scope="col">{{$posts->p_title}}</th>

                        </tr>
                        </thead>
                        <tbody class="text-center table-dark">

                        <tr>

                            <td>info</td>
                            <td>{{$posts->p_info}}</td>

                        </tr>
                        <tr>
                            <td>User Upload</td>
                            <td>{{$posts->user->name}}</td>
                        </tr>
                        <tr>
                            <td>Type of HomeWork</td>
                            <td>{{$posts->category->ca_name}}</td>
                        </tr>
                        <tr>
                            <td>date of Upload</td>
                            <td>{{$posts->created_at}}</td>
                        </tr>
                        <tr>@if(!Auth::guest())
                                @if(Auth::user()->id == $posts->user_id)
                            <td>Delete</td>
                            <td>
                                <form action="{{route('post.destroy',$posts->id)}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" value="DELETE" name="_method">
                                    <input type="submit" value="Send" class="btn btn-danger">
                                </form>



                            </td>
                                @endif
                                @else
                                <td>Delete</td>
                                <td class="bg-danger text-center text-white"> your not allow to delete this post</td>
                            @endif
                        </tr>

                        </tbody>
                    </table>
                </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                            All comments
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Comment of Post: <strong class="text-info">{{$posts->p_title}}</strong> </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if(count($posts->comment)> 0)
                                            @foreach($posts->comment as $comment)
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="alert alert-dismissible alert-secondary "  >
                                                                <span class="pull-left"><h2><i class=" user icon"></i>{{$comment->user->name}}</h2> </span>
                                                                <span class=" pull-right" style="margin-top: 17px"><i class=" calendar alternate outline icon"></i>{{$comment->created_at}}</span>
                                                                <br>
                                                                <hr style="background-color: white">
                                                                <h6 class="">  <p>{!!$comment->ca_name!!}</p></h6>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="alert alert-dismissible alert-danger">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong>No Comments Of This Post!</strong>
                                            </div>

                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <h5 class="card-header">All comments</h5>
                            <div class="card-body">
                                <form action="/comment/{{$posts->id}}" method="post">
                                    {{csrf_field()}}
                                   <div class="form-group">
                                       <textarea name="comment" id=""  class="form-control"></textarea>

                                   </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
            </div>





@endsection