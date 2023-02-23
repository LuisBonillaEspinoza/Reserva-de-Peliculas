<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peliculas;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_categoria'];

    protected $table = 'categorias';
    
    //Relaciones uno a muchos
    public function peliculas(){
        return $this->hasMany(Peliculas::class,'id');
    }
}
