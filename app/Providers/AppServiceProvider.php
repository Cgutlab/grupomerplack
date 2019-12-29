<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Social;
use App\Logo;
use App\Contacto;
use App\Marca;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $redes = Social::all();
        $principal = Logo::find(1);
        $footer = Logo::find(2);
        $favicon = Logo::find(3);
        $direccion = Contacto::find(1);
        $telefono = Contacto::find(2);
        $email = Contacto::find(3);
        $horario = Contacto::find(5);
        $marcas = Marca::all();

        return view()->share(compact('horario','direccion', 'telefono', 'marcas', 'email','redes', 'principal', 'footer', 'favicon'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
