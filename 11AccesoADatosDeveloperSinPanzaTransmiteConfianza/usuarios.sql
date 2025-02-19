-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2025 a las 19:21:34
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `leads`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `peso` decimal(5,2) NOT NULL,
  `altura` decimal(5,2) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `sexo` enum('Mujer','Mujer embarazada','Hombre') NOT NULL,
  `actividad_fisica` enum('Movilidad casi nula','Movilidad muy reducida','Normal','Activa','Muy activa','Deportista') NOT NULL,
  `objetivo` enum('Perder peso','Mejorar mi salud','Ganar peso/músculo') NOT NULL,
  `enfermedad` enum('Diabetes','Cardiovascular','Ninguna') NOT NULL,
  `alimentacion` enum('Como de todo','Soy vegetariano','No como carne ni pescado') NOT NULL,
  `quiero_perder` enum('Más de 5 kilos/mes','De 1 a 5 kilos/mes','Lo que la dieta logre') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `peso`, `altura`, `fecha_nacimiento`, `email`, `sexo`, `actividad_fisica`, `objetivo`, `enfermedad`, `alimentacion`, `quiero_perder`) VALUES
(14, 85.00, 180.00, '1994-10-01', 'luisamayajimenez22@gmail.com', 'Hombre', 'Deportista', 'Ganar peso/músculo', 'Diabetes', 'Soy vegetariano', 'Más de 5 kilos/mes'),
(16, 82.00, 178.00, '2000-02-04', 'antonioMonzo@gmail.es', 'Hombre', 'Muy activa', 'Mejorar mi salud', 'Ninguna', 'Como de todo', 'Lo que la dieta logre'),
(17, 67.00, 165.00, '1995-01-11', 'cayetanarosadog@gmail.com', 'Mujer', 'Normal', 'Perder peso', 'Cardiovascular', 'No como carne ni pescado', 'De 1 a 5 kilos/mes'),
(18, 63.00, 174.00, '1997-11-15', 'mariamgamero@hotmail.es', 'Mujer embarazada', 'Movilidad muy reducida', 'Perder peso', 'Ninguna', 'Como de todo', 'Lo que la dieta logre'),
(19, 90.00, 184.00, '1989-06-17', 'miguelcampano@gmail.com', 'Hombre', 'Movilidad casi nula', 'Mejorar mi salud', 'Diabetes', 'Como de todo', 'De 1 a 5 kilos/mes'),
(20, 58.00, 158.00, '2002-01-10', 'lilianamartinez@hotmail.com', 'Mujer embarazada', 'Activa', 'Ganar peso/músculo', 'Ninguna', 'No como carne ni pescado', 'Más de 5 kilos/mes'),
(48, 45.00, 150.00, '1975-12-10', 'rocioLastro@yahoo.es', 'Mujer', 'Movilidad casi nula', 'Perder peso', 'Diabetes', 'Como de todo', 'Lo que la dieta logre'),
(49, 130.00, 166.00, '2010-05-01', 'franciscojose@outlook.es', 'Hombre', 'Movilidad casi nula', 'Perder peso', 'Diabetes', 'Como de todo', 'Más de 5 kilos/mes'),
(57, 180.00, 190.00, '1999-03-11', 'sebastiangrijalb@gmail.com', 'Hombre', 'Movilidad muy reducida', 'Perder peso', 'Diabetes', 'Soy vegetariano', 'De 1 a 5 kilos/mes'),
(72, 74.00, 145.00, '1955-01-11', 'elisaortega@yahoo.es', 'Mujer', 'Deportista', 'Mejorar mi salud', 'Cardiovascular', 'No como carne ni pescado', 'Lo que la dieta logre');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
