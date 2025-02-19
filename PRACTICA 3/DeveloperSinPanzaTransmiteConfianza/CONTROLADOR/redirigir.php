<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Redirigir según sexo</title>
    </head>
    <body>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recibir variables mediante POST
            $Sexo = isset($_POST["Sexo"]) ? $_POST["Sexo"] : "No proporcionado";
            $Altura = isset($_POST["Altura"]) ? $_POST["Altura"] : "No proporcionado";
            $Peso = isset($_POST["Peso"]) ? $_POST["Peso"] : "No proporcionado";
            $FechaDeNacimiento = isset($_POST["FechaDeNacimiento"]) ? $_POST["FechaDeNacimiento"] : "No proporcionado";
            $Email = isset($_POST["Email"]) ? $_POST["Email"] : "No proporcionado";
            $actividad_fisica = isset($_POST["actividad_fisica"]) ? $_POST["actividad_fisica"] : "No proporcionado";
            $objetivo = isset($_POST["objetivo"]) ? $_POST["objetivo"] : "No proporcionado";
            $enfermedad = isset($_POST["enfermedad"]) ? $_POST["enfermedad"] : "No proporcionado";
            $alimentacion = isset($_POST["alimentacion"]) ? $_POST["alimentacion"] : "No proporcionado";
            $quieroPerder = isset($_POST["quieroPerder"]) ? $_POST["quieroPerder"] : "No proporcionado";
        }

// Redirigir al formulario adecuado
        if ($Sexo === "Mujer" || $Sexo === "Mujer embarazada") {
            include("../VISTA/formularioMujer.php");
        } elseif ($Sexo === "Hombre") {
            include("../VISTA/formularioHombre.php");
        } else {
            echo "Sexo no válido.";
        }
        ?>
    </body>
</html>