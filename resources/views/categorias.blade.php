@extends('layouts.front')

@section('title',$titulo)
 
@section('main')
		<main class="productos">
			<div class="container">
				<div class="cabecera row">
					<div class="col s12">
						<h1>{{$titulo}}</h1>
						<div class="subrayado"></div>
					</div>
				</div>
				<div class="row">
					@foreach($categorias as $categoria)
					<div class="col l4 margen-sup">
						<a href="{{ url('catalogo/'.$categoria->familia.'/'.$categoria->id) }}">
							<div class="card">
								<div class="imagen">
									<img src="{{ asset('/img/categorias/'.$categoria->imagen) }}" class="responsive-img">
									<div class="capa">
										<label>+</label>
									</div>
								</div>
								<div class="titulo">
									<p>{{$categoria->nombre}}</p>
								</div>
							</div>
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</main>
@endsection