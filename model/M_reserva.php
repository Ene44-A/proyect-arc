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

    public function setPasajeros($nombre_pasajero,$telefono,$fecha_nacimiento,$correo_pasajero, $asientos_reservados){
        $this->con->query("INSERT INTO tbl_pasajero(nombre_pasajero,telefono,fecha_nacimiento,correo_pasajero,asientos_reservados) VALUES('$nombre_pasajero','$telefono','$fecha_nacimiento','$correo_pasajero', '$asientos_reservados')");
    }

    public function setDetalleReserva($COD_reserva, $COD_vuelo, $ID_pasajero){
        $this->con->query("INSERT INTO tbl_detalle_reserva(COD_reserva,COD_vuelo,ID_pasajero, estado) VALUES($COD_reserva, $COD_vuelo, $ID_pasajero, 'confirmado')");
    }

    public function getUltimatePasajero(){
        $userId = $this->con->query("SELECT ID_pasajero FROM tbl_pasajero WHERE ID_pasajero = (SELECT MAX(ID_pasajero) FROM tbl_pasajero)");
        $retorno =[];
        $i = 0;
        while($fila = $userId->fetch_assoc()){ //devuelve el arreglo
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno[0];
    }

    public function getUltimateReserva(){
        $userId = $this->con->query("SELECT COD_reserva FROM tbl_reserva WHERE COD_reserva = (SELECT MAX(COD_reserva) FROM tbl_reserva)");
        $retorno =[];
        $i = 0;
        while($fila = $userId->fetch_assoc()){ //devuelve el arreglo
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno[0];
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
        $userId = $this->con->query("SELECT * FROM tbl_usuario as u, tbl_reserva as r
        INNER JOIN tbl_detalle_reserva as d ON d.COD_reserva=r.COD_reserva
        INNER JOIN tbl_vuelo as v ON v.COD_vuelo=d.COD_vuelo WHERE u.ID_usuario = '$id_user'");
        $retorno =[];
        $i = 0;
        while($fila = $userId->fetch_assoc()){ //devuelve el arreglo
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }

    public function getReservaMasDetalle($COD_reserva){
        $userId = $this->con->query("SELECT * FROM tbl_reserva 
        INNER JOIN tbl_detalle_reserva 
        ON tbl_reserva.COD_reserva = tbl_detalle_reserva.COD_reserva 
        WHERE tbl_detalle_reserva.COD_reserva=$COD_reserva");
        $retorno =[];
        $i = 0;
        while($fila = $userId->fetch_assoc()){ //devuelve el arreglo
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }

    public function getPasajero($correo_pasajero){
        $userId = $this->con->query("SELECT * FROM tbl_pasajero WHERE correo_pasajero='$correo_pasajero'");
        $retorno =[];
        $i = 0;
        while($fila = $userId->fetch_assoc()){ //devuelve el arreglo
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }

    public function getInfoVueloPasajero($correo_pasajero){
        $userId = $this->con->query("SELECT * FROM tbl_vuelo
        INNER JOIN tbl_detalle_reserva ON tbl_vuelo.COD_vuelo = tbl_detalle_reserva.COD_vuelo
        INNER JOIN tbl_pasajero ON tbl_detalle_reserva.ID_detalle_reserva = tbl_pasajero.ID_pasajero WHERE correo_pasajero='$correo_pasajero';");
        $retorno =[];
        $i = 0;
        while($fila = $userId->fetch_assoc()){ //devuelve el arreglo
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }






/*    public function getReservaInfoBuscar($ruta, $fecha_seleccionada){
        $query = $this->con->query("SELECT * FROM tbl_vuelo
        INNER JOIN tbl_detalle_reserva ON tbl_vuelo.COD_vuelo = tbl_detalle_reserva.COD_vuelo
        INNER JOIN tbl_pasajero ON tbl_detalle_reserva.ID_detalle_reserva = tbl_pasajero.ID_pasajero 
        INNER JOIN tbl_rutas ON tbl_rutas.ID_rutas = tbl_vuelo.ID_rutas
        WHERE tbl_rutas.descripcion='$ruta' and fecha_salida='$fecha_seleccionada';");
        $retorno =[];
        $i = 0;
        while($fila = $query->fetch_assoc()){ //devuelve el arreglo
            $retorno[$i] = $fila;
            $i++;
        }
    }
                  
     public function getVueloPorId($id_reserva){
        $query = $this->con->query("SELECT * FROM tbl_rutas INNER JOIN tbl_vuelo ON
         tbl_rutas.ID_rutas = tbl_vuelo.ID_rutas where COD_vuelo='$id_vuelo'");
        $retorno =[];
        $i = 0;
        while($fila = $query->fetch_assoc()){ //devuelve el arreglo
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    } */


}
?>