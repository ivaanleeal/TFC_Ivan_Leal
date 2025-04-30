-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2025 a las 11:52:40
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpcsi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `telefono` varchar(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` char(50) NOT NULL,
  `contrasena` char(191) NOT NULL,
  `privilegio` int(11) NOT NULL,
  `Whatsap` tinyint(1) DEFAULT NULL,
  `Llamar` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`telefono`, `nombre`, `apellido`, `usuario`, `contrasena`, `privilegio`, `Whatsap`, `Llamar`) VALUES
('600123456', 'Juan', 'Pérez', 'juancito', '$2a$12$zhclWgnrq1gK9Jug0kDfQeMC4RsBqvNHgNX/c8LrmSQCN1gA512zy', 0, 1, 0),
('600555333', 'Luis', 'Martínez', 'luisito', '$2a$12$zhclWgnrq1gK9Jug0kDfQeMC4RsBqvNHgNX/c8LrmSQCN1gA512zy', 0, 1, 1),
('600987654', 'Ana', 'García', 'anita', '$2a$12$zhclWgnrq1gK9Jug0kDfQeMC4RsBqvNHgNX/c8LrmSQCN1gA512zy', 0, 0, 1),
('666666666', 'Pelao', 'Loco', 'pelao', '$2y$10$OnIM3a2Uo3XfWbHVIid9h.HawKAc5Xyxbden91i/lrFyZwrf.XzXC', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `DNI` varchar(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`DNI`, `nombre`, `apellido`) VALUES
('12345678A', 'Carlos', 'Sánchez'),
('56789012C', 'Elena', 'González'),
('87654321B', 'María', 'López');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `SO` varchar(50) NOT NULL,
  `cliente_telefono` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `marca`, `modelo`, `SO`, `cliente_telefono`) VALUES
(1, 'Apple', 'iPhone 13', 'iOS', '600123456'),
(2, 'Samsung', 'Galaxy S22', 'Android', '600987654'),
(3, 'Xiaomi', 'Mi 11', 'Android', '600555333'),
(4, 'nnnbnb', 'nbnbnb', 'nbnbnb', '666666666');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `Nombre` char(50) NOT NULL DEFAULT '0',
  `Apellidos` char(100) NOT NULL DEFAULT '0',
  `Correo` char(100) NOT NULL DEFAULT '0',
  `Mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partes`
--

CREATE TABLE `partes` (
  `numero_parte` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `notas` text NOT NULL,
  `Seguimiento` varchar(50) DEFAULT NULL,
  `Recogido` tinyint(1) NOT NULL DEFAULT 0,
  `cliente_telefono` varchar(9) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `empleado_dni` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `partes`
--

INSERT INTO `partes` (`numero_parte`, `fecha`, `notas`, `Seguimiento`, `Recogido`, `cliente_telefono`, `id_equipo`, `empleado_dni`) VALUES
(1, '2025-02-21', 'El cliente reportó un problema de batería.', '120252021JLP', 0, '600123456', 1, '12345678A'),
(2, '2025-01-21', 'El dispositivo no enciende.', '123456LP', 1, '600123456', 2, '87654321B'),
(3, '2025-03-22', 'Problemas con la cámara trasera.', NULL, 1, '600123456', 3, '56789012C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piezas`
--

CREATE TABLE `piezas` (
  `codigo_pieza` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `piezas`
--

INSERT INTO `piezas` (`codigo_pieza`, `nombre`, `marca`, `modelo`) VALUES
('BAT001', 'Batería', 'Apple', 'iPhone 13'),
('CAM002', 'Cámara', 'Xiaomi', 'Mi 11'),
('CAR001', 'Cargador', 'Asus', 'Loco'),
('PCB003', 'Placa madre', 'Samsung', 'Galaxy S22'),
('RAM001', 'Ram', 'Kimston', '1587'),
('WIN10', 'Windows 10', 'Microsoft', '24H2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacion_parte`
--

CREATE TABLE `reparacion_parte` (
  `parte` int(11) NOT NULL,
  `tarea` int(11) NOT NULL,
  `pieza` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reparacion_parte`
--

INSERT INTO `reparacion_parte` (`parte`, `tarea`, `pieza`) VALUES
(1, 1, 'BAT001'),
(1, 2, 'CAR001'),
(1, 3, 'RAM001'),
(2, 1, 'PCB003'),
(2, 2, 'WIN10'),
(3, 1, 'CAM002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `numero_parte` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `tiempo` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `empleado_dni` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`numero_parte`, `id_tarea`, `descripcion`, `estado`, `tiempo`, `imagen`, `empleado_dni`) VALUES
(1, 1, 'Reemplazar batería', 1, 120, '/imagenes/bateria.png', '12345678A'),
(1, 2, 'Nuevo Cargador', 1, 0, NULL, '12345678A'),
(1, 3, 'Aumentada Memoria Ram', 0, 50, NULL, '12345678A'),
(2, 1, 'Diagnóstico de placa Base', 0, 240, '/imagenes/placa.png', '87654321B'),
(2, 2, 'Intalado Windows 10', 0, 400, NULL, '56789012C'),
(3, 1, 'Reparar cámara trasera', 0, 20, '/imagenes/camara.png', '56789012C');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`telefono`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `fk_equipos_clientes` (`cliente_telefono`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partes`
--
ALTER TABLE `partes`
  ADD PRIMARY KEY (`numero_parte`),
  ADD KEY `fk_partes_clientes` (`cliente_telefono`),
  ADD KEY `fk_partes_equipos` (`id_equipo`),
  ADD KEY `fk_partes_empleados` (`empleado_dni`);

--
-- Indices de la tabla `piezas`
--
ALTER TABLE `piezas`
  ADD PRIMARY KEY (`codigo_pieza`);

--
-- Indices de la tabla `reparacion_parte`
--
ALTER TABLE `reparacion_parte`
  ADD PRIMARY KEY (`parte`,`tarea`,`pieza`),
  ADD KEY `fk_reparacion_piezas` (`pieza`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`numero_parte`,`id_tarea`),
  ADD KEY `id_tarea` (`id_tarea`),
  ADD KEY `fk_tareas_empleados` (`empleado_dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partes`
--
ALTER TABLE `partes`
  MODIFY `numero_parte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `fk_equipos_clientes` FOREIGN KEY (`cliente_telefono`) REFERENCES `clientes` (`telefono`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `partes`
--
ALTER TABLE `partes`
  ADD CONSTRAINT `fk_partes_clientes` FOREIGN KEY (`cliente_telefono`) REFERENCES `clientes` (`telefono`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_partes_empleados` FOREIGN KEY (`empleado_dni`) REFERENCES `empleados` (`DNI`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_partes_equipos` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `reparacion_parte`
--
ALTER TABLE `reparacion_parte`
  ADD CONSTRAINT `fk_reparacion_piezas` FOREIGN KEY (`pieza`) REFERENCES `piezas` (`codigo_pieza`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reparacion_tareas` FOREIGN KEY (`parte`,`tarea`) REFERENCES `tareas` (`numero_parte`, `id_tarea`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `fk_tareas_empleados` FOREIGN KEY (`empleado_dni`) REFERENCES `empleados` (`DNI`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tareas_partes` FOREIGN KEY (`numero_parte`) REFERENCES `partes` (`numero_parte`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
