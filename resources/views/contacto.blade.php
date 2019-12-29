@extends('layouts.front')

@section('title','Contacto')
 
@section('main')
        <main id="contacto">
            <div class="container">
                <div class="cabecera row">
                    <div class="col s12">
                        <h1>Contacto</h1>
                        <div class="subrayado"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" required>
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" required>
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" required>
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="empresa">Empresa</label>
                        <input type="text" name="empresa" required>
                    </div>
                    <div class="col s12 m6 input-field">
                        <label for="mensaje">Mensaje</label>
                        <textarea name="mensaje" rows="7" class="materialize-textarea" required></textarea>
                    </div>
                    <div class="col s12 m6">
                        <div class="g-recaptcha" data-sitekey="6Le4WT4UAAAAAMsSrRvyvdMGIEyHIXLmuf9EFYPl"></div>
                        <input type="checkbox" name="aceptar" id="aceptar" required>
                        <label for="aceptar">Acepto los términos y condiciones de privacidad</label>
                    </div>
                    <div class="col s12">
                        <button class="right">ENVIAR</button>
                    </div>
                </div>
            </div>
        </main>
@endsection