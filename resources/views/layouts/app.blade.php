<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MRES') }}</title>
    <link href="{{asset('vendor/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/mre.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body >
@include('partials.loader')
<div id="main-wrapper">
 @yield('content')
</div>

     <!-- Required vendors -->
     <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- Here is navigation script -->
    <script src="{{asset('vendor/quixnav/quixnav.min.js')}}"></script>
    <script src="{{asset('js/quixnav-init.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/dashboard/dashboard-1.js')}}"></script>

 
    <!-- Datatable -->
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/js/datatables.init.js')}}"></script>

        <!-- Summernote -->
        <script src="{{asset('vendor/summernote/js/summernote.min.js')}}"></script>
    <!-- Summernote init -->
    <script src="{{asset('vendor/summernote/js/summernote-init.js')}}"></script>
</body>
</html>
