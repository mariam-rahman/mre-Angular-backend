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
                                
                                <a href="{{route('category')}}" class="nav-link" role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap success">
                                            <i class="mdi mdi-airballoon"></i>
                                        </div>
                                        <h4>324</h4>
                                        <span class="type-name">Category</span>
                                        <span class="text-success ">17%
                                            <i class="mdi mdi-arrow-up-bold"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('product.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap info">
                                            <i class="mdi mdi-trophy"></i>
                                        </div>
                                        <h4>24.9%</h4>
                                        <span class="type-name">Product Purchase</span>
                                        <span class="text-danger ">4%
                                            <i class="mdi mdi-arrow-down-bold"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#session-duration" role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap danger">
                                            <i class="mdi mdi-clock"></i>
                                        </div>
                                        <h4>5m 32s</h4>
                                        <span class="type-name">Stock</span>
                                        <span class="text-success ">9%
                                            <i class="mdi mdi-arrow-up-bold"></i>
                                        </span>
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
