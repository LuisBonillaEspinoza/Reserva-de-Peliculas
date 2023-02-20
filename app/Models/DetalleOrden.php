<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_detalle','precio_detalle','cantidad_detalle','bruto_detalle','id_pelicula'];
    
    protected $table = 'detalleordenes';
}
