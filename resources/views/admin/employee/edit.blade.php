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
                <h3>Edit Employee Information</h3>
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
            <div class="col-xl-12 col-xxl-12">
                <div class="card w-75 justify-content-center">


                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('employee.update',$employee)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Employee Name</label>
                                        <input type="text" name="name" class="form-control mre" value="{{$employee->name}}">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>E-mail</label>
                                        <input type="text" name="email" class="form-control mre" value="{{$employee->email}}">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control mre" value="{{$employee->phone}}">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Address</label>
                                        <textarea name="Address" cols="30" name="address" class="form-control mre">{{$employee->address}}"</textarea>
                                    </div>

                                    <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Salary</label>
                                    <input type="number" name="salary" class="form-control mre" value="{{$employee->salary}}" >
                                 </div>
                             </div>

                                    <div class="form-group col-md-12">
                                    <img src="{{asset('storage/'.$employee->image)}}" width ="80" alt="">
                                    <label>Image</label>
                                    <div class="input-group mb-3">
                                        <input type="file" name="image" class="form-control" style="border: 1px solid #c9c5c5;" id="">

                                    </div>

                                </div>


                                </div>


                                <input type="submit" value="Update" class="btn btn-primary">
                                <a href="{{route('customer.index')}}" class="btn btn-outline-primary">Close</a>
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