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

    public function setDetalleReserva($COD_reserva, $COD_vuelo, $ID_pasajero, $estado){
        $this->con->query("INSERT INTO tbl_detalle_reserva(COD_reserva,COD_vuelo,ID_pasajero, estado) VALUES($COD_reserva, $COD_vuelo, $ID_pasajero, '$estado')");
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

    public function updateVuelo($asientos_restantes, $cod_vuelo ){
        if( $asientos_restantes <= 0){
            $asientos_restantes = 0;
            $this->con->query("UPDATE tbl_vuelo SET asientos_disponibles = $asientos_restantes, estado= 'Agotado' WHERE COD_vuelo = $cod_vuelo ");
            //updated del vuelo
            echo '
            <script>
				alert("No hay más vuelos disponibles correspondientes con esta reserva");
                window.location = "../view/vuelos.php";
            </script>
            ';
            exit();
        }else{
            $this->con->query("UPDATE tbl_vuelo SET asientos_disponibles = $asientos_restantes WHERE COD_vuelo = $cod_vuelo ");
        }
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
    // SELECT * FROM tbl_usuario as u, tbl_reserva as r, tbl_detalle_reserva as d, tbl_vuelo as v WHERE u.ID_usuario = '$id_user'
    public function getUsuarioReservas($correo_pasajero){
        $userId = $this->con->query("SELECT * FROM tbl_vuelo
                INNER JOIN tbl_detalle_reserva ON tbl_vuelo.COD_vuelo = tbl_detalle_reserva.COD_vuelo
                 INNER JOIN tbl_reserva ON tbl_reserva.COD_reserva = tbl_detalle_reserva.COD_reserva
                INNER JOIN tbl_pasajero ON tbl_detalle_reserva.ID_detalle_reserva = tbl_pasajero.ID_pasajero WHERE correo_pasajero='$correo_pasajero';");
        $retorno =[];
        $i = 0;
        while($fila = $userId->fetch_assoc()){ //devuelve el arreglo
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }

    public function getUsuarioReservasForTiket($correo_pasajero){
        $userId = $this->con->query("SELECT * FROM tbl_vuelo
        INNER JOIN tbl_detalle_reserva ON tbl_vuelo.COD_vuelo = tbl_detalle_reserva.COD_vuelo
        INNER JOIN tbl_tiquete ON tbl_detalle_reserva.ID_detalle_reserva = tbl_tiquete.ID_detalle_reserva
        INNER JOIN tbl_pasajero ON tbl_detalle_reserva.ID_pasajero = tbl_pasajero.ID_pasajero
        WHERE tbl_detalle_reserva.estado='Confirmado' AND tbl_pasajero.correo_pasajero='$correo_pasajero';");
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

    public function getNameRuteByID($ID_rutas){
        $userId = $this->con->query("SELECT descripcion FROM tbl_rutas WHERE ID_rutas=$ID_rutas");
        $retorno =[];
        $i = 0;
        while($fila = $userId->fetch_assoc()){ //devuelve el arreglo
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno[0];
    }
    public function getDateByRuteForID($COD_reserva){
        $userId = $this->con->query("SELECT fecha_reserva FROM tbl_reserva WHERE COD_reserva='$COD_reserva'");
        $retorno =[];
        $i = 0;
        while($fila = $userId->fetch_assoc()){ //devuelve el arreglo
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno[0];
    }

    public function setTikectInfo($COD_reserva, $ID_detalle){
        $userId = $this->con->query("INSERT INTO tbl_tiquete (COD_reserva, ID_detalle_reserva)
        VALUES ('$COD_reserva', '$ID_detalle')");
    }

    public function getVueloEstado($codVuelo){
        $userId = $this->con->query("SELECT estado FROM tbl_vuelo WHERE COD_vuelo=$codVuelo");
        $retorno =[];
        $i = 0;
        while($fila = $userId->fetch_assoc()){ //devuelve el arreglo
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno[0];
    }

    public function updateReservaAndDetalle($COD_reserva, $detalle_reserva, $estado_reserva ){
            //Update de la tabla reserva
            $this->con->query("UPDATE tbl_reserva SET estado = '$estado_reserva' WHERE COD_reserva = $COD_reserva");
            //Update de la tabla detalle de reserva
            $this->con->query("UPDATE tbl_detalle_reserva SET estado = '$estado_reserva' WHERE ID_detalle_reserva = $detalle_reserva");
    }

}
?>