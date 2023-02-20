<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_pelicula');
            $table->double('precio_pelicula');
            $table->string('descripcion_pelicula');
            $table->string('path_pelicula')->comment('Ruta de Guardado de la Imagen');
            $table->string('imagen_pelicula')->comment('Nombre de la Imagen');
            $table->unsignedBigInteger('estado_pelicula');
            $table->unsignedBigInteger('estreno_pelicula');
            $table->unsignedBigInteger('categoria_pelicula');
            $table->timestamps();

            //Relacion entre la tabla peliculas-categoria
            $table->foreign('categoria_pelicula')->references('id')->on('categorias');
            //Relacion entre la tabla pelicula-estado
            $table->foreign('estado_pelicula')->references('id')->on('estadospeliculas');
            //Relacion entre la tabla pelicula-estreno
            $table->foreign('estreno_pelicula')->references('id')->on('estrenos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
