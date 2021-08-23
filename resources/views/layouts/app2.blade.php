<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MRES') }}</title>
    <link href="{{asset('vendor/summernote/summernote.css')}}" rel="stylesheet">
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">





</head>
<body class="pt-0" >
    @include('partials.loader')

<body >

 @yield('content')
 @include('partials.footer')


     <!-- Required vendors -->
     <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
     <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Here is navigation script -->
    <script src="./vendor/quixnav/quixnav.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/dashboard/dashboard-1.js"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>



    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/js/datatables.init.js"></script>

        <!-- Summernote -->
        <script src="{{asset('vendor/summernote/js/summernote.min.js')}}"></script>
    <!-- Summernote init -->
    <script src="{{asset('vendor/summernote/js/summernote-init.js')}}"></script>


</body>
</html> 
</html>