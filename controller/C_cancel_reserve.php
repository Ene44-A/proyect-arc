<?php
    require('../model/M_reserva.php');

    $cod_reserva = $_GET['cod_reserva'];
    $id_detalle_reserva = $_GET['id_detalle'];
    $id_ruta = $_GET['id_ruta'];
    $asientos_disponibles = $_GET['asientos_dis'];
    $asientos_del_user = $_GET['asientos_reser'];
    $cod_vuelo = $_GET['cod_vuelo'];
    $estado_reserva = $_GET['estado_reser'];

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

    if($estado_reserva == 'Confirmado') {
        echo '
        <script>
            alert("Su reserva ya ha sido Confirmada, no se puede alterar");
            window.location = "../view/V_info-reserve.php";
        </script>
        ';
        return;
    }

    if($estado_reserva == 'Cancelado') {
        echo '
        <script>
            alert("Su reserva ya ha sido Cancelada");
            window.location = "../view/V_info-reserveUser.php";
        </script>
        ';
        return;
    }

    $asietos_restantes = $asientos_disponibles - $asientos_del_user;

    //Pendiente cambiar el stados de la reserva a completado
    $reserve = new Reserva();
    // $reserve->getVueloEstado($cod_vuelo);

    // $VueloStatus = $reserve->getVueloEstado($cod_vuelo);

    // if ($VueloStatus['estado'] == 'Agotado'){
    //     echo '
    //     <script>
    //         alert("No hay asientos para esta reserva");
    //         window.location = "../view/vuelos.php";
    //     </script>
    //     ';
    //     $reserve->updateReservaAndDetalle($cod_reserva, $id_detalle_reserva, 'No Disponible' );
    //     return;
    // }

    // $reserve->updateVuelo($asietos_restantes, $cod_vuelo);
    $reserve->updateReservaAndDetalle($cod_reserva, $id_detalle_reserva, 'Cancelado' );
    //$reserve->setTikectInfo($cod_reserva, $id_detalle_reserva);

     echo '
    <script>
        alert("Su reserva ha sido cancelada con exito");
        window.location = "../view/V_info-reserveUser.php";
    </script>
    ';
    exit();





?>