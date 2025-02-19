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
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: rgb(49, 58, 65);
            margin-bottom: 5px;
        }
        h2{
            color: rgb(80, 99, 114);
        }

        label {
            display: block;
            margin: 10px 0;
            color: #333;
        }

        input, select, button {
            width: 50em;
            padding: 1em;
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
            background-color: rgb(49, 58, 65);
        }

        a {
            text-decoration: none;
        }
        .enviar {
            padding: 1em 1em;
            width: 52em;
            background-color: rgb(117, 139, 155);
            color: white;
        }
        .fecha_nacimiento{
            width: 62em;
            padding-top: 1.2em;
            padding-bottom: 1.2em;
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
    <h1>Bienvenido a developer sin panza transmite confianza</h1>
    <h2><i>DATE DE BAJA EN NUESTRA BASE DE DATOS</i></h2>
    <form action="../modelo/EliminarRegistros.php" method="POST">
        <p>
            <label for="FechaDeNacimiento">Fecha de Nacimiento:</label>
            <input class="fecha_nacimiento" type="date" name="fecha_nacimiento" id="fecha_nacimiento" min="1900-01-01" max="2025-01-02" required>
        </p>
        <p>
            <label for="Email">Email:</label>
            <input type="email" name="email" id="email" placeholder="ejemplo@correo.com" required>
        </p>
        <p>
            <input class="enviar" type="submit" value="Enviar">
        </p>
    </form>
    <div class="buttons-container">
            <!-- Enlaza con la página index.php -->
            <a href="../Index.php" class="btn">VOLVER</a>
    </div>
</body>

</html>