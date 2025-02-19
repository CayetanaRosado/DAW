<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario Mujer</title>
        <style>
            /* Estilo general */
            body {
                font-family: Arial, sans-serif;
                background:aliceblue;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }

            /* Contenedor del formulario */
            .container {
                width: 90%;
                max-width: 600px;
                background: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }

            /* Encabezado */
            h1 {
                text-align: center;
                font-size: 1.8em;
                color: black;
                margin-bottom: 20px;
            }
            /* Inputs y selects */
            label {
                display: block;
                margin-top: 10px;
                font-size: 1em;
                color: #333;
            }

            input, select, button {
                width: 35em;
                padding: 5px;
                font-size: 1em;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            button {
                background-color: #3498db;
                color: #fff;
                border: none;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            button:hover {
                background-color: #2980b9;
            }
        </style>
    </head>
    <body>
        <?php
// Verificar que los datos se hayan recibido por el método POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recibir todas las variables con POST
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
        } else {
            echo "No se ha recibido ningún dato del formulario.";
        }
        ?>

        <h1><i>Formulario Mujer</i></h1>
        <p>Con ayuda de la cinta métrica; mídete las caderas en su punto más
            ancho y la cintura a la altura del ombligo. <br>
            Es necesario que te mida la cintura en este punto y no en su parte más estrecha.Toma las medidas tres veces</p>

        <form action="saludoAlPosibleCliente.php" method="post">
            <h3>Introduzca las medidas de la cadera:</h3>
            <p><label for="medidaCadera1m">Primera medida de cadera:</label>
                <input type="number" name="medidaCadera1m" id="medidaCadera1m" required min="60" max="150" placeholder="Ejemplo: 90">
            </p>
            <p><label for="medidaCadera2m">Segunda medida de cadera:</label>
                <input type="number" name="medidaCadera2m" id="medidaCadera2m" required min="60" max="150" placeholder="Ejemplo: 95">
            </p>
            <p><label for="medidaCadera3m">Tercera medida de cadera:</label>
                <input type="number" name="medidaCadera3m" id="medidaCadera3m" required min="60" max="150" placeholder="Ejemplo: 92">
            </p>

            <!-- Introducción de medidas de la cintura -->
            <h3>Introduzca las medidas de la cintura:</h3>
            <p><label for="medidaCintura1m">Primera medida de cintura:</label>
                <input type="number" name="medidaCintura1m" id="medidaCintura1m" required min="50" max="150" placeholder="Ejemplo: 80">
            </p>
            <p><label for="medidaCintura2m">Segunda medida de cintura:</label>
                <input type="number" name="medidaCintura2m" id="medidaCintura2m" required min="50" max="150" placeholder="Ejemplo: 85">
            </p>
            <p><label for="medidaCintura3m">Tercera medida de cintura:</label>
                <input type="number" name="medidaCintura3m" id="medidaCintura3m" required min="50" max="150" placeholder="Ejemplo: 82">
            </p>
  


        <!-- Campos ocultos para los datos previos -->
        <input type="hidden" name="Sexo" value="<?php echo $Sexo ?>">
        <input type="hidden" name="Altura" value="<?php echo $Altura; ?>">
        <input type="hidden" name="Peso" value="<?php echo $Peso; ?>">
        <input type="hidden" name="FechaDeNacimiento" value="<?php echo $FechaDeNacimiento; ?>">
        <input type="hidden" name="Email" value="<?php echo $Email; ?>">
        <input type="hidden" name="actividad_fisica" value="<?php echo $actividad_fisica; ?>">
        <input type="hidden" name="objetivo" value="<?php echo $objetivo; ?>">
        <input type="hidden" name="enfermedad" value="<?php echo $enfermedad; ?>">
        <input type="hidden" name="alimentacion" value="<?php echo $alimentacion; ?>">
        <input type="hidden" name="quieroPerder" value="<?php echo $quieroPerder; ?>">

        <p><input type="submit" value="Enviar"></p>
    </form>
</body>
</html>




