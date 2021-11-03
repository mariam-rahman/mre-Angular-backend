      <!--**********************************
            Nav header start
        ***********************************-->
        
        <div class="nav-header" >
            <a href="index.html" class="brand-logo" >
             <span class="logo-abbr">M</span>
                <span class="logo-compact">MRES</span>
            </a>

            <div class="nav-control" style="right: -0.5rem !important;">
                <div class="hamburger" >
                    <span class="toggle-icon"><i class="icon-menu"></i></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header endgi
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header"> 
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            
                        </div>
                   
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                            @if(Auth::user()->isAdmin)
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-bell"></i>
                                 
                                    <span class="badge badge-primary">{{count(@Auth::user()->unreadNotifications ?? []) }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <h5 class="notification_title">Notifications</h5>
                                    <ul class="list-unstyled">
                                  
                                    @foreach(Auth::user()->unreadNotifications ?? []  as $n)
                                        <li class="media dropdown-item">    
                                            <div class="media-body">                                               
                                                <a href="notification/{{$n->id}}">
                                                    <div class="d-flex justify-content-between">
                                                        <span>{{$n->data['user']?? ''}}</span>
                                                        &nbsp; &nbsp; &nbsp;
                                                        <span>{{$n->data['stock']??''}}</span>
                                                        &nbsp; &nbsp; &nbsp;
                                                        <span>{{$n->data['paid']??''}}</span>
                                                        &nbsp; &nbsp; &nbsp;
                                                        <span>{{substr($n->data['date'],0,10)??''}}</span>
                                                    </div>
                                                   
                                                </a>

                                            </div>
                                        </li>
                                     @endforeach
                                    
                                    </ul>
                               
                                </div>
                                @endif 
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#!" class="dropdown-item">
                                        
                                        <span>My profile</span>
                                    </a>
                                   
                                    <a href="#!" class="dropdown-item">
                                        
                                        <span>Settings</span>
                                    </a>
                                 
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
