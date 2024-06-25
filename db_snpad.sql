-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_fgi_snotepad
DROP DATABASE IF EXISTS `db_fgi_snotepad`;
CREATE DATABASE IF NOT EXISTS `db_fgi_snotepad` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_fgi_snotepad`;

-- Dumping structure for table db_fgi_snotepad.table_data
DROP TABLE IF EXISTS `table_data`;
CREATE TABLE IF NOT EXISTS `table_data` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `folder` varchar(50) DEFAULT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `os` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_snotepad.table_data: ~22 rows (approximately)
DELETE FROM `table_data`;
INSERT INTO `table_data` (`id`, `folder`, `filename`, `ip_address`, `os`, `date_created`) VALUES
	(5, '20240504', 'kUUkwiS.snpad', '127.0.0.1', 'Windows', '2024-05-04 06:39:19'),
	(6, '20240604', 'tCJkJXG.snpad', '127.0.0.1', 'Windows', '2024-06-04 01:09:40'),
	(7, '20240604', 'jutugLv.snpad', '192.168.0.11', 'Windows', '2024-06-04 04:19:46'),
	(8, '20240604', 'tJWtjEg.snpad', '192.168.0.11', 'Windows', '2024-06-04 04:20:33'),
	(9, '20240604', 'KkVAieP.snpad', '192.168.0.11', 'Windows', '2024-06-04 04:21:58'),
	(10, '20240604', 'hTrGNPI.snpad', '192.168.0.11', 'Windows', '2024-06-04 04:23:34'),
	(11, '20240604', 'FIvakHq.snpad', '192.168.0.11', 'Windows', '2024-06-04 04:28:10'),
	(12, '20240604', 'bHXgvgj.snpad', '192.168.0.11', 'Windows', '2024-06-04 04:30:16'),
	(13, '20240604', 'jGKwkHG.snpad', '192.168.0.11', 'Windows', '2024-06-04 04:30:41'),
	(14, '20240604', 'oJIzWlo.snpad', '192.168.0.11', 'Windows', '2024-06-04 04:30:41'),
	(15, '20240604', 'QMOEYZF.snpad', '127.0.0.1', 'Windows', '2024-06-04 05:40:19'),
	(16, '20240604', 'aChdkLX.snpad', '127.0.0.1', 'Windows', '2024-06-04 05:41:12'),
	(17, '20240604', 'XecpDZO.snpad', '127.0.0.1', 'Windows', '2024-06-04 05:57:55'),
	(18, '20240604', 'iZVABuX.snpad', '127.0.0.1', 'Windows', '2024-06-04 05:59:07'),
	(19, '20240604', 'rVuxygQ.snpad', '127.0.0.1', 'Unknown', '2024-06-04 06:05:36'),
	(20, '20240604', 'abFHRLX.snpad', '127.0.0.1', 'Unknown', '2024-06-04 06:08:57'),
	(21, '20240604', 'ATOWZqj.snpad', '127.0.0.1', 'Unknown', '2024-06-04 06:47:11'),
	(22, '20240604', 'xzcvqnd.snpad', '127.0.0.1', 'Unknown', '2024-06-04 07:16:13'),
	(23, '20240604', 'KXaUCGc.snpad', '127.0.0.1', 'Unknown', '2024-06-04 07:16:40'),
	(24, '20240604', 'HCqOWgy.snpad', '127.0.0.1', 'Unknown', '2024-06-04 07:43:35'),
	(25, '20240604', 'MfQVaWo.snpad', '127.0.0.1', 'Unknown', '2024-06-04 07:49:08'),
	(26, '20240604', 'OJazaso.snpad', '127.0.0.1', 'Unknown', '2024-06-04 07:49:22'),
	(27, '20240605', 'AMZLfqe.snpad', '127.0.0.1', 'Unknown', '2024-06-05 00:46:04');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
