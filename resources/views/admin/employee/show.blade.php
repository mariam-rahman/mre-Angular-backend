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
<livewire:employee.show-component :id="$id" />
@endsection