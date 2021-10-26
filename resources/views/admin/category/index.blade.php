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


@endsection