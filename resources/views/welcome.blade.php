@extends('layouts.user')

@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-8 col-md-offset-3">


                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>
                    <div class="card-body">
                        @component('component.who')

                        @endcomponent
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>





                <div class="panel panel-default">
                    <div class="panel-heading"></div>

                    <div class="panel-body container">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
