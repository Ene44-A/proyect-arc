<?php

require_once('../model/Conection.php');
require_once('../controller/C_Rutas.php');
session_start();

require_once('../model/Conection.php');
require_once('../controller/C_Rutas.php');
include('../controller/C_login.php');
include('../model/M_reserva.php');

$user_email = new Login;
$user_query = $user_email->getIdUser($_SESSION['tbl_usuario']);


if (!$user_query) {
    echo "No hay datos para mostrar";
} else {
    foreach ($user_query as $user) {
        $user_id = $user['ID_usuario'];
    }
}
//echo $user_id;

$infoReserva = new Reserva();
$myReserva = $infoReserva->getUsuarioReservas($user_id);




/* session_start();
if (!isset($_SESSION['tbl_usuario'])) {
    echo '
            <script>
                alert("Debes inicar sesion");
                window.location = "V_login.php";
            </script>
            ';
    //header('location: login.php');
    session_destroy();
    die();
} */



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
    <title>Detalle Reserva</title>
</head>

<body>
    <h1>Detalle de la reserva</h1>
    <div class="container">

        <?php

        if (!$myReserva) {
            echo "</tr>";
            echo "</td>";
            echo "No hay datos para mostrar";
            echo "</td>";
            echo "</tr>";
        } else {
            foreach ($myReserva as $reseva) {

                $COD_reserva = $reseva['COD_reserva'];
                $nombre_usuario = $reseva['nombre_usuario'];
                $estado = $reseva['estado'];
                $fecha_reserva = $reseva['fecha_reserva'];
                $precio_total = $reseva['precio_total'];
                echo "<br>";
                echo "<br>";
                echo "<tr>";
                echo "RESERVA DE TIQUETES<br>";
                echo "<td>Codigo de reserva: " . $COD_reserva . "</td><br>";
                echo "<td>Nombre: " . $nombre_usuario . "</td><br>";
                echo "<td> Estado: " . $estado . "</td><br>";
                echo "<td>Fecha de reserva: " . $fecha_reserva . "</td><br>";
                echo "<td>Total: " . $precio_total . "</td><br>";
                echo "</tr>";
                echo "<br>";
                echo "<br>";
            }
        }
        ?>
    </div>
    <div class="container">
        <?php
        // echo "<p>". $COD_reserva . "</p>";
        $infoDetalleReserva = new Reserva();
        $myDetalle = $infoDetalleReserva->getReservaMasDetalle($COD_reserva);
        if (!$myDetalle) {
            echo "</tr>";
            echo "</td>";
            echo "No hay datos para mostrar";
            echo "</td>";
            echo "</tr>";
        } else {
            foreach ($myDetalle as $detalle) {

                $reserva_cod = $detalle['ID_pasajero'];

                echo "<tr>";
                echo "RESERVA<br>";
                echo "<td>Total: " . $reserva_cod . "</td><br>";
                echo "</tr>";
                echo "<br>";
                echo "<br>";
            }
        }
        ?>
        <?php
        echo "<p>" . $COD_reserva . "</p>";
        $infoPasajero = new Reserva();
        $myDetallePasajero = $infoPasajero->getPasajero($_SESSION['tbl_usuario']);
        if (!$myDetallePasajero) {
            echo "</tr>";
            echo "</td>";
            echo "Nafa mi fai";
            echo "</td>";
            echo "</tr>";
        } else {
            foreach ($myDetallePasajero as $detallePasajero) {

                $ID_pasajero = $detallePasajero['ID_pasajero'];
                $nombre_pasajero = $detallePasajero['nombre_pasajero'];
                $telefono_pasajero = $detallePasajero['telefono'];
                $correo_pasajero = $detallePasajero['correo_pasajero'];

                echo "<tr>";
                echo "DATOS DE PASAJERO<br>";
                echo "<td>ID: " . $ID_pasajero . "</td><br>";
                echo "<td>nombre: " . $nombre_pasajero . "</td><br>";
                echo "<td>telefono: " . $telefono_pasajero . "</td><br>";
                echo "<td>correo: " . $correo_pasajero . "</td><br>";
                echo "</tr>";
                echo "<br>";
                echo "<br>";
            }
        }
        ?>
    </div>
</body>

</html>