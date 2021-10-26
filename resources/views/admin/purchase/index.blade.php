@extends('layouts.app')

@section('content')
@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="card-body">
            
                <livewire:purchase.purchase-component />
        
        </div>
    </div>
</div>
@endsection