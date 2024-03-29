<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/registro-user.css">
    <title>Ingreso</title>
</head>

<body>
    <header class="vh-100 m-0 row justify-content-center align-content-center header-1">
        <div class="login-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="bg-white shadow rounded">
                            <div class="row">


                                <div class="col-md-5 ps-0 d-none d-md-block">
                                    <div class="form-right h-100 bg-success text-white text-center pt-5">
                                        <h2 class="fs-1">¿Quieres ser parte del equipo?</h2>
                                        <div class="mb3 p-5" style="margin:20px 0;">
                                            <button type="submit" class="btn btn-light btn-action"><a
                                                    href="V_login.php">Volver</a></button>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    .btn-action a {
                                        color: black;
                                    }
                                </style>
                                <div class="col-md-7 pe-0">
                                    <div class="form-left h-100 py-5 px-5">
                                        <form action="../model/M_User.php" method="GET" class="row g-4">

                                            <div class="col-12">
                                                <label>Nombre<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="bi bi-person-fill"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="nombre_usuario"
                                                        name="nombre_usuario" placeholder="Nombre" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label>Correo<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="bi bi-person-fill"></i>
                                                    </div>
                                                    <input type="mail" class="form-control" id="correo_usuario"
                                                        name="correo_usuario" placeholder="Correo">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label>Contraseña<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                    <input type="password" class="form-control" id="contrasena"
                                                        name="contrasena" placeholder="contrasena">
                                                    <div id="passwordHelpBlock" class="form-text">
                                                        Su contraseña debe tener entre 8 y 20 caracteres, contener
                                                        letras y números, y no debe contener espacios, caracteres
                                                        especiales ni emoji.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-success px-4 float-end mt-4"
                                                    name="registro">Registrar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>