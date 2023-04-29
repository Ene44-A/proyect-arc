<?php
    try {
        $con =new mysqli('localhost','root','','db_aerolinea');//this permite acceder a los atributos
        // echo "Conexion exitosa.";
    } catch (Exception $pe) {
        echo "Error conexion BD $dbname :" . $pe->getMessage();
    }

    //session_start();

    $correo = $_GET['correo_usuario'];
    $contrasena = $_GET['contrasena'];
    $encConstrasena = sha1($contrasena);

    $validar_login = mysqli_query( $con, "SELECT * FROM tbl_usuario WHERE contrasena='$encConstrasena' and correo_usuario='$correo'");

    if(mysqli_num_rows($validar_login) > 0){
        //$_SESSION['tbl_usuario'] = $correo;
        echo '
        <script>
            window.location = "vuelos.php";
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
        
    
?>