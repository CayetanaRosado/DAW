<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
</head>
<style>
    /* Estilos generales */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f9;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #333;
    }

    .container {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 40px;
        text-align: center;
        max-width: 600px;
        width: 100%;
    }
   
    h1 {
        font-size: 28px;
        color: rgb(26, 42, 77);
        margin-bottom: 20px;
    }

    p {
        font-size: 16px;
        margin-bottom: 30px;
        color: #555;
    }
    .enviar {
            margin-left: 13em;
            padding: 1.5em 1em;
            width: 15em;
            background-color: rgb(3, 64, 111);
            color: white;
        }
    a {
        font-size: 30px;
        color: white;
        background-color: rgb(26, 42, 77);
        padding: 12px 25px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    a:hover {
        background-color: rgb(26, 42, 77);
    }

    .error-message {
        font-size: 2em;
        color: rgb(26, 42, 77);
        background-color: rgb(179, 196, 206);
        padding: 2em;
        border-radius: 5px;
    }
</style>

<body>
    <?php
     // Incluir archivo de conexión para poder hacer la conexion a la base de datos
    include "../controlador/Conexion.php";

    //Ahora establecemos la conexión mediante mysqli_connect
    $conexion = mysqli_connect($host, $usuario, $contraseña, $nombreBD);

    //Comprobamos que la conexión se ha establecido con existo
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Obtenemos los datos del formulario
    $fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    //comprobar que existe ya en la base de datos
    $sql_compruebo = "SELECT email From usuarios where email='$email' and fecha_nacimiento='$fecha_nacimiento'";

     // Ejecuta la consulta SQL y almacena el resultado en $resultado_compruebo.
    $resultado_compruebo = mysqli_query($conexion, $sql_compruebo);

    // Verificar si hubo un error al ejecutar la consulta sql_compruebo
    if (!$resultado_compruebo) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
    
    // Verificar si existe algun resultado de la consulta sql_compruebo
    if (mysqli_num_rows($resultado_compruebo) > 0) {
        // Si existe procedemos a eliminarlo
        $sql_delete = "DELETE FROM usuarios where email='$email'";
         //Comprobamos que la insección
         $result1 = mysqli_query($conexion, $sql_delete);
          //Confirmamos mediante un mensaje si la insercion ha sido exitosa
        if ($result1) {
            echo "
            <div class='container'>
                <h1>¡Usuario eliminado con exito!</h1>
                <p>Tu información ha sido eliminada correctamente.Esperamos regreses pronto.</p>
                <a href='../index'>VOLVER AL INICIO</a>
            </div>";
        } else {
            //o si no ha sido exitosa
            echo "<div class='error-message'>Error: " . $sql . "<br>" . mysqli_connect_error() . "</div>";
            
        }
    } else {
        //Si no existe, mandamos un error de que ese usuario no existe en nuestra BBDD
        echo "<div class='error-message'>
        No existe un registro con ese email o fecha de nacimiento
        <a href='../index'>VOLVER AL INICIO</a></div>
      </div>";


  
    }

    //Cerramos la conexión
    mysqli_close($conexion);
    ?>
</body>

</html>