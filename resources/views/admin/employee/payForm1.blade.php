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
                <h3>Generate PaySlip for Employee</h3>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('employee.index')}}">PaySlip</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>



       
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card w-75 justify-content-center">


                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('employee.pay')}}" method="post">
                            @csrf
                        
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                    <input type="hidden" name="employee_id" value="{{$employee->id}}">
                               <input type="hidden" name="salary" value="{{$employee->salary}}">
                                        <label>Payment</label>
                                        <input type="text" name="payment" class="form-control mre" value="{{$employee->salary}}">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Payment Date</label>
                                        <input type="date" name="payment_date" class="form-control mre">
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



</div>
</div>
</div>
</div>





@endsection