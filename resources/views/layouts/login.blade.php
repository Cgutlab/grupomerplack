<!DOCTYPE html>
<html lang="es">
	<head>
		<link rel="icon" type="image/png" href="{{ asset('img/logos/favicon.ico') }}"/>
		<!--Import Google Icon Font-->
		<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
		<link href="{{ asset('css/icon.css') }}" rel="stylesheet">
		<!--<script src="https://use.fontawesome.com/c3d13979f5.js"></script>-->

		<!--Import materialize.css-->
		<link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
		<link rel="stylesheet" href="{{ asset('css/materialize.css') }}">

		<!--Let browser know website is optimized for mobile-->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>MERPLAC - @yield('title')</title>
		<link rel="icon" type="image/png" href="{{ asset('img/logos/'.$favicon->imagen) }}"/>
	</head>

	<body class="login">
		@yield('main')
	</body>
</html>