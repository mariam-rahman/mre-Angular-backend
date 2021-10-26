@extends('layouts.app')

@section('content')




@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row page-titles  mx-0">
            <div class="col-sm-6 p-md-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">Add Permission</button></li>
            </div>
            
        </div>
        <div class="row">
            <div class="col-12">
              
            <livewire:permission.permission-component />

            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection