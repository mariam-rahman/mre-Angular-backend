@extends('layouts.app')

@section('content')



<link rel="stylesheet" href="{{asset('css/mre.css')}}">

<!--**********************************
            Content body start
        ***********************************-->
@include('partials.sidenav')
<div class="content-body">
    <div class="container">
     
        <div class="row">
            <div class="col-12">
               
                    <div class="card-body">
                    <livewire:userm.user-management-component >
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection