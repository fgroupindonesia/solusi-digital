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

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_apps: ~0 rows (approximately)
DELETE FROM `table_apps`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_deposits
CREATE TABLE IF NOT EXISTS `table_deposits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `amount` int(20) NOT NULL DEFAULT 0,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_deposits: ~6 rows (approximately)
DELETE FROM `table_deposits`;
INSERT INTO `table_deposits` (`id`, `username`, `status`, `amount`, `date_created`) VALUES
	(18, 'kuya', 'cancel', 500, '2024-08-13 07:56:53'),
	(19, 'cinta', 'purchased', 100, '2024-08-14 01:08:16'),
	(20, 'cinta', 'cancel', 500, '2024-08-14 01:09:40'),
	(21, 'cinta', 'cancel', 500, '2024-08-14 01:14:13'),
	(22, 'cinta', 'purchased', 500, '2024-08-14 01:22:21'),
	(23, 'cinta', 'purchased', 200, '2024-08-14 01:33:52');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_comment
CREATE TABLE IF NOT EXISTS `table_order_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `social_media` varchar(50) NOT NULL DEFAULT '0',
  `url` text NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '0',
  `package` varchar(50) NOT NULL DEFAULT '0',
  `gender` varchar(50) NOT NULL DEFAULT '0',
  `notes` text NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_comment: ~4 rows (approximately)
DELETE FROM `table_order_comment`;
INSERT INTO `table_order_comment` (`id`, `social_media`, `url`, `title`, `package`, `gender`, `notes`, `username`, `date_created`) VALUES
	(1, 'instagram-post', 'sd', 'sd', 'bisnis', 'lelaki', 'sd', 'udin', '2024-08-12 19:37:30'),
	(2, '', 'sd', 'sdd', 'hemat', 'lelaki', 'gggg', 'udin', '2024-08-12 19:38:31'),
	(3, 'instagram-post, instagram-live', 'asd', 'asd', 'hemat', 'lelaki', 'asd', 'udin', '2024-08-12 20:09:59'),
	(4, 'instagram-live, tiktok-live', 'asd', 'asd', 'hemat', 'lelaki', 'asdasd', 'udin', '2024-08-12 22:46:02'),
	(5, 'shopee-live', 'asd', 'asd', 'hemat', 'lelaki', 'asd', 'cinta', '2024-08-14 00:55:07');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_follow_marketplace
CREATE TABLE IF NOT EXISTS `table_order_follow_marketplace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marketplace` varchar(50) NOT NULL DEFAULT '0',
  `url` text NOT NULL,
  `shop_name` varchar(50) NOT NULL DEFAULT '0',
  `package` varchar(50) NOT NULL DEFAULT '0',
  `gender` varchar(50) NOT NULL DEFAULT '0',
  `notes` text NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_follow_marketplace: ~0 rows (approximately)
DELETE FROM `table_order_follow_marketplace`;
INSERT INTO `table_order_follow_marketplace` (`id`, `marketplace`, `url`, `shop_name`, `package`, `gender`, `notes`, `username`, `date_created`) VALUES
	(1, 'bukalapak', 'sadasd', 'asdasd', 'hemat', 'lelaki', 'asdasd', 'udin', '2024-08-12 21:25:57'),
	(2, 'bukalapak, blibli', 'ssss', 'sss', 'bisnis', 'lelaki', 'sss', 'cinta', '2024-08-16 01:00:18');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_jasa
CREATE TABLE IF NOT EXISTS `table_order_jasa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `order_client_reff` varchar(50) DEFAULT NULL,
  `order_type` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_jasa: ~3 rows (approximately)
DELETE FROM `table_order_jasa`;
INSERT INTO `table_order_jasa` (`id`, `order_id`, `order_client_reff`, `order_type`, `status`, `username`, `date_created`) VALUES
	(19, 5, 'kaco9g', 'comment', 'pending', 'cinta', '2024-08-14 00:55:07'),
	(24, 3, '2x7ce4', 'subscriber', 'pending', 'cinta', '2024-08-16 01:05:25');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_rating
CREATE TABLE IF NOT EXISTS `table_order_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `social_media` varchar(50) NOT NULL DEFAULT '0',
  `url` text NOT NULL,
  `business_name` varchar(50) NOT NULL DEFAULT '',
  `package` varchar(50) NOT NULL DEFAULT '',
  `gender` varchar(50) NOT NULL DEFAULT '',
  `notes` text NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_rating: ~0 rows (approximately)
DELETE FROM `table_order_rating`;
INSERT INTO `table_order_rating` (`id`, `social_media`, `url`, `business_name`, `package`, `gender`, `notes`, `username`, `date_created`) VALUES
	(1, 'google-map', 'asdasd', 'asd', 'bisnis', 'lelaki', 'asdasd', 'udin', '2024-08-12 20:35:05'),
	(2, 'google-map', 'ssss', 'dddd', 'bisnis', 'lelaki', 'dsdasdsad', 'cinta', '2024-08-16 00:57:06');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_subscriber
CREATE TABLE IF NOT EXISTS `table_order_subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `social_media` varchar(50) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `account_name` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_subscriber: ~0 rows (approximately)
DELETE FROM `table_order_subscriber`;
INSERT INTO `table_order_subscriber` (`id`, `social_media`, `url`, `account_name`, `package`, `gender`, `username`, `date_created`) VALUES
	(2, 'tiktok, youtube', 'asd', 'asd', 'hemat', 'lelaki', 'udin', '2024-08-12 21:48:06'),
	(3, 'instagram', 'sss', 'sss', 'bisnis', 'perempuan', 'cinta', '2024-08-16 01:05:25');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_view
CREATE TABLE IF NOT EXISTS `table_order_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `social_media` varchar(50) DEFAULT NULL,
  `url` text NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `valid_answer` varchar(50) DEFAULT NULL,
  `answer_a` varchar(50) DEFAULT NULL,
  `answer_b` varchar(50) DEFAULT NULL,
  `answer_c` varchar(50) DEFAULT NULL,
  `answer_d` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_view: ~1 rows (approximately)
DELETE FROM `table_order_view`;
INSERT INTO `table_order_view` (`id`, `social_media`, `url`, `title`, `package`, `gender`, `question`, `valid_answer`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `username`, `date_created`) VALUES
	(8, 'tiktok, youtube', 'asd', 'asd', 'hemat', 'lelaki', 'asd', 'a', 'asd', 'asd', 'asd', 'asd', 'udin', '2024-08-12 20:22:35'),
	(9, 'youtube', 'dddd', 'ssss', 'bisnis', 'lelaki', 'dsdsd', 'c', 'a', 'b', 'c', 'd', 'cinta', '2024-08-16 00:40:02');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_wishlist_marketplace
CREATE TABLE IF NOT EXISTS `table_order_wishlist_marketplace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marketplace` varchar(50) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `shop_name` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_wishlist_marketplace: ~2 rows (approximately)
DELETE FROM `table_order_wishlist_marketplace`;
INSERT INTO `table_order_wishlist_marketplace` (`id`, `marketplace`, `url`, `shop_name`, `package`, `gender`, `notes`, `username`, `date_created`) VALUES
	(2, 'blibli', 'asd', 'asd', 'hemat', 'lelaki', 'asd', 'udin', '2024-08-12 21:42:58'),
	(3, 'lazada', 'asd', 'asd', 'hemat', 'lelaki', 'asd', 'udin', '2024-08-12 21:52:54'),
	(4, 'bukalapak, tokopedia', 'sss', 'sss', 'hemat', 'lelaki', 'ssss', 'cinta', '2024-08-16 01:03:18');

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
  `fullname` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `propic` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `balance` int(20) DEFAULT 0,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_users: ~10 rows (approximately)
DELETE FROM `table_users`;
INSERT INTO `table_users` (`id`, `username`, `pass`, `fullname`, `sex`, `occupation`, `email`, `propic`, `role`, `whatsapp`, `balance`, `date_created`) VALUES
	(2, 'udin', 'udin1234', 'udin udinan', 'male', 'private sector', 'gumuruh@gmail.com', 'default-male.png', 'admin', '12354999', 0, '2024-06-25 18:28:29'),
	(5, 'cinta', 'cintaku1', 'cinta we', 'female', 'swasta', 'trio.s.resmi@gmail.com', 'default-female.png', 'client', '022-029292', 1100, '2024-06-25 18:33:48'),
	(6, 'korean', 'korean', NULL, 'male', 'kerja', 'korean@gmail.com', 'default-male.png', 'client', '028928', 0, '2024-06-26 04:09:10'),
	(7, 'asdasd', 'sss', NULL, 'male', 'ddd', 'ss@yahoo.com', 'default-male.png', 'client', 'ssdas', 0, '2024-06-26 04:11:33'),
	(8, 'test', 'test', NULL, 'male', 'test', 'test', 'default-male.png', 'client', 'test', 0, '2024-06-27 10:01:37'),
	(9, 'as', 'as', NULL, 'male', 'as', 'as', 'default-male.png', 'client', 'as', 0, '2024-06-27 10:01:51'),
	(10, 'sdsd', 'sdsds', NULL, 'male', 'sdsd', 'sdsd@asd.com', 'default-male.png', 'client', 'sdsd', 0, '2024-06-27 10:02:39'),
	(11, 'cintaxxx', 'asdasd', NULL, 'male', 'asdasd', 'asd@gmail.com', 'default-male.png', 'client', '213', 0, '2024-06-27 10:05:07'),
	(12, 'asdasd', 'asd', NULL, 'female', 'asd', 'asd', 'default-female.png', 'client', 'asd', 0, '2024-06-27 10:12:21'),
	(15, 'kuya', 'dju4uoc', 'kuya kuyaan', 'male', 'none', 'kuya@gmail.com', 'default-male.png', 'client', '092929', 0, '2024-07-01 09:10:51');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
