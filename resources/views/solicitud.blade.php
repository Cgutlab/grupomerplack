@extends('layouts.front')

@section('title','Solicitud de Presupuesto')

@section('main')
		<main>
			<div class="container solicitud">
				<div class="cabecera row">
					<div class="col s12">
						<h1>Solicitud de Presupuesto</h1>
						<div class="subrayado"></div>
					</div>
				</div>
				<div class="row">
					@if(isset($success))
					<div class="col s12 m6 offset-m3 card-panel green lighten-4 green-text text-darken-4 center-align">
						<p>{{ $success }}</p>
					</div>
					<div class="col s12 center-align">
						<a href="{{ url('catalogo/1') }}">
							<button class="btn">MATERIAL SECO</button>
						</a>
						<a href="{{ url('catalogo/2') }}">
							<button class="btn">PINTURAS</button>
						</a>
					</div>
					@else
						@if(Cart::count() > 0)
						<div class="col s12">
							<table class="responsive-table">
								<thead>
									<tr>
										<th>Imagen</th>
										<th>Producto</th>
										<th>Quitar</th>
									</tr>
								</thead>
								<tbody>
									@foreach(Cart::content()  as $row)
									<tr>
										<td><img class="foto" src="{{ asset('img/imagenes/'.$row->options->imagen) }}"></td>
										<td>{{ $row->name }}</td>
										<td class="center-align">
											<a href="{{ url('solicitud/delete/'.$row->rowId) }}">
												<i class="material-icons">cancel</i>
											</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="col s6">
							<a href="{{ url('catalogo') }}"><button class="btn">SEGUIR COMPRANDO</button></a>
						</div>
						<div class="col s6">
							<a href="{{ url('solicitud/enviar') }}"><button class="btn right">ENVIAR PEDIDO</button></a>
						</div>
						@else
						<div class="col s12 center-align mb30">
							<h4 class="color">Agregar Productos</h4>
						</div>
						<div class="col s12 center-align">
							<a href="{{ url('catalogo/1') }}">
								<button class="btn">MATERIAL SECO</button>
							</a>
							<a href="{{ url('catalogo/2') }}">
								<button class="btn">PINTURERIA</button>
							</a>
							<a href="{{ url('catalogo/3') }}">
								<button class="btn">ROPA DE TRABAJO</button>
							</a>
							<a href="{{ url('catalogo/4') }}">
								<button class="btn">MELAMINAS Y TERCIADOS</button>
							</a>
						</div>
						@endif
					@endif
				</div>
			</div>
		</main>
@endsection