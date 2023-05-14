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

    public function getRutaPorId($id_ruta){
        $userId = $this->con->query("SELECT * FROM tbl_rutas INNER JOIN tbl_vuelo ON tbl_rutas.ID_rutas = tbl_vuelo.ID_rutas WHERE tbl_vuelo.ID_rutas = $id_ruta");
        $retorno =[];
        $i = 0;
        while($fila = $userId->fetch_assoc()){ //devuelve el arreglo
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }

    public function getUsuarioReservas($id_user){
        $userId = $this->con->query("SELECT * FROM tbl_usuario INNER JOIN tbl_reserva ON tbl_usuario.ID_usuario = tbl_reserva.ID_usuario WHERE tbl_usuario.ID_usuario = $id_user");
        $retorno =[];
        $i = 0;
        while($fila = $userId->fetch_assoc()){ //devuelve el arreglo
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }
}


?>