<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InvitadosController;

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

// Route::get('/', 'IndexController@Index');
//--------- RUTA PRINCIPAL---------
Route::GET('/', [IndexController::class, 'Index'])->name('Index');
//-------------------------------INVITADOS--------------------------------------
Route::GET('/invitados', [InvitadosController::class, 'Principal'])->name('InvitadosPrincipal');
