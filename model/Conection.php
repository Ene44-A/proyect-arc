<?php 
class Conection{

    public $con;

    public function __construct(){
        try {
           
            $this->con =new mysqli('localhost','root','','db_aerolinea');//this permite acceder a los atributos
                            echo "Conexion exitosa.";
                            require('../view/V_Register-users.php');
            
        } catch (Exception $pe) {
            echo "Error conexion BD $dbname :" . $pe->getMessage();
        }
    }   

}
  
?>