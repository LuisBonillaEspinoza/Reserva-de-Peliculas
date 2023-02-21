<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
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
        if(Auth::check()){
            return redirect()->route('admin.index');
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

        if(!Auth::validate($credenciales)){
            return redirect()->route('login.index')->with('error','Usuario o Contraseña incorrectas');
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
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Login $login): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login): RedirectResponse
    {
        //
    }
}
