@extends('layouts.app')

@section('content')

@php
$counter = 0;
@endphp
<link rel="stylesheet" href="{{asset('css/mre.css')}}">
<!--**********************************
            Content body start
        ***********************************-->
@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0 mb-0">
            <div class="col-sm-6 p-md-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Add Users</button></li>
               
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List of Users</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($users as $user)
                                    <tr>
                                        <td>{{++$counter}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6 d-flex">
                                                    <form action="{{route('user.destroy',$user)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" class="btn btn-danger px-1 py-0 ">
                                                    </form>
                                                    <a href="{{route('user.edit',$user)}}" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>
                                                 </div>
                                            </div>
                                            </td>
                                     </tr>
                               @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>




<div class="modal fade" id="basicModal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Information</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form action="{{route('user.store')}}" method="post">
                            @CSRF
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control mre" >
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>E-mail</label>
                                    <input type="email" name="email" class="form-control mre" >
                                </div>
                            </div>

                         

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control mre" >
                                 </div>
                             </div> 

                         

                           
                             

                                </div>

                                <div class="modal-footer">
                                    <input type="submit" value="Save" class="btn btn-secondary">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection