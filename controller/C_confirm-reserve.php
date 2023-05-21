<?php
    require('../model/M_reserva.php');

    $cod_reserva = $_GET['cod_reserva'];
    $id_detalle_reserva = $_GET['id_detalle'];
    $id_ruta = $_GET['id_ruta'];
    $asientos_disponibles = $_GET['asientos_dis'];
    $asientos_del_user = $_GET['asientos_reser'];
    $cod_vuelo = $_GET['cod_vuelo'];

    echo "<br>";
    echo "<br>";
    echo $cod_reserva;
    echo "<br>";
    echo $id_detalle_reserva;
    echo "<br>";
    echo $id_ruta;
    echo "<br>";
    echo $asientos_disponibles;
    echo "<br>";
    echo $asientos_del_user;
    echo "<br>";
    echo $cod_vuelo;


    $asietos_restantes = $asientos_disponibles - $asientos_del_user;

    //Pendiente cambiar el stados de la reserva a completado
    $reserve = new Reserva();
    $reserve->getVueloEstado($cod_vuelo);

    $VueloStatus = $reserve->getVueloEstado($cod_vuelo);

    if ($VueloStatus['estado'] == 'Agotado'){
        echo '
        <script>
            alert("No hay asientos para esta reserva");
            window.location = "../view/vuelos.php";
        </script>
        ';
        return;
    }

    $reserve->updateVuelo($asietos_restantes, $id_ruta);

    $reserve->setTikectInfo($cod_reserva, $id_detalle_reserva);

     echo '
    <script>
        window.location = "../view/V_info-reserve.php";
    </script>
    ';
    exit();





?>