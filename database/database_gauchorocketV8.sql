-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2022 a las 08:14:08
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

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
-- Estructura de tabla para la tabla `flight_booking`
--

CREATE TABLE `flight_booking` (
                                  `id` int(11) NOT NULL,
                                  `code` varchar(255) NOT NULL,
                                  `from_id` int(11) NOT NULL,
                                  `to_id` int(11) NOT NULL,
                                  `departure_date` date DEFAULT NULL,
                                  `departure_time` varchar(255) DEFAULT NULL,
                                  `return_` date DEFAULT NULL,
                                  `duration` varchar(255) DEFAULT NULL,
                                  `side` varchar(255) DEFAULT NULL,
                                  `rocket_id` int(11) NOT NULL,
                                  `space_flight_id` int(11) DEFAULT NULL,
                                  `reservation_quantity` int(11) DEFAULT NULL,
                                  `cabin_type_id` int(11) DEFAULT NULL,
                                  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `flight_booking`
--

INSERT INTO `flight_booking` (`id`, `code`, `from_id`, `to_id`, `departure_date`, `departure_time`, `return_`, `duration`, `side`, `rocket_id`, `space_flight_id`, `reservation_quantity`, `cabin_type_id`, `user_id`) VALUES
                                                                                                                                                                                                                           (1, 'ELMI', 3, 4, '2022-05-22', '8:00hs', NULL, '26hs', 'IDA', 1, NULL, NULL, NULL, NULL),
                                                                                                                                                                                                                           (3, 'EMLV', 3, 4, '2022-05-22', '16:00hs', NULL, '26hs', 'VUELTA', 1, NULL, NULL, NULL, NULL),
                                                                                                                                                                                                                           (4, 'EMGI', 4, 5, '2022-05-30', '8:00hs', NULL, '26hs', 'IDA', 2, NULL, NULL, NULL, NULL),
                                                                                                                                                                                                                           (5, 'EMGV', 4, 5, '2022-05-30', '14:00hs', NULL, '26hs', 'VUELTA', 2, NULL, NULL, NULL, NULL);

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
-- Estructura de tabla para la tabla `lane`
--

CREATE TABLE `lane` (
                        `id` int(11) NOT NULL,
                        `route_id` int(11) NOT NULL,
                        `station_id` int(11) NOT NULL,
                        `duration` int(11) NOT NULL,
                        `flight_type_id` int(11) NOT NULL,
                        `sort_` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lane`
--

INSERT INTO `lane` (`id`, `route_id`, `station_id`, `duration`, `flight_type_id`, `sort_`) VALUES
                                                                                               (1, 1, 1, 4, 2, 1),
                                                                                               (2, 1, 1, 3, 3, 1),
                                                                                               (3, 1, 2, 1, 2, 2),
                                                                                               (4, 1, 2, 1, 3, 2),
                                                                                               (5, 1, 3, 16, 2, 3),
                                                                                               (6, 1, 3, 9, 3, 3),
                                                                                               (7, 1, 4, 26, 2, 4),
                                                                                               (8, 1, 4, 22, 3, 4),
                                                                                               (9, 2, 1, 4, 2, 1),
                                                                                               (10, 2, 1, 3, 3, 1),
                                                                                               (11, 2, 3, 14, 2, 2),
                                                                                               (12, 2, 3, 10, 3, 2),
                                                                                               (13, 2, 4, 26, 2, 3),
                                                                                               (14, 2, 4, 22, 3, 3),
                                                                                               (15, 2, 5, 48, 2, 4),
                                                                                               (16, 2, 5, 32, 3, 4),
                                                                                               (17, 2, 6, 50, 2, 5),
                                                                                               (18, 2, 6, 33, 3, 5),
                                                                                               (19, 2, 7, 51, 2, 6),
                                                                                               (20, 2, 7, 35, 3, 6),
                                                                                               (21, 2, 8, 70, 2, 7),
                                                                                               (22, 2, 8, 50, 3, 7),
                                                                                               (23, 2, 9, 77, 2, 8),
                                                                                               (24, 2, 9, 52, 3, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medical_center`
--

CREATE TABLE `medical_center` (
                                  `id` int(11) NOT NULL,
                                  `name_medical_center` varchar(45) NOT NULL,
                                  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medical_center`
--

INSERT INTO `medical_center` (`id`, `name_medical_center`, `size`) VALUES
                                                                       (1, 'Buenos Aires', 300),
                                                                       (2, 'Shanghái', 210),
                                                                       (3, 'Ankara', 200);

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
                                                                          (46, 'BA3', 3, NULL),
                                                                          (47, 'O10', 1, NULL);

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
-- Estructura de tabla para la tabla `route`
--

CREATE TABLE `route` (
                         `id` int(11) NOT NULL,
                         `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `route`
--

INSERT INTO `route` (`id`, `name`) VALUES
                                       (1, 'Circuito 1'),
                                       (2, 'Circuito 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `space_flight`
--

CREATE TABLE `space_flight` (
                                `id` int(11) NOT NULL,
                                `day` varchar(255) DEFAULT NULL,
                                `sort_day` int(11) NOT NULL,
                                `rocket_id` int(11) NOT NULL,
                                `duration` varchar(255) DEFAULT NULL,
                                `departure` varchar(255) DEFAULT NULL,
                                `space_flight_type_id` int(11) NOT NULL,
                                `route_id` int(11) DEFAULT NULL,
                                `departure_date` datetime DEFAULT NULL,
                                `departure_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `space_flight`
--

INSERT INTO `space_flight` (`id`, `day`, `sort_day`, `rocket_id`, `duration`, `departure`, `space_flight_type_id`, `route_id`, `departure_date`, `departure_time`) VALUES
                                                                                                                                                                       (1, 'L', 2, 11, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (2, 'L', 2, 12, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (3, 'L', 2, 13, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (4, 'L', 2, 24, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (5, 'L', 2, 25, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (6, 'M', 3, 11, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (7, 'M', 3, 12, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (8, 'M', 3, 13, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (9, 'M', 3, 24, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (10, 'M', 3, 25, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (11, 'X', 4, 11, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (12, 'X', 4, 12, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (13, 'X', 4, 13, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (14, 'X', 4, 24, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (15, 'X', 4, 25, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (16, 'J', 5, 11, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (17, 'J', 5, 12, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (18, 'J', 5, 13, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (19, 'J', 5, 24, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (20, 'J', 5, 25, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (21, 'V', 6, 11, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (22, 'V', 6, 12, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (23, 'V', 6, 13, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (24, 'V', 6, 24, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (25, 'V', 6, 25, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (26, 'S', 7, 11, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (27, 'S', 7, 12, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (28, 'S', 7, 13, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (29, 'S', 7, 14, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (30, 'S', 7, 24, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (31, 'S', 7, 25, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (32, 'S', 7, 26, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (33, 'S', 7, 27, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (34, 'D', 1, 11, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (35, 'D', 1, 12, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (36, 'D', 1, 13, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (37, 'D', 1, 14, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (38, 'D', 1, 47, '8hs', '10', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (39, 'D', 1, 24, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (40, 'D', 1, 25, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (41, 'D', 1, 26, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (42, 'D', 1, 27, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (43, 'D', 1, 28, '8hs', '11', 4, 0, NULL, '00:00:00'),
                                                                                                                                                                       (44, 'D', 1, 34, '35 dias', '10', 5, 0, NULL, '00:00:00'),
                                                                                                                                                                       (45, 'L', 2, 44, '47hs', '10', 6, 1, '2022-06-27 08:00:00', '08:00:00');

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
                                                                 (3, 'AA', 'Alta Aceleracion'),
                                                                 (4, 'Suborbital', 'Suborbital'),
                                                                 (5, 'Tour', 'Tour'),
                                                                 (6, 'C1', 'Circuito 1'),
                                                                 (7, 'C2', 'Circuito 2');

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
                                         (11, 'Ankara'),
                                         (10, 'Buenos Aires'),
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
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
                         `idturno` int(11) NOT NULL,
                         `dia_turno` varchar(45) DEFAULT NULL,
                         `hora_turno` date DEFAULT NULL,
                         `id_centro_medico` int(11) DEFAULT NULL,
                         `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`idturno`, `dia_turno`, `hora_turno`, `id_centro_medico`, `id_usuario`) VALUES
                                                                                                 (1, '2022-06-26', NULL, 1, 12),
                                                                                                 (2, '2022-06-27', NULL, 1, 12),
                                                                                                 (3, '2022-06-27', NULL, 1, 12),
                                                                                                 (4, '2022-06-27', NULL, 1, 12),
                                                                                                 (5, '2022-06-27', NULL, 2, 13),
                                                                                                 (6, '2022-06-27', NULL, 1, 12),
                                                                                                 (7, '2022-06-27', NULL, 2, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
                           `idUsuarios` int(11) NOT NULL,
                           `nameU` varchar(45) NOT NULL,
                           `passwordU` varchar(45) NOT NULL,
                           `email` varchar(255) NOT NULL,
                           `isAdminU` tinyint(4) NOT NULL,
                           `is_blocked` tinyint(1) NOT NULL,
                           `hash` varchar(255) NOT NULL,
                           `id_flight_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuarios`, `nameU`, `passwordU`, `email`, `isAdminU`, `is_blocked`, `hash`, `id_flight_level`) VALUES
                                                                                                                             (11, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'tomasiniarnaldo@gmail.com', 1, 0, '33baf4f862827c0545697e2dc0be56688b21', NULL),
                                                                                                                             (12, 'atomasini', '81dc9bdb52d04dc20036dbd8313ed055', 'tomasiniarnaldo@gmail.com', 1, 0, '1ef9e07f50d05af4573101f578cb456fac17', 2),
                                                                                                                             (13, 'atomasini2', '81dc9bdb52d04dc20036dbd8313ed055', 'tomasiniarnaldo@gmail.com', 0, 0, '61f18bac9bf20354b905f05771274ef610e2', 3),
                                                                                                                             (14, 'atomasini1', '81dc9bdb52d04dc20036dbd8313ed055', 'tomasiniarnaldo@gmail.com', 0, 0, '163ee9631e441a19174e6844208a05d95f7d', NULL),
                                                                                                                             (15, 'atomasini3', '81dc9bdb52d04dc20036dbd8313ed055', 'tomasiniarnaldo@gmail.com', 0, 1, '3548bb6e3ec5a8c3fbc74123490f79e76dfa', NULL),
                                                                                                                             (16, 'atomasini4', '81dc9bdb52d04dc20036dbd8313ed055', 'tomasiniarnaldo@gmail.com', 0, 1, 'c9feb90a0a34a26c3293293c8b714cc4530a', NULL),
                                                                                                                             (17, 'atomasini5', '81dc9bdb52d04dc20036dbd8313ed055', 'tomasiniarnaldo@gmail.com', 0, 1, 'f331558d9a2279cb7f06ed246c81e8c4424a', NULL),
                                                                                                                             (18, 'atomasini6', '81dc9bdb52d04dc20036dbd8313ed055', 'tomasiniarnaldo@gmail.com', 0, 1, 'debae94ce99e417260aa183068ea704bea7f', NULL);

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
-- Indices de la tabla `flight_booking`
--
ALTER TABLE `flight_booking`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_flight_code` (`code`),
  ADD KEY `FK_flight_booking__from_station` (`from_id`);

--
-- Indices de la tabla `flight_level`
--
ALTER TABLE `flight_level`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_passenger_cod` (`code`);

--
-- Indices de la tabla `lane`
--
ALTER TABLE `lane`
    ADD PRIMARY KEY (`id`),
  ADD KEY `FK_lane__station` (`station_id`),
  ADD KEY `FK_lane__flight_type` (`flight_type_id`),
  ADD KEY `FK_lane__route` (`route_id`);

--
-- Indices de la tabla `medical_center`
--
ALTER TABLE `medical_center`
    ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `uq_rocket_type_name` (`name`),
  ADD KEY `FK_rocket_type__flight_type` (`flight_type_id`),
  ADD KEY `FK_rocket_type__cabin_type_3` (`cabin_type_3`),
  ADD KEY `FK_rocket_type__flight_level_3` (`flight_level_3`);

--
-- Indices de la tabla `route`
--
ALTER TABLE `route`
    ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `space_flight`
--
ALTER TABLE `space_flight`
    ADD PRIMARY KEY (`id`),
  ADD KEY `FK_flight__flight_type` (`space_flight_type_id`),
  ADD KEY `FK_flight__rocket` (`rocket_id`);

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
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
    ADD PRIMARY KEY (`idturno`),
  ADD KEY `id_centro_medico_idx` (`id_centro_medico`),
  ADD KEY `id_usuario_idx` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
    ADD PRIMARY KEY (`idUsuarios`),
  ADD UNIQUE KEY `idUsuarios_UNIQUE` (`idUsuarios`),
  ADD UNIQUE KEY `nameU_UNIQUE` (`nameU`),
  ADD KEY `id_flight_level_idx` (`id_flight_level`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cabin_type`
--
ALTER TABLE `cabin_type`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `flight_booking`
--
ALTER TABLE `flight_booking`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `flight_level`
--
ALTER TABLE `flight_level`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `lane`
--
ALTER TABLE `lane`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `rocket`
--
ALTER TABLE `rocket`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `rocket_type`
--
ALTER TABLE `rocket_type`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `route`
--
ALTER TABLE `route`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `space_flight`
--
ALTER TABLE `space_flight`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `space_flight_type`
--
ALTER TABLE `space_flight_type`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `station`
--
ALTER TABLE `station`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
    MODIFY `idturno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
    MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `flight_booking`
--
ALTER TABLE `flight_booking`
    ADD CONSTRAINT `FK_flight_booking__from_station` FOREIGN KEY (`from_id`) REFERENCES `station` (`id`);

--
-- Filtros para la tabla `lane`
--
ALTER TABLE `lane`
    ADD CONSTRAINT `FK_lane__flight_type` FOREIGN KEY (`flight_type_id`) REFERENCES `space_flight_type` (`id`),
  ADD CONSTRAINT `FK_lane__route` FOREIGN KEY (`route_id`) REFERENCES `route` (`id`),
  ADD CONSTRAINT `FK_lane__station` FOREIGN KEY (`station_id`) REFERENCES `station` (`id`);

--
-- Filtros para la tabla `rocket_type`
--
ALTER TABLE `rocket_type`
    ADD CONSTRAINT `FK_rocket_type__cabin_type_3` FOREIGN KEY (`cabin_type_3`) REFERENCES `cabin_type` (`id`),
  ADD CONSTRAINT `FK_rocket_type__flight_level_3` FOREIGN KEY (`flight_level_3`) REFERENCES `flight_level` (`id`),
  ADD CONSTRAINT `FK_rocket_type__flight_type` FOREIGN KEY (`flight_type_id`) REFERENCES `space_flight_type` (`id`);

--
-- Filtros para la tabla `space_flight`
--
ALTER TABLE `space_flight`
    ADD CONSTRAINT `FK_flight__flight_type` FOREIGN KEY (`space_flight_type_id`) REFERENCES `space_flight_type` (`id`),
  ADD CONSTRAINT `FK_flight__rocket` FOREIGN KEY (`rocket_id`) REFERENCES `rocket` (`id`);

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
    ADD CONSTRAINT `id_centro_medico` FOREIGN KEY (`id_centro_medico`) REFERENCES `medical_center` (`id`),
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idUsuarios`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
    ADD CONSTRAINT `id_flight_level` FOREIGN KEY (`id_flight_level`) REFERENCES `flight_level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*Calcula el circuito 1 de Baja aceleracion solo hay que pasarle la estacion en este ejemplo esta la Luna
--Desde la tierra a marte
 SELECT rs.name,
DATE_ADD(sf.departure_date, INTERVAL SUM(l.duration) HOUR) 'Fecha de Llegada'
FROM space_flight sf
JOIN space_flight_type sft  ON sft.id= sf.space_flight_type_id
JOIN route rou ON rou.id=sf.route_id
JOIN lane l ON l.route_id = rou.id
JOIN station rs ON rs.id = l.station_id
JOIN space_flight_type rsft  ON rsft.id= l.flight_type_id
WHERE sft.short_name='C1'
AND rsft.short_name ='BA'
AND l.sort_ <= (SELECT l1.sort_ FROM space_flight sf1
                        JOIN space_flight_type sft1  ON sft1.id= sf1.space_flight_type_id
                        JOIN route rou1 ON rou1.id=sf1.route_id
                        JOIN lane l1 ON l1.route_id = rou1.id
                        JOIN station s1 ON s1.id = l1.station_id
                        JOIN space_flight_type rsft1  ON rsft1.id= l1.flight_type_id
                		WHERE s1.name='Luna'
                        AND sft1.short_name='C1'
                        AND rsft1.short_name ='BA')
ORDER BY l.sort_ ASC

--Desde Marte a la tierra
SELECT rs.name,
DATE_ADD(sf.departure_date, INTERVAL SUM(l.duration) HOUR) 'Fecha de Llegada'
FROM space_flight sf
JOIN space_flight_type sft  ON sft.id= sf.space_flight_type_id
JOIN route rou ON rou.id=sf.route_id
JOIN lane l ON l.route_id = rou.id
JOIN station rs ON rs.id = l.station_id
JOIN station orig ON  orig.id = sf.departure
JOIN space_flight_type rsft  ON rsft.id= l.flight_type_id
WHERE sft.short_name='C1'
AND rsft.short_name ='BA'
AND orig.name = 'Marte'
AND l.sort_ > (SELECT l1.sort_ FROM space_flight sf1
                        JOIN space_flight_type sft1  ON sft1.id= sf1.space_flight_type_id
                        JOIN route rou1 ON rou1.id=sf1.route_id
                        JOIN lane l1 ON l1.route_id = rou1.id
                        JOIN station des1 ON des1.id = l1.station_id
                		JOIN station orig1 ON  orig1.id = sf1.departure
                        JOIN space_flight_type rsft1  ON rsft1.id= l1.flight_type_id
                		WHERE des1.name='Luna'
                        AND sft1.short_name='C1'
                        AND rsft1.short_name ='BA'
               			AND orig1.name = 'Marte')
ORDER BY l.sort_ ASC
 */
CREATE TABLE  `compra` (
                           `id` INT NOT NULL AUTO_INCREMENT ,
                           `id_vuelo` INT NOT NULL ,
                           `fecha_compra` DATE NOT NULL ,
                           `id_user` INT NOT NULL ,
                           `origen` VARCHAR(200) NOT NULL ,
                           `fecha_vuelo` DATE NOT NULL ,
                           `cabina` VARCHAR(200) NOT NULL ,
                           `servicio` VARCHAR(200) NOT NULL ,
                           PRIMARY KEY (`id`)) ENGINE = InnoDB;


ALTER TABLE `compra` ADD `codigo` VARCHAR(200) NOT NULL AFTER `servicio`;
ALTER TABLE `compra` ADD `duracion` VARCHAR(100) NOT NULL AFTER `fecha_vuelo`;
ALTER TABLE `compra` ADD `precio` INT NOT NULL AFTER `fecha_compra`;
ALTER TABLE `compra` ADD `check_in` TINYINT(1) NOT NULL AFTER `codigo`;
 ;