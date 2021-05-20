<?php

use Illuminate\Support\Facades\Route;
//Se conecta a los controladores con los cuales se trabajará, ya sea funciones con o sin vista que se enruten
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InvitadosController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\ConferenciaController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\Usuarios\AsistenciaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaypalController;

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

Route::GET('/', 'IndexController@Welcome');
Route::GET('/login', 'IndexController@Login');
Route::GET('/home', 'IndexController@home');
Route::GET('usuario/validar', 'IndexController@validarUsuario');
Route::GET('usuario/cerrar_sesion', 'IndexController@cerrar_sesion');
//--------- RUTAS PRINCIPALES---------
Route::GET('/', [IndexController::class, 'Welcome'])->name('prin.welcome');
Route::GET('/login', [IndexController::class, 'Login'])->name('usuario.login');
Route::GET('/login/usuario/validar', [IndexController::class, 'validarUsuario'])->name('login.validarUsuario');
Route::GET('usuario/cerrar_sesion', [IndexController::class, 'cerrar_sesion'])->name('login.cerrar_sesion');
Route::GET('/registrar', [RegistrarController::class, 'Registrar'])->name('registrar');
Route::POST('/register', [RegistrarController::class, 'guardar_usuario'])->name('registrar.guardar_usuario');
// Route::POST('registrar/verificar_registro',[RegistrarController::class, 'verificar_usuario'])->name('registrar.verificar_usuario');
Route::GET('/login/usuario/cerrar_sesion', [IndexController::class, 'cerrar_sesion'])->name('login.cerrar_sesion');
Route::GET('/home', [IndexController::class, 'Home'])->name('home');

Route::GET('/calendario', [EventoController::class, 'index'])->name('calendario');
//------INVITADOS----//
Route::GET('/invitados', [IndexController::class, 'invitados'])->name('invitados');

//------PAYPAL------------------//
Route::GET('/pago', [PaymentController::class, 'index'])->name('pago');
Route::GET('/paypal/pay', [PaymentController::class, 'payWithPaypal'])->name('paypalPay');
Route::GET('/paypal/status', [PaymentController::class, 'payPalStatus'])->name('paypalStatus');

//----CATÝLOGO-----//
Route::get('/catalogo_conferencias', [ConferenciaController::class, 'index'])->name('catalogo');

//----------------------------RUTAS PARA LOS USUARIOS REGISTRADOS----------------------------------------
Route::GET('/usuarios/principal', [AsistenciaController::class, 'principal'])->name('usuario.principal');
Route::GET('/usuarios/asistencia', [AsistenciaController::class, 'asistencia_usuarios'])->name('usuario.asistencia');
