-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: rckstaging
-- ------------------------------------------------------
-- Server version	8.0.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agency`
--

DROP TABLE IF EXISTS `agency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agency`
--

LOCK TABLES `agency` WRITE;
/*!40000 ALTER TABLE `agency` DISABLE KEYS */;
INSERT INTO `agency` VALUES (1,'UNHCR','DESCRIPTION',17,17,1614321789,1614321789),(2,'HIAS','',17,17,1614321831,1614321831),(3,'Refuge Point','',17,17,1614321905,1614321905),(4,'RAS','',17,17,1614324923,1614324923);
/*!40000 ALTER TABLE `agency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asylum_type`
--

DROP TABLE IF EXISTS `asylum_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asylum_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `type` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asylum_type`
--

LOCK TABLES `asylum_type` WRITE;
/*!40000 ALTER TABLE `asylum_type` DISABLE KEYS */;
INSERT INTO `asylum_type` VALUES (1,'Asylum Seeker','Seeking asylum',NULL,1612527150,1613545391,NULL,17),(2,'Refugee','Refugee ',NULL,1612527173,1612527173,NULL,NULL),(3,'Kenyan','Description of a kenyan citizen',NULL,1612527194,1612527194,NULL,NULL);
/*!40000 ALTER TABLE `asylum_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `case_register`
--

DROP TABLE IF EXISTS `case_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `case_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `accused_name` varchar(255) DEFAULT NULL,
  `accussed_idno` varchar(255) DEFAULT NULL,
  `complainant_name` varchar(255) DEFAULT NULL,
  `court` varchar(255) DEFAULT NULL,
  `representing_lawyer` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `case_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `case_register`
--

LOCK TABLES `case_register` WRITE;
/*!40000 ALTER TABLE `case_register` DISABLE KEYS */;
/*!40000 ALTER TABLE `case_register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `case_update`
--

DROP TABLE IF EXISTS `case_update`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `case_update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `police_case_id` int(11) NOT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-case_update-police_case_id` (`police_case_id`),
  CONSTRAINT `fk-case_update-police_case_id` FOREIGN KEY (`police_case_id`) REFERENCES `police_cases` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `case_update`
--

LOCK TABLES `case_update` WRITE;
/*!40000 ALTER TABLE `case_update` DISABLE KEYS */;
/*!40000 ALTER TABLE `case_update` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caseoutcomes`
--

DROP TABLE IF EXISTS `caseoutcomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `caseoutcomes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `outcome` varchar(150) NOT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caseoutcomes`
--

LOCK TABLES `caseoutcomes` WRITE;
/*!40000 ALTER TABLE `caseoutcomes` DISABLE KEYS */;
/*!40000 ALTER TABLE `caseoutcomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `casestatus`
--

DROP TABLE IF EXISTS `casestatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `casestatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(150) NOT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casestatus`
--

LOCK TABLES `casestatus` WRITE;
/*!40000 ALTER TABLE `casestatus` DISABLE KEYS */;
/*!40000 ALTER TABLE `casestatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `casetype`
--

DROP TABLE IF EXISTS `casetype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `casetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `casetype`
--

LOCK TABLES `casetype` WRITE;
/*!40000 ALTER TABLE `casetype` DISABLE KEYS */;
INSERT INTO `casetype` VALUES (1,'Insecurity','Insecurity',1611745660,1611745660,2,2),(2,'RSD Fast Tracking','RSD Fast Tracking',1611745681,1611745681,2,2),(3,'Stigma and Discrimination','Stigma and Discrimination',1611748779,1619683166,2,18),(4,'RSD Appeal','RSD Appeal meaning',1611748821,1611748821,2,2),(5,'Data Transfer','Data Transfer data',1611748843,1611748843,2,2),(6,'Work Permit','Work Permit desc',1611748866,1611748866,2,2),(7,'Business Permit','Business Permit description',1611748891,1611748891,2,2),(8,'Child Protection','Child Protection description',1611748915,1611748915,2,2),(9,'Custody Case','Custody Case description',1611748940,1611748940,2,2),(10,'Divorce','Divorce description',1611748970,1611748970,2,2),(13,'Family Tracing','Family Tracing description',1611749078,1611749078,2,2),(14,'Family Reunification','Family Reunification description',1611749118,1611749118,2,2),(15,'Social Assistance','Social Assistance description',1611749170,1611749170,2,2),(16,'SGBV','',1615968459,1615968459,2,2);
/*!40000 ALTER TABLE `casetype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `civil_offence`
--

DROP TABLE IF EXISTS `civil_offence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `civil_offence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `civil_offence`
--

LOCK TABLES `civil_offence` WRITE;
/*!40000 ALTER TABLE `civil_offence` DISABLE KEYS */;
/*!40000 ALTER TABLE `civil_offence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conflict`
--

DROP TABLE IF EXISTS `conflict`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conflict` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conflict` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conflict`
--

LOCK TABLES `conflict` WRITE;
/*!40000 ALTER TABLE `conflict` DISABLE KEYS */;
INSERT INTO `conflict` VALUES (1,'Ethic Crashes',1611138624,1611138624,2,2),(2,'Drought',1611138654,1615311088,2,2);
/*!40000 ALTER TABLE `conflict` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counseling`
--

DROP TABLE IF EXISTS `counseling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `counseling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `intervention_id` int(11) NOT NULL,
  `presenting_problem` text,
  `therapeutic` text,
  `conseptualization` text,
  `intervention` text,
  `counsellors` text,
  `counseling_intake_form` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `next_appointment_date` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `case_status` varchar(255) DEFAULT NULL,
  `consent` int(11) DEFAULT NULL,
  `session_goals` text,
  `key_tasks_achieved` text,
  `challenges_emerging` text,
  `interventions_by_facilitator` text,
  `achievement_of_goals` text,
  `stage` text,
  `remarks` text,
  `other_clients` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-counseling-intervention_id` (`intervention_id`),
  CONSTRAINT `fk-counseling-intervention_id` FOREIGN KEY (`intervention_id`) REFERENCES `intervention` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counseling`
--

LOCK TABLES `counseling` WRITE;
/*!40000 ALTER TABLE `counseling` DISABLE KEYS */;
INSERT INTO `counseling` VALUES (16,1301,1622678400,'12313',91,'','','','','',NULL,1622752550,1622752550,2,2,1624492800,'3','open',0,'','','','','','','','19,20,21,22,23'),(17,1340,1622592000,'se-30302',97,'','','','','',NULL,1622761177,1622761177,2,2,1623283200,'3','open',0,'','','','','','','','19,20,21,22,23,24,25,26,27');
/*!40000 ALTER TABLE `counseling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counselling_intake`
--

DROP TABLE IF EXISTS `counselling_intake`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `counselling_intake` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ic_presenting_problem` text,
  `observation_of_ic_behaviour` text,
  `other_interventions_given_elsewhere` text,
  `how_you_supported_the_client` text,
  `skills_used` text,
  `next_appointment_if_any` varchar(255) DEFAULT NULL,
  `counselor_comment` text,
  `referred_to` varchar(255) DEFAULT NULL,
  `counsellor_id` int(11) DEFAULT NULL,
  `intervention_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date_of_referal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-counselling_intake-intervention_id` (`intervention_id`),
  CONSTRAINT `fk-counselling_intake-intervention_id` FOREIGN KEY (`intervention_id`) REFERENCES `intervention` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counselling_intake`
--

LOCK TABLES `counselling_intake` WRITE;
/*!40000 ALTER TABLE `counselling_intake` DISABLE KEYS */;
/*!40000 ALTER TABLE `counselling_intake` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counsellors`
--

DROP TABLE IF EXISTS `counsellors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `counsellors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `counsellor` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counsellors`
--

LOCK TABLES `counsellors` WRITE;
/*!40000 ALTER TABLE `counsellors` DISABLE KEYS */;
INSERT INTO `counsellors` VALUES (2,'Purity Kibui','',1619683002,1619683002,18,18,'purity@rckkenya.org',''),(3,'Caroline Minayo','',1619683019,1619683019,18,18,'caroline@rckkenya.org',''),(4,'Pauline Njagi','',1619683037,1619683037,18,18,'',''),(5,'Bavelyne Mibei','',1619683050,1619683050,18,18,'','');
/*!40000 ALTER TABLE `counsellors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counties`
--

DROP TABLE IF EXISTS `counties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `counties` (
  `CountyID` int(11) NOT NULL AUTO_INCREMENT,
  `CountyName` varchar(45) DEFAULT NULL,
  `Notes` text,
  `RegionID` int(11) DEFAULT NULL,
  `CreatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`CountyID`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counties`
--

LOCK TABLES `counties` WRITE;
/*!40000 ALTER TABLE `counties` DISABLE KEYS */;
INSERT INTO `counties` VALUES (1,'MOMBASA','',1,'2017-09-17 04:34:19',1),(2,'KWALE',NULL,NULL,'2017-09-17 04:34:19',1),(3,'KILIFI',NULL,NULL,'2017-09-17 04:34:19',1),(4,'TANA RIVER',NULL,NULL,'2017-09-17 04:34:19',1),(5,'LAMU',NULL,NULL,'2017-09-17 04:34:19',1),(6,'TAITA-TAVETA',NULL,NULL,'2017-09-17 04:34:19',1),(7,'GARISSA',NULL,NULL,'2017-09-17 04:34:19',1),(8,'WAJIR',NULL,NULL,'2017-09-17 04:34:19',1),(9,'MANDERA',NULL,NULL,'2017-09-17 04:34:19',1),(10,'MARSABET',NULL,NULL,'2017-09-17 04:34:19',1),(11,'ISIOLO',NULL,NULL,'2017-09-17 04:34:19',1),(12,'MERU',NULL,NULL,'2017-09-17 04:34:19',1),(13,'THARAKA-NITHI',NULL,NULL,'2017-09-17 04:34:19',1),(14,'EMBU',NULL,NULL,'2017-09-17 04:34:19',1),(15,'KITUI',NULL,NULL,'2017-09-17 04:34:19',1),(16,'MACHAKOS',NULL,NULL,'2017-09-17 04:34:19',1),(17,'MAKUENI',NULL,NULL,'2017-09-17 04:34:19',1),(18,'NYANDARUA',NULL,NULL,'2017-09-17 04:34:19',1),(19,'NYERI',NULL,NULL,'2017-09-17 04:34:19',1),(20,'KIRINYAGA',NULL,1,'2017-09-17 04:34:19',1),(21,'MURANGA',NULL,NULL,'2017-09-17 04:34:19',1),(22,'KIAMBU',NULL,NULL,'2017-09-17 04:34:19',1),(23,'TURKANA',NULL,NULL,'2017-09-17 04:34:19',1),(24,'WEST POKOT',NULL,NULL,'2017-09-17 04:34:19',1),(25,'SAMBURU',NULL,NULL,'2017-09-17 04:34:19',1),(26,'TRANS NZOIA',NULL,NULL,'2017-09-17 04:34:19',1),(27,'UASIN GISHU',NULL,NULL,'2017-09-17 04:34:19',1),(28,'ELGEYO MARAKWET',NULL,NULL,'2017-09-17 04:34:19',1),(29,'NANDI',NULL,NULL,'2017-09-17 04:34:19',1),(30,'BARINGO',NULL,NULL,'2017-09-17 04:34:19',1),(31,'LAIKIPIA',NULL,NULL,'2017-09-17 04:34:19',1),(32,'NAKURU',NULL,NULL,'2017-09-17 04:34:19',1),(33,'NAROK',NULL,NULL,'2017-09-17 04:34:19',1),(34,'KAJIADO',NULL,NULL,'2017-09-17 04:34:19',1),(35,'KERICHO',NULL,NULL,'2017-09-17 04:34:19',1),(36,'BOMET',NULL,NULL,'2017-09-17 04:34:19',1),(37,'KAKAMEGA',NULL,NULL,'2017-09-17 04:34:19',1),(38,'VIHIGA',NULL,NULL,'2017-09-17 04:34:19',1),(39,'BUNGOMA',NULL,NULL,'2017-09-17 04:34:19',1),(40,'BUSIA',NULL,NULL,'2017-09-17 04:34:19',1),(41,'SIAYA',NULL,NULL,'2017-09-17 04:34:19',1),(42,'KISUMU',NULL,NULL,'2017-09-17 04:34:19',1),(43,'HOMA BAY',NULL,NULL,'2017-09-17 04:34:19',1),(44,'MIGORI',NULL,NULL,'2017-09-17 04:34:19',1),(45,'KISII',NULL,NULL,'2017-09-17 04:34:19',1),(46,'NYAMIRA',NULL,NULL,'2017-09-17 04:34:19',1),(47,'NAIROBI',NULL,NULL,'2017-09-17 04:34:19',1);
/*!40000 ALTER TABLE `counties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(150) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Somali',1611060800,1611060800,2,2),(2,'Ethiopian',1611060813,1612948665,2,2),(3,'Kenyan',1612948692,1612948692,2,2),(4,'South Sudanese',1612948710,1612948710,2,2),(5,'Eritrean',1612948728,1612948728,2,2),(6,'Rwandese',1612948741,1612948741,2,2),(7,'Ugandan',1612948752,1612948752,2,2),(8,'Burundian',1612948777,1612948777,2,2),(9,'Congolese',1612948797,1612948797,2,2),(10,'Other',1612948840,1612948840,2,2);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `court_case_category`
--

DROP TABLE IF EXISTS `court_case_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `court_case_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `court_case_category`
--

LOCK TABLES `court_case_category` WRITE;
/*!40000 ALTER TABLE `court_case_category` DISABLE KEYS */;
INSERT INTO `court_case_category` VALUES (1,'General',1610620113,1610620113,2,2),(2,'SGBV cases',1610620169,1610620169,2,2),(3,'Child Custody Cases',1610697695,1610697695,2,2),(4,'Documentation',1613560884,1613560884,2,2);
/*!40000 ALTER TABLE `court_case_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `court_case_proceeding`
--

DROP TABLE IF EXISTS `court_case_proceeding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `court_case_proceeding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `court_case_id` int(11) NOT NULL,
  `case_status` varchar(255) DEFAULT NULL,
  `next_court_date` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-court_case_proceeding-court_case_id` (`court_case_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `court_case_proceeding`
--

LOCK TABLES `court_case_proceeding` WRITE;
/*!40000 ALTER TABLE `court_case_proceeding` DISABLE KEYS */;
/*!40000 ALTER TABLE `court_case_proceeding` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `court_case_subcategory`
--

DROP TABLE IF EXISTS `court_case_subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `court_case_subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-court_case_subcategory-category_id` (`category_id`),
  CONSTRAINT `fk-court_case_subcategory-category_id` FOREIGN KEY (`category_id`) REFERENCES `court_case_category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `court_case_subcategory`
--

LOCK TABLES `court_case_subcategory` WRITE;
/*!40000 ALTER TABLE `court_case_subcategory` DISABLE KEYS */;
INSERT INTO `court_case_subcategory` VALUES (1,'Pleadings',2,1610620152,1610620152,2,2),(2,'Victim impact statement/Submissions',2,1610620187,1610620187,2,2),(3,'Judgement',1,1610697733,1610697733,2,2),(5,'Judgement',2,1613031070,1613031070,2,2),(6,'Plaint file',3,1613031100,1613031100,2,2),(7,'Pretrial Conference',3,1613031122,1613031122,2,2),(8,'Submission',3,1613031137,1613031137,2,2),(9,'Custody Order/Judgement:',3,1613031153,1613031153,2,2),(10,'Advert',3,1613031169,1613031169,2,2);
/*!40000 ALTER TABLE `court_case_subcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `court_cases`
--

DROP TABLE IF EXISTS `court_cases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `court_cases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_of_refugees` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `offence` varchar(255) DEFAULT NULL,
  `first_instance_interview` text,
  `magistrate` varchar(255) DEFAULT NULL,
  `court_proceeding_id` int(11) DEFAULT NULL,
  `date_of_arrainment` int(11) DEFAULT NULL,
  `case_status` varchar(255) DEFAULT NULL,
  `next_court_date` int(11) DEFAULT NULL,
  `legal_officer_id` int(11) DEFAULT NULL,
  `counsellor_id` int(11) DEFAULT NULL,
  `court_case_category_id` int(11) DEFAULT NULL,
  `court_case_subcategory_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `refugee_id` int(11) DEFAULT NULL,
  `legal_officer` varchar(255) DEFAULT NULL,
  `counsellor` varchar(255) DEFAULT NULL,
  `offence_id` int(11) DEFAULT NULL,
  `offence_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-court_cases-legal_officer_id` (`legal_officer_id`),
  KEY `idx-court_cases-counsellor_id` (`counsellor_id`),
  KEY `idx-court_cases-court_case_category_id` (`court_case_category_id`),
  KEY `idx-court_cases-court_case_subcategory_id` (`court_case_subcategory_id`),
  KEY `idx-court_cases-refugee_id` (`refugee_id`),
  KEY `idx-court_cases-offence_id` (`offence_id`),
  CONSTRAINT `fk-court_cases-counsellor_id` FOREIGN KEY (`counsellor_id`) REFERENCES `counsellors` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-court_cases-court_case_category_id` FOREIGN KEY (`court_case_category_id`) REFERENCES `court_case_category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-court_cases-court_case_subcategory_id` FOREIGN KEY (`court_case_subcategory_id`) REFERENCES `court_case_subcategory` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-court_cases-legal_officer_id` FOREIGN KEY (`legal_officer_id`) REFERENCES `lawyer` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-court_cases-offence_id` FOREIGN KEY (`offence_id`) REFERENCES `offence` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `court_cases`
--

LOCK TABLES `court_cases` WRITE;
/*!40000 ALTER TABLE `court_cases` DISABLE KEYS */;
INSERT INTO `court_cases` VALUES (24,NULL,'','','','',NULL,0,'',0,NULL,NULL,1,NULL,1613558607,1613558607,2,2,NULL,'','',NULL,NULL),(27,30,'','','Police Case','Justice Ngugi',1,1614643200,'open',1616630400,NULL,NULL,4,NULL,1615313089,1615313089,2,2,NULL,'Gideon Ngeno','JJ',NULL,NULL),(29,30,'','','','Eileen',2,1617235200,'closed',0,NULL,NULL,4,NULL,1615453661,1615453661,2,2,NULL,'Eileen','',NULL,NULL);
/*!40000 ALTER TABLE `court_cases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `court_docs_uploads`
--

DROP TABLE IF EXISTS `court_docs_uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `court_docs_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_path` text,
  `filename` varchar(255) DEFAULT NULL,
  `court_case_id` int(11) NOT NULL,
  `court_uploads_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `subcat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-court_docs_uploads-court_case_id` (`court_case_id`),
  KEY `idx-court_docs_uploads-court_uploads_id` (`court_uploads_id`),
  KEY `idx-court_docs_uploads-subcat_id` (`subcat_id`),
  CONSTRAINT `fk-court_docs_uploads-court_case_id` FOREIGN KEY (`court_case_id`) REFERENCES `court_cases` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-court_docs_uploads-court_uploads_id` FOREIGN KEY (`court_uploads_id`) REFERENCES `court_uploads` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-court_docs_uploads-subcat_id` FOREIGN KEY (`subcat_id`) REFERENCES `court_case_subcategory` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `court_docs_uploads`
--

LOCK TABLES `court_docs_uploads` WRITE;
/*!40000 ALTER TABLE `court_docs_uploads` DISABLE KEYS */;
INSERT INTO `court_docs_uploads` VALUES (12,'/uploads/court_cases/1615313108-Techsoup Invoice.jpg','1615313108-Techsoup Invoice.jpg',27,3,1615313108,1615313108,2,2,NULL),(13,'/uploads/court_cases/1615313177-CMS screenshot 2.jpg','1615313177-CMS screenshot 2.jpg',27,4,1615313177,1615313177,2,2,NULL),(16,'/uploads/court_cases/1615453678-CMS screenshot 4.jpg','1615453678-CMS screenshot 4.jpg',29,3,1615453678,1615453678,2,2,NULL);
/*!40000 ALTER TABLE `court_docs_uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `court_uploads`
--

DROP TABLE IF EXISTS `court_uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `court_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `court_uploads`
--

LOCK TABLES `court_uploads` WRITE;
/*!40000 ALTER TABLE `court_uploads` DISABLE KEYS */;
INSERT INTO `court_uploads` VALUES (3,'Charge Sheet','Charge sheet ',1610973110,1613651783,2,2),(4,'court_attendance_form','Court Attendance Form',1610973195,1615377133,2,2);
/*!40000 ALTER TABLE `court_uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `demographics`
--

DROP TABLE IF EXISTS `demographics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `demographics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `demography` varchar(150) DEFAULT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demographics`
--

LOCK TABLES `demographics` WRITE;
/*!40000 ALTER TABLE `demographics` DISABLE KEYS */;
INSERT INTO `demographics` VALUES (1,'Birth','births',1611138418,1611138466,2,2),(2,'Death','Deaths',1611138432,1611138432,2,2),(3,'Migration','m',1611138453,1611138453,2,2);
/*!40000 ALTER TABLE `demographics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dependant`
--

DROP TABLE IF EXISTS `dependant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dependant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(255) NOT NULL,
  `relationship_id` int(11) NOT NULL,
  `refugee_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-dependant-relationship_id` (`relationship_id`),
  KEY `idx-dependant-refugee_id` (`refugee_id`),
  CONSTRAINT `fk-dependant-relationship_id` FOREIGN KEY (`relationship_id`) REFERENCES `relationship` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependant`
--

LOCK TABLES `dependant` WRITE;
/*!40000 ALTER TABLE `dependant` DISABLE KEYS */;
INSERT INTO `dependant` VALUES (9,'aSs',2,19,1613121015,1613121015,2,2),(10,'dupri jr',6,30,1615447555,1615447555,2,2),(11,'Amina Mohammed',7,30,1615447593,1615447593,2,2),(12,'Peter',6,31,1619535463,1619535463,18,18),(13,'Jane',7,31,1619535476,1619535476,18,18),(14,'Peter',2,25,1619608788,1619608788,18,18);
/*!40000 ALTER TABLE `dependant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disability_type`
--

DROP TABLE IF EXISTS `disability_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `disability_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disability_type`
--

LOCK TABLES `disability_type` WRITE;
/*!40000 ALTER TABLE `disability_type` DISABLE KEYS */;
INSERT INTO `disability_type` VALUES (1,'Mental','mental inability',1612766890,1612766890,2,2),(2,'Physical','physical gift',1612766914,1612766914,2,2),(3,'Visual Impairment','Visual Impairment',1612955478,1612955478,2,2),(4,'Auditory','',1612955519,1612955519,2,2),(5,'Autism','',1612955535,1612955535,2,2),(6,'Acquired Brain Damage','',1612955552,1612955552,2,2),(7,'Other','Any other disability',1612955575,1612955575,2,2);
/*!40000 ALTER TABLE `disability_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donor`
--

DROP TABLE IF EXISTS `donor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donor`
--

LOCK TABLES `donor` WRITE;
/*!40000 ALTER TABLE `donor` DISABLE KEYS */;
INSERT INTO `donor` VALUES (1,'UNTF','',1617784135,1617784135,18,18),(2,'UNHCR','',1617784150,1617784150,18,18),(3,'GIZ','',1617784166,1617784166,18,18),(4,'AFSC','',1617784178,1617784178,18,18);
/*!40000 ALTER TABLE `donor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_of_torture`
--

DROP TABLE IF EXISTS `form_of_torture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form_of_torture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `type` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_of_torture`
--

LOCK TABLES `form_of_torture` WRITE;
/*!40000 ALTER TABLE `form_of_torture` DISABLE KEYS */;
INSERT INTO `form_of_torture` VALUES (2,'Physical','Physical harm',NULL,1612950000,1612950000,2,2),(3,'Psychological','Psychological',NULL,1612950029,1612950029,2,2),(4,'Sexual','Sexual',NULL,1612950035,1612950090,2,2);
/*!40000 ALTER TABLE `form_of_torture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Male',1611138571,1611138571,2,2),(2,'Female',1611138580,1611138580,2,2),(3,'Other',1611138589,1611138589,2,2);
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `identification_training_status`
--

DROP TABLE IF EXISTS `identification_training_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `identification_training_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(150) DEFAULT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identification_training_status`
--

LOCK TABLES `identification_training_status` WRITE;
/*!40000 ALTER TABLE `identification_training_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `identification_training_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `identification_training_target`
--

DROP TABLE IF EXISTS `identification_training_target`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `identification_training_target` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `target_description` varchar(150) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identification_training_target`
--

LOCK TABLES `identification_training_target` WRITE;
/*!40000 ALTER TABLE `identification_training_target` DISABLE KEYS */;
/*!40000 ALTER TABLE `identification_training_target` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `identification_type`
--

DROP TABLE IF EXISTS `identification_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `identification_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identification` varchar(150) DEFAULT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identification_type`
--

LOCK TABLES `identification_type` WRITE;
/*!40000 ALTER TABLE `identification_type` DISABLE KEYS */;
INSERT INTO `identification_type` VALUES (1,'ID','National ID',1611138717,1611138717,2,2),(2,'Passport','passport',1611138732,1611138732,2,2);
/*!40000 ALTER TABLE `identification_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intervention` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intervention_type_id` varchar(255) DEFAULT NULL,
  `case_id` varchar(255) DEFAULT NULL,
  `situation_description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `court_case` int(11) DEFAULT NULL,
  `police_case` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `counseling_intake_form` varchar(255) DEFAULT NULL,
  `intervention_details` text,
  `office_id` int(11) DEFAULT NULL,
  `agency_id` varchar(255) DEFAULT NULL,
  `sgbv` varchar(255) DEFAULT NULL,
  `referal_file` varchar(255) DEFAULT NULL,
  `consent_scan` varchar(255) DEFAULT NULL,
  `legal_representation_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-intervention-court_case` (`court_case`),
  KEY `idx-intervention-police_case` (`police_case`),
  KEY `idx-intervention-client_id` (`client_id`),
  CONSTRAINT `fk-intervention-court_case` FOREIGN KEY (`court_case`) REFERENCES `court_cases` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-intervention-police_case` FOREIGN KEY (`police_case`) REFERENCES `police_cases` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intervention`
--

LOCK TABLES `intervention` WRITE;
/*!40000 ALTER TABLE `intervention` DISABLE KEYS */;
INSERT INTO `intervention` VALUES (1,'1,2','1','testing',1611746775,1611746775,2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'1','4','test',1612864445,1612864445,2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'1','4','test',1612864605,1612864605,2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'1','4','test',1612864615,1612864615,2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'1','4','test',1612865007,1612865007,2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'2,3,5','3','Counselling',1613503293,1613994750,2,17,NULL,NULL,NULL,NULL,'just some details',4,'referal to agency',NULL,NULL,NULL,NULL),(20,'1','4','Appeal with RAB',1613503451,1613503451,2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'1','1','Legal advice',1613506040,1613506040,2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'1,2','7','kjhgfds',1613544499,1613544499,17,17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(91,'2','15','',1622752428,1622752428,2,2,NULL,NULL,31,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL),(92,'2','1',NULL,1622752550,1622752550,2,2,NULL,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(93,'2','1',NULL,1622752550,1622752550,2,2,NULL,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(94,'2','1',NULL,1622752550,1622752550,2,2,NULL,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(95,'2','1',NULL,1622752550,1622752550,2,2,NULL,NULL,22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(96,'2','1',NULL,1622752550,1622752550,2,2,NULL,NULL,23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(97,'2','3','Test Group Counsel',1622760918,1622760931,2,2,NULL,NULL,27,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL),(98,'2','1','Group Counselling Code: 1340 & Session No: se-30302',1622761177,1622761177,2,2,NULL,NULL,19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(99,'2','1','Group Counselling Code: 1340 & Session No: se-30302',1622761177,1622761177,2,2,NULL,NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(100,'2','1','Group Counselling Code: 1340 & Session No: se-30302',1622761177,1622761177,2,2,NULL,NULL,21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(101,'2','1','Group Counselling Code: 1340 & Session No: se-30302',1622761177,1622761177,2,2,NULL,NULL,22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(102,'2','1','Group Counselling Code: 1340 & Session No: se-30302',1622761177,1622761177,2,2,NULL,NULL,23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(103,'2','1','Group Counselling Code: 1340 & Session No: se-30302',1622761177,1622761177,2,2,NULL,NULL,24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(104,'2','1','Group Counselling Code: 1340 & Session No: se-30302',1622761177,1622761177,2,2,NULL,NULL,25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(105,'2','1','Group Counselling Code: 1340 & Session No: se-30302',1622761177,1622761177,2,2,NULL,NULL,26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(106,'2','1','Group Counselling Code: 1340 & Session No: se-30302',1622761177,1622761177,2,2,NULL,NULL,27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `intervention` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intervention_attachment`
--

DROP TABLE IF EXISTS `intervention_attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intervention_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intervention_id` int(11) DEFAULT NULL,
  `filename` varchar(150) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `mime` varchar(255) DEFAULT NULL,
  `doc_path` varchar(255) DEFAULT NULL,
  `upload_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-intervention_attachment-intervention_id` (`intervention_id`),
  KEY `idx-intervention_attachment-upload_id` (`upload_id`),
  CONSTRAINT `fk-intervention_attachment-intervention_id` FOREIGN KEY (`intervention_id`) REFERENCES `intervention` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-intervention_attachment-upload_id` FOREIGN KEY (`upload_id`) REFERENCES `intervention_upload` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intervention_attachment`
--

LOCK TABLES `intervention_attachment` WRITE;
/*!40000 ALTER TABLE `intervention_attachment` DISABLE KEYS */;
INSERT INTO `intervention_attachment` VALUES (41,20,'1613503548-AJ+ Dadaab.png',1613503548,1613503548,2,2,NULL,'/uploads/multiple/interventions/1613503548-AJ+ Dadaab.png',NULL);
/*!40000 ALTER TABLE `intervention_attachment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intervention_budget_lines`
--

DROP TABLE IF EXISTS `intervention_budget_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intervention_budget_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intervention_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intervention_budget_lines`
--

LOCK TABLES `intervention_budget_lines` WRITE;
/*!40000 ALTER TABLE `intervention_budget_lines` DISABLE KEYS */;
INSERT INTO `intervention_budget_lines` VALUES (38,45,2018,4500,1621594841,1621594841,2,2),(47,44,2018,45000,1621853641,1621853641,2,2),(48,44,2019,55000,1621853672,1621853672,2,2),(49,45,2019,55000,1621853754,1621853754,2,2);
/*!40000 ALTER TABLE `intervention_budget_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intervention_progress_lines`
--

DROP TABLE IF EXISTS `intervention_progress_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intervention_progress_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intervention_id` int(11) DEFAULT NULL,
  `progress_update` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intervention_progress_lines`
--

LOCK TABLES `intervention_progress_lines` WRITE;
/*!40000 ALTER TABLE `intervention_progress_lines` DISABLE KEYS */;
INSERT INTO `intervention_progress_lines` VALUES (3,45,'Started a small business out of a small loan.',1621596397,1621596792,2,2),(4,45,'Joined a sacco',1621596638,1621596638,2,2);
/*!40000 ALTER TABLE `intervention_progress_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intervention_type`
--

DROP TABLE IF EXISTS `intervention_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intervention_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intervention_type` varchar(150) NOT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intervention_type`
--

LOCK TABLES `intervention_type` WRITE;
/*!40000 ALTER TABLE `intervention_type` DISABLE KEYS */;
INSERT INTO `intervention_type` VALUES (1,'Legal Advice','Legal Advice',1611745539,1611745539,2,2),(2,'Counselling','Counselling',1611745560,1611745560,2,2),(3,'Camp Relocation','Movement/ Transfer from one location to another',1612947292,1612947292,2,2),(4,'Security Interview Assesement','Security Interview Assesement',1612947367,1612947367,2,2),(5,'Referral to  partner agency','Referral to  partner agencies',1612947410,1612947498,2,2),(6,'Legal Representation','',1613560965,1613560965,2,2),(7,'RSD Appeal','appeal',1614321970,1614321970,17,17),(8,'Economic Empowerment','',1619688787,1619688787,18,18),(9,'Social Assistance','',1619689190,1619689190,18,18);
/*!40000 ALTER TABLE `intervention_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intervention_upload`
--

DROP TABLE IF EXISTS `intervention_upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intervention_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `intervention_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-intervention_upload-issue_id` (`issue_id`),
  CONSTRAINT `fk-intervention_upload-issue_id` FOREIGN KEY (`issue_id`) REFERENCES `casetype` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intervention_upload`
--

LOCK TABLES `intervention_upload` WRITE;
/*!40000 ALTER TABLE `intervention_upload` DISABLE KEYS */;
INSERT INTO `intervention_upload` VALUES (2,4,'Rejection letter','Rejection letter description',2,2,1611749234,1611749234,NULL),(3,4,'Statement of fact from RAS','Statement of fact from RAS desc',2,2,1611749283,1611749283,NULL),(4,4,'Form to enter appearance','Form to enter appearance desc',2,2,1611749312,1611749312,NULL),(5,4,'Memorandum of appeal','Memorandum of appeal desc',2,2,1611749341,1611749341,NULL),(6,4,'Proceedings','Proceedings desc',2,2,1611749371,1611749371,NULL),(7,4,'Submission and Authorities','Submission and Authorities desc',2,2,1611749397,1611749397,NULL),(8,4,'Decision of the appeal','Decision of the appeal desc',2,2,1611749421,1611749421,NULL),(9,NULL,'Referral Form','Referral Form',18,18,1618921826,1618921826,'5');
/*!40000 ALTER TABLE `intervention_upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intervention_vulnerability_upload_lines`
--

DROP TABLE IF EXISTS `intervention_vulnerability_upload_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intervention_vulnerability_upload_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intervention_id` int(11) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intervention_vulnerability_upload_lines`
--

LOCK TABLES `intervention_vulnerability_upload_lines` WRITE;
/*!40000 ALTER TABLE `intervention_vulnerability_upload_lines` DISABLE KEYS */;
INSERT INTO `intervention_vulnerability_upload_lines` VALUES (3,45,'Vulnerability Test 2','http://localhost:8081/uploads/potatocutter.pdf',1621602074,1621602074,2,2),(4,45,'Vulnerability Test 3','http://localhost:8081/uploads/download.pdf',1621602130,1621602130,2,2),(5,44,'Vulnerability Doc','http://localhost:8081/uploads/Nyakundigrinder.pdf',1621612501,1621612501,2,2);
/*!40000 ALTER TABLE `intervention_vulnerability_upload_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (1,'Amharic','',1613649624,1613649624,2,2),(2,'Oromo','',1613649658,1613649658,2,2),(3,'English','',1614840132,1614840132,2,2),(4,'Swahili','',1614840151,1614840151,2,2),(5,'French','',1614840169,1614840169,2,2);
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lawyer`
--

DROP TABLE IF EXISTS `lawyer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lawyer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lskId` varchar(150) NOT NULL,
  `cellNumber` varchar(15) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `website` varchar(80) DEFAULT NULL,
  `lawfirmName` varchar(150) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `full_names` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lawyer`
--

LOCK TABLES `lawyer` WRITE;
/*!40000 ALTER TABLE `lawyer` DISABLE KEYS */;
INSERT INTO `lawyer` VALUES (2,'1','','leila@rckkenya.org','','','1',NULL,1619682686,1619682686,18,18,'Leila Murithi'),(3,'2','','deborah@rckkenya.org','','','1',NULL,1619682718,1619682718,18,18,'Deborah Nyokabi'),(4,'3','','mitch@rckkenya.org','','','1',NULL,1619682810,1619682810,18,18,'Mitchel Ambasu'),(5,'4','','cecilia@rckkenya.org','','','1',NULL,1619682848,1619682848,18,18,'Cecilia Maina'),(6,'5','','lenah@rckkenya.org','','','1',NULL,1619682873,1619682873,18,18,'Lenah Moenga'),(7,'6','','imbosa@rckkenya.org','','','1',NULL,1619682896,1619682896,18,18,'Eileen Ibosa'),(8,'7','','venice@rckkenya.org','','','1',NULL,1619682932,1619682932,18,18,'Venice Kore');
/*!40000 ALTER TABLE `lawyer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lawyerrating`
--

DROP TABLE IF EXISTS `lawyerrating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lawyerrating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) NOT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lawyerrating`
--

LOCK TABLES `lawyerrating` WRITE;
/*!40000 ALTER TABLE `lawyerrating` DISABLE KEYS */;
/*!40000 ALTER TABLE `lawyerrating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `legal_representation`
--

DROP TABLE IF EXISTS `legal_representation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `legal_representation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `legal_representation`
--

LOCK TABLES `legal_representation` WRITE;
/*!40000 ALTER TABLE `legal_representation` DISABLE KEYS */;
/*!40000 ALTER TABLE `legal_representation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `magistrate`
--

DROP TABLE IF EXISTS `magistrate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `magistrate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `magistrate`
--

LOCK TABLES `magistrate` WRITE;
/*!40000 ALTER TABLE `magistrate` DISABLE KEYS */;
/*!40000 ALTER TABLE `magistrate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1610441131),('m130524_201442_init',1610441153),('m190124_110200_add_verification_token_column_to_user_table',1610441154),('m201202_101350_create_intervention_type_table',1610441154),('m201202_101836_create_casestatus_table',1610441155),('m201202_102118_create_caseOutcomes_table',1610441155),('m201202_102955_create_lawyer_table',1610441155),('m201202_103141_create_lawyerRating_table',1610441156),('m201202_103234_create_caseType_table',1610441156),('m201202_104112_create_policeStation_table',1610441157),('m201202_104239_create_user_group_table',1610441157),('m201202_104358_create_rsvp_status_table',1610441158),('m201202_104709_create_work_station_table',1610441158),('m201202_104925_create_refugee_camp_table',1610441158),('m201202_110026_create_user_profile_table',1610441163),('m201202_110748_create_refugee_table',1610441168),('m201202_110848_create_country_table',1610441168),('m201202_111002_create_demographics_table',1610441168),('m201202_111106_create_identification_type_table',1610441168),('m201202_112154_create_training_table',1610441169),('m201202_112245_create_identification_training_status_table',1610441169),('m201202_112355_create_identification_training_target_table',1610441169),('m201202_113116_create_intervention_table',1610441171),('m201202_113428_create_intervention_attachment_table',1610441173),('m201202_120235_add_mime_column_to_intervention_attachment_table',1610441173),('m201202_184948_create_police_table',1610441174),('m201202_191915_create_conflict_table',1610441175),('m201202_211029_add_full_names_column_to_lawyer_table',1610441176),('m201203_063552_create_gender_table',1610441176),('m201203_080430_create_case_register_table',1610441176),('m201203_084007_add_case_type_column_to_case_register_table',1610444055),('m210112_090331_create_police_uploads_table',1610702696),('m210112_100944_create_police_cases_table',1610456916),('m210112_101645_create_case_update_table',1610448898),('m210112_105936_create_magistrate_table',1610455868),('m210112_110439_create_court_proceeding_table',1610455868),('m210112_110707_create_counsellors_table',1610455868),('m210112_110904_create_court_case_category_table',1610455869),('m210112_111005_create_court_case_subcategory_table',1610455870),('m210112_111402_create_court_uploads_table',1610455871),('m210112_125014_create_police_docs_upload_table',1610702699),('m210112_125451_create_court_cases_table',1610456746),('m210112_130800_create_court_docs_uploads_table',1610702702),('m210119_131737_create_relationship_table',1611123475),('m210120_061551_create_rck_offices_table',1611123477),('m210120_070539_create_dependant_table',1611127110),('m210120_075628_create_mode_of_entry_table',1611129401),('m210120_080934_add_rck_column_to_refugee_table',1611130244),('m210121_064053_create_refugee_uploads_table',1611211265),('m210121_091131_create_refugee_docs_upload_table',1611221501),('m210121_093059_create_refugee_docs_upload_table',1611221580),('m210122_073821_add_rck_office_id_column_to_refugee_camp_table',1611301688),('m210122_074312_add_refugee_id_column_to_police_cases_table',1611301689),('m210122_074328_add_refugee_id_column_to_court_cases_table',1611301691),('m210122_074452_add_physical_address_column_to_refugee_table',1611301691),('m210122_092714_create_asylum_type_table',1611307752),('m210122_092752_create_source_of_info_table',1611307752),('m210122_092816_create_form_of_torture_table',1611307752),('m210122_092836_create_source_of_income_table',1611307753),('m210122_123833_create_court_proceeding_table',1611319200),('m210122_125501_create_court_case_proceeding_table',1611320158),('m210122_125536_create_police_case_proceeding_table',1611320160),('m210122_134429_create_nature_of_proceeding_table',1611323115),('m210127_094548_add_foreigns_column_to_intervention_table',1611740765),('m210127_100202_create_intervention_upload_table',1611741955),('m210127_100537_add_column_path_to_intervention_attachment_table',1611741955),('m210127_100916_add_path_column_to_intervention_attachment_table',1611742164),('m210127_113713_add_client_column_to_intervention_table',1611747442),('m210128_092012_create_training_table',1611825778),('m210128_094002_create_training_upload_table',1611826810),('m210131_210242_create_counseling_table',1612127114),('m210201_072236_add_counseling_intake_column_to_intervention_table',1612164164),('m210205_122659_add_id_no_column_to_refugee_table',1612528039),('m210205_133256_create_disability_type_table',1612532066),('m210205_133415_add_fields_for_refugee_column_to_refugee_table',1612532075),('m210208_092443_add_column_code_to_rck_offices_table',1612776297),('m210208_092811_add_code_column_to_rck_offices_table',1612776516),('m210209_090353_create_offence_table',1612861452),('m210210_063050_create_organizer_table',1612938665),('m210210_063833_add_organizer_id_column_to_training_table',1612939122),('m210210_064048_add_police_station_column_to_police_cases_table',1613121706),('m210210_065405_add_legal_counselor_column_to_court_cases_table',1612940102),('m210210_065450_add_police_station_column_to_police_cases_table',1612940104),('m210210_124625_add_subcat_id_column_to_court_docs_uploads_table',1612961694),('m210212_071848_create_language_table',1613121706),('m210212_073339_add_some_column_to_refugee_table',1613121706),('m210212_082701_add_some_column_to_refugee_table',1613121706),('m210222_092017_add_some_column_to_intervention_table',1613990905),('m210222_092337_add_some_column_to_refugee_table',1613990905),('m210222_103710_add_some_column_to_intervention_table',1613994387),('m210222_115833_create_agency_table',1614229610),('m210222_120146_create_agency_table',1614229762),('m210223_114206_create_security_interview_table',1614229762),('m210223_115906_create_counselling_intake_table',1614229762),('m210301_083753_add_date_column_to_police_case_proceeding_table',1614598196),('m210301_104501_add_email_phone_column_to_counsellors_table',1614598196),('m210302_092844_add_date_of_referal_column_to_counselling_intake_table',1614682401),('m210302_093358_add_next_appointment_date_column_to_counseling_table',1614682401),('m210303_125622_add_type_column_to_counseling_table',1614778723),('m210304_102439_add_role_column_to_user_table',1614928020),('m210304_143949_create_permission_table',1614928020),('m210304_152941_add_permissions_column_to_user_table',1614928020),('m210305_115748_add_status_column_to_counseling_table',1615393846),('m210330_173545_create_civil_offence_table',1617168542),('m210330_173620_create_donor_table',1617168542),('m210330_173940_add_consent_column_to_refugee_table',1617168542),('m210330_174018_add_consent_column_to_counseling_table',1617168542),('m210330_183441_add_sgbv_types_column_to_intervention_table',1617168542),('m210330_184720_add_groupings_column_to_training_table',1617168542),('m210331_055117_create_sgbv_type_table',1617177492),('m210331_060854_add_offence_type_column_to_offence_table',1617177492),('m210331_061734_create_training_type_table',1617177492),('m210331_075233_add_donor_id_column_to_training_table',1617177492),('m210332_184720_add_groupings_column_to_training_table',1617203998),('m210401_081503_add_offence_type_column_to_police_cases_table',1617286126),('m210401_081517_add_offence_type_column_to_court_cases_table',1617286126),('m210414_141542_add_consent_scan_column_to_refugee_table',1618473536),('m210414_142201_add_intervention_type_column_to_intervention_upload_table',1618473536),('m210414_142711_add_group_and_family_column_to_training_table',1618473536),('m210415_071810_add_consent_scan_column_to_intervention_table',1618473536),('m210415_080817_add_group_and_family_column_to_counseling_table',1618480094),('m210421_100956_add_mandatory_column_to_refugee_uploads_table',1619013073),('m210421_101210_add_rck_office_column_to_training_table',1619013073),('m210421_102007_create_legal_representation_table',1619013073),('m210421_102239_add_legal_representation_column_to_intervention_table',1619013074),('m210422_104803_add_clients_column_to_counseling_table',1619535039),('m210519_212447_add_torture_manifestation_column_to_refugee_table',1621459497),('m210520_192609_create_training_client_type_lines_table',1621538779),('m210520_192851_create_training_client_nationality_lines_table',1621538942),('m210520_193050_create_training_attachment_lines_table',1621539063),('m210520_193417_create_intervention_budget_lines_table',1621539266),('m210520_193616_create_intervention_progress_lines_table',1621539389),('m210520_193829_create_intervention_vulnerability_upload_lines_table',1621539522);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mode_of_entry`
--

DROP TABLE IF EXISTS `mode_of_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mode_of_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mode_of_entry`
--

LOCK TABLES `mode_of_entry` WRITE;
/*!40000 ALTER TABLE `mode_of_entry` DISABLE KEYS */;
INSERT INTO `mode_of_entry` VALUES (1,'Trafficked','',1611138881,1612955611,2,2),(2,'Smuggled','',1612955628,1612955628,2,2),(3,'Other','Any other mode of entry',1612955702,1612955702,2,2);
/*!40000 ALTER TABLE `mode_of_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nature_of_proceeding`
--

DROP TABLE IF EXISTS `nature_of_proceeding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nature_of_proceeding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nature_of_proceeding`
--

LOCK TABLES `nature_of_proceeding` WRITE;
/*!40000 ALTER TABLE `nature_of_proceeding` DISABLE KEYS */;
INSERT INTO `nature_of_proceeding` VALUES (1,'Mention','A mention in court',1611323477,1611323477,2,2),(2,'Judgement','judgement of a case',1611323497,1611323497,2,2),(3,'Hearing','Hearing',1613560090,1613560090,2,2),(4,'Ruling','Ruling',1613560174,1613560174,2,2);
/*!40000 ALTER TABLE `nature_of_proceeding` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offence`
--

DROP TABLE IF EXISTS `offence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `offence_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offence`
--

LOCK TABLES `offence` WRITE;
/*!40000 ALTER TABLE `offence` DISABLE KEYS */;
INSERT INTO `offence` VALUES (1,'Theft','this is it',NULL,NULL,NULL,NULL,NULL),(2,'Residing outside the designated areas','Residing outside the designated areas',1613560253,1619603330,2,18,1),(3,'Lack of Proper Documentation','',1613637912,1619603416,2,18,1),(4,'Attempted defilement ','',1614868214,1619603354,2,18,2),(5,'Attempted rape ','',1614868257,1619603369,2,18,2),(6,'Kidnapping with intent to defile/rape ','',1614868279,1619603387,2,18,2),(7,'Indecent act with a child/adult','',1614868314,1619603402,2,18,2);
/*!40000 ALTER TABLE `offence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizer`
--

DROP TABLE IF EXISTS `organizer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organizer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizer`
--

LOCK TABLES `organizer` WRITE;
/*!40000 ALTER TABLE `organizer` DISABLE KEYS */;
INSERT INTO `organizer` VALUES (1,'RCK ','rck office',1612942660,1612942660,2,2),(2,'UNHCR','',1613638159,1613638159,2,2),(3,'AFSC','',1617784368,1617784368,18,18);
/*!40000 ALTER TABLE `organizer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` VALUES (1,'FILE_UPLOAD',50),(2,'FILE_DELETE',51),(3,'CLIENT_INDEX',100),(4,'CLIENT_CREATE',101),(5,'CLIENT_UPDATE',102),(6,'CLIENT_VIEW',103),(7,'CLIENT_FILES',104),(8,'POLICE_INDEX',200),(9,'POLICE_CREATE',201),(10,'POLICE_UPDATE',202),(11,'POLICE_VIEW',203),(12,'POLICE_FILES',204),(13,'COURT_INDEX',300),(14,'COURT_CREATE',301),(15,'COURT_UPDATE',302),(16,'COURT_VIEW',303),(17,'COURT_FILES',304),(18,'INTERVENTION_INDEX',400),(19,'INTERVENTION_CREATE',401),(20,'INTERVENTION_UPDATE',402),(21,'INTERVENTION_VIEW',403),(22,'INTERVENTION_FILES',404),(23,'TRAINING_INDEX',500),(24,'TRAINING_CREATE',501),(25,'TRAINING_UPDATE',502),(26,'TRAINING_VIEW',503),(27,'TRAINING_FILES',504),(28,'COUNSELING_INDEX',600),(29,'COUNSELING_CREATE',601),(30,'COUNSELING_UPDATE',602),(31,'COUNSELING_VIEW',603),(32,'COUNSELING_FILES',604);
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `police`
--

DROP TABLE IF EXISTS `police`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `police` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(150) NOT NULL,
  `station_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-police-station_id` (`station_id`),
  CONSTRAINT `fk-police-station_id` FOREIGN KEY (`station_id`) REFERENCES `policestation` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `police`
--

LOCK TABLES `police` WRITE;
/*!40000 ALTER TABLE `police` DISABLE KEYS */;
/*!40000 ALTER TABLE `police` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `police_case_proceeding`
--

DROP TABLE IF EXISTS `police_case_proceeding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `police_case_proceeding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `police_case_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-police_case_proceeding-police_case_id` (`police_case_id`),
  CONSTRAINT `fk-police_case_proceeding-police_case_id` FOREIGN KEY (`police_case_id`) REFERENCES `police_cases` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `police_case_proceeding`
--

LOCK TABLES `police_case_proceeding` WRITE;
/*!40000 ALTER TABLE `police_case_proceeding` DISABLE KEYS */;
INSERT INTO `police_case_proceeding` VALUES (1,'witnesses found','30 witnesses at the scene',9,1614323033,1614323033,17,17,NULL),(2,'test ','sdfghjk',9,1615394070,1615394070,2,2,1614729600),(3,'witnesses found','dfghjkl;',9,1615394215,1615394215,2,2,1614816000),(4,'witnesses found','wah',10,1615395125,1615395125,2,2,1614729600),(5,'','Test follow up',13,1615453091,1615453091,2,2,1615420800);
/*!40000 ALTER TABLE `police_case_proceeding` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `police_cases`
--

DROP TABLE IF EXISTS `police_cases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `police_cases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `contacts` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `police_station_id` int(11) DEFAULT NULL,
  `investigating_officer` varchar(255) DEFAULT NULL,
  `investigating_officer_contacts` varchar(100) DEFAULT NULL,
  `ob_number` varchar(255) DEFAULT NULL,
  `ob_details` varchar(255) DEFAULT NULL,
  `offence` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `complainant` varchar(255) NOT NULL,
  `first_instance_interview` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `refugee_id` int(11) DEFAULT NULL,
  `offence_id` int(11) DEFAULT NULL,
  `policestation` varchar(255) DEFAULT NULL,
  `offence_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-police_cases-police_station_id` (`police_station_id`),
  KEY `idx-police_cases-refugee_id` (`refugee_id`),
  KEY `idx-police_cases-offence_id` (`offence_id`),
  CONSTRAINT `fk-police_cases-offence_id` FOREIGN KEY (`offence_id`) REFERENCES `offence` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-police_cases-police_station_id` FOREIGN KEY (`police_station_id`) REFERENCES `policestation` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `police_cases`
--

LOCK TABLES `police_cases` WRITE;
/*!40000 ALTER TABLE `police_cases` DISABLE KEYS */;
INSERT INTO `police_cases` VALUES (9,'Pierre Nyizak','male','0998098098','45',NULL,'Alvin','090098098',')B/eewef','sdgs','','GOK','jjjhjj',1613637940,1613637940,2,2,NULL,NULL,'Jahnuri',NULL),(10,'Amina Mohammed','female','0998098098','40',1,'Peter','5555555','OB/3333','awrtfaw','','GOK','sdgfrsdrtgsdfg',1613651235,1613651235,2,2,24,2,'',NULL),(11,NULL,NULL,NULL,NULL,NULL,'korir','0734123121','ob800','ob details','','kamau','location issue',1614322447,1614322756,17,17,25,2,'Wajir police station',NULL),(12,'Alfred Amok','male','0998092','40',NULL,'Peter Oywer','0000000','OB/333/21','','','GOK','First Instance Interview',1615312635,1615312635,2,2,NULL,2,'Kilimani',NULL),(13,NULL,NULL,NULL,NULL,NULL,'Peter Oywer','5555555','OB/333/21','','','GOK','tttt',1615452927,1615452927,2,2,30,2,'Jahnuri',NULL),(14,NULL,NULL,NULL,NULL,NULL,'','','','','','GOK','',1619612497,1619612497,18,18,31,NULL,'',NULL);
/*!40000 ALTER TABLE `police_cases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `police_docs_upload`
--

DROP TABLE IF EXISTS `police_docs_upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `police_docs_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_path` text,
  `filename` varchar(255) DEFAULT NULL,
  `police_case_id` int(11) NOT NULL,
  `police_uploads_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-police_docs_upload-police_case_id` (`police_case_id`),
  KEY `idx-police_docs_upload-police_uploads_id` (`police_uploads_id`),
  CONSTRAINT `fk-police_docs_upload-police_case_id` FOREIGN KEY (`police_case_id`) REFERENCES `police_cases` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-police_docs_upload-police_uploads_id` FOREIGN KEY (`police_uploads_id`) REFERENCES `police_uploads` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `police_docs_upload`
--

LOCK TABLES `police_docs_upload` WRITE;
/*!40000 ALTER TABLE `police_docs_upload` DISABLE KEYS */;
INSERT INTO `police_docs_upload` VALUES (37,'/uploads/multiple/police_cases/1613651380-AJ+ Dadaab.png','1613651380-AJ+ Dadaab.png',10,NULL,1613651380,1613651380,2,2),(40,'/uploads/multiple/police_cases/1613651387-AZURE ENDPOINT ANSWER.png','1613651387-AZURE ENDPOINT ANSWER.png',10,NULL,1613651387,1613651387,2,2),(42,'/uploads/police_cases/1614322508-Best-Code-and-Text-Editors.png','1614322508-Best-Code-and-Text-Editors.png',11,1,1614322508,1614322508,17,17),(43,'/uploads/multiple/police_cases/1614322537-960x0.jpg','1614322537-960x0.jpg',11,NULL,1614322537,1614322537,17,17),(44,'/uploads/multiple/police_cases/1614322537-1545326756_codes_story.jpg','1614322537-1545326756_codes_story.jpg',11,NULL,1614322537,1614322537,17,17),(45,'/uploads/police_cases/1614322821-code-1.jpg.optimal.jpg','1614322821-code-1.jpg.optimal.jpg',11,1,1614322821,1614322821,17,17),(46,'/uploads/police_cases/1615377206-code-1.jpg.optimal.jpg','1615377206-code-1.jpg.optimal.jpg',10,4,1615377206,1615377206,2,2),(49,'/uploads/police_cases/1615393285-Capture heat.png','1615393285-Capture heat.png',10,4,1615393285,1615393285,2,2),(50,'/uploads/police_cases/1615393607-design test.png','1615393607-design test.png',10,3,1615393607,1615393607,2,2),(51,'/uploads/multiple/police_cases/1615393614-Capture heat.png','1615393614-Capture heat.png',10,NULL,1615393614,1615393614,2,2),(52,'/uploads/police_cases/1615452942-CMS screenshot 2.jpg','1615452942-CMS screenshot 2.jpg',13,1,1615452942,1615452942,2,2),(53,'/uploads/police_cases/1616090370-mnp.jpg','1616090370-mnp.jpg',13,1,1616090371,1616090371,2,2),(54,'/uploads/police_cases/1616090371-mnp.jpg','1616090371-mnp.jpg',13,1,1616090371,1616090371,2,2);
/*!40000 ALTER TABLE `police_docs_upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `police_uploads`
--

DROP TABLE IF EXISTS `police_uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `police_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `desc` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `police_uploads`
--

LOCK TABLES `police_uploads` WRITE;
/*!40000 ALTER TABLE `police_uploads` DISABLE KEYS */;
INSERT INTO `police_uploads` VALUES (1,'ID','ID Scan',NULL,1613733885,NULL,17),(2,'P3','P3 Form',NULL,1613733866,NULL,17),(3,'Statement','Police Statement',NULL,NULL,NULL,NULL),(4,'Charge_Sheet','Charge Sheet More Info',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `police_uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `policestation`
--

DROP TABLE IF EXISTS `policestation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `policestation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(150) NOT NULL,
  `closest_camp` varchar(150) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `policestation`
--

LOCK TABLES `policestation` WRITE;
/*!40000 ALTER TABLE `policestation` DISABLE KEYS */;
INSERT INTO `policestation` VALUES (1,'Kileleshwa','Nairobi','ngong road',1610605987,1610605987,2,2);
/*!40000 ALTER TABLE `policestation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rck_offices`
--

DROP TABLE IF EXISTS `rck_offices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rck_offices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rck_offices`
--

LOCK TABLES `rck_offices` WRITE;
/*!40000 ALTER TABLE `rck_offices` DISABLE KEYS */;
INSERT INTO `rck_offices` VALUES (2,'Nairobi','Nairobi Office',1612946463,1613715551,2,17,'NRB'),(3,'Kakuma','Kakuma',1612946501,1613715698,2,17,'KKM'),(4,'Dadaab','Dadaab Office',1612946553,1613715685,2,17,'DDB'),(5,'Garissa','Garissa Office',1612946603,1613715712,2,17,'GRS');
/*!40000 ALTER TABLE `rck_offices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refugee`
--

DROP TABLE IF EXISTS `refugee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refugee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `camp` int(11) DEFAULT NULL,
  `cell_number` varchar(15) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `country_of_origin` int(11) DEFAULT NULL,
  `demography_id` int(11) DEFAULT NULL,
  `date_of_birth` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  `conflict` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `nhcr_case_no` varchar(255) DEFAULT NULL,
  `return_refugee` int(11) DEFAULT NULL,
  `rck_no` varchar(255) DEFAULT NULL,
  `rck_office_id` int(11) NOT NULL,
  `arrival_date` int(11) DEFAULT NULL,
  `has_disability` int(11) DEFAULT NULL,
  `disability_desc` text,
  `asylum_status` int(11) DEFAULT NULL,
  `rsd_appointment_date` int(11) DEFAULT NULL,
  `reason_for_rsd_appointment` text,
  `source_of_info_abt_rck` text,
  `mode_of_entry_id` int(11) NOT NULL,
  `victim_of_turture` int(11) DEFAULT NULL,
  `form_of_torture` text,
  `source_of_income` varchar(255) DEFAULT NULL,
  `job_details` text,
  `has_work_permit` int(11) DEFAULT NULL,
  `arrested_due_to_lack_of_work_permit` int(11) DEFAULT NULL,
  `interested_in_work_permit` int(11) DEFAULT NULL,
  `interested_in_citizenship` int(11) DEFAULT NULL,
  `physical_address` varchar(255) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `id_no` varchar(255) DEFAULT NULL,
  `source_of_info_id` varchar(250) DEFAULT NULL,
  `source_of_income_id` varchar(255) DEFAULT NULL,
  `form_of_torture_id` varchar(255) DEFAULT NULL,
  `disability_type_id` varchar(255) DEFAULT NULL,
  `languages` varchar(255) DEFAULT NULL,
  `interpreter` tinyint(1) DEFAULT NULL,
  `dependants` int(11) DEFAULT NULL,
  `old_rck` varchar(255) DEFAULT NULL,
  `custom_language` varchar(255) DEFAULT NULL,
  `spoken_languages` text,
  `consent` int(11) DEFAULT NULL,
  `consent_scan` varchar(255) DEFAULT NULL,
  `torture_manifestation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-refugee-user_group_id` (`user_group_id`),
  KEY `idx-refugee-user_id` (`user_id`),
  KEY `idx-refugee-camp` (`camp`),
  KEY `idx-refugee-rck_office_id` (`rck_office_id`),
  KEY `idx-refugee-mode_of_entry_id` (`mode_of_entry_id`),
  CONSTRAINT `fk-refugee-camp` FOREIGN KEY (`camp`) REFERENCES `refugee_camp` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-refugee-mode_of_entry_id` FOREIGN KEY (`mode_of_entry_id`) REFERENCES `mode_of_entry` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-refugee-rck_office_id` FOREIGN KEY (`rck_office_id`) REFERENCES `rck_offices` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refugee`
--

LOCK TABLES `refugee` WRITE;
/*!40000 ALTER TABLE `refugee` DISABLE KEYS */;
INSERT INTO `refugee` VALUES (19,'Gideon','','Ngeno',4,NULL,'',NULL,'00000000','',1,5,NULL,1970,NULL,NULL,1612958438,1613121753,2,2,'65657657657',NULL,'-19-2021',2,1612224000,1,'',2,0,'','',3,1,'','','',0,0,1,1,'Jamhuri',NULL,'',NULL,'6','2',NULL,'',NULL,1,'','',NULL,NULL,NULL,NULL),(20,'Fatuma','Omar','Rashid',4,NULL,'',NULL,'123134141','r@f.com',2,1,NULL,1970,1,NULL,1613125065,1614321238,2,17,'',NULL,'-20-2021',3,1404086400,0,'',2,0,'','',1,1,'','','Remittance from  Sister in the UAE',1,0,1,0,'Block1',NULL,'',NULL,'1,6','2,4',NULL,'',NULL,5,'DDB/0023/19','','1,2',NULL,NULL,NULL),(21,'Ahmed','','Hassan',4,NULL,'',6,'00000000','gideon@rckkenya.org',1,2,NULL,1970,1,1,1613502879,1613502879,2,2,'',NULL,'-21-2021',4,1606780800,1,'',2,0,'','',3,1,'','','Washing cars',0,NULL,NULL,NULL,'Block1',NULL,'123567890',NULL,'3,7','2,3','3','',NULL,2,'','',NULL,NULL,NULL,NULL),(22,'Ahmed','','Hassan',4,NULL,'',NULL,'00000000','gideon@rckkenya.org',1,2,NULL,1970,1,1,1613503646,1613503646,2,2,'',NULL,'-22-2021',4,1606780800,1,'',2,0,'','',3,1,'','','Washing cars',0,0,0,0,'Block1',NULL,'123567890',NULL,'3,7','2,3','3','',NULL,2,'','',NULL,NULL,NULL,NULL),(23,'Peter','','Garang',4,NULL,'',NULL,'00000000','gideon@rckkenya.org',1,4,NULL,254361600,1,1,1613505379,1615395992,2,2,'',NULL,'-23-2021',4,1612396800,1,'',2,0,'','',3,0,'','','',0,0,0,0,'Block56',NULL,'76767676',NULL,'7',NULL,'2','',NULL,5,'','',NULL,NULL,NULL,NULL),(24,'Amina','','Mohammed',4,NULL,'',6,'8888888','gideon@rckkenya.org',2,1,NULL,1980,1,1,1613650154,1613650723,2,2,'',NULL,'-24-2021',4,1612915200,0,'',1,1615593600,'RSD ','',3,1,'','Mixed','',0,0,0,1,'Block 56',NULL,'',NULL,'2,7','2,3',NULL,'1',NULL,3,'','',NULL,NULL,NULL,NULL),(25,'david','Razak','mwangi',4,NULL,'',NULL,'07876543','abkorir@gmail.com',2,5,NULL,2001,1,2,1614321439,1614321439,17,17,'NHCR65',NULL,'RCK-NRB-25-2021',2,1612915200,0,'',2,0,'','',2,0,'','teacher',NULL,1,NULL,NULL,NULL,'kangemi',NULL,'324321789',NULL,'2',NULL,NULL,'1',1,2,'old rck no',NULL,'2',NULL,NULL,NULL),(26,'Mohammed','Amin','Ali',4,NULL,'',8,'453534563','',1,2,NULL,0,1,1,1614841035,1614841035,2,2,'',NULL,'RCK-KKM-26-2021',3,1614470400,0,'',2,0,'','',1,1,'','Hawking Vitenge',NULL,1,NULL,NULL,NULL,'Block 50',NULL,'445645747',NULL,'5,6','2,3',NULL,'2',1,3,'',NULL,'2',NULL,NULL,NULL),(27,'Mohammed','Amin','Ali',4,NULL,'',8,'453534563','',1,2,NULL,0,1,1,1614841036,1614841036,2,2,'',NULL,'RCK-KKM-27-2021',3,1614470400,0,'',2,0,'','',1,1,'','Hawking Vitenge',NULL,1,NULL,NULL,NULL,'Block 50',NULL,'445645747',NULL,'5,6','2,3',NULL,'2',1,3,'',NULL,'2',NULL,NULL,NULL),(28,'Amina','Shiksha','Ali',4,NULL,'',6,'8888855','',2,5,NULL,915408000,1,1,1614841805,1614841805,2,2,'',NULL,'RCK-DDB-28-2021',4,1614556800,1,'',1,1615248000,'','',2,0,'','',NULL,0,0,1,0,'blOCK 4',NULL,'',NULL,'7',NULL,'2',NULL,0,4,'',NULL,'2,3',NULL,NULL,NULL),(29,'Abdi','Mohammed','Razak',4,NULL,'',NULL,'','ff',1,1,NULL,315532800,1,1,1614843859,1614843859,2,2,'',NULL,'RCK-NRB-29-2021',2,1540857600,0,'',2,0,'','',1,1,'','Clothes business',NULL,0,0,1,0,'Easleigh section 5',NULL,'86554554',NULL,'5','2,3',NULL,NULL,NULL,6,'',NULL,'1,4',NULL,NULL,NULL),(30,'Jamain','','Dupri',4,NULL,'',NULL,'0000000','jd@gmail.com',1,9,NULL,315532800,1,NULL,1615138365,1622748548,2,2,'',NULL,'RCK-KKM-30-2021',3,1614556800,0,'',1,1616630400,'Appeal','',1,0,'','',NULL,1,NULL,NULL,NULL,'',NULL,'','1,2','3',NULL,NULL,NULL,NULL,4,'',NULL,NULL,0,NULL,''),(31,'Gideon','','Ngeno',4,NULL,'',NULL,'','gideon@rckkenya.org',1,1,NULL,631152000,1,1,1619534459,1621461051,18,2,'',NULL,'RCK-NRB-31-2021',2,1612137600,0,'',2,0,'','',3,1,'','Formal employment',NULL,0,0,0,NULL,'Jamhuri',NULL,'292928348','1,2','2','2,4',NULL,NULL,0,2,'',NULL,'3,4',1,NULL,'Direct');
/*!40000 ALTER TABLE `refugee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refugee_camp`
--

DROP TABLE IF EXISTS `refugee_camp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refugee_camp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `county` int(11) DEFAULT NULL,
  `subcounty` int(11) DEFAULT NULL,
  `locality_description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `rck_office` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-refugee_camp-rck_office` (`rck_office`),
  CONSTRAINT `fk-refugee_camp-rck_office` FOREIGN KEY (`rck_office`) REFERENCES `rck_offices` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refugee_camp`
--

LOCK TABLES `refugee_camp` WRITE;
/*!40000 ALTER TABLE `refugee_camp` DISABLE KEYS */;
INSERT INTO `refugee_camp` VALUES (4,'Ifo',7,30,'Dadaab',1612946692,1612946716,2,2,4),(5,'Dagahaley',7,30,'Dadaab',1612946760,1612946760,2,2,4),(6,'Hagadera',7,30,'',1612946792,1612946792,2,2,4),(7,'Kakuma 1',23,124,'',1612946843,1612946843,2,2,3),(8,'Kalobeyei',23,124,'Kalobeyei',1612946883,1612946883,2,2,3);
/*!40000 ALTER TABLE `refugee_camp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refugee_docs_upload`
--

DROP TABLE IF EXISTS `refugee_docs_upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refugee_docs_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_path` text,
  `filename` varchar(255) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `upload_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-refugee_docs_upload-model_id` (`model_id`),
  KEY `idx-refugee_docs_upload-upload_id` (`upload_id`),
  CONSTRAINT `fk-refugee_docs_upload-upload_id` FOREIGN KEY (`upload_id`) REFERENCES `refugee_uploads` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refugee_docs_upload`
--

LOCK TABLES `refugee_docs_upload` WRITE;
/*!40000 ALTER TABLE `refugee_docs_upload` DISABLE KEYS */;
INSERT INTO `refugee_docs_upload` VALUES (78,'/uploads/multiple/refugees/1612958577-CMS screenshot 2.jpg','1612958577-CMS screenshot 2.jpg',19,NULL,NULL,NULL,NULL,NULL),(79,'/uploads/multiple/refugees/1613125187-AZURE ENDPOINT ANSWER.png','1613125187-AZURE ENDPOINT ANSWER.png',20,NULL,NULL,NULL,NULL,NULL),(80,'/uploads/multiple/refugees/1613503664-AJ+ Dadaab.png','1613503664-AJ+ Dadaab.png',22,NULL,NULL,NULL,NULL,NULL),(81,'/uploads/multiple/refugees/1613503668-AJ+ Dadaab.png','1613503668-AJ+ Dadaab.png',22,NULL,NULL,NULL,NULL,NULL),(82,'/uploads/multiple/refugees/1613505598-AZURE ENDPOINT ANSWER.png','1613505598-AZURE ENDPOINT ANSWER.png',23,NULL,NULL,NULL,NULL,NULL),(83,'/uploads/multiple/refugees/1613505598-CMS screenshot 2.jpg','1613505598-CMS screenshot 2.jpg',23,NULL,NULL,NULL,NULL,NULL),(84,'/uploads/multiple/refugees/1613505598-CMS screenshot 3.jpg','1613505598-CMS screenshot 3.jpg',23,NULL,NULL,NULL,NULL,NULL),(85,'/uploads/refugees/1613650197-AZURE ENDPOINT ANSWER.png','1613650197-AZURE ENDPOINT ANSWER.png',24,3,NULL,NULL,NULL,NULL),(86,'/uploads/refugees/1613650265-CMS screenshot 2.jpg','1613650265-CMS screenshot 2.jpg',24,4,NULL,NULL,NULL,NULL),(87,'/uploads/multiple/refugees/1613650385-CMS screenshot 1.jpg','1613650385-CMS screenshot 1.jpg',24,NULL,NULL,NULL,NULL,NULL),(88,'/uploads/multiple/refugees/1613650385-CMS screenshot 2.jpg','1613650385-CMS screenshot 2.jpg',24,NULL,NULL,NULL,NULL,NULL),(89,'/uploads/multiple/refugees/1613650385-CMS screenshot 3.jpg','1613650385-CMS screenshot 3.jpg',24,NULL,NULL,NULL,NULL,NULL),(90,'/uploads/refugees/1613745962-design test.png','1613745962-design test.png',24,3,NULL,NULL,NULL,NULL),(91,'/uploads/multiple/refugees/1614321484-code-1.jpg.optimal.jpg','1614321484-code-1.jpg.optimal.jpg',25,NULL,NULL,NULL,NULL,NULL),(92,'/uploads/multiple/refugees/1614841083-AJ+ Dadaab.png','1614841083-AJ+ Dadaab.png',27,NULL,NULL,NULL,NULL,NULL),(95,'/uploads/multiple/refugees/1614841243-CMS screenshot 3.jpg','1614841243-CMS screenshot 3.jpg',27,NULL,NULL,NULL,NULL,NULL),(96,'/uploads/multiple/refugees/1614841243-CMS screenshot 4.jpg','1614841243-CMS screenshot 4.jpg',27,NULL,NULL,NULL,NULL,NULL),(99,'/uploads/refugees/1614843552-CMS screenshot 3.jpg','1614843552-CMS screenshot 3.jpg',28,4,NULL,NULL,NULL,NULL),(100,'/uploads/multiple/refugees/1614843877-AZURE ENDPOINT ANSWER.png','1614843877-AZURE ENDPOINT ANSWER.png',29,NULL,NULL,NULL,NULL,NULL),(102,'/uploads/multiple/refugees/1614843877-CMS screenshot 4.jpg','1614843877-CMS screenshot 4.jpg',29,NULL,NULL,NULL,NULL,NULL),(104,'/uploads/multiple/refugees/1614844143-CMS screenshot 3.jpg','1614844143-CMS screenshot 3.jpg',29,NULL,NULL,NULL,NULL,NULL),(105,'/uploads/refugees/1614944796-960x0.jpg','1614944796-960x0.jpg',24,5,NULL,NULL,NULL,NULL),(106,'/uploads/refugees/1615398920-design test.png','1615398920-design test.png',28,3,NULL,NULL,NULL,NULL),(107,'/uploads/refugees/1615398932-Capture heat.png','1615398932-Capture heat.png',28,6,NULL,NULL,NULL,NULL),(108,'/uploads/refugees/1615400720-cicd.png','1615400720-cicd.png',26,1,NULL,NULL,NULL,NULL),(109,'/uploads/refugees/1615448385-AZURE ENDPOINT ANSWER.png','1615448385-AZURE ENDPOINT ANSWER.png',30,5,NULL,NULL,NULL,NULL),(110,'/uploads/refugees/1615448405-CMS screenshot 3.jpg','1615448405-CMS screenshot 3.jpg',30,6,NULL,NULL,NULL,NULL),(112,'/uploads/multiple/refugees/1615448424-CMS screenshot 3.jpg','1615448424-CMS screenshot 3.jpg',30,NULL,NULL,NULL,NULL,NULL),(113,'/uploads/refugees/1615559941-EUR_Palette_Stapel.jpg','1615559941-EUR_Palette_Stapel.jpg',30,3,NULL,NULL,NULL,NULL),(114,'/uploads/refugees/1615559959-images (1).png','1615559959-images (1).png',30,4,NULL,NULL,NULL,NULL),(117,'/uploads/refugees/1616092168-code-1.jpg.optimal.jpg','1616092168-code-1.jpg.optimal.jpg',28,3,NULL,NULL,NULL,NULL),(118,'/uploads/refugees/1619534483-Sarah Wako Badge.pdf','1619534483-Sarah Wako Badge.pdf',31,1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `refugee_docs_upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refugee_uploads`
--

DROP TABLE IF EXISTS `refugee_uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refugee_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `type` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `mandatory` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refugee_uploads`
--

LOCK TABLES `refugee_uploads` WRITE;
/*!40000 ALTER TABLE `refugee_uploads` DISABLE KEYS */;
INSERT INTO `refugee_uploads` VALUES (1,'refugee_id','Refugee Id',2,NULL,1615400675,NULL,2,NULL),(2,'minor_pass','Minor Pass',2,NULL,1615400693,NULL,2,NULL),(3,'asylumSeekerPass','Asylum Seeker Pass',1,NULL,NULL,NULL,NULL,NULL),(4,'asylumSeekerCertificate','Asylum Seeker Certificate',1,1611216105,1611216105,2,2,NULL),(5,'proofOfRegistration','Proof of Registration',1,1611216134,1611216134,2,2,NULL),(6,'UNHCRMandate','UNHCR Mandate',1,1611216180,1611216180,2,2,NULL),(7,'waitingSlip','Waiting Slip',1,1611216202,1611216202,2,2,NULL),(8,'UNHCRLetterOfRecognition','UNHCR Letter Of Recognition',1,1611216245,1611216245,2,2,NULL),(9,'movementPass','Movement Pass',1,1611216339,1611216339,2,2,NULL),(10,'Client Consent','Client Consent',NULL,1619533948,1619533948,18,18,1);
/*!40000 ALTER TABLE `refugee_uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relationship`
--

DROP TABLE IF EXISTS `relationship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `relationship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relationship`
--

LOCK TABLES `relationship` WRITE;
/*!40000 ALTER TABLE `relationship` DISABLE KEYS */;
INSERT INTO `relationship` VALUES (1,'Cousin',1611125685,1611125685,2,2),(2,'Brother',1611125699,1611125699,2,2),(3,'Sister',1611125709,1611125709,2,2),(4,'Mother',1611125718,1611125718,2,2),(5,'Father',1611125727,1611125727,2,2),(6,'Son',1611125737,1611125737,2,2),(7,'Daughter',1611125746,1611125746,2,2),(8,'Wife',1619683091,1619683091,18,18);
/*!40000 ALTER TABLE `relationship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rsvp_status`
--

DROP TABLE IF EXISTS `rsvp_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rsvp_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) DEFAULT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rsvp_status`
--

LOCK TABLES `rsvp_status` WRITE;
/*!40000 ALTER TABLE `rsvp_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `rsvp_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `security_interview`
--

DROP TABLE IF EXISTS `security_interview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `security_interview` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `unhcr_case_no` varchar(255) DEFAULT NULL,
  `refugee_no` varchar(255) DEFAULT NULL,
  `nationality` int(11) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `dob` int(11) DEFAULT NULL,
  `education_level` varchar(255) DEFAULT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `names_of_parents` text,
  `siblings` varchar(255) DEFAULT NULL,
  `ethnicity` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `dependants` text,
  `reason_for_flight` text,
  `flight` varchar(255) DEFAULT NULL,
  `life_in_country_of_asylum` text,
  `assessment` text,
  `intervention_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-security_interview-intervention_id` (`intervention_id`),
  CONSTRAINT `fk-security_interview-intervention_id` FOREIGN KEY (`intervention_id`) REFERENCES `intervention` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `security_interview`
--

LOCK TABLES `security_interview` WRITE;
/*!40000 ALTER TABLE `security_interview` DISABLE KEYS */;
/*!40000 ALTER TABLE `security_interview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sgbv_type`
--

DROP TABLE IF EXISTS `sgbv_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sgbv_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sgbv_type`
--

LOCK TABLES `sgbv_type` WRITE;
/*!40000 ALTER TABLE `sgbv_type` DISABLE KEYS */;
INSERT INTO `sgbv_type` VALUES (1,'Rape','',1619683358,1619683358,18,18),(2,'Attempted Rape','',1619683380,1619683380,18,18);
/*!40000 ALTER TABLE `sgbv_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `source_of_income`
--

DROP TABLE IF EXISTS `source_of_income`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `source_of_income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `type` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `source_of_income`
--

LOCK TABLES `source_of_income` WRITE;
/*!40000 ALTER TABLE `source_of_income` DISABLE KEYS */;
INSERT INTO `source_of_income` VALUES (1,'Unemployed','',NULL,1612774329,1612950212,2,2),(2,'Formal Employment','Formal Employment',NULL,1612950160,1612950160,2,2),(3,'Informal Employment','Informal Employment',NULL,1612950182,1612950182,2,2),(4,'Formal Business','Running a registered business venture',NULL,1612950265,1612950265,2,2),(5,'Informal Business','Running an informal business',NULL,1612950304,1612950304,2,2),(6,'Remittance','Remittance from family  members living abroad',NULL,1612950349,1612950349,2,2),(7,'UNHCR/WFP','Food rations/Accomodation by NGOs',NULL,1612950465,1612950465,2,2);
/*!40000 ALTER TABLE `source_of_income` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `source_of_info`
--

DROP TABLE IF EXISTS `source_of_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `source_of_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `type` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `source_of_info`
--

LOCK TABLES `source_of_info` WRITE;
/*!40000 ALTER TABLE `source_of_info` DISABLE KEYS */;
INSERT INTO `source_of_info` VALUES (1,'Social Media','socials',NULL,1612852380,1612852380,2,2),(2,'Referral from other NGOs','',NULL,1612955889,1612955889,2,2),(3,'RCK Monitors','',NULL,1612955892,1612955928,2,2),(4,'Refugee Community Members','',NULL,1612955959,1612955959,2,2);
/*!40000 ALTER TABLE `source_of_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcounties`
--

DROP TABLE IF EXISTS `subcounties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subcounties` (
  `SubCountyID` int(11) NOT NULL AUTO_INCREMENT,
  `SubCountyName` varchar(45) DEFAULT NULL,
  `CountyID` int(11) DEFAULT NULL,
  `Notes` text,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) DEFAULT NULL,
  `Deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`SubCountyID`)
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcounties`
--

LOCK TABLES `subcounties` WRITE;
/*!40000 ALTER TABLE `subcounties` DISABLE KEYS */;
INSERT INTO `subcounties` VALUES (1,'CHANGAMWE',1,NULL,'2020-07-02 11:18:58',NULL,0),(2,'JOMVU',1,NULL,'2020-07-02 11:18:58',NULL,0),(3,'KISAUNI',1,NULL,'2020-07-02 11:18:58',NULL,0),(4,'NYALI',1,NULL,'2020-07-02 11:18:58',NULL,0),(5,'LIKONI',1,NULL,'2020-07-02 11:18:58',NULL,0),(6,'MVITA',1,NULL,'2020-07-02 11:18:58',NULL,0),(7,'MSAMBWENI',2,NULL,'2020-07-02 11:18:58',NULL,0),(8,'LUNGA LUNGA',2,NULL,'2020-07-02 11:18:58',NULL,0),(9,'MATUGA',2,NULL,'2020-07-02 11:18:58',NULL,0),(10,'KINAGO',2,NULL,'2020-07-02 11:18:58',NULL,0),(11,'KILIFI NORTH',3,NULL,'2020-07-02 11:18:58',NULL,0),(12,'KILIFI SOUTH',3,NULL,'2020-07-02 11:18:58',NULL,0),(13,'KALOLENI',3,NULL,'2020-07-02 11:18:58',NULL,0),(14,'RABAI',3,NULL,'2020-07-02 11:18:58',NULL,0),(15,'GANZE',3,NULL,'2020-07-02 11:18:58',NULL,0),(16,'MALINDI',3,NULL,'2020-07-02 11:18:58',NULL,0),(17,'MAGARINI',3,NULL,'2020-07-02 11:18:58',NULL,0),(18,'GARSEN',4,NULL,'2020-07-02 11:18:58',NULL,0),(19,'GALOLE',4,NULL,'2020-07-02 11:18:58',NULL,0),(20,'BURA',4,NULL,'2020-07-02 11:18:58',NULL,0),(21,'LAMU EAST',5,NULL,'2020-07-02 11:18:58',NULL,0),(22,'LAMU WEST',5,NULL,'2020-07-02 11:18:58',NULL,0),(23,'TAVETA',6,NULL,'2020-07-02 11:18:58',NULL,0),(24,'WUNDANYI',6,NULL,'2020-07-02 11:18:58',NULL,0),(25,'MWATATE',6,NULL,'2020-07-02 11:18:58',NULL,0),(26,'VOI',6,NULL,'2020-07-02 11:18:58',NULL,0),(27,'GARISSA TOWNSHIP',7,NULL,'2020-07-02 11:18:58',NULL,0),(28,'BALAMBALA',7,NULL,'2020-07-02 11:18:58',NULL,0),(29,'LAGDERA',7,NULL,'2020-07-02 11:18:58',NULL,0),(30,'DADAAB',7,NULL,'2020-07-02 11:18:58',NULL,0),(31,'FAFI',7,NULL,'2020-07-02 11:18:58',NULL,0),(32,'IJARA',7,NULL,'2020-07-02 11:18:58',NULL,0),(33,'WAJIR NORTH',8,NULL,'2020-07-02 11:18:58',NULL,0),(34,'WAJIR EAST',8,NULL,'2020-07-02 11:18:58',NULL,0),(35,'TARBAJ',8,NULL,'2020-07-02 11:18:58',NULL,0),(36,'WAJIR WEST',8,NULL,'2020-07-02 11:18:58',NULL,0),(37,'ELDAS',8,NULL,'2020-07-02 11:18:58',NULL,0),(38,'WAJIR SOUTH',8,NULL,'2020-07-02 11:18:58',NULL,0),(39,'MANDERA WEST',9,NULL,'2020-07-02 11:18:58',NULL,0),(40,'BANISSA',9,NULL,'2020-07-02 11:18:58',NULL,0),(41,'MANDERA NORTH',9,NULL,'2020-07-02 11:18:58',NULL,0),(42,'MANDERA SOUTH',9,NULL,'2020-07-02 11:18:58',NULL,0),(43,'MANDERA EAST',9,NULL,'2020-07-02 11:18:58',NULL,0),(44,'LAFEY',9,NULL,'2020-07-02 11:18:58',NULL,0),(45,'MOYALE',10,NULL,'2020-07-02 11:18:58',NULL,0),(46,'NORTH HORR',10,NULL,'2020-07-02 11:18:58',NULL,0),(47,'SAKU',10,NULL,'2020-07-02 11:18:58',NULL,0),(48,'LAISAMIS',10,NULL,'2020-07-02 11:18:58',NULL,0),(49,'ISIOLO NORTH',11,NULL,'2020-07-02 11:18:58',NULL,0),(50,'ISIOLO SOUTH',11,NULL,'2020-07-02 11:18:58',NULL,0),(51,'IGEMBE SOUTH',12,NULL,'2020-07-02 11:18:58',NULL,0),(52,'IGEMBE CENTRAL',12,NULL,'2020-07-02 11:18:58',NULL,0),(53,'IGEMBE NORTH',12,NULL,'2020-07-02 11:18:58',NULL,0),(54,'TIGANIA WEST',12,NULL,'2020-07-02 11:18:58',NULL,0),(55,'TIGANIA EAST',12,NULL,'2020-07-02 11:18:58',NULL,0),(56,'NORTH IMENTI',12,NULL,'2020-07-02 11:18:58',NULL,0),(57,'BUURI',12,NULL,'2020-07-02 11:18:58',NULL,0),(58,'CENTRAL IMENTI',12,NULL,'2020-07-02 11:18:58',NULL,0),(59,'SOUTH IMENTI',12,NULL,'2020-07-02 11:18:58',NULL,0),(60,'MAARA',13,NULL,'2020-07-02 11:18:58',NULL,0),(61,'CHUKA/IGAMBANG\'OMBE',13,NULL,'2020-07-02 11:18:58',NULL,0),(62,'THARAKA',13,NULL,'2020-07-02 11:18:58',NULL,0),(63,'MANYATTA',14,NULL,'2020-07-02 11:18:58',NULL,0),(64,'RUNYENJES',14,NULL,'2020-07-02 11:18:58',NULL,0),(65,'MBEERE SOUTH',14,NULL,'2020-07-02 11:18:58',NULL,0),(66,'MBEERE NORTH',14,NULL,'2020-07-02 11:18:58',NULL,0),(67,'MWINGI NORTH',15,NULL,'2020-07-02 11:18:58',NULL,0),(68,'MWINGI WEST',15,NULL,'2020-07-02 11:18:58',NULL,0),(69,'MWINGI CENTRAL',15,NULL,'2020-07-02 11:18:58',NULL,0),(70,'KITUI WEST',15,NULL,'2020-07-02 11:18:58',NULL,0),(71,'KITUI RURAL',15,NULL,'2020-07-02 11:18:58',NULL,0),(72,'KITUI CENTRAL',15,NULL,'2020-07-02 11:18:58',NULL,0),(73,'KITUI EAST',15,NULL,'2020-07-02 11:18:58',NULL,0),(74,'KITUI SOUTH',15,NULL,'2020-07-02 11:18:58',NULL,0),(75,'MASINGA',16,NULL,'2020-07-02 11:18:58',NULL,0),(76,'YATTA',16,NULL,'2020-07-02 11:18:58',NULL,0),(77,'KANGUNDO',16,NULL,'2020-07-02 11:18:58',NULL,0),(78,'MATUNGULU',16,NULL,'2020-07-02 11:18:58',NULL,0),(79,'KATHIANI',16,NULL,'2020-07-02 11:18:58',NULL,0),(80,'MAVOKO',16,NULL,'2020-07-02 11:18:58',NULL,0),(81,'MACHAKOS TOWN',16,NULL,'2020-07-02 11:18:58',NULL,0),(82,'MWALA',16,NULL,'2020-07-02 11:18:58',NULL,0),(83,'MBOONI',17,NULL,'2020-07-02 11:18:58',NULL,0),(84,'KILOME',17,NULL,'2020-07-02 11:18:58',NULL,0),(85,'KAITI',17,NULL,'2020-07-02 11:18:58',NULL,0),(86,'MAKUENI',17,NULL,'2020-07-02 11:18:58',NULL,0),(87,'KIBWEZI WEST',17,NULL,'2020-07-02 11:18:58',NULL,0),(88,'KIBWEZI EAST',17,NULL,'2020-07-02 11:18:58',NULL,0),(89,'KINANGOP',18,NULL,'2020-07-02 11:18:58',NULL,0),(90,'KIPIPIRI',18,NULL,'2020-07-02 11:18:58',NULL,0),(91,'OL KALOU',18,NULL,'2020-07-02 11:18:58',NULL,0),(92,'OL JORO OROK',18,NULL,'2020-07-02 11:18:58',NULL,0),(93,'NDARAGWA',18,NULL,'2020-07-02 11:18:58',NULL,0),(94,'TETU',19,NULL,'2020-07-02 11:18:58',NULL,0),(95,'KIENI',19,NULL,'2020-07-02 11:18:58',NULL,0),(96,'MATHIRA',19,NULL,'2020-07-02 11:18:58',NULL,0),(97,'OTHAYA',19,NULL,'2020-07-02 11:18:58',NULL,0),(98,'MUKURWENI',19,NULL,'2020-07-02 11:18:58',NULL,0),(99,'NYERI TOWN',19,NULL,'2020-07-02 11:18:58',NULL,0),(100,'MWEA',20,NULL,'2020-07-02 11:18:58',NULL,0),(101,'GICHUGU',20,NULL,'2020-07-02 11:18:58',NULL,0),(102,'NDIA',20,NULL,'2020-07-02 11:18:58',NULL,0),(103,'KIRINYAGA CENTRAL',20,NULL,'2020-07-02 11:18:58',NULL,0),(104,'KANGEMA',21,NULL,'2020-07-02 11:18:58',NULL,0),(105,'MATHIOYA',21,NULL,'2020-07-02 11:18:58',NULL,0),(106,'KIHARU',21,NULL,'2020-07-02 11:18:58',NULL,0),(107,'KIGUMO',21,NULL,'2020-07-02 11:18:58',NULL,0),(108,'MARAGWA',21,NULL,'2020-07-02 11:18:58',NULL,0),(109,'KANDARA',21,NULL,'2020-07-02 11:18:58',NULL,0),(110,'GATANGA',21,NULL,'2020-07-02 11:18:58',NULL,0),(111,'GATUNDU SOUTH',22,NULL,'2020-07-02 11:18:58',NULL,0),(112,'GATUNDU NORTH',22,NULL,'2020-07-02 11:18:58',NULL,0),(113,'JUJA',22,NULL,'2020-07-02 11:18:58',NULL,0),(114,'THIKA TOWN',22,NULL,'2020-07-02 11:18:58',NULL,0),(115,'RUIRU',22,NULL,'2020-07-02 11:18:58',NULL,0),(116,'GITHUNGURI',22,NULL,'2020-07-02 11:18:58',NULL,0),(117,'KIAMBU',22,NULL,'2020-07-02 11:18:58',NULL,0),(118,'KIAMBAA',22,NULL,'2020-07-02 11:18:58',NULL,0),(119,'KABETE',22,NULL,'2020-07-02 11:18:58',NULL,0),(120,'KIKUYU',22,NULL,'2020-07-02 11:18:58',NULL,0),(121,'LIMURU',22,NULL,'2020-07-02 11:18:58',NULL,0),(122,'LARI',22,NULL,'2020-07-02 11:18:58',NULL,0),(123,'TURKANA NORTH',23,NULL,'2020-07-02 11:18:58',NULL,0),(124,'TURKANA WEST',23,NULL,'2020-07-02 11:18:58',NULL,0),(125,'TURKANA CENTRAL',23,NULL,'2020-07-02 11:18:58',NULL,0),(126,'LOIMA',23,NULL,'2020-07-02 11:18:58',NULL,0),(127,'TURKANA SOUTH',23,NULL,'2020-07-02 11:18:58',NULL,0),(128,'TURKANA EAST',23,NULL,'2020-07-02 11:18:58',NULL,0),(129,'KAPENGURIA',24,NULL,'2020-07-02 11:18:58',NULL,0),(130,'SIGOR',24,NULL,'2020-07-02 11:18:58',NULL,0),(131,'KACHELIBA',24,NULL,'2020-07-02 11:18:58',NULL,0),(132,'POKOT SOUTH',24,NULL,'2020-07-02 11:18:58',NULL,0),(133,'SAMBURU WEST',25,NULL,'2020-07-02 11:18:58',NULL,0),(134,'SAMBURU NORTH',25,NULL,'2020-07-02 11:18:58',NULL,0),(135,'SAMBURU EAST',25,NULL,'2020-07-02 11:18:58',NULL,0),(136,'KWANZA',26,NULL,'2020-07-02 11:18:58',NULL,0),(137,'ENDEBESS',26,NULL,'2020-07-02 11:18:58',NULL,0),(138,'SABOTI',26,NULL,'2020-07-02 11:18:58',NULL,0),(139,'KIMININI',26,NULL,'2020-07-02 11:18:58',NULL,0),(140,'CHERANGANY',26,NULL,'2020-07-02 11:18:58',NULL,0),(141,'SOY',27,NULL,'2020-07-02 11:18:58',NULL,0),(142,'TURBO',27,NULL,'2020-07-02 11:18:58',NULL,0),(143,'MOIBEN',27,NULL,'2020-07-02 11:18:58',NULL,0),(144,'AINABKOI',27,NULL,'2020-07-02 11:18:58',NULL,0),(145,'KAPSERET',27,NULL,'2020-07-02 11:18:58',NULL,0),(146,'KESSES',27,NULL,'2020-07-02 11:18:58',NULL,0),(147,'MARAKWET EAST',28,NULL,'2020-07-02 11:18:58',NULL,0),(148,'MARAKWET WEST',28,NULL,'2020-07-02 11:18:58',NULL,0),(149,'KEIYO NORTH',28,NULL,'2020-07-02 11:18:58',NULL,0),(150,'KEIYO SOUTH',28,NULL,'2020-07-02 11:18:58',NULL,0),(151,'TINDERET',29,NULL,'2020-07-02 11:18:58',NULL,0),(152,'ALDAI',29,NULL,'2020-07-02 11:18:58',NULL,0),(153,'NANDI HILLS',29,NULL,'2020-07-02 11:18:58',NULL,0),(154,'CHESUMEI',29,NULL,'2020-07-02 11:18:58',NULL,0),(155,'EMGWEN',29,NULL,'2020-07-02 11:18:58',NULL,0),(156,'MOSOP',29,NULL,'2020-07-02 11:18:58',NULL,0),(157,'TIATY',30,NULL,'2020-07-02 11:18:58',NULL,0),(158,'BARINGO NORTH',30,NULL,'2020-07-02 11:18:58',NULL,0),(159,'BARINGO CENTRAL',30,NULL,'2020-07-02 11:18:58',NULL,0),(160,'BARINGO SOUTH',30,NULL,'2020-07-02 11:18:58',NULL,0),(161,'MOGOTIO',30,NULL,'2020-07-02 11:18:58',NULL,0),(162,'ELDAMA RAVINE',30,NULL,'2020-07-02 11:18:58',NULL,0),(163,'LAIKIPIA WEST',31,NULL,'2020-07-02 11:18:58',NULL,0),(164,'LAIKIPIA EAST',31,NULL,'2020-07-02 11:18:58',NULL,0),(165,'LAIKIPIA NORTH',31,NULL,'2020-07-02 11:18:58',NULL,0),(166,'MOLO',32,NULL,'2020-07-02 11:18:58',NULL,0),(167,'NJORO',32,NULL,'2020-07-02 11:18:58',NULL,0),(168,'NAIVASHA',32,NULL,'2020-07-02 11:18:58',NULL,0),(169,'GILGIL',32,NULL,'2020-07-02 11:18:58',NULL,0),(170,'KURESOI SOUTH',32,NULL,'2020-07-02 11:18:58',NULL,0),(171,'KURESOI NORTH',32,NULL,'2020-07-02 11:18:58',NULL,0),(172,'SUBUKIA',32,NULL,'2020-07-02 11:18:58',NULL,0),(173,'RONGAI',32,NULL,'2020-07-02 11:18:58',NULL,0),(174,'BAHATI',32,NULL,'2020-07-02 11:18:58',NULL,0),(175,'NAKURU TOWN WEST',32,NULL,'2020-07-02 11:18:58',NULL,0),(176,'NAKURU TOWN EAST',32,NULL,'2020-07-02 11:18:58',NULL,0),(177,'KILGORIS',33,NULL,'2020-07-02 11:18:58',NULL,0),(178,'EMURUA DIKIRR',33,NULL,'2020-07-02 11:18:58',NULL,0),(179,'NAROK NORTH',33,NULL,'2020-07-02 11:18:58',NULL,0),(180,'NAROK EAST',33,NULL,'2020-07-02 11:18:58',NULL,0),(181,'NAROK SOUTH',33,NULL,'2020-07-02 11:18:58',NULL,0),(182,'NAROK WEST',33,NULL,'2020-07-02 11:18:58',NULL,0),(183,'KAJIADO NORTH',34,NULL,'2020-07-02 11:18:58',NULL,0),(184,'KAJIADO CENTRAL',34,NULL,'2020-07-02 11:18:58',NULL,0),(185,'KAJIADO EAST',34,NULL,'2020-07-02 11:18:58',NULL,0),(186,'KAJIADO WEST',34,NULL,'2020-07-02 11:18:58',NULL,0),(187,'KAJIADO SOUTH',34,NULL,'2020-07-02 11:18:58',NULL,0),(188,'KIPKELION EAST',35,NULL,'2020-07-02 11:18:58',NULL,0),(189,'KIPKELION WEST',35,NULL,'2020-07-02 11:18:58',NULL,0),(190,'AINAMOI',35,NULL,'2020-07-02 11:18:58',NULL,0),(191,'BURETI',35,NULL,'2020-07-02 11:18:58',NULL,0),(192,'BELGUT',35,NULL,'2020-07-02 11:18:58',NULL,0),(193,'SIGOWET/SOIN',35,NULL,'2020-07-02 11:18:58',NULL,0),(194,'SOTIK',36,NULL,'2020-07-02 11:18:58',NULL,0),(195,'CHEPALUNGU',36,NULL,'2020-07-02 11:18:58',NULL,0),(196,'BOMET EAST',36,NULL,'2020-07-02 11:18:58',NULL,0),(197,'BOMET CENTRAL',36,NULL,'2020-07-02 11:18:58',NULL,0),(198,'KONOIN',36,NULL,'2020-07-02 11:18:58',NULL,0),(199,'LUGARI',37,NULL,'2020-07-02 11:18:58',NULL,0),(200,'LIKUYANI',37,NULL,'2020-07-02 11:18:58',NULL,0),(201,'MALAVA',37,NULL,'2020-07-02 11:18:58',NULL,0),(202,'LURAMBI',37,NULL,'2020-07-02 11:18:58',NULL,0),(203,'NAVAKHOLO',37,NULL,'2020-07-02 11:18:58',NULL,0),(204,'MUMIAS WEST',37,NULL,'2020-07-02 11:18:58',NULL,0),(205,'MUMIAS EAST',37,NULL,'2020-07-02 11:18:58',NULL,0),(206,'MATUNGU',37,NULL,'2020-07-02 11:18:58',NULL,0),(207,'BUTERE',37,NULL,'2020-07-02 11:18:58',NULL,0),(208,'KHWISERO',37,NULL,'2020-07-02 11:18:58',NULL,0),(209,'SHINYALU',37,NULL,'2020-07-02 11:18:58',NULL,0),(210,'IKOLOMANI',37,NULL,'2020-07-02 11:18:58',NULL,0),(211,'VIHIGA',38,NULL,'2020-07-02 11:18:58',NULL,0),(212,'SABATIA',38,NULL,'2020-07-02 11:18:59',NULL,0),(213,'HAMISI',38,NULL,'2020-07-02 11:18:59',NULL,0),(214,'LUANDA',38,NULL,'2020-07-02 11:18:59',NULL,0),(215,'EMUHAYA',38,NULL,'2020-07-02 11:18:59',NULL,0),(216,'MT. ELGON',39,NULL,'2020-07-02 11:18:59',NULL,0),(217,'SIRISIA',39,NULL,'2020-07-02 11:18:59',NULL,0),(218,'KABUCHAI',39,NULL,'2020-07-02 11:18:59',NULL,0),(219,'BUMULA',39,NULL,'2020-07-02 11:18:59',NULL,0),(220,'KANDUYI',39,NULL,'2020-07-02 11:18:59',NULL,0),(221,'WEBUYE EAST',39,NULL,'2020-07-02 11:18:59',NULL,0),(222,'WEBUYE WEST',39,NULL,'2020-07-02 11:18:59',NULL,0),(223,'KIMILILI',39,NULL,'2020-07-02 11:18:59',NULL,0),(224,'TONGAREN',39,NULL,'2020-07-02 11:18:59',NULL,0),(225,'TESO NORTH',40,NULL,'2020-07-02 11:18:59',NULL,0),(226,'TESO SOUTH',40,NULL,'2020-07-02 11:18:59',NULL,0),(227,'NAMBALE',40,NULL,'2020-07-02 11:18:59',NULL,0),(228,'MATAYOS',40,NULL,'2020-07-02 11:18:59',NULL,0),(229,'BUTULA',40,NULL,'2020-07-02 11:18:59',NULL,0),(230,'FUNYULA',40,NULL,'2020-07-02 11:18:59',NULL,0),(231,'BUDALANGI',40,NULL,'2020-07-02 11:18:59',NULL,0),(232,'UGENYA',41,NULL,'2020-07-02 11:18:59',NULL,0),(233,'UGUNJA',41,NULL,'2020-07-02 11:18:59',NULL,0),(234,'ALEGO USONGA',41,NULL,'2020-07-02 11:18:59',NULL,0),(235,'GEM',41,NULL,'2020-07-02 11:18:59',NULL,0),(236,'BONDO',41,NULL,'2020-07-02 11:18:59',NULL,0),(237,'RARIEDA',41,NULL,'2020-07-02 11:18:59',NULL,0),(238,'KISUMU EAST',42,NULL,'2020-07-02 11:18:59',NULL,0),(239,'KISUMU WEST',42,NULL,'2020-07-02 11:18:59',NULL,0),(240,'KISUMU CENTRAL',42,NULL,'2020-07-02 11:18:59',NULL,0),(241,'SEME',42,NULL,'2020-07-02 11:18:59',NULL,0),(242,'NYANDO',42,NULL,'2020-07-02 11:18:59',NULL,0),(243,'MUHORONI',42,NULL,'2020-07-02 11:18:59',NULL,0),(244,'NYAKACH',42,NULL,'2020-07-02 11:18:59',NULL,0),(245,'KASIPUL',43,NULL,'2020-07-02 11:18:59',NULL,0),(246,'KABONDO KASIPUL',43,NULL,'2020-07-02 11:18:59',NULL,0),(247,'KARACHUONYO',43,NULL,'2020-07-02 11:18:59',NULL,0),(248,'RANGWE',43,NULL,'2020-07-02 11:18:59',NULL,0),(249,'HOMA BAY TOWN',43,NULL,'2020-07-02 11:18:59',NULL,0),(250,'NDHIWA',43,NULL,'2020-07-02 11:18:59',NULL,0),(251,'SUBA NORTH',43,NULL,'2020-07-02 11:18:59',NULL,0),(252,'SUBA SOUTH',43,NULL,'2020-07-02 11:18:59',NULL,0),(253,'RONGO',44,NULL,'2020-07-02 11:18:59',NULL,0),(254,'AWENDO',44,NULL,'2020-07-02 11:18:59',NULL,0),(255,'SUNA EAST',44,NULL,'2020-07-02 11:18:59',NULL,0),(256,'SUNA WEST',44,NULL,'2020-07-02 11:18:59',NULL,0),(257,'URIRI',44,NULL,'2020-07-02 11:18:59',NULL,0),(258,'NYATIKE',44,NULL,'2020-07-02 11:18:59',NULL,0),(259,'KURIA WEST',44,NULL,'2020-07-02 11:18:59',NULL,0),(260,'KURIA EAST',44,NULL,'2020-07-02 11:18:59',NULL,0),(261,'BONCHARI',45,NULL,'2020-07-02 11:18:59',NULL,0),(262,'SOUTH MUGIRANGO',45,NULL,'2020-07-02 11:18:59',NULL,0),(263,'BOMACHOGE BORABU',45,NULL,'2020-07-02 11:18:59',NULL,0),(264,'BOBASI',45,NULL,'2020-07-02 11:18:59',NULL,0),(265,'BOMACHOGE CHACHE',45,NULL,'2020-07-02 11:18:59',NULL,0),(266,'NYARIBARI MASABA',45,NULL,'2020-07-02 11:18:59',NULL,0),(267,'NYARIBARI CHACHE',45,NULL,'2020-07-02 11:18:59',NULL,0),(268,'KITUTU CHACHE NORTH',45,NULL,'2020-07-02 11:18:59',NULL,0),(269,'KITUTU CHACHE SOUTH',45,NULL,'2020-07-02 11:18:59',NULL,0),(270,'KITUTU MASABA',46,NULL,'2020-07-02 11:18:59',NULL,0),(271,'WEST MUGIRANGO',46,NULL,'2020-07-02 11:18:59',NULL,0),(272,'NORTH MUGIRANGO',46,NULL,'2020-07-02 11:18:59',NULL,0),(273,'BORABU',46,NULL,'2020-07-02 11:18:59',NULL,0),(274,'WESTLANDS',47,NULL,'2020-07-02 11:18:59',NULL,0),(275,'DAGORETTI NORTH',47,NULL,'2020-07-02 11:18:59',NULL,0),(276,'DAGORETTI SOUTH',47,NULL,'2020-07-02 11:18:59',NULL,0),(277,'LANGATA',47,NULL,'2020-07-02 11:18:59',NULL,0),(278,'KIBRA',47,NULL,'2020-07-02 11:18:59',NULL,0),(279,'ROYSAMBU',47,NULL,'2020-07-02 11:18:59',NULL,0),(280,'KASARANI',47,NULL,'2020-07-02 11:18:59',NULL,0),(281,'RUARAKA',47,NULL,'2020-07-02 11:18:59',NULL,0),(282,'EMBAKASI SOUTH',47,NULL,'2020-07-02 11:18:59',NULL,0),(283,'EMBAKASI NORTH',47,NULL,'2020-07-02 11:18:59',NULL,0),(284,'EMBAKASI CENTRAL',47,NULL,'2020-07-02 11:18:59',NULL,0),(285,'EMBAKASI EAST',47,NULL,'2020-07-02 11:18:59',NULL,0),(286,'EMBAKASI WEST',47,NULL,'2020-07-02 11:18:59',NULL,0),(287,'MAKADARA',47,NULL,'2020-07-02 11:18:59',NULL,0),(288,'KAMUKUNJI',47,NULL,'2020-07-02 11:18:59',NULL,0),(289,'STAREHE',47,NULL,'2020-07-02 11:18:59',NULL,0),(290,'MATHARE',47,NULL,'2020-07-02 11:18:59',NULL,0);
/*!40000 ALTER TABLE `subcounties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training`
--

DROP TABLE IF EXISTS `training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organizer` varchar(255) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `facilitators` text,
  `no_of_participants` text,
  `participants_scan` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `organizer_id` int(11) DEFAULT NULL,
  `donor_id` int(11) DEFAULT NULL,
  `t0_9` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `t10_19` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `t20_24` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `t25_59` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `t60plus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `boys` varchar(255) DEFAULT NULL,
  `girls` varchar(255) DEFAULT NULL,
  `men` varchar(255) DEFAULT NULL,
  `women` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `rck_office_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-training-organizer_id` (`organizer_id`),
  KEY `idx-training-rck_office_id` (`rck_office_id`),
  CONSTRAINT `fk-training-organizer_id` FOREIGN KEY (`organizer_id`) REFERENCES `organizer` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-training-rck_office_id` FOREIGN KEY (`rck_office_id`) REFERENCES `rck_offices` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training`
--

LOCK TABLES `training` WRITE;
/*!40000 ALTER TABLE `training` DISABLE KEYS */;
INSERT INTO `training` VALUES (31,'korir',0,'the best test','Karen','maina,\r\nmwangi','4','1611838188-960x0.jpg',2,2,1611838188,1611838188,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,'',2147483647,'the best test','Karen','francies','30','1612943251-design test.png',2,2,1612943251,1612943251,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,'',2147483647,'the best test','Karen','francies','30','1612943267-design test.png',2,2,1612943267,1612943267,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,'',1613001600,'the best test','Karen','test','4','',17,17,1613735071,1613735071,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(38,'',1614816000,'the best test','Karen','','30','',2,2,1616652289,1616652289,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(39,'',1617580800,'Psychoeducation Forum','Kawangware','Pauline and Kelvin','60','',18,18,1617784555,1617784555,1,NULL,'5','5','15','20','5','5','5','15','25','1',NULL),(40,'',1618444800,'ADR','Kakuma','Lilian','50','',18,18,1618582483,1618582483,1,NULL,'0','5','20','20','5','3','2','20','25','4',NULL),(41,'',1619568000,'UAT','Nairobi','','50','',18,18,1619612972,1619612972,1,NULL,'0','0','50','0','0','0','0','30','20','1',2);
/*!40000 ALTER TABLE `training` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training_attachment_lines`
--

DROP TABLE IF EXISTS `training_attachment_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `training_attachment_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `training_id` int(11) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training_attachment_lines`
--

LOCK TABLES `training_attachment_lines` WRITE;
/*!40000 ALTER TABLE `training_attachment_lines` DISABLE KEYS */;
INSERT INTO `training_attachment_lines` VALUES (1,41,'UAT 2 Project MOnitoring Report','http://localhost:8081/uploads/download.pdf',1621629023,1621629023,2,2),(2,40,'UAT 2 Project MOnitoring Report ee','http://localhost:8081/uploads/download.pdf',1621852287,1621852287,2,2);
/*!40000 ALTER TABLE `training_attachment_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training_client_nationality_lines`
--

DROP TABLE IF EXISTS `training_client_nationality_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `training_client_nationality_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `training_id` int(11) DEFAULT NULL,
  `nationality` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training_client_nationality_lines`
--

LOCK TABLES `training_client_nationality_lines` WRITE;
/*!40000 ALTER TABLE `training_client_nationality_lines` DISABLE KEYS */;
INSERT INTO `training_client_nationality_lines` VALUES (1,41,2,30,1621625557,1622746644,2,2),(2,40,1,10,1621852142,1621852142,2,2),(3,40,3,40,1621852159,1621852249,2,2),(4,41,1,20,1621852409,1622746630,2,2);
/*!40000 ALTER TABLE `training_client_nationality_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training_client_type_lines`
--

DROP TABLE IF EXISTS `training_client_type_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `training_client_type_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `training_id` int(11) DEFAULT NULL,
  `client_type` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training_client_type_lines`
--

LOCK TABLES `training_client_type_lines` WRITE;
/*!40000 ALTER TABLE `training_client_type_lines` DISABLE KEYS */;
INSERT INTO `training_client_type_lines` VALUES (1,41,1,25,1621623736,1622746582,2,2),(2,41,3,25,1621623991,1622746610,2,2),(3,40,2,20,1621851911,1621851911,2,2),(4,40,1,30,1621852066,1621852066,2,2),(5,40,3,40,1621852082,1621852082,2,2);
/*!40000 ALTER TABLE `training_client_type_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training_type`
--

DROP TABLE IF EXISTS `training_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `training_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training_type`
--

LOCK TABLES `training_type` WRITE;
/*!40000 ALTER TABLE `training_type` DISABLE KEYS */;
INSERT INTO `training_type` VALUES (1,'Psycho-Education Forum','',1617784232,1617784232,18,18),(2,'CBC Training','',1617784253,1617784253,18,18),(3,'Economic empowerment training ','',1617784305,1617784305,18,18),(4,'ADR Forums','',1617784321,1617784321,18,18),(5,'CUC Training','',1617784341,1617784341,18,18);
/*!40000 ALTER TABLE `training_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training_upload`
--

DROP TABLE IF EXISTS `training_upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `training_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_path` text,
  `filename` varchar(255) DEFAULT NULL,
  `training_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-training_upload-training_id` (`training_id`),
  CONSTRAINT `fk-training_upload-training_id` FOREIGN KEY (`training_id`) REFERENCES `training` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training_upload`
--

LOCK TABLES `training_upload` WRITE;
/*!40000 ALTER TABLE `training_upload` DISABLE KEYS */;
INSERT INTO `training_upload` VALUES (7,'/uploads/multiple/training/1611838188-code-1.jpg.optimal.jpg','1611838188-code-1.jpg.optimal.jpg',31,NULL,NULL,NULL,NULL),(9,'/uploads/multiple/training/1612943267-code-1.jpg.optimal.jpg','1612943267-code-1.jpg.optimal.jpg',35,NULL,NULL,NULL,NULL),(10,'/uploads/multiple/training/1612943267-design test.png','1612943267-design test.png',35,NULL,NULL,NULL,NULL),(12,'/uploads/multiple/training/1613735071-1545326756_codes_story.jpg','1613735071-1545326756_codes_story.jpg',37,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `training_upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `permissions` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `idx-user-role` (`role`),
  CONSTRAINT `fk-user-role` FOREIGN KEY (`role`) REFERENCES `user_group` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'kievo23','byNTwbE7r63cPsqzgZniUdYSwizjHo-G','$2y$13$GYwRtc3fha/SiwXdwtfywuxV3rHTrQzsErB0dyhOZ6rado6r5PAUG',NULL,'kelhege@gmail.com',10,1610540084,1621611799,'Q_oTvuBv1X0sFG1fJBfQR69Hl5OTB_oW_1610540084',2,'2,3,4,5,6,7,9,12'),(15,'kievo','29belvvNtDtpOmNR-Dqrwrt5euQMBAH2','$2y$13$mv7HMZj.da1dz7FrqyTRkeVXtwyntdIW478KdOc1kzIZNx0qhHx6K',NULL,'kelvinchege@gmail.com',0,1612429700,1612429700,'7-Hu5OyFfeHmjyjDnhbBmPJkU2nWQSum_1612429700',NULL,NULL),(16,'ki','1O-q_JpbERzVj6yfBRb3hHvrxqRQbl2N','$2y$13$ctu8u7pZg2fh7FyZ7VM3quDaTXonK.C8RMViQqSoku6ilkcyNZrAm',NULL,'bytesavage@protonmail.com',9,1612429848,1612429848,'M1Fqbgu67V4ApnuhJfc-sN_6oXnaF0gN_1612429848',NULL,NULL),(17,'test','bfyF5rMBdbjtxToFfwuFQ_YBODpr9fmV','$2y$13$tfdm2ORBsE/8duowFLGvhODvqT.h3IopeA4gCiWJT.gRaHr.mFgue',NULL,'iansoftltdmailer@gmail.com',10,1613459412,1618942467,'2ZntZE2egks15j2ggvWg-80T-Y8hgKlA_1613459412',2,NULL),(18,'gideon','2CLdT1CBH5d8RE5O6Fpj1TgcKZcZoz8_','$2y$13$7LMzpKew7hqlT1Tgi3Wb8O5jRvJnfalsmyo8lv85H/HwUex0u3.am','NWkuJD69pEzyXgYXFkjrEj4Xy2EfP8dY_1619536115','gideon@rckkenya.org',10,1615969036,1620305295,'p7kiydhO2FJQ9SIPaomSrhGdvrl7Jwgr_1615969036',2,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` VALUES (1,'RCK user','User Privilleges',1606945544,1606945544,2,2),(2,'Administrator','A super user',1606945638,1606945638,2,2),(3,'Data Entry','Accessing only data intensive input interfaces.',1606945696,1606945696,2,2),(4,'Refugee','Refugee Population',1606979228,1606979228,2,2);
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `station` int(11) DEFAULT NULL,
  `cell_number` varchar(15) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-user_profile-user_group_id` (`user_group_id`),
  KEY `idx-user_profile-user_id` (`user_id`),
  KEY `idx-user_profile-station` (`station`),
  CONSTRAINT `fk-user_profile-station` FOREIGN KEY (`station`) REFERENCES `work_station` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-user_profile-user_group_id` FOREIGN KEY (`user_group_id`) REFERENCES `user_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-user_profile-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile`
--

LOCK TABLES `user_profile` WRITE;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_station`
--

DROP TABLE IF EXISTS `work_station`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `work_station` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `closest_camp` int(11) DEFAULT NULL,
  `description` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_station`
--

LOCK TABLES `work_station` WRITE;
/*!40000 ALTER TABLE `work_station` DISABLE KEYS */;
/*!40000 ALTER TABLE `work_station` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-07 19:08:49
