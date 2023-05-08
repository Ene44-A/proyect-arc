<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="../model/M_login.php" method="GET" class="container p-5 bg-dark text-white"
            style="max-width: 500px;">
            <h1>Login</h1>
            <div class="mb-3">
                <input type="email" class="form-control" id="correo_usuario" name="correo_usuario" placeholder="Correo">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="contrasena">
            </div>
            <div class="mb3" style="margin:20px 0;">
                <a href="V_register-users.php">Registrar cuenta nueva</a>
            </div>
            <div class="mb3 w-100 container justify-content-between">
                <button type="submit" class="btn btn-success" name="ingresar">Ingresar</button>
                <button type="submit" class="btn btn-danger"><a href="index.php">Volver</a></button>
            </div>
        </form>
    </div>
    <div class="container">
        <form action="../model/M_User.php" method="GET" class="container p-5 bg-dark text-white"
            style="max-width: 500px;">
            <h1>Registro</h1>
            <div class="mb-3">
                <input type="text" class="form-control" name="correo_usuario" placeholder="Correo">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="contrasena" placeholder="contrasena">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="nombre_usuario" placeholder="Nombre" required>
            </div>
            <div class="mb3 w-100 container justify-content-around">
                <input type="submit" class="btn btn-success" name="registro" value="Enviar">
                <button type="submit" class="btn btn-danger"><a href="V_login.php">Volver</a></button>
            </div>
        </form>
    </div>
</body>

</html>