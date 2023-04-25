<?php
include('./Conection.php');
include('../controller/C_User.php');

$db = new Conection;

if(isset($_GET['registro']))
{
    $inputData = [
        'correo' => mysqli_real_escape_string($db->con,$_GET['correo_usuario']),
        'contrasena' => mysqli_real_escape_string($db->con,$_GET['contrasena']),
        'nombre' => mysqli_real_escape_string($db->con,$_GET['nombre_usuario'])
    ];

     $usuario = new User;
    $heler = $usuario-> newUsuario($inputData);

}
?>