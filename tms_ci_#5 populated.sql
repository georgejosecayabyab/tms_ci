-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: tms_ci_#1
-- ------------------------------------------------------
-- Server version	5.7.12-log

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
-- Table structure for table `audit_trail`
--

DROP TABLE IF EXISTS `audit_trail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_trail` (
  `audit_trail_id` int(11) NOT NULL AUTO_INCREMENT,
  `table` varchar(45) DEFAULT NULL,
  `column` varchar(45) DEFAULT NULL,
  `changed_date` date DEFAULT NULL,
  `old_value` longtext,
  `new_value` longtext,
  `changed_by` int(11) NOT NULL,
  PRIMARY KEY (`audit_trail_id`),
  KEY `fk_Audit_Trail_User1_idx` (`changed_by`),
  CONSTRAINT `fk_Audit_Trail_User1` FOREIGN KEY (`changed_by`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_trail`
--

LOCK TABLES `audit_trail` WRITE;
/*!40000 ALTER TABLE `audit_trail` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_trail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `award`
--

DROP TABLE IF EXISTS `award`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `award` (
  `award_id` int(11) NOT NULL AUTO_INCREMENT,
  `award` varchar(100) DEFAULT NULL,
  `award_details` longtext,
  `is_featured` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`award_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `award`
--

LOCK TABLES `award` WRITE;
/*!40000 ALTER TABLE `award` DISABLE KEYS */;
/*!40000 ALTER TABLE `award` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `awardee`
--

DROP TABLE IF EXISTS `awardee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `awardee` (
  `group_id` int(11) NOT NULL,
  `award_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  KEY `fk_Awardee_Group1_idx` (`group_id`),
  KEY `fk_Awardee_Award1_idx` (`award_id`),
  CONSTRAINT `fk_Awardee_Award1` FOREIGN KEY (`award_id`) REFERENCES `award` (`award_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Awardee_Group1` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `awardee`
--

LOCK TABLES `awardee` WRITE;
/*!40000 ALTER TABLE `awardee` DISABLE KEYS */;
/*!40000 ALTER TABLE `awardee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `term` int(11) NOT NULL,
  `school_year` int(11) NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `fk_Course_Term1_idx` (`term`),
  KEY `fk_Course_School_Year1_idx` (`school_year`),
  CONSTRAINT `fk_Course_School_Year1` FOREIGN KEY (`school_year`) REFERENCES `school_year` (`school_year_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Course_Term1` FOREIGN KEY (`term`) REFERENCES `term` (`term_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'ITMTHDS','INFORMATION TECHNOLOGY METHODS',1,1),(4,'ITTHSIS-1','INFORMATION TECHNOLOGY THESIS 1',1,1),(5,'ITTHSIS-2','INFORMATION TECHNOLOGY THESIS 2',1,1);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day`
--

DROP TABLE IF EXISTS `day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `day` (
  `day_code` varchar(2) NOT NULL,
  `day` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`day_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day`
--

LOCK TABLES `day` WRITE;
/*!40000 ALTER TABLE `day` DISABLE KEYS */;
/*!40000 ALTER TABLE `day` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `defense_date`
--

DROP TABLE IF EXISTS `defense_date`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `defense_date` (
  `defense_date_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `defense_date` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`defense_date_id`),
  KEY `fk_Defense_Date_Group1_idx` (`group_id`),
  CONSTRAINT `fk_Defense_Date_Group1` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `defense_date`
--

LOCK TABLES `defense_date` WRITE;
/*!40000 ALTER TABLE `defense_date` DISABLE KEYS */;
/*!40000 ALTER TABLE `defense_date` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `degree`
--

DROP TABLE IF EXISTS `degree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `degree` (
  `degree_code` varchar(20) NOT NULL,
  `degree` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`degree_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `degree`
--

LOCK TABLES `degree` WRITE;
/*!40000 ALTER TABLE `degree` DISABLE KEYS */;
INSERT INTO `degree` VALUES ('BSIS','INFORMATION SYSTEM'),('BSIT','INFORMATION TECHNOLOGY');
/*!40000 ALTER TABLE `degree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussion`
--

DROP TABLE IF EXISTS `discussion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discussion` (
  `discussion_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_discussion_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `discuss` longtext,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`discussion_id`),
  KEY `fk_Discussion_Topic_Discussion1_idx` (`topic_discussion_id`),
  KEY `fk_Discussion_User1_idx` (`user_id`),
  CONSTRAINT `fk_Discussion_Topic_Discussion1` FOREIGN KEY (`topic_discussion_id`) REFERENCES `topic_discussion` (`topic_discussion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Discussion_User1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussion`
--

LOCK TABLES `discussion` WRITE;
/*!40000 ALTER TABLE `discussion` DISABLE KEYS */;
/*!40000 ALTER TABLE `discussion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty` (
  `user_id` int(11) NOT NULL,
  `is_coordinator` tinyint(1) DEFAULT NULL,
  `rank` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_Faculty_User1_idx` (`user_id`),
  KEY `fk_Faculty_Rank1_idx` (`rank`),
  CONSTRAINT `fk_Faculty_Rank1` FOREIGN KEY (`rank`) REFERENCES `rank` (`rank_code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Faculty_User1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` VALUES (5,0,'FT'),(6,0,'FT'),(13,0,'FT'),(14,0,'FT'),(15,0,'FT'),(16,0,'FT'),(17,0,'FT');
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty_specialization`
--

DROP TABLE IF EXISTS `faculty_specialization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty_specialization` (
  `user_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  KEY `fk_Faculty_Specialization_Faculty1_idx` (`user_id`),
  KEY `fk_Faculty_Specialization_Specialization1_idx` (`specialization_id`),
  CONSTRAINT `fk_Faculty_Specialization_Faculty1` FOREIGN KEY (`user_id`) REFERENCES `faculty` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Faculty_Specialization_Specialization1` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`specialization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty_specialization`
--

LOCK TABLES `faculty_specialization` WRITE;
/*!40000 ALTER TABLE `faculty_specialization` DISABLE KEYS */;
INSERT INTO `faculty_specialization` VALUES (5,1),(5,2),(6,2),(6,1),(5,4),(5,5);
/*!40000 ALTER TABLE `faculty_specialization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file` (
  `discussion_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`file_id`,`discussion_id`),
  KEY `fk_File_Discussion1_idx` (`discussion_id`),
  CONSTRAINT `fk_File_Discussion1` FOREIGN KEY (`discussion_id`) REFERENCES `discussion` (`discussion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file`
--

LOCK TABLES `file` WRITE;
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
/*!40000 ALTER TABLE `file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `final_verdict`
--

DROP TABLE IF EXISTS `final_verdict`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `final_verdict` (
  `verdict_code` varchar(10) NOT NULL,
  `verdict` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`verdict_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_verdict`
--

LOCK TABLES `final_verdict` WRITE;
/*!40000 ALTER TABLE `final_verdict` DISABLE KEYS */;
INSERT INTO `final_verdict` VALUES ('A','ADDITIONAL'),('F','FAIL'),('NVY','NO VERDICT YET'),('P','PASS'),('R','ROUTED');
/*!40000 ALTER TABLE `final_verdict` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form`
--

DROP TABLE IF EXISTS `form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form` (
  `form_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_name` varchar(100) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`form_id`),
  KEY `fk_Form_Course1_idx` (`course_id`),
  CONSTRAINT `fk_Form_Course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form`
--

LOCK TABLES `form` WRITE;
/*!40000 ALTER TABLE `form` DISABLE KEYS */;
/*!40000 ALTER TABLE `form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) DEFAULT NULL,
  `adviser_id` int(11) NOT NULL,
  `thesis_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `initial_verdict` varchar(10) NOT NULL,
  `final_verdict` varchar(10) NOT NULL,
  PRIMARY KEY (`group_id`),
  KEY `fk_Group_Faculty1_idx` (`adviser_id`),
  KEY `fk_Group_Thesis1_idx` (`thesis_id`),
  KEY `fk_Group_Course1_idx` (`course_id`),
  KEY `fk_Group_Initial_Verdict1_idx` (`initial_verdict`),
  KEY `fk_Group_Final_Verdict1_idx` (`final_verdict`),
  CONSTRAINT `fk_Group_Course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Group_Faculty1` FOREIGN KEY (`adviser_id`) REFERENCES `faculty` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Group_Final_Verdict1` FOREIGN KEY (`final_verdict`) REFERENCES `final_verdict` (`verdict_code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Group_Initial_Verdict1` FOREIGN KEY (`initial_verdict`) REFERENCES `initial_verdict` (`verdict_code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Group_Thesis1` FOREIGN KEY (`thesis_id`) REFERENCES `thesis` (`thesis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES (3,'GRADUATE ON TIME',5,1,4,'NOV','NVY'),(4,'TEAM ACHIEVE',6,3,4,'NOV','NVY');
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `initial_verdict`
--

DROP TABLE IF EXISTS `initial_verdict`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `initial_verdict` (
  `verdict_code` varchar(10) NOT NULL,
  `verdict` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`verdict_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `initial_verdict`
--

LOCK TABLES `initial_verdict` WRITE;
/*!40000 ALTER TABLE `initial_verdict` DISABLE KEYS */;
INSERT INTO `initial_verdict` VALUES ('CP','CONDITIONAL PASS'),('F','FAIL'),('NOV','NO VERDICT'),('P','PASS'),('RD','REDEFENSE');
/*!40000 ALTER TABLE `initial_verdict` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invitation`
--

DROP TABLE IF EXISTS `invitation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invitation` (
  `invitation_id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) DEFAULT NULL,
  `invitation_detail` longtext,
  `is_accepted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`invitation_id`),
  KEY `fk_Invitation_User1_idx` (`from`),
  CONSTRAINT `fk_Invitation_User1` FOREIGN KEY (`from`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invitation`
--

LOCK TABLES `invitation` WRITE;
/*!40000 ALTER TABLE `invitation` DISABLE KEYS */;
/*!40000 ALTER TABLE `invitation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(45) DEFAULT NULL,
  `news_details` longtext,
  `date_time` datetime DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_details` longtext,
  `created_by` int(11) NOT NULL,
  `target_user_id` int(11) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`notification_id`),
  KEY `fk_Notification_User1_idx` (`created_by`),
  CONSTRAINT `fk_Notification_User1` FOREIGN KEY (`created_by`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `panel_group`
--

DROP TABLE IF EXISTS `panel_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `panel_group` (
  `panel_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `panel_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`panel_group_id`),
  KEY `fk_Panel_Group_Faculty1_idx` (`panel_id`),
  KEY `fk_Panel_Group_Group1_idx` (`group_id`),
  CONSTRAINT `fk_Panel_Group_Faculty1` FOREIGN KEY (`panel_id`) REFERENCES `faculty` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Panel_Group_Group1` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `panel_group`
--

LOCK TABLES `panel_group` WRITE;
/*!40000 ALTER TABLE `panel_group` DISABLE KEYS */;
INSERT INTO `panel_group` VALUES (1,3,6,1),(2,3,13,1),(3,3,14,1),(4,4,5,1),(5,4,13,1),(6,4,15,1);
/*!40000 ALTER TABLE `panel_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `progress`
--

DROP TABLE IF EXISTS `progress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `progress` (
  `progress_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`progress_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `progress`
--

LOCK TABLES `progress` WRITE;
/*!40000 ALTER TABLE `progress` DISABLE KEYS */;
/*!40000 ALTER TABLE `progress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rank`
--

DROP TABLE IF EXISTS `rank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rank` (
  `rank_code` varchar(20) NOT NULL,
  `rank` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`rank_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rank`
--

LOCK TABLES `rank` WRITE;
/*!40000 ALTER TABLE `rank` DISABLE KEYS */;
INSERT INTO `rank` VALUES ('FT','FULL-TIME'),('PT','PART-TIME');
/*!40000 ALTER TABLE `rank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `day` varchar(2) NOT NULL,
  PRIMARY KEY (`schedule_id`),
  KEY `fk_Schedule_Day1_idx` (`day`),
  KEY `fk_Schedule_User1_idx` (`user_id`),
  CONSTRAINT `fk_Schedule_Day1` FOREIGN KEY (`day`) REFERENCES `day` (`day_code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Schedule_User1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_year`
--

DROP TABLE IF EXISTS `school_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_year` (
  `school_year_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_year_code` varchar(45) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`school_year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_year`
--

LOCK TABLES `school_year` WRITE;
/*!40000 ALTER TABLE `school_year` DISABLE KEYS */;
INSERT INTO `school_year` VALUES (1,'17-18','2017-09-11','2018-08-31');
/*!40000 ALTER TABLE `school_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialization`
--

DROP TABLE IF EXISTS `specialization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialization` (
  `specialization_id` int(11) NOT NULL AUTO_INCREMENT,
  `specialization` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`specialization_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialization`
--

LOCK TABLES `specialization` WRITE;
/*!40000 ALTER TABLE `specialization` DISABLE KEYS */;
INSERT INTO `specialization` VALUES (1,'ARTIFICIAL INTELLIGENCE'),(2,'INTERNET OF THINGS'),(3,'NETWORKING'),(4,'QUANTUM COMPUTING'),(5,'SECURITY'),(6,'ROBOTS'),(7,'DATABASES');
/*!40000 ALTER TABLE `specialization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `user_id` int(11) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_Student_User_idx` (`user_id`),
  KEY `fk_Student_Degree1_idx` (`degree`),
  KEY `fk_Student_Course1_idx` (`course_id`),
  CONSTRAINT `fk_Student_Course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Degree1` FOREIGN KEY (`degree`) REFERENCES `degree` (`degree_code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_User` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (7,'BSIT',4),(8,'BSIT',4),(9,'BSIT',4),(10,'BSIT',4),(11,'BSIT',4),(12,'BSIT',4),(18,'BSIT',4),(19,'BSIT',4),(20,'BSIT',4);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_group`
--

DROP TABLE IF EXISTS `student_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_group` (
  `student_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`student_group_id`),
  KEY `fk_Student_Group_Group1_idx` (`group_id`),
  KEY `fk_Student_Group_Student1_idx` (`student_id`),
  CONSTRAINT `fk_Student_Group_Group1` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Group_Student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_group`
--

LOCK TABLES `student_group` WRITE;
/*!40000 ALTER TABLE `student_group` DISABLE KEYS */;
INSERT INTO `student_group` VALUES (1,3,7,1),(2,3,8,1),(3,3,9,1),(4,3,10,1),(5,4,11,1),(6,4,18,1),(7,4,19,1),(8,4,20,1);
/*!40000 ALTER TABLE `student_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `term`
--

DROP TABLE IF EXISTS `term`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `term` (
  `term_id` int(11) NOT NULL AUTO_INCREMENT,
  `term` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `term`
--

LOCK TABLES `term` WRITE;
/*!40000 ALTER TABLE `term` DISABLE KEYS */;
INSERT INTO `term` VALUES (1,'1'),(2,'2'),(3,'3');
/*!40000 ALTER TABLE `term` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thesis`
--

DROP TABLE IF EXISTS `thesis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thesis` (
  `thesis_id` int(11) NOT NULL AUTO_INCREMENT,
  `thesis_title` varchar(200) DEFAULT NULL,
  `thesis_status` varchar(100) NOT NULL,
  PRIMARY KEY (`thesis_id`),
  KEY `fk_Thesis_Thesis_Status1_idx` (`thesis_status`),
  CONSTRAINT `fk_Thesis_Thesis_Status1` FOREIGN KEY (`thesis_status`) REFERENCES `thesis_status` (`thesis_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thesis`
--

LOCK TABLES `thesis` WRITE;
/*!40000 ALTER TABLE `thesis` DISABLE KEYS */;
INSERT INTO `thesis` VALUES (1,'THESIS MANAGEMENT SYSTEM','ON-GOING'),(2,'ZOO MANAGEMENT SYSTEM','COMPLETED'),(3,'SMART BED','ON-GOING');
/*!40000 ALTER TABLE `thesis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thesis_history`
--

DROP TABLE IF EXISTS `thesis_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thesis_history` (
  `thesis_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `thesis_id` int(11) NOT NULL,
  `column` varchar(45) DEFAULT NULL,
  `old_value` varchar(45) DEFAULT NULL,
  `new_value` varchar(45) DEFAULT NULL,
  `date_changed` date DEFAULT NULL,
  PRIMARY KEY (`thesis_history_id`),
  KEY `fk_Thesis_History_Thesis1_idx` (`thesis_id`),
  CONSTRAINT `fk_Thesis_History_Thesis1` FOREIGN KEY (`thesis_id`) REFERENCES `thesis` (`thesis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thesis_history`
--

LOCK TABLES `thesis_history` WRITE;
/*!40000 ALTER TABLE `thesis_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `thesis_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thesis_specialization`
--

DROP TABLE IF EXISTS `thesis_specialization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thesis_specialization` (
  `thesis_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  KEY `fk_Thesis_Specialization_Thesis1_idx` (`thesis_id`),
  KEY `fk_Thesis_Specialization_Specialization1_idx` (`specialization_id`),
  CONSTRAINT `fk_Thesis_Specialization_Specialization1` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`specialization_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Thesis_Specialization_Thesis1` FOREIGN KEY (`thesis_id`) REFERENCES `thesis` (`thesis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thesis_specialization`
--

LOCK TABLES `thesis_specialization` WRITE;
/*!40000 ALTER TABLE `thesis_specialization` DISABLE KEYS */;
/*!40000 ALTER TABLE `thesis_specialization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thesis_status`
--

DROP TABLE IF EXISTS `thesis_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thesis_status` (
  `thesis_status` varchar(100) NOT NULL,
  PRIMARY KEY (`thesis_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thesis_status`
--

LOCK TABLES `thesis_status` WRITE;
/*!40000 ALTER TABLE `thesis_status` DISABLE KEYS */;
INSERT INTO `thesis_status` VALUES ('COMPLETED'),('ON-GOING'),('ON-HOLD');
/*!40000 ALTER TABLE `thesis_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topic_discussion`
--

DROP TABLE IF EXISTS `topic_discussion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topic_discussion` (
  `topic_discussion_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(200) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`topic_discussion_id`),
  KEY `fk_Topic_Discussion_User1_idx` (`created_by`),
  CONSTRAINT `fk_Topic_Discussion_User1` FOREIGN KEY (`created_by`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topic_discussion`
--

LOCK TABLES `topic_discussion` WRITE;
/*!40000 ALTER TABLE `topic_discussion` DISABLE KEYS */;
/*!40000 ALTER TABLE `topic_discussion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `date_joined` date DEFAULT NULL,
  `profile_pic` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (5,'Geanne','Franco','1234','geanne.franco@dlsu.edu.ph',1,'2017-10-21',NULL),(6,'Fritz','Flores','1234','fritz.flores@dlsu.edu.ph',1,'2017-10-21',NULL),(7,'George','Cayabyab','1234','george.cayabyab@dlsu.edu.ph',1,'2017-10-21',NULL),(8,'Ralph','Cobankiat','1234','ralph.cobankiat@dlsu.edu.ph',1,'2017-10-21',NULL),(9,'Jose','Mariano','1234','jose.mariano@dlsu.edu.ph',1,'2017-10-21',NULL),(10,'Cloud','Camilon','1234','cloud.camilon@dlsu.edu.ph',1,'2017-10-21',NULL),(11,'Carl','Tan','1234','carl.tan@dlsu.edu.ph',1,'2017-10-21',NULL),(12,'Jeff','Yu','1234','jeff.yu@dlsu.edu.ph',1,'2017-10-21',NULL),(13,'Oli','Malabanan','1234','oli.malabanan@dlsu.edu.ph',1,'2017-10-21',NULL),(14,'Greg','Cu','1234','greg.cu@dlsu.edu.ph',1,'2017-10-21',NULL),(15,'Arlyn','Ong','1234','arlyn.ong@dlsu.edu.ph',1,'2017-10-21',NULL),(16,'Renato','Molano','1234','renato.molano@dlsu.edu.ph',1,'2017-10-21',NULL),(17,'Danny','Cheng','1234','danny.cheng@dlsu.edu.ph',1,'2017-10-21',NULL),(18,'Ava','Alimurong','1234','ava.alimurong@dlsu.edu.ph',1,'2017-10-21',NULL),(19,'Paula','Casas','1234','paula.casas@dlsu.edu.ph',1,'2017-10-21',NULL),(20,'Robin','Young','1234','robin.young@dlsu.edu.ph',1,'2017-10-21',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'tms_ci_#1'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-23  9:08:37
