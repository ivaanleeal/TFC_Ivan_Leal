-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql309.infinityfree.com
-- Tiempo de generación: 12-06-2025 a las 13:44:43
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
('604006063', 'Iván', 'Leal López', 'ivaanleeal', '$2a$12$zhclWgnrq1gK9Jug0kDfQeMC4RsBqvNHgNX/c8LrmSQCN1gA512zy', 1, 0, 0),
('630032877', 'Tino', 'García Ulla', 'tino', '$2y$10$Q5H5v7I.UaXsBIUex32zDea4bEgVJxzFTDwtVnA4nW73O33jdsODi', 0, 0, 0),
('639328417', 'Marta', 'Iglesias Gómez', 'marta', '$2y$10$Ut8QhvkIL/AHO/E0XsoXVe6I01OY0HwJqw1jNGaaVHgXaAsbaq/rC', 0, 0, 0),
('652102871', 'Eva', 'Naveira Domínguez', 'evan', '$2y$12$dK8IeobzfhroiQfru7i3w.5PgZI/DXqpaAWwJwg2UYQdvnMuEW6qm', 0, 0, 0),
('658915214', 'Víctor Alfredo', 'Pascual Vázquez', 'victor', '$2y$10$JL9UaP3mnDNQ9NPslt9Ug.jpVG2Sa.QMOmNDOIXxtNqIWlQL7fdji', 0, 0, 0),
('665235562', 'Fernando', 'Prado Espiñeira', 'fernando', '$2a$12$zhclWgnrq1gK9Jug0kDfQeMC4RsBqvNHgNX/c8LrmSQCN1gA512zy', 0, 0, 0);

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
('52014755L', 'Enrique', 'Giménez Martínez '),
('54156987F', 'Mario', 'García Carro'),
('58741369N', 'Fiz', 'Sar López');

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
(5, 'DELL', 'OPTIPLEX', 'WindowsXP', '665235562'),
(6, 'ASSUS', 'NITRA', 'Windows11', '652102871'),
(7, 'SAMSUNG', 'IMPREZA', 'Windows10', '658915214'),
(8, 'IBM', 'PEGAUS', 'Windows98', '630032877'),
(9, 'HP', 'LANCER EVO', 'Windows95', '639328417');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `Nombre` char(50) NOT NULL DEFAULT '0',
  `Apellidos` char(100) NOT NULL DEFAULT '0',
  `Correo` char(100) NOT NULL DEFAULT '0',
  `Mensaje` text NOT NULL,
  `Visto` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partes`
--

CREATE TABLE `partes` (
  `numero_parte` int(11) NOT NULL,
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
(7, '2025-06-12', 'El cliente reporta ruidos extraños', '123456FPE', 0, '665235562', 5, '58741369N'),
(9, '2025-06-12', 'Se apaga derrepente', '123456END', 0, '652102871', 6, '54156987F'),
(10, '2025-06-12', 'Ordenador funciona muy lento', '123456VPV', 0, '658915214', 7, '52014755L'),
(11, '2025-06-12', 'No le abre steam', '123456TGU', 0, '630032877', 8, '58741369N'),
(12, '2025-06-12', 'Virus detectado', '123456MIG', 0, '639328417', 9, '52014755L');

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
('ACS111', 'Actualización', 'Aplicación', 'Steam'),
('DDS111', 'Disco Duro SSD', 'Kimstong', 'Full 500 GB'),
('EVP111', 'Eliminado', 'Virus', 'PC'),
('LDV111', 'Limpieza', 'Ventilador / Disipador', 'Manual'),
('VCG111', 'Ventilador', 'ASSUS', 'Let200');

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
(7, 1, 'VCG111'),
(9, 1, 'LDV111'),
(10, 1, 'DDS111'),
(11, 1, 'ACS111'),
(12, 1, 'EVP111');

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
(7, 1, 'Quitado Ventilador estropeado', 0, 5, '..\\imagenesSubidas\\Ventilador-roto.jpg', '58741369N'),
(9, 1, 'Se limpio ventilador del disipador ', 1, 20, '..\\imagenesSubidas\\Ventilador-sucio.jpg', '52014755L'),
(10, 1, 'Se cambió de un disco HDD a uno SSD', 1, 100, '..\\imagenesSubidas\\cambiar-duro.jpg', '54156987F'),
(11, 1, 'Desinstalado e instalado versión actualizada', 1, 120, '..\\imagenesSubidas\\actualizar-steam.jpg', '58741369N'),
(12, 1, 'Eliminado virus y actualizadas defensas', 0, 500, '..\\imagenesSubidas\\virus.jpg', '52014755L');

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
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `partes`
--
ALTER TABLE `partes`
  MODIFY `numero_parte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
