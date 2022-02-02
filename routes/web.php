<?php

use Illuminate\Support\Facades\Route;
//AGREGAMOS LOS CONTROLADORES
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\EspecialidadesController;
//use App\Http\Controllers\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
|contains the "web" middleware group. Now create something great!
|
|AQUI VAN LAS RUTAS
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


//agregamos todas las rutas para los modelos creados
Route::group(['middleware'=>['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('paciente', PacienteController::class);
    Route::resource('especialidades', EspecialidadesController::class);
});

