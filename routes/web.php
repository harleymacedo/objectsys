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

    // Rota para criar novo usuário
    Route::post('salvar/user', 'userController@novoUser')->name('salvarUser');
    Route::get('cadastrar/user', 'userController@cadUser')->name('cadastrarUser');

    // Rotas para o controle de objetos
    Route::get('/cadastrar/objeto', 'objetosController@cadObj')->name('cadastrarobjetos');
    Route::post('/salvar/objeto', 'objetosController@novoObj');
    Route::any('/update/objeto/{id}','objetosController@updateObj');
    Route::post('/atualizar/objeto', 'objetosController@editarObj');
    Route::any('/delete/objeto/{id}', 'objetosController@excluirObj')->name('excluirobjetos');
    

    // Rotas para o controler de setor
    Route::get('/cadastrar/setor', 'setorController@cadSetor')->name('cadastrarsetor');
    Route::post('/salvar/setor', 'setorController@novoSetor');
    Route::get('/setores', 'setorController@indexSetor')->name('listarsetor');
    Route::any('/update/setor/{id}','setorController@updateSetor');
    Route::post('/atualizar/setor', 'setorController@editar');
    Route::any('/delete/setor/{id}', 'setorController@excluirSetor')->name('excluirsetor');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/objetos', 'objetosController@indexObj')->name('listarobjetos'); //Rota para listar objetos pode ser acessada por todos
Route::post('/buscar/objeto', 'objetosController@buscarObj');
Route::post('/buscar/setor', 'setorController@buscarSetor');
