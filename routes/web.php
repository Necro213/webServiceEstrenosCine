<?php

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

Route::get('/estrenos/get', [
    "uses" => "estrenosController@getEstrenos"
]);

Route::get('/estrenos/get/{nombre}', [
    "uses" => "estrenosController@getEstrenosfiltro"
]);

Route::get("/estrenos/add",[
   "uses" => "estrenosController@addEstreno"
]);

Route::get("/estrenos/delete/{id}",[
    "uses" => "estrenosController@deleteEstreno"
]);

Route::get("/estrenos/update/{id}",[
    "uses" => "estrenosController@updateEstreno"
]);
