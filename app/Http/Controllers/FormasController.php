<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Texto;
use App\Item;

class FormasController extends Controller
{
    function front()
    {
        $item = Item::find(3);
        $texto = Texto::find(7);
        
        return view('formas',compact('texto','item'));
    }

    function editarTexto($id)
    {
        $texto = Texto::find($id);
        return view('adm.formas.texto.edit', compact('texto'));
    }

    function editarItem($id)
    {
        $item = Item::find($id);
        return view('adm.formas.item.edit', compact('item'));
    }
}
