<?php

use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'API'], function () {
    Route::get('/produtos/{id}', 'Produto\ProdutoController@show');
    Route::get('/produtos', 'Produto\ProdutoController@index');
    Route::post('/produtos', 'Produto\ProdutoController@store');
    Route::put('/produtos/{id}', 'Produto\ProdutoController@update');
    Route::delete('/produtos/{id}', 'Produto\ProdutoController@destroy');
});
