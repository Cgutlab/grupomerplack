<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Redirect;

class SliderController extends Controller
{
    public function store(Request $request)
    {
        $datos = $request->all();

        $slider = Slider::create($datos);

        $file_save = Helpers::saveImage($request->file('imagen'), 'sliders', $slider->id);
        $file_save ? $slider->imagen = $file_save : false;

        $slider->save();
        $success = 'Slider creado correctamente';

        return back()->with('success', $success);
    }

    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $slider = Slider::find($id);

        $file_save = Helpers::saveImage($request->file('imagen'), 'sliders',$slider->id);
        $file_save ? $datos['imagen'] = $file_save : false;

        $slider->fill($datos);
        $slider->save();
        $success = 'Slider editado correctamente';
        return back()->with('success', $success);
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        $success = 'Slider eliminado correctamente';
        return back()->with('success', $success);
    }
}
