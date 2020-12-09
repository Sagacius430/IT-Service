<?php

use App\Http\Controllers\ClientController;
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
//rota para listagem
Route::get('/clients', 'ClientController@index')->name('clients.index');
//rota para o formulário onde crio o client
Route::get('/clients/create', 'ClientController@create')->name('clients.create');
//rota de edição dos dados
Route::get('/clients/{id}/edit', 'ClientController@edit')->name('clients.edit');
//rota POST pava enviar dados do formulário
Route::post('/clients/store', 'ClientController@store')->name('clients.store');
//rota PUT para atuliazar dados
Route::put('/clients/{id}', 'ClientController@update')->name('clients.updade');
//rota que apaga dados do banco
Route::delete('/clients/{id}', 'ClientController@destroy')->name('clients.destroy');
//subtitui todas as linhas acima
Route::resource('clients', 'ClientController');
Route::resource('machine', 'MachineController');

Route::get('/users', 'UsersController@index')->name('user.index');

