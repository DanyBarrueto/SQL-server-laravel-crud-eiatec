<?php

// Importar los espacios de nombres necesarios
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

// Definir la clase del controlador y extenderla de Controller
class CrudController extends Controller
{

    // Función para mostrar todos los registros de las tablas de trabajadores, equipos e historico en la BDD

        public function index(){

        $trabajadores = DB::select("SELECT Trabajadores.ID_trabajador, Trabajadores.Cedula, Trabajadores.Nombre, 
                                Expedicion.Lugar AS LugarExpedicion, 
                                Cargo.Cargo AS Cargo,
                                Trabajadores.Correo,
                                Trabajadores.Contraseña,
                                Coordinadores.Nombre AS NombreCoordinador, 
                                Ubicacion.Ubicacion AS Ubicacion,
                                Trabajadores.Telefono
                                FROM Trabajadores
                                INNER JOIN Expedicion ON Trabajadores.ID_expedicion = Expedicion.ID_expedicion
                                INNER JOIN Cargo ON Trabajadores.ID_cargo = Cargo.ID_cargo
                                INNER JOIN Coordinadores ON Trabajadores.ID_coordinacion = Coordinadores.ID_coordinador
                                INNER JOIN Ubicacion ON Trabajadores.ID_ubicacion = Ubicacion.ID_ubicacion
                                ORDER BY Trabajadores.ID_trabajador DESC");

        
        $equipos = DB::select("SELECT Equipos.ID_equipo,Equipos.Estado,Equipos.Codigo,Equipos.Modelo,Equipos.Num_serie,
                            Equipos.Id_producto,Equipos.Procesador,Equipos.Ram,Equipos.Disco,Equipos.GPU_APU,
                            Equipos.Sistema_operativo,Equipos.Display,Equipos.Anydesk,Equipos.Clave_equipo,Equipos.ID_trabajador,
                            Tipo.Modalidad AS Tipo,
                            Marca.Nombre AS Marca,
                            Licencia.Licencia AS Tipo_licencia,
                            Ubicacion.Ubicacion AS Ubicacion,
                            Oficinas.Oficina AS Oficina,
                            Direccion.Direccion AS Direccion,
                            Trabajadores.Nombre AS Nombre_trabajador
                            FROM Equipos
                            LEFT JOIN Tipo ON Equipos.ID_tipo = Tipo.ID_tipo
                            LEFT JOIN Marca ON Equipos.ID_marca = Marca.ID_marca
                            LEFT JOIN Licencia ON Equipos.ID_licencia = Licencia.ID_licencia
                            LEFT JOIN Ubicacion ON Equipos.ID_ubicacion = Ubicacion.ID_ubicacion
                            LEFT JOIN Oficinas ON Equipos.ID_oficina = Oficinas.ID_oficina
                            LEFT JOIN Direccion ON Equipos.ID_direccion = Direccion.ID_direccion
                            LEFT JOIN Trabajadores ON Equipos.ID_trabajador = Trabajadores.ID_trabajador
                            ORDER BY Equipos.ID_equipo DESC");

        $historico = DB::select("SELECT * FROM Historico ORDER BY ID_historico DESC");

        $coordinador = DB::select("SELECT * FROM Coordinadores");

        $expedicion = DB::select("SELECT * FROM Expedicion ORDER BY ID_expedicion ASC");

        $cargo = DB::select("SELECT * FROM Cargo ORDER BY ID_cargo ASC");

        // Retornar la vista "Welcome" con los datos obtenidos
        return view("Welcome")->with(compact('trabajadores', 'equipos', 'historico','coordinador','expedicion','cargo'));
        }



    //Funciones para las busquedas de los registros en cada tabla

        // Función para buscar registros en la tabla trabajadores en la base de datos:

        public function buscar(Request $request){
                // Obtener el texto de búsqueda desde la solicitud
                $texto = trim($request->get('texto'));
                
                // Realizar la consulta a la base de datos utilizando la consulta SQL
                $trabajadores = DB::select("SELECT Trabajadores.ID_trabajador, Trabajadores.Cedula, Trabajadores.Nombre, 
                                            Expedicion.Lugar AS LugarExpedicion, 
                                            Cargo.Cargo AS Cargo,
                                            Trabajadores.Correo,
                                            Trabajadores.Contraseña,
                                            Coordinadores.Nombre AS NombreCoordinador, 
                                            Ubicacion.Ubicacion AS Ubicacion,
                                            Trabajadores.Telefono
                                            FROM Trabajadores
                                            INNER JOIN Expedicion ON Trabajadores.ID_expedicion = Expedicion.ID_expedicion
                                            INNER JOIN Cargo ON Trabajadores.ID_cargo = Cargo.ID_cargo
                                            INNER JOIN Coordinadores ON Trabajadores.ID_coordinacion = Coordinadores.ID_coordinador
                                            INNER JOIN Ubicacion ON Trabajadores.ID_ubicacion = Ubicacion.ID_ubicacion
                                            WHERE Trabajadores.ID_trabajador LIKE ? OR
                                                Trabajadores.Cedula LIKE ? OR
                                                Trabajadores.Nombre LIKE ?
                                            ORDER BY Trabajadores.ID_trabajador ", 
                                            ['%'.$texto.'%', '%'.$texto.'%', '%'.$texto.'%']);
            
                // Retornar la vista "Welcome" con los datos de la búsqueda y el texto de búsqueda
                return view('Welcome', compact('trabajadores', 'texto'));        
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



    //Funciones para la creacion de nuevos registros en las diferentes tablas

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



    // Funciones para actualizar un registro de las tablas de la base de datos:

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



    //Funciones para poder descargar las tablas de la base de datos con todos los datos registrados:

        //Funcion para descargar la tabla de trabajadores
            
        public function descargarDatos(){
                $trabajadores = DB::table('Trabajadores')->get()->toArray();
                $csvFileName = 'BDD_Eiatec_Trabajadores.csv';

                $headers = array(
                    "Content-type" => "text/csv",
                    "Content-Disposition" => "attachment; filename=".$csvFileName,
                    "Pragma" => "no-cache",
                    "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                    "Expires" => "0"
                );

                $callback = function() use ($trabajadores) {
                    $file = fopen('php://output', 'w');

                    // Encabezado CSV
                    fputcsv($file, array_keys((array) $trabajadores[0]));

                    // Datos
                    foreach ($trabajadores as $dato) {
                        fputcsv($file, (array) $dato);
                    }

                    fclose($file);
                };

                return new StreamedResponse($callback, 200, $headers);
        }

        //Funcion para descargar la tabla de equipos
            
        public function descargarDatos2(){
                $equipos = DB::table('Equipos')->get()->toArray();
                $csvFileName = 'BDD_Eiatec_Equipos.csv';

                $headers = array(
                    "Content-type" => "text/csv",
                    "Content-Disposition" => "attachment; filename=".$csvFileName,
                    "Pragma" => "no-cache",
                    "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                    "Expires" => "0"
                );

                $callback = function() use ($equipos) {
                    $file = fopen('php://output', 'w');

                    // Encabezado CSV
                    fputcsv($file, array_keys((array) $equipos[0]));

                    // Datos
                    foreach ($equipos as $dato) {
                        fputcsv($file, (array) $dato);
                    }

                    fclose($file);
                };

                return new StreamedResponse($callback, 200, $headers);
        }

        //Funcion para descargar la tabla de historico

        public function descargarDatos3(){
                $historico = DB::table('Historico')->get()->toArray();
                $csvFileName = 'BDD_Eiatec_Historico.csv';

                $headers = array(
                    "Content-type" => "text/csv",
                    "Content-Disposition" => "attachment; filename=".$csvFileName,
                    "Pragma" => "no-cache",
                    "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                    "Expires" => "0"
                );

                $callback = function() use ($historico) {
                    $file = fopen('php://output', 'w');

                    // Encabezado CSV
                    fputcsv($file, array_keys((array) $historico[0]));

                    // Datos
                    foreach ($historico as $dato) {
                        fputcsv($file, (array) $dato);
                    }

                    fclose($file);
                };

                return new StreamedResponse($callback, 200, $headers);
        }
 
}