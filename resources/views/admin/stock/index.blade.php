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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Add Stock</button></li>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('stock.index')}}">Stock</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Stock list</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Stock</th>
                                        <th>Address</th>    
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stocks as $stock)
                                    <tr>
                                        <td>{{++$counter}}</td>
                                        <td>{{$stock->stock_type}}</td>
                                        <td>{{$stock->address}}</td>
                                        <td>
                                        <div class="row">
                                        <div class="col-sm-6 d-flex">
                                        <form action="{{route('stock.destroy',$stock)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                    <button class="btn btn-danger px-1 py-0 ">Delete</button>
                                                
                                            </form>

                                            <a href="{{route('stock.edit',$stock)}}" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>
                                            <a href="{{route('stock.show',$stock)}}" class="btn btn-success px-1 py-0 ml-1">Show</a>

                                            </td>
                                        </div>
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




<div class="modal fade" id="basicModal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a new Stock</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form action="{{route('stock.store')}}" method="post">
                            @CSRF
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Stock Name</label>
                                    <input type="text" name="stock_type" class="form-control" style="border: 1px solid #c9c5c5;" placeholder="Enter Title">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Location</label>
                                    <input type="text" name="address" class="form-control" style="border: 1px solid #c9c5c5;" placeholder="Enter Title">
                                </div>
                               

                                <div class="modal-footer">
                                    <input type="submit" value="Save" class="btn btn-secondary">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection