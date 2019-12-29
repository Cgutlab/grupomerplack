@extends('layouts.back')

@section('title','Editar metadatos')
 
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
								<td>Sección</td>
								<td class="text-right">Editar</td>
							</thead>
							<tbody>
								@foreach($metadatos as $metadato)
								<tr>
									<td>
										{{ $metadato->seccion }}
									</td>
									<td class="text-right">
										<a href="{{ url('adm/metadatos/metadato/edit/'.$metadato->id) }}"><i class="material-icons">create</i></a>
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