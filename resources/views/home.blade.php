@extends('layouts.app')

@section('content')
@include('partials.header')
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
                                    <a class="nav-link" data-toggle="tab" href="#session" role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap success">
                                            <i class="mdi mdi-shopping"></i>
                                        </div>
                                        <h4>324</h4>
                                        <span class="type-name">Products</span>
                                        <span class="text-success ">17%
                                            <i class="mdi mdi-arrow-up-bold"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#bounce" role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap info">
                                            <i class="mdi mdi-cart"></i>
                                        </div>
                                        <h4>249</h4>
                                        <span class="type-name">Sold products</span>
                                        <span class="text-danger ">4%
                                            <i class="mdi mdi-arrow-down-bold"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#session-duration" role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap danger">
                                            <i class="mdi mdi-sale"></i>
                                        </div>
                                        <h4>350</h4>
                                        <span class="type-name">On sales</span>
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
