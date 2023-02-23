<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\PeliculasAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[CategoriaController::class,'index'])->name('welcome.index');

Route::get('/admin', function () {
    return view('administrador.admin');
})->name('admin.index');

//Login
Route::get('/login',[LoginController::class,'index'])->name('login.index');
Route::post('/login/autenticar',[LoginController::class,'show'])->name('login.login');
Route::get('/registro/logout',[LoginController::class,'destroy'])->name('login.destroy');

//Registro
Route::get('/registro',[RegistroController::class,'index'])->name('registro.index');
Route::post('/registro/validacion',[RegistroController::class,'store'])->name('registro.store');

//Peliculas - Admin
Route::get('/peliculas',[PeliculasAdminController::class,'index'])->name('peliculas.index');
Route::get('/peliculas/nueva_pelicula',[PeliculasAdminController::class,'create'])->name('peliculas.create');
Route::post('/peliculas/nueva_pelicula/registrar',[PeliculasAdminController::class,'store'])->name('peliculas.store');
Route::get('/peliculas/datos/{peliculas}',[PeliculasAdminController::class,'show'])->name('peliculas.show');