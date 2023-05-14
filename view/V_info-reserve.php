<?php

require_once('../model/Conection.php');
require_once('../controller/C_Rutas.php');
session_start();

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
    <title>Detalle Reserva</title>
</head>
<body>
    <h1>Detalle de la reserva</h1>
    <?php
            require_once('../model/Conection.php');
            require_once('../controller/C_Rutas.php');
            include('../controller/C_login.php');
            include('../model/M_reserva.php');

            $user_email = new Login;
            $user_query = $user_email->getIdUser($_SESSION['tbl_usuario']);

            //echo "el ID del Viejo USer: " . $user_query;
            //$correo_user = $_GET['correo_usuario'];
            //$correo_user = $user_email->getIdUser();

           /*  $ruta = $_GET['route-selected'];
            echo $ruta; */
            //echo $_SESSION['tbl_usuario'];


            //echo $lasRutas['descripcion'][1];

            // $particularRoute = new Ruta();
            // $myRoute = $particularRoute->getSingleVueloInfo($ruta);

            // if (!$myRoute) {
            //     echo "</tr>";
            //     echo "</td>";
            //     echo "No hay datos para mostrar";
            //     echo "</td>";
            //     echo "</tr>";
            // } else {
            //     foreach ($myRoute as $route) {
            //         /*     echo"</tr>";
            //             echo"</td>".$route['ID_rutas']."</td>";
            //             echo"</td>".$route['descripcion']."</td>";
            //             echo"</td>".$route['matricula_avion']."</td>";
            //             echo"</td>".$route['precio']."</td>";
            //             echo "</tr>"; */

            //         $id_ruta = $route['ID_rutas'];
            //         $fecha_salida = $route['fecha_salida'];
            //         $fecha_llegada = $route['fecha_llegada'];
            //         $matricula = $route['matricula_avion'];
            //         $estado_vuelo = $route['estado'];
            //         $cantidad_asientos = $route['asientos_disponibles'];
            //         $precio_tiket = $route['precio'];

            //     }

            // }
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

            if (!$myReserva) {
                echo "</tr>";
                echo "</td>";
                echo "No hay datos para mostrar";
                echo "</td>";
                echo "</tr>";
            } else {
                foreach ($myReserva as $reseva) {
                    echo "<br>";
                    echo "Codigo de reserva: ".$reseva['COD_reserva']."<br>";
                    echo "Nombre de Usuario: ".$reseva['nombre_usuario']."<br>";
                    echo "Estado de la reserva: ".$reseva['estado']."<br>";
                    echo "Fecha de la reserva: ".$reseva['fecha_reserva']."<br>";
                    echo "Precio total de la reserva: ".$reseva['precio_total']."<br>";

                }

            }



            
            ?>
</body>
</html>