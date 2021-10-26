@extends('layouts.app')

@section('content')

@php
$x=1;
@endphp

<!--**********************************
            Content body start
        ***********************************-->
@include('partials.sidenav')
<div class="content-body">
    <div class="container">
       
        <div class="row">
            <div class="col-12">                   
                      <livewire:stock.main.main-stock-component />             
            </div>
        </div>
    </div>
</div>

@endsection