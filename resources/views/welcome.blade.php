<!DOCTYPE html>
<html lang="es" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2460b47c04.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="icon" href="{{ asset('img/Icono_logo.png.') }}" type="image/x-icon">
    <title>Eiatec</title>
</head>
<body>

<!--Menu de navegación junto con el logo de la empresa-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <a class="navbar-brand">
                <img src="{{ asset('img/Logo_eiatec.png') }}" alt="Logo" style="width: 20%; height: auto; margin-left:15vh;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item active" style="width:8vw;">
                        <a class="nav-link nav1 fw-bold" href="#">Registrar <i class="fa-solid fa-pen-clip"></i> <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item" style="width:8.2vw;">
                        <a class="nav-link nav2 fw-bold" href="#consultar">Consultar <i class="fa-solid fa-magnifying-glass"></i> </a>
                    </li>

                    <li class="nav-item" style="width:6.3vw;">
                        <a class="nav-link nav3 fw-bold" href="#tablas">Tablas <i class="fa-solid fa-table-list"></i> </a>
                    </li>

                    <!--Para descargar la base de datos junto con todos sus datos-->
                    <li class="nav-item" style="width:11.5vw;">
                        <a class="nav-link nav4 fw-bold" href="{{ route('descargar.datos4') }}">Descargar BDD <i class="fa-solid fa-download"></i> </a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

<br><br>
<br>
<!--Mensajes para notificar si el registro se guardo o actualizo bien o si llego a fallar durante el proceso-->
    @if (session("Correcto"))
    <div class="alert alert-success fw-bold fs-5 ">{{session("Correcto")}}</div>
    @endif

    @if (session("Incorrecto"))
    <div class="alert alert-danger fw-bold fs-5">{{session("Incorrecto")}}</div>
    @endif

<!--Formularios principales para poder ingresar los datos en las tablas de la BDD-->
    <div class="container">
        <br>
    <!--Formulario principal, registro de los datos personales en la tabla Trabajadores-->
        <h3 class="fw-bold text-center">Registro</h3>

        <hr>

        <h4 class="fw-bold">Datos personales del trabajador:</h4>

        <div class="row justify-content-center" id="registro_trabajador">
            <form class="col-md-8" action="{{route("example-app.create")}}" method="post" style="width: 200vh;">
                @csrf
                <div class="row">

                    <!--campo para insertar la cedula-->

                    <div class="col-md-2">
                        <label for="cedula" class="form-label fw-bold">Cédula:</label>
                        <input type="text" id="cedula" name="cedula" class="form-control border-dark text-white"  pattern="[0-9]+" title="Por favor ingresa solo números" required />
                    </div>

                    <!--lista desplegable para elegir el lugar de la expedicion de la cedula-->

                    <div class="col-md-3">
                        <label for="ID_expedicion" class="form-label fw-bold">Lugar de Expedición:</label>
                        <select name="ID_expedicion" id="ID_expedicion" class="form-select border-dark text-white" required>
                                <option value=""></option>
                            @foreach ($expedicion as $expedicionB)
                                <option value="{{ $expedicionB->ID_expedicion }}">{{ $expedicionB->Lugar }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!--campo para insertar el nombre-->

                    <div class="col-md-3">
                        <label for="nombre" class="form-label fw-bold">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control border-dark text-white" pattern="[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+" title="Por favor ingresa solo letras" required />
                    </div>

                    <!--lista desplegable para elegir a uno de los coordinadores-->

                    <div class="col-md-4">
                        <label for="coordinador_id" class="form-label fw-bold">Coordinador Asignado:</label>
                        <select name="coordinador_id" id="coordinador_id" class="form-select border-dark text-white" required>
                                <option value=""></option>
                            @foreach ($coordinador as $coordinadorB)
                                <option value="{{ $coordinadorB->ID_coordinador }}">{{ $coordinadorB->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!--lista desplegable para elegir uno de los cargos-->

                    <div class="col-md-8">
                        <label for="cargo" class="form-label fw-bold">Cargo Asignado:</label>
                        <select name="cargo" id="cargo" class="form-select border-dark text-white" required>
                                <option value=""></option>
                            @foreach ($cargo as $cargoB)
                                <option value="{{ $cargoB->ID_cargo }}">{{ $cargoB->Cargo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!--campo para insertar la cuenta de correo electonico-->

                    <div class="col-md-4">
                        <label for="correo" class="form-label fw-bold">Correo:</label>
                        <input type="text" id="correo" name="correo" class="form-control border-dark text-white" required />
                    </div>

                    <!--campo para insertar la contraseña de la cuenta-->

                    <div class="col-md-3">
                        <label for="contraseña" class="form-label fw-bold">Contraseña:</label>
                        <input type="text" id="contraseña" name="contraseña" class="form-control border-dark text-white" required />
                    </div>

                    <!--campo para insertar el numero de telefono-->

                    <div class="col-md-2">
                        <label for="telefono" class="form-label fw-bold">Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" class="form-control border-dark text-white" required />
                    </div>

                    <!--lista desplegable para elegir la ubicacion-->

                    <div class="col-md-3">
                        <label for="ubicacion" class="form-label fw-bold">Ubicación:</label>
                        <select id="ubicacion" name="ubicacion" class="form-select border-dark text-white" required>
                            <option value=""></option>
                            <option value="1">Bogotá</option>
                            <option value="2">Riohacha</option>
                            <option value="3">Neiva</option>
                            <option value="4">Vencia</option>
                            <option value="5">Valledupar </option>
                            <option value="6">Ibague</option>
                            <option value="7">Santa Marta</option>
                            <option value="8">Uribia</option>
                            <option value="9">Sogamoso</option>
                            <option value="10">Puente Nacional</option>
                            <option value="11">Tunja</option>
                            <option value="12">Villavicencio</option>
                        </select>                        
                    </div>
                    
                </div> 
                
                <!--Boton para enviar los datos del trabajador a la base de datos-->
                <div class="col-md-1">
                    <input type="submit" name="submit" value="Enviar" class="btn btn-lg mt-2 fw-bold boton_enviar" id="boton_enviar" />
                </div>

                <hr>
            </form>
        </div>

    <!--Formulario secundario para registrar datos del equipo en la tabla Equipos-->
                <div class="container">
                    <div class="row justify-content-center" id="registro_equipo">
                        <form class="col-md-8" action="{{route("example-app.create2")}}" method="post" style="width: 200vh;">
                            @csrf
                            <div class="row">

                                <h4 class="fw-bold">Datos del equipo:</h4>

                                <!--lista desplegable para elegir el estado de asignacion del equipo-->

                                <div class="col-md-2">
                                    <label for="estado" class="form-label fw-bold">Estado:</label>
                                    <select id="estado" name="estado" class="form-select border-dark text-white" required>
                                        <option value=""></option>
                                        <option value="De_baja">De baja</option>
                                        <option value="Disponible">Disponible</option>
                                        <option value="En_garantia">En garantia</option>
                                        <option value="Ilocalizado">Ilocalizado</option>
                                        <option value="No_aplica">No aplica</option>
                                        <option value="Pendiente">Pendiente</option>
                                    </select>                    
                                </div>

                                <!--campo para ingresar el codigo designado al equipo-->

                                <div class="col-md-2">
                                    <label for="codigo" class="form-label fw-bold">Código:</label>
                                    <input type="text" id="codigo" name="codigo" class="form-control border-dark text-white" required />
                                </div>

                                <!--lista desplegable para elegir el tipo de computador (portatil,mesa,etc)-->

                                <div class="col-md-2">
                                    <label for="tipo_computador" class="form-label fw-bold">Tipo de Computador:</label>
                                    <select id="tipo_computador" name="tipo_computador" class="form-select border-dark text-white" required>
                                        <option value=""></option>
                                        <option value="1">Mesa</option>
                                        <option value="2">Portatil</option>
                                        <option value="3">All in one</option>
                                        <option value="5">Personal</option>
                                    </select>
                                </div>

                                <!--lista desplegable para elegir la marca del equipo (HP,DELL,etc)-->
                
                                <div class="col-md-2">
                                    <label for="marca" class="form-label fw-bold">Marca:</label>
                                    <select id="marca" name="marca" class="form-select border-dark text-white" required>
                                        <option value=""></option>
                                        <option value="1">Acer</option>
                                        <option value="2">Asus</option>
                                        <option value="3">Lenovo</option>
                                        <option value="4">Huawei</option>
                                        <option value="5">HP</option>
                                        <option value="6">Apple</option>
                                        <option value="7">Dell</option>
                                        <option value="8">Toshiba</option>
                                        <option value="9">Alienware</option>
                                    </select>
                                </div>

                                <!--campo para ingresar el modelo del equipo-->

                                <div class="col-md-4">
                                    <label for="modelo" class="form-label fw-bold">Modelo:</label>
                                    <input type="text" id="modelo" name="modelo" class="form-control border-dark text-white" required />
                                </div>

                                <!--campo para ingresar el numero de serie del equipo-->

                                <div class="col-md-3">
                                    <label for="numero_serie" class="form-label fw-bold">Numero de Serie:</label>
                                    <input type="text" id="numero_serie" name="numero_serie" class="form-control border-dark text-white" required />
                                </div>

                                <!--campo para ingresar el id del producto-->

                                <div class="col-md-3">
                                    <label for="id_producto" class="form-label fw-bold">Id Producto:</label>
                                    <input type="text" id="id_producto" name="id_producto" class="form-control border-dark text-white" required />
                                </div>

                                <!--lista desplegable para ingresar el sistema operativo-->

                                <div class="col-md-2">
                                    <label for="tipo_sistema" class="form-label fw-bold">Sistema Operativo:</label>
                                    <select id="tipo_sistema" name="tipo_sistema" class="form-select border-dark text-white" required>
                                        <option value=""></option>
                                        <option value="Windows10">Windows 10</option>
                                        <option value="Windows11">Windows 11</option>
                                        <option value="Windows12">Windows 12</option>
                                    </select>
                                </div>

                                <!--lista desplegable para ingresar la licencia (osea si tiene windows home, pro, etc)-->

                                <div class="col-md-3">
                                    <label for="licencia" class="form-label fw-bold">Licencia:</label>
                                    <select name="licencia" id="licencia" class="form-select border-dark text-white" required>
                                            <option value=""></option>
                                        @foreach ($licencia as $licenciaB)
                                            <option value="{{ $licenciaB->ID_licencia }}">{{ $licenciaB->Licencia }}</option>
                                        @endforeach
                                    </select>
                                </div> 

                                <!--lista deplegable para elegir la capacidad de la Ram-->

                                <div class="col-md-1">
                                    <label for="ram" class="form-label fw-bold">Ram:</label>
                                    <select id="ram" name="ram" class="form-select border-dark text-white" required>
                                        <option value=""></option>
                                        <option value="4GB">4GB</option>
                                        <option value="8GB">8GB</option>
                                        <option value="12GB">12GB</option>
                                        <option value="16GB">16GB</option>
                                        <option value="24GB">24GB</option>
                                        <option value="32GB">32GB</option>
                                        <option value="48GB">48GB</option>                            
                                        <option value="64GB">64GB</option>
                                    </select>
                                </div>

                                <!--campo para ingresar cual es el procesador-->

                                <div class="col-md-6">
                                    <label for="procesador" class="form-label fw-bold">Procesador:</label>
                                    <input type="text" id="procesador" name="procesador" class="form-control text-center border-dark text-white" required />
                                </div>

                                <!--campo para ingresar la grafica o controlador grafico del equipo-->

                                <div class="col-md-6">
                                    <label for="gpu" class="form-label fw-bold">Gpu/Apu:</label>
                                    <input type="text" id="gpu" name="gpu" class="form-control text-center border-dark text-white" required />
                                </div>

                                <!--lista desplegable para elegir la pantalla del equipo-->

                                <div class="col-md-2">
                                    <label for="display" class="form-label fw-bold">Display:</label>
                                    <select id="display" name="display" class="form-select border-dark text-white" required>
                                        <option value=""></option>
                                        <option value="16  FHD">16 FHD</option>
                                        <option value="14  HD">14 HD</option>
                                        <option value="15,6 FHD">15,6 FHD</option>
                                        <option value="14  IPS">14 IPS</option>
                                        <option value="14  HD Display">14 HD</option>
                                        <option value="17 ,3  FHD">17 ,3 FHD</option>
                                        <option value="15,6  HD">15,6 HD</option>
                                        <option value="14  FHD">14 FHD</option>
                                        <option value="14  HD">14 HD</option>
                                        <option value="15,6 LCD">15,6 LCD</option>
                                        <option value="14 FHD">14 FHD</option>
                                        <option value="15  Full HD">15 Full HD</option>
                                        <option value="15,6  FHD">15,6 FHD</option>
                                        <option value="14  FHD">14 FHD</option>
                                        <option value="15,6  HD">15,6 HD</option>
                                    </select>
                                </div>

                                <!--lista desplegable para elegir la cantidad de almacenamiento del disco duro-->

                                <div class="col-md-2">
                                    <label for="disco_duro" class="form-label fw-bold">Disco duro:</label>
                                    <select id="disco_duro" name="disco_duro" class="form-select border-dark text-white" required>
                                        <option value=""></option>
                                        <option value="128GB">128 GB</option>
                                        <option value="250GB">250 GB</option>
                                        <option value="512GB">512 GB</option>
                                        <option value="1TB">1 TB</option>
                                        <option value="1TB+128GB">1 TB + 128 GB</option>
                                        <option value="1TB+250GB">1 TB + 250 GB</option>
                                        <option value="1TB+512GB">1 TB + 512 GB</option>
                                        <option value="1TB+1TB">1 TB + 1 TB</option>
                                        <option value="2TB">2 TB</option>
                                    </select>
                                </div>

                                <!--campo para ingresar el codigo del anydesk para conectarse-->

                                <div class="col-md-2">
                                    <label for="anydesk" class="form-label fw-bold">Anydesk:</label>
                                    <input type="text" id="anydesk" name="anydesk" class="form-control text-center border-dark text-white"  required />
                                </div>

                                <!--lista desplegable para elegir la ubicacion de donde se encuentra el equipo-->

                                <div class="col-md-2">
                                    <label for="ubicacion" class="form-label fw-bold">Ubicación:</label>
                                    <select id="ubicacion" name="ubicacion" class="form-select border-dark text-white" required>
                                        <option value=""></option>
                                        <option value="1">Bogotá</option>
                                        <option value="2">Riohacha</option>
                                        <option value="3">Neiva</option>
                                        <option value="4">Vencia</option>
                                        <option value="5">Valledupar </option>
                                        <option value="6">Ibague</option>
                                        <option value="7">Santa Marta</option>
                                        <option value="8">Uribia</option>
                                        <option value="9">Sogamoso</option>
                                        <option value="10">Puente Nacional</option>
                                        <option value="11">Tunja</option>
                                        <option value="12">Villavicencio</option>
                                    </select>                        
                                </div>

                                <!--lista desplegable para elegir la oficina donde se encuentra-->

                                <div class="col-md-2">
                                    <label for="oficina" class="form-label fw-bold">Oficina:</label>
                                    <select id="oficina" name="oficina" class="form-select border-dark text-white" required>
                                        <option value=""></option>
                                        <option value="1">Adm</option>
                                        <option value="2">Rio</option>
                                        <option value="3">Nei</option>
                                        <option value="4">Téc</option>
                                        <option value="5">Hof</option>
                                        <option value="6">Home_Office</option>
                                        <option value="8">Uri</option>
                                    </select>                        
                                </div>

                                <!--lista desplegable para elegir la direccion de la oficina (norte,sur,centro,local)-->

                                <div class="col-md-2">
                                    <label for="direccion" class="form-label fw-bold">Dirección:</label>
                                    <select id="direccion" name="direccion" class="form-select border-dark text-white" required>
                                        <option value=""></option>
                                        <option value="1">Norte</option>
                                        <option value="2">Centro</option>
                                        <option value="3">Sur</option>
                                        <option value="4">Local</option>                            
                                    </select>                        
                                </div>
                                
                                <!--campo para la clave del equipo asignado-->

                                <div class="col-md-2">
                                    <label for="clave_equipo" class="form-label fw-bold">Clave:</label>
                                    <input type="text" id="clave_equipo" name="clave_equipo" class="form-control text-center border-dark text-white" required />
                                </div>

                                <!--campo para seleccionar el trabajador al cual esta asignado el equipo-->

                                <div class="col-md-4">
                                    <label for="trabajador_id" class="form-label fw-bold">Trabajador asignado:</label>
                                    <select name="trabajador_id" id="trabajador_id" class="form-select border-dark text-white" required>
                                            <option value=""></option>
                                        @foreach ($trabajadores as $trabajador)
                                            <option value="{{ $trabajador->ID_trabajador }}">{{ $trabajador->Nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>                                
                                
                                <!--Boton para enviar los datos-->

                                <div>
                                    <input type="submit" name="submit" value="Enviar" class="btn btn-lg btn-success mt-2 fw-bold boton_enviar" id="boton_enviar" />
                                </div>

                                <br><br><br>
                                <hr>
                            </div>
                        </form>
                    </div>
                </div>

    <!--Formulario terciario para registrar datos del historico del equipo en la tabla Historico-->

                <div class="container">
                    <div class="row justify-content-center" id="registro_historial">
                        <form class="col-md-1" action="{{route("example-app.create3")}}" method="post" style="width: 200vh;">
                            @csrf
                            <div class="row">

                                <h4 class="fw-bold">Historial:</h4>

                                <!--campo para elegir el equipo al que se le va a poner un historial-->

                                <div class="col-md-2">
                                    <label for="id_equipo" class="form-label fw-bold">Código del equipo:</label>
                                    <select name="id_equipo" id="id_equipo" class="form-select border-dark text-white" required>
                                            <option value=""></option>
                                        @foreach ($equipos as $equipo)
                                            <option value="{{ $equipo->ID_equipo }}">Codigo: {{ $equipo->Codigo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <!--campo para ingresar el historial de asignacion-->

                                <div class="col-md-12">
                                    <label for="historial_asignacion" class="form-label fw-bold">Historial asignación:</label>
                                    <input type="text" id="historial_asignacion" name="historial_asignacion" class="form-control border-dark text-white" required />
                                </div>

                                <!--campo para ingresar los procesos a ejecutar del equipo-->

                                <div class="col-md-12">
                                    <label for="procesos_ejecutar" class="form-label fw-bold">Procesos a ejecutar:</label>
                                    <input type="text" id="procesos_ejecutar" name="procesos_ejecutar" class="form-control border-dark text-white" required />
                                </div>

                                <!--campo para inbgresar las anotaciones del equipo-->

                                <div class="col-md-12">
                                    <label for="anotaciones" class="form-label fw-bold">Anotaciones:</label>
                                    <textarea name="anotaciones" rows="3" class="form-control border-dark text-white"></textarea>
                                </div>

                                <!--Para redirigir a las consultas al usar la barra de navegación-->

                                <div id="consultar">
                                </div>

                            </div>
                            
                            <!--boton para enviar los datos del historial-->

                            <div>
                                <input type="submit" name="submit" value="Enviar" class="btn btn-lg btn-success mt-2 fw-bold boton_enviar" id="boton_enviar" />
                            </div>

                        </form>
                    </div>
                </div>
                <hr>
                
    </div>

<br>
    <!--Consultas en general en forma de formularios-->
        <div class="container">

            <h3 class="fw-bold text-center">Consultas:</h3>

                <!--Campo para busquedas-->
                <div class="row">
                    <div class="col-xl-12">
                        <form action="{{ route('example-app.buscar4') }}" method="GET">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <div class="btn-group">
                                        <select name="texto" class="form-select border-dark fw-bold" style="background-color: #aaaaa6;">
                                            <option value="">Selecciona un Trabajador</option>
                                            @foreach ($trabajadores as $trabajador)
                                                <option value="{{ $trabajador->Nombre }}">{{ $trabajador->Nombre }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-success fw-bold" id="boton_buscar">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>

                                        <!--boton para volver a la vista anterior-->

                                        <a href="{{ route('example-app.index') }}" class="btn btn-warning fw-bold" id="boton_limpiar">
                                            <i class="fa-solid fa-brush"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                                  
            <br>

            <div class="container">
                <div class="row" id="Consulta_form">
        
                <!--Campos de consulta del formulario con los datos del trabajador -->
                    <div class="col-md-6">
                        <h3 class="fw-bold">Datos del trabajador:</h3>
                        <div class="form-group">
                            <label for="input1" class="fw-bold">Nombre:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input1" name="nombre" value="{{ isset($trabajador) ? $trabajador->Nombre : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input2" class="fw-bold">Cédula:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input2" name="cedula" value="{{ isset($trabajador) ? $trabajador->Cedula : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input3" class="fw-bold">Lugar de expedición:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input3" name="cedula" value="{{ isset($trabajador) ? $trabajador->LugarExpedicion : '' }}" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="input4" class="fw-bold">Cargo:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input4" name="cedula" value="{{ isset($trabajador) ? $trabajador->Cargo : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input5" class="fw-bold">Correo:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input5" name="cedula" value="{{ isset($trabajador) ? $trabajador->Correo : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input6" class="fw-bold">Contraseña:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input6" name="cedula" value="{{ isset($trabajador) ? $trabajador->Contraseña : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input7" class="fw-bold">Ubicación:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input7" name="cedula" value="{{ isset($trabajador) ? $trabajador->Ubicacion : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input8" class="fw-bold">Teléfono:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input8" name="cedula" value="{{ isset($trabajador) ? $trabajador->Telefono : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input9" class="fw-bold">Código:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input9" name="cedula" value="{{ isset($equipo) ? $equipo->Codigo : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input10" class="fw-bold">Oficina:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input10" name="cedula" value="{{ isset($equipo) ? $equipo->Oficina : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input11" class="fw-bold">Direción:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input11" name="cedula" value="{{ isset($equipo) ? $equipo->Direccion : '' }}" readonly>
                        </div>

                    </div>
        
                <!--Campos de consultas del formulario con los datos del equipo asignado a la persona-->
                    <div class="col-md-6">
                        <h3 class="fw-bold">Datos del equipo:</h3>

                        <div class="form-group">
                            <label for="input12" class="fw-bold">Estado:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input12" name="marca" value="{{ isset($equipo) ? $equipo->Estado : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input13" class="fw-bold">Tipo:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input13" name="tipo" value="{{ isset($equipo) ? $equipo->Tipo : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input14" class="fw-bold">Marca:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input14" name="marca" value="{{ isset($equipo) ? $equipo->Marca : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input15" class="fw-bold">Modelo:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input15" name="marca" value="{{ isset($equipo) ? $equipo->Modelo : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input16" class="fw-bold">Numero de Serie:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input16" name="marca" value="{{ isset($equipo) ? $equipo->Num_serie : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input17" class="fw-bold">ID Producto:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input17" name="marca" value="{{ isset($equipo) ? $equipo->Id_producto : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input18" class="fw-bold">Procesador:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input18" name="marca" value="{{ isset($equipo) ? $equipo->Procesador : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input19" class="fw-bold">Ram:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input19" name="marca" value="{{ isset($equipo) ? $equipo->Ram : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input20" class="fw-bold">Disco:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input20" name="marca" value="{{ isset($equipo) ? $equipo->Disco : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input21" class="fw-bold">GPU/APU:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input21" name="marca" value="{{ isset($equipo) ? $equipo->GPU_APU : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input22" class="fw-bold">Sistema Operativo:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input22" name="marca" value="{{ isset($equipo) ? $equipo->Sistema_operativo : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input23" class="fw-bold">Licencia:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input23" name="marca" value="{{ isset($equipo) ? $equipo->Tipo_licencia : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input24" class="fw-bold">Display:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input24" name="marca" value="{{ isset($equipo) ? $equipo->Display : '' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="input25" class="fw-bold">Anydesk:</label>
                            <input type="text" class="form-control border-dark text-center fw-bold" id="input25" name="marca" value="{{ isset($equipo) ? $equipo->Anydesk : '' }}" readonly>
                        </div>

                        <!--Para redirigir a las tablas con los registros de la Base de datos-->
                        <div id="tablas">
                        </div>

                    </div>
        
                </div>
            </div>
        </div>

<br>
    
<!--Aca es todo lo referente a poder ver,consultar y modificar los datos de las diferentes tablas de la BDD-->

    <!--Parte para consultar los datos de la tabla de trabajadores de la BDD-->
    <div class="container mt-4">
        <hr>
        <div class="row">
            <div class="col-md-12">

                <h2 class="mt-3 text-dark fw-bold" >Tabla de Trabajadores</h2>

                <!--Aca se declara la parte para permitir las busquedas en la tabla de trabajadores-->
                <div class="row">
                    <div class="col-xl-12">
                        <form action="{{route('example-app.buscar')}}" method="GET">
                            <div class="form-row align-items-center">
                
                                <div class="col-auto my-1">
                                    <div class="btn-group">
                                        <input type="text" class="form-control" name="texto" value="Nombre o Cedula" onfocus="this.value='';">
                                        
                                        <button type="submit" class="btn btn-success fw-bold" id="boton_buscar">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                        
                                        <a href="{{ route('example-app.index') }}" class="btn btn-warning fw-bold" id="boton_limpiar">
                                            <i class="fa-solid fa-brush"></i>
                                        </a>

                                        <a href="{{ route('descargar.datos') }}" class="btn btn-primary fw-bold" id="boton_descargar">
                                            <i class="fa-solid fa-file-arrow-down"></i>
                                        </a>

                                    </div>
                                </div>                                
                            </div>
                        </form>
                    </div>
                </div>

                <!--Encabezado de la tabla para los datos de la BDD-->
                <div class="table-responsive overflow-auto" style="max-height:37vh;">
                    <table class="table table-light" style="width:150vw;">
                        <thead class="table-success table-responsive">
                          <tr>
                            <th>#</th>
                            <th>Cédula</th>
                            <th>Expedición</th>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th>Correo</th>
                            <th>Contraseña</th>
                            <th>Ubicación</th>
                            <th>Teléfono</th>
                            <th>Coordinador</th>
                            <th>Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            <!--Conexion con BDD para permitir mostrar los datos registrados
                                en la tabla recien creada-->
                            @foreach ($trabajadores as $item)
                            <tr>
                                <td>{{$item->ID_trabajador}}</td>
                                <td>{{$item->Cedula}}</td>
                                <td>{{$item->LugarExpedicion}}</td>
                                <td>{{$item->Nombre}}</td>
                                <td>{{$item->Cargo}}</td>
                                <td>{{$item->Correo}}</td>
                                <td>{{$item->Contraseña}}</td>
                                <td>{{$item->Ubicacion}}</td>
                                <td>{{$item->Telefono}}</td>
                                <td>{{$item->NombreCoordinador}}</td>
                                <td>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#modalEditarTrabajador{{$item->ID_trabajador}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-nib fa-beat"></i></a>
                                </td>
                            </tr>

                            <!-- Modal para modificar los datos de los registros de la BDD-->

                                <div class="modal fade" id="modalEditarTrabajador{{$item->ID_trabajador}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                    <div class="modal-dialog modal-xl modal-lg">
                                        <div class="modal-content" >
                                            <div class="modal-header " style="background-color: #f79a0e;">
                                            <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Modificar datos</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body" style="background-color: #f2f2f2;">
                                                <form class="col-md-8" action="{{ route('example-app.update') }}" method="post">

                                                    <!--Para proteger contra ataques CSRF-->
                                                    @csrf

                                                    <div class="row">

                                                    <!--Desde aca se editan los datos personales del trabajador-->

                                                        <h2 class="fw-bold">
                                                            Datos personales:
                                                        </h2>

                                                        <!--campo para mostrar el ID del registro (NO es editable)-->

                                                        <div class="col-md-1">
                                                            <label for="id" class="form-label fw-bold">ID</label>
                                                            <input type="text" id="id" name="id" class="form-control border-dark text-white text-center" style="background-color:  #ff3333;" value="{{$item->ID_trabajador}}" readonly >
                                                        </div>

                                                        <!--campo para editar la cedula-->

                                                        <div class="col-md-2">
                                                            <label for="cedula" class="form-label fw-bold">Cédula:</label>
                                                            <input type="text" id="cedula" name="cedula" class="form-control border-dark text-white text-center" style="background-color:  #33ccff;" value="{{$item->Cedula}}"/>
                                                        </div>

                                                        <!--lista desplegable para editar el sitio de expedicion-->

                                                        <div class="col-md-4">
                                                            <label for="ID_expedicion" class="form-label fw-bold">Lugar de expedición:</label>
                                                            <select name="ID_expedicion" id="ID_expedicion" class="form-select border-dark text-white" style="background-color: #33ccff;" required>
                                                                    <option value=""></option>
                                                                @foreach ($expedicion as $expedicionB)
                                                                    <option value="{{ $expedicionB->ID_expedicion }}" @if ($expedicionB->ID_expedicion == $item->ID_expedicion) selected @endif>{{ $expedicionB->Lugar }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!--campo para editar el nombre -->

                                                        <div class="col-md-5">
                                                            <label for="nombre" class="form-label fw-bold">Nombre:</label>
                                                            <input type="text" id="nombre" name="nombre" class="form-control border-dark  text-white text-center" style="background-color:  #33ccff;" value="{{$item->Nombre}}" pattern="[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+" title="Por favor ingresa solo letras" />
                                                        </div>

                                                        <!--campo para editar el cargo del trabajador-->
                                                        
                                                        <div class="col-md-5">
                                                            <label for="cargo" class="form-label fw-bold">Cargo asignado:</label>
                                                            <select name="cargo" id="cargo" class="form-select border-dark text-white" style="background-color: #33ccff;">
                                                                <option value=""></option>
                                                                @foreach ($cargo as $cargoB)
                                                                    <option value="{{ $cargoB->ID_cargo }}" @if ($cargoB->ID_cargo == $item->ID_cargo) selected @endif>{{ $cargoB->Cargo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!--campo para editar el coordinador -->

                                                        <div class="col-md-4">
                                                            <label for="coordinador_id" class="form-label fw-bold">Coordinador asignado:</label>
                                                            <select name="coordinador_id" id="coordinador_id" class="form-select border-dark text-white" style="background-color: #33ccff;" required>
                                                                    <option value=""></option>
                                                                @foreach ($coordinador as $coordinadorB)
                                                                    <option value="{{ $coordinadorB->ID_coordinador }}" @if ($coordinadorB->ID_coordinador == $item->ID_coordinacion) selected @endif>{{ $coordinadorB->Nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!--campo para editar la ubicacion-->

                                                        <div class="col-md-3">
                                                            <label for="ubicacion" class="form-label fw-bold">Ubicación:</label>
                                                            <select name="ubicacion" id="ubicacion" class="form-select border-dark text-white" style="background-color: #33ccff;">
                                                                <option value=""></option>
                                                                @foreach ($ubicacion as $ubicacionB)
                                                                    <option value="{{ $ubicacionB->ID_ubicacion }}" @if ($ubicacionB->ID_ubicacion == $item->ID_ubicacion) selected @endif>{{ $ubicacionB->Ubicacion }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!--campo para editar la cuenta de correo electonico-->

                                                        <div class="col-md-4">
                                                            <label for="correo" class="form-label fw-bold">Correo:</label>
                                                            <input type="text" id="correo" name="correo" class="form-control border-dark text-white text-center" style="background-color: #33ccff;" value="{{$item->Correo}}" />
                                                        </div>

                                                        <!--campo para editar la contraseña de la cuenta-->

                                                        <div class="col-md-3">
                                                            <label for="contraseña" class="form-label fw-bold">Contraseña:</label>
                                                            <input type="text" id="contraseña" name="contraseña" class="form-control border-dark text-white text-center" style="background-color: #33ccff;" value="{{$item->Contraseña}}"  />
                                                        </div>

                                                        <!--campo para editar el telefono-->

                                                        <div class="col-md-2">
                                                            <label for="telefono" class="form-label fw-bold">Teléfono:</label>
                                                            <input type="text" id="telefono" name="telefono" class="form-control border-dark text-white text-center" style="background-color: #33ccff;" value="{{$item->Telefono}}" />
                                                        </div>

                                                        <br><br>

                                                        <!--campo de los botones para cerrar la pestaña emergente o para poder guardar los cambios
                                                        en los datos -->

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger fw-bold" data-bs-dismiss="modal" id="boton_cerrar">Cerrar</button>
                                                            <button type="submit" class="btn btn-success fw-bold" id="boton_guardar_cambios" >Guardar cambios</button>
                                                        </div>
                                                    </div>           
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                          
                        </tbody>
                      </table>
                      
                    </div>

                  </div>
                </div>
    </div>

    <!--Parte para consultar los datos de la tabla de Equipos de la BDD-->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3 text-dark fw-bold" >Tabla de Equipos</h2>

                <!--Aca se declara la parte para permitir las busquedas en la tabla de equipos-->
                <div class="row">
                    <div class="col-xl-12">
                        <form action="{{route('example-app.buscar2')}}" method="GET">
                            <div class="form-row align-items-center">
                
                                <div class="col-auto my-1">
                                    <div class="btn-group">
                                        <input type="text" class="form-control" name="texto" value="Id o codigo del equipo" onfocus="this.value='';">
                                        
                                        <button type="submit" class="btn btn-success fw-bold" id="boton_buscar">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                        
                                        <a href="{{ route('example-app.index') }}" class="btn btn-warning fw-bold" id="boton_limpiar">
                                            <i class="fa-solid fa-brush"></i>
                                        </a>

                                        <a href="{{ route('descargar.datos2') }}" class="btn btn-primary fw-bold" id="boton_descargar">
                                            <i class="fa-solid fa-file-arrow-down"></i>
                                        </a>

                                    </div>
                                </div>                                
                            </div>
                        </form>
                    </div>
                </div>

                <!--Encabezado de la tabla para los datos de la BDD-->
                <div class="table-responsive overflow-auto" style="max-height:37vh;">
                    <table class="table table-light" style="width:280vw;">
                        <thead class="table-success table-responsive ">
                          <tr>
                            <th>#</th>
                            <th>Estado</th>
                            <th>Codigo</th>
                            <th>Tipo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Numero de serie</th>
                            <th>Id del producto</th>
                            <th>Procesador</th>
                            <th>Ram</th>
                            <th>Disco</th>
                            <th>GPU/APU</th>
                            <th>Sistema operativo</th>
                            <th>Licencia</th>
                            <th>Display</th>
                            <th>Anydesk</th>
                            <th>Ubicación</th>
                            <th>Oficina</th>
                            <th>Dirección</th>
                            <th>Clave</th>
                            <th>Trabajador</th>
                            <th>Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            <!--Conexion con BDD para permitir mostrar los datos registrados
                                en la tabla recien creada-->
                            @foreach ($equipos as $item)
                            <tr>
                                <td>{{$item->ID_equipo}}</td>
                                <td>{{$item->Estado}}</td>
                                <td>{{$item->Codigo}}</td>
                                <td>{{$item->Tipo}}</td>
                                <td>{{$item->Marca}}</td>
                                <td>{{$item->Modelo}}</td>
                                <td>{{$item->Num_serie}}</td>
                                <td>{{$item->Id_producto}}</td>
                                <td>{{$item->Procesador}}</td>
                                <td>{{$item->Ram}}</td>
                                <td>{{$item->Disco}}</td>
                                <td>{{$item->GPU_APU}}</td>
                                <td>{{$item->Sistema_operativo}}</td>
                                <td>{{$item->Tipo_licencia}}</td>
                                <td>{{$item->Display}}</td>
                                <td>{{$item->Anydesk}}</td>
                                <td>{{$item->Ubicacion}}</td>
                                <td>{{$item->Oficina}}</td>
                                <td>{{$item->Direccion}}</td>
                                <td>{{$item->Clave_equipo}}</td>
                                <td>{{$item->Nombre_trabajador}}</td>
                                <td>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#modalEditarEquipos{{$item->ID_equipo}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-nib fa-beat"></i></a>
                                </td>
                            </tr>
                            <!-- Modal para modificar los datos de los registros de la BDD-->
                                <div class="modal fade" id="modalEditarEquipos{{$item->ID_equipo}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                    <div class="modal-dialog modal-xl modal-lg">
                                        <div class="modal-content" >
                                            <div class="modal-header " style="background-color: #3ccaca;">
                                            <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Modificar datos</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body" style="background-color: #f2f2f2;">
                                                <form class="col-md-8" action="{{ route('example-app.update2') }}" method="post">

                                                    <!--Para proteger contra ataques CSRF-->
                                                    @csrf

                                                    <div class="row">

                                                    <!--Desde aca se editan los datos personales del trabajador-->

                                                        <h2 class="fw-bold">Datos del equipo:</h2>

                                                        <!--campo para mostrar el ID del registro (NO es editable)-->

                                                        <div class="col-md-1">
                                                            <label for="id" class="form-label fw-bold">ID:</label>
                                                            <input type="text" id="id" name="id" class="form-control border-dark text-white text-center" style="background-color:  #ff3333;" value="{{$item->ID_equipo}}" readonly >
                                                        </div>

                                                        <!--campo para editar el estado del equipo-->

                                                        <div class="col-md-2">
                                                            <label for="estado" class="form-label fw-bold">Estado:</label>
                                                            <select id="estado" name="estado" class="form-select border-dark text-white" style="background-color: #33ccff;">
                                                                <option value=""></option>
                                                                <option value="Pendiente" {{ $item->Estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                                                <option value="De_baja" {{ $item->Estado == 'De_baja' ? 'selected' : '' }}>De baja</option>
                                                                <option value="Disponible" {{ $item->Estado == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                                                                <option value="En_garantia" {{ $item->Estado == 'En_garantia' ? 'selected' : '' }}>En garantia</option>
                                                                <option value="Ilocalizado" {{ $item->Estado == 'Ilocalizado' ? 'selected' : '' }}>Ilocalizado</option>
                                                                <option value="No_aplica" {{ $item->Estado == 'No_aplica' ? 'selected' : '' }}>No aplica</option>
                                                                <option value="Pendiente" {{ $item->Estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                                            </select>                    
                                                        </div>                                                        

                                                        <!--campo para editar el codigo designado al equipo-->

                                                        <div class="col-md-2">
                                                            <label for="codigo" class="form-label fw-bold">Codigo:</label>
                                                            <input type="text" id="codigo" name="codigo" class="form-control border-dark text-white text-center" style="background-color: #33ccff;" value="{{$item->Codigo}}"  />
                                                        </div>

                                                        <!--campo para editar la cantidad de ram del equipo-->

                                                        <div class="col-md-1">
                                                            <label for="ram" class="form-label fw-bold">Ram:</label>
                                                            <select id="ram" name="ram" class="form-select border-dark text-white" style="background-color: #33ccff;">
                                                                <option value=""></option>
                                                                <option value="4GB" {{ $item->Ram == '4GB' ? 'selected' : '' }}>4GB</option>
                                                                <option value="8GB" {{ $item->Ram == '8GB' ? 'selected' : '' }}>8GB</option>
                                                                <option value="12GB" {{ $item->Ram == '12GB' ? 'selected' : '' }}>12GB</option>
                                                                <option value="16GB" {{ $item->Ram == '16GB' ? 'selected' : '' }}>16GB</option>
                                                                <option value="24GB" {{ $item->Ram == '24GB' ? 'selected' : '' }}>24GB</option>
                                                                <option value="32GB" {{ $item->Ram == '32GB' ? 'selected' : '' }}>32GB</option>
                                                                <option value="48GB" {{ $item->Ram == '48GB' ? 'selected' : '' }}>48GB</option>                            
                                                                <option value="64GB" {{ $item->Ram == '64GB' ? 'selected' : '' }}>64GB</option>
                                                            </select>
                                                        </div>                                                        

                                                        <!--lista desplegable para editar la cantidad de almacenamiento del disco duro-->

                                                        <div class="col-md-2">
                                                            <label for="disco_duro" class="form-label fw-bold">Disco duro:</label>
                                                            <select id="disco_duro" name="disco_duro" class="form-select border-dark text-white" style="background-color: #33ccff;">
                                                                <option value=""></option>
                                                                <option value="120GB" {{ $item->Disco == '120GB' ? 'selected' : '' }}>120 GB</option>
                                                                <option value="128GB" {{ $item->Disco == '128GB' ? 'selected' : '' }}>128 GB</option>
                                                                <option value="128GB+512GB" {{ $item->Disco == '128GB+512GB' ? 'selected' : '' }}>128 GB + 512 GB</option>
                                                                <option value="128GB+1TB" {{ $item->Disco == '128GB+1TB' ? 'selected' : '' }}>128 GB + 1TB</option>
                                                                <option value="256GB" {{ $item->Disco == '256GB' ? 'selected' : '' }}>256 GB</option>
                                                                <option value="256GB+500GB" {{ $item->Disco == '256GB+500GB' ? 'selected' : '' }}>256 GB +500 GB</option>
                                                                <option value="256GB+1TB" {{ $item->Disco == '256GB+1TB' ? 'selected' : '' }}>256 GB +1 TB</option>
                                                                <option value="256GB+2TB" {{ $item->Disco == '256GB+2TB' ? 'selected' : '' }}>256 GB +2 TB</option>
                                                                <option value="500GB" {{ $item->Disco == '500GB' ? 'selected' : '' }}>500 GB</option>
                                                                <option value="512GB" {{ $item->Disco == '512GB' ? 'selected' : '' }}>512 GB</option>
                                                                <option value="610GB+283GB" {{ $item->Disco == '610GB+283GB' ? 'selected' : '' }}>1 TB + 128 GB</option>
                                                                <option value="650GB" {{ $item->Disco == '650GB' ? 'selected' : '' }}>650 GB</option>
                                                                <option value="1TB" {{ $item->Disco == '1TB' ? 'selected' : '' }}>1 TB</option>
                                                                <option value="1TB+128GB" {{ $item->Disco == '1TB+128GB' ? 'selected' : '' }}>1 TB + 128 GB</option>
                                                                <option value="1TB+250GB" {{ $item->Disco == '1TB+250GB' ? 'selected' : '' }}>1 TB + 250 GB</option>
                                                                <option value="1TB+512GB" {{ $item->Disco == '1TB+512GB' ? 'selected' : '' }}>1 TB + 512 GB</option>
                                                                <option value="1TB+1TB" {{ $item->Disco == '1TB+1TB' ? 'selected' : '' }}>1 TB + 1 TB</option>
                                                                <option value="2TB" {{ $item->Disco == '2TB' ? 'selected' : '' }}>2 TB</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <!--campo para editar el codigo del anydesk para conectarse-->

                                                        <div class="col-md-2">
                                                            <label for="anydesk" class="form-label fw-bold">Anydesk:</label>
                                                            <input type="text" id="anydesk" name="anydesk" class="form-control text-center border-dark text-white" style="background-color: #33ccff;" value="{{$item->Anydesk}}" />
                                                        </div>

                                                        <!--lista desplegable para editar el sistema operativo-->

                                                        <div class="col-md-2">
                                                            <label for="tipo_sistema" class="form-label fw-bold">Sistema Operativo:</label>
                                                            <select id="tipo_sistema" name="tipo_sistema" class="form-select border-dark text-white" style="background-color: #33ccff;">
                                                                <option value=""></option>
                                                                <option value="Windows10" {{ $item->Sistema_operativo == 'Windows10' ? 'selected' : '' }}>Windows 10</option>
                                                                <option value="Windows11" {{ $item->Sistema_operativo == 'Windows11' ? 'selected' : '' }}>Windows 11</option>
                                                                <option value="Windows12" {{ $item->Sistema_operativo == 'Windows12' ? 'selected' : '' }}>Windows 12</option>
                                                            </select>
                                                        </div>                                                        

                                                        <!--lista desplegable para editar la licensia (osea si tiene windows home, pro, etc)-->

                                                        <div class="col-md-3">
                                                            <label for="licencia" class="form-label fw-bold">Licencia:</label>
                                                            <select name="licencia" id="licencia" class="form-select border-dark text-white" style="background-color: #33ccff;">
                                                                <option value=""></option>
                                                                @foreach ($licencia as $licenciaB)
                                                                    <option value="{{ $licenciaB->ID_licencia }}" @if ($licenciaB->ID_licencia == $item->ID_licencia) selected @endif>{{ $licenciaB->Licencia }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                                                                              
                                                        <!--campo para editar la ubicacion-->

                                                        <div class="col-md-3">
                                                            <label for="ubicacion" class="form-label fw-bold">Ubicación:</label>
                                                            <select name="ubicacion" id="ubicacion" class="form-select border-dark text-white" style="background-color: #33ccff;">
                                                                <option value=""></option>
                                                                @foreach ($ubicacion as $ubicacionB)
                                                                    <option value="{{ $ubicacionB->ID_ubicacion }}" @if ($ubicacionB->ID_ubicacion == $item->ID_ubicacion) selected @endif>{{ $ubicacionB->Ubicacion }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!--lista desplegable para elegir la oficina donde se encuentra-->

                                                        <div class="col-md-2">
                                                            <label for="oficina" class="form-label fw-bold">Oficina:</label>
                                                            <select name="oficina" id="oficina" class="form-select border-dark text-white" style="background-color: #33ccff;">
                                                                <option value=""></option>
                                                                @foreach ($oficina as $oficinaB)
                                                                    <option value="{{ $oficinaB->ID_oficina }}" @if ($oficinaB->ID_oficina == $item->ID_oficina) selected @endif>{{ $oficinaB->Oficina }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!--lista desplegable para elegir la direccion de la oficina (norte,sur,centro,local)-->

                                                        <div class="col-md-2">
                                                            <label for="direccion" class="form-label fw-bold">Dirección:</label>
                                                            <select name="direccion" id="direccion" class="form-select border-dark text-white" style="background-color: #33ccff;">
                                                                <option value=""></option>
                                                                @foreach ($direccion as $direccionB)
                                                                    <option value="{{ $direccionB->ID_direccion }}" @if ($direccionB->ID_direccion == $item->ID_direccion) selected @endif>{{ $direccionB->Direccion }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        
                                                        <!--campo para la clave del equipo asignado-->

                                                        <div class="col-md-2">
                                                            <label for="clave_equipo" class="form-label fw-bold">Clave:</label>
                                                            <input type="text" id="clave_equipo" name="clave_equipo" class="form-control text-center border-dark text-white" style="background-color: #33ccff;" value="{{$item->Clave_equipo}}"  />
                                                        </div>

                                                        <!--campo para seleccionar el trabajador al cual esta asignado el equipo-->

                                                        <div class="col-md-4">
                                                            <label for="trabajador_id" class="form-label fw-bold">Trabajador asignado:</label>
                                                            <select name="trabajador_id" id="trabajador_id" class="form-select border-dark text-white" style="background-color: #33ccff;">
                                                                <option value=""></option>
                                                                @foreach ($trabajadores as $trabajador)
                                                                    <option value="{{ $trabajador->ID_trabajador }}" @if ($trabajador->ID_trabajador == $item->ID_trabajador) selected @endif>{{ $trabajador->Nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <br><br>

                                                        <!--campo de los botones para cerrar la pestaña emergente o para poder guardar los cambios
                                                        en los datos -->

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger fw-bold" data-bs-dismiss="modal" id="boton_cerrar">Cerrar</button>
                                                            <button type="submit" class="btn btn-success fw-bold" id="boton_guardar_cambios" >Guardar cambios</button>
                                                        </div>
                                                    </div>           
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                          
                        </tbody>
                      </table>
                      
                    </div>

                  </div>
                </div>
    </div>

    <!--parte para consultar los datos de la tabla de historico--> 
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3 text-dark fw-bold">Tabla de Historico</h2>

                <!--Aca se declara la parte para permitir las busquedas en la tabla de historico-->
                <div class="row">
                    <div class="col-xl-12">
                        <form action="{{route('example-app.buscar3')}}" method="GET">
                            <div class="form-row align-items-center">
                
                                <div class="col-auto my-1">
                                    <div class="btn-group">
                                        <input type="text" class="form-control" name="texto" value=" ID HISTORICO O ID EQUIPO" onfocus="this.value='';">
                                        
                                        <button type="submit" class="btn btn-success fw-bold" id="boton_buscar">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                        
                                        <a href="{{ route('example-app.index') }}" class="btn btn-warning fw-bold" id="boton_limpiar">
                                            <i class="fa-solid fa-brush"></i>
                                        </a>

                                        <a href="{{ route('descargar.datos3') }}" class="btn btn-primary fw-bold" id="boton_descargar">
                                            <i class="fa-solid fa-file-arrow-down"></i>
                                        </a>

                                    </div>
                                </div>                                
                            </div>
                        </form>
                    </div>
                </div>

                <!--Encabezado de la tabla para los datos de la BDD-->
                <div class="table-responsive overflow-auto" style="max-height:35vh;">
                    <table class="table table-light" style="width:140vw;">
                        <thead class="table-success table-responsive ">
                          <tr>
                            <th>#</th>
                            <th># Equipo</th>
                            <th>Historial de asignaciones</th>
                            <th>Procesos a ejecutar</th>
                            <th>Anotaciones</th>
                            <th>Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            <!--Conexion con BDD para permitir mostrar los datos registrados
                                en la tabla recien creada-->
                            @foreach ($historico as $item)
                            <tr>
                                <td>{{$item->ID_historico}}</td>
                                <td style="width: 7vw;">{{$item->ID_equipo}}</td>
                                <td>{{$item->Historial_asignaciones}}</td>
                                <td>{{$item->Procesos_a_ejecutar}}</td>
                                <td>{{$item->Anotaciones}}</td>
                                <td>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#modalEditarHistorico{{$item->ID_historico}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-nib fa-beat"></i></a>
                                </td>
                            </tr>
                            <!-- Modal para modificar los datos de los registros de la BDD-->
                                <div class="modal fade" id="modalEditarHistorico{{$item->ID_historico}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                    <div class="modal-dialog modal-xl modal-lg">
                                        <div class="modal-content" >
                                            <div class="modal-header " style="background-color: #0dec63;">
                                            <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Modificar datos</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body" style="background-color: #f2f2f2;">
                                                <form class="col-md-8" action="{{ route('example-app.update3') }}" method="post">

                                                    <!--Para proteger contra ataques CSRF-->
                                                    @csrf

                                                    <div class="row">

                                                    <!--Desde aca se editan los datos personales del trabajador-->

                                                        <h2 class="fw-bold">Historial:</h2>

                                                        <!--campo para mostrar el ID del historico (NO es editable)-->

                                                        <div class="col-md-1">
                                                            <label for="ID_historico" class="form-label fw-bold">ID:</label>
                                                            <input type="text" id="id" name="id" class="form-control border-dark text-white text-center" style="background-color:  #ff3333;" value="{{$item->ID_historico}}" readonly >
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label for="ID_equipo" class="form-label fw-bold">ID del equipo:</label>
                                                            <input type="text" id="id_equipo" name="id_equipo" class="form-control border-dark text-white text-center" style="background-color: #ff3333;" value="{{$item->ID_equipo}}" readonly/>
                                                        </div>
                        
                                                        <div class="col-md-12">
                                                            <label for="historial_asignacion" class="form-label fw-bold">Historial asignación:</label>
                                                            <input type="text" id="historial_asignacion" name="historial_asignacion" class="form-control border-dark text-white" style="background-color: #33ccff;" value="{{$item->Historial_asignaciones}}"/>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="procesos_ejecutar" class="form-label fw-bold">Procesos a ejecutar:</label>
                                                            <input type="text" id="procesos_ejecutar" name="procesos_ejecutar" class="form-control border-dark text-white" style="background-color: #33ccff;" value="{{$item->Procesos_a_ejecutar}}"/>
                                                        </div>
                        
                                                        <div class="col-md-12">
                                                            <label for="anotaciones" class="form-label fw-bold">Anotaciones:</label>
                                                            <textarea name="anotaciones" rows="3" class="form-control border-dark text-white" style="background-color: #33ccff;">{{$item->Anotaciones}}</textarea>
                                                        </div>                                                        
                                                        
                                                        <br><br>

                                                        <!--campo de los botones para cerrar la pestaña emergente o para poder guardar los cambios
                                                        en los datos -->

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger fw-bold" data-bs-dismiss="modal" id="boton_cerrar">Cerrar</button>
                                                            <button type="submit" class="btn btn-success fw-bold" id="boton_guardar_cambios" >Guardar cambios</button>
                                                        </div>
                                                    </div>           
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                          
                        </tbody>
                      </table>
                      
                    </div>

                  </div>
                </div>
    </div>
    <br>
    <br>

<!--Scripts para permitir el correcto funcionamiento de las funciones-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</body>
</html>