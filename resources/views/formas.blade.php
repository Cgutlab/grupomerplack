@extends('layouts.front')

@section('title','Formas de envio')
 
@section('main')
        <main class="formas">
            <div class="container">
                <div class="row">
                	<div class="row">
                	<div class="col s12 m4">
                		<h5 class="color"><i class="fa fa-user" aria-hidden="true"></i> {{$texto->titulo}}</h5>
                		<div class="subrayado"></div>
                	</div>
                	<div class="col s12">
                		{!! $texto->texto !!}
                	</div>
                	<div class="col s12 m8 offset-m2 argentina">
                		<div class="row">
                			<div class="col s12 m6">
                				<img src="{{ asset('img/items/'.$item->imagen) }}">
                			</div>
                			<div class="col s12 m6">
                				{!! $item->texto !!}
                			</div>
                		</div>
                	</div>
                </div>
                </div>
            </div>
        </main>
@endsection