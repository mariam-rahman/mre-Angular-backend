@extends('layouts.app')

@section('content')

@php
$counter = 0;
@endphp
<link rel="stylesheet" href="{{asset('css/mre.css')}}">

<div class="container">
<div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form action="{{route('employee.pay')}}" method="post">
                            @CSRF
                            <div class="form-row">
                            <input type="hidden" name="employee_id" value="{{$employee->id}}">
                               <input type="hidden" name="salary" value="{{$employee->salary}}">
                                <div class="form-group col-md-12">
                                    <label>Payment</label>
                                    <input type="number" name="payment" class="form-control" style="border: 1px solid #c9c5c5;" value="{{$employee->salary}}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Payment Date</label>
                                    <input type="date" name="payment_date" class="form-control" style="border: 1px solid #c9c5c5;">
                                </div>
                                    <input type="submit" value="Save" class="btn btn-secondary">
                        </form>
                    </div>
                </div>
                </div>
@endsection