<?php

use Illuminate\Support\Facades\Route;
//Se conecta a los controladores con los cuales se trabajará, ya sea funciones con o sin vista que se enruten
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InvitadosController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\ConferenciaController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaypalController;

//-----------------------------------ADMINISTRATIVA
use App\Http\Controllers\Administracion\PermisosController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\Administracion\PonentesController;
use App\Http\Controllers\Administracion\CongresosController;
use App\Http\Controllers\Administracion\MantenimientosController;
//-----------------------------------USUARIOS
use App\Http\Controllers\Usuarios\AsistenciaController;
use App\Http\Controllers\Usuarios\ForosController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\JitsiController;

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
// Route::POST('/register', [RegistrarController::class, 'guardar_usuario'])->name('registrar.guardar_usuario');
Route::POST('registrar/verificar_registro', [RegistrarController::class, 'verificar_usuario'])->name('registrar.verificar_usuario');
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
Route::POST('/usuarios/asistencia/verificar', [AsistenciaController::class, 'verificar_usuario_asistencia'])->name('asistencia.verificar');
Route::POST('/usuarios/asistencia/guardar', [AsistenciaController::class, 'registrar_asistencia'])->name('asistencia.registrar');
Route::GET('/usuarios/foros', [ForosController::class, 'foros_usuarios'])->name('usuario.foros');
Route::POST('/usuarios/foros/guardar_respuesta', [ForosController::class, 'guardar_respuesta'])->name('foros.guardar_respuesta');
Route::GET('/usuarios/foros_2', [ForosController::class, 'foros_usuarios2'])->name('usuario.foros2');


//-------------------------------------------GESTION ADMINISTRATIVA---------------------------------------
Route::GET('/general', [PermisosController::class, 'principal'])->name('administrativa.principal');
Route::GET('/administrativa/ponentes', [PonentesController::class, 'Ponentes'])->name('administrativa.ponentes');
Route::POST('/administrativa/ponentes_verificar', [PonentesController::class, 'verificarPonente'])->name('administrativa.verificar_ponentes');
Route::POST('/administrativa/ponentes_guardar', [PonentesController::class, 'guardarPonente'])->name('administrativa.guardar_ponente');
Route::GET('/administracion/foros', [ForosController::class, 'foros_admin'])->name('administrativa.foros');
Route::POST('/administrativa/guardar_pregunta', [ForosController::class, 'guardar_pregunta'])->name('foros.guardar_pregunta');
Route::GET('/administrativa/congresos', [CongresosController::class, 'Congresos'])->name('administrativa.congresos');
Route::POST('/administrativa/congresos_guardar', [CongresosController::class, 'guardar_congreso'])->name('congreso.guardar');
Route::GET('/administrativa/categorias', [MantenimientosController::class, 'Categorias'])->name('administrativa.categorias');
Route::POST('/administrativa/categorias_guardar', [MantenimientosController::class, 'guardar_categoria'])->name('categoria.guardar');
Route::GET('/administrativa/recursos', [ArchivoController::class, 'principal'])->name('administrativa.recursos');
Route::POST('/administrativa/recursos_verificar', [ArchivoController::class, 'verificarRecurso'])->name('administrativa.verificar_recursos');
Route::POST('/administrativa/recursos_guardar', [ArchivoController::class, 'guardarRecurso'])->name('administrativa.guardar_recurso');

//----------------------------RUTAS PARA EL CERTIFICADO---------------------------------------
Route::GET('/certificado', [CertificadoController::class, 'index'])->name('certificado');
Route::GET('/download', [CertificadoController::class, 'download'])->name('download');
//----------------------------RUTAS PARA LA CARGA DE RECURSOS----------------------------------------
Route::GET('/file', [ArchivoController::class, 'index'])->name('viewfile');
Route::GET('/file/upload', [ArchivoController::class, 'create'])->name('formfile');
Route::POST('/file/upload', [ArchivoController::class, 'store'])->name('uploadfile');
Route::GET('/file/download/{id}', [ArchivoController::class, 'show'])->name('downloadfile');
//----------------------------RUTAS PARA JITSI----------------------------------------
Route::GET('/jitsi', [JitsiController::class, 'index'])->name('jitsi');
