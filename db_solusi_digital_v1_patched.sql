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


-- Dumping database structure for db_fgi_sistem_solusi_digital_v1
CREATE DATABASE IF NOT EXISTS `db_fgi_sistem_solusi_digital_v1` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_fgi_sistem_solusi_digital_v1`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_purchased_order
CREATE TABLE IF NOT EXISTS `table_purchased_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_type` enum('comment','view','follow_marketplace','pembuatanaplikasi','rating','subscriber','upgrade_fituraplikasi','virtualvisitors','wishlist_marketplace','format_os','ketik_document','upload_aplikasi','wa_chat_rotator','landing_page') DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_purchased_order: ~1 rows (approximately)
DELETE FROM `table_purchased_order`;
INSERT INTO `table_purchased_order` (`id`, `order_type`, `total_price`, `username`, `date_created`) VALUES
	(4, 'wa_chat_rotator', 150000, 'udin', '2025-04-25 18:16:58'),
	(5, 'wa_chat_rotator', 150000, 'udin', '2025-04-25 21:29:23');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_system_works
CREATE TABLE IF NOT EXISTS `table_system_works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `approval_mode` enum('manual','automatic') DEFAULT NULL,
  `email_activity_notification` enum('on','off') DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_system_works: ~1 rows (approximately)
DELETE FROM `table_system_works`;
INSERT INTO `table_system_works` (`id`, `approval_mode`, `email_activity_notification`, `date_created`, `date_modified`) VALUES
	(1, 'automatic', 'on', '2025-04-25 19:23:05', '2025-04-25 21:29:16');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
