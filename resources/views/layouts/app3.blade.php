<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <!--this is bootsrap css stylesheet-->


    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

<link rel="stylesheet" href="{{asset('css/zay.css')}}">
   



    <title>Nav-Bar</title>
</head>

<body>
@include('partials.view_header')
@yield('content')

@include('partials.view_footer')






<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>