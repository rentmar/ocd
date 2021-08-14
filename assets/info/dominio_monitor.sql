-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-08-2021 a las 10:33:21
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
(10, 'Pertenece al Organo Legislativo Municipal'),
(12, 'Pertenece a las Fuerzas Armadas'),
(13, 'Pertenece a la Policía Boliviana');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigoley`
--

CREATE TABLE `codigoley` (
  `idcodigoley` int(11) UNSIGNED NOT NULL,
  `codigo_ley` varchar(50) NOT NULL,
  `rel_idley` int(11) UNSIGNED NOT NULL,
  `rel_idestadoley` smallint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `codigoley`
--

INSERT INTO `codigoley` (`idcodigoley`, `codigo_ley`, `rel_idley`, `rel_idestadoley`) VALUES
(1, 'PL N° 238/2020-2021', 1, 1),
(2, 'Ley modificada', 1, 4),
(3, 'PLA N° 237/2020-2021', 2, 1),
(4, 'PL N° 238/2020-2021', 3, 3),
(5, 'PL-CM N° 028/2020-2021', 4, 4),
(6, 'PLA N° 0058/2020-2021', 5, 1),
(7, 'PL N° 004/2020-2021', 6, 1),
(8, 'asdf asdfafa', 6, 3);

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
(2, 'Institucionalidad Democratica'),
(3, 'Censo'),
(4, 'Leyes');

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
-- Estructura de tabla para la tabla `estadoley`
--

CREATE TABLE `estadoley` (
  `idestadoley` smallint(2) UNSIGNED NOT NULL,
  `nombre_estadoley` varchar(150) NOT NULL,
  `porcentaje_estadoley` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadoley`
--

INSERT INTO `estadoley` (`idestadoley`, `nombre_estadoley`, `porcentaje_estadoley`) VALUES
(1, 'Ley en tratamiento', 20),
(2, 'Ley sancionada', 40),
(3, 'Ley aprobada', 60),
(4, 'Ley con modificacion', 80),
(5, 'Ley promulgada', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuente`
--

CREATE TABLE `fuente` (
  `idfuente` smallint(2) UNSIGNED NOT NULL,
  `nombre_fuente` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fuente`
--

INSERT INTO `fuente` (`idfuente`, `nombre_fuente`) VALUES
(1, 'Web de la Cámara de Diputados'),
(2, 'Archivo de Leyes (Gaceta Oficial de Bolivia)');

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
(3, 'monitores', 'Alumnos registrados'),
(4, 'leyes', 'Usuarios autorizados al formulario ley');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leyes`
--

CREATE TABLE `leyes` (
  `idleyes` int(11) UNSIGNED NOT NULL,
  `fecha_registro` int(11) NOT NULL,
  `resumen` text NOT NULL,
  `rel_idcuestionario` smallint(11) UNSIGNED NOT NULL,
  `rel_idusuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `leyes`
--

INSERT INTO `leyes` (`idleyes`, `fecha_registro`, `resumen`, `rel_idcuestionario`, `rel_idusuario`) VALUES
(1, 1628022631, 'Resumen de la ley', 4, 5),
(2, 1628025080, 'OBJETO adfadf asdfas', 4, 51),
(3, 1628028420, 'OBJETO', 4, 51),
(4, 1628031045, 'OBJETO ', 4, 51),
(5, 1628032045, 'objto', 4, 51),
(6, 1628037738, 'Declarar Primer Centro de Enseñanza y Turístico en materia Ictícola del EPB al Museo.... ', 4, 51);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leyes_estadoley`
--

CREATE TABLE `leyes_estadoley` (
  `idleyesestado` int(11) UNSIGNED NOT NULL,
  `rel_idleyes` int(11) UNSIGNED NOT NULL,
  `rel_idestadoley` smallint(2) UNSIGNED NOT NULL,
  `fecha_estadoley` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `leyes_estadoley`
--

INSERT INTO `leyes_estadoley` (`idleyesestado`, `rel_idleyes`, `rel_idestadoley`, `fecha_estadoley`) VALUES
(1, 1, 1, 1626134400),
(2, 1, 4, 1628640000),
(3, 2, 1, 1626912000),
(4, 3, 3, 1626220800),
(5, 4, 4, 1626825600),
(6, 5, 1, 1627862400),
(7, 6, 1, 1606694400),
(8, 6, 3, 1612915200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leyes_fuente`
--

CREATE TABLE `leyes_fuente` (
  `idleyesfuente` int(11) UNSIGNED NOT NULL,
  `rel_idleyes` int(11) UNSIGNED NOT NULL,
  `rel_idfuente` smallint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `leyes_fuente`
--

INSERT INTO `leyes_fuente` (`idleyesfuente`, `rel_idleyes`, `rel_idfuente`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ley_otrosubtema`
--

CREATE TABLE `ley_otrosubtema` (
  `idleyotrosubtema` int(11) UNSIGNED NOT NULL,
  `rel_idleyes` int(11) UNSIGNED NOT NULL,
  `rel_idotrosubtema` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ley_otrosubtema`
--

INSERT INTO `ley_otrosubtema` (`idleyotrosubtema`, `rel_idleyes`, `rel_idotrosubtema`) VALUES
(1, 6, 87);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ley_otrotema`
--

CREATE TABLE `ley_otrotema` (
  `idleyotrotema` int(11) UNSIGNED NOT NULL,
  `rel_idleyes` int(11) UNSIGNED NOT NULL,
  `rel_idotrotema` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ley_otrotema`
--

INSERT INTO `ley_otrotema` (`idleyotrotema`, `rel_idleyes`, `rel_idotrotema`) VALUES
(1, 1, 166);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ley_subtema`
--

CREATE TABLE `ley_subtema` (
  `idleysubtema` int(10) UNSIGNED NOT NULL,
  `rel_idleyes` int(11) UNSIGNED NOT NULL,
  `rel_idsubtema` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ley_subtema`
--

INSERT INTO `ley_subtema` (`idleysubtema`, `rel_idleyes`, `rel_idsubtema`) VALUES
(1, 1, 106),
(2, 1, 113),
(3, 2, 93),
(4, 3, 136),
(5, 4, 74),
(6, 5, 73);

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
(10, 'LA PALABRA DEL BENI', 4),
(11, 'CORREO DEL SUR', 4),
(12, 'LOS TIEMPOS', 4),
(13, 'OPINIÓN', 4),
(14, 'PAGINA 7 ', 4),
(15, 'LA PATRIA ', 4),
(16, 'EL POTOSÍ', 4),
(17, 'EL DEBER ', 4),
(18, 'EL PAÍS', 4),
(19, 'BTV', 2),
(20, 'TVU', 2),
(21, 'UNITEL', 2),
(22, 'BOLIVISIÓN', 2),
(23, 'ATB', 2),
(24, 'RED UNO', 2),
(25, 'CEACOM 51', 2),
(26, 'CANAL UNIVERSITARIO', 2),
(27, 'SISTEMA PANDINO DE COMUNICACIÓN', 2),
(28, 'TELEVISIÓN UNVERSITARIA ', 2),
(29, 'UNITEL COBIJA', 2),
(30, 'SITEL', 2),
(31, 'REITEL TV', 5),
(32, 'BTV – RURAL', 5),
(33, 'COTEVI TV', 5),
(34, 'PLUS TLT', 5),
(35, 'FIDES', 3),
(36, 'GLOBAL', 3),
(37, 'KANCHA PARLASPA', 3),
(38, 'PANAMERICANA', 3),
(39, 'UNIVERSITARIA', 3),
(40, 'OASIS', 3),
(41, 'PERLA DEL ACRE', 3),
(42, 'KOLLASUYO', 3),
(43, 'RADIO SC', 3),
(44, 'SAN MIGUEL', 6),
(45, 'ACLO', 6),
(46, 'SOBERANÍA', 6),
(47, 'ILLIMANI', 6),
(48, 'PIO XII', 6),
(49, 'FRONTERA', 6),
(50, 'FIDES – RURAL', 6),
(51, 'TURBO', 6),
(52, 'ACLO TARIJA', 6),
(53, 'La Razón', 4),
(54, 'RADIO UNIVERSITARIA', 3),
(55, 'RADIO CENTRO', 6);

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
(1, 10, 7),
(3, 31, 7),
(5, 44, 7),
(6, 11, 5),
(8, 32, 5),
(9, 36, 5),
(21, 12, 4),
(22, 13, 4),
(23, 21, 4),
(24, 22, 4),
(25, 32, 4),
(26, 37, 4),
(28, 46, 4),
(29, 47, 4),
(30, 14, 1),
(31, 23, 1),
(32, 24, 1),
(33, 32, 1),
(34, 38, 1),
(35, 47, 1),
(36, 15, 3),
(37, 25, 3),
(38, 26, 3),
(39, 32, 3),
(40, 39, 3),
(41, 48, 3),
(45, 32, 8),
(46, 40, 8),
(49, 16, 9),
(50, 30, 9),
(51, 33, 9),
(54, 17, 2),
(55, 21, 2),
(56, 24, 2),
(57, 32, 2),
(58, 43, 2),
(59, 51, 2),
(60, 18, 6),
(61, 21, 6),
(62, 34, 6),
(64, 52, 6),
(69, 42, 5),
(70, 42, 9),
(71, 19, 5),
(72, 19, 7),
(73, 45, 5),
(74, 45, 6),
(75, 45, 9),
(82, 53, 1),
(83, 28, 8),
(84, 20, 5),
(85, 29, 8),
(86, 41, 8),
(87, 35, 1),
(88, 35, 4),
(89, 35, 6),
(90, 35, 7),
(91, 35, 8),
(92, 35, 9),
(93, 27, 8),
(94, 49, 8),
(95, 54, 8),
(97, 55, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombreley`
--

CREATE TABLE `nombreley` (
  `idnombreley` int(11) UNSIGNED NOT NULL,
  `nombre_ley` text NOT NULL,
  `rel_idestadoley` smallint(2) UNSIGNED NOT NULL,
  `rel_idley` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nombreley`
--

INSERT INTO `nombreley` (`idnombreley`, `nombre_ley`, `rel_idestadoley`, `rel_idley`) VALUES
(1, 'Prueba insert PROYECTO DE LEY QUE “ESTABLECE INCENTIVOS TRIBUTARIOS A LA IMPORTACIÓN Y COMERCIALIZACIÓN DE BIENES DE CAPITAL Y PLANTAS INDUSTRIALES DE LOS SECTORES AGROPECUARIO E INDUSTRIAL, PARA LA REACTIVACIÓN ECONÓMICA Y FOMENTO DE LA POLÍTICA DE SUSTITUCIÓN DE IMPORTACIÓN”.', 1, 1),
(2, 'Titulo de ley prueba modificacion			', 4, 1),
(3, 'PROYECTO DE LEY “DECENIO DE LAS LENGUAS INDÍGENAS”.', 1, 2),
(4, 'PROYECTO DE LEY QUE “ESTABLECE INCENTIVOS TRIBUTARIOS A LA IMPORTACIÓN Y COMERCIALIZACIÓN DE BIENES DE CAPITAL Y PLANTAS INDUSTRIALES DE LOS SECTORES AGROPECUARIO E INDUSTRIAL, PARA LA REACTIVACIÓN ECONÓMICA Y FOMENTO DE LA POLÍTICA DE SUSTITUCIÓN DE IMPORTACIÓN”.', 3, 3),
(5, 'PROYECTO DE LEY QUE “AUTORIZA LA TRANSFERENCIA A TÍTULO GRATUITO DE UN BIEN DE DOMINIO MUNICIPAL A FAVOR DE LA CAJA NACIONAL DE SALUD”.', 4, 4),
(6, 'lugljhvhvh ljbmlj ljg l  jg valido', 1, 5),
(7, 'PROYECTO DE LEY QUE “DECLARA EL PRIMER CENTRO DE ENSEÑANZA Y TURÍSTICO EN MATERIA ICTÍCOLA DEL ESTADO PLURINACIONAL DE BOLIVIA AL MUSEO DR. JORGE ESTIVARES JUSTINIANO”.', 1, 6),
(8, 'PROYECTO DE LEY QUE “DECLARA EL PRIMER CENTRO DE ENSEÑANZA Y TURÍSTICO EN MATERIA ICTÍCOLA DEL ESTADO PLURINACIONAL DE BOLIVIA AL MUSEO DR. JORGE ESTIVARES JUSTINIANO”.', 3, 6);

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
  `rel_idmedio` smallint(5) UNSIGNED NOT NULL,
  `rel_idcuestionario` smallint(2) UNSIGNED NOT NULL,
  `rel_idusuario` int(11) UNSIGNED NOT NULL,
  `esta_activa` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`idnoticia`, `fecha_registro`, `fecha_noticia`, `titular`, `resumen`, `url_noticia`, `rel_idmedio`, `rel_idcuestionario`, `rel_idusuario`, `esta_activa`) VALUES
(1, 1626520831, 1627516800, 'Titular', 'resumen del titular', 'lik del titular nuevo', 23, 1, 5, 0),
(2, 1626521047, 1627084800, 'otro', 'resumen 				', 'rfrfr', 23, 2, 5, 0),
(3, 1626521330, 1626998400, 'hjkhjk', 'kmjklj', 'vgvgvg', 23, 1, 5, 0),
(4, 1626521692, 1626998400, 'dedede', '2d2d32d3', 'gtegg54', 23, 1, 5, 0),
(5, 1626521873, 1627084800, 'knmnm,n', 'uoiuou', '', 24, 2, 5, 0),
(6, 1626522373, 1626998400, 'fref', 'ghyhyh', 'r4r4r4', 47, 1, 5, 0),
(7, 1626526311, 1626393600, '“Ya fui absuelto de ese proceso, ahora me quieren callar”, dice Calvo sobre las acusaciones del MAS por un proceso que data de 2007', 'El jefe de la bancada del MAS, Hernán Hinojosa, acuso al líder cívico de tener pendiente procesos penales de cuando fue alcalde interino de la gestión de Roberto Fernández', 'https://eldeber.com.bo/santa-cruz/ya-fui-absuelto-de-ese-proceso-ahora-me-quieren-callar-dice-calvo-sobre-las-acusaciones-del-mas-por-_239396?utm_medi', 17, 2, 16, 1),
(8, 1626526679, 1626393600, 'La justicia denegó acción de libertad planteada por jueza contra policías y fiscales que la detuvieron', 'Vocales concluyen que no se le vulneró sus derechos y que ella con su actuación obstruyó el desarrollo de la justicia. La justicia denegó la acción de libertad planteada por la jueza del municipio de Cabezas.', 'https://eldeber.com.bo/santa-cruz/la-justicia-denego-accion-de-libertad-planteada-por-jueza-contra-policias-y-fiscales-que-la-detuvier_239377?utm_medi', 17, 2, 16, 1),
(9, 1626530196, 1625097600, 'Titular', 'Resumen', 'Link', 38, 1, 5, 0),
(10, 1626535359, 1625529600, 'Mas Pruebas', 'Resumen de mas pruebas', 'Link d las pruebas', 38, 2, 5, 1),
(11, 1626538089, 1626480000, 'Paceño Oscar se gana la loteria ', 'no ganno', 'loteriaboliviana.bo', 24, 1, 5, 0),
(12, 1626544832, 1626220800, 'Te', 'Dfreffff', 'Link', 32, 1, 5, 1),
(13, 1626557441, 1625011200, 'Titular panamericana', 'Resumen del titular panamericana', 'link de panamericana', 38, 1, 5, 0),
(14, 1626557589, 1626480000, 'Titular de la red uno', 'resumen del titular de la red uno', 'link de la rd uno', 24, 2, 5, 1),
(15, 1626575266, 1626480000, 'Ministro Lima: Se debe investigar si 40.000 balas antitumulto se usaron en Senkata y Huayllani', 'Ivan Lima, ministro de justicia y transparencia institucional,  dvirtió este sábado que la investigación del ingreso irregular de municiones y tropas de Argentina debe esclarecer el destino y uso de por lo menos 40.000 balas antitumulto que según indagaciones iniciales fueron adjudicadas a las Fuerzas Armadas.', 'http://www.boliviatv.bo/principal/noticia.php?noticia=4978c3b3b6bb3b1a7412ec917be050a3&lang=es&fbclid=IwAR3l7ynXn4wXQ_MrXOND8L2xwFbl4CcYjo1QmTnYJa6LLi', 32, 2, 9, 1),
(16, 1626579336, 1626480000, 'MAS tendrá congreso orgánico el 4 de agosto en Cochabamba', 'El Movimiento al Socialismo (MAS-IPSP) dio a conocer este sábado que habrá un congreso orgánico el cual se  realizará el 4 de agosto en Cochabamba. Expresando que la parte ideológica no habrá debate porque el MAS ', 'https://www.opinion.com.bo/articulo/pais/mas-tendra-congreso-organico-4-agosto-cochabamba/20210717131646827644.html', 13, 2, 39, 1),
(17, 1626583318, 1626480000, 'Imputan formalmente a exgobernador Félix Patzi por provocar accidente de tránsito', 'El exgobernador del Departamento de La Paz, Felix Patzi, fue imputado por el delito de Homicidio y Lesiones Graves y Gravísimas en Accidente de Tránsito, el documento indica que Patzi tenía 1.50% en la prueba de alcoholemia, el automóvil del imputado da a entender que la parte posterior media del auto choca con otro automóvil, dejando así tres personas heridas. ', 'https://www.opinion.com.bo/articulo/pais/imputan-felix-patzi-provo/20210717185144827660.html', 13, 2, 39, 1),
(18, 1626721002, 1626393600, 'presenta proyecto de ley alianza publico-privado', 'Luis fernando camacho, gobernador de santa cruz busca generar empleos y reactivar la economia de la region con propuesta de proyecto de ley alianza publico-privado', 'https://fb.watch/v/3u-vz18zK/ ', 24, 2, 41, 1),
(19, 1626732845, 1626652800, 'CC presenta proyecto para restringir interinatos en el Estado', 'El líder de Comunidad Ciudadana, Carlos Mesa, presentó hoy un proyecto de ley para restringir los interinatos en empresas e instituciones estatales. El proyecto tiene por objeto ', 'https://www.lostiempos.com/actualidad/pais/20210719/cc-presenta-proyecto-restringir-interinatos-estado', 12, 2, 44, 1),
(20, 1626739850, 1626652800, 'Mesa justifica ingreso irregular de armamento antidisturbios ', 'El jefe de Comunidad Ciudadana indico que el ingreso del armamento fue destinado para la embajada argentina. ', 'https://www.youtube.com/watch?v=0yF9jJW8t58', 32, 2, 43, 1),
(21, 1626740106, 1626652800, 'CC anuncia que no participara de conformación de comisión mixta ', 'Comunidad Ciudadana no participara de la comisión encargada de la investigación del ingreso de armamento a Bolivia ', 'https://www.youtube.com/watch?v=0yF9jJW8t58', 32, 2, 43, 1),
(22, 1626740920, 1626652800, 'Las investigaciones continuaran ante la demanda del pueblo', 'La ministra Marianela anuncio que continuaran con las investigaciones referente al golpe de Estado', 'https://www.youtube.com/watch?v=0yF9jJW8t58', 32, 2, 43, 1),
(23, 1626741298, 1626652800, 'Mesa esperara informe de la CIDH', 'Mesa respetara el informe de la CIDH', 'https://www.youtube.com/watch?v=0yF9jJW8t58', 32, 2, 43, 1),
(24, 1626741382, 1626652800, 'Mesa esperara informe de la CIDH', 'Mesa respetara el informe de la CIDH', 'https://www.youtube.com/watch?v=0yF9jJW8t58', 32, 2, 43, 1),
(25, 1626742436, 1626480000, 'Asamblea remitirá notas a la fiscalía para detención de Pumari y Ramiro Subia  ', 'La asamblea legislativa departamental exige detención de Pumari y Subia por los disturbios suscitados en 2019', 'https://www.youtube.com/watch?v=0yF9jJW8t58', 32, 2, 43, 1),
(26, 1626744743, 1626652800, 'CC presenta anteproyecto para acabar con interinatos y el MAS lo califica de “panfleto”', 'La propuesta apunta a acabar con las designaciones de interinos en las entidades del Estado. De acuerdo con el propio recuento que realizó esta fuerza política, en el país existen 13 autoridades o ejecutivos designados de forma directa por el Presidente', 'https://eldeber.com.bo/pais/cc-presenta-anteproyecto-para-acabar-con-interinatos-y-el-mas-lo-califica-de-panfleto_239767?utm_medium=Social&utm_source=', 17, 2, 16, 1),
(27, 1626745046, 1626652800, 'Cívicos, comunarios y transportistas cumplen cuatro días de bloqueo exigiendo que se designe al presidente de la Empresa Siderúrgica Mutún', 'Cívicos, comunarios y transportistas de Puerto Suárez cumplieron este lunes cuatro días de bloqueo en el ingreso principal al yacimiento de hierro Mutún. Los manifestantes piden que el Gobierno nacional nombre un nuevo presidente para la Empresa Siderúrgica Mutún (ESM).', 'https://eldeber.com.bo/economia/civicos-comunarios-y-transportistas-cumplen-cuatro-dias-de-bloqueo-exigiendo-que-se-designe-al-presi_239733?utm_medium', 17, 2, 16, 1),
(28, 1626745339, 1626652800, 'Alcalde cruceño dice que aguarda que el Concejo apruebe la ley para el pago del bono escolar', 'El alcalde Jhonny Fernández compromete el pago del bono cuando se apruebe la ley y se cuente con la lista de estudiantes de los ciclos inicial y primaria. El concejal Manuel Saavedra propone mantener los recursos destinados para el desayuno escolar', 'https://eldeber.com.bo/santa-cruz/alcalde-cruceno-dice-que-aguarda-que-el-concejo-apruebe-la-ley-para-el-pago-del-bono-escolar_239701?utm_medium=Socia', 17, 2, 16, 1),
(29, 1626745364, 1626393600, 'el censo debe realizarse el 2022', 'el vocero presidencial, jorge richter, ratifico que el censo de poblacion y vivienda se debe llevar el proximo año', 'https://www.reduno.com.bo/noticias/gobierno-ratifica-que-el-censo-se-debe-realizar-en-el-2022-202171619480?fbclid=IwAR0WW4bdHq1Rsytqm6X3TjsJX1ab-D5yOA', 24, 2, 41, 1),
(30, 1626747285, 1626652800, 'Rector pide llevar a cabo el Censo 2022', 'El Rector de la UMSA demanda a las autoridades de gobierno que trabajen para que se lleve a cabo el CENSO 2022', '', 24, 1, 29, 1),
(31, 1626748302, 1626652800, 'En Argentina se iniciaron dos procesos por el envío de armamento a Bolivia.', 'El embajador argentino en Bolivia, Ariel Basteiro, confirmó este lunes que en Argentina se abrieron dos procesos por el envío de armamento a Bolivia. “Para mí, es un dolor muy grande poder apreciar esto, confirmar lo que sabíamos a través de notas e informes sobre lallegada de material ilícito. Tengo que pedir disculpas al pueblo boliviano (por el envío de armas) en la presidencia de Macri”, dijo.', 'https://www.atb.com.bo/internacional/en-argentina-se-iniciaron-dos-procesos-por-el-envío-de-armamento-bolivia', 23, 2, 34, 1),
(32, 1626748583, 1626652800, 'Evo Morales acusa a Mesa de justificar ingreso de armamento ilegal de Argentina a Bolivia.', 'El presidente del Movimiento al Socialismo dijo “Carlos Mesa, el historiador golpista, miente y justifica el ingreso de armamento ilegal de Argentina que fue usado para reprimir al pueblo en el golpe que él mismo promovió. Cada día se desenmascara y demuestra su complicidad con las masacres y corrupción del gobierno de facto”, publicó en su cuenta en la red social digital Twitter. Por lo tanto la respuesta del historiador no se dejo esperar “El único material realmente bélico que llegó en ese material de apoyo de la Argentina era para funcionarios de Argentina”, aseveró Mesa.', 'https://www.atb.com.bo/seguridad/evo-morales-acusa-mesa-de-justificar-ingreso-de-armamento-ilegal-de-argentina-bolivia', 23, 2, 34, 1),
(33, 1626748791, 1626652800, 'Juicio oral por “Mochilas I” y “Comidas” está previsto para hoy', 'La audiencia de inicio se presentará el 19 de julio a las nueve de la mañana por vía virtual, en ello se tomará los casos del exalcalde Jose Maria Leyes, que acumulo desde el 2018 diversos procesos por los supuestos delitos de corrupción como el caso “Mochilas I” y el caso “Comidas”, pero el juicio de los casos “Cámaras”, se postergó para el 27 de septiembre de este año debido a que el exsecretario municipal Administrativo y Financiero Diego Moreno Barrón, por el motivo que está prófugo. ', 'https://www.opinion.com.bo/articulo/cochabamba/juicio-oral-mochilas-i-comidas-previsto-hoy/20210718202205827774.html', 13, 2, 39, 1),
(34, 1626749040, 1626652800, 'presentaron armamentos antidisturbios argentinos. ', 'Durante los conflictos de noviembre del 2019, ingresan al pais dos tipo de materiales de materiales antidisturbios de manera irregular, 27mil cartuchos de perdigón de gomas, los presuntos involucrados son Yuri Calderón ex comandante de la policía boliviana, Jorge Terceros ex comandante de la FF.AA y el ex embajador  de Argentina en Bolivia.', 'https://www.redbolivision.tv.bo/video/noticieros-al-dia-programa-del-19-de-julio-del-2021/', 22, 2, 31, 1),
(35, 1626749296, 1626652800, '6 informes internacionales denuncian a Áñez por masacres, torturas y ejecuciones extrajudiciales.', 'Cinco organizaciones internacionales y una entidad nacional denuncian que en el régimen de Jeanine Añez se produjeron masacres, asesinatos, ejecuciones extrajudiciales, torturas, uso desproporcionado e innecesario de la fuerza contra manifestantes desarmados y se detectó la presencia de grupos violentos paraestatales.  Los informes fueron elaborados, en distintos momentos, por la Comisión Interamericana de Derechos Humanos (CIDH), la Clínica de Derechos Humanos de Harvard, Amnistía Internacional, el Alto Comisionado de las Naciones Unidas para los Derechos Humanos (ACNUDH), el Instituto de Terapia e Investigación Sobre las Secuelas de la Tortura y la Violencia de Estado (ITEI) y la Defensoría del Pueblo.', 'https://www.atb.com.bo/política/6-informes-internacionales-denuncian-áñez-por-masacres-torturas-y-ejecuciones-extrajudiciales', 23, 2, 34, 1),
(36, 1626749434, 1626652800, 'Mesa ve una “tramoya vergonzosa” en los casos del supuesto material antidisturbios', 'Como una «tramoya vergonzosa» calificó este lunes el expresidente del Estado, Carlos Mesa a la versión del supuesto envío de material antidisturbios desde Ecuador y Argentina como base del caso del presunto «golpe de Estado». Observó que el Gobierno tiene la dificultad de «hacer cuadrar» las fechas en el caso del material argentino, por lo que se visibilizan contradicciones.', 'https://lapatria.bo/2021/07/19/mesa-ve-una-tramoya-vergonzosa-en-los-casos-del-supuesto-material-antidisturbios/', 15, 2, 17, 0),
(37, 1626750009, 1626652800, 'INRA: En la gestión de facto se generó normativa agraria para favorecer a un grupo privilegiado.', 'El director de planificación del Instituto Nacional de Reforma Agraria (INRA), Juan de Dios Fernández, reveló este lunes que durante la gestión de facto de Jeanine Áñez, se elaboró normativa agraria para favorecer a un grupo privilegiado, principalmente en el departamento de Santa Cruz.  “En el año del golpe de Estado hay una distorsión de la institucionalidad agraria y se ha generado incluso normativa para favorecer la revisión de procesos que tenían irregularidades en el saneamiento de tierras”, manifestó en contacto con radio Patria Nueva.', 'https://www.atb.com.bo/sociedad/inra-en-la-gestión-de-facto-se-generó-normativa-agraria-para-favorecer-un-grupo-privilegiado', 23, 2, 34, 1),
(38, 1626750455, 1626652800, 'Socialización del proyecto carbonato de litio', 'El asambleísta Edwin Fuentes Camacho socializaso el proyecto en Coipasa con autoridades departamentales y nacionales dando así un fruto a futuro', '', 39, 2, 30, 1),
(39, 1626751991, 1626566400, 'Gabriela Mendoza, La ministra de planificación de desarrollo, informo que el gobierno nacional revierte la paralización de obras en el departamento de la Paz.', 'La ministra de Planificación del Desarrollo, dijo que el gobierno nocional revirtió la paralización de obras en el departamento de la Paz con una inversión pública de 5.509 millones del PGE, una cifra superior a los 2.511 millones ejecutados en el régimen de Jeanine Añez.', 'http://www.boliviatv.bo/principal/noticia.php?noticia=6107cdbf4b36598a7e125b5bf78ddceb&lang=es', 32, 2, 9, 1),
(40, 1626751997, 1626652800, 'Alcaldía posesiona a Roberto Kotori como nuevo Intendente Municipal', 'Roberto Kotori, quien anteriormente era gerente del Programa de Mantenimiento (PROMAN), se hace cargo de la Intendencia por medio del escándalo por motivo de renuncia y destitución de Vargas la causa porque denunció las diversas presiones para devolver objetos que fue decomisado de los locales nocturnos, pero por otra parte la Alcaldía hizo una denuncia por supuesto apropiamiento de los objetos decomisados. ', 'https://www.opinion.com.bo/articulo/cochabamba/reyes-villa-presenta-roberto-kotori-como-nuevo-intendente-municipal/20210719091326827809.html', 13, 2, 39, 1),
(41, 1626752259, 1626652800, 'En el departamento de potosí 35 maestros urbanos fueron citados a declarar por la Fuerza Especial de Lucha contra el Crimen.', 'En el departamento de potosí 35 maestros urbanos fueron citados a declarar hoy 19 de julio por la Fuerza Especial de Lucha contra el Crimen,para declarar sobre los hechos suscitados el año 2019, cuando la población potosina se movilizó en defensa del Litio Potosino y a esto se sumó las protestas por el Fraude Electoral. Fernando Isla, maestro citado por la FELCC, sostuvo que fueron amenazados, que si no se presentaban a declarar iban a presentar orden de aprehensión en contra de los acusados, afirmó que son víctimas de una persecución política y amedrentamiento por parte del Gobierno. ', '', 35, 2, 18, 1),
(42, 1626752659, 1626652800, 'El Ministro de Gobierno Eduardo del Castillo hoy en la mañana 19 de julio, presentó las municiones enviadas desde el país de la Argentina y Ecuador el año 2019', 'El Ministro de Gobierno Eduardo del Castillo hoy en la mañana 19 de julio, presentó las municiones enviadas desde el país de la Argentina y Ecuador el año 2019, material antidisturbio que fue hallado en los depósitos de la Policía Boliviana,  según el Comandante General de la Policia Jhonny Aguilera informó que según el ordenamiento jurídico estas irregularidades están tipificadas como delitos de Trafico Ilicitos de Armas, y que está penado con 30 años de cárcel sin derecho a indulto, y apuntó al Ex-Comandante de la POlicia Yuri Calderon, el Ex-Comandante General de la Fuerza Aérea Boliviana Gonzalo Terceros y al ex embajador de la argentina en Bolivia.', '', 35, 2, 18, 1),
(43, 1626752769, 1626652800, 'Carlos Mesa calificó como una vergonzosa tramoña inventada y falsa sobre el supuesto “Golpe de Estado”', 'El ExPresidente y Ex Candidato Presidencial Carlos Mesa calificó como una vergonzosa tramoña inventada y falsa sobre el supuesto “Golpe de Estado” , la versión que maneja el Gobierno sobre el ingreso de municiones anti disturbios desde la Argentina, al país el año 2019, pretende hacer creer a los Bolivianos, al país de la Argentina, e incluso al Ecuador, explicó que el único material que llegó desde la Argentina era para funcionarios de Embajada Argentina .', '', 35, 2, 18, 1),
(44, 1626752793, 1626652800, 'Ministerio de Justicia y Cooperación Alemana trabajarán de manera conjunta contra la violencia hacia las mujeres', 'Tanto el gobierno de la Republica Federal de Alemania cómo el Estado Plurinacional de Bolivia, acordaron consolidar acciones en previsión primara en el marco de la lucha contra la violencia hacia las mujeres desde un ámbito educativo y partir de los medios de comunicación. Todas las acciones de la cooperación alemana están enmarcadas en las prioridades del Estado Plurinacional de Bolivia.', 'http://www.boliviatv.bo/principal/noticia.php?noticia=c6c7a174d9666eaeabc999f56f6de555&lang=es', 32, 2, 9, 1),
(45, 1626753220, 1626652800, 'el concejal del movimiento al socialismo Oscar Sandi, quien denuncia una elección ilegal en la directiva del consejo municipal del departamento de Sucre', 'Dos vocales de la sala constitucional emitieron criterios diferentes respecto a la acción planteada, por el concejal del movimiento al socialismo Oscar Sandi, quien denuncia una elección ilegal en la directiva del consejo municipal del departamento de Sucre vulnerando sus derechos. Un tercer vocal fue convocado para dirimir este caso, el vicepresidente de consejo municipal Antonio Pino a tiempo de erradicar la legalidad de la actual elección directiva dijo que espera que el vocal a cargo obre conforme a lo que la norma establece.', '', 35, 1, 18, 0),
(46, 1626753395, 1626652800, 'Segunda audiencia de juicio oral disciplinario por el caso ', 'Segunda audiencia de juicio oral disciplinario por el caso ', 'ttps://www.facebook.com/radiofidescb/videos/337083111299518/?sfnsn=mo ', 35, 2, 18, 1),
(47, 1626753540, 1626652800, 'La audiencia del ex Alcalde Jose Maria Leyes fue suspendida para el mes de Noviembre.', 'La audiencia del ex Alcalde Jose Maria Leyes fue suspendida para el mes de Noviembre. Señalaba el responsable de la unidad jurídica de la Alcaldía de Cochabamba Grover Arias por la ausencia del señor Diego Bernando Moreno quien estuvo ausente en todos los procesos en su contra y que esto generó la declaratoria de rebeldía correspondiente a mandamiento de aprehensión y está bajo persecución. ', '', 35, 2, 18, 1),
(48, 1626753637, 1626652800, 'El municipio de Santa Cruz exigen el bono escolar de 350 bs que prometió el Alcalde Jonny', 'El municipio de Santa Cruz exigen el bono escolar de 350 bs que prometió el Alcalde Jonny en su campaña política por la Alcaldía del Departamento de Santa Cruz, el concejal Manuel Saavedra informó que el municipio está en condiciones de dotar el desayuno escolar y el bono escolar, sostuvo que Jhonny tiene que cumplir lo que prometió y que por su parte no hay voluntad política y que no está pensando en la gente.', '', 35, 2, 18, 1),
(49, 1626753816, 1626652800, 'Suspenden audiencia del caso Mochilas I ', 'El secretario de Asuntos Jurídicos de la Alcaldía de Cochabamba, Orlando Vargas, dio a conocer que el dia de hoy la suspensión de la audiencia por el caso de “Mochilas I”, que es un proceso contra el exalcalde José María Leyes, a causa de la inasistencia de Diego Moreno que es uno de los “Co-procesados”, quien fue declarado como rebelde. En ese caso se dio una nueva fecha del juicio que es el 16 de noviembre, dado el hecho el juicio debería ser virtual pero el Ministerio Publico indico que debe ser presencial. ', 'https://www.opinion.com.bo/articulo/cochabamba/suspenden-audiencia-mochilas-i-inasistencia-diego-moreno/20210719160721827835.html', 13, 2, 39, 1),
(50, 1626754278, 1626652800, 'Ministro de Medio Ambiente posesiona a Óscar Zelada como nuevo presidente de la empresa Misicuni', 'El nuevo director fue posesionado mediante una Resolución Suprema de Nº27571 decretada hoy por el presidente del Estado, Luis Arce. El Ministro de Medio Ambiente y Agua, Juan Santos, acompañado del Viceministro de Agua Potable y Saneamiento Básico, Carmelo Valda, posesionó al ingeniero Óscar Zelada como nuevo presidente del directorio de la empresa Misicuni.', 'https://www.opinion.com.bo/articulo/cochabamba/ministro-medio-ambiente-posesiona-oscar-zelada-como-nuevo-presidente-empresa-misicuni/20210719213833827', 13, 2, 39, 1),
(51, 1626755702, 1626652800, 'La licencia de Patzi fue suspendida definitivamente; no podrá volver a conducir un auto en Bolivia', 'Este fin de semana, se determinó la detención domiciliaria a Patzi, además el arraigo y la obligación de ser presente en la Fiscalía cada 15 dias, debido al hecho en su segundo accidente de tránsito por conducir en un estado etílico con un examen de alcoholemia de 1,50%, dejando a tres personas heridas, por ello la licencia de Felix Patzi, que fue gobernador de La Paz, queda suspendida definitivamente, es decir, que nunca más volverá a conducir un automóvil en Bolivia.', 'https://www.opinion.com.bo/articulo/pais/licencia-patzi-fue-suspendida-definitivamente-podra-volver-conducir-auto-bolivia/20210719192634827850.html', 13, 2, 39, 1),
(52, 1626756772, 1626652800, 'Pedro Castillo llama \"a la más amplia unidad del pueblo peruano\"', 'El presidente electo de Perú, Pedro Castillo, el profesor de una escuela rural y sindicalista dijo que tras ganar el dia 6 de junio con quien disputó el cargo Keiko Fujimori, Pedro Castillo asumirá  el mando el mismo día en que Peru estara celebrando su bicentenario de su independencia, por ello llamó “a la unidad del pueblo peruano”, en ese caso ejercerá la gestión a partir de este 28 de julio. ', 'https://www.opinion.com.bo/articulo/mundo/pedro-castillo-llama-mas-amplia-unidad-pueblo-peruano/20210719220009827871.html', 13, 2, 39, 1),
(53, 1626757485, 1626652800, 'Keiko Fujimori anuncia que reconocerá los resultados de elecciones peruanas', 'Keiko Fujimori recalcó que si aceptaría la proclamación de Castillo, pero que en su opinión, es “Ilegítimo” porque nos indica que el partido político, Peru Libre de Castillo habría robado miles de votos el dia de las elecciones, según el recuento oficial Castillo ganó por poco más de 44.000 de votos de diferencia. ', 'https://www.opinion.com.bo/articulo/mundo/keiko-fujimori-anuncia-que-reconocera-resultados-elecciones-peruanas/20210719192924827852.html', 13, 2, 39, 1),
(54, 1626784201, 1626480000, 'caso armamento de argentina a bolivia en el año 2019', 'Mauricio Macri expresidente de argentina es acusado por envíar armamento a Bolivia en el año 2019 e involucra a sus ex ministros, esta maniobra habría contado con la participación de la exministra de Seguridad, Patricia Bullrich; el exministro de Defensa, Oscar Aguad; el exministro de Relaciones Exteriores y Culto, Jorge Faurie; el exembajador de Argentina en Bolivia, Normando Álvarez García; el exdirector general de Aduanas, Jorge Dávila, y el exdirector ejecutivo de la Agencia Nacional de Materiales Controlados, Eugenio Cozzi. - violación al código penal en el artículo 219 y 220', '', 47, 2, 22, 1),
(55, 1626810532, 1625616000, 'Noticia', 'Resumen noticia', 'http://linknoticia', 38, 1, 5, 0),
(56, 1626810704, 1626912000, 'Noticia 2', 'Resumen noticia 2', 'http://linknoticia2', 38, 2, 5, 1),
(57, 1626824716, 1626825600, 'Bancada del MAS se reunirá para elegir a Defensor del Pueblo', '						escribo y copio mi resumen de la noticia según lo que anoté en mi ficha 					', 'https://eldeber.com.bo/pais/bancada-del-mas-en-senado-retomara-trabajo-de-eleccion-y-designacion-del-defensor-del-pueblo_239927', 23, 2, 51, 1),
(58, 1626825750, 1626739200, 'Suarez afirma que Añez puede enviar las cartas ‘donde ella quiera’ y descarta vulneración de derechos humanos', '						ADGADBSCFBASD QUE QUIEN PORQUE DONDE CUANDO 					', 'https://erbol.com.bo/nacional/mamani-afirma-que-a%C3%B1ez-puede-enviar-las-cartas-%E2%80%98donde-ella-quiera%E2%80%99-y-descarta-vulneraci%C3%B3n', 38, 2, 51, 1),
(59, 1626826043, 1626739200, 'Gobierno lanza web sobre la Covid-19 e incluye un verificador de noticias', 'La viceministra de Comunicación, Gabriela Alcón, lanzó este martes la nueva versión de la página web www.unidoscontraelcovid.gob.bo que incluye un verificador de noticias sobre la pandemia. El objetivo es que la población tenga un sitio en el que pueda encontrar la información actualizada, información oficial sobre temas relacionados al COVID', 'https://www.lostiempos.com/actualidad/pais/20210720/gobierno-lanza-web-covid-19-e-incluye-verificador-noticias', 12, 2, 44, 1),
(60, 1626829787, 1626739200, 'El embajador de Bolivia ante la ONU, Diego Pary', 'Explica el Embajador de Bolivia que el envío ilegal de material bélico al país en 2019, por parte de Argentina y Ecuador es una falta muy grave porque se violaron varios tratados internacionales.', 'https://www.facebook.com/BoliviatvOficial/videos/849571939027575/', 32, 2, 49, 1),
(61, 1626832573, 1626739200, 'Jueves se presentara informe de hechos de noviembre de 2019', 'El jueves se presenta el informe vinculante por la investigación de los hechos ocurridos en noviembre del 2019', 'https://www.youtube.com/watch?v=ApFaWsac2bU', 32, 2, 43, 1),
(62, 1626833091, 1626739200, 'Se debe investigar a cívicos por trafico ilícito de armas', 'El ejecutivo de la COD pide que la investigación se amplié a los cívicos ', 'https://www.youtube.com/watch?v=ApFaWsac2bU', 32, 2, 43, 1),
(63, 1626833133, 1626739200, 'Andrónico: Sesión de honor del 6 de Agosto será en el nuevo edificio legislativo de La Paz', 'La sesión de Honor de la Asamblea Legislativa Plurinacional por el 196 aniversario de nuestro país, será desarrollado en el nuevo edificio legialativo en la ciudad de La Paz. Autoridades de Sucre dijeron que debería respetarse la capital, ya que Sucre es donde nació Bolivia y  además de ser sede de los actos centrales ', 'https://correodelsur.com/local/20210720_andronico-sesion-de-honor-del-6-de-agosto-sera-en-el-nuevo-edificio-legislativo-de-la-paz.html Leído en Periód', 11, 2, 47, 1),
(64, 1626834624, 1626739200, 'Comunidades se beneficiaran de atención médica y servicios.', 'Brigadas Interinstitucionales del Beni, acudirán a municipios para comunidades de pueblos indígenas originarios, que se beneficiarán en la atención médica y servicios como del SERECI, SEGIP y Banco Unión.', 'https://twitter.com/Canal_BoliviaTV/status/1417641894360801280', 32, 2, 34, 1),
(65, 1626834757, 1626566400, 'dirigencia nacional ratifica a Ayala como representante departamental de la federación de campesinos en pando', 'el represntante de la federacion campesina nacional estubo en Pando para ratificar a Miguel Ayala como represntante', 'Canal 15 sps- Pando', 27, 2, 20, 1),
(66, 1626835169, 1626739200, 'Elección del Nuevo Defensor del Pueblo.', 'El Movimiento Al Socialismo conformará una comisión mixta entre diputados y senadores para trabajar en la selección de la elección del nuevo defensor del pueblo, tras dos años de interinato de Nadia Cruz que fue designada el 30 de enero de 2019.', 'https://twitter.com/Canal_BoliviaTV/status/1417595014063038465', 32, 2, 34, 1),
(67, 1626835421, 1626739200, 'El MAS vuelve a cuestionar a la Iglesia', 'El MAS responde al llamado de diálogo que hizo la Iglesia Católica', 'reduno.com.bo', 24, 2, 29, 1),
(68, 1626836569, 1626739200, 'Añez pide audiencia a Michelle Bachelet', 'Añez pide a Bachelet una audiencia, mediante Naciones Unidas, para que exponga su caso, las razones es que su detención es una cuestión política ', 'reduno.com.bo', 24, 2, 29, 1),
(69, 1626839131, 1626739200, 'La ex presidenta jeanine añez pide audiencia a Bachelet y exige que la ONU este presente en su audiencia', 'La mandataria pide una audiencia en la que señala podrá demostrar con documentos por qué debe ser liberada. Acusa al Gobierno de Luis Arce de persecución y de \"quebrantar al órgano judicial\",La misiva está dirigida a la expresidenta de Chile, Michelle Bachelet, quien ahora ejerce como la Alta Comisionada de las Naciones unidas para los Derechos Humanos', 'https://unitel.bo/politica/jeanine-anez-pide-audiencia-a-la-alta-comisionada-de-la-onu-de-derechos-humanos_154618', 21, 2, 32, 1),
(70, 1626839748, 1626739200, '\"Los movimientos sociales elegirán al candidato 2025\"', 'El diputado del MAS, Anhelo Céspedes, afirmó que las militancia del MAS decididiran si Evo Morales se postule como presidente en las próximas  elecciones 2025. ', '', 11, 2, 47, 1),
(71, 1626840016, 1626739200, ' Bancada de CC en Diputados descarta brindar descargos ante Comisión de Ética por viaje a EEUU', 'La bancada de la alianza Comunidad Ciudadana (CC) en la Cámara de Diputados descartó brindar los descargos correspondientes, ante la Comisión de Ética, por el viaje que hicieron junto a un grupo de legisladores de Creemos a Estados Unidos para denunciar ante organismos internacionales la presunta vulneración de derechos humanos en Bolivia.', 'https://correodelsur.com/local/20210720_andronico-sesion-de-honor-del-6-de-agosto-sera-en-el-nuevo-edificio-legislativo-de-la-paz.html Leído en Periód', 11, 2, 47, 1),
(72, 1626840144, 1626739200, ' Bancada de CC en Diputados descarta brindar descargos ante Comisión de Ética por viaje a EEUU', 'La bancada de la alianza Comunidad Ciudadana (CC) en la Cámara de Diputados descartó brindar los descargos correspondientes, ante la Comisión de Ética, por el viaje que hicieron junto a un grupo de legisladores de Creemos a Estados Unidos para denunciar ante organismos internacionales la presunta vulneración de derechos humanos en Bolivia.', 'https://correodelsur.com/politica/20210720_bancada-de-cc-en-diputados-descarta-brindar-descargos-ante-comision-de-etica-por-viaje-a-eeuu.html Leído en', 11, 2, 47, 1),
(73, 1626840985, 1626739200, 'Unión Europea reafirma trabajo conjunto con América Latina', 'El Alto Representante de la Unión Europea para Asuntos Exteriores y Política de Seguridad reiteró el compromiso firme de la Unión Europea en sus relaciones con América Latina y el Caribe y con la Comunidad Andina. La determinación de la Unión Europea es fortalecer la democracia, pero sobre todo intensificar los esfuerzos conjuntos para superar los problemas provocados por la pandemia; coadyubar en los problemas económicos, sanitarios y sociales producto de la pandemia ', 'http://www.boliviatv.bo/principal/noticia.php?noticia=9a2d10324f7805b2b98ab99771f375b5&lang=es ', 32, 2, 9, 1),
(74, 1626872311, 1626739200, 'Un grupo de personas protesta contra los procesos disciplinarios en la Policía', 'El grupo de personas que llegó a las puertas del edificio de exidentificaciones de la Policía protestaron contra el proceso que dio inicio contra ocho uniformados durante el motín del año 2019, los cuales los fiscales determinaron su baja definitiva gracias a que son acusados de hacer política dentro de una institución policial y también por la quema de símbolos patrios en el supuesto motín del año 2019.', 'https://www.opinion.com.bo/articulo/cochabamba/grupo-personas-protesta-procesos-disciplinarios-policia/20210720114343827945.html', 13, 2, 39, 1),
(75, 1626873354, 1626739200, 'Registro catastral: Proponen eliminar “burocracia” en trámites y entregar documentación en 24 horas', 'El director de Catastro de la Alcaldía de Cochabamba, Hugo Peña, dijo que está trabajando en una propuesta para así eliminar la burocracia en la entrega de registros y así que se logre alcanzar el periodo de trámite durante 24 horas o aún menos, en la propuesta incluye que las autorizaciones serán por código QR y que ya no será necesario varias firmas sino solamente una firma, donde se podrá registrar el inmueble con una cuenta de información legal y técnica, por ello Peña dijo que en su gestión los trámites de catastro de agilizaron.', 'https://www.opinion.com.bo/articulo/cochabamba/director-catastro-propone-eliminar-burocracia-tramites-entregar-registros-24-horas/20210720220344828027', 13, 2, 39, 1),
(76, 1626874342, 1626739200, 'Kotoriy continuará mesas de trabajo que inició exintendente con negocios nocturnos', 'El ordenamiento de los mercados es una parte de las tareas las cuales la Intendencia se hace cargo, por ello el nuevo intendente municipal Roberto Kotoriy dijo que ya comenzaron reuniones con el sector de mercados y que se continuará con las mesas de trabajo que el exintendente Fernando Vargas estaba trabajando en los negocios nocturnos.', 'https://www.opinion.com.bo/articulo/cochabamba/kotoriy-continuara-mesas-trabajo-que-inicio-exintendente-negocios-nocturnos/20210720220658828030.html', 13, 2, 39, 1),
(77, 1626874838, 1626739200, 'Patty a un periódico argentino: ‘dicen que soy el terror de los antipatria’', 'En su entrevista, Patty vinculó al presidente de Brasil, Jair Bolsonaro, en los sucesos de 2019.También Patty involucró a Luis Fernando Camacho en este aspecto y afirmó que si se “trabaja en serio” en las indagaciones sobre el gobernador cruceño es posible que salga a la luz el supuesto “apoyo dado por Brasil” en el “golpe”.', 'https://www.opinion.com.bo/articulo/pais/patty-periodico-argentino-dicen-que-soy-terror-antipatria/20210720195248828003.html', 13, 2, 39, 1),
(78, 1626876211, 1626739200, 'Médicos se declaran en emergencia y emplazan al Gobierno por artículos polémicos en la Ley de Emergencia Sanitaria', 'Los profesionales en salud se declararon en emergencia este lunes y solicitaron una reunión con el presidente Luis Arce Catacora para pedirle que se derogue la Ley de Emergencia Sanitaria, tras conocer que entre su reglamentación “no solo se vulneran los derechos de los médicos, sino de la población en general”.', 'https://eldeber.com.bo/santa-cruz/medicos-se-declaran-en-emergencia-y-emplazan-al-gobierno-por-articulos-polemicos-en-la-ley-de-emerge_239766', 17, 2, 16, 1),
(79, 1626876468, 1626739200, 'Trabajadores de salud entran en paro este miércoles y piden a los tres niveles de gobierno atender sus pedidos', 'Los trabajadores de la salud confirmaron que mañana acatarán un paro de salud de 24 horas en todo el departamento cruceño para exigir se cumpla su pliego petitorio que incluye al menos ocho puntos, entre la anulación de la Ley de Emergencia Sanitaria, el respeto a sus seis horas de trabajo, el pago del bono de viático y la reposición de ítems.', 'https://eldeber.com.bo/santa-cruz/trabajadores-de-salud-entran-en-paro-este-miercoles-y-piden-a-los-tres-niveles-de-gobierno-atender-s_239962', 17, 2, 16, 1),
(80, 1626899570, 1626739200, 'Vocal del TSE anuncia inicio de revisión al padrón electoral ', '						QUE sucedio de qué se trata; QUIEN es el protagonista; cuando; donde; POR QUÉ					', 'www.panamericana.com/noticierocentral/VocalPadrónElectoral', 38, 1, 51, 1),
(81, 1626902526, 1626739200, 'El ex viceministro de economía fue detenido por los contratos de deuda con el FMI ', '						QUÉ / QUIEN / POR QUÉ 					', 'www.pagina7.com/actualidad/política/detencionministro ', 14, 2, 51, 1),
(82, 1626907374, 1626739200, 'adsib y tribunal agroambiental firman convenio para implementar el uso de la firma digital', 'el implemento de la firma digital será mediante registros informáticos de usuario, contraseña y permisos digitales así como también la elaboración e implementación  de campaña planes y unificación de acciones especificas para los procesos o servicio que brinda el tribunal agroambiental  ', 'https://www.reduno.com.bo/noticias/adsib-y-tribunal-agroambiental-firman-convenio-para-implementar-el-uso-de-la-firma-digital-202172018265?fbclid=IwAR', 24, 2, 41, 1),
(83, 1626908272, 1626825600, 'se aprobó el decreto supremo dar prioridad nacional el censo de población y vivienda 2022 ', 'se aprobó por decreto supremo dar prioridad nacional el censo de población y vivienda 2022 nuestro gobierno como prometió garantiza el financiamiento y respaldo institucional para realizar el censo nacional en noviembre 2022 dijo el presidente Luis arce Catacora', 'https://www.facebook.com/RedUnotv ', 24, 2, 41, 1),
(84, 1626911856, 1626739200, 'Expresidenta Áñez recurre a la Alta Comisionada Bachelet para que intervenga en su caso', 'La Ex Presidenta Jeanine Áñez, pidió este martes a la Alta Comisionada de la Naciones Unidas para los Derechos Humanos, Michelle Bachelet, intervenir en su caso en relación a la detención que guarda en la cárcel por lo que considera una “presión política”  En la carta enviada Bachelet la ex mandataria pide una audiencia mediante su hija, Carolina Rivera, para exponer su caso, denuncia que su reclusión es injusta, ya que la acusan de una autoproclamación a la Presidencia Boliviana y como la autora del “Golpe de Estado”. En la misiva, la ex presidenta asegura haber cumplido con su deber constitucional como segunda vicepresidenta de la Cámara de Senadores, ante el vacío de poder que existía tras las elecciones fallidas de octubre y renuncia de Evo Morales en noviembre de 2019.', 'https://www.facebook.com/400816867085296/posts/1221925148307793/?sfnsn=mo', 35, 2, 18, 1),
(85, 1626914115, 1626739200, 'Campaña de concientización sobre la ley 348', 'Personal de laboratorio de la FELCV realiza una campaña de concientización sobre la ley 348, ley para garantizar a las mujeres una vida libre de violencia. Campaña realizada en la plaza 25 de mayo con la colaboración de EPI Patacón y San Roque', 'https://www.facebook.com/TvSucreUSFX/videos/257624012422173', 20, 2, 54, 1),
(86, 1626914479, 1626739200, 'Entrega de material escolar a los distritos 6, 7 y 8 ', 'El Gobierno Departamental y el Gobierno Municipal de Sucre realizaron la entrega de material escolar a los distritos 6,7 y 8; especificando detalle de todo lo entregado, esta es una de las actividades del plan retorno a clases', 'https://www.facebook.com/TvSucreUSFX/videos/257624012422173', 20, 2, 54, 1),
(87, 1626914697, 1626739200, 'Secretario general del GADCH dará a conocer el estado financiero de la gobernación', 'El secretario del GADCH informa que dará a conocer el estado financiero de la gobernación, indicando también que se observan irregularidades con respecto a la anterior gestión', 'https://www.facebook.com/TvSucreUSFX/videos/257624012422173', 20, 2, 54, 1),
(88, 1626914972, 1626739200, 'Autoridades de los Ayllus de San Lucas recibirán sus credenciales para el consejo municipal', 'Las primeras autoridades indígenas electas en Chuquisaca recibirán sus credenciales para el consejo municipal de San Lucas.', 'https://www.facebook.com/TvSucreUSFX/videos/257624012422173', 20, 2, 54, 1),
(89, 1626915790, 1626739200, 'Conade Cochabamba retoma movilizaciones desde el 6 de agosto y el MAS rechaza advertencias', 'El Comité Nacional de Defensa de la Democracia (Conade) de Cochabamba informó este martes que existe coordinación con plataformas cívicas del país, militares y policías pasivos para retomar movilizaciones a partir del próximo 6 de agosto en rechazo a los procesos contra ex autoridades. Lizeth Beramendi, miembro del Conade sostuvo que las medidas de protesta serán escalonadas en demanda de la libertad de los denominados “presos políticos” y la suspensión de procesos contra efectivos policiales. Ante estas aseveraciones, autoridades del Movimiento Al Socialismo (MAS), lamentan que organizaciones “busquen confrontación entre bolivianos”, la concejal de este partido, Silvia Soliz, aseveró que el oficialismo no responderá a estas advertencias y pidió no repetir las acciones del 2019.', 'https://www.facebook.com/400816867085296/posts/1221937741639867/?sfnsn=mo ', 35, 2, 18, 1),
(90, 1626916039, 1626825600, 'Sala Constitucional declara incompetencia con respecto a la elección de la directiva del consejo municipal', 'El tribunal de garantías ha constatado la vulneración del derecho al ejercicio de la función pública, la sala constitucional determino incompetencia en el caso de la elección de la directiva del consejo municipal haciendo énfasis de que en virtud al municipalismo, solo el consejo municipal puede dotarse de directiva', 'https://www.facebook.com/TvSucreUSFX/videos/142549941327102', 20, 2, 54, 1),
(91, 1626916474, 1626825600, 'El TED socializa normativas sobre derechos de la mujer acoso y violencia', 'Se realizo el diálogo sobre los derechos de las mujeres, acoso y violencia política dirigido a asambleístas departamentales. El órgano electoral bajo sus competencias socializó la normativa con respecto al tema.', 'https://www.facebook.com/TvSucreUSFX/videos/142549941327102', 20, 1, 54, 1),
(92, 1626916768, 1626739200, 'Revocan detención domiciliaria de Kaliman y emiten orden de aprehensión en su contra', 'La justicia determinó este martes revocar la detención domiciliaria y emitir orden de aprehensión en contra del excomandante de las Fuerzas Armadas (FF. AA), Williams Kaliman Romero, por el delito de Incumplimiento de Deberes en un proceso interpuesto por el abogado Omar Durán, vinculado a no haber movilizado a tiempo a los efectivos militares para frenar la convulsión social del 2019. El denunciante, Omar Durán, informó que en audiencia virtual la jueza del caso declaró en rebeldía al exjefe castrense y ordenó la ejecución de los Bs 50.000 que depositó como fianza para su búsqueda. Según explicó el jurista, a la audiencia solo se presentó la abogada de Kaliman “sin ningún poder para hablar”, por lo que la justicia determinó ejecutar la orden de aprehensión, se determinó la anotación de los bienes del excomandante de las FFAA quien es buscado por la policía y fiscalía boliviana por el caso del supuesto “golpe de Estado” y por un segundo proceso.', 'https://www.facebook.com/400816867085296/posts/1221921184974856/?sfnsn=mo ', 35, 2, 18, 1),
(93, 1626916900, 1626825600, 'Comité Cívico lanzó una convocatoria a las instituciones para asamblea', 'El Comité Cívico lanzo una convocatoria a las intituciones con el fin de hacer respetar los derechos del Departamento de Chuquisaca, el comité se manifiesta ante la noticia de que la sesión de honor del 6 de agosto no se llevará a cabo en Sucre, exigen que se cumpla la ley ', 'https://www.facebook.com/TvSucreUSFX/videos/142549941327102', 20, 2, 54, 1),
(94, 1626917120, 1626739200, 'Comcipo no descarta medidas de presión contra la “persecución política”', 'El Comité Cívico Potosinista (Comcipo), convocó a todas sus instituciones afiliadas a un consejo consultivo presencial para esta noche donde se determinará si se asumirán medidas de presión contra la “persecución política” activada según consideran, desde instancias judiciales contra dirigentes cívicos y de otros sectores citados para comparecer por los hechos de 2019. “Ya ha empezado la persecución, tenemos que respetar la lucha del pueblo boliviano, del pueblo potosino. Nada está descartado, los delegados van a hacer escuchar su voz indicando claramente qué es lo que debemos hacer para poner un alto a esta situación”, sostuvo Juan Carlos Manuel, representante de Comcipo.', 'https://www.facebook.com/400816867085296/posts/1221941294972845/?sfnsn=mo ', 35, 2, 18, 1),
(95, 1626917240, 1626739200, 'Defensa de policías enjuiciados anuncia procesos contra la Fiscalía Policial', 'El abogado de 3 funcionarios policiales procesados por el presunto “motín policial” presentará una denuncia contra la fiscalía policial y el tribunal discipilario por incumpliento de deberes, y que el Capitan Gabriel Vargas haciendo uso de su derecho constitucional a expresarse públicamente es observado por haber vertido declaraciones a los medios de comunicación .', '', 35, 2, 18, 1),
(96, 1626917591, 1626739200, 'Comunidad Ciudadana afirma de UCCS quiere dilatar las sesiones para el Pago de Bono Escolar', 'Para Comunidad Ciudadana llama la atención que UCSS y el alcalde Jhonny Fernandez sigan postergando el tema del análisis del desayuno escolar y el bono estudiantil prometido en campaña.   Según el concejal Juan Carlos Terano no hay interés para pagar el bono estudiantil, y que es la segunda vez que suspenden la sesión de constitución. ', '', 35, 2, 18, 1),
(97, 1626917613, 1626825600, '16 De noviembre se realizara el censo en Bolivia ', 'La ministra de planificación y vivienda anuncio que el censo de realizara el 10 de noviembre del 2022', 'https://www.youtube.com/watch?v=ZP8GSnwDtNA', 32, 2, 43, 1),
(98, 1626917712, 1626825600, '16 De noviembre se realizara el censo en Bolivia ', 'La ministra de planificación y vivienda anuncio que el censo de realizara el 10 de noviembre del 2022', 'https://www.youtube.com/watch?v=ZP8GSnwDtNA', 32, 2, 43, 1),
(99, 1626917740, 1626825600, 'Gobierno aprueba Decreto Supremo que declara prioridad el Censo de Población para el 2022', 'El presidente Luis Arce informó que el gabinete de ministros aprobó este miércoles el Decreto Supremo que declara prioridad nacional el Censo de Población y Vivienda para 2022.', 'https://www.reduno.com.bo/noticias/gobierno-aprueba-decreto-supremo-que-declara-prioridad-el-censo-de-poblacion-para-el-2022-2021721112921', 24, 1, 29, 1),
(100, 1626917907, 1626739200, 'Los familiares de los policías citados por el caso motín policial piden justicia', 'Piden a la Fiscalía y al Tribunal Policial actuar de manera parcializada ante los procesos que se sigan contra sus familiares lamentan que las pericias realizadas no hayan sido tomadas en cuenta por el Tribunal Disciplinario y que se trataría de una persecución política hacia los uniformados. ', '', 35, 2, 18, 1),
(101, 1626918192, 1626739200, 'Los campesinos de la federación de trabajadores de Santa Cruz piden que el Diputado Rolando Cuellar se dedique a trabajar', 'Los campesinos de la federación de trabajadores de Santa Cruz piden que el Diputado Rolando Cuellar se dedique a trabajar desde el parlamento nacional por el país y dejar de interferir en la institución intentando un paralelismo dirigencial. Según el dirigente Marco Miranda, no permitirán más intentos de dividir la dirigencia campesina. ', '', 35, 2, 18, 1),
(102, 1626918417, 1626825600, 'El viceministro de régimen interior y policial Nelson Cox habla de la aprehensión al líder de la Resistencia Juvenil', 'El viceministro de régimen interior y policial Nelson Cox habla de la aprehensión al líder de la Resistencia Juvenil Cochala Mario Bascope que se trasladó del departamento de Santa Cruz al departamento de Sucre, acusado por los daños ocasionados al patrimonio de esta ciudad en 6 de octubre del año 2020.', '', 35, 2, 18, 1),
(103, 1626918497, 1626825600, 'Esposas de Policias en vigilia ', 'La esposas de los policías  están en el cuarto día de vigilia y aseguran que continuarán con las medidas, ya que muchos de los policías enjuiciados no están permitidos a dar declaraciones a los medios de comunicación. ', '', 35, 2, 18, 1),
(104, 1626918643, 1626825600, 'Formarán comisión rumbo al CENSO', 'La alcaldesa Eva Copa indicó que se conformó una comisión técnica para el CENSO DE 2022, adelantó que El Alto recibiría mayor comisión debido al CENSO y que serán designados a la salud y a la educación, ayudará en la re activación económica', 'reduno.com.bo', 24, 2, 29, 1),
(105, 1626918809, 1626825600, 'Mario Antonio \"Tonchy\" Bascope fue trasladado a Sucre', 'Nelson Cox, vice ministro indica que Mario Bascope miembro de la Resistencia Juvenil Cochala fue apresado y transladado al penal de Sucre', 'https://youtu.be/ZP8GSnwDtNA', 32, 2, 43, 1),
(106, 1626919280, 1626825600, 'CENSO de población y vivienda será el 16 de noviembre de 2022', 'Gabriela Mendoza indica que el gobierno central realiza esfuerzos a partir del ministerios de planificación y desarrollo y del INE para revertir el descuido del gobierno de facto, el CENSO permitirá una fotografía clara de la realidad pública', 'http://www.boliviatv.bo/principal/tvenvivo71.php', 32, 1, 29, 1),
(107, 1626919553, 1658361600, 'CENSO permitirá certidumbre para el país', 'El diputado Juan Angulo indica que es una señal del gobierno que va a llevarlo a cabo, dejando de lado lo que tergiversaba la oposición y dejando de lado la acción del gobierno de facto que no quería llevar a cabo el CENSO', 'http://www.boliviatv.bo/principal/tvenvivo71.php', 24, 1, 29, 1),
(108, 1626919729, 1626825600, 'Ya existe fecha para el Censo de Población y Vivienda.', 'El Gobierno de Bolivia aprobó este miércoles mediante Decreto Supremo la realización del Censo de población y vivienda para el 16 de noviembre del próximo año.', 'https://twitter.com/Canal_BoliviaTV/status/1418022423488876546?s=19', 32, 1, 34, 1),
(109, 1626920304, 1626825600, 'El alcalde La Paz propone crear una comisión para garantizar confiabilidad.', 'ARIAS PROPONE CREAR COMISIÓN PARA GARANTIZAR CONFIABILIDAD DEL CENSO  El alcalde de La Paz, Iván Arias, propuso este miércoles conformar una comisión para garantizar la confiabilidad del #Censo de Población y Vivienda, programado para el 16 noviembre de 2022.', 'https://www.facebook.com/452244424816992/posts/5993378000703579/', 23, 2, 34, 1);
INSERT INTO `noticia` (`idnoticia`, `fecha_registro`, `fecha_noticia`, `titular`, `resumen`, `url_noticia`, `rel_idmedio`, `rel_idcuestionario`, `rel_idusuario`, `esta_activa`) VALUES
(110, 1626920449, 1626825600, 'El censo de población y vivienda se realizara el 16 de Noviembre de 2022.', 'El presidente Luis Arce informó que el gabinete de ministros aprobó este miércoles el Decreto Supremo que declara prioridad nacional el Censo de Población y Vivienda para 2022. “Hoy en Gabinete aprobamos el Decreto Supremo que declara prioridad nacional el Censo de Población y Vivienda 2022. Nuestro Gobierno, como comprometió, garantiza el financiamiento y respaldo institucional para realizar el Censo Nacional en noviembre 2022”, aseguró mediante una publicación en su cuenta en la red social Facebook.', 'https://www.facebook.com/452244424816992/posts/5991973010844078/', 23, 1, 34, 1),
(111, 1626920792, 1626825600, 'Beneplácito por la realización del Censo por parte de la FEJUVE.', 'Fejuve aplaude la realización del censo en Bolivia ya que primeramente estaba programado para el 2024. El dirigente de la FEJUVE La Paz, Flavio Chacón, aplaudió la realización del censo a llevarse a cabo el 16 de Noviembre y establece que pedirán que tenga una pregunta sobre el internet, dijo Chacón  ', 'https://www.facebook.com/452244424816992/posts/5991877017520344/', 23, 2, 34, 1),
(112, 1626921125, 1626825600, 'Fedjuve celebra sus 70 años con un desfile y genera críticas', 'En medio de la pandemia la Fedjuve realiza un desfile por los 70 años de su fundación causando incertidumbre en la población orureña', 'https://impresa.lapatria.bo/noticia/1040246/fedjuve-celebra-sus-70-anos-con-un-desfile-y-genera-criticas#articulo', 15, 2, 17, 1),
(113, 1626921575, 1626825600, 'Oruro en pie de lucha desde el lunes ante indiferencia del Gobierno', 'El vicepresidente del Comité Cívico, German Delgado señaló que hasta la fecha no se tuvo respuesta enviando una nota de solicitud de atención para el desarrollo de Oruro conjuntamente con el tema en discusión de las regalías, ya que Oruro solo percibe el tres por ciento de la producción minera y la misma suerte correrá la explotación del litio.  ', 'https://lapatria.bo/2021/07/21/oruro-en-pie-de-lucha-desde-el-lunes-ante-indiferencia-del-gobierno/', 15, 2, 30, 1),
(114, 1626924134, 1626825600, 'Aprenden a otro líder de la resistencia cochala ', '						Aprenden a Mario Bascope ex líder de la resistencia cochala por atentados a los vienes del estado, dio a conocer el viceministro  de regímen  interior y policías Nelson Cox.					', 'https://www.redbolivision.tv.bo/video/noticieros-al-dia-programa-del-21-de-julio-del-2021/', 22, 2, 31, 1),
(115, 1626926029, 1626825600, 'Diputados adjudica sus muebles a importadores y promete otras licitaciones a productores', 'Entre junio y julio de este año, la Cámara de Diputados lanzó una decena de licitaciones para la compra de sillas, escritorios, teléfonos y un centro de datos por la suma de Bs 15,7 millones. Las licitaciones contenían exigencias que los microproductores no podían cumplir.  ', 'https://eldeber.com.bo/pais/diputados-adjudica-sus-muebles-a-importadores-y-promete-otras-licitaciones-a-productores_240077?utm_medium=Social&utm_sour', 17, 2, 16, 1),
(116, 1626926264, 1626825600, 'Gobernación, Alcaldía y cívicos anuncian fiscalización del censo en 2022', 'De acuerdo al anuncio del Ministerio de Planificación del Desarrollo, el censo será financiado por el Banco Mundial y se prevé que los resultados finales se den a conocer en el plazo máximo de un año, después haberse recabado los datos', 'https://eldeber.com.bo/santa-cruz/gobernacion-alcaldia-y-civicos-anuncian-fiscalizacion-del-censo-en-2022_240058?utm_medium=Social&utm_source=Facebook', 17, 2, 16, 1),
(117, 1626926382, 1626825600, 'El Censo de Población y Vivienda se realizará el 16 de noviembre de 2022', 'La ministra de Planificación confirmó la fecha de la encuesta nacional. Se deberá esperar un año para la difusión de los resultados del censo, que contará con el apoyo financiero del Banco Mundial', 'https://eldeber.com.bo/pais/el-censo-de-poblacion-y-vivienda-se-realizara-el-16-de-noviembre-de-2022_240014?utm_medium=Social&utm_source=Facebook#Echo', 17, 2, 16, 1),
(118, 1626927722, 1626825600, 'Habilitan 107 mesas para las elecciones de Comteco este domingo de 8:00 a 16:00', 'El presidente del Tribunal Electoral Departamental, Humberto Valenzuela, entregó los elementos de bioseguridad para la realización de los comicios de este fin de semana, las mesas señaladas están en 28 recintos de votación en 11 municipios que son Cochabamba (Cercado), Sacaba, Quillacollo, Tiquipaya, Colcapirhua, Punata, Cliza, Tarata, Puerto Villarroel, Aiquile y Capinota. El subcomandante departamental de la Policía, Ivan Jose Cordero, dijo que el resguardo policial estará en proceso desde el día sábado con el traslado de las papeletas y el día domingo estarán en presencia del personal encargado hasta que termine la jornada electoral de este domingo.', 'https://www.opinion.com.bo/articulo/cochabamba/elecciones-comteco-serian-domingo-8-00-16-00-votacion-107-mesas/20210721115433828119.html', 13, 1, 39, 1),
(119, 1626928775, 1626825600, 'Lima sobre denuncia de Áñez: “Este ataque nos da la oportunidad de demostrar la verdad de las masacres”', 'El ministro de Justicia Iván Lima responde a la denuncia formal que la expresidenta Jeanine Añez realizó en contra de la autoridad y por ello lo calificó como un ataque, ante ello Lima dijo que la denuncia de la expresidenta no es eficiente la demanda que se presenta e indicó que al momento de admitirse la demanda el Gobierno demostrara la “excepción de la verdad”.', 'https://www.opinion.com.bo/articulo/pais/lima-denuncia-anez-ataque-nos-da-oportunidad-demostrar-verdad-masacres/20210721223237828192.html', 13, 2, 39, 1),
(120, 1626929786, 1626825600, 'Cox: políticos que desinformen sobre tráfico de armas, pueden ser vinculados al caso de Argentina', 'El viceministro de Régimen Interior, Nelson Cox, advirtió que las personas políticas que no informen sobre la denuncia de tráfico ilícito de municiones de Argentina serán vinculados al caso, el canciller Rogelio Mayta junto con Edmundo Novillo, no se dio la contradicción de que los materiales hayan sido utilizados en las masacres tanto de Sacaba como de Senkata, en las cuales fallecieron más de 30 personas, donde hubo intervenciones de fuerzas militares y policiales a marchas de organizaciones afines al MAS, en ese sentido la alianza opositora Comunidad Ciudadana (CC), Carlos Mesa, calificó de Tramoya vergonzosa, a este tipo de denuncias las cuales fueron sustentadas por el Gobierno pero que siguen en investigación como en Bolivia y Argentina.', 'https://www.opinion.com.bo/articulo/pais/cox-politicos-que-desinformen-trafico-armas-pueden-ser-vinculados-caso-armas-argentina/20210721184711828150.h', 13, 2, 39, 1),
(121, 1626930323, 1626825600, 'Del Castillo: Creemos que en un futuro cercano una mujer comandará la Policía', 'El ministro de Gobierno, Eduardo Del Castillo, señaló que en un futuro cercano se espera que una mujer sea Comandante de la Policía Boliviana, hizo esa declaración para defender el proyecto de Ley de Ascensos de la Policía.', 'https://www.opinion.com.bo/articulo/pais/castillo-creemos-que-futuro-cercano-mujer-comandara-policia/20210721115040828117.html', 13, 2, 39, 1),
(122, 1626931625, 1626825600, 'Lío de tierras persiste; interculturales anuncian protestas contra Camacho', 'El secretario ejecutivo de la Federación Sindical de Comunidades Interculturales Productores Agropecuarios de la Gran Chiquitania, Oscar Castro, dio a conocer que procederán a realizar movilizaciones en contra de Luis Fernando Camacho, gobernador de Santa Cruz, a causa que generó confrontaciones entre bolivianos por la dotación de tierras, se rechazó las acusaciones de que el Gobernador cruceño realizó avasallamiento, además se le acusó de confrontar con discursos de regionalismo a los bolivianos por la dotación de tierras, por ello mismo se solicitó al Instituto Nacional de Reforma Agraria (INRA) que proceda a realizar auditorías a aquellas tierras fiscales y tituladas en la Chiquitania. ', 'https://www.opinion.com.bo/articulo/pais/lio-tierras-persiste-interculturales-anuncian-protestas-camacho/20210721004910828101.html', 13, 2, 39, 1),
(123, 1626978674, 1626739200, 'asdfasdf', 'adsfasdf', 'www.pagina7.com/actualidad/sociedad/declaracionesCSUTCB', 14, 1, 51, 1),
(124, 1626979036, 1626825600, ' b c c c a s f ', '						 gfhsf dfgh kufyuil ukhj					', 'asdfasd gnhdfhdf ', 47, 1, 51, 0),
(125, 1626996750, 1626825600, 'adgasdfg adsfg adfg  adfg', 'QUÉ ; QUIÉN; POR QUÉ ', 'reduno.bo/política/declaracionesvocalbaptista', 24, 1, 51, 1),
(126, 1627008794, 1626912000, 'CIDH presentara informe final este viernes a cancillería de Bolivia', 'E ministro de Juticia Ivan Lima, informo que este viernes se presentara el informe final en relacion los hechos acontoncidos en noviembre del 2019', 'https://www.youtube.com/watch?v=JPwY5pGHCtQ', 32, 2, 43, 1),
(127, 1627008948, 1626912000, 'El TSE instruye a organizaciones políticas adecuar sus estatutos', 'El TSE comunicó que los partidos políticos y agrupaciones ciudadanas con personalidad jurídica vigente deben incorporar en sus estatutos mecanismos para la resolución de denuncias contra el acoso político y la despatriarcalización', 'https://twitter.com/ATBDigital/status/1418341594823077888?s=19', 23, 2, 34, 1),
(128, 1627009322, 1626912000, 'Mesa apunta seis “rupturas democráticas” cometidas por Evo y dice que la Fiscalía debería investigarlo', 'Carlos Mesa, aseveró que el caso “golpe de Estado” es una “tramoya” política y afirmó que el exmandatario Evo Morales cometió al menos seis rupturas democráticas, por lo que el acusado por la Fiscalía debería ser Morales', 'https://www.lostiempos.com/actualidad/pais/20210722/mesa-apunta-seis-rupturas-democraticas-cometidas-evo-dice-que-fiscalia', 12, 2, 44, 1),
(129, 1627009410, 1626912000, 'Comcipo se declara en emergencia y se movilizará en rechazo a la persecución política', 'El Comité Cívico de Potosí (Comcipo) se declaró en estado de emergencia y resolvió movilizarse el 30 de julio en rechazo a las \"intimidaciones\", amenazas y la \"persecución\" política-judicial a cívicos y representantes del magisterio urbano, esto en relación a las protestas que protagonizaron el 2019.', 'https://www.lostiempos.com/actualidad/pais/20210722/comcipo-se-declara-emergencia-se-movilizara-rechazo-persecucion-politica', 12, 2, 44, 1),
(130, 1627009583, 1626912000, 'Asamblea legislativa departamental pide creación de una comisión  mixta para encarar el censo 2022  ', 'La asamblea departamental de Santa Cruz solicita la conformación de una comisión mixta para enfrentar el ceno poblacional 2022  en conjunto del ejecutivo', 'https://www.youtube.com/watch?v=JPwY5pGHCtQ', 32, 2, 43, 1),
(131, 1627009597, 1626912000, 'Gobierno anuncio la realización del censo de población y vivienda para el 16 de noviembre de 2022', '						El Presidente Arce, mediante Decreto Supremo, aprobó la realización del censo de población y vivienda para el 16 de noviembre del año 2022, el argumento planteado es tener una planificación política a través del ordenamiento de datos y cifras; el presupuesto se encuentra garantizado a través del financiamiento externo con asesoramiento del Banco Mundial, para garantizar el trabajo del INE y las regionales. 					', 'https://www.facebook.com/KanchaParlaspa/videos/348621670187812/', 37, 1, 42, 1),
(132, 1627009776, 1626912000, 'Gobierno tomo una buena decisión y ayudaran a gobernaciones ', 'Representante del sector gremial cruceño felicita la decisión del gobierno de encarar el censo 2022 ya que permitirá una mejor distribución de los recursos ', 'https://www.youtube.com/watch?v=JPwY5pGHCtQ', 32, 2, 43, 1),
(133, 1627009821, 1626912000, 'Gobierno tomo una buena decisión y ayudaran a gobernaciones ', 'Representante del sector gremial cruceño felicita la decisión del gobierno de encarar el censo 2022 ya que permitirá una mejor distribución de los recursos ', 'https://www.youtube.com/watch?v=JPwY5pGHCtQ', 32, 2, 43, 1),
(134, 1627010262, 1626912000, 'Gobierno dice que Banco Mundial garantizó el financiamiento del censo 2022', 'La ministra de Planificación del Desarrollo, Gabriela Mendoza, informó este viernes que el Banco Mundial (BM) aseguró su colaboración en el financiamiento para la ejecución del Censo de Población y Vivienda el 16 de noviembre de 2022.', 'https://www.lostiempos.com/actualidad/economia/20210722/gobierno-dice-que-banco-mundial-garantizo-financiamiento-del-censo-2022', 12, 2, 44, 1),
(135, 1627010400, 1626825600, 'Censo de población se realizará el 16 de noviembre de 2022', 'El presidente Luis Arce informó en su cuenta de Twitter este miércoles que el Gabinete de ministros aprobó un decreto que declara prioridad la realización del Censo de Población y Vivienda en noviembre de 2022.', 'https://www.lostiempos.com/actualidad/economia/20210721/censo-poblacion-se-realizara-16-noviembre-2022', 12, 2, 44, 1),
(136, 1627011282, 1626912000, 'Anuncio de bloqueo divide criterios en la ALDO', 'El bloqueo indefinido anunciado en horas precedentes por el Comité Cívico generó repercusión en la Asamblea Legislativa Departamental de Oruro . «El Comité Cívico me parece que recién se está dando cuenta que el Gobierno nacional jamás ha atendido a esta región, un gobierno de la línea de Evo Morales, siempre nos han tratado como un patio trasero de Bolivia si no hay presión el gobierno no nos va atender lamentablemente», aseveró el asambleísta de Un Sol Para Oruro, Román Brito.', 'https://impresa.lapatria.bo/noticia/1040321/anuncio-de-bloqueo-divide-criterios-en-la-aldo#articulo', 15, 2, 17, 1),
(137, 1627011360, 1626912000, 'COD pide proyectos de industrialización para Oruro', 'El ejecutivo de la COD, Elías Colque pidió al Gobierno Central que los proyectos de industrialización especialmente en el área de la minería se reactive ya que Oruro es una zona minera.					', '', 39, 2, 30, 1),
(138, 1627011883, 1626912000, 'Carlos Mesa pide a la Fiscalía investigar a Evo Morales por los 6 delitos cometidos ', 'En un artículo de Carlos Mesa, titulado Evo Morales y su desprecio por la constitución y la democracia,es donde detalla los hechos del año 2019, donde también ratificó que el caso por el supuesto “golpe de Estado” es una tramoya política, habla de los delitos del no reconocimiento del referéndum del año 2016, el fraude de las elecciones 2019 y plan de dejar sin un gobierno al país.', '', 35, 2, 18, 1),
(139, 1627012005, 1626912000, 'Enfrentamiento para la de la renuncia de la Defensora del Pueblo ', 'Mediante una carta abierta el Conade le exige a la defensora del pueblo interina Nadia Cruz, su renuncia ya que afirman que existe silencio y complicidad ante un evidente abuso de poder y una vulneración de los derechos constitucionales del líder de la resistencia juvenil cochala Mario Bascope.  El presidente del conade Manuel Morales sostiene que es una violscionde los derechos humanos ', '', 35, 2, 18, 1),
(140, 1627012478, 1626912000, 'Asamblea Legislativa eligira nuevos vocales electorales.', 'Tras la suspensión de cuatro vocales en el departamento del Beni, el asambleísta Marcelo Vargas dijo que se procederá a convocar a los nuevos asambleístas y que será un proceso transparente, normativo.', '', 35, 2, 18, 1),
(141, 1627013371, 1626912000, '43% de la población vacunada en Pando ', 'La ciudadanía tiene mal información sobre las vacunas y más aún en el Área rural ', 'Canal 15 SPC ', 27, 2, 20, 1),
(142, 1627013640, 1626912000, 'Transparencia dice que aumentan denuncias contra Exintendente Vargas', 'El director de Transparencia y Lucha contra la Corrupción, Davy Ureña dijo que se registraron otras cinco denuncias que van en contra del ex intendente Fernado Vargas, que ahora involucra a su pareja, Lorena Zeballos, pero la Dirección de Transparencia y Lucha Contra la Corrupción está abierta para Fernando Vargas y para toda la población general debido a que en sus redes sociales se denuncian actos de corrupción al interior del municipio. ', 'https://www.opinion.com.bo/articulo/cochabamba/transparencia-informa-que/20210722165751828281.html', 13, 2, 39, 1),
(143, 1627014026, 1626912000, 'Ex Comandante Inchauste declara en el Colegio de Abogados', 'El excomandante fue trasladado al colegio de abogados para brindar su declaración, es acusado por homicidio. Fue aprendido por los hechos de senkata de 2019', '', 24, 2, 29, 1),
(144, 1627014205, 1626912000, 'Grupo interdisciplinarios de expertos de la CIDH presentará informe final al gobierno', 'Se presentará este viernes el informe oficialmente a la Cancillería, el informe trata sobre la investigación de los hechos de Senkata y Sacaba, las autoridades analizaran y presentarán el informe en un lapso de 10 días, no es una sentencia solo un informe consultivo, por eso en algunas partes es vinculante y en otras tiene carácter de recomendación.', '', 24, 2, 29, 1),
(145, 1627014372, 1626912000, 'Ivan Lima señala que si Jeanine Añez presenta una demanda en su contra, entonces citará un recurso de excepción', 'El ministro Lima no sabe oficialmente si será demandado, pero en caso de entonces presentará un recurso de excepción de verdad con lo que busca demostrar la responsabilidad de la exmandataria por las muertes de Senkata y Sacaba.', '', 24, 2, 29, 1),
(146, 1627014623, 1626912000, 'El GIEI entregará su informe de hechos de 2019 y estiman que en agosto será de conocimiento público', 'El Grupo Interdisciplinario de Expertos Independientes (GIEI) presentará este viernes un informe final explicando los hechos ocurridos en Bolivia entre los mese de septiembre y diciembre del año 2019 y existe la probabilidad de que se pueda hacer público el documento, por ello el Ministro de Justicia y Transparencia, Ivan Lima, confirmó que la documentación ser entregada este 23 de julio ante la Cancillería, en el informe que se emita por el GIEI no es equivalente a una sentencia ni tampoco a una opinión consultiva, sino a las preguntas de violaciones a los Derechos Humanos que habría ocurrido el 1 de septiembre al 31 de Diciembre del año 2019, durante aquellos meses de violencia, en Senkata, El Alto, se perdieron unas 10 vidas por impacto de bala, por otro lado en Sacaba, Cochabamba, fallecieron 10 personas en pleno operativo de la Policía y las Fuerzas Armadas para contener las protestas del partido político MAS. ', 'https://www.opinion.com.bo/articulo/pais/giei-entregara-informe-hechos-2019-estiman-que-agosto-sera-conocimiento-publico/20210722181030828286.html', 13, 2, 39, 1),
(147, 1627015132, 1626912000, 'COMCIPO se declara en emergencia y se moviliza en rechazo a la persecución política', 'COMCIPO resolvió movilizarse el 30 de julio próximo, en rechazo a la intimidación, amenazas y persecución político-judicial a Cívicos y representantes del Magisterio Urbano, en relación a las protestas realizadas el año 2019, emplazándoles a dar información sobre quienes formaron parte del directorio, que instituciones estuvieron en la lucha y las características de como formaron el comité de movilizaciones ese año.', 'https://www.facebook.com/KanchaParlaspa/videos/348621670187812/', 37, 2, 42, 1),
(148, 1627015586, 1626912000, 'Arce destaca que las mujeres son pilar fundamental del proceso de cambio', 'El presidente del Estado Plurinacional, Luis Arce Catacora, dijo que las mujeres bolivianas son baluarte y pilar fundamental del proceso de cambio, donde participó del primer ampliado nacional de la Confederación Nacional de Mujeres Campesinas Indígenas Originarias de Bolivia (CNMCIOB) Bartolina Sisa, donde se realizó en el departamento de Potosí en la localidad de Betanzos, en el cual el mandatario felicitó a las mujeres por ser partícipes de este gran encuentro y así también agradeció a las organizaciones sociales debido a la recuperación de la democracia. ', 'https://www.opinion.com.bo/articulo/pais/arce-destaca-que-mujeres-son-pilar-fundamental-proceso-cambio/20210722155215828275.html', 13, 2, 39, 1),
(149, 1627016285, 1626912000, 'FELCC aprehende y traslada a La Paz a general del Ejército por el caso Senkata', 'La Fuerza Especial de Lucha Contra el Crimen (FELCC) de Cochabamba aprehendió hoy por la mañana al general del Ejército, Iván Patricio Inchauste Rioja, por el marco de las investigaciones que está realizando el Ministerio Público debido a las muertes de Senkata en el año 2019, a estos 20 meses del conflicto suman 10 exjefes militares que están siendo procesados por las muertes de Sacaba (Cochabamba) y Senkata (El Alto), dentro estos 8 están con detención domiciliaria y preventiva y 2 de ellos tienen orden de captura, por ello el director de la FELCC, Rolando Rojas, informó que Inchauste ya fue llevado a La Paz donde se llevará a cabo la audiencia de medidas cautelares, por el que se acusa de homicidio y lesiones graves y leves. ', 'https://www.opinion.com.bo/articulo/pais/felcc-aprehende-traslada-paz-coronel-ejercito-caso-senkata/20210722153155828273.html', 13, 2, 39, 1),
(150, 1627017019, 1626912000, 'Áñez presenta denuncia contra Lima por difamación y calumnia', 'La expresidenta Jeanine Añez detenida en la cárcel de Miraflores, formalizó una denuncia en contra del Ministro de Justicia y Transparencia, Ivan Lima, por supuestas calumnias en su contra y por difamación, en respuesta a la denuncia Lima, a través de un comunicado, informó que es deficiente la procedencia de la denuncia y que se demostrara que Añez si es autora del fallecimiento de más de 22 personas en el conflicto del año 2019.  ', 'https://www.opinion.com.bo/articulo/pais/anez-presenta-denuncia-lima-difamacion-calumnia/20210722012554828249.html', 13, 2, 39, 1),
(151, 1627017694, 1626912000, 'Gobierno advierte con vincular al caso armas a quienes desinformen', 'La autoridad del viceministro de Régimen Interior, dependiente del Ministerio de Gobierno, Nelson Cox, informo que aquellos actores políticos que no informen a la población sobre el tráfico ilícito de armas podrían ser vinculados al caso por otra parte solicitó que los asambleístas de Comunidad Ciudadana (CC) deben ser más responsables con las declaraciones que brindan a la población con aquellas afirmaciones que prometen impunidad. ', 'https://www.opinion.com.bo/articulo/pais/gobierno-advierte-vincular-caso-armas-quienes-desinformen/20210722011100828242.html', 13, 2, 39, 1),
(152, 1627046492, 1626912000, 'Mineros exigen pronunciamiento de sus recursos', ' Sindicatos de mineros y fabriles muestran su rechazo a la falta de respeto por parte del tribunal constitucional plurinacional, a falta de notificación con respecto a sus recursos', 'https://www.facebook.com/TvSucreUSFX/videos/812127446332980', 20, 2, 54, 1),
(153, 1627054958, 1627516800, 'La derrota de keiko fujimori y reconoce al presidente electo proclamado del perú pedro castillo', '						Tras la derrota de keiko fujimori en la segunda vuelta electoral en el pais del peru pasado el 6 de junio pedro castillo es el actual ganador en las elecciones presidenciales 					', '', 47, 2, 22, 1),
(154, 1627055036, 1627084800, 'Aprueban juicio para el alcalde electo de cochabamba manfred reyes villa ', '						La Comisión Mixta de Justicia Plural de la Asamblea Legislativa aprobó ayer otros tres informes de juicios de responsabilidades para exautoridades de 2007 y 2008. En la lista figuran Leonilda Zurita, Arturo Murillo, el actual alcalde de Cochabamba Manfred Reyes Villa y otros.\r\nEn el primer caso, señala dentro del proceso a Reyes Villa como exprefecto, Murillo (exdiputado), Zurita (exsenadora) y Omar Fernández también como exsenador.\r\nSe los acusa por los delitos de incumplimiento de deberes, denegación de auxilio, sedición, incendio, destrucción o deterioro de bienes del Estado y la riqueza nacional, resoluciones contrarias a la Constitución y las leyes, instigación pública a delinquir, atentado contra la seguridad de los transportes, uso indebido de influencias y malversación.																			', 'https://grupocentro.com.bo/noticias/Local', 47, 2, 22, 1),
(155, 1627056468, 1626912000, 'Gobierno anuncio este miercoles  que el banco Mundial garantizó el financiamiento del censo 2022', 'La ministra de Planificación del Desarrollo, Gabriela Mendoza, informó este viernes que el Banco Mundial (BM) aseguró su colaboración en el financiamiento para la ejecución del Censo de Población y Vivienda el 16 de noviembre de 2022. que gestiono el banco mundial ', '', 47, 1, 22, 1),
(156, 1627080654, 1626998400, 'Se entregara bono estudiantil en el Alto.', 'Bono estudiantil reemplazara el desayuno escolar, se estima BS 300 en efectivo por cada estudiante, afirma la alcaldesa Eva Copa.', 'https://www.redbolivision.tv.bo/video/noticieros-al-dia-programa-del-23-de-julio-del-2021/', 22, 2, 31, 1),
(157, 1627082163, 1626912000, 'Vocal Baptista del TSE afirma que una auditoria al padrón es necesaria ', '						QUÉ / QUIÉN / POR QUÉ 					', 'https://correodelsur.com/politica/20210723_jubileo-censo-de-2022-permitira-al-pais-saber-donde-y-como-estamos.html', 14, 1, 51, 1),
(158, 1627093158, 1626998400, 'Procurador sobre informe del GIEI: Ojalá haya un punto sobre los medios que mintieron al país.', 'El procurador general del Estado, Wilfredo Chávez, afirmó este viernes que el informe del Grupo Interdisciplinario de Expertos Independientes (GIEI) debería tener un punto relacionado a los medios de comunicación y sus actores, por “mentir al país”. El exministro y exabogado de Evo Morales señaló que los medios de comunicación “tergiversan” las cosas cuando “se les dice la verdad”.', 'https://www.paginasiete.bo/nacional/2021/7/23/procurador-sobre-informe-del-giei-ojala-haya-un-punto-sobre-los-medios-que-mintieron-al-pais-301851.html', 14, 2, 34, 1),
(159, 1627093447, 1626998400, 'Justicia ordena la detención preventiva del general Inchauste en San Pedro.', 'La jueza primero cautelar de El Alto, Milenka Gutiérrez, dispuso esta tarde la detención preventiva en el penal de San Pedro de La Paz del excomandante del Ejército, general Iván Inchauste, imputado por los delitos de homicidio y lesiones graves y leves por el caso Senkata.  Inchauste, quien deberá permanecer encarcelado seis meses,  fue comandante accidental del Ejército durante el Gobierno transitorio de Jeanine Añez. Fue posesionado el 13 de noviembre por la mandataria de entonces junto a otros miembros del Alto Mando Militar. Sin embargo, en marzo de 2020 fue sustituido por Rubén Salvatierra Fuentes, presuntamente por haber mantenido contactos con el expresidente Evo Morales, acusación que rechazó.', 'https://www.paginasiete.bo/seguridad/2021/7/23/justicia-ordena-la-detencion-preventiva-del-general-inchauste-en-san-pedro-301883.html?__twitter_impres', 14, 2, 34, 1),
(160, 1627093949, 1626998400, 'Exjefe de Seguridad de Murillo, imputado por caso falsificación de condecoraciones.', 'En septiembre del año pasado, el Departamento de Análisis Criminal e Inteligencia (DACI) realizó un operativo en el que encontraron condecoración falsas en posesión de uniformados que iban a ser utilizados para obtener mejores calificaciones para los ascensos de policías. Entre ellos figuraba el nombre del actual comandante de la Policía, Jhonny Aguilera. Ciro Ortega, exjefe de Seguridad del exministro Arturo Murillo, fue imputado por los delitos de incumplimiento de deberes y uso indebido de influencias por el caso de falsificación de al menos 40 condecoraciones de la Policía Nacional, informó hoy el coordinador de la Fiscalía Departamental de La Paz, Sergio Bustillos. ', 'https://www.paginasiete.bo/seguridad/2021/7/23/exjefe-de-seguridad-de-murillo-imputado-por-caso-falsificacion-de-condecoraciones-301881.html?__twitter', 14, 2, 34, 1),
(161, 1627095866, 1626998400, 'Patty pide ALP realizar interpelación al fiscal', 'la ex asambleísta por el Movimiento a socialismo pide procesar al ex fiscal general por el caso golpe de estado', 'https://www.youtube.com/watch?v=_lirbxJsanQ', 32, 2, 43, 1),
(162, 1627096012, 1626998400, 'Movilización permitió el retorno de la democracia en Bolivia ', 'Las movilización de los movimientos sociales, permitieron el retorno a la democracia mediante las elecciones realizadas el 2020', 'https://www.youtube.com/watch?v=_lirbxJsanQ', 32, 2, 43, 1),
(163, 1627096641, 1626998400, 'Aprehenden a ex-comandante del ejército por el caso Senkata.', 'Ivan Inchauste, que fuera comandante del ejército durante el gobierno transitorio de Jeanine Añez, fue aprehendido en Cochabamba y trasladado a La Paz; actualmente espera la concreción de su audiencia cautelar en celdas de la FELCC.', '', 43, 2, 46, 1),
(164, 1627097242, 1626998400, 'Parlamentario de Creemos cuestiona, la dilación que induce el gobierno, a la publicación del informe sobre DD.HH. de la CIDH para el caso de Sacaba y Senkata.', '												Erwin Bazan, diputado de Creemos por Santa Cruz, señala que el informe sobre DD.HH. de la CIDH es retrasado por el gobierno, quien ya habría anunciado 2 fechas para su publicación, incumpliendo con ambas fechas dispuestas; y condicionando una tercera fecha tentativa, a la previa revisión del informe, por parte del gobierno.										', '', 43, 2, 46, 1),
(165, 1627101485, 1626998400, 'Alcaldesa de Cobija se refiere a la importancia del nuevo censo', 'Para la Alcaldesa de Cobija, el nuevo censo será muy importante porque ayudará a generar empleo, realizar proyectos de alcantarillado y agua potable, así como mejorar la educación y la salud con la construcción de hospitales, ya que ese municipio esta trabajando con recursos del 2008, porque en el ultimo censo Cobija tenía 48.000 habitantes, cuando en realidad cuenta con mas de 100.000 habitantes.', 'https://www.facebook.com/KanchaParlaspa/videos/1001484654031186', 37, 1, 42, 1),
(166, 1627101921, 1626998400, 'Aprehensión es Inchauste es Ilegal', 'Rene Villarroel, abogado de Inchauste, indica que no es parte del proceso y es inocente, por lo que presentaron una acción de libertad por aprehensión ilegal. Inchauste se acogió al silencio, Villarroel indica que apoyará con la investigación de los hechos para todo se esclaresca. Fue imputado por homicidio, lesiones graves y leves, la fiscalía pide la detención preventiva, es investigado por las muertes de Senkata en noviembre. ', '', 24, 2, 29, 1),
(167, 1627102047, 1626998400, 'Detención preventiva para Inchauste', 'Concluyó la audiencia de medidas cautelares virtual del ex general Inchauste, su abogado Villarroel indica que se determinó la detención preventiva pese a que se indicó que los riesgos procesales no calificaban porque la documentación no fue valorada por el juez, la acción de libertad también fue negada. Entre hoy o mañana se lo trasladará a San Pedro, los delitos son el supuesto homicidio y lesiones graves ', '', 24, 2, 29, 1),
(168, 1627102151, 1626998400, 'Declara Ex jefe del Estado MayoR', 'Pablo Guerra terminó su delcaración en el Colegio de Abogados, será trasladado a las celdas de la FELCC, mañana (sábado) será la audiencia para determinar medidas cautelares', '', 24, 2, 29, 1),
(169, 1627102241, 1626998400, 'Inchauste se acogió al silencio', 'El coronel Alberto Aguilar indica que se continúa con los trabajos de investigación, no encontraron al ex comandante de la armada boliviana, el contra almirando Orlando Mejía, localizaron su domicilio en la zona sur pero dieron con él. Mejía es investigado también por lesiones graves y leves, homicidio supestamente cometidos en los hechos de noviembre 2019. ', '', 24, 2, 29, 1),
(170, 1627102428, 1626998400, 'Ex jefe del Estado Mayor fue trasladado a la FELCC, es procesado por las muertes en Senkata', 'La declaración informativa duró más de 4 horas, el ex general Guerra fue trasladado a la FELCC donde pasará la noche y mañana será la audiencia de medidas cautelares, es acusado por homicidio y lesiones graves y gravísimas', '', 24, 2, 29, 1),
(171, 1627102788, 1626998400, 'La Fiscalía aprehende al exjefe de Estado Mayor de las FFAA por el caso Senkata', 'El exjefe de Estado Mayor General de las Fuerzas Armadas Pablo Arturo Guerra Camacho fue detenido este viernes en la ciudad de La Paz. Tras ser llevado a su audiencia fiscal, fue aprehendido', 'https://www.la-razon.com/nacional/2021/07/23/la-fiscalia-aprehende-al-exjefe-de-estado-mayor-de-las-ffaa-por-el-caso-senkata/', 53, 2, 29, 1),
(172, 1627103001, 1626998400, 'Mando policial de 2019 reunió a los agregados policiales y pidió agentes químicos', 'El exagregado de la Gendarmería argentina en Bolivia Héctor Adolfo Caliba informó de la convocatoria y reunión al comandante de la Gendarmería Gerardo José Otero.', 'https://www.la-razon.com/nacional/2021/07/23/mando-policial-de-2019-reunio-a-los-agregados-policiales-y-pidio-agentes-quimicos/				k			 							', 53, 2, 29, 1),
(173, 1627103126, 1626998400, 'Envían a la cárcel al excomandante del Ejército Inchauste por el caso Senkata', 'El excomandante del Ejército Iván Patricio Inchauste Rioja fue enviado con detención preventiva por seis meses a la cárcel de San Pedro. Cuatro militares están procesados por este caso', 'https://www.la-razon.com/nacional/2021/07/23/envian-a-la-carcel-al-excomandante-del-ejercito-inchauste-por-el-caso-senkata/', 53, 2, 29, 1),
(174, 1627103686, 1626998400, 'Camacho niega trámite de asilo y revela que ‘hubo embajadas que le ofrecieron asilo’ en 2019', 'El excívico y gobernador cruceño Luis Fernando Camacho confirmó que, efectivamente, tuvo una reunión con los cónsules de Argentina y España, quienes pidieron garantías para poder salir de Bolivia', 'https://www.la-razon.com/nacional/2021/07/23/camacho-niega-tramite-de-asilo-y-revela-que-hubo-embajadas-que-le-ofrecieron-asilo-en-2019/', 53, 2, 29, 1),
(175, 1627103792, 1626998400, 'Exjefe del Estado Mayor de las FFAA es detenido por los hechos registrados en Senkata', 'Pablo Arturo Guerra Camacho fue detenido en su domicilio por la DACI en cumplimiento a una orden del Ministerio Público. Con el General de División Aérea ya son cuatro los militares procesados en este caso.', 'https://www.la-razon.com/nacional/2021/07/23/exjefe-del-estado-mayor-de-las-ffaa-es-detenido-por-los-hechos-registrados-en-senkata/', 53, 2, 29, 1),
(176, 1627103935, 1626998400, 'Arce dice que cada día se ratifica que el ‘golpe’ tuvo participación de toda la derecha del continente', '“La derecha no duerme, la derecha está ahí al frente y todos sabemos que tenemos un enemigo común ahí al frente”, expresó el Jefe del Estado. Indicando que día que pasa se ratifica el golpe del 2019 en la cual participó toda la derecha del continente', 'https://www.la-razon.com/nacional/2021/07/23/arce-dice-que-cada-dia-se-ratifica-que-el-golpe-tuvo-participacion-de-toda-la-derecha-del-continente/', 53, 2, 29, 1),
(177, 1627137915, 1626998400, 'TSE asume administración del TED de Beni', 'El Tribunal Supremo Electoral (TSE) asumió \"administrativamente\" funciones en el Tribunal Electoral Departamental (TED) de Beni, después que esta entidad quedó descabezada producto de un amparo constitucional que anuló todo el proceso de selección de vocales electorales de diciembre de 2019 y cuatro vocales quedaron cesados de sus funciones.', 'https://www.lostiempos.com/actualidad/pais/20210723/tse-asume-administracion-del-ted-beni', 12, 1, 44, 1),
(178, 1627138282, 1626998400, 'Relator de ONU ve \"preocupante\" y \"grave\" la remoción de vocales electorales en Bolivia', 'El Relator Especial de la ONU, Diego García, se pronunció este viernes después de que el presidente Luis Arce, por decretos, cesó en el cargo a vocales electorales departamentales elegidos por Jeanine Áñez. Consideró que se trata de una situación “muy grave para el Estado de Derecho”.', 'https://www.lostiempos.com/actualidad/pais/20210723/relator-onu-ve-preocupante-grave-remocion-vocales-electorales-bolivia', 12, 1, 44, 1),
(179, 1627140844, 1627084800, 'Censo Prueba de insercion', 'Resumen de la prueba de insercion', 'https://censo-noticia', 24, 3, 5, 1),
(180, 1627179212, 1626825600, 'Gobierno aprueba decreto y anuncia Censo para el 16 de noviembre de 2022', 'El gobierno, mediante un Decreto Supremo, anuncia que se realizará el Censo de Población y Vivienda para el 16 de noviembre de 2022, esta información fue proporcionada por la ministra de Planificación del Desarrollo, Gabriela Mendoza, quien dijo que lo primordial es llevar adelante el Censo del próximo año, que se llevará a cabo por el Instituto Nacional de Estadística (INE).', 'https://www.opinion.com.bo/articulo/pais/gobierno-aprueba-decreto-anuncia-censo-16-noviembre-2022/20210721113834828116.html', 13, 3, 39, 1),
(181, 1627179697, 1626912000, 'Arias pide a la población quedarse en el municipio de La Paz para no afectar el Censo', 'El alcalde de La Paz Ivan Arias pidió este jueves a la población alteña quedarse en el lugar de residencia y no cambiar de municipio como también no viajar a otras comunidades esto con el fin de no afectar al Censo de Población y Vivienda, que se previsto el 16 de noviembre de 2022, por otro lado también pidió que se reflexione sobre donde reciben servicios de salud, transporte y educación. ', 'https://www.opinion.com.bo/articulo/pais/arias-pide-poblacion-quedarse-municipio-paz-afectar-censo/20210722210139828300.html', 13, 3, 39, 1),
(182, 1627180052, 1626912000, 'BM asegura financiamiento para la realización del Censo de Población y Vivienda 2022', 'La ministra de Planificación del Desarrollo,Gabriela Mendoza, Informó este viernes que el Banco Mundial (BM) colaborará con el financiamiento para la ejecución del Censo de Población y Vivienda, en ello aclaró la autoridad que el gobierno nacional asumirá la totalidad del costo de la realización del Censo de Población y Vivienda, en los nueve departamentos. ', 'https://www.opinion.com.bo/articulo/pais/bm-asegura-financiamiento-realizacion-censo-poblacion-vivienda-2022/20210722121439828268.html', 13, 3, 39, 1),
(183, 1627182160, 1626998400, 'Justicia admite amparo contra vocales del TED sobre elecciones en Comteco', '						La citación a los vocales del TED fue emitida por la presidenta de la Sala Constitucional Cuarta del Tribunal Departamental de Justicia de La Paz, Carmina Vera, en el marco de las elecciones de renovación de consejeros en el Comite de Administracion y Vigilancia en La Cooperativa de Telecomunicaciones Cochabamba, Comteco R.L. Los vocales del Tribunal Electoral Departamental (TED),  Humberto Valenzuela, Tito Rodríguez, Sixto Fuentes y Ruth Montejo, son los que la justicia admite tienen amparo. \r\n					', 'https://www.opinion.com.bo/articulo/cochabamba/justicia-admite-amparo-vocales-ted-elecciones-comteco/20210723130501828389.html', 13, 1, 39, 1),
(184, 1627182712, 1626998400, 'Alcaldía anuncia seguimiento a 300 procesos penales pendientes, uno contra Edwin Castellanos', 'En la gestión actual municipal de Cochabamba, al mando del alcalde Manfred Reyes Villa, se confirmó que se hace seguimiento a 300 procesos penales que las anteriores autoridades habían dejado pendientes uno de ellos es en contra del exalcalde Edwin Castellanos, en ese sentido el secretario de Asuntos Jurídicos de la Alcaldía de Cochabamba, Orlando Vargas, explicó en Buena Noche de Opinión que hay una retardación de justicia en la mayoría de los casos. ', 'https://www.opinion.com.bo/articulo/cochabamba/alcaldia-anuncia-seguimiento-300-procesos-penales-pendientes-edwin-castellanos/20210723213714828432.htm', 13, 2, 39, 1),
(185, 1627207578, 1627084800, 'Organizaciones del MAS apuntan a dos ministros de Arce', 'Los campesinos observan la gestiones de los ministros de Justicia y de Gobierno, además del accionar del fiscal general.', 'https://eldeber.com.bo/pais/organizaciones-del-mas-apuntan-a-dos-ministros-de-arce_240462?utm_medium=Social&utm_source=Facebook#Echobox=1627182877', 17, 2, 16, 1),
(186, 1627207826, 1627084800, 'Exasesor de Murillo es enviado a San Pedro por tráfico de certificados en la Policía', 'El juzgado Primero Cautelar de la zona Sur de la ciudad de La Paz, dictó seis meses de cárcel para Ciro Ortega Sequeiros, exasesor de Arturo Murillo que está involucrado en el caso de la venta de certificados a oficiales de alto rango de la Policía.    Uso indebido de influencias e incumplimiento de deberes.', 'https://eldeber.com.bo/pais/exasesor-de-murillo-es-enviado-a-san-pedro-por-trafico-de-certificados-en-la-policia_240452?utm_term=Autofeed&utm_medium=S', 17, 2, 16, 1),
(187, 1627312379, 1626912000, 'difusión de las reformas democráticas', 'campaña de difusión para garantizar el el ejercicio de los derechos políticos, en una campaña para hacer conocer las 3 formas democráticas, como democracia comunitaria, democracia directa y participativa, democracia representativa basado en la igual, responsabilidad y respeto.', 'https://www.facebook.com/UNITELPANDO11/videos/241644807792319', 29, 1, 55, 1),
(188, 1627312623, 1626912000, 'Registro de Personas para recibir ayuda técnica ', 'llamado a todo el departamento para inscripción en el CODEPEDIS, para que sean beneficiados con silla de ruedas muletas y otros asi poder saber cuanto es la comunidad de personas con discapacidad y asi poder gestionar otros recursos con las instituciones que competen.', 'https://www.facebook.com/UNITELPANDO11/videos/241644807792319', 29, 3, 55, 1),
(189, 1627336821, 1613865600, 'Comunidad Ciudadana presenta proyecto de Ley de Acceso a la Información Pública', 'La Alianza Comunidad Ciudadana (CC) presentó este martes, un proyecto de Ley de Acceso a la Información Pública, el cual plantea entre sus principios la obligatoriedad para funcionarios, la gratuidad en la entrega, la accesibilidad, la efectividad y la representatividad para los medios de comunicación.					', 'https://lapatria.bo/2021/02/23/comunidad-ciudadana-presenta-proyecto-de-ley-de-acceso-a-la-informacion-publica/', 24, 2, 51, 1),
(190, 1627336866, 1626998400, 'Comunidad ciudadana presenta proyecto de ley para restringir el interinato de autoridades', 'Propuesta de ley al órgano ejecutivo de parte del partido político Cc propone un proyecto de ley para restringir el interinato de 90 dias como es el caso de la defensora del pueblo Nadia Cruz		', '', 39, 2, 30, 1),
(191, 1627337602, 1627257600, 'El censo se realizará el año 2022', 'El presidente Luis Arce emitió un decreto supremo para determinar la realización del censo ', '', 35, 3, 51, 1),
(192, 1627337718, 1627257600, 'El censo se realizará el año 2022', 'El presidente Luis Arce presentó el cronograma para el censo mediante el decreto supremo ', '', 39, 3, 30, 0),
(193, 1627337728, 1627257600, 'Presidente actualiza la fecha del censo', 'Hoy en día en presidente afirmó la nueva fecha del censo', '', 15, 3, 23, 1),
(194, 1627337764, 1627257600, 'El censo se realizara el año 2022', 'El presidente anuncia el censo para el año 2022', '', 39, 3, 17, 0),
(195, 1627338444, 1626998400, ' poiet b aóej b we40tu9 b ', '						asdv badfg sg					', '', 38, 1, 51, 1),
(196, 1627348993, 1627257600, 'El  diputado del MAS habla sobre las movilizaciones que se tomaran el 6 de agosto', 'El  diputado Hector Arce del movimiento al socialismo señala y advierte a plataformas, grupos y a la resistencia juvenil cochala que las condiciones no son las mismas y que lo piensen muy bien antes querer repetir las mismas situaciones del año 2019, y que el Gobernador de Santa Cruz Fernanado Camacho y el ex cívico Marco Pumari deben ir a declarar sobre los hechos del año 2019. ', '', 35, 2, 18, 1),
(197, 1627349108, 1627257600, 'Remiten a la cárcel al militar Franz Vargas por el caso Huayllani ', 'Por el caso Sacaba el Coronel Franz Vargas Comandante dek grupo especial Gama-2 que operó en los conflictos del 2019 fue enviado a la cárcel de san pedro de sacaba con detención preventiva de 3 meses, se convirtió en el primer militar detenido preventivamente por el casio Sacaba. ', '', 35, 2, 18, 1),
(198, 1627349255, 1627257600, 'Padres de Familia reclaman por el desayuno escolar y ponen en apuros al Alcalde de Warnes. ', 'Los padres de la región de warmes exigen que se cancele el desayuno escolar, los padres anuncian que se pretendería destinar una parte del presupuesto al área de salud. El Alcalde Carlos Montaño desmintió esta posibilidad y aseguró que garantizara la entrega del desayuno escolar.', '', 35, 2, 18, 1),
(199, 1627349752, 1627257600, 'El Tribunal Constitucional remitio informe complementario sobre sucesión constitucional del 2019', 'El tribunal Constitucional Plurinacional remitió hace dias documentación al respecto para que sea analizada la situación del supuesto “Golpe de Estado” así lo informó el Presidente del Tribunal Constitucional Paul Franc Zamra la documentación de este informe complementario costa de fotocopias legalizadas de las declaraciones que realizaron algunos magistrados en el período de octubre y noviembre del año 2019. ', '', 35, 1, 18, 1),
(200, 1627349786, 1627257600, 'Arce advierte «ataques de la derecha» relacionados a la escasez de segundas dosis.', 'El presidente Luis Arce advirtió “ataques de la derecha” relacionados a la escasez de segundas dosis de la vacuna rusa Sputnik-V. Según el mandatario, del total de dosis anticovid existentes en territorio nacional, un 25% son del fármaco desarrollado por Gamaleya, mientras que el 75% restante son de otros proveedores. Por lo tanto reveló que la derecha no tiene más argumentos ya que en su gobierno todo ha estado marchando bien tanto en la economía, salud y educación.', 'https://www.paginasiete.bo/sociedad/2021/7/26/arce-advierte-ataques-de-la-derecha-relacionados-la-escasez-de-segundas-dosis-302123.html?__twitter_impr', 14, 2, 34, 1),
(201, 1627350692, 1627257600, 'Mando de Kaliman fue leal a Evo y rechazó estar en la gestión de Añez', 'El abogado Omar Durán dijo que la gestión de Kaliman “es un mando leal a Evo Morales al 99,9%”, porque si no hubieran sido tan leales, no hubieran permitido una reelección en  vulneración a la Constitución Política del Estado y hubiesen salido de inmediato a ayudar a la Policía, en noviembre de 2019, para frenar hechos de violencia por grupos afines al exmandatario.   La propia Jeanine Añez en su declaración ante la Fiscalía el 11 de noviembre de 2019,  antes de asumir la Presidencia y de la reunión con el Alto Mando saliente, reveló que fue tratada mal por   Kaliman, cuando le pidió que ayude a la Policía porque estaba siendo rebasada. “Cuando usted sea presidenta va a poder darme órdenes”, le dijo Kaliman, según la declaración.', 'https://www.paginasiete.bo/seguridad/2021/7/26/mando-de-kaliman-fue-leal-evo-rechazo-estar-en-gestion-de-anez-302068.html?__twitter_impression=true', 14, 2, 34, 1),
(202, 1627350714, 1627257600, 'Tensión entre Oruro y Potosí por instalación de domos', 'La cumbre que realizó el alcalde López de Potosí llamo a instar a la soberanía del Salar para los Potosinos mientras el gobernador de Oruro suspende el lanzamiento del albergue turístico para evitar roses.', '', 39, 2, 30, 1),
(203, 1627350868, 1626998400, 'Jubileo: Censo de 2022 permitirá al país saber “dónde y cómo estamos”', 'La fundación JUBILEO afirma que el Censo programado para el 16 de noviembre del 2022 será crucial, ya que así podremos ver en donde y como estamos en nuestro país, sobre todo por la pandemia que atravesamos. Como siempre hay opiniones contrarias y una de estas es de Pablo Arizaga, diputado de CC, quien afirma que no estamos en condiciones para realizar el Censo. ', 'https://correodelsur.com/politica/20210723_jubileo-censo-de-2022-permitira-al-pais-saber-donde-y-como-estamos.html', 11, 3, 47, 1),
(204, 1627351509, 1627257600, 'Senkata: envían a la cárcel a exjefe del Estado Mayor.', 'Pablo Arturo Guerra Camacho, exjefe de Estado Mayor de las Fuerzas Armadas,  posesionado en el gobierno de transición de Jeanine Añez, fue enviado ayer a la cárcel San Pedro con detención preventiva por seis meses  por el caso Senkata.  En el proceso se investiga la muerte de 11 personas durante la intervención militar y policial al intento de toma de la planta de GLP  por parte de partidarios de Evo Morales que rechazaban su renuncia, en noviembre de 2019.', 'https://www.paginasiete.bo/nacional/2021/7/26/senkata-envian-la-carcel-exjefe-del-estado-mayor-302092.html?__twitter_impression=true', 14, 2, 34, 1),
(205, 1627351774, 1627257600, 'CC indica que interinatos inciden en desinstitucionalización estatal.', ' Comunidad Ciudadana (CC), la primera fuerza de oposición en la Asamblea Legislativa Plurinacional (ALP),  considera que la desinstitucionalización del Estado es una constante en Bolivia debido al nombramiento de autoridades interinas.   “La desinstitucionalización del Estado se ha convertido en una constante en el país,  por el nombramiento de autoridades interinas en instituciones transcendentales”, se lee en los Antecedentes y Justificación del proyecto de ley que la alianza naranja  presentó a la ALP.', 'https://www.paginasiete.bo/nacional/2021/7/26/cc-indica-que-interinatos-inciden-en-desinstitucionalizacion-estatal-302075.html?__twi', 14, 2, 34, 1),
(206, 1627351823, 1627257600, 'El comité cívico de Oruro divide criterios de la ALDO', 'Los asambleístas oficiales califican de prematura la decisión del comité cívico departamental de Oruro y piden convocar a un cabildo con las provincias y no apresurarse para las demandas regionales y provinciales, ya que el gobierno no contesta las demás regionales.					', '', 39, 2, 30, 1),
(207, 1627352202, 1627257600, 'Colectivos y plataformas se reactivan y exigen la liberación de presos políticos', 'Colectivos ciudadanos y plataformas de defensa de la democracia en la ciudad de La Paz exigieron al Gobierno que frene la persecución política, rechazaron la injerencia gubernamental en el Órgano Electoral y convocaron a los sectores democráticos a la unidad frente al autoritarismo del MAS', 'https://www.lostiempos.com/actualidad/pais/20210726/colectivos-plataformas-se-reactivan-exigen-liberacion-presos-politicos', 12, 2, 44, 1);
INSERT INTO `noticia` (`idnoticia`, `fecha_registro`, `fecha_noticia`, `titular`, `resumen`, `url_noticia`, `rel_idmedio`, `rel_idcuestionario`, `rel_idusuario`, `esta_activa`) VALUES
(208, 1627352376, 1627257600, 'Vargas: El TSE es el competente para destituir vocales, no Arce.', 'Nataly Vargas, expresidenta del Tribunal Electoral Departamental (TED) de Tarija, dice que el Tribunal Supremo Electoral (TSE) es la única autoridad competente para destituir vocales, y no así el Presidente, que, si bien -sostiene- tiene la atribución para designar vocales, no tiene la competencia para destituirlos.   Vargas fue una de las vocales que fue destituida el 29 de junio, cuando el presidente Luis Arce emitió un paquete de decretos para reemplazar a los vocales de designación presidencial de seis departamentos, que fueron nombrados durante el gobierno de Jeanine Añez.  ', 'https://www.paginasiete.bo/nacional/2021/7/26/vargas-el-tse-es-el-competente-para-destituir-vocales-no-arce-302088.html?__twitter_impression=true', 14, 1, 34, 1),
(209, 1627352426, 1627084800, '¿Qué documentos remitió el TCP a la Fiscalía sobre la asunción de Áñez?', 'El presidente de la TCP Paul Franco  señaló que ya mandó todos los requerimientos para poder seguir con el caso \"golpe\", esperando que todo ya se encuentre en la carpeta. entre los documentos mandados están: \"“fotocopias legalizadas, el comunicado, certificaciones respecto a la existencia de procesos en los cuales se hubiera declarado constitucionalidad o inconstitucionalidad con relación a la asunción producida en aquel entonces”. Además también se menciona que el Comunicado que avalaría la asunción de Añez al poder en realidad solamente es un simple comunicado y que en realidad no pudiese avalar tan situación. ', 'https://correodelsur.com/seguridad/20210726_que-documentos-remitio-el-tcp-a-la-fiscalia-sobre-la-asuncion-de-anez.html ', 11, 2, 47, 1),
(210, 1627352511, 1627257600, 'Diputados de Creemos denuncian a ministro Del Castillo por tortura y tratos crueles', 'Los diputados de Creemos denunciaron al ministro de Gobierno, Eduardo del Castillo, por los presuntos delitos de actos de tortura, tratos crueles, inhumanos y vejaciones contra Mario Bascopé, miembro de la Resistencia Juvenil Cochala', 'https://www.lostiempos.com/actualidad/pais/20210726/diputados-creemos-denuncian-ministro-del-castillo-tortura-tratos-crueles', 12, 2, 44, 1),
(211, 1627352664, 1627257600, 'Pese a 12 denuncias contra Evo, no fue citado ni como testigo.', 'El abogado Omar Durán, el exdiputado Rafael Quispe y el  gobierno  de Jeanine Añez interpusieron al menos cuatro denuncias por separado en contra de Morales por delitos de terrorismo, sedición, alzamiento armado e instigación a delinquir, entre otros, a raíz de los hechos de violencia atribuidos a seguidores del exmandatario en  2019. Algunas fueron acumuladas en una sola investigación, entre ellos algunos denunciantes de al menos 12 procesos contra el expresidente Evo Morales lamentaron que el Ministerio Público no haya recabado siquiera la declaración informativa del exmandatario en ninguno de los casos  ni como testigo. Un exministro y abogado considera que no se llama a declarar a todos por igual y  el principio de la presunción de inocencia se aplica sólo para  algunos.', 'https://www.paginasiete.bo/seguridad/2021/7/26/pese-12-denuncias-contra-evo-no-fue-citado-ni-como-testigo-302067.html?__twitter_impression=true', 14, 2, 34, 1),
(212, 1627352749, 1627257600, 'TED finaliza cómputo y da a conocer los resultados de las elecciones de Comteco', 'El Tribunal Departamental Electoral (TED) de Cochabamba finalizó el cómputo de votos, la madrugada de este lunes, y dio a conocer los resultados de las elecciones para el Consejo de Administración y el de Vigilancia de la Cooperativa de Telecomunicaciones de Cochabamba (Comteco), el primer lugar lo logró Edwin Jiménez Arandia.', 'https://www.lostiempos.com/actualidad/economia/20210726/ted-finaliza-computo-da-conocer-resultados-elecciones-comteco', 12, 2, 44, 1),
(213, 1627352816, 1627257600, 'La COD expresa la preocupación ante la no realización de actos protocolares en Sucre', ' Williams Vargas, ejecutivo de la COD, manifiesta la preocupación frente a la evasión de los actos protocolares en la ciudad de Sucre por parte del Gobierno Central ', 'https://www.facebook.com/watch/live/?v=1438055866580689&ref=watch_permalink', 20, 2, 54, 1),
(214, 1627352882, 1627257600, 'Asamblea Legislativa Departamental de Chuquisaca, aguarda la presentación del estado económico de la gobernación', 'La asamblea espera la presentación del estado económico de la gobernación para hacer un análisis de la situación, no descarta realizar austeridad y hacer ajustes en las diferentes secretarias, según informa Ricardo Zárate, presidente de la ALDCH', 'https://www.facebook.com/watch/live/?v=1438055866580689&ref=watch_permalink', 20, 2, 54, 1),
(215, 1627352986, 1627257600, 'Khachi Lodge denuncia que 8 domos fueron dañados y que la Policía no les dio protección', 'Khachi Lodge, emprendimiento operado por la sociedad de responsabilidad limitada Amazing Escape Bolivia,  denunció que la Policía no acudió a resguardar sus instalaciones el viernes pasado, cuando comenzaron los destrozos a ocho de sus domos situados a cinco kilómetros de la comunidad Jirira, Oruro, pese a que días antes del ataque, la compañía pidió protección a la institución.  “A pesar de nuestros pedidos de protección a las autoridades el día anterior (a la jornada de los actos violentos), prácticamente la Policía no se hizo presente”, detalla parte del comunicado emitido esta jornada.', 'https://www.paginasiete.bo/seguridad/2021/7/26/khachi-lodge-denuncia-que-domos-fueron-danados-que-la-policia-no-les-dio-proteccion-302144.html', 14, 2, 34, 1),
(216, 1627352989, 1627344000, 'Fallo del Tribunal Departamental de Justicia sale a favor de más de 70 trabajadores municipales', 'La asamblea espera la presentación del estado económico de la gobernación para hacer un análisis de la situación, no descarta realizar austeridad y hacer ajustes en las diferentes secretarias, según informa Ricardo Zárate, presidente de la ALDCH', 'https://www.facebook.com/watch/live/?v=1438055866580689&ref=watch_permalink', 20, 2, 54, 1),
(217, 1627353084, 1626825600, 'Consejeros de la magistratura podrían ser cesados de sus funciones a través de un fallo constitucional.', 'Consejeros de la magistratura podrían ser cesados de sus funciones a través de un fallo constitucional que observa la inconstitucionalidad de sus funciones, el Dr. Franz Reyes abogado patrocinante indica que esta acción es una artimaña que va contra la democracia ', 'https://www.facebook.com/watch/live/?v=1438055866580689&ref=watch_permalink', 20, 2, 54, 1),
(218, 1627353197, 1627257600, 'Un aprehendido y dos militares con detención preventiva por hechos de 2019.', 'Esta jornada se confirmó la detención preventiva del excomandante de la Décima División del Ejército con asiento en Tupiza,  Potosí, coronel Luis Pacheco, y del militar Franz Vargas, además, de la aprehensión del excomandante general de la Armada, almirante Orlando Mejía.  Los militares son procesados por los casos Senkata (El Alto), Betanzos (Potosí) y Sacaba (Cochabamba), respectivamente. Los mismos esperan que la justicia pueda actuar sin dar beneficio a ningún partido y que la misma sea parcial.', 'https://www.paginasiete.bo/seguridad/2021/7/26/tres-militares-fueron-aprehendidos-esta-jornada-por-los-hechos-de-2019-302140.html?__twitter_im', 14, 2, 34, 1),
(219, 1627353792, 1627257600, 'Comisión pide abrir dialogo entre Potosí y Oruro', 'Marcelo Pedrazas diputado de CC dio a conocer que se esta creando una comisión para el dialogo entre ambos departamentos ya que hay una ley específica de la conformación de límites y con todo eso dar una solución efectiva dando mejores condiciones.', '', 23, 2, 34, 1),
(220, 1627354127, 1627257600, 'Viceministra presentó demanda por tráfico de exámenes.', 'Aurea Balderrama viceministra de educación superior presento una demanda por irregularidades en los exámenes de cargo de directores, por estar involucrados en caso de corrupción específicamente tomando como actor demandante Agustin Tarifa.  ', '', 23, 2, 34, 1),
(221, 1627354265, 1627257600, 'Sistema de justicia se prepara para un cambio nacional', 'Marco Jaime Molina Magistrado del Tribunal supremo de justicia anuncia que en en coordinación con el Ministro de Justicia Ivan Lima se avanzara en una reforma de justicia integral', 'https://www.youtube.com/watch?v=glNCmXQs6uw', 32, 2, 43, 1),
(222, 1627354622, 1627257600, 'Unidad de Transparencia del Ministerio de Educación realizo auditorias.', 'Adrian Quelca - Ministro de Educación dio declaraciones acerca de la demanda contra las irregularidades en los exámenes de competencia indicando que ya se realizo una auditoria en el mismo no se presencia actos de corrupción y que la misma auditoria revelo solo sugerencias finalizó considerando que solo es una estrategia para dañar la institucionalidad de la educación que tanto costo recuperar. ', '', 23, 2, 34, 1),
(223, 1627354884, 1627257600, 'Bancada CC Deslegitimiza informes de masacres ', 'La bancada el Movimiento al Socialismo denuncia a CC, por deslegitimar l informe de la CIDH referente a la violación de Derechos Humanos, durante el gobierno de la presidente transitoria Jenine Añez', 'https://www.youtube.com/watch?v=glNCmXQs6uw', 32, 2, 43, 1),
(224, 1627355659, 1627257600, 'Alcalde de Uyuni sobre la quema de los domos: La molestia es que construyan sin permiso.', 'El alcalde del municipio de Uyuni, Eusebio López, cuestionó este lunes que la construcción de los domos en un sector del Salar de Uyuni no haya contado con los permisos y que tampoco hubo coordinación con las autoridades del departamento de Potosí.  “Nosotros podemos hacer actividades, el hermano departamento (de Oruro) también puede hacer actividades aquí en Potosí, pero tiene que ser pues con un permiso, con una coordinación, con una autorización, eso es lo único que pedimos. O sea, cualquier departamento eso va a pedir, a ver que yo vaya a La Paz como municipio de Uyuni a hacer una actividad, hay autoridades que merecen respeto, se puede hacer no es que no, ese simplemente es la molestia”, declaro López a la ANF.', 'https://www.noticiasfides.com/nacional/seguridad/alcalde-de-uyuni-sobre-la-quema-de-los-domos-la-molestia-es-que-construyan-sin-permiso-410856', 35, 2, 34, 1),
(225, 1627355759, 1627257600, 'Plataforma UNO acusa al Gobierno de poner en riesgo la existencia misma de la democracia.', 'La plataforma ciudadana UNO conformada por más de 30 profesionales advirtió que el gobierno de Luis Arce continúa con acciones ilegales e inconstitucionales que acentúan el riesgo de desaparición del estado constitucional de derecho y la existencia misma de la democracia en Bolivia.  Que en esa línea se encuentran, por ejemplo, la detención ilegal y arbitraria de la ex presidenta constitucional interina, Jeanine Añez; de dos de sus exministros, de varios exmiembros del Alto Mando de las Fuerzas Armadas y de otros exfuncionarios del gobierno de transición, sin respetar el ordenamiento jurídico, desdoblando ilegalmente los actos y privándoles de su derecho a la defensa, al debido proceso y la presunción de inocencia.', '', 35, 2, 34, 1),
(226, 1627355856, 1627257600, 'Indígenas piden garantizar el traslado y acceso a las vacunas, en especial para los adultos mayores.', 'Uno de los sectores aún golpeados por la pandemia son los pueblos indígenas, que desde que el Covid-19 comenzó a expandirse en las diferentes regiones carecieron de información sobre el virus, las vacunas y su efectividad. Frente a esto, representantes indígenas de Bolivia piden a las autoridades garantizar el transporte y acceso a las vacunas hasta las zonas donde habitan, particularmente los ancianos.  “La realidad de nuestras comunidades es que hay gente no tiene ni un peso para comprar alimentos, así que mucho menos va a tener para gastar en transporte hasta los centros de vacunación, detalló Roni Ribera, cacique chiquitano y miembro de la Confederación de Pueblos Indígenas del Oriente Boliviano, CIDOB - orgánica.', '', 35, 2, 34, 1),
(227, 1627358900, 1627257600, 'Dictan detención domiciliaria para el exviceministro Carlos Schlink, acusado por caso FMI', 'El 30 de junio la Justicia envió a la cárcel al exviceministro acusado por los delitos de resoluciones contrarias a la Constitución y las leyes, conducta antieconómica, contratos lesivos al Estado e incumplimiento de deberes por el crédito del FMI.', 'https://www.la-razon.com/nacional/2021/07/26/dictan-detencion-domiciliaria-para-el-exviceministro-carlos-schlink-acusado-por-caso-fmi/', 53, 2, 29, 1),
(228, 1627360176, 1627257600, 'Aprehenden a excomandante de la Armada por caso Senkata', 'El excomandante general de la Armada Boliviana almirante Moisés Orlando Mejía fue aprehendido este lunes por el caso Senkata de noviembre de 2019, por la intervención militar a un bloqueo cerca de la planta de Senkata, dejando al menos 10 muertos y decenas de heridos.', 'https://www.la-razon.com/nacional/2021/07/26/aprehenden-a-un-excomandante-de-la-armada-por-el-caso-senkata/', 53, 2, 29, 1),
(229, 1627360291, 1627257600, 'Los casos Golpe de Estado y de las ‘masacres’ de Sacaba y Senkata tienen 13 detenidos', 'Con el encarcelamiento de Pablo Guerra, ex jefe del Estado mayor de las FFAA, suman 13 los detenidos por las investigacionesdel Golpe de Estado y por las masacres de Sacaba y Senkata.', 'https://www.la-razon.com/nacional/2021/07/26/los-casos-golpe-de-estado-y-masacres-tienen-13-detenidos/', 53, 2, 29, 1),
(230, 1627363686, 1627257600, 'Ciudadano hizo disparos de arma de fuego ', 'Un recluso que guerdaba retención Domiciliaria realizo disparos con arma de fuego y hoy fueron detenidos y trasladados al penal de villa bush', 'https://www.facebook.com/spccanal15/videos/211832707513987/', 27, 2, 20, 1),
(231, 1627363943, 1627257600, 'Plataformas del 21F se rearticulan', 'Las plataformas del 21F anuncian nuevas movilizaciones y medidas de presión, rechazan las detenciones de ex jefes militares y activistas, consideran que el gobierno y la justicia efectúan persecución política. El MAS indica que se trata de un acto de desesperación ', '', 24, 2, 29, 1),
(232, 1627364178, 1627257600, 'Detienen a otro ex jefe militar', 'Investigan al ex jefe militar de la armada boliviana, el almirante Moisés Orlando Mejía fue vinculado al supuesto golpe del 2019 y los hechos en Senkata', '', 24, 2, 29, 1),
(233, 1627364273, 1627257600, 'Melgar Instaló huelga de hambre', 'Gonzalo Melgar caminó desde Santa Cruz hasta la ciudad de La Paz y se instaló cerca de la plaza Murillo, declarándose en huelga de hambre, su intención era conseguir una entrevista con el presidente Luís Arce pero no lo consiguió, demanda que el proyecto de ley \"devolución de los aportes a las AFP\'s\" sea tratado en la cámara de diputados', '', 24, 2, 29, 1),
(234, 1627364414, 1627257600, 'Trasladan al penal d San Pedro al ex jefe del Estado Mayor, general  Guerra ', 'El exjefe del Estado Mayor fue trasladado al penal de San Pedro, la familia y la defensa cree que hay persecución política, ', '', 24, 2, 29, 1),
(235, 1627364598, 1627257600, 'Piden Libertad de ex Presidente Áñez', 'La defensa presentará 900 documentos que demostrarían la inocencia de la defendida, según el abogado entre los documentos se encuentran informes de la misma asamblea y otros que desvirtuarían el delito de terrorismo.', '', 24, 2, 29, 1),
(236, 1627403277, 1627344000, 'Paro de los maestro urbano en 24 hora', 'Paro de los maestro urbano en oruro en 24 hora', 'Radio fides', 41, 2, 35, 1),
(237, 1627409833, 1627344000, 'Vocal acusado en el caso Montenegro encabeza pedido de restitución a sus funciones', 'Darwin Vargas, acusado en el juicio oral del caso Pedro Montenegro y otros cuatro vocales cesados en sus funciones piden volver y atender causas. Aún no hay respuesta a su solicitud', 'https://eldeber.com.bo/edicion-impresa/vocal-acusado-en-el-caso-montenegro-encabeza-pedido-de-restitucion-a-sus-funciones_240692', 17, 2, 16, 1),
(241, 1627410207, 1627344000, 'El ministro de Salud descarta combinar vacunas ante el retraso de segundas dosis de Sputnik V', 'Auza aseguró que el fondo ruso se comprometió a que el país será prioridad para la llegada de las dosis para completar el esquema anticovid. Aunque reconoció que aún no hay fecha para el arribo', 'https://eldeber.com.bo/santa-cruz/el-ministro-de-salud-descarta-combinar-vacunas-ante-el-retraso-de-segundas-dosis-de-sputnik-v_240665', 17, 2, 16, 1),
(242, 1627417654, 1626998400, 'Firma de convenio en el marco de la coordinación Interinstitucional', 'se pretende mejorar el servicio a personas vulnerables, con la finalidad de prevenir la violencia, trata y trafico de personas, además que fortalecerá las capacidades técnicas con capacitación a funcionarios públicos. ', 'https://www.facebook.com/watch/live/?v=323307546155953&ref=watch_permalink', 29, 2, 55, 1),
(243, 1627418601, 1627171200, 'Elecciones de la junta vecinal del barrio Álvaro García Linera', 'se llevaron acabo las elecciones de barrio Álvaro García Linera con masiva presencia de vecinos, presentándose dos planchas, ganando así un frente, nueva mesa directiva, para la gestión de beneficio para el barrio, por otro lado el agradecimiento por parte del comité electoral.', 'https://youtu.be/3pgKxy7PBRs', 29, 2, 55, 1),
(244, 1627419500, 1627257600, 'Seis nuevos socios ingresan a los comités de Vigilancia y Administración en Comteco', 'Tras las justas elecciones en la empresa telefónica Comteco dio a conocer, los resultados del conteo de votos a su 100% de los resultados, así para la renovación parcial del Comité de Vigilancia y Administración. En ese sentido los nuevos integrantes en Vigilancia son: Edwin Mallón Ávalos, María Iveth Rojas López y Drianka Ledezma Barrientos, quienes reemplazarán a los salientes Víctor Cáceres, Patty Tito y Franz Christian Knaudt. En el Comité de Administración son: Edwin Jiménez Arandia, César Cabrera Román y José Mauricio Noya Ruiz, quien cubrirán los espacios que dejan César Salinas, Ivonne Gutiérrez Molina y Juan Carlos Peñaloza.', 'https://www.opinion.com.bo/articulo/cochabamba/nuevos-socios-ingresan-comites-vigilancia-administracion-comteco-95-conteo/20210726000822828627.html', 13, 1, 39, 1),
(245, 1627422520, 1627257600, 'Envían a la cárcel a exjefe del Estado Mayor y prevén citar a Camacho por crisis de 2019', 'Las investigaciones siguen en pie, por la crisi del 2019 en ello sigue la suma de 12 exjefes militares con proceso penal los cuales algunos ya ingresaron a prisión, como es el caso del General Pablo Arturo Guerra Camacho, quien es exjefe de Estado Mayor de las Fuerzas Armadas (FFAA), por el momento es enviado a detención preventiva a la cárcel de San Pedro de La Paz por dentro de seis meses, el cual está acusado por las muertes que ocurrieron en Senkata, en noviembre de 2019, la Fiscalía  también prevé que el líder cívico Luis Fernando Camacho Vaca sea citado por el caso de supuesto golpe de estado, quien puso esta denuncia en su contra fue la exdiputada del Movimiento Al Socialismo (MAS), Lidia Patty, quien dijo que es el principal gestor del supuesto golpe de estado contra el gobierno de Morales. ', 'https://www.opinion.com.bo/articulo/pais/envian-carcel-exjefe-estado-mayor-preven-citar-camacho-crisis-2019/20210726013155828631.html', 13, 2, 39, 1),
(246, 1627422675, 1627257600, 'Envían a la cárcel a exjefe del Estado Mayor y prevén citar a Camacho por crisis de 2019', 'Las investigaciones siguen en pie, por la crisis del 2019 en ello sigue la suma de 12 exjefes militares con proceso penal los cuales algunos ya ingresaron a prisión, como es el caso del General Pablo Arturo Guerra Camacho, quien es exjefe de Estado Mayor de las Fuerzas Armadas (FFAA), por el momento es enviado a detención preventiva a la cárcel de San Pedro de La Paz por dentro de seis meses, el cual está acusado por las muertes que ocurrieron en Senkata, en noviembre de 2019, la Fiscalía  también prevé que el líder cívico Luis Fernando Camacho Vaca sea citado por el caso de supuesto golpe de estado, quien puso esta denuncia en su contra fue la exdiputada del Movimiento Al Socialismo (MAS), Lidia Patty, quien dijo que es el principal gestor del supuesto golpe de estado contra el gobierno de Morales. ', 'https://www.opinion.com.bo/articulo/pais/envian-carcel-exjefe-estado-mayor-preven-citar-camacho-crisis-2019/20210726013155828631.html', 13, 2, 39, 1),
(247, 1627423162, 1627257600, 'FELCC aprehende en Cochabamba a coronel del Ejército por luctuosos hechos de Betanzos', 'La Fuerza Especial de Lucha Contra el Crimen (FELCC) aprehendió al coronel del ejército, Luis Alberto Pachecho Montaño, el cual se lo acusa por los delitos de homicidio y tentativa de homicidio en el caso Golpe de Estado, para que se presente las declaraciones la detención se realizó en Cochabamba y debe ser trasladado a Potosi por los sucesos registrados en Betanzos, por tanto está en espera su audiencia de medidas cautelares. ', 'https://www.opinion.com.bo/articulo/pais/felcc-aprehende-coronel-ejercito-luctuosos-hechos-betanzos/20210726161305828689.html', 13, 2, 39, 1),
(248, 1627423889, 1627257600, 'Aprehenden a excomandante en el caso Senkata y ya suman cuatro militares procesados', 'El excomandante general de la Armada Boliviana almirante Moises Orlando Mejia fue aprehendido por la Policía por la investigación de los hechos luctuosos de noviembre de 2019 en Senkata, El Alto, con esta detención se suman cuatro los procesados por este caso, en la investigación de Mejia se trata cuando un operativo estuvo combinado de la Policía y de las Fuerzas Armadas donde intervinieron las protestas y bloqueos de sectores sociales en las cercanías a la Planta de Senkata, dejando así un aproximado de 10 muertos y una decena de heridos.  ', 'https://www.opinion.com.bo/articulo/pais/aprehenden-excomandante-caso-senkata-suman-militares-procesados/20210726162227828691.html', 13, 2, 39, 1),
(249, 1627424641, 1627257600, 'Defensa de Añez presenta segunda solicitud de cesación a la detención preventiva', 'El abogado de Añez, Luis Guillen, presentó una solicitud de cesación que antes fue rechazada por el juez del caso denominado Golpe de Estado, Armando Zeballos, en el periodo de inicios de Julio ya rechazo la primera solicitud, ante ello el abogado Guillen dijo que esta reuniendo 921 fojas de documentación para abalar que no hubo terrorismo, sedición y conspiración por parte de la exmandataria. ', 'https://www.opinion.com.bo/articulo/pais/defensa-anez-presenta-segunda-solicitud-cesacion-detencion-preventiva/20210726164310828693.html', 13, 2, 39, 1),
(250, 1627424654, 1627344000, 'Segunda Sesión de Distrito 5 en el tinglado de Abaroa', 'Se prioriza por el Consejo Municipal y Ejecutivo Municipal, la segunda sesión de Distrito ya que es de suma importancia la inversión en carreteras y alumbrado publico al área rural  con el objetivo de fortalecer a través de esto al sector productivo y así la reactivación económica en el Municipio de Cobija, también se señala que se presente realizar puntos turísticos de cobija.', 'https://youtu.be/8YY80mN6HcA', 29, 2, 55, 1),
(251, 1627425226, 1627257600, 'Juez dicta detención domiciliaria para exviceministro Carlos Schlink por crédito del FMI', 'El exviceministro del Tesoro y Crédito Público, Carlos Schlink se vio beneficiado con detención domiciliaria ya que anteriormente el 30 de junio, fue enviado a la cárcel de San Pedro, acusado por los delitos de resoluciones contrarias a la Constitución y las leyes, por una conducta antieconómica, contra lesivos al Estado e incumplimiento de deberes, en ese caso  le impondrán además medidas cautelares como el arraigo, el pago de una fianza de Bs 50.000 y deberá presentarse en el Ministerio Público cada 15 días, no debe acercarse al Banco Central de Bolivia, no consumir bebidas alcohólicas ni sustancias psicotrópicas.', 'https://www.opinion.com.bo/articulo/pais/juez-dicta-detencion-domiciliaria-exviceministro-carlos-schlink-credito-fmi/20210726173828828701.html', 13, 2, 39, 1),
(252, 1627425286, 1627344000, 'No tenemos nada que ocultar', ' El titular de Educación afirmó ayer que no tiene “nada que ocultar” a la población boliviana. La autoridad del Poder Ejecutivo fue denunciada por un supuesto tráfico de influencias.', 'https://impresa.lapatria.bo/noticia/1040666/no-tenemos-nada-que-ocultar#articulo', 15, 2, 23, 1),
(253, 1627425502, 1627257600, 'Ministerio Público aprehende a otro militar en el caso de Huayllani', 'El Ministerio Publico determino asi la aprehension de Franz Linyan Vargas Gonzales, militar que es acusado por el delito de asesinato en los hechos de Sacaba ocurridos el año 2019, tambien se dio a conocerla aprehension del excomandante de la Decima Division del Ejercito, Luis Alberto Pacheco Montaño, que es acusado por el caso de la muerte de un cuidadano en el municipio de Betanzos. ', 'https://www.opinion.com.bo/articulo/pais/ministerio-publico-aprehende-militar-caso-huayllani/20210726174934828704.html', 13, 2, 39, 1),
(254, 1627425755, 1627344000, 'Debaten propuestas para promover la reforma judicial en Bolivia', 'Mediante la formación de cinco mesas de trabajo, ayer se llevó adelante una sesión plenaria de coordinación entre jueces y vocales para socializar y debatir propuestas que promuevan la reforma de la justicia en el país.  Con la participación del Magistrado del Tribunal Supremo de Justicia (TDJO) por Oruro', 'https://impresa.lapatria.bo/noticia/1040665/debaten-propuestas-para-promover-la-reforma-judicial-en-bolivia#articulo', 15, 2, 48, 1),
(255, 1627427730, 1624838400, 'Senadores y diputados inician receso desde hoy', 'Las autoridades deben retornar a sus funciones el 12 de julio. El presidente de la BPO, Elías Choque, informó que el receso parlamentario es a nivel nacional, está contemplado en las normas y reglamentos de la ALP', 'https://impresa.lapatria.bo/noticia/1038817/senadores-y-diputados-inician-receso-desde-hoy#articulo', 15, 2, 48, 1),
(256, 1627430880, 1627257600, 'El ministro de educación, Adrián Quelca, repudió este lunes la declaración de personas malintencionadas que buscan desacreditar el trabajo realizado por esta Cartera de Estado en el proceso educativo ', 'El ministro de educación, Adrián Quelca, repudió este lunes la declaración de personas malintencionadas que buscan desacreditar el trabajo realizado por esta Cartera de Estado en el proceso educativo a nivel nacional.  \"Ante las declaraciones de Aurea Balderrama debemos aclarar a la opinión pública que no tenemos nada que ocultar, nosotros hemos llevado adelante procesos que se han realizado en el marco de la normativa correspondiente\", sostuvo la autoridad.El Ministro expresó su molestia por las denuncias que “intentan desvirtuar el trabajo del Gobierno”, y aseveró que todos los procesos administrativos y de institucionalización se realizan en el marco de la normativa correspondiente. ', ' https://youtu.be/08dO2gLu2kg y https://www.facebook.com/260485443978322/posts/4962048167155336/b', 32, 2, 49, 1),
(257, 1627432294, 1627344000, 'Salar de tunupa', 'Por los hechos vandálicos de comunarios potosinos del supuesto avasallamiento, no contando con la documentación correspondiente que respalde que orureños invadan territorio, el ministerio público debe poner cartas en el asunto limítrofe entre Oruro y Potosi.					', '', 39, 2, 30, 1),
(258, 1627432531, 1627344000, 'Bloqueo de carreteras en Oruro', 'El viceministro del gobierno debe reunirse con el comité cívico de Oruro por la ley de las aduanas para ser revisado y definir en qué beneficia a Oruro', '', 39, 2, 30, 1),
(259, 1627432784, 1627344000, 'Gobernación de Chuquisaca pretende reducir entre 12 a 8 secretarías por el plan de austeridad de la Asamblea Legislativa Departamental', 'Debido a la deudas camufladas de la Gobernación, el gobernador dio instrucción a realizar un programa de ajuste en temas de estructuración, por ende las secretarias serán reducidas a 8 o 9 y 25 cargos jerárquicos que serán fusionados', 'https://www.facebook.com/TvSucreUSFX/videos/912846652778129', 20, 2, 54, 1),
(260, 1627432891, 1627344000, 'M.A.S. Informa sobre la tutela a concejal Oscar Sandy', 'Movimiento al Socialismo da a conocer durante una conferencia de prensa las dimensiones y pasos de la sentencia constitucional que concede la tutela al concejal Oscar Sandy en cuanto a la elección de la directiva del consejo municipal, indicando que se han vulnerado derechos.', 'https://www.facebook.com/TvSucreUSFX/videos/912846652778129', 20, 2, 54, 1),
(261, 1627433021, 1627344000, 'Alcalde confrontado con avance de obras', 'Los trabajadores de avance de obras a la cabeza de Luis Murillo concluye que hace dos meses no hay obras ni proyectos a realizar en la municipalidad que ahora se debería gestionar la implementación y mejoramiento de los centros de salud donde la respuesta del alcalde es que no hay recursos para gestionar dichos proyectos.', '', 39, 2, 30, 1),
(262, 1627433672, 1627344000, 'La fiscalía cierra el caso denominación \"fraude electoral\".', 'Juan Lanchipa fiscal general d Estado dice que se ha probado la inexistencia con una pericia informática internacional que no halló manipulación de datos en la elecciones generales de 2019. ', 'https://youtu.be/lbnw6K3zAtc y https://www.facebook.com/BoliviatvOficial/videos/1173086396523442/', 32, 2, 49, 1),
(263, 1627433727, 1627344000, 'Mesa dice que pericia de la fiscalía es “extemporánea” y ratifica que “hubo fraude”', 'El excandidato presidencial y líder de Comunidad Ciudadana (CC), Carlos Mesa, aseveró este martes que la pericia ordenada por la Fiscalía que determinó que no hubo manipulación ni fraude en ls elecciones de 2019, es “extemporánea” y no reemplaza al informe de la Organización de Estados Americanos (OEA), por lo que ratificó que “hubo fraude”.', 'https://www.lostiempos.com/actualidad/pais/20210727/mesa-dice-que-pericia-fiscalia-es-extemporanea-ratifica-que-hubo-fraude', 12, 2, 44, 1),
(264, 1627433779, 1627344000, 'La fiscalía cierra el caso denominación \"fraude electoral\".', 'Juan Lanchipa fiscal general d Estado dice que se ha probado la inexistencia con una pericia informática internacional que no halló manipulación de datos en la elecciones generales de 2019. ', 'https://youtu.be/lbnw6K3zAtc y https://www.facebook.com/BoliviatvOficial/videos/1173086396523442/', 32, 2, 49, 1),
(265, 1627433946, 1627344000, 'Fiscalía dice que no hubo manipulación de resultados y cierra el caso fraude electoral', 'El fiscal general del Estado, Juan Lanchipa Ponce, informó este martes que los acusados en el caso fraude electoral fueron sobreseídos debido a que las pericias informáticas no encontraron indicios de irregularidades ni manipulación.', 'https://www.lostiempos.com/actualidad/pais/20210727/fiscalia-dice-que-no-hubo-manipulacion-resultados-cierra-caso-fraude', 12, 2, 44, 1),
(266, 1627438574, 1627344000, 'Detención preventiva por 4 meses en el penal de San Roque', 'Se detuvo preventivamente a Mario Antonio Bascope ex líder de la RJC, por los delitos de organización, tenencia y portación ilícita de armas  criminal y deterioro de elementos del Estado.', 'https://www.youtube.com/watch?v=lbnw6K3zAtc', 32, 2, 43, 1),
(267, 1627438654, 1627344000, 'Los cinco puntos del estudio que sirven de base a la Fiscalía para cerrar el caso fraude.', 'Esta mañana la Fiscalía General del Estado anunció el cierre del caso “fraude electoral” con base en un informe sobre la integridad informática de los resultados de las elecciones del 20 de octubre de 2019, realizado por el “Grupo de Investigación Deep Tech Lab de Bibisite de la Fundación General de la Universidad de Salamanca (España).  Entre los puntos se encuentran los siguientes: 1.-  El informe pericial determinó que el Sistema de Cómputo Oficial era independiente del TREP, 2.- Se descubre el uso de dos servidores (B01, B020) no previstos que “no fueron un riesgo” para el cómputo oficial, 3.- Hubo una configuración inadecuada del servicio de base de datos que no fue un riesgo para la integridad de los datos, 4.- Los servidores usados para el TREP tienen una base de datos igual en un 99%, 5.- Existe la inclusión “negligente” de un servidor, pero no fue un intento de manipulación.', 'https://www.paginasiete.bo/nacional/2021/7/27/los-cinco-puntos-del-estudio-que-sirven-de-base-la-fiscalia-para-cerrar-el-caso-fraude-302242.html', 14, 2, 34, 1),
(268, 1627438919, 1627344000, 'Juez dispone su detención preventiva; Bascopé dice que no come hace 7 días.', 'Tonchy” Bascopé, miembro de la Resistencia Juvenil Cochala (RJC), dió su testimonio en el cual indicaba que tenía golpes en la cabeza, hace siete días que no he comido, no he tomado nada de agua, es inhumano lo que está pasando conmigo”. A quien el Hospital Gastroenterológico Boliviano Japonés de Sucre le dio el alta médica y fue trasladado de su cama de hospital a su audiencia cautelar.  El juez cuarto de instrucción en lo penal del Tribunal Departamental de Justicia de Chuquisaca, Lázaro Rocha, ordenó hoy su detención preventiva en la cárcel San Roque de Sucre por cuatro meses.', 'https://www.paginasiete.bo/seguridad/2021/7/27/juez-dispone-su-detencion-preventiva-bascope-dice-que-no-come-hace-dias-302241.html?__twitter_imp', 14, 2, 34, 1),
(269, 1627439345, 1627344000, 'Conflicto con Oruro: Exgobernador potosino apunta a la burocracia del nivel central.', 'Conflicto con Oruro: Exgobernador potosino apunta a la burocracia del nivel central, recalco que se hicieron las denuncias correspondientes sin embargo no se tuvo resultados, pero el mismo es verificable ya que todos los documentos se encuentran archivados.', 'https://www.paginasiete.bo/nacional/2021/7/27/conflicto-con-oruro-exgobernador-potosino-apunta-la-burocracia-del-nivel-central-302240.html?__twitter_i', 14, 2, 34, 1),
(270, 1627439533, 1627344000, 'Fiscalía imputa a excomandante de la Armada Orlando Mejia ', 'La fiscalía imputo al excomandante de las Fuerzas Armadas por los hechos luctuoso.', 'https://www.youtube.com/watch?v=lbnw6K3zAtc', 32, 2, 43, 1),
(271, 1627439629, 1627344000, 'CC y Creemos califican de «no creíble» informe que desestima el fraude electoral.', 'Es una reacción de lo que estableció la fiscalía que fue cerrar el caso \"fraude electoral\", Representantes de Creemos y Comunidad Ciudadana (CC) calificaron de no creíble el informe del Grupo de Investigación Deep Tech Lab de Bisite, de la Fundación General de la Universidad de Salamanca, que desestima el fraude electoral del 2019. Agregan que este documento tiene como fin apoyar la narrativa del supuesto “golpe de Estado”. ', 'https://www.paginasiete.bo/nacional/2021/7/27/cc-creemos-califican-de-no-creible-informe-que-desestima-el-fraude-electoral-302237.html?__twitter_impre', 14, 2, 34, 1),
(272, 1627439765, 1627344000, 'Fiscalía cierra el caso fraude tras recibir informe de la pericia que encargó en España.', 'La Fiscalía General del Estado (FGE) anunció este martes que cerró el caso fraude electoral, luego de recibir informe de la pericia internacional que encargó al Grupo de Investigación Deep Tech Lab de Bisite, de la Fundación General de la Universidad de Salamanca.  \"En estricta observancia e imparcialidad que rigen la función fiscal, emitió el requerimiento conclusivo de sobresimiento al determinar que el hecho investigado no constituye delito, conforme dispone el artículo 323 inciso 3 del Código Penal, determinación que ha sido puesta en conocimiento de la autoridad jurisdiccional hace unos momentos\", declaró en conferencia de prensa el fiscal general del Estado, Juan Lachipa.', 'https://www.paginasiete.bo/nacional/2021/7/27/fiscalia-cierra-el-caso-fraude-tras-recibir-informe-de-la-pericia-que-encargo-en-espana-302230.html?__tw', 14, 2, 34, 1),
(273, 1627439968, 1627344000, 'CC pide la «destitución inmediata» de Quelca por el supuesto tráfico de exámenes.', 'Comunidad Ciudadana (CC) exigió este martes la \"destitución inmediata\" del ministro de Educación, Adrián Quelca, y la “anulación” del proceso de institucionalización por el presunto “tráfico de exámenes\" en el proceso de institucionalización de cargos directivos. La demanda de los legislativos se produce un día después de que la viceministra de Educación Superior, Aurea Balderrama, presentó una denuncia formal contra Quelca. Por lo mismo la diputada Samanta Nogales dijo \"Nosotros exigimos, de manera contundente, que se destituya inmediatamente al ministro Adrián Quelca porque no está cumpliendo con sus funciones y está envuelto en un escándalo terrible de tráfico de exámenes\". ', 'https://www.paginasiete.bo/nacional/2021/7/27/cc-pide-la-destitucion-inmediata-de-quelca-por-el-supuesto-trafico-de-examenes-302225.html?__twitter_imp', 14, 2, 34, 1),
(274, 1627440105, 1626998400, 'El censo nacional se concretará el 16 de noviembre de 2022', '						Ministra de Planificación del Desarrollo confirma la fecha del censo para el 16 de noviembre de 2022, que tendrá un costo de 83,9 millones de bolivianos que serán financiados por medio del Tesoro General de la Nación y el Banco Mundial					', '', 43, 3, 46, 1),
(275, 1627440651, 1627344000, 'Compra de materiales e implementos de seguridad en el área de los bomberos', '												El Lic. Gonzalo Caballero, del Gobierno Autónomo Municipal de  Cobija  de la unidad de Gestión de riesgos; indica que se están realizando todas las medidas posibles para la adquisición de Materiales  e implementos de seguridad personal para cada bombero.  Esto con la finalidad de que ya estamos en etapas de chequeos, paja seca las cuales con susceptibles al fuego.  En tal sentido se esta viendo las medidas de como ayudar el departamento 										', '', 28, 2, 53, 1),
(276, 1627440964, 1627344000, 'MAS aplaude el cierre del caso fraude electoral ', 'Rolando Cuellar diputado del MAS dijo que aplaude el cierre del caso del fraude y que todo fue una mentira de la derecha lo mismo que provoca que en síntesis no hubo fraude y que si hubo golpe de Estado. Y espera que paguen sus delitos los implicados en el golpe de Estado.', '', 23, 2, 34, 1),
(277, 1627441281, 1627344000, 'Oposición dice que el informe no es creíble.', 'Centa Rek - senadora Creemos ve el cierre del caso como una situación triste y nefasta que el Fiscal General Lanchipa que antes confirmo que si jubo fraude ahora sale a revelar lo contrario para obedecer ordenes del MAS y que el mismo esta forzando los hechos para cerrar el caso, lo esta haciendo por encargo e intentando borrar los informes que hay.', '', 23, 2, 34, 1),
(278, 1627441522, 1627344000, 'Piden suspención al ministro de educación de Chuquisaca', 'Maestros de base a la cabeza de Don Efraín Villar Pando piden inmediata suspención del ministro de educación por presuntos actos de corrupción a raíz de los reglamentos en los que se rigen en esta institución ', '', 48, 2, 17, 1),
(279, 1627441579, 1627344000, 'Informe encargado por la Fiscalía confirma que operaron servidores ajenos al TSE en elección de 2019', 'El documento enviado por una unidad de la Universidad de Salamanca evidencia negligencia de la empresa Neotec. La pericia se hizo dos años después de la elección y se basó en una muestra encargada por la Fiscalía', 'https://eldeber.com.bo/pais/informe-encargado-por-la-fiscalia-confirma-que-operaron-servidores-ajenos-al-tse-en-eleccion-de-2019_240817?utm_medium=Soc', 17, 1, 16, 1),
(280, 1627441648, 1627344000, 'Viceministra presenta denuncia contra Ministro de Educación', 'La Viceministra de Educación Superior, Aurea Balderrama, denuncia que el jefe de la Unidad de Transparencia del Ministro de Educación levantó en hombros al Ministro Quelca. En Transparencia se encuentran las denuncias contra la autoridad.', '', 35, 2, 34, 1),
(281, 1627441932, 1627344000, 'Morales anticipó que se conocería otra investigación que mostraría \"que no hubo fraude\"', 'Morales anticipó de una nueva investigación el cual daría otros resultados en base al caso fraude electoral, el domingo lo dijo verbalmente que esta semana o la próxima se conocería una nueva investigación.', '', 35, 2, 34, 1),
(282, 1627442002, 1627344000, 'Comité pro Santa Cruz arremete contra Lanchipa y lamenta que sea \"servil\" al gobierno del MAS', 'Critican que el fiscal general dé más credibilidad a un reporte de la Universidad de Salamanca que no se conoce qué experiencia tenga en tema electorales y que se lo quiera poner por encima de los análisis de la OEA', 'https://eldeber.com.bo/santa-cruz/comite-pro-santa-cruz-arremete-contra-lanchipa-y-lamenta-que-sea-servil-al-gobierno-del-mas_240843?utm_medium=Social', 17, 1, 16, 1),
(283, 1627442141, 1627344000, 'Camacho recuerda a la Fiscalía que hay más de 70 irregularidades que prueban el fraude', 'El gobernador cruceño acudió al informe de la OEA en el que el ente internacional revela que en las fallidas elecciones de 2019 se dieron manipulaciones e irregularidades en el proceso electoral', 'https://eldeber.com.bo/santa-cruz/camacho-recuerda-a-la-fiscalia-que-hay-mas-de-70-irregularidades-que-prueban-el-fraude_240839?utm_medium=Social&utm_', 17, 1, 16, 1),
(284, 1627442157, 1627344000, 'Estudio concluye que no hubo fraude electoral el 2019', 'El estudio de la Universidad de Salamanca determino que no hubo fraude electoral el 2019, existieron negligencias pero no dolo.', 'https://www.youtube.com/watch?v=lbnw6K3zAtc', 32, 2, 43, 1),
(285, 1627442172, 1627344000, 'Más repercusiones por el cierre del caso \"Fraude electoral\"', 'El exdirigente de la COR de El Alto, Roberto de la Cruz asegura que el Ministerio Público no puede cerrar el caso Fraude Electoral sólo al conocer el informe pericial, cuando existe una prueba documental de la OEA \"como elemento probatorio del delito del fraude\"', '', 35, 2, 34, 1),
(286, 1627442189, 1626998400, 'El vicerrector de la UAGRM señala que se produce una millonaria pérdida en recursos para la universidad por la no actualización del censo y ofrece la colaboración de estudiantes y docentes.', 'Son 250 millones de bolivianos, lo que el vicerrector de la UAGRM, destaca como pérdidas por el anquilosamiento del censo; razón por la cual compromete la ayuda en el censo; de estudiantes, docentes y administrativos de la universidad', '', 43, 3, 46, 1),
(287, 1627442279, 1627344000, 'Pronunciamiento ante conflicto limítrofe entre los departamentos de Oruro y Potosí', 'La asamblea legislativa departamental de Oruro pide pacífica convivencia entre los hermanos del departamento de Oruro y Potosí por conflictos territoriales limítrofes debido a la constante incitación de senadores potosinos', '', 48, 2, 17, 1),
(288, 1627442729, 1627344000, 'Caso fraude: opositores no ven creíble el informe de la Fiscalía y lo tildan de \"montaje\" al igual que el supuesto golpe', 'La Fiscalía instruyó el cierre del caso fraude electoral y recibió los calificativos de \"trucho\", \"cuento del tío\" y de \"falsa narrativa\". Un exministro considera que el Gobierno no puede tapar que Evo anuló elección. \"Cabe que la Fiscalía inicie juicio penal a Evo ¿lo hará?\".', 'https://eldeber.com.bo/pais/caso-fraude-opositores-no-ven-creible-el-informe-de-la-fiscalia-y-lo-tildan-de-montaje-al-igual-que-_240792?utm_medium=Soc', 17, 1, 16, 1),
(289, 1627442837, 1627344000, 'El fiscal Lanchipa anuncia el cierre del caso Fraude Electoral al destacar un informe que señala deficiencias en el cómputo que, sin embargo; no alteraron el resultado de la elección.', 'El Fiscal Lanchipa declara el cierre del caso fraude electoral; sustentándose en expertos, avalados por la Universidad de Salamanca, que formularon un informe en el que; si bien se destacan deficiencias en el cómputo, estos expertos advertirían que estas deficiencias no tendrían la relevancia para alterar el resultado electoral.', '', 43, 1, 46, 1),
(290, 1627443314, 1627344000, 'Oposición deslegitimiza informe de Salamanca ', 'El presidente de la cámara de senadores Andrónico Rodrigo se manifestó con respecto al Resultado del informe de la Universidad de Salamanca y dijo que la oposición construyo un discurso en base a mentiras en relacion a los resultados de las elecciones 2019', 'https://www.youtube.com/watch?v=lbnw6K3zAtc', 32, 2, 43, 1),
(291, 1627443402, 1627344000, 'Oposición deslegitimiza informe de Salamanca ', 'El presidente de la cámara de senadores Andrónico Rodrigo se manifestó con respecto al Resultado del informe de la Universidad de Salamanca y dijo que la oposición construyo un discurso en base a mentiras en relacion a los resultados de las elecciones 2019', 'https://www.youtube.com/watch?v=lbnw6K3zAtc', 32, 2, 43, 1),
(292, 1627443545, 1627344000, 'Estudio concluye que no hubo fraude electoral el 2019', 'El estudio de la Universidad de Salamanca determino que no hubo fraude electoral el 2019, existieron negligencias pero no dolo.', 'https://www.youtube.com/watch?v=lbnw6K3zAtc', 32, 2, 43, 1),
(293, 1627444887, 1627344000, 'Maby Pedraza, presidente de la comisión de género generacional de la asamblea departamental de Santa Cruz, propone una normativa para que se actúe inmediatamente ante la desaparición de un menor.', 'Las 24 horas que son actualmente el requisito legal para la concreción de una denuncia ante la desaparición de un menor, es el defecto legal que busca corregir la asambleísta departamental Maby Pedraza, eliminando este requisito e instaurando una acción inmediata. ', '', 43, 2, 46, 1),
(294, 1627445508, 1627344000, 'La Magna Asamblea de la autonomía Guaraní de Charagua Iyambae se declara en emergencia y da un plazo de 5 días para que se reúnan en Charagua autoridades del INRA y ABT', 'Esta determinación es producto de la incomparecencia de las autoridades del INRA y ABT a una reunión programada para este día martes; el objetivo de la reunión es tratar el tema de los avasallamientos y asentamientos ilegales.', '', 43, 2, 46, 1),
(295, 1627445995, 1627344000, 'Mesa califica de extemporáneo y ‘no creíble’ informe que descarta irregularidades en justas 2019', 'El expresidente Carlos Mesa calificó de \"extemporáneo\" y \"no creíble\" el informde técnico del Grupo de Investigación Deep Tech Lab de BISITE, de la Universidad de Salamanca, que no encontró irregularidades en las elecciones anuladas de octubre de 2019. A diferencia de la OEA, el informe presentado por la Fiscalía establece que se detectó \"deficiencias e incidentes que no suponían riesgos para la integridad del proceso electoral, ni para los resultados del cómputo oficial y ni se advierte manipulación de los votos, debido a que el sistema informático cuenta con la consistencia necesario y en ningún momento fue alterado\". Para el ex presidente Mesa, eso no reemplaza la auditoría de la OEA, la Fiscalía solicitó el trabajo pericial y libró de culpa a los exvocales del TSE que fueron procesados por el fraude electoral', 'https://www.la-razon.com/nacional/2021/07/27/mesa-califica-de-extemporaneo-y-no-creible-informe-que-descarta-irregularidades-en-justas-2019/', 53, 2, 29, 1),
(296, 1627446694, 1627344000, 'Mamani: Se refrenda que la elección fue transparente; tomaremos acciones legales contra los denunciantes', 'El exvocal Idelfonso Mamani indica que los exvocales no aceptaron los hechos de los que fueron acusados, para Mamani las acciones del 2019 que fueron denunciados lograron alterar la democracia y se desacreditó al TSE, para él la OEA tomó apreciasiones subjetivas, basándose en supuestos. Indica también que lo que la Universidad de Salamanda indica como negligencia es por parte de la empresa que se encargaba del TREP; debo a esto tomarán las medidas necesarias para que los denunciantes sean sancionados y se buscará justicia.', 'https://www.la-razon.com/nacional/2021/07/27/exvocal-mamani-se-refrenda-que-la-eleccion-fue-transparente-tomaremos-acciones-legales-contra-los-denunci', 53, 2, 29, 1),
(297, 1627471637, 1627344000, 'En Argentina imputan al ‘enlace’ de la Gendarmería que coordinó el envío de pertrechos a Bolivia', 'Adolfo Héctor Caliba, excomandante de la Gendarmería de Argentina, fue imputado este lunes en el proceso por contrabando agravado impulsado por el gobierno de su país. La denuncia incluye también al ex presidente Macri y a ex embajador  en Bolivia Normando Álvarez. Según Página 12, Caliba fue quien presedió el 13 de noviembre de 2019 el desembarco del equipamiento de gendarmería argentina así como tramitó los pertrechos antitumultos para la policía boliviana. ', 'https://www.la-razon.com/nacional/2021/07/26/en-argentina-imputan-al-enlace-de-la-gendarmeria-que-coordino-el-envio-de-pertrechos-a-bolivia/', 53, 2, 29, 1),
(298, 1627471850, 1627344000, 'copa pide a CC y Creemos sumarse al juicio de responsabilidades contra Áñez', 'La alcaldesa de El Alto, Eva Copa, pidió a las agrupaciones políitcas de la oposición CC y Creemos, apoyar el juicio de responsabilidades contra Áñez por las masacres del 2019, indicando que se dio carta blanca para asesinar a \"hermanos y hermanas\" lo que tiene que ser sancionado. Áñez suma 4 proposiciones acusatorias para un posible juicio de responsabilidades; Camacho sostiene que si bien se deben investigar los hechos eso no implica que el MA use la justicia para vengarse, el grupo GIEI entregó su informe al presidente Arce. ', 'https://www.la-razon.com/nacional/2021/07/27/copa-pide-a-cc-y-creemos-sumarse-al-juicio-de-responsabilidades-contra-anez/', 53, 2, 29, 1),
(299, 1627472126, 1627344000, 'Arce dice que la ‘derecha’ se propuso convulsionar el país y pide estar alertas', 'El presidente Luis Arce afirmó que la Derecha se proouso convulsionar al país nuevamente, y ante esto pide estar alertas, indica que el centro minero Huanuni debe estar alerta. Realizó las declaraciones en el acto de la reactivación del ingenio Lucianita, en el municipio de Huanuni, declara también que la derecha está contenida por el pueblo boliviano, recalcando que eligieron democráticamente el 18 de octubre de 2020 al MAS.', 'https://www.la-razon.com/nacional/2021/07/27/arce-dice-que-la-derecha-se-propuso-convulsionar-el-pais-y-pide-estar-alertas/', 53, 2, 29, 1);
INSERT INTO `noticia` (`idnoticia`, `fecha_registro`, `fecha_noticia`, `titular`, `resumen`, `url_noticia`, `rel_idmedio`, `rel_idcuestionario`, `rel_idusuario`, `esta_activa`) VALUES
(300, 1627472283, 1627344000, 'La Fiscalía cierra el caso Fraude con una pericia internacional que no halló manipulación en 2019', 'Con base a la pericia internacional, la Fiscalía General del Estado reafirmó su requerimiento de sobreseimiento, considerando que el 2019 no hubo manipulación de datos. El fiscal general Juan Lamchipa, leyó las conclusiones de Depp Tech Lab e informó que, en base a ese informe se emitió el requerimiento conclusivo de sobreseimiento, pues el hecho investigado no constituye delito. El informe indica el análisis sobre el sistema informativo TREP indicando que si hubo negligencia pero no se demostró la manipulación. ', 'https://www.la-razon.com/nacional/2021/07/27/la-fiscalia-informa-que-una-pericia-internacional-no-hallo-manipulacion-en-comicios-de-2019/', 53, 2, 29, 1),
(301, 1627472399, 1627344000, 'Tras informe pericial, la Fiscalía libera de culpa a los exvocales del TSE por caso fraude electoral', 'Luego del informe pericial la fiscalía liberó de resposabilidad penal a los exvocales del Tribunal Supremo Electoral que fueron denunciados por fraude electoral, en conferencia de prensa el fiscal general Juan Lanchipa leyó las conclusiones del grupo Deep Tech Lab, destacando que se encontraron deficiencias pero que no suponían un riesgo para el proceso electoral.', 'https://www.la-razon.com/nacional/2021/07/27/tras-informe-pericial-la-fiscalia-libera-de-culpa-a-los-exvocales-del-tse-por-caso-fraude-electoral/', 53, 2, 29, 1),
(302, 1627472534, 1627344000, 'Universidad de Salamanca concluye que no hubo manipulación del TREP ni del cómputo electoral en 2019', 'Un estudio de la universidad de Salamanca (España) concluye que en las elecciones de 2019 no hubo manipulación del cómputo, indica que si se encontraron negligencias pero no se demostró la existencia de manipulación.', 'https://www.la-razon.com/nacional/2021/07/27/universidad-de-salamanca-concluye-que-no-hubo-manipulacion-del-trep-que-en-2019-desato-la-crisis/', 53, 2, 29, 1),
(303, 1627472920, 1627344000, 'Juez envía a la cárcel a ‘Tonchi’ Bascopé, líder de la Resistencia Juvenil Cochala', 'Marco Antonio \"Tonchi\" Bascopé, lider de la Resistencia Juvenil Cochala fue enviado al penal de San Roque en la ciudad de Sucre con detención preventiva por 4 meses', 'https://www.la-razon.com/nacional/2021/07/27/juez-envia-a-la-carcel-a-tonchi-bascope-lider-de-la-resistencia-juvenil-cochala/', 53, 2, 29, 1),
(304, 1627473036, 1627344000, 'Camacho dice que ‘no pondrá excusas’ y acudirá si lo citan a declarar por caso ‘golpe de Estado’', 'Camacho asegura que hasta el momento no fue citado para declarar por el caso de golpe de Estado, e indica que asistirá cuando lo citen. Lidia Patty lo acusó como el principal en la denuncia de golpe de estado.', 'https://www.la-razon.com/nacional/2021/07/27/camacho-dice-que-no-pondra-escusas-y-acudira-si-lo-citan-a-declarar-por-caso-golpe-de-estado/', 53, 2, 29, 1),
(305, 1627474261, 1627344000, 'Fiscalía cierra el caso \"Fraude Electoral\"', 'Ante la decisión de cerra el caso de fraude electoral se asumirán los procesos correspondientes y será el ex presidente Carlos Mesa y los legisladores de CC quienes lo hagan, aseveró William Bascopé ue indica que la fiscalía general es operativa al MAS. No se respetaron los alcances de la auditoría de la OEA que fue el mismo Evo Morales y el MAS solicitaron dicha auditoría, además declararon que sería vinculante', '', 38, 2, 29, 1),
(306, 1627474729, 1627430400, 'Hay 12 testigos contra el ministro Quelca, pero el MAS cierra filas y busca la dimisión de la viceministra que denunció tráfico de influencias', 'La viceministra que presentó la demanda contra el ministro de Educación sufre presiones para que se aleje de su cargo.Agustín Tarifa, funcionario del Ministerio de Educación, dejó abierta su cuenta de WhatsApp en una tableta que es de propiedad de la entidad pública. El aparato llegó hasta las manos de la viceministra de Educación Superior.', 'https://eldeber.com.bo/pais/hay-12-testigos-contra-el-ministro-quelca-pero-el-mas-cierra-filas-y-busca-la-dimision-de-la-vicemin_240825?utm_medium=Soc', 17, 2, 16, 1),
(307, 1627494560, 1627430400, 'Caso fraude 2019: El peritaje que encargó la Fiscalía costó Bs 216.000 y lo hicieron un docente y dos estudiantes', 'Tres empresas se ofrecieron para hacer el análisis de integridad electoral dentro del caso fraude electoral en 2019 y el trabajo costó 216.193 bolivianos, de acuerdo a documentos públicos del Sistema de Contrataciones del Estado (Sicoes).', 'https://eldeber.com.bo/pais/caso-fraude-2019-tres-empresas-se-ofrecieron-para-hacer-el-peritaje-y-el-trabajo-costo-mas-de-216000_240917?utm_medium=Soc', 17, 1, 16, 1),
(308, 1627494793, 1627430400, 'En la Fiscalía aseguran que no hubo ayuda de otros países para informe del fraude y que pagó por la pericia', 'El secretario general del Ministerio Público asegura que desconoce la hoja de vida de los expertos de la OEA que realizaron el informe en 2019. La Fiscalía pagó Bs 216.193 por el informe a técnicos de la Universidad de Salamanca', 'https://eldeber.com.bo/pais/en-la-fiscalia-aseguran-que-no-hubo-ayuda-de-otros-paises-para-informe-del-fraude-y-que-pago-por-la-_240921?utm_medium=Soc', 17, 1, 16, 1),
(309, 1627496297, 1627430400, 'estigados por el Caso Fraude 2019 anuncian un proceso contra Luis Almagro', 'Costas y Mamani ratifican sus observaciones a la labor de la OEA en las elecciones de octubre de 2019. Consideran que el peritaje internacional presentado ayer los libera de toda culpa', 'https://eldeber.com.bo/pais/exvocales-del-tse-investigados-por-el-caso-fraude-2019-anuncian-un-proceso-contra-luis-almagro_240932?utm_medium=Social&ut', 17, 1, 16, 1),
(310, 1627497028, 1627430400, 'Presidente del Concejo niega acuerdos con el MAS, pero reconoce mayor afinidad para lograr consensos', 'La aprobación de la ley del bono escolar mostró las primeras fricciones en el órgano deliberativo. Los dos concejales del MAS han permitido que UCS avance con sus propuestas', 'https://eldeber.com.bo/el-deber-radio/presidente-del-concejo-niega-acuerdos-con-el-mas-pero-reconoce-mayor-afinidad-para-lograr-consensos_240891?utm_m', 17, 2, 16, 1),
(311, 1627505378, 1627430400, 'Ex senadora Carmen Eva Gonzales considera abuso de poder decisión del caso fraude del 2019', 'La senadora re afirma el abuso de autoridad por parte de la justicia ante el caso fraude del 2019', '', 54, 2, 45, 1),
(312, 1627511212, 1627430400, 'Las declaraciones por el caso fraude electoral era solo una mentira de la derecha.', 'Umberto Sanchez -  Gobernador de Cochabamba se pronuncio dando a conocer que el cierre del caso fraude electoral tiene legitimidad por estar avalado por un observatorio internacional y fue trabajado de manera responsable solo ahora se quiere vivir en democracia.', '', 47, 2, 34, 1),
(313, 1627511647, 1630108800, 'El presidente estará en Santa cruz para realizar proyectos ', 'Juan Toco - Presidente de la Federación de Campesinos confirmo que toda la federación estará presentes en San Julián que es el lugar donde llegara el presidente con todas las organizaciones del mismo modo estarán las redes interculturales para poder ser parte de los proyectos en beneficio de todos nosotros.', '', 47, 2, 34, 1),
(314, 1627512270, 1615161600, 'Adultos mayores y personas con discapacidad participaron de la fiesta democrática', 'Durante el domingo de Elecciones Subnacionales 2021, adultos mayores y personas con discapacidad participaron de la fiesta democrática y emitieron su voto de manera voluntaria en los diferentes recintos electorales habilitados dentro la ciudad de Oruro. ', 'https://impresa.lapatria.bo/noticia/1032125/adultos-mayores-y-personas-con-discapacidad-participaron-de-la-fiesta-democratica#articulo', 15, 2, 48, 1),
(315, 1627514179, 1627430400, 'El informe pericial de la Universidad de Salamanca tuvo un costo de 30.000 bolivianos.', '						El Secretario General del Ministerio Público, comunicó que el informe pericial de la Universidad de Salamanca, que sirvió como fundamento para cerrar el caso Fraude Electoral, tuvo un costo de 30.000 bolivianos.					', '', 43, 2, 46, 1),
(316, 1627517422, 1630108800, 'Se debe profundizar la violación de los derechos en el caso Golpe de Estado.', 'Cristian Sanabria - Representante de la CIDH en Chuquisaca se pronuncia acerca del caso Golpe de Estado ya que existió muchos actos violando los derechos humanos por los tanto se debe evaluar las características de los derechos humanos ya que en la ley esta enmarcado que no se permite la inmovilidad de ningún militar que le permita cometer actos en contra de los derechos de los ciudadanos.', '', 47, 2, 34, 1),
(317, 1627517804, 1627430400, 'La Federación de Interculturalidades acusa a Luis Fernando Camacho.', 'El presidente de la Federación de Interculturalidades acusan a Luis Fernando Camacho por usar la biblia para matar a las personas, refleja que son testigos de que son asesinos y por lo mismo piden cárcel por todas las muertes.', '', 47, 2, 34, 1),
(318, 1627520262, 1627344000, 'Se entregaron 790 dispositivos celulares a estudiantes de escasos recursos; en distintos distritos de Santa Cruz.', 'El Director Departamental de Educación de Santa Cruz, entregó 790 dispositivos celulares a estudiantes de escasos recursos, entrega que se concretó, por medio de las diferentes juntas vecinales; esta intermediación de las juntas vecinales se explica, según el director, para asegurar la transparencia de la entrega.', '', 43, 2, 46, 1),
(319, 1627520580, 1627344000, 'cierre de caso fraude ', 'determincaion de cerrar el caso fraude puede ser apelada ya que no se tomo en cuenta varios aspectos', '', 21, 1, 32, 1),
(320, 1627521033, 1627430400, 'La bancada parlamentaria de Comunidad Ciudadana anuncio que presentará tres acciones contra el caso de fraude electoral', '						La bancada parlamentaria de Comunidad Ciudadana anuncio que solicitará al fiscal general del estado un informe escrito sobre el informe encargado a realizar a un grupo de academicos de la universidad de Salamanca de España también se pedira al vicepresidente Choque Huanca y la cámara de cenadores y diputados se cuide la institucionalidad de la ingerencia política y también se anuncio que se va a recurrir a instancias internacionales ante posibles nuevas persecusiones políticas  					', '', 48, 2, 17, 1),
(321, 1627521372, 1627430400, 'El cierre del caso Fraude Electoral, genera opiniones divergentes entre oficialistas y oposición', 'Mientras el diputado del MAS Gustavo Vega, defiende el informe pericial de la Universidad de Salamanca y aplaude la decisión del fiscal de cerrar el caso Fraude Electoral; la diputada de Comunidad Ciudadana Lily Fernandez, califica de direccionado dicho informe y además subraya que con la acción del fiscal, se estaría desdeñando el informe de la OEA que es vinculante; a diferencia del actual informe avalado por la fiscalía.', '', 43, 2, 46, 1),
(322, 1627521528, 1627430400, 'Fraude electoral ', 'El fiscal departamental confirmó que no hubo fraude electoral ', 'https://www.facebook.com/spccanal15/videos/1028885401185043/', 27, 2, 20, 1),
(323, 1627523179, 1627430400, 'Fallo de Fiscalía que cierra caso fraude electoral tensiona al país', 'El Ministerio Público determinó cerrar el caso denominado “fraude electoral” basado en un documento del Grupo de Investigación Deep Tech Lab de Bisite, firmado por un docente y dos estudiantes de la Universidad de Salamanca.', 'https://www.lostiempos.com/actualidad/pais/20210728/fallo-fiscalia-que-cierra-caso-fraude-electoral-tensiona-al-pais', 12, 2, 44, 1),
(324, 1627523343, 1627430400, 'Fiscalía defiende pericia y señala que informe de la OEA no tenía “consistencia”', 'El secretario general de la fiscalía del Estado, Edwin Quispe, aseguró que la comisión de fiscales cerró el caso fraude electoral en base a una pericia realizada por un “equipo de alto nivel” y aseveró que el informe de la Organización de Estados Americanos (OEA) que halló manipulación en los comicios de 2019 era “solo un indicio” y que no tenía la “consistencia” necesaria para la investigación.', 'https://www.lostiempos.com/actualidad/pais/20210728/fiscalia-defiende-pericia-senala-que-informe-oea-no-tenia-consistencia', 12, 2, 44, 1),
(325, 1627523657, 1627430400, 'Secretario de la Fiscalía General declara que el caso fraude sigue abierto', 'El secretario general de la Fiscalía General del Estado, Erwin Quispe, declaró que el caso fraude electoral aún está abierto y que puede ser impugnado por las partes.', 'https://www.lostiempos.com/actualidad/pais/20210728/secretario-fiscalia-general-declara-que-caso-fraude-sigue-abierto', 12, 2, 44, 1),
(326, 1627523765, 1627430400, 'Conade rechaza cierre del caso fraude y convoca a protestas', 'El Comité de Defensa de la Democracia (Conade) tras una asamblea de emergencia resolvió convocar a protestas contra el cierre del caso fraude electoral y alertó que el Gobierno alista un \"golpe\" para devolver el poder a Evo Morales.La organización convocó a una movilización general para el 6 de agosto, además de encarar las acciones en varios frentes: nacional e internacional, para denunciar la arremetida del Gobierno. ', 'https://www.lostiempos.com/actualidad/pais/20210728/conade-rechaza-cierre-del-caso-fraude-convoca-protestas', 12, 2, 44, 1),
(327, 1627523898, 1627430400, 'CC anuncia acciones internacionales por el caso fraude y pide garantías para manifestantes de 2019', 'Comunidad Ciudadana (CC) anunció que emprenderá acciones internacionales al respecto, pero también para solicitar garantías a favor de Carlos Mesa y los ciudadanos que se movilizaron en 2019.', 'https://www.lostiempos.com/actualidad/pais/20210728/cc-anuncia-acciones-internacionales-caso-fraude-pide-garantias', 12, 2, 44, 1),
(328, 1627524007, 1627430400, 'Creemos pide renuncia de Lanchipa por cerrar caso fraude con un “informe universitario”', 'Creemos rechazó el cierre del caso fraude electoral y pidió la renuncia del fiscal general del Estado, Juan Lanchipa, por tomar esa decisión en base a un “informe universitario” que no puede ser comparado con la auditoría de la Organización de Estados Americanos (OEA).', 'https://www.lostiempos.com/actualidad/pais/20210728/creemos-pide-renuncia-lanchipa-cerrar-caso-fraude-informe-universitario', 12, 2, 44, 1),
(329, 1627524582, 1627430400, 'Comisión de Asambleístas visitan el territorio indígena Chiquitano, para fiscalizar el cumplimiento efectivo de su derecho al territorio.', 'Esta fiscalización, responde a una solicitud precedente por parte de los habitantes de la zona de Monte Verde. En concreto el objetivo, fue verificar la vigencia de los derechos indígenas de acceso y respeto a sus territorios.', '', 43, 2, 46, 1),
(330, 1627524839, 1627430400, 'Bolivia ha retornado al tiempo de los presos políticos torturados', '						El CONADE ratifica que el golpe de estado es la cinica mentira que justifica la respresion política existente a pesar de los elementos demostrativos que ratifican que no hubo el golpe de estado si no fraude electoral.					', '', 39, 2, 30, 1),
(331, 1627525112, 1627430400, 'Salud pide recursos financieros', 'El consejo municipal de salud pide la cancelación de 3 meses de trabajo  de parte del GAMO y dar solución a trabajadores pero el alcalde argumenta que no hay presupuesto					', '', 39, 2, 30, 1),
(332, 1627525227, 1627430400, 'La alcaldía de Tarija formula un paquete de medidas económicas en conjunción con todos los barrios, comunidades rurales y diversos sectores y colegios profesionales.', 'El alcalde de Tarija Johnny Torres, presentó un nuevo paquete de medidas económicas para la reactivación en el departamento; paquete en el cual, participaron en su estructuración, todos los dirigentes de cada barrio, las 76 comunidades rurales y diversos sectores y colegios de profesionales. Una flexibilización de los requisitos para la licencia de funcionamiento y una ley de alianzas estratégicas para el desarrollo de la generación de empleo, son los dos ejes de esta novel política pública.', '', 43, 2, 46, 1),
(333, 1627525726, 1627430400, 'Entel habilita internet móvil en San Sebastián, escolares ya no tienen que trepar el cerro.', 'Los estudiantes recorrían hasta diez kilómetros en busca de señal de internet, que se había instalado en un cerro. Esta jornada, el servicio de internet móvil de Entel llegó a la localidad de San Sebastián, ubicada en el municipio de Betanzos del departamento de Potosí, como premio al esfuerzo de los estudiantes, quienes todos los días se subían en un cerro para buscar la señal y pasar clases virtuales.  La historia de los estudiantes —de diferentes niveles—, que se hizo viral en las redes sociales, llamó la atención de la estatal Entel, que en menos de dos semanas erigió una radio base (Sistema de Comunicación Móvil) cercana para beneficiar a la población.', 'https://www.paginasiete.bo/sociedad/2021/7/28/entel-habilita-internet-movil-en-san-sebastian-escolares-ya-no-tienen-que-trepar-el-cerro-302340.html?__', 14, 2, 34, 1),
(334, 1627525869, 1627430400, 'Loza: «Nadie va a serruchar a Arce».', 'l senador del Movimiento Al Socialismo (MAS) Leonardo Loza afirmó este miércoles que nadie va a \"serruchar\" (quitar) el puesto al presidente Luis Arce y que Evo Morales respeta el voto popular que eligió al mandatario. El comentario surgió después de que la Fiscalía hizo público un informe de pericia internacional que concluyó que no hubo manipulación de resultados en las elecciones generales de 2019.  \"En ningún momento nuestro hermano presidente Evo va a aferrarse a los resultados o a los peritos. Es un hombre democrático que va a respetar el voto del pueblo que ha elegido a Lucho y David\", expresó el legislador.', 'https://www.paginasiete.bo/nacional/2021/7/28/loza-nadie-va-serruchar-arce-302323.html?__twitter_impression=true', 14, 2, 34, 1),
(335, 1627526198, 1627430400, 'CC: Ninguna investigación de un instituto puede reemplazar una auditoría firmada por el Estado.', 'La bancada de Comunidad Ciudadana (CC) en el Senado y Diputados rechazó este miércoles el informe del Grupo de Investigación Deep Tech Lab de Bisite, de la Fundación General de la Universidad de Salamanca, por el cual se decidió cerrar el caso fraude electoral y afirmó que ninguna investigación de un \"instituto\" puede reemplazar la auditoría final de la Organización de Estados Americanos (OEA).  “Ninguna investigación de un instituto puede reemplazar una auditoría firmada por el Estado boliviano con la OEA que ha sido realizada in situ, con una organización que ha sido veedora antes, durante y después del proceso electoral y que conoce además las características sociales de este proceso”, indicó en conferencia la senadora de CC, Andrea Barrientos.', 'https://www.paginasiete.bo/nacional/2021/7/28/cc-ninguna-investigacion-de-un-instituto-puede-reemplazar-una-auditoria-firmada-por-el-estado-302313.htm', 14, 2, 34, 1),
(336, 1627526489, 1627344000, 'CC denuncia viajes de “turismo” de parlamentarios supraestatales del MAS ', 'La parlamentaria supraestatal de CC  Aleiza Rodríguez demando a sus colegas del MAS por tener viajes de \"turismo\" por el país de Colombia a pesar que las sesiones del Parlamento Andino son virtuales, dándoles así 1500 dólares de viáticos, una cantidad bastante elevada dicen y exigiendo que esos viáticos sean devueltos al Estado para invertirlos en salud o en algún otro sector que realmente lo necesite.', 'https://correodelsur.com/politica/20210727_cc-denuncia-viajes-de-turismo-de-parlamentarios-supraestatales-del-mas-al-exterior.html', 11, 2, 47, 1),
(337, 1627526512, 1627430400, 'Conade convoca a protestas el 6 de agosto en rechazo del cierre del caso fraude.', 'El Comité Nacional de Defensa de la Democracia (Conade) determinó iniciar movilizaciones el 6 de agosto, ante el cierre del caso fraude electoral asumido ayer por el Ministerio Público, por los resultados de una consultoría que encontró irregularidades, pero no “manipulación de resultados” de las elecciones de 2019. Pide “estar alertas” ya que se “abre las puertas de un golpe de Estado en favor de Evo Morales”.', 'https://www.paginasiete.bo/nacional/2021/7/28/conade-convoca-protestas-el-de-agosto-en-rechazo-del-cierre-del-caso-fraude-302310.html?__twitter_impres', 14, 2, 34, 1),
(338, 1627526651, 1627430400, 'Camacho anuncia recurso legal para evitar el cierre del caso fraude.', 'El Gobernador de Santa Cruz advirtió con acudir a instancias internacionales \"si la justicia sometida sigue encubriendo el fraude masista\". Del mismo modo anunció en la noche del martes que presentará un recurso legal para evitar el cierre del caso que investiga el presunto fraude en los comicios de 2019. La postura del gobernador responde a las declaraciones de la Fiscalía Nacional del Estado que apunta al cierre de las pericias luego de recibir un informe internacional que concluye que no hubo manipulación de los resultados electorales. ', 'https://www.paginasiete.bo/nacional/2021/7/28/camacho-anuncia-recurso-legal-para-evitar-el-cierre-del-caso-fraude-302305.html?__twitter_impression=tru', 14, 2, 34, 1),
(339, 1627526734, 1627344000, 'Resistencia Cochala denuncia persecución política ', 'Eliana Soto Líder de la Resistencia cochala denunció que sufrió un intento de secuestro, cree que esta situación viene de órdenes del Viceministerio del Régimen de Interior.El concejal del movimiento al socialismo Joel Flores sostiene que son falsos discursos.', '', 35, 2, 18, 1),
(340, 1627527067, 1627344000, 'La oposición exige procesos penales contra Gomez y Alcon ', 'Para el diputado Whalty Eguez Paz denuncia en contra de los magistrados Norka Gomez y Gonzalo Alcón deberían ser enjuiciados por un juicio de responsabilidad ya que se les acusa de haber recibido dinero para la designación de jueces y exige se deje la corrupción en el sistema judicial por parte del movimiento al socialismo , también exige una auditoría a cada uno de los jueces elegidos por estas autoridades.', '', 35, 2, 18, 1),
(341, 1627527091, 1627430400, 'La COB se pronuncia ante atentados', 'La Central Obrera Departamental de Chuquisaca rechaza la persecución política del Gobierno contra los maestros de Potosí y asegura que en su afán de sostener la teoría del \"golpe\" pretende mostrarlos como golpistas.', '', 35, 2, 34, 1),
(342, 1627527144, 1627430400, 'Se trata del almirante Moisés Orlando Mejía. La Justicia determinó su detención por seis meses en el caso abierto por las víctimas de Senkata', 'El excomandate de la Armada, almirante Moisés Orlando Mejía, fue enviado a la carcel de San Pedro, La Paz, por los hechos de Senkata en 2019, deberá estar recliido 6 meses, con él suman 5 militares procesados.', '', 53, 2, 29, 1),
(343, 1627527227, 1627344000, 'En Santa Cruz ex militares cuestionan aprensiones de ex jefes castrenses ', 'El abogado del general terceros Jorge Santi Esteban cuestiona la pasividad de la justicia militar que asegura que estuviera permitiendo la aprehensión de militares subalternos, el abogado lamentó la pasividad de la justicia de las fuerzas armadas. Además denunció el secuestro de 4 militares el fin de semana y asegura que se está actuando en el anonimato. ', '', 35, 2, 18, 1),
(344, 1627527251, 1627344000, '“No es creíble”: Mesa rechaza pericia encargada por la Fiscalía sobre elecciones de 2019', 'El excandidato a la presidencia Carlos Mesa reaccionó a la decisión del Ministerio Público y calificó el estudio como una “investigación extemporánea, de gabinete, externa y con alcance y metodología establecida por el gobierno masista y una consultora”. Este caso \"Fraude\" se reviso con una consultora Española d ela Univerdsidad de Salamanca ', 'https://correodelsur.com/politica/20210727_no-es-creible-mesa-rechaza-pericia-encargada-por-la-fiscalia-sobre-elecciones-de-2019.html', 11, 2, 47, 1),
(345, 1627527399, 1627430400, 'El representante de la APDH denuncia mal dirección de evidencias.', 'El representante de la APDH de El Alto, David Inca, denuncia a Amparo Carvajal por \"instruir\" a la oficina de la APDH Bolivia rechazar documentos e informes sobre los hechos ocurridos entre octubre y noviembre de 2019, especialmente de la masacre de Senkata.', '', 35, 2, 34, 1),
(346, 1627527435, 1627344000, 'En Santa Cruz Camacho asegura que no fue citado a declarar por el caso del “Supuesto Golpe” ', 'El gobernador Fernando Camacho aseguró que se presentará a  cualquier convocatoria del Ministerio Público por el supuesto caso del “Golpe de Estado” sin embargo aún no fue notificado por las autoridades respectivas . Fernando Camacho lamentó el proceso que se está realizando a los ex militares y no así al ex presidente Evo Morales y Alvareo Garcia Linera .', '', 35, 2, 18, 1),
(347, 1627527527, 1627344000, 'El Dirigente Cívico asegura que el informe GIEI será utilizado para profundizar la Teoría del Golpe ', 'El ex presidente y miembro del comité de civilizaciones del 2019 ve como un instrumento a favor de la Teoría del Golpe el informe que vaya emanar el grupo de investigación de expertos independientes GIEI sobre los acontecimientos de octubre y noviembre según Rodrigo Echalar. ', '', 35, 2, 18, 1),
(348, 1627527576, 1627430400, 'Choquehuanca dice que en el gobierno de Áñez se vivió ‘un año nefasto y de oscuridad’', 'EL presidente en ejercicio David Choquehuanca afirmó que el gobierno de Jeanine Áñez se vivió un año nefasto y, nuevamente, convocó a la unidad de los bolivianos. Señaló que el proceso de cambio dio grandes avances, y fue gracias a los movimientos sociales (como la COB) y jóvenes autoconvocados que e logró resistir el golpe de Estado; tamibén señaló que no debe olvidarse lo ocurrido.', 'https://www.la-razon.com/nacional/2021/07/28/choquehuanca-dice-que-en-el-gobierno-de-anez-se-vivio-un-ano-nefasto-y-de-oscuridad/', 53, 2, 29, 1),
(349, 1627527644, 1627344000, 'Las Cooperativas Mineras exigen la denuncia del Ministro de Minería', 'los cooperativistas mineros salieron en una marcha ,masiva en la ciudad de potosí, exigiendo la renuncia del ministro de minería , esta movilización se da a raíz del Anuncio de preservación del Cerro Rico y que para este objetivo se debe desalojar a los cooperativistas, así declaró su ejecutivo Edgar Huallpa.', '', 35, 2, 18, 1),
(350, 1627527861, 1627430400, 'Exmagistrado del TCP critica a la Fiscalía y dice que \"vivimos en un estado de indefensión\"', 'Después que el Ministerio Público resolvió el sobreseimiento del caso fraude electoral, Marco Baldivieso, observó que el Ministerio Público no esté cumpliendo las leyes y la CPE. El exmagistrado del Tribunal Constitucional Plurinacional, Marco Baldivieso, afirmó que el país vive la “peor” etapa del Ministerio Público, y que los bolivianos viven en un estado de indefensión permanente, ante la sistemática desinstitucionalización de los Órganos del Estado.  Baldivieso se refirió en esos términos, después que el fiscal general, Juan Lanchipa, y los fiscales del caso denominado fraude electoral, resolvieron cerrar el proceso con base en un informe del “Grupo de Investigación Deep Tech Lab de BISITE” de la Fundación General de la Universidad de Salamanca, España.', '', 35, 2, 34, 1),
(351, 1627527950, 1627430400, 'La Fiscalía revela que la pericia sobre las elecciones de 2019 costó unos $us 30.000', 'El secretario de la fiscalía general del Estado, Edwin Quispe, informó que la pericia realizada a las elecciones anuladas de 2019 tuvieron un costo de $ 30.000. El ministerio público realizó el proceso de contratación de una consultora internacional para el análisis de las elecciones de 2019, este trabajo tiene una extensión de las de 230 páginas y cuyas conclusiones fueron entregadas al fiscal general Juan Lanchipa quien señaló que se encontró deficiencias que no afectarían al proceso electoral. ', 'https://www.la-razon.com/nacional/2021/07/28/la-fiscalia-revela-que-la-pericia-sobre-las-elecciones-de-2019-costo-unos-us-30-000/', 53, 2, 29, 1),
(352, 1627528248, 1627430400, 'Quienes denunciaron fraude monumental sin pruebas, ahora deben rendir cuentas', 'El procurador de Wilfredo Chávez, dijo que con el informe de la Fundación de la Universidad de Salamanca, España, sobre las elecciones de 20219, se demuestra de manera pericial y judicial que no existió ilícitos en esos comicios y que quienes impulsaron la consigna \"fraude monumental\" deben rendir cuentas ante la justicia. ', '', 23, 2, 34, 1),
(353, 1627528460, 1627430400, 'Presidente de Diputados: Ahora no hay duda de que la OEA fue parte del ‘golpe de Estado´', 'Después de que la fiscalía presentará el estudio que descarta la manipulación de votos, el presidente de la cámara de diputados, Freddy Mamani, afirma que la OEA fue parte del golpe de Estado, basándose en el peritaje que se presentó a la fiscalía.', 'https://www.la-razon.com/nacional/2021/07/28/presidente-de-diputados-ahora-no-hay-duda-de-que-la-oea-fue-parte-del-golpe-de-estado/', 53, 2, 29, 1),
(354, 1627528497, 1627430400, 'Exvocal del TSE tomará acciones contra las personas que vulneraron sus derechos.', 'Idelfonso Mamani, exvocal del Tribunal Supremo Electoral (TSE), anunció que tomará acciones en contra de los denunciantes del caso fraude electoral, porque vulneraron sus derechos. Sostuvo que los delitos que le atribuyen no fueron respaldadas con pruebas.', '', 23, 2, 34, 1),
(355, 1627528843, 1627430400, 'Pumari señala que informe presentado por la Fiscalía busca lavar la imagen de Evo Morales', 'Marco Antonio Pumari, expresidente de COMCIPO, afirma que el informe presentado por la fiscalía sobre la pericioa a los resultados de las elecciones 2019, pretenden limpiar la imagen de Evo Morales, aseguró que el gobierno tiene un manejo de los poderes del Estado y maneja la fiscalía para hacer validar esa versión. Afirmó que el informe de la universidad de Salamanca no es vinculante a diferencia de lo que presentó la OEA.', 'https://www.la-razon.com/nacional/2021/07/28/pumari-dice-que-informe-presentado-por-la-fiscalia-busca-lavar-la-imagen-de-evo-morales/', 53, 2, 29, 1),
(356, 1627529348, 1627430400, 'Hace un año movilizaciones exigían elecciones para recuperar la democracia   ', 'Hoy hace un año los movimientos sociales realizaban movilizaciones para garantizar las elecciones en el caso golpe de estado', 'https://www.youtube.com/watch?v=yg5tIqVrrY8', 32, 2, 43, 1),
(357, 1627529381, 1627430400, 'Patty dice que a Lanchipa le tiemblan las manos para detener a Camacho y le pide dejar su cargo', 'La exdiputada del MAS, Lidia Patty, considera que el fiscal general del Estado, Juan Lanchipa, le tiemblan las manos para detener al ex lider cívico Luis Fernando Camacho, indica que no trabaja por el pueblo; Lanchipa respondió (el 25 de julio) que se citaría a Camacho pero depende de la comisión de fiscales.', 'https://www.la-razon.com/nacional/2021/07/28/patty-dice-que-a-lanchipa-le-tiemblan-las-manos-para-detener-a-camacho-y-le-pide-dejar-su-cargo/', 53, 2, 29, 1),
(358, 1627529747, 1627430400, 'Fiscalía concluye que no hubo manipulación en las elecciones 2019  ', 'Ante los resultados del informe de la universidad de Salamanca la Fiscalía general de nacion concluyo que no hubo fraude en las elecciones generales del 2019 ', 'https://www.youtube.com/watch?v=yg5tIqVrrY8', 32, 2, 43, 1),
(359, 1627529851, 1627430400, 'Camacho recurrirá a ‘todas las vías legales’ para evitar el cierre del caso Fraude', 'Camacho anunció que apelará a todas las vías legales posibles para evitar que se cierre el caso de Fraude, señala que si Evo Morales y la justicia sometida continuan encubriendo el fraude masista, entonces se recurrirá a todas las instancias internacionales (señala mediante sus redes sociales), también indica que existe el informe de la OEA, que señala 70 irregularidades, y que el mismo Evo Morales anuló las elecciones y convocó una nueva porque todas las irregularidades eran evidentes.', 'https://www.la-razon.com/nacional/2021/07/28/camacho-recurrira-a-todas-las-vias-legales-para-evitar-el-cierre-del-caso-fraude/', 53, 2, 29, 1),
(360, 1627530009, 1627430400, 'Campesinos apoyan informe de Salamanca', 'Edilberto Salazar presidente de la comisión de justicia de la SCUTCB, manifesto su conformidad con respecto al informe presentado por la Universidad de Salamanca', 'https://www.youtube.com/watch?v=yg5tIqVrrY8', 32, 2, 43, 1),
(361, 1627530127, 1627430400, 'El MAS pide investigar golpe de estado.', '						El delegado del Movimiento al socialismo pide investigar sobre el golpe de estado; mencionando que hay medios, instituciones e personajes principales.   Mencionando que hay culpables con nombres y se  los conoce... así mismo  Homer Menacho  ex senador opositor cuestiona resultados de investigación. 1					', 'https://www.facebook.com/TVUCanal21/', 28, 2, 53, 1),
(362, 1627530212, 1627430400, 'Interpretación de Autoridades originarias de potosí exigen justicia ', 'Autoridades municipales del departamento de potosí, realizan análisis respecto al informe de la Universidad de Salamanca, y manifiestan que este discurso sustento el golpe de estado el 2019   ', 'https://www.youtube.com/watch?v=yg5tIqVrrY8', 32, 2, 43, 1),
(363, 1627530377, 1627430400, 'Informe sepulta denuncias de fraude electoral', 'Organizaciones sociales en La Paz lamentan que la oposición no reconozca el informe de la universidad de Salamanca', 'https://www.youtube.com/watch?v=yg5tIqVrrY8', 32, 2, 43, 1),
(364, 1627530514, 1627430400, 'Costas afirma que el informe de la OEA fue político e intencionado', 'Antonio Costas afirma estar muy feliz por el sobreseimiento de la fiscalía por los comicios anulados de 2019, afirma que el trabajo de la OEA fue político y muy superficial en cuando a lo técnico. Indica que Ethical Hacking actupo como un caballo de Troya que hicieron observaciones oficiosas y alarmistas, en resumen el trabajo del TREP y el cómputo fue exitoso. Pese a todo ello no está seguro de tomar acciones legales.', 'https://www.la-razon.com/nacional/2021/07/28/costas-afirma-que-el-informe-de-la-oea-fue-politico-e-intencionado/', 53, 2, 29, 1),
(365, 1627530846, 1627430400, 'Morales tras informe electoral: ‘El único fraude es la denuncia de fraude monumental’', 'Luego de presentarse un informe pericial que descarta irregularidades en las elecciones de 2019, el expresidente Evo Morales aseguró que el “único fraude es la denuncia de fraude monumental” y acusó al expresidente Carlos Mesa de usar esa denuncia, señala que Mesa usaron el \"fraude\" para violar la CPE, masacrar al pueblo y robar al Estado.', 'https://www.la-razon.com/nacional/2021/07/27/morales-tras-informe-electoral-el-unico-fraude-es-la-denuncia-de-fraude-monumental/', 53, 2, 29, 1),
(366, 1627531225, 1627344000, 'Crisis 2019: caen otros 3 militares y MAS pide ir por Camacho y Pumari', 'En el caso por la crisis de año 2019 en Bolivia se suma 15 militares que ya están procesados, acusados por delitos como homicidio y lesiones graves, que involucran los fallecimientos en Sacaba (Cochabamba), Senkata (El Alto) y Betanzos (Potosí), en ese sentido dos militares se encuentran con paradero desconocido, uno de ellos con detención domiciliaria y 9 están en prisión. Por ello también el partido político Movimiento Al Socialismo (MAS), piden que Luis Fernando Camacho y Marco Pumari cívicos deben ir a declara y ser investigados por el mismo caso que los militares. ', 'https://www.opinion.com.bo/articulo/pais/crisis-2019-caen-otros-3-militares-mas-pide-ir-camacho-pumari/20210727002405828789.html', 13, 2, 39, 1),
(367, 1627531282, 1627257600, 'El rol de la Mujer en la sociedad/ temas sugeridos en reunión la reunión  desarrollada en La Paz.', 'La Sra Yusara Melena Presidente de ACOPANDO, (ASOCIACIÓN DE CONSEJALAS DE PANDO) en una reunión Nacional abordó temas concernientes a Drecho de la Mujer, el rol de la mujer en la sociedad y otros temas. Donde próximamente  se estará trabajando estos temas en Pando', 'https://fb.watch/71TRE4b8PU/', 28, 2, 53, 1),
(368, 1627532009, 1626998400, 'UAP Y DEFENSORÍA  DEL PUEBLO EN DEFENSA DE MUJERES  VICTIMAS DE VIOLENCIA ', 'Estas instituciones  de la Universidad Amazónica de Pando y Defensoria del pueblo  habilitan una oficina para brindar servicios de seguridad integral de la mujer, mujeres víctima de violencia; el cual ofrece sus servicios  en estos  aspectos. Están ubicándose en oficinas del área del ciencias Jurídicas y políticas .', 'https://fb.watch/71UGZZ_TFG/', 28, 2, 53, 1),
(369, 1627532150, 1627344000, 'Denuncia contra ministro de Educación por tráfico de influencias divide al MAS', 'La viceministra de Educación Superior, Aurea Balderrama, formalizó una denuncia penal contra el ministro de Educación, Adrian Quelca, esta decisión se tomó por las declaraciones sociales, padres de familia y magisterio, las mismas se difundieron en medios de comunicación y redes sociales, esta denuncia se basa en respecto al tráfico de exámenes, en ello el exdirector de Educación Superior Técnica Tecnológica Lingüistica y Artistica, Agustin Tarifa, de la misma forma tiene una denuncia por el tráfico de influencias. ', 'https://www.opinion.com.bo/articulo/pais/denuncia-ministro-educacion-trafico-influencias-divide-mas/20210727003147828793.html', 13, 2, 39, 1),
(370, 1627533292, 1627344000, 'Fiscalía cierra el caso de fraude electoral: hubo “negligencia”, pero no “manipulación”', 'El Fiscal general Juan Lanchipa, informó que se ha solicitado la conclusión del caso de fraude electoral, en el cual el contenido del dictamen pericial, indicó que se corroboró que existían servidores que no estaban previstos en la estructura informática del Tribunal Supremo Electoral, en ese sentido aclaró que ello fue negligencia y no manipulación, por lo tanto se liberaron de cualquier culpa todos los implicados. ', 'https://www.opinion.com.bo/articulo/pais/fiscalia-cierra-caso-fraude-electoral-hubo-negligencia-manipulacion/20210727150031828835.html', 13, 2, 39, 1),
(371, 1627533838, 1627430400, 'Advierten que resultará contraproducente para el MAS insistir en resolver un tema netamente político por la vía judicial', 'Marcelo Arequipa, politólogo, a formulado criterios sobre la coyuntura social y política a tiempo de advertir un error por parte del MAS al querer resolver un dilema político por la vía judicial, señala que no se puede cerrar un problema político por lo judicial, cree que el fiscal general comete un error de transparencia de la información pues hasta ahora no compartió el informe; el MAS perdió la oportunidad de cerrar el tema político, el informe siembre más dudas e incertidumbre en la sociedad, un informe técnico no resuelve lo que indica el contexto político ya de por si complicado.El que el MAS no quiera admitir parte de su responsabilidad lo llevará a un desgaste.', '', 38, 2, 29, 1),
(372, 1627534047, 1627430400, 'El ministerio público cometió 7 irregularidades en contratación de docente de Salamanca', 'Los procedimientos de contratación se encuentran establecidos en los decretos 181, 26688, 1497; ayer el fiscal general del Estado, en base al informe proporcionado  por Juan Manuel Corchado y dos estudiantes, se haya sobreseido a todos los imputados por el fraude electoral. El proceso de contratación detalla que se adjudicó la pericia por el principio de contratación de servicios generales. Corchado señaló que lo contrató la fiscalía boliviana de forma privada, y que no puede (por ello) hablar.', '', 38, 2, 29, 1),
(373, 1627534167, 1627430400, 'Parlamentario masista retifica que al menos un centenar de informes descartan la manipulación de datos en las elecciones de 2019', 'El parlamentario Angelo Céspedes señaló que, al menos, 100 informes imparciales y objetivos de expertos, coinciden con la de los expertos de Salamanca, lamentó que la oposición haya pretendido utilizar la acusación de fraude electoral para promover la ruptura del orden constitucional en coordinación con el secretario de la OEA. Señala que Evo Morales recurrió a la OEA sin pensar que ésta formaría parte del golpe de Estado.', '', 38, 2, 29, 1),
(374, 1627534305, 1627430400, 'Vocero del CONADE augura contundencia en la rearticulación del movimiento ciudadano en defensa de la democracia ', 'Frente a varios acontecimientos de orden político, que causaron molestia e incertidumbre en la población, Manuel Morales (vocero de CONADE) señala que se rearticula el movimiento ciudadano en defensa de los valores de la democracia, apeló a la conciencia ciudadana para hacer prevalecer los alcances de la CPE frente a los constantes abusos por parte del MAS, esta situación abre nuevos escenarios para los movimientos ciudadanos.', '', 38, 2, 29, 1),
(375, 1627534452, 1627430400, 'Diputado masista dice que debe haber mano dura ante intentos de desestabilización tras cierre del caso fraude', 'Jerges Mercado señala la posibilidad de que haya movilizaciones y protestas por el fraude electoral, sin embargo hablamos de minorías ya que las mayorías no quieren problemas, en todo caso se reconoce el derecho a la protesta pero eso no significa que se tolere la desestabilización del Estado, es por ello que es necesario mano dura para quien agreda las normas. Señala que se anuló las elecciones en 2019, hoy se tiene un gobierno constituido y tiene que terminar su mandato.  ', '', 53, 2, 29, 1),
(376, 1627534595, 1627430400, 'Deploran que la fiscalía no haya tomado en cuenta el informe de la OEA en el caso fraude, que además fue solicitado por Evo Morales', 'El ex diputado Gonzalo Barrientos manifestó que la fiscalía del Estado debía haber tomado en cuenta el informe de la OEA y no el de una fundación de la Universidad de Salamanca, asevera que fue Evo Morales quien pidió el informe a la OEA y que sería vinculante. Los alcances del informe de la Universidad de Salamanca no se relaciona con un informe que tiene que ver con la institucionalidad del Estado en 2019, y que, además el informe presentado por la fiscalía ya cayó por la falta de credibilidad que tiene.', '', 38, 2, 29, 1),
(377, 1627534789, 1627344000, 'Declaran en rebeldía al capitán Vargas dentro del caso motín policial', 'El capitán Jose Vargas fue declarado en rebeldía dentro del proceso disciplinario por el caso de motín policial, el motivo que fue declarado de rebelde es debido a que no se presentó en la audiencia de juicio, pero en el momento Vargas declaró que en su proceso se están “Fabricando” pruebas en su contra y que también sufre de presión política, por ello su abogado Patricio Vargas explicó que una declaración de rebeldía implicaría emanar una orden de aprehensión, pero en la Ley del Régimen Policial no se prevé esa situación. ', 'https://www.opinion.com.bo/articulo/pais/declaran-rebeldia-capitan-vargas-dentro-caso-motin-policial/20210727203105828870.html', 13, 2, 39, 1),
(378, 1627536625, 1627344000, 'Camacho considera un nuevo ‘atropello a la democracia’ informe de la Fiscalía por el caso fraude', 'El gobernador de Santa Cruz Luis Fernando Camacho, censuró el informe parcial de la Fiscalía General donde se estableció que no hubo irregularidades en las elecciones de 2019 y lo calificó como un “nuevo atropello a la democracia”, con motivo de recuerdo el excivico utilizó sus redes sociales para mostrar los documentos que emite la Organización de Estados Americanos (OEA) sobre la “manipulación dolosa” que se cometió en los anuncios comicios de 2019, por ello las declaraciones del Fiscal General, Juan Lanchipa donde indica que se detectaron deficiencias e incidentes en el proceso electoral de 2019, en ese caso no supongan riesgos para el proceso electoral, ni para los resultados electorales de cómputo oficial y por lo tanto no se advierte manipulación de votos debido que el sistema informativo no se identificó en ningún momento alteraciones, afirmó Juan Lanchipa. Por ello el oficialismo ve al caso como cerrado. ', 'https://www.opinion.com.bo/articulo/pais/camacho-considera-nuevo-atropello-democracia-informe-fiscalia-caso-fraude/20210727212704828885.html', 13, 2, 39, 1),
(379, 1627537244, 1627430400, 'El senador de CC, Rodrigo Paz, con respecto al cierre del caso Fraude Electoral pide que el tribunal se pronuncie', 'El tribunal tiene que generar una posición constitucional ante esta crisis, señalando quien es el presidente de los bolivianos, pues con el informe de la fiscalía se entiende que el mayor perjudicado es él. Ante esto, Leonardo Loza, senador del MAS, indica que Arce es el presidente electo, pero Willian Torres, senador del MAS, indica que debe ser un tema analizado jurídicamente', '', 24, 2, 29, 1),
(380, 1627537322, 1627430400, 'Almirante Mejia ingresó a San Pedro', 'Mejía fue trasladado a San Pedro, escoltado por policías, se determinó que cumpliría 6 meses de detención preventiva, se lo imputa por el caso de Senkata en 2019', '', 24, 2, 29, 1),
(381, 1627537438, 1627430400, 'El ex comandante de las FFAA, William Kaliman, es procesado por 2 investigaciones, su paradero aún es desconocido', 'Ambas investigaciones se contradicen, Kaliman es acusado como uno de los principales sujetos del Golpe de Estado, sin embargo tiene otro proceso que es no haber sacado a los militares a tiempo para resolver los conflictos del 2019. Su abogado considera que las contradicciones tienen un fondo político  y existe la probabilidad de que el proceso por no sacar a los militares sea anulado', '', 24, 2, 29, 1),
(382, 1627537516, 1627430400, 'Oficialismo señala que OEA es uno de los responsables del golpe', 'Freddy Mamani, presidente de diputados, indica que la OEA era parte del golpe de Estado, ahora el informe da la razón, no decidieron los juicios internacionales a llevar a cabo pero se llevará a cabo una evaluación ', '', 24, 2, 29, 1),
(383, 1627537610, 1627430400, 'MAS presenta exhorto por caso Senkata', 'Abogados y miembros del MAS presentaron un exhorto al ministerio público para impulsar las investigaciones del caso Senkata pues aseguran que no hay avances; indican también que deben incluir a Carlos Mesa y a Jose Luis Quiroga ', '', 24, 2, 29, 1),
(384, 1627537727, 1627430400, 'Astorga: Que Lucho se cuide de Evo', 'Beto Astorga, diputado CC, indica que Luis Arce debe cuidarse de Evo pues Éste podría reclamar la presidencia y que la fiscalía estarían viabilizando ese objetivo, valiéndose con la mentira del golpe y con el fallo de la fiscalía; sin embargo el MAS desmiente e indica que no se habla de restituir el poder a nadie sino de sancionar a los que asumieron el poder de forma ilegal. ', '', 24, 2, 29, 1),
(385, 1627561805, 1627516800, 'Caso Fraude 2019: critican que el informe de la Fiscalía fue pagado y hecho a distancia', 'Investigadores de la Deep Tech Lab de Bisite de la Fundación General de la Universidad de Salamanca se basaron en información enviada por la Fiscalía', 'https://eldeber.com.bo/pais/caso-fraude-2019-critican-que-el-informe-de-la-fiscalia-fue-pagado-y-hecho-a-distancia_241024?utm_medium=Social&utm_source', 17, 1, 16, 1),
(386, 1627562211, 1627516800, 'En el MAS juran no ‘serruchar’ a Luis Arce para favorecer a Evo Morales', 'La oposición busca cohesión para protestar contra la Fiscalía por emitir sobreseimiento contra los acusados por el caso fraude electoral. Sectores cívicos anuncian movilizaciones el 6 de agosto. El MAS no habla todavía de la candidatura de Evo para 2025', 'https://eldeber.com.bo/pais/en-el-mas-juran-no-serruchar-a-luis-arce-para-favorecer-a-evo-morales_241025?utm_medium=Social&utm_source=Facebook#Echobox', 17, 2, 16, 1),
(387, 1627563900, 1626307200, 'Concejal municipal hace envía memorial dirigido al gobernador de La Paz, pidiendo modificación de la resolución administrativa N 176', 'Rodolfo Avilés, concejal municipal informa sobre el memorial dirigido al gobernador del Departamento de La Paz solicitando la modificación de la resolución administrativa N 176 donde se indica que el primer Grito Libertario de dio en la ciudad de La Paz.', 'https://www.facebook.com/TvSucreUSFX/videos/522032052251325', 20, 2, 54, 1),
(388, 1627578713, 1627516800, 'Auditoría de la OEA fue solicitada por el Gobierno de Evo Morales y es vinculante a sus resultados', 'El Gobierno de Evo Morales solicitó a la Organización de Estados Americanos que realice una auditoría al cuestionado proceso electoral de octubre de 2019 y comprometió al Estado a hacer vinculantes sus resultados', 'https://unitel.bo/politica/auditoria-de-la-oea-fue-solicitada-por-el-gobierno-de-evo-morales-y-es-vinculante-a-sus-resultados_154990', 21, 1, 32, 1),
(389, 1627579784, 1627516800, 'DR. BORIS BURGOS RESP. PROGRAMA DE ITS VIH SIDA SEDES PANDO NOS VISITA HOY', 'incremento de pacientes de distintas enfermedades de transmisión sexual ', '', 54, 2, 45, 1),
(390, 1627583885, 1627516800, 'cámara de representantes de USA investigará la OEA', 'la OEA será investigada por representantes de USA sobre posible fraude en las elecciones 2019', '', 32, 2, 21, 1),
(391, 1627587216, 1627344000, 'Falta de Vacuna Sputnik', 'Preocupación de la ciudadanía por falta de Vacuna Sputnik para la 2da dosis ', 'https://www.facebook.com/spccanal15/videos/211832707513987/', 27, 2, 20, 1),
(392, 1627589068, 1627257600, 'APREHENDEN EN COBIJA A SUJETO QUE REALIZÓ DISPAROS AL AIRE Y A DOS INVOLUCRADOS', 'El director de Seguridad Ciudadana y Prevención del Delito del viceministerio de Seguridad Ciudadana, Carlos Rondón, informó que la Policía Boliviana aprehendió a tres personas por los disparos al aire que se realizó en la ciudad de Cobija, cuya filmación corrió en las redes sociales.', '<iframe src=\"https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Funiversitaria97.9%2Fposts%2F326844245787658&show_text=tru', 54, 2, 45, 1),
(393, 1627589807, 1626998400, 'ABOGADO Y FAMILIARES DEL CONSCRIPTO FALLECIDO EN LA CAPITANIA SANTA ROSA', ' CONSCRIPTO FALLECIDO EN LA CAPITANÍA DE SANTA ROSA DEL ABUNA DEL DEPTO. DE PANDO', 'https://fb.watch/72Nj0DQ5B6/', 54, 2, 45, 1),
(394, 1627590123, 1627516800, 'diputado de CC sebastian divico caso fraude electoral ', 'Quieren limpiar la imagen de evo morales,hay mas de 5 informes de la OEA', 'Radio frontera', 40, 1, 28, 1);
INSERT INTO `noticia` (`idnoticia`, `fecha_registro`, `fecha_noticia`, `titular`, `resumen`, `url_noticia`, `rel_idmedio`, `rel_idcuestionario`, `rel_idusuario`, `esta_activa`) VALUES
(395, 1627590685, 1626912000, 'DR. CRISTIAN SORUCO GOMEZ JEFE DE LA UNIDAD DE VECTORES SEDE PANDO VISITA EL PROGRAMA ', 'PROGRAMA DE DENGUE, CHIKUNGUÑA, LESMANIACI, SIKA, CHAGAS, MALARIA, CONTROL DE VECTORES', '', 54, 2, 45, 1),
(396, 1627590999, 1626307200, 'El ex ministro de relaciones exteriores afirma que en la OEA se instruyó inventar un informe sobre las elecciones presidenciales del pasado octubre de 2019', 'Diego Pari informa que el secretario de la OEA Luis Almagro instruyó en noviembre del 2019 a sus subalternos inventar un informe rápido sobre las elecciones presidenciales de octubre, en dicho informe se asegura que venía un golpe de estado al país de Bolivia', 'https://m.facebook.com/radio.global.sucre/', 36, 2, 12, 1),
(397, 1627591085, 1627344000, 'HOY HABLAREMOS DE AUTONOMIA UNIVERSITARIA CON LA LIC. MAURA RIVERA DIRECTORA DE LA CARRERA DE ENFERMERIA', 'Es la administración de componentes políticos, académicos que se lo hace de manera autónoma', '', 54, 2, 45, 1),
(398, 1627591885, 1626652800, 'Denuncias de presentes delitos de orden sexual en el tribunal constitucional del estado', 'Denuncias de presentes delitos de orden sexual que cometieron funcionarios en el tribunal constitucional del estado, se realizan investigaciones por parte de una comisión específica en la cámara de diputados, concretamente el comité de ministerio público de la cámara de diputados', 'https://m.facebook.com/radio.global.sucre/', 36, 2, 12, 1),
(399, 1627592462, 1626825600, 'Asambleísta departamental propone el redespliegue de diputados en forma de protesta hacia Luis Arce Catacora', 'Asambleísta departamental propone el redespliegue de diputados y senadores como forma de protesta contra Luis Arce Catacora por no presentarse en los actos conmemorativos del 6 de agosto en la ciudad de Sucre', 'https://m.facebook.com/radio.global.sucre/', 36, 2, 12, 1),
(400, 1627597542, 1627430400, 'Recuperan $ 820.000 de la irregular de gases lacrimogenos con sobreprecios en 2020.', 'Luego de gestiones ante la justicia y en el marco de la investigación por la compra con sobreprecios de $ 2,3 millones en gases lacrimogenos durante el gobierno de Jeanine Añez, fueron recuperados $ 820.000 informe del ministro de gobierno Eduardo del Castillo. ', 'http://erbol.com.bo/seguridad/recuperan-us-820000-de-la-compra-irregular-de-gases-lacrim%C3%B3genos-con-sobreprecio-en-2020', 51, 2, 57, 1),
(401, 1627599445, 1627516800, 'Lucas Vazquez Villamor y José Antonio Quiroga declararán', '						Luis Vazquez y Jose Villamor seran citados a declarar en el caso golpe de estado					', '', 19, 2, 21, 1),
(402, 1627601080, 1627516800, 'Ministerio de Desarrollo Rural y Tierras ofrece créditos blandos a pequeños y medianos productores en Santa Cruz, por las consecuencias del clima.', 'Específicamente en la zona de la Chiquitanía; y por consecuencia de la alternancia entre sequías y heladas, es que Remy Gonzales, el titular de dicho ministerio, ofreció los créditos blandos a los pequeños y medianos productores de la zona, sustentado por la información que brindaron alcaldes de las zonas afectadas.', '', 43, 2, 46, 1),
(403, 1627602392, 1627516800, 'La gobernación del Beni señala que costó 49.000 bs habilitar una plataforma en la hidrovía Ichilo-Mamoré.', 'Concretamente el secretario de obras públicas de la gobernación del Beni, señala además del costo, que el objetivo de esta plataforma, sería facilitar el transporte de combustible, hacia Riberalta, Guayaramerín y Pando.', '', 43, 2, 46, 1),
(404, 1627604390, 1627344000, 'No hay noticia', 'No hay noticia sobre el tema', 'No hay noticias sobre los temas', 49, 1, 28, 1),
(405, 1627606368, 1627171200, 'Gobierno prevé invertir Bs 1.100 millones en la instalación de plantas industriales', 'El ministro de Desarrollo Productivo y Economía Plural, Néstor Huanca, que el Gobierno nacional prevé invertir más de 1.100 millones de bolivianos en la instalación de plantas de industrialización en el país, cuyo estudio será ejecutado este año con 29 millones de bolivianos. La implementación de industrias química básica, se la aplicara en Oruro, cárnica en Beni y de productos del Chacho chuquisaqueño.   ', '', 32, 2, 9, 1),
(406, 1627606922, 1627257600, 'Luis Fernando Camacho será citado para declarar por el caso Golpe de Estado', 'El Fiscal General del Estado, Juan Lanchipa, aseguró que el excívico y gobernador de Santa Cruz, Luis Fernando Camacho, será citado para declarar por el caso Golpe de Estado, puesto que las investigaciones lo señalan como el principal gestor del hecho ocurrido en 2019. ', 'http://www.boliviatv.bo/principal/', 32, 2, 9, 1),
(407, 1627607525, 1627344000, 'Fiscalía rechaza manipulación de la derecha sobre resultados de investigación electoral de 2019', 'El secretario general de la fiscalía del estado, rechazo la manipulación que la derecha trama contra los resultados de las elecciones de 2019. Desestimó los intentos de la derecha boliviana por desacreditar el proceso que demostró la inexistencia de fraude en las referidas elecciones.', 'http://www.boliviatv.bo/principal/tvenvivo71.php', 32, 2, 9, 1),
(408, 1627607572, 1627430400, 'Fiscalía rechaza manipulación de la derecha sobre resultados de investigación electoral de 2019', 'El secretario general de la fiscalía del estado, rechazo la manipulación que la derecha trama contra los resultados de las elecciones de 2019. Desestimó los intentos de la derecha boliviana por desacreditar el proceso que demostró la inexistencia de fraude en las referidas elecciones.', 'http://www.boliviatv.bo/principal/tvenvivo71.php', 32, 2, 9, 1),
(409, 1627608251, 1627516800, 'DIÁLOGO SOBRE CONFLICTOS ENTRE ORURO Y POTOSÍ ENTRÓ EN CUARTO INTERMEDIO', '						Durante el desarrollo de la reunión  entre las gobernaciones de Oruro y Potosí llegaron, a acuerdos y conclusiones con varios puntos, la misma no fue firmada por ninguna de las partes solicitando un cuarto intermedio,  esto  con el propósito de que estas conclusiones puedan ser socializadas con las instituciones y organizaciones del departamento de Oruro ya que aún se tiene la defensa férrea del territorio 					', '', 39, 2, 30, 1),
(410, 1627608910, 1627430400, 'Conade anuncia movilizaciones el 6 de agosto y advierte un “golpe de Estado” a favor de Evo', 'El Comité Nacional de Defensa de la Democracia después de que la fiscalía cerrará el caso Fraude, anuncio movilizaciones para el 6 de agosto por lo que se presume que hubo un \"golpe de Estado \" a favor de Evo Morales.', 'https://correodelsur.com/politica/20210728_conade-anuncia-movilizaciones-el-6-de-agosto-y-advierte-un-golpe-de-estado-a-favor-de-evo.html', 11, 2, 47, 1),
(411, 1627609034, 1627516800, 'Convenio Interinstitucional entre la Universidad Amazónica de Pando  y la Caja Nacional de Salud', 'La universidad Amazónica de pando el día de hoy firma convenio con la caja nacional de salud.  Con el fin de que estos puedan coadyuva en el trabajo así mismo implementado sus prácticas como internado rotatorio.     En este convenio  están incluidas las carreras de Odontólogia, enfermería  y Medicina... ', 'https://fb.watch/733Rdvpuig/', 28, 2, 53, 1),
(412, 1627609664, 1627516800, 'Peritaje: Pumari apunta al MAS de “armar toda una tramoya para desviar el fraude”', 'El ex Líder cívico Marco Antonio Pumarí expresó que el que el caso Fraude se haya cerrado fue por las \"ambiciones políticas de Evo Morales\" señalando también que todo este tiempo el gobierno hizo una \"tramoya\" para curar o deshacerse del fraude electoral ', 'https://correodelsur.com/politica/20210729_peritaje-pumari-apunta-al-mas-de-armar-toda-una-tramoya-para-desviar-el-fraude.html', 11, 2, 47, 1),
(413, 1627609876, 1627344000, 'Fiscalía cierra caso fraude electoral luego de la pericia que identifica “negligencia” pero no “manipulación”', 'Luego de recibir el dictamen de una pericia informática que detectó “negligencia”, pero no “manipulación” en los servidores informáticos del cómputo electoral de las Elecciones Generales de 2019Fiscalía informó este martes que solicitó la conclusión del caso fraude electoral, liberando de culpa a los implicados.', 'https://lapatria.bo/2021/07/27/fiscalia-cierra-caso-fraude-electoral-luego-de-la-pericia-que-identifica-negligencia-pero-no-manipulacion/', 15, 2, 48, 1),
(414, 1627610148, 1627516800, 'Asambleístas mujeres profundizan conocimiento en gestión legislativa', 'Mujeres asambleísta de Oruro, participaron de la primera jornada del taller de capacitación denominado “Proceso de Fortalecimiento de Capacidades sobre Gestión Legislativa con Perspectiva de Género”', 'https://impresa.lapatria.bo/noticia/1040771/asambleistas-mujeres-profundizan-conocimiento-en-gestion-legislativa#articulo', 15, 2, 23, 1),
(415, 1627610584, 1626393600, 'Fiscalización al proyecto del hospital de Lajastambo', 'El Ing. Wilmar Aguirre, presidente de comité cívico, indica la realización de fiscalización al proyecto de construcción del hospital de 3er nivel de Lajastambo de la ciudad de Sucre, en la cual se evidenció que existe un avance y se encuentra en la etapa final.', 'https://www.facebook.com/TvSucreUSFX/videos/622845209119901', 20, 2, 54, 1),
(416, 1627610655, 1626393600, 'Ministerio de Salud invierte en salud para Chuquisaca', 'El Ing. Wilmar Aguirre, presidente de comité cívico informa que de acuerdo al Ministerio de Salud comienza con adjudicación para el hospital de Monteagudo  para la región del Chaco y para Culpina, con una inversión aproximada de 17 millones de dólares y 35 millones para adquisición de equipamiento ', 'https://www.facebook.com/TvSucreUSFX/videos/622845209119901', 20, 2, 54, 1),
(417, 1627610715, 1627516800, 'rategia contra el lavado de dinero, pero hay observaciones sobre el respeto a la privacidad', 'La nueva ley pasó al Ejecutivo para su promulgación; tiene siete artículos y un anexo de 53 páginas que establece un plan de trabajo con nuevas facultades a la UIF, que podrá ejercer más control sobre las finanzas personales', 'https://eldeber.com.bo/pais/legislativo-aprobo-la-estrategia-contra-el-lavado-de-dinero-pero-hay-observaciones-sobre-el-respeto-_241139?utm_medium=Soc', 17, 2, 16, 1),
(418, 1627610735, 1626393600, 'Fiscal General del Estado y Fundación Construir  en proyecto de capacitación a fiscales ', 'El Fiscal General del Estado Juan Lanchipa y la Directora Ejecutiva de la fundación construir Carmen Saavedra suscribieron un convenio s de cooperación institucional, con el objetivo de desarrollar capacitación en temas de licitación oral, violencia de género, trata y tráfico de personas y corrupción ', 'https://www.facebook.com/TvSucreUSFX/videos/622845209119901', 20, 2, 54, 1),
(419, 1627610895, 1627516800, 'Cívicos cruceños presentan recurso de impugnación contra el cierre del caso fraude electoral', 'El Comité pro Santa Cruz presentó este viernes un recurso de impugnación contra el cierre y sobreseimiento del caso fraude electoral, porque la Fiscalía obró de manera unilateral, violó el debido proceso, el derecho a la igualdad de las partes y a la legítima defensa, además desconoció el procedimiento para la elaboración de una pericia.', 'https://www.lostiempos.com/actualidad/pais/20210729/civicos-crucenos-presentan-recurso-impugnacion-contra-cierre-del-caso', 12, 2, 44, 1),
(420, 1627610954, 1627257600, 'La asamblea legislativa plurinacional de Bolivia conforman comisiones de investigación en las que se presupuestaron alrededor de tres millones de bolivianos de bolivianos', 'En el gobierno de Evo Morales y Jeanine Añez la asamblea legislativa plurinacional de Bolivia conformo comisiones de investigación para 10 casos ya que dichas entidades dieron informes favorables al MAS en tres casos se presume que el dinero presupuestado para las comisiones fue de tres millones de bolivianos se investigó casos de terrorismo, privatización y capitalización', 'https://m.facebook.com/radio.global.sucre/', 36, 2, 12, 1),
(421, 1627610972, 1627516800, 'Fiscalía admite denuncia contra Quelca y Tarifa por el caso «tráfico de exámenes».', 'El Ministerio Público aceptó la denuncia en contra del ministro de Educación, Adrián Quelca, y del exdirector de Educación Técnica, Agustín Tarifa, denunciados por el presunto tráfico de exámenes para la institucionalización de cargos directivos. La querella fue interpuesta por la viceministra de Educación Superior, Aurea Balderrama.', 'https://www.paginasiete.bo/seguridad/2021/7/29/fiscalia-admite-denuncia-contra-quelca-tarifa-por-el-caso-trafico-de-examenes-302460.html?__twitter_imp', 14, 2, 34, 1),
(422, 1627611169, 1627257600, 'El ex jefe del estado mayor general de las fuerzas armadas fue enviado a la cárcel de San Pedro', 'El ex jefe del estado mayor, general de las fuerzas armadas Pablo Arturo guerra fue enviado a la cárcel de San Pedro por 6 meses por el caso golpe de estado, el general informó que es víctima de la persecución política', 'https://m.facebook.com/radio.global.sucre/', 36, 2, 12, 1),
(423, 1627611634, 1627257600, 'Se sugiere la modificación a la ley 1347 con el fin de que el consejo nacional está conformado por las máximas autoridades ejecutivas', 'Se sugiere la modificación a la ley 1347 (ley del bicentenario), con el fin de que el consejo nacional esté conformado por las máximas autoridades ejecutivas e instituciones nacionales', 'https://m.facebook.com/radio.global.sucre/', 36, 2, 12, 1),
(424, 1627611658, 1627516800, 'Senador del MAS evita discutir con Barrientos porque «es mujer».', 'El senador del Movimiento Al Socialismo (MAS) Hilarión Padilla  en una sesión en el pleno del Senado dijo a su colega y jefa de la bancada de Comunidad Ciudadana (CC) Andrea Barrientos que no iba a discutir con “la hermana, porque es mujer”.  “Hermana senadora creo a mí no me gusta discutir con señoras. Yo respeto a mi mamá”, dijo el senador, para luego rematar en la misma línea: “Entonces, no tengo por qué discutir con la hermana, porque al final es mujer. Yo no voy a pelear”.', 'https://www.paginasiete.bo/nacional/2021/7/29/senador-del-mas-evita-discutir-con-barrientos-porque-es-mujer-video-302437.html', 14, 2, 34, 1),
(425, 1627611941, 1627516800, 'Denuncian al ministro Iván Lima por acoso y violencia.', 'Acoso, amedrentamiento, persecución y violencia de género son los delitos por cuales fue denunciado ayer el ministro de Justicia, Iván Lima, por parte de Dolka Gómez,  consejera de la Magistratura. En la acusación también figura el viceministro César Siles. Desde ese despacho ministerial rechazaron los extremos.   “Denuncio acoso, amedrentamiento, persecución y violencia de género del ministro de Justicia, Iván Lima, y de su viceministro, César Siles”, señaló Gómez.', 'https://www.paginasiete.bo/seguridad/2021/7/29/denuncian-al-ministro-ivan-lima-por-acoso-violencia-302390.html?__twitter_impression=true', 14, 2, 34, 1),
(426, 1627611941, 1627344000, 'Ex viceministro del tesoro y crédito público fue beneficiado por la detención domiciliaria', 'Ex viceministro del tesoro y crédito público fue beneficiado por la detención domiciliaria era investigado por el crédito que Bolivia solicitó al fondo monetario internacional durante el gobierno transitorio, se estima que el crédito solicitado fue alrededor de tres millones de bolivianos', 'https://m.facebook.com/radio.global.sucre/', 36, 2, 12, 1),
(427, 1627612096, 1627516800, 'Derechos humanos - trata y tráfico ', 'Derechos humanos con otras Instituciones preocupados por la situación de nuestro departamento van a realizar capacitación para socializar la ley contra la trata y tráfico de personas ', 'https://www.facebook.com/spccanal15/videos/4369284249803833/', 27, 2, 20, 1),
(428, 1627612241, 1627516800, 'Procurador: Quienes denunciaron \"fraude monumental\" ahora deben rendir cuentas', 'Wilfredo Chávez, Procurador General de Estado y abogado de Evo Morales, afirmó que quieres impulsaron la idea de \"fraude monumental\" deben afrontar cargos en la justicia porque esto generó la ruptura del orden constitucional, la renuncia de Evo Morales, las \"masacres\" de Senkata y Sacaba, y los actos de corrupción en el gobierno de Jeanine Añez.', 'https://www.lostiempos.com/actualidad/pais/20210729/procurador-quienes-denunciaron-fraude-monumental-ahora-deben-rendir-cuentas', 12, 2, 44, 1),
(429, 1627612264, 1627430400, 'El ex vocal Alfonso Mamani, habla sobre el sobre seguimiento para el y sus ex colegas del tribunal supremo electoral', 'El ex vocal Alfonso mamani quien dirigió las elecciones de octubre del 2019 habla sobre él sobre seguimiento para él y sus colegas el tribunal supremo electoral', 'https://m.facebook.com/radio.global.sucre/', 36, 1, 12, 1),
(430, 1627612312, 1627516800, 'Exvocales electorales exigen resarcimiento de daños tras cierre del caso \"fraude electoral\"', 'Las exautoridades electorales nacionales y departamentales “sobreseídos” conformaron una asociación con el fin de buscar un resarcimiento de daños por la “persecución política” de la que fueron objeto tras los conflictos del 2019, debido a que la Fiscalía pidió a la autoridad jurisdiccional el cierre del caso “fraude electoral”.', 'https://www.noticiasfides.com/nacional/politica/exvocales-electorales-exigen-resarcimiento-de-danos-tras-cierre-del-caso-34fraude-electoral-34-410919', 35, 2, 34, 1),
(431, 1627612331, 1627516800, 'Exvocales electorales sobreseídos en el caso fraude conforman asociación y piden resarcimiento', 'Exvocales del Tribunal Supremo Electoral (TSE) y de los tribunales departamentales, además de otros funcionarios, que fueron sobreseídos tras el cierre del caso fraude electoral, conformaron una asociación para pedir un resarcimiento de daños por lo que consideran fue una “persecución”.', 'https://www.lostiempos.com/actualidad/pais/20210729/exvocales-electorales-sobreseidos-caso-fraude-conforman-asociacion-piden', 12, 2, 44, 1),
(432, 1627612457, 1627516800, 'Plataformas irán a Sucre para exigir que se reabra el caso fraude electoral', 'Representantes de plataformas ciudadanas del 21F anunciaron su decisión de ir a la ciudad de Sucre, sede de la Fiscalía General, para exigir que se reabra el caso fraude electoral, que fue cerrado debido a un informe pericial que detectó negligencia en el sistema informático de las elecciones 2019, pero no manipulación.', 'https://www.lostiempos.com/actualidad/pais/20210729/plataformas-iran-sucre-exigir-que-se-reabra-caso-fraude-electoral', 12, 2, 44, 1),
(433, 1627612569, 1627516800, 'Senadora presenta denuncia ante la comisión de Ética.', 'La senadora Andrea BSahonero informa que presentó una denuncia ante la Comisión de Ética contra el legislador del MAS, Hilarión Padilla, \"para sentar precedente y que estas actitudes nunca más se repitan\". \"Es inaceptable que tengamos representantes machistas\".', '', 35, 2, 34, 1),
(434, 1627612715, 1627430400, 'Ya en el área de seguridad informática asegurando que no hubo manipulación de resultados electorales', 'El fiscal general del estado Juan Lanchipa presenta las conclusiones de la pericia en el área de seguridad informática y administración de redes sobre la integridad informática de los resultados de las elecciones del 20 de octubre del 2019 asegurando que no hubo manipulación de resultados electorales', 'https://m.facebook.com/radio.global.sucre/', 36, 1, 12, 1),
(435, 1627612843, 1627430400, 'El capitán José Vargas es declarado en rebeldía dentro del proceso disciplinario por el caso del motín policial en el año 2019', 'El capitán José Vargas es declarado en rebeldía dentro del proceso disciplinario por el caso del motín policial debido a que no se presentó en la audiencia programada para el día martes no fue al juicio porque se encontró arrestada su ausencia fue justificada', 'https://m.facebook.com/radio.global.sucre/', 36, 2, 12, 1),
(436, 1627612897, 1627516800, ' Plataformas del 21F exigiran la reapertura del caso Fraude Electoral.', 'Plataformas del 21F anuncian que viajarán a Sucre para exigir a la Fiscalía la reapertura del caso Fraude Electoral. Afirman que abrirán un registro de pruebas y declaraciones de personas que puedan ser testigos en este caso. ', '', 35, 2, 34, 1),
(437, 1627613061, 1627430400, 'La parlamentaria súper estatal de la alianza cc Alexa Rodríguez denuncia a sus colegas del movimiento al socialismo', 'La parlamentaria súper estatal de la alianza cc Álex Rodríguez denuncia que sus colegas del movimiento al socialismo realizaron viajes de turismo a ciudades de Colombia en una rueda de prensa afirmó los viáticos por persona sobrepasan los 1500 bolivianos por día', 'https://m.facebook.com/radio.global.sucre/', 36, 2, 12, 1),
(438, 1627613125, 1627516800, 'Analista cuestiona que el TSE permita ser avasallado por el Ejecutivo.', 'El TSE aún no se pronunció sobre el cambio de vocales en los TED que realizó el presidente Luis Arce y tampoco sobre la situación de los vocales cesados en Beni. ', '', 35, 1, 34, 1),
(439, 1627613433, 1627430400, 'La fiscalía cierra el caso es del fraude electoral del año 2019', 'La fiscalía cierra el caso fraude electoral tras pericia en la que se ha identificado en emergencia pero no manipulación de resultados', 'https://m.facebook.com/radio.global.sucre/', 36, 1, 12, 1),
(440, 1627613712, 1627430400, 'Se da a conocer que cayó la licitación del lote del componente que tiene mayor cantidad de recursos para invertir en el marco del proyecto Sucre tres', 'Se da a conocer que cayó la licitación del lote del componente que tiene mayor cantidad de recursos para invertir en el marco del proyecto sucre tres proyecto de agua por 260 millones de bolivianos debes reponerse la licitación aseguró el viceministro de agua', 'https://m.facebook.com/radio.global.sucre/', 36, 2, 12, 1),
(441, 1627613719, 1627516800, 'Fiscalía investiga presunta desviación de combustible de las FFAA', 'El secretario general de la Fiscalía General del Estado, Edwin Quispe, informó este jueves que el Ministerio Público lleva adelante la investigación sobre una presunta desvió de combustible que realizaba la Séptima División de las Fuerzas Armadas (FFAA) en Cochabamba, en beneficio de los integrantes del grupo para militar  la Resistencia Juvenil Cochala (RJC). “(Una denuncia en audio) nos habla del desvió de combustible a favor de la Resistencia Juvenil Cochala, es decir que desde las Fuerzas Armadas, desde la Séptima División se estaba solventando el funcionamiento de la Resistencia Juvenil Cochala”, indicó la autoridad en conferencia de prensa.', '', 23, 2, 34, 1),
(442, 1627613958, 1627516800, 'Suman 7 informes que demuestran la inexistencia del fraude en 2019', 'Ruben Gutierrez senador por el departamento de Oruro se manifestó a favor del informe de la Universidad de Salamanca con el que suman 7 informes en contra de la narrativa de del fraude.', 'https://www.youtube.com/watch?v=zsZSHM7NgbQ', 32, 2, 43, 1),
(443, 1627613967, 1627516800, 'El portavoz del presidente Jorge Richtee acusó a sectores conservadores radicales de buscar impunidad para quienes participaron del golpe de estado', 'El portavoz del presidente Jorge Richter acusó a sectores conservadores radicales de buscar impunidad para quienes participaron del golpe de estado al atacar al reporte de Salamanca que descartó irregularidades en el cómputo oficial de las elecciones del 2019', 'https://m.facebook.com/radio.global.sucre/', 36, 1, 12, 1),
(444, 1627614090, 1627516800, 'El ex comandante de la armada almirante Moisés Orlando Mejía fue enviado a la cárcel de San Pedro', 'El ex comandante de la armada almirante Moisés Orlando Mejía fue enviado a la cárcel de San Pedro en la paz por los hechos de violencia y muerte ocurridos en Senkata en el año 2019', 'https://m.facebook.com/radio.global.sucre/', 36, 2, 12, 1),
(445, 1627614341, 1627516800, 'Cambia la imagen del concejo municipal luego del fallo de la sala constitucional del tribunal departamental de justicia', 'Cambia la imagen del concejo municipal luego del fallo de la sala constitucional del tribunal departamental de justicia el concejal del movimiento al socialismo, Oscar Sandy, tomó la posesión de la presidencia del ente deliberante', 'https://m.facebook.com/radio.global.sucre/', 36, 2, 12, 1),
(446, 1627615043, 1627516800, 'Comisión de Asambleístas, se reunió con los 3 caciques de los pueblos indígenas que componen el TCO Monte Verde, en donde encontraron efectivamente asentamientos ilegales en la zona.', '																																										La comisión de Asambleístas, en conjunto con otras autoridades pudo comprobar lo denunciado por los habitantes de los pueblos indígenas, en materia de asentamientos ilegales; dichas autoridades de la zona, esperan que la comisión de asambleístas anule las normativas que permiten quemas en la zona y que se limite el ingreso de los asentamientos ilegales.																																			', '', 43, 2, 46, 1),
(447, 1627615725, 1627516800, 'El caso Fraude no fue cerrado', 'Denunciantes del caso fraude electoral tienen 5 día para impugnar el sobreseimiento a los exvocales electorales, lo que se hizo fue presentar un procedimiento conclusivo amparado en el Art. 323 del procedimiento penal, es el fiscal departamental de La Paz, que tiene 10 días, para resolver esta impugnación y una vez que se emita una resolución puede ser de ratificación u ordenara, a los fiscales, que emita una acusación. Eso señala el Fiscal General', '', 24, 2, 29, 1),
(448, 1627615837, 1627516800, 'Exvocales forman asociación de víctimas', 'Exigen que se haga justicia con la reparación integral de los daños causados en los procesos injustos, consideran que sufrieron persecución política, señalan que existen pruebas de que las elecciones del 2019 fueron transparentes.', '', 24, 2, 29, 1),
(449, 1627615952, 1627516800, 'Exigirán re apertura del caso fraude', 'Las plataformas del 21F irán a Sucre la próxima semana para exigir al fiscal general del estado que deje sin efecto la determinación de cerrar el caso fraude, sino lo hace comenzarán con movilizaciones en todo el país, en el MAS ven afanes de sedición en estas movilizaciones', '', 24, 2, 29, 1),
(450, 1627616185, 1627516800, '\"Quieren desviar el Fraude Electoral\"', 'El ex dirigente cívico Marco Antonio Pumari, asegura que el gobierno nacional quiere desviar el tema del fraude electoral y generar persecución política.  ', '', 24, 2, 29, 1),
(451, 1627616528, 1627344000, 'Universidad de Salamanca concluye que no hubo manipulación del TREP ni del cómputo electoral en 2019', 'Es “altamente improbable” la “manipulación de los resultados, imágenes de actas y registros de cada acción de manera coordinada”, dice un informe de la universidad española.', 'https://www.la-razon.com/nacional/2021/07/27/universidad-de-salamanca-concluye-que-no-hubo-manipulacion-del-trep-que-en-2019-desato-la-crisis/', 53, 1, 29, 1),
(452, 1627616686, 1627516800, 'Exvocales forman asociación para pedir resarcimiento por ‘persecución política’ de 2019', 'Las exautoridades nacionales y departamentales conformaron una asociación de víctimas de \"persecución política\", anunciaron que buscarán el resarcimiento por el daño ocasionado en su contra por denuncias de \"fraude\" en 2019, para ello comenzarán a trabajar y recurrir a todas las instancias correspondientes.  ', 'https://www.la-razon.com/nacional/2021/07/29/exvocales-electorales-pediran-resarcimiento-por-la-persecucion-politica-de-2019-y-2020/', 53, 2, 29, 1),
(453, 1627616814, 1627516800, 'Quiroga y Vásquez declararán en la Fiscalía este viernes por el caso Golpe de Estado', 'José Antonio Quiroga, excoordinador político de Comunidad Ciudadana (CC) de Carlos Mesa, y Luis Vásquez Villamor, exasesor de Jorge Quiroga en la crisis de 2019, declararán el viernes ante el Ministerio Público por el caso Golpe de Estado, en calidad de testigos, según anunció la Fiscalía General.', 'https://www.la-razon.com/nacional/2021/07/29/quiroga-y-vasquez-declararan-en-la-fiscalia-este-viernes-por-el-caso-golpe-de-estado/', 53, 2, 29, 1),
(454, 1627616967, 1627516800, 'Richter: Hay intención de generar ‘tensión’ por informe de la ‘U’ de Salamanca para lograr impunidad', 'El portavoz presidencial Jorge Richter acusó a sectores “conservadores más radicales” de buscar impunidad para quienes participaron del “golpe de Estado” al atacar el informe de la Universidad de Salamanca que descartó irregularidades en el cómputo oficial de las elecciones de 2019. La Fiscalía hizo público el Informe de Deep Tech Lab de BISITE a lo que la oposición cuestionó que dicho informe y recalcaron el informe realizado por la OEA. Richter indica que el estudio de la Universidad de Salamanca coincide con otros estudios.', 'https://www.la-razon.com/nacional/2021/07/28/richter-hay-intencion-de-generar-tension-por-informe-de-salamanca-para-lograr-impunidad/', 53, 2, 29, 1),
(455, 1627617166, 1627516800, 'Congreso de Estados Unidos presupuesta investigación sobre el rol de la OEA en los comicios de 2019 en Bolivia', 'La Cámara de Representantes de Estados Unidos incorporó en el presupuesto del año fiscal 2022 la propuesta de investigación del rol que tuvo la Organización de Estados Americanos (OEA) en las elecciones bolivianas de octubre de 2019, informó este jueves en su sitio web la congresista Jan Schakowsky. El proyecto de investigación implica obtener respuestas a preguntas sobre el caso de fraude en Bolivia en las elecciones de 2019.', 'https://www.la-razon.com/nacional/2021/07/29/congreso-de-eeuu-presupuesta-investigacion-del-rol-de-la-oea-en-las-elecciones-de-2019-en-bolivia/', 53, 2, 29, 1),
(456, 1627617477, 1627516800, 'Fiscalía indaga audio que denuncia desvío de combustible de coches militares para la RJC', 'Indicó que el denunciante se identificó plenamente en el audio y en las próximas horas presentará su declaración informativa, en primera instancia en calidad de testigo.', 'https://www.la-razon.com/nacional/2021/07/29/fiscalia-indaga-audio-que-denuncia-desvio-de-combustible-de-vehiculos-militares-para-la-rjc/', 53, 2, 29, 1),
(457, 1627617602, 1627516800, 'Novillo ratifica ausencia de registro de material antidisturbios argentino en archivos militares', 'El ministro de Defensa, Edmundo Novillo, reveló que el “material bélico” por el que el comandante de la Fuerza Aérea Boliviana (FAB) en 2019, Jorge Terceros, agradeció a la embajada argentina no tiene registro de recepción formal en las Fuerzas Armadas, sin embargo se cuenta con los sellos correspondientes, tampoco existe un registro de la entrega del material a la Policía. Toda la documentación que se está recopilando fue derivado al Ministerio de Justicia, para la investigación correspondiente.', 'https://www.la-razon.com/nacional/2021/07/29/novillo-ratifica-ausencia-de-registro-de-material-antidisturbios-argentino-en-archivos-militares/', 53, 2, 29, 1),
(458, 1627617699, 1627516800, 'CC afirman que no existe temor ante los anuncios de persecución por el cierre del caso fraude.', 'El jefe de la bancada de la CC, en la cámara de diputados \"Carlos Alarcón\", hizo referencia a las posibles acciones judiciales en contra de quienes sostuvieron el caso del fraude electoral del 2019, en función de la fiscalía de cerrar el caso. Se preparará una acción judical ante una figura que se denomina \"denegación de justicia\", cuestionando a las declaraciones de Lanchipa.', '', 38, 2, 29, 1),
(459, 1627617846, 1627516800, 'Senador masista informa que la cámara de representantes de EEUU aprobó investigar el rol de la OEA en el proceso electoral del 2019 en Bolivia', 'Luis Adolfo Flores dijo que, por primera vez, se asume esta decisión en EEUU y se prevé que hayan más elementos en torno a este tema, además afirmó que no existe persecución, las autoridades judiciales deberán aplicar justicia en este caso. También indica que las exautoridades que piden resarcimiento de daños por el caso fraude tienen todo el derecho para solicitar dicho resarcimiento. ', '', 38, 2, 29, 1),
(460, 1627618474, 1626912000, 'PARLAMENTARIOS DE OPOSICIÓN TEMEN QUE LA REDISTRIBUCIÓN NO SEA EQUILIBRADA PARA LAS REGIONES', 'OPOSICIÓN SUGIERE REVISAR LA NORMATIVA PARA LA REDISTRIBUCIÓN DE RECURSOS EN LAS REGIONES ASÍ COMO EN LOS ESCAÑOS DEBIDO A QUE ALGUNOS DEPARTAMENTOS SE VERÍAN DESFAVORECIDOS POR EL DECRECIMIENTO POBLACIONAL QUE DEMOSTRARÍA EL CENSO 2022, EL MAS INDICA QUE SI ES EN FAVOR DEL PUEBLO BOLIVIANO ENTONCES APOYARÍAN LA PROPUESTA', '', 24, 3, 29, 1),
(461, 1627618568, 1626912000, 'AUTORIDADES DE CHUQUISACA TEMEN QUE CENSO NO BENEFICIE A LA REGIÓN', 'AUTORIDADES DEL DEPARTAMENTO DE CHUQUISACA CONSIDERAN QUE EL CENSO PODRÍA SER CONTRAPRODUCENTE EN LA DISTRIBUCIÓN DE ESCAÑOS, EN GRAN PROBLEMA QUE A VECES NO REFLEJA LA REALIDAD PORQUE DE LOS MUNICIPIOS GRANDES MIGRAN A SUS MUNICIPIOS PEQUEÑOS Y POR ESO LA COPARTICIPACIÓN LLEGA CON POCO DINERO, ENTONCES NO SE TIENE PARA SER OBRAS ENTONCES SE DEBEN CENSAR EN DONDE REALMENTE RADICAN', '', 24, 3, 29, 1),
(462, 1627618662, 1626912000, 'SEGÚN EL ALCALDE IVAN ÁRIAS EL CENSO BENEFICIARÁ EN DISTRIBUCIÓN DE RECURSOS', 'EL ALCALDE DE LA PAZ SE VERÍA BENEFICIOSO PARA EL MUNICIPIO YA QUE LA CANTIDAD SE HABITANTES SE HABRÍA INCREMENTADO A CONPARACIÓN DEL 2012, DESTACA QUE EL INE GARANTICE RESULTADOS CONFIABLES.', '', 24, 3, 29, 1),
(463, 1627623686, 1627430400, 'Cruz responde a denuncias de Arce y niega irregularidades en compra de planta de oxígeno', 'El exministro de Salud ahora secretario de Salud Aníbal Cruz, respondió a las denuncias del diputado Hector Arce, aclarando que el proceso de licitación de la planta de oxígeno criogénico del hospital del Norte es lícito y niega que hubo irregularidades en el momento de la compra, para ello se refirió a las certificaciones de las empresas con la documentación que está propiamente en registro.', 'https://www.opinion.com.bo/articulo/cochabamba/cruz-responde-denuncias-arce-afirma-que-hubo-irregularidades-compra-planta-oxigeno/20210728201752829004', 13, 2, 39, 1),
(464, 1627625363, 1627430400, 'Cox: \"Quienes han utilizado el concepto de ‘fraude’ conllevan responsabilidades por haber generado zozobra\"', 'Después que la Fiscalía cerró el caso fraude electoral, el viceministro de Régimen Interior, Nelson Cox, afirmó que deben ser responsables aquellos que generaron zozobra en el país en ello señaló que quienes refutan el estudio del caso fraude, deben de realizarlo dentro del procedimiento, pero recalcó que al momento de utilizar el pretexto de fraude se generó inseguridad en la población y aseveró que la Organización de Estados Americanos (OEA), Unión Europea (UE) y los personajes políticos bolivianos deben de asumir la responsabilidad de haber provocado el caos. ', 'https://www.opinion.com.bo/articulo/pais/cox-quienes-han-utilizado-concepto-fraude-conllevan-responsabilidades-haber-generado-zozobra/2021072816214382', 13, 2, 39, 1),
(465, 1627626586, 1627430400, 'Goni presenta recurso en EEUU en el proceso por octubre de 2003 y espera ser exonerado', 'La defensa de Gonzalo Sanches de Lozada presentó un recurso ante la Corte de Apelaciones del 11vo Distrito de Apelaciones de Florida en Estados Unidos, por los fallecimientos registrados en los conflictos de 2003, el recurso es presentado después que el juez James Cohn, del estado de Florida, determinó denegar la moción que fue presentada en abril por Sanches de Lozada y Carlos Berzain,  en el comunicado reciente se afirma que la acusación en su contra no tiene sustento y por lo tanto no existe base para hacerlo responsable al expresidente por aquellas muertes y también se anuncia que el expresidente será exonerado cuando este caso llegue a su fin. ', 'https://www.opinion.com.bo/articulo/pais/goni-presenta-recurso-eeuu-proceso-octubre-2003-espera-ser-exonerado/20210728184852828993.html', 13, 2, 39, 1),
(466, 1627626691, 1627344000, 'Jefe policial argentino es imputado.', 'Debido al ingreso de material antidisturbios de Argentina a Bolivia el 2019, jefe policial Adolfo Caribas es imputado en Argentina, por viabilizar dicho armamento.  ', 'https://www.youtube.com/watch?v=Db2zIsKkeLo&ab_channel=NoticiasBolivisi%C3%B3n', 22, 2, 31, 1),
(467, 1627627360, 1627430400, 'Se reúnen presidentes de Bolivia y Perú.', '						Arce reconoce al gobierno de Perú, afirma que trabajaran juntos  y pone a Bolivia a disposición de Perú. 					', 'https://www.redbolivision.tv.bo/video/noticiero-al-dia-programa-del-28-de-julio-de-2021/', 22, 2, 31, 1),
(468, 1627627693, 1627516800, 'Ministro presenta carta de agradecimiento a la prensa. ', 'El ministro de defensa presenta una carta de agradecimiento por el material antidisturbios durante los conflictos del año 2019, enviado desde Argentina a Bolivia.', 'https://www.redbolivision.tv.bo/video/noticieros-al-dia-programa-del-29-de-julio-del-2021/', 22, 2, 31, 1),
(469, 1627627917, 1627430400, 'Fiscalía informa que pagó 30 mil dólares por la pericia española sobre caso fraude', 'La Fiscalía General de Estado informó que pagaron un equivalente de 30 mil dólares por la pericia realizada por el Grupo de Investigación Deep Tech Lab de BISITE de la Fundación General de la Universidad de Salamanca de España, en el cual se descarto manipulación de datos electorales en las elecciones de 2019, dentro del caso fraude electoral, en la pericia se identificó negligencias en la gestión de servidores informáticos que usó el Tribunal Supremo Electoral, pero no se encontró que se hayan modificado los resultados electorales, por ello la fiscalía cerró el caso, en ese sentido el Secretario General de la Fiscalía, Edwin Quispe dijo que la pericia estuvo a cargo del ingeniero Juan Manuel Corchado. Se descartó que los estudios fueron realizados por universitarios.  ', 'https://www.opinion.com.bo/articulo/pais/fiscalia-informa-que-pago-30-mil-dolares-pericia-espanola-caso-fraude/20210728130429828964.html', 13, 1, 39, 1),
(470, 1627628087, 1627516800, 'Solidaridad para Cuba.', 'Ministra de la presidencia afirma que Bolivia donara a Cuba 20 toneladas de jeringas, alimentos, material de bioseguridad, que  abarca en su totalidad el avión Hércules, debido a que se encuentran en problemas económicos a causa del bloqueo.  ', 'https://www.redbolivision.tv.bo/video/noticieros-al-dia-programa-del-29-de-julio-del-2021/', 22, 2, 31, 1),
(471, 1627629952, 1627603200, 'El presidente Lucho Arce afirmó este jueves, durante el lanzamiento del Plan de Reactivación del Upstream 2021: Nuevas Perspectivas y Oportunidades, que Bolivia tiene un gran potencial petrolero para ', 'El presidente lucho Arce catacora presenta un plan nacional de reactivación con el objetivo de incrementar las reservas y la producción de hidrocarburos.', 'https://www.facebook.com/260485443978322/posts/4972481732778646/', 32, 1, 49, 1),
(475, 1627630338, 1627603200, '  El presidente Lucho Arce afirmó este jueves, durante el lanzamiento del Plan de Reactivación del Upstream 2021: Nuevas Perspectivas y Oportunidades, que Bolivia tiene un gran potencial petrolero par', 'Bolivia presentó este jueves un plan de exploración de hidrocarburos que busca captar capitales del exterior del país y que pretende hallar unos 5 millones de trillones de pies cúbicos (TCF) con una inversión de 1.400 millones de dólares.  La presentación del Plan Nacional de Reactivación del Upstream 2021 se efectuó en la ciudad de Santa Cruz, la mayor del país, con la presencia del presidente boliviano, Luis Arce, y representantes de empresas petroleras.\"El plan tiene el objetivo de lograr un crecimiento económico y social de la mano de la industrialización del país con la generación de excedentes\", remarcó el ministro boliviano de Hidrocarburos', 'https://www.facebook.com/BoliviatvOficial/videos/1954667734716922/ y https://www.facebook.com/260485443978322/posts/4972481732778646/', 32, 2, 49, 1),
(476, 1627648666, 1627516800, 'Evo gastó Bs 1.093 millones en seis aeropuertos poco rentables que el Gobierno no cerrará', 'Los ingresos en el periodo 2014-2017 alcanzaron a Bs 13 millones en las seis terminales construidas en cinco departamentos', 'https://eldeber.com.bo/pais/evo-gasto-bs-1093-millones-en-seis-aeropuertos-poco-rentables-que-el-gobierno-no-cerrara_241145?utm_medium=Social&utm_sour', 17, 2, 16, 1),
(477, 1627652413, 1627516800, 'Israel Alcócer niega acuerdo entre la UCS y el MAS en el Concejo Municipal', 'El presidente del Concejo Municipal cruceño, Israel Alcócer (UCS), negó que exista un acuerdo con el MAS en el legislativo municipal, pero reconoció que se ha buscado consensos, no solo con el partido azul, sino con las otras dos agrupaciones, que son opositoras: C-A y Demócratas.', 'https://eldeber.com.bo/santa-cruz/israel-alcocer-niega-acuerdo-entre-la-ucs-y-el-mas-en-el-concejo-municipal_241030?utm_term=Autofeed&utm_medium=Socia', 17, 2, 16, 1),
(478, 1627655072, 1627603200, 'Caso fraude: responsable del peritaje admite que es la primera vez que hacen una investigación sobre un proceso electoral', 'Corchado sostiene que su equipo encontró más irregularidades que la auditoría de la OEA. Reconoce que solo abordaron el ámbito informático y no la custodia del material usado en los comicios', 'https://eldeber.com.bo/pais/caso-fraude-responsable-del-peritaje-admite-que-es-la-primera-vez-que-hacen-una-investigacion-sobre-_241201?utm_medium=Soc', 17, 1, 16, 1),
(479, 1627657193, 1627603200, 'Autoridades municipales cruceñas presentan norma contra la trata y tráfico de personas', 'En el Día Internacional de la Lucha Contra la Trata y Tráfico de Personas, la Alcaldía cruceña  presentó el proyecto de ley que plantea crear un Sistema de Alerta Temprana para combatir este ilícito.', 'https://eldeber.com.bo/santa-cruz/autoridades-municipales-crucenas-presentan-norma-contra-la-trata-y-trafico-de-personas_241202?utm_medium=Social&utm_', 17, 2, 16, 1),
(480, 1627658950, 1627603200, 'Caso Fraude 2019: Fiscalía depositó el pago por la pericia informática en una cuenta personal', 'La Fiscalía lanzó la convocatoria para la prestación del servicio el 12 de abril de 2021. El 15 del mismo mes, adjudicó el contrato al Deep Tech Lab de Bisite de la Universidad de Salamanca. El comité cívico impugna y convoca a la Asamblea de la Cruceñidad', 'https://eldeber.com.bo/pais/caso-fraude-2019-fiscalia-deposito-el-pago-por-la-pericia-informatica-en-una-cuenta-personal_241172?utm_medium=Social&utm_', 17, 2, 16, 1),
(481, 1627659117, 1627516800, 'Comité convoca a asamblea de la \'cruceñidad\' para el 2 de agosto', 'Se convoca ante el sobreseimiento del caso fraude electoral de 2019 y en defensa de la tierra', 'https://eldeber.com.bo/santa-cruz/comite-convoca-a-asamblea-de-la-crucenidad-para-el-2-de-agosto_241140?utm_medium=Social&utm_source=Facebook#Echobox=', 17, 2, 16, 1),
(482, 1627679484, 1627516800, 'Auditores mostraron las evidencias que tienen hasta el momento sobre la captura de los atracadores que hirieron a un libre cambista y a su hijo en Cochabamba. ', 'Fueron presentados evidencias sobre el caso de la captura de los atracadores que hirieron a un libre cambista y a su hijo en Cochabamba en el cual nos mostraron algunas pertenencias que se encontraron al momento de la captura y con lo que operaban y utilizaban para robar y también objetos robados que estaban en su pertenencia. ', '', 51, 2, 57, 1),
(483, 1627680007, 1627603200, 'PROF. VÍCTOR CUÉLLAR REPRESENTANTE  M.E.N. PANDO  NOS INFORMA SOBRE EL PROYECTO DE LEY  DE DEVOLUCIÓN DE AFPS', 'devolución del aporte de las AFP para trabajadores que aportan según su porcentaje ', 'https://www.facebook.com/universitaria97.9/videos/794628504555980/', 54, 2, 45, 1),
(484, 1627680333, 1626652800, 'Gobierno de Chuquisaca y Secretaria de Desarrollo Social realizan convocatoria para la conformación de comité, niña, niño y adolescente ', 'GADCH a través de la Secretaría de desarrollo social, desarrolló un acto de convocatoria para la conformación del comité niña, niño y adolescente, Elsa Ortega de la secretaría de desarrollo social indica que la gobernación realizara la conformación de acuerdo a los calendarios electorales.', 'https://www.facebook.com/TvSucreUSFX/videos/862026608028588', 20, 2, 54, 1),
(485, 1627680446, 1627603200, 'Diputada de comunidad nacional Maria j. Salazar pode una solicitud ala universidad salamanca sobre como fue elaborado el tema de fraude electoral', 'Diputada de CC Maria j.Salazar pide una auditoria al rector de la unibersidad de salamanca como fue elavorado el tema del fraude electoral', 'Radio frontera', 49, 1, 28, 1),
(486, 1627681804, 1627257600, 'No hay noticia', 'No hay noticia sobre el tema', 'No hay noticias sobre los temas', 49, 2, 28, 1),
(487, 1627683809, 1627603200, 'La CIDOB confirma su participación el 2 de Agosto ', 'La CIDOB participaran de este acto que se realizara el 2 de Agosto en San Julián por que son parte de las culturas y del mismo modo resaltaron que rechazan la convocatoria que realizo el Gobernador de Santa Cruz Luis Fernando Camacho porque solo quiere generar conflicto.', '', 47, 2, 34, 1),
(488, 1627687505, 1627603200, 'Llegan a cuerdo los representantes del movimiento nacional oruro sobre la devolucion de las AFPS', 'Representante del movimiento nacional Oruro Roman Valente que pedia la devolucion de las AFPS llego a un acuerdo con el ministerio de economia donde el proyecto de ley 078/2021 referente a la devolucion parcial de un monto mayor a los 100000 bs deben recojer hasta un aporte parcial de 15000 bs. tambien se eliminara el articulo 8 de la fraccion solidaria.', '', 39, 2, 30, 1),
(489, 1627687850, 1627603200, 'Presentan recurso de impugnación contra sobreseimiento caso “fraude electoral”', 'Se presentó un recurso de impugnación ante el sobreseimiento que han presentado los fiscales de materia respecto al caso “fraude electoral”, esta impugnación debe ser resuelta por el Fiscal Departamental de La Paz”, informó el abogado de los cívicos, Martín Camacho, en conferencia de prensa.', 'https://impresa.lapatria.bo/noticia/1040863/presentan-recurso-de-impugnacion-contra-sobreseimiento-caso-fraude-electoral#articulo', 15, 2, 23, 1),
(490, 1627688010, 1627603200, 'Aprueban Ley Nacional Contra la Legitimación de Ganancias Ilícitas ', 'El pleno de la Cámara de Senadores ayer aprobó “en grande” el proyecto de Ley referido a la Estrategia Nacional Contra la Legitimación de Ganancias Ilícitas y el Financiamiento del Terrorismo. ', 'https://impresa.lapatria.bo/noticia/1040860/aprueban-ley-nacional-contra-la-legitimacion-de-ganancias-ilicitas#articulo', 15, 2, 48, 1),
(491, 1627693373, 1627603200, 'Quiroga y Vásquez coinciden en que en la cita de la UCB no se habló de Áñez sino de la vía de sucesión', 'El jurista Luís Vásquez, al igual que José Antonio Quiroa, en su declaración por el caso \"Golpe de Estado\", indicó que en la reunión del 11 de noviembre en la UCB no se proclamó un nombre sino una vía constitucional de sucesión. Indica que su posición fue que los problemas de la democracia debían enfrentarse con reglas democráticas.', 'https://www.la-razon.com/nacional/2021/07/30/quiroga-y-vasquez-coinciden-en-que-en-la-cita-de-la-ucb-no-se-hablo-de-anez-sino-de-la-via-de-sucesion/', 53, 2, 29, 1),
(492, 1627693521, 1627603200, 'Quiroga dice que en la reunión que participó no se trató quién asumiría la sucesión', 'José Antonio Quiroga confirmó que partició de una reunión previa a la renuncia de Evo Morales (10 de noviembre de 2019), pero no se consideró quien podría asumir la presidencia, solo se anticipó que Morales dejaría la presidencia. ', 'https://www.la-razon.com/nacional/2021/07/30/quiroga-dice-que-en-la-reunion-que-participo-no-se-trato-quien-asumiria-la-sucesion/', 53, 2, 29, 1),
(493, 1627693745, 1627603200, 'Corchado ratifica que en las elecciones de 2019 no hubo manipulación de datos', 'El informe de la Universidad de Salamanca sobre los resultados de las elecciones de 2019 consignó el que emitió entonces la OEA. Incluso encontró más anomalías, que, sin embargo, no tuvieron como consecuencia la manipulación de datos. Juan Manuel Corchado indica que se centraron solo en los datos, después de un largo estudio encontraron muchas cosas que se hacían mal pero esos errores no implican una manipulación de datos; para ello se estudió a todos los datos almacenados en los servidores. El contrato fue firmado por el director de la fundación de la universidad.', 'https://www.la-razon.com/nacional/2021/07/30/corchado-ratifica-que-en-las-elecciones-de-2019-no-hubo-manipulacion-de-datos/', 53, 1, 29, 1),
(494, 1627694000, 1627603200, 'Exvocal Mamani: Nosotros nunca hemos sugerido que se anulen las elecciones de 2019', 'El exvocal del Tribunal Supremo Electoral (TSE) Idelfonso Mamani afirmó este viernes que desde ese órgano nunca se sugirió ninguna anulación de las elecciones generales del 20 de octubre de 2019 porque, en su criterio, fue un proceso desarrollado con “altos estándares de calidad”. Con respecto al porque se anularon las elecciones señaló que fueron consecuencias y hechos posteriores. ', 'https://www.la-razon.com/nacional/2021/07/30/exvocal-mamani-nosotros-nunca-hemos-sugerido-que-se-anulen-las-elecciones-de-2019/', 53, 1, 29, 1),
(495, 1627694117, 1627603200, 'Quiroga se presenta en la Fiscalía junto a Mesa y afirma que ‘no hubo ningún golpe’', 'José Antonio Quiroga, excoordinador político de Comunidad Ciudadana (CC), se presentó, este viernes, en la Fiscalía de La Paz, acompañado del expresidente y líder de esa agrupación política Carlos Mesa, para declarar por el caso Golpe de Estado de 2019. ', 'https://www.la-razon.com/nacional/2021/07/30/quiroga-se-presenta-en-la-fiscalia-acompanado-de-mesa-y-afirma-que-no-hubo-ningun-golpe/', 53, 2, 29, 1),
(496, 1627696018, 1627516800, 'Bancada del MAS: Gobierno de Luis Arce garantiza la democracia y rechaza cualquier acto de sedición y terrorismo', 'El diputado Hernán Hinojosa, dice que el gobierno nacional garantiza la democracia en Bolivia y por ello trabaja en la reactivación económica. rechazando los actos de instigación a la violencia. ', 'http://www.boliviatv.bo/principal/tvenvivo71.php', 32, 2, 9, 1);
INSERT INTO `noticia` (`idnoticia`, `fecha_registro`, `fecha_noticia`, `titular`, `resumen`, `url_noticia`, `rel_idmedio`, `rel_idcuestionario`, `rel_idusuario`, `esta_activa`) VALUES
(497, 1627696760, 1627603200, 'Consejeros suplentes asumen cargos en Consejo de la Magistratura', 'Marvin Molina y Sandra Soto asumen cargos en el consejo de la magistratura después de la destitución de Alcón y Gómez, aseguran garantizar la continuidad de gestión constitucional  ', 'https://www.facebook.com/TvSucreUSFX/videos/1711512269048520', 20, 2, 54, 1),
(498, 1627697035, 1627603200, 'Concejal realiza una inspección y descubre irregularidad en el acceso al agua  ', 'Concejal Municipal Reyna Menacho en una inspección al distrito veinte de la ciudad de Potosí pudo identificar que existen más de cientos de familias que no cuentan con el líquido elemento que es el agua y es por ese problema que los vecinos tienen que tener piletas públicas con mangueras de hasta 200m por o mismo es correspondiente poner cartas en el asunto ya que es un derecho.', '', 47, 2, 34, 1),
(499, 1627697597, 1627603200, 'Mujeres Interculturales se pronuncian contra el atentado a la democracia. ', 'Angelica Ponce que es la representante de Mujeres Interculturales rechaza que la derecha se este volviendo a articular esto con intereses particulares por lo tanto consideran encontrarse en estado de emergencia ya que intentan dañar la democracia esa democracia que tanto les costo recuperar.', '', 47, 2, 34, 1),
(500, 1627697909, 1627603200, 'Exvocal del TSE solicita que la justicia pueda responder a los daños causados a su persona.', 'Idelfonso Mamani - Exvocal del TSE solicita que la justicia se haga cargo del daño provocado ya que lo acusaron sin prueba suficiente debido a que lo detuvieron por un post de internet, refleja que sufrieron de persecución política y del mismo modo si no logran encontrar resultados en la justicia interna recurrirán a instancias internacionales. ', '', 47, 2, 34, 1),
(501, 1627698085, 1627603200, 'Diputados de CC solicitan a la Universidad de Salamanca el estudio completo sobre las elecciones de 2019', 'Diputados de la alianza Comunidad Ciudadana (CC) solicitaron a la Universidad de Salamanca, España, el estudio completo del Grupo de Investigación Deep Tech Lab de Bisite, sobre las elecciones anuladas de  octubre de 2019.', 'https://www.lostiempos.com/actualidad/pais/20210730/diputados-cc-solicitan-universidad-salamanca-estudio-completo-elecciones', 12, 2, 44, 1),
(502, 1627698523, 1627603200, 'Barrientos acude a la Comisión de Ética por actitudes machistas de senador del MAS', 'La senadora opositora Andrea Barrientos denunció este viernes ante la Comisión de Ética del senado boliviano al oficialista Hilarión Padilla por sus actitudes machistas en una sesión en la que señaló que no iba a \"discutir\" con una mujer.', 'https://www.lostiempos.com/actualidad/pais/20210730/barrientos-acude-comision-etica-actitudes-machistas-senador-del-mas', 12, 2, 44, 1),
(503, 1627698888, 1627603200, 'Caso Fraude: 10% de actas del TREP no correspondía a cómputo oficial, según jefe de pericia española', 'El español Juan Manuel Corchado, director del Grupo de Investigación Deep Tech Lab de Bisite de la Universidad de Salamanca, organismo contratado por la Fiscalía para auditar la integridad de los resultados de las elecciones de octubre de 2019 reveló en entrevista con Unitel que se detectó que el 10% las actas del TREP (sistema de transmisión rápida de resultados) no correspondía al cómputo oficial, pese a ello considera que no hubo manipulación', 'https://unitel.bo/politica/caso-fraude-10-de-actas-del-trep-no-correspondia-a-computo-oficial-segun-jefe-de-pericia-espanola_155144', 21, 1, 32, 1),
(504, 1627699073, 1627603200, '“Un pequeño sector se apoderó (del MAS) y no quiere soltar”, asegura líder intercultural.', 'A seis días del ampliado orgánico del MAS-IPSP vuelven a surgir voces que exigen renovación. Una de ellas es la de Angélica Ponce, ejecutiva de las mujeres interculturales, quien hoy le recordó a la cúpula partidaria que, el “instrumento político, no pertenece a unas cuantas personas”.  “La gran mayoría del pueblo boliviano se identifica con el proceso, con el instrumento político, y no así con un pequeño sector que se apoderó y no quiere soltar.  Lamentablemente, se creen dueños del instrumento y no lo son”,  sostuvo Ponce, ejecutiva de la Confederación Nacional de Mujeres Interculturales de Bolivia (Cnamib), en declaraciones recogida por radio Éxito.', 'https://www.paginasiete.bo/nacional/2021/7/30/un-pequeno-sector-se-apodero-del-mas-no-quiere-soltar-asegura-lider-intercultural-302560.html?__twitter_', 14, 2, 34, 1),
(505, 1627699231, 1627603200, 'Diputado Cuéllar denuncia por nepotismo a titular de YPFB y otros funcionarios.', 'El diputado del Movimiento al Socialismo (MAS), Rolando Cuéllar, presentó una denuncia en contra del presidente de Yacimientos Petrolíferos Fiscales Bolivianos (YPFB), Wilson Zelaya y otros funcionarios, por contratar a familiares para que trabajen en la empresa estatal. La querella fue presentada el 12 de julio en la ciudad de Santa Cruz.  “Los ciudadanos Wilson Zelaya, Inton Borda, José Vásquez y otros habrían contratado familiares, con el fin dé beneficiarlos económicamente, pese a las prohibiciones que existe en la norma”, detalla el memorial presentado por el parlamentario.', 'https://www.paginasiete.bo/economia/2021/7/30/diputado-cuellar-denuncia-por-nepotismo-titular-de-ypfb-otros-funcionarios-302550.html?__twitter_impress', 14, 2, 34, 1),
(506, 1627699468, 1627603200, 'José Antonio Quiroga declara ante la Fiscalía y afirma que «nunca» se reunió con Añez.', 'El excoordinador político nacional de Comunidad Ciudadana (CC) José Antonio Quiroga se presentó este viernes ante la Fiscalía en calidad de testigo y respondió a las preguntas que le hicieron respecto al supuesto golpe de Estado de 2019. Acompañado por Carlos Mesa, aseguró que \"nunca\" se reunió con Jeanine Añez y que este es \"un juicio inventado para incriminar a los principales dirigentes de la oposición\". ', 'https://www.paginasiete.bo/nacional/2021/7/30/jose-antonio-quiroga-declara-ante-la-fiscalia-reitera-que-nunca-se-reunio-con-anez-302543.html?__twitter', 14, 2, 34, 1),
(507, 1627699839, 1627603200, 'Convocan a Asamblea de la Cruceñidad para definir acciones contra el ‘cierre’ del caso fraude electoral', 'El Comité pro Santa Cruz convocó la noche de este jueves a una reunión de la Asamblea de la Cruceñidad para el lunes con la finalidad de definir acciones en contra del “cierre del caso fraude electoral” y solicitar a la OEA un pronunciamiento oficial sobre su informe de irregularidades en las justas que derivaron en la dimisión de Evo Morales. ', 'https://www.la-razon.com/nacional/2021/07/30/convocan-a-asamblea-de-la-crucenidad-para-definir-acciones-contra-el-cierre-del-caso-fraude-electoral/', 53, 2, 29, 1),
(508, 1627700386, 1627603200, 'Embajador Arce dice que EEUU se une a voces que piden indagar acción de la OEA en Bolivia', 'El embajador en la Organización de Estados Americanos (OEA), Héctor Arce, aseguró que el gobierno de Estados Unidos se sumó con la “conminatoria” al Departamento de Estado a las voces que sugieren una investigación sobre la participación de la OEA en las elecciones anuladas de 2019 en Bolivia. La Cámara de Representantes de Estados Unidos incorporó en el presupuesto del año fiscal 2022 la propuesta de investigación del rol que tuvo la OEA en las elecciones bolivianas de octubre de 2019, informó la congresista Jan Schakowsky.', 'https://www.la-razon.com/nacional/2021/07/29/embajador-arce-dice-que-eeuu-se-une-a-voces-que-piden-indagar-accion-de-la-oea-en-bolivia/', 53, 2, 29, 1),
(509, 1627700453, 1627516800, 'El gobernador cruceño Camacho recuerda a la fiscalía que hay más de 70 pruebas de la irregularidades que prueban el fraude', 'Después de que la Fiscalía General del Estado disolviera el ‘Caso Fraude Electoral’ tras emitir un reporte del Grupo de Investigación Deep Tech Lab de Bisite (de la Fundación General de la Universidad de Salamanca) que señala que no hubo manipulación de datos en las fallidas elecciones de 2019, el gobernador de Santa Cruz, Luis Fernando Camacho, recordó que la auditoría realizada por la Organización de Estados Americanos (OEA) fue determinante en los comicios de 2019, al detectar irregularidades que llevaron al entonces presidente Evo Morales a anular la elección.  La OEA hizo una auditoría vinculante que demostró más de 70 irregularidades y hay evidencias claras de manipulación al sistema informático, pero a pesar de esto la justicia masista cierra el caso', '', 48, 2, 17, 1),
(510, 1627700856, 1627603200, 'Corchado: Estudiamos en detalle el informe de la OEA y ‘compartimos muchos puntos’', 'Juan Manuel Corchado, contó que el trabajo que realizó sobre el informe de la Organización de Estados Americanos (OEA), llegó a coincidir en varios puntos, indicó que en las elecciones de 2019 hubo “deficiencias e incidentes que no suponían riesgos para la integridad del proceso electoral, ni para los resultados del cómputo oficial y no se advierte manipulación de los votos”.', 'https://www.la-razon.com/nacional/2021/07/29/corchado-estudiamos-en-detalle-el-informe-de-la-oea-y-compartimos-muchos-puntos/', 53, 1, 29, 1),
(511, 1627700936, 1627603200, 'Días antes del informe de Salamaca, Evo habló de otras investigaciones para anular el caso fraude.', 'El expresidente Evo Morales anunció la publicación de \"estudios\" para negar el fraude electoral, días antes de que la Fiscalía dio a conocer el informe de un grupo de investigación de la Universidad de Salamanca y cierre el proceso por este caso.  “El único fraude, estoy convencido es de la OEA, ¿qué otro fraude más? Quiero decirles, esta semana, la próxima semana, van a seguir saliendo otras informaciones, otras investigaciones (que señalarán) que no hubo fraude, pero sí golpe de Estado”, declaró Morales el domingo 25 de julio en la radio cocalera del Chapare.', 'https://www.paginasiete.bo/nacional/2021/7/30/dias-antes-del-informe-de-salamaca-evo-hablo-de-otras-investigaciones-para-anular-el-caso-fraude-302542.', 14, 2, 34, 1),
(512, 1627701002, 1627603200, 'Gobierno anuncia que no habrá más cambios de ministros en esta gestión', 'Las especulaciones de distintos sectores sobre cambio de ministros del Gabinete de Luis Arce fueron despejadas con un anuncio del propio ministerio de la Presidencia que negó cualquier cambio a través de un comunicado.', '', 48, 2, 17, 1),
(513, 1627701123, 1627603200, 'Suman 5 excandidatos del MAS que ocupan cargos en el Estado.', 'Franklin Flores, Álvaro Ruiz, Juan Carlos León, Nelson Cox y Pedro García son los excandidatos del MAS que perdieron en las elecciones subnacionales y que ocupan en la actualidad cargos en el Estado. A ellos puede sumarse el excandidato a gobernador de Santa Cruz Mario Cronenbold si la Cámara de Senadores aprueba su designación como embajador ante Paraguay.  El  28 de julio, el presidente del Estado, Luis Arce, remitió al presidente nato de la Asamblea Legislativa Plurinacional, David Choquehuanca, una nota en la que da a conocer su decisión de designar a Cronenbold como embajador. En la misiva, le pide que el nombramiento sea considerado en el Senado, en aplicación al   articulo 160 de la Constitución Política el Estado.', 'https://www.paginasiete.bo/nacional/2021/7/30/suman-excandidatos-del-mas-que-ocupan-cargos-en-el-estado-302510.html?__twitter_impression=true', 14, 2, 34, 1),
(514, 1627701435, 1627603200, 'Yujra: «Tarifa cero» generó daño económico al Estado.', 'El diputado Omar Yujra señaló ayer que la decisión del gobierno  de Jeanine Áñez de imponer la “tarifa cero” para despachos directos benefició a un reducido grupo de empresarios y generó un daño económico al Estado de más de 2,8 millones de bolivianos.  El legislador cuestionó que en el régimen de Añez se haya priorizado favorecer a un reducido grupo empresarial en contra de los intereses del Estado.', 'https://www.paginasiete.bo/economia/2021/7/30/yujra-tarifa-cero-genero-dano-economico-al-estado-302491.html?__twitter_impression=true', 14, 2, 34, 1),
(515, 1627701558, 1627603200, 'Sala judicial destituyó a dos consejeros elegidos por voto.', 'Los consejeros de la Magistratura Dolka Gómez y Gonzalo Alcón fueron destituidos de sus cargos de forma “ilegal” con un “auto complementario” emitido por los vocales de la Sala Constitucional Segunda de La Paz, Blanca Alarcón y René Delgado, pese a que los consejeros fueron elegidos por voto popular, denunció Franz Reyes, abogado de los afectados.  “Ellos han sido cesados entre ayer y hoy día por un fallo de una Sala Constitucional de La Paz, que conoció una acción de cumplimiento, y esa resolución para nosotros es ilegal, porque la única competencia que tiene esa sala era para tal vez disponer que, si hay alguna ley incumplida, se la cumpla, pero jamás, desde mi punto de vista, una sala y una acción de cumplimiento puede cesar a ningún funcionario, menos a una autoridad electa por voto universal”.', 'https://www.paginasiete.bo/seguridad/2021/7/30/sala-judicial-destituyo-dos-consejeros-elegidos-por-voto-302513.html?__twitter_impression=true', 14, 2, 34, 1),
(516, 1627701737, 1627603200, 'Ethical Hacking: Grupo de Salamanca carece de experiencia en informática forense y electoral.', 'Álvaro Andrade Sejas, director ejecutivo de Ethical Hacking, empresa auditora del proceso electoral del 20 de octubre de 2019, aseveró que los expertos del grupo de Salamanca, con quienes la Fiscalía hizo el contrato para la “Pericia en el Área de Seguridad Informática y Administración de Redes”, con el que se pretende cerrar el caso fraude electoral, carece de experiencia demostrable en temas forenses y electorales.', 'https://www.noticiasfides.com/nacional/seguridad/ethical-hacking-grupo-de-salamanca-carece-de-experiencia-en-informatica-forense-y-electoral-410944', 35, 2, 34, 1),
(517, 1627701863, 1626912000, 'Audiencia de Juicio Oral', 'La audiencia  de Juicio Oral determina 23 años de cárcel  al señor Pablo Aguirre Ferreira  por el caso de Violación  a una menor de edad  de 8 años ... esto ocurrió hace 9 meses .   Este, cumplirá  su condena en penal de Villa Bush. ', 'https://fb.watch/74u638GcdX/  ', 28, 2, 53, 1),
(518, 1627701904, 1627603200, 'Los legisladores de Creemos presentan recursos contra el caso fraude electoral.', 'Los legisladores de Creemos Bolivia presentan recurso contra el cierre del Caso Fraude Electoral y se apersonan en calidad de víctimas ante la Fiscalía. \"No permitiremos que haya una distorsión tan dolosa de la historia. Los bolivianos fuimos testigos del fraude electoral\". ', '', 35, 2, 34, 1),
(519, 1627702000, 1627603200, 'Los diputados de Comunidad Ciudadana solicitan más información sobre el caso Fraude Electoral.', ' Los diputados de Comunidad Ciudadana solicitan al Rector de la Universidad de Salamanca la pericia completa del proceso electoral de 2019, además de las credenciales, experiencia y contrato del grupo de investigación para realizar el estudio informático. ', '', 35, 2, 34, 1),
(520, 1627702161, 1627603200, 'Diputada denuncia deforestación y avasallamiento en la comunidad Monte Verde.', 'El territorio indígena Monte Verde, ubicado en el municipio de Concepción del departamento de Santa Cruz, sufre avasallamientos, deforestación, asentamientos ilegales y peligro de incendio forestal provocado por gente que no es del lugar, según la presidenta de la Comisión de Naciones y Pueblos Indígena Originario Campesino, Culturas e Interculturalidad, Toribia Lero.  La diputada de Comunidad Ciudadana (CC) informó que una comisión ingresó al territorio indígena Monte Verde ante denuncias de que los oriundos sufren diferentes atropellos, presuntamente por traficantes de madera, ganaderos, interculturales, mineras y otros.', '', 35, 2, 34, 1),
(521, 1627702303, 1627603200, 'El diputado del MÁS se pronuncia con relación al caso fraude electoral.', 'El diputado del MAS, Juan José Jauregui, califica como \"cantinfleada jurídica\" al recurso de impugnación contra el cierre del caso Fraude Electoral que presentaron los cívicos cruceños. \"No nos sorprenderá que esta solicitud sea rechazada\".', '', 35, 2, 34, 1),
(522, 1627702339, 1627603200, 'Aparato Judicial', 'El aparato Judicial realiza la audiencia en la cárcel de Villa Bush. Con la atención de 24 caso en audiencias, se estima terminar con  un 78%  de los casos escogidos minuciosamente  por el asesor  Jurídico., quien revisó a detalle los casos .   Esto con el objetivo de que cada persona sepa el estado de su caso  y en todo caso sobre los procedimientos realizados. ', 'https://fb.watch/74sTM2ovd3/', 28, 2, 53, 1),
(523, 1627702482, 1627603200, 'El ex coordinador de CC se presenta a declarar a la fiscalía.', 'Excoordinador político de CC tras declarar por el caso golpe de Estado: \"Para la Fiscalía este caso es por terrorismo y sedición que habrían desembocado en un golpe de Estado. No hay sustento legal, es un juicio inventado para incriminar a los dirigentes de la oposición\". ', '', 35, 2, 34, 1),
(524, 1627702782, 1627603200, 'Exvocal del TED afirma que no anuló votaciones del 2019', 'EXVOCAL DEL TED AFIRMA QUE NO ANULÓ VOTACIONES EL 2019   Idelfonso Mamani, exvocal del Tribunal Electoral Departamental (TED), afirmó que no sugirió que se anule las votaciones del 2019. Además, dio a conocer que no descarta que presentará acciones legales internacionalmente pero primero lo hará en la jurisdicción nacional.  ', '', 23, 2, 34, 1),
(525, 1627702894, 1627603200, 'MÁS pide investigar a los actores que anunciaron el fraude electoral', '#ATBNoticias MAS PIDE INVESTIGAR A LEl diputado Juan José Jauregui dijo que los actores políticos que aseguraron el supuesto fraude electoral deben ser investigados y procesados.  Por su parte, Tuto Quiroga y su asesor fueron convocados a declarar en calidad de testigos ante la Fiscalía.   ', '', 23, 2, 34, 1),
(526, 1627702935, 1627603200, 'Reinstauración del Tribunal de Imprenta, por parte del Consejo Municipal, genera una importante garantía para evitar la persecución a los periodistas.', 'Roberto Méndez, presidente de la asociación de periodistas aplaude la decisión, del Consejo Municipal de Santa Cruz, de reactivar el Tribunal de Imprenta, después de 10 años de continuos pedidos de reactivación por parte de esta asociación; este tribunal, brinda una seguridad fundamental a los periodistas ante cualquier persecución política.', '', 43, 2, 46, 1),
(527, 1627703511, 1627603200, 'Héctor Arce, embajador de la OEA, afirma que EEUU se adhiere a las voces que consideran necesario profundizar las investigaciones sobre el papel de la OEA en las elecciones de 2019.', 'La afirmación de Héctor Arce estriba en la declaración de la congresista norteamericana Jan Shakowski, quien señala que EEUU habría incluído en su presupuesto para 2022 una cuota destinada para la investigación del rol que cumplió la OEA en las elecciones bolivianas de 2019.', '', 43, 1, 46, 1),
(528, 1627704063, 1627603200, 'Director del grupo de investigación que constituyó la pericia que fundamentó el cierre del caso Fraude Electoral, reafirma que las anomalías no alteraron el resultado de las elecciones.', 'Juan Manuel Corchado director del grupo de investigación de la fundación general de la Universidad de Salmanca; enfatizó que a pesar de las anomalías reportadas en su informe, estas no incidieron en el resultado electoral en 2019.', '', 43, 1, 46, 1),
(529, 1627704355, 1627603200, 'YPFB relanza plan de exploración, que tendría un costo de 1400 millones de dólares.', '17 proyectos en 7 departamentos con una prospección de 5 Trillones de Pies Cúbicos, son los elementos constituyentes del plan de exploración que relanza YPFB.', '', 43, 2, 46, 1),
(530, 1627704783, 1627603200, 'Comité Pro Santa Cruz convoca asamblea de la Cruceñidad, ante cierre del caso Fraude Electoral.', 'El lunes 2 de agosto es la fecha definida para la asamblea de la cruceñidad, después de que en un ampliado el Comité Pro Santa Cruz considerara que el cierre del caso Fraude Electoral vulneraba la libertad y democracia de los ciudadanos; además de reputar que el fiscal Lanchipa actuó unilateralmente sin comunicar las notificaciones pertinentes del caso.', '', 43, 2, 46, 1),
(531, 1627705231, 1627603200, 'Asamblea Legislativa Departamental aprueba en grande y en detalle proyecto de ley de Roberto Urañavi asambleísta indígena del pueblo Guarayo.', 'El proyecto de ley aprobado versa sobre la declaración de necesidad departamental, a la construcción de una carretera que discurra por Ascención-La Casita-Urubichá, que derivará en beneficios productivos, económicos y sociales para la provincia Guarayos.', '', 43, 2, 46, 1),
(532, 1627742943, 1627257600, 'Gobierno análiza opciónes para atender la demanda de 2da dosis de sputnik V', '-El Ministerio de Salud está realizando investigaciones y estudios científicos para atender la carencia de segundas dosis de la vacuna Sputnik V, cuya adquisición nacional tiene un retraso, informó este martes el viceministro de Comercio Exterior, Benjamín Blanco.', '', 47, 2, 22, 1),
(533, 1627743237, 1627344000, 'Fiscalía investiga domos quemados en el salar de thunupa', 'El viernes 23 de julio, en cercanías de la población de Jirira del Gobierno Autónomo Indígena Originario de Salinas del departamento de Oruro, comunarios de Potosí que acudieron de forma masiva al lugar en el supuesto de que ese sector es territorio potosino, procedieron a la quema de tres domos del emprendimiento turístico del Hotel Kachi Loddge, reavivando un conflicto de límites interdepartamental entre ambos departamentos.', '', 47, 2, 22, 1),
(534, 1627743551, 1627430400, 'El ministerio de justicia investiga contra el ministro de educación Adrián Quelca y otras autoridades de educación', '-El Ministerio de Justicia, a través del Viceministerio de Transparencia, investiga una denuncia presentada contra el ministro de Educación, Adrián Quelca, y otras autoridades de esa cartera.  En las denuncias penales se acusa a Quelca y Tarifa de manipular las designaciones de cargos favoreciendo o perjudicando postulantes, mientras que a Balderrama se le acusa de presionar para la posesión de un aspirante que habría presentado un certificado falso.', '', 47, 2, 22, 1),
(535, 1627743785, 1627516800, 'CONADE nos reímos de las amenazas de Nelson Cox ', 'El dirigente del Comité de Defensa de la Democracia (Conade), Manuel Morales, afirmó que no temen las amenazas del viceministro de Régimen Interior, Marcelo Cox, quien dijo que aquellas personas que hablen del concepto fraude con llevarán responsabilidades por causar zozobra', '', 47, 2, 22, 1),
(536, 1627744227, 1627603200, 'Combinación de SPUTNIK V y AstraZeneca es seguro  según fondo soberano ruso ', 'Los resultados previos de la investigación de la combinación de las vacunas anticovid rusa Sputnik-V y la britániza AstraZeneca que se lleva a cabo en Azerbaiyán muestran su alto nivel de seguridad y la falta de reacciones adversas graves, informó este viernes el Fondo de Inversiones Directas de Rusia (FIDR) El análisis intermedio de los datos muestra altos indicadores de seguridad del uso combinado de los fármacos: no se observan fenómenos indeseables graves ni casos de infección con coronavirus tras la vacunación\", indicó en un comunicado el FIDR, que promociona y comercializa la vacuna rusa.La combinación de vacunas fue aplicada a un reducido grupo de 50 voluntarios en Azerbaiyán.', '', 47, 2, 22, 1),
(537, 1627744905, 1627689600, 'Viceministro blanco aseguro que tenemos más de 51% para la 2da dosis ', '-Con el reciente arribo de un nuevo lote de vacunas Sinopharm al país, ya se cuenta con suficiente cantidad de inmunizantes para proteger al 51% de la población vacunable de Bolivia con la primera y la segunda dosis, informó el viceministro de -Comercio Exterior e integración, Benjamín Blanco. -Con esa cantidad de inmunizantes que hasta la fecha llegó a Bolivia, se puede vacunar con una sola dosis a un porcentaje mayor de personas. “Con al menos una dosis, han llegado vacunas a nuestro país para el 68% de la población”, explicó la autoridad en una entrevista en el programa del 1er plano de bolivia TV, anticipo que en los siguientes días se preve la llegada de otro avión con un nuevo lote de vacunas para reforzar la campaña de vacunación masiva contra el corona virus ', '', 47, 2, 22, 1),
(538, 1627748017, 1627603200, 'El embajador de la OEA Héctor Arce aseguro que el gobierno de Estados Unidos se sumó con la combinatoria al departamento de estado ', 'El embajador en la OEA Héctor Arce aseguro que el gobierno de Estado Unidos se sumó con la combinatoria al departamento de estado a las voces que surgen de una investigación sobre la participación del organismo hemisferico en las elecciones anuladas del 2019, el gobierno norteamericano se une a las voces que surgieron', 'https://www.facebook.com/radio.global.sucre/', 36, 1, 12, 1),
(539, 1627748487, 1627603200, 'La cámara de diputados sesionó el día de ayer por última vez en el hemiciclo de la antigua asamblea legislativa', 'La cámara de diputados sesionó el día de ayer jueves por última vez en el hemiciclo de la antigua asamblea legislativa plurinacional y se alista para iniciar su traslado al nuevo inmueble que será inaugurado el lunes 2 de agosto', 'https://www.facebook.com/radio.global.sucre/', 36, 2, 12, 1),
(540, 1627748944, 1627603200, 'Se confirma que se revertirá el derecho supremo que excluía a ELAPAS de los beneficios del definimiento de la deuda por seis años', 'Se confirma en la ciudad de La Paz desde el directorio de ELAPAS que se revertirá el decreto supremo que excluía a ELAPAS de los beneficios del definimiento de la deuda por seis años ', 'https://www.facebook.com/radio.global.sucre/', 36, 2, 12, 1),
(541, 1627759760, 1627603200, 'Se elije un representante democráticamente de la Asociación de Sordos en cobija', 'En favor de poder organizarse se lleva a cabo las elecciones para elegir democráticamente a un representante que pueda pelear por sus necesidades, asi mismo remarcan que por primera vez se lleva acabo una elección la cual fortalece a la asociación el proceso democrático.', 'https://www.facebook.com/UNITELPANDO11/videos/566903274481987', 29, 2, 55, 1),
(542, 1627764998, 1627516800, 'Concejales de todos los municipios de Pando participaran de importantes elecciones Nacionales FAN BOLIVIA y MB en la Ciudad de La Paz', 'Se trasladan a la ciudad de La Paz, Concejales de todos los municipios de Pando y participaran de una importantes elecciones Nacionales FAN BOLIVIA y MB, resalta el concejal la importancia de ser parte las directivas Nacionales ya que así se gestionaran proyectos en beneficio del Departamento', 'https://www.facebook.com/UNITELPANDO11/videos/230869128779413', 29, 2, 55, 1),
(543, 1627765633, 1627516800, 'Lanchipa puede enfrentar procesos por caso fraude electoral', 'El Fiscal General, Lanchipa, podría enfrentar proceso por caso Frade Electoral, debido al requerimiento de sobreseimiento conclusivo emitido sobre la base de una pericia de un grupo de investigadores de la Universidad de Salamanca y no así el informe de la OEA, que la consideran invalido.    ', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(544, 1627766581, 1627516800, 'Preocupa que la Fiscalía General haya desestimado el caso fraude electoral de 2019 a raíz de compromisos políticos y un informe realizado.', '																		El Ex-dirigente de COMCIPO se encuentra preocupado por que la Fiscalía General del Estado haya desestimado el caso fraude electoral debido a compromisos políticos con la Ex-presidenta transitoria y en base a un informe realizado por un docente y dos estudiantes, y no así el informe técnico emitido por la OEA, el mismo que fue avalado por la Comunidad Europea, con el fin de realizar persecuciones políticas a los opositores y lavar la imagen de Morales a nivel internacional. 															', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(545, 1627766861, 1627430400, 'Analista Político comenta sobre el Cierre de Caso de fraude electoral del 2019', 'Denota claramente que  se toma decisiones a partir del poder judicial en Bolivia, al no hacerse la investigación ya que no se tiene  testigos, ni declaraciones por el señor evo morales, dos realidades hacen señalar una fraude y otra golpe de estado, en ambos casos la ciudadanía no tiene la seguridad ni certeza lo que sucedió en las elecciones Nacionales 2019.', 'https://www.facebook.com/UNITELPANDO11', 29, 1, 55, 1),
(546, 1627767712, 1627516800, 'Rechazo al peritaje realizado por la Universidad de Salamanca ', 'Diputado de Comunidad Ciudadana rechaza el peritaje realizado por la Universidad de Salamanca de las elecciones de 2019, ya que el único objetivo del MAS es convocar a nuevas elecciones para que Morales sea nuevamente candidato y se le entregue el poder en un corto tiempo.', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(547, 1627769028, 1627603200, 'CC \"Arce debe cambiar a todo su gabinete\"', 'Para el diputado opositor Alejandro Reyes (CC) el presidente debería cambiar a todo su gabinete para el 6 de agosto debido a que no realizaron buenas gestiones, sobre todo al de salud. En el MAS dicen que el cambio de ministros es de entera potestad des presidente, no creen que los ministros deben ser cambiados pero si deben realizarse algunos ajustes, para las fiestas patrias no se darán cambios en el gabinete afirma Juan José Jauregui (MAS). ', '', 24, 2, 29, 1),
(548, 1627769058, 1627430400, 'Fiscalía General Cierra el Caso Fraude Electoral 2019', 'El fiscal del Departamento de Pando, Menciona sobre el caso Fraude Electoral 2019,si bien se dicto un examen pericial por expertos de la Universidad de SALAMANCA, en el que se hace mención del informe, que remarca  no encontrar elementos o la existencia de manipulación  al padrón ni ningún tipo de mal manejo del proceso eleccionario, la investigacion ya mas de dos años, se esperaba este informe por el tribunal electoral para que haga conocer a toso el Pais, con esto se demuestra la transparencia por el ministerio publico y la imparcialidad con la que trabaja.', 'https://www.facebook.com/UNITELPANDO11/videos/912883429325996', 29, 1, 55, 1),
(549, 1627769174, 1627603200, 'El expresidente Jorge Tuto Quiroga cuestionó la auditoría realizada por la Universidad de Salamanca', 'Jorge Quiroga Ramirez critica la auditoría realziada por la universidad de Salamanca al proceso electoral de 2019, afirma que hay una diferencia amplia con la auditoría de la OEA. Si el objetivo es desconocer al gobierno transitorio y validar las eleccions del 2019 eso provocaría una crisis que puede afectar al gobierno actual pues se estaría cuestionando su legitimidad, también criticó la presencia de Evo Morales en Perú pues le quita protagonismo al actual presidente de Bolivia Luis Arce.', '', 24, 1, 29, 1),
(550, 1627769266, 1627603200, 'Luis Vásquez declaró como testigo en la fiscalía por el caso del presunto golpe de Estado', 'Luis Vásquez  afirmó que participó en la reunión de la UCB, ha llamado de la conferencia episcopal y de embajadores de la UE, España y otros respresentantes internacionales. Declara que no buscaban nombres sino soluciones constitucionales. ', '', 24, 2, 29, 1),
(551, 1627769358, 1627603200, 'Quiroga declaró como testigo', 'José Antonio Quiroga, ex secretario de CC, declara que el proceso no tiene una sustentación legal y que esta siendo manipulado por los principales patrocinadores. ', '', 24, 2, 29, 1),
(552, 1627769499, 1627603200, 'Ex coordinador de CC da comparecencia ante el ministerio público por el presunto golpe de Estado', 'José Quiroga dio la cuenta del tenor de su comparecencia ante la fiscalía en calidad de testigo, a tiempo de ratificar el hecho de que nunca hubo golpe sino se dio un paso constitucional dando lugar al gobierno de transición, además recalcó que el proceso no tiene sustento legal y apunta a incriminar a los principales líderes de oposición democrática, teme que sea una distracción pública para desviar la atención de temas más importantes.', '', 38, 2, 29, 1),
(553, 1627770235, 1627603200, 'En la ciudad de La Paz, vecinos atrapa a un ladrón y lo golpean hasta matarlo. ', 'En la ciudad de La Paz atrapan a un delincuente que le había robado y apuñalado a un joven por quitarle sus pertenencias, él joven gritando por auxilio los vecinos salieron y lo atraparon y lo golpearon hasta matarlo en horas de la madrugada. ', '', 51, 2, 57, 1),
(554, 1627774793, 1627516800, 'Patty critica a Lanchipa y presenta memorial para que Camacho declare por el caso golpe', 'La exdiputada Lidia Patty, presentó un memorial para que el gobernador de Santa Cruz, Luis Fernando Camacho, pueda presentarse en la Fiscalía y así declarar los hechos en el caso golpe de Estado de 2019 por ello Camacho sea citado a declarar para esclarecer los sucesos ocurridos durante la crisis política y social que fue causante para la renuncia de Morales, tanto exjefes militares están siendo apresados por el mismo caso. ', 'https://www.opinion.com.bo/articulo/pais/patty-critica-lanchipa-presenta-memorial-que-camacho-declare-caso-golpe/20210729003757829074.html', 13, 2, 39, 1),
(555, 1627775791, 1627516800, 'Goni espera ser exonerado en juicio por Octubre Negro; presenta recurso en EEUU', 'El comunicado emitido por allegados a Goni y citado por ERBOL, la acusación en su contra nos indica que no tiene sustento y no existe base para que sea responsable de las muertes, como antecedentes en este caso, se tiene que el 2018 un jurado determinó que Goni y Sanchez Berzain si son culpables de las muertes y por ello se le otorgó 10 millones de dólares a todos los demandantes. La defensa Apelaciones del 11vo Distrito de Apelciones de Florida en Estados Unidos (EEUU), en el marco del proceso en que se lo acusa por las muertes que se registraron los conflictos de octubre de 2003 (octubre negro). ', 'https://www.opinion.com.bo/articulo/pais/goni-espera-ser-exonerado-juicio-octubre-negro-presenta-recurso-eeuu/20210729004244829078.html', 13, 2, 39, 1),
(556, 1627777305, 1627603200, 'Fiscalía convoca a declarar a José Antonio Quiroga y Luis Vásquez por el caso del supuesto golpe.', 'El Secretario de la Fiscalía General del Estado, informó que hoy se citará a declarar al Ex-presidente del Comité Cívico pro Santa Cruz y actual Gobernador, y al Ex-residente de COMCIPO y otras 35 personas por el caso del supuesto golpe de Estado. Hoy también presentarán declaraciones el Ex- Coordinador político nacional de CC y el Asesor de Jorge Quiroga Ramírez. ', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(557, 1627777701, 1627516800, 'Policía acusado del caso motín en La Paz pide reprogramar su juicio por padecer COVID-19', 'El suboficial de la Policía J.C. que debe tener un juicio por el caso de motín de 2019 en la ciudad de La Paz solicitó que se reprograme su audiencia debido a que se contagió con coronavirus, declaró esta información su abogado Jhonny Castelu, por ese caso se conoce que en el departamento de La Paz existen 9 policías que son investigados de los cuales 8 ya están en proceso de juicio con acusación, entre ellos se encuentra el exjefe de la Fuerza Especial de Lucha Contra el Crimen (FELCC), coronel Iván Rojas. ', 'https://www.opinion.com.bo/articulo/pais/policia-acusado-caso-motin-paz-pide-reprogramar-juicio-padecer-covid-19/20210729205932829151.html', 13, 2, 39, 1),
(558, 1627779252, 1627516800, 'Los cívicos interponen recursos contra el cierre de caso Fraude', '						El Comité de Santa Cruz recusará la determinación de la Fiscalía General del Estado de cerrar el caso electoral del 2019. El abogado Matin Camacho afirmó que el informe académico español es desinteresado, inconsciente y pagado para beneficiar al gobierno nacional, además que no se ha valido el informe total de la OEA como los descargos que tendrían que realizar los otros sectores afectados, solamente se presentó la visión acusada del movimiento al socialismo aseguró el jurista.	El Ministerio Público determinó cerrar el caso del denominado Fraude Electoral basado en un documento firmado por un Docente y dos estudiantes de la Universidad de Salamanca y por el contrario desestimó en su totalidad el informe integral de la Organización de Estados Americanos OEA por considerar que no se trataría de una Auditoría \r\n				', '', 35, 1, 18, 1),
(559, 1627779387, 1627516800, 'El Ministerio Público acusa a las Fuerzas Armadas por desvío de combustible en favor de la resistencia juvenil cochala', 'A raíz de la circulación de un audio en redes cuya denuncia implica a la séptima división del ejército en cochabamba, cuyo desvío de combustible favorece al grupo de la resistencia cochala es que se ha anunciado un proceso investigativo según ha informado el secretario general de la Fiscalia Edwin Quispe.', '', 35, 2, 18, 1),
(560, 1627779636, 1627516800, 'Marco Pumari no teme ser citado por la Fiscalía ', 'El ex candidato a la vicepresidencia por creemos Marco Antonio Pumari frente al supuesto Golpe de Estado indicó que si la Fiscalía lo citara el no le tiene miedo y que actuó en defensa de los recursos naturales, también indicó que el informe de la Universidad Española que fue pagado para favorecer al movimiento al Socialismo. ', '', 35, 2, 18, 1),
(561, 1627779723, 1627516800, 'Las Plataformas del 21 F piden viajar a sucre con el objetivo de realizar una serie de protestas en rechazo al caso Fraude', 'Las plataformas del 21 F determinaron trasladarse la próxima semana a la ciudad de Sucre, para hacer protestas pacíficas en rechazo a la resolución de la Fiscalía General de Estado de activar las investigaciones del Fraude Electoral y por los procesos políticos del supuesto Golpe de Estado. La Fiscalía aclara que el caso Fraude no está cerrado, el Ministerio Público a través del Secretario General Edwin  Quispe manifestó que aún existen algunos casos como notificar sobre esta resolución además de la etapa de imputación que podría existir las partes si es que se hubiese vulnerado su derecho. ', '', 35, 2, 18, 1),
(562, 1627779814, 1627603200, 'La oposición denuncia a Yhonny Fernandez ', 'Por el intento de comprar una planta de oxígeno con sobreprecio, los concejales de UCC y de Comunidad Ciudadana se dieron tiempo para un contrapunteo de denuncias de defensa de la administración edil, aseguraron que Yhonny Fernandez está promoviendo un circo.', '', 35, 2, 18, 1),
(563, 1627779956, 1627603200, 'Abogado de Camacho pide a la Fiscalía que lo convoquen a declarar', 'El abogado del gobernador cruceño, Geguer Justianiano no se explica el por qué hasta ahora el principal supuesto responsable del caso Gope de Estado Luis Fernando Camacho no era convocado por la Fiscalía, asegura que sí Camacho es procesado o encarcelado se desatara un conflicto social y político que no quiere ligar el gobierno. ', '', 35, 2, 18, 1),
(564, 1627780281, 1627603200, 'Campesinos se declaran en emergencia ante anuncios de protestas de cívicos y plataformas ', 'En emergencia así se declaró el sector campesino en Cochabamba, su ejecutivo Juan Zegarra señaló y afirmó que el anuncio de movilizaciones por parte de cívicos conade y plataformas ha puesto al sector en emergencia y dispuesto a movilizarse, señaló que van a cuidar y  proteger el Gobierno de Arce Catacora ante cualquier movilización que vayan a emprender los sectores en contra al movimiento al socialismo.', '', 35, 2, 18, 1),
(565, 1627780405, 1627603200, 'Demócratas exigen celeridad en el pago del bono y el desayuno escolar', 'La oposición del concejo municipal espera que pronto se pueda dar el prometido desayuno y bono escolar de 350 bs para cada estudiante el concejal Manuel Saavedra manifiesta que estos recursos ya están disponibles pero faltan algunos detalles importantes.', '', 35, 2, 18, 1),
(566, 1627780629, 1627603200, 'Denuncian a parlamentarios del Beni de no trabajar a pesar de recibir jugosos sueldos ', 'El ex candidato a la gobernación Fernando Aponte, aseguró que los parlamentarios del Beni no trabajan solo se les ve a los suplentes haciendo gestiones, y pidió que cumplan sus funciones.  ', '', 35, 2, 18, 1),
(567, 1627780713, 1627430400, 'Fiscalía cierra caso fraude electoral, tras la pericia que identificó negligencia pero no manipulación de los resultados en las elecciones de octubre de 2019-', 'El Fiscal General comunicó, que en estricta observancia de los principios de objetividad e imparcialidad, emitió requerimiento conclusivo de sobreseimiento a favor de los implicados por fraude electoral, al detectar que el hecho investigado no constituye delito, basándose en el informe pericial de la Consultora Internacional Especializada en informática y administración de redes, que determinó que hubo negligencia por parte de la empresa Neotec, pero no manipulación dolosa que hubiera afectado los resultados.', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(568, 1627781736, 1627603200, 'Fraude: cívicos impugnan cierre de caso y exvocales pide resarcir daño', 'El Comité pro Santa Cruz, presentó una apelación debido al cierre del caso por considerar que una acción unilateral y con fallas de procedimiento que vulnera la libertad y la democracia lo cual aseguró Romulo Calvo, presidente del Comité pro Santa Cruz. Por lo tanto las plataformas ciudadanas del 21F junto con el Comité Nacional de Defensa de la Democracia (Conade) dieron a conocer que habrá movilizaciones los cuales se trasladaron hasta Sucre para exigir que el caso se reabra. Al dar un cierre de caso por parte de la Fiscalía se genera reacciones que buscan su reapertura, en tanto los exvocales electorales piden resarcimiento a causa de daños de ratificar la transparencia de las elecciones generales de 2019 que fueron anuladas y derivaron en una crisis política y social. ', 'https://www.opinion.com.bo/articulo/pais/fraude-civicos-impugnan-cierre-caso-exvocales-pide-resarcir-dano/20210730005823829210.html', 13, 1, 39, 1),
(569, 1627782551, 1627603200, 'Senadora Andrea Barrientos acude a la Comisión de Ética por actitudes machistas', '						La jefa de bancada del Senado de Comunidad Cuidadana (CC), Andrea Barrientos,  presentó una carta que está dirigida al presidente de la Cámara de Senadores, el oficialista Andronico Rodriguez, para que la Comisión de Ética debe de sancionar a Hilarion Padilla y para que no vuelva a pasar por esta clase de comportamientos, con actitudes machistas debido a que dijo que no iba a “discutir” con una mujer. Por ello Barrientos publicó la carta que se le fue enviada a Rodriguez para que la situación deba de ser analizada por la Comisión de Ética del Senado. 					', 'https://www.opinion.com.bo/articulo/pais/senadora-boliviana-acude-comision-etica-actitudes-machistas/20210730202821829272.html', 13, 2, 39, 1),
(570, 1627783094, 1627344000, 'Ex-comandantes, General y Almirante, solicitan a la Fiscalía que cite a declarar al Ex-Presidente del Comité Cívico Pro Santa Cruz y actual Gobernador por el caso del supuesto golpe de 2019. ', 'Los Ex-comandantes de las FF.AA., piden a la Fiscalía llamar a declarar al Ex-Presidente del Comité Cívico Pro Santa Cruz y actual Gobernador por el caso del supuesto golpe de Estado, porque según dicha institución, la mencionada autoridad sería quién les habría inducido a cometer el delito de conspiración y dejar sin resguardo al Ex-presidente Morales, siendo que ellos nunca tuvieron contacto con el actual Gobernador. ', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(571, 1627783387, 1627430400, ': El ex presidente del tribunal supremo electoral de Santa cruz respaldan el informe de expertos internacionales diciendo que no hubo manipulación informática.', 'Según el ex presidente de del TSP de Santa cruz Eulogio Nuñez dice” no hubo fraude y que se hizo la verificación del cómputo, se investigó en los  14 meses y 17dias  y no pillaron absolutamente nada y después que no tenían nada que decir nos acusaban o había sobre seguimiento y los vocales electorales apelaron, se su pone que son especialistas en materia electoral y con eso ha sido cerrado”.', '', 42, 1, 36, 1),
(572, 1627784776, 1627603200, 'Creen que cerrar el caso del fraude no supone desconocer las elecciones de Luis Arce como presidente', 'El ex presidente de la cámara de diputados Victor Borda se refirió a las características de la decisión del ministerio público de cerrar el caso de fraude electoral, indicó que eso no afectará los hechos democráticos consecuentes y posteriores como la elección del presidente Luís Arce. Aunque tendrá que haber una demanda a los que fueron impulsores al tema del fraude.', '', 38, 2, 29, 1),
(573, 1627785015, 1627603200, 'Tuto Quiroga ve silencio cobarde de la UE por el caso fraude', 'El expresidente Tuto Quiroga reprocha a la UE porque considera que calla de manera cómplice y cobarde cuando Bolivia debate el caso fraude, cuando la fiscalía decide cerrar el caso en base a un estudio realizado en España, indica que la UE no defiende el trabajo que realizaron.  Además señala que el estudio español fue hecho por 3 personas y, además, un año y medio después; a diferencia de la OEA que realizó un estudio con 36 personas in situ y en 10 días y que tiene un aval firmado por el Estado mientras que la pericia Española fue contratada unilateralmente por la fiscalía; otra diferencia es que la pericia española es meramente informática mientras que de la OEA es más completa. ', '', 38, 1, 29, 1),
(574, 1627785327, 1627344000, 'El MAS busca dar fuerza a su versión de golpe con comisión legislativa', 'El MAS, como es su costumbre, pretende conformar una comisión especial de investigación para el tema de envío de material bélico desde Argentina y Ecuador, para crear una ficción y demostrar desesperadamente su versión de golpe de Estado y conspiración internacional en vez de una solución pacifica, democrática y electoral que fue lo que hubo.', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(575, 1627792191, 1627257600, 'Se detuvo al Ex-comandante de la 7ma. División del Ejercito, acusado por homicidio en lo hechos ocurridos en el municipio de Betanzos durante el año 2019 en los conflictos post-electorales', 'La Fiscalía y la Policía de Potosí, detuvieron al Ex-comandante de la 7ma. División del Ejercito acantonado en el municipio de Tupiza, imputado por homicidio y tentativa de homicidio, por el fallecimiento de una persona por arma de fuego y dos personas heridas en el municipio de Betanzos en noviembre de 2019.', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(576, 1627794694, 1626825600, 'Ministro Del Castillo señala que la persona de Argentina que entregó el armamento esta identificada', 'El gobierno boliviano tiene identificado al uniformado de la Gendarmería Argentina que entregó las 70.000 balas anti tumulto, que ingresaron al país cuando ya se había derrocado a Morales y están a la espera del informe de las FF.AA., para determinar si el material explosivo fue empleado en dos masacres.  ', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(577, 1627801605, 1626739200, 'La oposición pide investigar a Ex-ministros de Morales por versiones de que los tramites para el ingreso de gendarmes argentinos a Bolivia, se habría tramitado antes de la dimisión de Morales el 2019', 'Ministro del Castillo anuncio procesos contra Ex-autoridades de las FF.AA, y Policía, por el delito de trafico de armas sancionado con hasta 30 años de cárcel, y presentó el presunto lote de pertrechos antimotines enviados desde Argentina en enero del año 2020. Sin embargo la Ministra de la Argentina dijo que el envío de dicho material antidisturbios se comenzó a tramitar el 07 de noviembre de 2019, cuando Morales aún gobernaba el país.', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(578, 1627804038, 1626652800, 'Gobierno muestra los equipos y municiones de Argentina y Ecuador', 'El Ministerio de Gobierno presentó los supuestos equipos y municiones que llegaron de Argentina y Ecuador, el 13 de noviembre de 2019 durante la crisis. Se continuará con las investigaciones para ver si otros países participaron del golpe, así como a todos los funcionarios que intervinieron en el traslado de dichos equipos. En la Argentina el Ex-presidente Macri y dos ministros ya han siendo imputados por el delito de contrabando de armas.', 'https://www.facebook.com/KanchaParlaspa/videos/4108503792612552', 37, 2, 42, 1),
(579, 1627821652, 1627430400, 'Camacho y Mesa restan valor a la pericia informática de la Fiscalía y recuerdan la auditoría de la OEA', 'POLÍTICA Camacho y Mesa restan valor a la pericia informática de la Fiscalía y recuerdan la auditoría de la OEA Para el gobernador de Santa Cruz y para el excandidato presidencial, la auditoría de la OEA reveló las irregularidades en las elecciones del 2019 Hace 4 DÍAS Tras conocerse un informe pericial, que según la Fiscalía descarta que haya habido fraude electoral el 2019, el gobernador de Santa Cruz, Luis Fernando Camacho y Carlos Mesa, líder de Comunidad Ciudadana recuerda que la OEA realizó una auditoría.  “La OEA realizó una auditoría vinculante que comprobó más de 70 irregularidades y hay evidencias claras de manipulación al sistema informático, pero a pesar de esto la injusticia masista cierra el caso”, señala un mensaje compartido por el gobernador a través de su cuenta en Twitter.   La autoridad sostiene califica la posición de la Fiscalía como un nuevo atropello a la democracia.  Por su parte, el excandidato a la Presidencia de Bolivia, Carlos Mesa calificó a la auditoría que solicitó la Fiscalía como una investigación, externa, con alcance y metodología definida por el MAS', 'https://unitel.bo/politica/camacho-y-mesa-restan-valor-a-la-pericia-informatica-de-la-fiscalia-y-recuerdan-la-auditoria-de-la-o_154987', 21, 2, 32, 1);
INSERT INTO `noticia` (`idnoticia`, `fecha_registro`, `fecha_noticia`, `titular`, `resumen`, `url_noticia`, `rel_idmedio`, `rel_idcuestionario`, `rel_idusuario`, `esta_activa`) VALUES
(580, 1627822030, 1627603200, 'Fiscalía señala que el caso Fraude no está cerrado, pero ha solicitado el sobreseimiento', 'En el Ministerio Público señalan que será el juez el que confirmará el sobreseimiento y tras ello se puede archivar obrados. Los demandantes tienen derecho a impugnar', 'https://unitel.bo/seguridad/fiscalia-senala-que-el-caso-fraude-no-esta-cerrado-pero-ha-solicitado-el-sobreseimiento_155093', 21, 1, 32, 1),
(581, 1627822493, 1626912000, 'El Censo en Bolivia se realizará el 16 de noviembre de 2022', 'SOCIEDAD El Censo en Bolivia se realizará el 16 de noviembre de 2022 La ministra de Planificación, Gabriela Mendoza, señaló que para el Gobierno es una prioridad la realización del estudio censal para el próximo año,Es determinante para nosotros porque a partir de un censo se tiene una fotografía clara de la realidad pública y a partir de esto se podrá diseñar distintas medidas de política económica y social que se van a implementar\", resaltó la autoridad en conferencia de prensa', 'https://unitel.bo/sociedad/el-censo-en-bolivia-se-realizara-el-16-de-noviembre-de-2022_154663', 21, 3, 32, 1),
(582, 1627832487, 1627603200, 'contradicciones en la declaración de Jeanine Añez', 'José Antonio Quiroga afirma que no conoce a la ex presidente Jeanine Añez, quien había declarado que hicieron reuniones junto a otros representantes políticos. ', '', 19, 2, 21, 1),
(583, 1627834192, 1627689600, 'PRECIDENTE ARCE REAFIRMA RESPALDO DEL GOBIERNO A LOS MUNICIPIOS Y APOYO DE INCREMENTAR LA ECONOMIA', 'LAS PRIMERAS PALABRAS DE NUESTRO PRIMER MANDATARIO FUERON QUE APOYARA A LOS MUNICIPIO PARA MEJORAR LA ECONOMIA DEL PAIS ,UNA REACTIVACION DE LA INVERSION PUBLICA DE LA MISMA MANERA SE IMPLEMENTARAN DIVERSOS PROGRAMAS QUE AYUDEN A LAS ALCALDIAS CON EL FIN DE MEJORAR LA CALIDAD DE VIDA', 'http://boliviatv', 32, 2, 13, 1),
(584, 1627862395, 1628726400, 'Titular de prueba', 'Parrafo resumen de la noticia', 'http://link-de-la-noticia', 36, 3, 21, 0),
(585, 1627863026, 1627776000, 'Titular reforma electoral', 'Parrafo resumen de la reforma electoral', 'http://link-de-la-noticia-reforma', 19, 1, 21, 1),
(586, 1627866132, 1627344000, 'Gobierno anuncia el Censo para el 16 de noviembre de 2022', 'Mediante un Decreto Supremo, el Gobierno anunció este miércoles, la realización del Censo de Población y Vivienda para el 16 de noviembre de 2022', '', 25, 3, 27, 1),
(587, 1627867339, 1627516800, 'los mecanismos para la redistribución de escaños', 'Según analistas consideran que los resultados del censo provocarían conflictos regionales, la solución seria modificar los escaños asignados', '', 25, 1, 27, 1),
(588, 1627868770, 1627689600, 'Mesa: “Evo está entorpeciendo al Gobierno, está envenenando las relaciones”', 'El líder de Comunidad Ciudadana dijo que el mayor obstáculo para la paz en Bolivia es Evo Morales y “su ansia obsesiva para tomar el poder”', 'https://correodelsur.com/politica/20210731_mesa-evo-esta-entorpeciendo-al-gobierno-esta-envenenando-las-relaciones.html', 11, 2, 47, 1),
(589, 1627869044, 1630368000, 'Diputados de CC piden a Salamanca el informe, metodología y contrato de estudio de elecciones de 2019', 'Diputados del CC (Comunidad Ciudadana) quieren revisar el informe de la Universidad del Salamanca y verificar las credenciales de los investigadores para constatar que tienen experiencia suficiente para poder realizar un informe sobre el fraude de las elecciones del 2019', 'https://correodelsur.com/politica/20210731_diputados-de-cc-piden-a-salamanca-el-informe-metodologia-y-contrato-de-estudio-de-elecciones-de-2019.html', 11, 2, 47, 1),
(590, 1627869295, 1630195200, 'Comité pro Santa Cruz presenta impugnación y anuncia asamblea contra decisión fiscal sobre caso Fraude', 'El Comité pro Santa Cruz presentó una impugnación en contra de esta resolución de sobreseimiento que presentó la Fiscalía de La Paz sobre el proceso, además de un incidente de actividad procesal defectuosa ante el juez cautelar que está a cargo.', 'https://correodelsur.com/politica/20210729_comite-pro-santa-cruz-presenta-impugnacion-y-anuncia-asamblea-contra-decision-fiscal-sobre-caso-fraude.html', 11, 2, 47, 1),
(591, 1627878719, 1626652800, 'wiliams kaliman no salio de manera legal y es buscado por los hechos del 2019', 'katerin calderon valle habla sobre que la salida del comandante kaliman seria el 19 de mayo del 2019 despues se desconoce su paradero y su salida al exterior tambien se apreso a sus acompañnastes por los hechos que resultaron en la renuncia del ex presidente', '', 21, 2, 32, 1),
(592, 1627879592, 1626825600, 'audiencia de arturo murillo se realizara el 9 de agosto ', ' esperan el informe de la CIDH sobre los hechos de 2019 donde se conoceran las opiniones de los expertos donde los resultados son vinculantes hacia las violaciones de los derechos humanos ', '', 21, 2, 32, 1),
(593, 1627879976, 1626998400, 'dos ex jefes militares aprehendidos ', ' se lo apresa por los hechos de senkata se espera que de información por el momento usa el derecho constitucional de guardar silencio   ', '', 21, 2, 32, 1),
(594, 1627881258, 1627084800, 'relator especial de la ONU ve preocupante romocion de vocales', 'diego garcia sayan habla en su cuenta de twiter se refirio a la remocion de los vocales electorales en bolivia y dice ser una violacion al estado de derecho ', '', 21, 2, 32, 1),
(595, 1627881807, 1627257600, 'juzgado contra jeanine divide en dos sus acusaciones', 'se la traslada por 2 acusaciones uno por incumplimiento de deberes y dos por terrorismo y cedicion por lo cual su abogado cree que es una excusa para mantenerla dentro de la celda y asi evitar que se defienda en libertad', '', 21, 2, 32, 1),
(596, 1627911272, 1628640000, 'Titular de prueba ID', 'Resumen del titular de prueba ID', 'Http://titularid', 19, 2, 21, 1),
(597, 1627933195, 1627603200, 'El informe pondrá en evidencia el accionar de la derecha', 'el MAS advierte que presentarán informes donde se evidenciará el golpe de estado militar que interrumpió el orden democrático en 2019', '', 19, 2, 21, 1),
(598, 1627933566, 1627516800, 'resistencia juvenil cochala fue solventada por las FFAA', 'la fiscalía general del estado denuncia que la resistencia juvenil cochala fue solventada por las FFAA con armamento y ropa de militar, esto para dar el golpe de estado', '', 19, 2, 21, 1),
(599, 1627934103, 1627344000, 'Camacho, autor principal de golpe de estado', '					el expresidente de la Central Obrera Departamental	Cesar Gutierrez ha manifestado que Luis Fernando Camacho es autor derecto  del golpe de estado del 2019					', '', 19, 2, 21, 1),
(600, 1627934434, 1627516800, '7 informes desbaratan el fraude en las elecciones 2019', 'Siete organizaciones internacionales actuaron en el caso del fraude en Bolivia en las elecciones del 2019 y negaron la posibilidad.', '', 19, 2, 21, 1),
(601, 1627934595, 1627516800, '7 informes desbaratan el fraude en las elecciones 2019', 'Siete organizaciones internacionales actuaron en el caso del fraude en Bolivia en las elecciones del 2019 y negaron la posibilidad.', '', 19, 1, 21, 1),
(602, 1627936628, 1626998400, 'No hay noticia', 'No hay noticia sobre el tema', 'Radio frontera', 49, 2, 28, 1),
(603, 1627937457, 1627862400, 'JOINER CALPIÑEIRO PRESIDENTE DEL COMITE CIVICO DE PANDO NOS VISITA HOY', 'viaje a la asamblea de la cruceñidad a tomar 6 puntos en la ciudad de Tarija, como punto la persecución política, poder reconocer a los 9 presidente civicos para poder trabajar de una manera adecuada.', '', 54, 1, 45, 1),
(604, 1627937610, 1627344000, 'informe de la CIDH pondrá en evidencia el golpe de estado', 'El concejal de Sucre Oscar Sandy señaló que el informe respecto a la CIDH de la masacre de Sacaba y Sencata pondrá en evidencia la realidad del golpe de estado.', '', 19, 2, 21, 1),
(605, 1627938269, 1626912000, 'No hay noticia', 'No hay noticia sobre el tema', 'Radio frontera', 49, 1, 28, 1),
(606, 1627952033, 1627862400, 'Exvocal Gonzales pide procesos contra Mesa, Camacho y Villegas por denunciar “fraude”', 'El exvocal del Tribunal Supremo Electoral (TSE), Édgar Gonzales, afirmó este lunes que, luego de que la fiscalía cerró el caso fraude electoral, las exautoridades del Órgano Electoral iniciarán procesos contras aquellas personas que denunciaron la manipulación de las elecciones, como Carlos Mesa, Luis Fernando Camacho y Édgar Villegas.', 'https://www.lostiempos.com/actualidad/pais/20210802/exvocal-gonzales-pide-procesos-contra-mesa-camacho-villegas-denunciar', 12, 2, 44, 1),
(607, 1627952229, 1627862400, 'Cox: “No vamos a permitir que el manejo ilegal sea la regla”', 'El viceministro de Régimen Interior, Nelson Cox, advirtió hoy que las personas que anunciaron los bloqueos pueden ser sancionadas penalmente por la posesión de vehículos indocumentados y por impedir la libre transitabilidad. ', 'https://www.lostiempos.com/actualidad/pais/20210802/cox-no-vamos-permitir-que-manejo-ilegal-sea-regla', 12, 2, 44, 1),
(608, 1627952327, 1627862400, 'Plataformas solicitan a la fiscalía reabrir el caso fraude electoral', 'Plataformas del 21F, colectivos ciudadanos y el Comité de Defensa de la Democracia (Conade) presentaron este lunes ante la Fiscalía General del Estado, en Sucre, una petición para que se reabra el caso fraude electoral de los comicios de octubre de 2019.', 'https://www.lostiempos.com/actualidad/pais/20210802/plataformas-solicitan-fiscalia-reabrir-caso-fraude-electoral', 12, 2, 44, 1),
(609, 1627955714, 1627862400, 'Pericia para cerrar caso “fraude” tuvo un costo de Bs. 216 mil', 'El trabajo de pericia informática solicitado al Grupo de Investigación “Deep Tech Lab de Bisite” de la Fundación de la Universidad de Salamanca de España La Fiscalía, constitucionalmente, está obligada a cancelar cualquier tipo de servicios y, obviamente, al ser tan especializado no se podía dejar de honrar con “', 'https://impresa.lapatria.bo/noticia/1041045/pericia-para-cerrar-caso-fraude-tuvo-un-costo-de-bs-216-mil#articulo', 15, 2, 23, 1),
(610, 1627955720, 1627862400, 'Camacho confirma asistencia a la Asamblea de la Cruceñidad', 'El gobernador de Santa Cruz, Luis Fernando Camacho, confirmó ayer su asistencia a la Asamblea de la Cruceñidad que se realizará este lunes 2 de agosto, como expresidente del Comité Cívico, según declaró a los medios de comunicación de esa ciudad. ', 'https://impresa.lapatria.bo/noticia/1041055/camacho-confirma-asistencia-a-la-asamblea-de-la-crucenidad#articulo', 15, 2, 48, 1),
(611, 1627955991, 1627862400, 'Camacho confirma asistencia a la Asamblea de la Cruceñidad', 'El gobernador de Santa Cruz, Luis Fernando Camacho, confirmó ayer su asistencia a la Asamblea de la Cruceñidad que se realizará este lunes 2 de agosto, como expresidente del Comité Cívico, según declaró a los medios de comunicación de esa ciudad. ', 'https://impresa.lapatria.bo/noticia/1041055/camacho-confirma-asistencia-a-la-asamblea-de-la-crucenidad#articulo', 15, 2, 48, 1),
(612, 1627958404, 1627862400, 'Bartolinas advierten a Camacho con reversión de tierras y procesos.', 'Flora Aguilar, líder de la Confederación de Mujeres Campesinas Bartolina Sisa, advirtió este lunes al gobernador cruceño Fernando Camacho, con revertir las tierras que fueron saneadas durante el gobierno “de facto”, si sobrepasan las 5.000 hectáreas permitidas por la Carta Magna, y con juicios, si es que insiste en administrar tierras desde la Gobernación de Santa Cruz.', 'https://www.paginasiete.bo/economia/2021/8/2/bartolinas-advierten-camacho-con-reversion-de-tierras-procesos-302807.html?__twitter_impression=true', 14, 2, 34, 1),
(613, 1627958523, 1627862400, 'Web de Salamanca ya no permite revisar hojas de vida de estudiantes que firmaron la pericia', 'La website de la Universidad de Salamanca ya no permite revisar los currículums de los dos estudiantes, Manuel López y Pablo Plaza, que firmaron el informe sobre el proceso electoral 2019. El portal solo da acceso para ver la hoja de vida del docente a cargo del análisis, Juan Manuel Corchado.', 'https://www.paginasiete.bo/nacional/2021/8/2/web-de-salamanca-ya-no-permite-revisar-hojas-de-vida-de-estudiantes-que-firmaron-la-pericia-302790.html?_', 14, 2, 34, 1),
(614, 1627958610, 1627862400, 'Exvocal del TSE pide procesar a Mesa, Camacho y Villegas por denunciar el fraude electoral.', 'Sobre la base del informe de un grupo de la Universidad de Salamanca que señala que no hubo alteración de datos en las elecciones del 2019, el exvocal del exvocal del Tribunal Supremo Electoral (TSE) Édgar Gonzales manifestó este lunes que solicitará a la Fiscalía procesos en contra del líder de Comunidad Ciudadana (CC), Carlos Mesa, el gobernador de Santa Cruz, Luis Fernando Camacho, y el ingeniero Édgar Villegas, quienes denunciaron el presunto fraude electoral.', 'https://www.paginasiete.bo/nacional/2021/8/2/exvocal-del-tse-pide-procesar-mesa-camacho-villegas-por-denunciar-el-fraude-electoral-302786.html?__twitt', 14, 2, 34, 1),
(615, 1627958925, 1627862400, 'Exmandataria será cautelada este martes por dos delitos', 'Se otorgará una segunda detención preventiva a la ex presidente Jeanine Añez por el caso golpe de estado', 'https://www.youtube.com/watch?v=covpDU2LDCE', 32, 2, 43, 1),
(616, 1627958983, 1627862400, 'La Asamblea de la Cruceñidad incomoda al Gobierno y genera tensiones', 'La Asamblea de la Cruceñidad se reunirá este lunes para analizar la problemática de la tierra y la situación política, marcada por los procesos legales por el caso del supuesto golpe de Estado', 'https://eldeber.com.bo/santa-cruz/la-asamblea-de-la-crucenidad-incomoda-al-gobierno-y-genera-tensiones_241521?utm_term=Autofeed&utm_medium=Social&utm_', 17, 2, 16, 1),
(617, 1627959159, 1627862400, 'Caen presos autores del asesinato del propietario de local de venta de pollos', 'Con la detención de los presuntos autores, la Fuerza Especial de Lucha Contra el Crimen (Felcc) dio por esclarecido el asesinato del propietario de un local de venta de pollos, ubicado en el octavo anillo, zona del Cambódromo.', 'https://eldeber.com.bo/santa-cruz/caen-presos-autores-del-asesinato-del-propietario-de-local-de-venta-de-pollos_241510?utm_term=Autofeed&utm_medium=So', 17, 2, 16, 1),
(618, 1627959179, 1627862400, 'Camacho presenta nueva denuncia contra el INRA y anuncia sesión de la CAD en sus instalaciones.', 'Luego de una nueva inasistencia de representantes del Instituto Nacional de Reforma Agraria (INRA) en la Comisión Agraria Departamental (CAD), el gobernador de Santa Cruz, Luis Fernando Camacho, anunció este lunes acciones legales contra el titular de la institución. ', 'https://www.paginasiete.bo/economia/2021/8/2/camacho-presenta-nueva-denuncia-contra-el-inra-anuncia-sesion-de-la-cad-en-sus-instalaciones-302782.html?', 14, 2, 34, 1),
(619, 1627959290, 1627862400, 'Corchado dice que su misión no era dilucidar si hubo fraude y que el informe debía ser interno.', 'El docente de la Universidad de Salamanca Juan Manuel Corchado, quien fue el encargado del grupo de investigación que hizo la pericia del proceso electoral de 2019, manifestó que su trabajo no era dilucidar si hubo fraude electoral. Además dijo que tenían entendido que el documento iba a tener carácter interno para uso de la Fiscalía General del Estado y no público.', 'https://www.paginasiete.bo/nacional/2021/8/2/corchado-dice-que-su-mision-no-era-dilucidar-si-hubo-fraude-que-el-informe-debia-ser-interno-302780.html?', 14, 2, 34, 1),
(620, 1627959491, 1627862400, 'Comités chiquitanos bloquearán la carretera a San José y el paso del tren ante inasistencia del INRA a la CAD', 'Será por 48 horas desde el 9 de agosto. Este lunes la Comisión Agraria Departamental fue suspendida por segunda vez, luego de que el pasado 8 de julio se postergara por la misma razón: la inasistencia de Adalberto Rojas, director regional del INRA', 'https://eldeber.com.bo/santa-cruz/comites-chiquitanos-bloquearan-la-carretera-a-san-jose-y-el-paso-del-tren-ante-inasistencia-del-inra_241548?utm_medi', 17, 2, 16, 1),
(621, 1627959744, 1627862400, 'Denuncian a director de Transparencia de Educación.', 'Una de las víctimas del presunto “tráfico de exámenes”, Édgar Pari, denunció ante la Fiscalía, por incumplimiento de deberes, al director general de Transparencia del Ministerio de Educación, Luis Nina. El denunciante postuló en abril a la subdirección de educación superior en Tarija.', 'https://www.paginasiete.bo/seguridad/2021/8/2/denuncian-director-de-transparencia-de-educacion-302732.html?__twitter_impression=true', 14, 2, 34, 1),
(622, 1627959812, 1627862400, 'Operativo conjunto decomiza droga en un hotel ', 'En el hotel triller decomisaron droga y aprendieron a un ciudadano Boliviano', 'https://www.facebook.com/1250405015015469/posts/4057283750994234/', 27, 2, 20, 1),
(623, 1627959979, 1627862400, 'Jhonny Fernández: La relación con el Gobierno central es amigable.', 'La relación con el Gobierno central es amigable, estamos trabajando en programas y proyectos, creo que esa es la conducta que debemos tener todos porque los tres poderes del Estado: el poder nacional, departamental y municipal deben ir de la mano en función del bienestar del ciudadano. Aquí no tenemos que tener mezquindad y debemos pensar más en el ciudadano, y los programas y proyectos que el Gobierno nacional tenga y sean favorables a Santa Cruz, van a ser bienvenidos. ', 'https://www.paginasiete.bo/nacional/2021/8/2/jhonny-fernandez-la-relacion-con-el-gobierno-central-es-amigable-302746.html?__twitter_impression=true', 14, 2, 34, 1),
(624, 1627960191, 1627862400, 'Obras Públicas, en la mira por contrataciones «anómalas».', 'Contrataciones anómalas y procesos irregulares de nombramientos en el Ministerio de Obras  Públicas son parte de las denuncias   contra esta cartera de Estado. La diputada de Comunidad Ciudadana (CC) Gabriela Ferrel hizo una petición de informe escrito (PIE) sobre el tema al ministro Édgar Montaño, requerimiento  que todavía no fue respondido.', 'https://www.paginasiete.bo/economia/2021/8/2/obras-publicas-en-la-mira-por-contrataciones-anomalas-302742.html?__twitter_impression=true', 14, 2, 34, 1),
(625, 1627960664, 1627862400, 'Experto de la Universidad de Salamanca, afirmó que el proceso electoral de 2019 tuvo muchas infracciones, y no confirma si hubo o no fraude electoral.', '												La pericia informática solicitada por la Fiscalía General del Estado a la Universidad de Salamanca, España, identificó errores imperdonables para un proceso electoral, como el acceso de muchas personas desconocidas a la base de datos que podrían manipularlo todo y la paralización del TREP. Pero a pesar de ello, no identificaron ningún tipo de alteración o modificación en las actas y columnas. Sin embargo el experto aclaró que no hicieron un análisis como el de la OEA y dijo que serán los jueces bolivianos quienes deberán determinar si huno o no fraude electoral.										', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(626, 1627960871, 1627862400, 'Suspenden la segunda audiencia de Janine Añez.', 'Suspenden la segunda audiencia cautelar contra la expresidenta Jeanine Añez por el caso golpe de Estado. La defensa de Añez pidió una acción de libertad y no está de acuerdo que se lleve dos procesos en un mismo caso.', '', 35, 2, 34, 1),
(627, 1627961079, 1627862400, 'Jueces, fiscales y abogados, los principales responsables de la retardación de justicia.', 'Las audiencias de cesación a la detención preventiva también se suspenden por ausencia del abogado de la otra parte (24%), por falta de notificación (16,8%), por ausencia de testigos o peritos (9,4%), por falta de transporte (6,3) y por falta de custodios (6,3%). Estos datos son del censo carcelario.', '', 35, 2, 34, 1),
(628, 1627961460, 1627862400, 'Justicia niega cesación a la detención preventiva solicitada por Yassir Molina.', 'La Justicia en Sucre negó la solicitud de cesación a la detención preventiva al líder de la Resistencia Juvenil Cochala (RJC), Yassir Molina, porque su defensa no logró desvirtuar los riesgos procesales. ', '', 23, 2, 34, 1),
(629, 1627962022, 1627862400, 'Alcalde de San Julián denuncia que élites cruceñas quieren apropiarse de las tierras.', 'El alcalde del municipio de San Julián, en Santa Cruz, Willi Calderón, denunció que las élites de esa región intentan recuperar tierras para entregarlas a los extranjeros, excluyendo a ,os pueblos indígenas y campesinos. Ante ello, llamó a la unidad contra esos afanes y dijo que no se permitirán nuevos actos de racismo y discriminación contra los más pobres.', '', 23, 2, 34, 1),
(630, 1627962614, 1627862400, 'Chavéz reta a mesa a presentar pruebas en el caso fraude electoral.', 'El procurador general del Estado, Wilfredo Chávez, manifestó que no hubo manipulación de datos durante el supuesto \"fraude electoral\" y retó a la posición a presentar pruebas del caso.', '', 23, 2, 34, 1),
(631, 1627962792, 1627862400, 'El fuego cerco Viru Viru', 'Viru Viru amanece en llamas, se desconoce las causas del incendio, el daño material es bastante se tiene un deposito  quemado, los vuelos quedaron suspendidos no hay entradas ni salidas, y el daño ambiental es catastrófico, los vecinos e instituciones ambientales ayudan a apagar los focos de incendio.  ', 'https://www.redbolivision.tv.bo/video/noticieros-al-dia-programa-completo-del-02-de-agosto-del-2021/', 22, 2, 31, 1),
(632, 1627962847, 1627862400, 'Richter señala que el informe de la Universidad de Salamanca desmonta toda la narrativa del fraude.', 'El vocero presidencial, Jorge Richter, sostuvo este lunes que el peritaje de la Universidad de Salamanca de España sobre los resultados electorales de 2019 deja sin argumentos a sectores opositores que hacen énfasis en la narrativa del fraude.', '', 23, 2, 34, 1),
(633, 1627963029, 1627862400, 'Evo señala que el argumento de fraude es la mentira del siglo de Mesa y Almagro de la OEA.', 'El expresidente del Estado, Evo Morales, afirmó hoy que la denuncia de un presunto fraude electoral en las elecciones anuladas del 2019 es la mentira del siglo para justificar el golpe de Estado en su contra.', '', 23, 2, 34, 1),
(634, 1627963070, 1627862400, 'Bancadas de Creemos y Comunidad Ciudadana no asistirán a la inauguración del nuevo Hemiciclo.', 'Bancadas de ambas fuerzas políticas de oposición, declaran que no asistirán a la inauguración del nuevo hemiciclo; por parte de Comunidad Ciudadana lo hace como medio de protesta por los gastos del nuevo Hemiciclo que consideran un despilfarro y por parte de Creemos, por considerar que la oposición está marginada de las decisiones políticas.', '', 43, 2, 46, 1),
(635, 1627963354, 1627862400, 'Asamblea de la cruceñidad se concreta la tarde de este lunes, con tres temas como ejes de discusión', 'El tema de tierra y territorio por las acusaciones de asentamientos ilegales en el oriente boliviano; la revisión de la ley sobre enriquecimiento ilícito y el cierre del caso Fraude Electoral, son las temáticas a debatir en dicha asamblea', '', 43, 2, 46, 1),
(636, 1627963475, 1627862400, 'Opositores rechazan cierre del caso fraude', 'En CC no aceptan que el caso fraude sea cerrado como lo manifiesta el fiscal general del Estado,en todo caso, si se cerrara ni el presidente Arce ni los asambleístas gozarían de legitimidad. ', '', 24, 2, 29, 1),
(637, 1627963565, 1627862400, 'Asambleístas entregan nuevo edificio.  ', 'En la Ciudad de La Paz se inauguro el nuevo edificio de la asamblea, consta de 25 pisos sobre 44mil metros cuadrados y tiene una infraestructura inteligente. ', 'https://www.redbolivision.tv.bo/video/noticieros-al-dia-programa-completo-del-02-de-agosto-del-2021/', 22, 2, 31, 1),
(638, 1627963568, 1627862400, 'Se instala la asamblea de la cruceñidad', 'Asisten las instituciones afiliadas al comité cívico de Santa Cruz, tratan temas vinculados a la tierra y al cierre denominado caso fraude, algunas imposiciones sugieren encaminar un paro nacional', '', 24, 2, 29, 1),
(639, 1627963642, 1626825600, 'El gobernador de Potosí anunció un proyecto de ley  a la asamblea legislativa para otorgar el bono estudiantil', 'El Gobernador de Potosí Jhonny Mamani en  conferencia de prensa anunció la presentación de un proyecto de ley a la asamblea legislativa departamental para otorgar a más de 223.000 estudiantes del departamento el bono estudiantil de 500bs para lograr la reactivación económica 2021, este bono tiene la característica de entregar a todos los estudiantes de los niveles de inicial primaria y secundaria tanto de escuelas fiscales, privadas y de convenio, noticia que fue aplaudida por los padres de familia porque no discrimina a ningún estudiante. Ahora corresponde a los Asambleístas para que través de la comisión económica hará una evaluación y remita al órgano deliberante para que en la sala plena apruebe o rechaze.', '', 42, 2, 36, 1),
(640, 1627963696, 1627862400, 'Medidas de presión del Movimiento de Emergencia Nacional por la devolución de los aportes de trabajadores genera acuerdos y un proyecto de ley.', 'Yerko Orozco, representante del Movimiento de Emergencia Nacional que presiona por la devolución de aportes de trabajadores, anuncia que; acuerdos y un proyecto de ley que se espera se promulgue hasta el 10 de agosto, son los resultados de las medidas de presión aplicadas; en caso de no cumplirse dichas expectativas declaran que las medidas de presión persistirán.', '', 43, 2, 46, 1),
(641, 1627963804, 1627257600, 'La presidenta del Concejo Municipal Marta Guzmán Sugiere al ejecutivo municipal modificar el pan operativo POA 2021.', 'La presidenta  del Concejo Municipal de Potosí Mara Guzmán sugiere  al Ejecutivo Municipal modificar el POA 2021 para evitar  solicitar las modificaciones presupuestarias mensualmente para obtener recursos económicos y también dijo que se tiene que ver que de acuerdo al reglamento y así el alcalde de Potosí haga una modificación del   POA de acuerdo a la visión que tiene y con la gente obviamente apoyando debería hacer en función a eso el POA.', '', 42, 2, 36, 1),
(642, 1627963816, 1627862400, 'Congreso del MAS será el miércoles', 'Propondrán medidas ejemplares para los traidores, en el evento aprobarán sus nuevas normas partidarias donde se incluiría la sanción para quienes traicionen a su partido, también para los que hacen quedar mal a esa fuerza política.', '', 24, 2, 29, 1),
(643, 1627963934, 1627344000, 'La junta distrital de padres de familia que a través de su principal ejecutivo Edwin Canaviri pide al alcalde municipal de Potosí cumplir el compromiso firmado para la entrega del desayuno escolar.', 'Uno de los padres de familia comenta que  primero hubo movilizaciones de lo padres de familia en función a una canasta estudiantil en función a las necesidades donde se tuvo una reunión con el Alcalde de Potosí , donde se ha pedido que se trabaje de forma responsable técnica. Jurídica y administrativamente es por eso donde se llegó a un acuerdo y acta firmado, donde ellos dicen que es vial la canasta estudiantil y ahora nos dice que es inviable. ', '', 42, 2, 36, 1),
(644, 1627964165, 1627862400, 'En las últimas horas parlamentarios de oposición rechazaron cualquier proceso que se pueda realizar contra la Iglesia católica por los hechos en octubre y noviembre de 2019', 'Silvia Salomé - Senadora Nacional, indica que el procurador está completamente desacertado, pues le debe el estar en su puesto gracias a la mediación de la iglesia católica que logró evitar una catástrofe en los sucesos de 2019, recalca que no está dicha la última palabra en el caso fraude pues se están realizando las impugnaciones necesarias. ', '', 24, 2, 29, 1),
(645, 1627964258, 1627516800, 'El viceministerio de transparencia investiga las denuncias que surgieron en el ministerio de educación.', 'El viceministro de Transparencia investigara las denuncias en el Ministerio de Educación donde una viceministra acuso al titular de ese despacho Adrián Quelka por trafico de exámenes en el proceso de institucionalización del cargos directos del sistema educativo y aunque luego se conoció que existe un proceso de  investigación anterior contra ella por uso indebido de influencias.', '', 42, 2, 36, 1),
(646, 1627964396, 1627862400, 'Creemos advierte que nueva estructura no suple la falta de independencia de la ALP', 'Erwin Bazán, jefe de la bancada Creemos en la cámara de Diputados, la moderna infraestructura no soluciona en nada la falta de independencia a causa de la injerencia del poder ejecutivo. También se refirió al informe de la universidad de Salamanca en la que La fiscalía se basó para cerrar el caso de fraude electoral, agrega que el fiscal Juan Lanchipa hace una observación arbitraria al documento que en todo caso tiene alcances limitados en comparación de la auditoria de la OEA sobre las elecciones anuladas 2019.', '', 38, 2, 29, 1),
(647, 1627964528, 1627516800, 'Ex vocales forman asociación para pedir  resarcimiento por persecución política del año 2019  ', 'Los ex vocales conformaron una asociación tras haber sido sobreseído por los cargos por la fiscalía al  no hallarse pruebas de un fraude en las elecciones del 2019 y que  en una conferencia de prensa se hizo el anunció el martes a la fiscalía General del Estado donde se  presento un informe oficial que descartó una manipulación informática en los comicios, como señala una auditoria por la Organización de Estados Americanos (OEA) ', '', 42, 1, 36, 1),
(648, 1627964676, 1627516800, 'El alcalde municipal Jhonny Llally de Potosí informa que estará en los actos en Sucre por el aniversario de Bolivia.', 'El alcalde Municipal estará en Sucre para los actos del 6 e agosto, según el alcalde habla y dice que respetuosamente  tenemos que participar en la iza de la bandera en la casa de la libertad  el día 2 de agosto.', '', 42, 2, 36, 1),
(649, 1627964803, 1627603200, 'Según el reglamento, las sesiones de la asamblea legislativa cada 6 de agosto deben realizarse en Sucre capital del país la demanda fue presentado por los parlamentarios.', 'Cuatro parlamentarios de Comunidad Ciudadana presentaron una acción de cumplimiento contra el vicepresidente del país y presidente de la Asamblea Legislativa David Choquehuanca y así dando cumplimiento al articulo 155 y que por cierto en los tiempos es oportuna esta presentación. Por no a ver cumplido con la constitución que define que las sesiones de la Asamblea Legislativa cada 6 de agosto deben realizarse en Sucre Capital del país  y no así en la ciudad de La Paz, la demanda fue presentada por los parlamentarios.', '', 42, 2, 36, 1),
(650, 1627964947, 1627430400, 'El ex presidente del tribunal supremo electoral de Santa cruz respaldan el informe de expertos internacionales diciendo que no hubo manipulación informática.', 'Según el ex presidente de del TSP de Santa cruz Eulogio Nuñez dice” no hubo fraude y que se hizo la verificación del cómputo, se investigó en los  14 meses y 17dias  y no pillaron absolutamente nada y después que no tenían nada que decir nos acusaban o había sobre seguimiento y los vocales electorales apelaron, se su pone que son especialistas en materia electoral y con eso ha sido cerrado”.', '', 42, 1, 36, 1),
(651, 1627965177, 1627689600, 'Ex presidenta del concejo municipal aplaude la sentencia constitucional y califico al ex alcalde López como parte del golpe del municipio.', 'Sentencia emitida por por el Tribunal constitucional plurinacional , tambien  tiene otros actores que dice al respecto la ex presidenta del concejo municipal Isabel Hugarte la Torre quien habla de la revocatoria de la tutela a favor de López Oporto que le permitió ilegalmente mantenerse en el cargo.', '', 42, 2, 36, 1),
(652, 1627965313, 1626912000, 'Conferencia de prensa', 'Conferencia de prensa en el comite electoral-invitación a los adultos mayores para elección ( sab,31-Agos-2021)', 'RADIO PERLA DEL ACRE DIGITAL. ///  En conferencia de prensa el comité electoral de la Asociacion del Adulto Mayor  llama a elecciones para la elección', 41, 1, 35, 1),
(653, 1627965339, 1626912000, 'Parlamentarios de Comunidad Ciudadana de Chuquisaca emitieron un pronunciamiento en rechazo a la convocatoria de la directiva de la asamblea legislativa por la sesión de honor y festejos del 6 de agos', 'El diputado Marcelo Pedraza recuerda que la constitución política del estado instituye que Sucre donde se firmo el acta de Independencia es el escenario donde debe desarrollarse esta actividad cada 6 de agosto de cada año.', '', 45, 2, 36, 1),
(654, 1627965901, 1627862400, 'Militar procesado por el caso, supuesto golpe, lamenta abandono de las FF.AA.', '						Ex-jefe militar, reclama por las condiciones en las que esta hospitalizado y pide por su seguridad ya que esta detenido desde hace una semana en la cárcel de San Pedro de Sacaba, donde el 85% de los reos son del Trópico cochabambino. Denuncia también que en su proceso hay situaciones raras de tipo procedimental, ya que su caso fue sorteado a un juez de Chimoré. 					', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(655, 1627968102, 1627776000, 'CC ve \"afrenta\" en gasto del nuevo edificio legislativo; no asistirá a la inauguración', 'Los parlamentarios de Comunidad Ciudadana decidieron no asistir al acto de inauguración del nuevo edificio de la Asamblea Legislativa, previsto para este lunes 2 de agosto. Su decisión es un acto de repudio al derroche de dinero, viviendo en un país donde el sistema sanitario es tan precario, pero si pueden tener edificaciones de millones.', 'https://correodelsur.com/politica/20210801_cc-ve-afrenta-en-gasto-del-nuevo-edificio-legislativo-no-asistira-a-la-inauguracion.html Leído en Periódico', 11, 2, 47, 1),
(656, 1627968462, 1627862400, 'Choquehuanca llama a construir un “pensamiento descolonizado” desde el Legislativo', 'El vicepresidente de Bolivia, David Choquehuanca, sostuvo este lunes que el “proceso de cambio” del Movimiento Al Socialismo (MAS) es para “cambiar todo”, por lo que llamó a que en la sede de la Asamblea Legislativa Plurinacional se construya un “pensamiento descolonizado”. Dijo además que desde el legislativo se deben crear leyes pensadas para la descolonizsción. ', 'https://correodelsur.com/politica/20210802_choquehuanca-llama-a-construir-un-pensamiento-descolonizado-desde-el-legislativo.html Leído en Periódicos B', 11, 2, 47, 1),
(657, 1627968771, 1627862400, 'Evo: “Opté por cambios en democracia y renuncié para evitar violencia”', 'El ex Presidente Evo Morales dijo que Mesa no tiene moral para hablar de paz y reconciliación, recordando cuando fue Vicepresidente de Gonzalo Sanchez de Lozada mencionando las masacres y los casos por los que aún no les dio resolución, además señaló que Mesa fue \"socio\" de Añez ', 'https://correodelsur.com/politica Leído en Periódicos Bolivianos http://www.munben.com/newspapers/stores/bol/ @munbensa', 11, 2, 47, 1),
(658, 1627999581, 1627862400, 'Diputados presentan acción de cumplimiento al Tribunal Departamental de Justicia por las celebraciones del 6 de agosto.', 'Diputados de Comunidad Ciudadana presentaron ante el Tribunal Departamental de Justicia una acción de cumplimiento para la aplicación del art 155 de la CPE, para el desarrollo de actos conmemorativos del 6 de agosto en la capital constitucional', 'https://www.facebook.com/TvSucreUSFX/videos/4482683861796318', 20, 2, 54, 1),
(659, 1628002974, 1626912000, 'Conferencia de prensa', 'Conferencia de prensa en el comite electoral-invitación a los adultos mayores para elección ( sab,31-Agos-2021)', 'RADIO PERLA DEL ACRE DIGITAL. ///  En conferencia de prensa el comité electoral de la Asociacion del Adulto Mayor  llama a elecciones para la elección', 41, 1, 35, 1),
(660, 1628008849, 1627430400, 'Taller de capacitacion por la Gobernación,sobre:preveción de incendio y primero auxilio', 'La unidad de riesgo y desastre fue capacitada por el personal ( Guardia Municipal, Gobernación,etc )', 'RADIO PERLA DEL ACRE DIGITAL.  ///  La Unidad de Gestión de Riesgo Y Desastre, junto a la Guardia Municipal y personal de la Dirección Municipal de Se', 41, 1, 35, 1),
(661, 1628009633, 1627516800, 'Iglesia católica,informe del parofoco ', 'El parofoco de la iglesia católica JUAN ELIA SIRIPI,se refiere al informe presentaro por el fiscal general', 'ACTIVAtv |  IGLESIA CATÓLICA   PÁRROCO DE LA IGLESIA CATÓLICA JUAN ELIAS SIRIPI, SE REFIERE AL INFORME PRESENTADO POR EL FISCAL GENERAL. ///', 41, 1, 35, 1),
(662, 1628017300, 1627603200, 'Gobierno enviará 20 toneladas de jeringas y alimentos y equipos de bioseguridad a cuba', 'Ministra MARIA NELA PRADA informó que se enviará a cuba 20 toneladas de jeringas,alimentos y equipos de bioseguridad, en un avión Hercules. La donación fue aprobada,mediante el decreto supremo ( DS )4557.', 'ACTIVAtv | NACIONAL   GOBIERNO ENVIARÁ 20 TONELADAS DE JERINGAS, ALIMENTOS Y EQUIPOS DE BIOSEGURIDAD A CUBA . ///  La ministra de la Presidencia, Marí', 41, 1, 35, 1),
(663, 1628019073, 1627948800, 'Policía investiga sobre material explosivo hallado en oficina de la Gobernación de Tarija', 'La Policía Nacional investiga las razones sobre el almacenamiento de nitroglicerina en una oficina del edificio Elena, donde alquila la Gobernación de Tarija, en la avenida La Paz.', 'https://eldeber.com.bo/tarija/policia-investiga-sobre-material-explosivo-hallado-en-oficina-de-la-gobernacion-de-tarija_241685?utm_medium=Social&utm_s', 17, 2, 16, 1),
(664, 1628023247, 1627948800, '2da nueva audiencia contra la ex presidenta yaninne añez sobre el caso golpe de estado', 'Se amplio y se separo en diferentes casos contra la ex presidenta yaninne añez eso hace que se atrase su detencion preventiva señalo su abogado defensor. ', 'Radio frontera', 49, 2, 28, 1),
(665, 1628029793, 1627862400, 'Fiscalia pide ampliación de detención preventiva para un juez imputado por violación', 'El fiscal departamental de pando, MARCO PEÑARANDA, explicó que, en audiencia de medidas cautelares desarrollado el 17 de julio, la fiscalia fundamentó con pruebas suficientes que un funcionario judicial rudiger L.A.M de 58 años, es con probabilidad autor del delito de violación agravada cometido en contra de una adolescente de 14 años quien fue agredida sexualmente desde que tenia 12 años fruto de ello quedo embarazada', 'ACTIVAtv | DETENCIÓN PREVENTIVA   FISCALÍA PIDE AMPLIACIÓN DE DETENCIÓN PREVENTIVA PARA UN JUEZ IMPUTADO POR VIOLACIÓN. ///  El Fiscal Departamental d', 41, 1, 35, 1),
(666, 1628031849, 1627948800, 'Falta de Hegemonía derumba el discurso del fraude electoral', 'El análista Hugo Molis dijó que el discurso del fraude no logro hacerse hegemónica en la narrativa de todos y eso produjo el derrumbe del mismo ya que establecieron ese discurso pars poder tapar el golpe de Estado que le produjeron a la democracia Boliviana.', '', 47, 2, 34, 1),
(667, 1628032817, 1627862400, 'Richter: ‘Lo que en realidad existió fue un armado artificial de fraude electoral’', 'El vocero presidencial Jorge Richter afirmó que en la crisis de 2019 lo que en existió fue un armado artificial de fraude electoral para establecer un gobierno de facto, agregó que el “fraude” solamente fue un elemento que los sectores que estaban movilizados en 2019 usaron para “validar un conjunto de acciones fuera de la norma, que finalmente les dio resultado pues Evo Morales renunció a la presidencia”.', 'https://www.la-razon.com/nacional/2021/08/02/richter-lo-que-en-realidad-existio-fue-un-armado-artificial-de-fraude-electoral/', 53, 2, 29, 1),
(668, 1628033206, 1627862400, 'Asamblea cruceña reúne a sectores opositores al Gobierno y define rearticular el movimiento cívico', 'La Asamblea de la Cruceñidad fustigó al Gobierno y decidió recurrir a instancias nacionales e internacionales para evitar el cierre del caso “fraude electoral”, rearticular el movimiento cívico, sumarse y coordinar la marcha nacional del jueves y apoyar el bloqueo en San José de Chiquitos. En la cita asistieron el representante del comité Nacional por la Defensa de la Democracia (CONADE) Manuel Morales, la exdirigenta de esposas de policías Guadalupe Cárdenas, la presidenta de la Asamblea de DDHH de Bolivia Amparo Carvajal y el dirigente cívico de La Paz Antonio Alarcón. El presidente cívico Rómulo Calvo y el gobernador Luis Fernando Camacho estuvieron al frente de la máxima instancia de decisión cruceña.  ', 'https://www.la-razon.com/nacional/2021/08/02/asamblea-crucena-reune-a-sectores-opuesto-al-gobierno-y-define-rearticular-el-movimiento-civico/', 53, 2, 29, 1),
(669, 1628033482, 1627948800, 'Novillo advierte a cívicos que se actuará ‘con mano firme’ si cometen excesos', 'El ministro de Defensa, Edmundo Novillo, advirtió a los cívicos que se actuará “con mano firme” si es que durante sus anunciadas protestas cometen excesos o actos irregulares. Indicó que se hará cumplir la ley absolutamente ante todos los posibles hechos irregulares aunque están permitidas en el marco democrático éstas no deben cometer excesos. ', 'https://www.la-razon.com/nacional/2021/08/03/novillo-advierte-a-civicos-que-se-actuara-con-mano-firme-si-cometen-excesos/', 53, 2, 29, 1),
(670, 1628036032, 1627948800, 'La Justicia ordena otros seis meses de detención contra Áñez, la expresidenta la califica de ‘injusta’', 'A horas de su audiencia de cesación de detención, la Justicia determinó otros seis meses de detención preventiva, a partir de la fecha, contra la expresidenta Jeanine Áñez en el proceso abierto por la ampliación o división del caso “golpe de Estado”. Áñez calificó de “injusta” la decisión, indicando que violan los derechos humanos y las garantías, sin justicia en Bolivia no hay democracia, declaró mediante su twitter.', 'https://www.la-razon.com/nacional/2021/08/03/la-justicia-ordena-otros-seis-meses-de-detencion-contra-anez-la-expresidenta-la-califica-de-injusta/', 53, 2, 29, 1),
(671, 1628036272, 1627948800, 'CC repudia política de derroche de recursos públicos del Gobierno', 'No vamos a ir a aplaudir el exceso, la ostentación y el despilfarro que el Gobierno del MAS (Movimiento Al Socialismo), durante 15 años operó en el país”, afirmó ayer el diputado Enrique Urquidi en representación de la bancada de Comunidad Ciudadana (CC). ', 'https://impresa.lapatria.bo/noticia/1041097/cc-repudia-politica-de-derroche-de-recursos-publicos-del-gobierno#articulo', 15, 2, 48, 1),
(672, 1628036288, 1627948800, 'Rearticulan movimiento cívico nacional en defensa de la democracia y libertad', 'La Asamblea de la Cruceñidad extraordinaria denominada por la “libertad y la democracia” aprobó este lunes rearticular el movimiento cívico nacional, realizar acciones “necesarias y legales” para que se pueda sancionar a los responsables del caso fraude electoral de 2019 y convocó una marcha este 5 de agosto.', 'https://impresa.lapatria.bo/noticia/1041107/rearticulan-movimiento-civico-nacional-en-defensa-de-la-democracia-y-libertad#articulo', 15, 2, 23, 1),
(673, 1628036295, 1627948800, 'Caso fraude, tierras y persecución reactivan movilizaciones de cívicos, Conade y plataformas', 'La Asamblea de la cruceñidad aprobó una serie de medidas en torno al conflicto de tierras y el cierre del caso \"fraude electoral\" y anunció movilizaciones para el 5 de agosto. Estas se realizarán de forma paralela a las determinadas del Comité de Defensa de la Democracia (Conade) que tiene previsto hacer protestas en las calles el próximo 6 de agosto.', 'https://www.lostiempos.com/actualidad/pais/20210803/caso-fraude-tierras-persecucion-reactivan-movilizaciones-civicos-conade', 12, 2, 44, 1),
(674, 1628036318, 1627948800, 'El Tribunal Constitucional desahucia la ‘sucesión constitucional’ de Jeanine Áñez en 2019', 'En respuesta a la comisión de fiscales que investiga el caso Golpe de Estado, el Tribunal Constitucional Plurinacional (TCP) desahució la “sucesión constitucional” de Jeanine Añez y aclaró que en sus archivos no encontró “sentencia, declaración o auto constitucional” que sustente la constitucionalidad o no de dicha proclamación en 2019.', 'https://www.la-razon.com/nacional/2021/08/03/el-tribunal-constitucional-desahucia-la-sucesion-constitucional-de-jeanine-anez-en-2019/', 53, 2, 29, 1),
(675, 1628036427, 1627948800, 'Detienen a una de las líderes de la RJC, Milena Soto', 'Una de las líderes de la agrupación Resistencia Juvenil Cochala (RJC), Milena Soto, fue aprehendida en la ciudad de Cochabamba, por efectivos de la Policía. Fue trasladada a instalaciones de la Fuerza Especial de Lucha Contra el Crimen (FELCC). Miembros de la RJC son investigados por hechos de violencia cometidos en Cochabamba contra quienes se manifestaban en favor del MAS y del expresidente Evo Morales en noviembre de 2019, en medio de la crisis política y social; Mario Bascopé también se encuentra detenido en la cárcel de Sucre.', 'https://www.la-razon.com/nacional/2021/08/03/detienen-a-una-de-las-lideres-de-la-rjc-milena-soto/', 53, 2, 29, 1),
(676, 1628036433, 1627948800, 'Conade y plataformas protestarán el 5 y 6 de agosto contra la persecución y el cierre del caso fraude', 'Representantes de plataformas ciudadanas del 21F anunciaron que realizarán movilizaciones entre el 5 y 6 de agosto, en las fiestas patrias, porque consideran que la Fiscalía y el Gobierno atentan contra la democracia.En tanto, el Comité de Defensa de la Democracia (Conade) también emitió una convocatoria a protestas para el 5 de agosto, pidiendo la renuncia del fiscal general, Juan Lanchipa, la reforma del Ministerio Público, el respeto de las garantías constitucionales, la libertad de las personas injustamente detenidas y contra el cierre del caso fraude electoral. ', 'https://www.lostiempos.com/actualidad/pais/20210803/conade-plataformas-protestaran-5-6-agosto-contra-persecucion-cierre-del', 12, 2, 44, 1),
(677, 1628038773, 1627948800, 'Defensa del ex ministro de facto Arturo Murillo, nuevamente pide suspensión de audiencia', 'La defensa de Arturo Murillo estaría pidiendo por tercera vez la suspensión de la audiencia para el próximo 8 de septiembre, el procurador sostuvo que hasta el momento la audiencia se mantiene para el 9 de agosto de la presente gestión', 'http://boliviatv', 32, 2, 13, 1),
(678, 1628041410, 1627948800, 'La CIDOB se pronuncia acerca del caso INRA.', 'Fausto Molina el máximo representante de la CIDOB declara que el Gobernador de Santa Cruz esta intentando quitar las tierras a los pueblos indigenas de tierras bajas y por ello tomaran sus propias estrategias y movilizaciones para defender los derechos de los pueblos indigenas.', '', 47, 2, 34, 1),
(679, 1628041670, 1627948800, 'Anuncia instructivo, Mamani no dará la palabra a diputado que no salude en idioma nativo.', 'El presidente de la Cámara de Diputados, Freddy Mamani (MAS) anunció que se sacará un instructivo para que los parlamentarios que quieran tomar la palabra, primero saluden en un idioma originario. Anticipó que no les cederá la palabra en caso de que no lo hagan.', 'https://www.paginasiete.bo/nacional/2021/8/3/anuncia-instructivo-mamani-no-dara-la-palabra-diputado-que-no-salude-en-idioma-nativo-302915.html?__twitt', 14, 2, 34, 1),
(680, 1628041771, 1627948800, 'La asamblea de la cruceñidad decide rearticular el movimiento cívico nacional, para sancionar a los responsables del caso fraude electoral de 2019', '						Según la Asamblea de la Cruceñidad, con la aprobación de la Ley 108, de estrategia nacional de legitimación de ganancias ilícitas y el financiamiento al terrorismo, el gobierno intenta acallar, detener y extorsionar a los ciudadanos, por lo que resolvieron instruir al Comité Pro Santa Cruz, realizar todas las acciones legales necesarias para que los autores del fraude electoral de 2019 sean procesados y castigados. Así mismo deciden respaldar la convocatoria a una marcha a realizarse este jueves 05 de agosto, la misma que a través del CONADE se replique en todo el país.					', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(681, 1628041988, 1627948800, 'Milena Soto denuncia persecución política en Bolivia en nota enviada a Bachelet.', 'Milena Soto, aprehendida esta jornada, envió el domingo una nota a la Alta Comisionada para los Derechos Humanos de las Naciones Unidas, a Michelle Bachelet, en la que denuncia que el Gobierno de Luis Arce desencadenó una persecución política contra la Resistencia Juvenil Cochala (RJC), que comenzó con la captura de dos de sus principales dirigentes y la entrega de 220 notificaciones contra sus miembros.', 'https://www.paginasiete.bo/seguridad/2021/8/3/milena-soto-denuncia-persecucion-politica-en-bolivia-en-nota-enviada-bachelet-302909.html?__twitter_impr', 14, 2, 34, 1),
(682, 1628042159, 1627948800, 'Aprehenden a Milena Soto, otra miembro de la Resistencia Juvenil Cochala.', 'Milena Soto, una de las principales integrantes de la autodenominada Resistencia Juvenil Cochala (RJC) fue aprehendida este martes en Cochabamba. La activista, que la pasada semana denunció un supuesto intento de secuestro, fue notificada y escoltada presuntamente a instancias de la Fuerza Especial de Lucha Contra el Crimen (Felcc), según muestra un video que circula en las redes sociales. ', 'https://www.paginasiete.bo/seguridad/2021/8/3/aprehenden-milena-soto-otra-miembro-de-la-rjc-302899.html?__twitter_impression=true', 14, 2, 34, 1),
(683, 1628043299, 1627948800, 'La FEJUVE dice que fue una buena desicióón cerrar el caso fraude electoral', 'Secretario General de la Fejuve Alteña señala que fue la mejor desición cerrar el caso fraude lectoral ya que la oposición intentaba sujetarse del discurso para quitarnos la democracía.', '', 47, 2, 34, 1),
(684, 1628043307, 1627948800, 'El Gobierno anuncia intervención a protestas en Santa Cruz si hay excesos', 'El Ministro de Defensa anuncia que el Gobierno va a ver cómo actúa el Conade y Los Cívicos durante el anuncio de movilizaciones a partir del 5 de Agosto señaló que si las movilizaciones tendrán exceso se procederá según la norma.', '', 35, 2, 18, 1);
INSERT INTO `noticia` (`idnoticia`, `fecha_registro`, `fecha_noticia`, `titular`, `resumen`, `url_noticia`, `rel_idmedio`, `rel_idcuestionario`, `rel_idusuario`, `esta_activa`) VALUES
(685, 1628043373, 1627948800, 'Cívicos y plataformas de 7 regiones marcharán el jueves en rechazo al cierre del caso fraude.', 'El coordinador nacional de las plataformas del 21F, Guillermo Paz, anunció que el 5 de agosto activistas y cívicos de siete regiones del país marcharán en rechazo al cierre del caso fraude electoral. El 6 de agosto, en La Paz, los movimientos ciudadanos realizarán un acto de protestas al frente del nuevo edificio de la Asamblea Legislativa Plurinacional.', 'https://www.paginasiete.bo/nacional/2021/8/3/civicos-plataformas-de-regiones-marcharan-el-jueves-en-rechazo-al-cierre-del-caso-fraude-302891.html?__tw', 14, 2, 34, 1),
(686, 1628043444, 1627862400, 'Los Ex Vocales informaron que procesaran a Carlos Mesa y Fernando Camacho ', 'Sostuvo uno de los Ex vocales del Tribunal Supremo Electoral Edgar Gonzales anunció que los ex vocales a nivel nacional iniciaran un proceso formal  contra Carlos Mesa, Fernando Camacho y el Ingeniero Edgar Villegas por el caso del Fraude Electoral, consideran que son los principales responsables de haberlos perjudicado con las diferentes denuncias hacia sus personas. Además señalaron que iniciarán un proceso a nivel  internacional contra Luis Almagro de la OEA pidiendo resarcimiento integral por todo lo ocurrido tras las denuncias del Fraude Electoral.', '', 35, 1, 18, 1),
(687, 1628043482, 1627948800, 'Asamblea Legislativa Departamental en proyecto de ley para la vacunación contra el Covid-19', 'La Asamblea Legislativa Departamental de Chuquisaca a través de una comisión analiza un ante proyecto de ley para incentivar la vacunación contra el Covid-19 en Sucre y los municipios, tal cual lo informa el asambleísta Isaac Tejerina, clasificando a los municipios según la población que contengan.', 'https://www.facebook.com/TvSucreUSFX/videos/550220359664193', 20, 2, 54, 1),
(688, 1628043493, 1627948800, 'Audiencia de Murillo se pospone hasta septiembre.', 'La Fiscalía de Estados Unidos (EEUU) solicitó por tercera vez la suspensión de la audiencia de medidas cautelares del exministro de Gobierno  Arturo Murillo, debido a la “inusual complejidad” de los hechos. La exautoridad será procesada formalmente  por los cargos de soborno y conspiración para cometer lavado de dinero.', 'https://www.paginasiete.bo/seguridad/2021/8/3/audiencia-de-murillo-se-pospone-hasta-septiembre-302857.html?__twitter_impression=true', 14, 2, 34, 1),
(689, 1628043565, 1630281600, 'Asambleísta propone proceso de investigación a autoridades por planta generadora de oxígeno. ', 'Luis Aillón, Asambleísta Departamental de Chuquisaca manifestó que se debe iniciar un proceso de investigación a anteriores autoridades con respecto a la planta generadora de oxígeno en el Hospital Santa Bárbara, indicado que el daño podría alcanzar los 4 millones de bolivianos', 'https://www.facebook.com/TvSucreUSFX/videos/550220359664193', 20, 2, 54, 1),
(690, 1628043631, 1627948800, 'COD realiza marcha exigiendo respeto laboral y respeto de derechos de los trabajadores', 'Sectores afiliados a la Central Obrera Departamental de Chuquisaca realizaron una marcha en la plaza 25 de mayo exigiendo el respeto laboral ante despidos de trabajadores de diferentes empresas e instituciones  ', 'https://www.facebook.com/TvSucreUSFX/videos/550220359664193', 20, 2, 54, 1),
(691, 1628043705, 1627948800, 'El Movimiento al Socialismo anuncia procesos penales contra Cívicos que resolvieron movilizaciones ', 'El movimiento al socialismo pretende llevar a procesos, a los cívicos y al gobernador Fernando Camacho por intentar enfrentar a los bolivianos por las tierras en el oriente, según el diputado Rolando Cuellar los cívicos tienen muchas cuentas pendientes con la justicia. Otro sector que anuncia y convoca ,movilizaciones es el Comité Nacional de Defensa de la Democracia convocó al pueblo a movilizarse en las calles para exigir el procedimiento de los actores, cómplices y beneficiarios del Fraude Electoral cometido el 20 de Octubre del 2019, el representante del Conade Manuel Morales entre otros de los puntos está exigir el alejamiento del cargo de Fiscal General del Estado de Juan Lanchipa Ponce.', '', 35, 2, 18, 1),
(692, 1628043837, 1627948800, 'El movimiento al Socialismo procesara al Gobernador de Santa Cruz por alentar las protestas ', 'El diputado por el partido del MAS Daniel Rojas anunció una demanda penal en contra al Gobernador Fernando Camacho por alentar las protestas y amenazar con la economía de la población cruceña, además convocó al gobernador cruceño a comparecer ante el legislativo para responder las competencias que tiene el gobierno y la dotación de tierras en Santa Cruz.', '', 35, 2, 18, 1),
(693, 1628043896, 1627948800, 'Procurador asegura que la OEA no remitió auditoria de las elecciones del 2019.', '#ANF El procurador del Estado, Wilfredo Chávez, asegura que la OEA no remitió la auditoría de las Elecciones Generales de 2019 sino sólo un informe. Vía: @cadenaabolivia https://t.co/8mSubc0egg', 'El procurador del Estado, Wilfredo Chávez, asegura que la OEA no remitió la auditoría de las Elecciones Generales de 2019 sino sólo un informe. ', 35, 2, 34, 1),
(694, 1628043907, 1627948800, 'El Comité Cívico anuncia que a diario llegan requerimientos fiscales para esclarecer sucesos del 2019 ', 'El Abogado Pedro Lima asegura que a diario llegan requerimientos fiscales al comité cívico Potosinista, bajo el argumento de establecer los sucesos de la conmoción del 2019 estas actitudes pretenden apricionar a la dirigente de la comité cívica aseguró el abogado.', '', 35, 2, 18, 1),
(695, 1628044078, 1627948800, 'Con una nueva detención preventiva para Añez.', 'Con nueva detención preventiva, Áñez seguirá en la cárcel hasta inicios de febrero de 2022. En la cuenta de Twitter de la expresidenta se denuncia que la división del proceso solo tiene el fin de prolongar sus detención.', '', 35, 2, 34, 1),
(696, 1628044211, 1627948800, 'El accionar de los cívicos cruceños es por miedo.', 'El presidente del Senado, Andronico Rodriguez, afirmó hoy que el accionar de los cívicos cruceños es político. \"El caso fraude les preocupa, no tienen sustento y están utilizando el tema de tierras para generar movilizaciones de manera sigilosa”.', '', 35, 2, 34, 1),
(697, 1628044421, 1627948800, 'Presidente del comité provincial de Santa Cruz declara acerca del tema de tierras. ', 'Presidente del Comité Provincial de Santa Cruz sobre el tema tierras:\"El Gobierno no cumple la ley (...) es por eso que nosotros hablamos de avasallamiento porque no entra con los papeles en regla ni pasa por la CAD que regulariza la entrega de tierras\". ', '', 35, 2, 34, 1),
(698, 1628044767, 1627948800, 'El Tribunal Constitucional desahucia la sucesión constitucional de Jeanine Añez el 2019', 'En respuesta a la comisión de fiscales que investiga el caso Golpe de Estado, el Tribunal Constitucional Plurinacional (TCP) desahució la “sucesión constitucional” de Jeanine Añez y aclaró que en sus archivos no encontró “sentencia, declaración o auto constitucional” que sustente la constitucionalidad o no de dicha proclamación en 2019.', '', 23, 2, 34, 1),
(699, 1628044960, 1627948800, 'Asamblea Cruceña reúne a sectores opositores al Gobierno.', 'La Asamblea de la Cruceñidad decidió recurrir a instancias nacionales e internacionales para evitar el cierre del caso “fraude electoral”, rearticular el movimiento cívico, sumarse y coordinar la marcha nacional. ', '', 23, 2, 34, 1),
(700, 1628045156, 1627948800, 'Notifican con denuncia penal a cuatro vocales del TSE que habilitaron a Manfred', 'El diputado Jhonny Pardo Ramírez presentó una querella penal en contra de cuatro vocales del Tribunal Supremo Electoral (TSE): María Angélica Ruiz Vaca Díez, Nancy Gutiérrez Salas, Rosario Baptista Canedo y Salvador Romero Ballivián, por haber firmado la resolución 052/2021 que habilitó la candidatura de Manfred Reyes Villa al municipio de Cochabamba. ', 'https://eldeber.com.bo/pais/notifican-con-denuncia-penal-a-cuatro-vocales-del-tse-que-habilitaron-a-manfred_241703', 17, 2, 16, 1),
(701, 1628045607, 1627948800, 'Juez ordena detención por otros seis meses contra la expresidenta Áñez', 'El juez segundo Anticorrupción, Andrés Zabaleta, ordenó que la expresidenta Jeanine Áñez sea detenida por otros seis meses, a contar desde esta fecha. Esta vez por un nuevo juicio ordinario interpuesto por el Ministerio de Gobierno, la Procuraduría y la presidencia del Senado.', 'https://eldeber.com.bo/pais/juez-ordena-detencion-por-otros-seis-meses-contra-la-expresidenta-anez_241694', 17, 2, 16, 1),
(702, 1628047986, 1627948800, 'Frenar la persecución política, garantizar las fuentes laborales y reactivar la economía; conforman la serie de peticiones de una marcha de obreros en Chuquisaca.', 'El ejecutivo de los maestros urbanos Rodrigo Echalar, manifestó los pedidos que derivan de una marcha de cientos de obreros en Chuquisaca; donde la reactivación económica y garantía de fuentes laborales por un lado y por otro terminar con la persecución política a líderes que se movilizaron exigiendo nuevas elecciones en 2019; son los pedidos que emanan de estas movilizaciones.', '', 43, 2, 46, 1),
(703, 1628048449, 1627948800, 'Un bono escolar de cuanta del desayuno escolar.', 'La representación de municipios del pais esta presentando un proyecto para ver como entregar el desayuno escolar a un pago efectivo, en la ciudad de La Paz.', 'https://www.redbolivision.tv.bo/video/noticieros-al-dia-programa-del-03-de-agosto-del-2021/', 22, 2, 31, 1),
(704, 1628049005, 1627948800, 'Entregan insumos a la UTOP', '						Ministro de gobierno Eduardo del Castillo , en un acto de ceremonia de la UTOP, entrego insumos dentro de lo que es el plan dignidad. 					', 'https://www.redbolivision.tv.bo/video/noticieros-al-dia-programa-del-03-de-agosto-del-2021/', 22, 2, 31, 1),
(705, 1628049351, 1627948800, 'Acusan a funcionarios municipales por extorción.', 'En Santa Cruz comerciantes demandan a funcionarios públicos por  extorción, estos estarían pidiendo dinero a cambio de permisos de ventas en el mercado Abasto.  ', 'https://www.redbolivision.tv.bo/video/noticieros-al-dia-programa-del-03-de-agosto-del-2021/', 22, 2, 31, 1),
(706, 1628050973, 1627948800, 'Aprenden a Milena Soto en Cochabamba ', 'Aprenden a principal cabecilla de la Resistencia Juvenil Cochala por los actos paramilitares realizados a finales del año 2019. Es el tercer miembro de esta agrupación en ser aprendida', 'https://www.youtube.com/watch?v=Ra-A0_q54us', 32, 2, 43, 1),
(707, 1628051018, 1627948800, 'Detención preventiva por otros 6 meses', 'Ratifican el encarcelamiento de la ex presidante Áñez, se trata de otro proceso abierto contra el gobierno, el diputado  de CC, Enrique Urquidi, indica que existe el abuso de poder y que este hecho señala que la justicia se constituye en un brazo operador del gobierno. ', '', 24, 2, 29, 1),
(708, 1628051180, 1627948800, 'Vuelve a cuestionar a la Iglesia', 'El procurador del Estado acude al llamado del legislativo, dice que todos los que participaron en la reunión de la UCB son delincuentes, señalando que Bolivia no es colonia del Vaticano.', '', 24, 2, 29, 1),
(709, 1628051290, 1627948800, 'Milena Soto, miembro de la resistencia juvenil cochala, RJC, fue aprehendida esta tarde.', 'La policía arrestó a Milena Soto, fue trasladada a la FELCC, indican que será procesada por destrozos el 2019 (deterioro de bienes del Estado, daño calificado, organización criminal, fabricación o portación de armas ilegales, entre otros), luego fue trasladada a Sucre. Ella declara que es una injusticia.', '', 24, 2, 29, 1),
(710, 1628051392, 1627948800, 'Congreso interno del MAS asumirá definiciones sobre el tema disciplinario ', 'El diputado del MAS, Juan Angulo, confirmó que este miércoles se realizará el congreso del MAS en la ciudad de Cochabamba con la perspectiva de temas disciplinarios entre otra cosas, también se trabajará para generar unidad.', '', 38, 2, 29, 1),
(711, 1628051559, 1627948800, 'Desde la Alianza Creemos critican las acciones para cerrar el caso del fraude electoral ', 'La diputada de la alianza Creemos, la diputada María René Álvarez hizo referencia a las acciones que asume su fuerza política (MAS) en la perspectiva de buscar el cierre definitivo del caso Fraude Electoral y señaló que existe indignación por la parcialización de la justicia, señaló que se presentaron recursos judiciales ante las instancias correspondientes. Suponen nuevo acto de confrontación pues se pretenda actuar en contra de la Ley. Hizo conocer algunas decisiones del movimiento cívico como la marcha que se ha programado para este jueves en Santa Cruz.', '', 38, 2, 29, 1),
(712, 1628051805, 1628035200, 'Bolivia participara de la audiencia en Estados Unidos ', 'Bolivia sera parte de la audiencia de Arturo Murillo por el caso gases lacrimógenos buscando un resarcimiento para el estado.', 'https://www.youtube.com/watch?v=Ra-A0_q54us', 32, 2, 43, 1),
(713, 1628054414, 1627862400, 'Asociación de Radio Taxis de Cochabamba rechaza nacionalización de autos chutos', 'Los propietarios de autos indocumentados y la Asociación Departamental de Radio Taxis proceden con vigilancia en el cruce a Paracaya en San Benito debido a la espera de personas de otros municipios para empezar con bloqueos por el motivo de que reclaman en rechazo al pedido de nacionalización de 150 mil autos que son indocumentados, en ello el viceministro de Régimen Interior, Marcelo Cox, dio a conocer a la Policía sobre los hechos en ello tienen una orden de intervención por medidas de que es un negocio ilícito. ', 'https://www.opinion.com.bo/articulo/cochabamba/asociacion-radio-taxis-cochabamba-rechaza-nacionalizacion-autos-chutos/20210802103906829537.html', 13, 2, 39, 1),
(714, 1628055688, 1627862400, 'Concejal denuncia que Municipio de Cochabamba debe más de un millón de bolivianos por suministro de luz', 'El Concejal Joel Flores dio a conocer una denuncia que el Gobierno Autónomo Municipal de Cochabamba adeuda más de un Millón (1.069.969) de bolivianos debido al suministro de luz a los Centros de Salud (SALU) junto con la Empresa de Luz y Fuerza Eléctrica Cochabamba (ELFEC), a respuesta de la empresa pidió priorizar los pagos de Junio, pero la documentación que presento Flores, el desembolso no habría sido realizado.', 'https://www.opinion.com.bo/articulo/cochabamba/concejal-denuncia-que-municipio-cochabamba-debe-mas-millon-bolivianos-suministro-luz/202108021134038295', 13, 2, 39, 1),
(715, 1628057042, 1627862400, 'Vecinos de San Antonio de Pucara protestan por agua potable y personería jurídica para su OTB', 'Un grupo de vecinos de la zona de San Antonio de Pucara realizó una protesta en la Plaza Principal, exigiendo una dotación de agua potable para su OTB, en ello los vecinos dieron a conocer que enviaron notas a la subalcaldesa de la zona de Pucara pero las medidas que tomaron no dieron resultado. ', 'https://www.opinion.com.bo/articulo/cochabamba/vecinos-san-antonio-pucara-protestan-agua-potable-personeria-juridica-otb/20210802110419829541.html', 13, 2, 39, 1),
(716, 1628058738, 1627862400, 'La Fiscalía de EEUU nuevamente pide aplazar la audiencia de Murillo', 'La Fiscalía de Estados Unidos solicitó la postergación de la audiencia judicial contra el exministro Arturo Murillo, en la modo que se realizará el 8 de septiembre debido al proceso por lavado de dinero y soborno, que informó la agencia EFE, de acuerdo a la causa de Estados Unidos, Murillo y exfuncionarios recibieron sobornos a causa de comprar gases lacrimógenos de parte del Gobierno transitorio a la empresa Bravo Tactical Solutions.', 'https://www.opinion.com.bo/articulo/pais/fiscalia-eeuu-solicita-postergar-septiembre-audiencia-murillo/20210802174338829585.html', 13, 2, 39, 1),
(717, 1628060043, 1627862400, 'Senador, tras polémica con Barrientos: \"Es una mujer, le puedo decir que me disculpo, ¿no?\"', 'El senador Hilarión Padilla, del Movimiento Al Socialismo (MAS) dijo que quiere pedir disculpas a su compañera Andrea Barrientos, de Comunidad Ciudadana (CC), que anteriormente se refirió con tildes machistas, en respecto a la denuncia en la Comisión de Ética, el senador Padilla dijo; que puede seguir adelante con esa acción y mencionó que no le ha faltado el respeto, en ello la senadora Barrientos considero que es “inaceptable que tengamos representantes machistas en nuestra Cámara de Senadores”. ', 'https://www.opinion.com.bo/articulo/pais/senador-padilla-dice-que-puede-pedir-disculpas-opositora-dichos-tildados-machistas/20210802181725829589.html', 13, 2, 39, 1),
(718, 1628061247, 1627948800, 'Buscan que Murillo siga preso y devuelva dinero del caso gases', 'El Gobierno de Bolivia y la Fiscalía de EEUU está en búsqueda que el exministro de Gobierno Arturo Murillo continúe tras las rejas y que devuelva el dinero debido a la compra de gases lacrimógenos, en año 2020 con la suma de 5.6 millones de bolivianos y con un sobreprecio de más de 3 millones, en el caso el procurador del caso  Wilfredo Chávez, dijo que según ABI, se instauró la demanda civil contra Murillo, recluido en el Centro de Detención Federal (FDC) de Estados Unidos (EEUU), desde hace más de dos meses, por los delitos de soborno y lavado de dinero.', 'https://www.opinion.com.bo/articulo/pais/buscan-que-murillo-siga-preso-devuelva-dinero-caso-gases/20210802235039829667.html', 13, 2, 39, 1),
(719, 1628062315, 1627948800, 'María Galindo firma convenio con Copa y da inicio al \"movimiento del escobazo\".', 'La alcaldesa de El Alto, Eva Copa, firmó un convenio con la representante de la organización Mujeres Creando, María Galindo, debido a que se debe implementar la Ruta crítica para mujeres en situación de violencia” en el Municipio y de mejorar la atención a las víctimas de violencia en los Servicios Legales Integrales Municipales (SLIM’s), la Alcaldía alteña, dijo que la ruta crítica para mujeres en situación de violencia es un texto plasmando los mecanismos en el cual existen normas y procedimientos legales adecuados para servicios legales en la Fuerza Especial de Lucha Contra la Violencia (FELCV) y en la que se plantea servicios públicos con la atención las 24 horas del día. ', 'https://www.opinion.com.bo/articulo/pais/maria-galindo-firma-convenio-interviene-escoba-discurso/20210803194021829758.html', 13, 2, 39, 1),
(720, 1628072813, 1627948800, 'CHICOS DE BLANCO SERAN PARTICIPE DE LA SERENATA A BOLIVIA REPRESENTADON A PANDO', 'Los chicos de blanco surge de una idea de un video club mexicano de que se llamaba chicos de calla', '', 54, 2, 45, 1),
(721, 1628084553, 1628035200, 'Lima: “Quienes apuestan por la desestabilización solo atentan contra el derecho de las víctimas a obtener justicia”', 'El ministro de Justicia reivindica los fundamentos del caso de supuesto golpe de Estado. Justifica el sobreseimiento de los exvocales electorales porque no se encontró pruebas', 'https://eldeber.com.bo/pais/lima-quienes-apuestan-por-la-desestabilizacion-solo-atentan-contra-el-derecho-de-las-victimas-a-obte_241778?utm_medium=Soc', 17, 2, 16, 1),
(722, 1628084813, 1628035200, 'El conflicto sube de tono y el Gobierno advierte “mano firme” contra contra las medidas cívicas', 'El MAS cuestionó las movilizaciones que convocó el Comité Cívico y amenazó con juicios a Luis Fernando Camacho. El ministro de Defensa advirtió con ‘mano firme’ si es que hay excesos en las protestas', 'https://eldeber.com.bo/pais/el-conflicto-sube-de-tono-y-el-gobierno-advierte-mano-firme-contra-contra-las-medidas-civicas_241749?utm_medium=Social&utm', 17, 2, 16, 1),
(723, 1628085059, 1627862400, ' Taller de capacitación sentencia constitucional  plurinacional ', 'El personal de la Dirección de genero y generacional de familia participaron del Taller de capacitación sentencia constitucional Plurinacional, marco normativo para la intervención legal del embarazo, embarazo infantil forzado y evitar además de proteger los derechos, hay mucho silencio y miedo de la sociedad que se cree dueño de la moral es el principal indicador para q existan este problema q mas q ser de cobija es mundial expresa la exponentes.', 'https://www.facebook.com/UNITELPANDO11/videos/312262210586970', 29, 2, 55, 1),
(724, 1628085130, 1628035200, 'La expresidenta Áñez sufre nuevo revés judicial y estará seis meses más en prisión', 'La Procuraduría, el Ministerio de Gobierno y la Presidencia del Senado activaron un segundo proceso ordinario contra la exautoridad que está detenida desde marzo. Lidia Patty la demandó por ese mismo hecho. La defensa no ve un debido proceso', 'https://eldeber.com.bo/pais/la-expresidenta-anez-sufre-nuevo-reves-judicial-y-estara-seis-meses-mas-en-prision_241729?utm_medium=Social&utm_source=Fac', 17, 2, 16, 1),
(725, 1628085515, 1628035200, 'Denuncian a cuatro vocales del TSE por habilitar a Reyes Villa', 'El diputado Jhonny Pardo presentó una querella en contra de cuatro vocales del Tribunal Supremo Electoral (TSE): María Angélica Ruiz Vaca Díez, Nancy Gutiérrez Salas, Rosario Baptista Canedo y Salvador Romero Ballivián, por haber firmado la resolución 052/2021 que habilitó la candidatura de Manfred Reyes Villa al municipio de Cochabamba. ', 'https://eldeber.com.bo/pais/denuncian-a-cuatro-vocales-del-tse-por-habilitar-a-reyes-villa_241727?utm_medium=Social&utm_source=Facebook#Echobox=162807', 17, 2, 16, 1),
(726, 1628088316, 1627948800, 'Capacitación de Estudiantes de Promoción ley 348, 548 virtual', 'se capacitara a los últimos años como promociones sobre la ley de niño niña adolescente, cuales son sus derechos, obligaciones, y como pueden defenderse ante la sociedad en su calidad de niños o adolescentes', 'https://www.facebook.com/UNITELPANDO11/videos/1124991271324390', 29, 2, 55, 1),
(727, 1628111500, 1628035200, 'Autocomvocados afines al mas piden la detención de la lizeth beramendi representante del CONADE ', 'Auto comvocados piden detención ala lizeth beramendi (la madrina) de la resistencia juvenil cochala y todos los que fueron participea del golpe de estado', 'Radio frontera', 49, 2, 28, 1),
(728, 1628114346, 1627689600, 'Nueva asamblea legislativa lujo, tecnologíca, simbolismo y hasta vidrios antivandalicos, para diputados y senadores. ', 'El nuevo edificio de la Asamblea Legislativa Plurinacional está pronto a estrenarse en La Paz. Se trata de una estructura inédita en la ingeniería en Bolivia, que además de tener tecnología que la pone a la vanguardia en la región respecto al trabajo parlamentario, también cuenta un simbolismo que representa a 36 nacionalidades unidas en el país. ', 'https://www.facebook.com/285784718273481/posts/1755844707934134/', 51, 2, 57, 1),
(729, 1628116083, 1627689600, 'Puntos de vacunación para el día sábado más los horarios, y requisitos que debe presentar. ', 'Los puntos de vacunación para el día sábado son en los 8 distritos en los horarios de 8:00 a 1:00 y requisitos que debe presentar son: una fotocopia de su carnet de identidad, estas inscrito a un seguro municipal como de una caja. ', 'https://www.facebook.com/285784718273481/posts/1755856121266326/', 51, 2, 57, 1),
(730, 1628116519, 1627689600, 'Centros para el control y la prevención de enfermedades en un informe interno dice que la variante delta es tan contagiosa como la varicela. ', 'El \"THE NEW YORK TIMES\" dio una premilinar informando que los centros para el control y la prevención de enfermedades hizo un informe interno dice que la variante delta es tan contagiosa como la varicela.  ', 'https://www.facebook.com/285784718273481/posts/1755866154598656/', 51, 2, 57, 1),
(731, 1628117239, 1627776000, 'Incendio de pastizales cerca de viru viru está perjudicando la salida de vuelos nacionales. ', 'Se produjo en horas de la tarde incendio de pastizales cerca del aeropuerto viru Virú, y fueron distintas unidades de bomberos a trabajar para controlar la voraz incendio que se produjo en los pastizales en la avenida G - 77, muy cerca del aeropuerto internacional viru viru causando que la intensa humareda esté perjudicando la salida de vuelos nacionales, y que al igual esté provocando molestia los vecinos de los condominios aledeaños que están siendo afectados por el humo. ', '', 51, 2, 57, 1),
(732, 1628121234, 1628035200, 'Conade y cívicos activan protestas contra el fraude', 'El Comité de Defensa de la Democracia (Conade), comités cívicos y plataformas ciudadanas llevarán adelante una serie de movilizaciones en rechazo al requerimiento de sobreseimiento del caso fraude electoral, el cese de la persecución política, además del conflicto de tierras en Santa Cruz. El Gobierno advierte con represión ante excesos que podrían darse durante las protestas.', 'https://www.lostiempos.com/actualidad/pais/20210804/conade-civicos-activan-protestas-contra-fraude', 12, 2, 44, 1),
(733, 1628121366, 1628035200, 'Controlarán que diputados hablen idioma nativo', 'El presidente de la Cámara de Diputados, Freddy Mamani, anunció que emitirá un instructivo para que todos aquellos legisladores que dijeron que hablan un idioma originario saluden en ese idioma, de lo contrario no les dará la palabra en las sesiones.', 'https://www.lostiempos.com/actualidad/pais/20210804/controlaran-que-diputados-hablen-idioma-nativo', 12, 2, 44, 1),
(734, 1628121564, 1628035200, 'Lima: \"Quienes apuestan por la desinformación y desestabilización atentan contra los derechos de las víctimas\"', 'El ministro de Justicia y Transparencia Institucional, Iván Lima, aseveró este miércoles que el Tribunal Constitucional Plurinacional de Bolivia \"no reconoció\" el gobierno de Jeanine Áñez y advirtió que quienes generen \"desinformación y desestabilización\" atentan contra las víctimas del supuesto \"golpe\".', 'https://www.lostiempos.com/actualidad/pais/20210804/lima-quienes-apuestan-desinformacion-desestabilizacion-atentan-contra', 12, 2, 44, 1),
(735, 1628121691, 1628035200, 'CC impugna el cierre del caso fraude electoral País', 'La Bancada de Comunidad Ciudadana (CC) presentó a la Fiscalía un memorial de objeción del cierre del caso fraude electoral.Dijo que presentan el memorial “en calidad de víctimas del fraude cuando éramos candidatos en 2019 y esperamos y exigimos a la fiscalía departamental que revoque esa decisión de sobreseimiento”.', 'https://www.lostiempos.com/actualidad/pais/20210804/cc-impugna-cierre-del-caso-fraude-electoral', 12, 2, 44, 1),
(736, 1628121784, 1628035200, 'Más sectores se suman a las protestas contra el cierre del caso fraude', 'Transportistas, gremiales, promociones unidas, damas cívicas, comités provinciales y la federación de profesionales en Santa Cruz expresaron su apoyo a la movilización contra el cierre del caso \"fraude electoral\" y el \"avasallamiento\" de tierras, este jueves en las ciudades capitales de Santa Cruz, La Paz, Cochabamba, Chuquisaca y Tarija.', 'https://www.lostiempos.com/actualidad/pais/20210804/mas-sectores-se-suman-protestas-contra-cierre-del-caso-fraude', 12, 2, 44, 1),
(737, 1628126883, 1628035200, 'Trabajadores de Áreas Verdes en paro por pagos de salario y asignación de recursos por parte del GAMS', 'Trabajadores de áreas verdes del GAMS cumplen paro de 48 horas por falta de pagos y recorte presupuestario, Carlos Figueroa, representante de los trabajadores de áreas verdes manifiesta su preocupación por la demanda de pagos pendientes 2018, 2019 y 2020 además de la asignación del año 2021 que no se ha estado cumpliendo como debería', 'https://www.facebook.com/TvSucreUSFX/videos/187155283322826', 20, 2, 54, 1),
(738, 1628127683, 1628035200, 'Copa denuncia que se le impidió entrar a la reunión del COED junto a dirigentes sociales.', 'La tensión entre la alcaldesa de El Alto, Eva Copa, y el Gobernador de La Paz, Santos Quispe, volvió a escalar este miércoles debido a la reunión del Comité de Operaciones de Emergencia Departamental (COED). La autoridad edil denunció que se le impidió entrar al encuentro junto a dirigentes sociales, mientras que el gobernador la acusó de hacer “show”.', 'https://www.paginasiete.bo/nacional/2021/8/4/copa-denuncia-que-se-le-impidio-entrar-la-reunion-del-coed-junto-dirigentes-sociales-303031.html?__twitte', 14, 2, 34, 1),
(739, 1628127970, 1628035200, 'CC impugna cierre del caso fraude en su calidad de «víctimas».', 'La bancada de senadores y diputados de Comunidad Ciudadana (CC) presentará este miércoles un recurso de impugnación en contra del cierre del caso fraude electoral. La sigla hará esta objeción en su calidad de “víctima”, al ser la agrupación política afectada por las irregularidades del proceso electoral de 2019.', 'https://www.paginasiete.bo/nacional/2021/8/4/cc-impugna-cierre-del-caso-fraude-en-su-calidad-de-victimas-303004.html?__twitter_impression=true', 14, 2, 34, 1),
(740, 1628128379, 1628035200, 'Juicio a vocales del TSE: ven que buscan descabezar a la oposición.', 'Ante el anuncio de procesos penales a los vocales del Tribunal Supremo Electoral (TSE) que habilitaron a Manfred Reyes Villa como candidato para las elecciones subnacionales, en Comunidad Ciudadana (CC) y Creemos alertan que el MAS quiere descabezar a la oposición y también al Órgano Electoral. El diputado Jhonny Pardo, que presentó la denuncia, anunció que irá “hasta el final” con el caso.  La senadora Centa Reck,  de Creemos,  considera que detrás del proceso penal a los vocales Salvador Romero, Rosario Baptista, María Angélica Ruiz y Nancy Gutiérrez,  que habilitaron a Reyes Villa, el objetivo del Movimiento Al Socialismo (MAS) es descabezar  la oposición. ', 'https://www.paginasiete.bo/seguridad/2021/8/4/juicio-vocales-del-tse-ven-que-buscan-descabezar-la-oposicion-302968.html?__twitter_impression=true', 14, 1, 34, 1),
(741, 1628128581, 1628035200, 'TCP ratifica que emitió un comunicado y no un fallo sobre la sucesión de Añez.', 'El Tribunal Constitucional Plurinacional (TCP), en respuesta a un requerimiento de la comisión de fiscales que investiga la denuncia por sedición, conspiración y terrorismo contra Luis Fernando Camacho, aseguró que nunca emitió un fallo sobre la sucesión constitucional y que solo publicó un comunicado.  “En cuanto a los efectos jurídicos, todo comunicado tiene carácter general y no particular, pues lo que se transmite y se difunde es información”, argumenta la respuesta al requerimiento fiscal suscrita por Marvin Molina, secretario general del TCP. ', 'https://www.paginasiete.bo/nacional/2021/8/3/tcp-ratifica-que-emitio-un-comunicado-no-un-fallo-sobre-la-sucesion-de-anez-302949.html?__twitter_impress', 14, 2, 34, 1),
(742, 1628129486, 1628035200, 'Santos Quispe no dejó participar a la Alcaldesa Eva Copa.', 'La alcaldesa Eva Copa denuncia que el gobernador de La Paz, Santos Quispe, violó la Ley 602 de Gestión de Riesgos al no dejar participar a las organizaciones sociales en la reunión del COED. Anuncia que coordinará con el Gobierno para la adquisición de vacunas anticovid. ', '', 35, 2, 34, 1),
(743, 1628129813, 1628035200, 'El presidente Arce da declaraciones en el encuentro del MÁS.', 'Presidente Luis Arce en la inauguración del III Congreso Orgánico Estatutario del MAS-IPSP: \"Hoy nos toca reconocer el rol trascendental del MAS en la vida política del país. Ya no puede haber elecciones sin la participación del MAS\".', '', 35, 2, 34, 1),
(744, 1628129934, 1628035200, 'En calidad de \"víctima\", CC objeta a fiscales de La Paz el cierre del caso \"fraude electoral\".', 'En calidad de “víctimas”, la bancada de Comunidad Ciudadana (CC) presentará este miércoles, a la comisión de fiscales en el distrito de La Paz, una objeción contra el cierre del caso “fraude electoral”, porque se incorporó un informe sin ningún criterio jurídico ni valor legal para decidir sobre el sobreseimiento.  “Estamos presentando esta objeción a este sobreseimiento en calidad de víctimas del fraude electoral, cuando éramos candidatos en las elecciones del año 2019 y sobre esa base esperamos y exigimos a la fiscalía departamental del distrito de La Paz de que revoque esa decisión de sobreseimiento”, explicó el jefe de bancada de CC en la Cámara de Diputados, Carlos Alarcón.', '', 35, 2, 34, 1),
(745, 1628130837, 1628035200, 'Jurista: La reforma judicial fracasó, la clase política prefiere operadores \"encubridores\".', 'El expresidente del Colegio de Abogados de Bolivia y actual presidente del Colegio de Abogados de Chuquisaca, Arturo Yáñez, afirmó que la reforma judicial planteada por el Ministro de Justicia, Iván Lima, fracasó por falta de decisión política del Movimiento Al Socialismo (MAS).  “Yo creo que ha fracasado la reforma judicial, Iván Lima empezó muy bien con muchos bríos cuando le nombraron ministro, pero se le fueron desinflando. Al final su propio partido le ha bajado el pulgar y no hay reforma”, dijo el jurista a ANF.', '', 35, 2, 34, 1),
(746, 1628131615, 1628035200, 'Legisladores del MÁS afirman que el informe del TCP es reflejo de lo que se afirmo en que no hubo fraude electoral y sí golpe de estado.', 'El senador Leonardo Loza (MAS) señaló que el informe del TCP, que indica que no se encontró “sentencia, declaración o auto constitucional” sobre la presunta sucesión constitucional de Jeanine Áñez, confirma que se gestó un \"golpe de Estado\" en Bolivia. ', '', 23, 2, 34, 1),
(747, 1628131879, 1628035200, 'Luis Arce \"ya no puede haber elecciones sin la participación del MÁS\"', '#ATBNoticias LUIS ARCE: “YA NO PUEDE HABER ELECEl presidente Luis Arce participó este miércoles del III Congreso Orgánico Estatutario del Movimiento Al Socialismo (MAS) en Cochabamba y en el evento aseguró que ya no pueden existir elecciones en Bolivia sin la presencia de este instrumento político.  “Hoy nos toca, como nunca, reconocer el rol trascendental que tiene el Movimiento Al Socialismo en la vida política de nuestro país, ya no puede haber elecciones sin la participación del Movimiento Al Socialismo, ya no puede haber elecciones subnacionales sin la presencia del Movimiento Al Socialismo\".', '', 23, 2, 34, 1),
(748, 1628132025, 1628035200, 'VISITA DE PUNTO JOVEN NOS INFORMA SOBRE SUS ACTIVIDADES INFORMATIVAS DE BIEN SOCIAL ', 'Informacion hacer sobre los metodos anticonceptivos asi mismo haciendo la reduccion del indice de embarzo a temprana edad', '', 54, 2, 45, 1),
(749, 1628132629, 1627776000, 'accidente de tránsito se registró a las 08:40 en la localidad de Wakanqui km 30 en la carretera Cochabamba-Santa Cruz. ', 'Accidente de tránsito se registró a las 08:40 en la localidad de Wakanqui km 30, en la carretera Cochabamba-Santa Cruz, el hecho lo protagonizó la Flota Renacer y un Tractor, camión donde se tiene 6 personas heridas y una persona fallecida (Chófer) dos de los heridos fueron trasladados a la clínica Arévalo en Sacaba.', 'https://www.facebook.com/285784718273481/posts/1756821811169757/', 51, 2, 57, 1),
(750, 1628132927, 1627862400, 'Incendio Viru Viru. ', 'Se difundieron Nuevas imágenes del incendio ocurrido el día de ayer en el aeropuerto Viru Viru. ', 'https://www.facebook.com/285784718273481/posts/1757502221101716/https://www.facebook.com/285784718273481/posts/1757502221101716/', 51, 2, 57, 1),
(751, 1628133285, 1628035200, 'Rebajita tributaria.', '						En la ciudad del Alto se llevara a cabo la ley de rebaja tributaria, consta de tres fases la primera fase de agosto a septiembre con el 0% de multas e intereses, la segunda fase octubre a noviembre con el 70% sin multas e intereses y la tercera fase diciembre con el 40% sin multas e intereses. 					', 'https://www.redbolivision.tv.bo/video/noticieros-al-dia-programa-del-04-de-agosto-del-2021/', 22, 2, 31, 1),
(752, 1628133766, 1627862400, 'Incendio Viru Viru. ', 'Se difundieron Nuevas imágenes del incendio ocurrido el día de ayer en el aeropuerto Viru Viru. ', 'https://www.facebook.com/285784718273481/posts/1757502221101716/', 51, 2, 57, 0),
(753, 1628133978, 1627862400, 'Muere una mujer alado de su pequeña hija de 3 años en un incendio en su habitación.', 'Una mujer que se dedicaba a vender huevo al por mayor y menor en su vehículo junto a su esposo fueron encontradas sin vida en el interior de su vivienda alado de su pequeña hija de 3 años de edad calcinadas ya que ella tomo la decisión de acabar con su vida y la vida de su pequeña hija al verse y sentirse abandona por su pareja. ', '', 51, 2, 57, 1),
(754, 1628134606, 1627948800, 'MARIA GALINDO A LIDIA PATTY: \"Tu proceso es un proceso contra las víctimas de Senkata y Sacaba para lavarle la cara a Evo”. ', 'MARIA GALINDO A LIDIA PATTY dijo: \"Tu proceso es un proceso contra las víctimas de Senkata y Sacaba para lavarle la cara a Evo, Aquí hay una cosa que vale más que tu evito, más que el Evo vale la vida de la gente, y eso te cuestiono, tu estas entorpeciendo el juicio de las víctimas de Senkata… Usted ha escogido el camino para lavarle la cara a Evo Morales y eso no es gratis y usted se está beneficiando… Si tú coordinarías con las víctimas de Senkata te puedo creer, no estás trabajando para ellos.  ', 'https://www.facebook.com/285784718273481/posts/1757871524398119/', 51, 2, 57, 1),
(755, 1628134788, 1628035200, 'AÑEZ TENIA EL INTERES POLITICO DE DERROCAR UN GOBIERNO DEMOCRATICO DIJO HECTOR ARCE', 'El diputado del MAS, Héctor Arce, se pronuncia sobre la decisión de la Tribunal Constitucional Plurinacional sobre la carta a la Fiscalía que negó la sucesión constitucionalidad de Jeanine Áñez.', 'http://boliviatv', 32, 2, 13, 1),
(756, 1628134793, 1628035200, 'Develan que la intención de la derecha de administrar las tierras en Santa Cruz se dio desde las elecciones subnacionales cuando ofrecian tierras por votos.  ', 'La intensión de administrar las tierras de Santa Cruz, usurpando funciones exclusivas del Instituto Nacional de Reforma Agraria (INRA), se planificó desde las elecciones subnacionales, develó la diputada por el Movimiento al Socialismo, Ninoska Morales.  En contacto con Red Patria Nueva, la legisladora comentó que esta denuncia fue realizada por los pobladores de San Ignacio de Velasco, municipio en la que el frente político de Luis Fernando Camacho, Creemos, ofrecía tierras a cambio de votos.  ', '', 47, 2, 34, 1),
(757, 1628135190, 1628035200, 'Arce lanza un guiño y agradece a las FFAA por brindar información sobre los sucesos de 2019 y 2020', 'En el relevo del Comandante de Ejército en la Casa Grande del Pueblo también se observó un giro en el discurso del Gobierno respecto de las FFAA. Los militares facilitaron información al GIEI que investiga los sucesos de las gestiones pasadas', 'https://eldeber.com.bo/pais/arce-lanza-un-guino-y-agradece-a-las-ffaa-por-brindar-informacion-sobre-los-sucesos-de-2019-y-2020_241890?utm_medium=Socia', 17, 2, 16, 1),
(758, 1628135411, 1628035200, 'Alcaldía amplia el \'perdonazo\' hasta el 31 de agosto y apunta a una recaudación de Bs 400 millones', 'Según la Alcaldía este benefició permitirá que alrededor de 80 mil personas puedan sanear sus deudas tributarias. Hubo acercamiento con el sector privado para que los emprendimientos se beneficien', 'https://eldeber.com.bo/santa-cruz/alcaldia-amplia-el-perdonazo-hasta-el-31-de-agosto-y-apunta-a-una-recaudacion-de-bs-400-millones_241893?utm_medium=S', 17, 2, 16, 1),
(759, 1628136218, 1627948800, 'grupo “indigenista” de al menos 30 personas intentó tumbar la estatua de Cristóbal Colón en El Prado de La Paz.  ', 'Grupo “indigenista” de al menos 30 personas pintó de negro el rostro y arrancó la nariz al igual intentaron tumbarla la misma estatua de Cristóbal Colón en El Prado de La Paz como medida de protesta contra la colonización y en defensa del Estado Plurinacional. ', '', 51, 2, 57, 1),
(760, 1628136629, 1627948800, 'Más del 40% de los estudiantes de la Universidad Mayor de San Andrés (UMSA) abandonó sus estudios desde que comenzó la pandemia. ', 'Más del 40% de los estudiantes de la Universidad Mayor de San Andrés (UMSA) abandonó sus estudios desde que comenzó la pandemia desde se suspendieron las clases presenciales debido a la pandemia de la Covid- 19, el año pasado, 32.470 universitarios dejaron sus estudios.', '', 51, 2, 57, 1),
(761, 1628136829, 1627948800, 'Plataformas exigen a la Fiscalía revocar el cierre del caso Fraude', 'CC anuncia que presentará impugnación ante la fiscalía, para que el caso Fraude no se cierre, además un grupo de plataformas ciudadanas presentó ayer un recurso ante el Ministerio Público y exigió al fiscal general, Juan Lanchipa, que revoque su decisión de cerrar el caso fraude electoral y advirtió que “se reinició la lucha por la democracia”. ', 'https://correodelsur.com/politica/20210803_plataformas-exigen-a-la-fiscalia-revocar-el-cierre-del-caso-fraude.html', 11, 2, 47, 1),
(762, 1628140508, 1628035200, 'Asambleistas departamentales socializaran la lay 243 contra el acoso politico contra la mujer', 'Asamblesitas departamentales participan en talleres de socializacion y capacitacion de ley 243 de lucha contra el acoso politico contra la mujer', '', 26, 2, 48, 1),
(763, 1628140794, 1628035200, 'Diputado nacional propone proyecto de ley para que las contribuciones empresariales se queden en Oruro', 'Legisladores trabajan en un proyecto de ley para que las contribuciones de las empresas se queden en el departamento y no sea central', '', 26, 2, 48, 1),
(764, 1628140804, 1628035200, 'Diputado de oposición señala que los bolivianos ya no tienen instancias a las que acudir para que se cumpla la constitución.', ' La observación del TCP a la resolución emitida por este mismo órgano el año pasado; y que avalaba la prórroga en el mandato del gobierno transitorio de Jeanine Añez, genera dichas reacciones en el diputado de oposición Henry Montero.', '', 43, 2, 46, 1),
(765, 1628141411, 1628035200, 'El Fondo de Inversión Productiva y Social anuncia que se usarán 272.000 bolivianos para concluir planta de tratamiento de agua potable en Concepción', '												272.000 bolivianos y 45 días de plazo, son los términos que acordaron el Fondo de Inversión Productiva y Social de la gobernación de Concepción, con la empresa Romacruz, para concluir la planta de tratamiento de agua potable que se encontraba en un 92% de avance; en el municipio de Concepción										', '', 43, 2, 46, 1),
(766, 1628141438, 1628035200, 'El gobernador de Oruro manifesto que suspendera los desfiles patrios', 'El gobernador de Oruro Jhony Vedia manifesto que para evitar contagios se suspende los desfiles por fechas patrias', '', 26, 2, 48, 1),
(767, 1628141634, 1628121600, 'La Asamblea del Pueblo Guaraní será presidido por primera vez por una mujer', '						Luego de las elecciones ad hoc en la zona de Villa Montes, Paulina Cuevas se convierte en la primera mujer en presidir esta Asamblea.					', '', 43, 2, 46, 1),
(768, 1628142016, 1628035200, 'Presidente de la Brigada parlamentaria de Santa Cruz pide unidad entre cruceños y manifiesta que cierre de caso Electoral representa una vulneración a todos los bolivianos', 'José Carlos Gutiérrez, Presidente de la Brigada parlamentaria de Santa Cruz, además de sus cuestionamientos a la justicia boliviana, se adhiere a la convocatoria del jueves del Comité Pro Santa Cruz para rechazar el cierre del caso Fraude electoral y otros temas relacionados con la gestión del MAS', '', 43, 2, 46, 1),
(769, 1628142485, 1628035200, 'Ayllus de Qhara Qhara, denuncian que sindicatos de campesinos, impiden ingreso a sus representantes al Consejo Municipal de San Lucas en Chuquisaca', '						A pesar del fallo del TCP y del OEP; los Ayllus de Qhara Qhara denuncian que se está organizando un cabildo de los sindicatos campesinos, cuyo fin, sería anegar la entrada al Consejo Municipal a sus representantes; aseguran que de persistir esta restricción acudirán a instancias nacionales e internacionales.					', '', 43, 2, 46, 1),
(770, 1628142790, 1628035200, 'Diputada de oposición cuestiona transparencia del órgano judicial, ante la detención de Milena Soto; integrante de la Resistencia Juvenil Cochala.', '						La diputada de oposición Tatiana Añez, cuestiona transparencia e independencia del órgano judicial, ante la detención de Milena Soto, integrante de la Resistencia Juvenil Cochala; además anuncia una petición de informe sobre la situación de la detención de Milena Soto.					', '', 43, 2, 46, 1),
(771, 1628143035, 1628035200, 'Tribunal Constitucional Plurinacional descarto que exista algún documento que avale la sucesión constitucional de Janine Añez el 2019', 'A requerimiento fiscal de 13 de abril del presente año, el Tribunal Constitucional Plurinacional envió una misiva manifestando que, de la revisión del sistema de gestión procesal y el informe del gestor tutelar procesal, dentro la investigación caso golpe de Estado, impulsada por la ex-diputada Lidia Pati, no existe ninguna Sentencia, declaración o Auto constitucional que avale la sucesión constitucional de la ex-presidenta Janine Añez el año 2019.', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(772, 1628145085, 1628035200, 'Quienes apuestan por la desinformación y desestabilización, atentan contra los derechos de las victimas.', 'El Ministro de Justicia y Transparencia Institucional, aseveró que el Tribunal Constitucional Plurinacional de Bolivia, no reconoció al gobierno de Janine Añez, auto proclamación definida en reuniones fuera del Legislativo y advirtió que quienes generan desinformación y desestabilización atentan contra las victimas del gobierno de facto que, apoyados con armamento y material represivo foráneo, les masacro, persiguió y saqueo durante el golpe. ', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(773, 1628147271, 1628035200, 'Plataformas 21 F de Potosí, la siguiente semana harán manifestaciones en protesta y rechazo a la persecución política por parte del gobierno del MAS.', 'Las Plataformas 21 F Unidos por Bolivia y  Unidos por Potosí, están en alerta y saldrán en movilizaciones desde el día de mañana para hacer valer sus derechos, con marchas de protesta, mítines y concentraciones para que el gobierno y el MAS entiendan que no pueden amedrentar, perseguir, secuestrar y encarcelar a lideres que salieron junto al pueblo para defender la democracia y sacar de la presidencia al dictador Morales, ya que actuar así va en contra de la libre expresión y en contra de la Constitución Política del Estado.  ', 'https://www.facebook.com/KanchaParlaspa/', 37, 2, 42, 1),
(774, 1628170972, 1627948800, 'Dialogo departamental sobre derechos de las mujeres', 'Mujeres asambleístas buscan un taller con el órgano electoral  para informarse sobre sus derechos, para evitar la violencia y e acoso político ', '', 19, 2, 21, 1),
(775, 1628171770, 1627948800, 'Pronunciamiento por posible postergación de audiencia de murillo', '						El ejecutivo de la central obrera Leonel Pareja habla sobre posible suspensión de audiencia del ex ministro Arturo Murillo, pide que se haga justicia y sea procesado por el golpe de estado, robos al país y masacre a la población ya que asegura que no hubo fraude en las elecciones 2019					', '', 19, 2, 21, 1),
(776, 1628172273, 1627948800, 'audiencia de murillo aun no fue suspendida', 'El procurador general del estado Wilfredo Chavez afirma que aun fue suspendida la audiencia de Murillo, sino que solo es un pedido y que no hay respuesta, hasta ahora las audiencias ya se suspendieron 3 veces.', '', 19, 2, 21, 1),
(777, 1628174321, 1628035200, 'comunicado del tpc nunca fue avalado como legal', 'El MAS exige que los vocales del tribunal constitucional  sea investigado por avalar la sucesión ilegal de Jeanine Añez, piden que la ex presidente responda ante la Justicia ordinaria', '', 19, 2, 21, 1),
(778, 1628174611, 1628035200, 'comunicado del tpc nunca fue avalado como legal', 'El MAS exige que los vocales del tribunal constitucional  sea investigado por avalar la sucesión ilegal de Jeanine Añez, piden que la ex presidente responda ante la Justicia ordinaria', '', 19, 2, 21, 1),
(779, 1628176508, 1627948800, 'Activan denuncia penal contra 4 vocales del TSE por candidatura del alcalde Reyes Villa', 'Los vocales del TSE María Angélica Ruiz Vaca Diez, Nancy Gutiérrez Salas, Rosario Baptista y el exvocal Salvador Romero fueron denunciados penalmente por el diputado del MAS Jhonny Pardo por la aprobación de la resolución que habilitó la candidatura del actual alcalde de Cochabamba, Manfred Reyes Villa. ', 'https://www.la-razon.com/nacional/2021/08/03/activan-denuncia-penal-contra-4-vocales-del-tse-por-candidatura-del-alcalde-reyes-villa/', 53, 1, 29, 1),
(780, 1628177304, 1628035200, 'Tras informe del TCP, Lima ratifica que ‘nunca hubo reconocimiento a la autoproclamación’', 'Después de que el Tribunal Constitucional Plurinacional (TCP), en una nota enviada al Ministerio Público, desahució la “sucesión constitucional” de Jeanine Añez en 2019, el ministro de Justicia, Iván Lima, reafirmó este miércoles que “nunca hubo reconocimiento a la autoproclamación” de la exmandataria. ', 'https://www.la-razon.com/nacional/2021/08/04/tras-informe-del-tcp-lima-ratifica-que-nunca-hubo-reconocimiento-a-la-autoproclamacion/', 53, 2, 29, 1),
(781, 1628178242, 1628035200, 'Luis Arce: ‘Ya no puede haber elecciones sin la participación del MAS’', 'El presidente Luis Arce participó este miércoles del III Congreso Orgánico Estatutario del Movimiento Al Socialismo (MAS) en Cochabamba y en el evento aseguró que ya no pueden existir elecciones en Bolivia sin la presencia de este instrumento político, indicando que el MAS tiene una presencia en cada uno de los municipios y en cada rincón del país.', 'https://www.la-razon.com/nacional/2021/08/04/luis-arce-ya-no-puede-haber-elecciones-sin-la-participacion-del-mas/', 53, 2, 29, 1);
INSERT INTO `noticia` (`idnoticia`, `fecha_registro`, `fecha_noticia`, `titular`, `resumen`, `url_noticia`, `rel_idmedio`, `rel_idcuestionario`, `rel_idusuario`, `esta_activa`) VALUES
(782, 1628178347, 1628035200, 'Morales llama a defender a Arce y advierte a la ‘derecha’: ‘Ahora estamos preparados mejor’', 'El líder del Movimiento Al Socialismo (MAS), Evo Morales, convocó este miércoles a defender al presidente Luis Arce, después de que la Asamblea de la Cruceñidad resolvió iniciar la rearticulación del movimiento cívico nacional “como instrumento de lucha en defensa de la democracia, la justicia y la verdad” y, en ese sentido, apoyar “todas las movilizaciones democráticas, cívicas y ciudadanas en todo” el país. Indica que existen amenazas de la derecha por lo cual se encuentran, ahora \"mejor preparados\".', 'https://www.la-razon.com/nacional/2021/08/04/morales-llama-a-defender-a-arce-y-advierte-a-la-derecha-ahora-estamos-preparados-mejor/', 53, 2, 29, 1),
(783, 1628178602, 1628035200, 'El MAS aprueba sanciones contra el transfugio y escala de aportes de 1% a 3% de sueldos', 'El MAS definió castigar el transfugio político con la pérdida de mandato y acordó aportes de entre 1% y 3% para sus militantes que reciben un sueldo y de Bs 10.000 mensual para su militancia de base, en tanto que en lo programático decidió promover el acceso gratuito a internet como un derecho humano.', 'https://www.la-razon.com/nacional/2021/08/04/el-mas-aprueba-sanciones-contra-el-transfugio-y-escala-de-aportes-de-1-a-3-de-sueldos/', 53, 2, 29, 1),
(784, 1628178721, 1628035200, 'Justicia ratifica segunda orden de cárcel contra Áñez y posponen otra audiencia para pedir su libertad', 'La audiencia de cesación a la detención de la expresidenta Jeanine Áñez fue aplazada hasta el próximo martes por ausencia fiscal, mientras que en otra audiencia la Justicia le rechazó un recurso de Acción de Libertad y ratificó la nueva orden de detención por seis meses.', 'https://www.la-razon.com/nacional/2021/08/04/justicia-ratifica-segunda-orden-de-carcel-contra-anez-y-posponen-otra-audiencia-para-pedir-su-libertad/', 53, 2, 29, 1),
(785, 1628178826, 1628035200, 'La Fiscalía pide 6 meses de detención en la cárcel de Potosí para Milena Soto de la RJC', 'La Fiscalía solicitará este jueves la detención preventiva en la cárcel de Potosí para Milena Soto, una de las líderes de la Resistencia Juvenil Cochala (RJC) que fue aprehendida en Cochabamba y trasladada a Sucre. Soto es acusada por los disturbios ocurridos en Sucre en noviembre de 2019, demandando la renuncia de Lanchipa, el gobernador de Santa Cruz, Luis Fernando Camacho, expresó su apoyo a Soto.', 'https://www.la-razon.com/nacional/2021/08/04/la-fiscalia-pide-6-meses-de-detencion-en-la-carcel-de-potosi-para-milena-soto-de-la-rjc/', 53, 2, 29, 1),
(786, 1628810624, 1628568000, 'Titular Panamericana', 'Parrafo resumen de panamericana', 'http://panamericana', 38, 1, 5, 1),
(787, 1628810987, 1628827200, 'Inst democratica prueba pagina 7', 'Resumen de la Inst democratica pagina 7', 'http://pagina7', 14, 2, 5, 1),
(788, 1628811197, 1628740800, 'Titular pagina siete censo', 'Resumen de pagina siete censo', 'http://pagina7', 14, 3, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia_actor`
--

CREATE TABLE `noticia_actor` (
  `idnotactor` int(11) NOT NULL,
  `rel_idnoticia` int(11) UNSIGNED NOT NULL,
  `rel_idactor` smallint(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticia_actor`
--

INSERT INTO `noticia_actor` (`idnotactor`, `rel_idnoticia`, `rel_idactor`) VALUES
(1, 1, 1),
(2, 1, 5),
(3, 1, 10),
(7, 3, 1),
(8, 4, 1),
(9, 4, 4),
(10, 4, 7),
(11, 4, 10),
(12, 5, 1),
(13, 5, 5),
(14, 5, 10),
(15, 6, 1),
(16, 6, 5),
(17, 6, 8),
(18, 6, 10),
(19, 7, 3),
(20, 8, 3),
(21, 9, 4),
(22, 9, 8),
(23, 10, 1),
(24, 10, 4),
(25, 10, 6),
(26, 10, 10),
(29, 12, 1),
(30, 12, 5),
(31, 12, 8),
(32, 13, 1),
(33, 13, 4),
(34, 13, 7),
(35, 13, 10),
(36, 14, 1),
(37, 14, 4),
(38, 14, 7),
(39, 14, 10),
(40, 15, 2),
(41, 16, 5),
(42, 17, 8),
(43, 18, 8),
(44, 19, 5),
(45, 20, 5),
(46, 21, 1),
(47, 21, 5),
(48, 22, 1),
(49, 22, 2),
(50, 23, 6),
(51, 24, 6),
(52, 25, 8),
(53, 26, 1),
(54, 27, 6),
(55, 28, 10),
(56, 29, 2),
(57, 30, 6),
(58, 31, 2),
(59, 32, 5),
(60, 33, 3),
(61, 34, 1),
(62, 35, 5),
(63, 36, 5),
(64, 37, 2),
(65, 38, 8),
(66, 39, 2),
(67, 40, 9),
(68, 41, 2),
(69, 42, 2),
(70, 43, 6),
(71, 44, 2),
(72, 45, 9),
(73, 46, 2),
(74, 47, 9),
(75, 48, 6),
(76, 48, 9),
(77, 49, 3),
(78, 50, 2),
(79, 51, 8),
(80, 52, 5),
(81, 53, 5),
(82, 54, 5),
(83, 55, 1),
(84, 55, 5),
(85, 55, 10),
(86, 56, 1),
(87, 56, 9),
(88, 11, 2),
(89, 2, 9),
(90, 57, 4),
(91, 58, 1),
(92, 59, 2),
(93, 60, 1),
(94, 61, 6),
(95, 62, 6),
(96, 63, 1),
(97, 64, 6),
(98, 65, 7),
(99, 66, 1),
(100, 67, 5),
(101, 68, 6),
(102, 69, 3),
(103, 70, 5),
(104, 71, 1),
(105, 71, 3),
(106, 72, 1),
(107, 72, 3),
(108, 73, 2),
(109, 74, 6),
(110, 75, 7),
(111, 76, 9),
(112, 77, 6),
(113, 78, 1),
(114, 78, 8),
(115, 79, 1),
(116, 79, 6),
(117, 80, 1),
(118, 80, 4),
(119, 81, 6),
(120, 82, 3),
(121, 83, 2),
(122, 84, 6),
(123, 85, 6),
(124, 85, 8),
(127, 87, 6),
(128, 87, 7),
(130, 89, 5),
(131, 89, 6),
(132, 90, 9),
(133, 90, 10),
(134, 91, 4),
(136, 93, 6),
(137, 94, 6),
(140, 96, 5),
(141, 97, 2),
(142, 98, 2),
(143, 99, 2),
(144, 100, 6),
(145, 101, 1),
(146, 102, 2),
(147, 102, 6),
(148, 103, 6),
(149, 104, 9),
(150, 105, 6),
(151, 106, 3),
(152, 107, 1),
(153, 108, 2),
(154, 109, 9),
(155, 110, 2),
(156, 111, 6),
(157, 112, 6),
(159, 114, 2),
(160, 114, 6),
(161, 115, 1),
(162, 116, 8),
(163, 116, 10),
(164, 117, 2),
(165, 118, 4),
(166, 119, 3),
(167, 120, 8),
(168, 121, 2),
(169, 122, 7),
(170, 123, 6),
(172, 124, 1),
(174, 125, 4),
(175, 126, 3),
(176, 127, 4),
(177, 128, 5),
(178, 129, 6),
(179, 130, 2),
(180, 130, 8),
(181, 131, 2),
(182, 132, 6),
(183, 133, 6),
(184, 134, 2),
(185, 135, 1),
(186, 136, 8),
(188, 138, 5),
(189, 138, 6),
(190, 139, 6),
(191, 140, 8),
(192, 141, 6),
(193, 142, 7),
(194, 143, 6),
(195, 144, 2),
(196, 145, 2),
(197, 146, 3),
(198, 147, 6),
(199, 148, 2),
(200, 148, 6),
(201, 149, 1),
(202, 149, 3),
(203, 150, 3),
(204, 151, 2),
(206, 153, 5),
(208, 155, 2),
(209, 155, 6),
(211, 154, 5),
(212, 154, 6),
(213, 154, 8),
(214, 156, 9),
(215, 157, 1),
(216, 157, 6),
(217, 157, 10),
(218, 158, 3),
(219, 159, 3),
(220, 160, 3),
(221, 161, 5),
(222, 162, 6),
(223, 163, 3),
(224, 164, 1),
(225, 165, 9),
(226, 166, 6),
(227, 167, 6),
(228, 168, 6),
(229, 168, 13),
(230, 169, 6),
(231, 170, 6),
(232, 170, 12),
(233, 171, 2),
(234, 171, 6),
(235, 171, 12),
(236, 172, 13),
(237, 173, 12),
(238, 174, 9),
(239, 175, 12),
(240, 175, 13),
(241, 176, 2),
(242, 177, 4),
(243, 178, 6),
(244, 179, 4),
(245, 179, 7),
(246, 180, 2),
(247, 181, 7),
(248, 182, 2),
(249, 183, 3),
(250, 184, 7),
(251, 185, 2),
(252, 185, 5),
(253, 185, 6),
(254, 186, 12),
(255, 186, 13),
(256, 187, 4),
(257, 188, 8),
(258, 189, 2),
(259, 189, 5),
(262, 191, 2),
(263, 192, 2),
(264, 193, 2),
(265, 194, 2),
(266, 195, 6),
(267, 195, 8),
(272, 196, 2),
(273, 196, 5),
(275, 198, 6),
(276, 198, 9),
(277, 92, 12),
(278, 95, 3),
(279, 95, 13),
(280, 197, 12),
(281, 199, 4),
(282, 200, 2),
(283, 201, 3),
(284, 202, 7),
(285, 202, 9),
(286, 203, 1),
(287, 204, 12),
(288, 205, 5),
(291, 207, 6),
(292, 208, 4),
(293, 209, 6),
(294, 210, 1),
(295, 210, 5),
(296, 211, 3),
(297, 212, 4),
(298, 213, 6),
(299, 214, 8),
(300, 215, 6),
(301, 216, 3),
(302, 217, 3),
(303, 218, 12),
(304, 219, 5),
(305, 220, 2),
(306, 221, 3),
(307, 222, 2),
(308, 223, 1),
(309, 223, 5),
(310, 224, 9),
(311, 225, 6),
(312, 226, 6),
(313, 227, 6),
(314, 228, 12),
(315, 229, 6),
(316, 229, 12),
(317, 230, 13),
(318, 231, 2),
(319, 231, 6),
(320, 232, 12),
(321, 233, 2),
(322, 233, 6),
(323, 234, 2),
(324, 234, 6),
(325, 235, 6),
(326, 236, 6),
(327, 237, 3),
(328, 241, 2),
(329, 242, 3),
(330, 242, 9),
(331, 243, 4),
(332, 243, 6),
(333, 244, 6),
(334, 245, 3),
(335, 246, 3),
(336, 247, 3),
(337, 247, 7),
(338, 248, 3),
(339, 249, 3),
(340, 250, 6),
(341, 250, 9),
(342, 250, 10),
(343, 251, 3),
(344, 252, 2),
(345, 253, 3),
(346, 254, 3),
(347, 255, 1),
(348, 256, 2),
(349, 257, 3),
(350, 257, 7),
(351, 257, 9),
(354, 259, 7),
(355, 259, 8),
(356, 260, 5),
(359, 262, 3),
(360, 263, 5),
(361, 264, 3),
(362, 265, 2),
(363, 266, 6),
(364, 267, 3),
(365, 268, 6),
(366, 269, 6),
(367, 270, 12),
(368, 271, 5),
(369, 272, 3),
(370, 273, 1),
(371, 274, 2),
(372, 275, 6),
(373, 276, 1),
(374, 277, 1),
(375, 277, 5),
(376, 278, 2),
(377, 278, 7),
(378, 279, 4),
(379, 280, 2),
(380, 281, 5),
(381, 282, 6),
(382, 283, 4),
(383, 283, 7),
(384, 284, 3),
(385, 285, 6),
(386, 286, 6),
(387, 287, 7),
(388, 287, 8),
(389, 287, 9),
(390, 287, 10),
(391, 288, 6),
(392, 289, 3),
(393, 290, 1),
(394, 290, 5),
(395, 291, 1),
(396, 291, 5),
(397, 292, 3),
(398, 293, 8),
(399, 294, 6),
(400, 295, 5),
(401, 296, 5),
(402, 297, 13),
(403, 298, 9),
(404, 299, 2),
(405, 300, 3),
(406, 301, 3),
(407, 302, 6),
(408, 303, 6),
(409, 304, 7),
(410, 305, 3),
(411, 305, 6),
(412, 306, 2),
(413, 307, 2),
(414, 307, 4),
(415, 308, 2),
(416, 308, 4),
(417, 309, 4),
(418, 310, 10),
(419, 311, 4),
(420, 312, 7),
(421, 313, 6),
(422, 314, 6),
(423, 315, 2),
(424, 316, 6),
(425, 317, 6),
(426, 318, 7),
(427, 319, 3),
(428, 319, 4),
(429, 319, 5),
(430, 320, 1),
(431, 320, 2),
(432, 320, 5),
(433, 321, 1),
(434, 322, 4),
(435, 323, 2),
(436, 324, 2),
(437, 325, 2),
(438, 326, 6),
(439, 327, 5),
(440, 328, 5),
(444, 331, 9),
(445, 331, 10),
(446, 332, 6),
(447, 332, 9),
(448, 333, 6),
(449, 334, 1),
(450, 335, 5),
(451, 336, 3),
(452, 337, 6),
(453, 338, 7),
(454, 339, 6),
(455, 340, 5),
(456, 340, 6),
(457, 341, 6),
(458, 342, 12),
(459, 343, 3),
(460, 343, 12),
(461, 344, 5),
(462, 345, 6),
(463, 346, 7),
(464, 347, 6),
(465, 348, 2),
(466, 349, 1),
(467, 349, 6),
(468, 350, 6),
(469, 351, 3),
(470, 352, 3),
(471, 353, 1),
(472, 354, 4),
(473, 355, 6),
(474, 356, 6),
(475, 357, 6),
(476, 358, 3),
(477, 359, 7),
(478, 360, 6),
(479, 361, 5),
(480, 362, 9),
(481, 363, 6),
(482, 364, 6),
(483, 365, 5),
(484, 366, 3),
(485, 367, 2),
(486, 368, 6),
(487, 369, 2),
(488, 370, 3),
(489, 370, 4),
(490, 371, 6),
(491, 372, 3),
(492, 373, 1),
(493, 374, 6),
(494, 375, 1),
(495, 376, 6),
(496, 377, 3),
(497, 377, 13),
(498, 378, 3),
(499, 378, 7),
(500, 379, 1),
(501, 380, 12),
(502, 381, 12),
(503, 382, 1),
(504, 383, 5),
(505, 384, 1),
(506, 385, 2),
(507, 385, 4),
(508, 386, 2),
(509, 386, 6),
(510, 387, 9),
(511, 86, 9),
(513, 88, 10),
(514, 152, 6),
(515, 388, 3),
(516, 388, 4),
(517, 389, 6),
(518, 390, 4),
(519, 391, 9),
(520, 392, 13),
(521, 393, 13),
(522, 394, 1),
(523, 395, 6),
(524, 396, 5),
(525, 397, 6),
(526, 398, 3),
(527, 399, 8),
(528, 400, 2),
(529, 401, 5),
(530, 402, 2),
(531, 403, 7),
(532, 404, 13),
(533, 405, 3),
(534, 406, 2),
(535, 407, 3),
(536, 408, 3),
(540, 410, 3),
(541, 410, 6),
(542, 411, 6),
(543, 412, 6),
(544, 413, 4),
(545, 414, 6),
(546, 414, 10),
(547, 415, 6),
(548, 415, 7),
(549, 415, 9),
(550, 416, 2),
(551, 416, 7),
(552, 417, 1),
(553, 418, 3),
(554, 419, 6),
(555, 420, 1),
(556, 421, 3),
(557, 422, 12),
(558, 423, 10),
(559, 424, 1),
(560, 425, 3),
(561, 426, 5),
(562, 426, 6),
(563, 427, 7),
(564, 428, 3),
(565, 429, 5),
(566, 429, 6),
(567, 430, 4),
(568, 431, 6),
(569, 432, 6),
(570, 433, 1),
(571, 434, 1),
(572, 435, 13),
(573, 436, 6),
(574, 437, 5),
(575, 438, 6),
(576, 439, 8),
(577, 440, 9),
(578, 441, 3),
(579, 442, 5),
(580, 443, 5),
(581, 444, 12),
(582, 445, 5),
(585, 329, 1),
(586, 329, 6),
(587, 329, 8),
(588, 446, 1),
(589, 446, 6),
(590, 446, 8),
(591, 447, 3),
(592, 448, 6),
(593, 449, 6),
(594, 450, 6),
(595, 451, 6),
(596, 452, 6),
(597, 453, 3),
(598, 453, 6),
(599, 454, 2),
(600, 455, 6),
(601, 456, 3),
(602, 457, 2),
(603, 458, 1),
(604, 458, 5),
(605, 459, 1),
(606, 460, 1),
(607, 461, 7),
(608, 462, 9),
(609, 463, 1),
(610, 463, 7),
(611, 464, 1),
(612, 464, 2),
(613, 465, 3),
(614, 466, 13),
(615, 467, 2),
(616, 468, 2),
(617, 469, 1),
(618, 470, 2),
(619, 471, 1),
(620, 471, 2),
(624, 475, 2),
(625, 476, 2),
(626, 477, 10),
(627, 478, 2),
(628, 478, 6),
(629, 479, 6),
(630, 479, 10),
(631, 480, 2),
(632, 481, 6),
(633, 482, 13),
(634, 483, 2),
(635, 484, 7),
(636, 485, 1),
(637, 486, 13),
(638, 113, 2),
(639, 113, 6),
(640, 137, 6),
(641, 137, 7),
(642, 190, 1),
(643, 190, 5),
(644, 190, 6),
(645, 487, 5),
(646, 206, 2),
(647, 206, 6),
(648, 206, 8),
(649, 258, 2),
(650, 258, 6),
(651, 261, 6),
(652, 261, 9),
(653, 330, 3),
(654, 330, 6),
(655, 409, 6),
(656, 409, 7),
(657, 409, 9),
(658, 488, 2),
(659, 488, 6),
(660, 489, 3),
(661, 489, 4),
(662, 490, 1),
(663, 490, 6),
(664, 491, 5),
(665, 491, 6),
(666, 492, 5),
(667, 492, 6),
(668, 493, 6),
(669, 494, 6),
(670, 495, 5),
(671, 495, 6),
(672, 496, 2),
(673, 497, 3),
(674, 498, 10),
(675, 499, 6),
(676, 500, 6),
(677, 501, 1),
(678, 501, 5),
(679, 502, 1),
(680, 503, 3),
(681, 503, 4),
(682, 504, 6),
(683, 505, 1),
(684, 506, 5),
(685, 507, 6),
(686, 508, 2),
(687, 509, 5),
(688, 510, 6),
(689, 511, 5),
(690, 512, 2),
(691, 513, 6),
(692, 514, 1),
(693, 515, 3),
(694, 516, 6),
(695, 517, 3),
(696, 518, 5),
(697, 519, 5),
(698, 520, 1),
(699, 521, 1),
(700, 522, 3),
(701, 523, 5),
(702, 524, 6),
(703, 525, 5),
(704, 526, 6),
(705, 526, 10),
(706, 527, 2),
(707, 528, 6),
(708, 529, 2),
(709, 530, 6),
(710, 531, 8),
(711, 532, 6),
(712, 533, 6),
(713, 534, 3),
(714, 535, 6),
(715, 536, 6),
(716, 537, 6),
(717, 538, 5),
(718, 538, 6),
(719, 539, 1),
(720, 539, 8),
(721, 539, 10),
(722, 540, 7),
(723, 540, 9),
(724, 541, 6),
(725, 542, 9),
(726, 542, 10),
(727, 543, 1),
(728, 544, 6),
(729, 545, 4),
(730, 545, 6),
(731, 546, 1),
(732, 547, 1),
(733, 547, 5),
(734, 548, 3),
(735, 548, 4),
(736, 549, 6),
(737, 550, 6),
(738, 551, 6),
(739, 552, 6),
(740, 553, 13),
(741, 554, 5),
(742, 554, 7),
(743, 555, 3),
(744, 556, 3),
(745, 557, 3),
(746, 557, 13),
(747, 558, 4),
(748, 558, 6),
(749, 559, 6),
(750, 559, 12),
(751, 560, 3),
(752, 560, 6),
(753, 561, 6),
(754, 562, 8),
(755, 563, 6),
(756, 564, 6),
(757, 565, 8),
(758, 566, 6),
(759, 567, 3),
(760, 568, 1),
(761, 568, 6),
(762, 569, 1),
(763, 569, 5),
(764, 570, 12),
(765, 571, 4),
(766, 572, 5),
(767, 572, 6),
(768, 573, 6),
(769, 574, 1),
(770, 575, 3),
(771, 576, 2),
(772, 577, 2),
(773, 578, 2),
(774, 579, 3),
(775, 579, 4),
(776, 579, 5),
(777, 580, 3),
(778, 580, 4),
(779, 580, 5),
(780, 581, 2),
(781, 582, 5),
(782, 583, 2),
(783, 583, 9),
(784, 583, 10),
(785, 584, 6),
(786, 584, 8),
(787, 585, 8),
(788, 585, 12),
(789, 586, 2),
(790, 587, 6),
(791, 588, 5),
(792, 589, 1),
(793, 589, 5),
(794, 590, 6),
(795, 591, 3),
(796, 591, 5),
(797, 592, 3),
(798, 592, 5),
(799, 593, 3),
(800, 593, 5),
(801, 594, 3),
(802, 594, 4),
(803, 595, 3),
(804, 595, 5),
(805, 596, 5),
(806, 596, 9),
(807, 597, 5),
(808, 598, 12),
(810, 600, 4),
(811, 601, 4),
(812, 599, 6),
(813, 602, 13),
(814, 603, 5),
(815, 604, 1),
(816, 605, 13),
(817, 606, 6),
(818, 607, 2),
(819, 608, 6),
(820, 609, 4),
(821, 609, 5),
(822, 609, 6),
(823, 610, 7),
(824, 611, 7),
(825, 612, 6),
(826, 613, 6),
(827, 614, 6),
(828, 615, 3),
(829, 616, 1),
(830, 616, 8),
(831, 617, 13),
(832, 618, 7),
(833, 619, 6),
(834, 620, 6),
(835, 621, 6),
(836, 622, 13),
(837, 623, 9),
(838, 624, 5),
(839, 625, 3),
(840, 626, 6),
(841, 627, 3),
(842, 628, 6),
(843, 629, 9),
(844, 630, 3),
(845, 631, 6),
(846, 632, 2),
(847, 633, 5),
(848, 634, 1),
(849, 635, 6),
(850, 636, 1),
(851, 637, 1),
(852, 637, 2),
(853, 638, 6),
(854, 639, 10),
(855, 640, 6),
(856, 641, 9),
(857, 642, 1),
(858, 642, 5),
(859, 643, 9),
(860, 644, 1),
(861, 645, 7),
(862, 646, 1),
(863, 647, 4),
(864, 648, 9),
(865, 649, 2),
(866, 650, 4),
(867, 651, 10),
(868, 652, 4),
(869, 653, 5),
(870, 654, 12),
(871, 655, 1),
(872, 656, 1),
(873, 656, 2),
(874, 657, 5),
(875, 658, 3),
(876, 658, 5),
(877, 659, 4),
(878, 660, 6),
(879, 661, 3),
(880, 662, 6),
(881, 663, 10),
(882, 663, 13),
(883, 664, 3),
(884, 665, 3),
(885, 666, 5),
(886, 667, 2),
(887, 668, 6),
(888, 669, 2),
(889, 670, 6),
(890, 671, 5),
(891, 672, 6),
(892, 673, 6),
(893, 674, 3),
(894, 675, 6),
(895, 676, 6),
(896, 677, 1),
(897, 677, 3),
(898, 678, 6),
(899, 679, 1),
(900, 680, 6),
(901, 681, 6),
(902, 682, 6),
(903, 683, 6),
(904, 684, 6),
(905, 685, 6),
(906, 686, 3),
(907, 686, 6),
(908, 687, 8),
(909, 688, 3),
(910, 689, 7),
(911, 690, 6),
(912, 691, 1),
(913, 691, 5),
(914, 692, 5),
(915, 693, 3),
(916, 694, 6),
(917, 695, 6),
(918, 696, 1),
(919, 697, 6),
(920, 698, 6),
(921, 699, 6),
(922, 700, 2),
(923, 700, 3),
(924, 701, 1),
(925, 701, 2),
(926, 701, 3),
(927, 702, 6),
(928, 703, 6),
(929, 704, 2),
(930, 705, 6),
(931, 705, 9),
(932, 706, 3),
(933, 707, 3),
(934, 707, 5),
(935, 707, 6),
(936, 708, 2),
(937, 709, 6),
(938, 710, 5),
(939, 711, 1),
(940, 711, 5),
(941, 712, 2),
(942, 713, 2),
(943, 713, 6),
(944, 714, 6),
(945, 714, 7),
(946, 715, 6),
(947, 715, 7),
(948, 716, 1),
(949, 716, 6),
(950, 717, 5),
(951, 717, 8),
(952, 718, 1),
(953, 718, 3),
(954, 719, 6),
(955, 719, 7),
(956, 720, 6),
(957, 721, 1),
(958, 721, 2),
(959, 721, 3),
(960, 722, 2),
(961, 722, 6),
(962, 722, 7),
(963, 723, 3),
(964, 723, 9),
(965, 724, 2),
(966, 724, 3),
(967, 725, 1),
(968, 725, 4),
(969, 726, 9),
(970, 727, 3),
(971, 727, 5),
(972, 728, 1),
(973, 729, 9),
(974, 730, 6),
(975, 731, 6),
(976, 732, 6),
(977, 733, 1),
(978, 734, 2),
(979, 735, 5),
(980, 736, 6),
(981, 737, 6),
(982, 737, 9),
(983, 738, 9),
(984, 739, 5),
(985, 740, 5),
(986, 741, 3),
(987, 742, 9),
(988, 743, 2),
(989, 744, 5),
(990, 745, 3),
(991, 746, 1),
(992, 747, 2),
(993, 748, 6),
(994, 749, 13),
(995, 750, 6),
(996, 751, 9),
(997, 751, 10),
(998, 752, 6),
(999, 753, 6),
(1000, 754, 3),
(1001, 755, 3),
(1002, 755, 5),
(1003, 756, 2),
(1004, 757, 2),
(1005, 757, 12),
(1006, 758, 9),
(1007, 759, 5),
(1008, 760, 10),
(1009, 761, 5),
(1010, 761, 6),
(1011, 762, 8),
(1012, 763, 2),
(1013, 764, 1),
(1014, 765, 9),
(1015, 766, 7),
(1016, 767, 10),
(1017, 768, 1),
(1018, 769, 10),
(1019, 770, 1),
(1020, 771, 3),
(1021, 772, 2),
(1022, 773, 6),
(1023, 774, 4),
(1024, 774, 8),
(1025, 775, 6),
(1026, 776, 3),
(1027, 777, 1),
(1028, 777, 5),
(1029, 778, 1),
(1030, 778, 5),
(1031, 779, 1),
(1032, 779, 4),
(1033, 780, 2),
(1034, 781, 2),
(1035, 781, 5),
(1036, 782, 5),
(1037, 783, 5),
(1038, 784, 3),
(1039, 784, 6),
(1040, 785, 3),
(1041, 785, 6),
(1042, 786, 7),
(1043, 787, 5),
(1044, 788, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia_otrosubtema`
--

CREATE TABLE `noticia_otrosubtema` (
  `idnototrosubtema` int(11) UNSIGNED NOT NULL,
  `rel_idnoticia` int(11) UNSIGNED NOT NULL,
  `rel_idotrosubtema` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticia_otrosubtema`
--

INSERT INTO `noticia_otrosubtema` (`idnototrosubtema`, `rel_idnoticia`, `rel_idotrosubtema`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 4, 5),
(6, 5, 6),
(7, 6, 7),
(8, 9, 8),
(9, 10, 9),
(10, 13, 10),
(11, 13, 11),
(12, 14, 12),
(13, 14, 13),
(15, 54, 15),
(16, 57, 16),
(17, 66, 17),
(18, 67, 18),
(19, 80, 19),
(20, 81, 20),
(21, 82, 21),
(22, 83, 22),
(23, 98, 23),
(24, 124, 24),
(25, 125, 25),
(26, 127, 26),
(27, 130, 27),
(28, 134, 28),
(29, 141, 29),
(30, 182, 30),
(31, 188, 31),
(32, 189, 32),
(34, 195, 34),
(35, 203, 35),
(36, 228, 36),
(37, 230, 37),
(38, 250, 38),
(39, 254, 39),
(40, 259, 40),
(41, 261, 41),
(42, 264, 42),
(43, 269, 43),
(44, 280, 44),
(45, 286, 45),
(46, 303, 46),
(47, 319, 47),
(48, 322, 48),
(49, 367, 49),
(50, 368, 50),
(51, 385, 51),
(52, 391, 52),
(53, 395, 53),
(54, 398, 54),
(55, 401, 55),
(56, 411, 56),
(57, 413, 57),
(58, 422, 58),
(59, 426, 59),
(60, 428, 60),
(61, 448, 61),
(62, 449, 62),
(63, 475, 63),
(64, 478, 64),
(65, 38, 65),
(66, 38, 66),
(67, 483, 67),
(69, 493, 69),
(70, 512, 70),
(71, 522, 71),
(72, 535, 72),
(73, 547, 73),
(74, 585, 74),
(75, 600, 75),
(76, 611, 76),
(77, 634, 77),
(78, 645, 78),
(79, 652, 79),
(80, 659, 80),
(81, 661, 81),
(82, 662, 82),
(83, 668, 83),
(84, 670, 84),
(86, 671, 86),
(87, 726, 88),
(88, 727, 89),
(89, 749, 90),
(90, 752, 91),
(91, 754, 92),
(92, 760, 93);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia_otrotema`
--

CREATE TABLE `noticia_otrotema` (
  `idnototrotema` int(11) UNSIGNED NOT NULL,
  `rel_idnoticia` int(11) UNSIGNED NOT NULL,
  `rel_idotrotema` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticia_otrotema`
--

INSERT INTO `noticia_otrotema` (`idnototrotema`, `rel_idnoticia`, `rel_idotrotema`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 5, 4),
(5, 6, 5),
(6, 9, 6),
(7, 10, 7),
(8, 12, 8),
(9, 13, 9),
(10, 14, 10),
(11, 29, 11),
(12, 44, 12),
(13, 56, 13),
(14, 58, 14),
(15, 63, 15),
(16, 68, 16),
(17, 85, 17),
(18, 98, 18),
(19, 99, 19),
(20, 104, 20),
(21, 106, 21),
(22, 107, 22),
(23, 108, 23),
(24, 110, 24),
(25, 117, 25),
(26, 124, 26),
(27, 131, 27),
(28, 133, 28),
(29, 134, 29),
(30, 143, 30),
(31, 144, 31),
(32, 147, 32),
(33, 155, 33),
(34, 157, 34),
(35, 165, 35),
(36, 172, 36),
(37, 174, 37),
(38, 176, 38),
(39, 179, 39),
(40, 202, 40),
(41, 227, 41),
(42, 228, 42),
(43, 229, 43),
(44, 231, 44),
(45, 232, 45),
(46, 234, 46),
(47, 235, 47),
(48, 256, 48),
(49, 275, 49),
(50, 279, 50),
(51, 282, 51),
(52, 283, 52),
(53, 288, 53),
(54, 297, 54),
(55, 300, 55),
(56, 301, 56),
(57, 302, 57),
(58, 303, 58),
(59, 304, 59),
(60, 305, 60),
(61, 307, 61),
(62, 342, 62),
(63, 348, 63),
(64, 351, 64),
(65, 353, 65),
(66, 355, 66),
(67, 357, 67),
(68, 359, 68),
(69, 364, 69),
(70, 365, 70),
(71, 371, 71),
(72, 372, 72),
(73, 373, 73),
(74, 374, 74),
(75, 375, 75),
(76, 376, 76),
(77, 379, 77),
(78, 380, 78),
(79, 381, 79),
(80, 382, 80),
(81, 383, 81),
(82, 384, 82),
(83, 385, 83),
(84, 389, 84),
(85, 392, 85),
(86, 394, 86),
(87, 404, 87),
(88, 405, 88),
(89, 447, 89),
(90, 448, 90),
(91, 449, 91),
(92, 450, 92),
(93, 451, 93),
(94, 452, 94),
(95, 453, 95),
(96, 454, 96),
(97, 455, 97),
(98, 456, 98),
(99, 457, 99),
(100, 458, 100),
(101, 459, 101),
(102, 460, 102),
(103, 461, 103),
(104, 462, 104),
(105, 466, 105),
(106, 467, 106),
(107, 468, 107),
(108, 470, 108),
(109, 478, 109),
(110, 482, 110),
(111, 486, 111),
(112, 330, 112),
(113, 409, 113),
(114, 490, 114),
(115, 491, 115),
(116, 492, 116),
(117, 493, 117),
(118, 494, 118),
(119, 495, 119),
(120, 498, 120),
(121, 507, 121),
(122, 508, 122),
(123, 510, 123),
(124, 517, 124),
(125, 532, 125),
(126, 533, 126),
(127, 536, 127),
(128, 537, 128),
(129, 543, 129),
(130, 544, 130),
(131, 546, 131),
(132, 547, 132),
(133, 549, 133),
(134, 551, 134),
(135, 552, 135),
(136, 553, 136),
(137, 556, 137),
(138, 564, 138),
(139, 567, 139),
(140, 570, 140),
(141, 572, 141),
(142, 573, 142),
(143, 574, 143),
(144, 575, 144),
(145, 576, 145),
(146, 577, 146),
(147, 578, 147),
(148, 584, 148),
(149, 585, 149),
(150, 591, 150),
(151, 592, 151),
(152, 594, 152),
(153, 601, 153),
(154, 602, 154),
(155, 603, 155),
(156, 605, 156),
(157, 625, 157),
(158, 636, 158),
(159, 637, 159),
(160, 638, 160),
(161, 642, 161),
(162, 644, 162),
(163, 646, 163),
(164, 654, 164),
(165, 660, 165),
(166, 667, 167),
(167, 668, 168),
(168, 670, 169),
(169, 674, 170),
(170, 677, 171),
(171, 680, 172),
(172, 703, 173),
(173, 704, 174),
(174, 707, 175),
(175, 708, 176),
(176, 709, 177),
(177, 710, 178),
(178, 711, 179),
(179, 720, 180),
(180, 748, 181),
(181, 751, 182),
(182, 753, 183),
(183, 763, 184),
(184, 766, 185),
(185, 771, 186),
(186, 772, 187),
(187, 776, 188),
(188, 780, 189),
(189, 782, 190),
(190, 784, 191),
(191, 785, 192),
(192, 787, 193),
(193, 788, 194);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia_subtema`
--

CREATE TABLE `noticia_subtema` (
  `idnotsubtema` int(10) UNSIGNED NOT NULL,
  `rel_idnoticia` int(10) UNSIGNED NOT NULL,
  `rel_idsubtema` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticia_subtema`
--

INSERT INTO `noticia_subtema` (`idnotsubtema`, `rel_idnoticia`, `rel_idsubtema`) VALUES
(1, 1, 1),
(2, 1, 20),
(4, 3, 1),
(5, 3, 22),
(6, 4, 1),
(7, 4, 23),
(8, 4, 24),
(9, 4, 18),
(10, 5, 25),
(11, 5, 27),
(12, 6, 1),
(13, 6, 22),
(14, 7, 48),
(15, 8, 25),
(16, 9, 1),
(17, 9, 24),
(18, 9, 20),
(19, 10, 26),
(20, 10, 29),
(21, 10, 31),
(22, 10, 35),
(24, 13, 1),
(25, 13, 23),
(26, 13, 18),
(27, 14, 29),
(28, 15, 25),
(29, 16, 36),
(30, 17, 34),
(31, 19, 47),
(32, 20, 48),
(33, 21, 25),
(34, 21, 33),
(35, 22, 25),
(36, 24, 25),
(37, 25, 25),
(38, 26, 47),
(39, 27, 36),
(40, 27, 37),
(41, 27, 48),
(42, 28, 33),
(43, 31, 25),
(44, 32, 26),
(45, 33, 48),
(46, 34, 48),
(47, 35, 33),
(48, 37, 46),
(49, 39, 27),
(50, 40, 28),
(51, 41, 25),
(52, 42, 48),
(53, 43, 29),
(54, 45, 4),
(55, 46, 46),
(56, 47, 48),
(57, 48, 36),
(58, 49, 48),
(59, 50, 28),
(60, 51, 34),
(61, 52, 40),
(62, 52, 41),
(63, 53, 44),
(64, 55, 1),
(65, 55, 20),
(66, 56, 26),
(67, 56, 28),
(68, 56, 35),
(69, 56, 37),
(70, 11, 1),
(73, 2, 25),
(74, 58, 25),
(75, 59, 30),
(76, 60, 25),
(77, 61, 25),
(78, 61, 26),
(79, 62, 26),
(80, 62, 27),
(81, 64, 34),
(82, 65, 45),
(83, 68, 29),
(84, 69, 29),
(85, 70, 41),
(86, 72, 26),
(87, 73, 33),
(88, 74, 25),
(89, 75, 26),
(90, 76, 33),
(91, 77, 44),
(92, 78, 25),
(93, 78, 47),
(94, 79, 25),
(95, 79, 27),
(96, 79, 34),
(97, 79, 37),
(98, 80, 8),
(99, 84, 25),
(100, 86, 34),
(101, 87, 48),
(102, 88, 45),
(103, 89, 36),
(104, 90, 26),
(105, 90, 28),
(106, 90, 41),
(107, 90, 43),
(108, 91, 2),
(109, 91, 3),
(111, 93, 33),
(112, 94, 36),
(113, 95, 25),
(117, 92, 48),
(118, 100, 25),
(119, 101, 46),
(120, 102, 46),
(121, 102, 48),
(122, 103, 25),
(123, 103, 29),
(124, 96, 33),
(125, 105, 25),
(126, 109, 36),
(127, 111, 36),
(128, 113, 34),
(129, 114, 29),
(130, 115, 48),
(131, 116, 48),
(132, 117, 46),
(133, 117, 47),
(134, 118, 19),
(135, 119, 48),
(136, 120, 25),
(137, 121, 44),
(138, 122, 25),
(139, 123, 22),
(140, 124, 6),
(141, 126, 25),
(142, 126, 30),
(143, 128, 25),
(144, 128, 26),
(145, 129, 25),
(146, 136, 32),
(147, 137, 36),
(148, 138, 33),
(149, 138, 34),
(150, 139, 34),
(151, 140, 26),
(152, 142, 25),
(153, 143, 25),
(154, 143, 26),
(155, 145, 25),
(156, 145, 26),
(157, 146, 30),
(158, 148, 44),
(159, 148, 45),
(160, 149, 48),
(161, 150, 25),
(162, 151, 33),
(163, 152, 25),
(164, 152, 26),
(167, 153, 39),
(168, 153, 45),
(169, 154, 48),
(171, 156, 36),
(172, 157, 1),
(173, 157, 24),
(174, 158, 30),
(175, 159, 26),
(176, 160, 25),
(177, 161, 25),
(178, 162, 33),
(179, 163, 25),
(180, 164, 25),
(181, 164, 30),
(182, 166, 25),
(183, 166, 26),
(184, 167, 25),
(185, 167, 26),
(186, 168, 25),
(187, 168, 26),
(188, 169, 25),
(189, 169, 26),
(190, 170, 25),
(191, 170, 26),
(192, 171, 25),
(193, 171, 26),
(194, 173, 25),
(195, 173, 26),
(196, 175, 25),
(197, 175, 26),
(198, 177, 2),
(199, 178, 2),
(200, 178, 3),
(201, 179, 50),
(202, 179, 51),
(203, 179, 54),
(204, 179, 56),
(205, 179, 61),
(206, 179, 68),
(207, 180, 51),
(208, 181, 51),
(209, 182, 51),
(210, 183, 16),
(211, 184, 25),
(212, 185, 36),
(213, 185, 47),
(214, 185, 48),
(215, 186, 46),
(216, 187, 2),
(217, 191, 62),
(218, 192, 62),
(219, 193, 51),
(220, 194, 62),
(221, 196, 26),
(222, 196, 29),
(223, 197, 33),
(224, 198, 46),
(225, 198, 48),
(226, 199, 2),
(227, 199, 3),
(228, 200, 25),
(230, 203, 64),
(231, 203, 65),
(232, 201, 31),
(233, 204, 31),
(234, 204, 34),
(235, 205, 46),
(236, 206, 34),
(237, 207, 25),
(238, 207, 29),
(239, 208, 2),
(240, 209, 25),
(241, 209, 26),
(242, 209, 30),
(243, 209, 34),
(244, 209, 46),
(245, 210, 25),
(246, 211, 34),
(247, 211, 35),
(248, 212, 40),
(249, 213, 36),
(250, 214, 48),
(251, 215, 33),
(252, 215, 34),
(253, 216, 25),
(254, 216, 34),
(255, 217, 43),
(256, 218, 31),
(257, 218, 33),
(258, 218, 34),
(259, 219, 25),
(260, 219, 26),
(263, 220, 26),
(264, 220, 30),
(265, 221, 47),
(266, 222, 46),
(267, 222, 48),
(268, 223, 25),
(269, 224, 46),
(270, 225, 31),
(271, 225, 33),
(272, 226, 45),
(273, 227, 25),
(274, 227, 26),
(275, 228, 25),
(276, 229, 25),
(277, 229, 26),
(278, 231, 25),
(279, 231, 26),
(280, 232, 25),
(281, 232, 26),
(282, 233, 36),
(283, 233, 37),
(284, 234, 25),
(285, 234, 26),
(286, 235, 25),
(287, 235, 26),
(288, 236, 47),
(292, 237, 25),
(293, 237, 28),
(294, 242, 33),
(295, 242, 34),
(296, 243, 39),
(297, 243, 40),
(298, 243, 41),
(299, 243, 42),
(300, 243, 34),
(301, 243, 37),
(302, 244, 21),
(303, 246, 25),
(304, 247, 25),
(305, 248, 25),
(306, 249, 48),
(307, 250, 44),
(308, 250, 34),
(309, 250, 36),
(310, 250, 37),
(311, 251, 48),
(312, 252, 29),
(313, 253, 25),
(314, 255, 26),
(317, 260, 41),
(318, 260, 43),
(319, 263, 29),
(320, 266, 25),
(323, 268, 34),
(324, 269, 46),
(325, 270, 26),
(330, 273, 25),
(331, 274, 51),
(336, 278, 46),
(337, 278, 47),
(339, 280, 46),
(342, 279, 2),
(343, 279, 4),
(346, 282, 2),
(347, 282, 4),
(348, 283, 4),
(349, 284, 40),
(352, 286, 70),
(353, 287, 25),
(354, 287, 29),
(355, 288, 4),
(356, 289, 4),
(357, 290, 40),
(358, 292, 41),
(359, 293, 44),
(360, 294, 45),
(361, 295, 25),
(362, 295, 26),
(363, 295, 29),
(364, 296, 29),
(365, 296, 30),
(366, 298, 25),
(367, 298, 26),
(368, 299, 25),
(369, 299, 26),
(370, 303, 25),
(371, 303, 26),
(372, 304, 25),
(373, 304, 26),
(374, 306, 25),
(375, 306, 26),
(376, 306, 28),
(377, 307, 18),
(378, 308, 18),
(379, 309, 2),
(380, 309, 3),
(381, 310, 26),
(382, 310, 32),
(383, 310, 46),
(384, 310, 48),
(385, 311, 40),
(387, 313, 45),
(388, 314, 39),
(389, 315, 48),
(390, 316, 33),
(391, 316, 34),
(392, 317, 34),
(393, 317, 35),
(394, 318, 27),
(395, 320, 26),
(396, 320, 29),
(397, 321, 29),
(401, 323, 40),
(402, 324, 40),
(403, 325, 40),
(404, 326, 25),
(405, 326, 29),
(406, 326, 40),
(407, 327, 25),
(408, 327, 29),
(409, 327, 40),
(410, 328, 29),
(411, 328, 40),
(412, 329, 45),
(413, 329, 36),
(416, 331, 47),
(417, 331, 48),
(418, 332, 37),
(419, 332, 46),
(420, 333, 45),
(421, 334, 28),
(422, 335, 33),
(423, 335, 36),
(424, 336, 48),
(425, 337, 36),
(426, 338, 31),
(427, 338, 35),
(428, 339, 25),
(429, 340, 33),
(430, 340, 34),
(431, 341, 25),
(432, 342, 25),
(433, 342, 26),
(434, 343, 25),
(435, 343, 29),
(436, 344, 29),
(437, 345, 25),
(438, 345, 26),
(439, 346, 31),
(440, 346, 34),
(441, 347, 47),
(442, 348, 36),
(443, 348, 37),
(444, 349, 37),
(445, 349, 38),
(446, 350, 26),
(447, 352, 25),
(448, 354, 34),
(449, 354, 35),
(450, 356, 40),
(451, 356, 31),
(452, 356, 36),
(453, 358, 40),
(454, 360, 40),
(455, 361, 29),
(456, 362, 40),
(457, 363, 40),
(458, 366, 48),
(459, 367, 26),
(460, 368, 26),
(461, 369, 25),
(462, 370, 25),
(463, 370, 30),
(464, 374, 25),
(465, 374, 26),
(466, 375, 25),
(467, 375, 26),
(468, 377, 48),
(469, 378, 25),
(470, 380, 25),
(471, 380, 26),
(472, 381, 25),
(473, 381, 26),
(474, 385, 2),
(475, 385, 4),
(476, 386, 26),
(477, 386, 28),
(478, 386, 46),
(479, 387, 29),
(480, 387, 30),
(481, 388, 4),
(482, 390, 46),
(483, 396, 29),
(484, 399, 33),
(485, 400, 33),
(486, 402, 27),
(487, 403, 48),
(488, 406, 25),
(489, 408, 25),
(492, 410, 25),
(493, 410, 29),
(494, 412, 29),
(495, 414, 28),
(496, 414, 29),
(497, 414, 39),
(498, 414, 40),
(499, 414, 43),
(500, 414, 34),
(501, 414, 36),
(502, 415, 48),
(503, 416, 48),
(504, 417, 31),
(505, 417, 34),
(506, 418, 25),
(507, 418, 26),
(508, 419, 29),
(509, 419, 40),
(510, 420, 48),
(511, 421, 33),
(512, 421, 35),
(513, 422, 25),
(514, 422, 26),
(515, 422, 29),
(516, 423, 36),
(517, 424, 44),
(518, 425, 25),
(519, 425, 26),
(520, 426, 48),
(521, 428, 40),
(522, 429, 4),
(523, 430, 25),
(524, 430, 26),
(525, 431, 25),
(526, 432, 29),
(527, 433, 34),
(528, 434, 4),
(529, 435, 29),
(533, 437, 48),
(534, 438, 2),
(535, 439, 4),
(536, 440, 48),
(537, 441, 30),
(538, 442, 40),
(539, 443, 4),
(540, 444, 29),
(541, 445, 28),
(542, 445, 29),
(543, 446, 45),
(544, 446, 36),
(545, 448, 25),
(546, 448, 26),
(547, 449, 25),
(548, 449, 26),
(549, 450, 25),
(550, 450, 26),
(551, 451, 8),
(552, 452, 25),
(553, 452, 26),
(556, 458, 25),
(557, 458, 26),
(558, 463, 48),
(559, 464, 25),
(560, 464, 30),
(561, 465, 25),
(562, 469, 4),
(563, 476, 48),
(564, 477, 26),
(565, 477, 27),
(566, 477, 32),
(567, 479, 25),
(568, 479, 27),
(569, 479, 34),
(570, 480, 48),
(571, 481, 25),
(572, 481, 29),
(573, 481, 40),
(574, 484, 41),
(575, 484, 43),
(576, 487, 45),
(577, 190, 25),
(578, 190, 28),
(579, 190, 33),
(583, 258, 37),
(584, 488, 37),
(585, 489, 40),
(586, 491, 25),
(587, 491, 26),
(588, 493, 8),
(589, 495, 25),
(590, 495, 26),
(591, 496, 26),
(592, 497, 41),
(593, 497, 43),
(594, 499, 36),
(595, 500, 33),
(596, 500, 34),
(597, 501, 30),
(598, 501, 40),
(599, 502, 44),
(600, 503, 4),
(601, 504, 25),
(602, 504, 26),
(603, 505, 46),
(604, 506, 31),
(605, 506, 33),
(606, 506, 35),
(607, 507, 25),
(608, 509, 25),
(609, 271, 40),
(610, 267, 40),
(611, 272, 40),
(612, 285, 40),
(613, 312, 40),
(614, 276, 40),
(615, 277, 40),
(616, 281, 40),
(617, 436, 40),
(619, 511, 40),
(620, 513, 39),
(621, 514, 46),
(622, 515, 39),
(623, 515, 40),
(624, 516, 40),
(625, 518, 40),
(626, 519, 40),
(627, 520, 45),
(628, 521, 40),
(629, 523, 40),
(630, 524, 40),
(631, 525, 40),
(632, 526, 25),
(633, 526, 29),
(634, 526, 36),
(635, 527, 4),
(636, 528, 4),
(637, 529, 48),
(638, 530, 33),
(642, 531, 45),
(643, 534, 48),
(644, 538, 4),
(645, 539, 26),
(646, 539, 27),
(647, 539, 28),
(648, 539, 29),
(649, 541, 25),
(650, 541, 27),
(651, 541, 29),
(652, 541, 44),
(653, 541, 39),
(654, 541, 40),
(655, 541, 41),
(656, 541, 42),
(657, 541, 34),
(658, 541, 36),
(659, 541, 37),
(660, 542, 25),
(661, 542, 26),
(662, 542, 27),
(663, 542, 28),
(664, 542, 29),
(665, 542, 30),
(666, 542, 44),
(667, 542, 45),
(668, 542, 39),
(669, 542, 40),
(670, 542, 41),
(671, 542, 42),
(672, 542, 43),
(673, 542, 33),
(674, 542, 34),
(675, 542, 36),
(676, 542, 37),
(677, 545, 4),
(678, 545, 23),
(679, 545, 22),
(680, 545, 17),
(681, 547, 31),
(682, 548, 2),
(683, 548, 3),
(684, 548, 19),
(685, 548, 20),
(686, 548, 21),
(687, 550, 25),
(688, 550, 26),
(689, 551, 25),
(690, 551, 26),
(691, 552, 25),
(692, 552, 26),
(693, 554, 25),
(694, 554, 44),
(695, 555, 25),
(696, 557, 25),
(697, 558, 3),
(698, 558, 4),
(699, 559, 48),
(700, 560, 33),
(701, 560, 34),
(702, 561, 25),
(703, 561, 29),
(704, 562, 46),
(705, 562, 48),
(706, 563, 33),
(707, 563, 34),
(708, 565, 46),
(709, 566, 26),
(710, 568, 4),
(711, 569, 44),
(712, 571, 8),
(713, 579, 25),
(714, 580, 2),
(715, 581, 51),
(716, 583, 31),
(717, 584, 66),
(718, 584, 69),
(719, 585, 22),
(720, 586, 54),
(721, 587, 5),
(722, 588, 29),
(723, 589, 29),
(724, 589, 30),
(725, 590, 25),
(726, 590, 29),
(727, 592, 25),
(728, 593, 25),
(729, 594, 46),
(730, 595, 25),
(731, 596, 27),
(732, 596, 33),
(733, 597, 29),
(734, 598, 48),
(735, 599, 29),
(736, 604, 29),
(737, 606, 33),
(738, 607, 33),
(739, 608, 29),
(740, 608, 40),
(741, 609, 40),
(742, 610, 32),
(743, 610, 36),
(744, 611, 36),
(745, 612, 32),
(746, 613, 40),
(747, 614, 40),
(748, 615, 25),
(749, 616, 25),
(750, 616, 26),
(751, 616, 31),
(752, 616, 32),
(753, 616, 34),
(756, 618, 32),
(757, 617, 25),
(758, 617, 35),
(759, 619, 40),
(760, 620, 25),
(761, 620, 27),
(762, 620, 30),
(763, 620, 33),
(764, 620, 34),
(765, 620, 36),
(766, 620, 37),
(767, 621, 48),
(768, 622, 47),
(769, 623, 32),
(770, 624, 48),
(771, 626, 40),
(772, 627, 35),
(773, 628, 40),
(774, 629, 33),
(775, 630, 40),
(776, 632, 40),
(777, 633, 40),
(778, 635, 29),
(779, 639, 33),
(780, 639, 37),
(781, 639, 47),
(782, 640, 36),
(783, 640, 37),
(784, 641, 36),
(785, 642, 25),
(786, 642, 26),
(787, 642, 36),
(788, 643, 37),
(789, 645, 25),
(790, 645, 28),
(791, 645, 46),
(792, 646, 31),
(793, 647, 21),
(794, 647, 14),
(795, 648, 25),
(796, 648, 26),
(797, 649, 25),
(798, 649, 26),
(799, 650, 20),
(800, 650, 8),
(801, 651, 43),
(802, 653, 25),
(803, 653, 26),
(804, 653, 27),
(805, 653, 33),
(806, 655, 29),
(807, 655, 48),
(808, 656, 29),
(809, 656, 45),
(810, 657, 29),
(811, 658, 46),
(812, 663, 25),
(813, 663, 26),
(814, 664, 25),
(815, 665, 2),
(816, 666, 40),
(817, 668, 25),
(818, 668, 26),
(819, 669, 25),
(820, 669, 26),
(821, 669, 29),
(822, 670, 25),
(823, 670, 26),
(825, 672, 27),
(826, 672, 28),
(827, 672, 29),
(828, 672, 30),
(829, 673, 25),
(830, 673, 29),
(831, 674, 25),
(832, 674, 26),
(833, 675, 25),
(834, 675, 26),
(835, 676, 25),
(836, 676, 26),
(837, 676, 29),
(840, 671, 25),
(841, 671, 29),
(842, 677, 30),
(843, 678, 45),
(844, 679, 32),
(845, 681, 25),
(846, 681, 26),
(847, 682, 25),
(848, 682, 26),
(849, 683, 40),
(850, 684, 29),
(851, 685, 40),
(852, 686, 4),
(853, 687, 25),
(854, 688, 26),
(855, 689, 48),
(856, 690, 25),
(857, 691, 25),
(858, 691, 26),
(859, 692, 48),
(860, 693, 40),
(861, 694, 25),
(862, 695, 26),
(863, 696, 40),
(865, 697, 33),
(866, 698, 40),
(867, 698, 41),
(868, 699, 40),
(869, 700, 25),
(870, 700, 26),
(871, 700, 28),
(872, 701, 25),
(873, 701, 26),
(874, 701, 27),
(875, 701, 44),
(876, 702, 33),
(877, 702, 34),
(878, 702, 35),
(879, 705, 25),
(880, 706, 26),
(881, 707, 25),
(882, 707, 26),
(883, 709, 25),
(884, 709, 26),
(885, 711, 25),
(886, 711, 26),
(887, 711, 29),
(888, 711, 36),
(889, 712, 48),
(890, 713, 25),
(891, 713, 33),
(892, 713, 34),
(893, 714, 25),
(894, 714, 48),
(895, 715, 25),
(896, 715, 34),
(897, 716, 48),
(898, 717, 44),
(899, 718, 48),
(900, 719, 44),
(901, 719, 36),
(902, 721, 25),
(903, 721, 26),
(904, 721, 28),
(905, 721, 44),
(906, 721, 31),
(907, 722, 25),
(908, 722, 27),
(909, 722, 28),
(910, 722, 33),
(911, 722, 34),
(912, 722, 36),
(913, 723, 33),
(914, 723, 34),
(915, 724, 25),
(916, 724, 26),
(917, 724, 28),
(918, 724, 44),
(919, 725, 26),
(920, 725, 28),
(921, 725, 34),
(922, 726, 44),
(923, 728, 48),
(924, 729, 27),
(925, 730, 29),
(926, 732, 25),
(927, 732, 29),
(928, 733, 45),
(929, 734, 30),
(930, 735, 25),
(931, 736, 25),
(932, 736, 29),
(933, 736, 40),
(934, 737, 25),
(935, 738, 27),
(936, 739, 40),
(937, 740, 2),
(938, 740, 4),
(939, 741, 40),
(940, 742, 26),
(941, 743, 40),
(942, 744, 40),
(943, 745, 31),
(944, 745, 35),
(945, 746, 40),
(946, 747, 39),
(947, 747, 40),
(948, 755, 40),
(949, 755, 41),
(950, 756, 26),
(951, 757, 26),
(952, 757, 30),
(953, 757, 34),
(954, 757, 36),
(955, 757, 46),
(956, 758, 37),
(957, 758, 48),
(958, 759, 29),
(959, 759, 45),
(960, 761, 27),
(961, 761, 29),
(962, 762, 26),
(963, 762, 29),
(964, 764, 25),
(965, 764, 33),
(966, 764, 35),
(967, 765, 48),
(968, 767, 44),
(969, 768, 33),
(970, 768, 35),
(971, 769, 45),
(972, 770, 25),
(973, 770, 31),
(974, 770, 33),
(975, 770, 35),
(976, 773, 25),
(977, 774, 26),
(978, 774, 44),
(979, 775, 25),
(980, 775, 48),
(981, 777, 25),
(982, 779, 2),
(983, 779, 4),
(984, 781, 42),
(985, 783, 42),
(986, 784, 25),
(987, 784, 26),
(988, 785, 25),
(989, 785, 26),
(990, 786, 1),
(991, 786, 9),
(992, 786, 10),
(993, 786, 11),
(994, 787, 29),
(995, 787, 36),
(996, 788, 57),
(997, 788, 65),
(998, 788, 68);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otrosubtema`
--

CREATE TABLE `otrosubtema` (
  `idotrosubtema` int(11) UNSIGNED NOT NULL,
  `nombre_otrosubtema` varchar(150) NOT NULL,
  `rel_idtema` smallint(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `otrosubtema`
--

INSERT INTO `otrosubtema` (`idotrosubtema`, `nombre_otrosubtema`, `rel_idtema`) VALUES
(1, 'aaaaa', 1),
(2, '43434', 14),
(3, 'nbmnbmn', 1),
(4, 'frfrfr', 1),
(5, 'frfrfr', 5),
(6, 'dewdwedwed', 11),
(7, 'grgrg', 1),
(8, '', 5),
(9, 'Otro subtema planteado', 14),
(10, 'aaaaaa', 1),
(11, 'bbbbbb', 5),
(12, 'aaaa', 11),
(13, 'bbbbb', 14),
(15, 'Caso armamento de argentina a bolivia en el año 2019', 12),
(16, 'Designación Defensor del Pueblo ', 15),
(17, 'Los representantes cumplen las normativas de protocolo de asignación de funcionarios públicos ', 15),
(18, 'Se desconoce, departe del MAS, el llamado a la reconciliación por parte de la iglesia católica', 15),
(19, 'Listas de difuntos ', 8),
(20, 'Detención ex ministro ', 11),
(21, '', 15),
(22, '', 15),
(23, 'Censo nacional de población y vivienda', 15),
(24, 'Contratación de la empresa digitalizadora de datos ', 7),
(25, 'Periodo de difusión ', 5),
(26, 'Actualización de la normativa en base a los requerimientos de la sociedad', 12),
(27, 'Censo población y vivienda ', 13),
(28, 'Censo ', 14),
(29, '', 15),
(30, 'Financiamiento del Censo Población y Vivienda', 16),
(31, 'personas con discapacidad y requerimiento de recursos económicos', 18),
(32, 'Ley de acceso a la información pública', 14),
(34, 'cvadfga', 3),
(35, ' Los Escaños ', 19),
(36, 'persecución política', 11),
(37, '', 15),
(38, 'personas de los diferentes barrios', 12),
(39, 'participacion judicial', 12),
(40, 'Organización adecuada de instituciones gubernamentales', 15),
(41, 'Rendición de cuentas de gestión de recursos del municipio', 14),
(42, 'Fraude electoral', 13),
(43, 'Ineficiencia del aparato estatal', 15),
(44, 'Las instituciones deben actuar conforme a la ley sin beneficiar a ninguna línea política.', 15),
(45, 'Consecuencias económicas del censo para la universidad', 19),
(46, 'Instituciones responden a los intereses de un partido político', 15),
(47, 'fraude electoral ', 9),
(48, '', 13),
(49, 'Participación de la Mujer ', 11),
(50, 'Derechos de la mujer.', 11),
(51, 'Fraude electoral ', 2),
(52, '', 15),
(53, 'SEDES PANDO', 15),
(54, '', 15),
(55, 'declaración a favor o en contra de un partido político', 13),
(56, '', 15),
(57, 'Fraude electoral', 13),
(58, '', 11),
(59, 'Solicitud de crédito', 15),
(60, '', 13),
(61, 'Sobreseimiento', 11),
(62, 'Fraude electoral', 11),
(63, 'Lanzamiento del plan de reactivación de hidrocarburos', 15),
(64, ' Manipulacion electoral ', 9),
(65, 'dar a conocer un proyecto para la mejora del municipio', 14),
(66, 'dispinibilidad de recursos para la reactivacion economica', 15),
(67, '', 12),
(69, 'Estudio de las elecciones de 2019 por consultores externos ', 9),
(70, 'Finalización de cambio de ministros en gestión', 11),
(71, 'Audiencia cautelar ', 15),
(72, 'Caso supuesto golpe de estado  y que no hubo fraude electoral', 12),
(73, 'Cambio de Ministros ', 14),
(74, '', 6),
(75, 'se desbarata el fraude de las elecciones 2019', 13),
(76, 'Participacion del gobernador', 12),
(77, 'Oposición endeble y marginada', 15),
(78, 'Participación de elecciones transparentes', 12),
(79, '', 9),
(80, '', 9),
(81, '', 2),
(82, '', 10),
(83, 'Movimientos cívicos ', 11),
(84, 'derechos y garantías ', 11),
(86, 'Opinion Politica', 12),
(87, 'Declaración de Centro de Enseñanza ', 20),
(88, 'niños y adolescentes', 12),
(89, 'Justicia política ante las muertes y repreción por sediçión', 11),
(90, 'Testimoniar los hechos accidentales. ', 15),
(91, 'Representante exigen soluciones para el casó. ', 15),
(92, 'Participación de ciudadanos ', 12),
(93, 'Redición de cuentas a la perjuicios estudiantes ', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otrotema`
--

CREATE TABLE `otrotema` (
  `idotrotema` int(10) UNSIGNED NOT NULL,
  `nombre_otrotema` varchar(150) NOT NULL,
  `rel_idcuestionario` smallint(2) UNSIGNED NOT NULL,
  `rel_idusuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `otrotema`
--

INSERT INTO `otrotema` (`idotrotema`, `nombre_otrotema`, `rel_idcuestionario`, `rel_idusuario`) VALUES
(1, 'dddd', 1, 5),
(2, 'fffff', 2, 5),
(3, '89898', 1, 5),
(4, 'cdcdcdc', 2, 5),
(5, 'ffffff', 1, 5),
(6, '', 1, 5),
(7, 'Otro tema', 2, 5),
(8, '', 1, 5),
(9, 'Otro tema panamericana', 1, 5),
(10, 'Otro tema red uno', 2, 5),
(11, '', 2, 41),
(12, 'progresiva protección de los derechos de la mujer frente a la violencia ', 2, 9),
(13, 'dede', 2, 5),
(14, 'Vulneración Derechos ', 2, 51),
(15, 'Separación y equilibrio  entre los órganos ejecutivo,  legislativo y judicial ', 2, 47),
(16, 'persecución política', 2, 29),
(17, 'Leyes', 2, 54),
(18, 'Censo población y vivienda ', 2, 43),
(19, 'CENSO', 1, 29),
(20, 'CENSO', 2, 29),
(21, 'CENSO', 1, 29),
(22, 'CENSO', 1, 29),
(23, 'Censo de Población y Vivienda 2022', 1, 34),
(24, 'Censo de Población y Vivienda 2022', 1, 34),
(25, 'Censo', 2, 16),
(26, 'Escuela de notarios ', 1, 51),
(27, 'Realización del censo de población y vivienda el 16.11.2022', 1, 42),
(28, 'Censo población y vivienda 2022', 2, 43),
(29, 'Censo ', 2, 44),
(30, 'persecución política', 2, 29),
(31, 'Conflicto político', 2, 29),
(32, 'Persecución político judicial  ', 2, 42),
(33, 'gobierno anuncio este miercoles que el banco mundial garantizo con el financiamiento del censo del 2022', 1, 22),
(34, 'Se oponen a los datos del censo para distribución de escaños ', 1, 51),
(35, 'Censo de población y vivienda', 1, 42),
(36, 'Senkata, Seguridad Nacional', 2, 29),
(37, 'persecución política, protección y asilo', 2, 29),
(38, 'Injerencia ', 2, 29),
(39, 'Otros temas de censo', 3, 5),
(40, 'Conflicto limítrofe', 2, 30),
(41, 'persecución política', 2, 29),
(42, 'persecución política', 2, 29),
(43, 'persecución política', 2, 29),
(44, 'persecución política', 2, 29),
(45, 'persecución política', 2, 29),
(46, 'persecución política', 2, 29),
(47, 'persecución política', 2, 29),
(48, 'Transparencia en actividades administrativas', 2, 49),
(49, 'Quemas y chequeos.... unidad de gestión de riesgos. ', 2, 53),
(50, ' Pericia a las elecciones  nacionales 2019', 1, 16),
(51, 'Elecciones nacionales 2019', 1, 16),
(52, 'Elecciones nacionales 2019', 1, 16),
(53, 'Elecciones nacionales 2019', 1, 16),
(54, 'Injerencia ', 2, 29),
(55, 'Fraude electoral', 2, 29),
(56, 'Fraude electoral', 2, 29),
(57, 'Fraude electoral', 2, 29),
(58, 'persecución política', 2, 29),
(59, 'Caso Golpe de Estado', 2, 29),
(60, 'Fraude electoral', 2, 29),
(61, 'Fraude electoral ', 1, 16),
(62, 'persecución política', 2, 29),
(63, 'Golpe de Estado', 2, 29),
(64, 'Fraude electoral', 2, 29),
(65, 'Golpe de Estado, OEA', 2, 29),
(66, 'Fraude electoral, OEA, Universidad de Salamanca', 2, 29),
(67, 'persecución política', 2, 29),
(68, 'Fraude electoral; OEA', 2, 29),
(69, 'Fraude electoral, OEA', 2, 29),
(70, 'Fraude electoral, Golpe de Estado', 2, 29),
(71, 'Fraude electoral, conflicto político ', 2, 29),
(72, 'Fraude electoral, Universidad de Salamanca', 2, 29),
(73, 'OEA, Fraude electoral', 2, 29),
(74, 'Democracia', 2, 29),
(75, 'Fraude electoral; OEA', 2, 29),
(76, 'Fraude electoral; OEA; Universidad de Salamanca', 2, 29),
(77, 'Fraude electoral', 2, 29),
(78, 'persecución política', 2, 29),
(79, 'persecución política; golde de Estado', 2, 29),
(80, 'Fraude electoral; OEA', 2, 29),
(81, 'Senkata', 2, 29),
(82, 'Fraude electoral; Golpe de Estado', 2, 29),
(83, 'Elecciones nacionales 2019.', 1, 16),
(84, 'salud', 2, 45),
(85, 'Aprensión ', 2, 45),
(86, 'Caso fraude electoral', 1, 28),
(87, 'No hay noticias sobre el tema', 1, 28),
(88, 'desarrollo económico ', 2, 9),
(89, 'Fraude electoral', 2, 29),
(90, 'Fraude electoral; Sobreseimiento ', 2, 29),
(91, 'Fraude electoral', 2, 29),
(92, 'Fraude electoral; persecución política', 2, 29),
(93, 'Fraude electoral', 1, 29),
(94, 'Fraude electoral; Sobreseimiento ', 2, 29),
(95, 'persecución política; golpe de Estado', 2, 29),
(96, 'Universidad de Salamanca, Fraude electoral, Golpe de Estado', 2, 29),
(97, 'OEA, EEUU', 2, 29),
(98, 'grupos de resistencia; persecución política ', 2, 29),
(99, 'Caso Golpe de Estado', 2, 29),
(100, 'persecución política', 2, 29),
(101, 'Fraude electoral; EEUU', 2, 29),
(102, 'post censo, redistribución ', 3, 29),
(103, 'post censo ', 3, 29),
(104, 'INE, post censo, distribución de ingresos', 3, 29),
(105, 'Armamento ilegal. ', 2, 31),
(106, 'Bolivia reconoce el nuevo gobierno de Peru.  ', 2, 31),
(107, 'Carta del materia antidisturbios.', 2, 31),
(108, 'Donación a Cuba.', 2, 31),
(109, 'Elecciones nacionales 2019', 1, 16),
(110, 'Investigación policial ', 2, 57),
(111, 'No hay noticias sobre el tema', 2, 28),
(112, 'Transparecia judicial ', 2, 30),
(113, 'Gobernaciones delimitando territorios', 2, 30),
(114, 'ganancias ilicitas', 2, 48),
(115, 'Caso Golpe de Estado', 2, 29),
(116, 'Sucesión', 2, 29),
(117, 'Fraude electoral; OEA; Universidad de Salamanca', 1, 29),
(118, 'Anulación de las elecciones de 2019', 1, 29),
(119, 'persecución política; golpe de Estado', 2, 29),
(120, 'Respeto y garantía de los derechos humanos', 2, 34),
(121, 'Fraude electoral', 2, 29),
(122, 'OEA, EEUU', 2, 29),
(123, 'OEA, Fraude electoral, Estudio Universidad de Salamanca', 1, 29),
(124, 'Audiencia ', 2, 53),
(125, 'Salud: el gobierno análiza opciónes para atender la demanda de 2da dosis de SPUTNIK V', 2, 22),
(126, 'Daños materiales que el estado tiene que reponer por el caso de domos quemados', 2, 22),
(127, 'Salud: según los resultados es la combinación de vacunas de sputnik V y Aztrazeneca muestra un alto nivel de seguridad', 2, 22),
(128, 'Salud ', 2, 22),
(129, 'Posible inicio de proceso por responsabilidad en la función publica ', 2, 42),
(130, 'Persecución político judicial  ', 2, 42),
(131, 'Manipulación judicial con fines políticos', 2, 42),
(132, 'Cambio de Gabinete', 2, 29),
(133, 'Fraude electoral; OEA; Universidad de Salamanca', 1, 29),
(134, 'Caso Golpe de Estado', 2, 29),
(135, 'Caso Golpe de Estado; Sucesión Constitucional ', 2, 29),
(136, 'Ratero fue linchado', 2, 57),
(137, 'Persecución político judicial  ', 2, 42),
(138, 'defensa de asociaciones a sus partidos politicos', 2, 18),
(139, 'Manipulación judicial con fines políticos', 2, 42),
(140, 'Manipulación judicial con fines políticos', 2, 42),
(141, 'Fraude electoral', 2, 29),
(142, 'Fraude electoral; OEA; Universidad de Salamanca', 1, 29),
(143, 'Manipulación política ', 2, 42),
(144, 'Manipulación judicial con fines políticos', 2, 42),
(145, 'Persecución política  ', 2, 42),
(146, 'Persecución política  ', 2, 42),
(147, 'Persecución política ', 2, 42),
(148, 'Otro tema de censo', 3, 21),
(149, 'Reforma electoral otro tema', 1, 21),
(150, 'fraude electora', 2, 32),
(151, 'fraude electora', 2, 32),
(152, 'fraude electora', 2, 32),
(153, 'intervención internacional en el caso del fraude en Bolivia', 1, 21),
(154, 'No hay noticias sobre el tema', 2, 28),
(155, 'Comite civico', 1, 45),
(156, 'No hay noticias sobre el tema', 1, 28),
(157, 'Manipulación judicial con fines políticos', 2, 42),
(158, 'Fraude electoral', 2, 29),
(159, 'políticas publicas. ', 2, 31),
(160, 'Fraude electoral', 2, 29),
(161, 'Congreso del MAS', 2, 29),
(162, 'Iglesia Católica', 2, 29),
(163, 'Fraude electoral', 2, 29),
(164, 'Persecución político judicial  ', 2, 42),
(165, 'Ninguno', 1, 35),
(166, 'Ley de comercio', 4, 5),
(167, 'Fraude electoral', 2, 29),
(168, 'Fraude electoral', 2, 29),
(169, 'persecución política', 2, 29),
(170, 'persecución política', 2, 29),
(171, 'detencion politica a ex ministro de gobieno', 2, 13),
(172, 'Protesta ciudadana por manipulación judicial', 2, 42),
(173, 'Proyecto bono escolar.', 2, 31),
(174, 'Donación del plan dignidad a la UTOP.', 2, 31),
(175, 'vulneración de derechos y garantías ', 2, 29),
(176, 'Iglesia Católica', 2, 29),
(177, 'persecución política', 2, 29),
(178, 'Congreso del MAS', 2, 29),
(179, 'Fraude electoral, Movimiento Cívico ', 2, 29),
(180, 'celebración de aniversario de Bolivia ', 2, 45),
(181, 'Jovenes activista', 2, 45),
(182, 'Ley de rebaja tributaria. ', 2, 31),
(183, 'Caso de afectación familiar. ', 2, 57),
(184, 'Contribuciones empresariales', 2, 48),
(185, 'Suspencion de desfiles patrios', 2, 48),
(186, 'Manipulación judicial con fines políticos', 2, 42),
(187, 'Manipulación política ', 2, 42),
(188, 'proceso de Justicia a ex representante', 2, 21),
(189, 'Sucesión constitucional ', 2, 29),
(190, 'Congreso del MAS', 2, 29),
(191, 'persecución política', 2, 29),
(192, 'persecución política', 2, 29),
(193, 'Otro', 2, 5),
(194, 'Censo otro tema', 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtema`
--

CREATE TABLE `subtema` (
  `idsubtema` smallint(5) UNSIGNED NOT NULL,
  `nombre_subtema` text NOT NULL,
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
(48, 'Rendición de cuentas del uso de recursos públicos', 15),
(49, 'Qué es el CENSO ', 16),
(50, 'Cómo se hace un CENSO', 16),
(51, 'Cuándo se realiza ', 16),
(52, 'Administración, políticas ', 17),
(53, 'Registros electorales ', 17),
(54, 'Situación económica y social ', 17),
(55, 'Situación temas estratégicos ', 17),
(56, 'Investigación ', 17),
(57, 'Comercio, industrias, planificación ', 17),
(58, 'Distribución de recursos financieros ', 17),
(59, 'Censo de vivienda', 18),
(60, 'Censo agropecuario', 18),
(61, 'Censo de establecimientos económicos', 18),
(62, 'Base legal del censo ', 19),
(63, 'Presupuesto ', 19),
(64, 'Cronograma ', 19),
(65, 'Organización administrativa', 19),
(66, 'Actualización cartográfica', 19),
(67, 'Programa de tabulación', 19),
(68, 'Preparación de la Boleta o cuestionario', 19),
(69, 'Piloto', 19),
(70, 'Selección y formación del personal', 19),
(71, 'Universalizar el acceso a la educación', 20),
(72, 'Instalar laboratorios de ciencia y tecnología con acceso a Internet en todas las Unidades Educativas del país.', 20),
(73, 'Desarrollar programas nacionales que vinculen la educación superior con prácticas profesionales en el sector público y las empresas estatales.', 20),
(74, 'Construcción y equipamiento de los hospitales de segundo y tercer nivel, así como los Institutos de cuarto nivel de atención, Contar con nuevos ítems ', 21),
(75, 'Consolidar y fortalecer los centros de radioterapia', 21),
(76, 'Construcción y equipamiento de Hospitales Materno infantiles,', 21),
(77, 'Crear programas destinados a la educación en salud sexual y reproductiva', 21),
(78, 'Instaurar en el país el chequeo médico obligatorio en el mes del cumpleaños de cada uno de los bolivianos', 21),
(79, 'Reducir el sobrepeso de la población', 21),
(80, 'Modernizar la gestión judicial e introducir tecnologías de la información y comunicación que permitan agilizar los procesos judiciales', 22),
(81, 'Incrementar el número de procesos judiciales en todas las materias: civil-comercial, penal, familiar, niñez y adolescencia, coactivo fiscal, violencia, anticorrupción y laboral, con énfasis  en los casos de feminicidios y violencia hacia las mujeres, niñas y adolescentes', 22),
(82, 'Selección de autoridades judiciales bajo criterios de transparencia y meritocracia,', 22),
(83, 'Ampliar la infraestructura de centros penitenciarios a lo largo del país,', 22),
(84, 'Nueva normativa para viabilizar la sanción penal, mejorar las capacidades de los servidores públicos del Ministerio Público, Policía Boliviana, Defensa Pública y Órgano Judicial.', 22),
(85, 'Mayor inversión en seguridad ciudadana, específicamente para la lucha contra la violencia hacia las mujeres, niñas y adolescentes. ', 23),
(86, 'Más programas y proyectos dirigidos a la prevención y registro de crímenes de violencia contra la mujer', 23),
(87, 'Construcción de centros integrales de atención para víctimas de violencia y programas de sensibilización de trato a víctimas de violencia', 23),
(88, 'Incorporar mecanismos que garanticen la transparencia en las funciones que realiza la Policía, e implementar procedimientos que aseguren la selección de agentes policiales', 23),
(89, 'Mejorar las condiciones del personal en los puestos militares', 23),
(90, 'Crear incentivos para ampliar su incorporación al mundo laboral y entrarán en esquemas de protección social ', 24),
(91, 'Promover la participación de la mujer dentro de la sociedad y la economía,', 24),
(92, 'Promover proyectos de infraestructura y programas específicos para personas con capacidades diferentes o de la tercera edad.', 25),
(93, 'Difundir, sensibilizar y Promocionar la Declaración sobre los Derechos de los Pueblos Indígenas', 25),
(94, 'Apoyar la aplicación mundial de la Declaración sobre los Derechos de los Pueblos Indígenas', 25),
(95, 'Fomentar la participación de los pueblos indígenas en los procesos de las Naciones Unidas', 25),
(96, 'Defensa y promoción de la consulta previa, libre e informada como contribución a la protección y realización los derechos de los pueblos indígenas.', 25),
(97, 'Mantener la política de bonos, aportando a los ingresos de los hogares más vulnerables.', 26),
(98, 'Implementar sistemas de información y comunicación para control y monitoreo de contaminación y daños ambientales ', 27),
(99, 'Para el periodo 2020 - 2025 es necesario implementar un Plan Nacional Para el Bosque Seco Chiquitano denominado “8 Raíces de Vida para Restaurar y Fortalecer nuestros Bosques y la biodiversidad”', 27),
(100, 'Desarrollar la CAMPAÑA NACIONAL BOSQUE VIVO HOGAR DE TODOS en el marco de un Proyecto de Forestación y Reforestación masiva en las áreas afectadas por incendios', 27),
(101, 'Desarrollar un Plan y un marco normativo y de regulación de la conservación y el uso de los componentes de los ecosistemas amazónicos y chiquitanos', 27),
(102, 'Fortalecer las Áreas Protegidas respetando los fines y objetivos de las mismas correspondientes del Sistema Nacional, Departamental, y Municipal de Áreas Protegidas.', 27),
(103, 'Consolidar procesos de gestión integral de residuos sólidos ', 27),
(104, 'Reactivar la economía y el aparato productivo ', 28),
(105, 'Digitalización de comercio, comercio de bienes y servicios tecnológicos.', 28),
(106, 'ii. Dinamizar negocios basados en operaciones confiables y gestionadas con seguridad y soporte financiero regulado y normado.', 28),
(107, 'iii. Proteger los datos e información de nuestros actores comerciales y financieros con un sistema de seguridad cibernética nacional en el marco de la soberanía tecnológica.', 28),
(108, 'iv. Desarrollo de marcos normativos y mecanismos institucionales sobre incorporación de sistemas informáticos y tecnologías de información asociados a las inversiones y el comercio', 28),
(109, 'Fomentar el desarrollo económico y social, preservando la estabilidad macroeconómica,', 28),
(110, 'Fortalecer la industrialización en Bolivia y mantener un crecimiento económico sostenido; la meta en 2025 es un PIB nominal cercano a 60.000 millones de dólares o un PIB per cápita superior a 5.000 de dólares. ', 28),
(111, 'Garantizar la sostenibilidad de la deuda pública', 28),
(112, 'Desarrollar estrategias de articulación e integración económica y sectorial (agropecuaria, agroindustria, industria manufacturera, servicios, turismo, etc.),', 28),
(113, 'Desarrollar mecanismos de integración económica regional,  con una política de incentivos tributarios selectivos para la exportación de productos con valor agregado', 28),
(114, 'Establecer una política arancelaria dinámica, que responda a las necesidades del producción, estableciendo un comité público – privado, encargado de revisar mensualmente los aranceles', 28),
(115, 'Desarrollar incentivos para la inversión privada (nacional o extranjera), entre estos incentivos se pueden mencionar la exención temporal de impuestos,', 28),
(116, 'Lograr la desburocratización y facilitación de trámites en entidades encargadas de fiscalizar la producción', 28),
(117, 'Suscribir acuerdos específicos de protección de inversiones, ya sea con inversionistas o con países, respetando la Constitución Boliviana', 28),
(118, 'Llegar, en 2025, a una pobreza extrema del 5%, es decir, lograr su reducción, en los próximos cinco años, en diez puntos porcentuales', 29),
(119, 'Incrementar la cobertura del servicio de agua potable al 96% y saneamiento básico al 80%, ', 29),
(120, 'Dotar de alcantarillado a las zonas urbanas y de saneamiento mejorado al área rural del país, a través del programa \"Mi Alcantarillado\".', 29),
(121, 'Implementar la Televisión Digital Abierta en ciudades intermedias', 29),
(122, 'Incrementar la cobertura del servicio de telefonía móvil e internet al 100% en todas las regiones y localidades del país, con tarifas reducidas.', 29),
(123, 'Alcanzar una cobertura de gas domiciliario del 90% en las grandes ciudades y ciudades intermedias.', 29),
(124, 'Disminuir a 9% la incidencia de desnutrición crónica en niños y niñas menores de cinco años, disminuir a 30% la prevalencia de anemia en niños y niñas menores de cinco años e incrementar la lactancia materna a 84%.', 29),
(125, 'Apoyar la alimentación complementaria en las escuelas a lo largo de al menos 150 días al año.', 29),
(126, 'normativa para la combinación estudio-trabajo,', 30),
(127, 'implementaremos políticas fiscales, financieras y de incentivo para la creación de fuentes de trabajo', 30),
(128, 'plantear esquemas tributarios adecuados y progresivos para impulsar la generación de empleo de calidad,', 30),
(129, 'incentivos para ampliar su incorporación al mundo laboral y entrarán en esquemas de protección social para la mujer', 30),
(130, 'Aumentar del tamaño de la producción por inversión pública - proyectos de industrialización con altos retornos', 32),
(131, 'Impulsar la variedad de productos y su posicionamiento en el mercado internacional', 32),
(132, 'Producción de bienes y servicios que sustituyan las importaciones y aumenten la oferta exportadora.', 32),
(133, 'Desarrollar la petroquímica, siderurgia, la industria del litio y sus derivados', 32),
(134, 'Producción de hierro de Mutún permitirá a Bolivia ingresar a la era de la siderurgia', 32),
(135, 'Promover los emprendimientos de las industrias digitales será una de nuestras prioridades.', 32),
(136, 'Apoyar a la industria naciente con incentivos (premios a la innovación, celeridad en la apertura y disminución de los trámites burocráticos, así como apoyo a los productores en las áreas de ciencia y tecnología, inocuidad alimentaria, procesos de exportación, importación de insumos, gobierno electrónico para tributación y obligaciones laborales)', 32),
(137, 'Mejores condiciones productivas y tecnológicas para los pequeños y medianos productores del área rural y urbana ', 32),
(138, 'Expandir la frontera agropecuaria para que nuestros productores puedan producir más alimentos.', 32),
(139, 'Transformar las instituciones como SENASAG y SENAVEX ', 32),
(140, 'Crear una oficina de apoyo al exportador', 32),
(141, 'Cambio de la matriz energética (impulsando los proyectos de industrialización de nuestros recursos evaporíticos e hidrocarburíferos, para conformar una industria básica en el país: química, siderúrgica, petroquímica) (logrando un mayor uso de plantas hidroeléctricas y de energías alternativas (solar, eólica y biomasa)', 33),
(142, 'Especializarnos e insertarnos en los primeros eslabones de la industrialización de baterías', 33),
(143, 'Industrialización del litio boliviano', 33),
(144, 'Exportar la energía eléctrica a nuestros vecinos', 33),
(145, 'Producción de etanol y continuar con la producción de biocombustibles (bio-diésel). (Reducir la importación del diésel oíl y cubrir el consumo interno con la puesta en marcha del Proyecto de Biodiesel responsable y equilibrada con el medio ambiente)', 33),
(146, 'Asegurar que todas las bolivianas y los bolivianos cuenten con servicio eléctrico', 33),
(147, 'Incrementar las reservas de gas natural a 20 TCF, (mediante inversiones realizadas en varios proyectos de exploración y perforación de pozos)', 33),
(148, 'Realizar inversiones que permitan incrementar la producción de minerales (yeso, zinc y otros) ', 34),
(149, 'Incrementar las exportaciones de minerales con un proceso de agregación de valor.', 34),
(150, 'Montar plantas de fundición y refinación de minerales, y poner en funcionamiento la Planta Siderúrgica del Mutún.', 34),
(151, 'Consolidar la industrialización del litio boliviano diversificando la matriz productiva del pais.', 34),
(152, 'Consolidar los mercados de exportación para generar nuevas fuentes de ingresos.', 34),
(153, 'Una eficiente Gobernanza de los recursos hídricos que permita la gestión eficiente y sustentable de los mismos y así como la prevención de conflictos y su solución.', 34),
(154, 'Promover el reconocimiento del derecho de los pueblos indígenas de participar activamente en la toma de decisiones.', 34),
(155, 'Promoverá la gestión pública del agua. (Los recursos hídricos constituyen patrimonio común universal de la humanidad y la afectación de éstos constituye un perjuicio para la vida y el planeta por ello no pueden estar en manos privadas)', 34),
(156, 'Promocionar un modelo de combate a las drogas basado en el respeto a los derechos humanos, la concertación social y la corresponsabilidad de los Estados.', 36),
(157, 'Fortalecer decididamente la lucha contra el narcotráfico', 36),
(158, 'Implementar mecanismos que eviten que el narcotráfico penetre en las estructuras de la Policía Boliviana, Fuerzas Armadas ni en ninguna otra institución pública.', 36),
(159, 'Impulsar e incrementar los operativos antidroga', 36),
(160, 'Continuar con la racionalización y erradicación de cultivos excedentarios de coca.', 36),
(161, 'Terminaremos la construcción del Sistema de Contrataciones Electrónico (iniciada por el MEFP en 2018) ', 37),
(162, 'Fortalecer la administración pública del Estado Plurinacional ( basándose en los principios ético-morales del ama suwa (no robar), ama llulla (no mentir) y ama quella (no ser flojo), cumpliendo el mandato de \"Cero Tolerancia a la Corrupción\".)', 37),
(163, 'Fortalecer el modelo de gestión que desconcentra las acciones de transparencia, prevención y lucha contra la corrupción en todos los órganos del Estado, empresas públicas, autárquicas y otras.', 37),
(164, 'Promover la inversión del sector privado en turismo', 38),
(165, 'Promoverlo como un mecanismo de práctica comunitaria', 38),
(166, 'Elaborar y poner en marcha el Plan Integral de Aprovechamiento de la Hidrovía Ichilo-Mamoré-Madera', 38),
(167, 'Construir nueva infraestructura deportiva de iniciación, formación y alto rendimiento,', 40),
(168, 'Implementar las Escuelas Deportivas Plurinacionales en cada municipio', 40),
(169, 'Formar y capacitar a deportistas, técnicos, entrenadores, jueces, médicos y otros actores del deporte a través de la otorgación de becas', 40),
(170, 'Implementar el Programa Plurinacional de Alto Rendimiento Deportivo,', 40),
(171, 'Nuestra visión estratégica también incluye la transformación del país en un centro de transporte de la región', 41),
(172, 'Concluir con las gestiones y el inicio de la construcción del Corredor Ferroviario Bioceánico de Integración,', 41),
(173, 'temas de la política exterior (Diplomacia de los pueblos por la paz y la democracia, reforma de la arquitectura financiera mundial y de las instituciones financieras, derechos de los pueblos indígenas, cambio climático y la Madre Tierra, diplomacia del agua, promoción del comercio y las inversiones, atención de las bolivianas y bolivianos en el exterior y ciudadanía universal, revalorización de la hoja de coca, continuar la labor para la reforma de la Organización de las Naciones Unidas y su Consejo de Seguridad, Promoción Comercial, Negociaciones Comerciales Internacionales, Promoción de las Inversiones, acceso a puertos en condiciones favorables para Bolivia.)', 41),
(174, 'Promover la investigación y difusión de los múltiples beneficios medicinales y nutricionales de la hoja de coca ', 41),
(175, 'Desarrollar una diplomacia comercial que nos permita superar barreras no arancelarias en mercados como los Estados Unidos, la Unión Europea y países asiáticos, ', 41),
(176, 'Construir en lugares a determinar puertos secos, para que la consolidación y desconsolidación de carga se realice en Bolivia', 41),
(177, 'Realizar las inversiones portuarias necesarias para que Ilo sea una verdadera alternativa al comercio exterior boliviano', 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `idtema` smallint(4) UNSIGNED NOT NULL,
  `nombre_tema` varchar(150) NOT NULL,
  `rel_idcuestionario` smallint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`idtema`, `nombre_tema`, `rel_idcuestionario`) VALUES
(1, 'Presentacion de Estatutos de organizaciones politicas', 1),
(2, 'Competencias Jurisdicionales del TSE', 1),
(3, 'Redistribuicion de Escaños', 1),
(4, 'Circunscripciones uninominales', 1),
(5, 'Difusion de encuestas', 1),
(6, 'Inhabilitacion de candidatos', 1),
(7, 'Computo departamental', 1),
(8, 'Padron Electoral', 1),
(9, 'Procedimientos Tecnico Electorales', 1),
(10, 'Financiamiento politico y partidario', 1),
(11, 'Ejercicio en libertad de derechos políticos', 2),
(12, 'Inclusión política', 2),
(13, 'Participación en el ámbito electoral', 2),
(14, 'Integración de los ciudadanos en la definición y gestión del Estado', 2),
(15, 'Instituciones', 2),
(16, 'Información a la población ', 3),
(17, 'Uso de los datos censales', 3),
(18, 'Otros Censos', 3),
(19, 'Etapa Pre Censal ', 3),
(20, 'Educación', 4),
(21, 'Salud', 4),
(22, 'Administración De Justicia', 4),
(23, 'Seguridad Ciudadana', 4),
(24, 'Género', 4),
(25, 'Igualdad (Inclusión)', 4),
(26, 'Bonos', 4),
(27, 'Medio Ambiente', 4),
(28, 'Economía', 4),
(29, 'Pobreza Y Desarrollo', 4),
(30, 'Empleo', 4),
(31, 'Impuestos', 4),
(32, 'Industria', 4),
(33, 'Energía', 4),
(34, 'Recursos Naturales', 4),
(35, 'Descentralización Y Autonomía', 4),
(36, 'Narcotráfico', 4),
(37, 'Corrupción', 4),
(38, 'Turismo', 4),
(39, 'Arte Y Cultura', 4),
(40, 'Deportes', 4),
(41, 'Política Exterior', 4);

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
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE `universidad` (
  `iduniversidad` smallint(3) UNSIGNED NOT NULL,
  `nombre_universidad` varchar(150) NOT NULL,
  `sigla_universidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`iduniversidad`, `nombre_universidad`, `sigla_universidad`) VALUES
(1, 'No definido', 'ND'),
(2, 'Universidad Tecnica de Oruro', 'UTO'),
(3, 'Universidad Mayor de San Simon', 'UMSS'),
(4, 'Universidad Catolica Boliviana', 'UCB'),
(5, 'Universidad Mayor Real y Pontificia de San Francisco Xavier', 'USFX'),
(6, 'Universidad Amazonica de Pando', 'UAP'),
(7, 'Universidad Autonoma Gabriel Rene Moreno', 'UAGRM'),
(8, 'Universidad Mayor de San Andres', 'UMSA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad_departamento`
--

CREATE TABLE `universidad_departamento` (
  `idudepa` int(11) NOT NULL,
  `rel_iduniversidad` smallint(3) UNSIGNED NOT NULL,
  `rel_iddepartamento` smallint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `universidad_departamento`
--

INSERT INTO `universidad_departamento` (`idudepa`, `rel_iduniversidad`, `rel_iddepartamento`) VALUES
(0, 1, 3),
(0, 2, 4),
(0, 3, 1),
(0, 4, 5),
(0, 5, 8),
(0, 6, 2),
(0, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `urlley`
--

CREATE TABLE `urlley` (
  `idurlley` int(11) UNSIGNED NOT NULL,
  `url_ley` varchar(255) NOT NULL,
  `rel_idley` int(11) UNSIGNED NOT NULL,
  `rel_idestadoley` smallint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `urlley`
--

INSERT INTO `urlley` (`idurlley`, `url_ley`, `rel_idley`, `rel_idestadoley`) VALUES
(1, 'http://www.diputados.bo/leyes/pl-n%C2%B0-2382020-2021-test', 1, 1),
(2, 'https://proyecto-de-ley-modificacion', 1, 4),
(3, 'http://www.diputados.bo/leyes/pla-n%C2%B0-2372020-2021', 2, 1),
(4, 'http://www.diputados.bo/leyes/pl-n%C2%B0-2382020-2021', 3, 3),
(5, 'http://www.diputados.bo/leyes/pl-cm-n%C2%B0-0282020-2021', 4, 4),
(6, 'http://www.diputados.bo/leyes/pla-n%C2%B0-2372020-2021jhg ', 5, 1),
(7, 'http://www.diputados.bo/leyes/pl-n%C2%B0-0042020-2021', 6, 1),
(8, 'avaadfasdfasd', 6, 3);

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
  `direccion` varchar(255) DEFAULT NULL,
  `rel_iduniversidad` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `carnet_identidad`, `geolocalizacion`, `rel_iddepartamento`, `direccion`, `rel_iduniversidad`) VALUES
(1, '127.0.0.1', 'admin', '$2y$12$bGXrgAr0ErDJt2ICW/f2v.6M1LOI2l6KqFvj9Ot0rLPGdYy8h2sle', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1628906032, 1, 'Admin', 'istrator', 'ADMIN', '0', '0', 'geolocalizacion', 1, NULL, 1),
(2, '127.0.0.1', 'marcelo', '$2y$10$cvMbrdm9qpYyudrwhq3mu.yimTBsIywbbXoNEu4bRo4oRm82RGtye', 'MRolqueza@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625062770, 1625414827, 1, 'Marcelo', 'Rolqueza', NULL, NULL, '4834568', 'GEOLOCALIZACION', 1, 'Mariano Colodro #1447', 1),
(3, '127.0.0.1', 'albert', '$2y$10$viKV5QXqqrNbc5MMPx8kyuXLOWDMjYU5uLBlgGhjwqM3C0H9vFtT6', 'albert@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625062902, 1625414291, 1, 'Julia Carmen', 'Misericordia Morales', NULL, NULL, '7298782', '', 3, '', 0),
(4, '127.0.0.1', 'jcarlos', '$2y$10$xj7vhmTVFZOMLHbKfrhz.O2l37pN7cssOOBM0mGsXZ1A9B4S3se.W', 'almeyda@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625358200, NULL, 1, 'Juan Carlos', 'Almeyda', NULL, NULL, '48693587', '45465456456456454', 4, 'Calle Alberto #4323', 0),
(5, '127.0.0.1', 'mon-alfredo', '$2y$10$qzrbE.2JZUSt/AAi7.ObZuBYsK3/R6YJANzOSJvxp7aHSPXIuhTWi', 'alfredo@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625415047, 1628809866, 1, 'Alfredo R.', 'Torrico L.', NULL, NULL, NULL, NULL, 1, NULL, 0),
(6, '127.0.0.1', 'mon-claudia', '$2y$10$oq9duUb2wp.cOrNj0h.oouNPk7redo3vaUlwpKEsrfT.Q4nN7.A9C', 'claudia@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625415426, 1625420030, 1, 'Claudia', 'Arteaga', NULL, NULL, '49512234654', '546545456456454654', 4, 'Av. Sucre #4452', 0),
(7, '127.0.0.1', 'mon-carlos', '$2y$10$qzJf1mPzU1NH0EJ6YIwZ.uL2P18cx3OaAkYjIy.F5En57hbNrWJBe', 'carlos@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625415550, 1625419998, 1, 'Carlos', 'Olivera', NULL, NULL, '495452121', '94945454654654', 2, 'Av. Circunvalacion #476', 0),
(8, '127.0.0.1', 'mon-adriana', '$2y$10$kVDfs/u3izDKtmAJCieTb.PJNrV6SYQv3vazv3fV4kXw1.aJ3ZCHG', 'adrianitajus98@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625674404, NULL, 1, 'Adriana', 'Mier Justiniano', NULL, NULL, '6787516', '', 1, '', 4),
(9, '127.0.0.1', 'mon-alejandro', '$2y$10$u.4.qtFJYfAEoPnNXaYOZeeA6Foyfw5QCDjLcSpA26NPinNaclhMO', '201907084@ est.edu.bo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625674506, 1628124055, 1, 'Alejandro', 'Galindo Wieler', NULL, NULL, '00', '', 4, '', 1),
(10, '127.0.0.1', 'mon-alison', '$2y$10$u/6WP7Hnfa1BQQ7M0RtJVOfHunpiTN3wJjn5vzrVx7Q5Q8BxMoPD2', 'alison.sthephanie30@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625674629, 1628038585, 1, 'Alison', 'Romero', NULL, NULL, '8537724', '', 1, '', 4),
(11, '127.0.0.1', 'mon-ami', '$2y$10$Q3Y8QpHoHPVEb2u5pmJtAebSM7IcIetvLCnQUXGs/2urqDlGnrAqC', 'amisita_la_seri@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625675771, NULL, 1, 'Ami', 'Cruz Amacifen', NULL, NULL, '4217053', '', 8, '', 1),
(12, '127.0.0.1', 'mon-andres', '$2y$10$K925qdJA4PPWbjmdB/mVQuZZdXAXOfOGtIFFoD6JglaARZiuJowQ6', 'andresventiadesb@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625675847, 1627747386, 1, 'Andrés', 'Ventiades Velásquez ', NULL, NULL, '13905327', '', 5, '', 5),
(13, '127.0.0.1', 'mon-angelo', '$2y$10$frwfgKIzEEtuXd1pnYAX2Oj62X9CaA9t7mcLCIgBRkEn5OwmjPPAq', 'ap819994@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676142, 1628134476, 1, 'Angelo Michael', 'Perez Pool ', NULL, NULL, '7351503', '', 3, '', 2),
(14, '127.0.0.1', 'mon-belen', '$2y$10$80ltEsx4ns0nfK8/iBdfXO4CAcUoxxsIFqF0OhNIW/BMobpcQWypm', 'anabelengl24@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676205, NULL, 1, 'Ana Belen', 'Gutierrez Lopez', NULL, NULL, '9779920', '', 2, '', 7),
(15, '127.0.0.1', 'mon-bernardo', '$2y$10$qe8865xObWmbnq1q8EB0O.uQGSEUXZyljFd0EVhKIyCWGmfHO/zJ6', 'enzobernardogallo@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676259, NULL, 1, 'Bernardo', 'Gallo', NULL, NULL, '12578751', '', 1, '', 4),
(16, '127.0.0.1', 'mon-cecilia', '$2y$10$x8xji0mC62TwN5AZJ6tcg.BCWWtD480jC09r72tTX1IVy8gf28M/2', 'ceciliajustiniano306@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676367, 1628135027, 1, 'Cecilia', 'Justiniano Escalante', NULL, NULL, '12475248', '', 2, '', 7),
(17, '127.0.0.1', 'mon-cristian', '$2y$10$ZkPhZsLt7V2NjJFZTD7mqelkwVk0b1Xpcgcj.vv9NHeOBkIez.qNO', 'cmisericordia123@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676428, 1627922111, 1, 'Cristian Alberto', 'Misericordia Morales', NULL, NULL, '7390130', '', 3, '', 2),
(18, '127.0.0.1', 'mon-daniela', '$2y$10$55nP4beMdkX4xAfTC0vfnulkG6R9HDikFAaK7rnO6aPqdKGE8012y', '202004866@ est.edu.bo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676684, 1628043141, 1, 'Daniela Rosario', 'Hualuque Rodríguez', NULL, NULL, '0', '', 4, '', 1),
(19, '127.0.0.1', 'mon-diego', '$2y$10$1JlsIQbtpDEEwDANz5nTouWlDO/k8sxq9/CV2MTHCsSr8PiL7NHqe', 'ayo2019@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676805, 1628178406, 1, 'Diego', 'Ayoroa', NULL, NULL, '6964639', '', 1, '', 4),
(20, '127.0.0.1', 'mon-elsifania', '$2y$10$d.GWZs3Yw/SXQLyP7AJavOMSnS.XdVUzhyKvtVvbp/CQZgY6.TSgi', 'fannyolarterojas@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676855, 1627959495, 1, 'Elsifania', 'Olarte Rojas', NULL, NULL, '1766568', '', 8, '', 6),
(21, '127.0.0.1', 'mon-erick', '$2y$10$LfEdf4MpfrTxm9tByOqW/uQyJ1mb01DlEETHy1uqAYQxon6VQeASO', 'tapiaerik1500@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676925, 1628170370, 1, 'Erik Roger ', 'Calizaya Tapia ', NULL, NULL, '10393487', '', 5, 'Ostria Reyes #236', 5),
(22, '127.0.0.1', 'mon-ericka', '$2y$10$6xava60aeGfmf0s29weyseDY4nkQmZByMN5R0TILcKIXhe.3M6J0i', 'mniko4218@ gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625676994, 1627742622, 1, 'Erick', 'Alvarado Beltrán ', NULL, NULL, '12681679', '', 4, '', 1),
(23, '127.0.0.1', 'mon-evelin', '$2y$10$SE7MMZ7n3md5e6tHdLl5Vu7BEX4XEi/iohn68.u331sFUuwKOmzCe', 'evelinmachaca123@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677141, 1628033920, 1, 'Evelin E.', 'Machaca Flores ', NULL, NULL, '7353738', '', 3, '', 2),
(24, '127.0.0.1', 'mon-fabiola', '$2y$10$QSCc3/taQIYIYOqUeB2VNuPtP.wxgHRE6NjwW4IFW49gVkVHrRpBi', 'fabi-justiniano-@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677382, 1627598579, 1, 'Fabiola', 'Justiniano', NULL, NULL, '570431', '', 8, '', 6),
(25, '127.0.0.1', 'mon-gabriel', '$2y$10$U6SqPiI2dfSohR/iAUKWW.czeDRJZ/HyRECsHAL6SSl5nJSAl0JFK', 'garandiabarrios@gmail.com ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677434, NULL, 1, 'Gabriel ', 'Arandia ', NULL, NULL, '7519015', '', 1, '', 4),
(26, '127.0.0.1', 'mon-genesis', '$2y$10$jWe6K9Qq155/xDpnPEqVrO0ei0l.Q5JpiZx/pbGO9mYP9r3l.5tL2', 'mier.genesis@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677623, 1625680035, 1, 'Génesis ', 'S/A', NULL, NULL, '5645025', '', 1, '', 4),
(27, '127.0.0.1', 'mon-gustavo', '$2y$10$tpe.nGYN5IuvCygYIUtFtucPBcIJdV5QY9mCmOqptvO0U8GFfC9Rq', 'mamaniquispegustavo2006@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677685, 1627864433, 1, 'Gustavo', 'Mamani Quispe ', NULL, NULL, '7288481', '', 3, '', 2),
(28, '127.0.0.1', 'mon-idar', '$2y$10$XnaHNH4n7jw3ygaRi3ebg.2Tg5X2O9R7zVSpukLdRmM2lcPNl7rD.', 'chubyjuu18hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677745, 1628202553, 1, 'Idar Josue ', 'Villca Villanueva', NULL, NULL, '7889449', '', 8, '', 6),
(29, '127.0.0.1', 'mon-jodie', '$2y$10$gYUBwSF7tm6hHRshPTVTMOCN6NXUWbo7bBzgo8JSHvrfTp7V3DKvS', 'michellevillarroeljb@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677848, 1628176030, 1, 'Jodie Michelle ', 'Bautista Villarroel', NULL, NULL, '8302800', '', 1, '', 8),
(30, '127.0.0.1', 'mon-julia', '$2y$10$GD0VAoOh082/6rQ3OVv8ze2qmpYl2bTrxDxqytlDUuvppTIljjkX2', 'mise.juli.1991@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677922, 1627830457, 1, 'Julia Carmen', 'Julia Carmen', NULL, NULL, '7298782', '', 3, '', 2),
(31, '127.0.0.1', 'mon-keylin', '$2y$10$kX1JLROYSjg3/1Y459BogegWEUGKwBFmsnTHZz/5MaG7U2mQUR3MG', 'kelynsuarez@ gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625677986, 1628132172, 1, 'Keylin', 'Suárez Rojas', NULL, NULL, '9433132', '', 4, '', 1),
(32, '127.0.0.1', 'mon-kiebel', '$2y$10$i23IBg8Ca8aBjI0iQScuMO1zfL6NK0.OLAbZ55YEyqtd4NiSz7zLa', 'kiebel6garcia6rocabado6@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678075, 1627967526, 1, 'Kiebel', 'Garcia Rocabado', NULL, NULL, '8043490', '', 4, '', 3),
(33, '127.0.0.1', 'mon-leidy', '$2y$10$YP94xAOZw.3oyHdCXMgwcej04ZbdByCbsQL9KBwzcfX2kLlQ24KM6', 'sincorreo@correo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678176, NULL, 1, 'Leidy Estefania ', 'Cordero Mamani', NULL, NULL, '5701704', '', 8, '', 1),
(34, '127.0.0.1', 'mon-leonela', '$2y$10$AHRxM3lTzX6vCviO4JmVaOZZ6kiIjgS0jjMhLHT6m4tC8tVvUTwwO', 'ullcafernandezleonela@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678254, 1628127571, 1, 'Leonela', 'Sullca Fernandez ', NULL, NULL, '9122028', '', 1, '', 8),
(35, '127.0.0.1', 'mon-luis', '$2y$10$bGIsAr6x6Vc6gk7kWPKdOeuhWuOi0/YpHnRrzAL9EPLSVoSXnE4OS', 'luis@dominio.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678599, 1628028708, 1, 'Luis David ', 'Santos Suárez', NULL, NULL, '4209452', '', 8, '', 6),
(36, '127.0.0.1', 'mon-luisb', '$2y$10$4w9gVeRYO2P82rKW6.G8E.WpFfJGBTURgHjDGp2Qd.qoRHQTSb9jO', 'luissdanielabc@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678683, 1627963373, 1, 'Luis Daniel', 'Salamanca Barral ', NULL, NULL, '8621075', '', 5, '', 5),
(37, '127.0.0.1', 'mon-luz', '$2y$10$ET3v1Y3jEmRq8lZ2HxFPFOhqbIQam/FHJvinjrAr4tXrjMet9rjKG', 'bordaortusteluzmilena@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678837, NULL, 1, 'Luz Milena', 'Borda Ortuste ', NULL, NULL, '10384512', '', 5, '', 1),
(38, '127.0.0.1', 'mon-maria', '$2y$10$9fbJUMRXHmfkr8JzuU.wqe.7a9F7mPtMlEvA85tRvXu1tzwK9245W', 'delcielogalindo@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678903, NULL, 1, 'María del Cielo ', 'Galindo', NULL, NULL, '8808885', '', 1, '', 4),
(39, '127.0.0.1', 'mon-mariac', '$2y$10$TvTELC9mcL5NRlG3Dp1uR.m.xwcXFaYS4dALCz5D12mw4QO19P39e', '202001453@ est.umss.edu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625678999, 1628051231, 1, 'Ma. Celeste', 'Condorhuayra Araoz', NULL, NULL, '14071014', '', 4, '', 1),
(40, '127.0.0.1', 'mon-mariao', '$2y$10$TgVZu4Af9tJstRWrowoIK.0Ek.2/KDBnkkT/Kh/qRYQXanCsBW7Em', 'vikyosorio123@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679075, 1628043429, 1, 'María Victoria ', 'Osorio', NULL, NULL, '7208546', '', 1, '', 4),
(41, '127.0.0.1', 'mon-marioly', '$2y$10$S9EgXybZP/7JepUxA9cqaOAThrpPfZj1RXRdlcJhw05ngIFt9FzXG', 'mariolicruz98@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679162, 1626991330, 1, 'Marioly', 'Cruz Heredia', NULL, NULL, '9619837', '', 2, '', 7),
(42, '127.0.0.1', 'mon-mayel', '$2y$10$gjaF9xP2bPEkr.21WXqnWuqCray604Gt/n6Bm5kQePS8Y6.wv0JpG', 'ligiaherbascabrera@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679244, 1628142218, 1, 'Mavel Ligia ', 'Herbas Cabrera ', NULL, NULL, '975576', '', 4, '', 3),
(43, '127.0.0.1', 'mon-mihaela', '$2y$10$QK72MT1oZ86xuRSPYxDi2.nc4lafQWkkgzIEfX.MA2KZth1gq4cbK', 'mivigafeQQ@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679307, 1628133168, 1, 'Mihaela Victoria ', 'Gareca Fernandez', NULL, NULL, '4074239', '', 4, '', 3),
(44, '127.0.0.1', 'mon-paula', '$2y$10$3sd0GsvARcjpor1bevHaXuAcXGP3gYbSmLwLiXjjs5LWZ1SiM4d5O', 'paulafariast28@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679373, 1628121137, 1, 'Paula Thais ', 'Farías Teran', NULL, NULL, '5597049', '', 4, '', 3),
(45, '127.0.0.1', 'mon-ralhs', '$2y$10$YIrMU3oHyw/1/ViYavsYReRoOgHfoPjOVdZC/ssds7fnNO0h/YzQO', 'gonsalesporumaemer@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679440, 1628131516, 1, 'Ralhs W', 'Gonzáles Parumo', NULL, NULL, '4211751', '', 8, '', 6),
(46, '127.0.0.1', 'mon-ronald', '$2y$10$fBjuFnHXpcT3glOCyF/Fge4zyz8OtRA/wlQuFvkWEaK.GCeHA1HY.', 'ronaldalexiscondori@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679510, 1628140421, 1, 'Ronald Alexis', 'Condori Fernandez', NULL, NULL, '10653943', '', 2, '', 7),
(47, '127.0.0.1', 'mon-rosana', '$2y$10$GSJs5F7pt7D7ohryQvnhpem8a63RKrYBd.IcX5bLxvmQsYQ/NDA9a', 'rosivas17@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679577, 1628136176, 1, 'Rosana Agar', 'Vásquez Pimentel ', NULL, NULL, '6591343', '', 5, '', 5),
(48, '127.0.0.1', 'mon-sholay', '$2y$10$WXJ8amnAWLdp1sScT69T8uQDL/tYDO0rO6mnlI0mGcHll6EBh7tmG', 'sholaymisericordiamolina@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679666, 1628140226, 1, 'Sholay Gabriela', 'Misericordia Molina ', NULL, NULL, '7359512', '', 3, '', 2),
(49, '127.0.0.1', 'mon-taliana', '$2y$10$.pkDJOCdsIZWVRTCc3VWPekFvK85EtGlJp5Lf8Sfjrq9dfHW.1wMO', 'talianamedina1999@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679726, 1627793361, 1, 'Taliana', 'Quiroga Medina', NULL, NULL, '14656162', '', 2, '', 7),
(50, '127.0.0.1', 'mon-tania', '$2y$10$Ci5Nqgut1Iv7Lh0CKGsZ2ev/fwU00g4lPIJtIkjJdAUrrFLHiEe.G', 'thewantedtanita@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625679786, NULL, 1, 'Tania Adriana ', 'Oros Ortiz', NULL, NULL, '7879403', '', 4, '', 3),
(51, '127.0.0.1', 'mon-alejandroc', '$2y$10$lubj9zh1AGUxdmXkV40W1.sZBHox5qoLE5NvE.KY2c8hrP4U9NprS', 'alecar@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1625688141, 1628036502, 1, 'Alejandro', 'Carvajal', NULL, NULL, '0000', '', 1, '', 4),
(52, '200.105.212.232', 'adm-alejandro', '$2y$12$OPArNBZJXAo.9dAfKgONIu5fUZ9KoS92JZ1sdP1rrV7WmlVbCPyHe', 'alecar1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1626813394, 1628089211, 1, 'Alejandro', 'Carvajal', NULL, NULL, '4845151', 'ssaas', 1, 'ss', 1),
(53, '177.222.113.11', 'mon-paohu', '$2y$10$qGt25cGC4iGNq190f60q7.EzQWOeQcNPwSxJYmi9mJ4gOmOwbHAHW', 'paola.hb.1997.17@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1626823428, 1627701176, 1, 'Paola ', 'Hurtado Borobobo', NULL, NULL, '4212295', '', 8, '', 1),
(54, '181.115.160.189', 'mon-marisol', '$2y$10$Vhud6bHQekvouLk6Du05CORUC8nQ6jwah5VpY9r.C1nbUNac.mMsO', 'marisol.mzfl@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1626913208, 1628126757, 1, 'Marisol', 'Muñoz', NULL, NULL, '7567747', '', 5, '', 1),
(55, '177.222.113.11', 'mon-selky', '$2y$10$mNazTtweCTd622XwqV1Zt.XI44u2GlFkc2uTs4EGlWX90Wmn.jZsW', 'SelkymolinaVaca@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1627049788, 1628087769, 1, 'Selky ', 'Molina Vaca', NULL, NULL, '5600866', '', 8, '', 1),
(56, '177.222.113.11', 'adm-sverd', '$2y$10$D9SJ4Oz57MpGdbqzIqMgYeo9jM.SCS8S/nGUMjgMwXRzrEOCPkt3u', 'observacionciudadana0@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1627077743, NULL, 1, 'Sandra', 'Verduguez', NULL, NULL, '3124967', '', 1, '', 1),
(57, '177.222.113.11', 'mon-jennifer', '$2y$10$RUhcPXZ56B0JejI.JmT/euDWq4dKZ7Gl7D0Q2evL.c1UeP3Z5yn7O', 'arredondovillagomez10@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1627566874, 1628132224, 1, 'Jennifer ', 'Arreondo Villagomez', NULL, NULL, '11304518', '', 2, '', 1),
(58, '200.105.212.122', 'mon-pando', '$2y$10$V9cQD75V8lHnnBSuedUw9eN67IGi0nP5ArpRNleXkpzYuC95clAWq', 'pando@pando.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1627593507, 1627602566, 1, 'Monitor', 'Pando', NULL, NULL, '486512152', '', 8, '', 1),
(59, '200.105.212.122', 'mon-sucre', '$2y$10$VmPKi4IxtzjVKNLGpu/CG.A29X0wFGWFFqYLy41USMmCpGpVxROJS', 'monsucre@sucre', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1627593926, 1627593943, 1, 'Monitor', 'Sucre', NULL, NULL, '48542122', '', 5, '', 1),
(60, '127.0.0.1', 'mon-monitor', '$2y$10$ggRupywlI.A9EHdmVKAyTeYYJ//dyybRuvAcKeqCmqOdrcCNDCjhW', 'monitor@prueba.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1628614200, NULL, 1, 'Monitor', 'Prueba', NULL, NULL, '4865464', '1564654165,165465456', 1, 'Calle Pando #432', 4),
(61, '127.0.0.1', 'mon-monitor1', '$2y$10$CX93Q2RCaQ.x7IvblHG3z.0pUlZ8JAjZNq.wuxUlJ/K7/iwt0.TO.', 'monitor@prueba2.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1628614624, 1628614641, 1, 'Monitor', 'Prueba2', NULL, NULL, '57896541', '1564654165,165465456', 6, 'Calle Pando #432', 4),
(62, '127.0.0.1', 'mon-monitor2', '$2y$10$2lShzTL/.6voqgyVOupmTeMWp7fF.RuLrEGcJt/a0xDcg21xMwCzC', 'monitor@prueba3.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1628614878, NULL, 1, 'Monitor', 'Prueba3', NULL, NULL, '85465421', '4542123, 4564654', 9, 'Av. circunvalacion', 4);

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
(71, 5, 4),
(8, 6, 3),
(9, 7, 3),
(10, 8, 3),
(62, 8, 4),
(11, 9, 3),
(12, 10, 3),
(63, 10, 4),
(13, 11, 3),
(14, 12, 3),
(15, 13, 3),
(16, 14, 3),
(17, 15, 3),
(64, 15, 4),
(18, 16, 3),
(19, 17, 3),
(20, 18, 3),
(21, 19, 3),
(65, 19, 4),
(22, 20, 3),
(23, 21, 3),
(24, 22, 3),
(25, 23, 3),
(26, 24, 3),
(27, 25, 3),
(66, 25, 4),
(28, 26, 3),
(67, 26, 4),
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
(68, 38, 4),
(41, 39, 3),
(42, 40, 3),
(69, 40, 4),
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
(53, 51, 3),
(70, 51, 4),
(54, 52, 1),
(55, 53, 3),
(56, 54, 3),
(57, 55, 3),
(58, 56, 1),
(59, 57, 3),
(60, 58, 3),
(61, 59, 3),
(72, 60, 3),
(74, 61, 3),
(75, 61, 4),
(76, 62, 3),
(77, 62, 4);

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
-- Indices de la tabla `codigoley`
--
ALTER TABLE `codigoley`
  ADD PRIMARY KEY (`idcodigoley`),
  ADD KEY `fk_codigo_a_estadoley` (`rel_idestadoley`),
  ADD KEY `fk_codigo_a_ley` (`rel_idley`);

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
-- Indices de la tabla `estadoley`
--
ALTER TABLE `estadoley`
  ADD PRIMARY KEY (`idestadoley`);

--
-- Indices de la tabla `fuente`
--
ALTER TABLE `fuente`
  ADD PRIMARY KEY (`idfuente`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `leyes`
--
ALTER TABLE `leyes`
  ADD PRIMARY KEY (`idleyes`);

--
-- Indices de la tabla `leyes_estadoley`
--
ALTER TABLE `leyes_estadoley`
  ADD PRIMARY KEY (`idleyesestado`),
  ADD KEY `fk_a_estadoley` (`rel_idestadoley`),
  ADD KEY `fk_a_leyes` (`rel_idleyes`);

--
-- Indices de la tabla `leyes_fuente`
--
ALTER TABLE `leyes_fuente`
  ADD PRIMARY KEY (`idleyesfuente`);

--
-- Indices de la tabla `ley_otrosubtema`
--
ALTER TABLE `ley_otrosubtema`
  ADD PRIMARY KEY (`idleyotrosubtema`),
  ADD KEY `fk_rel_leyes` (`rel_idleyes`),
  ADD KEY `fk_otrosubtema_rel` (`rel_idotrosubtema`);

--
-- Indices de la tabla `ley_otrotema`
--
ALTER TABLE `ley_otrotema`
  ADD PRIMARY KEY (`idleyotrotema`),
  ADD KEY `fk_rel_ley` (`rel_idleyes`),
  ADD KEY `fk_rel_ot` (`rel_idotrotema`);

--
-- Indices de la tabla `ley_subtema`
--
ALTER TABLE `ley_subtema`
  ADD PRIMARY KEY (`idleysubtema`),
  ADD KEY `fk_leyes` (`rel_idleyes`),
  ADD KEY `fk_subtema` (`rel_idsubtema`);

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
-- Indices de la tabla `nombreley`
--
ALTER TABLE `nombreley`
  ADD PRIMARY KEY (`idnombreley`),
  ADD KEY `fk_nombreley_a_estadoley` (`rel_idestadoley`),
  ADD KEY `fk_nombreley_a_leyes` (`rel_idley`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`idnoticia`),
  ADD KEY `fk_medio` (`rel_idmedio`),
  ADD KEY `fk_usuario` (`rel_idusuario`),
  ADD KEY `fk_cuestionario` (`rel_idcuestionario`);

--
-- Indices de la tabla `noticia_actor`
--
ALTER TABLE `noticia_actor`
  ADD PRIMARY KEY (`idnotactor`),
  ADD KEY `fk_actor` (`rel_idactor`),
  ADD KEY `fk_noticia` (`rel_idnoticia`);

--
-- Indices de la tabla `noticia_otrosubtema`
--
ALTER TABLE `noticia_otrosubtema`
  ADD PRIMARY KEY (`idnototrosubtema`),
  ADD KEY `fk_otrosubtema` (`rel_idotrosubtema`),
  ADD KEY `fk_rel_noticia` (`rel_idnoticia`);

--
-- Indices de la tabla `noticia_otrotema`
--
ALTER TABLE `noticia_otrotema`
  ADD PRIMARY KEY (`idnototrotema`),
  ADD KEY `fk_rel_otro_tema` (`rel_idotrotema`),
  ADD KEY `fk_rel_noticia_otr` (`rel_idnoticia`);

--
-- Indices de la tabla `noticia_subtema`
--
ALTER TABLE `noticia_subtema`
  ADD PRIMARY KEY (`idnotsubtema`),
  ADD KEY `fk_noticia_subtema` (`rel_idnoticia`),
  ADD KEY `fk_not_subtema` (`rel_idsubtema`);

--
-- Indices de la tabla `otrosubtema`
--
ALTER TABLE `otrosubtema`
  ADD PRIMARY KEY (`idotrosubtema`),
  ADD KEY `fk_tema_otrosubtema` (`rel_idtema`);

--
-- Indices de la tabla `otrotema`
--
ALTER TABLE `otrotema`
  ADD PRIMARY KEY (`idotrotema`);

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
  ADD KEY `fk_cuestionariotema` (`rel_idcuestionario`);

--
-- Indices de la tabla `tipo_medio`
--
ALTER TABLE `tipo_medio`
  ADD PRIMARY KEY (`idtipomedio`);

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
  ADD PRIMARY KEY (`iduniversidad`);

--
-- Indices de la tabla `universidad_departamento`
--
ALTER TABLE `universidad_departamento`
  ADD KEY `fk_rel_depa` (`rel_iddepartamento`),
  ADD KEY `fk_rel_universidad` (`rel_iduniversidad`);

--
-- Indices de la tabla `urlley`
--
ALTER TABLE `urlley`
  ADD PRIMARY KEY (`idurlley`),
  ADD KEY `fk_urlley_a_estadoley` (`rel_idestadoley`),
  ADD KEY `fk_urlley_a_leyes` (`rel_idley`);

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
  MODIFY `idactor` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `codigoley`
--
ALTER TABLE `codigoley`
  MODIFY `idcodigoley` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  MODIFY `idcuestionario` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `iddepartamento` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `estadoley`
--
ALTER TABLE `estadoley`
  MODIFY `idestadoley` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `fuente`
--
ALTER TABLE `fuente`
  MODIFY `idfuente` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `leyes`
--
ALTER TABLE `leyes`
  MODIFY `idleyes` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `leyes_estadoley`
--
ALTER TABLE `leyes_estadoley`
  MODIFY `idleyesestado` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `leyes_fuente`
--
ALTER TABLE `leyes_fuente`
  MODIFY `idleyesfuente` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ley_otrosubtema`
--
ALTER TABLE `ley_otrosubtema`
  MODIFY `idleyotrosubtema` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ley_otrotema`
--
ALTER TABLE `ley_otrotema`
  MODIFY `idleyotrotema` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ley_subtema`
--
ALTER TABLE `ley_subtema`
  MODIFY `idleysubtema` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `medio_comunicacion`
--
ALTER TABLE `medio_comunicacion`
  MODIFY `idmedio` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `medio_departamento`
--
ALTER TABLE `medio_departamento`
  MODIFY `idmediodepartamento` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `nombreley`
--
ALTER TABLE `nombreley`
  MODIFY `idnombreley` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `idnoticia` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=789;

--
-- AUTO_INCREMENT de la tabla `noticia_actor`
--
ALTER TABLE `noticia_actor`
  MODIFY `idnotactor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1045;

--
-- AUTO_INCREMENT de la tabla `noticia_otrosubtema`
--
ALTER TABLE `noticia_otrosubtema`
  MODIFY `idnototrosubtema` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `noticia_otrotema`
--
ALTER TABLE `noticia_otrotema`
  MODIFY `idnototrotema` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT de la tabla `noticia_subtema`
--
ALTER TABLE `noticia_subtema`
  MODIFY `idnotsubtema` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=999;

--
-- AUTO_INCREMENT de la tabla `otrosubtema`
--
ALTER TABLE `otrosubtema`
  MODIFY `idotrosubtema` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `otrotema`
--
ALTER TABLE `otrotema`
  MODIFY `idotrotema` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT de la tabla `subtema`
--
ALTER TABLE `subtema`
  MODIFY `idsubtema` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `idtema` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tipo_medio`
--
ALTER TABLE `tipo_medio`
  MODIFY `idtipomedio` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `universidad`
--
ALTER TABLE `universidad`
  MODIFY `iduniversidad` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `urlley`
--
ALTER TABLE `urlley`
  MODIFY `idurlley` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `codigoley`
--
ALTER TABLE `codigoley`
  ADD CONSTRAINT `fk_codigo_a_estadoley` FOREIGN KEY (`rel_idestadoley`) REFERENCES `estadoley` (`idestadoley`),
  ADD CONSTRAINT `fk_codigo_a_ley` FOREIGN KEY (`rel_idley`) REFERENCES `leyes` (`idleyes`);

--
-- Filtros para la tabla `leyes_estadoley`
--
ALTER TABLE `leyes_estadoley`
  ADD CONSTRAINT `fk_a_estadoley` FOREIGN KEY (`rel_idestadoley`) REFERENCES `estadoley` (`idestadoley`),
  ADD CONSTRAINT `fk_a_leyes` FOREIGN KEY (`rel_idleyes`) REFERENCES `leyes` (`idleyes`);

--
-- Filtros para la tabla `ley_otrosubtema`
--
ALTER TABLE `ley_otrosubtema`
  ADD CONSTRAINT `fk_otrosubtema_rel` FOREIGN KEY (`rel_idotrosubtema`) REFERENCES `otrosubtema` (`idotrosubtema`),
  ADD CONSTRAINT `fk_rel_leyes` FOREIGN KEY (`rel_idleyes`) REFERENCES `leyes` (`idleyes`);

--
-- Filtros para la tabla `ley_otrotema`
--
ALTER TABLE `ley_otrotema`
  ADD CONSTRAINT `fk_rel_ley` FOREIGN KEY (`rel_idleyes`) REFERENCES `leyes` (`idleyes`),
  ADD CONSTRAINT `fk_rel_ot` FOREIGN KEY (`rel_idotrotema`) REFERENCES `otrotema` (`idotrotema`);

--
-- Filtros para la tabla `ley_subtema`
--
ALTER TABLE `ley_subtema`
  ADD CONSTRAINT `fk_leyes` FOREIGN KEY (`rel_idleyes`) REFERENCES `leyes` (`idleyes`),
  ADD CONSTRAINT `fk_subtema` FOREIGN KEY (`rel_idsubtema`) REFERENCES `subtema` (`idsubtema`);

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
-- Filtros para la tabla `nombreley`
--
ALTER TABLE `nombreley`
  ADD CONSTRAINT `fk_nombreley_a_estadoley` FOREIGN KEY (`rel_idestadoley`) REFERENCES `estadoley` (`idestadoley`),
  ADD CONSTRAINT `fk_nombreley_a_leyes` FOREIGN KEY (`rel_idley`) REFERENCES `leyes` (`idleyes`);

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `fk_noticiacuestionario` FOREIGN KEY (`rel_idcuestionario`) REFERENCES `cuestionario` (`idcuestionario`),
  ADD CONSTRAINT `fk_noticiamedio` FOREIGN KEY (`rel_idmedio`) REFERENCES `medio_comunicacion` (`idmedio`),
  ADD CONSTRAINT `fk_noticiausuario` FOREIGN KEY (`rel_idusuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `noticia_actor`
--
ALTER TABLE `noticia_actor`
  ADD CONSTRAINT `fk_actor` FOREIGN KEY (`rel_idactor`) REFERENCES `actor` (`idactor`),
  ADD CONSTRAINT `fk_noticia` FOREIGN KEY (`rel_idnoticia`) REFERENCES `noticia` (`idnoticia`);

--
-- Filtros para la tabla `noticia_otrosubtema`
--
ALTER TABLE `noticia_otrosubtema`
  ADD CONSTRAINT `fk_otrosubtema` FOREIGN KEY (`rel_idotrosubtema`) REFERENCES `otrosubtema` (`idotrosubtema`),
  ADD CONSTRAINT `fk_rel_noticia` FOREIGN KEY (`rel_idnoticia`) REFERENCES `noticia` (`idnoticia`);

--
-- Filtros para la tabla `noticia_otrotema`
--
ALTER TABLE `noticia_otrotema`
  ADD CONSTRAINT `fk_rel_noticia_otr` FOREIGN KEY (`rel_idnoticia`) REFERENCES `noticia` (`idnoticia`),
  ADD CONSTRAINT `fk_rel_otro_tema` FOREIGN KEY (`rel_idotrotema`) REFERENCES `otrotema` (`idotrotema`);

--
-- Filtros para la tabla `noticia_subtema`
--
ALTER TABLE `noticia_subtema`
  ADD CONSTRAINT `fk_not_subtema` FOREIGN KEY (`rel_idsubtema`) REFERENCES `subtema` (`idsubtema`),
  ADD CONSTRAINT `fk_noticia_subtema` FOREIGN KEY (`rel_idnoticia`) REFERENCES `noticia` (`idnoticia`);

--
-- Filtros para la tabla `otrosubtema`
--
ALTER TABLE `otrosubtema`
  ADD CONSTRAINT `fk_tema_otrosubtema` FOREIGN KEY (`rel_idtema`) REFERENCES `tema` (`idtema`);

--
-- Filtros para la tabla `subtema`
--
ALTER TABLE `subtema`
  ADD CONSTRAINT `subtema_ibfk_1` FOREIGN KEY (`rel_idtema`) REFERENCES `tema` (`idtema`);

--
-- Filtros para la tabla `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `fk_cuestionariotema` FOREIGN KEY (`rel_idcuestionario`) REFERENCES `cuestionario` (`idcuestionario`);

--
-- Filtros para la tabla `universidad_departamento`
--
ALTER TABLE `universidad_departamento`
  ADD CONSTRAINT `fk_rel_depa` FOREIGN KEY (`rel_iddepartamento`) REFERENCES `departamento` (`iddepartamento`),
  ADD CONSTRAINT `fk_rel_universidad` FOREIGN KEY (`rel_iduniversidad`) REFERENCES `universidad` (`iduniversidad`);

--
-- Filtros para la tabla `urlley`
--
ALTER TABLE `urlley`
  ADD CONSTRAINT `fk_urlley_a_estadoley` FOREIGN KEY (`rel_idestadoley`) REFERENCES `estadoley` (`idestadoley`),
  ADD CONSTRAINT `fk_urlley_a_leyes` FOREIGN KEY (`rel_idley`) REFERENCES `leyes` (`idleyes`);

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
