@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/mre.css')}}">
@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0 mb-0">
            <div class="col-sm-6 p-md-0">
                <h3>Add to onSale</h3>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('purchase.index')}}">Purchase</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>

  
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card w-75 justify-content-center">


                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{route('moveToOnSale',$purchaseId)}}" method="post">
                            @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Quantity</label>
                                        <input type="number" name="qty" class="form-control mre" >
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Sell price</label>
                                        <input type="number" name="price" class="form-control mre">
                                    </div>
                                </div>

                                <input type="submit" value="Add" class="btn btn-primary">
                                <a href="{{route('purchase.index')}}" class="btn btn-outline-primary">Close</a>
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