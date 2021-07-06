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
                <h2 class="mb-5 text-primary">Employee Information</h2>
                <img src="{{asset('storage/'.$employee->image)}}" width = "50%"alt="">


            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('employee.index')}}">Employee Detailes</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>

        <div class="row d-flex">
            <div class="col-md-4 pb-0">
                <p class="text-primary"><u>Name of Emplyee</u></p>
                {{$employee->name}}
            </div>
            <div class="col-md-4">
                <p class="text-primary"><u>E-mail</u></p>
                {{$employee->email}}
            </div>
            <div class="col-md-4">
                <p class="text-primary"><u>Contact Number</u></p>
                {{$employee->phone}}
            </div>

        </div>

        <div class="row d-flex mt-5">
            <div class="col-md-4">
                <p class="text-primary"><u>Employee Address</u></p>
                {{$employee->address}}
            </div>
            <div class="col-md-4">
                <p class="text-primary"><u>Contractual Monthly Salary</u></p>
            
            </div>
            <div class="col-md-4">
                <p class="text-primary"><u>Contarct Date</u></p>
            </div>
        </div>

        <div class="row d-flex mt-5">
            <div class="col-md-4">
                <p class="text-primary"><u>Employee Position</u></p>
            </div>
        </div>


    </div>









</div>
</div>
</div>
</div>


@endsection