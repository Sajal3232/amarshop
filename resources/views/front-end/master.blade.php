<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="{{asset('/')}}/front-end/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}/front-end/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('/')}}/front-end/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{asset('/')}}/front-end/css/price-range.css" rel="stylesheet">
    <link href="{{asset('/')}}/front-end/css/animate.css" rel="stylesheet">
	<link href="{{asset('/')}}/front-end/css/main.css" rel="stylesheet">
	<link href="{{asset('/')}}/front-end/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('/')}}/front-end/js/html5shiv.js"></script>
    <script src="{{asset('/')}}/front-end/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('/')}}/front-end/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('/')}}/front-end/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('/')}}/front-end/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('/')}}/front-end/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{asset('/')}}/front-end/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    @include('front-end.includes.header')
    @yield('content')
    @include('front-end.includes.footer')


  
    <script src="{{asset('/')}}/front-end/js/jquery.js"></script>
	<script src="{{asset('/')}}/front-end/js/bootstrap.min.js"></script>
	<script src="{{asset('/')}}/front-end/js/jquery.scrollUp.min.js"></script>
	<script src="{{asset('/')}}/front-end/js/price-range.js"></script>
    <script src="{{asset('/')}}/front-end/js/jquery.prettyPhoto.js"></script>
    <script src="{{asset('/')}}/front-end/js/main.js"></script>
</body>
</html>