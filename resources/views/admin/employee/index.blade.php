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
        <div class="row page-titles  mx-0">
            <div class="col-sm-6 p-md-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Add Employee</button></li>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('employee.index')}}">Employee</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List of Employees</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($employees as $employee)
                                    <tr>
                                        <td>{{++$counter}}</td>
                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->phone}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6 d-flex">
                                                    <form action="{{route('employee.destroy',$employee)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" class="btn btn-danger px-1 py-0 ">
                                                    </form>
                                                    <a href="{{route('employee.edit',$employee)}}" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>
                                                    <a href="{{route('employee.show',$employee)}}" class="btn btn-success px-1 py-0 ml-1">Show</a>
                                                    <a href="{{route('employee.payForm',$employee->id)}}" class="btn btn-info px-1 py-0 ml-1">Pay</a>
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
                <h5 class="modal-title">Employee Information</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
                            @CSRF
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Employee Name</label>
                                    <input type="text" name="name" class="form-control mre" >
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>E-mail</label>
                                    <input type="text" name="email" class="form-control mre" >
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control mre" >
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Address</label>
                                    <input type="text" name="Address" class="form-control mre" >
                                 </div>
                             </div> 

                             <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Monthly Salary</label>
                                    <input type="number" name="salary" class="form-control mre" >
                                 </div>
                             </div>

                             <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Position</label>
                                    <input type="text" name="designation" class="form-control mre" >
                                 </div>
                             </div>

                            <div class="form-group col-md-12">
                                    <label>Image</label>
                                    <div class="input-group mb-3">
                                        <input type="file" name="image" class="form-control" style="border: 1px solid #c9c5c5;" id="">

                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <input type="submit" value="Save" class="btn btn-secondary">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection