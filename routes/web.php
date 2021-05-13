<?php

use Illuminate\Support\Facades\Route;
//Se conecta a los controladores con los cuales se trabajará, ya sea funciones con o sin vista que se enruten
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InvitadosController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\ConferenciaController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\Usuarios\AsistenciaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichR
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@Welcome');
Route::get('/login', 'IndexController@Login');
Route::get('/home', 'IndexController@home');
Route::get('usuario/validar', 'IndexController@validarUsuario');
Route::get('usuario/cerrar_sesion', 'IndexController@cerrar_sesion');
//--------- RUTAS PRINCIPALES---------
Route::GET('/', [IndexController::class, 'Welcome'])->name('prin.welcome');
Route::GET('/login', [IndexController::class, 'Login'])->name('usuario.login');
Route::get('/login/usuario/validar', [IndexController::class, 'validarUsuario'])->name('login.validarUsuario');
Route::get('usuario/cerrar_sesion', [IndexController::class, 'cerrar_sesion'])->name('login.cerrar_sesion');
Route::GET('/registrar', [RegistrarController::class, 'Registrar'])->name('registrar');
// Route::POST('registrar/verificar_registro',[RegistrarController::class, 'verificar_usuario'])->name('registrar.verificar_usuario');
Route::POST('/register', [RegistrarController::class,'guardar_usuario'])->name('registrar.guardar_usuario');
Route::get('/home', [IndexController::class, 'Home'])->name('home');

Route::get('/calendario', [ConferenciaController::class, 'calendario'])->name('calendario');
//------INVITADOS----//
Route::get('/invitados', [IndexController::class, 'invitados'])->name('invitados');

//----------------------------RUTAS PARA LOS USUARIOS REGISTRADOS----------------------------------------
Route::GET('/usuarios_asistencia',[AsistenciaController::class, 'asistencia_usuarios'])->name('usuario.asistencia');


