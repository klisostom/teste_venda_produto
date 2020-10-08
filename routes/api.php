<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProdutoController;

Route::group(['namespace' => 'API'], function () {
        Route::get('/produtos/{id}', 'ProdutoController@show');
        Route::get('/produtos', 'ProdutoController@index');
        Route::post('/produtos', 'ProdutoController@store');
        Route::put('/produtos/{id}', 'ProdutoController@update');
        Route::delete('/produtos/{id}', 'ProdutoController@destroy');

        Route::get('/teste', [ProdutoController::class, 'teste']);
});
