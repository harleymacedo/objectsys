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

    Route::get('/cadastrarsetor', 'setorController@cadSetor')->name('cadastrarsetor');
    Route::post('/cadastrar', 'setorController@novoSetor');
    Route::get('/setores', 'setorController@indexSetor')->name('listarsetor');
    Route::any('/update/{id}','setorController@updateSetor');
    Route::post('/editar', 'setorController@editar');
    Route::any('/delete/{id}', 'setorController@excluirSetor')->name('excluirsetor');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
