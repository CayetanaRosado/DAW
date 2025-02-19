<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEVELOPER SIN PANZA TRANSMITE CONFIANZA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 20em;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        a{
            text-decoration: none;
        }
        h1 {
            font-size: 4em;
            color: #333;
            margin-bottom: 2em;
        }
        .buttons-container {
            display: flex;
            justify-content: space-around;
            gap: 3em;
        }
        .btn {
            background-color: rgb(79, 87, 96);
            width: 12em;
            color: white;
            padding: 3em;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: rgb(136, 152, 170);
        }
        .btn:active {
            background-color: rgb(136, 152, 170);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>DEVELOPER SIN PANZA TRANSMITE CONFIANZA</h1>
        <div class="buttons-container">
            <!-- Enlaza con la página AltaFormulario.php -->
            <a href="vista/AltaFormulario.php" class="btn">ALTA</a>

            <!-- Enlaza con la página BajaFormulario.php -->
            <a href="vista/BajaFormulario.php" class="btn">BAJA</a>

            <!-- Enlaza con la página ModificadoFormulario.php -->
            <a href="vista/Modificar1Formulario.php" class="btn">MODIFICACIÓN</a>

            <!-- Enlaza con la página Informe.php -->
            <a href="vista/Informe.php" class="btn">INFORME</a>
        </div>
    </div>
</body>

</html>