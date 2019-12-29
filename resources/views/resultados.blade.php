@extends('layouts.front')

@section('title','Resultados')
 
@section('main')
		<main class="productos">
			<div class="container">
				<div class="row">
					<div class="col s12 titulo">
						@if(isset($busqueda))
						<h4>RESULTADOS DE "{{ $busqueda }}"</h4>
						@else
						<h4>BÙSQUEDA</h4>
						@endif
						<div class="subrayado"></div>
					</div>
					<div class="col s12 m4 offset-m4">
						{!!Form::open(['route'=>'search', 'method'=>'POST', 'files' => true])!!}
							{!!Form::text('buscar',null,['class'=>'validate', 'required', 'placeholder'=>'Nombre de producto'])!!}
							{!!Form::submit('BUSCAR', ['class'=>''])!!}
						{!!Form::close()!!}
					</div>
					@isset($productos)
					<div class="col s12">
						<div class="row">
							@foreach($productos as $producto)
							@php
								$imagen = $producto->imagenes()->first();
							@endphp
							<div class="col l4">
								<a href="{{ url('catalogo/'.$producto->categoria->id.'/'.$producto->id) }}">
									<div class="card">
										<div class="imagen">
												<img src="{{ asset('/img/imagenes/'.$imagen->imagen) }}">
											<div class="capa">
												<label>+</label>
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
					@endisset
				</div>
			</div>
		</main>
@endsection