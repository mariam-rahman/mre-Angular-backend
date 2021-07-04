@extends('layouts.app')


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
                                    <a class="nav-link active" data-toggle="tab" href="#user" role="tab" aria-controls="" aria-selected="true">
                                        <div class="icon-wrap primary">
                                            <i class="mdi mdi-account-group"></i>
                                        </div>                                        
                                        <h4>5658</h4>
                                        <span class="type-name">User</span>
                                        <span class="text-success ">7%
                                            <i class="mdi mdi-arrow-up-bold"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                
                                <a href="{{route('category.index')}}" class="nav-link" role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap success">
                                            <i class="mdi mdi-airballoon"></i>
                                        </div>
                                        <h4>{{$category}}</h4>
                                        <span class="type-name">Category</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('product.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap info">
                                            <i class="mdi mdi-trophy"></i>
                                        </div>
                                        <h4>{{$products}}</h4>
                                        <span class="type-name">Types of Products</span>
                                    </a>
                                </li>
                 
                                <li class="nav-item">
                                    <a class="nav-link"  href="{{route('purchase.index')}}" role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap danger">
                                            <i class="mdi mdi-clock"></i>
                                        </div>
                                        <h4>{{$main_stock_items}}</h4>
                                        <span class="type-name">Main stock items</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"  href="{{route('stock.index')}}" role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap danger">
                                            <i class="mdi mdi-clock"></i>
                                        </div>
                                        <h4>{{$sub_stock_items}}</h4>
                                        <span class="type-name">Sub stock items</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('purchase.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap info">
                                            <i class="mdi mdi-trophy"></i>
                                        </div>
                                        <h4>{{$purchase}}</h4>
                                        <span class="type-name">Purchased Products</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('product.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap info">
                                            <i class="mdi mdi-trophy"></i>
                                        </div>
                                        <h4>77</h4>
                                        <span class="type-name">Customer</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('product.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap info">
                                            <i class="mdi mdi-trophy"></i>
                                        </div>
                                        <h4>56</h4>
                                        <span class="type-name">Sale</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('product.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap info">
                                            <i class="mdi mdi-trophy"></i>
                                        </div>
                                        <h4>560</h4>
                                        <span class="type-name">Expensies</span>
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




