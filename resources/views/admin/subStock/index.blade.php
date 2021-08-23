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
        <h3 class="text-primary m-0">Sub-Stock</h3>        
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('substock.index')}}">Sub-Stock</a></li>
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
                                        <th>Category</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($substocks as $substock)
                                    <tr>
                                        <td>{{++$counter}}</td>
                                        <td>{{$substock->product->name ?? ''}}</td>
                                        <td>{{$substock->qty}}</td>
                                        <td>{{$substock->remaining_qty}}</td>
                                        <td>{{$substock->product->category->title ?? ''}}</td>
                                        
                                        <td>
                                        <a href="{{route('substock.move',$substock->product_id)}}" class="btn btn-primary btn-sm">OnSale</a>
                                        
                                        <a href="{{route('substock.details',$substock->product_id)}}" class="btn btn-secondary btn-sm">Details</a>
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