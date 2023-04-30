<?php
//include('./Conection.php');
include('../controller/C_login.php');

$db = new Conection;

// if(isset($_GET['ingresar']))
// {
//     $inputData = [
//         'correo_usuario' => mysqli_real_escape_string($db->con,$_GET['correo_usuario']),
//         'contrasena' => mysqli_real_escape_string($db->con,$_GET['contrasena']),
//     ];

//     $logUsuario = new Login($inputData, $inputData);
//     /* $heler = $logUsuario-> login(); */

// }

$valLogin = new Login;
$usuario = $valLogin-> validarLogin();


?>