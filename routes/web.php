<?php

use App\Livewire\Bebida\BebidaCreate;
use App\Livewire\Bebida\BebidaList;
use App\Livewire\Categoria\CategoriaList;
use App\Livewire\Prato\PratoCreate;
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

Route::get('/bebidas', BebidaList::class);

Route::get('/pratosCreate', PratoCreate::class)->name('Adicionar Prato');

Route::get('/bebidasCreate', BebidaCreate::class);

Route::get('/categoriaCreate', CategoriaList::class);