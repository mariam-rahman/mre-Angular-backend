@extends('layouts.app')

@section('content')
@include('partials.sidenav')
<livewire:styles />
<div class="content-body">
    <div class="container">
       
                    <livewire:customer.customer-component />
     </div>
</div>
       

<livewire:scripts />

@endsection