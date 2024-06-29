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


USE `fgroupin_solusi_digital_v1`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_apps
CREATE TABLE IF NOT EXISTS `table_apps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username_owned` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `apps_name` varchar(50) DEFAULT NULL,
  `descriptions` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `best_screenshot` varchar(50) DEFAULT NULL,
  `privacy_url` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_apps: ~2 rows (approximately)
DELETE FROM `table_apps`;
INSERT INTO `table_apps` (`id`, `username_owned`, `user_id`, `apps_name`, `descriptions`, `icon`, `best_screenshot`, `privacy_url`, `status`, `date_created`) VALUES
	(1, 'udin', NULL, 'testing', 'hahah', 'icon.png', 'best.png', 'testing.com', 'pending', '2024-06-26 02:06:02'),
	(12, 'cinta', 5, 'xxx', 'x hahaha x', 'cc', 'cc', 'xx.com', 'pending', '2024-06-26 04:14:36'),
	(14, 'cinta', 5, 'sistem toko', 'beli buah buahan', 'buah.png', 'desktop.png', 'situsdia.com/privacy.html', 'pending', '2024-06-27 14:18:04');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_ticketing
CREATE TABLE IF NOT EXISTS `table_ticketing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `category` varchar(50) NOT NULL DEFAULT '0',
  `details` varchar(200) NOT NULL DEFAULT '0',
  `status` varchar(50) DEFAULT NULL,
  `screenshot` varchar(75) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_ticketing: ~0 rows (approximately)
DELETE FROM `table_ticketing`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_users
CREATE TABLE IF NOT EXISTS `table_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `propic` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_users: ~8 rows (approximately)
DELETE FROM `table_users`;
INSERT INTO `table_users` (`id`, `username`, `pass`, `sex`, `occupation`, `email`, `propic`, `role`, `whatsapp`, `date_created`) VALUES
	(2, 'udin', 'udin1234', 'female', 'swastasss', 'udin@home.com', 'default-male.png', 'admin', '1111', '2024-06-25 18:28:29'),
	(5, 'cinta', 'cintaku1', 'female', 'swasta', 'cinta@hotmail.com', 'default-female.png', 'client', '022-029292', '2024-06-25 18:33:48'),
	(6, 'korean', 'korean', 'male', 'kerja', 'korean@gmail.com', 'default-male.png', 'client', '028928', '2024-06-26 04:09:10'),
	(7, 'asdasd', 'sss', 'male', 'ddd', 'ss@yahoo.com', 'default-male.png', 'client', 'ssdas', '2024-06-26 04:11:33'),
	(8, 'test', 'test', 'male', 'test', 'test', 'default-male.png', 'client', 'test', '2024-06-27 10:01:37'),
	(9, 'as', 'as', 'male', 'as', 'as', 'default-male.png', 'client', 'as', '2024-06-27 10:01:51'),
	(10, 'sdsd', 'sdsds', 'male', 'sdsd', 'sdsd@asd.com', 'default-male.png', 'client', 'sdsd', '2024-06-27 10:02:39'),
	(11, 'cintaxxx', 'asdasd', 'male', 'asdasd', 'asd@gmail.com', 'default-male.png', 'client', '213', '2024-06-27 10:05:07'),
	(12, 'asdasd', 'asd', 'female', 'asd', 'asd', 'default-female.png', 'client', 'asd', '2024-06-27 10:12:21');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
