<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get("/produtos/novo",[App\Http\Controllers\ProdutosController::class, 'inserir']);
Route::post("/produtos/novo",[App\Http\Controllers\ProdutosController::class, 'store'])->name("inserir_produto");
Route::get("/produtos/lista",[App\Http\Controllers\ProdutosController::class, 'list']);
Route::get("/produtos/visualizar/{id}",[App\Http\Controllers\ProdutosController::class, 'show']);
Route::get("/produtos/editar/{id}",[App\Http\Controllers\ProdutosController::class, 'edit']);
Route::post("/produtos/editar/{id}",[App\Http\Controllers\ProdutosController::class, 'update'])->name("editar_produto");
Route::get("/produtos/excluir/{id}",[App\Http\Controllers\ProdutosController::class, 'delete']);
Route::post("/produtos/excluir/{id}",[App\Http\Controllers\ProdutosController::class, 'destroy'])->name("excluir_produto");
