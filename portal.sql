-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: portal
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

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
-- Table structure for table `Account`
--

DROP TABLE IF EXISTS `Account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Account`
--

LOCK TABLES `Account` WRITE;
/*!40000 ALTER TABLE `Account` DISABLE KEYS */;
/*!40000 ALTER TABLE `Account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Candidate`
--

DROP TABLE IF EXISTS `Candidate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Candidate`
--

LOCK TABLES `Candidate` WRITE;
/*!40000 ALTER TABLE `Candidate` DISABLE KEYS */;
/*!40000 ALTER TABLE `Candidate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Candidate_Question_Answer`
--

DROP TABLE IF EXISTS `Candidate_Question_Answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Candidate_Question_Answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) NOT NULL,
  `id_candidate` int(11) NOT NULL,
  `id_proposed_answer` int(11) NOT NULL,
  `file` blob,
  `score` double(5,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_question` (`id_question`),
  KEY `id_candidate` (`id_candidate`),
  KEY `id_proposed_answer` (`id_proposed_answer`),
  CONSTRAINT `Candidate_Question_Answer_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `Question` (`id`),
  CONSTRAINT `Candidate_Question_Answer_ibfk_2` FOREIGN KEY (`id_candidate`) REFERENCES `Candidate` (`id`),
  CONSTRAINT `Candidate_Question_Answer_ibfk_3` FOREIGN KEY (`id_proposed_answer`) REFERENCES `Proposed_Answer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Candidate_Question_Answer`
--

LOCK TABLES `Candidate_Question_Answer` WRITE;
/*!40000 ALTER TABLE `Candidate_Question_Answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `Candidate_Question_Answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Candidate_Test`
--

DROP TABLE IF EXISTS `Candidate_Test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Candidate_Test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_test` varchar(32) NOT NULL,
  `id_candidate` int(11) NOT NULL,
  `score` double(5,2) NOT NULL,
  `expiration_date` datetime NOT NULL,
  `submitted_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_test` (`id_test`),
  KEY `id_candidate` (`id_candidate`),
  CONSTRAINT `Candidate_Test_ibfk_1` FOREIGN KEY (`id_test`) REFERENCES `Test` (`id_test`),
  CONSTRAINT `Candidate_Test_ibfk_2` FOREIGN KEY (`id_candidate`) REFERENCES `Candidate` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Candidate_Test`
--

LOCK TABLES `Candidate_Test` WRITE;
/*!40000 ALTER TABLE `Candidate_Test` DISABLE KEYS */;
/*!40000 ALTER TABLE `Candidate_Test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Correct_Answer`
--

DROP TABLE IF EXISTS `Correct_Answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Correct_Answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) NOT NULL,
  `id_proposed_answer` int(11) NOT NULL,
  `score` double(5,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_question` (`id_question`),
  KEY `id_proposed_answer` (`id_proposed_answer`),
  CONSTRAINT `Correct_Answer_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `Question` (`id`),
  CONSTRAINT `Correct_Answer_ibfk_2` FOREIGN KEY (`id_proposed_answer`) REFERENCES `Proposed_Answer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Correct_Answer`
--

LOCK TABLES `Correct_Answer` WRITE;
/*!40000 ALTER TABLE `Correct_Answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `Correct_Answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Manager`
--

DROP TABLE IF EXISTS `Manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `apikey` char(128) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_account` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_account` (`id_account`),
  CONSTRAINT `Manager_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `Account` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Manager`
--

LOCK TABLES `Manager` WRITE;
/*!40000 ALTER TABLE `Manager` DISABLE KEYS */;
/*!40000 ALTER TABLE `Manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Proposed_Answer`
--

DROP TABLE IF EXISTS `Proposed_Answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Proposed_Answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) NOT NULL,
  `answer` varchar(128) NOT NULL,
  `file` blob,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_question` (`id_question`),
  CONSTRAINT `Proposed_Answer_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `Question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Proposed_Answer`
--

LOCK TABLES `Proposed_Answer` WRITE;
/*!40000 ALTER TABLE `Proposed_Answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `Proposed_Answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Question`
--

DROP TABLE IF EXISTS `Question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) NOT NULL,
  `id_test` varchar(32) NOT NULL,
  `description` varchar(256) NOT NULL,
  `score` double(5,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_type` (`id_type`),
  KEY `id_test` (`id_test`),
  CONSTRAINT `Question_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `Question_Type` (`id`),
  CONSTRAINT `Question_ibfk_2` FOREIGN KEY (`id_test`) REFERENCES `Test` (`id_test`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Question`
--

LOCK TABLES `Question` WRITE;
/*!40000 ALTER TABLE `Question` DISABLE KEYS */;
/*!40000 ALTER TABLE `Question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Question_Type`
--

DROP TABLE IF EXISTS `Question_Type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Question_Type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('abierta_nolimit','abierta_limit','seleccion_simple','seleccion_multiple') NOT NULL,
  `is_autocorrect` bit(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Question_Type`
--

LOCK TABLES `Question_Type` WRITE;
/*!40000 ALTER TABLE `Question_Type` DISABLE KEYS */;
/*!40000 ALTER TABLE `Question_Type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Reviewer`
--

DROP TABLE IF EXISTS `Reviewer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Reviewer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_account` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_account` (`id_account`),
  CONSTRAINT `Reviewer_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `Account` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reviewer`
--

LOCK TABLES `Reviewer` WRITE;
/*!40000 ALTER TABLE `Reviewer` DISABLE KEYS */;
/*!40000 ALTER TABLE `Reviewer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Reviewer_Test`
--

DROP TABLE IF EXISTS `Reviewer_Test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Reviewer_Test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_reviewer` int(11) NOT NULL,
  `id_test` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_reviewer` (`id_reviewer`),
  KEY `id_test` (`id_test`),
  CONSTRAINT `Reviewer_Test_ibfk_1` FOREIGN KEY (`id_reviewer`) REFERENCES `Reviewer` (`id`),
  CONSTRAINT `Reviewer_Test_ibfk_2` FOREIGN KEY (`id_test`) REFERENCES `Test` (`id_test`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reviewer_Test`
--

LOCK TABLES `Reviewer_Test` WRITE;
/*!40000 ALTER TABLE `Reviewer_Test` DISABLE KEYS */;
/*!40000 ALTER TABLE `Reviewer_Test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Test`
--

DROP TABLE IF EXISTS `Test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Test` (
  `id_test` varchar(32) NOT NULL,
  `name` varchar(128) NOT NULL,
  `instructions` varchar(512) DEFAULT NULL,
  `duration` time NOT NULL,
  `extra_time` time NOT NULL,
  `id_manager` int(11) NOT NULL,
  `is_active` bit(1) NOT NULL DEFAULT b'0',
  `is_autocorrect` bit(1) NOT NULL DEFAULT b'0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_test`),
  KEY `id_manager` (`id_manager`),
  CONSTRAINT `Test_ibfk_1` FOREIGN KEY (`id_manager`) REFERENCES `Manager` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Test`
--

LOCK TABLES `Test` WRITE;
/*!40000 ALTER TABLE `Test` DISABLE KEYS */;
/*!40000 ALTER TABLE `Test` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-01 15:15:38
