@extends('layouts.back')

@section('title','Editar categoria')
 
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

						{{Form::model($categoria, ['route' => ['categoria.update', $categoria->id], 'method'=>'PUT', 'files' => true]) }}
							<div class="row">
								<div class="input-field col s6">
									{!!Form::label('Nombre')!!}
									{!!Form::text('nombre',null,['class'=>'validate', 'required'])!!}
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
									{!!Form::label('Orden')!!}
									{!!Form::text('orden',null,['class'=>'validate', 'required'])!!}
								</div>
								{!!Form::hidden('familia',$familia)!!}
								<div class="col s6">
									{!!Form::submit('Editar', ['class'=>'waves-effect waves-light btn right'])!!}
								</div>
							</div>
						{{Form::close()}}      
					</div>
				</div>
			</div>
		</main>
@endsection