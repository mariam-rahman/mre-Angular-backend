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
<livewire:styles />

<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Add Product</button></li>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">product list</h4>
                    </div>
                    <div class="card-body">
                       
                    <livewire:product.product-component >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection