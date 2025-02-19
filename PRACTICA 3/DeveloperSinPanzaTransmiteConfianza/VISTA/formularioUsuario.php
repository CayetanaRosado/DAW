<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario de Usuario</title>
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
                font-family:sans-serif;
                text-align: center;
                color: black;
                margin-bottom:5px;
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
                padding: 3px;
                font-size: 1em;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            button {
                background-color: #3498db;
                color: gray;
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
        <h1><i>Bienvenido a developer sin panza transmite confianza</i></h1>
        <form action="../CONTROLADOR/redirigir.php" method="post">

            <p>
                <label for="Peso">Peso (kg):</label>
                <input type="number" name="Peso" id="Peso" min="100" max="250">
            </p>

            <p><label for="Altura">Altura (cm):</label>
                <input type="number" name="Altura" id="Altura" required min="100" max="250" placeholder="Ejemplo: 175">
            </p>

            <p><label for="FechaDeNacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="FechaDeNacimiento" id="FechaDeNacimiento" required min="1900-01-01" max="2025-01-02">
            </p>

            <p><label for="Email">Email:</label>
                <input type="email" name="Email" id="Email" required placeholder="ejemplo@correo.com">
            </p>

            <p><label for="Sexo">Sexo:</label>
                <select name="Sexo" id="Sexo" required>
                    <option value="">Selecciona tu sexo</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="Mujer embarazada">Mujer embarazada</option>
                </select>
            </p>

            <p><label for="actividad_fisica">Actividad Física:</label>
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

            <p><label for="objetivo">Mi objetivo:</label>
                <select id="objetivo" name="objetivo" required>
                    <option value="">Selecciona tu objetivo</option>
                    <option value="Perder peso">Perder peso</option>
                    <option value="Mejorar salud">Mejorar mi salud</option>
                    <option value="Ganar musculo">Ganar peso/músculo</option>
                </select>
            </p>

            <p><label for="enfermedad">Enfermedad:</label>
                <select id="enfermedad" name="enfermedad" required>
                    <option value="">Selecciona opción</option>
                    <option value="Diabetes">Diabetes</option>
                    <option value="Cardiovascular">Cardiovascular</option> 
                    <option value="Ninguna">Ninguna de la lista</option>
                </select>
            </p>

            <p><label for="alimentacion">Alimentación:</label>
                <select id="alimentacion" name="alimentacion" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Como de todo">Como de todo</option>
                    <option value="Soy vegetariano">Soy vegetariano</option>
                    <option value="No como ni carne ni pescado">No como carne ni pescado</option>
                </select>
            </p>

            <p><label for="quieroPerder">Quiero perder:</label>
                <select id="quieroPerder" name="quieroPerder" required>
                    <option value="">Selecciona opción</option>
                    <option value="5 kilos">Más de 5 kilos/mes</option>
                    <option value="1 a 5kilos">De 1 a 5 kilos/mes</option>
                    <option value="Lo que la dieta logre">Lo que la dieta logre</option>
                </select>
            </p>

            <p><input type="submit" value="Enviar"></p>

        </form>
    </body>
</html>
