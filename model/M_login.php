<?php
//include('./Conection.php');
include('../controller/C_login.php');

$valLogin = new Login;
$usuario = $valLogin-> validarLogin();


?>