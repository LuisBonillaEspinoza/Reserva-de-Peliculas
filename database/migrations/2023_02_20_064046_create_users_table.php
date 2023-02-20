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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name_user');
            $table->string('apema_user');
            $table->string('apepa_user');
            $table->string('username_user')->unique();
            $table->string('telefono_user');
            $table->string('direccion_user');
            $table->unsignedBigInteger('estado_user');
            $table->unsignedBigInteger('rol_user');
            $table->string('email_user')->unique();
            $table->string('puntos_user')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password_user');
            $table->rememberToken();
            $table->timestamps();

            //Relacion entre la tabla usuario-roles
            $table->foreign('rol_user')->references('id')->on('roles');
            //Relacion entre la tabla usuario-estados
            $table->foreign('estado_user')->references('id')->on('estadosusuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
