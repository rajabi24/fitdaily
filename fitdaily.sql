-- MySQL dump 10.13  Distrib 9.6.0, for macos26.3 (arm64)
--
-- Host: localhost    Database: fitdaily
-- ------------------------------------------------------
-- Server version	9.6.0

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '3b7039fa-506e-11f1-80e4-8b46bde13254:1-201';

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meal_schedules`
--

DROP TABLE IF EXISTS `meal_schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meal_schedules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meal_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calories` int NOT NULL,
  `protein` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carbs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meal_schedules`
--

LOCK TABLES `meal_schedules` WRITE;
/*!40000 ALTER TABLE `meal_schedules` DISABLE KEYS */;
INSERT INTO `meal_schedules` VALUES (1,'Senin','Sarapan','2 Butir Telur',150,'12g','1g','Rebus atau goreng rendah minyak.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(2,'Senin','Makan Siang','Nasi Merah + Sayur + 1 Telur',400,'12g','45g','Sayur kangkung/pakcoy untuk serat.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(3,'Senin','Snack','2 Butir Telur Rebus',150,'12g','1g','Pre-gym snack untuk asupan protein.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(4,'Senin','Makan Malam','Nasi Merah + 1 Dada Ayam Full',600,'55g','45g','Post-gym recovery (Potongan utuh).','2026-05-16 07:51:26','2026-05-16 07:51:26'),(5,'Selasa','Sarapan','2 Butir Telur',150,'12g','1g','Maintenance protein di pagi hari.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(6,'Selasa','Makan Siang','Nasi Merah + Sayur + 1/2 Dada Ayam',450,'33g','45g','Jatah ayam dibagi dua (siang & malam).','2026-05-16 07:51:26','2026-05-16 07:51:26'),(7,'Selasa','Makan Malam','Nasi Merah + 1 Telur + 1/2 Dada Ayam',450,'33g','45g','Sisa setengah bagian ayam dari siang.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(8,'Rabu','Sarapan','2 Butir Telur',150,'12g','1g','Persiapan protein harian.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(9,'Rabu','Makan Siang','Nasi Merah + Sayur + 1 Telur',400,'12g','45g','Makan siang ringan sebelum gym.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(10,'Rabu','Snack','2 Telur Rebus',150,'12g','1g','Dimakan 1-2 jam sebelum latihan.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(11,'Rabu','Makan Malam','Nasi Merah + 1 Dada Ayam Full',600,'55g','45g','Nutrisi maksimal setelah latihan back.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(12,'Kamis','Sarapan','2 Butir Telur',150,'12g','1g','Protein dasar pagi hari.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(13,'Kamis','Makan Siang','Nasi Merah + Sayur + 1 Telur',400,'12g','45g','Karbohidrat kompleks untuk energi.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(14,'Kamis','Snack','2 Telur Rebus',150,'12g','1g','Dimakan sebelum sesi bahu/bisep.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(15,'Kamis','Makan Malam','Nasi Merah + 1 Dada Ayam Full',600,'55g','45g','Pemulihan otot setelah latihan.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(16,'Jumat','Sarapan','2 Butir Telur',150,'12g','1g','Setelah running pagi.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(17,'Jumat','Makan Siang','Nasi Merah + Sayur + 1/2 Dada Ayam',450,'33g','45g','Menjaga metabolisme di hari libur.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(18,'Jumat','Makan Malam','Nasi Merah + 1 Telur + 1/2 Dada Ayam',450,'33g','45g','Tetap disiplin protein meski rest day.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(19,'Sabtu','Sarapan','2 Butir Telur',150,'12g','1g','Energi awal sebelum Mega Day.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(20,'Sabtu','Makan Siang','Nasi Merah + Sayur + 1 Telur',400,'12g','45g','Persiapan untuk latihan kaki & dada.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(21,'Sabtu','Snack','2 Telur Rebus',150,'12g','1g','Wajib makan agar tidak lemas saat squat.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(22,'Sabtu','Makan Malam','Nasi Merah + 1 Dada Ayam Full',600,'55g','45g','Recovery paling penting di minggu ini.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(23,'Minggu','Sarapan','2 Butir Telur',150,'12g','1g','Setelah running/kardio santai.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(24,'Minggu','Makan Siang','Nasi Merah + Sayur + 1/2 Dada Ayam',450,'33g','45g','Menikmati hari istirahat.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(25,'Minggu','Makan Malam','Nasi Merah + 1 Telur + 1/2 Dada Ayam',450,'33g','45g','Penutup minggu yang konsisten.','2026-05-16 07:51:26','2026-05-16 07:51:26');
/*!40000 ALTER TABLE `meal_schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_05_15_150917_create_workout_schedules_table',2),(5,'2026_05_15_150922_create_meal_schedules_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('Jhfx8kwwRwyB9k2vn1VoQuVaF47Ygb2nQG3BeAFR',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJHNExHOEVzVXRVcGZTTzc1VnAxMHlMNDdTdEo3dlpyUHJ0ZHcxek04IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9tZWFscyIsInJvdXRlIjpudWxsfSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1778950368);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout_schedules`
--

DROP TABLE IF EXISTS `workout_schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workout_schedules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exercise_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int NOT NULL,
  `intensity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workout_schedules`
--

LOCK TABLES `workout_schedules` WRITE;
/*!40000 ALTER TABLE `workout_schedules` DISABLE KEYS */;
INSERT INTO `workout_schedules` VALUES (1,'Senin','Chest, Shoulder (Light), Tricep','Gym',75,'Berat','Fokus push movement (Dada & otot dorong).','2026-05-16 07:51:26','2026-05-16 07:51:26'),(2,'Selasa','Kuliah Full / Recovery','Rest',0,'-','Istirahat total karena jadwal kampus padat.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(3,'Rabu','Back, Bicep, & Accessory','Gym',60,'Sedang','Fokus pull movement (Punggung & otot tarik).','2026-05-16 07:51:26','2026-05-16 07:51:26'),(4,'Kamis','Shoulder & Bicep','Gym',60,'Sedang','Fokus pembentukan bahu & otot lengan.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(5,'Jumat','Morning Run / Walking','Running',30,'Ringan','Kardio ringan untuk kesehatan jantung.','2026-05-16 07:51:26','2026-05-16 07:51:26'),(6,'Sabtu','Chest, Legs, Tricep','Gym',90,'Berat','Sesi paling berat (Hajar Kaki & Dada).','2026-05-16 07:51:26','2026-05-16 07:51:26'),(7,'Minggu','Cardio (Flexi Time)','Running',45,'Ringan','Lari santai pagi atau sore sesuai kondisi.','2026-05-16 07:51:26','2026-05-16 07:51:26');
/*!40000 ALTER TABLE `workout_schedules` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-17  0:03:25
