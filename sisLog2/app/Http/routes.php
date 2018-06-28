<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});


Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('seguridad/usuario','UsuarioController');

//para hacer un grupo de rutas de recursos con las peticiones index,update,edit,cretae,etc
Route::resource('clinica/medico','MedicoController');

//para hacer un grupo de rutas de recursos con las peticiones index,update,edit,cretae,etc
Route::resource('clinica/paciente','PacienteController');

Route::resource('clinica','IndiceController');
