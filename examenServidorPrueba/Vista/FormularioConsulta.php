<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <h1>Crear una consulta</h1>
    <form action="../Modelo/crearConsulta.php" method="POST">
    <p>
            <label for="nombre_completo	">Nombre:</label>
            <input type="text" name="nombre_completo" id="nombre_completo" required>
        </p>
        <p>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email">
        </p>
        <p>
            <label for="tipo_consulta">Tipo de Consulta</label>
            <select name="tipo_consulta" id="tipo_consulta">
                <option value="" selected>Selecciona una opción</option>
                <option value="General">General</option>
                <option value="Especialista">Especialista</option>
                <option value="Urgencias">Urgencias</option>
                <option value="Seguimiento">Seguimiento</option>
            </select>
        </p>
        <p>
            <label for="fecha_consulta">Fecha de consulta</label>
            <input type="date" name="fecha_consulta" id="fecha_consulta">
        </p>
        <p>
            <input type="submit" value="ENVIAR">
        </p>
        <a class='volver' href="../index.php">VOLVER</a>
    </form>
</body>

</html>