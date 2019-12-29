@extends('layouts.back')

@section('title','Editar servicios')
 
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
						<table class="highlight bordered">
							<thead>
								<td>Imagen</td>
								<td class="text-right">Acciones</td>
							</thead>
							<tbody>
								@foreach($servicios as $servicio)
								<tr>
									<td>
										<img class="miniatura" src="{{ asset("img/servicios/".$servicio->imagen) }}" >
									</td>
									<td class="text-right">
										<a href="{{ url('adm/servicios/servicio/edit/'.$servicio->id) }}"><i class="material-icons">create</i></a>
										{!!Form::open(['class'=>'en-linea', 'route'=>['servicio.destroy', $servicio->id], 'method' => 'DELETE'])!!}
											<button type="submit" class="submit-button">
												<i class="material-icons red-text">cancel</i>
											</button>
										{!!Form::close()!!}
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>            
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