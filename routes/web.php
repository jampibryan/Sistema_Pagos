<?php

use App\Http\Controllers\ContribuyentesController;
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

Route::get('/', function () {
    return view('welcome');
})->name('principal');

Route::get('contribuyentes/listado', [ContribuyentesController::class, 'listado'])->name('listado');

Route::resource('contribuyentes' , ContribuyentesController::class);