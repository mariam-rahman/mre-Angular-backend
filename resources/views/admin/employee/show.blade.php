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
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('employee.index')}}">Employee Detailes</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>


        <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header justify-content-center">
                    <h3 class="text-primary ">Employee Information</h3>
                </div>
                <div class="card-body">
                    <img src="{{asset('storage/'.$employee->image)}}" width="20%" alt="">
                    <div class="row mt-3">
                    <div class="col-md-2 text-center">
                            <h2 class="text-secondary">{{$employee->name}}</h2>
                        </div>
                    </div>

                    <div class="row d-flex mt-5 ">
                        <div class="col-md-4  pb-0">
                            <p class="text-primary">E-mail</p>
                            <span class="text-secondary"> {{$employee->email}}</span>
                        </div>
                        <div class="col-md-4">
                            <p class="text-primary">Contact Number</p>
                            <span class="text-secondary">{{$employee->phone}}</span>
                        </div>
                        <div class="col-md-4">
                            <p class="text-primary">Employee Address</p>
                            <span class="text-secondary">{{$employee->address}}</span>
                        </div>
                    </div>

                    <div class="row d-flex mt-5">
                    <div class="col-md-4">
                            <p class="text-primary">Employee Position</p>
                            <span class="text-secondary">{{$employee->salaries[0]->designation}}</span>
                        </div>
                        <div class="col-md-4">
                            <p class="text-primary">Current salary</p>
                            <span class="text-secondary">{{$employee->salaries[0]->salary}}</span>
                        </div>
                        <div class="col-md-4">
                            <p class="text-primary">Joining Date</p>
                            <span class="text-secondary">{{$employee->joining_date}}</span>
                        </div>
                        
                    </div>

                    <div class="row d-flex mt-5">
                        <div class="col-md-4">
                            <p class="text-primary">Contarct Date</p>
                            <span class="text-secondary">{{$employee->created_at}}</span>
                        </div>

                        <div class="col-md-4">
                            <p class="text-primary">Contarct Updated</p>
                            <span class="text-secondary">{{$employee->salaries[0]->created_at}}</span>
                        </div>
                        
                    </div>
                    <br>


                    <!--Promote Employee-->
                    <hr><br>
                    <h3 class="text-center mb-5">Promote Employee</h3>
                    
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Promote</button>
                    
                   
                    <div class="table-responsive table-info " >
                       
                        <table class="table table-striped table-bordered " style="min-width: 845px;">
                            <thead>
                                <tr class="text-danger">
                                    <th>#</th>
                                    <th>Designation</th>
                                    <th>Salary</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employee->salaries as $salary)
                                <tr class="text-dark">
                                    <td>{{++$counter}}</td>
                                    <td>{{$salary->designation}}</td>
                                    <td>{{$salary->salary}}</td>
                                    <td>{{$salary->created_at}}</td>


                                    <td>
                                        <div class="row">
                                            <div class="col-sm-6 d-flex">
                                                <form action="{{route('employee.destroy',$employee)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Delete" class="btn btn-danger px-1 py-0 ">
                                                </form>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Promote edit</button>
                                                <a href="{{route('employee.edit',$employee)}}" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>
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
</div>
</div>
<!--model for promote-->
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
                    <form action="{{route('employee.promote')}}" method="post">
                            @CSRF
                            <input type="hidden" name="emp_id" value="{{$employee->id}}">
                            <div>
                                <label>Salary</label>
                                <input type="number" name="salary" class="form-control">
                            </div>
                            <div>
                                <label>Designation</label>
                                <input type="text" name="designation" class="form-control ">
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

<!--model for Edit Promote-->
<div class="modal fade" id="editModal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Salary</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                    <form action="{{route('employee.promote')}}" method="post">
                            @CSRF
                            <input type="hidden" name="emp_id" value="{{$employee->id}}">
                            <div>
                                <label>Salary</label>
                                <input type="number" name="salary" class="form-control">
                            </div>
                            <div>
                                <label>Designation</label>
                                <input type="text" name="designation" class="form-control ">
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