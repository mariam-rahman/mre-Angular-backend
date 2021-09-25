@extends('layouts.app')

@section('content')



@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row page-titles  mx-0">
            <div class="col-sm-6 p-md-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Add Role</button></li>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li>
                    <li class="breadcrumb-item"><a href="">Role</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
              

            <livewire:role.role-component />
            </div>
        </div>
    </div>
</div>
</div>
</div>





@endsection