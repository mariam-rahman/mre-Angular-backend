@extends('layouts.app')

@section('content')

@include('partials.sidenav')

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript">
    ['Monthly', 'Sales', 'Revenues'],
    ['January', "{{$month1}}", "{{$profit1}}"],
    ['February', "{{$month2}}", "{{$profit2}}"],
    ['March', "{{$month3}}", "{{$profit3}}"],
    ['April', "{{$month4}}", "{{$profit4}}"],
    ['May', "{{$month5}}", "{{$profit5}}"],
    ['June', "{{$month6}}", "{{$profit6}}"],
    ['July', "{{$month7}}", "{{$profit7}}"],
    ['Aguest', "{{$month8}}", "{{$profit8}}"],
    ['September', "{{$month9}}", "{{$profit9}}"],
    ['october', "{{$month10}}", "{{$profit10}}"],
    ['Nevember', "{{$month11}}", "{{$profit11}}"],
    ['December', "{{$month12}}", "{{$profit12}}"]
</script> -->
<div class="container">
    <div class="row mt-5">
        <div class="col-xl-12">
            <div class="card pb-5" id="user-activity">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="{{route('user.index')}}" class="nav-link" role="tab" aria-controls="" aria-selected="false">
                            <div class="icon-wrap primary">
                                <i class="fa fa-male"></i>
                            </div>
                            <h4>{{$users}}</h4>
                            <span class="type-name">Users</span>


                            </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('product.index')}}" class="nav-link" role="tab" aria-controls="" aria-selected="false">
                            <div class="icon-wrap success ">
                                <i class="mdi mdi-account-group" aria-hidden="true"></i>
                            </div>
                            <h4>{{$employees}}</h4>
                            <span class="type-name">Employees</span>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('category')}}" class="nav-link" role="tab" aria-controls="" aria-selected="false">
                            <div class="icon-wrap primary">
                                <i class="fa fa-th" aria-hidden="true"></i>
                            </div>
                            <h4>{{$category}}</h4>
                            <span class="type-name">Category</span>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('product.index')}}" class="nav-link" role="tab" aria-controls="" aria-selected="false">
                            <div class="icon-wrap success">
                                <i class="fa fa-cubes" aria-hidden="true"></i>
                            </div>
                            <h4>{{$products}}</h4>
                            <span class="type-name">Products</span>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('stock.index')}}" role="tab" aria-controls="" aria-selected="false">
                            <div class="icon-wrap primary">
                                <i class="mdi mdi-widgets"></i>

                            </div>
                            <h4>{{$main_stock_items}}</h4>
                            <span class="type-name">Main stock items</span>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('substock.index')}}" role="tab" aria-controls="" aria-selected="false">
                            <div class="icon-wrap success">
                                <i class="mdi mdi-widgets"></i>
                            </div>
                            <h4>{{$substocks}}</h4>
                            <span class="type-name">Sub stock items</span>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('purchase.index')}}" class="nav-link" role="tab" aria-controls="" aria-selected="false">
                            <div class="icon-wrap primary">
                                <i class="fa fa-book" aria-hidden="true"></i>
                            </div>
                            <h4>{{$purchase}}</h4>
                            <span class="type-name">Purchased Products</span>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('customer.index')}}" class="nav-link" role="tab" aria-controls="" aria-selected="false">
                            <div class="icon-wrap success">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </div>
                            <h4>{{$customers}}</h4>
                            <span class="type-name">Customer</span>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('customer.index')}}" class="nav-link" role="tab" aria-controls="" aria-selected="false">
                            <div class="icon-wrap primary">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </div>
                            <h4>{{$sales}}</h4>
                            <span class="type-name">Sale</span>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('onsale.index')}}" class="nav-link" role="tab" aria-controls="" aria-selected="false">
                            <div class="icon-wrap success">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            </div>
                            <h4>{{$onsales}}</h4>
                            <span class="type-name">OnSale</span>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('expense.index')}}" class="nav-link" role="tab" aria-controls="" aria-selected="false">
                            <div class="icon-wrap primary">
                                <i class="fa fa-cogs" aria-hidden="true"></i>
                            </div>
                            <h4>{{$expenses}}</h4>
                            <span class="type-name">Expensies</span>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('expense.index')}}" class="nav-link" role="tab" aria-controls="" aria-selected="false">
                            <div class="icon-wrap success">
                                <i class="fa fa-money" aria-hidden="true"></i>
                            </div>
                            <h4>3000$</h4>
                            <span class="type-name">Revanue</span>

                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>






    <!--code for drop Down to select chaet-->
    <center>
        <br>
        <hr>
        <br>
        <!-- <h3 class="mb-3">Select year to analyiz profit accuarding sold product</h3>
        <div class="card-body">
    <div class="basic-form">
        <form action="{{route('dashboard.chart_value')}}" method="POST" >
            @csrf
            <div class="input-group mb-3 w-50">
            <select name="year_value" class="form-control w-25">
                <option selected>Select Year</option>
                @foreach($years as $year)
                <option value="{{$year->y}}">{{$year->y}}</option>
                @endforeach
            </select>
                <div class="input-group-append">
               
                    <input type="submit" value="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div> -->

           
           
        <br><br>
        <div class="d-flex">
        <div class="row" style="flex-wrap:nowrap">
        <p>Sales and Profit of the Business</p>
        <div class="col-md-10 d-flex">
        <canvas id="myChart" style="width:100%; max-width:900px;"></canvas>
        </div>
        </div>

        <div>
        <div class="row d-flex">
        <div class="col-md-2 d-flex mr-2 bg-primary" style="height: 20px;" style="width: 10px;">  
        </div>
        <div class="d-flex">
        <p>Sold Product</p>
        </div>
        
        </div>

        <div class="row">
        <div class="col-md-2 d-flex mr-2 bg-success  " style="height: 20px;">  
        </div>
        <p class="">Revenues</p>
        </div>
        </div>
    
      </div>
</div>
        
      
        
       
        
        
        
    </center>
    <!--end here-->


    <!--code for chart-->

    <!-- <script>
        var xValues = ["January", "February", "March", "April", "May", "Jun", "Julay", "Agust", "September", "October", "November", "December"];

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    data: ["{{$month1}}", "{{$month2}}", "{{$month3}}", "{{$month4}}", "{{$month5}}", "{{$month6}}", "{{$month7}}", "{{$month8}}", "{{$month9}}", "{{$month10}}", "{{$month11}}", "{{$month12}}"],
                    borderColor: "#7367f0",
                    fill: false
                }, {
                    data: ["{{$profit1}}", "{{$profit2}}", "{{$profit3}}", "{{$profit5}}", "{{$profit5}}", "{{$profit6}}", "{{$profit7}}", "{{$profit8}}", "{{$profit9}}", "{{$profit10}}", "{{$profit11}}", "{{$profit12}}"],
                    borderColor: "green",
                    fill: false
                }]
            },
            options: {
                legend: {
                    display: false
                }
            }
        });
    </script> -->
</div>
</div>
</div>
<br><br>



@endsection