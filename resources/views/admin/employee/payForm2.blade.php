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
    <div class="row mx-0 mb-0" style="border-bottom: 2px solid #eee; padding-bottom:16px">
    <div class="col-md-4">
    <span class="text-primary mr-3">Name:</span>{{$employee->name}}
    </div>
    <div class="col-md-4">
    <span class="text-primary mr-3">ID:</span>{{$employee->id}}
    </div>
    <div class="col-md-4">
    <span class="text-primary mr-3">Salary:</span>{{$employee->salaries[0]->salary}}
    </div>
  
    </div>
        <div class="row page-titles mx-0 mb-0">
            <div class="col-sm-6 p-md-0">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Pay</button>
              
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('slip.index')}}">Pay Silp</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
           
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">PaySlips</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class=" table table-striped table-bordered" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                         <th>payment</th>
                                        <th>payment date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employee->slips as $slip)
                                    <tr>
                                        <td>{{++$counter}}</td>
                                        <td>{{$slip->payment}}</td>
                                        <td>{{$slip->payment_date}}</td>
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


<!--model-->

<div class="modal fade" id="basicModal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">monthly Salary</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form action="{{route('employee.pay')}}" method="post">
                            @csrf

                            <div class="form-row">
                                <input type="hidden" name="employee_id" value="{{$employee->id}}">
                                <div class="form-group col-md-12">
                                    <label>Payment</label>   
                                    <input type="number" name="payment" class="form-control" max="{{$employee->salaries[0]->salary}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Payment Date</label>
                                    <input type="date" name="payment_date" class="form-control">
                                </div>
                            </div>
                            <input type="submit" value="Pay" class="btn btn-primary">
                            <a href="{{route('employee.index')}}" class="btn btn-outline-primary">Close</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection