@extends('layouts.app')

<link rel="stylesheet" href="{{asset('css/mre.css')}}">

@section('content')
@include('partials.sidenav')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card" id="user-activity">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                <a  href="{{route('user.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap primary">
                                            <i class="mdi mdi-account-group"></i>
                                        </div>                                        
                                        <h4>{{$users}}</h4>
                                        <span class="type-name">Users</span>
                                        
                                            <i class="mdi mdi-arrow-up-bold"></i>
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a  href="{{route('product.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap warning">
                                            <i class="mdi mdi-employee"></i>
                                        </div>
                                        <h4>{{$employees}}</h4>
                                        <span class="type-name">Employees</span>
                                        <i class="mdi mdi-arrow-up-bold"></i>
                                    </a>
                                </li>

                                <li class="nav-item"> 
                                <a href="{{route('category.index')}}" class="nav-link" role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap success">
                                            <i class="mdi mdi-airballoon"></i>
                                        </div>
                                        <h4>{{$category}}</h4>
                                        <span class="type-name">Category</span>
                                        <i class="mdi mdi-arrow-up-bold"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('product.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap info">
                                            <i class="mdi mdi-trophy"></i>
                                        </div>
                                        <h4>{{$products}}</h4>
                                        <span class="type-name">Products</span>
                                        <i class="mdi mdi-arrow-up-bold"></i>
                                    </a>
                                </li>
                 
                                <li class="nav-item">
                                    <a class="nav-link"  href="{{route('stock.index')}}" role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap danger">
                                            <i class="mdi mdi-clock"></i>
                                        </div>
                                        <h4>{{$main_stock_items}}</h4>
                                        <span class="type-name">Main stock items</span>
                                        <i class="mdi mdi-arrow-up-bold"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"  href="{{route('substock.index')}}" role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap danger">
                                            <i class="mdi mdi-clock"></i>
                                        </div>
                                        <h4>{{$sub_stock_items}}</h4>
                                        <span class="type-name">Sub stock items</span>
                                        <i class="mdi mdi-arrow-up-bold"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('purchase.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap info">
                                            <i class="mdi mdi-trophy"></i>
                                        </div>
                                        <h4>{{$purchase}}</h4>
                                        <span class="type-name">Purchased Products</span>
                                        <i class="mdi mdi-arrow-up-bold"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('customer.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap info">
                                            <i class="mdi mdi-trophy"></i>
                                        </div>
                                        <h4>{{$customers}}</h4>
                                        <span class="type-name">Customer</span>
                                        <i class="mdi mdi-arrow-up-bold"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('product.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap info">
                                            <i class="mdi mdi-trophy"></i>
                                        </div>
                                        <h4>56</h4>
                                        <span class="type-name">Sale</span>
                                        <i class="mdi mdi-arrow-up-bold"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('expense.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap info">
                                            <i class="mdi mdi-trophy"></i>
                                        </div>
                                        <h4>{{$expenses}}</h4>
                                        <span class="type-name">Expensies</span>
                                        <i class="mdi mdi-arrow-up-bold"></i>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
              
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
@endsection




