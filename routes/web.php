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

Route::get('/', 'IndexController@index');


  
//Login
Auth::routes();


Route::get('/home/vagas', 'VagaController@index')->name('vagas');
Route::get('/vagas/pesquisar', 'VagaController@pesquisar')->name('pesquisar_vaga');


Route::group(['middleware' => 'auth'], function () {

    
    //Selects
    Route::get('/home/meuperfil', 'EmpresaController@index')->name('perfil');
    Route::get('/home', 'HomeController@index')->name('home');

    
    Route::get('/home/minhasvagas', 'VagaController@show')->name('minhasvagas');


    //Formulários
    //empresa
    Route::get('/empresa/create', 'EmpresaController@create');
    Route::post('/empresa/create', 'EmpresaController@store')->name('store_emp');
    Route::get('/empresa/{id}/edit', 'EmpresaController@edit')->name('edit_emp');
    Route::put('/empresa/{id}/edit', 'EmpresaController@update')->name('update_emp');
    Route::delete('/empresa/{id}', 'EmpresaController@destroy')->name('delete_emp');

    //vaga
    Route::get('/vaga/create', 'VagaController@create');
    Route::post('/vaga/create', 'VagaController@store')->name('store_vaga');
    Route::get('/vaga/{id}/edit', 'VagaController@edit')->name('edit_vaga');
    Route::put('/vaga/{id}/edit', 'VagaController@update')->name('update_vaga');   
    Route::get('/vagas/pesquisarminhasvagas', 'VagaController@pesquisarMinhasVagas')->name('pesquisar_minhasvagas');
    Route::delete('/vagas/{id}', 'VagaController@destroy')->name('delete_vaga');

});