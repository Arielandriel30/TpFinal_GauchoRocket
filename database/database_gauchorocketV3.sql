-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2022 a las 23:14:17
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gauchorocket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabin_type`
--

CREATE TABLE `cabin_type` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cabin_type`
--

INSERT INTO `cabin_type` (`id`, `code`, `description`) VALUES
(1, 'T', 'Turista'),
(2, 'E', 'Ejecutiva'),
(3, 'P', 'Primera clase');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flight_level`
--

CREATE TABLE `flight_level` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `flight_level`
--

INSERT INTO `flight_level` (`id`, `code`, `description`) VALUES
(1, '1', 'Nivel 1'),
(2, '2', 'Nivel 2'),
(3, '3', 'Nivel 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rocket`
--

CREATE TABLE `rocket` (
  `id` int(11) NOT NULL,
  `plate` varchar(255) NOT NULL,
  `rocket_type_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rocket`
--

INSERT INTO `rocket` (`id`, `plate`, `rocket_type_id`, `description`) VALUES
(1, 'AA1', 7, NULL),
(2, 'AA5', 7, NULL),
(3, 'AA9', 7, NULL),
(4, 'AA13', 7, NULL),
(5, 'AA17', 7, NULL),
(6, 'BA8', 5, NULL),
(7, 'BA9', 5, NULL),
(8, 'BA10', 5, NULL),
(9, 'BA11', 5, NULL),
(10, 'BA12', 5, NULL),
(11, 'O1', 1, NULL),
(12, 'O2', 1, NULL),
(13, 'O6', 1, NULL),
(14, 'O7', 1, NULL),
(15, 'BA13', 6, NULL),
(16, 'BA14', 6, NULL),
(17, 'BA15', 6, NULL),
(18, 'BA16', 6, NULL),
(19, 'BA17', 6, NULL),
(20, 'BA4', 4, NULL),
(21, 'BA5', 4, NULL),
(22, 'BA6', 4, NULL),
(23, 'BA7', 4, NULL),
(24, 'O3', 2, NULL),
(25, 'O4', 2, NULL),
(26, 'O5', 2, NULL),
(27, 'O8', 2, NULL),
(28, 'O9', 2, NULL),
(29, 'AA2', 8, NULL),
(30, 'AA6', 8, NULL),
(31, 'AA10', 8, NULL),
(32, 'AA14', 8, NULL),
(33, 'AA18', 8, NULL),
(34, 'AA4', 10, NULL),
(35, 'AA8', 10, NULL),
(36, 'AA12', 10, NULL),
(37, 'AA16', 10, NULL),
(38, 'AA20', 10, NULL),
(39, 'AA3', 9, NULL),
(40, 'AA7', 9, NULL),
(41, 'AA11', 9, NULL),
(42, 'AA15', 9, NULL),
(43, 'AA19', 9, NULL),
(44, 'BA1', 3, NULL),
(45, 'BA2', 3, NULL),
(46, 'BA3', 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rocket_type`
--

CREATE TABLE `rocket_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `flight_type_id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `cabin_type_1` int(11) DEFAULT NULL,
  `cabin_type_2` int(11) DEFAULT NULL,
  `cabin_type_3` int(11) DEFAULT NULL,
  `capacity_type_1` int(11) DEFAULT NULL,
  `capacity_type_2` int(11) DEFAULT NULL,
  `capacity_type_3` int(11) DEFAULT NULL,
  `flight_level_1` int(11) DEFAULT NULL,
  `flight_level_2` int(11) DEFAULT NULL,
  `flight_level_3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rocket_type`
--

INSERT INTO `rocket_type` (`id`, `name`, `flight_type_id`, `capacity`, `cabin_type_1`, `cabin_type_2`, `cabin_type_3`, `capacity_type_1`, `capacity_type_2`, `capacity_type_3`, `flight_level_1`, `flight_level_2`, `flight_level_3`) VALUES
(1, 'Calandria', 1, 300, 1, 2, 3, 200, 75, 25, 1, 2, 3),
(2, 'Colibri', 1, 120, 1, 2, 3, 100, 18, 2, 1, 2, 3),
(3, 'Zorzal', 2, 100, 1, 2, NULL, 50, 50, NULL, NULL, 2, 3),
(4, 'Carancho', 2, 110, 1, NULL, NULL, 110, NULL, NULL, NULL, 2, 3),
(5, 'Aguilucho', 2, 60, NULL, 2, 3, NULL, 50, 10, NULL, 2, 3),
(6, 'Canario', 2, 80, NULL, 2, 3, NULL, 70, 10, NULL, 2, 3),
(7, 'Aguila', 3, 300, 1, 2, 3, 200, 75, 25, NULL, 2, 3),
(8, 'Condor', 3, 350, 1, 2, 3, 300, 10, 40, NULL, 2, 3),
(9, 'Halcon', 3, 200, 1, 2, 3, 150, 25, 25, NULL, NULL, 3),
(10, 'Guanaco', 3, 100, NULL, NULL, 3, 100, NULL, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `space_flight`
--

CREATE TABLE `space_flight` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `departure_date` date DEFAULT NULL,
  `departure_time` varchar(255) DEFAULT NULL,
  `return_` date DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `side` varchar(255) DEFAULT NULL,
  `rocket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `space_flight`
--

INSERT INTO `space_flight` (`id`, `code`, `from_id`, `to_id`, `departure_date`, `departure_time`, `return_`, `duration`, `side`, `rocket_id`) VALUES
(1, 'ELMI', 3, 4, '2022-05-22', '8:00hs', NULL, '26hs', 'IDA', 1),
(3, 'EMLV', 3, 4, '2022-05-22', '16:00hs', NULL, '26hs', 'VUELTA', 1),
(4, 'EMGI', 4, 5, '2022-05-30', '8:00hs', NULL, '26hs', 'IDA', 2),
(5, 'EMGV', 4, 5, '2022-05-30', '14:00hs', NULL, '26hs', 'VUELTA', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `space_flight_type`
--

CREATE TABLE `space_flight_type` (
  `id` int(11) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `space_flight_type`
--

INSERT INTO `space_flight_type` (`id`, `short_name`, `name`) VALUES
(1, 'Orbital', 'Orbital'),
(2, 'BA', 'Baja Aceleracion'),
(3, 'AA', 'Alta Aceleracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `station`
--

CREATE TABLE `station` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `station`
--

INSERT INTO `station` (`id`, `name`) VALUES
(8, 'Encedalo'),
(1, 'Estacion Espacial Internalcional'),
(6, 'Europa'),
(5, 'Ganimedes'),
(7, 'lo'),
(3, 'Luna'),
(4, 'Marte'),
(2, 'Orbital Hotel'),
(9, 'Titan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuarios` int(11) NOT NULL,
  `nameU` varchar(45) NOT NULL,
  `passwordU` varchar(45) NOT NULL,
  `isAdminU` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuarios`, `nameU`, `passwordU`, `isAdminU`) VALUES
(1, 'Ariel', '12345', 1),
(2, 'Visita', 'visita', 0),
(3, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cabin_type`
--
ALTER TABLE `cabin_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_cabin_type_cod` (`code`);

--
-- Indices de la tabla `flight_level`
--
ALTER TABLE `flight_level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_passenger_cod` (`code`);

--
-- Indices de la tabla `rocket`
--
ALTER TABLE `rocket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_rocket_plate` (`plate`);

--
-- Indices de la tabla `rocket_type`
--
ALTER TABLE `rocket_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_rocket_type_name` (`name`);

--
-- Indices de la tabla `space_flight`
--
ALTER TABLE `space_flight`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_flight_code` (`code`);

--
-- Indices de la tabla `space_flight_type`
--
ALTER TABLE `space_flight_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_flight_type_name` (`name`);

--
-- Indices de la tabla `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_station_name` (`name`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD UNIQUE KEY `idUsuarios_UNIQUE` (`idUsuarios`),
  ADD UNIQUE KEY `nameU_UNIQUE` (`nameU`),
  ADD UNIQUE KEY `passwordU_UNIQUE` (`passwordU`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cabin_type`
--
ALTER TABLE `cabin_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `flight_level`
--
ALTER TABLE `flight_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rocket`
--
ALTER TABLE `rocket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `rocket_type`
--
ALTER TABLE `rocket_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `space_flight`
--
ALTER TABLE `space_flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `space_flight_type`
--
ALTER TABLE `space_flight_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `station`
--
ALTER TABLE `station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
