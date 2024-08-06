-- MySQL dump 10.15  Distrib 10.0.33-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: Mercurioz_deportivas
-- ------------------------------------------------------
-- Server version	10.0.33-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary table structure for view `Torneos`
--

DROP TABLE IF EXISTS `Torneos`;
/*!50001 DROP VIEW IF EXISTS `Torneos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Torneos` (
  `idTorneoDisciplina` tinyint NOT NULL,
  `nomTorneo` tinyint NOT NULL,
  `nomDisciplina` tinyint NOT NULL,
  `nomPrueba` tinyint NOT NULL,
  `nomCategoria` tinyint NOT NULL,
  `rama` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ct_categorias`
--

DROP TABLE IF EXISTS `ct_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ct_categorias` (
  `idCategoria` smallint(6) NOT NULL AUTO_INCREMENT,
  `nomCategoria` varchar(30) NOT NULL,
  `fechaAltaCaT` datetime NOT NULL,
  `fechaModCat` datetime DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_categorias`
--

LOCK TABLES `ct_categorias` WRITE;
/*!40000 ALTER TABLE `ct_categorias` DISABLE KEYS */;
INSERT INTO `ct_categorias` VALUES (1,'Juvenil A','2023-03-06 10:21:27',NULL),(2,'Juvenil B','2023-03-06 10:21:27',NULL),(3,'Juvenil C','2023-03-06 10:21:27',NULL),(4,'Juvenil D','2023-03-06 10:21:27',NULL),(5,'Juvenil E','2023-03-06 10:21:27',NULL),(9,'Juvenil G','2023-10-11 16:42:52',NULL),(12,'Juvenil J','2024-03-11 09:52:24',NULL),(13,'Juvenil F','2024-03-11 09:52:36',NULL);
/*!40000 ALTER TABLE `ct_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_disciplinas`
--

DROP TABLE IF EXISTS `ct_disciplinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ct_disciplinas` (
  `idDisciplina` char(5) NOT NULL,
  `nomDisciplina` varchar(30) NOT NULL,
  `numMaxJugador` char(2) NOT NULL,
  `numMinJugador` char(2) NOT NULL,
  `cve_concepto_pago` char(4) DEFAULT NULL,
  `fechaAltaDisc` datetime NOT NULL,
  `fechaModDisc` datetime DEFAULT NULL,
  PRIMARY KEY (`idDisciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_disciplinas`
--

LOCK TABLES `ct_disciplinas` WRITE;
/*!40000 ALTER TABLE `ct_disciplinas` DISABLE KEYS */;
INSERT INTO `ct_disciplinas` VALUES ('1','Ajedrez','1','1','1234','2023-03-06 10:21:27','2024-04-22 11:51:29'),('10','SoftBol','15','8','2131','2024-02-22 09:39:05',NULL),('11','Lacrosse','24','12','2222','2024-03-11 10:01:57',NULL),('13','Natacion','1','1','345','2024-04-22 11:12:30',NULL),('2','Fútbol','20','11','340','2023-03-06 10:21:27','2024-04-16 12:27:44'),('3','Voleibol','20','6','341','2023-03-06 10:21:27','2024-04-16 12:27:33'),('4','Baloncesto','20','5','342','2023-03-06 10:21:27','2024-04-16 12:28:12'),('5','Fútbol rápido','20','5','343','2023-03-06 10:21:27','2024-04-16 12:28:44'),('6','Esports','10','1','4523','2023-03-06 10:21:27',NULL),('6779','Futbol Asociación','25','12','6680','2024-03-11 09:58:21',NULL),('9','Futbol Americano','36','23','3122','2024-02-22 09:38:21',NULL);
/*!40000 ALTER TABLE `ct_disciplinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_pruebas`
--

DROP TABLE IF EXISTS `ct_pruebas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ct_pruebas` (
  `idPrueba` smallint(6) NOT NULL AUTO_INCREMENT,
  `nomPrueba` varchar(30) NOT NULL,
  `fechaAltaPrue` datetime NOT NULL,
  `fechaModPrueba` datetime DEFAULT NULL,
  PRIMARY KEY (`idPrueba`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_pruebas`
--

LOCK TABLES `ct_pruebas` WRITE;
/*!40000 ALTER TABLE `ct_pruebas` DISABLE KEYS */;
INSERT INTO `ct_pruebas` VALUES (1,'Por equipos','2023-03-06 10:21:27',NULL),(2,'Única','2023-03-06 10:21:27',NULL);
/*!40000 ALTER TABLE `ct_pruebas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_torneos`
--

DROP TABLE IF EXISTS `ct_torneos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ct_torneos` (
  `idTorneo` smallint(6) NOT NULL AUTO_INCREMENT,
  `nomTorneo` varchar(30) NOT NULL,
  `eslogan` varchar(50) NOT NULL,
  `vigencia` char(1) NOT NULL,
  `fechaAltaTor` datetime NOT NULL,
  `fechaModTor` datetime DEFAULT NULL,
  PRIMARY KEY (`idTorneo`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_torneos`
--

LOCK TABLES `ct_torneos` WRITE;
/*!40000 ALTER TABLE `ct_torneos` DISABLE KEYS */;
INSERT INTO `ct_torneos` VALUES (2,'Torneos SI UNAM 2022-2022','Paso a paso y el proceso se completa ','0','2023-03-06 10:21:27','2024-05-16 11:09:22'),(3,'Torneos SI UNAM 2023-2024','Tienes que esperar cosas de ti mismo antes','1','2023-03-06 10:21:27','2024-04-16 12:15:04'),(4,'Torneos SI UNAM 2024-2025','Paso a paso y el proceso se completa ','1','2023-03-06 10:21:27',NULL),(17,'Torneos InterUnam 2024-2025 ','La perseverancia es la parte del exito','1','2024-03-11 09:47:51','2024-03-20 11:43:40'),(18,'Torneo InterUnam 2023-2024','Paso a paso y el proceso se completa','1','2024-04-22 11:06:06',NULL);
/*!40000 ALTER TABLE `ct_torneos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrenadores`
--

DROP TABLE IF EXISTS `entrenadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrenadores` (
  `correoEntrenador` varchar(60) NOT NULL,
  `nomEntrenador` varchar(60) NOT NULL,
  `primerApellido` varchar(60) NOT NULL,
  `segundoApellido` varchar(60) NOT NULL,
  `telefono` bigint(10) NOT NULL,
  `celular` bigint(10) NOT NULL,
  `fechaAltaEnt` datetime NOT NULL,
  `fechaModEnt` datetime DEFAULT NULL,
  PRIMARY KEY (`correoEntrenador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrenadores`
--

LOCK TABLES `entrenadores` WRITE;
/*!40000 ALTER TABLE `entrenadores` DISABLE KEYS */;
INSERT INTO `entrenadores` VALUES ('Andrej@correo.co','Aldo','primerApellido','segundoApellido',5584508956,5584508956,'2023-05-12 12:23:14','2023-05-19 12:15:36'),('Andrej@correo.com','ANDRE','FLORES','CASTAÑEDA',5531766216,5584508956,'2023-03-06 12:20:45','2023-08-03 13:03:53'),('Andrej@correo.es','Ana','Carrillo','Espinoza',7489564574,1232456789,'2023-05-05 10:25:32',NULL),('Andrej@example.com','mauro','garcia','nicolas',1234567899,9898989892,'2023-05-05 10:30:16',NULL),('anele25@hotmail.com','ADSFADSF','ADF','ASDF',3423243243,5556565623,'2023-06-14 10:20:57',NULL),('asd@asd.com','nombre','paterno','materno',4145788523,3241458789,'2023-04-27 10:23:41',NULL),('asdf@asdf.com','nombre','apellidos','apellidos',1231231231,1231231231,'2023-04-27 11:51:36',NULL),('Berke@correo.com','Desi','Stalf','Jacquot',2897936231,4787247298,'2023-03-06 12:20:45',NULL),('Bethanne@correo.com','Jess','Polendine','Pennetti',8914819027,9827767496,'2023-03-06 12:20:44',NULL),('Betteanne@correo.com','Deirdre','Garlee','Eckert',3698519615,7282553238,'2023-03-06 12:20:43',NULL),('Birgit@correo.com','Birch','Berryann','Deschelle',5057438522,9091416289,'2023-03-06 12:20:43',NULL),('Boycey@correo.com','Iver','Clarkin','Measor',1421953153,3849911152,'2023-03-06 12:20:45',NULL),('Bucky@correo.com','Collie','Swaffield','Chatelot',1122314159,8408748866,'2023-03-06 12:20:45',NULL),('Burr@correo.com','Kimmy','Aslott','Bengle',1647196566,9136269352,'2023-03-06 12:20:45',NULL),('Candy@correo.com','Maisey','Christiensen','Ciciari',6502801501,6137726991,'2023-03-06 12:20:44',NULL),('Carling@correo.com','Jeremie','Giacomelli','Wrefford',6575007724,2764800851,'2023-03-06 12:20:45',NULL),('Charlean@correo.com','Britt','Scohier','Tows',8034206679,7382753883,'2023-03-06 12:20:43',NULL),('Cicily@correo.com','Bevan','Pretor','Capelen',8070868988,9377002168,'2023-03-06 12:20:44',NULL),('Cilka@correo.com','Helene','Dumbarton','Kasting',87826054,5402586934,'2023-03-06 12:20:44',NULL),('Cordi@correo.com','Andris','Rubinfajn','Kineton',1171853084,8540715333,'2023-03-06 12:20:44',NULL),('Coreen@correo.com','Jordan','Pengelly','Castiglione',5222480119,8506451884,'2023-03-06 12:20:44',NULL),('correo1000@correo.com','correo1000','correo1000','correo1000',1002341232,3426457657,'2024-05-07 11:26:18',NULL),('correo1001@correo.com','sistemas1001','sistemas1001','sistemas1001',1900897887,1904556455,'2024-04-10 10:29:09',NULL),('correo1002@correo.com','correo1002','correo1002','correo1002',5435563476,8769870789,'2024-05-07 12:22:08',NULL),('correo1004@correo.com','correo1004','correo1004','correo1004',3342124542,5656563465,'2024-05-20 10:52:52',NULL),('correo100@coreo.com','prueba12','prueba12','prueba12',2342345477,6545666666,'2024-03-22 12:16:36',NULL),('correo104@correo.com','Prueba104','Prueba104','Prueba104',3244444444,7564444443,'2024-04-05 11:41:28','2024-04-05 13:42:53'),('correo105@correo.com','Prueba105','Prueba105','Prueba105',4535665664,4563454556,'2024-04-05 13:43:49','2024-04-08 10:35:54'),('correo10@correo.com','Miguel','Angel','Garcia',568347568,876435656,'2024-03-13 12:49:28','2024-03-15 10:23:38'),('correo11@correo.com','prueba11','prueba11','prueba11',5565636576,7697889769,'2024-03-12 11:48:38',NULL),('correo12@correo.com','Prueba12','Prueba12','Prueba12',1222222344,1224444444,'2024-03-12 12:22:42',NULL),('correo13@correo.com','prueba13','prueba13','prueba13',6555555544,3333333333,'2024-03-12 12:25:11',NULL),('correo14@correo.com','prueba14','prueba14','prueba14',1400000000,2333333333,'2024-03-12 12:29:54',NULL),('correo345@correo.com','correo345','correo345','correo345',5445565644,6555555555,'2024-04-12 10:16:19',NULL),('correo346@correo.com','correo346','correo346','correo346',3422342345,7656658768,'2024-04-12 10:21:33',NULL),('correo347@correo.com','correo347','correo347','correo347',7876656767,5567678789,'2024-04-12 10:29:43',NULL),('correo348@correo.com','correo348','correo348','correo348',3423535676,7867878767,'2024-04-12 10:33:46',NULL),('correo349@correo.com','correo349','correo349','correo349',4545365657,4576574667,'2024-04-12 10:38:32',NULL),('correo350@correo.com','correo350','correo350','correo350',4235767889,4557676889,'2024-04-12 10:44:42',NULL),('correo351@correo.com','correo351','correo351','correo351',3465765787,9087890970,'2024-04-12 13:00:20','2024-04-12 13:06:15'),('correo356@correo.com','correo356','correo356','correo356',3445567676,5785342454,'2024-04-12 13:58:34',NULL),('correo3@correo.com','prueba3','prueba3','prueba3',3342444444,2222222222,'2024-03-12 12:39:20',NULL),('correo4@correo.com','prueba4','prueba4','prueba4',5444444444,8988888888,'2024-03-12 12:42:32',NULL),('correo5643@correo.com','Prueba5642','Prueba5642','Prueba5676',5656353432,5456523334,'2024-04-05 11:19:19','2024-04-05 11:21:54'),('correo56@correo.com','gffffffffffd','dfdffffff','fdddddddddddd',4333333333,3222222222,'2024-03-19 11:25:24',NULL),('correo57@correo.com','Pedro','Hernandez','Palacios',234222223,324444444,'2024-03-19 11:34:06','2024-03-19 11:50:17'),('correo5@correo.com','prueba5','prueba5','prueba5',4444444444,3333333333,'2024-03-12 12:51:17',NULL),('correo60@correo.com','sdfafasdfsdfa','ddfsasddfasasdf','dfsasdfsdfsdfsdf',2341111111,7667555555,'2024-03-20 10:11:05','2024-03-20 10:17:11'),('correo6453@correo.com','Prueba6453','Prueba6453','Prueba6453',5645356567,7654766576,'2024-04-05 11:20:43',NULL),('correo65436@correo.com','correo23423','correo23423','correo23423',6356654444,5475666666,'2024-04-10 12:47:07',NULL),('correo6@correo.com','prueba6','prueba6','prueba6',9998888888,6666667888,'2024-03-12 13:06:43',NULL),('correo7@correo.com','prueba7','prueba7','prueba7',5666666666,9888888888,'2024-03-12 13:19:57','2024-03-13 11:16:25'),('correo800@correo.com','correo800','correo800','correo800',2133333333,2344444444,'2024-04-15 11:47:24',NULL),('correo8@correo.com','prueba8','prueba8','prueba8',8344444444,8122222222,'2024-03-12 11:32:03',NULL),('correo901@correo.com','correo901','correo901','correo901',7876457676,6576645577,'2024-04-17 12:34:36',NULL),('correo902@correo.com','correo902','correo902','correo902',4344567757,4564565676,'2024-04-17 12:39:46',NULL),('correo903@correo.com','correo903','correo903','correo903',4534234342,2343234234,'2024-04-17 12:45:18',NULL),('correo904@correo.com','correo904','correo904','correo904',9040495359,2347897897,'2024-04-17 12:48:31',NULL),('correo905@correo.com','correo905','correo905','correo905',3534243342,4523433442,'2024-04-17 12:58:36',NULL),('correo906@correo.com','correo906','correo906','correo906',2344535676,4545454453,'2024-04-17 13:15:03',NULL),('correo907@correo.com','correo907','correo907','correo907',4545785784,3562534561,'2024-04-18 10:36:35','2024-04-18 12:15:55'),('correo908@correo.com','correo908','correo908','correo908',4534566767,3445767676,'2024-04-18 12:06:19',NULL),('correo909@correo.com','correo909','correo909','correo909',2344546764,7645534656,'2024-04-18 12:09:16',NULL),('correo90@correo.com','prueba90','prueba90','',7766666666,5666666666,'2024-03-20 10:33:17','2024-03-20 10:39:07'),('correo911@correo.com','correo911','correo911','correo911',4545766754,5577878789,'2024-04-19 10:04:26',NULL),('correo912@correo.com','correo912','correo912','correo912',4555667677,5645454765,'2024-04-25 10:15:26',NULL),('correo913@correo.com','correo913','correo913','correo913',5678989789,5766778787,'2024-04-25 10:28:42',NULL),('correo914@correo.com','correo914','correo914','correo914',2345656456,5654555656,'2024-04-25 10:32:25',NULL),('correo915@correo.com','correo915','correo915','correo915',9152344544,4523443324,'2024-04-25 10:38:52','2024-05-03 12:22:35'),('correo916@correo.com','correo916','correo916','correo916',4767647642,2364676579,'2024-04-22 10:44:16','2024-04-22 12:55:00'),('correo917@correo.com','correo917','correo917','correo917',450650956,4545345671,'2024-04-22 12:02:39','2024-04-22 12:37:02'),('correo91@correo.com','prueba92','prueba92','prueba92',4333333333,7888888888,'2024-03-20 10:44:13',NULL),('correo95@correo.com','prueba95','prueba95','prueba95',5623234632,5666556354,'2024-03-20 12:11:25','2024-03-21 10:22:23'),('correo978@correo.com','correo978','correo978','correo978',5676575555,8978765676,'2024-04-29 10:57:15',NULL),('correo980@correo.com','gfgrgsdfsffg','paterno','materno',5584508956,7687787878,'2024-04-29 12:42:28','2024-05-03 10:38:00'),('correo998@correo.com','ÁÉÍÓÚáéíóúñÑ','paterno','materno',5587744124,5531277468,'2024-05-03 12:54:35','2024-05-03 12:59:58'),('correo9@correo.com','Prueba9','Prueba9','Prueba9',7666666666,4555555555,'2024-03-12 11:36:52',NULL),('correo@10correo.com','prueba10','prueba10','prueba10',8534234233,7678567576,'2024-03-12 11:43:18',NULL),('correo@correo.com','fulanito','Perexz','Hernandez',7777777777,6666666666,'2024-03-12 10:34:23',NULL),('correo@correo.es','miguel','cruz','garcia',1212312312,1111111111,'2023-04-27 13:01:50',NULL),('correo_998@correo.com','ÁÉÍÓÚáéíóúñÑ','paterno','materno',5587744124,5531277468,'2024-05-03 12:54:25',NULL),('Craggie@correo.com','Augustus','Shivell','Spur',2280456931,2964097240,'2023-03-06 12:20:45',NULL),('Danny@correo.com','Brigit','Batterson','O\'Loughane',1383781443,4824035864,'2023-03-06 12:20:45',NULL),('demian45@gmail.com','Demian','Fulano','Gutierrez',4557647676,6476434455,'2024-04-17 11:50:41',NULL),('demiangenero@correo.com','demian','genero','genero',4556556565,5656564564,'2024-05-13 11:13:22',NULL),('efabian2010@gmail.com','ELENA','Gonzalez','FABIAN',5556226030,5464565666,'2023-05-24 11:02:58','2024-05-03 12:12:59'),('ejemplo@ejemplo.com','MIGUEL ANGEL','CRUZ ','GARCÍA ',5584508956,5589451241,'2023-04-28 09:32:33','2023-06-08 10:14:38'),('ejemplo@ejemplo.es','miguel','cruz','garcia',5584508956,5589451241,'2023-05-02 12:42:09',NULL),('elenafabian@dgire.unam.mx','MARIA ELENA','FABIAN','VELASCO',5556226030,5556223060,'2023-05-16 10:36:44','2024-03-08 12:49:37'),('Emalee@correo.com','Addia','Gostall','Langmead',9285671586,343269457,'2023-03-06 12:20:43',NULL),('este@esun.es','arturo','castro','isidro',5543112478,4545477899,'2023-05-12 09:20:49',NULL),('este@esun.ese','nombre','apellidoprimero','segundoapellido',7897987897,8979879879,'2023-05-09 13:25:40',NULL),('example@example.com','MIGUEL','CRUZ','GARCÍA',5584508956,5584508956,'2023-07-24 11:14:58',NULL),('example@exma.com','manuel','ramirez','garcía',7894561233,4445552121,'2023-05-05 10:33:47',NULL),('Flory@correo.com','Ailey','Gottelier','Labern',8052497868,136471110,'2023-03-06 12:20:43',NULL),('Frankie@correo.com','Nedda','Babb','Wotton',84689838,4112191650,'2023-03-06 12:20:45',NULL),('Friederike@correo.com','Waly','Brake','O\' Concannon',1212511859,6178069561,'2023-03-06 12:20:45',NULL),('Georgie@correo.com','Selma','Olivas','Garmston',2564917305,1896244920,'2023-03-06 12:20:43',NULL),('Ibbie@correo.com','Deeanne','Straw','Kingshott',8743946275,9293661446,'2023-03-06 12:20:44',NULL),('Isaiah@correo.com','Darrin','O\'Breen','Crowhurst',7209535519,1166642844,'2023-03-06 12:20:45',NULL),('Janeen@correo.com','Kirsten','McDougal','Sentance',9867759389,4359022174,'2023-03-06 12:20:45',NULL),('Jannelle@correo.com','Joanie','Bellsham','Spinke',302880313,734748922,'2023-03-06 12:20:44',NULL),('javier@correo.com','Javier ','Gonzalez','Perez',4344454344,4444545445,'2024-03-07 14:02:00',NULL),('javierg@correo.com','Javier','Gonzalez','Perez',5567876867,5342223232,'2024-03-08 10:19:22',NULL),('javier_gonzalez@dgire.unam.mx','Javier','Gonzalez','Perez',5555534645,562180004,'2024-03-08 10:38:09','2024-05-07 11:24:13'),('jdemian@ciencias.unam.mx','Demian','Jimenez','Salgado',5534271503,5555070234,'2024-03-11 10:22:26','2024-04-15 11:21:08'),('jose@correo.com','jose ','Sistemas1','Sistemas1',4553223454,5578853433,'2024-04-16 11:46:14',NULL),('juan@gmail.com','JUAN','PEREZ','LOPEZ',2345645456,7835645335,'2024-02-15 09:33:52',NULL),('Kalle@correo.com','Deana','Lawrey','Rennard',1188533517,2086976127,'2023-03-06 12:20:44',NULL),('Karole@correo.com','Else','Haslen','Cancellor',2657519903,5247777395,'2023-03-06 12:20:45',NULL),('Kora@correo.com','Coop','Sansbury','Bredee',2595901249,777055732,'2023-03-06 12:20:45',NULL),('Lotti@correo.com','Marillin','De Robertis','Iacomi',7750770275,9855670345,'2023-03-06 12:20:45',NULL),('Lucila@correo.com','Hamnet','Millhouse','Hannaby',3257222939,3022425538,'2023-03-06 12:20:44',NULL),('macg.03@hotmail.com','Miguel','Cruz','Hernadez',5584505445,6567665464,'2024-05-02 11:38:40','2024-05-07 14:05:15'),('macg@hotmail.ar','Marcos','Correa','Galicia',5685855411,5688977445,'2023-05-19 12:49:22',NULL),('macg@hotmail.co','Miguel','Muñoz','Iñigo',7894567845,1122244578,'2023-05-02 12:39:19','2023-05-31 12:30:17'),('macg@hotmail.com','marco','castro','garza',7845412222,5544112233,'2023-05-09 10:53:19',NULL),('macg@hotmail.es','miguel','miguel','miguel',7894567845,1122244578,'2023-05-02 12:41:06',NULL),('Maisie@correo.com','Maire','Willett','Ivankov',4789691195,5920587970,'2023-03-06 12:20:43',NULL),('Marice@correo.com','Luce','Holligan','Issacov',762895705,8890576391,'2023-03-06 12:20:44',NULL),('Merry@correo.com','Virgie','Pesterfield','Sowle',9407322335,8054704380,'2023-03-06 12:20:44',NULL),('mhm@correo.com','FULANO','PEREZ','HERNANDEZ',2345232312,5532132342,'2023-11-07 15:08:58','2024-02-15 09:32:52'),('miancrga@gmail.com','Miguel','Cruz','Garcia',5584508956,5522147566,'2024-05-07 10:37:31',NULL),('Miguel@correo.co','Miguel ','Angel ','Cruz',5584508956,8854809620,'2023-05-03 12:30:57',NULL),('miguel@correo.com','MIGUEL','CRUZ','GARCIA',6541466225,1784318455,'2023-04-18 12:00:09','2024-04-22 11:59:17'),('miguel@hotmail.com','nombre','paterno','materno',5584553221,5699844136,'2024-05-02 14:13:04','2024-05-03 13:28:05'),('Mirella@correo.com','Shanon','Garrould','Willerstone',4426509017,2832838928,'2023-03-06 12:20:44',NULL),('Monro@correo.com','Ingrim','McGuinley','Caulier',3043555554,6406725603,'2023-03-06 12:20:44',NULL),('Morten@correo.com','Michelle','Dahlgren','Shouler',6000224044,2264761741,'2023-03-06 12:20:45',NULL),('nuevo@correo.ar','FABIAN','QUINTERO','TORRES',5584758956,5641422552,'2023-05-30 11:35:59',NULL),('nuevo@correo.com','FABIAN','QUINTERO','TORRES',5584758956,5641422552,'2023-05-30 11:25:07',NULL),('nuevo@correo.es','FABIAN','QUINTERO','TORRES',5584758956,5641422552,'2023-05-30 11:35:08',NULL),('nuevo@correo.zn','FABIAN','QUINTERO','TORRES',5584758956,5641422552,'2023-05-30 11:37:48','2024-05-03 13:06:41'),('nuevo@correo.znl','JOSHUA','ALLENDE','ORTEGA',5584758956,5641422552,'2023-05-30 11:42:08',NULL),('nuevo_correo@correo.ce','ARTURO ','MELENDEZ','GUTIERREZ',5587441125,8895542156,'2023-06-07 10:46:38',NULL),('nuevo_correo@correo.com','ARTURO ','MELENDEZ','GUTIERREZ',5587441125,8895542156,'2023-06-07 10:45:00',NULL),('Odelinda@correo.com','Ilyssa','Cahill','Palomba',4396358210,8014873432,'2023-03-06 12:20:44',NULL),('Paddy@correo.com','Orren','Duggon','Brumpton',7294704643,7501574502,'2023-03-06 12:20:44',NULL),('Phedra@correo.com','Gale','Bardnam','Southgate',6494301150,8484379833,'2023-03-06 12:20:43',NULL),('prueba2@correo.com','prueba2','prueba2','prueba2',7676676756,5588987878,'2024-03-08 10:51:41',NULL),('prueba3@correo.com','prueba3','prueba3','prueba3',5676577676,5578983232,'2024-03-08 11:08:47',NULL),('prueba5@correo.com','prueba5','prueba5','prueba5',7777777777,7454444444,'2024-03-12 11:17:55',NULL),('prueba7@correo.com','Prueba7','Prueba7','Prueba7',2222222222,1111111111,'2024-03-12 11:19:21',NULL),('prueba@gmail.com','prueba','prueba','prueba',5512345687,5522752157,'2024-03-08 10:45:37',NULL),('prueba@prueba.com','prueb','prueba','prueba',1515664645,4564545645,'2024-04-12 13:52:57',NULL),('sdadasad@gmail.ccom','FULANIOTO','PERENFANITO','EQUIS',3322341235,5564354334,'2023-10-16 14:42:37',NULL),('sistemas1@correo.com','sistemas','dgire','dgire',4324324354,5425545454,'2024-04-04 10:48:15','2024-04-29 10:11:35'),('sistemas@correo.com','Sistemas5','Sistemas5','Sistemas5',4545676767,6578343355,'2024-04-15 09:48:05',NULL),('sistemas@dgire.unam.mm','ARTURO','ARTURO','ARTURO',7897897897,9879879879,'2023-07-27 10:30:54',NULL),('sistemas@dgire.unam.mr','ARTURO','ARTURO','ARTURO',7897897897,9879879879,'2023-07-27 10:35:34',NULL),('sistemas@dgire.unam.mx','MA. ELENA','FABIÁNxxxxx','VELASCO AAAAAAAAAAAA',5522689898,5522689747,'2023-04-18 12:08:56','2024-05-03 12:26:24'),('sistemas@dgire.unam.rr','ARTURO','ARTURO','ARTURO',7897897897,9879879879,'2023-07-27 10:28:52',NULL),('Tailor@correo.com','Curran','Gherardi','Whetnall',6682888139,6553158282,'2023-03-06 12:20:45',NULL),('Tedi@correo.com','Sarina','Penhaleurack','Sidaway',4156422704,3160854639,'2023-03-06 12:20:44',NULL),('Tracy@correo.com','Elisha','Verna','Scaplehorn',4970448221,7123909313,'2023-03-06 12:20:44',NULL),('uncorreo@correo.ces','miguek','angek','cruk',5587744554,5688744125,'2023-05-22 12:08:35',NULL),('uncorreo@correo.co','Joel','Galicia','Zepeda',1234578745,1245787412,'2023-05-02 12:30:41',NULL),('uncorreo@correo.com','Joel','Galicia','Zepeda',1234578745,1245787412,'2023-04-14 12:43:26','2024-04-02 13:05:09'),('Ursulina@correo.com','Annis','Stithe','Dudill',5924645916,6805876982,'2023-03-06 12:20:44',NULL),('Vanny@correo.com','Brandice','Edgar','Viveash',8843099930,2315558905,'2023-03-06 12:20:45',NULL),('Waldo@correo.com','Sibyl','Trehearn','Swindley',2345427027,7960882150,'2023-03-06 12:20:45',NULL),('Wilfred@correo.com','Whitby','Pedroli','Enderwick',6216085689,5567394942,'2023-03-06 12:20:43',NULL),('Xylina@correo.com','Bidget','MacCrossan','Marklow',5033057006,1243778458,'2023-03-06 12:20:44',NULL),('Zared@correo.com','Hilly','Wetherburn','Braga',720337429,2612529705,'2023-03-06 12:20:45',NULL),('Zorine@correo.com','Viki','Simpkins','Mangeot',2574365194,756256585,'2023-03-06 12:20:45',NULL);
/*!40000 ALTER TABLE `entrenadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `folios_pago`
--

DROP TABLE IF EXISTS `folios_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `folios_pago` (
  `idFolioPago` int(10) NOT NULL,
  `num_folio` varchar(10) NOT NULL,
  PRIMARY KEY (`idFolioPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `folios_pago`
--

LOCK TABLES `folios_pago` WRITE;
/*!40000 ALTER TABLE `folios_pago` DISABLE KEYS */;
INSERT INTO `folios_pago` VALUES (1,'12345'),(2,'54321'),(3,'11111'),(4,'10000');
/*!40000 ALTER TABLE `folios_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscripciones`
--

DROP TABLE IF EXISTS `inscripciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscripciones` (
  `idInscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `correoEntrenador` varchar(60) NOT NULL,
  `idTorneoDisciplina` int(11) NOT NULL,
  `num_participantes` tinyint(4) NOT NULL,
  `ptl_ptl` char(4) NOT NULL,
  `sede` char(2) NOT NULL,
  `horario` varchar(100) DEFAULT NULL,
  `idFolioPago` bigint(12) DEFAULT NULL,
  `estatusInscripcion` char(1) NOT NULL DEFAULT '1',
  `fechaAltaInsc` datetime NOT NULL,
  `fechaModInsc` datetime DEFAULT NULL,
  PRIMARY KEY (`idInscripcion`),
  KEY `idx_ins_ent_fk` (`correoEntrenador`),
  KEY `idx_ins_dat_tor_fk` (`idTorneoDisciplina`),
  CONSTRAINT `fk_ins_dat_tor` FOREIGN KEY (`idTorneoDisciplina`) REFERENCES `torneos_disciplinas` (`idTorneoDisciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ins_ent` FOREIGN KEY (`correoEntrenador`) REFERENCES `entrenadores` (`correoEntrenador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=298 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscripciones`
--

LOCK TABLES `inscripciones` WRITE;
/*!40000 ALTER TABLE `inscripciones` DISABLE KEYS */;
INSERT INTO `inscripciones` VALUES (33,'Andrej@correo.com',3,20,'1166','0',NULL,7946,'0','2023-03-10 10:35:52','2024-04-01 09:33:14'),(45,'sistemas@dgire.unam.mx',3,5,'1006','0',NULL,12345,'1','2023-04-27 12:48:20','2024-04-01 12:37:39'),(59,'uncorreo@correo.com',7,10,'7942','0',NULL,54321,'1','2023-05-04 10:47:23',NULL),(63,'Andrej@correo.com',9,3,'7946','0',NULL,111,'1','2023-05-08 11:06:44',NULL),(64,'ejemplo@ejemplo.com',3,20,'8901','0',NULL,11111,'0','2023-05-08 13:00:57','2024-04-01 09:33:22'),(70,'este@esun.ese',9,1,'7946','0',NULL,11111,'0','2023-05-09 13:25:40','2024-04-02 12:37:43'),(76,'miguel@correo.com',4,8,'7946','0',NULL,12345,'1','2023-05-12 13:28:12','2024-04-02 12:50:46'),(79,'Andrej@correo.com',3,5,'7946','0',NULL,11111,'0','2023-05-16 09:56:20','2024-04-01 09:38:45'),(80,'Andrej@correo.com',3,5,'7942','0',NULL,11111,'1','2023-05-16 10:13:29',NULL),(81,'elenafabian@dgire.unam.mx',4,5,'8727','0',NULL,12345,'1','2023-05-16 10:36:44',NULL),(82,'sistemas@dgire.unam.mx',3,5,'8727','0',NULL,12345,'1','2023-05-16 10:50:58',NULL),(83,'macg@hotmail.ar',9,1,'7942','0',NULL,12345,'1','2023-05-19 12:49:22','2024-04-01 11:04:45'),(84,'macg@hotmail.ar',10,7,'7942','0',NULL,12345,'0','2023-05-19 12:51:30','2024-04-01 09:35:23'),(85,'uncorreo@correo.com',3,5,'7946','0',NULL,11111,'0','2023-05-22 12:06:06','2024-04-01 09:35:32'),(86,'uncorreo@correo.ces',3,20,'7946','0',NULL,11111,'1','2023-05-22 12:08:35',NULL),(87,'efabian2010@gmail.com',3,5,'8727','0',NULL,12345,'0','2023-05-24 11:02:58','2024-04-01 09:35:44'),(88,'nuevo@correo.com',3,19,'8752','1','Esto es una prueba',11111,'1','2023-05-30 11:25:07',NULL),(89,'nuevo@correo.es',3,19,'8752','1','Esto es una prueba',11111,'1','2023-05-30 11:35:08',NULL),(90,'nuevo@correo.ar',3,19,'8752','0','',11111,'0','2023-05-30 11:35:59','2024-04-01 09:36:07'),(91,'nuevo@correo.zn',3,19,'8752','0','',11111,'1','2023-05-30 11:37:48',NULL),(92,'nuevo@correo.znl',3,19,'8752','0','NULL',11111,'1','2023-05-30 11:42:08',NULL),(93,'macg@hotmail.co',3,5,'8752','0','NULL',11111,'0','2023-05-31 12:30:31','2024-04-01 09:36:16'),(95,'nuevo_correo@correo.ce',8,1,'7942','0','NULL',54321,'1','2023-06-07 10:46:59','2024-04-03 09:56:28'),(96,'Andrej@correo.com',6,5,'7946','0','NULL',11111,'0','2023-06-13 10:42:50','2024-04-01 09:36:45'),(97,'anele25@hotmail.com',4,13,'8752','1','ghjgdhjfhgj\nfdsdfg',12345,'0','2023-06-14 10:20:57','2024-04-01 09:36:56'),(98,'miguel@correo.com',4,13,'7943','0','NULL',12345,'1','2023-06-14 10:41:02',NULL),(99,'Andrej@correo.com',12,13,'7946','0','NULL',11111,'1','2023-06-27 11:12:26',NULL),(100,'Andrej@correo.com',9,1,'7946','1','',11111,'0','2023-06-27 11:33:16','2024-04-01 09:36:33'),(101,'example@example.com',5,1,'7956','0','NULL',54321,'1','2023-07-24 11:14:58',NULL),(102,'sistemas@dgire.unam.mx',3,5,'1009','0','NULL',12345,'1','2023-07-26 13:15:01',NULL),(103,'sistemas@dgire.unam.mx',4,5,'1009','0','NULL',12345,'1','2023-07-26 13:15:45',NULL),(106,'sistemas@dgire.unam.rr',3,5,'7946','0','NULL',12345,'1','2023-07-27 10:28:53',NULL),(107,'sistemas@dgire.unam.mm',3,5,'7946','0','NULL',12345,'1','2023-07-27 10:30:55',NULL),(108,'sistemas@dgire.unam.mm',9,1,'1009','0','NULL',11111,'1','2023-07-27 10:35:22',NULL),(110,'sistemas@dgire.unam.mx',3,5,'7946','0','NULL',11111,'1','2023-07-27 11:27:16',NULL),(111,'sistemas@dgire.unam.mm',5,1,'7943','0','NULL',11111,'1','2023-07-27 12:12:01',NULL),(112,'sdadasad@gmail.ccom',8,2,'1006','1','',12345,'1','2023-10-16 14:42:37',NULL),(113,'sdadasad@gmail.ccom',3,10,'1006','1','',12345,'0','2023-10-16 16:07:01','2024-04-01 09:37:14'),(114,'mhm@correo.com',9,1,'1006','0','NULL',11111,'1','2023-11-07 15:08:58',NULL),(116,'mhm@correo.com',1,18,'1006','0','NULL',11111,'0','2023-11-24 14:29:55','2024-04-01 09:37:31'),(117,'mhm@correo.com',5,3,'1006','0','NULL',11111,'0','2023-11-27 16:03:57','2024-04-01 09:37:41'),(118,'mhm@correo.com',7,8,'1006','0','NULL',11111,'0','2023-11-28 14:39:19','2024-04-01 10:51:07'),(119,'juan@gmail.com',5,10,'1006','0','NULL',11111,'1','2024-02-15 09:33:52',NULL),(121,'javier_gonzalez@dgire.unam.mx',3,15,'1006','No',NULL,11111,'1','2024-03-08 10:38:13',NULL),(123,'prueba2@correo.com',9,1,'1045','No',NULL,10000,'1','2024-03-08 10:51:44',NULL),(124,'prueba3@correo.com',9,15,'1251','No',NULL,11111,'1','2024-03-08 11:08:49',NULL),(126,'javier_gonzalez@dgire.unam.mx',9,1,'0002','No',NULL,11111,'1','2024-03-08 12:46:24',NULL),(127,'elenafabian@dgire.unam.mx',3,13,'0002','No',NULL,11111,'1','2024-03-08 12:49:38',NULL),(128,'javier_gonzalez@dgire.unam.mx',9,1,'0002','No',NULL,11111,'1','2024-03-08 13:07:45',NULL),(142,'correo3@correo.com',3,1,'0032','No',NULL,11111,'1','2024-03-12 12:39:21',NULL),(145,'correo4@correo.com',1,1,'0032','No',NULL,11111,'1','2024-03-12 12:48:30',NULL),(146,'correo5@correo.com',1,1,'1006','No',NULL,11111,'1','2024-03-12 12:51:18',NULL),(149,'correo6@correo.com',1,1,'0002','No',NULL,11111,'1','2024-03-13 10:44:19',NULL),(150,'correo7@correo.com',1,13,'1006','No',NULL,54321,'1','2024-03-13 10:52:51',NULL),(151,'correo7@correo.com',1,20,'1108','No',NULL,10000,'1','2024-03-13 11:16:27',NULL),(152,'correo10@correo.com',3,10,'1159','No',NULL,11111,'1','2024-03-13 12:49:29',NULL),(153,'javier_gonzalez@dgire.unam.mx',1,25,'1006','No',NULL,11111,'0','2024-03-14 09:53:27','2024-03-22 12:08:20'),(154,'javier_gonzalez@dgire.unam.mx',9,12,'8991','No',NULL,11111,'0','2024-03-15 10:01:01','2024-03-22 12:08:00'),(155,'correo10@correo.com',1,20,'6838','No',NULL,11111,'1','2024-03-15 10:23:39',NULL),(156,'jdemian@ciencias.unam.mx',9,12,'1164','No',NULL,10000,'0','2024-03-15 12:36:03','2024-04-02 09:49:15'),(161,'correo56@correo.com',9,1,'1111','No',NULL,11111,'1','2024-03-19 11:25:24',NULL),(168,'correo57@correo.com',9,1,'1111','No',NULL,11111,'1','2024-03-19 11:34:06',NULL),(169,'correo57@correo.com',1,1,'1111','No',NULL,11111,'1','2024-03-19 11:35:40',NULL),(170,'correo57@correo.com',3,1,'1267','No',NULL,11111,'1','2024-03-19 11:50:20',NULL),(186,'correo60@correo.com',9,1,'1111','No',NULL,11111,'1','2024-03-20 10:11:05',NULL),(187,'correo60@correo.com',9,1,'1111','No',NULL,11111,'1','2024-03-20 10:17:15',NULL),(190,'correo90@correo.com',1,1,'1111','No',NULL,11111,'1','2024-03-20 10:33:17',NULL),(191,'correo90@correo.com',1,1,'1111','No',NULL,11111,'0','2024-03-20 10:39:07','2024-03-22 12:07:27'),(192,'correo91@correo.com',1,20,'1237','No',NULL,11111,'0','2024-03-20 10:44:13','2024-03-22 12:07:04'),(193,'sistemas@dgire.unam.mx',3,2,'1009','No',NULL,11111,'1','2024-03-20 11:04:43','2024-03-22 13:33:27'),(194,'correo95@correo.com',9,1,'1111','No',NULL,11111,'0','2024-03-20 12:11:25','2024-03-22 12:13:12'),(195,'correo95@correo.com',9,1,'1111','No',NULL,11111,'0','2024-03-21 10:22:24','2024-03-22 12:12:58'),(196,'correo100@coreo.com',26,18,'1008','No',NULL,11111,'0','2024-03-22 12:16:36',NULL),(197,'uncorreo@correo.com',9,1,'1008','No',NULL,11111,'0','2024-04-02 13:05:09',NULL),(198,'sistemas1@correo.com',3,1,'1006','No',NULL,11111,'1','2024-04-04 10:48:15',NULL),(199,'sistemas@dgire.unam.mx',26,3,'1009','No',NULL,22222,'1','2024-04-04 11:01:39','2024-04-04 11:33:15'),(200,'sistemas@dgire.unam.mx',9,1,'1006','No',NULL,11111,'1','2024-04-04 13:09:19',NULL),(201,'correo5643@correo.com',3,2,'1111','No',NULL,11111,'0','2024-04-05 11:19:19',NULL),(202,'correo6453@correo.com',3,1,'1006','No',NULL,11111,'0','2024-04-05 11:20:43',NULL),(203,'correo5643@correo.com',3,1,'1111','No',NULL,11111,'0','2024-04-05 11:21:55',NULL),(211,'correo104@correo.com',9,1,'1111','No',NULL,11111,'0','2024-04-05 12:41:25',NULL),(222,'correo104@correo.com',28,11,'1111','No',NULL,11111,'0','2024-04-05 13:42:54',NULL),(223,'correo105@correo.com',8,1,'1008','No',NULL,11111,'0','2024-04-05 13:43:49',NULL),(224,'correo105@correo.com',8,1,'1006','No',NULL,11111,'0','2024-04-08 10:35:55',NULL),(225,'jdemian@ciencias.unam.mx',26,24,'1006','No',NULL,11111,'0','2024-04-09 09:46:35',NULL),(226,'correo1001@correo.com',9,1,'1111','No',NULL,54321,'0','2024-04-10 10:29:10',NULL),(227,'sistemas@dgire.unam.mx',3,5,'1006','No',NULL,11111,'1','2024-04-10 12:21:13',NULL),(228,'correo65436@correo.com',3,5,'1006','No',NULL,11111,'0','2024-04-10 12:47:07',NULL),(229,'correo345@correo.com',8,1,'1111','No',NULL,11111,'0','2024-04-12 10:16:19',NULL),(230,'correo346@correo.com',9,1,'1111','No',NULL,11111,'0','2024-04-12 10:21:33',NULL),(231,'correo347@correo.com',8,1,'1111','Sí',NULL,11111,'0','2024-04-12 10:29:43',NULL),(232,'correo348@correo.com',8,1,'1008','Sí',NULL,11111,'0','2024-04-12 10:33:46',NULL),(233,'correo349@correo.com',9,1,'1008','Sí',NULL,11111,'0','2024-04-12 10:38:33',NULL),(234,'correo350@correo.com',10,1,'1111','Sí','sistemas',12345,'0','2024-04-12 10:44:43',NULL),(235,'sistemas@dgire.unam.mx',28,11,'1111','Sí','de 1pm a 5pm viernes',11111,'0','2024-04-12 11:24:01',NULL),(236,'jdemian@ciencias.unam.mx',28,15,'1111','Sí','',54321,'0','2024-04-12 11:37:06',NULL),(237,'correo351@correo.com',4,5,'1111','Sí','',11111,'0','2024-04-12 13:06:15',NULL),(238,'correo356@correo.com',3,5,'1111','Sí','',20200205009,'0','2024-04-12 13:58:34',NULL),(239,'sistemas@correo.com',26,23,'1006','Sí','',20200809554,'0','2024-04-15 09:48:05',NULL),(240,'jdemian@ciencias.unam.mx',3,5,'1111','Sí','sdfasdfafasdfsdfa',20200101917,'0','2024-04-15 11:21:08',NULL),(242,'correo800@correo.com',3,5,'1111','Sí','',20200205535,'0','2024-04-15 11:47:24',NULL),(243,'jose@correo.com',3,5,'1329','Sí','SDVSDFSDFDFSDF',20200306757,'0','2024-04-16 11:46:15',NULL),(244,'demian45@gmail.com',26,23,'6852','Sí','ghghgfdhdgh',20200102760,'0','2024-04-17 11:50:41',NULL),(245,'correo901@correo.com',31,6,'6852','Sí','',20200102758,'0','2024-04-17 12:34:37',NULL),(246,'correo902@correo.com',1,11,'6852','Sí','',20200102758,'0','2024-04-17 12:39:48',NULL),(247,'correo903@correo.com',31,5,'2236','1','',20200102758,'0','2024-04-17 12:45:18',NULL),(249,'correo905@correo.com',7,2,'2354','Si','',20200100519,'0','2024-04-17 12:58:37',NULL),(250,'correo906@correo.com',7,2,'2354','Si','',20200100519,'0','2024-04-17 13:15:03',NULL),(258,'correo907@correo.com',28,12,'1247','No','',20200100519,'0','2024-04-18 12:15:57',NULL),(259,'correo911@correo.com',32,5,'1272','No','',20200102758,'1','2024-04-19 10:04:26','2024-04-19 10:22:42'),(260,'correo916@correo.com',31,5,'1279','No','',20200100908,'0','2024-04-22 10:44:16',NULL),(261,'miguel@correo.com',33,5,'8852','on','',20200100519,'0','2024-04-22 11:59:17',NULL),(262,'correo917@correo.com',7,1,'6916','No','',20200100519,'0','2024-04-22 12:02:40',NULL),(268,'correo913@correo.com',31,5,'5710','No','',20200101648,'0','2024-04-25 10:28:42',NULL),(269,'correo914@correo.com',32,6,'5786','No','',20200101648,'0','2024-04-25 10:32:25',NULL),(270,'correo915@correo.com',32,5,'5788','No','',20200101648,'0','2024-04-25 10:38:52',NULL),(271,'sistemas1@correo.com',12,1,'1006','Si','si',20200102919,'1','2024-04-29 10:11:35',NULL),(272,'sistemas@dgire.unam.mx',26,1,'1006','No','',20200102759,'0','2024-04-29 10:23:22',NULL),(273,'correo978@correo.com',3,5,'1243','No','',20200102761,'1','2024-04-29 10:57:16','2024-05-07 10:09:07'),(274,'correo980@correo.com',28,11,'0042','No','',20200100519,'0','2024-04-29 12:42:29',NULL),(276,'macg.03@hotmail.com',33,1,'1072','Si','Jueves 10 de mayo de 11am a 5pm',20200103436,'1','2024-05-02 11:38:40',NULL),(278,'correo980@correo.com',26,3,'1337','No','',20200103436,'0','2024-05-02 11:44:00',NULL),(279,'correo980@correo.com',33,5,'3049','No','',20200100519,'0','2024-05-03 10:38:00',NULL),(280,'javier_gonzalez@dgire.unam.mx',8,1,'6727','No','',20200102762,'0','2024-05-03 10:42:58',NULL),(281,'macg.03@hotmail.com',7,1,'1265','No','',20200101681,'0','2024-05-03 12:08:13',NULL),(282,'efabian2010@gmail.com',8,1,'6724','No','',20200101681,'0','2024-05-03 12:13:00',NULL),(283,'macg.03@hotmail.com',3,6,'6779','No','',20200100908,'0','2024-05-03 12:16:30',NULL),(284,'correo915@correo.com',4,5,'6779','No','',20200100908,'0','2024-05-03 12:22:35',NULL),(286,'correo998@correo.com',6,5,'1102','No','',20200101681,'1','2024-05-03 12:59:59','2024-05-06 12:48:36'),(287,'nuevo@correo.zn',8,1,'6782','No','',20200101681,'0','2024-05-03 13:06:41',NULL),(288,'miguel@hotmail.com',1,10,'1191','No','',20200101681,'1','2024-05-03 13:28:05',NULL),(289,'macg.03@hotmail.com',1,19,'1191','No','',20200101681,'1','2024-05-06 17:13:22','2024-05-07 10:06:38'),(290,'miancrga@gmail.com',1,11,'1006','No','',20200100519,'1','2024-05-07 10:37:31',NULL),(291,'javier_gonzalez@dgire.unam.mx',33,5,'1006','No','',20200101681,'0','2024-05-07 11:24:13',NULL),(292,'correo1000@correo.com',33,5,'1006','No','',20200101681,'0','2024-05-07 11:26:19',NULL),(294,'correo1002@correo.com',8,1,'1008','No','',20200101681,'1','2024-05-07 12:22:08','2024-05-07 12:38:00'),(295,'macg.03@hotmail.com',1,11,'1006','Si','jkshakjahdkjahskhdkasjhkdhaskhdkashkhaskhdkashkdhakhdkashkhskajhdkashkhkdhkasjhd kahd khkdh kas',20200101681,'1','2024-05-07 14:05:15',NULL),(296,'demiangenero@correo.com',1,11,'1006','No','',20200100519,'0','2024-05-13 11:13:22',NULL),(297,'correo1004@correo.com',32,5,'1006','Si','sdasdasadsdaasd',20200100519,'0','2024-05-20 10:52:52',NULL);
/*!40000 ALTER TABLE `inscripciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jugadores`
--

DROP TABLE IF EXISTS `jugadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jugadores` (
  `idJugador` int(11) NOT NULL AUTO_INCREMENT,
  `idInscripcion` int(11) NOT NULL,
  `a_exp` char(9) NOT NULL,
  `fechaAltaJug` datetime NOT NULL,
  `fechaModJug` datetime DEFAULT NULL,
  PRIMARY KEY (`idJugador`),
  KEY `idx_jug_ins_fk` (`idInscripcion`),
  CONSTRAINT `fk_jug_ins` FOREIGN KEY (`idInscripcion`) REFERENCES `inscripciones` (`idInscripcion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=350 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jugadores`
--

LOCK TABLES `jugadores` WRITE;
/*!40000 ALTER TABLE `jugadores` DISABLE KEYS */;
INSERT INTO `jugadores` VALUES (1,33,'12','2023-03-14 18:09:18',NULL),(2,33,'1','2023-03-14 12:23:10',NULL),(3,33,'9','2023-03-28 10:26:43',NULL),(4,33,'9','2023-03-28 10:27:05',NULL),(62,59,'308527319','2023-05-04 11:50:49',NULL),(64,59,'319558906','2023-05-04 11:54:23',NULL),(65,59,'313542934','2023-05-05 11:20:07',NULL),(66,59,'317554263','2023-05-11 12:19:58',NULL),(68,81,'422523262','2023-05-16 10:42:14',NULL),(69,81,'422528731','2023-05-16 10:42:36',NULL),(70,81,'421502644','2023-05-16 10:42:43',NULL),(71,81,'422515139','2023-05-16 10:42:50',NULL),(72,81,'421522183','2023-05-16 10:44:37',NULL),(73,81,'421507120','2023-05-16 10:45:07',NULL),(75,79,'315558485','2023-05-19 11:58:11',NULL),(76,79,'322870116','2023-05-19 11:58:59',NULL),(77,79,'312559036','2023-05-19 11:59:11',NULL),(79,79,'318557487','2023-05-19 12:26:27',NULL),(82,84,'317560835','2023-05-19 13:00:27',NULL),(83,84,'319573691','2023-05-19 13:00:35',NULL),(84,84,'319565379','2023-05-19 13:00:43',NULL),(85,84,'319565386','2023-05-19 13:00:50',NULL),(86,84,'314537898','2023-05-19 13:00:57',NULL),(87,84,'316545738','2023-05-19 13:01:11',NULL),(88,79,'320550254','2023-05-22 10:58:23',NULL),(90,79,'315721467','2023-05-22 11:56:06',NULL),(91,93,'420512369','2023-05-31 12:32:12',NULL),(92,93,'422505916','2023-05-31 12:32:21',NULL),(93,93,'420512280','2023-05-31 12:32:31',NULL),(94,93,'422508333','2023-05-31 12:32:40',NULL),(95,93,'421510399','2023-05-31 12:32:49',NULL),(125,97,'421513747','2023-06-14 10:25:32',NULL),(126,97,'419519014','2023-06-14 10:25:41',NULL),(127,97,'422508443','2023-06-14 10:26:57',NULL),(128,97,'419519021','2023-06-14 10:27:10',NULL),(135,100,'322870116','2023-06-27 12:33:00',NULL),(144,151,'926640089','2024-03-13 12:18:25',NULL),(145,151,'300629361','2024-03-13 12:19:58',NULL),(146,128,'965000011','2024-03-13 12:58:12',NULL),(147,128,'001821796','2024-03-13 12:59:03',NULL),(149,153,'319700655','2024-03-14 09:55:13',NULL),(150,97,'406526027','2024-03-14 12:48:57',NULL),(151,97,'878016703','2024-03-14 12:49:30',NULL),(154,155,'302793033','2024-03-15 10:25:19',NULL),(155,155,'946257379','2024-03-15 10:25:45',NULL),(167,169,'986112005','2024-03-19 11:38:19',NULL),(168,193,'828027571','2024-03-20 11:05:58',NULL),(170,193,'320702549','2024-03-20 11:07:06',NULL),(171,193,'320703182','2024-03-20 11:07:29',NULL),(172,193,'837019806','2024-03-20 13:22:05',NULL),(175,119,'976035682','2024-03-20 14:00:18',NULL),(176,119,'307623652','2024-03-20 14:00:32',NULL),(177,119,'301546630','2024-03-20 14:17:20',NULL),(178,154,'419541079','2024-03-22 09:56:22',NULL),(179,45,'322562666','2024-04-01 10:00:09',NULL),(180,45,'319512627','2024-04-01 10:04:00',NULL),(181,45,'323566911','2024-04-01 10:04:27',NULL),(182,45,'305550499','2024-04-01 10:05:18',NULL),(183,45,'321606804','2024-04-01 10:05:53',NULL),(184,45,'916058106','2024-04-01 10:06:18',NULL),(185,45,'300541333','2024-04-01 10:20:29',NULL),(186,45,'986043341','2024-04-01 10:21:00',NULL),(187,45,'309592349','2024-04-01 10:21:22',NULL),(188,45,'315517462','2024-04-01 10:21:38',NULL),(189,45,'856003541','2024-04-01 10:21:58',NULL),(190,45,'986043358','2024-04-01 10:22:18',NULL),(191,83,'311530285','2024-04-01 11:06:00',NULL),(192,64,'414537190','2024-04-01 12:45:00',NULL),(193,64,'406529592','2024-04-01 12:45:17',NULL),(195,156,'896204502','2024-04-02 11:42:01',NULL),(205,70,'322524888','2024-04-02 12:38:06',NULL),(206,76,'317538234','2024-04-02 12:43:17',NULL),(207,76,'315558502','2024-04-02 12:43:38',NULL),(208,76,'314507569','2024-04-02 12:44:06',NULL),(209,76,'314507576','2024-04-02 12:44:45',NULL),(210,76,'320534380','2024-04-02 12:45:07',NULL),(211,76,'315558519','2024-04-02 12:45:52',NULL),(212,76,'322527559','2024-04-02 12:46:05',NULL),(214,76,'321680239','2024-04-02 12:46:41',NULL),(215,197,'300632145','2024-04-02 13:06:24',NULL),(216,95,'313542941','2024-04-03 09:57:45',NULL),(220,198,'322562666','2024-04-04 11:51:14',NULL),(222,199,'837019806','2024-04-05 10:03:31',NULL),(223,200,'318530808','2024-04-05 10:06:13',NULL),(229,227,'322562666','2024-04-10 12:25:43',NULL),(230,227,'307623614','2024-04-10 12:25:58',NULL),(231,227,'856003534','2024-04-10 12:27:34',NULL),(232,227,'318530798','2024-04-10 12:28:43',NULL),(233,227,'846010357','2024-04-10 12:28:54',NULL),(234,228,'311539288','2024-04-10 12:48:13',NULL),(235,228,'966037964','2024-04-10 12:48:48',NULL),(236,228,'316576198','2024-04-10 12:50:14',NULL),(237,228,'323566911','2024-04-10 12:50:32',NULL),(239,228,'309592318','2024-04-10 13:13:15',NULL),(250,242,'302619340','2024-04-15 12:16:05',NULL),(251,242,'303628497','2024-04-15 12:16:34',NULL),(252,242,'986112256','2024-04-15 12:17:03',NULL),(253,242,'303628521','2024-04-15 12:22:27',NULL),(262,243,'309735030','2024-04-16 11:52:24',NULL),(263,243,'316538822','2024-04-16 11:52:39',NULL),(264,243,'319653386','2024-04-16 11:53:19',NULL),(265,244,'324625448','2024-04-17 12:03:10',NULL),(266,244,'324625431','2024-04-17 12:07:06',NULL),(267,259,'856343939','2024-04-19 10:06:53',NULL),(268,259,'886268862','2024-04-19 10:07:24',NULL),(269,259,'864905130','2024-04-19 10:08:48',NULL),(270,259,'876398469','2024-04-19 10:11:45',NULL),(271,259,'837081708','2024-04-19 10:14:12',NULL),(272,260,'926229057','2024-04-22 10:51:21',NULL),(273,271,'322562666','2024-04-29 10:15:25',NULL),(274,273,'936215486','2024-04-29 11:13:25',NULL),(275,273,'926671236','2024-04-29 11:13:43',NULL),(276,273,'936663959','2024-04-29 11:17:33',NULL),(277,273,'896277607','2024-04-29 11:18:02',NULL),(279,276,'936116950','2024-05-02 12:59:38',NULL),(280,286,'309727660','2024-05-03 13:07:35',NULL),(283,288,'323638047','2024-05-03 13:39:36',NULL),(284,288,'324652068','2024-05-03 13:39:45',NULL),(285,288,'323637734','2024-05-03 13:39:51',NULL),(287,288,'323650212','2024-05-03 13:40:16',NULL),(288,288,'323638078','2024-05-03 13:40:38',NULL),(290,288,'324658905','2024-05-03 13:40:56',NULL),(291,288,'323650690','2024-05-03 13:42:34',NULL),(292,286,'916162616','2024-05-06 12:20:18',NULL),(293,286,'304628562','2024-05-06 12:20:45',NULL),(294,286,'916008620','2024-05-06 12:21:06',NULL),(297,286,'946116191','2024-05-06 12:48:59',NULL),(298,289,'323637727','2024-05-06 17:28:01',NULL),(299,289,'323638047','2024-05-06 17:28:09',NULL),(300,289,'323650061','2024-05-06 17:28:45',NULL),(302,289,'323650085','2024-05-07 10:25:55',NULL),(303,289,'322595776','2024-05-07 10:26:17',NULL),(304,289,'323650078','2024-05-07 10:26:32',NULL),(305,289,'322594896','2024-05-07 10:26:47',NULL),(306,289,'322594913','2024-05-07 10:27:34',NULL),(307,289,'324659270','2024-05-07 10:27:45',NULL),(308,289,'324658792','2024-05-07 10:28:00',NULL),(309,289,'324652068','2024-05-07 10:28:08',NULL),(310,289,'324654316','2024-05-07 10:28:23',NULL),(311,289,'323650140','2024-05-07 10:28:30',NULL),(312,289,'324658833','2024-05-07 10:28:37',NULL),(313,289,'324655007','2024-05-07 10:28:46',NULL),(314,289,'322594906','2024-05-07 10:28:52',NULL),(315,289,'323637734','2024-05-07 10:29:00',NULL),(316,289,'324655430','2024-05-07 10:29:06',NULL),(317,289,'323650092','2024-05-07 10:29:14',NULL),(318,290,'322562666','2024-05-07 10:39:13',NULL),(319,290,'323567145','2024-05-07 10:39:42',NULL),(321,290,'323566911','2024-05-07 10:40:20',NULL),(322,290,'324553020','2024-05-07 10:40:25',NULL),(323,290,'323567224','2024-05-07 10:40:31',NULL),(324,290,'323567152','2024-05-07 10:40:40',NULL),(325,290,'322563230','2024-05-07 10:40:46',NULL),(326,290,'323567073','2024-05-07 10:40:52',NULL),(327,290,'324552944','2024-05-07 10:41:00',NULL),(328,290,'323566959','2024-05-07 10:41:09',NULL),(329,290,'324552762','2024-05-07 10:41:31',NULL),(330,292,'846008817','2024-05-07 11:34:19',NULL),(331,292,'324553020','2024-05-07 11:35:52',NULL),(332,292,'309592332','2024-05-07 11:36:22',NULL),(333,292,'318530853','2024-05-07 11:36:36',NULL),(337,294,'317524965','2024-05-07 12:38:23',NULL),(338,273,'906261437','2024-05-07 13:12:06',NULL),(339,295,'322562666','2024-05-07 14:07:17',NULL),(340,295,'323567145','2024-05-07 14:08:01',NULL),(341,295,'324552841','2024-05-07 14:08:27',NULL),(342,295,'323566911','2024-05-07 14:08:41',NULL),(343,295,'324553044','2024-05-07 14:08:47',NULL),(344,295,'324553020','2024-05-07 14:08:53',NULL),(345,295,'323567224','2024-05-07 14:08:59',NULL),(346,295,'323567152','2024-05-07 14:09:05',NULL),(347,295,'322563230','2024-05-07 14:09:12',NULL),(348,295,'323567073','2024-05-07 14:09:18',NULL),(349,295,'324552944','2024-05-07 14:09:59',NULL);
/*!40000 ALTER TABLE `jugadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `torneos_disciplinas`
--

DROP TABLE IF EXISTS `torneos_disciplinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `torneos_disciplinas` (
  `idTorneoDisciplina` int(11) NOT NULL AUTO_INCREMENT,
  `idTorneo` smallint(6) NOT NULL,
  `idDisciplina` char(5) NOT NULL,
  `idCategoria` smallint(6) NOT NULL,
  `idPrueba` smallint(6) NOT NULL,
  `rama` varchar(100) NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `fechaInicioIns` datetime NOT NULL,
  `fechaFinIns` datetime NOT NULL,
  `fechaAltaTorDisc` datetime NOT NULL,
  `fechaModTorDisc` datetime DEFAULT NULL,
  PRIMARY KEY (`idTorneoDisciplina`),
  KEY `idx_tor_dis_ct_tor_fk` (`idTorneo`),
  KEY `idx_tor_dis_ct_disc_fk` (`idDisciplina`),
  KEY `idx_tor_dis_ct_cat_fk` (`idCategoria`),
  KEY `idx_tor_dis_ct_pru_fk` (`idPrueba`),
  CONSTRAINT `fk_ct_tor_tor` FOREIGN KEY (`idTorneo`) REFERENCES `ct_torneos` (`idTorneo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tor_dis_ct_cat_` FOREIGN KEY (`idCategoria`) REFERENCES `ct_categorias` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tor_dis_ct_dis` FOREIGN KEY (`idDisciplina`) REFERENCES `ct_disciplinas` (`idDisciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tordis_ct_pru` FOREIGN KEY (`idPrueba`) REFERENCES `ct_pruebas` (`idPrueba`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `torneos_disciplinas`
--

LOCK TABLES `torneos_disciplinas` WRITE;
/*!40000 ALTER TABLE `torneos_disciplinas` DISABLE KEYS */;
INSERT INTO `torneos_disciplinas` VALUES (1,3,'2',3,2,'Única','2023-01-24 00:00:00','2023-03-24 00:00:00','2023-06-01 00:00:00','2024-01-01 00:00:00','2023-03-07 10:54:35','2023-06-21 12:10:34'),(3,4,'4',4,1,'Varonil','2023-04-09 00:00:00','2023-04-09 00:00:00','2023-05-25 00:00:00','2024-01-01 00:00:00','2023-03-08 09:30:08',NULL),(4,4,'4',4,1,'Femenil','2023-11-16 00:00:00','2023-12-09 00:00:00','2023-10-16 00:00:00','2023-10-31 00:00:00','2023-03-08 09:30:15','2023-10-11 16:39:15'),(5,3,'6',5,2,'Única','2023-11-20 00:00:00','2023-12-27 00:00:00','2023-06-21 00:00:00','2023-07-11 00:00:00','2023-03-08 09:30:40','2023-06-21 10:44:17'),(6,3,'5',1,2,'Femenil','2023-09-02 00:00:00','2023-09-02 00:00:00','2023-04-08 00:00:00','2024-01-01 00:00:00','2023-03-13 12:03:42',NULL),(7,4,'6',2,1,'Varonil','2023-04-09 00:00:00','2023-04-09 00:00:00','2023-05-05 00:00:00','2024-01-01 00:00:00','2023-03-13 12:10:45',NULL),(8,4,'6',3,2,'Femenil','2023-08-25 00:00:00','2023-08-25 00:00:00','2026-09-08 00:00:00','2027-01-01 00:00:00','2023-03-13 12:33:33',NULL),(9,2,'1',1,2,'Única','2023-08-25 00:00:00','2023-08-25 00:00:00','2023-09-03 00:00:00','2024-01-01 00:00:00','2023-03-13 12:43:31',NULL),(10,2,'1',2,2,'Única','2023-08-25 00:00:00','2023-08-25 00:00:00','2023-05-18 00:00:00','2024-01-01 00:00:00','2023-03-13 12:43:41',NULL),(12,3,'3',1,1,'Femenil','2023-06-19 00:00:00','2023-06-19 00:00:00','2023-06-19 00:00:00','2023-06-19 00:00:00','2023-06-19 13:12:44',NULL),(17,2,'5',2,1,'Varonil','2023-10-27 00:00:00','2024-04-27 00:00:00','2023-09-04 00:00:00','2023-08-31 00:00:00','2023-10-11 16:44:05',NULL),(26,17,'9',12,2,'Varonil','2024-03-25 00:00:00','2024-05-31 00:00:00','2024-03-04 00:00:00','2024-03-08 00:00:00','2024-03-11 09:53:54','2024-03-11 09:56:14'),(28,17,'2',13,2,'Varonil','2024-03-29 00:00:00','2024-05-24 00:00:00','2024-03-11 00:00:00','2024-05-24 00:00:00','2024-03-22 12:14:58',NULL),(31,3,'5',13,2,'Varonil','2024-04-22 00:00:00','2024-06-14 00:00:00','2024-04-01 00:00:00','2024-06-14 00:00:00','2024-04-17 12:31:34',NULL),(32,4,'5',2,2,'Varonil','2024-04-15 00:00:00','2024-05-24 00:00:00','2024-04-01 00:00:00','2024-05-24 00:00:00','2024-04-19 09:51:08',NULL),(33,18,'5',4,2,'Varonil','2023-09-18 00:00:00','2024-05-24 00:00:00','2023-08-21 00:00:00','2024-05-24 00:00:00','2024-04-22 11:37:23',NULL);
/*!40000 ALTER TABLE `torneos_disciplinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `Torneos`
--

/*!50001 DROP TABLE IF EXISTS `Torneos`*/;
/*!50001 DROP VIEW IF EXISTS `Torneos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dba_deportivas`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `Torneos` AS select `td`.`idTorneoDisciplina` AS `idTorneoDisciplina`,`t`.`nomTorneo` AS `nomTorneo`,`d`.`nomDisciplina` AS `nomDisciplina`,`p`.`nomPrueba` AS `nomPrueba`,`c`.`nomCategoria` AS `nomCategoria`,`td`.`rama` AS `rama` from ((((`torneos_disciplinas` `td` join `ct_disciplinas` `d`) join `ct_pruebas` `p`) join `ct_torneos` `t`) join `ct_categorias` `c`) where ((`p`.`idPrueba` = `td`.`idPrueba`) and (`td`.`idDisciplina` = `d`.`idDisciplina`) and (`t`.`idTorneo` = `td`.`idTorneo`) and (`c`.`idCategoria` = `td`.`idCategoria`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-20 12:20:28
