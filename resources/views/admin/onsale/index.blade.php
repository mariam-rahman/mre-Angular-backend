@extends('layouts.app')

@section('content')

@php
$counter = 0;
@endphp

<!--**********************************
            Content body start
        ***********************************-->
@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
              
            </div>
          
        </div>
        <div class="row">
            <div class="col-12">
             <livewire:onsale.onsale-component />
            </div>
        </div>
    </div>
</div>
@endsection