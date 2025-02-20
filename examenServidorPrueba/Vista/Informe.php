<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe</title>
</head>
<style>
        /* Estilos generales */
        body {
            margin: 0;
            padding: 0;
            background-color: rgb(104, 171, 243); /* Color de fondo de los botones */
        }

        h1 {
            text-align: center;
            background-color: rgb(72, 135, 203);  /* Fondo claro */
            color: white;
            padding: 20px;
            margin: 0;
            font-size: 3em;
            letter-spacing: 1px;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
        }
    
        /* Botón volver */
        .volver {
            display: inline-block;
            background-color:rgb(22, 86, 154);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .volver:hover {
            background-color: #2D6A74;
        }

        .container_volver {
            text-align: center;
            margin-top: 20px;
        }

        /* Responsive */
        @media (max-width: 600px) {
            h1 {
                font-size: 2em;
            }

            .card {
                padding: 15px;
            }
        }
    </style>

<body>
    <?php
    /*Porcentaje de pacientes por género. x
    Promedio de edad por tipo de consulta. x
    Número de pacientes con seguro médico. x
    Listado de pacientes que han tenido consultas de urgencias en el último año. x
    Consulta adicional: Muestra los pacientes mayores de 60 años que tienen seguro médico y han realizado una consulta de seguimiento. */
    include "../Controlador/conexionBBDD.php";

    $conexion = mysqli_connect($host, $usuario, $contraseña, $bbdd);

    if (!$conexion) {
        die("Error en la conexión" . mysqli_connect_error());
    }
    //Porcentaje de pacientes por género
    $sql = "SELECT (COUNT(*) / (SELECT COUNT(*) FROM pacientes)) * 100 AS porcentajeMujeres FROM pacientes WHERE genero = 'Mujer'";
    $sql1 = "SELECT (COUNT(*) / (SELECT COUNT(*) FROM pacientes)) * 100 AS porcentajeHombres FROM pacientes WHERE genero = 'Hombre'";
    $sql2 = "SELECT (COUNT(*) / (SELECT COUNT(*) FROM pacientes)) * 100 AS porcentajeOtro FROM pacientes WHERE genero = 'Otro'";
    //Número de pacientes con seguro médico.
    $sql3 = "SELECT COUNT(*) AS seguroSi FROM pacientes WHERE seguro_medico = 'Sí'";
    $sql4 = "SELECT COUNT(*) AS seguroNo FROM pacientes WHERE seguro_medico = 'No'";

    // Promedio de edad por tipo de consulta
    $sql5 = "SELECT AVG(pacientes.edad) AS mediaEdadGeneral FROM pacientes JOIN consultas ON pacientes.id = consultas.paciente_id WHERE consultas.tipo_consulta = 'General';";

    //Listado de pacientes que han tenido consultas de urgencias en el último año.
    $sql6 = "SELECT pacientes.nombre_completo AS pacientesUrgenciasEsteAño from pacientes JOIN consultas on pacientes.id= consultas.paciente_id where consultas.tipo_consulta = 'Urgencias' and  consultas.fecha_consulta < CURDATE()";

    // Muestra los pacientes mayores de 60 años que tienen seguro médico y han realizado una consulta de seguimiento. Muestra los pacientes mayores de 60 años que tienen seguro médico y han realizado una consulta de seguimiento.
    $sql7 = "SELECT pacientes.nombre_completo AS mayor60SeguroSeguimiento from pacientes join consultas on pacientes.id=consultas.paciente_id where pacientes.edad > 60 and pacientes.seguro_medico = 'Sí' and consultas.tipo_consulta = 'Seguimiento'";


    /*Listado completo de pacientes y sus consultas con un JOIN, mostrando:
        Nombre completo
        Email
        Tipo de consulta
        Fecha de consulta*/
    $sql8 = "SELECT pacientes.nombre_completo, pacientes.email,consultas.tipo_consulta,consultas.fecha_consulta  FROM pacientes join consultas on consultas.paciente_id = pacientes.id";

    $result = mysqli_query($conexion, $sql);
    $result1 = mysqli_query($conexion, query: $sql1);
    $result2 = mysqli_query($conexion, query: $sql2);
    $result3 = mysqli_query($conexion, query: $sql3);
    $result4 = mysqli_query($conexion, query: $sql4);
    $result5 = mysqli_query($conexion, query: $sql5);
    $result6 = mysqli_query($conexion, query: $sql6);
    $result7 = mysqli_query($conexion, query: $sql7);
    $result8 = mysqli_query($conexion, query: $sql8);
    if (!$result || !$result1 || !$result2 || !$result3 || !$result4 || !$result5 || !$result6 || !$result7 || !$result8) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }


    echo "<ul>";
    $row = mysqli_fetch_assoc($result);
    $porcentajeMujeres = $row["porcentajeMujeres"];
    echo "<li>El promedio de pacientes mujeres es: " .  round($porcentajeMujeres) . "%</li>";

    $row1 = mysqli_fetch_assoc($result1);
    $porcentajeHombres = $row1["porcentajeHombres"];
    echo "<li>El promedio de pacientes hombres es: " . round($porcentajeHombres) . "%</li>";

    $row2 = mysqli_fetch_assoc($result2);
    $porcentajeOtro = $row2["porcentajeOtro"];
    echo "<li>El promedio de pacientes otro es: " . round($porcentajeOtro) . "%</li>";
    
    $row3 = mysqli_fetch_assoc($result3);
    $numeroSeguroSi =  $row3["seguroSi"];
    echo "<li>El numero de pacientes CON seguro es: " . $numeroSeguroSi . "</li>";


    $row4 = mysqli_fetch_assoc($result4);
    $numeroSeguroNo =  $row4["seguroNo"];
    echo "<li>El numero de pacientes SIN seguro es: " . $numeroSeguroNo . "</li>";

   
    
    if(mysqli_num_rows($result5)<=0){
        echo "<li>La media de edad de las consultas en General es: 0</li>";
    }else{
        $row5 = mysqli_fetch_assoc($result5);
        $mediaEdadGeneral =  $row5["mediaEdadGeneral"];
        echo "<li>La media de edad de las consultas en General es: " . round($mediaEdadGeneral) . "</li>";
    };



    if(mysqli_num_rows($result6)<=0){
        echo "<li>No hay datos de pacientes que han tenido consultas de urgencias en el último año</li>";
    }else{
        echo "<li>Pacientes que han tenido consultas de urgencias en el último año: </li>";
        while ($row6 = mysqli_fetch_assoc($result6)) {
            $pacientesUrgenciasEsteAño =  $row6["pacientesUrgenciasEsteAño"];
            echo "$pacientesUrgenciasEsteAño";
        }
    };



    echo "<li>Pacientes mayores de 60 años que tienen seguro médico y han realizado una consulta de seguimiento: </li>";
    while ($row7 = mysqli_fetch_assoc($result7)) {
        $mayor60SeguroSeguimiento =  $row7["mayor60SeguroSeguimiento"];
        echo "$mayor60SeguroSeguimiento";
    }

    echo "<li>Datos de los pacientes y sus consultas: </li>";
    echo "<hr>";
    while ($row8 = mysqli_fetch_assoc($result8)) {
        echo "Nombre: " . $row8["nombre_completo"] . "<br>";
        echo "Email: " . $row8["email"] . "<br>";
        echo "Tipo de consulta: " . $row8["tipo_consulta"] . "<br>";
        echo "Fecha de consulta: " . $row8["fecha_consulta"] . "<hr>";
    }
    echo "</ul>";



    mysqli_close($conexion);
    ?>
    <div class="container_volver">
        <a class='volver' href="../index.php">VOLVER</a>
    </div>


</body>

</html>