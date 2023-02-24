<?php

    if(isset($_POST['submit'])){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $mensaje = $_POST['mensaje'];

        if(!empty($nombre)){
            $nombre = trim($nombre);
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);

            if($nombre == ""){
                $errores .= 'Por Favor ingresa un nombre <br>';
            }


        }else{
            $errores .= 'Por Favor ingresa un nombre <br>';
        }
        if(!empty($correo)){
            $correo = trim($correo);
            $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

            if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
                $errores .= 'Por Favor ingresa un correo <br>';
            }


        }else{
            $errores .= 'Por Favor ingresa un correo <br>';
        }
        if(!empty($mensaje)){
            $mensaje = trim($mensaje);
            $mensaje htmlspecialchars($mensaje);
            $mensaje = stripcslashes($mensaje);


        }else{
            $errores .= 'Por Favor ingresa un mensaje <br>';
        }
        if(!$errores){
            $enviar_a = 'admin@mail.com';
            $asunto = 'Correo enviado desde formulario';
            $mensaje1 = "De: $nombre \n";
            $mensaje1 .= "Correo: $correo \n";
            $mensaje1 .= "Mensaje $mensaje";

            mail($enviar_a, $asunto, $mensaje1);
        }
    }

    require_once 'index.view.php';

?>