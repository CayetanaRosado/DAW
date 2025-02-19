<?php
// Recibir variables
$Sexo = $_GET["Sexo"];
$Altura = $_GET["Altura"];
$Peso = $_GET["Peso"];
$FechaDeNacimiento = $_GET["FechaDeNacimiento"];
$Email = $_GET["Email"];
$actividad_fisica = $_GET["actividad_fisica"];
$objetivo = $_GET["objetivo"];
$enfermedad = $_GET["enfermedad"];
$alimentacion = $_GET["alimentacion"];
$quieroPerder = $_GET["quieroPerder"];

// Redirigir al formulario adecuado
if ($Sexo === "Mujer" || $Sexo === "Mujer embarazada") {
    include("../VISTA/formularioMujer.php");
} elseif ($Sexo === "Hombre") {
    include("../VISTA/formularioHombre.php");
} else {
    echo "Sexo no válido.";
}
?>
