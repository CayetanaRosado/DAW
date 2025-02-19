<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
        margin: 5px 0 10px 0;
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

        <h1><i>Formulario de Registro</i></h1>
        <P>Con ayuda de la cinta métrica, mídete el contorno de la cintura a
            la altura del ombligo.También mídete la muñeca justo <br>por encima de la articulación (toma la medida
de la mano que más utilices).Toma las medidas tres veces</p>

        <form action="saludoAlPosibleCliente.php" method="get">
            <?php
// Recibir variables directamente
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
            ?>

            <h3>Introduzca las medidas de la cintura:</h3>
            <p><label for="medidaCintura1h">Primera medida de cintura:</label>
                <input type="number" name="medidaCintura1h" id="medidaCintura1h" required></p>
            <p><label for="medidaCintura2h">Segunda medida de cintura:</label>
                <input type="number" name="medidaCintura2h" id="medidaCintura2h" required></p>
            <p><label for="medidaCintura3h">Tercera medida de cintura:</label>
                <input type="number" name="medidaCintura3h" id="medidaCintura3h" required></p>

            <h3>Introduzca las medidas de la muñeca:</h3>
            <p><label for="medidaMuñeca1h">Primera medida de muñeca:</label>
                <input type="number" name="medidaMuñeca1h" id="medidaMuñeca1h" required></p>
            <p><label for="medidaMuñeca2h">Segunda medida de muñeca:</label>
                <input type="number" name="medidaMuñeca2h" id="medidaMuñeca2h" required></p>
            <p><label for="medidaMuñeca3h">Tercera medida de muñeca:</label>
                <input type="number" name="medidaMuñeca3h" id="medidaMuñeca3h" required></p>
            
                <!-- Campos ocultos para los datos previos -->
            <input type="hidden" name="Sexo" value="<?php echo $Sexo; ?>">
            <input type="hidden" name="Altura" value="<?php echo $Altura; ?>">
            <input type="hidden" name="Peso" value="<?php echo $Peso; ?>">
            <input type="hidden" name="FechaDeNacimiento" value="<?php echo $FechaDeNacimiento; ?>">
            <input type="hidden" name="Email" value="<?php echo $Email; ?>">
            <input type="hidden" name="actividad_fisica" value="<?php echo $actividad_fisica; ?>">
            <input type="hidden" name="objetivo" value="<?php echo $objetivo; ?>">
            <input type="hidden" name="enfermedad" value="<?php echo $enfermedad; ?>">
            <input type="hidden" name="alimentacion" value="<?php echo $alimentacion; ?>">
            <input type="hidden" name="quieroPerder" value="<?php echo $quieroPerder; ?>">




            <p><input type="submit" value="enviar"></p>
        </form>
    </body>
</html>
