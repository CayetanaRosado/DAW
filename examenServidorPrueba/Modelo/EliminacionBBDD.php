<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja de base de datos</title>
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
    require "../Controlador/conexionBBDD.php";
    $conexion = mysqli_connect($host, $usuario, $contraseña, $bbdd);
    if (!$conexion) {
        die("Error en la conexion" . mysqli_connect_error());
    }

    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $sql = "SELECT * from pacientes where email='$email'";
    $result = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($result) > 0) {
        $sql_delete = "DELETE from pacientes where email='$email'";
        $confirmar_baja = mysqli_query($conexion, $sql_delete);
        if (!$confirmar_baja) {
            die("Error al intentar elimnar usuario" . mysqli_error($conexion));
        } else {
            echo "<div class='correcto'>Dado de baja de la base de datos con existo</div>";
            echo "  <a class='volver' href='../index.php'>VOLVER</a>";
        }
    } else {
        echo "<div class='error'>No existe el correo, por lo que no podemos eliminar los datos</div>";
        echo "<a class='volver' href='../index.php'>VOLVER</a>";
    }
    mysqli_close($conexion);
    ?>
</body>

</html>