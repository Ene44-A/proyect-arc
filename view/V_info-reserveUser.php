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
$infoReserva = new Reserva();
$myReserva = $infoReserva->getUsuarioReservas($user_id);
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
                    <a class='navbar-brand' href='./index.php'>Tucompañiadevuelos</a>
                    <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='./vuelos.php'>Buscar vuelos</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link active trie-active' aria-current='page'
                                href='./V_info-reserveUser.php'>Mis
                                reservas</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='./V_info-reserve.php'>Mis Tickes</a>
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

                .trie-active {
                    border-bottom: 4px solid rgb(21, 115, 17);
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
                        foreach ($myReserva as $reseva):
                            ?>
                            <tr>
                                <td>
                                    <?php echo '#' ?>
                                </td>
                                <td>
                                    <?php echo $reseva['COD_reserva'] ?>
                                </td>
                                <td>
                                    <?php echo $reseva['fecha_reserva'] ?>
                                </td>
                                <td>
                                    <?php echo $reseva['fecha_salida'] ?>
                                </td>
                                <td>
                                    <?php echo $reseva['estado'] ?>
                                </td>
                                <td>
                                    <?php echo $reseva['precio_total'] ?>
                                </td>
                                <td>
                                    <?php $id = $reseva['COD_reserva'] ?>
                                </td>
                                <td>
                                    <?php echo "<a href='V_reserve-flight.php?id_vuelo=$id'>Confirmar</a>"; ?>
                                </td>
                                <td>
                                    <?php echo "<a href='V_reserve-flight.php?id_vuelo=$id'>Cancelar</a>"; ?>
                                </td>
                                
                            </tr>

                            <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <footer class="bg-secondary text-white text-center text-md-start">
        <footer class="bg-secondary text-white text-center text-md-start">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Tu compañoa de vuelos</h5>
                        <p>
                            ¡Descubre el mundo desde las alturas y cumple tus sueños de viaje!
                        </p>
                        <p>

                            Oferta especial: "¡Reserva ahora y obtén un 15% de descuento en tu próximo vuelo
                            internacional!"
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <i class='bx bxs-envelope'></i>
                                <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                                <i class='bx bxl-linkedin-square'></i>
                                <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                                <i class='bx bxl-youtube'></i>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <i class='bx bxl-telegram'></i>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase mb-0">Links</h5>

                        <ul class="list-unstyled">
                            <li>
                                <i class='bx bxl-instagram-alt'></i>
                                <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                                <i class='bx bxl-facebook-circle'></i>
                                <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                                <i class='bx bxl-twitter'></i>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <i class='bx bxl-reddit'></i>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-white" href="https://google.com/">google.com</a>
            </div>
        </footer>
        <style>
            .price {
                text-decoration: line-through;
            }
        </style>
        <script src='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'
            integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN'
            crossorigin='anonymous'></script>
        <script src="./js/vuelos.js"></script>
</body>

</html>