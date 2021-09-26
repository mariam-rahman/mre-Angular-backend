@extends('layouts.app')

@section('content')

@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        
                  
                    <div class="card-body">
                    <livewire:employee.employee-component />
                    </div>
                </div>
        
        </div>
    </div>
</div>

@endsection