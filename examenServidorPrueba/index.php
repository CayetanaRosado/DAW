<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Centrar todo el contenido de la página */
        body {
            display: flex;
            justify-content: center; /* Centrado horizontal */
            align-items: center;     /* Centrado vertical */
            height: 100vh;           /* Asegura que ocupe toda la altura de la ventana */
            background-color: rgb(123, 171, 223); ; /* Fondo claro */
            flex-direction: column; /* Asegura que los elementos se apilen en columna */
        }

        /* Estilo del título */
        h1 {
            margin-top: 2em;
            text-align: center;
            font-size: 5em; /* Tamaño del título */
            color: white; /* Color del texto */
        }

        /* Contenedor que incluye el título y los botones */
        .containerPrincipal {
            margin-top: -4em;
            display: flex;
            flex-direction: column;  /* Los elementos se apilan en columna */
            align-items: center;     /* Centrar los elementos horizontalmente */
            justify-content: flex-start; /* Los elementos empiezan desde arriba */
            background-color: rgb(123, 171, 223);  /* Fondo azul */
            padding: 10em;
            border-radius: 10px;     /* Bordes redondeados */
            width: 60%;            /* Ancho fijo para los botones */
            box-sizing: border-box;  /* Incluye el padding en el cálculo del tamaño */
        }

        /* Estilo de los enlaces */
        a {
            text-decoration: none;
            color: white;
            display: block;  /* Los enlaces ocupan toda la fila */
            margin: 10px 0;  /* Espaciado entre los botones */
            width: 100%;     /* Los enlaces ocupan todo el ancho */
        }

        /* Estilo de los botones */
        .botones {
            display: block;
            border: solid 1px #0056b3; /* Borde más delgado */
            background-color: rgb(104, 171, 243); /* Color de fondo de los botones */
            padding: 3em;  /* Ajuste del tamaño de los botones */
            border-radius: 5px;
            text-align: center; /* Centra el texto del botón */
            transition: background-color 0.3s ease; /* Efecto al pasar el ratón */
        }

        /* Efecto al pasar el ratón por los botones */
        .botones:hover {
            background-color: rgb(82, 137, 207); /* Color de fondo cuando el ratón pasa sobre el botón */
        }
    </style>
</head>

<body>
    <?php
    echo "<h1>BASE DE DATOS DE CLINICA MEDICA</h1>";
    echo "<div class='containerPrincipal'>";
    echo "<a class='botones' href='Vista/FormularioAlta.php'>DAR DE ALTA DATOS PACIENTE</a>";
    echo "<a class='botones' href='Vista/Modificacion1.php'>MODIFICAR DATOS PACIENTE</a>";
    echo "<a class='botones' href='Vista/FormularioConsulta.php'>AÑADIR CITA</a>";
    echo "<a class='botones' href='Vista/EliminacionFormulario.php'>ELIMINAR DATOS PACIENTE</a>";
    echo "<a class='botones' href='Vista/Informe.php'>INFORME</a>";
    echo "</div>";
    ?>
</body>

</html>
