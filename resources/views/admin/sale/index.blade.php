@extends('layouts.app')

@section('content')

@php
$counter = 0;
@endphp

@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <livewire:sell.sell-component />
            </div>
        </div>
    </div>
</div>
@endsection