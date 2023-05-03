<?php
    require_once('../model/Conection.php')

    class Ruta{
        public function __construct(){
            try {
                $this->con = new mysqli('localhost','root','','db_aerolinea');//this permite acceder a los atributos
                echo "Conexion exitosa.";
            } catch (Exception $pe) {
                echo "Error conexion BD $dbname :" . $pe->getMessage();
            }

        }

        public function getRuta(){
            $query = $this->con->query('SELECT * FROM tbl_rutas');
            $retorno =[];
            $i = 0;
            while($fila = $query->fetch_assoc()){ //devuelve el arreglo
                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }
    }

?>