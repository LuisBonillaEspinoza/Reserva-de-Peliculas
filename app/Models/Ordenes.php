<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    use HasFactory;

    protected $fillable = ['neto_ordenes','id_usuario'];

    protected $table = 'ordenes';
}
