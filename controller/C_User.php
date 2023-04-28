<?php

class User{ 
    public $con;
    public function __construct(){
        try {
            $this->con = new mysqli('localhost','root','','db_aerolinea');//this permite acceder a los atributos
            // echo "Conexion exitosa.";
        } catch (Exception $pe) {
            echo "Error conexion BD "; //$dbname :" . $pe->getMessage();
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
        $correo =  $inputData['correo_usuario'];
        $contrasena = $inputData['contrasena'];
        $nombre_usuario = $inputData['nombre_usuario'];

        $queryToOldUSers = $this->con->query("SELECT * FROM tbl_usuario WHERE correo_usuario='$correo'");

        if ($queryToOldUSers->num_rows>0){
			?>
  				<span>Este Correo ya fue registrado</span>
  			<?php 

            echo '
            <script>
                alert("Esta correo ya se registro");
                window.location = "../view/V_register-users.php";
            </script>
            ';
		}
        elseif (!preg_match("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/",$correo)) {
            echo '
            <script>
                alert("Esta correo es invalido");
                window.location = "../view/V_register-users.php";
            </script>
            ';
        }
        elseif (!preg_match("/[0-9a-zA-Z]{8,12}/",$contrasena)){
            echo '
            <script>
                alert("La contraseña debe tener entre 8 y 12 caracteres");
                window.location = "../view/V_register-users.php";
            </script>
            ';
        }
        else {
            $encConstrasena = sha1($contrasena);
            $us = "INSERT INTO tbl_usuario (correo_usuario,contrasena,nombre_usuario) VALUES ('$correo','$encConstrasena','$nombre_usuario')";
            $result = mysqli_query($this->con, $us);
            if($result){
               return true;
               echo "guardado.";
            }else{
                return false;
                echo "no guardado.";
            }
        }

    }

 }
?>