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
           <h3 class="text-primary">Items to Customers</h3>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('sale.index')}}">Sale</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">list of Sold product</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer name</th>
                                        <th>Product Name</th>                                    
                                        <th>qty</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales as $sale)
                                 <tr> 
                                     <td>{{++$counter}}</td>
                                     <td>{{$sale->customer->name}}</td>
                                     <td>{{$sale->product->name}}</td>                                     
                                     <td>{{$sale->qty}}</td>
                                     <td>{{$sale->product->category->title}}</td>
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