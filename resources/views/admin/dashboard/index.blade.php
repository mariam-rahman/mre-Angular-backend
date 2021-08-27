@extends('layouts.app')



@section('content')
<link rel="stylesheet" href="{{asset('css/mre.css')}}">
<link rel="stylesheet" href="css/zay.css">
@include('partials.sidenav')
        <!--**********************************
            Content body start
        ***********************************-->

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card pb-5" id="user-activity">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                <a  href="{{route('user.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap primary">
                                            <i class="mdi mdi-account-group"></i>
                                        </div>                                        
                                        <h4>{{$users}}</h4>
                                        <span class="type-name">Users</span>
                                        
                                           
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a  href="{{route('product.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="30px" height="30px" preserveAspectRatio="xMidYMid meet" viewBox="0 0 36 36"><g data-name="Layer 3"><circle cx="16.86" cy="9.73" r="6.46" fill="#6f7a20"/><path d="M21 28h7v1.4h-7z" fill="#6f7a20"/><path d="M15 30v3a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1V23a1 1 0 0 0-1-1h-7v-1.47a1 1 0 0 0-2 0V22h-2v-3.58a32.12 32.12 0 0 0-5.14-.42a26 26 0 0 0-11 2.39a3.28 3.28 0 0 0-1.88 3V30zm17 2H17v-8h7v.42a1 1 0 0 0 2 0V24h6z" fill="#6f7a20"/></g></svg>
                                        </div>
                                        <h4>{{$employees}}</h4>
                                        <span class="type-name">Employees</span>
                                        
                                    </a>
                                </li>

                                <li class="nav-item"> 
                                <a href="{{route('category')}}" class="nav-link" role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap success">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="30" height="30" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm10 10h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zM17 3c-2.206 0-4 1.794-4 4s1.794 4 4 4s4-1.794 4-4s-1.794-4-4-4zM7 13c-2.206 0-4 1.794-4 4s1.794 4 4 4s4-1.794 4-4s-1.794-4-4-4z" fill="#41c473"/></svg>
                                        </div>
                                        <h4>{{$category}}</h4>
                                        <span class="type-name">Category</span>
                                        
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('product.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap info">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="30" height="30" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><circle cx="5" cy="19" r="1" fill="#6d7ca3"/><path d="M4 4h2v9H4z" fill="#6d7ca3"/><path d="M7 2H3a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zm0 19H3V3h4z" fill="#6d7ca3"/><circle cx="12" cy="19" r="1" fill="#6d7ca3"/><path d="M11 4h2v9h-2z" fill="#6d7ca3"/><path d="M14 2h-4a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zm0 19h-4V3h4z" fill="#6d7ca3"/><circle cx="19" cy="19" r="1" fill="#6d7ca3"/><path d="M18 4h2v9h-2z" fill="#6d7ca3"/><path d="M21 2h-4a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zm0 19h-4V3h4z" fill="#6d7ca3"/></svg>
                                        </div>
                                        <h4>{{$products}}</h4>
                                        <span class="type-name">Products</span>
                                      
                                    </a>
                                </li>
                 
                                <li class="nav-item">
                                    <a class="nav-link"  href="{{route('stock.index')}}" role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="30" height="30" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><g fill="none"><path d="M18.883 4.697a1 1 0 0 1 1.414 0l3.59 3.59l3.582-3.58a1 1 0 1 1 1.414 1.414l-3.58 3.581l3.48 3.48a1 1 0 0 1-1.415 1.415l-3.48-3.48l-3.49 3.49a1 1 0 0 1-1.414-1.415l3.49-3.49l-3.59-3.59a1 1 0 0 1 0-1.415z" fill="#6d7ca3"/><path fill-rule="evenodd" clip-rule="evenodd" d="M23.86 15.051a1 1 0 0 1 .632 0l14.778 4.926c.199.057.38.175.513.346l4.003 5.138a1 1 0 0 1-.204 1.426l-15.4 5.129l-3.217-4.13a1 1 0 0 0-1.579.001l-3.2 4.122l-15.444-5.151a1 1 0 0 1-.165-1.397l3.93-5.046a1 1 0 0 1 .538-.426L23.86 15.05zm11.969 5.887L24.18 24.82l-11.652-3.884l11.648-3.882l11.653 3.884z" fill="#6d7ca3"/><path d="M28.144 34.137l11.847-3.946v6.572a3 3 0 0 1-2.052 2.846l-12.763 4.254V31.411l1.863 2.392c.26.334.703.468 1.105.334z" fill="#6d7ca3"/><path d="M23.176 31.42v12.443l-12.763-4.254a3 3 0 0 1-2.051-2.846v-6.59l11.863 3.958a1 1 0 0 0 1.106-.336l1.845-2.376z" fill="#6d7ca3"/></g></svg>
                                            
                                        </div>
                                        <h4>{{$main_stock_items}}</h4>
                                        <span class="type-name">Main stock items</span>
                                        
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"  href="{{route('substock.index')}}" role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="30" height="30" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><g fill="none"><path d="M18.883 4.697a1 1 0 0 1 1.414 0l3.59 3.59l3.582-3.58a1 1 0 1 1 1.414 1.414l-3.58 3.581l3.48 3.48a1 1 0 0 1-1.415 1.415l-3.48-3.48l-3.49 3.49a1 1 0 0 1-1.414-1.415l3.49-3.49l-3.59-3.59a1 1 0 0 1 0-1.415z" fill="#6d7ca3"/><path fill-rule="evenodd" clip-rule="evenodd" d="M23.86 15.051a1 1 0 0 1 .632 0l14.778 4.926c.199.057.38.175.513.346l4.003 5.138a1 1 0 0 1-.204 1.426l-15.4 5.129l-3.217-4.13a1 1 0 0 0-1.579.001l-3.2 4.122l-15.444-5.151a1 1 0 0 1-.165-1.397l3.93-5.046a1 1 0 0 1 .538-.426L23.86 15.05zm11.969 5.887L24.18 24.82l-11.652-3.884l11.648-3.882l11.653 3.884z" fill="#6d7ca3"/><path d="M28.144 34.137l11.847-3.946v6.572a3 3 0 0 1-2.052 2.846l-12.763 4.254V31.411l1.863 2.392c.26.334.703.468 1.105.334z" fill="#6d7ca3"/><path d="M23.176 31.42v12.443l-12.763-4.254a3 3 0 0 1-2.051-2.846v-6.59l11.863 3.958a1 1 0 0 0 1.106-.336l1.845-2.376z" fill="#6d7ca3"/></g></svg>
                                        </div>
                                        <h4>{{$substocks}}</h4>
                                        <span class="type-name">Sub stock items</span>
                                        
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('purchase.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap success">
                                            <i class="mdi mdi-trophy"></i>
                                        </div>
                                        <h4>{{$purchase}}</h4>
                                        <span class="type-name">Purchased Products</span>
                                     
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('customer.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap info">
                                        
                                        </div>
                                        <h4>{{$customers}}</h4>
                                        <span class="type-name">Customer</span>
                                       
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('product.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap primary">
                                       
                                        </div>
                                        <h4>{{$sales}}</h4>
                                        <span class="type-name">Sale</span>
                                  
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('expense.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap warning">
                                            <i class="mdi mdi-trophy"></i>
                                        </div>
                                        <h4>{{$expenses}}</h4>
                                        <span class="type-name">Expensies</span>
                                     
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a  href="{{route('expense.index')}}" class="nav-link"  role="tab" aria-controls="" aria-selected="false">
                                        <div class="icon-wrap warning">
                                            <i class="mdi mdi-trophy"></i>
                                        </div>
                                        <h4>3000$</h4>
                                        <span class="type-name">Revanue</span>
                                     
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
              
            </div>
        
        <!--**********************************
            Content body end
        ***********************************-->





         <!--**********************************
            Content body start
        ***********************************-->
     
            <div class="container">
                <div class="row page-titles">
                  <h2>Abserive by chart</h2>
                </div>
                <!-- row -->
                

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">                                           
                                <h4 class="card-title">Finance</h4>
                            </div>
                            <div class="card-body">
                                <div id="duration-value-axis"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">                                           
                                <h4 class="card-title">Revenue</h4>
                            </div>
                            <div class="card-body">
                                <div id="revenue-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">                                           
                                <h4 class="card-title">Zoomable Value Axis</h4>
                            </div>
                            <div class="card-body">
                                <div id="combined-bullet"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <!--**********************************
            Content body end
        ***********************************-->


         <!-- Required vendors -->
    <script src="./vendor/jquery/jquery.min.js"></script>

 


         <!-- AmCharts -->
    <script src="./vendor/amcharts/amcharts.js"></script>
    <script src="./vendor/amcharts/serial.js"></script>
    <script src="./vendor/amcharts/plugins/dataloader.min.js"></script>
    <script src="./vendor/amcharts/plugins/export.min.js"></script>
   
 
   
    <script src="./vendor/amcharts/amstock.js"></script>


    <script src="./js/plugins-init/amchart-init.js"></script>
        
@endsection




