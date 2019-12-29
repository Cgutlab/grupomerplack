@extends('layouts.front')

@section('title',$categoria->nombre)
 
@section('main')
		<main class="productos">
			<div class="container">
				<div class="row">
					<div class="col l3 hide-on-small-only">
						<ul class="menu-lateral">
							@foreach($categorias as $item)
							<li class="categoria">
								<a href="{{ url('catalogo/'.$categoria->familia.'/'.$item->id) }}">
									<p>{{$item->nombre}}</p>
								</a>
								@if($categoria->id==$item->id)
								<ul class="menu-productos">
									@foreach($item->productos()->get() as $producto)
									<li class="producto">
										<a href="{{ url('catalogo/'.$categoria->familia.'/'.$item->id.'/'.$producto->id) }}">
											<p>{{$producto->nombre}}</p>
										</a>
									</li>
									@endforeach
								</ul>
								@endif
							</li>
							@endforeach
						</ul>
					</div>
					<div class="col s12 l9">
						<div class="row">
							<div class="col s12 miga">
								<p><a class="capitalize" href="{{ url('catalogo/'.$categoria->familia) }}">{{strtoupper($titulo)}}</a> | <a href="{{ url('catalogo/'.$categoria->familia.'/'.$categoria->id) }}">{{ strtoupper($categoria->nombre)}}</a></p>
							</div>
							@foreach($categoria->productos()->get() as $item)
							@php
								$imagen = $item->imagenes()->orderBy('orden', 'asc')->first();
							@endphp
							<div class="col s12 l4">
								<a href="{{ url('catalogo/'.$categoria->familia.'/'.$categoria->id.'/'.$item->id) }}">
									<div class="card">
										<div class="imagen">
											<img src="{{ asset('/img/imagenes/'.$imagen->imagen) }}" class="responsive-img">
											<div class="capa">
												<label>+</label>
											</div>
										</div>
										<div class="titulo">
											<p>{{$item->nombre}}</p>
											<label>{{$item->detalle}}</label>
										</div>
									</div>
								</a>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</main>
@endsection