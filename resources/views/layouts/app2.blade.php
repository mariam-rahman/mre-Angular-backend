<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MRES') }}</title>
    
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
   


    

</head>
<body class="pt-0" >
    @include('partials.loader')

 @yield('content')


     <!-- Required vendors -->
     <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    
    <!-- Here is navigation script -->
    <script src="{{asset('js/custom.min.js')}}"></script>
   

 
   
      
</body>
</html>
