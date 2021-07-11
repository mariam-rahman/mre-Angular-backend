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
                <div class="card-header">
                    <h3 class="text-primary">Employee Information</h3>
                </div>
                <div class="card-body">
                    <img src="{{asset('storage/'.$employee->image)}}" width="20%" alt="">
                    <div class="row d-flex mt-4">
                        <div class="col-md-4 pb-0">
                            <p class="text-primary">Name of Emplyee</p>
                            <span class="text-secondary">{{$employee->name}}</span>
                        </div>
                        <div class="col-md-4">
                            <p class="text-primary">E-mail</p>
                            <span class="text-secondary"> {{$employee->email}}</span>
                        </div>
                        <div class="col-md-4">
                            <p class="text-primary">Contact Number</p>
                            <span class="text-secondary">{{$employee->phone}}</span>
                        </div>
                    </div>
                    <div class="row d-flex mt-5">
                        <div class="col-md-4">
                            <p class="text-primary">Employee Address</p>
                            <span class="text-secondary">{{$employee->address}}</span>
                        </div>
                        <div class="col-md-4">
                            <p class="text-primary">Contractual Monthly Salary</p>
                            <span class="text-secondary">{{$employee->salary}}</span>
                        </div>
                    </div>
                    <div class="row d-flex mt-5">
                     <div class="col-md-4">
                            <p class="text-primary">Contarct Date</p>
                            <span class="text-secondary">{{$employee->created_at}}</span>
                        </div>

                        <div class="col-md-4">
                            <p class="text-primary">Contarct Updated</p>
                            <span class="text-secondary">{{$employee->updated_at}}</span>
                        </div>
                        <div class="col-md-4">
                            <p class="text-primary">Employee Position</p>
                            <span class="text-secondary">{{$employee->designation}}</span>
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