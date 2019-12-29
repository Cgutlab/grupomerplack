@extends('layouts.front')

@section('title','Empresa')
 
@section('main')
        <div class="carousel carousel-slider" data-indicators="true">
            @foreach($sliders as $slider)
            <div class="carousel-item" style="background-image: url('{{'img/sliders/'.$slider->imagen}}');">
                @if($slider->titulo!=''&&$slider->subtitulo!='')
                <div class="caption hide-on-small-only">
                    {!!$slider->titulo!!}
                    {!!$slider->subtitulo!!}
                </div>
                @endif
            </div>
            @endforeach
        </div>
        <main class="empresa">
            <div class="container">
                <div class="row">
                    <div class="col l6">
                        <h4>{{ $texto->titulo }}</h4>
                        <div class="subrayado"></div>
                        {!! $texto->texto !!}
                    </div>
                    <div class="col l6">
                        <img class="responsive-img" src="{{'img/items/'.$texto->imagen}}">
                    </div>
                    
                </div>
            </div>
        </main>
@endsection