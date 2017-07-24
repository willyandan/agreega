<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	@stack('meta-tags')
	<link rel="icon" href="{{ asset('favicon.ico') }}">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/admEstilo.css')}}">
	@stack('link')
	<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/jquery.mask.js')}}" type="text/javascript"></script>	
	<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
	@stack('script')
</head>
<body>
	@include('templates.commom.admHeader')

	@yield('content')

	@include('templates.commom.admFooter')
	
	@yield('modal')
</body>
</html>