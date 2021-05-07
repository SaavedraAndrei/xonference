<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InvitadosController;
use App\Http\Controllers\CalendarioController;

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

Route::get('/', 'IndexController@Welcome');
Route::get('/login', 'IndexController@Login');
Route::get('/home', 'IndexController@home');
Route::get('usuario/validar', 'IndexController@validarUsuario');
Route::get('usuario/cerrar_sesion', 'IndexController@cerrar_sesion');
//--------- RUTA PRINCIPAL---------
Route::GET('/', [IndexController::class, 'Welcome'])->name('Welcome');
Route::GET('/login', [IndexController::class, 'Login'])->name('login');
Route::get('/home', [IndexController::class, 'Home'])->name('home');
Route::get('usuario/validar', [IndexController::class, 'validarUsuario'])->name('validarUsuario');
Route::get('usuario/cerrar_sesion', [IndexController::class, 'cerrar_sesion'])->name('cerrar_sesion');
//-------------------------------INVITADOS--------------------------------------
// Route::GET('/invitados', [InvitadosController::class, 'Principal'])->name('InvitadosPrincipal');
//------CALENDARIO DE CONFERENCIAS----//
Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario');
//------INVITADOS----//
Route::get('/invitados', [IndexController::class, 'index'])->name('invitados');
