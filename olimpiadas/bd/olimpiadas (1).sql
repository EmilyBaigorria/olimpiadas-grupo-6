-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-09-2023 a las 19:10:32
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
-- Estructura de tabla para la tabla `codigo_secretaria`
--

CREATE TABLE `codigo_secretaria` (
  `id` int(11) NOT NULL,
  `codigo_secretaria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `codigo_secretaria`
--

INSERT INTO `codigo_secretaria` (`id`, `codigo_secretaria`) VALUES
(1, '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_medicos`
--

CREATE TABLE `datos_medicos` (
  `id` int(11) NOT NULL,
  `medico_asignado` varchar(50) NOT NULL,
  `observacion` text NOT NULL,
  `medicamentos` text NOT NULL,
  `dni` varchar(100) NOT NULL,
  `obra_social` enum('si','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_medicos`
--

INSERT INTO `datos_medicos` (`id`, `medico_asignado`, `observacion`, `medicamentos`, `dni`, `obra_social`) VALUES
(21, 'vir', 'dolor de cabeza', 'tafirolkhbg', '45767853', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_paciente`
--

CREATE TABLE `ficha_paciente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `sexo` enum('Masculino','Femenino','Prefiero no decirlo.') NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `area` enum('No solicitara esta area','URGENCIA','Cardiología','Cuidados intensivos','Digestivo','Hematología','Medicina interna','Nefrología','Neumología','Oncología','Pediatría/Neonatología','Rehabilitación','Anestesiología') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ficha_paciente`
--

INSERT INTO `ficha_paciente` (`id`, `nombre`, `apellido`, `sexo`, `telefono`, `localidad`, `direccion`, `fecha_nacimiento`, `area`) VALUES
(10, 'Emily ', 'Baigorria', 'Masculino', '3254254235', 'gdfg453', 'dsfdsad', '2023-09-08', 'Oncología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `dni` decimal(11,0) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `fecha_nacimiento` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `correo` varchar(100) NOT NULL,
  `genero` text NOT NULL,
  `domicilio` varchar(200) NOT NULL,
  `area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `dni`, `telefono`, `fecha_nacimiento`, `correo`, `genero`, `domicilio`, `area`) VALUES
(88, 'vir', '123', '756765', '2023-09-12 03:00:00', 'vdfvdfs@dsc', 'masculino', 'hjj', ''),
(89, 'kiu', '879', '3512950099', '2023-09-11 03:00:00', 'vdfvdfs@dsc', 'masculino', 'njhm', ''),
(90, 'vir', '36546', '3254254235', '2023-09-13 03:00:00', 'vdfvdfs@dsc', 'masculino', 'kuyk', ''),
(91, 'Emily Baigorria', '6456', '654', '2023-09-02 03:00:00', 'vdfvdfs@dsc', 'femenino', 'jhgj', 'jjtyj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_llamadas`
--

CREATE TABLE `registro_llamadas` (
  `id` int(11) NOT NULL,
  `tipo_llamada` enum('consulta','emergencia') NOT NULL,
  `area` enum('Anestesiologia','cardiologia','cuidados intensivos','hematologia','nefrologia','neumologia','pediatria','rehabilitacion','urgencia') NOT NULL,
  `nombre_paciente` varchar(50) NOT NULL,
  `fecha_hora_inicio` datetime NOT NULL,
  `fecha_hora_fin` datetime NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `duracion` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro_llamadas`
--

INSERT INTO `registro_llamadas` (`id`, `tipo_llamada`, `area`, `nombre_paciente`, `fecha_hora_inicio`, `fecha_hora_fin`, `motivo`, `duracion`) VALUES
(5, 'consulta', 'Anestesiologia', 'y54y', '2023-09-16 18:01:00', '2023-09-08 16:00:00', '5y4', 121),
(6, 'consulta', 'neumologia', 'vir', '2023-09-14 19:10:00', '2023-09-14 19:14:00', 'hrh', 4),
(7, 'emergencia', 'cardiologia', 'tret blj', '2023-09-21 21:10:00', '2023-09-21 21:17:00', 'cdscsd', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas_quirofano`
--

CREATE TABLE `reservas_quirofano` (
  `id` int(11) NOT NULL,
  `quirofano` enum('quirofano 1','quirofano 2','quirofano 3','quirofano 4','quirofano 5','quirofano 6','quirofano 7','quirofano 8') NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `motivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `codigo_secretaria`
--
ALTER TABLE `codigo_secretaria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos_medicos`
--
ALTER TABLE `datos_medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ficha_paciente`
--
ALTER TABLE `ficha_paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_llamadas`
--
ALTER TABLE `registro_llamadas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas_quirofano`
--
ALTER TABLE `reservas_quirofano`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `codigo_secretaria`
--
ALTER TABLE `codigo_secretaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `datos_medicos`
--
ALTER TABLE `datos_medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `ficha_paciente`
--
ALTER TABLE `ficha_paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `registro_llamadas`
--
ALTER TABLE `registro_llamadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reservas_quirofano`
--
ALTER TABLE `reservas_quirofano`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
