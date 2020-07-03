<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/descargarCancelados", "CanceladosController@descargarCancelados");
Route::get("/importarCancelados", "CanceladosController@importarCancelados");
Route::post("/verificarCancelado", "CanceladosController@verificarCancelado");
Route::get("/descargarCompletos", "CompletosController@descargarCompletos");
Route::get("/importarCompletos", "CompletosController@importarCompletos");
Route::post("/verificarCompleto", "CompletosController@verificarCompleto");
Route::post("/verificarTotal", "TotalController@verificarTotal");
