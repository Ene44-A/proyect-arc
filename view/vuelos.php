<?php

require_once('../controller/C_Rutas.php');
require_once('../model/Conection.php');
include('../controller/confirm_session.php');
include('../controller/C_login.php');

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
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
    <link rel='stylesheet' href='./styles/vuelos.css'>
    <title>Index</title>
</head>

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
                            <a class='nav-link active trie-active' aria-current='page' href='./vuelos.php'>Reservar</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='./V_info-reserveUser.php'>Mis reservas</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='./V_info-reserve.php'>Mis Tickes</a>
                        </li>
                    </ul>
                    <div class="cont-user">
                        <i class='bx bx-user-circle'></i>
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
                .cont-user{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                .cont-user>h5{
                    padding: 0 40px 0 10px;
                    font-weight: 900;
                }
                .cont-user>i {
                    font-size: 25px;
                }
                .trie-active{
                    border-bottom: 4px solid rgb(21, 115, 17);
                }
            </style>
        </nav>
    </header>
    <!-- ENTRADA DE USUARIOS -->
    <section>
        <div class="container p-2 gx4">
            <div class="container container-check">
                <form class="row gy-2 gx-3 align-items-center" action="BuscarVuelos.php" method="GET">
                    <div class="col-sm">
                        <label>Rutas<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group">
                                <div class="input-group-text">Ruta:</div>
                                <select class="form-select" id="autoSizingSelect mySelect" name="route-selected">
                                    <?php foreach ($lasRutas as $rutas => $value) { ?>
                                        <option value="<?php echo $value['descripcion']; ?>"><?php echo $value['descripcion']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <div class="input-group-text">Fecha Salida:</div>
                                <input class="form-control" type="date" name="fecha-selected" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                                <input class="form-control" type="text" name="user-name" value="<?php echo $user_name; ?>" style="display: none;" >
                            </div>
                        </div>
                    </div>
                    <div class="col-ms">
                        <button type="submit" id="myButton" class="btn btn-success">Consultar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- CUERPO DE PAGINA -->
    <section class="vuelos-table-main-container">
        <div class="vuelos-table-container">
            <h3 class="vuelos-table__title">Vuelos</h3>
            <table class="table table-hover table-striped tablita-info">
                <thead>
                    <tr>
                        <th scope="col">Ruta</th>
                        <th scope="col">Matricula Avion</th>
                        <th scope="col">Hora de salida</th>
                        <th scope="col">Hora de llegada</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$vuelosInfo) {
                        echo '<tr scope="row">';
                        echo "<td>";
                        echo "nafa mi fai";
                        echo "</td>";
                        echo "</tr>";
                    } else {
                        foreach ($vuelosInfo as $alias) {
                            echo '<tr scope="row">';
                            echo "<td>" . $alias['descripcion'] . "</td>";
                            echo "<td>" . $alias['matricula_avion'] . "</td>";
                            echo "<td>" . $alias['hora_salida'] . "</td>";
                            echo "<td>" . $alias['hora_llegada'] . "</td>";
                            echo "<td>" . $alias['precio'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <div class="container container-master-oferta p-4">
        <div class="row"></div>
        <div claass="container col-sm-6 p-4 m-4">
            <h3 class="vuelos-table__title">Nuevas Ofertas</h3>
            <p class="text-center">¡Descuentos exclusivos para turistas! ¡Ahorra en tus próximos viajes y descubre el
                mundo con nuestra empresa de vuelos!
            </p>
            <p class="text-center">
                Descuento de bienvenida: ¡10% de descuento en tu primer vuelo con nosotros! Disfruta de una experiencia
                inolvidable desde el momento en que te unes a nuestra comunidad de viajeros.</p>
        </div>
        <div class="container container-ofertas">
            <div class="row row-cols-3 row-cols-md-3 g-2">
                <?php
                if (!$vuelosInfo) {
                    echo "<tr>";
                    echo "<td>";
                    echo "nafa mi fai";
                    echo "</td>";
                    echo "</tr>";
                } else {
                    foreach ($vuelosInfo as $alias) {
                        $precios = $alias['precio'];
                        $descripcion = $alias['descripcion'];
                        $descuento = $precios * 0.15;
                        $precioConDescuento = $precios - $descuento;
                        ?>
                        <div class="col">
                            <div class="container">
                                <div class="card text-center m-3 mb-3 p-2" style="width: 20rem;">
                                    <!-- <img src="./assets/img/Ship2.jpg" class="card-img-top" alt="..."> -->
                                    <div class="card-body">
                                        <h5 class="card-title">¡Oferta!</h5>
                                        <p class="fs-5">Antes</p>
                                        <p class="fs-5">
                                            <?php echo $descripcion; ?>
                                        </p>
                                        <div class="pice-container text-center">
                                            <span class="fs-5">$</span>
                                            <span class="price-main">
                                                <?php echo $precioConDescuento; ?>
                                            </span>
                                            <span class="fs-5">.00</span>
                                        </div>
                                        <p class="fs-5">¡AHORA!</p>
                                        <p class="fs-5 price">
                                            <?php echo $precios; ?>
                                        </p>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional
                                            content.
                                        </p>
                                        <a href="#" class="btn btn-danger">Comprar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
                <style>
                    .vuelos-table-container{
                        padding-bottom:20px;
                    overflow: hidden;
                }
                .container-ofertas{
                        overflow: hidden;
                        max-height: 1200px;
                    }
                    .container-master-oferta{
                        padding-bottom: 40px;
                        /* border: 2pc solid red; */
                        position: relative;
                    }
                    .container-master-oferta::after{
                        content: "";
                        position:absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background: linear-gradient(to bottom, rgba(0,0,0,0)0%,rgba(0,0,0,0)25%,rgba(255,255,255,0)70%,rgba(255,255,255,1)100%);
                    }
                </style>
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
