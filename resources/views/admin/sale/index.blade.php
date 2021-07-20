@extends('layouts.app')

@section('content')

@php
$counter = 0;
@endphp
<link rel="stylesheet" href="{{asset('css/mre.css')}}">
@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
            <a href="{{route('sale.create')}}" class="btn btn-secondary">Sell product</a>
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
                                        <th>Customer</th>
                                        <th>Stock</th>
                                        <th>Date</th>
                                        <th>Total amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales as $sale)
                                    <tr>
                                      <td>{{++$counter}}</td>
                                        <td>{{$sale->customer_id == 01 ? 'Counter':$sale->customer->name}}</td>
                                        <td>{{$sale->getStock()}}</td>
                                        <td>{{$sale->sell_date}}</td>
                                        <td>{{$sale->getTotal()}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-12 d-flex">
                                                    <form action="" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" class="btn btn-danger px-1 py-0">
                                                    </form>
     
                                                    <a href="{{route('sale.sell_detail',$sale->id)}}" class="btn btn-warning px-1 py-0 ml-1" style="color:white">Details</a>

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
@endsection