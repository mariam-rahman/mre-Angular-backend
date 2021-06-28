@extends('layouts.app')

@section('content')
<br><br>
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
                                    <h4 class="text-center mb-4">Create an account</h4>
                                    <form action="{{route('register')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Name</strong></label>
                                            <input type="text" name="name" class="form-control" value="{{old('name')}}" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" value="{{old('email')}}" required >
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control" required autocomplete="new-password">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Confirm Password</strong></label>
                                            <input type="password" name="password_confirmation" class="form-control" required >
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection