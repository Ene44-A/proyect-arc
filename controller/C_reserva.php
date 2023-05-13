<?php
    require('../model/M_reserva.php');

if(isset($_GET['enviar_reserva'])){
    var_dump($_GET);
    $estado_vuelo = $_GET['estado_vuelo1'];

    date_default_timezone_set("America/Bogota");
    $fecha_reserva = date("d-m-Y h:i:s");

    $id_usuario = intval($_GET['asientos']);
    $precio_total = $_GET['precio_tiket1'];


    $db = new Reserva();
    $db->setReservas($estado_vuelo,$fecha_reserva,$id_usuario,$precio_total);
}



?>