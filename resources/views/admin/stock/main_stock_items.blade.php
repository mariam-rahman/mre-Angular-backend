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
        <div class="row page-titles mx-0 mb-0">
        <div class="col-sm-6 p-md-0">   
        <h3 class="text-primary m-0">Main Stock</h3>        
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('category.index')}}">Main Stock</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
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
                        <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Total products</th>
                                        <th>Remaining products</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchases as $purchase)
                                    <tr>
                                        <td>{{++$counter}}</td>
                                        <td>{{$purchase->product->name ?? 'nil'}}</td>
                                        <td>{{$purchase->qty}}</td>
                                        <td>{{$purchase->remaining_qty}}</td>
                                        <td>{{$purchase->price}}</td>
                                        <td>{{$purchase->product->category->title ?? 'nil'}}</td>
                                        <td>
                                        <a href="{{route('stock.moveForm',$purchase->product_id)}}" class="btn btn-primary btn-sm">Move to Sub Stock</a>
                                        <a href="" class="btn btn-success btn-sm">Sale</a>
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

@endsection