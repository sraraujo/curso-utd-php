<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // se apresentar erros, pode deletar


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

// HOME
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// produtos
Route::get('/produtos/lista', [App\Http\Controllers\ProdutosController::class, 'lista'])->name('produtosLista'); 
Route::get('/produtos/novo', [App\Http\Controllers\ProdutosController::class, 'inserir']); 
Route::post('/produtos/novo', [App\Http\Controllers\ProdutosController::class, 'store'])->name("inserir_produto"); 
Route::get('/produtos/visualizar/{id}', [App\Http\Controllers\ProdutosController::class, 'show']); 
Route::get('/produtos/editar/{id}', [App\Http\Controllers\ProdutosController::class, 'edit']); 
Route::post('/produtos/editar/{id}', [App\Http\Controllers\ProdutosController::class, 'update'])->name("editar_produto"); 
Route::post("/produtos/lista/{id}", "App\Http\Controllers\ProdutosController@delete")->name("produtosLista");

// produtos
// Route::get('/produtos/lista', [App\Http\Controllers\ProdutosController::class, 'lista'])->name('produtoslista'); 
// Route::get('/produtos/novo', [App\Http\Controllers\ProdutosController::class, 'inserir']); 
// Route::post('/produtos/novo', [App\Http\Controllers\ProdutosController::class, 'store'])->name("inserir_produto"); 

// funcionarios
Route::get('/funcionarios/lista', [App\Http\Controllers\FuncionariosController::class, 'lista'])->name('produtosLista'); 
Route::get('/funcionarios/novo', [App\Http\Controllers\FuncionariosController::class, 'inserir']); 
Route::post('/funcionarios/novo', [App\Http\Controllers\FuncionariosController::class, 'store'])->name("inserir_funcionario"); 
Route::get('/funcionarios/visualizar/{id}', [App\Http\Controllers\FuncionariosController::class, 'show']); 
Route::get('/funcionarios/editar/{id}', [App\Http\Controllers\FuncionariosController::class, 'edit']); 
Route::post('/funcionarios/editar/{id}', [App\Http\Controllers\FuncionariosController::class, 'update'])->name("editar_funcionario"); 
Route::post("/funcionarios/lista/{id}", [App\Http\Controllers\FuncionariosController::class, 'delete'])->name('funcionariosLista');
