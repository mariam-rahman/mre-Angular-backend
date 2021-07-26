@extends('layouts.app')
@section('content')
@php
$counter = 0;
@endphp
<link href="{{asset('css/mre.css')}}" rel="stylesheet">

<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0 mb-0">
            <div class="col-sm-6 p-md-0">
                 @if(@!$isVisible)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Add Product</button>
                 @endif
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('category.index')}}">Purchase</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        
                          <div class="col-3 card-title">Customer:{{$sale->customer_id == 01 ? 'Counter':$sale->customer->name}}</div>
                          <div class="col-3 card-title">Source:{{$sale->getStock()}}</div>
                         <div class="col-3 card-title">Date:{{$sale->sell_date}}</div>
                         <div class="col-3" style="text-align:right; "><a href="{{route('sale.invoice',$sale->id)}}"  class="btn btn-warning text-white">Print invoice</a></div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sale->sell_details as $sell)
                                    <tr>
                                        <td>{{++$counter}}</td>

                                        <td>{{$sell->product_id}}</td>
                                        <td>{{$sell->qty}}</td>
                                        <td>{{$sell->sell_price}}</td>
                                        <td>
                                            
                                                <div class="d-flex">
                                                    <form action="" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" class="btn btn-danger px-1 py-0">
                                                    </form>
                                                    <a href="" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>
                                                    
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



<!-- Large modal -->
<div class="modal fade" id="basicModal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a new Product</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        @if($x ?? '')
                        <form action="{{route('stock.sellStore',$product_id)}}" method="post">
                            @elseif($y ?? '')
                            <form action="{{route('substock.sellStore',$product_id)}}" method="post">
                            @else
                            <form action="{{route('onsale.sellStore',$product_id)}}" method="post">
                            @endif
                    <form action="{{route('sale.sell')}}" method="post">
                    <input type="hidden" name="sell_id" value="{{$sale->id}}">
                    <input type="hidden" name="stock_id" value="{{$sale->stock_id}}">
                            @csrf
                            <div class="form-row">
                            <div class="form-group col-md-12">
                                    <label>Product</label>
                                    <select name="product_id" id="inputState" class="form-control">     
                                        @foreach($sale->getProducts() as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">                                    
                                    <label>Qauntity</label>
                                    <input type="number" name="qty" class="form-control mre">
                                </div>
                                <div class="form-group col-md-12">
                                <label>Sell Price</label>
                                <input type="number" name="sell_price" class="form-control mre">
                                </div>
                            </div>
                                <input type="submit" value="Save" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection