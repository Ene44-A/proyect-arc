<?php

require_once('../model/Conection.php');
require_once('../controller/C_Rutas.php');
include('../controller/confirm_session.php');
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
$myReserva = $infoReserva->getUsuarioReservasForTiket($_SESSION['tbl_usuario']);

// session_start();
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
}

$user_info = new Login;
$user_get_info = $user_info->getUserInfo($_SESSION['tbl_usuario']);

if (!$user_get_info) {
    echo "No hay datos para mostrar";
} else {
    foreach ($user_get_info as $user) {
        $user_id = $user['ID_usuario'];
        $user_name = $user['nombre_usuario'];
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
    <title>Detalle Reserva</title>
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
                            <a class='nav-link active' aria-current='page' href='./vuelos.php'>Reservar</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='./V_info-reserveUser.php'>Mis
                                reservas</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link active trie-active' aria-current='page' href='./V_info-reserve.php'>Mis
                                Tickes</a>
                        </li>
                    </ul>
                    <div class="cont-user">
                        <i class='bx bx-user-circle icon-user'></i>
                        <h5>
                            <?php echo $user_name ?>
                        </h5>
                        <form class="d-flex" role="logout" action="../model/M_logout.php">
                            <button class="btn btn-outline-success" type="submit">cerrar sesión</button>
                        </form>
                    </div>
                </div>
            </div>
            <style>
                .navbar-collapse>i {
                    font-size: 40px;
                    margin: 0 20px;
                }

                .cont-user {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .cont-user>h5 {
                    padding: 0 40px 0 10px;
                    font-weight: 900;
                }

                .icon-user {
                    display: flex;

                    font-size: 25px;
                }

                .trie-active {
                    border-bottom: 4px solid rgb(21, 115, 17);
                }
            </style>
        </nav>
    </header>
    <div class="container text-center p-4">
        <h1>Gracias por su compra</h1>
        <div class="container p-4">
            <?php
            if (!$myReserva) {
                echo "</tr>";
                echo "</td>";
                echo "No hay datos para mostrar";
                echo "</td>";
                echo "</tr>";
            } else {
                foreach ($myReserva as $reserva) {

                    $COD_reserva = $reserva['COD_reserva'];
                    $correo_usuario = $reserva['correo_pasajero'];
                    $estado = $reserva['estado'];
                    $precio = $reserva['precio'];

                    $matricula_avion = $reserva['matricula_avion'];
                    $hora_salida = $reserva['hora_salida'];
                    $hora_llegada = $reserva['hora_llegada'];
                    $nombre_pasajero = $reserva['nombre_pasajero'];
                    $telefono = $reserva['telefono'];
                    $COD_tiquete = $reserva['COD_tiquete'];
                    $asientos_reservados = $reserva['asientos_reservados'];


                    $precio_total = $precio * $asientos_reservados;

                    ?>

                    <div class="card mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="card-img-top" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="100%" height="100%">
                            <defs>
                                <pattern id="p" width="250" height="30" patternUnits="userSpaceOnUse"
                                    patternTransform="scale(0.52)">
                                    <path id="a" data-color="outline" fill="none" stroke="#FFF" stroke-width="5"
                                        d="M-62.5-15C-31.3-15 0-7.5 0-7.5S31.3 0 62.5 0 125-7.5 125-7.5s31.3-7.5 62.5-7.5S250-7.5 250-7.5 281.3 0 312.5 0">
                                    </path>
                                    <use xlink:href="#a" y="20"></use>
                                    <use xlink:href="#a" y="30"></use>
                                    <use xlink:href="#a" y="45"></use>
                                </pattern>
                            </defs>
                            <rect fill="#D6E2CE" width="100%" height="100%"></rect>
                            <rect fill="url(#p)" width="100%" height="100%"></rect>
                        </svg>
                        <div class="card-img-overlay">
                            <p class="card-text">
                                <large>Pase de abordaje</large>
                            </p>
                            <div class="card-air">
                                <i class='bx bxs-plane-take-off'></i>
                                <h3 class="card-title">AIR TICKET ─ [
                                    <?php
                                    //$infoReserva = new Reserva();
                                    $ruteForID = $infoReserva->getNameRuteByID(intval($reserva['ID_rutas']));
                                    echo $ruteForID['descripcion'] ?> ]
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p> -->
                            <div class="row g-0 text-center">
                                <div class="col-sm-6 col-md-1">
                                    <div class="barcode">
                                        <div class="container">
                                            <div class="barcode">
                                                <div class="bar2"></div>
                                                <div class="ba1"></div>
                                                <div class="bar"></div>
                                                <div class="bar1"></div>
                                                <div class="bar"></div>
                                                <div class="bar1"></div>
                                                <div class="bar1"></div>
                                                <div class="bar"></div>
                                                <div class="bar1"></div>
                                                <div class="bar1"></div>
                                                <div class="bar"></div>
                                                <div class="bar1"></div>
                                                <div class="bar1"></div>
                                                <div class="bar2"></div>
                                                <div class="bar"></div>
                                                <div class="ba2"></div>
                                                <div class="bar1"></div>
                                                <div class="bar"></div>
                                                <div class="bar2"></div>
                                                <div class="bar"></div>
                                                <div class="bar2"></div>
                                                <div class="bar1"></div>
                                                <div class="bar2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-11">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card p-4">
                                                <h5>Datos del usuario</h5>
                                                <div class="mb-3">
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon3">Codigo Res.</span>
                                                        <input type="text" class="form-control" id="basic-url"
                                                            value=' <?php echo $COD_reserva; ?> '
                                                            aria-describedby="basic-addon3 basic-addon4" disabled>
                                                        <span class="input-group-text" id="basic-addon3">Fecha Res.</span>
                                                        <input type="text" class="form-control" id="basic-url" value='<?php
                                                            $infoReservaForCod = new Reserva();
                                                            $fecha_reserva = $infoReservaForCod->getDateByRuteForID($reserva['COD_reserva']);
                                                            echo $fecha_reserva['fecha_reserva'];
                                                            ?> ' aria-describedby="basic-addon3 basic-addon4" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon3">Correo</span>
                                                        <input type="text" class="form-control" id="basic-url"
                                                            value=' <?php echo $correo_usuario; ?> '
                                                            aria-describedby="basic-addon3 basic-addon4" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="input-group col-sm input-group-lg">
                                                        <span class="input-group-text" id="basic-addon3">Estado</span>
                                                        <input type="text" class="form-control" id="basic-url"
                                                            value=' <?php echo $estado; ?> '
                                                            aria-describedby="basic-addon3 basic-addon4" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="input-group input-group-lg">
                                                        <span class="input-group-text" id="basic-addon3">PRECIO TOTAL</span>
                                                        <input type="text" class="form-control" id="basic-url"
                                                            value=' <?php echo "$" . number_format($precio_total, 0); ?> '
                                                            aria-describedby="basic-addon3 basic-addon4" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card p-4">
                                                <h5>Datos del pasajero</h5>
                                                <div class="mb-3">
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-text" id="basic-addon3">Avión a abordar</span>
                                                        <input type="text" class="form-control" id="basic-url"
                                                            value=' <?php echo $matricula_avion; ?> '
                                                            aria-describedby="basic-addon3 basic-addon4" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3 input-group input-group-sm">
                                                    <span class="input-group-text">Tiempo de vuelo</span>
                                                    <input type="text" aria-label="First name"
                                                        value=' <?php echo $hora_salida; ?> ' disabled class="form-control">
                                                    <input type="text" aria-label="Last name"
                                                        value=' <?php echo $hora_llegada; ?> ' disabled class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-text" id="basic-addon3">Nombre</span>
                                                        <input type="text" class="form-control" id="basic-url"
                                                            value=' <?php echo $nombre_pasajero; ?> '
                                                            aria-describedby="basic-addon3 basic-addon4" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-text" id="basic-addon3">Teléfono</span>
                                                        <input type="text" class="form-control" id="basic-url"
                                                            value=' <?php echo $telefono; ?> '
                                                            aria-describedby="basic-addon3 basic-addon4" disabled>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-text" id="basic-addon3">Asientos
                                                            reservados</span>
                                                        <input type="text" class="form-control" id="basic-url"
                                                            value=' <?php echo $asientos_reservados; ?> '
                                                            aria-describedby="basic-addon3 basic-addon4" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <p class="card-text"><small class="text-body-secondary">Codigo de tiquete:
                                    <?php echo $COD_tiquete; ?>
                                </small></p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <style>
                .card-text {
                    display: flex;
                    justify-content: flex-start;
                }

                .card-air {
                    display: flex;
                    justify-content: flex-start;
                }

                i {
                    margin: 0 20px 0 0;
                    font-size: 35px;
                }

                .barcode {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }

                .barcode .bar {
                    width: 100%;
                    height: 0.9rem;
                    background-color: black;
                    margin-bottom: 0.5rem;
                }

                .barcode .bar1 {
                    width: 100%;
                    height: 0.3rem;
                    background-color: black;
                    margin-bottom: 0.5rem;
                }

                .barcode .bar2 {
                    width: 100%;
                    height: 0.1rem;
                    background-color: black;
                    margin-bottom: 0.5rem;
                }

                @media (max-width:767px) {
                    .barcode {
                        display: none;
                    }
                }
            </style>
        </div>
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