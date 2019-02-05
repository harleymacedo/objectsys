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

    Route::get('/listarobj', 'objetosController@listarObj');
    Route::post('/cadastrarobj', 'objetosController@novoObj');
    Route::get('/cadobj', 'objetosController@cadObj');
    Route::post('/editarobj', 'objetosController@editarObj');
    Route::post('/excluirobj', 'objetosController@excluirObj');

    Route::get('/cadastrar/setor', 'setorController@cadSetor')->name('cadastrarsetor');
    Route::post('/salvar/setor', 'setorController@novoSetor');
    Route::get('/setores', 'setorController@indexSetor')->name('listarsetor');
    Route::any('/update/setor/{id}','setorController@updateSetor');
    Route::post('/atualizar/setor', 'setorController@editar');
    Route::any('/delete/setor/{id}', 'setorController@excluirSetor')->name('excluirsetor');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
