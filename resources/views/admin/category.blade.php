@extends('layouts.admin')
@section('title','All User')

@section('content')


    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Responsive Hover Table</h3>

                    <div class="box-tools">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          <li class="fa fa-user"></li>  Add
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('admin.post')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Add new Category</label>
                                                <input type="text" name="name" class="form-control"  placeholder="Enter Your Category name">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
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
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>UpdateTime</th>
                            <th>Delete</th>

                        </tr>


                        @if(count($cates)>0)

                            @foreach($cates as  $cate)
                                <tr>
                                    <td>{{$cate->id}}</td>
                                    <td>{{$cate->ca_name}}</td>
                                    <td>{{$cate->created_at}}</td>
                                    <td>

                                        <form action="/admin/category/{{$cate->id}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger"><li class="fa fa-trash"></li></button>
                                        </form>





                                    </td>

                                    {{--<td>--}}
                                        {{--<form action="{{route('admin.delete',$cate->id)}}" method="post">--}}
                                            {{--{{csrf_field()}}--}}
                                            {{--<input type="hidden" name="_method" value="DELETE">--}}
                                            {{--<button class="btn btn-danger"><li class="fa fa-trash"></li></button>--}}

                                        {{--</form>--}}
                                    {{--</td>--}}
                                </tr>
                                @endforeach

                            @endif




                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>


    @endsection