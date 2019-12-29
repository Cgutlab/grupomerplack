@extends('layouts.front')

@section('title','Sucursales')
 
@section('main')
        <main class="sucursales">
            <div class="container">
                <div class="cabecera row mb50">
                    <div class="col s12">
                        <h1>Sucursales</h1>
                        <div class="subrayado"></div>
                    </div>
                </div>
                <div class="row">
                	<div class="col s12 m4">
                		<h5 class="color">{{$texto1->titulo}}</h5>
                		<div class="subrayado"></div>
                		{!!$texto1->texto!!}
                	</div>
                	<div class="col s12 m4">
                		<h5 class="color">{{$texto2->titulo}}</h5>
                		<div class="subrayado"></div>
                		{!!$texto2->texto!!}
                	</div>
                    <div class="col s12 m4">
                        <h5 class="color">{{$texto3->titulo}}</h5>
                        <div class="subrayado"></div>
                        {!!$texto3->texto!!}
                    </div>
                    <div class="clear"></div>
                    <div class="col s12 m4">
                        {!!$mapa1->dato!!}
                    </div>
                    <div class="col s12 m4">
                        {!!$mapa2->dato!!}
                    </div>
                    <div class="col s12 m4">
                        {!!$mapa3->dato!!}
                    </div>
                </div>
            </div>
        </main>
@endsection