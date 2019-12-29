@extends('layouts.front')

@section('title','Atención a Empresas')
 
@section('main')
        <main class="atencion">
            <div class="container">
                <div class="row">
                	<div class="col s12 m4">
                		<h5 class="color"><i class="fa fa-user" aria-hidden="true"></i> {{$texto->titulo}}</h5>
                		<div class="subrayado"></div>
                	</div>
                	<div class="col s12">
                		{!! $texto->texto !!}
                	</div>
                	@foreach($iconos as $icono)
                	<div class="icono-atencion">
                		<div class="card">
                			<div class="icono">
                				<img src="{{ asset('img/iconos/'.$icono->imagen) }}" class="responsive-img">
                			</div>
                			<div class="texto">
                				{!! $icono->texto !!}
                			</div>
                		</div>
                	</div>
                	@endforeach
                </div>
            </div>
        </main>
        <section class="asesoramiento">
        	<div class="container">
        		<div class="row sinmargen">
        			<div class="col m6 offset-m3 s12">
        				<div class="row">
        					<div class="col s12 center-align">
        						<h5 class="color">¿Necesitás Asesoramiento?</h5>
				        		<p>Completá el siguiente formulario y nos contactaremos a la brevedad</p>
        					</div>
        					{!! Form::open(['route'=>'fomulario.asesoramiento', 'method'=>'POST']) !!}
        					<div class="col s12 input-field">
                					{!!Form::label('Nombre')!!}
									{!!Form::text('nombre',null,['class'=>'validate', 'required'])!!}
                				</div>                				
                				<div class="col s12 input-field">
                					{!!Form::label('E-mail')!!}
									{!!Form::text('email',null,['class'=>'validate', 'required'])!!}
								</div>
								<div class="col s12 input-field">
                					{!!Form::label('Empresa')!!}
									{!!Form::text('empresa',null,['class'=>'validate', 'required'])!!}
                				</div>
                				<div class="col s12 input-field">
                					{!!Form::label('Mensaje')!!}
									{!!Form::textarea('mensaje',null,['class'=>'validate materialize-textarea', 'required'])!!}
                				</div>
                				<div class="col s12 m7">
                					<div class="g-recaptcha" data-sitekey="6Le4WT4UAAAAAMsSrRvyvdMGIEyHIXLmuf9EFYPl"></div>
                				</div>
                				<div class="col s12 m5">
                					<input type="checkbox" name="aceptar" id="aceptar">
                					<label for="aceptar">Acepto los términos y condiciones de privacidad</label>
                				</div>
                				<div class="col s12 center-align">
                					<br>
                					<button type="submit" class="btn">
                						ENVIAR
                					</button>
                				</div>
        					{!! Form::close() !!}
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
@endsection