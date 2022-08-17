<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

Route::get('/gestaoFinanceira','GestaoFinanceiraController@index')->middleware('auth')->name('gestaoFinanceira');

Route::get('/balancete/cadastrar','GestaoFinanceiraController@create')->middleware('auth')->name('formBalancete');
Route::post('/balancete','GestaoFinanceiraController@store')->middleware('auth')->name('insereBalancete');
Route::delete('/balancete/{id}','GestaoFinanceiraController@delete')->middleware('auth');
Route::get('/balancete/edita/{id}','GestaoFinanceiraController@edit')->middleware('auth');
Route::put('/balancete/{id}','GestaoFinanceiraController@update')->middleware('auth')->name('editaBalancete');
Route::post('/balancete/consulta','GestaoFinanceiraController@filter')->middleware('auth')->name('consultaBalancete');

Route::get('/livroOcorrencias','OcorrenciaController@index')->middleware('auth')->name('livroOcorrencias');
Route::get('/livroOcorrencias/cadastrar','OcorrenciaController@create')->middleware('auth');
Route::post('/livroOcorrencias','OcorrenciaController@store')->middleware('auth')->name('insereOcorrencia');
Route::delete('/livroOcorrencias/{id}','OcorrenciaController@delete')->middleware('auth');
Route::post('/livroOcorrencias/consulta','OcorrenciaController@filter')->middleware('auth')->name('consultaOcorrencia');
Route::get('/livroOcorrencias/edita/{id}','OcorrenciaController@show')->middleware('auth')->name('editaOcorrencia');
Route::put('/livroOcorrencias/atualizar/{id}','OcorrenciaController@update')->middleware('auth')->name('atualizaOcorrencia');

Route::get('/comunicado','ComunicadoController@index')->middleware('auth')->name('comunicados');