<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Sesiones;
use App\Models\Rol;
use App\Models\EstadoUsuario;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_user',
        'apema_user',
        'apepa_user',
        'username_user',
        'telefono_user',
        'direccion_user',
        'estado_user',
        'rol_user',
        'puntos_user',
        'email_user',
        'password_user',
    ];

    public function sesiones(){
        return $this->hasMany(Sesiones::class,'user_id');
    }

    public function roles(){
        return $this->belongsTo(Rol::class,'rol_user');
    }

    public function estados(){
        return $this->belongsTo(EstadoUsuario::class,'estado_user');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password_user',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Hash the password
    public function setPasswordAttribute($value){
        $this->attributes['password_user'] = \bcrypt($value);
    }
}
