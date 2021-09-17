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
<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0 mb-0">
            <div class="col-sm-6 p-md-0">
           <h3 class="text-primary">Sold items Information</h3>
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
                                 <span class="text-primary"><b>{{$total_sale->product->name}}</b></span>
                                </li>
                             <li>Category:
                                 <span class="text-primary"><b>{{$total_sale->product->category->title}}</b></span>
                                </li>
                         </ul>
                       </div>

                       <div class="col-6 " style="text-align:right">
                       <ul>
                             <li class="mb-2">Total products: 
                            <span class="text-primary"><b>{{$total_sale->qty}}</b></span> 
                            </li>
                                                       
                         </ul>
                       </div>
                       </div>
                       <hr>
                       <br><br>
                    <div class="card-header">
                        <h4 class="card-title">list of Sold product</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example" class=" table table-striped table-bordered" style="min-width: 845px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Customer name</th>
                                        <th>Sold Price</th>
                                        <th>qty</th>
                                        <th>Category</th>
                                        <th>Stock</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($items as $item) 
                                    <tr>
                                        <th>{{++$counter}}</th>
                                        <td>{{$item->product->name}}</td>
                                         <td>{{$item->customer->name}}</td>
                                        <td>{{$item->sold_price}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->product->category->title}}</td>
                                        <td>
                                            @if($item->stock_id == 1)
                                                
                                                    <span>Main stock</span>
                                             
                                                @elseif($item->stock_id == 2)
                                                    <span>Sub Stock</span>
                                                
                                                @elseif($item->stock_id == 3)
                                                <span>Onsale</span>
                                                
                                                @else
                                                <span></span>
                                                
                                        @endif
                                    </td>
                                        <td>{{$item->sold_date}}</td>
                                        
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-6 d-flex">
                                                    <form action="" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" class="btn btn-danger px-1 py-0">
                                                    </form>
                                                    <a href="" class="btn btn-secondary px-1 py-0 ml-1">Edit</a>

                                                </div>
                                        </td>

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