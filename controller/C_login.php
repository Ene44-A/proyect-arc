<?php
include('./Conection.php');

class Login
{
	public $correo_usuario;
	public $contrasena;
	public $error1="Porfavor ingrese un usuario o una contrase&ntilde;a";
	public $error2="Usuario o Contrase&ntilde;a incorrecta.";
	    //Constructor de la clase
		public function __construct($correo_usuario,$contrasena)
		{
			$this->correo_usuario=$correo_usuario;
			$this->contrasena=$contrasena;
		}
		//Funcion para validar usuarios
		public function login($correo_usuario,$contrasena)
		{

			$consulta=mysql_query("select tbl_usuario('$correo_usuario','$contrasena');");
			$rel=mysql_fetch_array($consulta);
			if($rel[0] == 1)
			{
				$_SESSION['correo_usuario']=$correo_usuario;
				header("Location: index.php");
			}else
			if(empty($correo_usuario) or empty($contrasena))
			{
				echo "<p class='exito'>" .$this->error1. "</p>";
			}
			else
			{
				echo "<p class='exito'>" .$this->error2. "</p>";
		    }
		}
		//Funcion para cerrar la session
		public function cerrar_session()
		{
			session_start();
			session_unset('correo_usuario');
			session_destroy('correo_usuario');
			header("Location: ../login.php");
		}
}

?>