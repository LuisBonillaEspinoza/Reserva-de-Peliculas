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
        Schema::create('detalleordenes', function (Blueprint $table) {
            $table->string('nombre_detalle');
            $table->string('precio_detalle');
            $table->string('cantidad_detalle');
            $table->string('bruto_detalle');
            $table->unsignedBigInteger('id_orden')->nullable();
            $table->unsignedBigInteger('id_pelicula');
            $table->timestamps();

            //Relacion entre la tabla orden-detalleorden
            $table->foreign('id_orden')->references('id')->on('ordenes');
            //Relacion entre la tabla pelicula-detalleorden
            $table->foreign('id_pelicula')->references('id')->on('peliculas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalleordenes');
    }
};
