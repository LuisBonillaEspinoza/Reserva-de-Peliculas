<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Rol extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_rol'];

    protected $table = 'roles';

    public function ususarios(){
        return $this->hasMany(User::class,'id');
    }
}
