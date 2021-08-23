@extends('layouts.app')

@section('content')

@php
$counter = 0;
@endphp

<!--**********************************
            Content body start
        ***********************************-->
@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row page-titles  mx-0">
            <div class="col-sm-6 p-md-0">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Employee</button>
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




<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Employee Information</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <div class="card mb-0">
                            <div class="card-body">
                                <div class="basic-form">
                                    <form  action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Phone</label>
                                                <input type="text" name="phone" class="form-control" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Address</label>
                                                <input type="text" name="address" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Designation</label>
                                                <input type="text" name="designation" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Image</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Salary</label>
                                                <input type="number" name="salary" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>joining Date</label>
                                                <input type="date" name="joining_date" class="form-control">
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
        </div>
    </div>
</div>
@endsection