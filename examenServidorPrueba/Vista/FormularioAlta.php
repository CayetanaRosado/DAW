<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Alta</title>
</head>
<style>
    body {

        margin: 20px;
        background-color: rgb(123, 171, 223); ; /* Fondo claro */

    }
    H1{
        display: flex;
        justify-content: center;
        color:white;
        padding-bottom:1em;
        font-size: 4em;
    }
    /* Estilo para el formulario */
    form {
        margin: 0 auto;
        width: 40em;
    }

    /* Estilo para los inputs y selects */
    input,
    select {
        width: 100%;
        padding: 1.5em;
        margin: 5px 0;
    }

    /* Estilo para el botón de enviar */
    input[type="submit"] {
        background-color: rgb(22, 86, 154); ; /* Fondo claro */
        color: white;
        border: none;
        cursor: pointer;
    }

    .volver {
        margin-top: 2em;
        background-color: rgb(77, 142, 212); ; /* Fondo claro */
        color: white;
        width: 10em;
        padding: 0.5em;
        text-decoration: none;
    }
</style>

<body>
    <h1>Formulario Alta en Base de Datos</h1>
    <form action="../Modelo/RegistrarUsuario.php" method="POST">
        <p>
            <label for="nombre_completo	">Nombre:</label>
            <input type="text" name="nombre_completo" id="nombre_completo" required>
        </p>
        <p>
            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" min="1" max="100" required>
        </p>
        <p>
            <label for="telefono">Telefono: </label>
            <input type="number" name="telefono" id="telefono" required>
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </p>
        <p>
            <label for="genero">Genero: </label>
            <select name="genero" id="genero">
                <option value="" selected>Seleccione una opcion</option>
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
                <option value="Otro">Otro</option>
            </select>
        </p>
        <p>
            <label for="seguro_medico">Seguro medico: </label>
            <select name="seguro_medico" id="seguro_medico">
                <option value="" selected>Seleccione una opcion</option>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </p>
        <p>
            <input type="submit" name="enviar" value="ENVIAR">
        </p>
        <a class='volver' href="../index.php">VOLVER</a>
    </form>
</body>

</html>