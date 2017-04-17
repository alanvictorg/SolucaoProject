 <head>
 	<meta charset="UTF-8">
	 <title>{{ config('app.name', 'Laravel') }} - </title>
 	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
 	<!-- Bootstrap 4 -->
 	<link href="{{ asset("assets/dist/css/vendor.css") }}" rel="stylesheet" type="text/css" />

 	<link rel="shortcut icon" href="{{ asset('global/img/favicon.png') }}" type="image/x-icon" />
 	
 	<link href="{{ asset("assets/dist/css/app.css") }}" rel="stylesheet" type="text/css" />

 	<link href="{{ asset("assets/css/sweetalert.css") }}" rel="stylesheet" type="text/css" />

 	{{ Html::style('assets/css/select2.min.css')}}
 	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	 <meta name="csrf-token" content="{{ csrf_token() }}">
	 <link href="{{ asset("assets/css/custom.css") }}" rel="stylesheet" type="text/css" />

 	@yield('page_styles')
 </head>