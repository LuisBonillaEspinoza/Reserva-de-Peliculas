<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\PeliculasAdminController;
use App\Http\Controllers\UsuariosController;

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
    $sessions = DB::table('sessions')
            ->where('user_id', auth()->id())
            ->orderBy('last_activity', 'ASC')
            ->get();
    return view('administrador.admin', ['sessions' => $sessions]);
})->name('admin.index');

//Login
Route::get('/login',[LoginController::class,'index'])->name('login.index');
Route::post('/login/autenticar',[LoginController::class,'show'])->name('login.login');
Route::get('/registro/logout',[LoginController::class,'destroy'])->name('login.destroy');

//Registro
Route::get('/registro',[RegistroController::class,'index'])->name('registro.index');
Route::post('/registro/validacion',[RegistroController::class,'store'])->name('registro.store');

//Peliculas No Login
Route::get('/peliculas-no-login',function(){
    return view('index');
})->name('peliculas.no-login');

//Peliculas - Admin
Route::get('/peliculas',[PeliculasAdminController::class,'index'])->name('peliculas.index');
Route::get('/peliculas/nueva_pelicula',[PeliculasAdminController::class,'create'])->name('peliculas.create');
Route::post('/peliculas/nueva_pelicula/registrar',[PeliculasAdminController::class,'store'])->name('peliculas.store');
Route::get('/peliculas/datos/{peliculas}',[PeliculasAdminController::class,'show'])->name('peliculas.show');
Route::get('/peliculas/editar/{peliculas}',[PeliculasAdminController::class,'edit'])->name('peliculas.edit');
Route::put('/peliculas/actualizar/{id_pelicula}',[PeliculasAdminController::class,'update'])->name('peliculas.update');

//Categorias
Route::get('/categorias',[CategoriaController::class,'index_2'])->name('categorias.index');
Route::get('/categorias/nueva_categoria',[CategoriaController::class,'create'])->name('categorias.create');
Route::post('/categorias/nueva_categoria/registrar',[CategoriaController::class,'store'])->name('categorias.store');
Route::get('/categorias/editar/{categorias}',[CategoriaController::class,'edit'])->name('categorias.edit');
Route::put('/categorias/actualizar/{id_categoria}',[CategoriaController::class,'update'])->name('categorias.update');

//Usuarios
Route::get('/usuarios',[UsuariosController::class,'index'])->name('usuarios.index');
Route::get('/usuarios/nuevo_usuario',[UsuariosController::class,'create'])->name('usuarios.create');
Route::post('/usuarios/nuevo_usuario/registrar',[UsuariosController::class,'store'])->name('usuarios.store');
Route::get('/usuarios/editar/{usuarios}/',[UsuariosController::class,'edit'])->name('usuarios.edit');
Route::put('/usuarios/editar/actualizar/{id_usuario}',[UsuariosController::class,'update'])->name('usuarios.update');

//Estado-Usuario
Route::put('/usuarios/datos/{id_usuario}',[UsuariosController::class,'estado'])->name('usuarios.estado');

//Carrito de Compras
Route::get('/carrito/',[PeliculasAdminController::class,'carrito'])->name('peliculas.carrito_datos');
Route::get('/carrito/{id_pelicula}',[PeliculasAdminController::class,'anadir_carrito'])->name('peliculas.carrito');

//Pago
Route::get('/pago',[PeliculasAdminController::class,'pago'])->name('pago.index');
Route::post('pago',[PeliculasAdminController::class,'realizar_pago'])->name('pago.create');
