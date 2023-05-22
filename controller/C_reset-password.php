<?php
class Reset 
{
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

    public function confirmcontra()
    {
        session_start();

        $correo = $_POST['correo_usuario'];
        $pass = $_POST['password'];
        $confirm = $_POST['confirm_password'];

        // Verificar si el correo electrónico existe en la base de datos
        $validarcontra = $this->con->query("SELECT * FROM tbl_usuario WHERE correo_usuario = '$correo'");

        if ($validarcontra->num_rows > 0) {
            // Verificar si las contraseñas coinciden
            if ($pass === $confirm) {
                // Actualizar la contraseña del usuario
                $hashedPassword = sha1($pass);
                $actualizarcontra = $this->con->query("UPDATE tbl_usuario SET contrasena = '$hashedPassword' WHERE correo_usuario = '$correo'");

                if ($actualizarcontra === TRUE) {
                    echo '
				<script>
					alert("Contraseña actualizada con exito");
					window.location = "../view/V_login.php";
				</script>
				';
                } else {
                    echo "Error al actualizar la contraseña" . $this->con->error;
                }
            } else {
                echo '<script>
                alert("Las contraseñas no coinciden");
                window.location = "../view/V_reset-password.php";
            </script>';
                
            }
        } else {
            echo '<script>
                alert("El correo electronico no existe en la base de datos");
                window.location = "../view/V_reset-password.php";
            </script>';
        }
       
        // Cerrar la conexión
        $this->con->close();
    }
}


?>