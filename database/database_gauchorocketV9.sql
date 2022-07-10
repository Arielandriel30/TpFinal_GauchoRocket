-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2022 a las 22:21:16
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
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
                          `id` int(11) NOT NULL,
                          `id_vuelo` int(11) NOT NULL,
                          `fecha_compra` date NOT NULL,
                          `precio` int(11) NOT NULL,
                          `id_user` int(11) NOT NULL,
                          `origen` varchar(200) COLLATE latin1_bin NOT NULL,
                          `fecha_vuelo` date NOT NULL,
                          `equipo` varchar(200) COLLATE latin1_bin NOT NULL,
                          `duracion` varchar(100) COLLATE latin1_bin NOT NULL,
                          `cabina` varchar(200) COLLATE latin1_bin NOT NULL,
                          `servicio` varchar(200) COLLATE latin1_bin NOT NULL,
                          `codigo` varchar(200) COLLATE latin1_bin NOT NULL,
                          `check_in` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `id_vuelo`, `fecha_compra`, `precio`, `id_user`, `origen`, `fecha_vuelo`, `equipo`, `duracion`, `cabina`, `servicio`, `codigo`, `check_in`) VALUES
                                                                                                                                                                            (1, 25, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-10', 'Calandria', '8hs', 'Turista', 'Standard', 'IADNJ37', 0),
                                                                                                                                                                            (2, 26, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-10', 'Calandria', '8hs', 'Turista', 'Standard', 'AIRIP36', 0),
                                                                                                                                                                            (3, 27, '2022-07-10', 2590, 13, 'Ankara', '2022-07-10', 'Colibri', '8hs', 'Turista', 'Standard', 'IYUGT44', 0),
                                                                                                                                                                            (4, 28, '2022-07-10', 2590, 13, 'Ankara', '2022-07-10', 'Colibri', '8hs', 'Turista', 'Standard', 'DFRUC65', 0),
                                                                                                                                                                            (5, 29, '2022-07-10', 2590, 13, 'Ankara', '2022-07-13', 'Colibri', '8hs', 'Turista', 'Standard', 'UIGEE24', 0),
                                                                                                                                                                            (6, 30, '2022-07-10', 2590, 13, 'Ankara', '2022-07-10', 'Colibri', '8hs', 'Turista', 'Standard', 'PWQPE41', 0),
                                                                                                                                                                            (7, 31, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-15', 'Calandria', '8hs', 'Turista', 'Standard', 'XAINU26', 0),
                                                                                                                                                                            (8, 32, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-12', 'Calandria', '8hs', 'Turista', 'Standard', 'JWLOM18', 1),
                                                                                                                                                                            (9, 33, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-12', 'Calandria', '8hs', 'Turista', 'Standard', 'YIRMJ12', 0),
                                                                                                                                                                            (10, 34, '2022-07-10', 2590, 13, 'Ankara', '2022-07-11', 'Colibri', '8hs', 'Turista', 'Standard', 'GIXRQ11', 1),
                                                                                                                                                                            (11, 35, '2022-07-10', 2590, 13, 'Ankara', '2022-07-10', 'Colibri', '8hs', 'Turista', 'Standard', 'YCQXS64', 0),
                                                                                                                                                                            (12, 36, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-10', 'Calandria', '8hs', 'Turista', 'Standard', 'BDJOS49', 0),
                                                                                                                                                                            (13, 37, '2022-07-10', 2590, 13, 'Ankara', '2022-07-12', 'Colibri', '8hs', 'Turista', 'Standard', 'TMCXL20', 1),
                                                                                                                                                                            (14, 38, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-10', 'Calandria', '8hs', 'Turista', 'Standard', 'HGIVJ39', 0),
                                                                                                                                                                            (15, 39, '2022-07-10', 2590, 13, 'Ankara', '2022-07-13', 'Colibri', '8hs', 'Turista', 'Standard', 'YCLCB15', 0),
                                                                                                                                                                            (16, 40, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-12', 'Calandria', '8hs', 'Turista', 'Standard', 'GWQQI16', 0),
                                                                                                                                                                            (17, 41, '2022-07-10', 2590, 13, 'Ankara', '2022-07-13', 'Colibri', '8hs', 'Turista', 'Standard', 'MXGMR42', 0),
                                                                                                                                                                            (18, 42, '2022-07-10', 2590, 13, 'Ankara', '2022-07-10', 'Colibri', '8hs', 'Turista', 'Standard', 'JBEQU40', 0),
                                                                                                                                                                            (19, 43, '2022-07-10', 2590, 13, 'Ankara', '2022-07-12', 'Colibri', '8hs', 'Turista', 'Standard', 'YJAWK19', 0),
                                                                                                                                                                            (20, 44, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-10', 'Guanaco', '35 dias', 'Turista', 'Standard', 'SFXYB58', 0),
                                                                                                                                                                            (21, 45, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-17', 'Calandria', '8hs', 'Turista', 'Standard', 'KFVOG44', 0),
                                                                                                                                                                            (22, 46, '2022-07-10', 2590, 13, 'Ankara', '2022-07-12', 'Colibri', '8hs', 'Turista', 'Standard', 'IDTLA29', 0),
                                                                                                                                                                            (23, 47, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-17', 'Calandria', '8hs', 'Turista', 'Standard', 'ROSAV37', 0),
                                                                                                                                                                            (24, 48, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-13', 'Calandria', '8hs', 'Turista', 'Standard', 'GBLFQ21', 0),
                                                                                                                                                                            (25, 49, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-13', 'Calandria', '8hs', 'Turista', 'Standard', 'TYOWS26', 0),
                                                                                                                                                                            (26, 50, '2022-07-10', 2590, 13, 'Ankara', '2022-07-11', 'Colibri', '8hs', 'Turista', 'Standard', 'IMMBR15', 0),
                                                                                                                                                                            (27, 51, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-17', 'Guanaco', '35 dias', 'Turista', 'Standard', 'PKGCP74', 0),
                                                                                                                                                                            (28, 52, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-13', 'Calandria', '8hs', 'Turista', 'Standard', 'GTCFS12', 0),
                                                                                                                                                                            (29, 53, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-17', 'Guanaco', '35 dias', 'Turista', 'Standard', 'HWODY62', 0),
                                                                                                                                                                            (30, 54, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-12', 'Calandria', '8hs', 'Turista', 'Standard', 'KXHTA16', 0),
                                                                                                                                                                            (31, 55, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-12', 'Calandria', '8hs', 'Turista', 'Standard', 'LJKAS17', 0),
                                                                                                                                                                            (32, 56, '2022-07-10', 2590, 13, 'Ankara', '2022-07-12', 'Colibri', '8hs', 'Turista', 'Standard', 'QBGCU29', 0),
                                                                                                                                                                            (33, 57, '2022-07-10', 2590, 13, 'Ankara', '2022-07-17', 'Colibri', '8hs', 'Turista', 'Standard', 'VDDFP55', 0),
                                                                                                                                                                            (34, 58, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-12', 'Calandria', '8hs', 'Turista', 'Standard', 'RTRFA12', 0),
                                                                                                                                                                            (35, 59, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-12', 'Calandria', '8hs', 'Turista', 'Standard', 'TDHDV18', 0),
                                                                                                                                                                            (36, 60, '2022-07-10', 2590, 13, 'Ankara', '2022-07-17', 'Colibri', '8hs', 'Turista', 'Standard', 'XQLJL42', 0),
                                                                                                                                                                            (37, 61, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-11', 'Calandria', '8hs', 'Turista', 'Standard', 'GKJOU6', 0),
                                                                                                                                                                            (38, 62, '2022-07-10', 2590, 13, 'Ankara', '2022-07-11', 'Colibri', '8hs', 'Turista', 'Standard', 'RMKPT7', 0),
                                                                                                                                                                            (39, 63, '2022-07-10', 2590, 13, 'Ankara', '2022-07-15', 'Colibri', '8hs', 'Turista', 'Standard', 'OAINT33', 0),
                                                                                                                                                                            (40, 64, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-17', 'Guanaco', '35 dias', 'Turista', 'Standard', 'SJPCM54', 0),
                                                                                                                                                                            (41, 65, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-17', 'Guanaco', '35 dias', 'Turista', 'Standard', 'MDELR52', 0),
                                                                                                                                                                            (42, 66, '2022-07-10', 2590, 13, 'Ankara', '2022-07-11', 'Colibri', '8hs', 'Turista', 'Standard', 'SJSOP14', 0),
                                                                                                                                                                            (43, 67, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-17', 'Guanaco', '35 dias', 'Turista', 'Standard', 'ERVHY77', 0),
                                                                                                                                                                            (44, 68, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-13', 'Calandria', '8hs', 'Turista', 'Standard', 'FDBXJ13', 0),
                                                                                                                                                                            (45, 69, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-13', 'Calandria', '8hs', 'Turista', 'Standard', 'DJLFS11', 0),
                                                                                                                                                                            (46, 70, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-15', 'Calandria', '8hs', 'Ejecutiva', 'Standard', 'SBAXQ28', 0),
                                                                                                                                                                            (47, 71, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-17', 'Guanaco', '35 dias', 'Turista', 'Standard', 'WQNSC51', 0),
                                                                                                                                                                            (48, 72, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-17', 'Calandria', '8hs', 'Turista', 'Standard', 'BBBFT37', 0),
                                                                                                                                                                            (49, 73, '2022-07-10', 2590, 13, 'Ankara', '2022-07-11', 'Colibri', '8hs', 'Turista', 'Standard', 'WHUGV16', 0),
                                                                                                                                                                            (50, 74, '2022-07-10', 2590, 13, 'Ankara', '2022-07-12', 'Colibri', '8hs', 'Turista', 'Standard', 'SFWVP22', 0),
                                                                                                                                                                            (51, 75, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-13', 'Calandria', '8hs', 'Turista', 'Standard', 'AXRNR24', 0),
                                                                                                                                                                            (52, 77, '2022-07-10', 2590, 13, 'Ankara', '2022-07-13', 'Colibri', '8hs', 'Turista', 'Standard', 'OMTII33', 0),
                                                                                                                                                                            (53, 78, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-17', 'Guanaco', '35 dias', 'Turista', 'Standard', 'GXTEL75', 0),
                                                                                                                                                                            (54, 79, '2022-07-10', 2590, 13, 'Ankara', '2022-07-11', 'Colibri', '8hs', 'Turista', 'Standard', 'FVPOX6', 0),
                                                                                                                                                                            (55, 80, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-12', 'Calandria', '8hs', 'Turista', 'Standard', 'KINNF13', 0),
                                                                                                                                                                            (56, 81, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-17', 'Guanaco', '35 dias', 'Turista', 'Gourmet', 'TJLGY82', 0),
                                                                                                                                                                            (57, 82, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-11', 'Calandria', '8hs', 'Turista', 'Standard', 'HXRQH8', 0),
                                                                                                                                                                            (58, 83, '2022-07-10', 2590, 13, 'Buenos Aires', '2022-07-12', 'Calandria', '8hs', 'Turista', 'Standard', 'HYBGE7', 0),
                                                                                                                                                                            (59, 84, '2022-07-10', 2590, 13, 'Ankara', '2022-07-15', 'Colibri', '8hs', 'Turista', 'Standard', 'YYYAB30', 0),
                                                                                                                                                                            (60, 88, '2022-07-10', 2590, 13, '', '2022-06-28', 'Zorzal', '22', 'Ejecutiva', 'Standard', 'LMBA1-463132', 0),
                                                                                                                                                                            (61, 88, '2022-07-10', 2590, 13, '', '2022-06-28', 'Zorzal', '22', 'Turista', 'Standard', 'LMBA1-4631329591484901657481705', 0),
                                                                                                                                                                            (62, 88, '2022-07-10', 2590, 13, '', '2022-06-28', 'Zorzal', '22', 'Ejecutiva', 'Gourmet', 'LMBA1-463132-12381967391657481805', 0),
                                                                                                                                                                            (63, 0, '2022-07-10', 2590, 13, '', '2022-06-27', 'Zorzal', '16', 'Ejecutiva', 'Standard', 'MLBA1-473334-7311259211657481961', 0),
                                                                                                                                                                            (64, 0, '2022-07-10', 2590, 13, '', '2022-06-27', 'Zorzal', '16', 'Ejecutiva', 'Standard', 'MLBA1-473334-3841270001657482078', 0),
                                                                                                                                                                            (65, 0, '2022-07-10', 2590, 13, '', '2022-06-27', 'Zorzal', '16', 'Turista', 'Standard', 'MLBA1-473334-3521883081657482637', 0),
                                                                                                                                                                            (66, 0, '2022-07-10', 2590, 13, 'Buenos Aires', '1970-01-01', 'Calandria', '8hs', 'Primera clase', 'Standard', 'MMYMM21-12487537651657482667', 0),
                                                                                                                                                                            (67, 0, '2022-07-10', 2590, 13, 'Buenos Aires', '1970-01-01', 'Guanaco', '35 dias', 'Turista', 'Standard', 'AJWKH52-14253232401657482686', 0),
                                                                                                                                                                            (68, 0, '2022-07-10', 2590, 13, 'Ankara', '1970-01-01', 'Colibri', '8hs', 'Turista', 'Standard', 'NKLAS20-17976279421657483057', 0),
                                                                                                                                                                            (69, 0, '2022-07-10', 2590, 13, '', '2022-06-28', 'Zorzal', '26', 'Turista', 'Standard', 'LMBA1-452728-4934923141657483918', 0),
                                                                                                                                                                            (70, 0, '2022-07-10', 2590, 13, '', '2022-06-27', 'Zorzal', '9', 'Turista', 'Standard', 'MLBA1-483738-16268121911657484030', 0),
                                                                                                                                                                            (71, 0, '2022-07-10', 2590, 13, '', '2022-06-27', 'Zorzal', '16', 'Ejecutiva', 'Standard', 'MLBA1-473334-18616443561657484087', 0),
                                                                                                                                                                            (72, 0, '2022-07-10', 2590, 13, 'Ankara', '1970-01-01', 'Colibri', '8hs', 'Ejecutiva', 'Standard', 'KDLXG29-19360263461657484157', 0),
                                                                                                                                                                            (73, 0, '2022-07-10', 2590, 13, 'Buenos Aires', '1970-01-01', 'Guanaco', '35 dias', 'Turista', 'Standard', 'KMGTC52-16453198221657484182', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flight_booking`
--

CREATE TABLE `flight_booking` (
                                  `id` int(11) NOT NULL,
                                  `code` varchar(255) DEFAULT NULL,
                                  `from_id` int(11) DEFAULT NULL,
                                  `to_id` int(11) DEFAULT NULL,
                                  `departure_date` date DEFAULT NULL,
                                  `departure_time` varchar(255) DEFAULT NULL,
                                  `return_` date DEFAULT NULL,
                                  `duration` varchar(255) DEFAULT NULL,
                                  `side` varchar(255) DEFAULT NULL,
                                  `rocket_id` int(11) DEFAULT NULL,
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
                                                                                                                                                                                                                           (5, 'EMGV', 4, 5, '2022-05-30', '14:00hs', NULL, '26hs', 'VUELTA', 2, NULL, NULL, NULL, NULL),
                                                                                                                                                                                                                           (6, '11', 10, NULL, '0000-00-00', '00:00:00', NULL, '8hs', NULL, 1, 34, 1, 1, 13),
                                                                                                                                                                                                                           (11, '24', 11, NULL, '0000-00-00', '00:00:00', NULL, '8hs', NULL, 2, 19, 1, 1, 13),
                                                                                                                                                                                                                           (18, 'XVMVU53', 11, NULL, '0000-00-00', '00:00:00', NULL, '8hs', NULL, 2, 39, 1, 1, 13),
                                                                                                                                                                                                                           (19, 'FBPWQ44', 10, NULL, '0000-00-00', '00:00:00', NULL, '8hs', NULL, 1, 34, 1, 1, 13),
                                                                                                                                                                                                                           (20, 'VUMYM8', 10, NULL, '2022-07-11', '00:00:00', NULL, '8hs', NULL, 1, 1, 1, 1, 13),
                                                                                                                                                                                                                           (21, 'MLVVT14', 10, NULL, '2022-07-06', '00:00:00', NULL, '8hs', NULL, 1, 11, 1, 1, 13),
                                                                                                                                                                                                                           (22, 'XDWDW46', 10, NULL, '2022-07-10', '00:00:00', NULL, '35 dias', NULL, 10, 34, 1, 1, 13),
                                                                                                                                                                                                                           (23, 'TGYDQ44', 10, NULL, '2022-07-10', '00:00:00', NULL, '35 dias', NULL, 10, 34, 1, 1, 13),
                                                                                                                                                                                                                           (24, 'FRTUS36', 10, NULL, '2022-07-10', '00:00:00', NULL, '8hs', NULL, 1, 34, 1, 2, 13),
                                                                                                                                                                                                                           (25, 'IADNJ37', 10, NULL, '2022-07-10', '00:00:00', NULL, '8hs', NULL, 11, 34, 1, 1, 13),
                                                                                                                                                                                                                           (26, 'AIRIP36', 10, NULL, '2022-07-10', '00:00:00', NULL, '8hs', NULL, 11, 34, 1, 1, 13),
                                                                                                                                                                                                                           (27, 'IYUGT44', 11, NULL, '2022-07-10', '00:00:00', NULL, '8hs', NULL, 24, 39, 1, 1, 13),
                                                                                                                                                                                                                           (28, 'DFRUC65', 11, NULL, '2022-07-10', '00:00:00', NULL, '8hs', NULL, 24, 39, 1, 1, 13),
                                                                                                                                                                                                                           (29, 'UIGEE24', 11, NULL, '2022-07-13', '00:00:00', NULL, '8hs', NULL, 24, 14, 1, 1, 13),
                                                                                                                                                                                                                           (30, 'PWQPE41', 11, NULL, '2022-07-10', '00:00:00', NULL, '8hs', NULL, 24, 39, 1, 1, 13),
                                                                                                                                                                                                                           (31, 'XAINU26', 10, NULL, '2022-07-15', '00:00:00', NULL, '8hs', NULL, 11, 21, 1, 1, 13),
                                                                                                                                                                                                                           (32, 'JWLOM18', 10, NULL, '2022-07-12', '00:00:00', NULL, '8hs', NULL, 11, 6, 1, 1, 13),
                                                                                                                                                                                                                           (33, 'YIRMJ12', 10, NULL, '2022-07-12', '00:00:00', NULL, '8hs', NULL, 11, 6, 1, 1, 13),
                                                                                                                                                                                                                           (34, 'GIXRQ11', 11, NULL, '2022-07-11', '00:00:00', NULL, '8hs', NULL, 24, 4, 1, 1, 13),
                                                                                                                                                                                                                           (35, 'YCQXS64', 11, NULL, '2022-07-10', '00:00:00', NULL, '8hs', NULL, 24, 39, 1, 1, 13),
                                                                                                                                                                                                                           (36, 'BDJOS49', 10, NULL, '2022-07-10', '00:00:00', NULL, '8hs', NULL, 11, 34, 1, 1, 13),
                                                                                                                                                                                                                           (37, 'TMCXL20', 11, NULL, '2022-07-12', '00:00:00', NULL, '8hs', NULL, 24, 9, 1, 1, 13),
                                                                                                                                                                                                                           (38, 'HGIVJ39', 10, NULL, '2022-07-10', '00:00:00', NULL, '8hs', NULL, 11, 34, 1, 1, 13),
                                                                                                                                                                                                                           (39, 'YCLCB15', 11, NULL, '2022-07-13', '00:00:00', NULL, '8hs', NULL, 24, 14, 1, 1, 13),
                                                                                                                                                                                                                           (40, 'GWQQI16', 10, NULL, '2022-07-12', '00:00:00', NULL, '8hs', NULL, 11, 6, 1, 1, 13),
                                                                                                                                                                                                                           (41, 'MXGMR42', 11, NULL, '2022-07-13', '00:00:00', NULL, '8hs', NULL, 24, 14, 1, 1, 13),
                                                                                                                                                                                                                           (42, 'JBEQU40', 11, NULL, '2022-07-10', '00:00:00', NULL, '8hs', NULL, 24, 39, 1, 1, 13),
                                                                                                                                                                                                                           (43, 'YJAWK19', 11, NULL, '2022-07-12', '00:00:00', NULL, '8hs', NULL, 24, 9, 1, 1, 13),
                                                                                                                                                                                                                           (44, 'SFXYB58', 10, NULL, '2022-07-10', '00:00:00', NULL, '35 dias', NULL, 34, 34, 1, 1, 13),
                                                                                                                                                                                                                           (45, 'KFVOG44', 10, NULL, '2022-07-17', '00:00:00', NULL, '8hs', NULL, 11, 34, 1, 1, 13),
                                                                                                                                                                                                                           (46, 'IDTLA29', 11, NULL, '2022-07-12', '00:00:00', NULL, '8hs', NULL, 24, 9, 1, 1, 13),
                                                                                                                                                                                                                           (47, 'ROSAV37', 10, NULL, '2022-07-17', '00:00:00', NULL, '8hs', NULL, 11, 34, 1, 1, 13),
                                                                                                                                                                                                                           (48, 'GBLFQ21', 10, NULL, '2022-07-13', '00:00:00', NULL, '8hs', NULL, 11, 11, 1, 1, 13),
                                                                                                                                                                                                                           (49, 'TYOWS26', 10, NULL, '2022-07-13', '00:00:00', NULL, '8hs', NULL, 11, 11, 1, 1, 13),
                                                                                                                                                                                                                           (50, 'IMMBR15', 11, NULL, '2022-07-11', '00:00:00', NULL, '8hs', NULL, 24, 4, 1, 1, 13),
                                                                                                                                                                                                                           (51, 'PKGCP74', 10, NULL, '2022-07-17', '00:00:00', NULL, '35 dias', NULL, 34, 34, 1, 1, 13),
                                                                                                                                                                                                                           (52, 'GTCFS12', 10, NULL, '2022-07-13', '00:00:00', NULL, '8hs', NULL, 11, 11, 1, 1, 13),
                                                                                                                                                                                                                           (53, 'HWODY62', 10, NULL, '2022-07-17', '00:00:00', NULL, '35 dias', NULL, 34, 34, 1, 1, 13),
                                                                                                                                                                                                                           (54, 'KXHTA16', 10, NULL, '2022-07-12', '00:00:00', NULL, '8hs', NULL, 11, 6, 1, 1, 13),
                                                                                                                                                                                                                           (55, 'LJKAS17', 10, NULL, '2022-07-12', '00:00:00', NULL, '8hs', NULL, 11, 6, 1, 1, 13),
                                                                                                                                                                                                                           (56, 'QBGCU29', 11, NULL, '2022-07-12', '00:00:00', NULL, '8hs', NULL, 24, 9, 1, 1, 13),
                                                                                                                                                                                                                           (57, 'VDDFP55', 11, NULL, '2022-07-17', '00:00:00', NULL, '8hs', NULL, 24, 39, 1, 1, 13),
                                                                                                                                                                                                                           (58, 'RTRFA12', 10, NULL, '2022-07-12', '00:00:00', NULL, '8hs', NULL, 11, 6, 1, 1, 13),
                                                                                                                                                                                                                           (59, 'TDHDV18', 10, NULL, '2022-07-12', '00:00:00', NULL, '8hs', NULL, 11, 6, 1, 1, 13),
                                                                                                                                                                                                                           (60, 'XQLJL42', 11, NULL, '2022-07-17', '00:00:00', NULL, '8hs', NULL, 24, 39, 1, 1, 13),
                                                                                                                                                                                                                           (61, 'GKJOU6', 10, NULL, '2022-07-11', '00:00:00', NULL, '8hs', NULL, 11, 1, 1, 1, 13),
                                                                                                                                                                                                                           (62, 'RMKPT7', 11, NULL, '2022-07-11', '00:00:00', NULL, '8hs', NULL, 24, 4, 1, 1, 13),
                                                                                                                                                                                                                           (63, 'OAINT33', 11, NULL, '2022-07-15', '00:00:00', NULL, '8hs', NULL, 24, 24, 1, 1, 13),
                                                                                                                                                                                                                           (64, 'SJPCM54', 10, NULL, '2022-07-17', '00:00:00', NULL, '35 dias', NULL, 34, 34, 1, 1, 13),
                                                                                                                                                                                                                           (65, 'MDELR52', 10, NULL, '2022-07-17', '00:00:00', NULL, '35 dias', NULL, 34, 34, 1, 1, 13),
                                                                                                                                                                                                                           (66, 'SJSOP14', 11, NULL, '2022-07-11', '00:00:00', NULL, '8hs', NULL, 24, 4, 1, 1, 13),
                                                                                                                                                                                                                           (67, 'ERVHY77', 10, NULL, '2022-07-17', '00:00:00', NULL, '35 dias', NULL, 34, 34, 1, 1, 13),
                                                                                                                                                                                                                           (68, 'FDBXJ13', 10, NULL, '2022-07-13', '00:00:00', NULL, '8hs', NULL, 11, 11, 1, 1, 13),
                                                                                                                                                                                                                           (69, 'DJLFS11', 10, NULL, '2022-07-13', '00:00:00', NULL, '8hs', NULL, 11, 11, 1, 1, 13),
                                                                                                                                                                                                                           (70, 'SBAXQ28', 10, NULL, '2022-07-15', '00:00:00', NULL, '8hs', NULL, 11, 21, 1, 2, 13),
                                                                                                                                                                                                                           (71, 'WQNSC51', 10, NULL, '2022-07-17', '00:00:00', NULL, '35 dias', NULL, 34, 34, 1, 1, 13),
                                                                                                                                                                                                                           (72, 'BBBFT37', 10, NULL, '2022-07-17', '00:00:00', NULL, '8hs', NULL, 11, 34, 1, 1, 13),
                                                                                                                                                                                                                           (73, 'WHUGV16', 11, NULL, '2022-07-11', '00:00:00', NULL, '8hs', NULL, 24, 4, 1, 1, 13),
                                                                                                                                                                                                                           (74, 'SFWVP22', 11, NULL, '2022-07-12', '00:00:00', NULL, '8hs', NULL, 24, 9, 1, 1, 13),
                                                                                                                                                                                                                           (75, 'AXRNR24', 10, NULL, '2022-07-13', '00:00:00', NULL, '8hs', NULL, 11, 11, 1, 1, 13),
                                                                                                                                                                                                                           (77, 'OMTII33', 11, NULL, '2022-07-13', '00:00:00', NULL, '8hs', NULL, 24, 14, 1, 1, 13),
                                                                                                                                                                                                                           (78, 'GXTEL75', 10, NULL, '2022-07-17', '00:00:00', NULL, '35 dias', NULL, 34, 34, 1, 1, 13),
                                                                                                                                                                                                                           (79, 'FVPOX6', 11, NULL, '2022-07-11', '00:00:00', NULL, '8hs', NULL, 24, 4, 1, 1, 13),
                                                                                                                                                                                                                           (80, 'KINNF13', 10, NULL, '2022-07-12', '00:00:00', NULL, '8hs', NULL, 11, 6, 1, 1, 13),
                                                                                                                                                                                                                           (81, 'TJLGY82', 10, NULL, '2022-07-17', '00:00:00', NULL, '35 dias', NULL, 34, 34, 1, 1, 13),
                                                                                                                                                                                                                           (82, 'HXRQH8', 10, NULL, '2022-07-11', '00:00:00', NULL, '8hs', NULL, 11, 1, 1, 1, 13),
                                                                                                                                                                                                                           (83, 'HYBGE7', 10, NULL, '2022-07-12', '00:00:00', NULL, '8hs', NULL, 11, 6, 1, 1, 13),
                                                                                                                                                                                                                           (84, 'YYYAB30', 11, NULL, '2022-07-15', '00:00:00', NULL, '8hs', NULL, 24, 24, 1, 1, 13),
                                                                                                                                                                                                                           (88, 'LMBA1-463132', 0, NULL, '2022-06-28', '', NULL, '22', NULL, 0, 46, 1, 2, 13),
                                                                                                                                                                                                                           (93, 'LMBA1-4631329591484901657481705', 0, NULL, '2022-06-28', '', NULL, '22', NULL, 0, 46, 1, 1, 13),
                                                                                                                                                                                                                           (94, 'LMBA1-463132-12381967391657481805', 0, NULL, '2022-06-28', '', NULL, '22', NULL, 0, 46, 1, 2, 13),
                                                                                                                                                                                                                           (95, 'MLBA1-473334-7311259211657481961', 0, NULL, '2022-06-27', '', NULL, '16', NULL, 0, 47, 1, 2, 13),
                                                                                                                                                                                                                           (96, 'MLBA1-473334-3841270001657482078', 0, NULL, '2022-06-27', '', NULL, '16', NULL, 0, 47, 1, 2, 13),
                                                                                                                                                                                                                           (97, 'MLBA1-473334-3521883081657482637', 0, NULL, '2022-06-27', '', NULL, '16', NULL, 0, 47, 1, 1, 13),
                                                                                                                                                                                                                           (98, 'MMYMM21-12487537651657482667', 10, NULL, '0000-00-00', '00:00:00', NULL, '8hs', NULL, 11, 6, 1, 3, 13),
                                                                                                                                                                                                                           (99, 'AJWKH52-14253232401657482686', 10, NULL, '0000-00-00', '00:00:00', NULL, '35 dias', NULL, 34, 34, 1, 1, 13),
                                                                                                                                                                                                                           (100, 'NKLAS20-17976279421657483057', 11, NULL, '0000-00-00', '00:00:00', NULL, '8hs', NULL, 24, 4, 1, 1, 13),
                                                                                                                                                                                                                           (101, 'LMBA1-452728-4934923141657483918', 0, NULL, '2022-06-28', '', NULL, '26', NULL, 0, 45, 1, 1, 13),
                                                                                                                                                                                                                           (102, 'MLBA1-483738-16268121911657484030', 0, NULL, '2022-06-27', '', NULL, '9', NULL, 0, 48, 1, 1, 13),
                                                                                                                                                                                                                           (103, 'MLBA1-473334-18616443561657484087', 0, NULL, '2022-06-27', '', NULL, '16', NULL, 0, 47, 1, 2, 13),
                                                                                                                                                                                                                           (104, 'KDLXG29-19360263461657484157', 11, NULL, '0000-00-00', '00:00:00', NULL, '8hs', NULL, 24, 14, 1, 2, 13),
                                                                                                                                                                                                                           (105, 'KMGTC52-16453198221657484182', 10, NULL, '0000-00-00', '00:00:00', NULL, '35 dias', NULL, 34, 34, 1, 1, 13);

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
                        `sort_` int(11) DEFAULT NULL,
                        `space_flight_id` int(11) DEFAULT NULL,
                        `acum_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lane`
--

INSERT INTO `lane` (`id`, `route_id`, `station_id`, `duration`, `flight_type_id`, `sort_`, `space_flight_id`, `acum_time`) VALUES
                                                                                                                               (1, 1, 1, 4, 2, 1, NULL, 0),
                                                                                                                               (2, 1, 1, 3, 3, 1, NULL, 0),
                                                                                                                               (3, 1, 2, 1, 2, 2, NULL, 0),
                                                                                                                               (4, 1, 2, 1, 3, 2, NULL, 0),
                                                                                                                               (5, 1, 3, 16, 2, 3, NULL, 0),
                                                                                                                               (6, 1, 3, 9, 3, 3, NULL, 0),
                                                                                                                               (7, 1, 4, 26, 2, 4, NULL, 0),
                                                                                                                               (8, 1, 4, 22, 3, 4, NULL, 0),
                                                                                                                               (9, 2, 1, 4, 2, 1, NULL, 0),
                                                                                                                               (10, 2, 1, 3, 3, 1, NULL, 0),
                                                                                                                               (11, 2, 3, 14, 2, 2, NULL, 0),
                                                                                                                               (12, 2, 3, 10, 3, 2, NULL, 0),
                                                                                                                               (13, 2, 4, 26, 2, 3, NULL, 0),
                                                                                                                               (14, 2, 4, 22, 3, 3, NULL, 0),
                                                                                                                               (15, 2, 5, 48, 2, 4, NULL, 0),
                                                                                                                               (16, 2, 5, 32, 3, 4, NULL, 0),
                                                                                                                               (17, 2, 6, 50, 2, 5, NULL, 0),
                                                                                                                               (18, 2, 6, 33, 3, 5, NULL, 0),
                                                                                                                               (19, 2, 7, 51, 2, 6, NULL, 0),
                                                                                                                               (20, 2, 7, 35, 3, 6, NULL, 0),
                                                                                                                               (21, 2, 8, 70, 2, 7, NULL, 0),
                                                                                                                               (22, 2, 8, 50, 3, 7, NULL, 0),
                                                                                                                               (23, 2, 9, 77, 2, 8, NULL, 0),
                                                                                                                               (24, 2, 9, 52, 3, 8, NULL, 0),
                                                                                                                               (25, 1, 1, 4, 2, 1, 45, 0),
                                                                                                                               (26, 1, 2, 1, 2, 2, 45, 5),
                                                                                                                               (27, 1, 3, 16, 2, 3, 45, 21),
                                                                                                                               (28, 1, 4, 26, 2, 4, 45, 47),
                                                                                                                               (29, 1, 1, 3, 3, 1, 46, 0),
                                                                                                                               (30, 1, 2, 1, 3, 2, 46, 4),
                                                                                                                               (31, 1, 3, 9, 3, 3, 46, 13),
                                                                                                                               (32, 1, 4, 22, 3, 4, 46, 35),
                                                                                                                               (33, 1, 4, 26, 2, 1, 47, 0),
                                                                                                                               (34, 1, 3, 16, 2, 2, 47, 26),
                                                                                                                               (35, 1, 2, 1, 2, 3, 47, 42),
                                                                                                                               (36, 1, 1, 4, 2, 4, 47, 43),
                                                                                                                               (37, 1, 4, 22, 3, 1, 48, 0),
                                                                                                                               (38, 1, 3, 9, 3, 2, 48, 22),
                                                                                                                               (39, 1, 2, 1, 3, 3, 48, 31),
                                                                                                                               (40, 1, 1, 3, 3, 4, 48, 32),
                                                                                                                               (41, 1, 10, 4, 2, 4, 47, 47),
                                                                                                                               (42, 1, 10, 3, 3, 4, 48, 35);

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
                                                                                                                                                                       (45, 'L', 2, 44, '47hs', '10', 2, 1, '2022-06-27 08:00:00', '08:00:00'),
                                                                                                                                                                       (46, 'L', 2, 44, '35hs', '10', 3, 1, '2022-06-27 16:00:00', '16:00:00'),
                                                                                                                                                                       (47, 'L', 2, 44, '47hs', '4', 2, 1, '2022-06-27 08:00:00', '08:00:00'),
                                                                                                                                                                       (48, 'L', 2, 44, '35hs', '4', 3, 1, '2022-06-27 16:00:00', '16:00:00');

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
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
    ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `flight_booking`
--
ALTER TABLE `flight_booking`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_flight_code` (`code`);

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
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `flight_booking`
--
ALTER TABLE `flight_booking`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `flight_level`
--
ALTER TABLE `flight_level`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `lane`
--
ALTER TABLE `lane`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
