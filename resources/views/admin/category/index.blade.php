@extends('layouts.app')

@section('content')

@php
$counter = 0;
@endphp
@include('partials.sidenav')

<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Add Category</button></li>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="{{route('category')}}">Category</a></li>
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
                    <livewire:category.category-component />
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

@endsection