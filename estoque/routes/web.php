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
    //return view('welcome');
    return '<h1>Primeira lógica com Laravel - Server ativo</h1>';
});

Auth::routes();

//Route::get('/login', 'LoginController@login')->name('login');

Route::get('/logout', 'ProdutoController@lista')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produtos', 'ProdutoController@lista');

Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra') -> where('id', '[0-9]+');

Route::get('/produtos/novo', 'ProdutoController@novo');

Route::post('/produtos/adiciona', 'ProdutoController@adiciona');

Route::get('/produtos/edita/{id}', 'ProdutoController@edita') -> where('id', '[0-9]+');

Route::post('/produtos/atualiza/{id}', 'ProdutoController@atualiza') -> where('id', '[0-9]+');

Route::get('/produtos/remove/{id}', 'ProdutoController@remove') -> where('id', '[0-9]+');

/* Exemplo de gerenciamento de acesso via rota
Route::get('/produtos/remove/{id}', [
    'middleware' = 'appMiddleware',
    'users' => 'ProdutoController@remove']) -> where('id', '[0-9]+');
*/

Route::get('/produtos/json', 'ProdutoController@listaJson');
