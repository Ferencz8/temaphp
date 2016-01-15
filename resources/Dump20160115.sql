-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.5.5-10.0.17-MariaDB

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
-- Table structure for table `appliedjobs`
--

DROP TABLE IF EXISTS `appliedjobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appliedjobs` (
  `candidateId` int(11) NOT NULL DEFAULT '0',
  `jobId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`candidateId`,`jobId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appliedjobs`
--

LOCK TABLES `appliedjobs` WRITE;
/*!40000 ALTER TABLE `appliedjobs` DISABLE KEYS */;
INSERT INTO `appliedjobs` VALUES (1452729070,1452815815),(1452729070,1452817546);
/*!40000 ALTER TABLE `appliedjobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `cvId` int(11) DEFAULT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `birthdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `address` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  KEY `cvId` (`cvId`),
  CONSTRAINT `candidates_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  CONSTRAINT `candidates_ibfk_2` FOREIGN KEY (`cvId`) REFERENCES `cvs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1452817960 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidates`
--

LOCK TABLES `candidates` WRITE;
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;
INSERT INTO `candidates` VALUES (1452729070,1452729081,1452808554,'Maria','Tanase','2016-01-25 22:00:00','','1234567897','maria@gmail.com'),(1452817959,1452817981,1452818023,'Ciulea','Fratila','2016-01-29 22:00:00','','1234567890','ferenczv@gmail.com');
/*!40000 ALTER TABLE `candidates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `logo` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `cities` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,1452809857,'Marlencz','dasda','sadada',123456798,'ferenczv8@gmail.com','fe','1');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cvs`
--

DROP TABLE IF EXISTS `cvs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cvs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `careerLevel` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1452818024 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cvs`
--

LOCK TABLES `cvs` WRITE;
/*!40000 ALTER TABLE `cvs` DISABLE KEYS */;
INSERT INTO `cvs` VALUES (1452732401,''),(1452732495,''),(1452732682,''),(1452732865,''),(1452733725,''),(1452733954,''),(1452799791,''),(1452800312,''),(1452800390,''),(1452800700,''),(1452800777,''),(1452800844,''),(1452801989,''),(1452802964,''),(1452803006,''),(1452803029,''),(1452803099,''),(1452803678,''),(1452804929,''),(1452804968,''),(1452805074,''),(1452805079,''),(1452805646,''),(1452805951,''),(1452807375,''),(1452807402,''),(1452807412,''),(1452807420,''),(1452807477,''),(1452807504,''),(1452807574,''),(1452807694,''),(1452807724,''),(1452807866,''),(1452807919,''),(1452807950,''),(1452808017,''),(1452808159,''),(1452808214,''),(1452808271,''),(1452808554,''),(1452817785,'saca'),(1452818023,'');
/*!40000 ALTER TABLE `cvs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educations`
--

DROP TABLE IF EXISTS `educations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cvId` int(11) DEFAULT NULL,
  `city` varchar(256) DEFAULT NULL,
  `institution` varchar(256) DEFAULT NULL,
  `startdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `cvId` (`cvId`),
  CONSTRAINT `educations_ibfk_1` FOREIGN KEY (`cvId`) REFERENCES `cvs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1452808561 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educations`
--

LOCK TABLES `educations` WRITE;
/*!40000 ALTER TABLE `educations` DISABLE KEYS */;
INSERT INTO `educations` VALUES (1452733725,NULL,'Brasov','Nb','2016-01-14 01:08:59','2016-01-14 01:08:59'),(1452733954,1452733954,'Bv','Nb','2016-01-14 01:12:36','2016-01-14 01:12:36'),(1452799791,1452799791,'Brasov','Nb','2016-01-14 19:34:07','2016-01-14 19:34:07'),(1452800317,1452800312,'Brasov','Nb','2016-01-14 19:38:37','2016-01-14 19:38:37'),(1452800406,1452800390,'Brasov','Nb','2016-01-14 19:40:40','2016-01-14 19:40:40'),(1452800449,1452800390,'Nadlac','XX','2016-01-14 19:41:04','2016-01-14 19:41:04'),(1452800777,1452800777,'Bv','','2016-01-14 19:46:44','2016-01-14 19:46:44'),(1452800844,1452800844,'Bv','','2016-01-14 19:47:31','2016-01-14 19:47:31'),(1452800845,1452800844,'Nadlac','','2016-01-14 19:47:53','2016-01-14 19:47:53'),(1452801990,1452801989,'','2016-01-14','2016-01-14 20:06:29','2016-01-14 20:06:29'),(1452802987,1452802964,'Bv','2016-01-14','2016-01-14 20:23:07','2016-01-14 20:23:07'),(1452802988,1452802964,'Nd','','2016-01-14 20:23:07','2016-01-14 20:23:07'),(1452803009,1452803006,'Bv','2016-01-14','2016-01-14 20:23:28','2016-01-14 20:23:28'),(1452803010,1452803006,'Nd','','2016-01-14 20:23:28','2016-01-14 20:23:28'),(1452803047,1452803029,'Bv','2016-01-14','2016-01-14 20:24:12','2016-01-14 20:24:12'),(1452803048,1452803029,'Nd','','2016-01-14 20:24:42','2016-01-14 20:24:42'),(1452803719,1452803678,'Bv','2016-01-14','2016-01-13 22:00:00','2016-01-13 22:00:00'),(1452804932,1452804929,'Bv','2016-01-14','2016-01-13 22:00:00','2016-01-13 22:00:00'),(1452804933,1452804929,'Nadlac','Test','0000-00-00 00:00:00','0000-00-00 00:00:00'),(1452804969,1452804968,'Bv','2016-01-14','2016-01-13 22:00:00','2016-01-13 22:00:00'),(1452805075,1452805074,'Bv','2016-01-14','2016-01-13 22:00:00','2016-01-13 22:00:00'),(1452805076,1452805074,'Titei Marian','Julia','2016-01-28 22:00:00','0000-00-00 00:00:00'),(1452805080,1452805079,'Bv','2016-01-14','2016-01-13 22:00:00','2016-01-13 22:00:00'),(1452805081,1452805079,'Titei Marian','Julia','2016-01-28 22:00:00','0000-00-00 00:00:00'),(1452805647,1452805646,'Bv','2016-01-14','2016-01-13 22:00:00','2016-01-13 22:00:00'),(1452805648,1452805646,'Titei Marian','Julia','2016-01-28 22:00:00','0000-00-00 00:00:00'),(1452808167,1452808159,'Brasov','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(1452808168,1452808159,'B','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(1452808216,1452808214,'Brasov','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(1452808285,1452808271,'Brasov','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(1452808286,1452808271,'Ciardas','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(1452808559,1452808554,'Brasov','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(1452808560,1452808554,'','','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `educations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyId` int(11) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `availablepositions` int(11) DEFAULT NULL,
  `startdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(200) DEFAULT NULL,
  `cities` varchar(200) DEFAULT NULL,
  `careerlevel` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `companyId` (`companyId`),
  CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`companyId`) REFERENCES `companies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1452817547 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1452815517,1,'Test',3,'2016-01-25 22:00:00','2016-01-28 22:00:00','VSAA','3','1'),(1452815571,1,'Test',3,'2016-01-25 22:00:00','2016-01-28 22:00:00','VSAA','3','1'),(1452815815,1,'Murika',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','',NULL,'1'),(1452817546,1,'Job Nou',3,'2016-01-28 22:00:00','2016-01-23 22:00:00','lalala',NULL,'1');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professionalexperiences`
--

DROP TABLE IF EXISTS `professionalexperiences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professionalexperiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cvId` int(11) DEFAULT NULL,
  `city` varchar(256) DEFAULT NULL,
  `institution` varchar(256) DEFAULT NULL,
  `startdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `position` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cvId` (`cvId`),
  CONSTRAINT `professionalexperiences_ibfk_1` FOREIGN KEY (`cvId`) REFERENCES `cvs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1452818025 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professionalexperiences`
--

LOCK TABLES `professionalexperiences` WRITE;
/*!40000 ALTER TABLE `professionalexperiences` DISABLE KEYS */;
INSERT INTO `professionalexperiences` VALUES (1452805647,1452805646,'','Hula','2016-01-14 21:07:26','2016-01-14 21:07:26',''),(1452805648,1452805646,'','Hula2','2016-01-14 21:07:26','2016-01-14 21:07:26',''),(1452808168,1452808159,'','Nad','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(1452808216,1452808214,'','Nad','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(1452808590,1452808554,'','Nad','0000-00-00 00:00:00','0000-00-00 00:00:00',''),(1452817818,1452817785,'Bv','Unitbv','2016-01-19 22:00:00','2016-01-18 22:00:00','Olala'),(1452818024,1452818023,'Ieei','Profit','2016-01-27 22:00:00','2016-01-29 22:00:00','');
/*!40000 ALTER TABLE `professionalexperiences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `accounttype` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1452817982 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ferencz','123456',0),(1452729081,'mariatanase','123456',0),(1452809857,'marlenca','123456',1),(1452817981,'ciulea123','123456',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-15  2:42:30
