<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Produto\ProdutoController;


Route::get('/cadastrar/produto', function () {
    return view('cadastrar_produto');
})->name('comprar_produto');

// Route::post('/produtos', [ProdutoController::class, 'store'])->name('registrar_produto');
