<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <STYLE>
            body {
                font-family: Arial, sans-serif;
                background:aliceblue;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items:center;

            }

        </STYLE>
    </head>
    <body>

        <h1><i>Bienvenido a developer sin panza transmite confianza</i></h1>
        <?php
        // Recibir todas las variables
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

        // Verificar y asignar variables específicas del formulario HOMBRE
        $medidaCintura1h = $_GET["medidaCintura1h"] ?? null;
        $medidaCintura2h = $_GET["medidaCintura2h"] ?? null;
        $medidaCintura3h = $_GET["medidaCintura3h"] ?? null;
        $medidaMuñeca1h = $_GET["medidaMuñeca1h"] ?? null;
        $medidaMuñeca2h = $_GET["medidaMuñeca2h"] ?? null;
        $medidaMuñeca3h = $_GET["medidaMuñeca3h"] ?? null;

        // Verificar y asignar variables específicas del formulario MUJER
        $medidaCadera1m = $_GET["medidaCadera1m"] ?? null;
        $medidaCadera2m = $_GET["medidaCadera2m"] ?? null;
        $medidaCadera3m = $_GET["medidaCadera3m"] ?? null;
        $medidaCintura1m = $_GET["medidaCintura1m"] ?? null;
        $medidaCintura2m = $_GET["medidaCintura2m"] ?? null;
        $medidaCintura3m = $_GET["medidaCintura3m"] ?? null;

        // Mostrar los datos
        echo "<h2><u>Datos Recibidos por el usuario</u></h2>";
        echo "Sexo: $Sexo<br>";
        echo "Altura: $Altura<br>";
        echo "Peso: $Peso<br>";
        echo "Fecha de Nacimiento: $FechaDeNacimiento<br>";
        echo "Email: $Email<br>";
        echo "Actividad Física: $actividad_fisica<br>";
        echo "Objetivo: $objetivo<br>";
        echo "Enfermedad: $enfermedad<br>";
        echo "Alimentación: $alimentacion<br>";
        echo "Quiero Perder: $quieroPerder<br>";

        //SI HAS ELEGIDO HOMBRE
        if ($Sexo === "Hombre") {
            require_once '../MODELO/tablaHombre.php';

            function promedioHombresCintura($medidaCintura1h, $medidaCintura2h, $medidaCintura3h) {
                return ($medidaCintura1h + $medidaCintura2h + $medidaCintura3h) / 3;
            }

            function promedioHombresMuñeca($medidaMuñeca1h, $medidaMuñeca2h, $medidaMuñeca3h) {
                return ($medidaMuñeca1h + $medidaMuñeca2h + $medidaMuñeca3h) / 3;
            }

            $promedioCinturaH = promedioHombresCintura($medidaCintura1h, $medidaCintura2h, $medidaCintura3h);
            $promedioCinturaH = floor($promedioCinturaH);
            $promedioMuñecaH = promedioHombresMuñeca($medidaMuñeca1h, $medidaMuñeca2h, $medidaMuñeca3h);
            $promedioMuñecaH = floor($promedioMuñecaH);

            //Se encarga de rellenar las claves(peso) que no estan disponibles en el array
            function rellenarClavesExternas($porcentajeHombre) {
                $ultimaClave = null;

                // Obtener el rango de claves externas (asegurando que están en orden)
                $clavesExternas = array_keys($porcentajeHombre);
                $min = min($clavesExternas);
                $max = max($clavesExternas);

                // Iterar por todas las claves posibles dentro del rango
                for ($clave = $min; $clave <= $max; $clave++) {
                    if (!array_key_exists($clave, $porcentajeHombre)) {
                        // Si la clave no existe, copiar el último subarray conocido
                        if ($ultimaClave !== null) {
                            $porcentajeHombre[$clave] = $porcentajeHombre[$ultimaClave];
                        }
                    } else {
                        // Actualizar la última clave conocida
                        $ultimaClave = $clave;
                    }
                }

                // Ordenar por claves después de rellenar
                ksort($porcentajeHombre);

                return $porcentajeHombre;
            }

            function obtenerValorAjustado($porcentajeHombre, $Peso, $constanteAHombre) {


                // Obtener todas las claves principales (pesos)
                $pesosDisponibles = array_keys($porcentajeHombre);

                // Ajustar el peso al mínimo o máximo disponible si está fuera de rango
                if ($Peso < min($pesosDisponibles)) {
                    $Peso = min($pesosDisponibles);
                } elseif ($Peso > max($pesosDisponibles)) {
                    $Peso = max($pesosDisponibles);
                }

                // Obtener el subarray correspondiente al peso ajustado
                $subarray = $porcentajeHombre[$Peso];

                // Ajustar la clave dentro del subarray
                $clavesSubarray = array_keys($subarray);
                if ($constanteAHombre < min($clavesSubarray)) {
                    // Si la clave está por debajo del rango, devolver el valor mínimo
                    return $subarray[min($clavesSubarray)];
                } elseif ($constanteAHombre > max($clavesSubarray)) {
                    // Si la clave está por encima del rango, devolver el valor máximo

                    return $subarray[max($clavesSubarray)];
                } else {
                    // Si la clave está dentro del rango pero no existe, tomar el valor menor inmediato
                    while (!array_key_exists($constanteAHombre, $subarray)) {
                        $constanteAHombre--;
                    }
                    return $subarray[$constanteAHombre];
                }
            }

            //Buscamos la constante que nos da, al restar la cintura menos la muñeca
            $constanteAHombre = $promedioCinturaH - $promedioMuñecaH;

            //Buscar en el array la constante a y b  de HOMBRE
            $porcentajeHombreAjustado = rellenarClavesExternas($porcentajeHombre);
            $porcGCHombre = obtenerValorAjustado($porcentajeHombreAjustado, $Peso, $constanteAHombre);

            echo "<h2><u>Datos específicos de HOMBRE:</u></h2>";

            echo "Tu porcentaje de Grasa Corportal es: $porcGCHombre <br>";
            $pesoGCHombre = $Peso * ($porcGCHombre / 100);
            $pesoGCHombre = round($pesoGCHombre, 2);
            echo "Tu peso de Grasa Corportal es: $pesoGCHombre <br>";
            $porcGMMHombre = 100 - $porcGCHombre;
            echo "Tu porcentaje de la masa muscular(magra)es: $porcGMMHombre <br>";
            $pesoGMMHombre = $Peso - $pesoGCHombre;
            echo "Tu peso de la masa muscular(magra)es: $pesoGMMHombre";
        }


        //Si se selecciona MUJER

        if ($Sexo === "Mujer" || $Sexo === "Mujer embarazada") {
            require_once '../MODELO/tablaMujer.php';

            function promedioMujeresCadera($medidaCadera1m, $medidaCadera2m, $medidaCadera3m) {
                return ($medidaCadera1m + $medidaCadera2m + $medidaCadera3m) / 3;
            }

            function promedioMujeresCintura() {
                return ($medidaCintura1m + $medidaCintura2m + $medidaCintura3m) / 3;
            }

            $promedioCaderaM = promedioMujeresCadera($medidaCadera1m, $medidaCadera2m, $medidaCadera3m);
            $promedioCaderaM = floor($promedioCaderaM);
            $promedioCinturaM = promedioMujeresCadera($medidaCintura1m, $medidaCintura2m, $medidaCintura3m);
            $promedioCinturaM = floor($promedioCinturaM);

            echo "<h2><u>Datos específicos de MUJER:</U></h2>";

            //Estamos sacando minimos y maximos de cadera del array de mujeres

            $limitesTablaMujerCadera = array_keys($caderasMujer);
            $minTablaMujerCadera = min($limitesTablaMujerCadera);
            $maxTablaMujerCadera = max($limitesTablaMujerCadera);

            if ($promedioCaderaM > $maxTablaMujerCadera) {
                $promedioCaderaM = $maxTablaMujerCadera;
            } else if ($promedioCaderaM < $minTablaMujerCadera) {
                $promedioCaderaM = $minTablaMujerCadera;
            }


            //Estamos sacando minimos y maximos de cintura del array de mujeres
            $limitesTablaMujerCintura = array_keys($cinturaMujer);
            $minTablaMujerCintura = min($limitesTablaMujerCintura);
            $maxTablaMujerCintura = max($limitesTablaMujerCintura);

            if ($promedioCinturaM > $maxTablaMujerCintura) {
                $promedioCinturaM = $maxTablaMujerCintura;
            } else if ($promedioCinturaM < $minTablaMujerCintura) {
                $promedioCinturaM = $minTablaMujerCintura;
            }


            //Estamos sacando minimos y maximos de altura del array de mujeres
            $limitesTablaMujerAltura = array_keys($alturaMujer);
            $minTablaMujerAltura = min($limitesTablaMujerAltura);
            $maxTablaMujerAltura = max($limitesTablaMujerAltura);

            if ($Altura > $maxTablaMujerAltura) {
                $Altura = $maxTablaMujerAltura;
            } else if ($Altura < $minTablaMujerAltura) {
                $Altura = $minTablaMujerAltura;
            }

            //buscar en el array la constante a, b y c de MUJER

            $constanteA = $caderasMujer[$promedioCaderaM];
            $constanteB = $cinturaMujer[$promedioCinturaM];
            $constanteC = $alturaMujer[$Altura];

            $porcGCMujer = ($constanteA + $constanteB) - $constanteC;
            $porcGCMujer = round($porcGCMujer, 2);
            echo "Tu porcentaje de Grasa Corportal es: $porcGCMujer <br>";
            $pesoGCMujer = $Peso * ($porcGCMujer / 100);
            $pesoGCMujer = round($pesoGCMujer, 2);
            echo "Tu peso de Grasa Corportal es: $pesoGCMujer <br>";
            $porcGMMujer = 100 - $porcGCMujer;
            echo "Tu porcentaje de la masa muscular(magra)es: $porcGMMujer <br>";
            $pesoGMMUJER = $Peso - $pesoGCMujer;
            echo "Tu peso de la masa muscular(magra)es: $pesoGMMUJER";
        }
        ?>

        <h2><u>Determinación índice de actividad física</u></h2>
        <?php
        switch ($actividad_fisica) {

            case "Movilidad casi nula":
                $iaf = 1.1;
                break;
            case "Movilidad muy reducida":
                $iaf = 1.32;
                break;
            case "Normal":
                $iaf = 1.54;
                break;
            case "Activa":
                $iaf = 1.76;
                break;
            case "Muy activa":
                $iaf = 1.98;
                break;
            case "Deportista":
                $iaf = 2.2;
                break;
            default:
                break;
        }

        $mesesEmbarazo = 0;
        if ($Sexo === "Mujer" || $Sexo === "Mujer embarazada") {
            $bloque = ($pesoGMMUJER * $iaf) / 7;
        } else if ($Sexo === "Hombre") {
            $bloque = ($pesoGMMHombre * $iaf) / 7;
        }

        $bloque = floor($bloque);
        echo "Tu bloque antes: " . $bloque . "<br>";
        if (($Sexo === "Mujer" || $Sexo === "Mujer embarazada" || $Sexo === "Hombre") && $bloque > 23) {
            $bloque = 23;
        }

        if (($Sexo === "Mujer" || $Sexo === "Mujer embarazada") && $bloque < 11 && $mesesEmbarazo <= 3) {
            $bloque = 11;
        } else if ($Sexo === "Hombre" && $bloque < 14) {
            $bloque = 14;
        } else if ($Sexo === "Mujer embarazada" && $mesesEmbarazo > 3) {
            $bloque += 3;
        }
        echo "El bloque despues de cambios y actual es: $bloque";
        ?>

        <h2><u>Índice de Masa Corporal</u></h2>

        <?php
        $alturaEnMetros = $Altura / 100;
        $imc = $Peso / pow($alturaEnMetros, 2);

        $imc_redondeado = round($imc, 1);
        echo "Tu índice de masa corporal (IMC) es: $imc_redondeado";
        ?>

        <h2><U>Interpretación del IMC</u></h2>

        <?php
        if ($imc_redondeado < 18) {
            echo "Tu peso es inferior al saludable.<br> Te recomendamos seguir
                          nuestro programa para ganar masa muscular y mejorar tu salud.";
        } else if ($imc_redondeado >= 18 & $imc_redondeado < 20) {
            echo "Tu peso se encuentra en la banda más baja del peso saludable.
                        Te recomendamos seguir nuestro programa para ganar masa muscular y
                        mejorar tu salud.";
        } else if ($imc_redondeado >= 20 & $imc_redondeado < 23) {
            echo "Enhorabuena. Tu peso es el óptimo. Te recomendamos seguir
                        nuestro programa para ganar masa muscular, perfeccionar algunas zonas de tu
                        cuerpo y mejorar tu salud.";
        } else if ($imc_redondeado >= 23 & $imc_redondeado < 25) {
            echo "Tu peso se encuentra en la banda alta del peso normal. Te
                        recomendamos seguir nuestro programa para reducir tu peso, ganar masa
                        muscular, perfeccionar algunas zonas de tu cuerpo y mejorar tu salud.";
        } else if ($imc_redondeado >= 25 & $imc_redondeado < 28) {
            echo "Tienes exceso de peso. Reducir tu peso es beneficioso para tu
                        salud y te permitirá encontrarte más ágil y conseguir un físico más juvenil.";
        } else if ($imc_redondeado >= 28 & $imc_redondeado < 30) {
            echo "Tienes exceso de peso. Reducir tu peso es necesario para tu
                        salud y te permitirá encontrarte más ágil y mejorar tu físico. Es el momento de
                        tomar medidas.";
        } else {
            echo "Tienes peso muy superior a lo aconsejable. Reducir tu peso es
                        necesario para tu salud y te permitirá encontrarte más ágil y mejorar tu físico.<br> Es
                        posible que hayas estado ganando peso de forma continuada últimamente. Es el
                        momento de tomar medidas.";
        }
        ?>

        <h2><u>Recomendaciones generales para la pérdida de peso</u></h2>

        <h3>Dependiendo de los objetivos del usuario, incluir un texto con recomendaciones generales para
            la pérdida de peso basado en los kilos que desea perder:</h3>
        <ul>
            <li><b> Menos de 5 kg:<br></b>
                "Puedes perder el peso que deseas en un mes aproximadamente siempre que tu
                cumplimiento de la dieta esté por encima de un 90%. <br>Cambiar tus hábitos de forma
                permanente te llevará unos 3-4 meses más."</li>
            <li><b> De 5 a 10 kg:<br></b>
                "Puedes perder el peso que deseas en 2-3 meses aproximadamente siempre que tu
                cumplimiento de la dieta esté por encima de un 90%.<br> Cambiar tus hábitos de forma
                permanente te llevará unos 3-4 meses más."</li>
            <li><b> De 11 a 15 kg:<br></b>
                "Puedes perder el peso que deseas en 4-5 meses aproximadamente siempre que tu
                cumplimiento de la dieta esté por encima de un 90%.<br> Cambiar tus hábitos de forma
                permanente te llevará unos 3-4 meses más."</li>
            <li><b> De 16 a 20 kg:<br></b>
                "Puedes perder el peso que deseas en 6-7 meses aproximadamente siempre que tu
                cumplimiento de la dieta esté por encima de un 90%. <br>En este tiempo habrás adquirido
                hábitos más saludables que te permitirán mantener tu nuevo peso."</li>
            <li><b> De 20 a 25 kg:<br></b>
                "Puedes perder el peso que deseas en un año aproximadamente siempre que tu
                cumplimiento de la dieta esté por encima de un 85%. <br>En este tiempo habrás adquirido
                hábitos más saludables que te permitirán mantener tu nuevo peso."</li>
            <li><b> Más de 25 kg:<br></b>
                "Puedes perder el peso que deseas en un plazo de entre 1-2 años aproximadamente
                siempre que tu cumplimiento de la dieta esté por encima de un 80%.<br> En este tiempo
                habrás adquirido hábitos más saludables que te permitirán mantener tu nuevo peso."</li>
        </ul>

        <H2><i>"Toma el control de tu salud ahora. Cada paso que des hacia un estilo de vida saludable
                marcará la diferencia."</i></H2>
<?php
// Captura el contenido generado
$contenidoHtml = ob_get_clean();

// Enviar el correo con lo que se acaba de generar
$destinatario = $Email;
$asunto = "Resumen personalizado de Developer Sin Panza";
$cabeceras = "MIME-Version: 1.0\r\n";
$cabeceras .= "Content-type: text/html; charset=UTF-8\r\n";
$cabeceras .= "From: cayetanarosado@hotmail.com\r\n";

mail($destinatario, $asunto, $contenidoHtml, $cabeceras);

// Muestra el contenido en el navegador también
echo $contenidoHtml;
?>
    </body>
</html>




