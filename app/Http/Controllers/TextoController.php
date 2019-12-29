<?php

namespace App\Http\Controllers;

use App\Texto;
use Illuminate\Http\Request;

class TextoController extends Controller
{
    public function update(Request $request, Texto $texto)
    {
        $datos = $request->all();

        $texto->fill($datos);
        $texto->save();
        $success = 'Texto editado correctamente';
        return back()->with('success', $success);
    }
}
