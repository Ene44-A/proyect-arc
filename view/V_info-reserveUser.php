<?php

include('../controller/confirm_session.php');
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="info-reserve.css">
    <title>Reserva</title>
</head>

<body>
<header>
        <nav class='navbar navbar-expand-md bg-body-tertiary'>
            <div class='container-fluid'>
                <button class='navbar-toggler' type='button' data-bs-toggle='collapse'
                    data-bs-target='#navbarTogglerDemo01' aria-controls='navbarTogglerDemo01' aria-expanded='false'
                    aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarTogglerDemo01'>
                    <i class='bx bxs-plane-take-off'></i>
                    <a class='navbar-brand' href='#'>Tucompañiadevuelos</a>
                    <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='./index.php'>Inicio</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='./V_info-reserveUser.php'>Mis reservas</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='./#'>Mis Tickes</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="ingresar" action="V_reserveUser.php">
                        <button class="btn btn btn-success" type="submit"><i class='bx bx-user-circle'></i></button>
                    </form>
                </div>
            </div>
            <style>
                .navbar-collapse>i {
                    font-size: 40px;
                    margin: 0 20px;
                }

                .bx-user-circle {
                    font-size: 25px;
                    padding: 0 10px;
                }
            </style>
        </nav>
    </header>
    
    <!-- CUERPO DE PAGINA -->
    <div class="container text-center">
        <section class="vuelos-table-main-container">
                <div class="vuelos-table-container">
                    <h3 class="vuelos-table__title">Gestione sus reserva</h3>
                    <table class="table table table-striped">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Codigo reserva</th>
                                <th>Fecha reserva</th>
                                <th>Fecha vuelo</th>
                                <th>Estado</th>
                                <th>Precio total</th>
                                <th>Seleccion opcion</th>
                                </tr>
                        </thead>
                        <tbody>
                                    <?php
                                                 //echo $user_id;
                               
                                                //$correo = $_SESSION['correo_pasajero'];
                                                /* echo $fechas;      
                                                echo $ruta;  */     
                                                //echo $correo;  

                                                /* $ruta = $_GET['route-selected'];
                                                $fechas = $_GET['fecha-selected'];
                                                $infoReservaBuscar = new Reserva();
                                                $reservaInfoBuscar = $infoReservaBuscar->getReservaInfoBuscar($ruta,$fechas); */ 
                                    
                                            $infoReserva = new Reserva();
                                            $myReserva = $infoReserva->getUsuarioReservas($user_id);

                                        if (!$myReserva) {
                                            echo "</tr>";
                                            echo "</td>";
                                            echo "Por el momento usted no tiene reservar";
                                            echo "</td>";
                                            echo "</tr>";
                                        } else {
                                            foreach ($myReserva as $reseva):
                                    ?>
                                            <tr>
                                                <td><?php echo '#'?></td>
                                                <td><?php echo $reseva['COD_reserva']?></td>
                                                <td><?php echo  $reseva['fecha_reserva']?></td>
                                                <td><?php echo  $reseva['fecha_salida']?></td>
                                                <td><?php echo  $reseva['estado']?></td>
                                                <td><?php echo  $reseva['precio_total']?></td>
                                                <td><?php  $id = $reseva['COD_reserva'] ?></td>
                                            <td > <?php echo "<a href='V_reserve-flight.php?id_vuelo=$id'>Confirmar</a>";?></td>
                                            <td > <?php echo "<a href='V_reserve-flight.php?id_vuelo=$id'>Cancelar</a>";?></td>
                                            <td > <?php echo "<a href='V_reserve-flight.php?id_vuelo=$id'>Ver</a>";?></td>
                                            </tr>
                                    
                                            <?php 
                                        endforeach;
                                    }
                                        ?>
                                </tbody> 
                    </table>
                </div>
        </section>
    </div>

</body>

</html>