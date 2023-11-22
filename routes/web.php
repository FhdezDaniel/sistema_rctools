<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\AlmacenpController;
use App\Http\Controllers\SuajemodeloController;
use App\Http\Controllers\Termo1Controller;
use App\Http\Controllers\TermoprimeraController;
use App\Http\Controllers\TermosegundaController;
use App\Http\Controllers\TermoterceraController;
use App\Http\Controllers\TermocuartaController;
use App\Http\Controllers\TermoquintaController;
use App\Http\Controllers\ProduccionregistroController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\Linea1Controller;
use App\Http\Controllers\Linea2Controller;
use App\Http\Controllers\Linea3Controller;
use App\Http\Controllers\Linea4Controller;
use App\Http\Controllers\Linea5Controller;
use App\Http\Controllers\RegistrotermoformadoController;
use App\Http\Controllers\RegistroprensaController;
use App\Http\Controllers\RegistroinspeccionbarrenadoController;
use App\Http\Controllers\RegistroempaquetadoController;




Route::get('/home', function () {
    return view('/home');
});  

// MENU DE NAVEGACIÓN
Route::resource('/produccion','App\Http\Controllers\ProduccionController');
Route::resource('/almacenprovisional','App\Http\Controllers\AlmacenpController');
Route::resource('/planproduccion','App\Http\Controllers\Termo1Controller');
Route::resource('/suajemodelos','App\Http\Controllers\SuajemodeloController');
Route::resource('/registroproduccion','App\Http\Controllers\ProduccionregistroController');


// TERMO FORMADORAS
Route::resource('termoprimera','App\Http\Controllers\TermoprimeraController');
Route::resource('termosegunda','App\Http\Controllers\TermosegundaController');
Route::resource ('termotercera','App\Http\Controllers\TermoterceraController');
Route::resource ('termocuarta','App\Http\Controllers\TermocuartaController');
Route::resource ('termoquinta','App\Http\Controllers\TermoquintaController');

// REGISTRO Y LOGIN 
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register'); 
Route::post('/register', [RegisterController::class, 'store']); 
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// LINEAS 
Route::resource('/linea1','App\Http\Controllers\Linea1Controller');
Route::resource('/linea2','App\Http\Controllers\Linea2Controller');
Route::resource('/linea3','App\Http\Controllers\Linea3Controller');
Route::resource('/linea4','App\Http\Controllers\Linea4Controller');
Route::resource('/linea5','App\Http\Controllers\Linea5Controller');

// REGISTROS
Route::resource('/registrotermoformado','App\Http\Controllers\RegistrotermoformadoController');
Route::resource('/registroprensa','App\Http\Controllers\RegistroprensaController');
Route::resource('/registroinspeccionbarrenado','App\Http\Controllers\RegistroinspeccionbarrenadoController');
Route::resource('/registroempaquetado','App\Http\Controllers\RegistroempaquetadoController');

Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');