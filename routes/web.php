<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmigosController;
//use App\Http\Controllers\AmigosController;

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
    return redirect('/amigos');
});

Route::controller(AmigosController::class)->group(function (){
    Route::get('/', 'index');
    Route::get('/amigos', 'index');
    Route::get('/criar', 'create');
    Route::post('/amigos', 'store');
    Route::delete('/amigos/{id}', 'destroy');
    Route::get('/amigos/{id}/edit', 'edit');
    Route::put('/amigos/{id}', 'update');
    Route::get('/amigos/{id}/edit', 'edit')->name('amigos.edit');
    Route::get('/sorteio', 'sorteio');
    Route::get('/buscar-amigo', 'buscarAmigo');
});
