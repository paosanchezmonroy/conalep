<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware;

use App\Http\Controllers\PostController;


// Ruta para la página principal
Route::get('/', [HomeController::class, 'index'])->name('home');

// Ruta para procesar el login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Rutas protegidas por middleware según rol
//Route::middleware(['role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['role']);
//});


Route::middleware(['role:user'])->group(function () {
    Route::get('/dashboardUser', function () {
        return view('dashboardUser'); // Vista para usuarios
    })->name('dashboardUser');
});




Route::get('/posts',[PostController::class, 'index']);
Route::get('/posts/create',[PostController::class,'create']);
Route::get('/posts/{post}', [PostController::class,'create']);

//Get: Escribimos url-redireccionar 
//Post: Formulario para mandar informacion 
//Put: Actualizar algun registro 
//Patch: Actualizar registro
//Delete: Eliminar registros 
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

