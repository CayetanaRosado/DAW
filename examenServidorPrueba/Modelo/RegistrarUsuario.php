<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
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
    //crear conexión

    $conexion = mysqli_connect($host, $usuario, $contraseña, $bbdd);
    //comprobar conexión
    if (!$conexion) {
        die("Error en la conexion" . mysqli_connect_error());
    }

    //Validaciones del formulario:
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre_completo = (isset($_POST["nombre_completo"]) && !empty($_POST["nombre_completo"])) ? $_POST["nombre_completo"] : "No proporcionado";
        $edad = (isset($_POST["edad"]) && !empty($_POST["edad"]))  ? $_POST["edad"] : "No proporcionado";
        $telefono = (isset($_POST["telefono"]) && !empty($_POST["telefono"])) ? $_POST["telefono"] : "No proporcionado";
        $email = (isset($_POST["email"]) && !empty($_POST["email"])) ? $_POST["email"] : "No proporcionado";
        $genero = (isset($_POST["genero"]) && !empty($_POST["genero"]))  ? $_POST["genero"] : "No proporcionado";
        $seguro_medico = (isset($_POST["seguro_medico"]) && !empty($_POST["seguro_medico"]))  ? $_POST["seguro_medico"] : "No proporcionado";

        $sql = "SELECT * from pacientes WHERE email= '$email'";
        $consulta_sql = mysqli_query($conexion, $sql);

        if (!$consulta_sql) {
            die("Error en la consulta" . mysqli_error($conexion));
        }

        if (mysqli_num_rows($consulta_sql) > 0) {
            echo "<div class='error'>Ya existe un usuario con ese correo</div>";
            echo "  <a class='volver' href='../index.php'>VOLVER</a>";
        } else {
            $sql_insert = "INSERT INTO pacientes (nombre_completo,edad,telefono,email,genero,seguro_medico) VALUES ('$nombre_completo','$edad','$telefono','$email','$genero','$seguro_medico')";
            $comprobar_insert = mysqli_query($conexion, $sql_insert);
            if (!$comprobar_insert) {
                die("Error al intentar insertar usuario" . mysqli_error($conexion));
            } else {
                echo "<div class='correcto'>Usuario ingresado con existo</div>";
                echo "  <a class='volver' href='../index.php'>VOLVER</a>";
            }
        }
    }
    mysqli_close($conexion);

    ?>
</body>

</html>