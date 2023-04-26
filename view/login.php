<?php
    try {
        $con =new mysqli('localhost','root','','db_aerolinea');//this permite acceder a los atributos
        echo "Conexion exitosa.";
    } catch (Exception $pe) {
        echo "Error conexion BD $dbname :" . $pe->getMessage();
    }

    $correo = $_GET['correo_usuario'];
    $contrasena = $_GET['contrasena'];
    $encConstrasena = sha1($contrasena);

    $validar_login = mysqli_query( $con, "SELECT * FROM tbl_usuario WHERE contrasena='$encConstrasena' and correo_usuario='$correo'");

    if(mysqli_num_rows($validar_login) > 0){
        echo '
        <script>
            window.location = "index.php";
        </script>
        ';
        exit();

    }else{
        echo '
        <script>
            alert("usuario no existe, por favor verificar los datos");
            window.location = "../vista/login_register.php";
        </script>
        ';
            
        exit();
    }
        
    
?>