@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="{{asset('css/mre.css')}}">

<!--**********************************
            Content body start
        ***********************************-->
@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0 mb-0">
            <div class="col-sm-6 p-md-0">
                <h3 class="text-primary m-0">Sub-Stock</h3>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <livewire:stock.substock.substock-component />
            </div>
        </div>
    </div>
</div>

@endsection