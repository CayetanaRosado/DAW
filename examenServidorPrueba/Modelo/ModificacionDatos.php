<?php
    include "../Controlador/conexionBBDD.php";
    $conexion = mysqli_connect($host, $usuario, $contraseña, $bbdd);

    if (mysqli_connect_errno()) {
        die("ERROR AL CONECTAR LA BBDD" . mysqli_connect_error());
    }

    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";

    $sql = "UPDATE pacientes SET telefono='$telefono' WHERE email='$email'";
    $result = mysqli_query($conexion, $sql);


    if (mysqli_affected_rows($conexion) > 0) {
        echo "<div class='exito'>Tus datos han sido modificados</div>";
                echo "  <a class='volver' href='../index.php'>VOLVER</a>";
    } else {
        echo "Error al intentar modificar los datos";
    }

    mysqli_close($conexion);
    ?>