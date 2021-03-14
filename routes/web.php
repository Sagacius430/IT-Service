<?php

use App\Http\Controllers\OsController;
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

    Auth::routes(['register'=>FALSE]);

    // Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('logout', 'LoginController@logout')->name('login.logout');

// usuário com autenticação
Route::middleware('auth')->group(function(){

    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
    
    // Relatórios Clientes Ordem de serviço
    Route::get('reports/clients', 'ReportController@generateClientsReport')->name('reports.clients');
    Route::get('reports/os', 'ReportController@generateOsReport')->name('reports.os');
    
    //usuários
    Route::resource('users', 'UserController')->middleware('auth');



    //Clientes
    Route::get('clients', 'ClientController@index')->name('clients.index');
    Route::get('clients/create', 'ClientController@create')->name('clients.create');
    Route::get('clients/{id}/edit', 'ClientController@edit')->name('clients.edit');
    Route::put('clients/{id}', 'ClientController@update')->name('clients.update');
    Route::post('clients/store', 'ClientController@store')->name('clients.store');
    Route::delete('clients/{id}', 'ClientController@destroy')->name('clients.destroy');

    // Route::resource('clients', 'ClientController');
    
    //Importar e exportar Clientes
    Route::post('clients/import', 'ClientController@import')->name('clients.import');
    // Route::get('client/export', 'ClientController@export')->name('client.export');
    Route::post('clients/export', 'ClientController@export')->name('clients.export');


    

    //Computadores
    Route::get('machines', 'MachineController@index')->name('machines.index');
    Route::get('machines/create/{client_id}', 'MachineController@create')->name('machines.create');
    Route::post('machines/store', 'MachineController@store')->name('machines.store');
    // Route::get('machines/{id}/edit', 'MachineController@edit')->name('machines.edit');
    
    // Route::resource('machines', 'MachineController');  

    //serviços
    Route::resource('services', 'ServiceController')->middleware('is-admin');
    
    //Ordens de serviço
    Route::get('os', 'OsController@index')->name('os.index');
    Route::get('/os/create/{client_id}', 'OsController@create')->name('os.create');
    Route::get('/os/{client_id}/edit', 'OsController@edit')->name('os.edit');
    Route::post('/os', 'OsController@store')->name('os.store');
    Route::put('/os/{id}', 'OsController@update')->name('os.update');
    Route::delete('/os/{id}', 'osController@destroy')->name('os.destroy');
    
    // Route::get('os', 'OsController@status')->name('os.status');
    
    // Route::resource('os','osController');
});

