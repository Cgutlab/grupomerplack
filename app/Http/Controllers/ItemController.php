<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Redirect;

class ItemController extends Controller
{
    public function update(Request $request, Item $item)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'items', $item->id);
        $file_save ? $datos['imagen'] = $file_save : false;

        $item->fill($datos);
        $item->save();
        $success = 'Texto editado correctamente';
        return back()->with('success', $success);
    }
}
