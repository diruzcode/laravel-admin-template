<!DOCTYPE html>
<html lang="es">

<head>
	<title>{{ ENV('APP_TITLE') }}</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="{{ ENV('description') }}">
	<meta name="keywords" content="{{ ENV('keywords') }}">

  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
	<!-- Main style -->
	<link rel="stylesheet" href="{{ mix('/css/dashboard.css') }}">
	<link rel="stylesheet" href="{{ mix('/css/dashboard_resources.css') }}">

</head>

<body class="bg-gradient-primary">

	<div class="container">
					@yield('content')
	</div>


  <script src="{{ mix('/js/dashboard.js') }}"></script>
	<script src="{{ mix('/js/dashboard_resources.js') }}"></script>
	@include('dashboard.common.message')

  @yield('js-validation')
  @yield('js-scripts')

</body>

</html>
