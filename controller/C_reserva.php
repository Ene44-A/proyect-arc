<?php
    require('../model/M_reserva.php');

if(isset($_GET['enviar_reserva'])){
    var_dump($_GET);
    $estado_vuelo = $_GET['estado_vuelo'];

    /* date_default_timezone_set("America/Bogota");
    $fecha_reserva = date("d-m-Y h:i:s"); */
    $id_ruta = $_GET['id_ruta'];
    $fecha_reserva = date("Y-m-d");
    $id_usuario = $_GET['id_del_usuario'];
    $precio_tiket = intval($_GET['precio_tiket']);          //intval(42);
    $asientos_del_user = intval($_GET['asientos']);
    $asientos_disponibles = intval($_GET['cantidad_asientos']);
    //$usuario_id = $_GET['id_del_usuario'];
    $precio_total = $precio_tiket * $asientos_del_user;

    // Resta de los asientos

    $asietos_restantes = $asientos_disponibles - $asientos_del_user;




    //Datos del pasajero
    $nombre_pasajero = $_GET['nombre_pasajero'];
    $telefono_pasajero = $_GET['telefono_pasajero'];
    $fecha_nacimiento = $_GET['fecha_nacimiento'];
    $correo_pasajero = $_GET['correo_pasajero'];




    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "ID del Vuelo: ". $id_ruta . "<br/>";
    echo "Estado del Vuelo: ". $estado_vuelo . "<br/>";
    //echo $fecha_reserva. "<br/>";
    echo "Fecha de reserva: ". $fecha_reserva. "<br/>";
    echo "ID del usuario: ". $id_usuario. "<br/>";
    echo "Precio por Tiket: ". $precio_tiket. "<br/>";
    echo "Numero de asientos reservados: ". $asientos_del_user. "<br/>";
    echo "Numero de asientos Restantes: ". $asietos_restantes. "<br/>";
    //echo "". $usuario_id. "<br/>";
    echo "Precio total: ". $precio_total;
    

    echo "<br/>";
    echo "<br/>";
    echo "Datos del Pasajero";
    echo "<br/>";
    echo "Nombre del pasajero: ". $nombre_pasajero . "<br/>";
    echo "Telefono del pasajero: ". $telefono_pasajero . "<br/>";
    echo "Fecha de nacimiento del pasajero: ". $fecha_nacimiento . "<br/>";
    echo "Correo del pasajero: ". $correo_pasajero . "<br/>";





    $reserve = new Reserva();
    $reserve->setReservas($estado_vuelo,$fecha_reserva,$id_usuario,$precio_total);
    $reserve->setPasajeros($nombre_pasajero, $telefono_pasajero, $fecha_nacimiento, $correo_pasajero);
    $reserve->updateVuelo($asietos_restantes, $id_ruta);
    //Variables del pasajero
    // nombre_pasajero, telefono, fecha de nacimiento, correo_pasajero

	echo '
        <script>
            window.location = "../view/V_info-reserve.php";
        </script>
        ';
        exit();
}

?>