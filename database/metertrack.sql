-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for metertrack
CREATE DATABASE IF NOT EXISTS `metertrack` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `metertrack`;

-- Dumping structure for table metertrack.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pelanggan` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table metertrack.pelanggan: ~2 rows (approximately)
INSERT INTO `pelanggan` (`id`, `id_pelanggan`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`, `status`) VALUES
	(1, '1', 'Aziz', 'Jl Mh Thamrin', '085155294499', '2024-11-27 08:40:03', '2024-11-27 08:40:03', 1),
	(2, '2', 'Test', 'Jalan test', '085155294499', '2024-11-27 08:45:17', '2024-11-27 16:14:29', 2),
	(3, '3', 'Test PGN', 'Jakarta', '085155294499', '2024-11-27 13:42:22', '2024-11-27 13:42:22', 1);

-- Dumping structure for table metertrack.pemakaian
CREATE TABLE IF NOT EXISTS `pemakaian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pelanggan` varchar(20) NOT NULL,
  `bulan` tinyint NOT NULL,
  `tahun` smallint NOT NULL,
  `volume` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table metertrack.pemakaian: ~2 rows (approximately)
INSERT INTO `pemakaian` (`id`, `id_pelanggan`, `bulan`, `tahun`, `volume`, `created_at`) VALUES
	(1, '1', 11, 2024, 50000.00, '2024-11-27 11:56:19'),
	(2, '1', 1, 2024, 50000.00, '2024-11-27 12:22:28'),
	(3, '3', 10, 2024, 100000.00, '2024-11-27 13:44:26'),
	(4, '3', 11, 2024, 100000.00, '2024-11-27 13:44:57');

-- Dumping structure for table metertrack.referensi
CREATE TABLE IF NOT EXISTS `referensi` (
  `id` int DEFAULT NULL,
  `jenis` int DEFAULT NULL,
  `deskripsi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table metertrack.referensi: ~2 rows (approximately)
INSERT INTO `referensi` (`id`, `jenis`, `deskripsi`, `status`) VALUES
	(1, 1, 'Admin', 1),
	(2, 1, 'Operator', 1);

-- Dumping structure for table metertrack.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table metertrack.users: ~4 rows (approximately)
INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'nopools', '$2y$10$0rF/HI0lKRHWVtrODNmZs.kaHaVAHKz74Vzn5VGKwLmpfbMEmI1aO', 2, '2024-11-26 20:36:58', '2024-11-27 10:47:25'),
	(2, 'admin', '$2y$10$0rF/HI0lKRHWVtrODNmZs.kaHaVAHKz74Vzn5VGKwLmpfbMEmI1aO', 1, '2024-11-26 19:03:52', '2024-11-27 02:16:24'),
	(3, 'operator', '$2y$10$0rF/HI0lKRHWVtrODNmZs.kaHaVAHKz74Vzn5VGKwLmpfbMEmI1aO', 2, '2024-11-26 19:09:40', '2024-11-27 20:43:36'),
	(4, 'test', '$2y$10$0rF/HI0lKRHWVtrODNmZs.kaHaVAHKz74Vzn5VGKwLmpfbMEmI1aO', 1, '2024-11-26 19:15:56', '2024-11-26 19:15:56');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
