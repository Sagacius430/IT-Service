<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Os;
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
// //rota para listagem
// Route::get('/clients', 'ClientController@index')->name('clients.index');
// //rota para o formulário onde crio o client
// Route::get('/clients/create', 'ClientController@create')->name('clients.create');
// //rota de edição dos dados
// Route::get('/clients/{id}/edit', 'ClientController@edit')->name('clients.edit');
// //rota POST pava enviar dados do formulário
// Route::post('/clients/store', 'ClientController@store')->name('clients.store');
// //rota PUT para atuliazar dados
// Route::put('/clients/{id}', 'ClientController@update')->name('clients.updade');
// //rota que apaga dados do banco
// Route::delete('/clients/{id}', 'ClientController@destroy')->name('clients.destroy');

// caso não funcione o login
// Route::resource('clients', 'ClientController');
// Route::resource('users', 'UserController');
// Route::resource('machines', 'MachineController');
// Route::resource('services', 'ServiceController');
// Route::resource('os', 'OsController');

// Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
// Route::get('logout', 'LoginController@logout')->name('login.logout');



//rota de teste
Route::get('/teste', function(){
    $machine = App\Machine::find(1);
    return $machine->all();
});

// Midleware não acessível se usuário estiver logado
Route::middleware('guest')->group(function(){

    Route::get('login', 'LoginController@index')->name('login.index');
    
    Route::post('login', 'LoginController@login')->name('login.login');
});

Route::get('logout', 'LoginController@logout')->name('login.logout');

// usuário com autenticação
Route::middleware('auth')->group(function(){

    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
    
    Route::get('reports/clients', 'ReportController@generateClientsReport')->name('reports.clients');
    Route::get('reports/os', 'ReportController@generateOsReport')->name('reports.os');
    
    Route::resource('users', 'UserController')->middleware('is-admin');

    Route::resource('clients', 'ClientController');
    Route::post('client/import', 'ClientController@import')->name('client.import');
    // Route::get('client/export', 'ClientController@export')->name('client.export');
    Route::post('client/export', 'ClientController@export')->name('client.export');

    Route::resource('machines', 'MachineController');  

    Route::resource('services', 'ServiceController')->middleware('is-admin');


    Route::get('os', 'OsController@index')->name('os.index');
    Route::get('/os/create/{client_id}', 'OsController@create')->name('os.create');
    Route::get('/os/{client_id}/edit', 'OsController@edit')->name('os.edit');
    Route::post('/os', 'OsController@store')->name('os.store');
    Route::put('/os/{id}', 'OsController@update')->name('os.update');
    Route::delete('/os/{id}', 'osController@destroy')->name('os.destroy');   
    
    // Route::resource('os','osController');
});