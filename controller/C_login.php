<?php
// include('../model/Conection.php');
class Login
{
		public $con;
		public function __construct()
		{
			try {
				$this->con = new mysqli('localhost','root','','db_aerolinea');//this permite acceder a los atributos
				// echo "Conexion exitosa.";
			} catch (Exception $pe) {
				echo "Error conexion BD: " . $pe->getMessage();
			}
		}
		//Funcion para validar usuarios
		public function validarLogin()
		{
			session_start();

			$correo = $_GET['correo_usuario'];
			$contrasena = $_GET['contrasena'];
			$encConstrasena = sha1($contrasena);

			//$globals = $GLOBALS;

			//$validar_login = mysqli_query( this.con, "SELECT * FROM tbl_usuario WHERE contrasena='$encConstrasena' and correo_usuario='$correo'");
			$validar_login = $this->con->query("SELECT * FROM tbl_usuario WHERE contrasena='$encConstrasena' and correo_usuario='$correo'");

			if(mysqli_num_rows($validar_login) > 0){
				$_SESSION['tbl_usuario'] = $correo;
				$GLOBALS['user_email_global'] = $GLOBALS['correo'];
				echo '
				<script>
					window.location = "../view/vuelos.php";
				</script>
				';
				exit();
			}else{
				echo '
				<script>
					alert("usuario no existe, por favor verificar los datos");
					window.location = "../view/V_login.php";
				</script>
				';
				exit();
			}
			return $correo;
		}
		//Funcion para cerrar la session
		public function cerrar_session()
		{
			session_start();
			// session_unset('correo_usuario');
			session_destroy();
			header("Location: ../view/index.php");
		}

		public function getIdUser($email_user){
			$userId = $this->con->query("SELECT ID_usuario FROM tbl_usuario WHERE correo_usuario='$email_user'");
			$retorno =[];
            $i = 0;
            while($fila = $userId->fetch_assoc()){ //devuelve el arreglo
                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
		}

		public function getUserInfo($email_user){
			$userId = $this->con->query("SELECT * FROM tbl_usuario WHERE correo_usuario='$email_user'");
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