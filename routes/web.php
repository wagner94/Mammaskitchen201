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


//Route::get('home', 'HomeController@index')->name('welcome');

Route::get('/', 'HomeController@index')->name('welcome');

Route::get('/home', 'HomeController@index')->name('welcome');


Route::post('/reservation', 'ReservationController@reserve')->name('reservation.reserve');
Route::post('/contacto', 'ContactoController@contacto')->name('contacto.contacto');


Auth::routes();
 
Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'],function(){

     Route::get('dashboard', 'DashboardController@index')->name('admin,dashboard');
     Route::get('/', 'DashboardController@index')->name('admin,dashboard');

     Route::resource('slider', 'SliderController');

     Route::get('contacto', 'ContactoController@index')->name('contacto.index');
     Route::delete('contacto/{id}','ContactoController@destroy')->name('contacto.destroy');

     Route::get('reservation', 'ReservationController@index')->name('reservation.index');
     Route::post('reservation/{id}','ReservationController@status')->name('reservation.status');
     Route::delete('reservation/{id}','ReservationController@destroy')->name('reservation.destroy');
     

     Route::get('prato', 'PratoController@index')->name('prato.index');
     Route::get('prato/create', 'PratoController@create')->name('prato.cadastro');
     Route::delete('prato/{id}','pratoController@destroy')->name('prato.destroy');
     Route::post('prato/store', 'PratoController@store')->name('prato.store');

     Route::get('bebida', 'BebidaController@index')->name('bebida.index');
     Route::get('bebida/create', 'BebidaController@create')->name('bebida.cadastro');
     Route::delete('bebida/{id}','BebidaController@destroy')->name('bebida.destroy');
     Route::post('bebida/store', 'BebidaController@store')->name('bebida.store');

     Route::get('mesa', 'MesaController@index')->name('mesa.index');
     Route::get('mesa/create', 'MesaController@create')->name('mesa.cadastro');
     Route::get('mesa/edit', 'MesaController@edit')->name('mesa.edit');
     Route::delete('mesa/{id}','MesaController@destroy')->name('mesa.destroy');
     Route::post('mesa/store', 'MesaController@store')->name('mesa.store');

     Route::get('cliente', 'ClienteController@index')->name('cliente.index');
     Route::get('cliente/create', 'ClienteController@create')->name('cliente.cadastro');
     Route::get('cliente/edit', 'ClienteController@edit')->name('cliente.edit');
     Route::delete('cliente/{id}','ClienteController@destroy')->name('cliente.destroy');
     Route::post('cliente/store', 'ClienteController@store')->name('cliente.store');

     Route::get('pedido', 'PedidoController@index')->name('pedido.index');
     Route::get('pedido/create', 'PedidoController@create')->name('pedido.cadastro');
     Route::delete('pedido/{id}','PedidoController@destroy')->name('pedido.destroy');
     Route::post('pedido/store', 'PedidoController@store')->name('pedido.store');

     Route::post('pedido/edit', 'PedidoController@edit')->name('pedido.edit');
     
     Route::post('pedido/livesearch','PedidoController@livesearch')->name('pedido.livesearch');
     //Route::post('pedido/ajax', 'PedidoController@ajax')->name('pedido.ajax');
     




     
     

    });





/*Route::get('dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/', 'HomeController@index')->name('welcome');
*/

/*Route::get('/', function () {
    return view('welcome');
});*/