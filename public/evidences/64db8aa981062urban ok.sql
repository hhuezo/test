-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.27-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema urban_stategies
--

CREATE DATABASE IF NOT EXISTS urban_stategies;
USE urban_stategies;

--
-- Definition of table `catalog_answers`
--

DROP TABLE IF EXISTS `catalog_answers`;
CREATE TABLE `catalog_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) DEFAULT NULL,
  `catalog_questions_id` int(11) DEFAULT NULL,
  `correct_answer` int(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catalog_answers`
--

/*!40000 ALTER TABLE `catalog_answers` DISABLE KEYS */;
INSERT INTO `catalog_answers` (`id`,`description`,`catalog_questions_id`,`correct_answer`) VALUES 
 (1,'Muy probable',5,0),
 (2,'probable',5,0),
 (3,'Sin ninguna probabilidad',5,1),
 (4,'Facebook',6,0),
 (8,'LinkedIn',6,0),
 (10,'Youtube',6,1),
 (11,'Dirección de correo electrónico',7,0),
 (12,'Estado civil',7,0),
 (14,'instagram',6,0),
 (19,'test25',8,0);
/*!40000 ALTER TABLE `catalog_answers` ENABLE KEYS */;


--
-- Definition of table `catalog_departamento`
--

DROP TABLE IF EXISTS `catalog_departamento`;
CREATE TABLE `catalog_departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `catalog_departamento`
--

/*!40000 ALTER TABLE `catalog_departamento` DISABLE KEYS */;
INSERT INTO `catalog_departamento` (`id`,`nombre`) VALUES 
 (1,'AHUACHAPAN'),
 (2,'SANTA ANA'),
 (3,'SONSONATE'),
 (4,'CHALATENANGO'),
 (5,'LA LIBERTAD'),
 (6,'SAN SALVADOR'),
 (7,'CUSCATLAN'),
 (8,'LA PAZ'),
 (9,'CABAÑAS'),
 (10,'SAN VICENTE'),
 (11,'USULUTAN'),
 (12,'SAN MIGUEL'),
 (13,'MORAZAN'),
 (14,'LA UNION');
/*!40000 ALTER TABLE `catalog_departamento` ENABLE KEYS */;


--
-- Definition of table `catalog_member_status`
--

DROP TABLE IF EXISTS `catalog_member_status`;
CREATE TABLE `catalog_member_status` (
  `id` int(11) NOT NULL,
  `description` varchar(85) DEFAULT NULL,
  `description_es` varchar(85) DEFAULT NULL,
  `adding_date` datetime DEFAULT current_timestamp(),
  `modifying_user` varchar(45) DEFAULT NULL,
  `modifying_date` datetime DEFAULT NULL,
  `status` varchar(3) DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catalog_member_status`
--

/*!40000 ALTER TABLE `catalog_member_status` DISABLE KEYS */;
INSERT INTO `catalog_member_status` (`id`,`description`,`description_es`,`adding_date`,`modifying_user`,`modifying_date`,`status`) VALUES 
 (1,'Review Pending','Revisión Pendiente','2023-07-19 16:35:14',NULL,NULL,'A'),
 (2,'Approved','Aceptado','2023-07-19 16:35:14',NULL,NULL,'A'),
 (3,'Rejected','Rechazado','2023-07-19 16:35:14',NULL,NULL,'A');
/*!40000 ALTER TABLE `catalog_member_status` ENABLE KEYS */;


--
-- Definition of table `catalog_municipio`
--

DROP TABLE IF EXISTS `catalog_municipio`;
CREATE TABLE `catalog_municipio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `departamento_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `catalog_municipio`
--

/*!40000 ALTER TABLE `catalog_municipio` DISABLE KEYS */;
INSERT INTO `catalog_municipio` (`id`,`nombre`,`departamento_id`) VALUES 
 (1,'AHUACHAPAN',1),
 (2,'APANECA',1),
 (3,'ATIQUIZAYA',1),
 (4,'CONCEPCION DE ATACO',1),
 (5,'EL REFUGIO',1),
 (6,'GUAYMANGO',1),
 (7,'JUJUTLA',1),
 (8,'SAN FRANCISCO MENENDEZ',1),
 (9,'SAN LORENZO',1),
 (10,'SAN PEDRO PUXTLA',1),
 (11,'TACUBA',1),
 (12,'TURIN',1),
 (13,'CANDELARIA DE LA FRONTERA',2),
 (14,'COATEPEQUE',2),
 (15,'CHALCHUAPA',2),
 (16,'EL CONGO',2),
 (17,'EL PORVENIR',2),
 (18,'MASAHUAT',2),
 (19,'METAPAN',2),
 (20,'SAN ANTONIO PAJONAL',2),
 (21,'SAN SEBASTIAN SALITRILLO',2),
 (22,'SANTA ANA',2),
 (23,'SANTA ROSA GUACHIPILIN',2),
 (24,'SANTIAGO DE LA FRONTERA',2),
 (25,'TEXISTEPEQUE',2),
 (26,'ACAJUTLA',3),
 (27,'ARMENIA',3),
 (28,'CALUCO',3),
 (29,'CUISNAHUAT',3),
 (30,'SANTA ISABEL ISHUATAN',3),
 (31,'IZALCO',3),
 (32,'JUAYUA',3),
 (33,'NAHUIZALCO',3),
 (34,'NAHUILINGO',3),
 (35,'SALCOATITAN',3),
 (36,'SAN ANTONIO DEL MONTE',3),
 (37,'SAN JULIAN',3),
 (38,'SANTA CATARINA MASAHUAT',3),
 (39,'SANTO DOMINGO DE GUZMAN',3),
 (40,'SONSONATE',3),
 (41,'SONZACATE',3),
 (42,'AGUA CALIENTE',4),
 (43,'ARCATAO',4),
 (44,'AZACUALPA',4),
 (45,'CITALA',4),
 (46,'COMALAPA',4),
 (47,'CONCEPCION QUEZALTEPEQUE',4),
 (48,'CHALATENANGO',4),
 (49,'DULCE NOMBRE DE MARIA',4),
 (50,'EL CARRIZAL',4),
 (51,'EL PARAISO',4),
 (52,'LA LAGUNA',4),
 (53,'LA PALMA',4),
 (54,'LA REINA',4),
 (55,'LAS VUELTAS',4),
 (56,'NOMBRE DE JESUS',4),
 (57,'NUEVA CONCEPCION',4),
 (58,'NUEVA TRINIDAD',4),
 (59,'OJO DE AGUA',4),
 (60,'POTONICO',4),
 (61,'SAN ANTONIO DE LA CRUZ',4),
 (62,'SAN ANTONIO LOS RACHOS',4),
 (63,'SAN FERNANDO',4),
 (64,'SAN FRANCISCO LEMPA',4),
 (65,'SAN FRANCISCO MORAZAN',4),
 (66,'SAN IGNACIO',4),
 (67,'SAN ISIDRO LABRADOR',4),
 (68,'SAN JOSE CANCASQUE',4),
 (69,'LAS FLORES',4),
 (70,'SAN LUIS DEL CARMEN',4),
 (71,'SAN MIGUEL DE MERCEDES',4),
 (72,'SAN RAFAEL',4),
 (73,'SANTA RITA',4),
 (74,'TEJUTLA',4),
 (75,'ANTIGUO CUSCATLAN',5),
 (76,'CIUDAD ARCE',5),
 (77,'COLON',5),
 (78,'COMASAGUA',5),
 (79,'CHILTIUPAN',5),
 (80,'HUIZUCAR',5),
 (81,'JAYAQUE',5),
 (82,'JICALAPA',5),
 (83,'LA LIBERTAD',5),
 (84,'NUEVO CUSCATLAN',5),
 (85,'NUEVA SAN SALVADOR',5),
 (86,'QUEZALTEPEQUE',5),
 (87,'SACACOYO',5),
 (88,'SAN JOSE VILLANUEVA',5),
 (89,'SAN JUAN OPICO',5),
 (90,'SAN MATIAS',5),
 (91,'SAN PABLO TACACHICO',5),
 (92,'TAMANIQUE',5),
 (93,'TALNIQUE',5),
 (94,'TEOTEPEQUE',5),
 (95,'TEPECOYO',5),
 (96,'ZARAGOZA',5),
 (97,'SANTA TECLA',5),
 (98,'AGUILARES',6),
 (99,'APOPA',6),
 (100,'AYUTUXTEPEQUE',6),
 (101,'CUSCATANCINGO',6),
 (102,'EL PAISNAL',6),
 (103,'GUAZAPA',6),
 (104,'ILOPANGO',6),
 (105,'MEJICANOS',6),
 (106,'NEJAPA',6),
 (107,'PANCHIMALCO',6),
 (108,'ROSARIO DE MORA',6),
 (109,'SAN MARCOS',6),
 (110,'SAN MARTIN',6),
 (111,'SAN SALVADOR',6),
 (112,'SANTIAGO TEXACUANGOS',6),
 (113,'SANTO TOMAS',6),
 (114,'SOYAPANGO',6),
 (115,'TONACATEPEQUE',6),
 (116,'CIUDAD DELGADO',6),
 (118,'CANDELARIA',7),
 (119,'COJUTEPEQUE',7),
 (120,'EL CARMEN',7),
 (121,'EL ROSARIO',7),
 (122,'MONTE SAN JUAN',7),
 (123,'ORATORIO DE CONCEPCION',7),
 (124,'SAN BARTOLOME PERULAPIA',7),
 (125,'SAN CRISTOBAL',7),
 (126,'SAN JOSE GUAYABAL',7),
 (127,'SAN PEDRO PERULAPAN',7),
 (128,'SAN RAFAEL CEDROS',7),
 (129,'SAN RAMON',7),
 (130,'SANTA CRUZ ANALQUITO',7),
 (131,'SANTA CRUZ MICHAPA',7),
 (132,'SUCHITOTO',7),
 (133,'TENANCINGO',7),
 (134,'CUYULTITAN',8),
 (135,'EL ROSARIO',8),
 (136,'JERUSALEN',8),
 (137,'MERCEDES LA CEIBA',8),
 (138,'OLOCUILTA',8),
 (139,'PARAISO DE OSORIO',8),
 (140,'SAN ANTONIO MASAHUAT',8),
 (141,'SAN EMIGDIO',8),
 (142,'SAN FRANCISCO CHINAMECA',8),
 (143,'SAN JUAN NONUALCO',8),
 (144,'SAN JUAN TALPA',8),
 (145,'SAN JUAN TEPESONTE',8),
 (146,'SAN LUIS TALPA',8),
 (147,'SAN MIGUEL TEPEZONTES',8),
 (148,'SAN PEDRO MASAHUAT',8),
 (149,'SAN PEDRO NONUALCO',8),
 (150,'SAN RAFAEL OBRAJUELO',8),
 (151,'SANTA MARIA OSTUMA',8),
 (152,'SANTIAGO NONUALCO',8),
 (153,'TAPALHUACA',8),
 (154,'ZACATECOLUCA',8),
 (155,'SAN LUIS LA HERRADURA',8),
 (156,'CINQUERA',9),
 (157,'GUACOTECTI',9),
 (158,'ILOBASCO',9),
 (159,'JUTIAPA',9),
 (160,'SAN ISIDRO',9),
 (161,'SENSUNTEPEQUE',9),
 (162,'TEJUTEPEQUE',9),
 (163,'VICTORIA',9),
 (164,'DOLORES',9),
 (165,'APASTEPEQUE',10),
 (166,'GUADALUPE',10),
 (167,'SAN CAYETANO ISTEPEQUE',10),
 (168,'SANTA CLARA',10),
 (169,'SANTO DOMINGO',10),
 (170,'SAN ESTEBAN CATARINA',10),
 (171,'SAN ILDEFONSO',10),
 (172,'SAN LORENZO',10),
 (173,'SAN SEBASTIAN',10),
 (174,'SAN VICENTE',10),
 (175,'TECOLUCA',10),
 (176,'TEPETITAN',10),
 (177,'VERAPAZ',10),
 (178,'ALEGRIA',11),
 (179,'BERLIN',11),
 (180,'CALIFORNIA',11),
 (181,'CONCEPCION BATRES',11),
 (182,'EL TRIUNFO',11),
 (183,'EREGUAYQUIN',11),
 (184,'ESTANZUELAS',11),
 (185,'JIQUILISCO',11),
 (186,'JUCUAPA',11),
 (187,'JUCUARAN',11),
 (188,'MERCEDES UMAÑA',11),
 (189,'NUEVA GRANADA',11),
 (190,'OZATLAN',11),
 (191,'PUERTO EL TRIUNFO',11),
 (192,'SAN AGUSTIN',11),
 (193,'SAN BUENAVENTURA',11),
 (194,'SAN DIONISIO',11),
 (195,'SANTA ELENA',11),
 (196,'SAN FRANCISCO JAVIER',11),
 (197,'SANTA MARIA',11),
 (198,'SANTIAGO DE MARIA',11),
 (199,'TECAPAN',11),
 (200,'USULUTAN',11),
 (201,'CAROLINA',12),
 (202,'CIUDAD BARRIOS',12),
 (203,'COMACARAN',12),
 (204,'CHAPELTIQUE',12),
 (205,'CHINAMECA',12),
 (206,'CHIRILAGUA',12),
 (207,'EL TRANSITO',12),
 (208,'LOLOTIQUE',12),
 (209,'MONCAGUA',12),
 (210,'NUEVA GUADALUPE',12),
 (211,'NUEVO EDEN DE SAN JUAN',12),
 (212,'QUELEPA',12),
 (213,'SAN ANTONIO DEL MOSCO',12),
 (214,'SAN GERARDO',12),
 (215,'SAN JORGE',12),
 (216,'SAN LUIS LA REINA',12),
 (217,'SAN MIGUEL',12),
 (218,'SAN RAFAEL ORIENTE',12),
 (219,'SESORI',12),
 (220,'ULUAZAPA',12),
 (221,'ARAMBALA',13),
 (222,'CACAOPERA',13),
 (223,'CORINTO',13),
 (224,'CHILANGA',13),
 (225,'DELICIAS DE CONCEPCION',13),
 (226,'EL DIVISADERO',13),
 (227,'EL ROSARIO',13),
 (228,'GUALOCOCTI',13),
 (229,'GUATAJIAGUA',13),
 (230,'JOATECA',13),
 (231,'JOCOAITIQUE',13),
 (232,'JOCORO',13),
 (233,'LOLOTIQUILLO',13),
 (234,'MEANGUERA',13),
 (235,'OSICALA',13),
 (236,'PERQUIN',13),
 (237,'SAN CARLOS',13),
 (238,'SAN FERNANDO',13),
 (239,'SAN FRANCISCO GOTERA',13),
 (240,'SAN ISIDRO',13),
 (241,'SAN SIMON',13),
 (242,'SEMSEMBRA',13),
 (243,'SOCIEDAD',13),
 (244,'TOROLA',13),
 (245,'YAMABAL',13),
 (246,'YOLOAIQUIN',13),
 (247,'ANAMOROS',14),
 (248,'BOLIVAR',14),
 (249,'CONCEPCION ORIENTE',14),
 (250,'CONCHAGUA',14),
 (251,'EL CARMEN',14),
 (252,'EL SAUCE',14),
 (253,'INTIPUCA',14),
 (254,'LA UNION',14),
 (255,'LISLIQUE',14),
 (256,'MEANGUERA DEL GOLFO',14),
 (257,'NUEVA ESPARTA',14),
 (258,'PASAQUINA',14),
 (259,'POLOROS',14),
 (260,'SAN ALEJO',14),
 (261,'SAN JOSE',14),
 (262,'SANTA ROSA DE LIMA',14),
 (263,'YAYANTIQUE',14),
 (264,'YUCUAIQUIN',14);
/*!40000 ALTER TABLE `catalog_municipio` ENABLE KEYS */;


--
-- Definition of table `catalog_organization_status`
--

DROP TABLE IF EXISTS `catalog_organization_status`;
CREATE TABLE `catalog_organization_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(85) DEFAULT NULL,
  `description_es` varchar(85) DEFAULT NULL,
  `adding_date` datetime DEFAULT current_timestamp(),
  `modifying_user` varchar(45) DEFAULT NULL,
  `modifying_date` datetime DEFAULT NULL,
  `status` varchar(3) DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catalog_organization_status`
--

/*!40000 ALTER TABLE `catalog_organization_status` DISABLE KEYS */;
INSERT INTO `catalog_organization_status` (`id`,`description`,`description_es`,`adding_date`,`modifying_user`,`modifying_date`,`status`) VALUES 
 (1,'Review Pending','Revisión Pendiente','2023-07-19 16:35:46',NULL,NULL,'A'),
 (2,'Approved','Aceptado','2023-07-19 16:35:46',NULL,NULL,'A'),
 (3,'Rejected','Rechazado','2023-07-19 16:35:46',NULL,NULL,'A');
/*!40000 ALTER TABLE `catalog_organization_status` ENABLE KEYS */;


--
-- Definition of table `catalog_questions`
--

DROP TABLE IF EXISTS `catalog_questions`;
CREATE TABLE `catalog_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catalog_questions`
--

/*!40000 ALTER TABLE `catalog_questions` DISABLE KEYS */;
INSERT INTO `catalog_questions` (`id`,`description`) VALUES 
 (5,'Teniendo en cuenta su experiencia completa con los sitios de redes sociales, ¿Qué tan probable es que recomiende a su amigo o colega que se una a ellos?'),
 (6,'¿Qué sitios de redes sociales utiliza más?'),
 (7,'Seleccione qué información comparte en los sitios de redes sociales'),
 (8,'test');
/*!40000 ALTER TABLE `catalog_questions` ENABLE KEYS */;


--
-- Definition of table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `name_es` varchar(150) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `description_es` varchar(500) DEFAULT NULL,
  `image` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` (`id`,`name`,`name_es`,`description`,`description_es`,`image`) VALUES 
 (1,'Equidad, diversidad e inclusión (EDI) en la atención de adultos','Equidad, diversidad e inclusión (EDI) en la atención de adultos','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','img.jpg'),
 (2,'Asociaciones en la salud de adultos','Asociaciones en la salud de adultos','Este curso gratuito en línea combina estrategias constructivas y capacidades de cuidado de ancianos para modernizar los servicios de la tercera edad.','Este curso gratuito en línea combina estrategias constructivas y capacidades de cuidado de ancianos para modernizar los servicios de la tercera edad.','img2.jpg'),
 (3,'Convertirse en Oficial de Inclusión Social','Convertirse en Oficial de Inclusión Social','Únete a la lucha por la igualdad y aprende a convertirte en oficial de inclusión social en este curso gratuito de formación de DEI online.','Únete a la lucha por la igualdad y aprende a convertirte en oficial de inclusión social en este curso gratuito de formación de DEI online.','img3.jpg'),
 (4,'Una introducción a los fundamentos del trabajo social','Una introducción a los fundamentos del trabajo social','Un curso gratuito en línea sobre las responsabilidades y deberes de ser un trabajador social basado en la reciente legislación del Reino Unido.','Un curso gratuito en línea sobre las responsabilidades y deberes de ser un trabajador social basado en la reciente legislación del Reino Unido.','img4.jpg'),
 (5,'Equidad, diversidad e inclusión (EDI) en la atención de adultos','Equidad, diversidad e inclusión (EDI) en la atención de adultos','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','img.jpg'),
 (6,'Equidad, diversidad e inclusión (EDI) en la atención de adultos','Equidad, diversidad e inclusión (EDI) en la atención de adultos','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','img.jpg'),
 (7,'Equidad, diversidad e inclusión (EDI) en la atención de adultos','Equidad, diversidad e inclusión (EDI) en la atención de adultos','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','img.jpg'),
 (8,'Equidad, diversidad e inclusión (EDI) en la atención de adultos','Equidad, diversidad e inclusión (EDI) en la atención de adultos','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','img.jpg'),
 (9,'Equidad, diversidad e inclusión (EDI) en la atención de adultos','Equidad, diversidad e inclusión (EDI) en la atención de adultos','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','img.jpg'),
 (10,'Equidad, diversidad e inclusión (EDI) en la atención de adultos','Equidad, diversidad e inclusión (EDI) en la atención de adultos','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','img.jpg'),
 (11,'Equidad, diversidad e inclusión (EDI) en la atención de adultos','Equidad, diversidad e inclusión (EDI) en la atención de adultos','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','img.jpg'),
 (12,'Equidad, diversidad e inclusión (EDI) en la atención de adultos','Equidad, diversidad e inclusión (EDI) en la atención de adultos','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','img.jpg'),
 (13,'Equidad, diversidad e inclusión (EDI) en la atención de adultos','Equidad, diversidad e inclusión (EDI) en la atención de adultos','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','Conozca cómo se respetan los valores de diversidad, equidad e inclusividad (DEI) en la atención de adultos en este curso online gratuito.','img.jpg'),
 (14,'Comprender el problema de la esclavitud moderna','Comprender el problema de la esclavitud moderna','La esclavitud sigue existiendo así que aprende a identificar y ayudar a las víctimas de la trata de personas en este curso gratuito en línea.','La esclavitud sigue existiendo así que aprende a identificar y ayudar a las víctimas de la trata de personas en este curso gratuito en línea.','64b9a74de045baaa.jpg'),
 (15,'Cómo realizar la investigación en la atención de adultos','Cómo realizar la investigación en la atención de adultos','Aprenda a adaptar su metodología de investigación para satisfacer las demandas de los entornos de cuidado de adultos en este curso gratuito en línea.','Aprenda a adaptar su metodología de investigación para satisfacer las demandas de los entornos de cuidado de adultos en este curso gratuito en línea.','64b9a796d4332bbb.jpg'),
 (16,'Introducción a la etnografía','Introducción a la etnografía','Este curso gratuito en línea le enseña los elementos centrales de la etnografía como \"el otro\" y las metodologías de investigación.','Este curso gratuito en línea le enseña los elementos centrales de la etnografía como \"el otro\" y las metodologías de investigación.','64b9b27eb5e23etno.jpg'),
 (17,'Aldeas infantiles','Aldeas infantiles','formacion de niños que pertenecen a las aldeas','formacion de niños que pertenecen a las aldeas','64b9bd5845330Call-center-pago.jpg');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;


--
-- Definition of table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `departamento`
--

/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` (`Id`,`Nombre`) VALUES 
 (1,'AHUACHAPAN'),
 (2,'SANTA ANA'),
 (3,'SONSONATE'),
 (4,'CHALATENANGO'),
 (5,'LA LIBERTAD'),
 (6,'SAN SALVADOR'),
 (7,'CUSCATLAN'),
 (8,'LA PAZ'),
 (9,'CABAÑAS'),
 (10,'SAN VICENTE'),
 (11,'USULUTAN'),
 (12,'SAN MIGUEL'),
 (13,'MORAZAN'),
 (14,'LA UNION');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;


--
-- Definition of table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;


--
-- Definition of table `file_per_course`
--

DROP TABLE IF EXISTS `file_per_course`;
CREATE TABLE `file_per_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `route` varchar(150) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_files_course` (`course_id`),
  CONSTRAINT `fk_files_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_per_course`
--

/*!40000 ALTER TABLE `file_per_course` DISABLE KEYS */;
INSERT INTO `file_per_course` (`id`,`course_id`,`route`,`name`,`created_at`) VALUES 
 (1,1,'64be936e58d8aShawsNavidad2022medium.pdf','ShawsNavidad2022medium.pdf','2023-07-24 10:51:57'),
 (2,1,'64be936e69b65e9763342-8a85-4346-b5c4-ce26e8d5044f.jpg','8a85-4346-b5c4-ce26e8d5044f.jpg','2023-07-24 10:51:57'),
 (3,1,'64be9a1908b55PES Module Proposal Detail V1.docx','Module Proposal Detail V1.docx','2023-07-24 10:51:57'),
 (4,1,'64be9e9747cc9json.zip','json.zip','2023-07-24 10:51:57'),
 (5,1,'64be9f04374cbLibro1.xlsx','Libro1.xlsx','2023-07-24 10:51:57'),
 (6,1,'64be9fb9a4c37demo.pem','demo.pem','2023-07-24 10:51:57'),
 (7,1,'64bea09e29537json.zip','json.zip','2023-07-24 10:51:57'),
 (8,1,'64bea0a8104e6ShawsNavidad2022medium.pdf','ShawsNavidad2022medium.pdf','2023-07-24 10:51:57'),
 (9,1,'64bea0c41102ee9763342-8a85-4346-b5c4-ce26e8d5044f.jpg','ce26e8d5044f.jpg','2023-07-24 10:51:57'),
 (10,1,'64bea0c421468tablas isss.docx','tablas isss.docx','2023-07-24 10:51:57'),
 (11,3,'64bea1ffa2561ASU GBV web app_spa.pdf','ASU GBV web app_spa.pdf','2023-07-24 10:51:57'),
 (12,1,'64bea339d370bLibro1.xlsx','Libro1.xlsx','2023-07-24 10:51:57'),
 (13,2,'64bea411e8ba4Flujos Urban - ESP.odg','Flujos Urban - ESP.odg','2023-07-24 10:51:57'),
 (14,2,'64bea42818406DISTRITOS POR MUNICIPIO Y DPTO 150723.xlsx','DISTRITOS POR MUNICIPIO Y DPTO 150723.xlsx','2023-07-24 10:51:57'),
 (15,2,'64bea42826e81farmacias.csv','farmacias.csv','2023-07-24 10:51:57'),
 (16,2,'64bea42831be5employer_related_user.xlsx','employer_related_user.xlsx','2023-07-24 10:51:57'),
 (17,2,'64beab8f54db3ShawsNavidad2022medium.pdf','ShawsNavidad2022medium.pdf','2023-07-24 10:51:57'),
 (18,2,'64beab8f64bcbLibro1.xlsx','Libro1.xlsx','2023-07-24 10:51:57'),
 (19,2,'64beac41b59f5Libro1.xlsx','Libro1.xlsx','2023-07-24 10:52:17'),
 (20,3,'64c0013c68602Libro1.xlsx','Libro1.xlsx','2023-07-25 11:07:08'),
 (21,3,'64c0013c8d1a5ShawsNavidad2022medium.pdf','ShawsNavidad2022medium.pdf','2023-07-25 11:07:08'),
 (22,3,'64c0015881da7tablas isss.docx','tablas isss.docx','2023-07-25 11:07:36'),
 (23,3,'64c0042ebd632tablas isss.docx','tablas isss.docx','2023-07-25 11:19:42'),
 (24,3,'64c0042eed38bNormativa de Cumplimiento de los Documentos Tributarios Electrónicos_Versión 1.0_15022023-1.pdf','Normativa de Cumplimiento de los Documentos Tributarios Electrónicos_Versión 1.0_15022023-1.pdf','2023-07-25 11:19:42'),
 (25,2,'64c050e9545a8amanecer - HD 1080p.mov','amanecer - HD 1080p.mov','2023-07-25 16:47:05'),
 (26,2,'64c05368a7ef4lv_0_20230725064215.mp4','lv_0_20230725064215.mp4','2023-07-25 16:57:44'),
 (27,2,'64c12e9999cfbcoop.pdf','coop.pdf','2023-07-26 08:32:57'),
 (28,2,'64c133a45471dvideo1.mov','video1.mov','2023-07-26 08:54:28'),
 (29,2,'64c133e585325amanecer - HD 1080p.mov','amanecer - HD 1080p.mov','2023-07-26 08:55:33');
/*!40000 ALTER TABLE `file_per_course` ENABLE KEYS */;


--
-- Definition of table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `state_id` mediumint(8) unsigned DEFAULT NULL,
  `city_id` mediumint(8) unsigned DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `status` int(5) DEFAULT 1,
  `organization_id` int(11) DEFAULT NULL,
  `users_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`id`,`name_member`,`lastname_member`,`birthdate`,`document_number_type`,`document_type_id`,`document_number`,`catalog_gender_id`,`about_me`,`email`,`cell_phone_number`,`country_id`,`state_id`,`city_id`,`address`,`date_created`,`status`,`organization_id`,`users_id`) VALUES 
 (6,'Juan Perez','Cerros','2001-01-01 00:00:00',NULL,NULL,'22222222-2',NULL,NULL,'reynaldoceronsosa@gmail.com','2222-2222',NULL,NULL,NULL,'av test','2023-07-20 16:58:03',2,11,25);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;


--
-- Definition of table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES 
 (1,'2014_10_12_000000_create_users_table',1),
 (2,'2014_10_12_100000_create_password_resets_table',1),
 (3,'2019_08_19_000000_create_failed_jobs_table',1),
 (4,'2019_12_14_000001_create_personal_access_tokens_table',1),
 (5,'2023_07_14_155805_create_permission_tables',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


--
-- Definition of table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model_has_permissions`
--

/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;


--
-- Definition of table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`,`model_type`,`model_id`) VALUES 
 (1,'App\\Models\\User',1),
 (2,'App\\Models\\User',17),
 (2,'App\\Models\\User',23),
 (2,'App\\Models\\User',24),
 (3,'App\\Models\\User',21),
 (3,'App\\Models\\User',22),
 (3,'App\\Models\\User',25);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;


--
-- Definition of table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
CREATE TABLE `municipio` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `municipio`
--

/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` (`Id`,`Nombre`,`Departamento`) VALUES 
 (1,'AHUACHAPAN',1),
 (2,'APANECA',1),
 (3,'ATIQUIZAYA',1),
 (4,'CONCEPCION DE ATACO',1),
 (5,'EL REFUGIO',1),
 (6,'GUAYMANGO',1),
 (7,'JUJUTLA',1),
 (8,'SAN FRANCISCO MENENDEZ',1),
 (9,'SAN LORENZO',1),
 (10,'SAN PEDRO PUXTLA',1),
 (11,'TACUBA',1),
 (12,'TURIN',1),
 (13,'CANDELARIA DE LA FRONTERA',2),
 (14,'COATEPEQUE',2),
 (15,'CHALCHUAPA',2),
 (16,'EL CONGO',2),
 (17,'EL PORVENIR',2),
 (18,'MASAHUAT',2),
 (19,'METAPAN',2),
 (20,'SAN ANTONIO PAJONAL',2),
 (21,'SAN SEBASTIAN SALITRILLO',2),
 (22,'SANTA ANA',2),
 (23,'SANTA ROSA GUACHIPILIN',2),
 (24,'SANTIAGO DE LA FRONTERA',2),
 (25,'TEXISTEPEQUE',2),
 (26,'ACAJUTLA',3),
 (27,'ARMENIA',3),
 (28,'CALUCO',3),
 (29,'CUISNAHUAT',3),
 (30,'SANTA ISABEL ISHUATAN',3),
 (31,'IZALCO',3),
 (32,'JUAYUA',3),
 (33,'NAHUIZALCO',3),
 (34,'NAHUILINGO',3),
 (35,'SALCOATITAN',3),
 (36,'SAN ANTONIO DEL MONTE',3),
 (37,'SAN JULIAN',3),
 (38,'SANTA CATARINA MASAHUAT',3),
 (39,'SANTO DOMINGO DE GUZMAN',3),
 (40,'SONSONATE',3),
 (41,'SONZACATE',3),
 (42,'AGUA CALIENTE',4),
 (43,'ARCATAO',4),
 (44,'AZACUALPA',4),
 (45,'CITALA',4),
 (46,'COMALAPA',4),
 (47,'CONCEPCION QUEZALTEPEQUE',4),
 (48,'CHALATENANGO',4),
 (49,'DULCE NOMBRE DE MARIA',4),
 (50,'EL CARRIZAL',4),
 (51,'EL PARAISO',4),
 (52,'LA LAGUNA',4),
 (53,'LA PALMA',4),
 (54,'LA REINA',4),
 (55,'LAS VUELTAS',4),
 (56,'NOMBRE DE JESUS',4),
 (57,'NUEVA CONCEPCION',4),
 (58,'NUEVA TRINIDAD',4),
 (59,'OJO DE AGUA',4),
 (60,'POTONICO',4),
 (61,'SAN ANTONIO DE LA CRUZ',4),
 (62,'SAN ANTONIO LOS RACHOS',4),
 (63,'SAN FERNANDO',4),
 (64,'SAN FRANCISCO LEMPA',4),
 (65,'SAN FRANCISCO MORAZAN',4),
 (66,'SAN IGNACIO',4),
 (67,'SAN ISIDRO LABRADOR',4),
 (68,'SAN JOSE CANCASQUE',4),
 (69,'LAS FLORES',4),
 (70,'SAN LUIS DEL CARMEN',4),
 (71,'SAN MIGUEL DE MERCEDES',4),
 (72,'SAN RAFAEL',4),
 (73,'SANTA RITA',4),
 (74,'TEJUTLA',4),
 (75,'ANTIGUO CUSCATLAN',5),
 (76,'CIUDAD ARCE',5),
 (77,'COLON',5),
 (78,'COMASAGUA',5),
 (79,'CHILTIUPAN',5),
 (80,'HUIZUCAR',5),
 (81,'JAYAQUE',5),
 (82,'JICALAPA',5),
 (83,'LA LIBERTAD',5),
 (84,'NUEVO CUSCATLAN',5),
 (85,'NUEVA SAN SALVADOR',5),
 (86,'QUEZALTEPEQUE',5),
 (87,'SACACOYO',5),
 (88,'SAN JOSE VILLANUEVA',5),
 (89,'SAN JUAN OPICO',5),
 (90,'SAN MATIAS',5),
 (91,'SAN PABLO TACACHICO',5),
 (92,'TAMANIQUE',5),
 (93,'TALNIQUE',5),
 (94,'TEOTEPEQUE',5),
 (95,'TEPECOYO',5),
 (96,'ZARAGOZA',5),
 (97,'SANTA TECLA',5),
 (98,'AGUILARES',6),
 (99,'APOPA',6),
 (100,'AYUTUXTEPEQUE',6),
 (101,'CUSCATANCINGO',6),
 (102,'EL PAISNAL',6),
 (103,'GUAZAPA',6),
 (104,'ILOPANGO',6),
 (105,'MEJICANOS',6),
 (106,'NEJAPA',6),
 (107,'PANCHIMALCO',6),
 (108,'ROSARIO DE MORA',6),
 (109,'SAN MARCOS',6),
 (110,'SAN MARTIN',6),
 (111,'SAN SALVADOR',6),
 (112,'SANTIAGO TEXACUANGOS',6),
 (113,'SANTO TOMAS',6),
 (114,'SOYAPANGO',6),
 (115,'TONACATEPEQUE',6),
 (116,'CIUDAD DELGADO',6),
 (118,'CANDELARIA',7),
 (119,'COJUTEPEQUE',7),
 (120,'EL CARMEN',7),
 (121,'EL ROSARIO',7),
 (122,'MONTE SAN JUAN',7),
 (123,'ORATORIO DE CONCEPCION',7),
 (124,'SAN BARTOLOME PERULAPIA',7),
 (125,'SAN CRISTOBAL',7),
 (126,'SAN JOSE GUAYABAL',7),
 (127,'SAN PEDRO PERULAPAN',7),
 (128,'SAN RAFAEL CEDROS',7),
 (129,'SAN RAMON',7),
 (130,'SANTA CRUZ ANALQUITO',7),
 (131,'SANTA CRUZ MICHAPA',7),
 (132,'SUCHITOTO',7),
 (133,'TENANCINGO',7),
 (134,'CUYULTITAN',8),
 (135,'EL ROSARIO',8),
 (136,'JERUSALEN',8),
 (137,'MERCEDES LA CEIBA',8),
 (138,'OLOCUILTA',8),
 (139,'PARAISO DE OSORIO',8),
 (140,'SAN ANTONIO MASAHUAT',8),
 (141,'SAN EMIGDIO',8),
 (142,'SAN FRANCISCO CHINAMECA',8),
 (143,'SAN JUAN NONUALCO',8),
 (144,'SAN JUAN TALPA',8),
 (145,'SAN JUAN TEPESONTE',8),
 (146,'SAN LUIS TALPA',8),
 (147,'SAN MIGUEL TEPEZONTES',8),
 (148,'SAN PEDRO MASAHUAT',8),
 (149,'SAN PEDRO NONUALCO',8),
 (150,'SAN RAFAEL OBRAJUELO',8),
 (151,'SANTA MARIA OSTUMA',8),
 (152,'SANTIAGO NONUALCO',8),
 (153,'TAPALHUACA',8),
 (154,'ZACATECOLUCA',8),
 (155,'SAN LUIS LA HERRADURA',8),
 (156,'CINQUERA',9),
 (157,'GUACOTECTI',9),
 (158,'ILOBASCO',9),
 (159,'JUTIAPA',9),
 (160,'SAN ISIDRO',9),
 (161,'SENSUNTEPEQUE',9),
 (162,'TEJUTEPEQUE',9),
 (163,'VICTORIA',9),
 (164,'DOLORES',9),
 (165,'APASTEPEQUE',10),
 (166,'GUADALUPE',10),
 (167,'SAN CAYETANO ISTEPEQUE',10),
 (168,'SANTA CLARA',10),
 (169,'SANTO DOMINGO',10),
 (170,'SAN ESTEBAN CATARINA',10),
 (171,'SAN ILDEFONSO',10),
 (172,'SAN LORENZO',10),
 (173,'SAN SEBASTIAN',10),
 (174,'SAN VICENTE',10),
 (175,'TECOLUCA',10),
 (176,'TEPETITAN',10),
 (177,'VERAPAZ',10),
 (178,'ALEGRIA',11),
 (179,'BERLIN',11),
 (180,'CALIFORNIA',11),
 (181,'CONCEPCION BATRES',11),
 (182,'EL TRIUNFO',11),
 (183,'EREGUAYQUIN',11),
 (184,'ESTANZUELAS',11),
 (185,'JIQUILISCO',11),
 (186,'JUCUAPA',11),
 (187,'JUCUARAN',11),
 (188,'MERCEDES UMAÑA',11),
 (189,'NUEVA GRANADA',11),
 (190,'OZATLAN',11),
 (191,'PUERTO EL TRIUNFO',11),
 (192,'SAN AGUSTIN',11),
 (193,'SAN BUENAVENTURA',11),
 (194,'SAN DIONISIO',11),
 (195,'SANTA ELENA',11),
 (196,'SAN FRANCISCO JAVIER',11),
 (197,'SANTA MARIA',11),
 (198,'SANTIAGO DE MARIA',11),
 (199,'TECAPAN',11),
 (200,'USULUTAN',11),
 (201,'CAROLINA',12),
 (202,'CIUDAD BARRIOS',12),
 (203,'COMACARAN',12),
 (204,'CHAPELTIQUE',12),
 (205,'CHINAMECA',12),
 (206,'CHIRILAGUA',12),
 (207,'EL TRANSITO',12),
 (208,'LOLOTIQUE',12),
 (209,'MONCAGUA',12),
 (210,'NUEVA GUADALUPE',12),
 (211,'NUEVO EDEN DE SAN JUAN',12),
 (212,'QUELEPA',12),
 (213,'SAN ANTONIO DEL MOSCO',12),
 (214,'SAN GERARDO',12),
 (215,'SAN JORGE',12),
 (216,'SAN LUIS LA REINA',12),
 (217,'SAN MIGUEL',12),
 (218,'SAN RAFAEL ORIENTE',12),
 (219,'SESORI',12),
 (220,'ULUAZAPA',12),
 (221,'ARAMBALA',13),
 (222,'CACAOPERA',13),
 (223,'CORINTO',13),
 (224,'CHILANGA',13),
 (225,'DELICIAS DE CONCEPCION',13),
 (226,'EL DIVISADERO',13),
 (227,'EL ROSARIO',13),
 (228,'GUALOCOCTI',13),
 (229,'GUATAJIAGUA',13),
 (230,'JOATECA',13),
 (231,'JOCOAITIQUE',13),
 (232,'JOCORO',13),
 (233,'LOLOTIQUILLO',13),
 (234,'MEANGUERA',13),
 (235,'OSICALA',13),
 (236,'PERQUIN',13),
 (237,'SAN CARLOS',13),
 (238,'SAN FERNANDO',13),
 (239,'SAN FRANCISCO GOTERA',13),
 (240,'SAN ISIDRO',13),
 (241,'SAN SIMON',13),
 (242,'SEMSEMBRA',13),
 (243,'SOCIEDAD',13),
 (244,'TOROLA',13),
 (245,'YAMABAL',13),
 (246,'YOLOAIQUIN',13),
 (247,'ANAMOROS',14),
 (248,'BOLIVAR',14),
 (249,'CONCEPCION ORIENTE',14),
 (250,'CONCHAGUA',14),
 (251,'EL CARMEN',14),
 (252,'EL SAUCE',14),
 (253,'INTIPUCA',14),
 (254,'LA UNION',14),
 (255,'LISLIQUE',14),
 (256,'MEANGUERA DEL GOLFO',14),
 (257,'NUEVA ESPARTA',14),
 (258,'PASAQUINA',14),
 (259,'POLOROS',14),
 (260,'SAN ALEJO',14),
 (261,'SAN JOSE',14),
 (262,'SANTA ROSA DE LIMA',14),
 (263,'YAYANTIQUE',14),
 (264,'YUCUAIQUIN',14);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;


--
-- Definition of table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text DEFAULT NULL,
  `content_title` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `status` varchar(5) DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


--
-- Definition of table `newsletter_member_list`
--

DROP TABLE IF EXISTS `newsletter_member_list`;
CREATE TABLE `newsletter_member_list` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `lastname` varchar(120) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter_member_list`
--

/*!40000 ALTER TABLE `newsletter_member_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletter_member_list` ENABLE KEYS */;


--
-- Definition of table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_sent` datetime DEFAULT NULL,
  `status` varchar(5) DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletters`
--

/*!40000 ALTER TABLE `newsletters` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletters` ENABLE KEYS */;


--
-- Definition of table `organization`
--

DROP TABLE IF EXISTS `organization`;
CREATE TABLE `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` mediumint(8) unsigned DEFAULT NULL,
  `city_id` mediumint(8) unsigned DEFAULT NULL,
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
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organization`
--

/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` (`id`,`name`,`address`,`country_id`,`state_id`,`city_id`,`phone_number`,`notes`,`contact_name`,`contact_job_title`,`contact_phone_number`,`contact_phone_number_2`,`secondary_contact_name`,`secondary_contact_job_title`,`secondary_contact_phone_number`,`secondary_contact_phone_number_2`,`status`) VALUES 
 (11,'iglesia Luz del Mundo','29 av sur',NULL,NULL,NULL,'2222-2222',NULL,'pastor Juan Perez','Pastor','2222-2222','2222-2222',NULL,NULL,NULL,NULL,2);
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;


--
-- Definition of table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


--
-- Definition of table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`,`name`,`guard_name`,`created_at`,`updated_at`) VALUES 
 (1,'create roles','web','2023-07-14 20:40:04','2023-07-14 20:40:04'),
 (2,'read roles','web','2023-07-14 20:40:04','2023-07-14 20:40:04'),
 (3,'edit roles','web','2023-07-14 20:40:04','2023-07-14 20:40:04'),
 (4,'delete roles','web','2023-07-14 20:40:04','2023-07-14 20:40:04'),
 (5,'create users','web','2023-07-14 20:40:04','2023-07-14 20:40:04'),
 (6,'read users','web','2023-07-14 20:40:04','2023-07-14 20:40:04'),
 (7,'edit users','web','2023-07-14 20:40:04','2023-07-14 20:40:04'),
 (8,'delete users','web','2023-07-14 20:40:04','2023-07-14 20:40:04'),
 (9,'create permissions','web','2023-07-14 20:40:04','2023-07-14 20:40:04'),
 (10,'read permissions','web','2023-07-14 20:40:04','2023-07-14 20:40:04'),
 (11,'edit permissions','web','2023-07-14 20:40:04','2023-07-14 20:40:04'),
 (12,'delete permissions','web','2023-07-14 20:40:04','2023-07-14 20:40:04'),
 (13,'approve organization','web','2023-07-20 08:22:47','2023-07-20 08:22:47'),
 (14,'create course','web','2023-07-20 16:35:58','2023-07-20 16:35:58'),
 (15,'edit course','web','2023-07-20 16:37:46','2023-07-20 16:37:46'),
 (16,'read course','web','2023-07-20 16:38:34','2023-07-20 16:38:34');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


--
-- Definition of table `questions_per_quiz`
--

DROP TABLE IF EXISTS `questions_per_quiz`;
CREATE TABLE `questions_per_quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_questions_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_question_quiz_idx` (`catalog_questions_id`),
  KEY `fk_quiz_question_idx` (`quiz_id`),
  CONSTRAINT `fk_question_quiz` FOREIGN KEY (`catalog_questions_id`) REFERENCES `catalog_questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_quiz_question` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions_per_quiz`
--

/*!40000 ALTER TABLE `questions_per_quiz` DISABLE KEYS */;
INSERT INTO `questions_per_quiz` (`id`,`catalog_questions_id`,`quiz_id`,`date_added`) VALUES 
 (1,5,1,'2023-07-25 14:30:54'),
 (2,6,1,'2023-07-25 14:32:43'),
 (3,7,1,'2023-07-25 14:32:50'),
 (4,8,1,'2023-07-25 14:37:15');
/*!40000 ALTER TABLE `questions_per_quiz` ENABLE KEYS */;


--
-- Definition of table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_es` varchar(180) DEFAULT NULL,
  `name_en` varchar(180) DEFAULT NULL,
  `status` varchar(5) DEFAULT 'A',
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `course_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_course_id_idx` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` (`id`,`name_es`,`name_en`,`status`,`date_created`,`course_id`) VALUES 
 (1,'Examen de prueba..','Examen de prueba..','A','2023-07-25 13:23:14',3),
 (2,'Test 2','Test 2','A','2023-07-25 15:41:03',4),
 (3,'test 3','test 3','A','2023-07-25 15:44:05',4);
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;


--
-- Definition of table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`,`role_id`) VALUES 
 (1,1),
 (2,1),
 (3,1),
 (4,1),
 (5,1),
 (6,1),
 (7,1),
 (8,1),
 (9,1),
 (10,1),
 (11,1),
 (12,1),
 (13,1),
 (14,1),
 (14,2),
 (15,1),
 (15,2),
 (16,1),
 (16,2),
 (16,3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;


--
-- Definition of table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`,`name`,`guard_name`,`created_at`,`updated_at`) VALUES 
 (1,'administrador','web','2023-07-14 20:40:04','2023-07-14 20:40:04'),
 (2,'facilitator','web','2023-07-19 16:37:14','2023-07-19 16:37:14'),
 (3,'member','web','2023-07-20 09:39:29','2023-07-20 09:39:29');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


--
-- Definition of table `sections_per_course`
--

DROP TABLE IF EXISTS `sections_per_course`;
CREATE TABLE `sections_per_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tbd` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections_per_course`
--

/*!40000 ALTER TABLE `sections_per_course` DISABLE KEYS */;
/*!40000 ALTER TABLE `sections_per_course` ENABLE KEYS */;


--
-- Definition of table `study_plan`
--

DROP TABLE IF EXISTS `study_plan`;
CREATE TABLE `study_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `description_es` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `study_plan`
--

/*!40000 ALTER TABLE `study_plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `study_plan` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `status` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`pin`,`created_at`,`updated_at`,`last_name`,`website`,`address`,`phone`,`fax`,`country_id`,`date_admission`,`status`) VALUES 
 (1,'Administrador','admin@mail.com',NULL,'$2y$10$hk800y/5ljFzc3fji4D.iOmqhVU3yDmCTqOe5T7CISixTAoYA8scq',NULL,NULL,'2023-07-14 20:41:50','2023-07-14 20:41:50',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
 (24,'Reynaldo Cerón Sosa','rceron@sertracen.com',NULL,'$2y$10$fqEczCczZlzR9guwd87QH.MbUV7lVyaH2op3KmoxEQpWml9OJ1ttS',NULL,NULL,'2023-07-20 16:53:54','2023-07-20 17:33:37',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),
 (25,'Juan Perez Cerros','reynaldoceronsosa@gmail.com',NULL,'$2y$10$VY8zzWX/48ZcefnawYaAT.hPW73xV74RzdsMd54oUf2yZA48b1KpC',NULL,NULL,'2023-07-20 16:58:03','2023-07-20 16:58:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of table `users_has_orgs`
--

DROP TABLE IF EXISTS `users_has_orgs`;
CREATE TABLE `users_has_orgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` bigint(20) unsigned NOT NULL,
  `organization_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_org_users` (`users_id`),
  KEY `fk_users_org` (`organization_id`),
  CONSTRAINT `fk_org_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_users_org` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_has_orgs`
--

/*!40000 ALTER TABLE `users_has_orgs` DISABLE KEYS */;
INSERT INTO `users_has_orgs` (`id`,`users_id`,`organization_id`) VALUES 
 (5,24,11);
/*!40000 ALTER TABLE `users_has_orgs` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
