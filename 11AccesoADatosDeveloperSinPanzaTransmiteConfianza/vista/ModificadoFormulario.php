<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formulario de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: rgb(227, 224, 224);
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: rgb(49, 58, 65);
            margin-bottom: 1px;
        }

        h2 {
            color: rgb(80, 99, 114);
        }

        label {
            display: block;
            margin: 0.5em;
            color: #333;
        }

        input,
        select,
        button {
            width: 40em;
            padding: 0.5em;
            font-size: 1em;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: rgb(179, 196, 206);
            color: gray;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: rgb(0, 115, 203);
        }

        .enviar {
            padding: 1em 1em;
            width: 40em;
            background-color: rgb(117, 139, 155);
            color: white;
        }

        .fecha_nacimiento {
            width: 49.5em;
            padding-top: 0.8em;
            padding-bottom: 0.8em;
        }

        a {
            font-size: 30px;
            color: white;
            background-color: rgb(26, 42, 77);
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-left: 1em;
        }


        .buttons-container {
            margin-left: -2.5em;
        }

        .btn {
            background-color: rgb(79, 87, 96);
            color: white;
            padding: 1em 1em;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            display: block;
        }

        .error-message {
            font-size: 2em;
            color: rgb(26, 42, 77);
            background-color: rgb(179, 196, 206);
            padding: 2em;
            border-radius: 5px;
            display: flex;
            margin-top: 15em;
        }

        .btn:hover {
            background-color: rgb(136, 152, 170);
        }
    </style>
</head>

<body>
    <?php
    include "../controlador/Conexion.php";

    $conexion = mysqli_connect($host, $usuario, $contraseña, $nombreBD);

    if (!$conexion) {
        die("Error de conexión: " .  mysqli_connect_error());
    }
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : '';

    $sql =  "SELECT * From usuarios where email='$email' and fecha_nacimiento='$fecha_nacimiento'";

    $consulta = mysqli_query($conexion, $sql);

    if (!$consulta) {
        die("Error en la consulta" . mysqli_error($conexion));
    }

    if (mysqli_num_rows($consulta) > 0) {
        $datos = mysqli_fetch_assoc($consulta);

        $peso = $datos['peso'] ?? '';
        $altura = $datos['altura'] ?? '';
        $fecha_nacimiento = $datos['fecha_nacimiento'] ?? '';
        $email = $datos['email'] ?? '';
        $sexo = $datos['sexo'] ?? '';
        $actividad_fisica = $datos['actividad_fisica'] ?? '';
        $objetivo = $datos['objetivo'] ?? '';
        $enfermedad = $datos['enfermedad'] ?? '';
        $alimentacion = $datos['alimentacion'] ?? '';
        $quieroPerder = $datos['quiero_perder'] ?? '';

    ?>
        <h1>Bienvenido a developer sin panza transmite confianza</h1>
        <h2><i>MODIFICA TUS DATOS EN NUESTRA BASE DE DATOS</i></h2>
        <form action="../modelo/ModificaRegistros.php" method="POST">
            <p>
                <label for="peso">Peso:</label>
                <input type="number" name="peso" value="<?php echo $peso; ?>" required>
            </p>
            <p>
                <label for="altura">Altura (cm):</label>
                <input type="number" name="altura" id="altura" value="<?php echo $altura; ?>" min="100" max="250" required>
            </p>
            <p>
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="fecha_nacimiento" value="<?php echo $fecha_nacimiento; ?>" min="1900-01-01" max="2025-01-02" required>
            </p>
            <p>
                <label for="Email">Email:</label>
                <input type="email" value="<?php echo $email ?>" name="email" id="email" required>
            </p>
            <p>
                <label for="Sexo">Sexo:</label>
                <select name="sexo" id="sexo" required>
                    <option value="">Selecciona tu sexo</option>
                    <option value="Hombre" <?php if ($sexo == 'Hombre') echo 'selected' ?>>Hombre</option>
                    <option value="Mujer" <?php if ($sexo == 'Mujer') echo 'selected' ?>>Mujer</option>
                    <option value="Mujer embarazada" <?php if ($sexo == 'Mujer embarazada') echo 'selected' ?>>Mujer embarazada</option>
                </select>
            </p>
            <p>
                <label for="actividad_fisica">Actividad Física:</label>
                <select id="actividad_fisica" name="actividad_fisica" required>
                    <option value="">Selecciona tu actividad física</option>
                    <option value="Movilidad casi nula" <?php if ($actividad_fisica == 'Movilidad casi nula') echo 'selected'; ?>>Movilidad casi nula</option>
                    <option value="Movilidad muy reducida" <?php if ($actividad_fisica == 'Movilidad muy reducida') echo 'selected'; ?>>Movilidad muy reducida</option>
                    <option value="Normal" <?php if ($actividad_fisica == 'Normal') echo 'selected'; ?>>Normal</option>
                    <option value="Activa" <?php if ($actividad_fisica == 'Activa') echo 'selected'; ?>>Activa (1,5 a 2,5 h/sem.)</option>
                    <option value="Muy activa" <?php if ($actividad_fisica == 'Muy activa') echo 'selected'; ?>>Muy activa (>2,5 h/sem.)</option>
                    <option value="Deportista" <?php if ($actividad_fisica == 'Deportista') echo 'selected'; ?>>Deportista</option>
                </select>
            </p>

            <p>
                <label for="objetivo">Mi objetivo:</label>
                <select id="objetivo" name="objetivo" required>
                    <option value="">Selecciona tu objetivo</option>
                    <option value="Perder peso" <?php if ($objetivo == 'Perder peso') echo 'selected'; ?>>Perder peso</option>
                    <option value="Mejorar mi salud" <?php if ($objetivo == 'Mejorar mi salud') echo 'selected'; ?>>Mejorar mi salud</option>
                    <option value="Ganar peso/músculo" <?php if ($objetivo == 'Ganar peso/músculo') echo 'selected'; ?>>Ganar peso/músculo</option>
                </select>
            </p>

            <p>
                <label for="enfermedad">Enfermedad:</label>
                <select id="enfermedad" name="enfermedad" required>
                    <option value="">Selecciona opción</option>
                    <option value="Diabetes" <?php if ($enfermedad == 'Diabetes') echo 'selected'; ?>>Diabetes</option>
                    <option value="Cardiovascular" <?php if ($enfermedad == 'Cardiovascular') echo 'selected'; ?>>Cardiovascular</option>
                    <option value="Ninguna" <?php if ($enfermedad == 'Ninguna') echo 'selected'; ?>>Ninguna de la lista</option>
                </select>
            </p>

            <p>
                <label for="alimentacion">Alimentación:</label>
                <select id="alimentacion" name="alimentacion" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Como de todo" <?php if ($alimentacion == 'Como de todo') echo 'selected'; ?>>Como de todo</option>
                    <option value="Soy vegetariano" <?php if ($alimentacion == 'Soy vegetariano') echo 'selected'; ?>>Soy vegetariano</option>
                    <option value="No como carne ni pescado" <?php if ($alimentacion == 'No como carne ni pescado') echo 'selected'; ?>>No como carne ni pescado</option>
                </select>
            </p>

            <p>
                <label for="quieroPerder">Quiero perder:</label>
                <select id="quieroPerder" name="quieroPerder" required>
                    <option value="">Selecciona opción</option>
                    <option value="Más de 5 kilos/mes" <?php if ($quieroPerder == 'Más de 5 kilos/mes') echo 'selected'; ?>>Más de 5 kilos/mes</option>
                    <option value="De 1 a 5 kilos/mes" <?php if ($quieroPerder == 'De 1 a 5 kilos/mes') echo 'selected'; ?>>De 1 a 5 kilos/mes</option>
                    <option value="Lo que la dieta logre" <?php if ($quieroPerder == 'Lo que la dieta logre') echo 'selected'; ?>>Lo que la dieta logre</option>
                </select>
            </p>

            <p>
                <input class="enviar" type="submit" value="Cambiar">
            </p>
        </form>
        <div class="buttons-container">
            <!-- Enlaza con la página index.php -->
            <a href="../Index.php" class="btn">VOLVER</a>
        </div>
    <?php
    } else {
        echo "<div class='error-message'>
        No existe un registro con ese email o fecha de nacimiento
        <a class='container' href='../index'>VOLVER AL INICIO</a>
            </div>";
    }


    mysqli_close($conexion);
    ?>






</body>

</html>