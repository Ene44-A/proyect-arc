<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/ingreso.css">
    <title>Ingreso</title>
</head>

<body>
    <header class="vh-100 m-0 row justify-content-center align-content-center ">
        <div class="container">
            <form class="container p-5 bg-dark text-white" style="max-width: 500px;">
                <h1>Ingresar</h1>
                <div class="mb-3">
                    <input type="mail" class="form-control" id="formGroupExampleInput" placeholder="Correo">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Contraseña">
                </div>
                <div class="mb3" style="margin:20px 0;">
                    <a href="V_register-users.php" >Registrar cuenta nueva</a>
                </div>
                <div class="mb3 w-100 container justify-content-between">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="submit" class="btn btn-danger"><a href="index.php">Atras</a></button>
                </div>
            </form>
        </div>
    </header>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>