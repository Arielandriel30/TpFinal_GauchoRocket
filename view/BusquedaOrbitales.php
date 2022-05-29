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
            <h2 class="w3-wide">Vuelos Orbitales Encontrados/Disponibles</h2>
<!--            <caption>Tours Encontrados</caption>-->
            <table class="w3-table w3-striped w3-bordered">
                <tr  class="w3-theme">
                    <th>Dia</th>
                    <th>Duracion</th>
                    <th>Equipo</th>
                    <th>Partida</th>
                </tr>
                <?php
                 foreach ($data["SubOrbital"] as $vuelo){
                     echo   "<tr>
                                 <td>" . $vuelo['Dia'] . "</td>
                                 <td>" . $vuelo['Duracion'] . "</td>
                                 <td>" . $vuelo['Equipos'] . "</td>
                                 <td>" . $vuelo['Partida'] . "</td>
                                 <td> <a href='#' >Reservar</a> </td>
                             </tr>";
                 }
                 ?>
            </table>

        </div>


        <!-- End Page Content -->
    </div>

</div>