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
                                    Trabajadores.ID_coordinacion,
                                    Trabajadores.ID_expedicion,
                                    Trabajadores.Correo,
                                    Trabajadores.ID_ubicacion,
                                    Trabajadores.Contraseña,
                                    Trabajadores.ID_cargo,
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
                                Equipos.Id_producto,Equipos.Procesador,Equipos.Ram,Equipos.Disco,Equipos.GPU_APU,Equipos.ID_licencia,
                                Equipos.Sistema_operativo,Equipos.Display,Equipos.Anydesk,Equipos.Clave_equipo,Equipos.ID_trabajador,
                                Equipos.ID_oficina,Equipos.ID_direccion,Equipos.ID_ubicacion,
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
    
        $oficina = DB::select("SELECT * FROM Oficinas ORDER BY ID_oficina ASC");
    
        $licencia = DB::select("SELECT * FROM Licencia ORDER BY ID_licencia ASC");
        
        $direccion = DB::select("SELECT * FROM Direccion ORDER BY ID_direccion ASC");
    
        $ubicacion = DB::select("SELECT * FROM Ubicacion ORDER BY ID_ubicacion ASC");
    
        return view("Welcome")->with(compact('trabajadores', 'equipos', 'historico','coordinador','expedicion','cargo','oficina','licencia','direccion','ubicacion'));
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
                                        Trabajadores.ID_expedicion,
                                        Trabajadores.Contraseña,
                                        Trabajadores.ID_cargo,
                                        Trabajadores.ID_coordinacion,
                                        Trabajadores.ID_ubicacion,
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

            $equipos = DB::select("SELECT Equipos.ID_equipo,Equipos.Estado,Equipos.Codigo,Equipos.Modelo,Equipos.Num_serie,
                                        Equipos.Id_producto,Equipos.Procesador,Equipos.Ram,Equipos.Disco,Equipos.GPU_APU,Equipos.ID_licencia,
                                        Equipos.Sistema_operativo,Equipos.Display,Equipos.Anydesk,Equipos.Clave_equipo,Equipos.ID_trabajador,
                                        Equipos.ID_oficina,Equipos.ID_direccion,Equipos.ID_ubicacion,
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
            
            // Obtener la lista de expediciones
            $expedicion = DB::select("SELECT * FROM Expedicion ORDER BY ID_expedicion ASC");

            $historico = DB::select("SELECT * FROM Historico ORDER BY ID_historico DESC");
    
            $coordinador = DB::select("SELECT * FROM Coordinadores");
            
            $cargo = DB::select("SELECT * FROM Cargo ORDER BY ID_cargo ASC");
        
            $oficina = DB::select("SELECT * FROM Oficinas ORDER BY ID_oficina ASC");
        
            $licencia = DB::select("SELECT * FROM Licencia ORDER BY ID_licencia ASC");
            
            $direccion = DB::select("SELECT * FROM Direccion ORDER BY ID_direccion ASC");
        
            $ubicacion = DB::select("SELECT * FROM Ubicacion ORDER BY ID_ubicacion ASC");

            $historico = DB::select("SELECT * FROM Historico ORDER BY ID_historico DESC");
        
            // Retornar la vista "Welcome" con los datos de la búsqueda y el texto de búsqueda
            return view('Welcome', compact('trabajadores','coordinador','expedicion','cargo','oficina','licencia','direccion','ubicacion','equipos','historico'));        
        }
        
        // Función para buscar registros en la tabla equipos en la base de datos:

        public function buscar2(Request $request){
            // Obtener el texto de búsqueda desde la solicitud
            $texto = trim($request->get('texto'));
            
            // Realizar la consulta a la base de datos utilizando la consulta SQL
            $equipos = DB::select("SELECT Equipos.ID_equipo, Equipos.Estado, Equipos.Codigo, Equipos.ID_tipo, Equipos.ID_marca, Equipos.Modelo, Equipos.Num_serie,
                                Equipos.Id_producto, Equipos.Procesador, Equipos.Ram, Equipos.Disco, Equipos.GPU_APU, Equipos.ID_licencia, Equipos.Sistema_operativo,
                                Equipos.Display, Equipos.Anydesk, Equipos.ID_ubicacion, Equipos.ID_oficina, Equipos.ID_direccion, Equipos.Clave_equipo, Equipos.ID_trabajador,
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
                                WHERE Equipos.ID_equipo LIKE ? OR
                                      Equipos.Codigo LIKE ?
                                ORDER BY Equipos.ID_equipo ASC", ['%'.$texto.'%', '%'.$texto.'%']);



            $trabajadores = DB::select("SELECT Trabajadores.ID_trabajador, Trabajadores.Cedula, Trabajadores.Nombre, 
                                Expedicion.Lugar AS LugarExpedicion, 
                                Cargo.Cargo AS Cargo,
                                Trabajadores.ID_coordinacion,
                                Trabajadores.ID_expedicion,
                                Trabajadores.Correo,
                                Trabajadores.ID_ubicacion,
                                Trabajadores.Contraseña,
                                Trabajadores.ID_cargo,
                                Coordinadores.Nombre AS NombreCoordinador, 
                                Ubicacion.Ubicacion AS Ubicacion,
                                Trabajadores.Telefono
                                FROM Trabajadores
                                INNER JOIN Expedicion ON Trabajadores.ID_expedicion = Expedicion.ID_expedicion
                                INNER JOIN Cargo ON Trabajadores.ID_cargo = Cargo.ID_cargo
                                INNER JOIN Coordinadores ON Trabajadores.ID_coordinacion = Coordinadores.ID_coordinador
                                INNER JOIN Ubicacion ON Trabajadores.ID_ubicacion = Ubicacion.ID_ubicacion
                                ORDER BY Trabajadores.ID_trabajador DESC");

            // Obtener la lista de expediciones
            $expedicion = DB::select("SELECT * FROM Expedicion ORDER BY ID_expedicion ASC");
            
            // Obtener las demás listas necesarias (igual que en la función buscar)
            $historico = DB::select("SELECT * FROM Historico ORDER BY ID_historico DESC");
            $coordinador = DB::select("SELECT * FROM Coordinadores");
            $cargo = DB::select("SELECT * FROM Cargo ORDER BY ID_cargo ASC");
            $oficina = DB::select("SELECT * FROM Oficinas ORDER BY ID_oficina ASC");
            $licencia = DB::select("SELECT * FROM Licencia ORDER BY ID_licencia ASC");
            $direccion = DB::select("SELECT * FROM Direccion ORDER BY ID_direccion ASC");
            $ubicacion = DB::select("SELECT * FROM Ubicacion ORDER BY ID_ubicacion ASC");
            
            // Retornar la vista "Welcome" con los datos de la búsqueda y las listas necesarias
            return view('Welcome', compact('equipos', 'expedicion', 'historico', 'coordinador', 'cargo', 'oficina', 'licencia', 'direccion', 'ubicacion','trabajadores'));        
        }
        
        //Función para buscar registros en la tabla de historico en la base de datos:

        public function buscar3(Request $request){
            // Obtener el texto de búsqueda desde la solicitud
            $texto = trim($request->get('texto'));
            
            // Realizar la consulta a la base de datos utilizando la consulta SQL
            $historico = DB::select("SELECT * FROM Historico 
                                     WHERE ID_historico LIKE ? OR
                                           ID_equipo LIKE ? OR
                                           Historial_asignaciones LIKE ? OR
                                           Procesos_a_ejecutar LIKE ? OR
                                           Anotaciones LIKE ?
                                     ORDER BY ID_historico DESC", 
                                     ['%'.$texto.'%', '%'.$texto.'%', '%'.$texto.'%', '%'.$texto.'%', '%'.$texto.'%']);

            $trabajadores = DB::select("SELECT Trabajadores.ID_trabajador, Trabajadores.Cedula, Trabajadores.Nombre, 
                                    Expedicion.Lugar AS LugarExpedicion, 
                                    Cargo.Cargo AS Cargo,
                                    Trabajadores.ID_coordinacion,
                                    Trabajadores.ID_expedicion,
                                    Trabajadores.Correo,
                                    Trabajadores.ID_ubicacion,
                                    Trabajadores.Contraseña,
                                    Trabajadores.ID_cargo,
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
                                    Equipos.Id_producto,Equipos.Procesador,Equipos.Ram,Equipos.Disco,Equipos.GPU_APU,Equipos.ID_licencia,
                                    Equipos.Sistema_operativo,Equipos.Display,Equipos.Anydesk,Equipos.Clave_equipo,Equipos.ID_trabajador,
                                    Equipos.ID_oficina,Equipos.ID_direccion,Equipos.ID_ubicacion,
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
        
            // Obtener las demás listas necesarias (igual que en la función buscar)
            $coordinador = DB::select("SELECT * FROM Coordinadores");
            $cargo = DB::select("SELECT * FROM Cargo ORDER BY ID_cargo ASC");
            $oficina = DB::select("SELECT * FROM Oficinas ORDER BY ID_oficina ASC");
            $licencia = DB::select("SELECT * FROM Licencia ORDER BY ID_licencia ASC");
            $direccion = DB::select("SELECT * FROM Direccion ORDER BY ID_direccion ASC");
            $ubicacion = DB::select("SELECT * FROM Ubicacion ORDER BY ID_ubicacion ASC");
            $expedicion = DB::select("SELECT * FROM Expedicion ORDER BY ID_expedicion ASC");

            // Retornar la vista "Welcome" con los datos de la búsqueda y las listas necesarias
            return view('Welcome', compact('historico', 'coordinador', 'cargo', 'oficina', 'licencia', 'direccion', 'ubicacion','expedicion','trabajadores','equipos'));        
        }
        
        

    //Funciones para la creacion de nuevos registros en las diferentes tablas

        // Función para crear un nuevo registro en la tabla de trabajadores en la base de datos:

        public function create(Request $request){
            try {
                // Realizar la inserción en la tabla "Trabajadores" con los datos recibidos
                $sql = DB::insert("INSERT INTO Trabajadores(
                    Nombre, Cedula, ID_expedicion, ID_coordinacion, Correo, ID_ubicacion, Contraseña, ID_cargo, Telefono
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", [
                    $request->nombre,
                    $request->cedula,
                    $request->ID_expedicion,
                    $request->coordinador_id,
                    $request->correo,
                    $request->ubicacion,
                    $request->contraseña,
                    $request->cargo,
                    $request->telefono
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
                $sql = DB::update("UPDATE Trabajadores SET Nombre=?, Cedula=?, ID_expedicion=?, Correo=?, ID_ubicacion=?, ID_cargo=?, Telefono=?, ID_coordinacion=?, Contraseña=?  WHERE ID_trabajador=?",[
                    $request->nombre,
                    $request->cedula,
                    $request->ID_expedicion,
                    $request->correo,
                    $request->ubicacion,
                    $request->cargo,
                    $request->telefono,
                    $request->coordinador_id,
                    $request->contraseña,
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
                // Realizar la actualización del registro en la tabla "equipos" con los datos recibidos
                $sql = DB::update("UPDATE Equipos SET Estado=?, Codigo=?, Ram=?, Disco=?, Anydesk=?, Sistema_operativo=?, ID_licencia=?, ID_ubicacion=?, ID_oficina=?, ID_direccion=?, Clave_equipo=?, ID_trabajador=? WHERE ID_equipo=?",[
                    $request->estado,
                    $request->codigo,
                    $request->ram,
                    $request->disco_duro,
                    $request->anydesk,
                    $request->tipo_sistema,
                    $request->licencia,
                    $request->ubicacion,
                    $request->oficina,
                    $request->direccion,
                    $request->clave_equipo,
                    $request->trabajador_id,
                    $request->id,
                ]);
        
                // Verificar si la actualización fue exitosa y redirigir con un mensaje apropiado
                if ($sql) {
                    return back()->with("Correcto", "Equipo correctamente modificado");
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
                // Realizar la actualización del registro en la tabla "Historico" con los datos recibidos
                $sql = DB::update("UPDATE Historico SET 
                    Historial_asignaciones=?, 
                    Procesos_a_ejecutar=?, 
                    Anotaciones=? 
                    WHERE ID_historico=?", [
                        $request->historial_asignacion,
                        $request->procesos_ejecutar,
                        $request->anotaciones,
                        $request->id,
                ]);
                
                // Verificar si la actualización fue exitosa y redirigir con un mensaje apropiado
                if ($sql) {
                    return back()->with("Correcto", "Historial correctamente modificado");
                } else {
                    return back()->with("Incorrecto", "Error al modificar el historial");
                }
            } catch (\Throwable $th) {
                // Capturar cualquier excepción ocurrida durante la actualización
                return back()->with("Incorrecto", "Error al modificar el historial: " . $th->getMessage());
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
 
        //Funcion para descargar toda la BDD

        public function descargarDatos4() {
            // Obtener los nombres de todas las tablas de la base de datos
            $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        
            // Inicializar un array para almacenar todos los datos
            $allData = [];
        
            foreach ($tables as $table) {
                // Obtener los datos de cada tabla y agregarlos al array
                $data = DB::table($table)->get()->toArray();
                $allData[$table] = $data;
            }
        
            // Nombre del archivo CSV
            $csvFileName = 'BDD_Eiatec_Toda.csv';
        
            // Encabezados para la respuesta HTTP
            $headers = array(
                "Content-type" => "text/csv",
                "Content-Disposition" => "attachment; filename=".$csvFileName,
                "Pragma" => "no-cache",
                "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                "Expires" => "0"
            );
        
            // Función de devolución de llamada para generar el archivo CSV
            $callback = function() use ($allData) {
                $file = fopen('php://output', 'w');
        
                foreach ($allData as $tableName => $tableData) {
                    // Escribir el nombre de la tabla como encabezado
                    fputcsv($file, [$tableName]);
        
                    // Encabezado CSV
                    fputcsv($file, array_keys((array) $tableData[0]));
        
                    // Datos
                    foreach ($tableData as $dato) {
                        fputcsv($file, (array) $dato);
                    }
        
                    // Agregar una línea en blanco entre las tablas
                    fputcsv($file, []);
                }
        
                fclose($file);
            };
        
            // Retornar la respuesta HTTP como una respuesta de flujo
            return new StreamedResponse($callback, 200, $headers);
        }

}