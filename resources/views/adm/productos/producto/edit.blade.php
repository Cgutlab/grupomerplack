@extends('layouts.back')

@section('title','Editar producto')
 
@section('main')
		<main>
			<div class="container">
				
				@if(count($errors) > 0)
				<div class="col s12 card-panel red lighten-4 red-text text-darken-4">
			  		<ul>
			  			@foreach($errors->all() as $error)
			  				<li>{!!$error!!}</li>
			  			@endforeach
			  		</ul>
			  	</div>
				@endif

				@if(session('success'))
				<div class="col s12 card-panel green lighten-4 green-text text-darken-4">
					{{ session('success') }}
				</div>
				@endif

				<div class="row">
					<div class="col s12">

						{{Form::model($producto, ['route' => ['producto.update', $producto->id], 'method'=>'PUT', 'files' => true]) }}
							<div class="row">
								<div class="input-field col s6">
									{!! Form::select('categoria_id', $categorias, $producto->categoria_id, ['class' => 'form-control']) !!}
								</div>
								<div class="input-field col s6">
									{!!Form::label('Nombre')!!}
									{!!Form::text('nombre',null,['class'=>'validate', 'required'])!!}
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									{!! Form::select('marca_id', $marcas, $producto->marca_id, ['class' => 'form-control']) !!}
								</div>
								<div class="input-field col s6">
									{!!Form::label('Codigo')!!}
									{!!Form::text('codigo',null,['class'=>'validate'])!!}
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
						          	{!!Form::label('Descripcion')!!}
									{!!Form::textarea('descripcion',null,['class'=>'validate materialize-textarea'])!!}
						        </div>
							</div>
							<div class="row">
								<div class="file-field input-field col s6">
									<div class="btn">
									    <span>Ficha</span>
									    {!! Form::file('ficha') !!}
									</div>
									<div class="file-path-wrapper">
									    {!! Form::text('',null, ['class'=>'file-path validate']) !!}
									</div>
								</div>
								<div class="file-field input-field col s6">
									<div class="btn">
									    <span>Imagen</span>
									    {!! Form::file('imagen') !!}
									</div>
									<div class="file-path-wrapper">
									    {!! Form::text('',null, ['class'=>'file-path validate']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									{!!Form::label('Enlace de Mercado Libre')!!}
									{!!Form::text('libre',null,['class'=>''])!!}
								</div>
								<div class="input-field col s6">
									{!!Form::label('Keyword')!!}
									{!!Form::text('keyword',null,['class'=>'validate'])!!}
								</div>
							</div>
							<div class="row">
								<div class="input-field col s6">
									{!! Form::select('destacado', [''=>'Producto destacado', '1'=>'Si'], null, ['class' => 'form-control']) !!}
								</div>
								<div class="input-field col s6">
									{!! Form::select('oferta', [''=>'¿Oferta?', '¡Descuento!'=>'¡Descuento!', '¡Oportunidad!'=>'¡Oportunidad!'], $producto->oferta, ['class' => 'form-control']) !!}
								</div>
							</div>							
							<div class="row">
								<div class="col s12">
									{!!Form::submit('Editar', ['class'=>'waves-effect waves-light btn right'])!!}
								</div>
							</div>
						{{Form::close()}}      
					</div>
				</div>
			</div>
		</main>
@endsection