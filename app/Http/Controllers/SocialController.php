<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;
use App\Extensions\Helpers;
use Redirect;

class SocialController extends Controller
{
    function crearSocial()
    {
        return view('adm.redes.social.create');
    }

    function listarSocials()
    {
        $socials = Social::all();

        return view('adm.redes.social.list',  compact('socials'));
    }

    function editarSocial($id)
    {
        $social = Social::find($id);

        return view('adm.redes.social.edit', compact('social', 'section'));
    }

    public function store(Request $request)
    {
        $datos = $request->all();

        $social = Social::create($datos);

        $file_save = Helpers::saveImage($request->file('imagen'), 'redes', $social->id);
        $file_save ? $social->imagen = $file_save : false;

        $social->save();
        
        $success = 'Red social creada correctamente';

        return back()->with('success', $success);
    }

    public function update(Request $request, Social $social)
    {
        $datos = $request->all();

        $file_save = Helpers::saveImage($request->file('imagen'), 'redes', $social->id);
        $file_save ? $datos['imagen'] = $file_save : false;

        $social->fill($datos);
        $social->save();
        $success = 'Red social editada correctamente';
        return back()->with('success', $success);
    }

    public function destroy(Social $social)
    {
        $social->delete();
        $success = 'Red social eliminada correctamente';
        return back()->with('success', $success);
    }
}
