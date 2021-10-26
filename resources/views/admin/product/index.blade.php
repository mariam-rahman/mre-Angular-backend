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
   
        <div class="row">
            <div class="col-12">
                
                   
                    <div class="card-body">
                       
                    <livewire:product.product-component >
                    </div>
                
            </div>
        </div>
    </div>
</div>
@endsection