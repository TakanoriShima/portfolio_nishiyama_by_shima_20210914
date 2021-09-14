-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: nishiyama
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `comparison_items`
--

DROP TABLE IF EXISTS `comparison_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comparison_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comparison_template_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comparison_items`
--

LOCK TABLES `comparison_items` WRITE;
/*!40000 ALTER TABLE `comparison_items` DISABLE KEYS */;
INSERT INTO `comparison_items` VALUES (1,1,'メーカー','2021-09-14 07:02:13'),(2,1,'商品型番','2021-09-14 07:02:13'),(3,1,'価格','2021-09-14 07:02:13'),(4,1,'コメント','2021-09-14 07:02:13'),(5,1,'評判','2021-09-14 07:02:13'),(6,2,'商品型番','2021-09-14 07:27:51'),(7,2,'価格','2021-09-14 07:27:51'),(8,2,'コメント','2021-09-14 07:27:51'),(9,3,'メーカー','2021-09-14 07:45:14'),(10,3,'商品型番','2021-09-14 07:45:14'),(11,3,'価格','2021-09-14 07:45:14'),(12,3,'コメント','2021-09-14 07:45:14'),(13,3,'評判','2021-09-14 07:45:14'),(14,3,'備考','2021-09-14 07:45:14');
/*!40000 ALTER TABLE `comparison_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comparison_templates`
--

DROP TABLE IF EXISTS `comparison_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comparison_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comparison_templates`
--

LOCK TABLES `comparison_templates` WRITE;
/*!40000 ALTER TABLE `comparison_templates` DISABLE KEYS */;
INSERT INTO `comparison_templates` VALUES (1,'スマートフォン','2021-09-14 07:02:13'),(2,'冷蔵庫','2021-09-14 07:27:51'),(3,'車','2021-09-14 07:45:14');
/*!40000 ALTER TABLE `comparison_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_item_values`
--

DROP TABLE IF EXISTS `product_item_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_item_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `comparison_item_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_item_values`
--

LOCK TABLES `product_item_values` WRITE;
/*!40000 ALTER TABLE `product_item_values` DISABLE KEYS */;
INSERT INTO `product_item_values` VALUES (1,1,1,'Apple','2021-09-14 07:02:53'),(2,1,2,'10S','2021-09-14 07:02:53'),(3,1,3,'120000','2021-09-14 07:02:53'),(4,1,4,'最新版です','2021-09-14 07:02:53'),(5,1,5,'いいです','2021-09-14 07:02:53'),(6,2,1,'サムソン','2021-09-14 07:04:54'),(7,2,2,'5S','2021-09-14 07:04:54'),(8,2,3,'100000','2021-09-14 07:04:54'),(9,2,4,'写真がいい','2021-09-14 07:04:54'),(10,2,5,'まあまあ','2021-09-14 07:04:54'),(11,3,1,'Google','2021-09-14 07:26:11'),(12,3,2,'5a','2021-09-14 07:26:11'),(13,3,3,'130000','2021-09-14 07:26:11'),(14,3,4,'興味あり','2021-09-14 07:26:11'),(15,3,5,'あまりよくない','2021-09-14 07:26:11'),(16,4,6,'NR-F657WPX','2021-09-14 07:29:10'),(17,4,7,'100000','2021-09-14 07:29:10'),(18,4,8,'Panasonicです','2021-09-14 07:29:10'),(19,5,6,'R-KX50N-X','2021-09-14 07:30:29'),(20,5,7,'50000','2021-09-14 07:30:29'),(21,5,8,'日立の安い冷蔵庫','2021-09-14 07:30:29'),(22,6,9,'トヨタ','2021-09-14 07:45:58'),(23,6,10,'XX4','2021-09-14 07:45:58'),(24,6,11,'1000000','2021-09-14 07:45:58'),(25,6,12,'燃費がいい','2021-09-14 07:45:58'),(26,6,13,'まあまあ','2021-09-14 07:45:58'),(27,6,14,'今が買い時','2021-09-14 07:45:58'),(28,7,9,'ホンダ','2021-09-14 07:48:23'),(29,7,10,'R12','2021-09-14 07:48:23'),(30,7,11,'1200000','2021-09-14 07:48:23'),(31,7,12,'人気','2021-09-14 07:48:23'),(32,7,13,'良し','2021-09-14 07:48:23'),(33,7,14,'高い','2021-09-14 07:48:23');
/*!40000 ALTER TABLE `product_item_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comparison_template_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'iPhone','2021-09-14 07:02:53'),(2,1,'Galaxy','2021-09-14 07:04:54'),(3,1,'Pixel','2021-09-14 07:26:11'),(4,2,'WPXタイプ','2021-09-14 07:29:10'),(5,2,'ぴったりセレクト 冷蔵庫 フレンチ6ドア','2021-09-14 07:30:29'),(6,3,'ラクティス','2021-09-14 07:45:58'),(7,3,'FIT','2021-09-14 07:48:23');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template_item_relations`
--

DROP TABLE IF EXISTS `template_item_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template_item_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` int(11) NOT NULL,
  `template_item_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template_item_relations`
--

LOCK TABLES `template_item_relations` WRITE;
/*!40000 ALTER TABLE `template_item_relations` DISABLE KEYS */;
INSERT INTO `template_item_relations` VALUES (1,1,1,'2021-09-14 02:53:12'),(2,1,2,'2021-09-14 02:53:12'),(3,1,3,'2021-09-14 02:53:12'),(4,1,4,'2021-09-14 02:53:12'),(5,2,2,'2021-09-14 02:53:12'),(6,2,3,'2021-09-14 02:53:12');
/*!40000 ALTER TABLE `template_item_relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template_items`
--

DROP TABLE IF EXISTS `template_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template_items`
--

LOCK TABLES `template_items` WRITE;
/*!40000 ALTER TABLE `template_items` DISABLE KEYS */;
INSERT INTO `template_items` VALUES (1,'メーカー','2021-09-14 02:51:05'),(2,'商品型番','2021-09-14 02:51:05'),(3,'価格','2021-09-14 02:51:05'),(4,'コメント','2021-09-14 02:51:05');
/*!40000 ALTER TABLE `template_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `templates`
--

LOCK TABLES `templates` WRITE;
/*!40000 ALTER TABLE `templates` DISABLE KEYS */;
INSERT INTO `templates` VALUES (1,'テンプレートA','2021-09-14 02:51:58'),(2,'テンプレートB','2021-09-14 02:51:58');
/*!40000 ALTER TABLE `templates` ENABLE KEYS */;
UNLOCK TABLES;


