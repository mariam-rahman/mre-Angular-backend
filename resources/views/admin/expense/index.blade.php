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
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Add expenses</button></li>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('expense.index')}}">Expenses</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Expenses Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class=" table table-striped table-bordered" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee Name</th>
                                        <th>amount</th>
                                        <th>Event</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($expenses as $expense)
                                    <tr>
                                        <td>{{++$counter}}</td>
                                        <td>{{$expense->employee->name}}</td>
                                        <td> {{$expense->amount}}</td>
                                        <td> {{$expense->event}}</td>
                                        <td> {{$expense->date}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6 d-flex">
                                                    <form action="{{route('expense.destroy',$expense)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger px-1 py-0 ">Delete</button>
                                                    </form>
                                                    <a href="{{route('expense.edit',$expense)}}" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>
                                    
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
                <h5 class="modal-title">Add Expenses</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form action="" method="post">
                            @CSRF
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Employee Name</label>
                                    <select name="employee_id" class="form-control mre">
                                        <option>Choose Employee</option>
                                        @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                                <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Amount</label>
                                    <input type="number" name="amount" class="form-control mre">
                                </div>

                                <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Event</label>
                                    <textarea name="event" cols="30" class="form-control mre"></textarea>
                                </div>

                                <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Date</label>
                                    <input type="date" name="date" class="form-control mre">
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