<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Peliculas extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_pelicula','precio_pelicula','descripcion_pelicula','path_pelicula','imagen_pelicula',
                           'estado_pelicula','estreno_pelicula','categoria_pelicula'];

    protected $table = 'peliculas';

    public function estreno(){
        if($this->estreno_pelicula == 1){
            return 'Si';
        }
        return 'No';
    }

    //Relaciones uno a muchos
    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_pelicula');
    }
}
