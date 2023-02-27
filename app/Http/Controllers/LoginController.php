<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\LoginRequest;
//Para validar
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->rol_user == 1){
            return redirect()->route('admin.index');
        }
        elseif(Auth::check() && Auth::user()->rol_user == 2){
            return redirect()->route('welcome.index');
        }
        return view('login.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LoginRequest $login)
    {
        $credenciales = $login->getCredentials();

        $credenciales['estado_user'] = 1;
        
        if(!Auth::validate($credenciales)){
            return redirect()->route('login.index')->with('error','Usuario o Contraseña incorrectas')->with('datos',$credenciales['password_user']);
        }

        $user = Auth::getProvider()->retrieveByCredentials($credenciales);
        Auth::login($user);

        if(Auth::user()->rol_user == 1){
            return $this->autenticaradmin($login,$user);
        }
        else{
            return $this->autenticaruser($login,$user);
        }
    }

    public function autenticaradmin(Request $request,$user){
        return redirect()->route('admin.index');
    }

    public function autenticaruser(Request $request,$user){
        return redirect()->route('welcome.index');
    }

    public function destroy() 
    {
        // $request->session()->invalidate();
        // $request->session()->regenerate();
        Session::flush();
        Auth::logout();
        return redirect()->route('login.index');
    }
}
