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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Add Category</button></li>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('category.index')}}">Category</a></li>
                    <li class="breadcrumb-item active"><a href="">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Category list</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{++$counter}}</td>
                                        <td>{{$category->title}}</td>
                                        <td>{{$category->desc}}</td>
                                        <td><img src="{{asset('storage/'.$category->image)}}" alt="" width="60"></td>
                                        <td>

                                            <button type="button" class="btn btn-danger px-1 py-0" data-toggle="modal" data-target=".bd-example-modal-sm">Delete</button>
                                            <a href="{{route('category.edit',$category)}}" class="btn btn-secondary px-1 py-0">Edit</a>

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
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Cateory</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('category.destroy',$category)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <p>Do you want to delete?</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="basicModal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a new Category</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="basic-form">
                    <div class="basic-form custom_file_input">
                        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                            @CSRF
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" style="border: 1px solid #c9c5c5;" placeholder="Enter Title">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Descriptiion</label>
                                    <textarea name="desc" id="" cols="30" rows="3" class="form-control" style="border: 1px solid #c9c5c5;"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Image</label>
                                    <div class="input-group mb-3">
                                        <input type="file" name="image" class="form-control" style="border: 1px solid #c9c5c5;" id="">

                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <input type="submit" value="Add Category" class="btn btn-primary">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection