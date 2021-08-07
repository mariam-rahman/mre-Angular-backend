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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Add Category</button></li>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('category.index')}}">Category</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
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
                                        <form action="{{route('category.destroy',$category)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                    <button class="btn btn-danger px-1 py-0 ">Delete</button>
                                                
                                            </form>

                                            <a href="{{route('category.edit',$category)}}" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>


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



<div class="modal fade" id="basicModal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a new Category</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

            @livewire('category-component')
            </div>
        </div>
    </div>
</div>
<livewire:scripts />
@endsection