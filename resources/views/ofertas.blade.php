@extends('layouts.front')

@section('title','Ofertas')
 
@section('main')
		<main class="productos">
			<div class="container">
				<div class="cabecera row">
					<div class="col s12">
						<h1>Ofertas</h1>
						<div class="subrayado"></div>
					</div>
				</div>
				<div class="row">
					@foreach($productos as $producto)
					<div class="col l4 margen-sup">
						<a href="{{ url('catalogo/'.$producto->categoria->familia.'/'.$producto->categoria_id.'/'.$producto->id) }}">
							<div class="card">
								<div class="imagen">
									<img src="{{ asset('/img/imagenes/'.$producto->imagenes()->get()->first()->imagen) }}" class="responsive-img">
									<div class="capa">
										<label>+</label>
									</div>
									<div class="etiqueta @if($producto->oferta=='¡Descuento!') rojo @else verde @endif ">
										{{$producto->oferta}}
									</div>
								</div>
								<div class="titulo">
									<p>{{$producto->nombre}}</p>
								</div>
							</div>
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</main>
@endsection