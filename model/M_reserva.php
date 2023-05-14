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

    public function setPasajeros($nombre_pasajero,$telefono,$fecha_nacimiento,$correo_pasajero){
        $this->con->query("INSERT INTO tbl_pasajero(nombre_pasajero,telefono,fecha_nacimiento,correo_pasajero) VALUES('$nombre_pasajero','$telefono','$fecha_nacimiento','$correo_pasajero')");
    }

    public function updateVuelo($asientos_restantes, $id_ruta ){
        $this->con->query("UPDATE tbl_vuelo SET asientos_disponibles = $asientos_restantes WHERE ID_rutas = $id_ruta ");
    }
}


?>