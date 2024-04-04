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
    
<!--Logo de la empresa en el encabezado-->
    <header style="background-color:aquamarine; border-radius:10px; ">
        <div>
            <img src="{{ asset('img/Logo_eiatec.png') }}" class="img-responsive" style="width: 20%; height: auto; margin-left:15vh ">
            </div>
    </header>

<!--Mensajes para notificar si el dato se guardo o actualizo bien o si fallo en el proceso-->
    @if (session("Correcto"))
    <div class="alert alert-success fw-bold fs-5 ">{{session("Correcto")}}</div>
    @endif

    @if (session("Incorrecto"))
    <div class="alert alert-danger fw-bold fs-5">{{session("Incorrecto")}}</div>
    @endif

<!--Formulario principal para poder ingresar los datos en la BDD-->
    <div class="container">
        <br>
    <!--Formulario principal, registro de los datos personales--> 
        <h2 class="fw-bold" >Datos personales del trabajador:</h2>

        <div class="row justify-content-center">
            <form class="col-md-8" action="{{route("example-app.create")}}" method="post" style="width: 200vh;">
                @csrf
                <div class="row">

                    <!--campo para insertar la cedula-->

                    <div class="col-md-2">
                        <label for="cedula" class="form-label fw-bold" style="color: #7ab82c;">Cédula:</label>
                        <input type="text" id="cedula" name="cedula" class="form-control border-dark  text-white text-center" style="background-color: #66c2c2;" pattern="[0-9]+" title="Por favor ingresa solo números" required />
                    </div>

                    <!--lista desplegable para elegir el lugar de la expedicion de la cedula-->

                    <div class="col-md-3">
                        <label for="ID_expedicion" class="form-label fw-bold" style="color: #7ab82c;">Lugar de expedición:</label>
                        <select name="ID_expedicion" id="ID_expedicion" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
                                <option value=""></option>
                            @foreach ($expedicion as $expedicionB)
                                <option value="{{ $expedicionB->ID_expedicion }}">{{ $expedicionB->Lugar }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!--campo para insertar el nombre-->

                    <div class="col-md-7">
                        <label for="nombre" class="form-label fw-bold" style="color: #7ab82c;">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control border-dark text-white text-center" style="background-color: #66c2c2;" pattern="[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+" title="Por favor ingresa solo letras" required />
                    </div>

                    <!--lista desplegable para elegir a uno de los coordinadores-->

                    <div class="col-md-4">
                        <label for="coordinador_id" class="form-label fw-bold" style="color: #7ab82c;">Coordinador asignado:</label>
                        <select name="coordinador_id" id="coordinador_id" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
                                <option value=""></option>
                            @foreach ($coordinador as $coordinadorB)
                                <option value="{{ $coordinadorB->ID_coordinador }}">{{ $coordinadorB->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!--lista desplegable para elegir uno de los cargos-->

                    <div class="col-md-8">
                        <label for="cargo" class="form-label fw-bold" style="color: #7ab82c;">Cargo Asignado:</label>
                        <select name="cargo" id="cargo" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
                                <option value=""></option>
                            @foreach ($cargo as $cargoB)
                                <option value="{{ $cargoB->ID_cargo }}">{{ $cargoB->Cargo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!--campo para insertar la cuenta de correo electonico-->

                    <div class="col-md-4">
                        <label for="correo" class="form-label fw-bold" style="color: #7ab82c;">Correo:</label>
                        <input type="text" id="correo" name="correo" class="form-control border-dark text-white text-center" style="background-color: #66c2c2;" required />
                    </div>

                    <!--campo para insertar la contraseña de la cuenta-->

                    <div class="col-md-3">
                        <label for="contraseña" class="form-label fw-bold" style="color: #7ab82c;">Contraseña:</label>
                        <input type="text" id="contraseña" name="contraseña" class="form-control border-dark text-white text-center" style="background-color: #66c2c2;" required />
                    </div>

                    <!--campo para insertar el numero de telefono-->

                    <div class="col-md-2">
                        <label for="telefono" class="form-label fw-bold" style="color: #7ab82c;">Telefono:</label>
                        <input type="text" id="telefono" name="telefono" class="form-control border-dark text-white text-center" style="background-color: #66c2c2;" required />
                    </div>

                    <!--lista desplegable para elegir la ubicacion-->

                    <div class="col-md-3">
                        <label for="ubicacion" class="form-label fw-bold" style="color: #7ab82c;">Ubicación:</label>
                        <select id="ubicacion" name="ubicacion" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
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
                        <br>
                    </div>

                    <!--Boton para enviar los datos del trabajador a la base de datos-->

                    <div class="col-md-1">
                        <input type="submit" name="submit" value="Enviar" class="btn btn-lg btn-success mt-2 fw-bold" id="boton_enviar" />
                    </div>
                    <br> <br> <br>
                    <hr>
                </div>    
            </form>
        </div>

    <!--Aca va la parte para registrar datos del equipo-->
                <div class="container">
                    <div class="row justify-content-center">
                        <form class="col-md-8" action="{{route("example-app.create2")}}" method="post" style="width: 200vh;">
                            <div class="row">
                                <h2 class="fw-bold">
                                    Datos del equipo:
                                </h2>

                                <!--lista desplegable para elegir el estado de asignacion del equipo-->

                                <div class="col-md-2">
                                    <label for="estado" class="form-label fw-bold" style="color: #7ab82c;">Estado:</label>
                                    <select id="estado" name="estado" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
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
                                    <label for="codigo" class="form-label fw-bold" style="color: #7ab82c;">Codigo:</label>
                                    <input type="text" id="codigo" name="codigo" class="form-control border-dark text-white text-center" style="background-color: #66c2c2;" pattern="[0-9]+" required />
                                </div>

                                <!--lista desplegable para elegir el tipo de computador (portatil,mesa,etc)-->

                                <div class="col-md-2">
                                    <label for="tipo_computador" class="form-label fw-bold" style="color: #7ab82c;">Tipo de computador:</label>
                                    <select id="tipo_computador" name="tipo_computador" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
                                        <option value=""></option>
                                        <option value="1">Mesa</option>
                                        <option value="2">Portatil</option>
                                        <option value="3">All in one</option>
                                        <option value="5">Personal</option>
                                    </select>
                                </div>

                                <!--lista desplegable para elegir la marca del equipo (HP,DELL,etc)-->
                
                                <div class="col-md-2">
                                    <label for="marca" class="form-label fw-bold" style="color: #7ab82c;">Marca:</label>
                                    <select id="marca" name="marca" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
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
                                    <label for="modelo" class="form-label fw-bold" style="color: #7ab82c;">Modelo:</label>
                                    <input type="text" id="modelo" name="modelo" class="form-control text-center border-dark text-white" style="background-color: #66c2c2;" required />
                                </div>

                                <!--campo para ingresar el numero de serie del equipo-->

                                <div class="col-md-3">
                                    <label for="numero_serie" class="form-label fw-bold" style="color: #7ab82c;">Numero de serie:</label>
                                    <input type="text" id="numero_serie" name="numero_serie" class="form-control text-center border-dark text-white" style="background-color: #66c2c2;" required />
                                </div>

                                <!--campo para ingresar el id del producto-->

                                <div class="col-md-3">
                                    <label for="id_producto" class="form-label fw-bold" style="color: #7ab82c;">Id producto:</label>
                                    <input type="text" id="id_producto" name="id_producto" class="form-control text-center border-dark text-white" style="background-color: #66c2c2;" required />
                                </div>

                                <!--lista desplegable para ingresar el sistema operativo-->

                                <div class="col-md-2">
                                    <label for="tipo_sistema" class="form-label fw-bold" style="color: #7ab82c;">Sistema Operativo:</label>
                                    <select id="tipo_sistema" name="tipo_sistema" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
                                        <option value=""></option>
                                        <option value="Windows10">Windows 10</option>
                                        <option value="Windows11">Windows 11</option>
                                        <option value="Windows12">Windows 12</option>
                                    </select>
                                </div>

                                <!--lista desplegable para ingresar la licensia (osea si tiene windows home, pro, etc)-->

                                <div class="col-md-3">
                                    <label for="licensia" class="form-label fw-bold" style="color: #7ab82c;">Licensia:</label>
                                    <select id="licensia" name="licensia" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
                                        <option value=""></option>
                                        <option value="1">Home</option>
                                        <option value="2">Pro</option>
                                        <option value="3">Home Single Language</option>
                                        <option value="4">Server</option>
                                    </select>
                                </div>

                                <!--lista deplegable para elegir la capacidad de la Ram-->

                                <div class="col-md-1">
                                    <label for="ram" class="form-label fw-bold" style="color: #7ab82c;">Ram:</label>
                                    <select id="ram" name="ram" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
                                        <option value=""></option>
                                        <option value="4Gb">4Gb</option>
                                        <option value="8Gb">8Gb</option>
                                        <option value="12Gb">12Gb</option>
                                        <option value="16Gb">16Gb</option>
                                        <option value="24Gb">24Gb</option>
                                        <option value="32Gb">32Gb</option>
                                        <option value="48Gb">48Gb</option>                            
                                        <option value="64Gb">64Gb</option>
                                    </select>
                                </div>

                                <!--campo para ingresar el nombre del procesador-->

                                <div class="col-md-6">
                                    <label for="procesador" class="form-label fw-bold" style="color: #7ab82c;">Procesador:</label>
                                    <input type="text" id="procesador" name="procesador" class="form-control text-center border-dark text-white" style="background-color: #66c2c2;" required />
                                </div>

                                <!--campo para ingresar la grafica o controlador grafico del equipo-->

                                <div class="col-md-6">
                                    <label for="gpu" class="form-label fw-bold" style="color: #7ab82c;">Gpu/Apu:</label>
                                    <input type="text" id="gpu" name="gpu" class="form-control text-center border-dark text-white" style="background-color: #66c2c2;" required />
                                </div>

                                <!--lista desplegable para elegir la pantalla del equipo-->

                                <div class="col-md-2">
                                    <label for="display" class="form-label fw-bold" style="color: #7ab82c;">Display:</label>
                                    <select id="display" name="display" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
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
                                    <label for="disco_duro" class="form-label fw-bold" style="color: #7ab82c;">Disco duro:</label>
                                    <select id="disco_duro" name="disco_duro" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
                                        <option value=""></option>
                                        <option value="128Gb">128 Gb</option>
                                        <option value="250Gb">250 Gb</option>
                                        <option value="512Gb">512 Gb</option>
                                        <option value="1Tb">1 TB</option>
                                        <option value="1Tb+128Gb">1 TB + 128 GB</option>
                                        <option value="1Tb+250Gb">1 TB + 250 Gb</option>
                                        <option value="1Tb+512Gb">1 TB + 512 Gb</option>
                                        <option value="1Tb+1Tb">1 TB + 1 TB</option>
                                        <option value="2Tb">2 TB</option>
                                    </select>
                                </div>

                                <!--campo para ingresar el codigo del anydesk para conectarse-->

                                <div class="col-md-2">
                                    <label for="anydesk" class="form-label fw-bold" style="color: #7ab82c;">Anydesk:</label>
                                    <input type="text" id="anydesk" name="anydesk" class="form-control text-center border-dark text-white" style="background-color: #66c2c2;" required />
                                </div>

                                <!--lista desplegable para elegir la ubicacion de donde se encuentra el equipo-->

                                <div class="col-md-2">
                                    <label for="ubicacion" class="form-label fw-bold" style="color: #7ab82c;">Ubicación:</label>
                                    <select id="ubicacion" name="ubicacion" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
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
                                    <label for="oficina" class="form-label fw-bold" style="color: #7ab82c;">Oficina:</label>
                                    <select id="oficina" name="oficina" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
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
                                    <label for="direccion" class="form-label fw-bold" style="color: #7ab82c;">Dirección:</label>
                                    <select id="direccion" name="direccion" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
                                        <option value=""></option>
                                        <option value="1">Norte</option>
                                        <option value="2">Centro</option>
                                        <option value="3">Sur</option>
                                        <option value="4">Local</option>                            
                                    </select>                        
                                </div>
                                
                                <!--campo para la clave del equipo asignado-->

                                <div class="col-md-2">
                                    <label for="clave_equipo" class="form-label fw-bold" style="color: #7ab82c;">Clave:</label>
                                    <input type="text" id="clave_equipo" name="clave_equipo" class="form-control text-center border-dark text-white" style="background-color: #66c2c2;" required />
                                </div>

                                <!--campo para seleccionar el trabajador al cual esta asignado el equipo-->

                                <div class="col-md-5">
                                    <label for="trabajador_id" class="form-label fw-bold" style="color: #7ab82c;">Trabajador asignado:</label>
                                    <select name="trabajador_id" id="trabajador_id" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
                                            <option value=""></option>
                                        @foreach ($trabajadores as $trabajador)
                                            <option value="{{ $trabajador->ID_trabajador }}">{{ $trabajador->Nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>                                
                                
                                <!--Boton para enviar los datos-->

                                <div>
                                    <input type="submit" name="submit" value="Enviar" class="btn btn-lg btn-success mt-2 fw-bold" id="boton_enviar" />
                                </div>

                                <br> <br> <br>
                                <hr>
                                
                            </div>
                        </form>
                    </div>
                </div>

    <!--Aca va la parte para registrar datos del historial-->

                <div class="container">
                    <div class="row justify-content-center">
                        <form class="col-md-1" action="{{route("example-app.create3")}}" method="post" style="width: 200vh;"> 
                            <div class="row"> 
                                <h2 class="fw-bold">
                                    Historial:
                                </h2>

                                <div class="col-md-5">
                                    <label for="id_equipo" class="form-label fw-bold" style="color: #7ab82c;">Codigo del equipo:</label>
                                    <select name="id_equipo" id="id_equipo" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
                                        @foreach ($equipos as $equipo)
                                            <option value="{{ $equipo->ID_equipo }}">ID: {{ $equipo->ID_equipo }} - Codigo: {{ $equipo->Codigo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="historial_asignacion" class="form-label fw-bold" style="color: #7ab82c;">Historial asignacion:</label>
                                    <input type="text" id="historial_asignacion" name="historial_asignacion" class="form-control border-dark text-white" style="background-color: #66c2c2;" required />
                                </div>

                                <div class="col-md-12">
                                    <label for="procesos_ejecutar" class="form-label fw-bold" style="color: #7ab82c;">Procesos a ejecutar:</label>
                                    <input type="text" id="procesos_ejecutar" name="procesos_ejecutar" class="form-control border-dark text-white" style="background-color: #66c2c2;" required />
                                </div>

                                <div class="col-md-12">
                                    <label for="Anotaciones" class="form-label fw-bold" style="color: #7ab82c;">Anotaciones:</label>
                                    <textarea name="Anotaciones" rows="3" class="form-control border-dark text-white" style="background-color: #66c2c2;" ></textarea>
                                </div>
                            </div>
        
                            <div>
                                <input type="submit" name="submit" value="Enviar" class="btn btn-lg btn-success mt-2 fw-bold" id="boton_enviar" />
                            </div>

                        </form>
                    </div>
                </div>
                <hr>
    </div>

<!--Aca es todo lo referente a poder ver,consultar y modificar los datos de la BDD-->

    <!--Parte para consultar los datos de la tabla de trabajadores de la BDD-->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3 text-dark fw-bold" >Tabla de trabajadores:</h2>

                <!--Aca se declara la parte para permitir las busquedas-->
                <div class="row">
                    <div class="col-xl-12">
                        <form action="{{route('example-app.buscar')}}" method="GET">
                            <div class="form-row">
                                <div class="col-sm-4 my-1">
                                <input type="text" class="form-control" name="texto" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚ\s]*" title="Por favor, ingresa solo letras o números" value="INSERTA EL ID, EL NOMBRE O LA CEDULA" onfocus="this.value='';">
                                </div>
                                <div class="col-auto my-1" >
                                    <input type="submit" class="btn btn-success fw-bold" id="boton_buscar" style="width:27.2vh" value="Buscar">
                                    <input type="submit" class="btn btn-info fw-bold" id="boton_limpiar" style="width:27.3vh" value="Limpiar" formaction="{{ route('example-app.index') }}">
                                </div>                                
                            </div>
                        </form>
                    </div>
                </div>

                <!--Boton para descargar la tabla de trabajadores de la BDD-->
                <div class="row">
                <form method="GET" action="{{ route('descargar.datos') }}">
                    <button type="submit" class="btn btn-warning fw-bold" id="boton_descargar" style="width:55vh">Descargar Tabla de los trabajadores</button>
                </form>
                </div>

                <br>

                <!--Encabezado de la tabla para los datos de la BDD-->
                <div class="table-responsive overflow-auto" style="max-height:30vh;">
                    <table class="table table-light ">
                        <thead class="table-success table-responsive ">
                          <tr>
                            <th>#</th>
                            <th>Cédula</th>
                            <th>Expedicion</th>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th>Correo</th>
                            <th>Contraseña</th>
                            <th>Ubicacion</th>
                            <th>Telefono</th>
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
                                                            <input type="text" id="cedula" name="cedula" class="form-control border-dark text-white text-center" style="background-color:  #33ccff;" value="{{$item->Cedula}}" pattern="[0-9]+" title="Por favor, ingresa solo números" />
                                                        </div>

                                                        <!--lista desplegable para elegir el lugar de la expedicion de la cedula-->
                                                        
                                                        

                                                        <!--campo para editar el nombre -->

                                                        <div class="col-md-7">
                                                            <label for="nombre" class="form-label fw-bold">Nombre:</label>
                                                            <input type="text" id="nombre" name="nombre" class="form-control border-dark  text-white text-center" style="background-color:  #33ccff;" value="{{$item->Nombre}}" pattern="[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+" title="Por favor ingresa solo letras" />
                                                        </div>

                                                    <!--
                                                        Debido a que no se puede mirar en la base de datos y mostrar el dato directamenta al ser lista desplegable
                                                        se incluyo la parte donde en ves de coger los datos, compara el dato puesto con las opciones en lo que donde
                                                        halla coincidencia hace que las muestre
                                                    -->


                                                        <!--campo para editar el cargo del trabajador-->

                                                        <div class="col-md-8">
                                                            <label for="cargo" class="form-label fw-bold">Cargo Asignado:</label>
                                                            <select name="cargo" id="cargo" class="form-select border-dark text-white" style="background-color: #33ccff;" required>
                                                                    <option value=""></option>                                                               
                                                                @foreach ($cargo as $cargoB)
                                                                    <option value="{{ $cargoB->ID_cargo }}">{{ $cargoB->Cargo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        
                                                        <!--campo para editar la ubicacion-->

                                                        <div class="col-md-3">
                                                            <label for="ubicacion" class="form-label fw-bold">Ubicación:</label>
                                                            <input type="text" id="ubicacion" name="ubicacion" class="form-control border-dark text-white text-center" style="background-color: #33ccff;" value="{{$item->Ubicacion}}" />
                                                            <br>
                                                        </div>
                                                        
                                                        <!--campo para editar el cargo-->


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
                                                            <label for="telefono" class="form-label fw-bold">Telefono:</label>
                                                            <input type="text" id="telefono" name="telefono" class="form-control border-dark text-white text-center" style="background-color: #33ccff;" value="{{$item->Contraseña}}" />
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
                <h2 class="mt-3 text-dark fw-bold" >Tabla de Equipos:</h2>

                <!--Aca se declara la parte para permitir las busquedas-->
                <div class="row">
                    <div class="col-xl-12">
                        <form action="{{route('example-app.buscar')}}" method="GET">
                            <div class="form-row">
                                <div class="col-sm-4 my-1">
                                <input type="text" class="form-control" name="texto" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚ\s]*" title="Por favor, ingresa solo letras o números" value="INSERTA EL ID, EL NOMBRE O LA CEDULA" onfocus="this.value='';">
                                </div>
                                <div class="col-auto my-1" >
                                    <input type="submit" class="btn btn-success fw-bold" id="boton_buscar" style="width:27.2vh" value="Buscar">
                                    <input type="submit" class="btn btn-info fw-bold" id="boton_limpiar" style="width:27.3vh" value="Limpiar" formaction="{{ route('example-app.index') }}">
                                </div>                                
                            </div>
                        </form>
                    </div>
                </div>

                <!--Boton para descargar la BDD-->
                <div class="row">
                <form method="GET" action="{{ route('descargar.datos2') }}">
                    <button type="submit" class="btn btn-warning fw-bold" id="boton_descargar" style="width:55vh">Descargar tabla de equipos</button>
                </form>
                </div>

                <br>

                <!--Encabezado de la tabla para los datos de la BDD-->
                <div class="table-responsive overflow-auto" style="max-height:30vh;">
                    <table class="table table-light ">
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
                                                            Datos del equipo:
                                                        </h2>

                                                        <!--campo para mostrar el ID del registro (NO es editable)-->

                                                        <div class="col-md-1">
                                                            <label for="id" class="form-label fw-bold">ID</label>
                                                            <input type="text" id="id" name="id" class="form-control border-dark text-white text-center" style="background-color:  #ff3333;" value="{{$item->ID_equipo}}" readonly >
                                                        </div>

                                                        <!--
                                                        Debido a que no se puede mirar en la base de datos y mostrar el dato directamenta al ser lista desplegable
                                                        se incluyo la parte donde en ves de coger los datos, compara el dato puesto con las opciones en lo que donde
                                                        halla coincidencia hace que las muestre
                                                        -->

                                                        <!--campo para editar el estado del equipo-->

                                                        <div class="col-md-2">
                                                            <label for="estado" class="form-label fw-bold">Estado:</label>
                                                            <select id="estado" name="estado" class="form-select border-dark text-white" style="background-color: #33ccff;">
                                                                <option value=""></option>
                                                                <option value="De_baja">De baja</option>
                                                                <option value="Disponible">Disponible</option>
                                                                <option value="En_garantia">En garantia</option>
                                                                <option value="Ilocalizado">Ilocalizado</option>
                                                                <option value="No_aplica">No aplica</option>
                                                                <option value="Pendiente">Pendiente</option>
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
                                                                <option value="4Gb">4Gb</option>
                                                                <option value="8Gb">8Gb</option>
                                                                <option value="12Gb">12Gb</option>
                                                                <option value="16Gb">16Gb</option>
                                                                <option value="24Gb">24Gb</option>
                                                                <option value="32Gb">32Gb</option>
                                                                <option value="48Gb">48Gb</option>                            
                                                                <option value="64Gb">64Gb</option>
                                                            </select>
                                                        </div>

                                                        <!--lista desplegable para editar la cantidad de almacenamiento del disco duro-->

                                                        <div class="col-md-2">
                                                            <label for="disco_duro" class="form-label fw-bold">Disco duro:</label>
                                                            <select id="disco_duro" name="disco_duro" class="form-select border-dark text-white" style="background-color: #33ccff;">
                                                                <option value=""></option>
                                                                <option value="128Gb" {{ $item->Disco == '128Gb' ? 'selected' : '' }}>128 Gb</option>
                                                                <option value="250Gb" {{ $item->Disco == '250Gb' ? 'selected' : '' }}>250 Gb</option>
                                                                <option value="512Gb" {{ $item->Disco == '512Gb' ? 'selected' : '' }}>512 Gb</option>
                                                                <option value="1Tb" {{ $item->Disco == '1Tb' ? 'selected' : '' }}>1 TB</option>
                                                                <option value="1Tb+128Gb" {{ $item->Disco == '1Tb+128Gb' ? 'selected' : '' }}>1 TB + 128 GB</option>
                                                                <option value="1Tb+250Gb" {{ $item->Disco == '1Tb+250Gb' ? 'selected' : '' }}>1 TB + 250 Gb</option>
                                                                <option value="1Tb+512Gb" {{ $item->Disco == '1Tb+512Gb' ? 'selected' : '' }}>1 TB + 512 Gb</option>
                                                                <option value="1Tb+1Tb" {{ $item->Disco == '1Tb+1Tb' ? 'selected' : '' }}>1 TB + 1 TB</option>
                                                                <option value="2Tb" {{ $item->Disco == '2Tb' ? 'selected' : '' }}>2 TB</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <!--campo para editar el codigo del anydesk para conectarse-->

                                                        <div class="col-md-2">
                                                            <label for="anydesk" class="form-label fw-bold">Anydesk:</label>
                                                            <input type="text" id="anydesk" name="anydesk" class="form-control text-center border-dark text-white" style="background-color: #33ccff;" value="{{$item->Anydesk}}" />
                                                        </div>

                                                        <!--campo para editar la ubicacion-->

                                                        <div class="col-md-3">
                                                            <label for="ubicacion" class="form-label fw-bold">Ubicación:</label>
                                                            <input type="text" id="ubicacion" name="ubicacion" class="form-control border-dark text-white text-center" style="background-color: #33ccff;" value="{{$item->Ubicacion}}" />
                                                            <br>
                                                        </div>

                                                        <!--lista desplegable para elegir la oficina donde se encuentra-->

                                                        <div class="col-md-2">
                                                            <label for="oficina" class="form-label fw-bold">Oficina:</label>
                                                            <select id="oficina" name="oficina" class="form-select border-dark text-white" style="background-color: #33ccff;" >
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
                                                            <label for="direccion" class="form-label fw-bold" >Dirección:</label>
                                                            <select id="direccion" name="direccion" class="form-select border-dark text-white" style="background-color: #33ccff;" >
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
                                                            <input type="text" id="clave_equipo" name="clave_equipo" class="form-control text-center border-dark text-white" style="background-color: #33ccff;" value="{{$item->Clave_equipo}}"  />
                                                        </div>

                                                        <!--campo para seleccionar el trabajador al cual esta asignado el equipo-->

                                                        <div class="col-md-5">
                                                            <label for="trabajador_id" class="form-label fw-bold">Trabajador asignado:</label>
                                                            <select name="trabajador_id" id="trabajador_id" class="form-select border-dark text-white" style="background-color: #33ccff;">
                                                                <option value=""></option>
                                                                @foreach ($trabajadores as $trabajador)
                                                                    <option value="{{ $item->ID_trabajador }}" @if ($trabajador->ID_trabajador == $item->ID_trabajador) selected @endif>{{ $trabajador->Nombre }}</option>
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
                <h2 class="mt-3 text-dark fw-bold">Historico</h2>

                <!--Aca se declara la parte para permitir las busquedas-->
                <div class="row">
                    <div class="col-xl-12">
                        <form action="{{route('example-app.buscar')}}" method="GET">
                            <div class="form-row">
                                <div class="col-sm-4 my-1">
                                <input type="text" class="form-control" name="texto" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚ\s]*" title="Por favor, ingresa solo letras o números" value="INSERTA EL ID" onfocus="this.value='';">
                                </div>
                                <div class="col-auto my-1" >
                                    <input type="submit" class="btn btn-success fw-bold" id="boton_buscar" style="width:27.2vh" value="Buscar">
                                    <input type="submit" class="btn btn-info fw-bold" id="boton_limpiar" style="width:27.3vh" value="Limpiar" formaction="{{ route('example-app.index') }}">
                                </div>                                
                            </div>
                        </form>
                    </div>
                </div>

                <!--Boton para descargar la BDD-->
                <div class="row">
                <form method="GET" action="{{ route('descargar.datos3') }}">
                    <button type="submit" class="btn btn-warning fw-bold" id="boton_descargar" style="width:55vh">Descargar tabla de historico</button>
                </form>
                </div>

                <br>

                <!--Encabezado de la tabla para los datos de la BDD-->
                <div class="table-responsive overflow-auto" style="max-height:30vh;">
                    <table class="table table-light ">
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
                                <td>{{$item->ID_equipo}}</td>
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
                                            <div class="modal-header " style="background-color: #f79a0e;">
                                            <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Modificar datos</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body" style="background-color: #f2f2f2;">
                                                <form class="col-md-8" action="{{ route('example-app.update3') }}" method="post">

                                                    <!--Para proteger contra ataques CSRF-->
                                                    @csrf

                                                    <div class="row">

                                                    <!--Desde aca se editan los datos personales del trabajador-->

                                                        <h2 class="fw-bold">
                                                            Historial:
                                                        </h2>

                                                        <!--campo para mostrar el ID del historico (NO es editable)-->

                                                        <div class="col-md-1">
                                                            <label for="ID_historico" class="form-label fw-bold">ID</label>
                                                            <input type="text" id="id" name="id" class="form-control border-dark text-white text-center" style="background-color:  #ff3333;" value="{{$item->ID_historico}}" readonly >
                                                        </div>

                                                        <div class="col-md-2">
                                                            <label for="ID_equipo" class="form-label fw-bold" style="color: #7ab82c;">ID del equipo</label>
                                                            <input type="text" id="id_equipo" name="id_equipo" class="form-control border-dark text-white text-center" style="background-color: #ff3333;" value="{{$item->ID_equipo}}" readonly />
                                                        </div>
                        
                                                        <div class="col-md-12">
                                                            <label for="historial_asignacion" class="form-label fw-bold" style="color: #7ab82c;">Historial asignacion:</label>
                                                            <input type="text" id="historial_asignacion" name="historial_asignacion" class="form-control border-dark text-white" style="background-color: #66c2c2;" value="{{$item->Historial_asignaciones}}" required />
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="procesos_ejecutar" class="form-label fw-bold" style="color: #7ab82c;">Procesos a ejecutar:</label>
                                                            <input type="text" id="procesos_ejecutar" name="procesos_ejecutar" class="form-control border-dark text-white" style="background-color: #66c2c2;" value="{{$item->Procesos_a_ejecutar}}" required />
                                                        </div>
                        
                                                        <div class="col-md-12">
                                                            <label for="Anotaciones" class="form-label fw-bold" style="color: #7ab82c;">Anotaciones:</label>
                                                            <textarea name="Anotaciones" rows="3" class="form-control border-dark text-white" style="background-color: #66c2c2;">{{$item->Anotaciones}}</textarea>
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
    <br>
    <br>

<!--Funcion del boostrap para el funcionamiento del modal-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>