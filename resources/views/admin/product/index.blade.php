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
<style>
input[type="search"]{
    border: 1px solid #dedbfb;
    border-radius: 0.25rem;
}

</style>
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
                        <div class="table-responsive">
                            <table id="example" class=" table table-striped table-bordered" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{++$counter}}</td>
                                        <td>{{$product->name}}</td>
                                        <td> {{$product->category->title}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6 d-flex">
                                                    <form action="{{route('product.destroy',$product)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger px-1 py-0 ">Delete</button>
                                                    </form>
                                                    <a href="{{route('product.edit',$product)}}" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>
                                    
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
                <h5 class="modal-title">Add a new Product</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form action="{{route('product.store')}}" method="post">
                            @CSRF
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="form-control" style="border: 1px solid #c9c5c5;" placeholder="Enter Title">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Category</label>
                                    <select name="category_id" id="inputState" class="form-control">

                                        <option>Choose category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach

                                    </select>

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