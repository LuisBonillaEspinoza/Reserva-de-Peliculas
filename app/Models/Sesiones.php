<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Sesiones extends Model
{
    use HasFactory;


    protected $fillable = ['id','user_id','ip_adress','payload','last_activity'];

    protected $table = 'sessions';

    public function usuario(){
        return $this->belongsTo(User::class,'id');
    }
}
