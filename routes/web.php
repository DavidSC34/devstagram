<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('principal');
});
Route::get('/crear-cuenta', [RegisterController::class,'index'])->name('register');
Route::post('/crear-cuenta', [RegisterController::class,'store']);

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);//--> se omite name ya que toma el anterior

// Route::get('/logout',[LogoutController::class,'store'])->name('logout'); --> inseguro por la base de datos
Route::post('/logout',[LogoutController::class,'store'])->name('logout');
 
Route::get('/{user:username}',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
// Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::get('/{user:username}/post/{post}',[PostController::class,'show'])->name('posts.show');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');


Route::post('/{user:username}/post/{post}',[ComentarioController::class,'store'])->name('comentarios.store');




Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');


//Like a las fotos

Route::post('/posts/{post}/likes',[LikeController::class,'store'])->name('post.likes.store');
Route::delete('/posts/{post}/likes',[LikeController::class,'destroy'])->name('post.likes.destroy');

//Rutas para el perfil
Route::get('{user:username}/editar-perfil',[PerfilController::class,'index'])->name('perfil.index');
Route::post('{user:username}/editar-perfil',[PerfilController::class,'store'])->name('perfil.store');