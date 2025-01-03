-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: contabilidade
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrator` (
  `id` int NOT NULL AUTO_INCREMENT,
  ` name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `office` varchar(45) DEFAULT NULL,
  `sector` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `amounts_payable`
--

DROP TABLE IF EXISTS `amounts_payable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amounts_payable` (
  `id` int NOT NULL AUTO_INCREMENT,
  ` restaurant_name` varchar(45) DEFAULT NULL,
  ` amount_owed` varchar(45) DEFAULT NULL,
  `payment_status` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amounts_payable`
--

LOCK TABLES `amounts_payable` WRITE;
/*!40000 ALTER TABLE `amounts_payable` DISABLE KEYS */;
/*!40000 ALTER TABLE `amounts_payable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_information`
--

DROP TABLE IF EXISTS `application_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `application_information` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `description` longtext,
  `created_at` varchar(45) DEFAULT NULL,
  `application_informationcol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_information`
--

LOCK TABLES `application_information` WRITE;
/*!40000 ALTER TABLE `application_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `application_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessments`
--

DROP TABLE IF EXISTS `assessments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assessments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int DEFAULT NULL,
  `number_of_stars` int DEFAULT NULL,
  `assessment` varchar(350) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessments`
--

LOCK TABLES `assessments` WRITE;
/*!40000 ALTER TABLE `assessments` DISABLE KEYS */;
/*!40000 ALTER TABLE `assessments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `business` (
  `id` int NOT NULL AUTO_INCREMENT,
  `corporate_reason` varchar(350) DEFAULT NULL,
  `fantasy_name` varchar(350) DEFAULT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business`
--

LOCK TABLES `business` WRITE;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
/*!40000 ALTER TABLE `business` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `photo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `cpf` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `email` varchar(45) DEFAULT NULL,
  `date_of_birth` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `phone` varchar(45) DEFAULT NULL,
  `specialty` varchar(450) DEFAULT NULL,
  `created_at` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (200,NULL,'Tauan Araujo','456.464.646-46','tauan.gt@gmail.com','','(11)11111-1111',NULL,'07-11-24');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_questions`
--

DROP TABLE IF EXISTS `common_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `common_questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(250) DEFAULT NULL,
  `response` longtext,
  `created_by` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_questions`
--

LOCK TABLES `common_questions` WRITE;
/*!40000 ALTER TABLE `common_questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `common_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_type`
--

DROP TABLE IF EXISTS `document_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `document_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_by` varchar(150) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_type`
--

LOCK TABLES `document_type` WRITE;
/*!40000 ALTER TABLE `document_type` DISABLE KEYS */;
INSERT INTO `document_type` VALUES (1,'INSS','07-11-24',NULL,NULL);
/*!40000 ALTER TABLE `document_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_marketing`
--

DROP TABLE IF EXISTS `email_marketing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email_marketing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title_template` varchar(150) DEFAULT NULL,
  `description` longtext,
  `email_marketingcol1` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_marketing`
--

LOCK TABLES `email_marketing` WRITE;
/*!40000 ALTER TABLE `email_marketing` DISABLE KEYS */;
/*!40000 ALTER TABLE `email_marketing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_requests`
--

DROP TABLE IF EXISTS `employee_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee_requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `restaurant_name` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `unit_price` varchar(45) DEFAULT NULL,
  `request_date` varchar(45) DEFAULT NULL,
  `name_of_the_meal` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_requests`
--

LOCK TABLES `employee_requests` WRITE;
/*!40000 ALTER TABLE `employee_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) GENERATED ALWAYS AS (NULL) VIRTUAL,
  `email` varchar(450) DEFAULT NULL,
  `register` varchar(105) DEFAULT NULL,
  ` lunch_time` varchar(45) DEFAULT NULL,
  `users_id` int NOT NULL,
  `company_belonging` varchar(250) DEFAULT NULL,
  `company_cnpj` varchar(45) DEFAULT NULL,
  `post` varchar(450) DEFAULT NULL,
  `situation` varchar(450) DEFAULT NULL,
  `bond` varchar(450) DEFAULT NULL,
  `classification` varchar(450) DEFAULT NULL,
  `admission` varchar(450) DEFAULT NULL,
  `workload` varchar(450) DEFAULT NULL,
  `capacity` varchar(450) DEFAULT NULL,
  `municipality` varchar(450) DEFAULT NULL,
  `salary` varchar(450) DEFAULT NULL,
  `pis_pasep` varchar(450) DEFAULT NULL,
  `schooling` varchar(450) DEFAULT NULL,
  `sex` varchar(450) DEFAULT NULL,
  `cpf` varchar(450) DEFAULT NULL,
  `date_of_birth` varchar(450) DEFAULT NULL,
  `race` varchar(450) DEFAULT NULL,
  `special_needs` varchar(450) DEFAULT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `exp_rg` varchar(450) DEFAULT NULL,
  `date_exp_rg` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `doce_ltc` varchar(45) DEFAULT NULL,
  ` created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`users_id`),
  KEY `fk_employees_users1_idx` (`users_id`),
  CONSTRAINT `fk_employees_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(450) DEFAULT NULL,
  `document` varchar(500) DEFAULT NULL,
  `value` varchar(45) DEFAULT NULL,
  `client` varchar(80) DEFAULT NULL,
  `mounth` varchar(150) DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fees`
--

LOCK TABLES `fees` WRITE;
/*!40000 ALTER TABLE `fees` DISABLE KEYS */;
INSERT INTO `fees` VALUES (1,'ghfghfgh','uploads/ghfghfgh.pdf','154',NULL,'Janeiro',200,'10-12-24',NULL);
/*!40000 ALTER TABLE `fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guides_and_documents`
--

DROP TABLE IF EXISTS `guides_and_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guides_and_documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `document` varchar(500) DEFAULT NULL,
  `mounth` varchar(45) DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `type` varchar(150) DEFAULT NULL,
  `value` varchar(45) DEFAULT NULL,
  `client_id` varchar(15) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_by` varchar(150) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guides_and_documents`
--

LOCK TABLES `guides_and_documents` WRITE;
/*!40000 ALTER TABLE `guides_and_documents` DISABLE KEYS */;
INSERT INTO `guides_and_documents` VALUES (1,'Guia_INSS_guilherme_de_souza','uploads/Guia_INSS_guilherme_de_souza.pdf','Novembro','05:11','17/11/2024','INSS','150','200','07-11-24',NULL,NULL),(2,'fgdfggdfg','uploads/fgdfggdfg.pdf','Janeiro','12:12','','','152','200','10-12-24',NULL,NULL);
/*!40000 ALTER TABLE `guides_and_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institutional_videos`
--

DROP TABLE IF EXISTS `institutional_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `institutional_videos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `description` longtext,
  `video_path` varchar(900) DEFAULT NULL,
  `institutional_videoscol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institutional_videos`
--

LOCK TABLES `institutional_videos` WRITE;
/*!40000 ALTER TABLE `institutional_videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `institutional_videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passwords`
--

DROP TABLE IF EXISTS `passwords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `passwords` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` varchar(45) DEFAULT NULL,
  `user_name` varchar(150) DEFAULT NULL,
  `last password` varchar(150) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passwords`
--

LOCK TABLES `passwords` WRITE;
/*!40000 ALTER TABLE `passwords` DISABLE KEYS */;
/*!40000 ALTER TABLE `passwords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recent_activities`
--

DROP TABLE IF EXISTS `recent_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recent_activities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `activity_done` varchar(200) DEFAULT NULL,
  `made_by` varchar(150) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recent_activities`
--

LOCK TABLES `recent_activities` WRITE;
/*!40000 ALTER TABLE `recent_activities` DISABLE KEYS */;
/*!40000 ALTER TABLE `recent_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reports` (
  `id` int NOT NULL AUTO_INCREMENT,
  `restaurant_name` varchar(45) DEFAULT NULL,
  `employee_name` varchar(45) DEFAULT NULL,
  `name_of_the_meal` varchar(45) DEFAULT NULL,
  `meal_cost` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servers`
--

DROP TABLE IF EXISTS `servers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `registration` varchar(450) DEFAULT NULL,
  `name` varchar(450) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `issuing_body` varchar(45) DEFAULT NULL,
  `rg_dispatch_date` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `date_of_birth` varchar(45) DEFAULT NULL,
  `email` varchar(450) DEFAULT NULL,
  `office` varchar(450) DEFAULT NULL,
  `situation` varchar(450) DEFAULT NULL,
  `admission` varchar(450) DEFAULT NULL,
  `capacity` varchar(450) DEFAULT NULL,
  `county` varchar(140) DEFAULT NULL,
  `education` varchar(150) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `has_a_disability` varchar(150) DEFAULT NULL,
  `ltc_code` varchar(150) DEFAULT NULL,
  `specialty` varchar(450) DEFAULT NULL,
  `comments` longtext,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servers`
--

LOCK TABLES `servers` WRITE;
/*!40000 ALTER TABLE `servers` DISABLE KEYS */;
/*!40000 ALTER TABLE `servers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `footer` varchar(650) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `support_email` varchar(120) DEFAULT NULL,
  `nif_cnpj` varchar(45) DEFAULT NULL,
  `opening_hours` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site`
--

DROP TABLE IF EXISTS `site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site` (
  `id` int NOT NULL AUTO_INCREMENT,
  `about_us` varchar(45) DEFAULT NULL,
  `our_story` varchar(45) DEFAULT NULL,
  `whatsapp_button` varchar(600) DEFAULT NULL,
  `link_instagram` varchar(900) DEFAULT NULL,
  `link_linkedin` varchar(900) DEFAULT NULL,
  `link_facebook` varchar(900) DEFAULT NULL,
  `mission` varchar(350) DEFAULT NULL,
  `vision` varchar(350) DEFAULT NULL,
  `values` varchar(350) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site`
--

LOCK TABLES `site` WRITE;
/*!40000 ALTER TABLE `site` DISABLE KEYS */;
/*!40000 ALTER TABLE `site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `smtp_settings`
--

DROP TABLE IF EXISTS `smtp_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `smtp_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `smtp_server` varchar(150) DEFAULT NULL,
  `door_number` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smtp_settings`
--

LOCK TABLES `smtp_settings` WRITE;
/*!40000 ALTER TABLE `smtp_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `smtp_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_about_us`
--

DROP TABLE IF EXISTS `system_about_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `system_about_us` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_about_us`
--

LOCK TABLES `system_about_us` WRITE;
/*!40000 ALTER TABLE `system_about_us` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_about_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_functions`
--

DROP TABLE IF EXISTS `system_functions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `system_functions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `short_description` varchar(200) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_functions`
--

LOCK TABLES `system_functions` WRITE;
/*!40000 ALTER TABLE `system_functions` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_functions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `secundary_email` varchar(250) DEFAULT NULL,
  `username_at` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `repeat_password` varchar(150) DEFAULT NULL,
  `token` varchar(900) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `type_user` varchar(150) DEFAULT NULL,
  `user_level` varchar(150) DEFAULT NULL,
  `last_login` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `photo_user` varchar(900) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Programadores em ação','suporte@programadoresemacao.com.br',NULL,NULL,'1a64bd5a0c8a01e7d423257ca39f433a','1a64bd5a0c8a01e7d423257ca39f433a','84413abe6f90f3021bcab024499d4804','Ativo','Master','Master',NULL,'2023-08-02 21:27:01','uploads/6578724225841.jpg'),(43,'Tauan Araujo','tauan.gt@gmail.com',NULL,NULL,'1a64bd5a0c8a01e7d423257ca39f433a','e10adc3949ba59abbe56e057f20f883e','33e1b2cec66e404a8d8b94ab3dde53bc','Ativo','Cliente','Cliente',NULL,'07-11-24','assets/img/avatar-5.png');
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

-- Dump completed on 2025-01-03 18:58:08
