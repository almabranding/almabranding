-- MySQL dump 10.13  Distrib 5.5.24, for osx10.5 (i386)
--
-- Host: almabranding.com.mialias.net    Database: almabran
-- ------------------------------------------------------
-- Server version	5.1.61-0+squeeze1-log

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
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `contact` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `tel` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `mail` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `info` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `address` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `img` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `url` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (2,'Image Nation','Jero','','jeronimo@imagenation.es',NULL,'','imagenation.png','http://www.imagenation.es'),(3,'Cure & penabad','','','',NULL,'','CURE_PENABAD.png',NULL),(4,'Sauguer','Sauguer','','',NULL,'','sauguer.png','http://sauguer80.com/admin'),(5,'Miami','','','',NULL,'',NULL,NULL),(6,'Borndevelopments','Borndevelopments','','',NULL,'',NULL,NULL),(7,'Seasun Productions','Simon Paul','','',NULL,'',NULL,NULL),(8,'Tachmes','','','',NULL,'',NULL,NULL);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ftp`
--

DROP TABLE IF EXISTS `ftp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ftp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) DEFAULT NULL,
  `url` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `user` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `port` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `comments` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ftp`
--

LOCK TABLES `ftp` WRITE;
/*!40000 ALTER TABLE `ftp` DISABLE KEYS */;
INSERT INTO `ftp` VALUES (1,NULL,'asd','asd','asd','21',NULL),(2,NULL,'asd','asd','asd','21',NULL),(3,NULL,'url','dsa','dsf','21',NULL);
/*!40000 ALTER TABLE `ftp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '0',
  `img` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `thumb` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `caption_EN` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `w` int(11) DEFAULT NULL,
  `h` int(11) DEFAULT NULL,
  `video` int(11) DEFAULT '0',
  `vimeo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `replace` int(11) DEFAULT '0',
  `hide` int(11) DEFAULT NULL,
  `caption_ES` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`orden`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (3,1,'glass-site-v1.1-06',NULL,1,'glass-site-v1.1-06.png','thumb_glass-site-v1.1-06.png','glass-site-v1.1-06',358,298,0,NULL,0,NULL,'glass-site-v1.1-06'),(4,1,'glass-site-v1.1-01c',NULL,0,'glass-site-v1.1-01c.png','thumb_glass-site-v1.1-01c.png','glass-site-v1.1-01c',358,298,0,NULL,0,NULL,'glass-site-v1.1-01c'),(5,1,'glass-site-v1.1-01b',NULL,2,'glass-site-v1.1-01b.png','thumb_glass-site-v1.1-01b.png','glass-site-v1.1-01b',228,190,0,NULL,0,NULL,'glass-site-v1.1-01b'),(6,1,'glass-site-v1.1-01a',NULL,3,'glass-site-v1.1-01a.png','thumb_glass-site-v1.1-01a.png','glass-site-v1.1-01a',487,405,0,NULL,0,NULL,'glass-site-v1.1-01a'),(7,1,'glass-site-v1.1-03',NULL,4,'glass-site-v1.1-03.png','thumb_glass-site-v1.1-03.png','glass-site-v1.1-03',228,374,0,NULL,0,NULL,'glass-site-v1.1-03'),(8,2,'Captura de pantalla 2013-06-05 a la(s) 17.11.',NULL,0,'Captura de pantalla 2013-06-05 a la(s) 17.11.45.png','thumb_Captura de pantalla 2013-06-05 a la(s) 17.11.45.png','Captura de pantalla 2013-06-05 a la(s) 17.11.45',358,222,0,NULL,0,NULL,'Captura de pantalla 2013-06-05 a la(s) 17.11.');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intra_users`
--

DROP TABLE IF EXISTS `intra_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `intra_users` (
  `userID` int(11) NOT NULL,
  `user` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `active` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intra_users`
--

LOCK TABLES `intra_users` WRITE;
/*!40000 ALTER TABLE `intra_users` DISABLE KEYS */;
INSERT INTO `intra_users` VALUES (1,'alma','746e87da779bcc671c9323fd6c4f436c06d3f9414328791ecfc8a40872c5559a',NULL,'1');
/*!40000 ALTER TABLE `intra_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailing`
--

DROP TABLE IF EXISTS `mailing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mailing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `user` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `mail` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mailing`
--

LOCK TABLES `mailing` WRITE;
/*!40000 ALTER TABLE `mailing` DISABLE KEYS */;
INSERT INTO `mailing` VALUES (1,NULL,NULL,'po123','po123','dan@gmail.com'),(2,1,NULL,'popo123','1234p','dan@gmail.com');
/*!40000 ALTER TABLE `mailing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  `url` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `page` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Glass',NULL,-1,'arrayglass',1),(2,'Grove',NULL,-1,'arraygrove',2);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `menu` int(11) NOT NULL DEFAULT '0',
  `orden` int(11) NOT NULL DEFAULT '0',
  `content_ES` longtext COLLATE utf8_spanish_ci,
  `template` int(11) DEFAULT '0',
  `description` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vimeo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `content_EN` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (1,'about',-1,0,'<p>asd</p>',0,'','about','','<p>asd</p>');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_content_type` varchar(255) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `caption` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (7,'2013-10-28 13:21:21','2013-10-28 13:21:21','grove_03.jpg','image/jpeg',321867,1800,1114,NULL),(8,'2013-10-28 13:21:22','2013-10-28 13:21:22','grove_01.jpg','image/jpeg',822110,1800,1114,NULL),(9,'2013-10-28 13:21:23','2013-10-28 13:21:23','grove_02.jpg','image/jpeg',788604,1800,1114,NULL),(12,'2013-10-28 19:13:43','2013-10-28 19:13:43','grove_thumb.jpg','image/jpeg',81185,500,310,NULL),(15,'2013-10-29 10:17:18','2013-10-29 10:39:32','imagenation.jpg','image/jpeg',162372,500,310,''),(16,'2013-10-29 10:19:07','2013-10-29 10:19:07','emc3.jpg','image/jpeg',147098,500,310,NULL),(18,'2013-10-29 10:25:27','2013-10-29 10:25:27','sight4.jpg','image/jpeg',89999,500,310,NULL),(19,'2013-10-29 10:26:41','2013-10-29 10:26:41','vimity2.jpg','image/jpeg',90194,500,310,NULL),(20,'2013-10-29 10:27:40','2013-10-29 10:27:40','comas3.jpg','image/jpeg',119453,500,310,NULL),(21,'2013-10-29 10:29:36','2013-10-29 10:29:36','event2.jpg','image/jpeg',149226,500,310,NULL),(22,'2013-10-29 10:30:27','2013-10-29 10:30:27','pp2.jpg','image/jpeg',138186,500,310,NULL),(24,'2013-10-29 10:33:08','2013-10-29 10:33:08','plastic.jpg','image/jpeg',84167,500,310,NULL),(25,'2013-10-29 10:33:49','2013-10-29 10:33:49','miramelindo2.jpg','image/jpeg',22811,500,310,NULL),(26,'2013-10-29 10:34:30','2013-10-29 10:34:30','mgmt4.jpg','image/jpeg',121570,500,310,NULL),(27,'2013-10-29 10:35:21','2013-10-29 10:35:21','glass.jpg','image/jpeg',103289,500,310,NULL),(28,'2013-10-29 10:37:58','2013-10-29 10:37:58','mgmt.jpg','image/jpeg',57891,500,310,NULL),(32,'2013-10-29 10:41:17','2013-10-29 10:41:17','mgmt2.jpg','image/jpeg',51942,500,310,NULL),(35,'2013-10-29 10:49:17','2013-10-29 10:49:17','miraprint.jpg','image/jpeg',60908,500,310,NULL),(36,'2013-10-29 10:50:17','2013-10-29 10:50:17','artbuyers.jpg','image/jpeg',76616,500,310,NULL),(37,'2013-10-29 10:51:00','2013-10-29 10:51:00','book.jpg','image/jpeg',34223,500,310,NULL),(39,'2013-10-29 10:55:41','2013-10-29 10:55:41','cprint.jpg','image/jpeg',9104,500,310,NULL),(42,'2013-10-29 10:58:27','2013-10-29 10:58:27','comasprint.jpg','image/jpeg',12495,500,310,NULL),(43,'2013-10-29 11:00:20','2013-10-29 11:00:20','tshirt.jpg','image/jpeg',26649,500,310,NULL),(44,'2013-10-29 11:03:31','2013-10-29 11:03:31','ppp.jpg','image/jpeg',60432,500,310,NULL),(45,'2013-10-29 12:04:06','2013-10-29 12:04:06','sellbyart_01.jpg','image/jpeg',209707,1800,1114,NULL),(46,'2013-10-29 12:04:17','2013-10-29 12:04:17','sellbyart_02.jpg','image/jpeg',243588,1800,1114,NULL),(47,'2013-10-29 12:04:28','2013-10-29 12:04:28','sellbyart_3.jpg','image/jpeg',134067,1800,1114,NULL),(48,'2013-10-29 12:06:51','2013-10-29 12:06:51','sellbyart2.jpg','image/jpeg',38289,500,310,NULL);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `img` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `url` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `client` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `ftpHost` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `ftpUser` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `ftpPass` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `ftpPort` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `hostURL` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `hostUser` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `hostPass` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `intranetURL` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `intranetUser` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `intranetPass` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `info` text COLLATE utf8_slovenian_ci,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `content_EN` text COLLATE utf8_slovenian_ci,
  `content_ES` text COLLATE utf8_slovenian_ci,
  `content_list_EN` text COLLATE utf8_slovenian_ci,
  `content_list_ES` text COLLATE utf8_slovenian_ci,
  `position` int(11) DEFAULT NULL,
  `template` varchar(5) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (4,'Imagenation','imagenation.png','http://www.imagenation.es','2','ftp.imagenation.es','imagenat','dudune2','21','http://www.ovh.es/managerv3/index.pl','rj29357-ovh','dududune','http://www.imagenation.es/intranet','admin','winter4000','','2013-10-29 15:29:04',NULL,'<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>AGENCY: <a href=\"http://www.lemonyellow.com/\" target=\"_blank\">Lemon Yellow</a></li>\r\n<li>CLIENT: Terra Group</li>\r\n<li>CREATED: 2013</li>\r\n<li>COMPANY TYPE: Real Estate&nbsp;</li>\r\n</ul>','',20,'dark'),(11,'Grove at grand bay',NULL,'groveatgrandbay.com','5','groveatgrandbay.com','alma@groveatgrandbay.com','alma2013','21','groveatgrandbay.com:2083','groveatg','!t3rGr02GGS','','','',NULL,'2013-10-29 19:53:56',NULL,'<h2>Grove at Grand Bay</h2>\r\n<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os, sino que tambien ingres&oacute; como texto de relleno en documentos electr&oacute;nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaci&oacute;n de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y m&aacute;s recientemente con software de autoedici&oacute;n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>\r\n<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen. No s&oacute;lo sobrevivi&oacute; 500 a&ntilde;os, sino que tambien ingres&oacute; como texto de relleno en documentos electr&oacute;nicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creaci&oacute;n de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y m&aacute;s recientemente con software de autoedici&oacute;n, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>\r\n<div class=\"client\">Client Name</div>','<ul>\r\n<li>AGENCY: <a href=\"http://www.lemonyellow.com/\" target=\"_blank\">Lemon Yellow</a></li>\r\n<li>CLIENT: Terra Group</li>\r\n<li>CREATED: 2013</li>\r\n<li>COMPANY TYPE: Real Estate&nbsp;</li>\r\n</ul>','<ul>\r\n<li><strong>DIRECTOR</strong>: Pepe</li>\r\n<li><strong>DESARROLLO</strong>: Pepe</li>\r\n<li><strong>CLIENT</strong>: Pepe</li>\r\n</ul>',19,'dark'),(16,'El Meu Coixi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:19:08','2013-10-29 10:09:49','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>df,jchwkdfgjs</li>\r\n<li>skvjgsakdjfg</li>\r\n<li>sdfkhjg</li>\r\n</ul>','',14,'light'),(17,'Modelmanagement.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:34:31','2013-10-29 10:14:54','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>kjsdfhksdjgf</li>\r\n<li>asfkjgsakdjf</li>\r\n<li>aslfjkhskdjfhg</li>\r\n</ul>','',15,'dark'),(18,'SIGHT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:25:28','2013-10-29 10:20:22','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','','',16,'dark'),(19,'Vimity',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:26:42','2013-10-29 10:26:28','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>dg</li>\r\n<li>sdfg</li>\r\n<li>sdfg</li>\r\n</ul>','',17,'dark'),(20,'Comas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:27:41','2013-10-29 10:27:26','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>sdf</li>\r\n<li>asf</li>\r\n<li>asf</li>\r\n</ul>','',18,'light'),(21,'Event Paradise',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:57:47','2013-10-29 10:29:29','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>sdg</li>\r\n<li>sdg</li>\r\n<li>sdg</li>\r\n</ul>','',1,'light'),(22,'Production Paradise',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:30:28','2013-10-29 10:30:15','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>sdgf</li>\r\n<li>sdgf</li>\r\n<li>sdgf</li>\r\n</ul>','',2,'dark'),(23,'Sellbyart',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 12:16:13','2013-10-29 10:31:11','<h2>Sellbyart - branding&nbsp;</h2>\r\n<p>Sellbyart enables aspiring, established and professional artists to display and promote their work via an online digital portfolio. Sellbyart serves as a medium for the international art community in which artists connect with art buyers to network, promote and exchange art pieces around the world.</p>\r\n<p>Provideing a customized &nbsp;digital portfolio from 3 high quality design templates.</p>\r\n<div class=\"client\"><a href=\"http://sellbyart.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>CLIENT: Sellbyart</li>\r\n<li>CREATED: 2011</li>\r\n<li>COMPANY TYPE: Social media</li>\r\n</ul>','',3,'light'),(25,'MIramelindo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:33:49','2013-10-29 10:33:41','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>wdfsg</li>\r\n<li>sdg</li>\r\n<li>wdfg</li>\r\n</ul>','',4,'dark'),(26,'Glass',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:35:22','2013-10-29 10:35:16','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>xcb</li>\r\n<li>sdgb</li>\r\n<li>sdg</li>\r\n</ul>','',6,'light'),(27,'Fresh Faces',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:37:59','2013-10-29 10:37:43','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>sdf</li>\r\n<li>adsf</li>\r\n<li>asf</li>\r\n</ul>','',10,'light'),(28,'Production Paradise Print',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 11:03:32','2013-10-29 10:38:33','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>sdg</li>\r\n<li>sgd</li>\r\n<li>sdg</li>\r\n</ul>','',0,'dark'),(29,'Comas Print',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:58:28','2013-10-29 10:39:25','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>dsg</li>\r\n<li>sdg</li>\r\n<li>adg</li>\r\n</ul>','',7,'light'),(30,'Miramelindo Print',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:49:18','2013-10-29 10:40:06','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>wdf</li>\r\n<li>wg</li>\r\n<li>wdg</li>\r\n</ul>','',8,'dark'),(31,'Modelmanagemet Print',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:41:18','2013-10-29 10:41:03','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>asfd</li>\r\n<li>adsf</li>\r\n<li>asf</li>\r\n</ul>','',9,'light'),(32,'El meu Coixi Print',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:55:42','2013-10-29 10:42:08','<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno est&aacute;ndar de las industrias desde el a&ntilde;o 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido us&oacute; una galer&iacute;a de textos y los mezcl&oacute; de tal manera que logr&oacute; hacer un libro de textos especimen.</p>\r\n<div class=\"client\"><a href=\"http://groveatgrandbay.com/\" target=\"_blank\">Visit website</a></div>','','<ul>\r\n<li>sdg</li>\r\n<li>sdg</li>\r\n<li>sdgf</li>\r\n</ul>','',11,'light'),(33,'Art Buyers',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:50:18','2013-10-29 10:50:09','','','<ul>\r\n<li>xg</li>\r\n<li>sdgf</li>\r\n<li>asdg</li>\r\n</ul>','',12,'light'),(34,'Book ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 10:51:01','2013-10-29 10:50:53','','','<ul>\r\n<li>sdg</li>\r\n<li>adf</li>\r\n<li>asf</li>\r\n</ul>','',13,'light'),(35,'T-shirt Design',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-10-29 11:00:21','2013-10-29 10:59:52','','','<ul>\r\n<li>sdg</li>\r\n<li>adsf</li>\r\n<li>asf</li>\r\n</ul>','',NULL,'light');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects_photos`
--

DROP TABLE IF EXISTS `projects_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT '1',
  `thumb` tinyint(1) DEFAULT NULL,
  `visibility` varchar(255) NOT NULL DEFAULT 'public',
  `isVideo` int(11) DEFAULT '0',
  `video` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects_photos`
--

LOCK TABLES `projects_photos` WRITE;
/*!40000 ALTER TABLE `projects_photos` DISABLE KEYS */;
INSERT INTO `projects_photos` VALUES (7,11,7,2,0,'public',0,NULL),(8,11,8,0,0,'public',0,NULL),(9,11,9,1,0,'public',0,NULL),(12,11,12,3,1,'private',0,NULL),(15,4,15,0,1,'public',1,'http://player.vimeo.com/video/77795003'),(16,16,16,0,1,'private',0,NULL),(18,18,18,0,1,'private',0,NULL),(19,19,19,0,1,'private',0,NULL),(20,20,20,0,1,'private',0,NULL),(21,21,21,2,1,'private',0,NULL),(22,22,22,0,1,'private',0,NULL),(24,24,24,0,1,'private',0,NULL),(25,25,25,0,1,'private',0,NULL),(26,17,26,0,1,'private',0,NULL),(27,26,27,0,1,'private',0,NULL),(28,27,28,0,1,'private',0,NULL),(32,31,32,0,1,'private',0,NULL),(35,30,35,0,1,'private',0,NULL),(36,33,36,0,1,'private',0,NULL),(37,34,37,0,1,'private',0,NULL),(39,32,39,0,1,'private',0,NULL),(42,29,42,0,1,'private',0,NULL),(43,35,43,0,1,'private',0,NULL),(44,28,44,0,1,'private',0,NULL),(45,23,45,0,0,'public',0,NULL),(46,23,46,0,0,'public',0,NULL),(47,23,47,0,0,'public',0,NULL),(48,23,48,0,1,'private',0,NULL);
/*!40000 ALTER TABLE `projects_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `URL` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template`
--

LOCK TABLES `template` WRITE;
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
INSERT INTO `template` VALUES (1,'Building','building',NULL),(2,'Map','map',NULL),(3,'Page','page',NULL),(4,'Video','video',NULL),(5,'Home','',NULL),(6,'Splash','',NULL),(7,'Login',NULL,NULL);
/*!40000 ALTER TABLE `template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'4de5cfe4273a986cf4890662dba7c2c3dc9e3680d73131552558c45e6fccd11d','alma',NULL),(2,NULL,NULL,'',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webClient`
--

DROP TABLE IF EXISTS `webClient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webClient` (
  `idWeb` int(11) DEFAULT NULL,
  `idClient` int(11) DEFAULT NULL,
  KEY `id_idx` (`idClient`),
  KEY `id_idx1` (`idWeb`),
  CONSTRAINT `id` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webClient`
--

LOCK TABLES `webClient` WRITE;
/*!40000 ALTER TABLE `webClient` DISABLE KEYS */;
/*!40000 ALTER TABLE `webClient` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-30 10:41:43
