@extends('layouts.front')

@section('title','Revendedores')
 
@section('main')
        <main class="revendedores">
            <div class="container">
                <div class="row">
                	<div class="col s12 m6">
                		<h5 class="color"><i class="fa fa-share-alt" aria-hidden="true"></i> {{$texto->titulo}}</h5>
                		<div class="subrayado"></div>
                		{!! $texto->texto !!}
                	</div>
                	<div class="col s12 m6">
                		<div class="row">
                			<br><br><br>
                			{!!Form::open(['route'=>'registrar.revendedor', 'method'=>'POST'])!!}
                				<div class="col s12 m6 input-field">
                					{!!Form::label('Nombre')!!}
									{!!Form::text('nombre',null,['class'=>'validate', 'required'])!!}
                				</div>
                				<div class="col s12 m6 input-field">
                					{!!Form::label('Telefono')!!}
									{!!Form::text('telefono',null,['class'=>'validate', 'required'])!!}
                				</div>
                				<div class="col s12 m6 input-field">
                					{!!Form::label('Empresa')!!}
									{!!Form::text('empresa',null,['class'=>'validate', 'required'])!!}
                				</div>
                				<div class="col s12 m6 input-field">
                					{!!Form::label('E-mail')!!}
									{!!Form::text('email',null,['class'=>'validate', 'required'])!!}
                				</div>
                				<div class="col s12 m7 input-field">
                					<div class="g-recaptcha" data-sitekey="6Le4WT4UAAAAAMsSrRvyvdMGIEyHIXLmuf9EFYPl"></div>
                				</div>
                				<div class="col s12 m5">
                					<input type="checkbox" id="aceptar" required>
                    				<label for="aceptar">Acepto los términos y condiciones de privacidad</label>
                				</div>
                				<div class="col s12 input-field">
                					<button class="waves-effect waves-light btn">ENVIAR</button>
								</div>
                			{!!Form::close()!!}  
                		</div>
                	</div>
                </div>
            </div>
        </main>
@endsection