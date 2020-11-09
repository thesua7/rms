<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />--}}
{{--    <meta content="Themesbrand" name="author" />--}}
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    @yield('css')

</head>


<body data-sidebar="dark">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

@yield('body')

<!-- JAVASCRIPT -->
<script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('libs/node-waves/waves.min.js')}}"></script>

<script src="{{asset('js/skote.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
@yield('js')
</body>
</html>
