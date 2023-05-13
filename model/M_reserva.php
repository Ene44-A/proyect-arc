<?php


class Reserva{
    public $con;
    public function __construct()
    {
        try {
            $this->con = new mysqli('localhost', 'root', '', 'db_aerolinea');
            // echo "Conexion exitosa.";
        } catch (Exception $pe) {
            echo "Error conexion BD: " . $pe->getMessage();
        }
    }

    public function setReservas($estado_vuelo,$fecha_reserva,$id_usuario,$precio_total){
        $this->con->query("INSERT INTO tbl_reserva(estado,fecha_reserva,ID_usuario,precio_total) VALUES('$estado_vuelo','$fecha_reserva','$id_usuario','$precio_total')");
    }
}


?>