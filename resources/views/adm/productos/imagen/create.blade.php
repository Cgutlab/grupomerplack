@extends('layouts.back')

@section('title','Agregar imagen')
 
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

						{!!Form::open(['route'=>'imagen.store', 'method'=>'POST', 'files' => true])!!}
							<div class="row">
								<div class="input-field file-field col s6">
									<div class="btn">
									    <span>Imagen</span>
									    {!! Form::file('imagen') !!}
									</div>
									<div class="file-path-wrapper">
									    {!! Form::text('',null, ['class'=>'file-path validate']) !!}
									</div>
								</div>
								<div class="input-field col s6">
									{!!Form::label('Orden')!!}
									{!!Form::text('orden',null,['class'=>'validate', 'required'])!!}
								</div>
							</div>
							
							<div class="row">
								<div class="col s12">
									<a href="{{ url('adm/productos/imagen/edit/'.$producto) }}">
										<button type="button" class="waves-effect waves-light btn left">Listar imagenes</button>
									</a>
									{!!Form::submit('Crear', ['class'=>'waves-effect waves-light btn right'])!!}
								</div>
							</div>
							{!!Form::hidden('producto_id',$producto)!!}
						{!!Form::close()!!}         
					</div>
				</div>
			</div>
		</main>
@endsection