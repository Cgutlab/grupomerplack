@php
	$rutas = explode("/", $_SERVER['REQUEST_URI']);
	if(isset($rutas[2]))
	{
		$seccion = $rutas[2];
		$subseccion = str_replace('/'.$rutas[0].'/'.$rutas[1].'/'.$rutas[2].'/', "", $_SERVER['REQUEST_URI']);
	}
	else
	{
		$seccion="";
		$subseccion="";
	}
@endphp
<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>MER-PLAC - @yield('title')</title>

		<link rel="icon" type="image/png" href="{{ asset('img/logos/'.$favicon->imagen) }}"/>
		
		<link href="{{ asset('css/icon.css') }}" rel="stylesheet">

		<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
		<script src="https://use.fontawesome.com/c3d13979f5.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>

		<link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
		<link type="text/css" rel="stylesheet" href="{{ asset('css/estilo.css') }}"  media="screen,projection"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

	<body>
		<nav id="superior">
			<div class="container">
				<div class="row nomargin">
					<div class="col s12">
						<div class="nav-wrapper">
							<ul class="right hide-on-med-and-down">
								<li @if($seccion=='solicitud')class="activo"@endif><a href="{{ url('solicitud') }}">SOLICITUD DE PRESUPUESTO</a></li>
								<li @if($seccion=='contacto')class="activo"@endif><a href="{{ url('contacto') }}">CONTACTO</a></li>
								<li @if($seccion=='buscar')class="activo"@endif><a href="{{ url('buscar') }}"><i class="material-icons">search</i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<header class="container pt15">
			<div class="row nomargin">
				<div class="col s12">
					<div id="cabecera">
						<a href="{{ url('/') }}" class="brand-logo left hide-on-small-only">
							<img  src="{{ asset('img/logos/'.$principal->imagen) }}" class="responsive-img left">
						</a>
						<div class="datos right hide-on-med-and-down">
							<table>
								<tbody>
									<tr>
										<td rowspan="2"><i class="material-icons">local_phone</i></td>
										<td class="bottom">{!! $telefono->dato!!}</td>
									</tr>
									<tr>
										<td class="top">{{ $horario->dato }}.</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<nav id="navegador">
						<div class="nav-wrapper">
							<a href="{{ url('/') }}" class="brand-logo left hide-on-med-and-up">
								<img  src="{{ asset('img/logos/'.$principal->imagen) }}" class="responsive-img left">
							</a>
							<a href="#" data-activates="mobile-demo" class="button-collapse right"><i class="material-icons">menu</i></a>
							<ul id="nav-mobile" class="right hide-on-med-and-down">
								<li @if($seccion=='empresa')class="activo"@endif><a href="{{ url('empresa') }}"><div></div>EMPRESA</a></li>
								<li @if($seccion=='catalogo/1')class="activo"@endif><a href="{{ url('catalogo/1') }}"><div></div>MATERIAL SECO</a></li>
								<li @if($seccion=='catalogo/2')class="activo"@endif><a href="{{ url('catalogo/2') }}"><div></div>PINTURERIA</a></li>
								<li @if($seccion=='catalogo/3')class="activo"@endif><a href="{{ url('catalogo/3') }}"><div></div>ROPA DE TRABAJO</a></li>
								<li @if($seccion=='catalogo/4')class="activo"@endif><a href="{{ url('catalogo/4') }}"><div></div>MELAMINAS Y TERCIADOS</a></li>
								<li @if($seccion=='ofertas')class="activo"@endif><a href="{{ url('ofertas') }}"><div></div>OFERTAS</a></li>
								<li @if($seccion=='sucursales')class="activo"@endif><a href="{{ url('sucursales') }}"><div></div>SUCURSALES</a></li>
							</ul>
							<ul class="side-nav" id="mobile-demo">
								<li @if($seccion=='empresa')class="activo"@endif><a href="{{ url('empresa') }}">EMPRESA</a></li>
								<li @if($seccion=='catalogo/1')class="activo"@endif><a href="{{ url('catalogo/1') }}">MATERIAL SECO</a></li>
								<li @if($seccion=='catalogo/2')class="activo"@endif><a href="{{ url('catalogo/2') }}">PINTURAS</a></li>
								<li @if($seccion=='catalogo/3')class="activo"@endif><a href="{{ url('catalogo/3') }}">ROPA DE TRABAJO</a></li>
								<li @if($seccion=='catalogo/4')class="activo"@endif><a href="{{ url('catalogo/4') }}">MELAMINAS Y TERCIADOS</a></li>
								<li @if($seccion=='ofertas')class="activo"@endif><a href="{{ url('ofertas') }}">OFERTAS</a></li>
								<li @if($seccion=='sucursales')class="activo"@endif><a href="{{ url('sucursales') }}">SUCURSALES</a></li>
								<li @if($seccion=='solicitud')class="activo"@endif><a href="{{ url('solicitud') }}">SOLICITUD DE PRESUPUESTO</a></li>
								<li @if($seccion=='contacto')class="activo"@endif><a href="{{ url('contacto') }}">CONTACTO</a></li>
								<li @if($seccion=='buscar')class="activo"@endif><a href="{{ url('buscar') }}">BUSCAR</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			
			
		</header>

		@yield('main')

		<section class="marcas">
			<div class="container center-align pt15 pb15">
				@foreach ($marcas as $marca)
					<a href="{{$marca->vinculo}}">	
						<img src="{{ asset('img/marcas/'.$marca->imagen) }}">
					</a>
				@endforeach
			</div>
		</section>
		<footer class="page-footer">
			<img  src="{{ asset('img/logos/'.$footer->imagen) }}" id="logo-footer" class="right hide-on-med-and-down">
			<div class="container">
				<div class="row">
					<div class="col s12 hide-on-med-and-up">
						<img src="{{ asset('img/logos/'.$footer->imagen) }}" class="responsive-img">
					</div>
					<div class="col l4 s12">
						<h5>SITEMAP</h5>
						<ul>
							<li><a href="{{ url('empresa') }}">EMPRESA</a></li>
							<li><a href="{{ url('catalogo/1') }}">MATERIAL SECO</a></li>
							<li><a href="{{ url('catalogo/2') }}">PINTURAS</a></li>
							<li><a href="{{ url('catalogo/3') }}">ROPA DE TRABAJO</a></li>
							<li><a href="{{ url('catalogo/4') }}">MELAMINAS Y TERCIADOS</a></li>
							<li><a href="{{ url('ofertas') }}">OFERTAS</a></li>
							<li><a href="{{ url('sucursales') }}">SUCURSALES</a></li>
							<li><a href="{{ url('solicitud') }}">SOLICITUD DE PRESUPUESTO</a></li>
							<li><a href="{{ url('contacto') }}">CONTACTO</a></li>
							<li><a href="{{ url('buscar') }}">BUSCAR</a></li>
						</ul>
					</div>
					<div class="col l4 offset-l4 s12">
						<h5>MER-PLAC</h5>
						<table>
							<tbody>
								<tr>
									<td ><i class="material-icons">location_on</i></td>
									<td>{{ $direccion->dato }}</td>
								</tr>
								<tr>
									<td><i class="material-icons">phone</i></td>
									<td>{{ $telefono->dato }}</td>
								</tr>
								<tr>
									<td><i class="material-icons">mail</i></td>
									<td><a href="{{ 'mailto:'.$email->dato }}">{{ $email->dato }}</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					© 2018
					<a class="grey-text text-lighten-4 right" href="http://osole.es">by Osole</a>
				</div>
			</div>
        </footer>
        <script type="text/javascript">
			$('.carousel.carousel-slider').carousel({fullWidth: true});
			$('.chica').click(function(event){
				var fuente = $(this).attr('src');
				$('#grande').attr('src', fuente);
			});
			$(".button-collapse").sideNav();
		</script>
	</body>
</html>
