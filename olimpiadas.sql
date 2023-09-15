-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-09-2023 a las 23:19:02
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `olimpiadas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_paciente`
--

CREATE TABLE `ficha_paciente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `sexo` enum('Femenino','Masculino','Prefiero no decirlo') NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `medico_asignado` varchar(50) NOT NULL,
  `enfermedades` text NOT NULL,
  `medicamentos` text NOT NULL,
  `obra_social` enum('si','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ficha_paciente`
--

INSERT INTO `ficha_paciente` (`id`, `nombre`, `apellido`, `sexo`, `telefono`, `localidad`, `direccion`, `fecha_nacimiento`, `medico_asignado`, `enfermedades`, `medicamentos`, `obra_social`) VALUES
(1, 'marina', 'vaca', 'Femenino', '3513872015', '', 'mariano moreno', '2023-09-04', '', 'diabetes', 'tafirol', 'si'),
(2, 'marina', 'vaca', 'Femenino', '3513872015', '', 'mariano moreno', '2023-09-04', '', 'diabetes', 'tafirol', 'si'),
(3, 'marina', 'vaca', 'Femenino', '3513872015', '', 'mariano moreno', '2023-09-04', '', 'diabetes', 'tafirol', 'si'),
(4, 'erika', 'lucero', 'Femenino', '315342', 'monte cristo', 'shhsdhs', '2004-11-27', 'guada', 'nose', 'tafirol', 'si'),
(5, 'erika', 'lucero', 'Femenino', '315342', 'monte cristo', 'shhsdhs', '2004-11-27', 'guada', 'nose', 'tafirol', 'si'),
(6, 'erika', 'lucero', 'Femenino', '315342', 'monte cristo', 'shhsdhs', '2004-11-27', 'guada', 'nose', 'tafirol', 'si'),
(7, 'erika', 'lucero', 'Femenino', '315342', 'monte cristo', 'shhsdhs', '2004-11-27', 'guada', 'nose', 'tafirol', 'si'),
(8, 'erika', 'lucero', 'Femenino', '315342', 'monte cristo', 'shhsdhs', '2004-11-27', 'guada', 'nose', 'tafirol', 'si'),
(9, 'erika', 'lucero', 'Femenino', '315342', 'monte cristo', 'shhsdhs', '2004-11-27', 'guada', 'nose', 'tafirol', 'si'),
(10, 'erika', 'lucero', 'Femenino', '315342', 'monte cristo', 'shhsdhs', '2004-11-27', 'guada', 'nose', 'tafirol', 'si');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ficha_paciente`
--
ALTER TABLE `ficha_paciente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ficha_paciente`
--
ALTER TABLE `ficha_paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
