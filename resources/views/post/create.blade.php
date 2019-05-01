@extends('layouts.user')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Create Post</h5>
                <div class="card-body">
                    <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                       {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" class="form-control"  placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <select name="category" id="" class="form-control">
                                @if(count($categories)>0)
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->ca_name}}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">image</label>
                            <input type="file" name="image" class="form-control" placeholder="image">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Information</label>
                            <textarea name="info" class="form-control" placeholder="information"></textarea>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection