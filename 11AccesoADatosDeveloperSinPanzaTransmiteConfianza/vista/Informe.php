<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        h2 {
            text-align: center;
            font-size: 2em;
        }
        a{
            text-decoration: none;
        }
        ol{
            font-size: 18px;
        }
        li{
            font-size: 0.9em;
        }
        .usuario {
            background-color: #fff;
            border: 1px solid #ddd;
            padding-left: 3em;
            padding-bottom: 1em;
            margin-bottom: 1.5em;
            border-radius: 5px;
        }

        .estadisticas {
            margin-top: 30px;
            background-color: rgb(199, 208, 214);
            padding: 2rem;
        }

        .estadisticas li {
            margin: 5px 0;
        }
        .enviar {
            margin-left: 13em;
            padding: 1.5em 1em;
            width: 15em;
            background-color: rgb(3, 64, 111);
            color: white;
        }
        .buttons-container {
            display: flex;
            justify-content: center;
            margin-top: 1em;
        }

        .btn {
            background-color: rgb(79, 87, 96);
            color: white;
            padding: 1em 2em;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            display: block;
        }

        .btn:hover {
            background-color: rgb(136, 152, 170);
        }
    </style>
</head>

<body>

    <?php
    // Incluir archivo de conexión para poder hacer la conexion a la base de datos
    include "../controlador/Conexion.php";

    // Establecemos la conexión con la base de datos
    $conexion = mysqli_connect($host, $usuario, $contraseña, $nombreBD);

    // Consulta SQL para obtener todos los registros de la tabla 'usuarios' 
    $sql = "SELECT * FROM usuarios";

    // Ejecuta la consulta SQL y almacena el resultado en $resultado.
    $resultado = mysqli_query($conexion, $sql);


    // Verificar si hubo un error al ejecutar la consulta sql
    if (!$resultado) {
        die("Error en la consulta SQL: " . mysqli_connect_error());
    }

    // Si hay resultados en la consulta
    if (mysqli_num_rows($resultado) > 0) {

        // Mostrar encabezado para el informe de usuarios
        echo "<h2>INFORME DE USUARIOS </h2>";
          echo "<ol>";
    
        // Recorrer los resultados del usuario obtenido mientras haya usuarios
        while ($fila = mysqli_fetch_assoc($resultado)) {

            /* Obtener los datos con validaciones que seria una doble validacion, ya que para dar de alta a un usuario
             hemos validado y no deberia haber ningun campo vacio */
            $peso = isset($fila['peso']) && is_numeric($fila['peso']) ? $fila['peso'] : 0;
            $altura = isset($fila['altura']) && is_numeric($fila['altura']) ? $fila['altura'] : 0;
            $fecha_nacimiento = isset($fila['fecha_nacimiento']) ? new DateTime($fila['fecha_nacimiento']) : null;
            $sexo = isset($fila['sexo']) ? strtolower($fila['sexo']) : '';
            $actividad_fisica = isset($fila['actividad_fisica']) ? $fila['actividad_fisica'] : '';
            $objetivo = isset($fila['objetivo']) ? $fila['objetivo'] : '';
            $email = (isset($fila['email']) ? $fila['email'] : 'No disponible');
            $fecha_nacimiento = ($fecha_nacimiento ? $fecha_nacimiento->format('d-m-Y') : 'No disponible');

            // Calcular IMC solo si los valores son válidos
            $imc = 0;
            if ($peso > 0 && $altura > 0) {
                $imc = $peso / pow($altura / 100, 2); // Asegurando que la altura esté en metros
            }

            $imc = number_format($imc, 2);

            // Mostrar los datos del usuario en un bloque
            echo "<div class='usuario'>";
            echo "<h3>Detalles del Usuario</h3>";
            echo "<li><strong>Email:</strong> " . $email . "</li>";
            echo "<ul>";
            echo "<li><strong>Peso (en kg):</strong> " . $peso . " kg</li>";
            echo "<li><strong>Altura (en cm):</strong> " . $altura . " cm</li>";
            echo "<li><strong>Fecha de nacimiento:</strong> " . $fecha_nacimiento . "</li>";
            echo "<li><strong>Sexo:</strong> " . $sexo . "</li>";
            echo "<li><strong>Actividad física:</strong> " . $actividad_fisica . "</li>";
            echo "<li><strong>Mi objetivo:</strong> " . $objetivo . "</li>";
            echo "</ul>";
            echo "<ol>";
           

            echo "</div>";
   
            // Contabilizar según género,imc y total de usuarios.
            $sql = " SELECT 
            (SELECT COUNT(*) FROM usuarios WHERE sexo = 'Hombre') AS total_hombres,
            (SELECT COUNT(*) FROM usuarios WHERE sexo IN ('Mujer', 'Mujer embarazada')) AS total_mujeres,
            (SELECT COUNT(*) FROM usuarios WHERE sexo = 'Mujer embarazada') AS total_mujeres_embarazadas,
            (SELECT AVG(TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())) FROM usuarios WHERE sexo = 'Hombre') AS promedio_edad_hombres,
            (SELECT AVG(TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())) FROM usuarios WHERE sexo IN ('Mujer', 'Mujer embarazada')) AS promedio_edad_mujeres,
            (SELECT AVG(peso / POW(altura / 100, 2)) FROM usuarios WHERE sexo = 'Hombre' AND altura > 0) AS promedio_imc_hombres,
            (SELECT AVG(peso / POW(altura / 100, 2)) FROM usuarios WHERE sexo IN ('Mujer', 'Mujer embarazada') AND altura > 0) AS promedio_imc_mujeres,
            (SELECT COUNT(*) FROM usuarios) AS total_usuarios";

            // Ejecuta la consulta SQL y almacena el resultado en $resultado.
            $result_check = mysqli_query($conexion, $sql);

            // Verificar si hubo un error al ejecutar la consulta sql
            if (!$result_check) {
                die("Error en la consulta: " . mysqli_error($conexion));
            }

            // Obtener los valores
            $row = mysqli_fetch_assoc($result_check);

            // Acceder a los valores obtenidos
            $total_hombres = $row['total_hombres'];
            $total_mujeres = $row['total_mujeres'];
            $total_mujeres_embarazadas = $row['total_mujeres_embarazadas'];
            $promedio_edad_hombres = number_format($row['promedio_edad_hombres'], 2);
            $promedio_edad_mujeres = number_format($row['promedio_edad_mujeres'], 2);
            $promedio_imc_hombres = number_format($row['promedio_imc_hombres'], 2);
            $promedio_imc_mujeres = number_format($row['promedio_imc_mujeres'], 2);
            $total_usuarios = $row['total_usuarios'];
        }
    }

    // Mostrar los resultados
    echo "<div class='estadisticas'>";
    echo "<h3>ESTADÍSTICAS GENERALES</h3>";
    echo "<ul>";
    echo "<li><strong>Total de hombres:</strong> $total_hombres</li>";
    echo "<li><strong>Total de mujeres:</strong> $total_mujeres</li>";
    echo "<strong>de las cuales mujeres embarazadas hay:</strong> $total_mujeres_embarazadas";
    echo "<li><strong>Promedio de edad de hombres:</strong> $promedio_edad_hombres años</li>";
    echo "<li><strong>Promedio de edad de mujeres:</strong> $promedio_edad_mujeres años</li>";
    echo "<li><strong>Promedio de IMC de hombres:</strong> $promedio_imc_hombres</li>";
    echo "<li><strong>Promedio de IMC de mujeres:</strong> $promedio_imc_mujeres</li>";
    echo "<li><strong>Total de usuarios:</strong> $total_usuarios</li>";
    echo "</ul>";
    echo "</div>";
    
    // Cerrar conexión
    mysqli_close($conexion);
    ?>
      <div class="buttons-container">
            <!-- Enlaza con la página index.php -->
            <a href="../Index.php" class="btn">VOLVER</a>
    </div>
</body>

</html>