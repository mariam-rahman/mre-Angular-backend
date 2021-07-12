@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="{{asset('css/mre.css')}}">
<!--**********************************
            Content body start
        ***********************************-->
@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0 mb-0">
            <div class="col-sm-6 p-md-0">
                <h3 class="text-primary">Edit User Information</h3>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">Users</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>



       
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card w-75 justify-content-center">


                    <div class="card-body">
                        <div class="basic-form">
                            <form action="" method="post">
                            @csrf
                            @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control mre" value="{{$user->name}}">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>E-mail</label>
                                        <input type="email" name="email" class="form-control mre" value="{{$user->email}}">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control mre" value="{{$user->password}}">
                                    </div>
                                </div>


                                <input type="submit" value="Update" class="btn btn-primary">
                                <a href="{{route('user.index')}}" class="btn btn-outline-primary">Close</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>



</div>
</div>
</div>
</div>





@endsection