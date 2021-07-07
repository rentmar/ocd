-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-07-2021 a las 00:23:09
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ocdmonitor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actor`
--

CREATE TABLE `actor` (
  `idactor` smallint(4) UNSIGNED NOT NULL,
  `nombre_actor` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actor`
--

INSERT INTO `actor` (`idactor`, `nombre_actor`) VALUES
(1, 'Pertenece al Organo Legislativo'),
(2, 'Pertenece al Organo Ejecutivo'),
(3, 'Pertenece al Organo Judicial'),
(4, 'Pertenece al Organo Electoral'),
(5, 'Pertenece a un partido politico'),
(6, 'Pertenece a la sociedad civil'),
(7, 'Pertenece al Organo Ejecutivo Departamental'),
(8, 'Pertenece al Organo Legislativo Departamental'),
(9, 'Pertenece al Organo Ejecutivo Municipal'),
(10, 'Pertenece al Organo Legislativo Municipal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('3f53595f48eb10ce1fc705f0ec37c03d2f767072', '127.0.0.1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313632353639353837363b6964656e746974797c733a31313a226d6f6e2d616c667265646f223b757365726e616d657c733a31313a226d6f6e2d616c667265646f223b656d61696c7c733a31373a22616c667265646f40676d61696c2e636f6d223b757365725f69647c733a313a2235223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231363235363935373636223b6c6173745f636865636b7c693a313632353639353837363b),
('d4dbc415d44ca396338d0c4cc393b376dcdd0b68', '127.0.0.1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313632353639353736363b6964656e746974797c733a31313a226d6f6e2d616c667265646f223b757365726e616d657c733a31313a226d6f6e2d616c667265646f223b656d61696c7c733a31373a22616c667265646f40676d61696c2e636f6d223b757365725f69647c733a313a2235223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231363235363831393935223b6c6173745f636865636b7c693a313632353639353736363b),
('dff8cf1d4a77863b1e237f45c82ab7d3c97ede77', '127.0.0.1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313632353639363238313b6964656e746974797c733a31313a226d6f6e2d616c667265646f223b757365726e616d657c733a31313a226d6f6e2d616c667265646f223b656d61696c7c733a31373a22616c667265646f40676d61696c2e636f6d223b757365725f69647c733a313a2235223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231363235363936313538223b6c6173745f636865636b7c693a313632353639363238313b),
('fc8983cea9ecfa71754ad922aec78cd83310c585', '127.0.0.1', '0000-00-00 00:00:00', 0x5f5f63695f6c6173745f726567656e65726174657c693a313632353639363135383b6964656e746974797c733a31313a226d6f6e2d616c667265646f223b757365726e616d657c733a31313a226d6f6e2d616c667265646f223b656d61696c7c733a31373a22616c667265646f40676d61696c2e636f6d223b757365725f69647c733a313a2235223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231363235363935383736223b6c6173745f636865636b7c693a313632353639363135383b);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE `cuestionario` (
  `idcuestionario` smallint(2) UNSIGNED NOT NULL,
  `nombre_cuestionario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuestionario`
--

INSERT INTO `cuestionario` (`idcuestionario`, `nombre_cuestionario`) VALUES
(1, 'Reforma Electoral'),
(2, 'Institucionalidad Democratica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `iddepartamento` smallint(3) UNSIGNED NOT NULL,
  `nombre_departamento` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `nombre_departamento`) VALUES
(1, 'La Paz'),
(2, 'Santa Cruz'),
(3, 'Oruro'),
(4, 'Cochabamba'),
(5, 'Chuquisaca'),
(6, 'Tarija'),
(7, 'Beni'),
(8, 'Pando'),
(9, 'Potosi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'docentes', 'Usuarios generales, docentes'),
(3, 'monitores', 'Alumnos registrados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio_comunicacion`
--

CREATE TABLE `medio_comunicacion` (
  `idmedio` smallint(5) UNSIGNED NOT NULL,
  `nombre_medio` varchar(50) NOT NULL,
  `rel_idtipomedio` smallint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medio_comunicacion`
--

INSERT INTO `medio_comunicacion` (`idmedio`, `nombre_medio`, `rel_idtipomedio`) VALUES
(1, 'LA PALABRA DEL BENI', 4),
(2, 'CORREO DEL SUR', 4),
(3, 'LOS TIEMPOS', 4),
(4, 'OPINIÓN', 4),
(5, 'PAGINA 7 ', 4),
(6, 'BOLIVIA', 4),
(7, 'LA PATRIA', 4),
(8, 'PERLA DEL ACRE', 4),
(9, 'EL POTOSÍ', 4),
(10, 'EL DEBER ', 4),
(11, 'EL PAÍS', 4),
(12, 'PERIODICO DIGITAL', 4),
(13, 'BTV', 2),
(14, 'TVU', 2),
(15, 'UNITEL', 2),
(16, 'BOLIVISIÓN', 2),
(17, 'ATB', 2),
(18, 'RED UNO', 2),
(19, 'CEACOM 51', 2),
(20, 'PANDO VISIÓN', 2),
(21, 'SITEL', 2),
(22, 'TV DEL SUR', 2),
(23, 'REITEL TV', 5),
(24, 'BTV - Rural', 5),
(25, 'COTEVI TV', 5),
(26, 'PLUS TLT', 5),
(27, 'GIGAVISIÓN', 2),
(28, 'FIDES', 3),
(29, 'GLOBAL', 3),
(30, 'KANCHA PARLASPA', 3),
(32, 'PANAMERICANA', 3),
(33, 'LA CRUZ DEL SUR', 3),
(34, 'UNIVERSITARIA', 3),
(35, 'PANDO', 3),
(36, 'KOLLASUYO', 3),
(37, 'RADIO SC', 3),
(38, 'ACTIVA', 3),
(39, 'SAN MIGUEL ', 6),
(40, 'ACLO', 6),
(41, 'SOBERANÍA', 6),
(42, 'ILLIMANI', 6),
(43, 'ERBOL', 6),
(44, 'PIO XII', 6),
(45, 'FIDES - Rural', 6),
(46, 'PANAMERICANA - Rural', 6),
(47, 'TURBO', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio_departamento`
--

CREATE TABLE `medio_departamento` (
  `idmediodepartamento` int(11) UNSIGNED NOT NULL,
  `rel_idmedio` smallint(5) UNSIGNED NOT NULL,
  `rel_iddepartamento` smallint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medio_departamento`
--

INSERT INTO `medio_departamento` (`idmediodepartamento`, `rel_idmedio`, `rel_iddepartamento`) VALUES
(1, 1, 7),
(2, 13, 7),
(3, 23, 7),
(4, 28, 7),
(5, 39, 7),
(6, 2, 5),
(7, 14, 5),
(8, 24, 5),
(9, 29, 5),
(10, 40, 5),
(11, 3, 4),
(12, 4, 4),
(13, 15, 4),
(14, 16, 4),
(15, 24, 4),
(16, 30, 4),
(17, 28, 4),
(18, 41, 4),
(19, 42, 4),
(20, 5, 1),
(21, 6, 1),
(22, 17, 1),
(23, 18, 1),
(24, 24, 1),
(25, 28, 1),
(26, 32, 1),
(27, 42, 1),
(28, 43, 1),
(29, 7, 3),
(30, 19, 3),
(31, 16, 3),
(32, 24, 3),
(33, 28, 3),
(34, 33, 3),
(35, 42, 3),
(36, 44, 3),
(37, 8, 8),
(38, 15, 8),
(39, 20, 8),
(40, 24, 8),
(41, 34, 8),
(42, 35, 8),
(43, 42, 8),
(44, 44, 8),
(45, 9, 9),
(46, 21, 9),
(47, 22, 9),
(48, 25, 9),
(49, 36, 9),
(50, 28, 9),
(51, 45, 9),
(52, 46, 9),
(53, 11, 6),
(54, 12, 6),
(55, 15, 6),
(56, 27, 6),
(57, 26, 6),
(58, 24, 6),
(59, 28, 6),
(60, 40, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `idnoticia` int(11) UNSIGNED NOT NULL,
  `fecha_registro` int(11) NOT NULL,
  `fecha_noticia` int(11) NOT NULL,
  `titular` varchar(200) NOT NULL,
  `resumen` text NOT NULL,
  `url_noticia` varchar(150) DEFAULT NULL,
  `rel_idactor` smallint(4) UNSIGNED NOT NULL,
  `rel_idsubtema` smallint(5) UNSIGNED NOT NULL,
  `rel_idmedio` smallint(5) UNSIGNED NOT NULL,
  `rel_idusuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtema`
--

CREATE TABLE `subtema` (
  `idsubtema` smallint(5) UNSIGNED NOT NULL,
  `nombre_subtema` varchar(150) NOT NULL,
  `rel_idtema` smallint(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `subtema`
--

INSERT INTO `subtema` (`idsubtema`, `nombre_subtema`, `rel_idtema`) VALUES
(1, 'Estatutos de organizaciones políticas – Ley 1096', 1),
(2, 'Competencias del TSE', 2),
(3, 'Tutela de derechos políticos', 2),
(4, 'Juzgamiento de faltas y delitos electorales', 2),
(5, 'Redistribución de escaños a nivel nacional', 3),
(6, 'Redistribución de escaños a nivel departamental', 3),
(7, 'Redistribución del número de concejales del municipio', 3),
(8, 'Irregularidades del padrón', 8),
(9, 'Plataforma tecnológica del padrón', 8),
(10, 'Inclusión de poblaciones indígenas', 8),
(11, 'Intercambio de información con el SEGIP', 8),
(12, 'Cartografía electoral', 4),
(13, 'Delimitación de circunscripciones', 4),
(14, 'Selección y capacitación de notarios', 9),
(15, 'Capacitación de jurados electorales', 9),
(16, 'Estrategia de educación cívica y ciudadana', 9),
(17, 'Papel de los medios de comunicación en campaña electoral', 9),
(18, 'Financiamiento en etapas electorales y no electorales', 10),
(19, 'Procedimientos para el traslado de actas', 7),
(20, 'Procedimientos para el juzgamiento de actas', 7),
(21, 'Plazos para entrega de resultados', 7),
(22, 'Fechas de presentación de candidaturas e inhabilitaciones', 6),
(23, 'Sanciones por la difusión de encuestas electorales', 5),
(24, 'Requisitos de habilitación de empresas encuestadoras', 5),
(25, 'Garantías para el ejercicio de los derechos de los individuos frente a la arbitrariedad de los gobernantes', 11),
(26, 'Garantía del ejercicio de derechos políticos y su profundización', 11),
(27, 'Progresiva realización de igualdad política, social y económica', 11),
(28, 'Derecho a elegir, a ser elegido y a ocupar cargos públicos', 11),
(29, 'Libertad de expresión', 11),
(30, 'Acceso a la información', 11),
(31, 'Separación y equilibrio entre los órganos ejecutivo, legislativo y judicial', 14),
(32, 'Parlamento representativo y con pluralismo político', 14),
(33, 'Consolidación del estado de derecho o respeto a la ley', 14),
(34, 'Igualdad de todos los ciudadanos ante la ley', 14),
(35, 'El poder judicial es efectivamente independiente', 14),
(36, 'Participación de los ciudadanos en las decisiones políticas', 14),
(37, 'Participación de los ciudadanos en el diseño de políticas públicas', 14),
(38, 'Delimitación de circunscripciones', 14),
(39, 'Elegir en libertad, sin discriminación ni exclusión', 13),
(40, 'Elecciones libres, regulares y transparentes', 13),
(41, 'Libertad para ser elegido', 13),
(42, 'Libertad de asociación', 13),
(43, 'Competencia igual por cargos públicos', 13),
(44, 'Participación de la mujer', 12),
(45, 'Participación de poblaciones indígenas', 12),
(46, 'La acción de lo representantes está jurídicamente limitada a los deseos de los representados', 15),
(47, 'Los representantes disponen de recursos para exigir que se respeten sus decisiones', 15),
(48, 'Rendición de cuentas del uso de recursos públicos', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `idtema` smallint(4) UNSIGNED NOT NULL,
  `nombre_tema` varchar(150) NOT NULL,
  `rel_idcuestionario` smallint(2) UNSIGNED NOT NULL,
  `rel_idusuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`idtema`, `nombre_tema`, `rel_idcuestionario`, `rel_idusuario`) VALUES
(1, 'Presentacion de Estatutos de organizaciones politicas', 1, 1),
(2, 'Competencias Jurisdicionales del TSE', 1, 1),
(3, 'Redistribuicion de Escaños', 1, 1),
(4, 'Circunscripciones uninominales', 1, 1),
(5, 'Difusion de encuestas', 1, 1),
(6, 'Inhabilitacion de candidatos', 1, 1),
(7, 'Computo departamental', 1, 1),
(8, 'Padron Electoral', 1, 1),
(9, 'Procedimientos Tecnico Electorales', 1, 1),
(10, 'Financiamiento politico y partidario', 1, 1),
(11, 'Ejercicio en libertad de derechos políticos', 2, 1),
(12, 'Inclusión política', 2, 1),
(13, 'Participación en el ámbito electoral', 2, 1),
(14, 'Integración de los ciudadanos en la definición y gestión del Estado', 2, 1),
(15, 'Instituciones', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_medio`
--

CREATE TABLE `tipo_medio` (
  `idtipomedio` smallint(3) UNSIGNED NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_medio`
--

INSERT INTO `tipo_medio` (`idtipomedio`, `nombre_tipo`) VALUES
(1, 'Pagina de Red Social'),
(2, 'Canal de Televisión'),
(3, 'Emisora radial'),
(4, 'Prensa Escrita'),
(5, 'TV Rural'),
(6, 'Radio Rural');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `carnet_identidad` varchar(20) DEFAULT NULL,
  `geolocalizacion` varchar(250) DEFAULT NULL,
  `rel_iddepartamento` smallint(3) UNSIGNED NOT NULL,
  `direccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `carnet_identidad`, `geolocalizacion`, `rel_iddepartamento`, `direccion`) VALUES
(1, '127.0.0.1', 'admin', '$2y$12$bGXrgAr0ErDJt2ICW/f2v.6M1LOI2l6KqFvj9Ot0rLPGdYy8h2sle', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1625358607, 1, 'Admin', 'istrator', 'ADMIN', '0', '0', 'geolocalizacion', 1, NULL),
(2, '127.0.0.1', 'marcelo', '$2y$10$cvMbrdm9qpYyudrwhq3mu.yimTBsIywbbXoNEu4bRo4oRm82RGtye', 'MRolqueza@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625062770, 1625414827, 1, 'Marcelo', 'Rolqueza', NULL, NULL, '4834568', 'GEOLOCALIZACION', 1, 'Mariano Colodro #1447'),
(3, '127.0.0.1', 'albert', '$2y$10$viKV5QXqqrNbc5MMPx8kyuXLOWDMjYU5uLBlgGhjwqM3C0H9vFtT6', 'albert@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625062902, 1625414291, 1, 'Alberto', 'Cruzo', NULL, NULL, '4444444', '4.5', 7, 'Calle Montes #5555'),
(4, '127.0.0.1', 'jcarlos', '$2y$10$xj7vhmTVFZOMLHbKfrhz.O2l37pN7cssOOBM0mGsXZ1A9B4S3se.W', 'almeyda@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625358200, NULL, 1, 'Juan Carlos', 'Almeyda', NULL, NULL, '48693587', '45465456456456454', 4, 'Calle Alberto #4323'),
(5, '127.0.0.1', 'mon-alfredo', '$2y$10$qzrbE.2JZUSt/AAi7.ObZuBYsK3/R6YJANzOSJvxp7aHSPXIuhTWi', 'alfredo@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625415047, 1625696281, 1, 'Alfredo R.', 'Torrico L.', NULL, NULL, NULL, NULL, 1, NULL),
(6, '127.0.0.1', 'mon-claudia', '$2y$10$oq9duUb2wp.cOrNj0h.oouNPk7redo3vaUlwpKEsrfT.Q4nN7.A9C', 'claudia@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625415426, 1625420030, 1, 'Claudia', 'Arteaga', NULL, NULL, '49512234654', '546545456456454654', 4, 'Av. Sucre #4452'),
(7, '127.0.0.1', 'mon-carlos', '$2y$10$qzJf1mPzU1NH0EJ6YIwZ.uL2P18cx3OaAkYjIy.F5En57hbNrWJBe', 'carlos@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625415550, 1625419998, 1, 'Carlos', 'Olivera', NULL, NULL, '495452121', '94945454654654', 2, 'Av. Circunvalacion #476'),
(8, '127.0.0.1', 'mon-adriana', '$2y$10$kVDfs/u3izDKtmAJCieTb.PJNrV6SYQv3vazv3fV4kXw1.aJ3ZCHG', 'adrianitajus98@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625674404, NULL, 1, 'Adriana', 'Mier Justiniano', NULL, NULL, '6787516', '', 1, ''),
(9, '127.0.0.1', 'mon-alejandro', '$2y$10$u.4.qtFJYfAEoPnNXaYOZeeA6Foyfw5QCDjLcSpA26NPinNaclhMO', '201907084@ est.edu.bo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625674506, NULL, 1, 'Alejandro', 'Galindo Wieler', NULL, NULL, '00', '', 4, ''),
(10, '127.0.0.1', 'mon-alison', '$2y$10$u/6WP7Hnfa1BQQ7M0RtJVOfHunpiTN3wJjn5vzrVx7Q5Q8BxMoPD2', 'alison.sthephanie30@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625674629, NULL, 1, 'Alison', 'Romero', NULL, NULL, '8537724', '', 1, ''),
(11, '127.0.0.1', 'mon-ami', '$2y$10$Q3Y8QpHoHPVEb2u5pmJtAebSM7IcIetvLCnQUXGs/2urqDlGnrAqC', 'amisita_la_seri@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625675771, NULL, 1, 'Ami', 'Cruz Amacifen', NULL, NULL, '4217053', '', 8, ''),
(12, '127.0.0.1', 'mon-andres', '$2y$10$K925qdJA4PPWbjmdB/mVQuZZdXAXOfOGtIFFoD6JglaARZiuJowQ6', 'andresventiadesb@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625675847, NULL, 1, 'Andrés', 'Ventiades Velásquez ', NULL, NULL, '13905327', '', 5, ''),
(13, '127.0.0.1', 'mon-angelo', '$2y$10$frwfgKIzEEtuXd1pnYAX2Oj62X9CaA9t7mcLCIgBRkEn5OwmjPPAq', 'ap819994@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676142, NULL, 1, 'Angelo Michael', 'Perez Pool ', NULL, NULL, '7351503', '', 3, ''),
(14, '127.0.0.1', 'mon-belen', '$2y$10$80ltEsx4ns0nfK8/iBdfXO4CAcUoxxsIFqF0OhNIW/BMobpcQWypm', 'anabelengl24@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676205, NULL, 1, 'Ana Belen', 'Gutierrez Lopez', NULL, NULL, '9779920', '', 2, ''),
(15, '127.0.0.1', 'mon-bernardo', '$2y$10$qe8865xObWmbnq1q8EB0O.uQGSEUXZyljFd0EVhKIyCWGmfHO/zJ6', 'enzobernardogallo@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676259, NULL, 1, 'Bernardo', 'Gallo', NULL, NULL, '12578751', '', 1, ''),
(16, '127.0.0.1', 'mon-cecilia', '$2y$10$x8xji0mC62TwN5AZJ6tcg.BCWWtD480jC09r72tTX1IVy8gf28M/2', 'ceciliajustiniano306@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676367, NULL, 1, 'Cecilia', 'Justiniano Escalante', NULL, NULL, '12475248', '', 2, ''),
(17, '127.0.0.1', 'mon-cristian', '$2y$10$ZkPhZsLt7V2NjJFZTD7mqelkwVk0b1Xpcgcj.vv9NHeOBkIez.qNO', 'cmisericordia123@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676428, NULL, 1, 'Cristian Alberto', 'Misericordia Morales', NULL, NULL, '7390130', '', 3, ''),
(18, '127.0.0.1', 'mon-daniela', '$2y$10$55nP4beMdkX4xAfTC0vfnulkG6R9HDikFAaK7rnO6aPqdKGE8012y', '202004866@ est.edu.bo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676684, NULL, 1, 'Daniela Rosario', 'Hualuque Rodríguez', NULL, NULL, '0', '', 4, ''),
(19, '127.0.0.1', 'mon-diego', '$2y$10$1JlsIQbtpDEEwDANz5nTouWlDO/k8sxq9/CV2MTHCsSr8PiL7NHqe', 'ayo2019@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676805, NULL, 1, 'Diego', 'Ayoroa', NULL, NULL, '6964639', '', 1, ''),
(20, '127.0.0.1', 'mon-elsifania', '$2y$10$d.GWZs3Yw/SXQLyP7AJavOMSnS.XdVUzhyKvtVvbp/CQZgY6.TSgi', 'fannyolarterojas@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676855, NULL, 1, 'Elsifania', 'Olarte Rojas', NULL, NULL, '1766568', '', 8, ''),
(21, '127.0.0.1', 'mon-erick', '$2y$10$LfEdf4MpfrTxm9tByOqW/uQyJ1mb01DlEETHy1uqAYQxon6VQeASO', 'tapiaerik1500@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676925, NULL, 1, 'Erik Roger ', 'Calizaya Tapia ', NULL, NULL, '10393487', '', 5, ''),
(22, '127.0.0.1', 'mon-ericka', '$2y$10$6xava60aeGfmf0s29weyseDY4nkQmZByMN5R0TILcKIXhe.3M6J0i', 'mniko4218@ gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676994, NULL, 1, 'Erick', 'Alvarado Beltrán ', NULL, NULL, '12681679', '', 4, ''),
(23, '127.0.0.1', 'mon-evelin', '$2y$10$SE7MMZ7n3md5e6tHdLl5Vu7BEX4XEi/iohn68.u331sFUuwKOmzCe', 'evelinmachaca123@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677141, NULL, 1, 'Evelin E.', 'Machaca Flores ', NULL, NULL, '7353738', '', 3, ''),
(24, '127.0.0.1', 'mon-fabiola', '$2y$10$QSCc3/taQIYIYOqUeB2VNuPtP.wxgHRE6NjwW4IFW49gVkVHrRpBi', 'fabi-justiniano-@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677382, NULL, 1, 'Fabiola', 'Justiniano', NULL, NULL, '570431', '', 8, ''),
(25, '127.0.0.1', 'mon-gabriel', '$2y$10$U6SqPiI2dfSohR/iAUKWW.czeDRJZ/HyRECsHAL6SSl5nJSAl0JFK', 'garandiabarrios@gmail.com ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677434, NULL, 1, 'Gabriel ', 'Arandia ', NULL, NULL, '7519015', '', 1, ''),
(26, '127.0.0.1', 'mon-genesis', '$2y$10$jWe6K9Qq155/xDpnPEqVrO0ei0l.Q5JpiZx/pbGO9mYP9r3l.5tL2', 'mier.genesis@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677623, 1625680035, 1, 'Génesis ', 'S/A', NULL, NULL, '5645025', '', 1, ''),
(27, '127.0.0.1', 'mon-gustavo', '$2y$10$tpe.nGYN5IuvCygYIUtFtucPBcIJdV5QY9mCmOqptvO0U8GFfC9Rq', 'mamaniquispegustavo2006@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677685, NULL, 1, 'Gustavo', 'Mamani Quispe ', NULL, NULL, '7288481', '', 3, ''),
(28, '127.0.0.1', 'mon-idar', '$2y$10$XnaHNH4n7jw3ygaRi3ebg.2Tg5X2O9R7zVSpukLdRmM2lcPNl7rD.', 'chubyjuu18hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677745, NULL, 1, 'Idar Josue ', 'Villca Villanueva', NULL, NULL, '7889449', '', 8, ''),
(29, '127.0.0.1', 'mon-jodie', '$2y$10$c3KpX6mLf5OHdTKk.1lwW.psVKkeIfMyUyxVgwfRkdX1N7SrFvL2.', 'michellevillarroeljb@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677848, NULL, 1, 'Jodie Michelle ', 'Bautista Villarroel', NULL, NULL, '8302800', '', 1, ''),
(30, '127.0.0.1', 'mon-julia', '$2y$10$GD0VAoOh082/6rQ3OVv8ze2qmpYl2bTrxDxqytlDUuvppTIljjkX2', 'mise.juli.1991@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677922, NULL, 1, 'Julia Carmen', 'Julia Carmen', NULL, NULL, '7298782', '', 3, ''),
(31, '127.0.0.1', 'mon-keylin', '$2y$10$kX1JLROYSjg3/1Y459BogegWEUGKwBFmsnTHZz/5MaG7U2mQUR3MG', 'kelynsuarez@ gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677986, NULL, 1, 'Keylin', 'Suárez Rojas', NULL, NULL, '9433132', '', 4, ''),
(32, '127.0.0.1', 'mon-kiebel', '$2y$10$i23IBg8Ca8aBjI0iQScuMO1zfL6NK0.OLAbZ55YEyqtd4NiSz7zLa', 'kiebel6garcia6rocabado6@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678075, NULL, 1, 'Kiebel', 'Garcia Rocabado', NULL, NULL, '8043490', '', 4, ''),
(33, '127.0.0.1', 'mon-leidy', '$2y$10$YP94xAOZw.3oyHdCXMgwcej04ZbdByCbsQL9KBwzcfX2kLlQ24KM6', 'sincorreo@correo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678176, NULL, 1, 'Leidy Estefania ', 'Cordero Mamani', NULL, NULL, '5701704', '', 8, ''),
(34, '127.0.0.1', 'mon-leonela', '$2y$10$AHRxM3lTzX6vCviO4JmVaOZZ6kiIjgS0jjMhLHT6m4tC8tVvUTwwO', 'ullcafernandezleonela@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678254, NULL, 1, 'Leonela', 'Sullca Fernández ', NULL, NULL, '9122028', '', 1, ''),
(35, '127.0.0.1', 'mon-luis', '$2y$10$bGIsAr6x6Vc6gk7kWPKdOeuhWuOi0/YpHnRrzAL9EPLSVoSXnE4OS', 'luis@dominio.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678599, NULL, 1, 'Luis David ', 'Santos Suárez', NULL, NULL, '4209452', '', 8, ''),
(36, '127.0.0.1', 'mon-luisb', '$2y$10$4w9gVeRYO2P82rKW6.G8E.WpFfJGBTURgHjDGp2Qd.qoRHQTSb9jO', 'luissdanielabc@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678683, NULL, 1, 'Luis Daniel', 'Salamanca Barral ', NULL, NULL, '8621075', '', 5, ''),
(37, '127.0.0.1', 'mon-luz', '$2y$10$ET3v1Y3jEmRq8lZ2HxFPFOhqbIQam/FHJvinjrAr4tXrjMet9rjKG', 'bordaortusteluzmilena@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678837, NULL, 1, 'Luz Milena', 'Borda Ortuste ', NULL, NULL, '10384512', '', 5, ''),
(38, '127.0.0.1', 'mon-maria', '$2y$10$9fbJUMRXHmfkr8JzuU.wqe.7a9F7mPtMlEvA85tRvXu1tzwK9245W', 'delcielogalindo@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678903, NULL, 1, 'María del Cielo ', 'Galindo', NULL, NULL, '8808885', '', 1, ''),
(39, '127.0.0.1', 'mon-mariac', '$2y$10$TvTELC9mcL5NRlG3Dp1uR.m.xwcXFaYS4dALCz5D12mw4QO19P39e', '202001453@ est.umss.edu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678999, NULL, 1, 'Ma. Celeste', 'Condorhuayra Araoz', NULL, NULL, '14071014', '', 4, ''),
(40, '127.0.0.1', 'mon-mariao', '$2y$10$TgVZu4Af9tJstRWrowoIK.0Ek.2/KDBnkkT/Kh/qRYQXanCsBW7Em', 'vikyosorio123@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679075, NULL, 1, 'María Victoria ', 'Osorio', NULL, NULL, '7208546', '', 1, ''),
(41, '127.0.0.1', 'mon-marioly', '$2y$10$S9EgXybZP/7JepUxA9cqaOAThrpPfZj1RXRdlcJhw05ngIFt9FzXG', 'mariolicruz98@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679162, NULL, 1, 'Marioly', 'Cruz Heredia', NULL, NULL, '9619837', '', 2, ''),
(42, '127.0.0.1', 'mon-mayel', '$2y$10$gjaF9xP2bPEkr.21WXqnWuqCray604Gt/n6Bm5kQePS8Y6.wv0JpG', 'ligiaherbascabrera@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679244, NULL, 1, 'Mavel Ligia ', 'Herbas Cabrera ', NULL, NULL, '975576', '', 4, ''),
(43, '127.0.0.1', 'mon-mihaela', '$2y$10$QK72MT1oZ86xuRSPYxDi2.nc4lafQWkkgzIEfX.MA2KZth1gq4cbK', 'mivigafeQQ@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679307, NULL, 1, 'Mihaela Victoria ', 'Gareca Fernandez', NULL, NULL, '4074239', '', 4, ''),
(44, '127.0.0.1', 'mon-paula', '$2y$10$3sd0GsvARcjpor1bevHaXuAcXGP3gYbSmLwLiXjjs5LWZ1SiM4d5O', 'paulafariast28@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679373, 1625679974, 1, 'Paula Thais ', 'Farías Teran', NULL, NULL, '5597049', '', 4, ''),
(45, '127.0.0.1', 'mon-ralhs', '$2y$10$YIrMU3oHyw/1/ViYavsYReRoOgHfoPjOVdZC/ssds7fnNO0h/YzQO', 'gonsalesporumaemer@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679440, NULL, 1, 'Ralhs W', 'Gonzáles Parumo', NULL, NULL, '4211751', '', 8, ''),
(46, '127.0.0.1', 'mon-ronald', '$2y$10$fBjuFnHXpcT3glOCyF/Fge4zyz8OtRA/wlQuFvkWEaK.GCeHA1HY.', 'ronaldalexiscondori@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679510, NULL, 1, 'Ronald Alexis', 'Condori Fernandez', NULL, NULL, '10653943', '', 2, ''),
(47, '127.0.0.1', 'mon-rosana', '$2y$10$GSJs5F7pt7D7ohryQvnhpem8a63RKrYBd.IcX5bLxvmQsYQ/NDA9a', 'rosivas17@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679577, NULL, 1, 'Rosana Agar', 'Vásquez Pimentel ', NULL, NULL, '6591343', '', 5, ''),
(48, '127.0.0.1', 'mon-sholay', '$2y$10$WXJ8amnAWLdp1sScT69T8uQDL/tYDO0rO6mnlI0mGcHll6EBh7tmG', 'sholaymisericordiamolina@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679666, NULL, 1, 'Sholay Gabriela', 'Misericordia Molina ', NULL, NULL, '7359512', '', 3, ''),
(49, '127.0.0.1', 'mon-taliana', '$2y$10$.pkDJOCdsIZWVRTCc3VWPekFvK85EtGlJp5Lf8Sfjrq9dfHW.1wMO', 'talianamedina1999@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679726, NULL, 1, 'Taliana', 'Quiroga Medina', NULL, NULL, '14656162', '', 2, ''),
(50, '127.0.0.1', 'mon-tania', '$2y$10$Ci5Nqgut1Iv7Lh0CKGsZ2ev/fwU00g4lPIJtIkjJdAUrrFLHiEe.G', 'thewantedtanita@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679786, NULL, 1, 'Tania Adriana ', 'Oros Ortiz', NULL, NULL, '7879403', '', 4, ''),
(51, '127.0.0.1', 'mon-alejandroc', '$2y$10$lubj9zh1AGUxdmXkV40W1.sZBHox5qoLE5NvE.KY2c8hrP4U9NprS', 'alecar@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625688141, 1625688181, 1, 'Alejandro', 'Carvajal', NULL, NULL, '0000', '', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 3, 3),
(6, 4, 3),
(7, 5, 3),
(8, 6, 3),
(9, 7, 3),
(10, 8, 3),
(11, 9, 3),
(12, 10, 3),
(13, 11, 3),
(14, 12, 3),
(15, 13, 3),
(16, 14, 3),
(17, 15, 3),
(18, 16, 3),
(19, 17, 3),
(20, 18, 3),
(21, 19, 3),
(22, 20, 3),
(23, 21, 3),
(24, 22, 3),
(25, 23, 3),
(26, 24, 3),
(27, 25, 3),
(28, 26, 3),
(29, 27, 3),
(30, 28, 3),
(31, 29, 3),
(32, 30, 3),
(33, 31, 3),
(34, 32, 3),
(35, 33, 3),
(36, 34, 3),
(37, 35, 3),
(38, 36, 3),
(39, 37, 3),
(40, 38, 3),
(41, 39, 3),
(42, 40, 3),
(43, 41, 3),
(44, 42, 3),
(45, 43, 3),
(46, 44, 3),
(47, 45, 3),
(48, 46, 3),
(49, 47, 3),
(50, 48, 3),
(51, 49, 3),
(52, 50, 3),
(53, 51, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`idactor`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indices de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD PRIMARY KEY (`idcuestionario`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`iddepartamento`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medio_comunicacion`
--
ALTER TABLE `medio_comunicacion`
  ADD PRIMARY KEY (`idmedio`),
  ADD KEY `FK_mediocomunicaciontipo` (`rel_idtipomedio`);

--
-- Indices de la tabla `medio_departamento`
--
ALTER TABLE `medio_departamento`
  ADD PRIMARY KEY (`idmediodepartamento`),
  ADD KEY `FK_mediodepartamento` (`rel_idmedio`),
  ADD KEY `FK_departamentomedio` (`rel_iddepartamento`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`idnoticia`),
  ADD KEY `FK_actornoticia` (`rel_idactor`),
  ADD KEY `FK_subtemanoticia` (`rel_idsubtema`);

--
-- Indices de la tabla `subtema`
--
ALTER TABLE `subtema`
  ADD PRIMARY KEY (`idsubtema`),
  ADD KEY `rel_idtema` (`rel_idtema`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`idtema`),
  ADD KEY `fk_cuestionariotema` (`rel_idcuestionario`),
  ADD KEY `fk_usuario_tema` (`rel_idusuario`);

--
-- Indices de la tabla `tipo_medio`
--
ALTER TABLE `tipo_medio`
  ADD PRIMARY KEY (`idtipomedio`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indices de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actor`
--
ALTER TABLE `actor`
  MODIFY `idactor` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  MODIFY `idcuestionario` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `iddepartamento` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `medio_comunicacion`
--
ALTER TABLE `medio_comunicacion`
  MODIFY `idmedio` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `medio_departamento`
--
ALTER TABLE `medio_departamento`
  MODIFY `idmediodepartamento` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `idnoticia` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subtema`
--
ALTER TABLE `subtema`
  MODIFY `idsubtema` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `idtema` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tipo_medio`
--
ALTER TABLE `tipo_medio`
  MODIFY `idtipomedio` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medio_comunicacion`
--
ALTER TABLE `medio_comunicacion`
  ADD CONSTRAINT `FK_mediocomunicaciontipo` FOREIGN KEY (`rel_idtipomedio`) REFERENCES `tipo_medio` (`idtipomedio`);

--
-- Filtros para la tabla `medio_departamento`
--
ALTER TABLE `medio_departamento`
  ADD CONSTRAINT `FK_departamentomedio` FOREIGN KEY (`rel_iddepartamento`) REFERENCES `departamento` (`iddepartamento`),
  ADD CONSTRAINT `FK_mediodepartamento` FOREIGN KEY (`rel_idmedio`) REFERENCES `medio_comunicacion` (`idmedio`);

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `FK_actornoticia` FOREIGN KEY (`rel_idactor`) REFERENCES `actor` (`idactor`),
  ADD CONSTRAINT `FK_subtemanoticia` FOREIGN KEY (`rel_idsubtema`) REFERENCES `subtema` (`idsubtema`);

--
-- Filtros para la tabla `subtema`
--
ALTER TABLE `subtema`
  ADD CONSTRAINT `subtema_ibfk_1` FOREIGN KEY (`rel_idtema`) REFERENCES `tema` (`idtema`);

--
-- Filtros para la tabla `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `fk_cuestionariotema` FOREIGN KEY (`rel_idcuestionario`) REFERENCES `cuestionario` (`idcuestionario`),
  ADD CONSTRAINT `fk_usuario_tema` FOREIGN KEY (`rel_idusuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
