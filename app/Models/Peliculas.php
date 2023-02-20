<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_pelicula','precio_pelicula','descripcion_pelicula','path_pelicula','imagen_pelicula',
                           'estado_pelicula','estreno_pelicula','categoria_pelicula'];

    protected $table = 'peliculas';
}
