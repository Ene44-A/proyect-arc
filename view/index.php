<?php
include('../backend/conexion.php');

$con = connection();

$sql = "SELECT * FROM tbl_users";
$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Index</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <i class='bx bxs-plane-take-off'></i>
                    <a class="navbar-brand" href="#">Hidden brand</a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="ingresar" action="ingreso.php">
                        <button class="btn btn-outline-success" type="submit">Ingresar</button>

                    </form>
                </div>
            </div>
        </nav>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/img/img1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/img2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/img3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/img4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/img5.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
    </header>
    <!-- FORMATO DE ENTRADA PARA VUELOS -->
    <div class="container">
        <div class="container container-check">
            <form class="row gy-2 gx-3 align-items-center">
                <div class="col-lg">
                    <label class="visually-hidden" for="autoSizingInputGroup">Username</label>
                    <div class="input-group">
                        <div class="input-group-text">Origen: Urabá</div>
                        <select class="form-select" id="autoSizingSelect">
                            <option selected>Destino</option>
                            <option value="1">Medellin</option>
                            <option value="2">Bogotá</option>
                            <option value="3">Cali</option>
                            <option value="3">Cartagena</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm">
                    <label class="visually-hidden" for="autoSizingInputGroup">Salida</label>
                    <div class="input-group">
                        <div class="input-group-text">Salida</div>
                        <input type="date" class="form-control" id="autoSizingInputGroup">
                    </div>
                </div>
                <div class="col-sm">
                    <label class="visually-hidden" for="autoSizingInputGroup">Regreso</label>
                    <div class="input-group">
                        <div class="input-group-text">Regreso</div>
                        <input type="date" class="form-control" id="autoSizingInputGroup">
                    </div>
                </div>
                <div class="container-md row gy-2 gx-3 align-items-center">
                    <div class="col-sm">
                        <label class="visually-hidden" for="autoSizingSelect">Preference</label>
                        <select class="form-select" id="autoSizingSelect">
                            <option selected>Clase</option>
                            <option value="1">Economica</option>
                            <option value="2">Ejecutiva</option>
                            <option value="3">Primera Clase</option>
                        </select>
                    </div>
                    <div class="col-sm">
                        <label class="visually-hidden" for="autoSizingSelect">Preference</label>
                        <select class="form-select" id="autoSizingSelect">
                            <option selected>Pasajeros</option>
                            <option value="1">1 Persona</option>
                            <option value="2">2 personas</option>
                            <option value="3">3 Personas</option>
                            <option value="4">mas de 3</option>
                        </select>
                    </div>
                </div>
                <div class="col-md">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- CUERPO DE PAGINA -->
    <div class="container-fluid row justify-content-center align-items-center p-5">
        <h2 class="" style="text-align:center;">Ofertas</h2>
        <div class="container-xxl row justify-content-center align-items-center p-5">
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body m-1">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body m-1">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body m-1">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body m-1">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </div>
    <!-- CARDS DE SITIOS -->
    <div class="container-fluid row justify-content-center align-items-center p-5">
        <div class="container justify-content-center"><h3 style="text-align:center;">Lugares en ofertas</h3></div>
        <div class="card m-3 card-oferta p-1" style="width: 24rem;">
            <img src="../assets/img/destination1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card m-3 card-oferta p-1" style="width: 24rem;">
            <img src="../assets/img/destination2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card m-3 card-oferta p-1" style="width: 24rem;">
            <img src="../assets/img/destination3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>

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
                <?php while ($row = mysqli_fetch_array($query)) : ?>
                    <tr>
                        <th> <?= $row['id'] ?> </th>
                        <th> <?= $row['name'] ?> </th>
                        <th> <?= $row['mail'] ?> </th>
                        <th> <?= $row['password'] ?> </th>

                        <th><a href="">Editar</a></th>
                        <th><a href="">Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>