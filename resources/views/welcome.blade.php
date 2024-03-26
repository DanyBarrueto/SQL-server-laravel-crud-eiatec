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
        <h2 class="fw-bold" >Datos personales del usuario:</h2>

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
                        <select id="ID_expedicion" name="ID_expedicion" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
                            <option value=""></option>
                            <option value="1">Apartadó</option>
                            <option value="2">Arauca</option>
                            <option value="3">Arauquita</option>
                            <option value="4">Armenia</option>
                            <option value="5">Barranquilla</option>
                            <option value="6">Bogotá</option>
                            <option value="7">Bucaramanga</option>
                            <option value="9">Cartagena</option>
                            <option value="10">Chía</option>
                            <option value="11">Cúcuta</option>
                            <option value="12">Florencia</option>
                            <option value="13">Girardot</option>
                            <option value="14">Ibagué</option>
                            <option value="15">Inírida</option>
                            <option value="16">Leticia</option>
                            <option value="17">Manizales</option>
                            <option value="18">Medellín</option>
                            <option value="19">Montería</option>
                            <option value="20">Neiva</option>
                            <option value="21">Pasto</option>
                            <option value="22">Pereira</option>
                            <option value="23">Pitalito</option>
                            <option value="24">Popayán</option>
                            <option value="25">Quibdó</option>
                            <option value="26">Riohacha</option>
                            <option value="27">Santa Marta</option>
                            <option value="28">Santa Rosa de Cabal</option>
                            <option value="29">Sincelejo</option>
                            <option value="30">Soacha</option>
                            <option value="31">Tunja</option>
                            <option value="32">Valledupar</option>
                            <option value="33">Villavicencio</option>
                            <option value="34">Yopal</option>
                            <option value="35">Abejorral</option>
                            <option value="36">Abrego</option>
                            <option value="37">Abriaquí</option>
                            <option value="38">Acacias</option>
                            <option value="39">Acandí</option>
                            <option value="40">Acevedo</option>
                            <option value="41">Achí</option>
                            <option value="42">Agrado</option>
                            <option value="43">Agua de Dios</option>
                            <option value="44">Aguachica</option>
                            <option value="45">Aguada</option>
                            <option value="46">Aguadas</option>
                            <option value="47">Aguazul</option>
                            <option value="48">Agustín Codazzi</option>
                            <option value="49">Aipe</option>
                            <option value="50">Albán</option>
                            <option value="51">Albania</option>
                            <option value="52">Alcalá</option>
                            <option value="53">Aldana</option>
                            <option value="54">Alejandría</option>
                            <option value="55">Algarrobo</option>
                            <option value="56">Algeciras</option>
                            <option value="57">Almaguer</option>
                            <option value="58">Almeida</option>
                            <option value="59">Alpujarra</option>
                            <option value="60">Altamira</option>
                            <option value="61">Alto Baudo</option>
                            <option value="62">Altos del Rosario</option>
                            <option value="63">Alvarado</option>
                            <option value="64">Amagá</option>
                            <option value="65">Amalfi</option>
                            <option value="66">Ambalema</option>
                            <option value="67">Anapoima</option>
                            <option value="68">Ancuyá</option>
                            <option value="69">Andalucía</option>
                            <option value="70">Andes</option>
                            <option value="71">Angelópolis</option>
                            <option value="72">Angostura</option>
                            <option value="73">Anolaima</option>
                            <option value="74">Anorí</option>
                            <option value="75">Anserma</option>
                            <option value="76">Ansermanuevo</option>
                            <option value="77">Anza</option>
                            <option value="78">Anzoátegui</option>
                            <option value="79">Apartadó</option>
                            <option value="80">Apía</option>
                            <option value="81">Apulo</option>
                            <option value="82">Aquitania</option>
                            <option value="83">Aracataca</option>
                            <option value="84">Aranzazu</option>
                            <option value="85">Aratoca</option>
                            <option value="88">Arbeláez</option>
                            <option value="89">Arboleda</option>
                            <option value="90">Arboledas</option>
                            <option value="91">Arboletes</option>
                            <option value="92">Arcabuco</option>
                            <option value="93">Arenal</option>
                            <option value="94">Argelia</option>
                            <option value="95">Ariguaní</option>
                            <option value="96">Arjona</option>
                            <option value="98">Armero</option>
                            <option value="99">Arroyohondo</option>
                            <option value="100">Astrea</option>
                            <option value="101">Ataco</option>
                            <option value="102">Atrato</option>
                            <option value="103">Ayapel</option>
                            <option value="104">Bagadó</option>
                            <option value="105">Bahía Solano</option>
                            <option value="106">Bajo Baudó</option>
                            <option value="107">Balboa</option>
                            <option value="108">Baranoa</option>
                            <option value="109">Baraya</option>
                            <option value="110">Barbacoas</option>
                            <option value="111">Barbosa</option>
                            <option value="112">Barichara</option>
                            <option value="113">Barranca de Upía</option>
                            <option value="114">Barrancabermeja</option>
                            <option value="115">Barrancas</option>
                            <option value="116">Barranco de Loba</option>
                            <option value="117">Barranco Minas</option>
                            <option value="119">Becerril</option>
                            <option value="120">Belalcázar</option>
                            <option value="121">Belén</option>
                            <option value="122">Belén de Bajira</option>
                            <option value="123">Belén de Los Andaquies</option>
                            <option value="124">Belén de Umbría</option>
                            <option value="125">Bello</option>
                            <option value="126">Belmira</option>
                            <option value="127">Beltrán</option>
                            <option value="128">Berbeo</option>
                            <option value="129">Betania</option>
                            <option value="130">Betéitiva</option>
                            <option value="131">Betulia</option>
                            <option value="132">Bituima</option>
                            <option value="133">Boavita</option>
                            <option value="134">Bochalema</option>
                            <option value="135">Bojaca</option>
                            <option value="136">Bojaya</option>
                            <option value="137">Bolívar</option>
                            <option value="138">Bosconia</option>
                            <option value="139">Boyacá</option>
                            <option value="140">Briceño</option>
                            <option value="142">Bucarasica</option>
                            <option value="143">Buena Vista</option>
                            <option value="144">Buenaventura</option>
                            <option value="145">Buenavista</option>
                            <option value="146">Buenos Aires</option>
                            <option value="147">Buesaco</option>
                            <option value="148">Bugalagrande</option>
                            <option value="149">Buriticá</option>
                            <option value="150">Busbanzá</option>
                            <option value="151">Cabrera</option>
                            <option value="152">Cabuyaro</option>
                            <option value="153">Cacahual</option>
                            <option value="154">Cáceres</option>
                            <option value="155">Cachipay</option>
                            <option value="156">Cachirá</option>
                            <option value="157">Cácota</option>
                            <option value="158">Caicedo</option>
                            <option value="159">Caicedonia</option>
                            <option value="160">Caimito</option>
                            <option value="161">Cajamarca</option>
                            <option value="162">Cajibío</option>
                            <option value="163">Cajicá</option>
                            <option value="164">Calamar</option>
                            <option value="165">Calarcá</option>
                            <option value="166">Caldas</option>
                            <option value="167">Caldono</option>
                            <option value="169">California</option>
                            <option value="170">Calima</option>
                            <option value="171">Caloto</option>
                            <option value="172">Campamento</option>
                            <option value="173">Campo de La Cruz</option>
                            <option value="174">Campoalegre</option>
                            <option value="175">Campohermoso</option>
                            <option value="176">Canalete</option>
                            <option value="177">Candelaria</option>
                            <option value="178">Cantagallo</option>
                            <option value="179">Cañasgordas</option>
                            <option value="180">Caparrapí</option>
                            <option value="181">Capitanejo</option>
                            <option value="182">Caqueza</option>
                            <option value="183">Caracolí</option>
                            <option value="184">Caramanta</option>
                            <option value="185">Carcasí</option>
                            <option value="186">Carepa</option>
                            <option value="187">Carmen de Apicala</option>
                            <option value="188">Carmen de Carupa</option>
                            <option value="189">Carmen del Darien</option>
                            <option value="190">Carolina</option>
                            <option value="192">Cartagena del Chairá</option>
                            <option value="193">Cartago</option>
                            <option value="194">Carurú</option>
                            <option value="195">Casabianca</option>
                            <option value="196">Castilla la Nueva</option>
                            <option value="197">Caucasia</option>
                            <option value="198">Cepitá</option>
                            <option value="199">Cereté</option>
                            <option value="200">Cerinza</option>
                            <option value="201">Cerrito</option>
                            <option value="202">Cerro San Antonio</option>
                            <option value="203">Cértegui</option>
                            <option value="204">Chachagüí</option>
                            <option value="205">Chaguaní</option>
                            <option value="206">Chalán</option>
                            <option value="207">Chámeza</option>
                            <option value="208">Chaparral</option>
                            <option value="209">Charalá</option>
                            <option value="210">Charta</option>
                            <option value="212">Chigorodó</option>
                            <option value="213">Chimá</option>
                            <option value="214">Chimichagua</option>
                            <option value="215">Chinácota</option>
                            <option value="216">Chinavita</option>
                            <option value="217">Chinchiná</option>
                            <option value="218">Chinú</option>
                            <option value="219">Chipaque</option>
                            <option value="220">Chipatá</option>
                            <option value="221">Chiquinquirá</option>
                            <option value="222">Chíquiza</option>
                            <option value="223">Chiriguaná</option>
                            <option value="224">Chiscas</option>
                            <option value="225">Chita</option>
                            <option value="226">Chitagá</option>
                            <option value="227">Chitaraque</option>
                            <option value="228">Chivatá</option>
                            <option value="229">Chivolo</option>
                            <option value="230">Chivor</option>
                            <option value="231">Choachí</option>
                            <option value="232">Chocontá</option>
                            <option value="233">Cicuco</option>
                            <option value="234">Ciénaga</option>
                            <option value="235">Ciénaga de Oro</option>
                            <option value="236">Ciénega</option>
                            <option value="237">Cimitarra</option>
                            <option value="238">Circasia</option>
                            <option value="239">Cisneros</option>
                            <option value="240">Ciudad Bolívar</option>
                            <option value="241">Clemencia</option>
                            <option value="242">Cocorná</option>
                            <option value="243">Coello</option>
                            <option value="244">Cogua</option>
                            <option value="245">Colón</option>
                            <option value="246">Coloso</option>
                            <option value="247">Cómbita</option>
                            <option value="248">Concepción</option>
                            <option value="249">Concordia</option>
                            <option value="250">Condoto</option>
                            <option value="251">Confines</option>
                            <option value="252">Consaca</option>
                            <option value="253">Contadero</option>
                            <option value="254">Contratación</option>
                            <option value="255">Convención</option>
                            <option value="256">Copacabana</option>
                            <option value="257">Coper</option>
                            <option value="258">Córdoba</option>
                            <option value="259">Corinto</option>
                            <option value="260">Coromoro</option>
                            <option value="261">Corozal</option>
                            <option value="262">Corrales</option>
                            <option value="263">Cota</option>
                            <option value="264">Cotorra</option>
                            <option value="265">Covarachía</option>
                            <option value="266">Coveñas</option>
                            <option value="267">Coyaima</option>
                            <option value="268">Cravo Norte</option>
                            <option value="269">Cuaspud</option>
                            <option value="270">Cubará</option>
                            <option value="271">Cubarral</option>
                            <option value="272">Cucaita</option>
                            <option value="273">Cucunubá</option>
                            <option value="275">Cucutilla</option>
                            <option value="276">Cuítiva</option>
                            <option value="277">Cumaral</option>
                            <option value="278">Cumaribo</option>
                            <option value="279">Cumbal</option>
                            <option value="280">Cumbitara</option>
                            <option value="281">Cunday</option>
                            <option value="282">Curillo</option>
                            <option value="283">Curití</option>
                            <option value="284">Curumaní</option>
                            <option value="285">Dabeiba</option>
                            <option value="286">Dagua</option>
                            <option value="287">Dibula</option>
                            <option value="288">Distracción</option>
                            <option value="289">Dolores</option>
                            <option value="290">Don Matías</option>
                            <option value="291">Dosquebradas</option>
                            <option value="292">Duitama</option>
                            <option value="293">Durania</option>
                            <option value="294">Ebéjico</option>
                            <option value="295">El Águila</option>
                            <option value="296">El Bagre</option>
                            <option value="297">El Banco</option>
                            <option value="298">El Cairo</option>
                            <option value="299">El Calvario</option>
                            <option value="300">El Cantón del San Pablo</option>
                            <option value="301">El Carmen</option>
                            <option value="302">El Carmen de Atrato</option>
                            <option value="303">El Carmen de Bolívar</option>
                            <option value="304">El Carmen de Chucurí</option>
                            <option value="305">El Carmen de Viboral</option>
                            <option value="306">El Castillo</option>
                            <option value="307">El Cerrito</option>
                            <option value="308">El Charco</option>
                            <option value="309">El Cocuy</option>
                            <option value="310">El Colegio</option>
                            <option value="311">El Copey</option>
                            <option value="312">El Doncello</option>
                            <option value="313">El Dorado</option>
                            <option value="314">El Dovio</option>
                            <option value="315">El Encanto</option>
                            <option value="316">El Espino</option>
                            <option value="317">El Guacamayo</option>
                            <option value="318">El Guamo</option>
                            <option value="319">El Litoral del San Juan</option>
                            <option value="320">El Molino</option>
                            <option value="321">El Paso</option>
                            <option value="322">El Paujil</option>
                            <option value="323">El Peñol</option>
                            <option value="324">El Peñón</option>
                            <option value="325">El Piñon</option>
                            <option value="326">El Playón</option>
                            <option value="327">El Retén</option>
                            <option value="328">El Retorno</option>
                            <option value="329">El Roble</option>
                            <option value="330">El Rosal</option>
                            <option value="331">El Rosario</option>
                            <option value="332">El Santuario</option>
                            <option value="333">El Tablón de Gómez</option>
                            <option value="334">El Tambo</option>
                            <option value="335">El Tarra</option>
                            <option value="336">El Zulia</option>
                            <option value="337">Elías</option>
                            <option value="338">Encino</option>
                            <option value="339">Enciso</option>
                            <option value="340">Entrerrios</option>
                            <option value="341">Envigado</option>
                            <option value="342">Espinal</option>
                            <option value="343">Facatativá</option>
                            <option value="344">Falan</option>
                            <option value="345">Filadelfia</option>
                            <option value="346">Filandia</option>
                            <option value="347">Firavitoba</option>
                            <option value="348">Flandes</option>
                            <option value="349">Florencia</option>
                            <option value="350">Floresta</option>
                            <option value="351">Florián</option>
                            <option value="352">Florida</option>
                            <option value="353">Floridablanca</option>
                            <option value="354">Fomeque</option>
                            <option value="355">Fonseca</option>
                            <option value="356">Fortul</option>
                            <option value="357">Fosca</option>
                            <option value="358">Francisco Pizarro</option>
                            <option value="359">Fredonia</option>
                            <option value="360">Fresno</option>
                            <option value="361">Frontino</option>
                            <option value="362">Fuente de Oro</option>
                            <option value="363">Fundación</option>
                            <option value="364">Funes</option>
                            <option value="365">Funza</option>
                            <option value="366">Fúquene</option>
                            <option value="367">Fusagasugá</option>
                            <option value="368">Gachala</option>
                            <option value="369">Gachancipá</option>
                            <option value="370">Gachantivá</option>
                            <option value="371">Gachetá</option>
                            <option value="372">Galán</option>
                            <option value="373">Galapa</option>
                            <option value="374">Galeras</option>
                            <option value="375">Gama</option>
                            <option value="376">Gamarra</option>
                            <option value="377">Gambita</option>
                            <option value="378">Gameza</option>
                            <option value="379">Garagoa</option>
                            <option value="380">Garzón</option>
                            <option value="381">Génova</option>
                            <option value="382">Gigante</option>
                            <option value="383">Ginebra</option>
                            <option value="384">Giraldo</option>
                            <option value="385">Girardot</option>
                            <option value="386">Girardota</option>
                            <option value="387">Girón</option>
                            <option value="388">Gómez Plata</option>
                            <option value="389">González</option>
                            <option value="390">Gramalote</option>
                            <option value="391">Granada</option>
                            <option value="392">Guaca</option>
                            <option value="393">Guacamayas</option>
                            <option value="394">Guacarí</option>
                            <option value="395">Guachené</option>
                            <option value="396">Guachetá</option>
                            <option value="397">Guachucal</option>
                            <option value="398">Guadalajara de Buga</option>
                            <option value="399">Guadalupe</option>
                            <option value="400">Guaduas</option>
                            <option value="401">Guaitarilla</option>
                            <option value="402">Gualmatán</option>
                            <option value="403">Guamal</option>
                            <option value="404">Guamo</option>
                            <option value="405">Guapi</option>
                            <option value="406">Guapotá</option>
                            <option value="407">Guaranda</option>
                            <option value="408">Guarne</option>
                            <option value="409">Guasca</option>
                            <option value="410">Guatapé</option>
                            <option value="411">Guataquí</option>
                            <option value="412">Guatavita</option>
                            <option value="413">Guateque</option>
                            <option value="414">Guática</option>
                            <option value="415">Guavatá</option>
                            <option value="416">Guayabal de Siquima</option>
                            <option value="417">Guayabetal</option>
                            <option value="418">Guayatá</option>
                            <option value="419">Güepsa</option>
                            <option value="420">Güicán</option>
                            <option value="421">Gutiérrez</option>
                            <option value="422">Hacarí</option>
                            <option value="423">Hatillo de Loba</option>
                            <option value="424">Hato</option>
                            <option value="425">Hato Corozal</option>
                            <option value="426">Hatonuevo</option>
                            <option value="427">Heliconia</option>
                            <option value="428">Herrán</option>
                            <option value="429">Herveo</option>
                            <option value="430">Hispania</option>
                            <option value="431">Hobo</option>
                            <option value="432">Honda</option>
                            <option value="433">Ibagué</option>
                            <option value="434">Icononzo</option>
                            <option value="435">Iles</option>
                            <option value="436">Imués</option>
                            <option value="437">Inírida</option>
                            <option value="438">Inzá</option>
                            <option value="439">Ipiales</option>
                            <option value="440">Iquira</option>
                            <option value="441">Isnos</option>
                            <option value="442">Istmina</option>
                            <option value="443">Itagui</option>
                            <option value="444">Ituango</option>
                            <option value="445">Iza</option>
                            <option value="446">Jambaló</option>
                            <option value="447">Jamundí</option>
                            <option value="448">Jardín</option>
                            <option value="449">Jenesano</option>
                            <option value="450">Jericó</option>
                            <option value="451">Jerusalén</option>
                            <option value="452">Jesús María</option>
                            <option value="453">Jordán</option>
                            <option value="454">Juan de Acosta</option>
                            <option value="455">Junín</option>
                            <option value="456">Juradó</option>
                            <option value="457">La Apartada</option>
                            <option value="458">La Argentina</option>
                            <option value="459">La Belleza</option>
                            <option value="460">La Calera</option>
                            <option value="461">La Capilla</option>
                            <option value="462">La Ceja</option>
                            <option value="463">La Celia</option>
                            <option value="464">La Chorrera</option>
                            <option value="465">La Cruz</option>
                            <option value="466">La Cumbre</option>
                            <option value="467">La Dorada</option>
                            <option value="468">La Esperanza</option>
                            <option value="469">La Estrella</option>
                            <option value="470">La Florida</option>
                            <option value="471">La Gloria</option>
                            <option value="472">La Guadalupe</option>
                            <option value="473">La Jagua de Ibirico</option>
                            <option value="474">La Jagua del Pilar</option>
                            <option value="475">La Llanada</option>
                            <option value="476">La Macarena</option>
                            <option value="477">La Merced</option>
                            <option value="478">La Mesa</option>
                            <option value="479">La Montañita</option>
                            <option value="480">La Palma</option>
                            <option value="481">La Paz</option>
                            <option value="482">La Pedrera</option>
                            <option value="483">La Peña</option>
                            <option value="484">La Pintada</option>
                            <option value="485">La Plata</option>
                            <option value="486">La Playa</option>
                            <option value="487">La Primavera</option>
                            <option value="488">La Salina</option>
                            <option value="489">La Sierra</option>
                            <option value="490">La Tebaida</option>
                            <option value="491">La Tola</option>
                            <option value="492">La Unión</option>
                            <option value="493">La Uvita</option>
                            <option value="494">La Vega</option>
                            <option value="495">La Victoria</option>
                            <option value="496">La Virginia</option>
                            <option value="497">Labateca</option>
                            <option value="498">Labranzagrande</option>
                            <option value="499">Landázuri</option>
                            <option value="500">Lebríja</option>
                            <option value="501">Leguízamo</option>
                            <option value="502">Leiva</option>
                            <option value="503">Lejanías</option>
                            <option value="504">Lenguazaque</option>
                            <option value="505">Lérida</option>
                            <option value="506">Leticia</option>
                            <option value="507">Líbano</option>
                            <option value="508">Liborina</option>
                            <option value="509">Linares</option>
                            <option value="510">Lloró</option>
                            <option value="511">López</option>
                            <option value="512">Lorica</option>
                            <option value="513">Los Andes</option>
                            <option value="514">Los Córdobas</option>
                            <option value="515">Los Palmitos</option>
                            <option value="516">Los Patios</option>
                            <option value="517">Los Santos</option>
                            <option value="518">Lourdes</option>
                            <option value="519">Luruaco</option>
                            <option value="520">Macanal</option>
                            <option value="521">Macaravita</option>
                            <option value="522">Maceo</option>
                            <option value="523">Macheta</option>
                            <option value="524">Madrid</option>
                            <option value="525">Magangué</option>
                            <option value="526">Magüí</option>
                            <option value="527">Mahates</option>
                            <option value="528">Maicao</option>
                            <option value="529">Majagual</option>
                            <option value="530">Málaga</option>
                            <option value="531">Malambo</option>
                            <option value="532">Mallama</option>
                            <option value="533">Manatí</option>
                            <option value="534">Manaure</option>
                            <option value="535">Maní</option>
                            <option value="536">Manizales</option>
                            <option value="537">Manta</option>
                            <option value="538">Manzanares</option>
                            <option value="539">Mapiripán</option>
                            <option value="540">Mapiripana</option>
                            <option value="541">Margarita</option>
                            <option value="542">María la Baja</option>
                            <option value="543">Marinilla</option>
                            <option value="544">Maripí</option>
                            <option value="545">Mariquita</option>
                            <option value="546">Marmato</option>
                            <option value="547">Marquetalia</option>
                            <option value="548">Marsella</option>
                            <option value="549">Marulanda</option>
                            <option value="550">Matanza</option>
                            <option value="551">Medellín</option>
                            <option value="552">Medina</option>
                            <option value="553">Medio Atrato</option>
                            <option value="554">Medio Baudó</option>
                            <option value="555">Medio San Juan</option>
                            <option value="556">Melgar</option>
                            <option value="557">Mercaderes</option>
                            <option value="558">Mesetas</option>
                            <option value="559">Milán</option>
                            <option value="560">Miraflores</option>
                            <option value="561">Miranda</option>
                            <option value="562">Miriti Paraná</option>
                            <option value="563">Mistrató</option>
                            <option value="564">Mitú</option>
                            <option value="565">Mocoa</option>
                            <option value="566">Mogotes</option>
                            <option value="567">Molagavita</option>
                            <option value="568">Momil</option>
                            <option value="569">Mompós</option>
                            <option value="570">Mongua</option>
                            <option value="571">Monguí</option>
                            <option value="572">Moniquirá</option>
                            <option value="573">Montebello</option>
                            <option value="574">Montecristo</option>
                            <option value="575">Montelíbano</option>
                            <option value="576">Montenegro</option>
                            <option value="577">Montería</option>
                            <option value="578">Monterrey</option>
                            <option value="579">Moñitos</option>
                            <option value="580">Morales</option>
                            <option value="581">Morelia</option>
                            <option value="582">Morichal</option>
                            <option value="583">Morroa</option>
                            <option value="584">Mosquera</option>
                            <option value="585">Motavita</option>
                            <option value="586">Murillo</option>
                            <option value="587">Murindó</option>
                            <option value="588">Mutatá</option>
                            <option value="589">Mutiscua</option>
                            <option value="590">Muzo</option>
                            <option value="591">Nariño</option>
                            <option value="592">Nátaga</option>
                            <option value="593">Natagaima</option>
                            <option value="594">Nechí</option>
                            <option value="595">Necoclí</option>
                            <option value="596">Neira</option>
                            <option value="597">Neiva</option>
                            <option value="598">Nemocón</option>
                            <option value="599">Nilo</option>
                            <option value="600">Nimaima</option>
                            <option value="601">Nobsa</option>
                            <option value="602">Nocaima</option>
                            <option value="603">Norcasia</option>
                            <option value="604">Norosí</option>
                            <option value="605">Nóvita</option>
                            <option value="606">Nueva Granada</option>
                            <option value="607">Nuevo Colón</option>
                            <option value="608">Nunchía</option>
                            <option value="609">Nuquí</option>
                            <option value="610">Obando</option>
                            <option value="611">Ocamonte</option>
                            <option value="612">Ocaña</option>
                            <option value="613">Oiba</option>
                            <option value="614">Oicatá</option>
                            <option value="615">Olaya</option>
                            <option value="616">Olaya Herrera</option>
                            <option value="617">Onzaga</option>
                            <option value="618">Oporapa</option>
                            <option value="619">Orito</option>
                            <option value="620">Orocué</option>
                            <option value="621">Ortega</option>
                            <option value="622">Ospina</option>
                            <option value="623">Otanche</option>
                            <option value="624">Ovejas</option>
                            <option value="625">Pachavita</option>
                            <option value="626">Pacho</option>
                            <option value="627">Pacoa</option>
                            <option value="628">Pácora</option>
                            <option value="629">Padilla</option>
                            <option value="630">Páez</option>
                            <option value="631">Paicol</option>
                            <option value="632">Pailitas</option>
                            <option value="633">Paime</option>
                            <option value="634">Paipa</option>
                            <option value="635">Pajarito</option>
                            <option value="636">Palermo</option>
                            <option value="637">Palestina</option>
                            <option value="638">Palmar</option>
                            <option value="639">Palmar de Varela</option>
                            <option value="640">Palmas del Socorro</option>
                            <option value="641">Palmira</option>
                            <option value="642">Palmito</option>
                            <option value="643">Palocabildo</option>
                            <option value="644">Pamplona</option>
                            <option value="645">Pamplonita</option>
                            <option value="646">Pana Pana</option>
                            <option value="647">Pandi</option>
                            <option value="648">Panqueba</option>
                            <option value="649">Papunahua</option>
                            <option value="650">Páramo</option>
                            <option value="651">Paratebueno</option>
                            <option value="652">Pasca</option>
                            <option value="653">Pasto</option>
                            <option value="654">Patía</option>
                            <option value="655">Pauna</option>
                            <option value="656">Paya</option>
                            <option value="657">Paz de Ariporo</option>
                            <option value="658">Paz de Río</option>
                            <option value="659">Pedraza</option>
                            <option value="660">Pelaya</option>
                            <option value="661">Pensilvania</option>
                            <option value="662">Peñol</option>
                            <option value="663">Peque</option>
                            <option value="664">Pereira</option>
                            <option value="665">Pesca</option>
                            <option value="666">Piamonte</option>
                            <option value="667">Piedecuesta</option>
                            <option value="668">Piedras</option>
                            <option value="669">Piendamó</option>
                            <option value="670">Pijao</option>
                            <option value="671">Pijiño del Carmen</option>
                            <option value="672">Pinchote</option>
                            <option value="673">Pinillos</option>
                            <option value="674">Piojó</option>
                            <option value="675">Pisba</option>
                            <option value="676">Pital</option>
                            <option value="677">Pitalito</option>
                            <option value="678">Pivijay</option>
                            <option value="679">Planadas</option>
                            <option value="680">Planeta Rica</option>
                            <option value="681">Plato</option>
                            <option value="682">Policarpa</option>
                            <option value="683">Polonuevo</option>
                            <option value="684">Ponedera</option>
                            <option value="685">Popayán</option>
                            <option value="686">Pore</option>
                            <option value="687">Potosí</option>
                            <option value="688">Pradera</option>
                            <option value="689">Prado</option>
                            <option value="690">Providencia</option>
                            <option value="691">Pueblo Bello</option>
                            <option value="692">Pueblo Nuevo</option>
                            <option value="693">Pueblo Rico</option>
                            <option value="694">Pueblo Viejo</option>
                            <option value="695">Pueblorrico</option>
                            <option value="696">Puente Nacional</option>
                            <option value="697">Puerres</option>
                            <option value="698">Puerto Alegría</option>
                            <option value="699">Puerto Arica</option>
                            <option value="700">Puerto Asís</option>
                            <option value="701">Puerto Berrío</option>
                            <option value="702">Puerto Boyacá</option>
                            <option value="703">Puerto Caicedo</option>
                            <option value="704">Puerto Carreño</option>
                            <option value="705">Puerto Colombia</option>
                            <option value="706">Puerto Concordia</option>
                            <option value="707">Puerto Escondido</option>
                            <option value="708">Puerto Gaitán</option>
                            <option value="709">Puerto Guzmán</option>
                            <option value="710">Puerto Libertador</option>
                            <option value="711">Puerto Lleras</option>
                            <option value="712">Puerto López</option>
                            <option value="713">Puerto Nare</option>
                            <option value="714">Puerto Nariño</option>
                            <option value="715">Puerto Parra</option>
                            <option value="716">Puerto Rico</option>
                            <option value="717">Puerto Rondón</option>
                            <option value="718">Puerto Salgar</option>
                            <option value="719">Puerto Santander</option>
                            <option value="720">Puerto Tejada</option>
                            <option value="721">Puerto Triunfo</option>
                            <option value="722">Puerto Wilches</option>
                            <option value="723">Pulí</option>
                            <option value="724">Pupiales</option>
                            <option value="725">Puracé</option>
                            <option value="726">Purificación</option>
                            <option value="727">Purísima</option>
                            <option value="728">Quebradanegra</option>
                            <option value="729">Quetame</option>
                            <option value="730">Quibdó</option>
                            <option value="731">Quimbaya</option>
                            <option value="732">Quinchía</option>
                            <option value="733">Quípama</option>
                            <option value="734">Quipile</option>
                            <option value="735">Ragonvalia</option>
                            <option value="736">Ramiriquí</option>
                            <option value="737">Ráquira</option>
                            <option value="738">Recetor</option>
                            <option value="739">Regidor</option>
                            <option value="740">Remedios</option>
                            <option value="741">Remolino</option>
                            <option value="742">Repelón</option>
                            <option value="743">Restrepo</option>
                            <option value="744">Retiro</option>
                            <option value="745">Ricaurte</option>
                            <option value="746">Rio Blanco</option>
                            <option value="747">Río de Oro</option>
                            <option value="748">Río Iro</option>
                            <option value="749">Río Quito</option>
                            <option value="750">Río Viejo</option>
                            <option value="751">Riofrío</option>
                            <option value="752">Riohacha</option>
                            <option value="753">Rionegro</option>
                            <option value="754">Riosucio</option>
                            <option value="755">Risaralda</option>
                            <option value="756">Rivera</option>
                            <option value="757">Roberto Payán</option>
                            <option value="758">Roldanillo</option>
                            <option value="759">Roncesvalles</option>
                            <option value="760">Rondón</option>
                            <option value="761">Rosas</option>
                            <option value="762">Rovira</option>
                            <option value="763">Sabana de Torres</option>
                            <option value="764">Sabanagrande</option>
                            <option value="765">Sabanalarga</option>
                            <option value="766">Sabanas de San Angel</option>
                            <option value="767">Sabaneta</option>
                            <option value="768">Saboyá</option>
                            <option value="769">Sácama</option>
                            <option value="770">Sáchica</option>
                            <option value="771">Sahagún</option>
                            <option value="772">Saladoblanco</option>
                            <option value="773">Salamina</option>
                            <option value="774">Salazar</option>
                            <option value="775">Saldaña</option>
                            <option value="776">Salento</option>
                            <option value="777">Salgar</option>
                            <option value="778">Samacá</option>
                            <option value="779">Samaná</option>
                            <option value="780">Samaniego</option>
                            <option value="781">Sampués</option>
                            <option value="782">San Agustín</option>
                            <option value="783">San Alberto</option>
                            <option value="784">San Andrés</option>
                            <option value="785">San Andrés de Cuerquía</option>
                            <option value="786">San Andrés de Tumaco</option>
                            <option value="787">San Andrés Sotavento</option>
                            <option value="788">San Antero</option>
                            <option value="789">San Antonio</option>
                            <option value="790">San Antonio del Tequendama</option>
                            <option value="791">San Benito</option>
                            <option value="792">San Benito Abad</option>
                            <option value="793">San Bernardo</option>
                            <option value="794">San Bernardo del Viento</option>
                            <option value="795">San Calixto</option>
                            <option value="796">San Carlos</option>
                            <option value="797">San Carlos de Guaroa</option>
                            <option value="798">San Cayetano</option>
                            <option value="799">San Cristóbal</option>
                            <option value="800">San Diego</option>
                            <option value="801">San Eduardo</option>
                            <option value="802">San Estanislao</option>
                            <option value="803">San Felipe</option>
                            <option value="804">San Fernando</option>
                            <option value="805">San Francisco</option>
                            <option value="806">San Gil</option>
                            <option value="807">San Jacinto</option>
                            <option value="808">San Jacinto del Cauca</option>
                            <option value="809">San Jerónimo</option>
                            <option value="810">San Joaquín</option>
                            <option value="811">San José</option>
                            <option value="812">San José de La Montaña</option>
                            <option value="813">San José de Miranda</option>
                            <option value="814">San José de Pare</option>
                            <option value="815">San José de Uré</option>
                            <option value="816">San José del Fragua</option>
                            <option value="817">San José del Guaviare</option>
                            <option value="818">San José del Palmar</option>
                            <option value="819">San Juan de Arama</option>
                            <option value="820">San Juan de Betulia</option>
                            <option value="821">San Juan de Río Seco</option>
                            <option value="822">San Juan de Urabá</option>
                            <option value="823">San Juan del Cesar</option>
                            <option value="824">San Juan Nepomuceno</option>
                            <option value="825">San Juanito</option>
                            <option value="826">San Lorenzo</option>
                            <option value="827">San Luis</option>
                            <option value="828">San Luis de Gaceno</option>
                            <option value="829">San Luis de Sincé</option>
                            <option value="830">San Marcos</option>
                            <option value="831">San Martín</option>
                            <option value="832">San Martín de Loba</option>
                            <option value="833">San Mateo</option>
                            <option value="834">San Miguel</option>
                            <option value="835">San Miguel de Sema</option>
                            <option value="836">San Onofre</option>
                            <option value="837">San Pablo</option>
                            <option value="838">San Pablo de Borbur</option>
                            <option value="839">San Pedro</option>
                            <option value="840">San Pedro de Cartago</option>
                            <option value="841">San Pedro de Uraba</option>
                            <option value="842">San Pelayo</option>
                            <option value="843">San Rafael</option>
                            <option value="844">San Roque</option>
                            <option value="845">San Sebastián</option>
                            <option value="846">San Sebastián de Buenavista</option>
                            <option value="847">San Vicente</option>
                            <option value="848">San Vicente de Chucurí</option>
                            <option value="849">San Vicente del Caguán</option>
                            <option value="850">San Zenón</option>
                            <option value="851">Sandoná</option>
                            <option value="852">Santa Ana</option>
                            <option value="853">Santa Bárbara</option>
                            <option value="854">Santa Bárbara de Pinto</option>
                            <option value="855">Santa Catalina</option>
                            <option value="856">Santa Helena del Opón</option>
                            <option value="857">Santa Isabel</option>
                            <option value="858">Santa Lucía</option>
                            <option value="859">Santa María</option>
                            <option value="861">Santa Rosa</option>
                            <option value="863">Santa Rosa de Osos</option>
                            <option value="864">Santa Rosa de Viterbo</option>
                            <option value="865">Santa Rosa del Sur</option>
                            <option value="866">Santa Rosalía</option>
                            <option value="867">Santa Sofía</option>
                            <option value="868">Santacruz</option>
                            <option value="869">Santafé de Antioquia</option>
                            <option value="870">Santana</option>
                            <option value="871">Santander de Quilichao</option>
                            <option value="872">Santiago</option>
                            <option value="873">Santiago de Tolú</option>
                            <option value="874">Santo Domingo</option>
                            <option value="875">Santo Tomás</option>
                            <option value="876">Santuario</option>
                            <option value="877">Sapuyes</option>
                            <option value="878">Saravena</option>
                            <option value="879">Sardinata</option>
                            <option value="880">Sasaima</option>
                            <option value="881">Sativanorte</option>
                            <option value="882">Sativasur</option>
                            <option value="883">Segovia</option>
                            <option value="884">Sesquilé</option>
                            <option value="885">Sevilla</option>
                            <option value="886">Siachoque</option>
                            <option value="887">Sibaté</option>
                            <option value="888">Sibundoy</option>
                            <option value="889">Silos</option>
                            <option value="890">Silvania</option>
                            <option value="891">Silvia</option>
                            <option value="892">Simacota</option>
                            <option value="893">Simijaca</option>
                            <option value="894">Simití</option>
                            <option value="895">Sincelejo</option>
                            <option value="896">Sipí</option>
                            <option value="897">Sitionuevo</option>
                            <option value="899">Soatá</option>
                            <option value="900">Socha</option>
                            <option value="901">Socorro</option>
                            <option value="902">Socotá</option>
                            <option value="903">Sogamoso</option>
                            <option value="904">Solano</option>
                            <option value="905">Soledad</option>
                            <option value="906">Solita</option>
                            <option value="907">Somondoco</option>
                            <option value="908">Sonsón</option>
                            <option value="909">Sopetrán</option>
                            <option value="910">Soplaviento</option>
                            <option value="911">Sopó</option>
                            <option value="912">Sora</option>
                            <option value="913">Soracá</option>
                            <option value="914">Sotaquirá</option>
                            <option value="915">Sotara</option>
                            <option value="916">Suaita</option>
                            <option value="917">Suan</option>
                            <option value="918">Suárez</option>
                            <option value="919">Suaza</option>
                            <option value="920">Subachoque</option>
                            <option value="921">Sucre</option>
                            <option value="922">Suesca</option>
                            <option value="923">Supatá</option>
                            <option value="924">Supía</option>
                            <option value="925">Suratá</option>
                            <option value="926">Susa</option>
                            <option value="927">Susacón</option>
                            <option value="928">Sutamarchán</option>
                            <option value="929">Sutatausa</option>
                            <option value="930">Sutatenza</option>
                            <option value="931">Tabio</option>
                            <option value="932">Tadó</option>
                            <option value="933">Talaigua Nuevo</option>
                            <option value="934">Tamalameque</option>
                            <option value="935">Támara</option>
                            <option value="936">Tame</option>
                            <option value="937">Támesis</option>
                            <option value="938">Taminango</option>
                            <option value="939">Tangua</option>
                            <option value="940">Taraira</option>
                            <option value="941">Tarapacá</option>
                            <option value="942">Tarazá</option>
                            <option value="943">Tarqui</option>
                            <option value="944">Tarso</option>
                            <option value="945">Tasco</option>
                            <option value="946">Tauramena</option>
                            <option value="947">Tausa</option>
                            <option value="948">Tello</option>
                            <option value="949">Tena</option>
                            <option value="950">Tenerife</option>
                            <option value="951">Tenjo</option>
                            <option value="952">Tenza</option>
                            <option value="953">Teorama</option>
                            <option value="954">Teruel</option>
                            <option value="955">Tesalia</option>
                            <option value="956">Tibacuy</option>
                            <option value="957">Tibaná</option>
                            <option value="958">Tibasosa</option>
                            <option value="959">Tibirita</option>
                            <option value="960">Tibú</option>
                            <option value="961">Tierralta</option>
                            <option value="962">Timaná</option>
                            <option value="963">Timbío</option>
                            <option value="964">Timbiquí</option>
                            <option value="965">Tinjacá</option>
                            <option value="966">Tipacoque</option>
                            <option value="967">Tiquisio</option>
                            <option value="968">Titiribí</option>
                            <option value="969">Toca</option>
                            <option value="970">Tocaima</option>
                            <option value="971">Tocancipá</option>
                            <option value="972">Togüí</option>
                            <option value="973">Toledo</option>
                            <option value="974">Tolú Viejo</option>
                            <option value="975">Tona</option>
                            <option value="976">Tópaga</option>
                            <option value="977">Topaipí</option>
                            <option value="978">Toribio</option>
                            <option value="979">Toro</option>
                            <option value="980">Tota</option>
                            <option value="981">Totoró</option>
                            <option value="982">Trinidad</option>
                            <option value="983">Trujillo</option>
                            <option value="984">Tubará</option>
                            <option value="985">Tuchín</option>
                            <option value="986">Tuluá</option>
                            <option value="987">Tunja</option>
                            <option value="988">Tununguá</option>
                            <option value="989">Túquerres</option>
                            <option value="990">Turbaco</option>
                            <option value="991">Turbaná</option>
                            <option value="992">Turbo</option>
                            <option value="993">Turmequé</option>
                            <option value="994">Tuta</option>
                            <option value="995">Tutazá</option>
                            <option value="996">Ubalá</option>
                            <option value="997">Ubaque</option>
                            <option value="998">Ulloa</option>
                            <option value="999">Umbita</option>
                            <option value="1000">Une</option>
                            <option value="1001">Unguía</option>
                            <option value="1002">Unión Panamericana</option>
                            <option value="1003">Uramita</option>
                            <option value="1004">Uribe</option>
                            <option value="1005">Uribia</option>
                            <option value="1006">Urrao</option>
                            <option value="1007">Urumita</option>
                            <option value="1008">Usiacurí</option>
                            <option value="1009">Útica</option>
                            <option value="1010">Valdivia</option>
                            <option value="1011">Valencia</option>
                            <option value="1012">Valle de Guamez</option>
                            <option value="1013">Valle de San José</option>
                            <option value="1014">Valle de San Juan</option>
                            <option value="1015">Valledupar</option>
                            <option value="1016">Valparaíso</option>
                            <option value="1017">Vegachí</option>
                            <option value="1018">Vélez</option>
                            <option value="1019">Venadillo</option>
                            <option value="1020">Venecia</option>
                            <option value="1021">Ventaquemada</option>
                            <option value="1022">Vergara</option>
                            <option value="1023">Versalles</option>
                            <option value="1024">Vetas</option>
                            <option value="1025">Vianí</option>
                            <option value="1026">Victoria</option>
                            <option value="1027">Vigía del Fuerte</option>
                            <option value="1028">Vijes</option>
                            <option value="1029">Villa Caro</option>
                            <option value="1030">Villa de Leyva</option>
                            <option value="1031">Villa de San Diego de Ubate</option>
                            <option value="1032">Villa del Rosario</option>
                            <option value="1033">Villa Rica</option>
                            <option value="1034">Villagarzón</option>
                            <option value="1035">Villagómez</option>
                            <option value="1036">Villahermosa</option>
                            <option value="1037">Villamaría</option>
                            <option value="1038">Villanueva</option>
                            <option value="1039">Villapinzón</option>
                            <option value="1040">Villarrica</option>
                            <option value="1041">Villavicencio</option>
                            <option value="1042">Villavieja</option>
                            <option value="1043">Villeta</option>
                            <option value="1044">Viotá</option>
                            <option value="1045">Viracachá</option>
                            <option value="1046">Vista Hermosa</option>
                            <option value="1047">Viterbo</option>
                            <option value="1048">Yacopí</option>
                            <option value="1049">Yacuanquer</option>
                            <option value="1050">Yaguará</option>
                            <option value="1051">Yalí</option>
                            <option value="1052">Yarumal</option>
                            <option value="1053">Yavaraté</option>
                            <option value="1054">Yolombó</option>
                            <option value="1055">Yondó</option>
                            <option value="1056">Yopal</option>
                            <option value="1057">Yotoco</option>
                            <option value="1058">Yumbo</option>
                            <option value="1059">Zambrano</option>
                            <option value="1060">Zapatoca</option>
                            <option value="1061">Zapayán</option>
                            <option value="1062">Zaragoza</option>
                            <option value="1063">Zarzal</option>
                            <option value="1064">Zetaquira</option>
                            <option value="1065">Zipacón</option>
                            <option value="1066">Zipaquirá</option>
                            <option value="1067">Zona Bananera</option>
                            <option value="1068">Colombia</option>
                            <option value="1070">Chima</option>
                            <option value="1071">Putumayo</option>
                        </select>
                    </div>

                    <!--campo para insertar el nombre-->

                    <div class="col-md-7">
                        <label for="nombre" class="form-label fw-bold" style="color: #7ab82c;">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control border-dark text-white text-center" style="background-color: #66c2c2;" pattern="[a-zA-ZáéíóúÁÉÍÓÚüÜ\s]+" title="Por favor ingresa solo letras" required />
                    </div>

                    <!--lista desplegable para elegir a uno de los coordinadores-->

                    <div class="col-md-4">
                        <label for="coordinador" class="form-label fw-bold" style="color: #7ab82c;">Coordinador:</label>
                        <select id="coordinador" name="coordinador" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
                            <option value=""></option>
                            <option value="1">Nayive Gutierrez Romero</option>
                            <option value="2">Wilson Ramírez Pineda</option>
                            <option value="3">Sandra Milena Perez Pico</option>
                            <option value="4">Rubén Darío Ramírez Motta</option>
                            <option value="5">Steven Ricardo Garzón Burgos</option>
                            <option value="6">Nara Marcela Niño Martinez</option>
                            <option value="7">Camila Rivera Paez</option>
                            <option value="8">Clara Johanna Rodriguez Melo</option>
                            <option value="9">Diego Fernando Mantilla Rincon</option>
                            <option value="10">Sara Mayerly Amado Ariza</option>
                            <option value="11">Ancizar Sanchez Urriago</option>
                            <option value="12">Cristhian Bernardo Rivera</option>
                            <option value="13">Marcela Cabrera</option>
                            <option value="14">Andres Valbuena</option>
                            <option value="15">Adriana Palma</option>
                            <option value="16">Cristhian Rivera</option>
                            <option value="17">Maria Gomez</option>
                            <option value="18">Monica Valderrama</option>
                            <option value="19">Madeline Ossa</option>
                            <option value="20">Carlos Galan</option>
                            <option value="21">Ninguno</option>
                        </select>
                    </div>

                    <!--lista desplegable para elegir uno de los cargos-->

                    <div class="col-md-8">
                        <label for="cargo" class="form-label fw-bold" style="color: #7ab82c;">Cargo:</label>
                        <select id="cargo" name="cargo" class="form-select border-dark text-white" style="background-color: #66c2c2;"  required>
                            <option value=""></option>
                            <option value="1">Abogado(a)</option>
                            <option value="2">Administracion Sistemas</option>
                            <option value="3">Administrativo</option>
                            <option value="4">Agrólogo (a)</option>
                            <option value="5">Agrónomo(a)</option>
                            <option value="6">Ambiental</option>
                            <option value="7">Antropólogo (a)</option>
                            <option value="8">Arqueólogo (a)</option>
                            <option value="9">Asistente Administrativa</option>
                            <option value="10">Auxiliar Administrativo</option>
                            <option value="11">Auxiliar Administrativa</option>
                            <option value="12">Auxiliar Ambiental</option>
                            <option value="13">Auxiliar Comercial</option>
                            <option value="14">Auxiliar Compras</option>
                            <option value="15">Auxiliar Contable</option>
                            <option value="16">Auxiliar de servicios generales</option>
                            <option value="17">Auxiliar de Campo</option>
                            <option value="18">Auxiliar De Servicios Generales</option>
                            <option value="19">Auxiliar Forestal</option>
                            <option value="20">Auxiliar Gestion Humana</option>
                            <option value="21">Auxiliar hseq</option>
                            <option value="22">Auxiliar Social</option>
                            <option value="23">Auxiliar Tecnico</option>
                            <option value="24">Auxliar Compras</option>
                            <option value="25">Biólogo</option>
                            <option value="26">Biólogo Epífito </option>
                            <option value="27">Contador Junior</option>
                            <option value="28">Coordinador (a) Gestion Humana</option>
                            <option value="29">Coordinador (a) Hseq</option>
                            <option value="30">Coordinador Administrativo (a)</option>
                            <option value="31">Coordinador Comercial</option>
                            <option value="32">Coordinador Compras</option>
                            <option value="33">Coordinador Contable</option>
                            <option value="34">Coordinador de Arqueología</option>
                            <option value="35">Coordinador De Proyectos</option>
                            <option value="36">Coordinador GEB</option>
                            <option value="37">Coordinador Gestión Humana</option>
                            <option value="38">Coordinador Jurídico</option>
                            <option value="39">Coordinador Logístico</option>
                            <option value="40">Coordinador Proyectos</option>
                            <option value="41">Coordinadora Proyectos </option>
                            <option value="42">Coordinador T.I</option>
                            <option value="43">Coordinador TIC</option>
                            <option value="44">Coordinador Administrativo</option>
                            <option value="45">Coordinador Social</option>
                            <option value="46">Coordinadora Social</option>
                            <option value="47">Cordinador HSEQ</option>
                            <option value="48">Cordinador Proyectos</option>
                            <option value="49">Cordinador Sistemas</option>
                            <option value="50">Desarrollo de Proyectos</option>
                            <option value="51">Director Administrativo</option>
                            <option value="52">Ecólogo (a)</option>
                            <option value="53">Estructurador De Proyectos Pvc - Social</option>
                            <option value="54">Forestal</option>
                            <option value="55">Formulador(a) De Proyectos</option>
                            <option value="56">Geógrafo (a)</option>
                            <option value="57">Geologo (a)</option>
                            <option value="58">Gerente Administrativo</option>
                            <option value="59">Gerente Comercial</option>
                            <option value="60">Gerente General</option>
                            <option value="61">Gerente Técnica</option>
                            <option value="62">Gestor Compras</option>
                            <option value="63">Gestor Contable</option>
                            <option value="64">Gestor de facturación</option>
                            <option value="65">Gestor Documental - Tecnico</option>
                            <option value="66">Gestor Financiero - Técnico</option>
                            <option value="67">Gestor Hseq</option>
                            <option value="68">Gestor Predial</option>
                            <option value="69">Gestor Social</option>
                            <option value="70">Gestora Contable</option>
                            <option value="71">Gestora Social</option>
                            <option value="72">Hidrólogo (a)</option>
                            <option value="73">Ingeniero ambiental</option>
                            <option value="74">Ingeniero Catastral</option>
                            <option value="75">Ingeniero Civil</option>
                            <option value="76">Ingeniero De Petróleos</option>
                            <option value="77">Ingeniero de petróleos</option>
                            <option value="78">Ingeniero Forestal</option>
                            <option value="79">Ingeniero Hidrólogo</option>
                            <option value="80">Ingeniero Minas</option>
                            <option value="81">Logistico</option>
                            <option value="82">Logistico/Conduccion</option>
                            <option value="83">Pasante ambiental</option>
                            <option value="84">Pasante Universitario Administrativo</option>
                            <option value="85">Pasante Universitario Ambiental</option>
                            <option value="86">Pasante Universitario Biólogo</option>
                            <option value="87">Pasante Universitario Compras</option>
                            <option value="88">Pasante Universitario Contable</option>
                            <option value="89">Pasante Universitario Forestal</option>
                            <option value="90">Pasante Universitario Gestion Humana</option>
                            <option value="91">Pasante Universitario Gología</option>
                            <option value="92">Pasante Universitario Hidrólogia</option>
                            <option value="93">Pasante Universitario Hseq</option>
                            <option value="94">Pasante Universitario Juridico</option>
                            <option value="95">Pasante Universitario Social</option>
                            <option value="96">Pasante Universitario TIC</option>
                            <option value="97">Practicante Universitario Administrativo</option>
                            <option value="98">Practicante Universitario Ambiental</option>
                            <option value="99">Practicante Universitario Biólogo</option>
                            <option value="100">Practicante Universitario Compras</option>
                            <option value="101">Practicante Universitario Contable</option>
                            <option value="102">Practicante Universitario Forestal</option>
                            <option value="103">Practicante Universitario Gestion Humana</option>
                            <option value="104">Practicante Universitario Gología</option>
                            <option value="105">Practicante Universitario Hidrólogia</option>
                            <option value="106">Practicante Universitario Hseq</option>
                            <option value="107">Practicante Universitario Juridico</option>
                            <option value="108">Practicante Universitario Social</option>
                            <option value="109">Practicante Universitario TIC</option>
                            <option value="110">Prof. Ambiental</option>
                            <option value="111">Profesional  Social</option>
                            <option value="112">Profesional Abiótico</option>
                            <option value="113">Profesional Abiótico Senior</option>
                            <option value="114">Profesional Administrativo</option>
                            <option value="115">Profesional Agrólogo (a)</option>
                            <option value="116">Profesional Agrónomo (a)</option>
                            <option value="117">Profesional Ambiental</option>
                            <option value="118">Profesional Antropologo</option>
                            <option value="119">Profesional Arqueólogia</option>
                            <option value="120">Profesional Biólogo</option>
                            <option value="121">Profesional Biólogo Herpetólogo</option>
                            <option value="122">Profesional Biólogo Mastozoólogo</option>
                            <option value="123">Profesional Biólogo Ornitólogo</option>
                            <option value="124">Profesional Biólogo Senior</option>
                            <option value="125">Profesional Biotico</option>
                            <option value="126">Profesional Biótico Intermedio</option>
                            <option value="127">Profesional Biótico Junior</option>
                            <option value="128">Profesional Biótico Senior</option>
                            <option value="129">Profesional Catastral</option>
                            <option value="130">Profesional Civil</option>
                            <option value="131">Profesional Comercial</option>
                            <option value="132">Profesional De Aseguramiento De Información - Sig</option>
                            <option value="133">Profesional De Minas</option>
                            <option value="134">Profesional De Petróleos</option>
                            <option value="135">Profesional Especializado</option>
                            <option value="136">Profesional Finanzas</option>
                            <option value="137">Profesional Forestal</option>
                            <option value="138">Profesional Geógrafo</option>
                            <option value="139">Profesional Geología</option>
                            <option value="140">Profesional Hseq</option>
                            <option value="141">Profesional Industrial</option>
                            <option value="142">Profesional Intermedio - Gestión Documental De Proyectos</option>
                            <option value="143">Profesional Intermedio - Gestor Social</option>
                            <option value="144">Profesional Intermedio - Supervisión De Contratos</option>
                            <option value="145">Profesional Intermedio- Supervisión de contratos</option>
                            <option value="146">Profesional Junior Social</option>
                            <option value="147">Profesional Jurídico</option>
                            <option value="148">Profesional Predial</option>
                            <option value="149">Profesional Predial Senior</option>
                            <option value="150">Profesional Senior Abogado</option>
                            <option value="151">Profesional Senior Social</option>
                            <option value="152">Profesional SIG </option>
                            <option value="153">Profesional Sig / Profesional De Aseguramiento De Información - Sig</option>
                            <option value="154">Profesional Sig Junior</option>
                            <option value="155">Profesional Sig Senior</option>
                            <option value="156">Profesional Social</option>
                            <option value="157">Profesional Social Experta</option>
                            <option value="158">Psicólogo (a)</option>
                            <option value="159">Sociólogo (a)</option>
                            <option value="160">Subgerente</option>
                            <option value="161">Técnico Sistemas </option>
                            <option value="162">Técnico TIC</option>
                            <option value="163">Tecnóloga con Conocimiento Específico - Ambiental</option>
                            <option value="164">Tecnólogo CE Forestal</option>
                            <option value="165">Tecnólogo Con Conocimiento Especifico En Biología</option>
                            <option value="166">Tecnólogo Con Conocimiento Especifico Forestal</option>
                            <option value="167">Tecnóloga Con Conocimiento Especifico Forestal</option>
                            <option value="168">Tecnólogo Geólogo</option>
                            <option value="169">Tecnologo Social</option>
                            <option value="170">Tesoreria</option>
                        </select>
                    </div>

                    <!--campo para insertar la cuenta de correo electonico-->

                    <div class="col-md-4">
                        <label for="cuenta" class="form-label fw-bold" style="color: #7ab82c;">Cuenta:</label>
                        <input type="text" id="cuenta" name="cuenta" class="form-control border-dark text-white text-center" style="background-color: #66c2c2;" required />
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

                    <div class="col-md-1">
                        <input type="submit" name="submit" value="Enviar" class="btn btn-lg btn-success mt-2 fw-bold" id="boton_enviar" />
                    </div>

                    <div class="col-md-1">
                        <input type="submit" class="btn btn-lg btn-info mt-2 fw-bold" id="boton_limpiar" value="Limpiar" formaction="{{ route('example-app.index') }}">
                    </div>

                    <br> <br> <br>
                    <hr>
                </div>    
            </form>
        </div>
    <!--Aca empieza la parte para ingresar los datos del equipo asignado en el formulario principal-->
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
                                    <label for="ubicacion_equipo" class="form-label fw-bold" style="color: #7ab82c;">Ubicación:</label>
                                    <select id="ubicacion_equipo" name="ubicacion_equipo" class="form-select border-dark text-white" style="background-color: #66c2c2;" required>
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

                                <div>
                                    <input type="submit" name="submit" value="Enviar" class="btn btn-lg btn-success mt-2 fw-bold" id="boton_enviar" />

                                    <input type="submit" class="btn btn-lg btn-info mt-2 fw-bold" id="boton_limpiar" value="Limpiar" formaction="{{ route('example-app.index') }}">

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

                                <div class="col-md-3">
                                    <label for="historial_asignacion" class="form-label fw-bold" style="color: #7ab82c;">ID del equipo</label>
                                    <input type="text" id="id_equipo" name="id_equipo" class="form-control border-dark text-white" style="background-color: #66c2c2;" required />
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
                                    <label for="observaciones" class="form-label fw-bold" style="color: #7ab82c;">Observaciones:</label>
                                    <textarea name="observaciones" rows="3" class="form-control border-dark text-white" style="background-color: #66c2c2;" ></textarea>
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

                <!--Boton para descargar la BDD-->
                <div class="row">
                <form method="GET" action="{{ route('descargar.datos') }}">
                    <button type="submit" class="btn btn-warning fw-bold" id="boton_descargar" style="width:55vh">Descargar BDD</button>
                </form>
                </div>

                <br>

                <!--Encabezado de la tabla para los datos de la BDD-->
                <div class="table-responsive overflow-auto" style="max-height:45vh;">
                    <table class="table table-light ">
                        <thead class="table-success table-responsive ">
                          <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Cédula</th>
                            <th>Cuenta</th>
                            <th>Ubicación</th>
                            <th>Area</th>
                            <th>Cargo</th>
                            <th>Codigo</th>
                            <th>Región</th>
                            <th>Oficina</th>
                            <th>Tipo de computador</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Número de serie</th>
                            <th>Id producto</th>
                            <th>Procesador</th>
                            <th>Ram</th>
                            <th>Disco duro</th>
                            <th>Gpu</th>
                            <th>Tipo de sistema</th>
                            <th>Display</th>
                            <th>Historial asignación</th>
                            <th>Procesos a ejecutar</th>
                            <th>Observaciones</th>
                            <th>Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            <!--Conexion con BDD para permitir mostrar los datos registrados
                                en la tabla recien creada-->
                            @foreach ($datos as $item)
                            <tr>
                                <td>{{$item->ID}}</td>
                                <td>{{$item->Nombre}}</td>
                                <td>{{$item->Cedula}}</td>
                                <td>{{$item->Cuenta}}</td>
                                <td>{{$item->Ubicacion}}</td>
                                <td>{{$item->Area}}</td>
                                <td>{{$item->Cargo}}</td>
                                <td>{{$item->Codigo}}</td>
                                <td>{{$item->Region}}</td>
                                <td>{{$item->Oficina}}</td>
                                <td>{{$item->Tipo_de_computador}}</td>
                                <td>{{$item->Marca}}</td>
                                <td>{{$item->Modelo}}</td>
                                <td>{{$item->Numero_de_serie}}</td>
                                <td>{{$item->Id_producto}}</td>
                                <td>{{$item->Procesador}}</td>
                                <td>{{$item->Ram}}</td>
                                <td>{{$item->Disco_duro}}</td>
                                <td>{{$item->Gpu}}</td>
                                <td>{{$item->Tipo_de_sistema}}</td>
                                <td>{{$item->Display}}</td>
                                <td>{{$item->Historial_asignacion}}</td>
                                <td>{{$item->Procesos_a_ejecutar}}</td>
                                <td>{{$item->Observaciones}}</td>
                                <td>
                                  <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->ID}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-nib fa-beat"></i></a>
                                </td>
  
                                <!-- Modal para modificar los datos de los registros de la BDD-->
                                <div class="modal fade" id="modalEditar{{$item->ID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
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
                                                            <input type="text" id="id" name="id" class="form-control border-dark text-white text-center" style="background-color:  #ff3333;" value="{{$item->ID}}" readonly >
                                                        </div>

                                                        <!--campo para editar la cedula-->

                                                        <div class="col-md-2">
                                                            <label for="cedula" class="form-label fw-bold">Cédula:</label>
                                                            <input type="text" id="cedula" name="cedula" class="form-control border-dark text-white text-center" style="background-color:  #33ccff;" value="{{$item->Cedula}}" pattern="[0-9]+" title="Por favor, ingresa solo números" />
                                                        </div>

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

                                                        <div class="col-md-2">
                                                            <label for="oficina" class="form-label fw-bold">Oficina:</label>
                                                            <select id="oficina" name="oficina" class="form-select border-dark text-white" style="background-color: #33ccff;" >
                                                                <option value=""></option>
                                                                <option value="N_Rio" {{ $item->Oficina == 'N_Rio' ? 'selected' : '' }}>N_Rio</option>
                                                                <option value="S_Nei" {{ $item->Oficina == 'S_Nei' ? 'selected' : '' }}>S_Nei</option>
                                                                <option value="C_Téc" {{ $item->Oficina == 'C_Téc' ? 'selected' : '' }}>C_Téc</option>
                                                                <option value="C_Adm" {{ $item->Oficina == 'C_Adm' ? 'selected' : '' }}>C_Adm</option>
                                                                <option value="C_Hof" {{ $item->Oficina == 'C_Hof' ? 'selected' : '' }}>C_Hof</option>
                                                                <option value="N_Hof" {{ $item->Oficina == 'N_Hof' ? 'selected' : '' }}>N_Hof</option>
                                                                <option value="S_Hof" {{ $item->Oficina == 'S_Hof' ? 'selected' : '' }}>S_Hof</option>
                                                                <option value="N_Uri" {{ $item->Oficina == 'N_Uri' ? 'selected' : '' }}>N_Uri</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <!--campo para editar el area -->

                                                        <div class="col-md-2">
                                                            <label for="area" class="form-label fw-bold">Area:</label>
                                                            <select id="area" name="area" class="form-select border-dark text-white" style="background-color: #33ccff;" >
                                                                <option value=""></option>
                                                                <option value="Tecnica" {{ $item->Area == 'Tecnica' ? 'selected' : '' }}>Tecnica</option>
                                                                <option value="Contabilidad" {{ $item->Area == 'Contabilidad' ? 'selected' : '' }}>Contabilidad</option>
                                                                <option value="Administracion" {{ $item->Area == 'Administracion' ? 'selected' : '' }}>Administracion</option>
                                                                <option value="Geb_Centro" {{ $item->Area == 'Geb_Centro' ? 'selected' : '' }}>Geb_Centro</option>
                                                                <option value="Geb_Norte" {{ $item->Area == 'Geb_Norte' ? 'selected' : '' }}>Geb_Norte</option>
                                                                <option value="Gerencia" {{ $item->Area == 'Gerencia' ? 'selected' : '' }}>Gerencia</option>
                                                            </select>
                                                        </div>

                                                        <!--campo para editar el cargo del trabajador-->

                                                        <div class="col-md-6">
                                                            <label for="cargo" class="form-label fw-bold">Cargo:</label>
                                                            <select id="cargo" name="cargo" class="form-select border-dark text-white" style="background-color: #33ccff;" >
                                                                <option value=""></option>
                                                                <option value="Gerente" {{ $item->Cargo == 'Gerente' ? 'selected' : '' }}>Gerente</option>
                                                                <option value="Profesional Forestal" {{ $item->Cargo == 'Profesional Forestal' ? 'selected' : '' }}>Profesional Forestal</option>
                                                                <option value="Profesional Ambiental" {{ $item->Cargo == 'Profesional Ambiental' ? 'selected' : '' }}>Profesional Ambiental</option>
                                                                <option value="Gestor Predial" {{ $item->Cargo == 'Gestor Predial' ? 'selected' : '' }}>Gestor Predial</option>
                                                                <option value="Coordinador de Proyectos" {{ $item->Cargo == 'Coordinador de Proyectos' ? 'selected' : '' }}>Coordinador de Proyectos</option>
                                                                <option value="Auxiliar HSEQ" {{ $item->Cargo == 'Auxiliar HSEQ' ? 'selected' : '' }}>Auxiliar HSEQ</option>
                                                                <option value="Profesional Civil" {{ $item->Cargo == 'Profesional Civil' ? 'selected' : '' }}>Profesional Civil</option>
                                                                <option value="Profesional Social" {{ $item->Cargo == 'Profesional Social' ? 'selected' : '' }}>Profesional Social</option>
                                                                <option value="Gerente Tecnico" {{ $item->Cargo == 'Gerente Tecnico' ? 'selected' : '' }}>Gerente Tecnico</option>
                                                                <option value="Coordinador De Arqueología" {{ $item->Cargo == 'Coordinador De Arqueología' ? 'selected' : '' }}>Coordinador De Arqueología</option>
                                                                <option value="Profesional Biologo" {{ $item->Cargo == 'Profesional Biologo' ? 'selected' : '' }}>Profesional Biologo</option>
                                                                <option value="Tecnologo Social" {{ $item->Cargo == 'Tecnologo Social' ? 'selected' : '' }}>Tecnologo Social</option>
                                                                <option value="Auxiliar de Servicios Generales" {{ $item->Cargo == 'Auxiliar de Servicios Generales' ? 'selected' : '' }}>Auxiliar de Servicios Generales</option>
                                                                <option value="Coordinador Sig" {{ $item->Cargo == 'Coordinador Sig' ? 'selected' : '' }}>Coordinador Sig</option>
                                                                <option value="Gerente Administrativo" {{ $item->Cargo == 'Gerente Administrativo' ? 'selected' : '' }}>Gerente Administrativo</option>
                                                                <option value="Coordinador Area Sig" {{ $item->Cargo == 'Coordinador Area Sig' ? 'selected' : '' }}>Coordinador Area Sig</option>
                                                                <option value="Contador Junior" {{ $item->Cargo == 'Contador Junior' ? 'selected' : '' }}>Contador Junior</option>
                                                                <option value="Gestor Social" {{ $item->Cargo == 'Gestor Social' ? 'selected' : '' }}>Gestor Social</option>
                                                                <option value="Logistico/Conduccion" {{ $item->Cargo == 'Logistico/Conduccion' ? 'selected' : '' }}>Logistico/Conduccion</option>
                                                                <option value="Profesional Geologo" {{ $item->Cargo == 'Profesional Geologo' ? 'selected' : '' }}>Profesional Geologo</option>
                                                                <option value="Profesional Biotico" {{ $item->Cargo == 'Profesional Biotico' ? 'selected' : '' }}>Profesional Biotico</option>
                                                                <option value="Profesional Especializado" {{ $item->Cargo == 'Profesional Especializado' ? 'selected' : '' }}>Profesional Especializado</option>
                                                                <option value="Asistente Administrativo" {{ $item->Cargo == 'Asistente Administrativo' ? 'selected' : '' }}>Asistente Administrativo</option>
                                                                <option value="Profesional Abiotico" {{ $item->Cargo == 'Profesional Abiotico' ? 'selected' : '' }}>Profesional Abiotico</option>
                                                                <option value="Asistente De Facturacion" {{ $item->Cargo == 'Asistente De Facturacion' ? 'selected' : '' }}>Asistente De Facturacion</option>
                                                                <option value="Estructurador de Proyectos" {{ $item->Cargo == 'Estructurador de Proyectos' ? 'selected' : '' }}>Estructurador de Proyectos</option>
                                                                <option value="Gerente General" {{ $item->Cargo == 'Gerente General' ? 'selected' : '' }}>Gerente General</option>
                                                                <option value="Logistico" {{ $item->Cargo == 'Logistico' ? 'selected' : '' }}>Logistico</option>
                                                                <option value="Auxiliar Tecnico/Alturas" {{ $item->Cargo == 'Auxiliar Tecnico/Alturas' ? 'selected' : '' }}>Auxiliar Tecnico/Alturas</option>
                                                                <option value="Profesional Arqueologo" {{ $item->Cargo == 'Profesional Arqueologo' ? 'selected' : '' }}>Profesional Arqueologo</option>
                                                                <option value="Tecnico Biologo" {{ $item->Cargo == 'Tecnico Biologo' ? 'selected' : '' }}>Tecnico Biologo</option>
                                                                <option value="Profesional Sig / Profesional De Aseguramiento De Información - Sig" {{ $item->Cargo == 'Profesional Sig / Profesional De Aseguramiento De Información - Sig' ? 'selected' : '' }}>Profesional Sig / Profesional De Aseguramiento De Información - Sig</option>
                                                                <option value="Coordinador Administrativo" {{ $item->Cargo == 'Coordinador Administrativo' ? 'selected' : '' }}>Coordinador Administrativo</option>
                                                                <option value="Tecnico Juridico" {{ $item->Cargo == 'Tecnico Juridico' ? 'selected' : '' }}>Tecnico Juridico</option>
                                                                <option value="Tecnologo Geologo" {{ $item->Cargo == 'Tecnologo Geologo' ? 'selected' : '' }}>Tecnologo Geologo</option>
                                                                <option value="Auxiliar Recursos Humanos" {{ $item->Cargo == 'Auxiliar Recursos Humanos' ? 'selected' : '' }}>Auxiliar Recursos Humanos</option>
                                                                <option value="Tecnico De Sistemas" {{ $item->Cargo == 'Tecnico De Sistemas' ? 'selected' : '' }}>Tecnico De Sistemas</option>
                                                                <option value="Subgerente" {{ $item->Cargo == 'Subgerente' ? 'selected' : '' }}>Subgerente</option>
                                                                <option value="Coordinador Social" {{ $item->Cargo == 'Coordinador Social' ? 'selected' : '' }}>Coordinador Social</option>
                                                                <option value="Coordinador De Compras Y Mantenimiento" {{ $item->Cargo == 'Coordinador De Compras Y Mantenimiento' ? 'selected' : '' }}>Coordinador De Compras Y Mantenimiento</option>
                                                                <option value="Coordinador HSEQ" {{ $item->Cargo == 'Coordinador HSEQ' ? 'selected' : '' }}>Coordinador HSEQ</option>
                                                                <option value="Coordinador T.I.C." {{ $item->Cargo == 'Coordinador T.I.C.' ? 'selected' : '' }}>Coordinador T.I.C.</option>
                                                                <option value="Profesional Biologo Mastozoologo" {{ $item->Cargo == 'Profesional Biologo Mastozoologo' ? 'selected' : '' }}>Profesional Biologo Mastozoologo</option>
                                                                <option value="Gestor Documental - Tecnico" {{ $item->Cargo == 'Gestor Documental - Tecnico' ? 'selected' : '' }}>Gestor Documental - Tecnico</option>
                                                                <option value="Contador" {{ $item->Cargo == 'Contador' ? 'selected' : '' }}>Contador</option>
                                                                <option value="Auxiliar Contable" {{ $item->Cargo == 'Auxiliar Contable' ? 'selected' : '' }}>Auxiliar Contable</option>
                                                                <option value="Coordinador Juridica" {{ $item->Cargo == 'Coordinador Juridica' ? 'selected' : '' }}>Coordinador Juridica</option>
                                                                <option value="Gerente Comercial" {{ $item->Cargo == 'Gerente Comercial' ? 'selected' : '' }}>Gerente Comercial</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <!--campo para editar la cuenta de correo electronico asignada al trabajador-->

                                                        <div class="col-md-4">
                                                            <label for="cuenta" class="form-label fw-bold">Cuenta:</label>
                                                            <input type="text" id="cuenta" name="cuenta" class="form-control border-dark text-white text-center" style="background-color:  #33ccff;"  value="{{$item->Cuenta}}"  />
                                                        </div>

                                                        <!--campo para editar la region-->

                                                        <div class="col-md-2">
                                                            <label for="region" class="form-label fw-bold">Región:</label>
                                                            <select id="region" name="region" class="form-select border-dark text-white" style="background-color: #33ccff;" >
                                                                <option value=""></option>
                                                                <option value="Centro" {{$item->Region == 'Centro' ? 'selected' : ''}}>Centro</option>
                                                                <option value="Norte" {{$item->Region == 'Norte' ? 'selected' : ''}}>Norte</option>
                                                                <option value="Sur" {{$item->Region == 'Sur' ? 'selected' : ''}}>Sur</option>
                                                            </select>                                                    
                                                        </div>

                                                        <!--campo para editar la ubicacion-->

                                                        <div class="col-md-3">
                                                            <label for="ubicacion" class="form-label fw-bold">Ubicación:</label>
                                                            <input type="text" id="ubicacion" name="ubicacion" class="form-control border-dark text-white text-center" style="background-color: #33ccff;" value="{{$item->Ubicacion}}" />
                                                            <br>
                                                        </div>
                                                        
                                                    <!--Aca empieza la parte de edicion  de los datos del equipo en el modal-->
                                                        <h2 class="fw-bold">
                                                            Datos del equipo:
                                                        </h2>
                                    
                                                        <!--campo para editar el codigo asignado al equipo-->

                                                        <div class="col-md-2">
                                                            <label for="codigo" class="form-label fw-bold">Codigo:</label>
                                                            <input type="text" id="codigo" name="codigo" class="form-control border-dark text-white text-center" style="background-color:  #33ccff;" value="{{$item->Codigo}}" pattern="[0-9]+" title="Por favor, ingresa solo números" />
                                                        </div>

                                                        <!--campo para editar el sistema operativo que se utiliza en el equipo-->

                                                        <div class="col-md-6">
                                                            <label for="tipo_sistema" class="form-label fw-bold">Tipo de sistema:</label>
                                                            <select id="tipo_sistema" name="tipo_sistema" class="form-select border-dark text-white" style="background-color: #33ccff;" >
                                                                <option value=""></option>
                                                                <option value="Windows10 home" {{ $item->Tipo_de_sistema == 'Windows10 home' ? 'selected' : '' }}>Windows 10 home</option>
                                                                <option value="Windows10 home single" {{ $item->Tipo_de_sistema == 'Windows10 home single' ? 'selected' : '' }}>Windows 10 home single</option>
                                                                <option value="Windows10 home single language" {{ $item->Tipo_de_sistema == 'Windows10 home single language' ? 'selected' : '' }}>Windows 10 home single language</option>
                                                                <option value="Windows10 pro" {{ $item->Tipo_de_sistema == 'Windows10 pro' ? 'selected' : '' }}>Windows 10 pro</option>
                                                                <option value="windows11 home" {{ $item->Tipo_de_sistema == 'windows11 home' ? 'selected' : '' }}>windows 11 home</option>
                                                                <option value="windows11 home single" {{ $item->Tipo_de_sistema == 'windows11 home single' ? 'selected' : '' }}>windows 11 home single</option>
                                                                <option value="windows11 home single language" {{ $item->Tipo_de_sistema == 'windows11 home single language' ? 'selected' : '' }}>windows 11 home single language</option>
                                                                <option value="windows11 pro" {{ $item->Tipo_de_sistema == 'windows11 pro' ? 'selected' : '' }}>windows 11 pro</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <!--campo para editar la cantidad de ram asignado a um equipo-->

                                                        <div class="col-md-2">
                                                            <label for="ram" class="form-label fw-bold">Ram:</label>
                                                            <select id="ram" name="ram" class="form-select border-dark text-white" style="background-color: #33ccff;" >
                                                                <option value=""></option>
                                                                <option value="8Gb" {{ $item->Ram == '8Gb' ? 'selected' : '' }}>8Gb</option>
                                                                <option value="12Gb" {{ $item->Ram == '12Gb' ? 'selected' : '' }}>12Gb</option>
                                                                <option value="16Gb" {{ $item->Ram == '16Gb' ? 'selected' : '' }}>16Gb</option>
                                                                <option value="64Gb" {{ $item->Ram == '24Gb' ? 'selected' : '' }}>24Gb</option>
                                                                <option value="32Gb" {{ $item->Ram == '32Gb' ? 'selected' : '' }}>32Gb</option>
                                                                <option value="64Gb" {{ $item->Ram == '64Gb' ? 'selected' : '' }}>64Gb</option>
                                                            </select>
                                                        </div>

                                                        <!--campo para editar la capacidad de disco duro en el equipo-->
                                                        
                                                        <div class="col-md-2">
                                                            <label for="disco_duro" class="form-label fw-bold">Disco duro:</label>
                                                            <select id="disco_duro" name="disco_duro" class="form-select border-dark text-white" style="background-color: #33ccff;" >
                                                                <option value=""></option>
                                                                <option value="128Gb" {{ $item->Disco_duro == '128Gb' ? 'selected' : '' }}>128 Gb</option>
                                                                <option value="250Gb" {{ $item->Disco_duro == '250Gb' ? 'selected' : '' }}>250 Gb</option>
                                                                <option value="500Gb" {{ $item->Disco_duro == '500Gb' ? 'selected' : '' }}>500 Gb</option>
                                                                <option value="1TB" {{ $item->Disco_duro == '1TB' ? 'selected' : '' }}>1 TB</option>
                                                                <option value="1Tb+250Gb" {{ $item->Disco_duro == '1Tb+250Gb' ? 'selected' : '' }}>1 TB + 250Gb</option>
                                                                <option value="1Tb+500Gb" {{ $item->Disco_duro == '1Tb+500Gb' ? 'selected' : '' }}>1 TB + 500Gb</option>
                                                                <option value="1Tb+1Tb" {{ $item->Disco_duro == '1Tb+1Tb' ? 'selected' : '' }}>1 TB + 1TB</option>
                                                            </select>
                                                            <br>
                                                        </div>
                                                        
                                                        <!--Aca empieza la parte donde se edita el historico del equipo-->

                                                        <h2 class="fw-bold">
                                                            Historial:
                                                        </h2>

                                                        <!--campo para editar el historial de todas las asignaciones que a tenido el equipo-->

                                                        <div class="col-md-12">
                                                            <label for="historial_asignacion" class="form-label fw-bold">Historial asignacion:</label>
                                                            <input type="text" id="historial_asignacion" name="historial_asignacion" class="form-control border-dark text-white" style="background-color:  #33ccff;" value="{{$item->Historial_asignacion}}"  />
                                                        </div>
                                    
                                                        <!--campo para editar todos los posibles procesos a ejecutar en el equipo-->

                                                        <div class="col-md-12">
                                                            <label for="procesos_ejecutar" class="form-label fw-bold">Procesos a ejecutar:</label>
                                                            <input type="text" id="procesos_ejecutar" name="procesos_ejecutar" class="form-control border-dark text-white" style="background-color:  #33ccff;" value="{{$item->Procesos_a_ejecutar}}"  />
                                                        </div>
                                
                                                        <!--campo para editar las observacion adicionales que se lleguen a ver en el equipo-->

                                                        <div class="col-md-12">
                                                            <label for="observaciones" class="form-label fw-bold">Observaciones:</label>
                                                            <textarea name="observaciones" rows="3" class="form-control border-dark text-white" style="background-color: #33ccff;" >{{$item->Observaciones}}</textarea>
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

<!--Funciones del boostrap para el funcionamiento del modal-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>