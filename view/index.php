<?php
//include('../model/Conection.php');
require('../controller/C_Rutas.php');


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Index</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md bg-body-tertiary">
            <div class="container-fluid">
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
                            <!-- <a class='nav-link active' aria-current='page' href='./index.php'>Inicio</a> -->
                        </li>
                    </ul>
                    <form class="d-flex" role="ingresar" action="V_login.php">
                        <button class="btn btn-outline-success" type="submit">Ingresar</button>
                    </form>
                </div>
            </div>
            <style>
                .navbar-collapse i {
                    font-size: 40px;
                    margin: 0 20px;
                }
            </style>
        </nav>

        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../view/assets/img/img1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../view/assets/img/img2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../view/assets/img/img3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../view/assets/img/img4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../view/assets/img/img5.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <!-- <?php
            if (!$lasRutas) {
                echo "</tr>";
                echo "</td>";
                echo "No hay datos para mostrar";
                echo "</td>";
                echo "</tr>";
            } else {
                foreach ($lasRutas as $rutas) {
                    echo "</tr>";
                    echo "</td>" . $rutas['ID_rutas'] . "</td>";
                    echo "</td>" . $rutas['descripcion'] . "</td>";
                    echo "</tr>";
                }
            }
            ?> -->
    </header>
    <!-- FORMATO DE ENTRADA PARA VUELOS -->
    <div class="container p-3">
        <div class="container container-check">
            <form action="./V_login.php" class="row gy-1 gx-1 align-items-center p-3">
                <div class="col-ms">
                    <label class="visually-hidden" for="autoSizingInputGroup">Username</label>
                    <div class="input-group">
                        <div class="input-group-text">Ruta:</div>

                        <select name="suruta" class="form-select">
                            <?php foreach ($lasRutas as $rutas => $value) { ?>
                                <option value="<?php echo $rutas; ?>"><?php echo $value['descripcion']; ?></option>
                                <?php
                            }
                            ?>
                        </select>

                        <!-- <input type="search" placeholder="Seleccione una ruta" id="mySearch" name="q" /> -->
                        <button type="submit" class="btn btn-success">Consultar</button>
                    </div>
                </div>
                <div class="col-md">
                </div>
            </form>
        </div>
    </div>
    <div class="container p-4">
        <h2 class="" style="text-align:center;">Destinos preferidos</h2>
        <div class="row row-cols-1 row-cols-md-3 g-2">
            <div class="col">
                <div class="card h-100 m-2">
                    <img src="./assets/destination1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Cartagena</h5>
                        <p class="card-text">Cartagena, la joya caribeña de Colombia. Sumérgete en la magia de esta
                            ciudad amurallada, donde la historia colonial se combina con playas paradisíacas.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 m-2">
                    <img src="./assets/destination2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Bogotá</h5>
                        <p class="card-text">No te pierdas la energía de Bogotá. Explora sus modernos museos, disfruta
                            de su animada vida nocturna y déjate sorprender por la diversidad cultural de esta
                            metrópolis cosmopolita.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 m-2">
                    <img src="./assets/destination3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Medellín</h5>
                        <p class="card-text">Descubre la transformación de Medellín, de una ciudad industrial a un
                            destino turístico de primer nivel. Admira sus modernos sistemas de transporte y su
                            impresionante paisaje montañoso.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid row justify-content-center align-items-center p-5">
        <div class="info-oferta">
            <h2 class="" style="text-align:center;">Ofertas</h2>
            <p class="paragraph" style="text-align:center; font-size-adjust: 0.5;">¡Descuentos exclusivos para turistas!
                ¡Ahorra en tus próximos viajes y descubre el mundo con nuestra empresa de vuelos!
            </p>
            <p>

                <b>Descuento de bienvenida:</b> ¡15% de descuento en tu primer vuelo con nosotros! Disfruta de una experiencia
                inolvidable desde el momento en que te unes a nuestra comunidad de viajeros.</p>
        </div>
        <div class="container-xxl row justify-content-center align-items-center p-5">
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body h-100 m-1">
                    <h5 class="card-title">¿Tienes auna Tarjeta AriYoyito?</h5>
                    <!-- <h6 class="card-subtitle mb-2 text-muted">¿Tienes auna Tarjeta AriYoyito?</h6> -->
                    <p class="card-text">Descubre cómo activarla, aprende a usarla en sencillos pasos y disfruta de
                        todos sus beneficios.</p>

                </div>
            </div>
            <div class="card m-" style="width: 18rem;">
                <div class="card-body h-100 m-1">
                    <h5 class="card-title">Ya eliges cómo volar, ¡Ahora elige qué comer!</h5>
                    <!-- <h6 class="card-subtitle mb-2 text-muted">Ya eliges cómo volar, ¡Ahora elige qué comer!</h6> -->
                    <p class="card-text">Disfruta desde el 1 de diciembre nuestra nueva oferta de venta de snacks a
                        bordo.</p>

                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body h-100 m-1">
                    <h5 class="card-title">Recarga, conecta y descansa</h5>
                    <!-- <h6 class="card-subtitle mb-2 text-muted">Recarga, conecta y descansa</h6> -->
                    <p class="card-text">Accede a nuestros Avianca Lounges y disfruta una experiencia todo incluido en
                        las Salas VIP.</p>

                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body h-100 m-1">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>

                </div>
            </div>
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




        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
</body>

</html>