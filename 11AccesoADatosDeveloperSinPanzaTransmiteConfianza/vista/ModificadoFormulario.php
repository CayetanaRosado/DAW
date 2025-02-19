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
        .fecha_nacimiento{
            width: 49.5em;
            padding-top: 0.8em;
            padding-bottom: 0.8em;
        }

        a {
            text-decoration: none;
        }

        .buttons-container {
            display: flex;
            align-items: center;
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

        .btn:hover {
            background-color: rgb(136, 152, 170);
        }
    </style>
</head>

<body>
    <h1>Bienvenido a developer sin panza transmite confianza</h1>
    <h2><i>MODIFICA TUS DATOS EN NUESTRA BASE DE DATOS</i></h2>
    <form action="../modelo/ModificaRegistros.php" method="POST">
        <p>
            <label for="Peso">Peso (kg):</label>
            <input type="number" name="peso" id="peso" min="30" max="300" placeholder="Ejemplo: 70" required>
        </p>
        <p>
            <label for="Altura">Altura (cm):</label>
            <input type="number" name="altura" id="altura" min="100" max="250" placeholder="Ejemplo: 175" required>
        </p>
        <p>
            <label for="FechaDeNacimiento">Fecha de Nacimiento:</label>
            <input class="fecha_nacimiento" type="date" name="fecha_nacimiento" id="fecha_nacimiento" min="1900-01-01" max="2025-01-02" required>
        </p>
        <p>
            <label for="Email">Email:</label>
            <input type="email" name="email" id="email" placeholder="ejemplo@correo.com" required>
        </p>
        <p>
            <label for="Sexo">Sexo:</label>
            <select name="sexo" id="sexo" required>
                <option value="">Selecciona tu sexo</option>
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
                <option value="Mujer embarazada">Mujer embarazada</option>
            </select>
        </p>
        <p>
            <label for="actividad_fisica">Actividad Física:</label>
            <select id="actividad_fisica" name="actividad_fisica" required>
                <option value="">Selecciona tu actividad física</option>
                <option value="Movilidad casi nula">Movilidad casi nula</option>
                <option value="Movilidad muy reducida">Movilidad muy reducida</option>
                <option value="Normal">Normal</option>
                <option value="Activa">Activa (1,5 a 2,5 h/sem.)</option>
                <option value="Muy activa">Muy activa (>2,5 h/sem.)</option>
                <option value="Deportista">Deportista</option>
            </select>
        </p>
        <p> 
            <label for="objetivo">Mi objetivo:</label>
            <select id="objetivo" name="objetivo" required>
                <option value="">Selecciona tu objetivo</option>
                <option value="Perder peso">Perder peso</option>
                <option value="Mejorar mi salud">Mejorar mi salud</option>
                <option value="Ganar peso/músculo">Ganar peso/músculo</option>
            </select>
        </p>
        <p>
            <label for="enfermedad">Enfermedad:</label>
            <select id="enfermedad" name="enfermedad" required>
                <option value="">Selecciona opción</option>
                <option value="Diabetes">Diabetes</option>
                <option value="Cardiovascular">Cardiovascular</option>
                <option value="Ninguna">Ninguna de la lista</option>
            </select>
        </p>
        <p>
            <label for="alimentacion">Alimentación:</label>
            <select id="alimentacion" name="alimentacion" required>
                <option value="">Selecciona una opción</option>
                <option value="Como de todo">Como de todo</option>
                <option value="Soy vegetariano">Soy vegetariano</option>
                <option value="No como carne ni pescado">No como carne ni pescado</option>
            </select>
        </p>
        <p>
            <label for="quieroPerder">Quiero perder:</label>
            <select id="quieroPerder" name="quieroPerder" required>
                <option value="">Selecciona opción</option>
                <option value="Más de 5 kilos/mes">Más de 5 kilos/mes</option>
                <option value="De 1 a 5 kilos/mes">De 1 a 5 kilos/mes</option>
                <option value="Lo que la dieta logre">Lo que la dieta logre</option>
            </select>
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