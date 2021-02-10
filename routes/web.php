<?php

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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return redirect('clientes');
});

Route::middleware(['auth:sanctum', 'verified'])->resource('clientes','App\Http\Controllers\ClienteController');
Route::middleware(['auth:sanctum', 'verified'])->resource('contrato/{id}', 'App\Http\Controllers\PDFController');//agregue id




