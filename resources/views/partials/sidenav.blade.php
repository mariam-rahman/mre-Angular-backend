    <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">           
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Navigation</li>
                    <li><a href="{{route('dashboard.index')}}"><i class="mdi mdi-home"></i><span class="nav-text">Dashboard</span></a></li>
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="nav-text">Stock</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('stock.index')}}">Stocks</a></li>
                            <li><a href="{{route('category.index')}}">Categories</a></li>
                            <li><a href="{{route('product.index')}}">Products</a></li>
                            <li><a href="#">Purchases</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="mdi mdi-store"></i><span class="nav-text">Shop</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('onsale.index')}}">On sales</a></li>
                            <li><a href="#">Sales</a></li>
                            <li><a href="{{route('customer.index')}}">Customers</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-male"></i><span class="nav-text">Employee</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('employee.index')}}">Employees</a></li>
                            <li><a href="#">Payslip</a></li>
                            <li><a href="#">Daily expenses</a></li>
              
                        </ul>
                    </li>
                    
                    <li><a href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="nav-text">Users</span></a></li>
                    
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
    