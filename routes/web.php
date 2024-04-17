<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CorreoController;
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

$PersonasController = "App\Http\Controllers\PersonaController";
$ContactosController = "App\Http\Controllers\ContactoController";
$CorreoController = "App\Http\Controllers\CorreoController";


Route::get('/', function () {
    return view('layouts.home');
});

Route::resource('/personas', $PersonasController);

Route::resource('/contactos', $ContactosController);

Route::get('/contactos/{idPersona}', [ContactoController::class, 'show']);

Route::get('/contactos/create/{idContacto}', [ContactoController::class, 'create']);

Route::resource('/correos', $CorreoController);

Route::get('/correos/{idPersona}', [CorreoController::class, 'show']);

Route::get('/correos/create/{idCorreo}', [CorreoController::class, 'create']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
