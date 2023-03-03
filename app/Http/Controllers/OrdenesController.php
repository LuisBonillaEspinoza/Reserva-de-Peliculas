<?php

namespace App\Http\Controllers;

use App\Models\Ordenes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrdenesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrador.ordenes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index_usuario(){
        return view('user.ordenes.index');
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
    public function show(Ordenes $ordenes): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ordenes $ordenes): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ordenes $ordenes): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordenes $ordenes): RedirectResponse
    {
        //
    }
}
