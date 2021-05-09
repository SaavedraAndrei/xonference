<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InvitadosController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\ConferenciaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RegistrarController;

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
Route::get('/login/usuario/cerrar_sesion', [IndexController::class, 'cerrar_sesion'])->name('login.cerrar_sesion');
Route::GET('/registrar', [RegistrarController::class, 'Registrar'])->name('usuario.registrar');
Route::get('/home', [IndexController::class, 'Home'])->name('home');

Route::get('/calendario', [ConferenciaController::class, 'index'])->name('calendario');
//------INVITADOS----//
Route::get('/invitados', [IndexController::class, 'invitados'])->name('invitados');
Route::get('/register', [RegisterController::class,'intRegistro'])->name('register'); 
Route::post('/register', [RegisterController::class,'store']);
