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
<style>
input[type="search"]{
    border: 1px solid #dedbfb;
    border-radius: 0.25rem;
}

</style>
<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Add PaySlip</button></li>
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
                                        <th>Name</th>
                                        <th>Salary</th>
                                        <th>payment</th>
                                        <th>payment date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($slips as $slip)
                                    <tr>
                                        <td>{{++$counter}}</td>
                                        <td>{{$slip->employee->name}}</td>
                                        <td>{{$slip->salary}}</td>
                                        <td>{{$slip->payment}}</td>
                                        <td>{{$slip->payment_date}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6 d-flex">
                                                    <form action="{{route('slip.destroy',$slip)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger px-1 py-0 ">Delete</button>
                                                    </form>
                                                    <a href="{{route('slip.edit',$slip)}}" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>
                                    
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
                <h5 class="modal-title">Add PaySlip</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form action="{{route('slip.store')}}" method="post">
                            @CSRF
                            <div class="form-row">
                                <div class="form-group col-md-12">
                        
                                    <select name="employee_id" id="inputState" class="form-control">
                                        <option>Choose Employee</option>
                                        @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endforeach
                                    </select>
                                   </div>

                                <div class="form-group col-md-12">
                                    <label>Payment</label>
                                    <input type="number" name="payment" class="form-control" style="border: 1px solid #c9c5c5;">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Payment Date</label>
                                    <input type="date" name="payment_date" class="form-control" style="border: 1px solid #c9c5c5;">
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