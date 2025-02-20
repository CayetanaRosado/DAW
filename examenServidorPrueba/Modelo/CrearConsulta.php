<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear consulta</title>
</head>
<style>
         /* Contenedor general para centrar mensaje y botón */
    .contenedor {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 4em;
    }

    /* Mensajes de error y correcto */
    .error,
    .correcto {
        width: 18em;
        padding: 2em;
        text-align: center;
        border-radius: 8px;
        font-weight: bold;
        margin-bottom: 2em;
        /* Espaciado con el botón */
    }

    .error {
        background-color:rgb(183, 45, 45);
        /* Azul brillante */
        color: white;
    }

    .correcto {
        background-color: rgb(123, 171, 223); ; /* Fondo claro */
        /* Lila suave */
        color: white;
    }

    /* Botón VOLVER */
    .volver {
        background-color: rgb(210, 117, 119);
        color: white;
        width: 10em;
        padding: 0.7em;
        text-decoration: none;
        text-align: center;
        border-radius: 6px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .volver:hover {
        background-color: rgb(180, 90, 92);
    }
</style>
<body>
<?php
   
    include "../Controlador/conexionBBDD.php";


    $conexion = mysqli_connect($host, $usuario, $contraseña, $bbdd);


    if (!$conexion) {
        die("Error en la conexión" . mysqli_connect_error());
    }
    $nombre_completo =isset($_POST["nombre_completo"]) ? $_POST["nombre_completo"] :"No proporcionado";
    $email = isset($_POST["email"]) ? $_POST["email"] : "No proporcionado";
    $tipo_consulta = isset($_POST["tipo_consulta"]) ? $_POST["tipo_consulta"] : "No proporcionado";
    $fecha_consulta = isset($_POST["fecha_consulta"]) ? $_POST["fecha_consulta"] : "No proporcionado";




    $sql = "SELECT id from pacientes where email='$email' and nombre_completo ='$nombre_completo'";


    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        die("Error en la consulta" . mysqli_error($conexion));
    }


    if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row["id"];
        
        $sql = "INSERT INTO consultas(paciente_id,tipo_consulta,fecha_consulta) VALUES ('$id','$tipo_consulta',' $fecha_consulta')";
        $result = mysqli_query($conexion, $sql);
        if (!$result) {
            die("Error en la consulta" . mysqli_error($conexion));
        }else{
            echo "<div class='correcto'>Creación de consulta realizada con existo</div>";
            echo "  <a class='volver' href='../index.php'>VOLVER</a>";
        }
   
   
    }
    else{
        echo "<div class='error'>No existe el correo o el nombre en nuestra base de datos</div>";
        echo "  <a class='volver' href='../index.php'>VOLVER</a>";
    }


 
    mysqli_close($conexion);
    ?>
</body>
</html>
