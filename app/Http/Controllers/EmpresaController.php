<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Texto;
use App\Slider;

class EmpresaController extends Controller
{
    function front()
    {
        $sliders = Slider::where('seccion',2)->orderBy('orden', 'asc')->get();
        $texto = Item::find(2);
        $texto1 = Texto::find(1);
        $texto2 = Texto::find(2);
        
        return view('empresa',compact('texto','texto1','texto2','sliders'));
    }

    function crearSlider()
    {
        $section = 2;

        return view('adm.empresa.slider.create',compact('section'));
    }

    function listarSliders()
    {
        $sliders = Slider::where('seccion',2)->get();

        return view('adm.empresa.slider.list',  compact('sliders'));
    }

    function editarSlider($id)
    {
        $slider = Slider::find($id);
        $section = 2;

        return view('adm.empresa.slider.edit', compact('slider', 'section'));
    }

    function editarItem($id)
    {
        $item = Item::find($id);
        return view('adm.empresa.item.edit', compact('item'));
    }

    function editarTexto($id)
    {
        $texto = Texto::find($id);
        return view('adm.empresa.texto.edit', compact('texto'));
    }
}
