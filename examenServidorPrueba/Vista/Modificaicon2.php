<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificacion de datos</title>
</head>
<style>
    body {

        margin: 20px;
        background-color: rgb(123, 171, 223); ; /* Fondo claro */

    }
    H1{
        display: flex;
        justify-content: center;
        color:white;
        padding-bottom:1em;
        font-size: 4em;
    }
    /* Estilo para el formulario */
    form {
        margin: 0 auto;
        width: 40em;
    }

    /* Estilo para los inputs y selects */
    input,
    select {
        width: 100%;
        padding: 1.5em;
        margin: 5px 0;
    }

    /* Estilo para el botón de enviar */
    input[type="submit"] {
        background-color: rgb(22, 86, 154); ; /* Fondo claro */
        color: white;
        border: none;
        cursor: pointer;
    }

    .volver {
        margin-top: 2em;
        background-color: rgb(77, 142, 212); ; /* Fondo claro */
        color: white;
        width: 10em;
        padding: 0.5em;
        text-decoration: none;
    }
</style>

<body>

    <?php
    include "../Controlador/conexionBBDD.php";
    $conexion = mysqli_connect($host, $usuario, $contraseña, $bbdd);

    if (mysqli_connect_errno()) {
        die("ERROR AL CONECTAR LA BBDD" . mysqli_connect_error());
    }

    $email = isset($_POST["email"]) ? $_POST["email"] : "";


    $sql = "SELECT telefono from pacientes where email = '$email'";
    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row=mysqli_fetch_array($result);
        $telefono = $row['telefono'];
    ?> <h1>Formulario Alta en Base de Datos</h1>
        <form action="../Modelo/ModificacionDatos.php" method="POST">
            <p>
                <label for="telefono">Telefono: </label>
                <input type="number" name="telefono" id="telefono" value="<?php echo $telefono?>" required>
            </p>
            <input type="hidden" name="email" value="<?php echo $email; ?>">

            <p>
                <input type="submit" name="enviar" value="ENVIAR">
            </p>
            <a class='volver' href="../index.php">VOLVER</a>
        </form>
    <?php
    } else {
        echo "<div class='error'>No existe el correo, por lo que no podemos modificar los datos</div>";
        echo "  <a class='volver' href='../index.php'>VOLVER</a>";
    }

    mysqli_close($conexion);

    ?>

</body>

</html>