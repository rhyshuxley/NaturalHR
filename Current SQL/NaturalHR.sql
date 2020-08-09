-- MySQL dump 10.13  Distrib 8.0.21, for osx10.15 (x86_64)
--
-- Host: 127.0.0.1    Database: NaturalHR
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Upload`
--

DROP TABLE IF EXISTS `Upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Upload` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `filename` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uploadedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Upload`
--

LOCK TABLES `Upload` WRITE;
/*!40000 ALTER TABLE `Upload` DISABLE KEYS */;
INSERT INTO `Upload` VALUES (1,1,'../files/602325logo.jpg','2020-08-09 12:35:45'),(2,1,'../files/613187me.jpg','2020-08-09 13:54:03'),(3,1,'../files/813370me.jpg','2020-08-09 13:01:22'),(4,1,'../files/364841logo.jpg','2020-08-09 13:40:37'),(5,1,'../files/77951rhys huxley cv.pages','2020-08-09 13:42:38');
/*!40000 ALTER TABLE `Upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `User` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'rhyshuxley@gmail.com','$2y$10$XhKtUVXGqxN0GfWzPGitx.blsV1k/dGxikhU1r7ouhjx6zM3tBqwu','rhyshuxley@gmail.com'),(2,'rhuxley@editwebsites.co.uk','$2y$10$oFWMg0iZd6Gfz.dfVNY5l.4Np3A9J9tahkQvbbuuh1kKrSMqKAu0W','rhuxley@editwebsites.co.uk'),(3,'rhuxley@editwebsites.co.uk','$2y$10$ULgMosrTQ4bH118yAlqc4OjPJe.2L1YvCO3I1xRDBhys/JTayH/i2','rhuxley@editwebsites.co.uk'),(4,'rhyshuxley@gmail.com','$2y$10$Z2qwTwy17CwYvNyCJ9Ti8eSYX1RruoQ4pGa3BxazlmOtA5Kc7NeJu','rhyshuxley@gmail.com'),(5,'rhyshuxley@gmail.com','$2y$10$jjHYJMXetqCUXxKG/pRDQOJEkCubN0gSnVAXN7rMZpUktxv97oI5u','rhyshuxley@gmail.com'),(6,'rhyshuxley@gmail.com','$2y$10$dK.l9UCvFxkJCRWPg8VLCOMltG6RlhAhZSOuhopgBRU3u7UcqPrZO','rhyshuxley@gmail.com'),(7,'rhyshuxley@gmail.com','$2y$10$w6L8.cznzLy9NpbZpEUVd.rzRr7zQbR7EvkUjJSl2KsEXZIbQDrHW','rhyshuxley@gmail.com'),(8,'rhyshuxley@gmail.com','$2y$10$Fhlxi.wZ5YvghFJ.foBy2Odr9EaSyeMMKiG8rPvdU/eX4vnoxSxtW','rhyshuxley@gmail.com');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-09 15:29:45
