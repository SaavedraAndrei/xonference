<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InvitadosController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\ConferenciaController;

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
Route::get('/', 'IndexController@Welcome');
Route::get('/', 'IndexController@Welcome');
//--------- RUTA PRINCIPAL---------
Route::GET('/', [IndexController::class, 'Welcome'])->name('Welcome');
//-------------------------------INVITADOS--------------------------------------
// Route::GET('/invitados', [InvitadosController::class, 'Principal'])->name('InvitadosPrincipal');
//------CALENDARIO DE CONFERENCIAS----//
Route::get('/calendario', [ConferenciaController::class, 'index'])->name('calendario');
//------INVITADOS----//
Route::get('/invitados', [IndexController::class, 'index'])->name('invitados');
