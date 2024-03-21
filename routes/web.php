<?php

use App\Http\Controllers\CrudController;
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

Route::get('/', [CrudController::class, "index"])->name("example-app.index");

//ruta para añadir datos en la BDD:
Route::post('/registrar-producto', [CrudController::class, "create"])->name("example-app.create");

//ruta para modificar datos en la BDD:
Route::post('/modificar-producto', [CrudController::class, "update"])->name("example-app.update");

//ruta para buscar datos en los registros de la BDD:
Route::get('/buscar-trabajador', [CrudController::class, 'buscar'])->name('example-app.buscar');

//ruta para descargar la BDD
Route::get('/descargar-datos', [CrudController::class, 'descargarDatos'])->name('descargar.datos');