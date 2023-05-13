<?php

require_once('../model/Conection.php');
require_once('../controller/C_Rutas.php');

/* session_start();
if (!isset($_SESSION['tbl_usuario'])) {
    echo '
            <script>
                alert("Debes inicar sesion");
                window.location = "V_login.php";
            </script>
            ';
    //header('location: login.php');
    session_destroy();
    die();
} */



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
    <link rel='stylesheet' href='./styles/vuelos.css'>
    <title>Reservar Vuelo</title>
</head>

<body>
    <section style="width: 500px; margin: 50px 30px ">
        <h2>
            <?php
            require_once('../model/Conection.php');
            require_once('../controller/C_Rutas.php');

            $ruta = $_GET['route-selected'];
            echo $ruta;
            //echo $lasRutas['descripcion'][1];

            $particularRoute = new Ruta();
            $myRoute = $particularRoute->getSingleVueloInfo($ruta);

            if (!$myRoute) {
                echo "</tr>";
                echo "</td>";
                echo "No hay datos para mostrar";
                echo "</td>";
                echo "</tr>";
            } else {
                foreach ($myRoute as $route) {
                    /*     echo"</tr>";
                        echo"</td>".$route['ID_rutas']."</td>";
                        echo"</td>".$route['descripcion']."</td>";
                        echo"</td>".$route['matricula_avion']."</td>";
                        echo"</td>".$route['precio']."</td>";
                        echo "</tr>"; */

                    $fecha_salida = $route['fecha_salida'];
                    $fecha_llegada = $route['fecha_llegada'];
                    $matricula = $route['matricula_avion'];
                    $estado_vuelo = $route['estado'];
                    $cantidad_asientos = $route['asientos_disponibles'];
                    $precio_tiket = $route['precio'];

                }
            }
            ?>
        </h2>

        <br>
        <br>
        <form action="../controller/C_reserva.php" method="GET">
            <h2>Info del Vuelo</h2>

            <div class="col-12 mt-2">
                <label>Fecha de salida</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                    <input type="text" class="form-control" id="fecha_de_salida" name="fecha_de_salida"
                        placeholder="<?php echo $fecha_salida; ?>" autocomplete="off" disabled />
                </div>
            </div>
            <div class="col-12 mt-2">
                <label>Fecha de llegada</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                    <input type="text" class="form-control" id="fecha_de_llegada" name="fecha_de_llegada"
                        placeholder="<?php echo $fecha_llegada; ?>" autocomplete="off" disabled />
                </div>
            </div>
            <div class="col-12 mt-2">
                <label>Matricula del Avion</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                    <input type="text" class="form-control" id="matricula_avion" name="matricula_avion"
                        placeholder="<?php echo $matricula; ?>"  autocomplete="off" disabled />
                </div>
            </div>
            <div class="col-12 mt-2">
                <label>Estado del Vuelo</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                    <input type="text" class="form-control" id="estado_vuelo" name="estado_vuelo1"
                        placeholder="<?php echo $estado_vuelo; ?>" value="<?php echo $estado_vuelo; ?>" autocomplete="off">
                </div>
            </div>
            <div class="col-12 mt-2">
                <label>Catidad de asientos disponibles</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                    <input type="text" class="form-control" id="cantidad_asientos" name="cantidad_asientos"
                        placeholder="<?php echo $cantidad_asientos; ?>" autocomplete="off" disabled>
                </div>
            </div>
            <div class="col-12 mt-2">
                <label>Precio del tiket</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                    <input type="text" class="form-control" id="precio_tiket" name="precio_tiket1"
                        placeholder="<?php echo number_format($precio_tiket, 0); ?>" value="<?php echo number_format($precio_tiket, 0); ?>" autocomplete="off">
                </div>
            </div>


            <h2>Ingrese sus datos</h2>

            <div class="col-12">
                <label>Nombre<span class="text-danger">*</span></label>
                <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person-fill"></i>
                    </div>
                    <input type="text" class="form-control" id="correo_usuario" name="nombre" placeholder="Nombre"
                        autocomplete="off">
                </div>
            </div>
            <div class="col-12 mt-2">
                <label>Telefono<span class="text-danger">*</span></label>
                <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person-fill"></i>
                    </div>
                    <input type="text" class="form-control" id="correo_usuario" name="telefono" placeholder="Telefono"
                        autocomplete="off">
                </div>
            </div>
            <div class="col-12 mt-2">
                <label>Fecha de nacimiento<span class="text-danger">*</span></label>
                <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person-fill"></i>
                    </div>
                    <input type="date" class="form-control" id="correo_usuario" name="fecha_nacimiento"
                        placeholder="fecha de nacimiento" autocomplete="off">
                </div>
            </div>
            <div class="col-12 mt-2">
                <label>Correo<span class="text-danger">*</span></label>
                <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person-fill"></i>
                    </div>
                    <input type="text" class="form-control" id="correo_usuario" name="correo" placeholder="Correo"
                        autocomplete="off">
                </div>
            </div>
            <div class="col-12 mt-2">

                <!-- CAMBIAR POR SELECT -->




                <label>Cantidad de asientos<span class="text-danger">*</span></label>
                <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-person-fill"></i>
                    </div>
                    <input type="text" class="form-control" id="correo_usuario" name="asientos"
                        placeholder="cantidad de vuelos" autocomplete="off">
                </div>
            </div>
            <div class="col-12">
                <button type="submit" name="enviar_reserva" class="btn btn-success px-4 float-end mt-4">Ingresar</button>
            </div>
        </form>


    </section>
</body>

</html>