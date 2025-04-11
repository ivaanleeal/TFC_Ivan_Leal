-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql309.infinityfree.com
-- Tiempo de generación: 11-04-2025 a las 04:34:45
-- Versión del servidor: 10.6.19-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `if0_38148262_tpcsi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clientes`
--

CREATE TABLE `Clientes` (
  `telefono` varchar(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `Whatsap` tinyint(1) DEFAULT NULL,
  `Llamar` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `Clientes`
--

INSERT INTO `Clientes` (`telefono`, `nombre`, `apellido`, `Whatsap`, `Llamar`) VALUES
('600123456', 'Juan', 'Pérez', 1, 0),
('600987654', 'Ana', 'García', 0, 1),
('600555333', 'Luis', 'Martínez', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empleados`
--

CREATE TABLE `Empleados` (
  `DNI` varchar(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `Empleados`
--

INSERT INTO `Empleados` (`DNI`, `nombre`, `apellido`) VALUES
('12345678A', 'Carlos', 'Sánchez'),
('87654321B', 'María', 'López'),
('56789012C', 'Elena', 'González');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Equipos`
--

CREATE TABLE `Equipos` (
  `id_equipo` int(11) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `SO` varchar(50) NOT NULL,
  `cliente_telefono` varchar(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `Equipos`
--

INSERT INTO `Equipos` (`id_equipo`, `marca`, `modelo`, `SO`, `cliente_telefono`) VALUES
(1, 'Apple', 'iPhone 13', 'iOS', '600123456'),
(2, 'Samsung', 'Galaxy S22', 'Android', '600987654'),
(3, 'Xiaomi', 'Mi 11', 'Android', '600555333');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Partes`
--

CREATE TABLE `Partes` (
  `numero_parte` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `notas` text NOT NULL,
  `cliente_telefono` varchar(9) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `empleado_dni` varchar(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `Partes`
--

INSERT INTO `Partes` (`numero_parte`, `fecha`, `notas`, `cliente_telefono`, `id_equipo`, `empleado_dni`) VALUES
(1, '2025-01-20', 'El cliente reportó un problema de batería.', '600123456', 1, '12345678A'),
(2, '2025-01-21', 'El dispositivo no enciende.', '600987654', 2, '87654321B'),
(3, '2025-01-22', 'Problemas con la cámara trasera.', '600555333', 3, '56789012C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Piezas`
--

CREATE TABLE `Piezas` (
  `codigo_pieza` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `Piezas`
--

INSERT INTO `Piezas` (`codigo_pieza`, `nombre`, `marca`, `modelo`) VALUES
('BAT001', 'Batería', 'Apple', 'iPhone 13'),
('CAM002', 'Cámara', 'Xiaomi', 'Mi 11'),
('PCB003', 'Placa madre', 'Samsung', 'Galaxy S22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reparacion_Parte`
--

CREATE TABLE `Reparacion_Parte` (
  `parte` int(11) NOT NULL,
  `tarea` int(11) NOT NULL,
  `pieza` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `Reparacion_Parte`
--

INSERT INTO `Reparacion_Parte` (`parte`, `tarea`, `pieza`) VALUES
(1, 1, 'BAT001'),
(2, 2, 'PCB003'),
(3, 3, 'CAM002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tareas`
--

CREATE TABLE `Tareas` (
  `numero_parte` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(30) NOT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `empleado_dni` varchar(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `Tareas`
--

INSERT INTO `Tareas` (`numero_parte`, `id_tarea`, `descripcion`, `estado`, `tiempo`, `imagen`, `empleado_dni`) VALUES
(1, 1, 'Reemplazar batería', 'En progreso', 120, '/imagenes/bateria.png', '12345678A'),
(2, 1, 'Diagnóstico de placa madre', 'Completado', 240, '/imagenes/placa.png', '87654321B'),
(3, 1, 'Reparar cámara trasera', 'Pendiente', NULL, '/imagenes/camara.png', '56789012C');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`telefono`);

--
-- Indices de la tabla `Empleados`
--
ALTER TABLE `Empleados`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `Equipos`
--
ALTER TABLE `Equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `cliente_telefono` (`cliente_telefono`);

--
-- Indices de la tabla `Partes`
--
ALTER TABLE `Partes`
  ADD PRIMARY KEY (`numero_parte`),
  ADD KEY `cliente_telefono` (`cliente_telefono`),
  ADD KEY `id_equipo` (`id_equipo`),
  ADD KEY `empleado_dni` (`empleado_dni`);

--
-- Indices de la tabla `Piezas`
--
ALTER TABLE `Piezas`
  ADD PRIMARY KEY (`codigo_pieza`);

--
-- Indices de la tabla `Reparacion_Parte`
--
ALTER TABLE `Reparacion_Parte`
  ADD PRIMARY KEY (`parte`,`tarea`,`pieza`),
  ADD KEY `pieza` (`pieza`);

--
-- Indices de la tabla `Tareas`
--
ALTER TABLE `Tareas`
  ADD PRIMARY KEY (`numero_parte`,`id_tarea`),
  ADD KEY `empleado_dni` (`empleado_dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Equipos`
--
ALTER TABLE `Equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Partes`
--
ALTER TABLE `Partes`
  MODIFY `numero_parte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Tareas`
--
ALTER TABLE `Tareas`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
