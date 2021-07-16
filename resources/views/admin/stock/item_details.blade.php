@extends('layouts.app')

@section('content')

@php
$counter = 0;
@endphp
<link rel="stylesheet" href="{{asset('css/mre.css')}}">
@include('partials.sidenav')
<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0 mb-0">
        <div class="col-sm-6 p-md-0">   
        <h3 class="text-primary m-0">Product details</h3>        
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('stock.index')}}">Main-Stock</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                    <div class="row">
                       <div class="col-6">
                         <ul>
                             <li class="mb-2">Name:
                                 <span class="text-primary"><b>{{$stocks->product->name}}</b></span>
                             </li>
                             <li>Category:
                             <span class="text-primary"><b>{{$stocks->product->category->title}}</b></span> 
                             </li>
                         </ul>
                       </div>

                       <div class="col-6 " style="text-align:right">
                       <ul>
                             <li class="mb-2">Total Product:
                                 <span class="text-primary"><b>{{$stocks->qty}}</b></span>
                                </li>
                             <li>
                             Remaining Product:
                             <span class="text-primary"><b>{{$stocks->remaining_qty}}</b></span>
                            </li>
                         </ul>
                       </div>
                       </div>
                       <hr>
                       <br><br>
                        <div class="table-responsive">
                        <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Remaining quantity</th>
                                        <th>Transform date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{++$counter}}</td>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->remaining_qty}}</td>
                                        <td>{{$item->created_at}}</td>
                                    
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection