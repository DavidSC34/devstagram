<?php

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

Route::get('/muro',[PostController::class,'index'])->name('posts.index');