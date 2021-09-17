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
                    <li class="breadcrumb-item"><a href="{{route('onsale.index')}}">Onsale</a></li>
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
                                 <span class="text-primary"><b>{{$onsaleInfo->product->name}}</b></span>
                                </li>
                             <li>Category:
                                 <span class="text-primary"><b>{{$onsaleInfo->product->category->title}}</b></span>
                                </li>
                         </ul>
                       </div>

                       <div class="col-6 " style="text-align:right">
                       <ul>
                             <li class="mb-2">Total products: 
                            <span class="text-primary"><b>{{$onsaleInfo->qty}}</b></span> 
                            </li>
                             <li>Remaining products: 
                             <span class="text-primary"><b>{{$onsaleInfo->remaining_qty}}</b></span>
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
                                        <th>Discount</th>
                                        <th>Stock</th>
                                        <th>Transform date</th>
                                    </tr>
                                </thead>
                                <tbody>
                            @foreach($onsales as $onsale)
                             <tr>
                                 <td>{{++$counter}}</td>
                                 <td>{{$onsale->product->name}}</td>
                                 <td>{{$onsale->qty}}</td>
                                 <td>{{$onsale->remaining_qty}}</td>
                                 <td>{{$onsale->discount}}</td>
                                 <td>{{$onsale->stock_id == 2? 'Sub Stock': 'Main Stock'}}</td>
                                 <td>{{$onsale->created_at}}</td>
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