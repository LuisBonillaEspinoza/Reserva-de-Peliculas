<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
//Para validar
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    //
    public function index(){
        if(Auth::check() && Auth::user()->rol_user == 1){
            return redirect()->route('admin.index');
        }
        elseif(Auth::check() && Auth::user()->rol_user == 2){
            return redirect()->route('welcome.index');
        }
        return view('login.registro');
    }

    public function store(RegistroRequest $request){
        $datos = $request->validated();

        $registro = new User;
        $registro->name_user = $datos['name_user'];
        $registro->apema_user = $datos['apema_user'];
        $registro->apepa_user = $datos['apepa_user'];
        $registro->username_user = $datos['username_user'];
        $registro->telefono_user = $datos['telefono_user'];
        $registro->direccion_user = $datos['direccion_user'];
        $registro->estado_user = '1';
        $registro->rol_user = '2';
        $registro->email_user = $datos['email_user'];
        $registro->password_user = \bcrypt($datos['password_user']);

        $registro->save();

        return redirect()->route('registro.index')->with('success','Registro Correcto');
    }
}
