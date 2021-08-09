@extends('layouts.app')

@section('content')

@php
$counter = 0;
@endphp
<livewire:styles />

<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Add Category</button></li>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="">Category</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                        </div>
                        <h4 class="card-title">Category list</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-2">
                            <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
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
                                            <div class="row">
                                                <div class="col-sm-6 d-flex">
                                                    <a href="" class="btn btn-danger">Delete</a>

                                                    <a href="" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>


                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <livewire:category.category-component />
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.category.create')

<livewire:scripts />
<!--Delete model-->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content m-1">
            <div class="">
                <h5 class="modal-title">Would you like to delete this record?</h5>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

@endsection