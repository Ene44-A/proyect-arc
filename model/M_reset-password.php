<?php
//require_once 'C_reset_password.php'; // Asegúrate de colocar la ruta correcta si es necesario
include('./Conection.php');
include('../controller/C_reset-password.php');

$reset = new Reset();
$reset->confirmcontra();

?>