<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Peliculas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//Para validar
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        $peliculas = Peliculas::where('estreno_pelicula','1')->orderBy('id')->get();
        $peliculas_datos = Peliculas::where('estreno_pelicula','1')->orderBy('id')->take(3)->get();
        if(Auth::user()->rol_user == 1){
            return view('administrador.admin');
        }
        return view('user.welcome')->with('categorias',$categorias)->with('peliculas',$peliculas)->with('peliculas_datos',$peliculas_datos);
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
    public function show(Categoria $categoria): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria): RedirectResponse
    {
        //
    }
}
