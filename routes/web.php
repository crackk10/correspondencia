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



Route::get('/inicio', function () {
    /* dd(auth()->user()->roles()); */
    return view('theme/lte/layout');
})->name('inicio');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('entrada.listar{page?}','Admin\EntradaController@listar')->name('entrada.listar');

Route::resource('entrada', 'Admin\EntradaController')
->only([
    'index', 'create','store','show','edit','update','destroy',
    ])
    ->names([
    'index' => 'entrada',
    'create' => 'entrada.crear',
    'store' => 'entrada/guardar',
    'show' => 'entrada/detalle',
    'edit' => 'entrada/editar',
    'update' => 'entrada/actualizar',
    'drestroy' => 'entrada/eliminar',
    
])->middleware('auth');
