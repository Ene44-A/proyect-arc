    <?php
    function connection(){

        $host = "localhost";
        $user = "root";
        $pass = "";

        $bd = "db_aerolinea";

        $connect = mysqli_connect($host, $user, $pass); //metodo para pasar parametros de conexion a la db

        mysqli_select_db($connect, $bd); // parametro para conectarse a la base de datos

        return $connect;

    };


?>