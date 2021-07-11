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
                    <li class="breadcrumb-item"><a href="{{route('stock.display')}}">Stock</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Stocks</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-2">
                            <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
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
                                        <div class="col-sm-6 d-flex">
                                        <form action="{{route('stock.destroy',$stock)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                    <button class="btn btn-danger px-1 py-0 ">Delete</button>     
                                            </form>
                                            <a href="{{route('stock.edit',$stock)}}" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>
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

<!--Delete model-->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content m-1">
            <div class="">
             
            </div>
            <div class="modal-body">


            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="basicModal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a Stock</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form action="{{route('stock.store')}}" method="post" enctype="multipart/form-data">
                            @CSRF
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Name</label>
                                    <input type="text" name="stock_type" class="form-control mre">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Address</label>
                                    <textarea name="address" id="" cols="30" rows="3" class="form-control mre"></textarea>
                                </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="submit" value="Save" class="btn btn-secondary">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection