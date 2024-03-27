<?php

// Importar los espacios de nombres necesarios
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

// Definir la clase del controlador y extenderla de Controller
class CrudController extends Controller
{

// Función para mostrar todos los registros de trabajadores, equipos e historico
    public function index(){
    // Consultar todos los registros de trabajadores ordenados por ID en orden descendente
    $trabajadores = DB::select("SELECT * FROM Trabajadores
        INNER JOIN Expedicion ON Trabajadores.ID_expedicion = Expedicion.ID_expedicion
        INNER JOIN Cargos ON Trabajadores.ID_cargo = Cargos.ID_cargos
        INNER JOIN Coordinadores ON Trabajadores.ID_coordinacion = Coordinadores.ID_coordinador
        INNER JOIN Ubicacion ON Trabajadores.ID_ubicacion = Ubicacion.ID_ubicacion

        ORDER BY ID_trabajador ASC");
    
    // Consultar todos los registros de equipos ordenados por ID en orden descendente
    $equipos = DB::select("SELECT * FROM Equipos ORDER BY ID_equipo DESC");

    // Consultar todos los registros de historico ordenados por ID en orden descendente
    $historico = DB::select("SELECT * FROM Historico ORDER BY ID_historico DESC");

    // Retornar la vista "Welcome" con los datos obtenidos
    return view("Welcome")->with(compact('trabajadores', 'equipos', 'historico'));
}


    // Función para buscar registros en la tabla trabajadores en la base de datos:
    public function buscar(Request $request){
        // Obtener el texto de búsqueda desde la solicitud
        $texto = trim($request->get('texto'));
        
        // Realizar la consulta a la base de datos utilizando Eloquent ORM
        $datos = DB::table('trabajadores')
                    ->select ('ID','Nombre','Cedula','Cuenta','Ubicacion','Area','Cargo','Codigo',
                    'Region','Oficina','Tipo_de_computador','Marca','Modelo','Numero_de_serie','Id_producto',
                    'Procesador','Ram','Disco_duro','Gpu','Tipo_de_sistema','Display','Historial_asignacion','Procesos_a_ejecutar','Observaciones')
                    ->where('ID','LIKE','%'.$texto.'%')
                    ->orWhere('Cedula','LIKE','%'.$texto.'%')
                    ->orWhere('Nombre','LIKE','%'.$texto.'%')
                    ->orderBy('ID','asc')
                    ->paginate(10);
        
        // Retornar la vista "Welcome" con los datos de la búsqueda y el texto de búsqueda
        return view('Welcome', compact('datos', 'texto'));        
    }

    // Función para buscar registros en la tabla equipos en la base de datos:
    public function buscar2(Request $request){
        // Obtener el texto de búsqueda desde la solicitud
        $texto = trim($request->get('texto'));
        
        // Realizar la consulta a la base de datos utilizando Eloquent ORM
        $datos = DB::table('trabajadores')
                    ->select ('ID','Nombre','Cedula','Cuenta','Ubicacion','Area','Cargo','Codigo',
                    'Region','Oficina','Tipo_de_computador','Marca','Modelo','Numero_de_serie','Id_producto',
                    'Procesador','Ram','Disco_duro','Gpu','Tipo_de_sistema','Display','Historial_asignacion','Procesos_a_ejecutar','Observaciones')
                    ->where('ID','LIKE','%'.$texto.'%')
                    ->orWhere('Cedula','LIKE','%'.$texto.'%')
                    ->orWhere('Nombre','LIKE','%'.$texto.'%')
                    ->orderBy('ID','asc')
                    ->paginate(10);
        
        // Retornar la vista "Welcome" con los datos de la búsqueda y el texto de búsqueda
        return view('Welcome', compact('datos', 'texto'));        
    }

    //Función para buscar registros en la tabla de historico en la base de datos:
    public function buscar3(Request $request){
        // Obtener el texto de búsqueda desde la solicitud
        $texto = trim($request->get('texto'));
        
        // Realizar la consulta a la base de datos utilizando Eloquent ORM
        $datos = DB::table('trabajadores')
                    ->select ('ID','Nombre','Cedula','Cuenta','Ubicacion','Area','Cargo','Codigo',
                    'Region','Oficina','Tipo_de_computador','Marca','Modelo','Numero_de_serie','Id_producto',
                    'Procesador','Ram','Disco_duro','Gpu','Tipo_de_sistema','Display','Historial_asignacion','Procesos_a_ejecutar','Observaciones')
                    ->where('ID','LIKE','%'.$texto.'%')
                    ->orWhere('Cedula','LIKE','%'.$texto.'%')
                    ->orWhere('Nombre','LIKE','%'.$texto.'%')
                    ->orderBy('ID','asc')
                    ->paginate(10);
        
        // Retornar la vista "Welcome" con los datos de la búsqueda y el texto de búsqueda
        return view('Welcome', compact('datos', 'texto'));        
    }

    // Función para crear un nuevo registro en la tabla de trabajadores en la base de datos:
    public function create(Request $request){
        try {
            // Realizar la inserción en la tabla "trabajadores" con los datos recibidos
            $sql = DB::insert("INSERT INTO trabajadores(Nombre,Cedula,Cuenta,Ubicacion,Area,Cargo,Codigo,
            Region,Oficina,Tipo_de_computador,Marca,Modelo,Numero_de_serie,Id_producto,
            Procesador,Ram,Disco_duro,Gpu,Tipo_de_sistema,Display,Historial_asignacion,Procesos_a_ejecutar,Observaciones)
             VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [
                $request->nombre,
                $request->cedula,
                $request->cuenta,
                $request->ubicacion,
                $request->area,
                $request->cargo,
                $request->codigo,
                $request->region,
                $request->oficina,
                $request->tipo_computador,
                $request->marca,
                $request->modelo,
                $request->numero_serie,
                $request->id_producto,
                $request->procesador,
                $request->ram,
                $request->disco_duro,
                $request->gpu,
                $request->tipo_sistema,
                $request->display,
                $request->historial_asignacion,
                $request->procesos_ejecutar,
                $request->observaciones
            ]);
        } catch (\Throwable $th) {
            // Capturar cualquier excepción ocurrida durante la inserción
            $sql = 0;
        }
    
        // Verificar si la inserción fue exitosa y redirigir con un mensaje apropiado
        if ($sql == true) {
            return back()->with("Correcto", "Trabajador correctamente registrado");
        } else {
            return back()->with("Incorrecto", "Error al registrar");
        }
    }

    // Función para crear un nuevo registro en la tabla de equipos en la base de datos:
    public function create2(Request $request){
        try {
            // Realizar la inserción en la tabla "equipo" con los datos recibidos
            $sql = DB::insert("INSERT INTO trabajadores(Nombre,Cedula,Cuenta,Ubicacion,Area,Cargo,Codigo,
            Region,Oficina,Tipo_de_computador,Marca,Modelo,Numero_de_serie,Id_producto,
            Procesador,Ram,Disco_duro,Gpu,Tipo_de_sistema,Display,Historial_asignacion,Procesos_a_ejecutar,Observaciones)
             VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [
                $request->nombre,
                $request->cedula,
                $request->cuenta,
                $request->ubicacion,
                $request->area,
                $request->cargo,
                $request->codigo,
                $request->region,
                $request->oficina,
                $request->tipo_computador,
                $request->marca,
                $request->modelo,
                $request->numero_serie,
                $request->id_producto,
                $request->procesador,
                $request->ram,
                $request->disco_duro,
                $request->gpu,
                $request->tipo_sistema,
                $request->display,
                $request->historial_asignacion,
                $request->procesos_ejecutar,
                $request->observaciones
            ]);
        } catch (\Throwable $th) {
            // Capturar cualquier excepción ocurrida durante la inserción
            $sql = 0;
        }
    
        // Verificar si la inserción fue exitosa y redirigir con un mensaje apropiado
        if ($sql == true) {
            return back()->with("Correcto", "Trabajador correctamente registrado");
        } else {
            return back()->with("Incorrecto", "Error al registrar");
        }
    }

    // Función para crear un nuevo registro en la tabla de historico en la base de datos:
    public function create3(Request $request){
        try {
            // Realizar la inserción en la tabla "equipo" con los datos recibidos
            $sql = DB::insert("INSERT INTO trabajadores(Nombre,Cedula,Cuenta,Ubicacion,Area,Cargo,Codigo,
            Region,Oficina,Tipo_de_computador,Marca,Modelo,Numero_de_serie,Id_producto,
            Procesador,Ram,Disco_duro,Gpu,Tipo_de_sistema,Display,Historial_asignacion,Procesos_a_ejecutar,Observaciones)
             VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [
                $request->nombre,
                $request->cedula,
                $request->cuenta,
                $request->ubicacion,
                $request->area,
                $request->cargo,
                $request->codigo,
                $request->region,
                $request->oficina,
                $request->tipo_computador,
                $request->marca,
                $request->modelo,
                $request->numero_serie,
                $request->id_producto,
                $request->procesador,
                $request->ram,
                $request->disco_duro,
                $request->gpu,
                $request->tipo_sistema,
                $request->display,
                $request->historial_asignacion,
                $request->procesos_ejecutar,
                $request->observaciones
            ]);
        } catch (\Throwable $th) {
            // Capturar cualquier excepción ocurrida durante la inserción
            $sql = 0;
        }
    
        // Verificar si la inserción fue exitosa y redirigir con un mensaje apropiado
        if ($sql == true) {
            return back()->with("Correcto", "Trabajador correctamente registrado");
        } else {
            return back()->with("Incorrecto", "Error al registrar");
        }
    }

    // Función para actualizar un registro de la tabla trabajadores en la base de datos:
    public function update(Request $request){
        try {
            // Realizar la actualización del registro en la tabla "trabajadores" con los datos recibidos
            $sql = DB::update("UPDATE trabajadores SET Nombre=?, Cedula=?, Cuenta=?, Ubicacion=?, Area=?, Cargo=?, Codigo=?,
             Region=?, Oficina=?, Ram=?, Disco_duro=?, Tipo_de_sistema=?, Historial_asignacion=?, Procesos_a_ejecutar=?, Observaciones=? WHERE ID=?",[
                $request->nombre,
                $request->cedula,
                $request->cuenta,
                $request->ubicacion,
                $request->area,
                $request->cargo,
                $request->codigo,
                $request->region,
                $request->oficina,
                $request->ram,
                $request->disco_duro,
                $request->tipo_sistema,
                $request->historial_asignacion,
                $request->procesos_ejecutar,
                $request->observaciones,
                $request->id,
            ]);
    
            // Verificar si la actualización fue exitosa y redirigir con un mensaje apropiado
            if ($sql) {
                return back()->with("Correcto", "Trabajador correctamente modificado");
            } else {
                return back()->with("Incorrecto", "Error al modificar");
            }
        } catch (\Throwable $th) {
            // Capturar cualquier excepción ocurrida durante la actualización
            return back()->with("Incorrecto", "Error al modificar: " . $th->getMessage());
        }
    }

    // Función para actualizar un registro de la tabla equipos en la base de datos:
    public function update2(Request $request){
        try {
            // Realizar la actualización del registro en la tabla "trabajadores" con los datos recibidos
            $sql = DB::update("UPDATE trabajadores SET Nombre=?, Cedula=?, Cuenta=?, Ubicacion=?, Area=?, Cargo=?, Codigo=?,
             Region=?, Oficina=?, Ram=?, Disco_duro=?, Tipo_de_sistema=?, Historial_asignacion=?, Procesos_a_ejecutar=?, Observaciones=? WHERE ID=?",[
                $request->nombre,
                $request->cedula,
                $request->cuenta,
                $request->ubicacion,
                $request->area,
                $request->cargo,
                $request->codigo,
                $request->region,
                $request->oficina,
                $request->ram,
                $request->disco_duro,
                $request->tipo_sistema,
                $request->historial_asignacion,
                $request->procesos_ejecutar,
                $request->observaciones,
                $request->id,
            ]);
    
            // Verificar si la actualización fue exitosa y redirigir con un mensaje apropiado
            if ($sql) {
                return back()->with("Correcto", "Trabajador correctamente modificado");
            } else {
                return back()->with("Incorrecto", "Error al modificar");
            }
        } catch (\Throwable $th) {
            // Capturar cualquier excepción ocurrida durante la actualización
            return back()->with("Incorrecto", "Error al modificar: " . $th->getMessage());
        }
    }

    //funcion para actualizar un registro de la tabla de historico:
    public function update3(Request $request){
        try {
            // Realizar la actualización del registro en la tabla "trabajadores" con los datos recibidos
            $sql = DB::update("UPDATE trabajadores SET Nombre=?, Cedula=?, Cuenta=?, Ubicacion=?, Area=?, Cargo=?, Codigo=?,
             Region=?, Oficina=?, Ram=?, Disco_duro=?, Tipo_de_sistema=?, Historial_asignacion=?, Procesos_a_ejecutar=?, Observaciones=? WHERE ID=?",[
                $request->nombre,
                $request->cedula,
                $request->cuenta,
                $request->ubicacion,
                $request->area,
                $request->cargo,
                $request->codigo,
                $request->region,
                $request->oficina,
                $request->ram,
                $request->disco_duro,
                $request->tipo_sistema,
                $request->historial_asignacion,
                $request->procesos_ejecutar,
                $request->observaciones,
                $request->id,
            ]);
    
            // Verificar si la actualización fue exitosa y redirigir con un mensaje apropiado
            if ($sql) {
                return back()->with("Correcto", "Trabajador correctamente modificado");
            } else {
                return back()->with("Incorrecto", "Error al modificar");
            }
        } catch (\Throwable $th) {
            // Capturar cualquier excepción ocurrida durante la actualización
            return back()->with("Incorrecto", "Error al modificar: " . $th->getMessage());
        }
    }

    //Funcion para poder descargar la BDD con todos los datos registrados:
    public function descargarDatos(){
        $datos = DB::table('trabajadores')->get()->toArray();
        $csvFileName = 'BDD_Eiatec.csv';

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=".$csvFileName,
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $callback = function() use ($datos) {
            $file = fopen('php://output', 'w');

            // Encabezado CSV
            fputcsv($file, array_keys((array) $datos[0]));

            // Datos
            foreach ($datos as $dato) {
                fputcsv($file, (array) $dato);
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }
}
