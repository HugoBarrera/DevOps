<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProyectosCatalogos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() /** Primero se deben crear aquellas tablas que no tienen Relación */
    {
        Schema::create('tipo_proyecto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });

        Schema::create('estatus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });

        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion', 1000); /*1000 hace referencia a la longitud del campo*/
            $table->string('slug')->nullable();
            $table->unsignedInteger('proyecto_id'); /** Paso 1 para llave foranea */
            $table->foreign('proyecto_id')->references('id')->on('tipo_proyecto'); /** Paso 2: Crea y Asocia la columna con una relacion */
            $table->unsignedInteger('estatus_id');
            $table->foreign('estatus_id')->references('id')->on('estatus');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() /* Primero se deben eliminar aquellas tablas que cuentan con Relacioón */
    {
        Schema::dropIfExists('proyectos');
        Schema::dropIfExists('estatus');
        Schema::dropIfExists('tipo_proyecto');
    }
}
