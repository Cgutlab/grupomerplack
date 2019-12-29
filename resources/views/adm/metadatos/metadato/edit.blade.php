@extends('layouts.back')

@section('title','Crear metadato')
 
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

						{{Form::model($metadato, ['route' => ['metadato.update', $metadato->id], 'method'=>'PUT', 'files' => true]) }}
							<div class="row">
								<div class="input-field col s12">
									{!!Form::label('Keywords')!!}
									{!!Form::text('keyword',null,['class'=>'validate', 'required'])!!}
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									{!!Form::label('Description')!!}
									{!!Form::textarea('description',null,['class'=>'validate materialize-textarea', 'required'])!!}
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
@endsection