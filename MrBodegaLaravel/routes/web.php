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


/*Route::get('/', function () {
    return view('login');
});*/

//Route::get('/login', 'LoginController@index');
//Route::post('/login', 'LoginController@login');


Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\AdmUsuarioController::class, 'acceder'])->name('login');

Route::get('/adm-usuario', [App\Http\Controllers\AdmUsuarioController::class, 'index'])->name('adm-usuario');
Route::post('/adm-usuario', [App\Http\Controllers\AdmUsuarioController::class, 'acceder'])->name('adm-usuario');

Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test');
Route::post('/test', [App\Http\Controllers\TestController::class, 'getProductos'])->name('test');

/*Route::get('/login', function () {
    return view('login');
});*/


