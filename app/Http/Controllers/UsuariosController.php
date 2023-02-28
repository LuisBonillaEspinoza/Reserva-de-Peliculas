<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Rol;
use App\Http\Requests\UserRequest;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->rol_user == 2){
            return view('user.welcome');
        }
        else if(!Auth::check()){
            return view('user.welcome');
        }
        return view('administrador.usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rol = Rol::all();
        return view('administrador.usuarios.create',compact('rol'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $datos = $request->validated();

        $registro = new User;
        $registro->name_user = $datos['name_user'];
        $registro->apema_user = $datos['apema_user'];
        $registro->apepa_user = $datos['apepa_user'];
        $registro->username_user = $datos['username_user'];
        $registro->telefono_user = $datos['telefono_user'];
        $registro->direccion_user = $datos['direccion_user'];
        $registro->estado_user = '1';
        $registro->rol_user = $datos['rol_usuario'];
        $registro->email_user = $datos['email_user'];
        $registro->password_user = \bcrypt($datos['password_user']);

        $registro->save();

        return redirect()->route('usuarios.create')->with('success','Registro Correcto');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuarios)
    {
        $rol = Rol::all();
        return view('administrador.usuarios.edit',compact('rol','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request,$id_usuario)
    {
        $rol = Rol::all();

        $usuarios = User::find($id_usuario);

        $datos = $request->validated();

        $usuarios->name_user = $datos['name_user'];
        $usuarios->apema_user = $datos['apema_user'];
        $usuarios->apepa_user = $datos['apepa_user'];
        $usuarios->username_user = $datos['username_user'];
        $usuarios->telefono_user = $datos['telefono_user'];
        $usuarios->direccion_user = $datos['direccion_user'];
        $usuarios->estado_user = '1';
        $usuarios->rol_user = $datos['rol_usuario'];
        $usuarios->email_user = $datos['email_user'];
        $usuarios->password_user = \bcrypt($datos['password_user']);

        $usuarios->save();

        return redirect()->route('usuarios.edit',compact('usuarios','rol'))->with('success','Modificacion Correcta');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        //
    }

    public function estado(User $usuarios,$id_usuario){

        $usuarios = User::find($id_usuario);

        if ($usuarios->estado_user == '1') {
            $usuarios->estado_user = '2';
        }
        else{
            $usuarios->estado_user = '1';
        }

        $usuarios->save();

        return redirect()->route('usuarios.index');
    }
}
