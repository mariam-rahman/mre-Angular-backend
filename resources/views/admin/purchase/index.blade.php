@extends('layouts.app')

@section('content')

@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0 mb-0">
            <div class="col-sm-6 p-md-0">
            
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Purchase Product</button>
            
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="">Purchase</a></li>
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
                        <livewire:purchase.purchase-component />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection