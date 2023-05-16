<?php
include('../model/M_Ruta.php');

$fecha_vuelo = $_POST['fecha_vuelo'];



$ruta = new Ruta();
$lasRutas = $ruta->getRuta($fecha_vuelo);

$vuelosInfo = $ruta->getVuelosInfo();




?>