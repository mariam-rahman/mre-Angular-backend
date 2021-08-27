@extends('layouts.app2')

@section('content')
<livewire:styles />
    <div class="authincation mt-5" >
        <div class="container ">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-10">
                    <div class="authincation-content">
                        <div class="row no-gutters mt-5">
                            <div class="col-xl-6">
                                <div class="welcome-content">
                                    <div class="brand-logo">
                                        <a href="#">Welcome to MRES system</a>
                                    </div>
                                    <div class="intro-social">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                 
                                     <livewire:user.user-component >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <livewire:scripts />

@endsection