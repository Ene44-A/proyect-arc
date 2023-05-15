<?php

require_once('../model/Conection.php');
require_once('../controller/C_Rutas.php');

session_start();
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
                    <a class='navbar-brand' href='#'>Hidden brand</a>
                    <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='#'>Home</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='#'>Link</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="ingresar" action="V_profile-users.php">

                        <button class="btn btn btn-light" type="submit">perfil</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <!-- ENTRADA DE USUARIOS -->
    <section>
        <div class="container p-2 gx4">
            <div class="container container-check">
                <form class="row gy-2 gx-3 align-items-center" action="V_reserve-flight.php" method="GET">
                    <div class="col-sm">
                        <label>Rutas<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <label class="visually-hidden" for="autoSizingInputGroup">Username</label>
                            <div class="input-group">
                                <div class="input-group-text">Ruta:</div>
                                <select class="form-select" id="autoSizingSelect mySelect" name="route-selected">
                                    <!-- <option value="disable" selected>Seleccione su ruta</option> -->
                                    <option value="disable" selected>Desactivar botón</option>
                                    <option value="enable">Activar botón</option>
                                    <?php foreach ($lasRutas as $rutas => $value) { ?>
                                        <option value="<?php echo $value['descripcion']; ?>"><?php echo $value['descripcion']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label>Nombre<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-person-fill"></i>
                            </div>
                            <input type="text" class="form-control" id="correo_usuario" name="nombre_pasajero"
                                placeholder="Ingrese su Nombre" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label>Telefono<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-person-fill"></i>
                            </div>
                            <input type="number" class="form-control" id="correo_usuario" name="telefono_pasajero"
                                placeholder="Telefono" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <label>Fecha de nacimiento<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-person-fill"></i>
                            </div>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                placeholder="fecha de nacimiento" autocomplete="off" min="1930  -01-01" max="2015-12-31"
                                required>
                        </div>
                    </div>
                    <div class="container-md row gy-2 gx-3 align-items-center">
                        <div class="col-sm">
                            <label>Correo<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-person-fill"></i>
                                </div>
                                <input type="text" class="form-control" id="correo_usuario" name="correo_pasajero"
                                    placeholder="<?php echo $_SESSION['tbl_usuario'] ?>" autocomplete="off"
                                    value="<?php echo $_SESSION['tbl_usuario'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm">
                            <label>Cantidad de asientos<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="bi bi-person-fill"></i>
                                </div>
                                <input type="number" class="form-control" id="correo_usuario" name="asientos"
                                    max="<?php echo $cantidad_asientos; ?>" placeholder="cantidad de vuelos"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <button type="submit" id="myButton" class="btn btn-success">Reservar</button>
                        <script>
                            var select = document.getElementById("mySelect");
                            var button = document.getElementById("myButton");

                            select.addEventListener("change", function () {
                                var option = select.value;

                                if (option == "enable") {
                                    button.disabled = false;
                                } else {
                                    button.disabled = true;
                                }
                            });
                        </script>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- CUERPO DE PAGINA -->
    <section class="vuelos-table-main-container">
        <div class="vuelos-table-container">
            <h3 class="vuelos-table__title">Vuelos</h3>
            <table class="table table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ruta</th>
                        <th>Matricula Avion</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$vuelosInfo) {
                        echo "<tr>";
                        echo "<td>";
                        echo "nafa mi fai";
                        echo "</td>";
                        echo "</tr>";
                    } else {
                        foreach ($vuelosInfo as $alias) {
                            echo "<tr>";
                            echo "<td>" . $alias['ID_rutas'] . "</td>";
                            echo "<td>" . $alias['descripcion'] . "</td>";
                            echo "<td>" . $alias['matricula_avion'] . "</td>";
                            echo "<td>" . $alias['precio'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <div class="vuelos-pricing-tables-container">
        <h3 class="vuelos-table__title">Pricing</h3>
        <div class="vuelos-text-container">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil quam repudiandae error aliquid
                necessitatibus, in laudantium reprehenderit alias fuga, ratione consequuntur neque voluptatem quae
                dolorem magni. Odio blanditiis quos modi?</p>
        </div>
        <div class="vuelos-cards-container">
            <div class="vuelos__card-item">
                <h4 class="fs-2 mt-4 mb-4">Personal</h4>
                <div class="pice-container">
                    <span class="fs-5">$</span>
                    <span class="price-main">10</span>
                    <span class="fs-5">.00</span>
                </div>
                <p class="fs-5">10 Projects</p>
                <p class="fs-5">380 Downloads</p>
                <p class="fs-5">24/7 Support</p>

                <button type="button" class="btn btn-secondary mt-2">Buy</button>
            </div>
        </div>
    </div>

    <footer class="bg-secondary text-white text-center text-md-start">
        <footer class="bg-secondary text-white text-center text-md-start">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Footer Content</h5>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                            molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
                            aliquam voluptatem veniam, est atque cumque eum delectus sint!
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

        <script src='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'
            integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN'
            crossorigin='anonymous'></script>
        <script src="./js/vuelos.js"></script>
</body>

</html>