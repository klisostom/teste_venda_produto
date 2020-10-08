<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Produto\ProdutoController;

Route::group(['namespace' => 'API'], function () {
    Route::group(['namespace' => 'Produto'], function () {
        Route::get('/produtos/{id}', [ProdutoController::class, 'show']);
        Route::get('/produtos', [ProdutoController::class, 'index']);
        Route::post('/produtos', [ProdutoController::class, 'store']);
        Route::put('/produtos/{id}', [ProdutoController::class, 'update']);
        Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy']);
    });
});
