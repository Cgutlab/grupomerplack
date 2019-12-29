@extends('layouts.front')

@section('title','Inicio')
 
@section('main')
		<div class="carousel carousel-slider" data-indicators="true">
			@foreach($sliders as $slider)
			<div class="carousel-item" style="background-image: url('{{'img/sliders/'.$slider->imagen}}');">
				@if($slider->titulo!=''&&$slider->subtitulo!='')
				<div class="caption hide-on-small-only">
					<p>{!!$slider->titulo!!}</p>
					<h4>{!!$slider->subtitulo!!}</h4>
				</div>
				@endif
			</div>
			@endforeach
		</div>
		<main class="productos">
			<div class="container">
				<div class="row">
					<div class="col s12 center-align mt30 mb30">
						<h4 class="color">Productos Destacados</h4>
					</div>
					@foreach($productos as $producto)
					<div class="col l4">
						<a href="{{ url('catalogo/'.$producto->categoria->familia.'/'.$producto->categoria_id.'/'.$producto->id) }}">
							<div class="card">
								<div class="imagen">
										<img src="{{ asset('/img/imagenes/'.$producto->imagenes()->first()->imagen) }}">
									<div class="capa">
										<label>+</label>
									</div>
								</div>
								<div class="titulo">
									<p>{{$producto->nombre}}</p>
									<label>{{$producto->detalle}}</label>
								</div>
							</div>
						</a>
					</div>
					@endforeach
					<div class="clear"></div>
					<div class="col s12 m3 center-align pt30">
						<a href="{{ url('catalogo/1') }}">
							<button class="btn">MATERIAL SECO</button>
						</a>
					</div>
					<div class="col s12 m3 center-align pt30">
						<a href="{{ url('catalogo/2') }}">
							<button class="btn">PINTURERIA</button>
						</a>
					</div>
					<div class="col s12 m3 center-align pt30">
						<a href="{{ url('catalogo/3') }}">
							<button class="btn">ROPA DE TRABAJO</button>
						</a>
					</div>
					<div class="col s12 m3 center-align pt30">
						<a href="{{ url('catalogo/4') }}">
							<button class="btn">MELAMINAS Y TERCIADOS</button>
						</a>
					</div>
				</div>
			</div>
		</main>
		<section class="mercados">
			<div class="container">
				<div class="row nomargin">
					<div class="col s12 m6 pt30">
						<h4 class="color">{{$item->titulo}}</h4>
						{!!$item->texto!!}
					</div>
					<div class="col s12 m6 mercado center-align">
						<img src="{{ asset('/img/items/'.$item->imagen) }}" class="responsive-img">
					</div>
				</div>
			</div>
		</section>
@endsection