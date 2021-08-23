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
                <h3>Edit Expenses</h3>
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
            <div class="col-xl-12 col-xxl-12">
                <div class="card w-75 justify-content-center">


                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('expense.update',$expense)}}" method="post">
                            @csrf
                            @method('PUT')
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Employee Name</label>
                                        <select name="employee_id" id="inputState" class="form-control mre">
                                            <option selected>Choose...</option>
                                            @foreach($employees as $employee)
                                            <option value="{{$employee->id}}" {{$employee->id == $expense->employee_id? 'selected':''}}>{{$employee->name}}</option>
                                            @endforeach                                     
                                        </select>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Amount</label>
                                        <input type="number" name="amount" class="form-control mre" value="{{$expense->amount}}">
                                    </div>
                                </div>

                                    <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Event</label>
                                        <textarea cols="30" name="event" class="form-control mre">{{$expense->event}}</textarea> 
                                    </div>
                                </div>

                                    <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Date</label>
                                        <input type="date" name="date" class="form-control mre" value="{{$expense->date}}">
                                    </div>
                                    </div>

                                <input type="submit" value="Update" class="btn btn-primary">
                                <a href="{{route('expense.index')}}" class="btn btn-outline-primary">Close</a>
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