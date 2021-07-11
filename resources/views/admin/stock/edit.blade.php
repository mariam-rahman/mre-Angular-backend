@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="{{asset('css/mre.css')}}">
<!--**********************************
            Content body start
        ***********************************-->
@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <h3>Edit Stock</h3>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('stock.display')}}">Stock</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>



       
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card w-75 justify-content-center">


                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('stock.update',$stock)}}" method="post">
                            @csrf
                            @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Name</label>
                                        <input type="text" name="stock_type" class="form-control mre" value="{{$stock->stock_type}}">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Address</label>
                                        <textarea name="address" cols="30" class="form-control mre">{{$stock->address}}</textarea>
                                    </div>




                                <input type="submit" value="Update" class="btn btn-primary">
                                <a href="{{route('stock.display')}}" class="btn btn-outline-primary">Close</a>
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