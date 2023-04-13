<?php
include('../backend/conexion.php');

$con = connection();

$sql = 'SELECT * FROM tbl_flights';
$query = mysqli_query($con, $sql);

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
                    <form class='d-flex' role='ingresar' action='ingreso.php'>
                        <button class='btn btn-outline-success' type='submit'>Ingresar</button>

                    </form>
                </div>
            </div>
        </nav>
    </header>
    <!-- CUERPO DE PAGINA -->

    <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 2</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 3</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 4</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 5</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 6</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 7</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 8</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card">
                    <div class="img-wrapper"><img src="..." class="d-block w-100" alt="..."> </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title 9</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- TABLA DE DATOS -->
    <div class="">
        <h2>Usuarios registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th>
                            <?= $row['id'] ?>
                        </th>
                        <th>
                            <?= $row['destination'] ?>
                        </th>
                        <th>
                            <?= $row['origin'] ?>
                        </th>
                        <th>
                            <?= $row['price'] ?>
                        </th>

                        <th><a href=''>Editar</a></th>
                        <th><a href=''>Eliminar</a></th>
                    </tr>
                <?php endwhile;
                ?>
            </tbody>
        </table>
    </div>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN'
        crossorigin='anonymous'></script>
    <script src="./js/vuelos.js"></script>
</body>

</html>