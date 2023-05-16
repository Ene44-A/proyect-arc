<?php
include('../model/M_Ruta.php');



$ruta = new Ruta();
$lasRutas = $ruta->getRuta();

$vuelosInfo = $ruta->getVuelosInfo();




?>