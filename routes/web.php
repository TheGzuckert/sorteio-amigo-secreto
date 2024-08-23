<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmigosController;

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
    return view('welcome');
});

//  Rotas principais da aplicação

Route::get('/', [AmigosController::class, 'index']);

Route::get('/amigos', [AmigosController::class, 'index']);

//  Rota para criar um novo amigo
Route::get('/criar', [AmigosController::class, 'create']);

//  Rota para armazenar amigo/user
Route::post('/amigos', [AmigosController::class, 'store']);

//  Rota para deletar amigo/user
Route::delete('/amigos/{id}', [AmigosController::class, 'destroy']);

//  Rota para editar amigo/user
Route::get('/amigos/{id}/edit', [AmigosController::class, 'edit']);

//  Rota para atualizar amigo/user
Route::put('/amigos/{id}', [AmigosController::class, 'update']);

//  Rota para pegar informações especifias de um amigo/user <- Refatorar amanhã
Route::get('/amigos/{id}/edit', [AmigosController::class, 'edit'])->name('amigos.edit');

//  Rota para realizar sorterio dos alunos
Route::get('/sorteio', [AmigosController::class, 'sorteio']);

// Rota para buscar um amigo
Route::get('/buscar-amigo', [AmigosController::class, 'buscarAmigo']);