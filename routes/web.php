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
    Route::get('/users', 'userController@listUser')->name('listarUser');
    Route::post('/atualizar/permissao/{id}', 'userController@alterarPermissao')->name('alterarPermissao');

    // Rotas para o controle de objetos
    Route::get('/cadastrar/objeto', 'objetosController@cadObj')->name('cadastrarObjetos');
    Route::post('/salvar/objeto', 'objetosController@novoObj');
    Route::any('/update/objeto/{id}','objetosController@updateObj');
    Route::post('/atualizar/objeto', 'objetosController@editarObj');
    Route::any('/delete/objeto/{id}', 'objetosController@excluirObj')->name('excluirObjetos');
    

    // Rotas para o controler de setor
    Route::get('/cadastrar/setor', 'setorController@cadSetor')->name('cadastrarSetor');
    Route::post('/salvar/setor', 'setorController@novoSetor');
    Route::get('/setores', 'setorController@indexSetor')->name('listarSetor');
    Route::any('/update/setor/{id}','setorController@updateSetor');
    Route::post('/atualizar/setor', 'setorController@editar');
    Route::any('/delete/setor/{id}', 'setorController@excluirSetor')->name('excluirSetor');

    Route::get('/objetos', 'objetosController@indexObj')->name('listarObjetos'); //Rota para listar objetos pode ser acessada por todos
    Route::post('/buscar/objeto', 'objetosController@buscarObj')->name('buscarObjetos');
    Route::post('/buscar/setor', 'setorController@buscarSetor');

    // Rotas para o controle de reservas
    Route::post('/reservar/objeto/{id}', 'reservasController@novaReserva')->name('novaReserva');
    Route::get('/reservas', 'reservasController@indexReservas')->name('listarReservas');
    Route::any('/delete/reserva/{id}', 'reservasController@deleteReservas')->name('deletarReservas');
    Route::post('/atualizar/objeto/{id}', 'reservasController@editarReservas')->name('editarReservas');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

