-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2023 a las 13:13:13
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `urban_stategies`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalog_answers`
--

CREATE TABLE `catalog_answers` (
  `id` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `catalog_questions_id` int(11) DEFAULT NULL,
  `correct_answer` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catalog_answers`
--

INSERT INTO `catalog_answers` (`id`, `description`, `catalog_questions_id`, `correct_answer`) VALUES
(1, 'Muy probable', 5, 0),
(2, 'probable', 5, 0),
(3, 'Sin ninguna probabilidad', 5, 1),
(4, 'Facebook', 6, 0),
(8, 'LinkedIn', 6, 0),
(10, 'Youtube', 6, 1),
(11, 'DirecciÃ³n de correo electrÃ³nico', 7, 0),
(12, 'Estado civil', 7, 0),
(14, 'instagram', 6, 0),
(19, 'test25', 8, 0),
(20, 'no lo se', 9, 0),
(21, 'puede ser', 9, 1),
(23, 'test 1', 8, 0),
(24, 'test 2', 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalog_departamento`
--

CREATE TABLE `catalog_departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `catalog_departamento`
--

INSERT INTO `catalog_departamento` (`id`, `nombre`) VALUES
(1, 'AHUACHAPAN'),
(2, 'SANTA ANA'),
(3, 'SONSONATE'),
(4, 'CHALATENANGO'),
(5, 'LA LIBERTAD'),
(6, 'SAN SALVADOR'),
(7, 'CUSCATLAN'),
(8, 'LA PAZ'),
(9, 'CABAÃ‘AS'),
(10, 'SAN VICENTE'),
(11, 'USULUTAN'),
(12, 'SAN MIGUEL'),
(13, 'MORAZAN'),
(14, 'LA UNION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalog_member_status`
--

CREATE TABLE `catalog_member_status` (
  `id` int(11) NOT NULL,
  `description` varchar(85) DEFAULT NULL,
  `description_es` varchar(85) DEFAULT NULL,
  `adding_date` datetime DEFAULT current_timestamp(),
  `modifying_user` varchar(45) DEFAULT NULL,
  `modifying_date` datetime DEFAULT NULL,
  `status` varchar(3) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catalog_member_status`
--

INSERT INTO `catalog_member_status` (`id`, `description`, `description_es`, `adding_date`, `modifying_user`, `modifying_date`, `status`) VALUES
(1, 'Review Pending', 'RevisiÃ³n Pendiente', '2023-07-19 16:35:14', NULL, NULL, 'A'),
(2, 'Approved', 'Aceptado', '2023-07-19 16:35:14', NULL, NULL, 'A'),
(3, 'Rejected', 'Rechazado', '2023-07-19 16:35:14', NULL, NULL, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalog_municipio`
--

CREATE TABLE `catalog_municipio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `departamento_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `catalog_municipio`
--

INSERT INTO `catalog_municipio` (`id`, `nombre`, `departamento_id`) VALUES
(1, 'AHUACHAPAN', 1),
(2, 'APANECA', 1),
(3, 'ATIQUIZAYA', 1),
(4, 'CONCEPCION DE ATACO', 1),
(5, 'EL REFUGIO', 1),
(6, 'GUAYMANGO', 1),
(7, 'JUJUTLA', 1),
(8, 'SAN FRANCISCO MENENDEZ', 1),
(9, 'SAN LORENZO', 1),
(10, 'SAN PEDRO PUXTLA', 1),
(11, 'TACUBA', 1),
(12, 'TURIN', 1),
(13, 'CANDELARIA DE LA FRONTERA', 2),
(14, 'COATEPEQUE', 2),
(15, 'CHALCHUAPA', 2),
(16, 'EL CONGO', 2),
(17, 'EL PORVENIR', 2),
(18, 'MASAHUAT', 2),
(19, 'METAPAN', 2),
(20, 'SAN ANTONIO PAJONAL', 2),
(21, 'SAN SEBASTIAN SALITRILLO', 2),
(22, 'SANTA ANA', 2),
(23, 'SANTA ROSA GUACHIPILIN', 2),
(24, 'SANTIAGO DE LA FRONTERA', 2),
(25, 'TEXISTEPEQUE', 2),
(26, 'ACAJUTLA', 3),
(27, 'ARMENIA', 3),
(28, 'CALUCO', 3),
(29, 'CUISNAHUAT', 3),
(30, 'SANTA ISABEL ISHUATAN', 3),
(31, 'IZALCO', 3),
(32, 'JUAYUA', 3),
(33, 'NAHUIZALCO', 3),
(34, 'NAHUILINGO', 3),
(35, 'SALCOATITAN', 3),
(36, 'SAN ANTONIO DEL MONTE', 3),
(37, 'SAN JULIAN', 3),
(38, 'SANTA CATARINA MASAHUAT', 3),
(39, 'SANTO DOMINGO DE GUZMAN', 3),
(40, 'SONSONATE', 3),
(41, 'SONZACATE', 3),
(42, 'AGUA CALIENTE', 4),
(43, 'ARCATAO', 4),
(44, 'AZACUALPA', 4),
(45, 'CITALA', 4),
(46, 'COMALAPA', 4),
(47, 'CONCEPCION QUEZALTEPEQUE', 4),
(48, 'CHALATENANGO', 4),
(49, 'DULCE NOMBRE DE MARIA', 4),
(50, 'EL CARRIZAL', 4),
(51, 'EL PARAISO', 4),
(52, 'LA LAGUNA', 4),
(53, 'LA PALMA', 4),
(54, 'LA REINA', 4),
(55, 'LAS VUELTAS', 4),
(56, 'NOMBRE DE JESUS', 4),
(57, 'NUEVA CONCEPCION', 4),
(58, 'NUEVA TRINIDAD', 4),
(59, 'OJO DE AGUA', 4),
(60, 'POTONICO', 4),
(61, 'SAN ANTONIO DE LA CRUZ', 4),
(62, 'SAN ANTONIO LOS RACHOS', 4),
(63, 'SAN FERNANDO', 4),
(64, 'SAN FRANCISCO LEMPA', 4),
(65, 'SAN FRANCISCO MORAZAN', 4),
(66, 'SAN IGNACIO', 4),
(67, 'SAN ISIDRO LABRADOR', 4),
(68, 'SAN JOSE CANCASQUE', 4),
(69, 'LAS FLORES', 4),
(70, 'SAN LUIS DEL CARMEN', 4),
(71, 'SAN MIGUEL DE MERCEDES', 4),
(72, 'SAN RAFAEL', 4),
(73, 'SANTA RITA', 4),
(74, 'TEJUTLA', 4),
(75, 'ANTIGUO CUSCATLAN', 5),
(76, 'CIUDAD ARCE', 5),
(77, 'COLON', 5),
(78, 'COMASAGUA', 5),
(79, 'CHILTIUPAN', 5),
(80, 'HUIZUCAR', 5),
(81, 'JAYAQUE', 5),
(82, 'JICALAPA', 5),
(83, 'LA LIBERTAD', 5),
(84, 'NUEVO CUSCATLAN', 5),
(85, 'NUEVA SAN SALVADOR', 5),
(86, 'QUEZALTEPEQUE', 5),
(87, 'SACACOYO', 5),
(88, 'SAN JOSE VILLANUEVA', 5),
(89, 'SAN JUAN OPICO', 5),
(90, 'SAN MATIAS', 5),
(91, 'SAN PABLO TACACHICO', 5),
(92, 'TAMANIQUE', 5),
(93, 'TALNIQUE', 5),
(94, 'TEOTEPEQUE', 5),
(95, 'TEPECOYO', 5),
(96, 'ZARAGOZA', 5),
(97, 'SANTA TECLA', 5),
(98, 'AGUILARES', 6),
(99, 'APOPA', 6),
(100, 'AYUTUXTEPEQUE', 6),
(101, 'CUSCATANCINGO', 6),
(102, 'EL PAISNAL', 6),
(103, 'GUAZAPA', 6),
(104, 'ILOPANGO', 6),
(105, 'MEJICANOS', 6),
(106, 'NEJAPA', 6),
(107, 'PANCHIMALCO', 6),
(108, 'ROSARIO DE MORA', 6),
(109, 'SAN MARCOS', 6),
(110, 'SAN MARTIN', 6),
(111, 'SAN SALVADOR', 6),
(112, 'SANTIAGO TEXACUANGOS', 6),
(113, 'SANTO TOMAS', 6),
(114, 'SOYAPANGO', 6),
(115, 'TONACATEPEQUE', 6),
(116, 'CIUDAD DELGADO', 6),
(118, 'CANDELARIA', 7),
(119, 'COJUTEPEQUE', 7),
(120, 'EL CARMEN', 7),
(121, 'EL ROSARIO', 7),
(122, 'MONTE SAN JUAN', 7),
(123, 'ORATORIO DE CONCEPCION', 7),
(124, 'SAN BARTOLOME PERULAPIA', 7),
(125, 'SAN CRISTOBAL', 7),
(126, 'SAN JOSE GUAYABAL', 7),
(127, 'SAN PEDRO PERULAPAN', 7),
(128, 'SAN RAFAEL CEDROS', 7),
(129, 'SAN RAMON', 7),
(130, 'SANTA CRUZ ANALQUITO', 7),
(131, 'SANTA CRUZ MICHAPA', 7),
(132, 'SUCHITOTO', 7),
(133, 'TENANCINGO', 7),
(134, 'CUYULTITAN', 8),
(135, 'EL ROSARIO', 8),
(136, 'JERUSALEN', 8),
(137, 'MERCEDES LA CEIBA', 8),
(138, 'OLOCUILTA', 8),
(139, 'PARAISO DE OSORIO', 8),
(140, 'SAN ANTONIO MASAHUAT', 8),
(141, 'SAN EMIGDIO', 8),
(142, 'SAN FRANCISCO CHINAMECA', 8),
(143, 'SAN JUAN NONUALCO', 8),
(144, 'SAN JUAN TALPA', 8),
(145, 'SAN JUAN TEPESONTE', 8),
(146, 'SAN LUIS TALPA', 8),
(147, 'SAN MIGUEL TEPEZONTES', 8),
(148, 'SAN PEDRO MASAHUAT', 8),
(149, 'SAN PEDRO NONUALCO', 8),
(150, 'SAN RAFAEL OBRAJUELO', 8),
(151, 'SANTA MARIA OSTUMA', 8),
(152, 'SANTIAGO NONUALCO', 8),
(153, 'TAPALHUACA', 8),
(154, 'ZACATECOLUCA', 8),
(155, 'SAN LUIS LA HERRADURA', 8),
(156, 'CINQUERA', 9),
(157, 'GUACOTECTI', 9),
(158, 'ILOBASCO', 9),
(159, 'JUTIAPA', 9),
(160, 'SAN ISIDRO', 9),
(161, 'SENSUNTEPEQUE', 9),
(162, 'TEJUTEPEQUE', 9),
(163, 'VICTORIA', 9),
(164, 'DOLORES', 9),
(165, 'APASTEPEQUE', 10),
(166, 'GUADALUPE', 10),
(167, 'SAN CAYETANO ISTEPEQUE', 10),
(168, 'SANTA CLARA', 10),
(169, 'SANTO DOMINGO', 10),
(170, 'SAN ESTEBAN CATARINA', 10),
(171, 'SAN ILDEFONSO', 10),
(172, 'SAN LORENZO', 10),
(173, 'SAN SEBASTIAN', 10),
(174, 'SAN VICENTE', 10),
(175, 'TECOLUCA', 10),
(176, 'TEPETITAN', 10),
(177, 'VERAPAZ', 10),
(178, 'ALEGRIA', 11),
(179, 'BERLIN', 11),
(180, 'CALIFORNIA', 11),
(181, 'CONCEPCION BATRES', 11),
(182, 'EL TRIUNFO', 11),
(183, 'EREGUAYQUIN', 11),
(184, 'ESTANZUELAS', 11),
(185, 'JIQUILISCO', 11),
(186, 'JUCUAPA', 11),
(187, 'JUCUARAN', 11),
(188, 'MERCEDES UMAÃ‘A', 11),
(189, 'NUEVA GRANADA', 11),
(190, 'OZATLAN', 11),
(191, 'PUERTO EL TRIUNFO', 11),
(192, 'SAN AGUSTIN', 11),
(193, 'SAN BUENAVENTURA', 11),
(194, 'SAN DIONISIO', 11),
(195, 'SANTA ELENA', 11),
(196, 'SAN FRANCISCO JAVIER', 11),
(197, 'SANTA MARIA', 11),
(198, 'SANTIAGO DE MARIA', 11),
(199, 'TECAPAN', 11),
(200, 'USULUTAN', 11),
(201, 'CAROLINA', 12),
(202, 'CIUDAD BARRIOS', 12),
(203, 'COMACARAN', 12),
(204, 'CHAPELTIQUE', 12),
(205, 'CHINAMECA', 12),
(206, 'CHIRILAGUA', 12),
(207, 'EL TRANSITO', 12),
(208, 'LOLOTIQUE', 12),
(209, 'MONCAGUA', 12),
(210, 'NUEVA GUADALUPE', 12),
(211, 'NUEVO EDEN DE SAN JUAN', 12),
(212, 'QUELEPA', 12),
(213, 'SAN ANTONIO DEL MOSCO', 12),
(214, 'SAN GERARDO', 12),
(215, 'SAN JORGE', 12),
(216, 'SAN LUIS LA REINA', 12),
(217, 'SAN MIGUEL', 12),
(218, 'SAN RAFAEL ORIENTE', 12),
(219, 'SESORI', 12),
(220, 'ULUAZAPA', 12),
(221, 'ARAMBALA', 13),
(222, 'CACAOPERA', 13),
(223, 'CORINTO', 13),
(224, 'CHILANGA', 13),
(225, 'DELICIAS DE CONCEPCION', 13),
(226, 'EL DIVISADERO', 13),
(227, 'EL ROSARIO', 13),
(228, 'GUALOCOCTI', 13),
(229, 'GUATAJIAGUA', 13),
(230, 'JOATECA', 13),
(231, 'JOCOAITIQUE', 13),
(232, 'JOCORO', 13),
(233, 'LOLOTIQUILLO', 13),
(234, 'MEANGUERA', 13),
(235, 'OSICALA', 13),
(236, 'PERQUIN', 13),
(237, 'SAN CARLOS', 13),
(238, 'SAN FERNANDO', 13),
(239, 'SAN FRANCISCO GOTERA', 13),
(240, 'SAN ISIDRO', 13),
(241, 'SAN SIMON', 13),
(242, 'SEMSEMBRA', 13),
(243, 'SOCIEDAD', 13),
(244, 'TOROLA', 13),
(245, 'YAMABAL', 13),
(246, 'YOLOAIQUIN', 13),
(247, 'ANAMOROS', 14),
(248, 'BOLIVAR', 14),
(249, 'CONCEPCION ORIENTE', 14),
(250, 'CONCHAGUA', 14),
(251, 'EL CARMEN', 14),
(252, 'EL SAUCE', 14),
(253, 'INTIPUCA', 14),
(254, 'LA UNION', 14),
(255, 'LISLIQUE', 14),
(256, 'MEANGUERA DEL GOLFO', 14),
(257, 'NUEVA ESPARTA', 14),
(258, 'PASAQUINA', 14),
(259, 'POLOROS', 14),
(260, 'SAN ALEJO', 14),
(261, 'SAN JOSE', 14),
(262, 'SANTA ROSA DE LIMA', 14),
(263, 'YAYANTIQUE', 14),
(264, 'YUCUAIQUIN', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalog_organization_status`
--

CREATE TABLE `catalog_organization_status` (
  `id` int(11) NOT NULL,
  `description` varchar(85) DEFAULT NULL,
  `description_es` varchar(85) DEFAULT NULL,
  `adding_date` datetime DEFAULT current_timestamp(),
  `modifying_user` varchar(45) DEFAULT NULL,
  `modifying_date` datetime DEFAULT NULL,
  `status` varchar(3) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catalog_organization_status`
--

INSERT INTO `catalog_organization_status` (`id`, `description`, `description_es`, `adding_date`, `modifying_user`, `modifying_date`, `status`) VALUES
(1, 'Review Pending', 'RevisiÃ³n Pendiente', '2023-07-19 16:35:46', NULL, NULL, 'A'),
(2, 'Approved', 'Aceptado', '2023-07-19 16:35:46', NULL, NULL, 'A'),
(3, 'Rejected', 'Rechazado', '2023-07-19 16:35:46', NULL, NULL, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalog_questions`
--

CREATE TABLE `catalog_questions` (
  `id` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catalog_questions`
--

INSERT INTO `catalog_questions` (`id`, `description`) VALUES
(5, 'Teniendo en cuenta su experiencia completa con los sitios de redes sociales, Â¿QuÃ© tan probable es que recomiende a su amigo o colega que se una a ellos?'),
(6, 'Â¿QuÃ© sitios de redes sociales utiliza mÃ¡s?'),
(7, 'Seleccione quÃ© informaciÃ³n comparte en los sitios de redes sociales'),
(8, 'test'),
(9, 'pregunta 22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) DEFAULT NULL,
  `description` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `country`
--

INSERT INTO `country` (`id`, `iso`, `description`) VALUES
(1, 'AF', 'Afganistán'),
(2, 'AX', 'Islas Gland'),
(3, 'AL', 'Albania'),
(4, 'DE', 'Alemania'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antártida'),
(9, 'AG', 'Antigua y Barbuda'),
(10, 'AN', 'Antillas Holandesas'),
(11, 'SA', 'Arabia Saudí'),
(12, 'DZ', 'Argelia'),
(13, 'AR', 'Argentina'),
(14, 'AM', 'Armenia'),
(15, 'AW', 'Aruba'),
(16, 'AU', 'Australia'),
(17, 'AT', 'Austria'),
(18, 'AZ', 'Azerbaiyán'),
(19, 'BS', 'Bahamas'),
(20, 'BH', 'Bahréin'),
(21, 'BD', 'Bangladesh'),
(22, 'BB', 'Barbados'),
(23, 'BY', 'Bielorrusia'),
(24, 'BE', 'Bélgica'),
(25, 'BZ', 'Belice'),
(26, 'BJ', 'Benin'),
(27, 'BM', 'Bermudas'),
(28, 'BT', 'Bhután'),
(29, 'BO', 'Bolivia'),
(30, 'BA', 'Bosnia y Herzegovina'),
(31, 'BW', 'Botsuana'),
(32, 'BV', 'Isla Bouvet'),
(33, 'BR', 'Brasil'),
(34, 'BN', 'Brunéi'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'CV', 'Cabo Verde'),
(39, 'KY', 'Islas Caimán'),
(40, 'KH', 'Camboya'),
(41, 'CM', 'Camerún'),
(42, 'CA', 'Canadá'),
(43, 'CF', 'República Centroafricana'),
(44, 'TD', 'Chad'),
(45, 'CZ', 'República Checa'),
(46, 'CL', 'Chile'),
(47, 'CN', 'China'),
(48, 'CY', 'Chipre'),
(49, 'CX', 'Isla de Navidad'),
(50, 'VA', 'Ciudad del Vaticano'),
(51, 'CC', 'Islas Cocos'),
(52, 'CO', 'Colombia'),
(53, 'KM', 'Comoras'),
(54, 'CD', 'República Democrática del Congo'),
(55, 'CG', 'Congo'),
(56, 'CK', 'Islas Cook'),
(57, 'KP', 'Corea del Norte'),
(58, 'KR', 'Corea del Sur'),
(59, 'CI', 'Costa de Marfil'),
(60, 'CR', 'Costa Rica'),
(61, 'HR', 'Croacia'),
(62, 'CU', 'Cuba'),
(63, 'DK', 'Dinamarca'),
(64, 'DM', 'Dominica'),
(65, 'DO', 'República Dominicana'),
(66, 'EC', 'Ecuador'),
(67, 'EG', 'Egipto'),
(68, 'SV', 'El Salvador'),
(69, 'AE', 'Emiratos Árabes Unidos'),
(70, 'ER', 'Eritrea'),
(71, 'SK', 'Eslovaquia'),
(72, 'SI', 'Eslovenia'),
(73, 'ES', 'España'),
(74, 'UM', 'Islas ultramarinas de Estados Unidos'),
(75, 'US', 'Estados Unidos'),
(76, 'EE', 'Estonia'),
(77, 'ET', 'Etiopía'),
(78, 'FO', 'Islas Feroe'),
(79, 'PH', 'Filipinas'),
(80, 'FI', 'Finlandia'),
(81, 'FJ', 'Fiyi'),
(82, 'FR', 'Francia'),
(83, 'GA', 'Gabón'),
(84, 'GM', 'Gambia'),
(85, 'GE', 'Georgia'),
(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur'),
(87, 'GH', 'Ghana'),
(88, 'GI', 'Gibraltar'),
(89, 'GD', 'Granada'),
(90, 'GR', 'Grecia'),
(91, 'GL', 'Groenlandia'),
(92, 'GP', 'Guadalupe'),
(93, 'GU', 'Guam'),
(94, 'GT', 'Guatemala'),
(95, 'GF', 'Guayana Francesa'),
(96, 'GN', 'Guinea'),
(97, 'GQ', 'Guinea Ecuatorial'),
(98, 'GW', 'Guinea-Bissau'),
(99, 'GY', 'Guyana'),
(100, 'HT', 'Haití'),
(101, 'HM', 'Islas Heard y McDonald'),
(102, 'HN', 'Honduras'),
(103, 'HK', 'Hong Kong'),
(104, 'HU', 'Hungría'),
(105, 'IN', 'India'),
(106, 'ID', 'Indonesia'),
(107, 'IR', 'Irán'),
(108, 'IQ', 'Iraq'),
(109, 'IE', 'Irlanda'),
(110, 'IS', 'Islandia'),
(111, 'IL', 'Israel'),
(112, 'IT', 'Italia'),
(113, 'JM', 'Jamaica'),
(114, 'JP', 'Japón'),
(115, 'JO', 'Jordania'),
(116, 'KZ', 'Kazajstán'),
(117, 'KE', 'Kenia'),
(118, 'KG', 'Kirguistán'),
(119, 'KI', 'Kiribati'),
(120, 'KW', 'Kuwait'),
(121, 'LA', 'Laos'),
(122, 'LS', 'Lesotho'),
(123, 'LV', 'Letonia'),
(124, 'LB', 'Líbano'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libia'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lituania'),
(129, 'LU', 'Luxemburgo'),
(130, 'MO', 'Macao'),
(131, 'MK', 'ARY Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MY', 'Malasia'),
(134, 'MW', 'Malawi'),
(135, 'MV', 'Maldivas'),
(136, 'ML', 'Malí'),
(137, 'MT', 'Malta'),
(138, 'FK', 'Islas Malvinas'),
(139, 'MP', 'Islas Marianas del Norte'),
(140, 'MA', 'Marruecos'),
(141, 'MH', 'Islas Marshall'),
(142, 'MQ', 'Martinica'),
(143, 'MU', 'Mauricio'),
(144, 'MR', 'Mauritania'),
(145, 'YT', 'Mayotte'),
(146, 'MX', 'México'),
(147, 'FM', 'Micronesia'),
(148, 'MD', 'Moldavia'),
(149, 'MC', 'Mónaco'),
(150, 'MN', 'Mongolia'),
(151, 'MS', 'Montserrat'),
(152, 'MZ', 'Mozambique'),
(153, 'MM', 'Myanmar'),
(154, 'NA', 'Namibia'),
(155, 'NR', 'Nauru'),
(156, 'NP', 'Nepal'),
(157, 'NI', 'Nicaragua'),
(158, 'NE', 'Níger'),
(159, 'NG', 'Nigeria'),
(160, 'NU', 'Niue'),
(161, 'NF', 'Isla Norfolk'),
(162, 'NO', 'Noruega'),
(163, 'NC', 'Nueva Caledonia'),
(164, 'NZ', 'Nueva Zelanda'),
(165, 'OM', 'Omán'),
(166, 'NL', 'Países Bajos'),
(167, 'PK', 'Pakistán'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestina'),
(170, 'PA', 'Panamá'),
(171, 'PG', 'Papúa Nueva Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Perú'),
(174, 'PN', 'Islas Pitcairn'),
(175, 'PF', 'Polinesia Francesa'),
(176, 'PL', 'Polonia'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'GB', 'Reino Unido'),
(181, 'RE', 'Reunión'),
(182, 'RW', 'Ruanda'),
(183, 'RO', 'Rumania'),
(184, 'RU', 'Rusia'),
(185, 'EH', 'Sahara Occidental'),
(186, 'SB', 'Islas Salomón'),
(187, 'WS', 'Samoa'),
(188, 'AS', 'Samoa Americana'),
(189, 'KN', 'San Cristóbal y Nevis'),
(190, 'SM', 'San Marino'),
(191, 'PM', 'San Pedro y Miquelón'),
(192, 'VC', 'San Vicente y las Granadinas'),
(193, 'SH', 'Santa Helena'),
(194, 'LC', 'Santa Lucía'),
(195, 'ST', 'Santo Tomé y Príncipe'),
(196, 'SN', 'Senegal'),
(197, 'CS', 'Serbia y Montenegro'),
(198, 'SC', 'Seychelles'),
(199, 'SL', 'Sierra Leona'),
(200, 'SG', 'Singapur'),
(201, 'SY', 'Siria'),
(202, 'SO', 'Somalia'),
(203, 'LK', 'Sri Lanka'),
(204, 'SZ', 'Suazilandia'),
(205, 'ZA', 'Sudáfrica'),
(206, 'SD', 'Sudán'),
(207, 'SE', 'Suecia'),
(208, 'CH', 'Suiza'),
(209, 'SR', 'Surinam'),
(210, 'SJ', 'Svalbard y Jan Mayen'),
(211, 'TH', 'Tailandia'),
(212, 'TW', 'Taiwán'),
(213, 'TZ', 'Tanzania'),
(214, 'TJ', 'Tayikistán'),
(215, 'IO', 'Territorio Británico del Océano Índico'),
(216, 'TF', 'Territorios Australes Franceses'),
(217, 'TL', 'Timor Oriental'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad y Tobago'),
(222, 'TN', 'Túnez'),
(223, 'TC', 'Islas Turcas y Caicos'),
(224, 'TM', 'Turkmenistán'),
(225, 'TR', 'Turquía'),
(226, 'TV', 'Tuvalu'),
(227, 'UA', 'Ucrania'),
(228, 'UG', 'Uganda'),
(229, 'UY', 'Uruguay'),
(230, 'UZ', 'Uzbekistán'),
(231, 'VU', 'Vanuatu'),
(232, 'VE', 'Venezuela'),
(233, 'VN', 'Vietnam'),
(234, 'VG', 'Islas Vírgenes Británicas'),
(235, 'VI', 'Islas Vírgenes de los Estados Unidos'),
(236, 'WF', 'Wallis y Futuna'),
(237, 'YE', 'Yemen'),
(238, 'DJ', 'Yibuti'),
(239, 'ZM', 'Zambia'),
(240, 'ZW', 'Zimbabue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `name_es` varchar(150) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `description_es` varchar(500) DEFAULT NULL,
  `image` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `course`
--

INSERT INTO `course` (`id`, `name`, `name_es`, `description`, `description_es`, `image`) VALUES
(1, 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'img.jpg'),
(2, 'Asociaciones en la salud de adultos', 'Asociaciones en la salud de adultos', 'Este curso gratuito en lÃ­nea combina estrategias constructivas y capacidades de cuidado de ancianos para modernizar los servicios de la tercera edad.', 'Este curso gratuito en lÃ­nea combina estrategias constructivas y capacidades de cuidado de ancianos para modernizar los servicios de la tercera edad.', 'img2.jpg'),
(3, 'Convertirse en Oficial de InclusiÃ³n Social', 'Convertirse en Oficial de InclusiÃ³n Social', 'Ãšnete a la lucha por la igualdad y aprende a convertirte en oficial de inclusiÃ³n social en este curso gratuito de formaciÃ³n de DEI online.', 'Ãšnete a la lucha por la igualdad y aprende a convertirte en oficial de inclusiÃ³n social en este curso gratuito de formaciÃ³n de DEI online.', 'img3.jpg'),
(4, 'Una introducciÃ³n a los fundamentos del trabajo social', 'Una introducciÃ³n a los fundamentos del trabajo social', 'Un curso gratuito en lÃ­nea sobre las responsabilidades y deberes de ser un trabajador social basado en la reciente legislaciÃ³n del Reino Unido.', 'Un curso gratuito en lÃ­nea sobre las responsabilidades y deberes de ser un trabajador social basado en la reciente legislaciÃ³n del Reino Unido.', 'img4.jpg'),
(5, 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'img.jpg'),
(6, 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'img.jpg'),
(7, 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'img.jpg'),
(8, 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'img.jpg'),
(9, 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'img.jpg'),
(10, 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'img.jpg'),
(11, 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'img.jpg'),
(12, 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'img.jpg'),
(13, 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Equidad, diversidad e inclusiÃ³n (EDI) en la atenciÃ³n de adultos', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'Conozca cÃ³mo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atenciÃ³n de adultos en este curso online gratuito.', 'img.jpg'),
(14, 'Comprender el problema de la esclavitud moderna', 'Comprender el problema de la esclavitud moderna', 'La esclavitud sigue existiendo asÃ­ que aprende a identificar y ayudar a las vÃ­ctimas de la trata de personas en este curso gratuito en lÃ­nea.', 'La esclavitud sigue existiendo asÃ­ que aprende a identificar y ayudar a las vÃ­ctimas de la trata de personas en este curso gratuito en lÃ­nea.', '64b9a74de045baaa.jpg'),
(15, 'CÃ³mo realizar la investigaciÃ³n en la atenciÃ³n de adultos', 'CÃ³mo realizar la investigaciÃ³n en la atenciÃ³n de adultos', 'Aprenda a adaptar su metodologÃ­a de investigaciÃ³n para satisfacer las demandas de los entornos de cuidado de adultos en este curso gratuito en lÃ­nea.', 'Aprenda a adaptar su metodologÃ­a de investigaciÃ³n para satisfacer las demandas de los entornos de cuidado de adultos en este curso gratuito en lÃ­nea.', '64b9a796d4332bbb.jpg'),
(16, 'IntroducciÃ³n a la etnografÃ­a', 'IntroducciÃ³n a la etnografÃ­a', 'Este curso gratuito en lÃ­nea le enseÃ±a los elementos centrales de la etnografÃ­a como \"el otro\" y las metodologÃ­as de investigaciÃ³n.', 'Este curso gratuito en lÃ­nea le enseÃ±a los elementos centrales de la etnografÃ­a como \"el otro\" y las metodologÃ­as de investigaciÃ³n.', '64b9b27eb5e23etno.jpg'),
(17, 'Aldeas infantiles', 'Aldeas infantiles', 'formacion de niÃ±os que pertenecen a las aldeas', 'formacion de niÃ±os que pertenecen a las aldeas', '64b9bd5845330Call-center-pago.jpg'),
(18, 'Curso de test 1', 'Curso de test 1', 'prueba de curso', 'prueba de curso', '64da61d2e283fcasa-de-campo-inglesa.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`Id`, `Nombre`) VALUES
(1, 'AHUACHAPAN'),
(2, 'SANTA ANA'),
(3, 'SONSONATE'),
(4, 'CHALATENANGO'),
(5, 'LA LIBERTAD'),
(6, 'SAN SALVADOR'),
(7, 'CUSCATLAN'),
(8, 'LA PAZ'),
(9, 'CABAÃ‘AS'),
(10, 'SAN VICENTE'),
(11, 'USULUTAN'),
(12, 'SAN MIGUEL'),
(13, 'MORAZAN'),
(14, 'LA UNION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file_per_course`
--

CREATE TABLE `file_per_course` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `route` varchar(150) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `file_per_course`
--

INSERT INTO `file_per_course` (`id`, `course_id`, `route`, `name`, `created_at`, `section_id`) VALUES
(1, 1, '64be936e58d8aShawsNavidad2022medium.pdf', 'ShawsNavidad2022medium.pdf', '2023-07-24 08:51:57', 0),
(2, 1, '64be936e69b65e9763342-8a85-4346-b5c4-ce26e8d5044f.jpg', '8a85-4346-b5c4-ce26e8d5044f.jpg', '2023-07-24 08:51:57', 0),
(3, 1, '64be9a1908b55PES Module Proposal Detail V1.docx', 'Module Proposal Detail V1.docx', '2023-07-24 08:51:57', 0),
(4, 1, '64be9e9747cc9json.zip', 'json.zip', '2023-07-24 08:51:57', 0),
(5, 1, '64be9f04374cbLibro1.xlsx', 'Libro1.xlsx', '2023-07-24 08:51:57', 0),
(6, 1, '64be9fb9a4c37demo.pem', 'demo.pem', '2023-07-24 08:51:57', 0),
(7, 1, '64bea09e29537json.zip', 'json.zip', '2023-07-24 08:51:57', 0),
(8, 1, '64bea0a8104e6ShawsNavidad2022medium.pdf', 'ShawsNavidad2022medium.pdf', '2023-07-24 08:51:57', 0),
(9, 1, '64bea0c41102ee9763342-8a85-4346-b5c4-ce26e8d5044f.jpg', 'ce26e8d5044f.jpg', '2023-07-24 08:51:57', 0),
(10, 1, '64bea0c421468tablas isss.docx', 'tablas isss.docx', '2023-07-24 08:51:57', 0),
(11, 3, '64bea1ffa2561ASU GBV web app_spa.pdf', 'ASU GBV web app_spa.pdf', '2023-07-24 08:51:57', 0),
(12, 1, '64bea339d370bLibro1.xlsx', 'Libro1.xlsx', '2023-07-24 08:51:57', 0),
(13, 2, '64bea411e8ba4Flujos Urban - ESP.odg', 'Flujos Urban - ESP.odg', '2023-07-24 08:51:57', 0),
(14, 2, '64bea42818406DISTRITOS POR MUNICIPIO Y DPTO 150723.xlsx', 'DISTRITOS POR MUNICIPIO Y DPTO 150723.xlsx', '2023-07-24 08:51:57', 0),
(15, 2, '64bea42826e81farmacias.csv', 'farmacias.csv', '2023-07-24 08:51:57', 0),
(16, 2, '64bea42831be5employer_related_user.xlsx', 'employer_related_user.xlsx', '2023-07-24 08:51:57', 0),
(17, 2, '64beab8f54db3ShawsNavidad2022medium.pdf', 'ShawsNavidad2022medium.pdf', '2023-07-24 08:51:57', 0),
(18, 2, '64beab8f64bcbLibro1.xlsx', 'Libro1.xlsx', '2023-07-24 08:51:57', 0),
(19, 2, '64beac41b59f5Libro1.xlsx', 'Libro1.xlsx', '2023-07-24 08:52:17', 0),
(20, 3, '64c0013c68602Libro1.xlsx', 'Libro1.xlsx', '2023-07-25 09:07:08', 0),
(21, 3, '64c0013c8d1a5ShawsNavidad2022medium.pdf', 'ShawsNavidad2022medium.pdf', '2023-07-25 09:07:08', 0),
(22, 3, '64c0015881da7tablas isss.docx', 'tablas isss.docx', '2023-07-25 09:07:36', 0),
(23, 3, '64c0042ebd632tablas isss.docx', 'tablas isss.docx', '2023-07-25 09:19:42', 0),
(24, 3, '64c0042eed38bNormativa de Cumplimiento de los Documentos Tributarios ElectrÃ³nicos_VersiÃ³n 1.0_15022023-1.pdf', 'Normativa de Cumplimiento de los Documentos Tributarios ElectrÃ³nicos_VersiÃ³n 1.0_15022023-1.pdf', '2023-07-25 09:19:42', 0),
(25, 2, '64c050e9545a8amanecer - HD 1080p.mov', 'amanecer - HD 1080p.mov', '2023-07-25 14:47:05', 0),
(26, 2, '64c05368a7ef4lv_0_20230725064215.mp4', 'lv_0_20230725064215.mp4', '2023-07-25 14:57:44', 0),
(27, 2, '64c12e9999cfbcoop.pdf', 'coop.pdf', '2023-07-26 06:32:57', 0),
(28, 2, '64c133a45471dvideo1.mov', 'video1.mov', '2023-07-26 06:54:28', 0),
(29, 2, '64c133e585325amanecer - HD 1080p.mov', 'amanecer - HD 1080p.mov', '2023-07-26 06:55:33', 0),
(30, 1, '64da645daec6ecasa-de-campo-inglesa.png', 'casa-de-campo-inglesa.png', '2023-08-14 17:29:01', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name_member` varchar(75) DEFAULT NULL,
  `lastname_member` varchar(75) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `document_number_type` varchar(25) DEFAULT NULL,
  `document_type_id` int(11) DEFAULT NULL,
  `document_number` varchar(45) DEFAULT NULL,
  `catalog_gender_id` int(11) DEFAULT NULL,
  `about_me` varchar(2000) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `cell_phone_number` varchar(45) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `city_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `status` int(5) DEFAULT 1,
  `organization_id` int(11) DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `member`
--

INSERT INTO `member` (`id`, `name_member`, `lastname_member`, `birthdate`, `document_number_type`, `document_type_id`, `document_number`, `catalog_gender_id`, `about_me`, `email`, `cell_phone_number`, `country_id`, `state_id`, `city_id`, `address`, `date_created`, `status`, `organization_id`, `users_id`, `municipio_id`) VALUES
(6, 'Juan Perez', 'Cerros', '2001-01-01 00:00:00', NULL, NULL, '22222222-2', NULL, NULL, 'reynaldoceronsosa@gmail.com', '2222-2222', NULL, NULL, NULL, 'av test', '2023-07-20 16:58:03', 2, 11, 25, NULL),
(7, 'Margarita', 'Ordonez', '1991-12-04 00:00:00', NULL, NULL, '01245654-5', NULL, 'soy una persona', 'mar.escobar91@gmail.com', '7755-4484', NULL, NULL, NULL, 'Colinas del norte', '2023-08-14 17:57:11', 2, 11, 26, 211);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_14_155805_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 23),
(2, 'App\\Models\\User', 24),
(3, 'App\\Models\\User', 21),
(3, 'App\\Models\\User', 22),
(3, 'App\\Models\\User', 25),
(3, 'App\\Models\\User', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`Id`, `Nombre`, `Departamento`) VALUES
(1, 'AHUACHAPAN', 1),
(2, 'APANECA', 1),
(3, 'ATIQUIZAYA', 1),
(4, 'CONCEPCION DE ATACO', 1),
(5, 'EL REFUGIO', 1),
(6, 'GUAYMANGO', 1),
(7, 'JUJUTLA', 1),
(8, 'SAN FRANCISCO MENENDEZ', 1),
(9, 'SAN LORENZO', 1),
(10, 'SAN PEDRO PUXTLA', 1),
(11, 'TACUBA', 1),
(12, 'TURIN', 1),
(13, 'CANDELARIA DE LA FRONTERA', 2),
(14, 'COATEPEQUE', 2),
(15, 'CHALCHUAPA', 2),
(16, 'EL CONGO', 2),
(17, 'EL PORVENIR', 2),
(18, 'MASAHUAT', 2),
(19, 'METAPAN', 2),
(20, 'SAN ANTONIO PAJONAL', 2),
(21, 'SAN SEBASTIAN SALITRILLO', 2),
(22, 'SANTA ANA', 2),
(23, 'SANTA ROSA GUACHIPILIN', 2),
(24, 'SANTIAGO DE LA FRONTERA', 2),
(25, 'TEXISTEPEQUE', 2),
(26, 'ACAJUTLA', 3),
(27, 'ARMENIA', 3),
(28, 'CALUCO', 3),
(29, 'CUISNAHUAT', 3),
(30, 'SANTA ISABEL ISHUATAN', 3),
(31, 'IZALCO', 3),
(32, 'JUAYUA', 3),
(33, 'NAHUIZALCO', 3),
(34, 'NAHUILINGO', 3),
(35, 'SALCOATITAN', 3),
(36, 'SAN ANTONIO DEL MONTE', 3),
(37, 'SAN JULIAN', 3),
(38, 'SANTA CATARINA MASAHUAT', 3),
(39, 'SANTO DOMINGO DE GUZMAN', 3),
(40, 'SONSONATE', 3),
(41, 'SONZACATE', 3),
(42, 'AGUA CALIENTE', 4),
(43, 'ARCATAO', 4),
(44, 'AZACUALPA', 4),
(45, 'CITALA', 4),
(46, 'COMALAPA', 4),
(47, 'CONCEPCION QUEZALTEPEQUE', 4),
(48, 'CHALATENANGO', 4),
(49, 'DULCE NOMBRE DE MARIA', 4),
(50, 'EL CARRIZAL', 4),
(51, 'EL PARAISO', 4),
(52, 'LA LAGUNA', 4),
(53, 'LA PALMA', 4),
(54, 'LA REINA', 4),
(55, 'LAS VUELTAS', 4),
(56, 'NOMBRE DE JESUS', 4),
(57, 'NUEVA CONCEPCION', 4),
(58, 'NUEVA TRINIDAD', 4),
(59, 'OJO DE AGUA', 4),
(60, 'POTONICO', 4),
(61, 'SAN ANTONIO DE LA CRUZ', 4),
(62, 'SAN ANTONIO LOS RACHOS', 4),
(63, 'SAN FERNANDO', 4),
(64, 'SAN FRANCISCO LEMPA', 4),
(65, 'SAN FRANCISCO MORAZAN', 4),
(66, 'SAN IGNACIO', 4),
(67, 'SAN ISIDRO LABRADOR', 4),
(68, 'SAN JOSE CANCASQUE', 4),
(69, 'LAS FLORES', 4),
(70, 'SAN LUIS DEL CARMEN', 4),
(71, 'SAN MIGUEL DE MERCEDES', 4),
(72, 'SAN RAFAEL', 4),
(73, 'SANTA RITA', 4),
(74, 'TEJUTLA', 4),
(75, 'ANTIGUO CUSCATLAN', 5),
(76, 'CIUDAD ARCE', 5),
(77, 'COLON', 5),
(78, 'COMASAGUA', 5),
(79, 'CHILTIUPAN', 5),
(80, 'HUIZUCAR', 5),
(81, 'JAYAQUE', 5),
(82, 'JICALAPA', 5),
(83, 'LA LIBERTAD', 5),
(84, 'NUEVO CUSCATLAN', 5),
(85, 'NUEVA SAN SALVADOR', 5),
(86, 'QUEZALTEPEQUE', 5),
(87, 'SACACOYO', 5),
(88, 'SAN JOSE VILLANUEVA', 5),
(89, 'SAN JUAN OPICO', 5),
(90, 'SAN MATIAS', 5),
(91, 'SAN PABLO TACACHICO', 5),
(92, 'TAMANIQUE', 5),
(93, 'TALNIQUE', 5),
(94, 'TEOTEPEQUE', 5),
(95, 'TEPECOYO', 5),
(96, 'ZARAGOZA', 5),
(97, 'SANTA TECLA', 5),
(98, 'AGUILARES', 6),
(99, 'APOPA', 6),
(100, 'AYUTUXTEPEQUE', 6),
(101, 'CUSCATANCINGO', 6),
(102, 'EL PAISNAL', 6),
(103, 'GUAZAPA', 6),
(104, 'ILOPANGO', 6),
(105, 'MEJICANOS', 6),
(106, 'NEJAPA', 6),
(107, 'PANCHIMALCO', 6),
(108, 'ROSARIO DE MORA', 6),
(109, 'SAN MARCOS', 6),
(110, 'SAN MARTIN', 6),
(111, 'SAN SALVADOR', 6),
(112, 'SANTIAGO TEXACUANGOS', 6),
(113, 'SANTO TOMAS', 6),
(114, 'SOYAPANGO', 6),
(115, 'TONACATEPEQUE', 6),
(116, 'CIUDAD DELGADO', 6),
(118, 'CANDELARIA', 7),
(119, 'COJUTEPEQUE', 7),
(120, 'EL CARMEN', 7),
(121, 'EL ROSARIO', 7),
(122, 'MONTE SAN JUAN', 7),
(123, 'ORATORIO DE CONCEPCION', 7),
(124, 'SAN BARTOLOME PERULAPIA', 7),
(125, 'SAN CRISTOBAL', 7),
(126, 'SAN JOSE GUAYABAL', 7),
(127, 'SAN PEDRO PERULAPAN', 7),
(128, 'SAN RAFAEL CEDROS', 7),
(129, 'SAN RAMON', 7),
(130, 'SANTA CRUZ ANALQUITO', 7),
(131, 'SANTA CRUZ MICHAPA', 7),
(132, 'SUCHITOTO', 7),
(133, 'TENANCINGO', 7),
(134, 'CUYULTITAN', 8),
(135, 'EL ROSARIO', 8),
(136, 'JERUSALEN', 8),
(137, 'MERCEDES LA CEIBA', 8),
(138, 'OLOCUILTA', 8),
(139, 'PARAISO DE OSORIO', 8),
(140, 'SAN ANTONIO MASAHUAT', 8),
(141, 'SAN EMIGDIO', 8),
(142, 'SAN FRANCISCO CHINAMECA', 8),
(143, 'SAN JUAN NONUALCO', 8),
(144, 'SAN JUAN TALPA', 8),
(145, 'SAN JUAN TEPESONTE', 8),
(146, 'SAN LUIS TALPA', 8),
(147, 'SAN MIGUEL TEPEZONTES', 8),
(148, 'SAN PEDRO MASAHUAT', 8),
(149, 'SAN PEDRO NONUALCO', 8),
(150, 'SAN RAFAEL OBRAJUELO', 8),
(151, 'SANTA MARIA OSTUMA', 8),
(152, 'SANTIAGO NONUALCO', 8),
(153, 'TAPALHUACA', 8),
(154, 'ZACATECOLUCA', 8),
(155, 'SAN LUIS LA HERRADURA', 8),
(156, 'CINQUERA', 9),
(157, 'GUACOTECTI', 9),
(158, 'ILOBASCO', 9),
(159, 'JUTIAPA', 9),
(160, 'SAN ISIDRO', 9),
(161, 'SENSUNTEPEQUE', 9),
(162, 'TEJUTEPEQUE', 9),
(163, 'VICTORIA', 9),
(164, 'DOLORES', 9),
(165, 'APASTEPEQUE', 10),
(166, 'GUADALUPE', 10),
(167, 'SAN CAYETANO ISTEPEQUE', 10),
(168, 'SANTA CLARA', 10),
(169, 'SANTO DOMINGO', 10),
(170, 'SAN ESTEBAN CATARINA', 10),
(171, 'SAN ILDEFONSO', 10),
(172, 'SAN LORENZO', 10),
(173, 'SAN SEBASTIAN', 10),
(174, 'SAN VICENTE', 10),
(175, 'TECOLUCA', 10),
(176, 'TEPETITAN', 10),
(177, 'VERAPAZ', 10),
(178, 'ALEGRIA', 11),
(179, 'BERLIN', 11),
(180, 'CALIFORNIA', 11),
(181, 'CONCEPCION BATRES', 11),
(182, 'EL TRIUNFO', 11),
(183, 'EREGUAYQUIN', 11),
(184, 'ESTANZUELAS', 11),
(185, 'JIQUILISCO', 11),
(186, 'JUCUAPA', 11),
(187, 'JUCUARAN', 11),
(188, 'MERCEDES UMAÃ‘A', 11),
(189, 'NUEVA GRANADA', 11),
(190, 'OZATLAN', 11),
(191, 'PUERTO EL TRIUNFO', 11),
(192, 'SAN AGUSTIN', 11),
(193, 'SAN BUENAVENTURA', 11),
(194, 'SAN DIONISIO', 11),
(195, 'SANTA ELENA', 11),
(196, 'SAN FRANCISCO JAVIER', 11),
(197, 'SANTA MARIA', 11),
(198, 'SANTIAGO DE MARIA', 11),
(199, 'TECAPAN', 11),
(200, 'USULUTAN', 11),
(201, 'CAROLINA', 12),
(202, 'CIUDAD BARRIOS', 12),
(203, 'COMACARAN', 12),
(204, 'CHAPELTIQUE', 12),
(205, 'CHINAMECA', 12),
(206, 'CHIRILAGUA', 12),
(207, 'EL TRANSITO', 12),
(208, 'LOLOTIQUE', 12),
(209, 'MONCAGUA', 12),
(210, 'NUEVA GUADALUPE', 12),
(211, 'NUEVO EDEN DE SAN JUAN', 12),
(212, 'QUELEPA', 12),
(213, 'SAN ANTONIO DEL MOSCO', 12),
(214, 'SAN GERARDO', 12),
(215, 'SAN JORGE', 12),
(216, 'SAN LUIS LA REINA', 12),
(217, 'SAN MIGUEL', 12),
(218, 'SAN RAFAEL ORIENTE', 12),
(219, 'SESORI', 12),
(220, 'ULUAZAPA', 12),
(221, 'ARAMBALA', 13),
(222, 'CACAOPERA', 13),
(223, 'CORINTO', 13),
(224, 'CHILANGA', 13),
(225, 'DELICIAS DE CONCEPCION', 13),
(226, 'EL DIVISADERO', 13),
(227, 'EL ROSARIO', 13),
(228, 'GUALOCOCTI', 13),
(229, 'GUATAJIAGUA', 13),
(230, 'JOATECA', 13),
(231, 'JOCOAITIQUE', 13),
(232, 'JOCORO', 13),
(233, 'LOLOTIQUILLO', 13),
(234, 'MEANGUERA', 13),
(235, 'OSICALA', 13),
(236, 'PERQUIN', 13),
(237, 'SAN CARLOS', 13),
(238, 'SAN FERNANDO', 13),
(239, 'SAN FRANCISCO GOTERA', 13),
(240, 'SAN ISIDRO', 13),
(241, 'SAN SIMON', 13),
(242, 'SEMSEMBRA', 13),
(243, 'SOCIEDAD', 13),
(244, 'TOROLA', 13),
(245, 'YAMABAL', 13),
(246, 'YOLOAIQUIN', 13),
(247, 'ANAMOROS', 14),
(248, 'BOLIVAR', 14),
(249, 'CONCEPCION ORIENTE', 14),
(250, 'CONCHAGUA', 14),
(251, 'EL CARMEN', 14),
(252, 'EL SAUCE', 14),
(253, 'INTIPUCA', 14),
(254, 'LA UNION', 14),
(255, 'LISLIQUE', 14),
(256, 'MEANGUERA DEL GOLFO', 14),
(257, 'NUEVA ESPARTA', 14),
(258, 'PASAQUINA', 14),
(259, 'POLOROS', 14),
(260, 'SAN ALEJO', 14),
(261, 'SAN JOSE', 14),
(262, 'SANTA ROSA DE LIMA', 14),
(263, 'YAYANTIQUE', 14),
(264, 'YUCUAIQUIN', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `content_title` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `status` varchar(5) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_sent` datetime DEFAULT NULL,
  `status` varchar(5) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletter_member_list`
--

CREATE TABLE `newsletter_member_list` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `lastname` varchar(120) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `city_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `contact_name` varchar(250) DEFAULT NULL,
  `contact_job_title` varchar(120) DEFAULT NULL,
  `contact_phone_number` varchar(45) DEFAULT NULL,
  `contact_phone_number_2` varchar(45) DEFAULT NULL,
  `secondary_contact_name` varchar(250) DEFAULT NULL,
  `secondary_contact_job_title` varchar(120) DEFAULT NULL,
  `secondary_contact_phone_number` varchar(45) DEFAULT NULL,
  `secondary_contact_phone_number_2` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `organization`
--

INSERT INTO `organization` (`id`, `name`, `address`, `country_id`, `state_id`, `city_id`, `phone_number`, `notes`, `contact_name`, `contact_job_title`, `contact_phone_number`, `contact_phone_number_2`, `secondary_contact_name`, `secondary_contact_job_title`, `secondary_contact_phone_number`, `secondary_contact_phone_number_2`, `status`) VALUES
(11, 'iglesia Luz del Mundo', '29 av sur', NULL, NULL, NULL, '2222-2222', NULL, 'pastor Juan Perez', 'Pastor', '2222-2222', '2222-2222', NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create roles', 'web', '2023-07-14 18:40:04', '2023-07-14 18:40:04'),
(2, 'read roles', 'web', '2023-07-14 18:40:04', '2023-07-14 18:40:04'),
(3, 'edit roles', 'web', '2023-07-14 18:40:04', '2023-07-14 18:40:04'),
(4, 'delete roles', 'web', '2023-07-14 18:40:04', '2023-07-14 18:40:04'),
(5, 'create users', 'web', '2023-07-14 18:40:04', '2023-07-14 18:40:04'),
(6, 'read users', 'web', '2023-07-14 18:40:04', '2023-07-14 18:40:04'),
(7, 'edit users', 'web', '2023-07-14 18:40:04', '2023-07-14 18:40:04'),
(8, 'delete users', 'web', '2023-07-14 18:40:04', '2023-07-14 18:40:04'),
(9, 'create permissions', 'web', '2023-07-14 18:40:04', '2023-07-14 18:40:04'),
(10, 'read permissions', 'web', '2023-07-14 18:40:04', '2023-07-14 18:40:04'),
(11, 'edit permissions', 'web', '2023-07-14 18:40:04', '2023-07-14 18:40:04'),
(12, 'delete permissions', 'web', '2023-07-14 18:40:04', '2023-07-14 18:40:04'),
(13, 'approve organization', 'web', '2023-07-20 06:22:47', '2023-07-20 06:22:47'),
(14, 'create course', 'web', '2023-07-20 14:35:58', '2023-07-20 14:35:58'),
(15, 'edit course', 'web', '2023-07-20 14:37:46', '2023-07-20 14:37:46'),
(16, 'read course', 'web', '2023-07-20 14:38:34', '2023-07-20 14:38:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions_per_quiz`
--

CREATE TABLE `questions_per_quiz` (
  `id` int(11) NOT NULL,
  `catalog_questions_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `questions_per_quiz`
--

INSERT INTO `questions_per_quiz` (`id`, `catalog_questions_id`, `quiz_id`, `date_added`) VALUES
(1, 5, 1, '2023-07-25 12:30:54'),
(2, 6, 1, '2023-07-25 12:32:43'),
(3, 7, 1, '2023-07-25 12:32:50'),
(4, 8, 1, '2023-07-25 12:37:15'),
(5, 9, 4, '2023-08-14 17:27:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `name_es` varchar(180) DEFAULT NULL,
  `name_en` varchar(180) DEFAULT NULL,
  `status` varchar(5) DEFAULT 'A',
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `quiz`
--

INSERT INTO `quiz` (`id`, `name_es`, `name_en`, `status`, `date_created`, `course_id`) VALUES
(1, 'Examen de prueba..', 'Examen de prueba..', 'A', '2023-07-25 11:23:14', 3),
(2, 'Test 2', 'Test 2', 'A', '2023-07-25 13:41:03', 4),
(3, 'test 3', 'test 3', 'A', '2023-07-25 13:44:05', 4),
(4, 'Examen 1', 'Examen 1', 'A', '2023-08-14 17:20:31', 18),
(5, 'Examen 2', 'Examen 2', 'A', '2023-08-14 20:44:34', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'web', '2023-07-14 18:40:04', '2023-07-14 18:40:04'),
(2, 'facilitator', 'web', '2023-07-19 14:37:14', '2023-07-19 14:37:14'),
(3, 'member', 'web', '2023-07-20 07:39:29', '2023-07-20 07:39:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(16, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections_per_course`
--

CREATE TABLE `sections_per_course` (
  `id` int(11) NOT NULL,
  `tbd` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sections_per_course`
--

INSERT INTO `sections_per_course` (`id`, `tbd`, `description`, `course_id`) VALUES
(1, NULL, 'prueba 1', 18),
(2, NULL, 'prueba 2', 18),
(3, NULL, 'prueba 3', 18),
(4, NULL, 'prueba 4', 18),
(5, NULL, 'prueba 5', 18),
(6, NULL, 'prueba 6', 18),
(7, NULL, 'Section 0', 1),
(8, NULL, 'holii', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `study_plan`
--

CREATE TABLE `study_plan` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `description_es` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `date_admission` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `pin`, `created_at`, `updated_at`, `last_name`, `website`, `address`, `phone`, `fax`, `country_id`, `date_admission`, `status`) VALUES
(1, 'Administrador', 'admin@mail.com', NULL, '$2y$10$hk800y/5ljFzc3fji4D.iOmqhVU3yDmCTqOe5T7CISixTAoYA8scq', NULL, NULL, '2023-07-14 18:41:50', '2023-07-14 18:41:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(24, 'Reynaldo CerÃ³n Sosa', 'rceron@sertracen.com', NULL, '$2y$10$fqEczCczZlzR9guwd87QH.MbUV7lVyaH2op3KmoxEQpWml9OJ1ttS', NULL, NULL, '2023-07-20 14:53:54', '2023-07-20 15:33:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(25, 'Juan Perez Cerros', 'reynaldoceronsosa@gmail.com', NULL, '$2y$10$VY8zzWX/48ZcefnawYaAT.hPW73xV74RzdsMd54oUf2yZA48b1KpC', NULL, NULL, '2023-07-20 14:58:03', '2023-07-20 14:58:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(26, 'Margarita Ordonez', 'mar.escobar91@gmail.com', NULL, '$2y$10$IJ07eNwG2Grp9zgc8mYpE.PerDEzb3HIJ9WHg5zwSsHqmijJW/gKq', NULL, NULL, '2023-08-14 07:57:11', '2023-08-14 09:11:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_has_orgs`
--

CREATE TABLE `users_has_orgs` (
  `id` int(11) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `organization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users_has_orgs`
--

INSERT INTO `users_has_orgs` (`id`, `users_id`, `organization_id`) VALUES
(5, 24, 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalog_answers`
--
ALTER TABLE `catalog_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catalog_member_status`
--
ALTER TABLE `catalog_member_status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catalog_organization_status`
--
ALTER TABLE `catalog_organization_status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catalog_questions`
--
ALTER TABLE `catalog_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `file_per_course`
--
ALTER TABLE `file_per_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_files_course` (`course_id`);

--
-- Indices de la tabla `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `newsletter_member_list`
--
ALTER TABLE `newsletter_member_list`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `questions_per_quiz`
--
ALTER TABLE `questions_per_quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_question_quiz_idx` (`catalog_questions_id`),
  ADD KEY `fk_quiz_question_idx` (`quiz_id`);

--
-- Indices de la tabla `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_id_idx` (`course_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sections_per_course`
--
ALTER TABLE `sections_per_course`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `study_plan`
--
ALTER TABLE `study_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_has_orgs`
--
ALTER TABLE `users_has_orgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_org_users` (`users_id`),
  ADD KEY `fk_users_org` (`organization_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalog_answers`
--
ALTER TABLE `catalog_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `catalog_organization_status`
--
ALTER TABLE `catalog_organization_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `catalog_questions`
--
ALTER TABLE `catalog_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT de la tabla `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `file_per_course`
--
ALTER TABLE `file_per_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `questions_per_quiz`
--
ALTER TABLE `questions_per_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sections_per_course`
--
ALTER TABLE `sections_per_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `study_plan`
--
ALTER TABLE `study_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `users_has_orgs`
--
ALTER TABLE `users_has_orgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `file_per_course`
--
ALTER TABLE `file_per_course`
  ADD CONSTRAINT `fk_files_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `questions_per_quiz`
--
ALTER TABLE `questions_per_quiz`
  ADD CONSTRAINT `fk_question_quiz` FOREIGN KEY (`catalog_questions_id`) REFERENCES `catalog_questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_quiz_question` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users_has_orgs`
--
ALTER TABLE `users_has_orgs`
  ADD CONSTRAINT `fk_org_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_users_org` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
