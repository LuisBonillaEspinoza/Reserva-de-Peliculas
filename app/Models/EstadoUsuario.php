<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class EstadoUsuario extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_estado'];

    protected $table = 'estadosusuarios';

    public function ususarios(){
        return $this->hasMany(User::class,'id');
    }
}
