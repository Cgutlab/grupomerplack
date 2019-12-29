<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Producto;
use Illuminate\Support\Facades\Mail;
use App\Mail\Pedido;

class SolicitudController extends Controller
{
    function send()
    {
        /*$cliente = Cliente::find(session('cliente'));
        $nombre = $cliente->nombre;
        $empresa = $cliente->empresa;
        $email = $cliente->mail;
        Mail::to('ventas@amplas.com.ar')->send(new Pedido($nombre, $empresa, $email));

        if (count(Mail::failures()) > 0)
        {
            $success = 'Ha ocurrido un error al enviar el correo';
        }
        else
        {

          $success = 'Correo enviado correctamente';
        }*/
        $success = 'Solicitud enviada correctamente';
        Cart::destroy();
        return redirect('solicitud')->with('success');
    }

    function add($id)
    {
        $producto = Producto::find($id);

        if(isset($producto))
        {
            Cart::add(['id' => $producto->id, 'name' => $producto->nombre, 'price' => '1', 'qty' => '1', 'options' => ['imagen' => $producto->imagenes()->orderBy('orden', 'asc')->first()->imagen]]);
            return redirect('solicitud');
        }
        else
        {
            return back();
        }
    }

    public function delete($id)
    {
        Cart::remove($id);
        return back();
    }
}
