<?php

class User{ 
    public $con;
    public function __construct(){
        try {
            $this->con = new mysqli('localhost','root','','db_aerolinea');//this permite acceder a los atributos
            echo "Conexion exitosa.";
        } catch (Exception $pe) {
            echo "Error conexion BD $dbname :" . $pe->getMessage();
        }
        
    } 
    public function getUsuario(){ 
        $query = $this->con->query('SELECT * FROM tbl_usuario');
        $retorno =[];
        $i = 0;
        while($fila = $query->fetch_assoc()){ //devuelve el arreglo
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
        echo $retorno;

    }
     
    public function newUsuario($inputData){
        $correo =  $inputData['correo'];
        $contrasena = $inputData['contrasena'];
        $nombre_usuario = $inputData['nombre'];
        $us = "INSERT INTO tbl_usuario (correo_usuario,contrasena,nombre_usuario) VALUES ('$correo','$contrasena','$nombre_usuario')";
        $result = mysqli_query($this->con, $us);
        if($result){
           return true;
           
        }else{
           return false;
        }
    }

 }
?>