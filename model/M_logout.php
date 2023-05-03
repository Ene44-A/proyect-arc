<?php
//include('./Conection.php');
include('../controller/C_login.php');

$logout_F = new Login;
$usuario = $logout_F-> cerrar_session();


?>