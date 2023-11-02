<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\AlmacenpController;
use App\Http\Controllers\SuajeController;
use App\Http\Controllers\Termo1Controller;
use App\Http\Controllers\TermosegundaController;
use App\Http\Controllers\TermoterceraController;
use App\Http\Controllers\TermocuartaController;
use App\Http\Controllers\TermoquintaController;

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

Route::get('/home', function () {
    return view('/home');
});  

Route::get('/prueba', function () {
    return view('/prueba');
});  

Route::resource('/almacenprovisional','App\Http\Controllers\AlmacenpController');
Route::resource('/suajes','App\Http\Controllers\SuajeController');
Route::resource('/planproduccion','App\Http\Controllers\Termo1Controller');

Route::resource('termosegunda','App\Http\Controllers\TermosegundaController');
Route::resource ('termotercera','App\Http\Controllers\TermoterceraController');
Route::resource ('termocuarta','App\Http\Controllers\TermocuartaController');
Route::resource ('termoquinta','App\Http\Controllers\TermoquintaController');


Route::get('/registroproduccion', function(){
    return view('/registroproduccion');
});

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register'); 
Route::post('/register', [RegisterController::class, 'store']); 

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');