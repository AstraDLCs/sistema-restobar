<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/ventas', function () {
    return view('welcome');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // aqui van las rutas protegidas por autentificacion

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/home', function () {
        return view('dashboard');
    });

    Route::get('/configuracion', function () {
        return view('configuracion');
    })->name('configuracion');

    Route::get('/platos', function () {
        return view('platos');
    })->name('platos');
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');

});