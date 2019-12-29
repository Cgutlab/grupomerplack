@extends('layouts.back')

@section('title','Editar contacto')
 
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

						{{Form::model($contacto, ['route' => ['contacto.update', $contacto->id], 'method'=>'PUT', 'files' => true]) }}
							<div class="row">
								<div class="file-field input-field col s12">
									<div class="row">
								<div class="input-field col s12">
									{!!Form::label('Dato')!!}
									{!!Form::textarea('dato',null,['class'=>'validate materialize-textarea', 'required', 'rows'=>'4'])!!}
								</div>
							</div>
								</div>
							</div>
							<div class="col s12 no-padding">
								{!!Form::hidden('seccion',null,['class'=>'validate', 'required'])!!}
								{!!Form::submit('Actualizar', ['class'=>'waves-effect waves-light btn right'])!!}
							</div>
						{{Form::close()}}      
					</div>
				</div>
			</div>
		</main>
		<script>
			CKEDITOR.replace('titulo');
			CKEDITOR.replace('subtitulo');
			CKEDITOR.config.width = '100%';
		</script>
@endsection