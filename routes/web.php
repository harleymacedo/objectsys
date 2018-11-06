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

Route::get('/', function () {

    return view('welcome');

});

Route::middleware(['auth'])->group(function () {

    Route::get('/listarobj', 'objetoController@listarObj');
    Route::post('/cadastrarobj', 'objetoController@novoObj');
    Route::post('/editarobj', 'objetoController@editarObj');
    Route::post('/excluirobj', 'objetoController@excluirObj');

    Route::get('/cadastrarsetor', 'setorController@indexSetor');
    Route::post('/cadastrar', 'setorController@cadastrar');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
