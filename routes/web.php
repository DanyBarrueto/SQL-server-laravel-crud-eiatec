<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

/*-------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!*/

//Ruta para poder ver los datos de las tablas principales (trabajadores,equipos,historico)

    Route::get('/', [CrudController::class, "index"])->name("example-app.index");



//Rutas para poder poder crear registros con informacion nueva en sus respectivas tablas

    //ruta para añadir datos en la BDD en la tabla de trabajadores:
    Route::post('/registrar-producto-trabajador', [CrudController::class, "create"])->name("example-app.create");

    //ruta para añadir datos en la BDD en la tabla de equipos:
    Route::post('/registrar-producto-equipo', [CrudController::class, "create2"])->name("example-app.create2");

    //ruta para añadir datos en la BDD en la tabla de historico:
    Route::post('/registrar-producto-historico', [CrudController::class, "create3"])->name("example-app.create3");



//Rutas para poder modificar registros en las tablas principales de la base de datos

    //ruta para modificar datos en la BDD en la tabla trabajadores:
        
    Route::post('/modificar-producto-trabajador', [CrudController::class, "update"])->name("example-app.update");

    //ruta para modificar datos en la BDD en la tabla en la tabla equipos: 

    Route::post('/modificar-producto-equipo', [CrudController::class, "update2"])->name("example-app.update2");

    //ruta para modificar datos en la BDD en la tabla historico 

    Route::post('/modificar-producto-historico', [CrudController::class, "update3"])->name("example-app.update3");



//Rutas para poder buscar registros en las tablas:

    //ruta para buscar datos en los registros de la tabla de trabajadores en la BDD

    Route::get('/buscar-trabajador', [CrudController::class, 'buscar'])->name('example-app.buscar');

    //ruta para buscar datos en los registros de la tabla equipos en la BDD:

    Route::get('/buscar-equipo', [CrudController::class, 'buscar2'])->name('example-app.buscar2');

    //ruta para buscar datos en los registros de la tabla historico en la BDD:

    Route::get('/buscar-historico', [CrudController::class, 'buscar3'])->name('example-app.buscar3');



//Ruta para descargar los datos de las diferentes tablas de la base de datos

    //ruta para descargar los datos de la tabla de trabajadores

    Route::get('/descargar-datos', [CrudController::class, 'descargarDatos'])->name('descargar.datos');

    //ruta para descargar los datos de la tabla de equipos
    
    Route::get('/descargar-datos2', [CrudController::class, 'descargarDatos2'])->name('descargar.datos2');

    //ruta para descargar los datos de la tabla de historico

    Route::get('/descargar-datos3', [CrudController::class, 'descargarDatos3'])->name('descargar.datos3');