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
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Purchase Product</button>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('category.index')}}">Product</a></li>
                    <li class="breadcrumb-item active"><a href="">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List of Products</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchases as $purchase)
                                    <tr>
                                        <td>{{++$counter}}</td>
                                        
                                        <td>{{$purchase->product->name ?? 'nil'}}</td>
                                        <td>{{$purchase->qty}}</td>
                                        <td>{{$purchase->price}}</td>
                                        <td>{{$purchase->product->category->title ?? 'nil'}}</td>
                                        <td>{{$purchase->stock->stock_type}}</td>
                                        <td>
                                        <div class="row">
                                                <div class="col-sm-6 d-flex">
                                                    <form action="{{route('purchase.destroy',$purchase)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger px-1 py-0 ">Delete</button>
                                                    </form>
                                                    <a href="{{route('purchase.edit',$purchase)}}" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>
                                    
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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Purchase Product</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card pb-0">
                        <div class="card-body pb-0">
                            <div class="basic-form">
                                <form action="{{route('purchase.store')}}" method="post">
                                    @csrf
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                            <label>Select Product</label>
                                            <select name="product_id" id="inputState" class="form-control mre">

                                                <option>Select product</option>
                                                @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Quantity</label>
                                            <input type="number" name="qty" class="form-control mre">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Price</label>
                                            <input type="number" name="price" class="form-control mre">
                                        </div>
    
                                    
                                        <div class="form-group col-md-6">
                                            <label>Stocks</label>
                                            <select name="stock_id" id="inputState" class="form-control mre">
                                                <option>Choose stocks</option>
                                                @foreach($stocks as $stock)
                                                <option value="{{$stock->id}}">{{$stock->stock_type}}</option> 
                                                @endforeach
                                            </select>
                                            <div class="row mt-3">
                                        <div class="form-group col-md-6">
                                            <select class="selectpicker" data-live-search="true"  class="form-control mre">
                                                <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                                                <option data-tokens="mustard">Burger, Shake and a Smile</option>
                                                <option data-tokens="frosting">Sugar, Spice and all things nice</option>
                                            </select>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <input type="submit" value="Add Product" class="btn btn-secondary">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection