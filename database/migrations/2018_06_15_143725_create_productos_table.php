<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id');
            $table->text('nombre');
            $table->text('detalles');
            $table->text('imagen')->nullable();
            $table->text('medidas');
            $table->text('colores');
            $table->string('unidades', 20);
            $table->string('codigo', 20);
            $table->string('video', 20);
            $table->string('orden',4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
