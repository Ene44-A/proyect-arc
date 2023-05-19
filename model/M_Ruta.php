<?php
    //require_once('Conection.php');

    class Ruta{
        private $con;
        public function __construct(){
            try {
                $this->con = new mysqli('localhost','root','','db_aerolinea');//this permite acceder a los atributos
                //echo "Conexion exitosa.";
            } catch (Exception $pe) {
                echo "Error conexion BD" . $pe->getMessage();
            }

        }

        public function getRuta(){
            $query = $this->con->query("SELECT * FROM tbl_rutas");
            $retorno =[];
            $i = 0;
            while($fila = $query->fetch_assoc()){ //devuelve el arreglo
                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }

        public function getVuelosInfo(){
            $query = $this->con->query('SELECT * FROM tbl_rutas INNER JOIN tbl_vuelo ON tbl_rutas.ID_rutas = tbl_vuelo.ID_rutas;');
            $retorno =[];
            $i = 0;
            while($fila = $query->fetch_assoc()){ //devuelve el arreglo
                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }
         public function getVuelosInfoBuscar($ruta, $fecha_seleccionada){
            $query = $this->con->query("SELECT * FROM tbl_rutas 
            INNER JOIN tbl_vuelo ON tbl_rutas.ID_rutas = tbl_vuelo.ID_rutas where tbl_rutas.descripcion = '$ruta' and
             tbl_vuelo.fecha_salida='$fecha_seleccionada';");
            $retorno =[];
            $i = 0;
            while($fila = $query->fetch_assoc()){ //devuelve el arreglo
                $retorno[$i] = $fila;
                $i++;
            }

            //SELECT * FROM tbl_rutas INNER JOIN tbl_vuelo ON tbl_rutas.ID_rutas = tbl_vuelo.ID_rutas where fecha_salida="2023-04-20";

            return $retorno;
        } 
         
        public function getSingleVueloInfo($ruta_seleccionada){
            $query = $this->con->query("SELECT * FROM tbl_rutas INNER JOIN tbl_vuelo ON
             tbl_rutas.ID_rutas = tbl_vuelo.ID_rutas where descripcion='$ruta_seleccionada'");
            $retorno =[];
            $i = 0;
            while($fila = $query->fetch_assoc()){ //devuelve el arreglo
                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        } 

        public function getVueloPorId($id_vuelo){
            $query = $this->con->query("SELECT * FROM tbl_rutas INNER JOIN tbl_vuelo ON
             tbl_rutas.ID_rutas = tbl_vuelo.ID_rutas where COD_vuelo='$id_vuelo'");
            $retorno =[];
            $i = 0;
            while($fila = $query->fetch_assoc()){ //devuelve el arreglo
                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }

  /*    }   public function getIdRuta(){
            $query = $this->con->query("SELECT ID_rutas  FROM tbl_rutas INNER JOIN tbl_vuelo ON tbl_rutas.ID_rutas = tbl_vuelo.ID_rutas where descripcion='$ruta_seleccionada'");
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