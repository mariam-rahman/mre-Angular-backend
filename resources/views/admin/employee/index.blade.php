@extends('layouts.app')

@section('content')

@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row page-titles  mx-0">
            <div class="col-sm-6 p-md-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Employee</button>
            </div>
           
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <livewire:employee.employee-component />
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection