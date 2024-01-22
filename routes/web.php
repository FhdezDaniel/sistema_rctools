<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AlmacenprovisionalController;
use App\Http\Controllers\SuajeController;
use App\Http\Controllers\PlanproduccionController;
use App\Http\Controllers\RegistrotermoformadoController;
use App\Http\Controllers\RegistroprensaController;
use App\Http\Controllers\RegistroinspeccionbarrenadoController;
use App\Http\Controllers\RegistroempaquetadoController;
use App\Http\Controllers\EmpleadoController;

Route::get('/home', function () {
    return view('/home');
});  


Route::resource('/almacenprovisional','App\Http\Controllers\AlmacenprovisionalController');
Route::resource('/planproduccion','App\Http\Controllers\PlanproduccionController');
Route::resource('/suajes','App\Http\Controllers\SuajeController');
Route::resource('/registroproduccion','App\Http\Controllers\ProduccionregistroController');


// REGISTRO Y LOGIN 
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register'); 
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/produccion', function(){
    return view('produccion');
});

Route::get('/plan', function(){
    return view('plan');
});

Route::get('/registrosproduccion', function(){
    return view('registrosproduccion');
});

// REGISTROS
Route::resource('/registrotermoformado','App\Http\Controllers\RegistrotermoformadoController');
Route::resource('/registroprensa','App\Http\Controllers\RegistroprensaController');
Route::resource('/registroinspeccionbarrenado','App\Http\Controllers\RegistroinspeccionbarrenadoController');
Route::resource('/registroempaquetado','App\Http\Controllers\RegistroempaquetadoController');

// EMPLEADOS
Route::resource('/empleados','App\Http\Controllers\EmpleadoController');

Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');