<?php

session_start();
if (!isset($_SESSION['tbl_usuario'])) {
    echo '
            <script>
                alert("Debes inicar sesion");
                window.location = "../view/V_login.php";
            </script>
            ';
    //header('location: login.php');
    session_destroy();
    die();
}

?>