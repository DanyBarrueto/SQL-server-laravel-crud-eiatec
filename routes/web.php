<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

//Ruta para poder ver los registros de las tablas principales (trabajadores,equipos,historico)

    Route::get('/', [CrudController::class, "index"])->name("example-app.index");



//Rutas para poder poder crear nuevos registros en la base de datos en sus respectivas tablas

    //ruta para crear nuevos registros en la tabla de trabajadores:
    Route::post('/registrar-producto-trabajador', [CrudController::class, "create"])->name("example-app.create");

    //ruta para crear nuevos registros en la BDD en la tabla de equipos:
    Route::post('/registrar-producto-equipo', [CrudController::class, "create2"])->name("example-app.create2");

    //ruta para crear nuevos registros en la BDD en la tabla de historico:
    Route::post('/registrar-producto-historico', [CrudController::class, "create3"])->name("example-app.create3");



//Rutas para poder modificar registros en las tablas principales de la base de datos

    //ruta para modificar registros de la BDD en la tabla trabajadores:
        
    Route::post('/modificar-producto-trabajador', [CrudController::class, "update"])->name("example-app.update");

    //ruta para modificar registros de la BDD en la tabla en la tabla equipos: 

    Route::post('/modificar-producto-equipo', [CrudController::class, "update2"])->name("example-app.update2");

    //ruta para modificar registros de la BDD en la tabla histórico 

    Route::post('/modificar-producto-historico', [CrudController::class, "update3"])->name("example-app.update3");



//Rutas para poder buscar registros en las tablas:

    //ruta para buscar registros en la tabla de trabajadores en la BDD

    Route::get('/buscar-trabajador', [CrudController::class, 'buscar'])->name('example-app.buscar');

    //ruta para buscar registros en la tabla equipos en la BDD:

    Route::get('/buscar-equipo', [CrudController::class, 'buscar2'])->name('example-app.buscar2');

    //ruta para buscar registros en la tabla historico en la BDD:

    Route::get('/buscar-historico', [CrudController::class, 'buscar3'])->name('example-app.buscar3');

    //ruta para consultar la tablas de equipos y de trabajadores
    
    Route::get('/buscar-datos', [CrudController::class, 'buscar4'])->name('example-app.buscar4');

    
//Rutas para descargar la base de datos entera o para descargar solo una tabla de la BDD

    //ruta para descargar los registros de la tabla de trabajadores

    Route::get('/descargar-datos', [CrudController::class, 'descargarDatos'])->name('descargar.datos');

    //ruta para descargar los registros de la tabla de equipos
    
    Route::get('/descargar-datos2', [CrudController::class, 'descargarDatos2'])->name('descargar.datos2');

    //ruta para descargar los registros de la tabla de historico

    Route::get('/descargar-datos3', [CrudController::class, 'descargarDatos3'])->name('descargar.datos3');

    //ruta para descargar toda la BDD 

    Route::get('/descargar-datos4', [CrudController::class, 'descargarDatos4'])->name('descargar.datos4');