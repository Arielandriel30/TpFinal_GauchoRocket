<body>
<link rel="stylesheet" href="assets/style.css">
<header class="w3-container w3-padding" style="background-image: url('assets/img/img1.png')" id="myHeader">

    <div class="w3-center">
        <h4 class="texto1">GAUCHO ROCKET</h4>
        <h1 class=" w3-animate-bottom  texto1" >LOS MEJORES VIAJES ESPACIALES</h1>

        <div class="w3-padding-32">
            <a href='index.php?controller=princial' target="_parent"><button class="w3-btn w3-xlarge w3-pink  parpadeo w3-round-large w3-hover-light-grey"  style="font-weight:900;">SALIR</button></a>

        </div>
    </div>
</header>
<div>
    <h1> Busqueda de Vuelos</h1>
</div>
<div>
    <!-- Page content -->
    <div class="w3-content" style="max-width:2000px;margin-top:46px">

        <!-- The Band Section -->
        <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
            <h2 class="w3-wide">Viajes encontrados</h2>
            <table class="w3-table">
                <tr>
                    <th>code</th>
                    <th>name</th>
                    <th>name</th>
                    <th>departure_date</th>
                    <th>departure_time</th>
                    <th>duration</th>
                    <th>sdide</th>
                    <th>short_name</th>
                    <th>plate</th>
                    <th>Reservar</th>
                </tr>

                <!-- Templated para reemplazar el php
                    {{canciones}}
                    <tr>
                        <td>"{{'code'}}"</td>
                        <td>"{{'so.name'}}"</td>
                        <td>"{{'sd.name'}}"</td>
                        <td>"{{'departure_date'}}"</td>
                        <td>"{{'departure_time'}}"</td>
                        <td>"{{'duration'}}"</td>
                        <td>"{{'side'}}"</td>
                        <td>"{{'short_name'}}"</td>
                        <td>"{{'plate'}}"</td>
                        <td>"{{'Reservar'}}" </td>
                    </tr>
                    {{/canciones}}

                    code, so.name, sd.name , departure_date, departure_time, duration, side, sft.short_name, plate
                    -->
                <?php

                 foreach ($data["usuario"] as $vuelo){
                     echo   "<tr>
                                 <td>" . $vuelo['code'] . "</td>
                                 <td>" . $vuelo['name'] . "</td>
                                 <td>" . $vuelo['name'] . "</td>
                                 <td>" . $vuelo['departure_date'] . "</td>
                                 <td>" . $vuelo['departure_time'] . "</td>
                                 <td>" . $vuelo['duration'] . "</td>
                                 <td>" . $vuelo['side'] . "</td>
                                 <td>" . $vuelo['short_name'] . "</td>
                                 <td>" . $vuelo['plate'] . "</td>
                                  <td> <a href='#' >Reservar</a> </td>
                             </tr>";
                 }
                 ?>

            </table>

            <table class="w3-table w3-striped w3-bordered">
                <caption>Ejemplo de tabla</caption>
                <tbody>
                <tr class="w3-theme">
                    <td></td>
                    <th>SUborbitales</th>
                    <th>Tours</th>
                    <th>Circuitos</th>
                </tr>
                <tr>
                    <th>Lunes</th>
                    <td>A1</td>
                </tr>
                <tr>
                    <th>Martes</th>
                    <td>A2</td>
                    <td>B2</td>
                </tr>

                <tr>
                    <th>Miercoles</th>
                    <td>A2</td>
                    <td>B2</td>
                </tr>

                <tr>
                    <th>Jueves</th>
                    <td>A2</td>
                    <td>B2</td>
                </tr>

                <tr>
                    <th>Viernes</th>
                    <td>A2</td>
                    <td>B2</td>
                </tr>

                <tr>
                    <th>Sabado</th>
                    <td>A2</td>

                </tr>

                <tr>
                    <th>Domingo</th>
                    <td>A2</td>
                </tr>
                </tbody>
            </table>

        </div>


        <!-- End Page Content -->
    </div>

</div>