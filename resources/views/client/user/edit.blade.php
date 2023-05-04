@extends('client.layout.login')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <strong>
                        <h1 class="text-center page-header">
                            Edit Info
                        </h1>
                    </strong>
                    @if(count($errors))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ route("client.user.update") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="Please Enter Category Name" value="{{$category->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" placeholder="Please Enter Category Name" value="{{$category->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" placeholder="Please Enter Category Name" value="{{$category->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Confirm</label>
                            <input class="form-control" name="password_confirmation" placeholder="Please Enter Category Name" value="{{$category->name}}"/>
                        </div>

                        <button type="submit" class="btn btn-default">Update</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection