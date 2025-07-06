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

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_campaign_virtualvisitors
CREATE TABLE IF NOT EXISTS `table_campaign_virtualvisitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_campaign_virtualvisitors: ~0 rows (approximately)
DELETE FROM `table_campaign_virtualvisitors`;
INSERT INTO `table_campaign_virtualvisitors` (`id`, `name`, `code`, `username`, `date_created`) VALUES
	(25, 'akhir september 2024', 'QPG6', 'cinta', '2024-09-08 09:04:01');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_cs_map_wa_chat_rotator
CREATE TABLE IF NOT EXISTS `table_cs_map_wa_chat_rotator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `cs_number` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_cs_map_wa_chat_rotator: ~3 rows (approximately)
DELETE FROM `table_cs_map_wa_chat_rotator`;
INSERT INTO `table_cs_map_wa_chat_rotator` (`id`, `order_id`, `cs_number`, `country`, `city`, `region`, `date_created`) VALUES
	(3, 26, '89999', 'Indonesia', 'Bandung City', 'Java', '2025-03-21 08:09:42'),
	(4, 26, '089999', 'Indonesia', 'Unknown', 'Unknown', '2025-03-21 08:12:49');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_cs_record_wa_chat_rotator
CREATE TABLE IF NOT EXISTS `table_cs_record_wa_chat_rotator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `total_cs_numbers` int(11) DEFAULT NULL,
  `last_index` int(11) DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_cs_record_wa_chat_rotator: ~0 rows (approximately)
DELETE FROM `table_cs_record_wa_chat_rotator`;
INSERT INTO `table_cs_record_wa_chat_rotator` (`id`, `order_id`, `total_cs_numbers`, `last_index`, `date_modified`) VALUES
	(1, 3, 2, 0, '2025-03-22 09:31:42'),
	(2, 26, 2, 0, '2025-04-27 13:22:49');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_cs_schedule_wa_chat_rotator
CREATE TABLE IF NOT EXISTS `table_cs_schedule_wa_chat_rotator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `cs_number` varchar(50) DEFAULT NULL,
  `day_mode` enum('all','custom') DEFAULT NULL,
  `days_selected` varchar(200) DEFAULT NULL,
  `hour_open` varchar(5) DEFAULT NULL,
  `hour_closed` varchar(5) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_cs_schedule_wa_chat_rotator: ~3 rows (approximately)
DELETE FROM `table_cs_schedule_wa_chat_rotator`;
INSERT INTO `table_cs_schedule_wa_chat_rotator` (`id`, `order_id`, `cs_number`, `day_mode`, `days_selected`, `hour_open`, `hour_closed`, `date_created`) VALUES
	(1, 1, '084444', 'custom', 'null', '08:00', '12:00', '2025-03-22 01:44:02'),
	(3, 3, '089999', 'custom', '["senin","selasa","rabu","sabtu","minggu"]', '07:00', '20:00', '2025-03-22 02:34:23'),
	(4, 3, '08123455', 'custom', '["selasa","rabu","sabtu"]', '07:00', '22:00', '2025-03-22 03:39:50');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_cs_wa_chat_rotator
CREATE TABLE IF NOT EXISTS `table_cs_wa_chat_rotator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `cs_number` varchar(50) DEFAULT NULL,
  `client_target_device` enum('all','android','iphone','laptop') DEFAULT 'all',
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_cs_wa_chat_rotator: ~5 rows (approximately)
DELETE FROM `table_cs_wa_chat_rotator`;
INSERT INTO `table_cs_wa_chat_rotator` (`id`, `order_id`, `cs_number`, `client_target_device`, `date_created`) VALUES
	(18, 3, '089999', 'all', '2025-03-22 03:39:58'),
	(19, 3, '08123455', 'all', '2025-03-22 03:39:58'),
	(20, 0, '089999', 'all', '2025-04-25 13:54:24'),
	(24, 26, '0812345', 'all', '2025-04-27 03:33:41'),
	(25, 26, '0712345', 'all', '2025-04-27 03:33:41');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_data_virtualvisitors
CREATE TABLE IF NOT EXISTS `table_data_virtualvisitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `client_name` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `product_bought` varchar(50) DEFAULT NULL,
  `product_url` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `theme_display` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_data_virtualvisitors: ~6 rows (approximately)
DELETE FROM `table_data_virtualvisitors`;
INSERT INTO `table_data_virtualvisitors` (`id`, `order_id`, `campaign_id`, `client_name`, `gender`, `city`, `product_bought`, `product_url`, `username`, `theme_display`, `date_created`) VALUES
	(55, -1, NULL, 'Ujang', 'Lelaki', 'Bandung', 'Kerupuk', 'http://www.kerupuk.com', 'cinta', 'default', '2024-09-01 08:30:23'),
	(56, -1, NULL, 'Sandiono', 'Lelaki', 'Bandung', 'Kerupuk', 'http://www.kerupuk.com', 'cinta', 'default', '2024-09-01 08:51:06'),
	(57, -1, NULL, 'Eko', 'Lelaki', 'Bandung', 'Kerupuk', 'http://www.kerupuk.com', 'cinta', 'default', '2024-09-01 08:51:07'),
	(58, -1, NULL, 'Budi', 'Lelaki', 'Bandung', 'Kerupuk', 'http://www.kerupuk.com', 'cinta', 'default', '2024-09-01 08:51:07'),
	(59, -1, NULL, 'Didin', 'Lelaki', 'Bandung', 'Kerupuk', 'http://www.kerupuk.com', 'cinta', 'default', '2024-09-01 08:51:07'),
	(60, -1, NULL, 'Ujang', 'Lelaki', 'Bandung', 'Kerupuk', 'http://www.kerupuk.com', 'cinta', 'default', '2024-09-01 08:51:07');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_deposits
CREATE TABLE IF NOT EXISTS `table_deposits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `amount` int(20) NOT NULL DEFAULT 0,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_deposits: ~13 rows (approximately)
DELETE FROM `table_deposits`;
INSERT INTO `table_deposits` (`id`, `username`, `status`, `amount`, `date_created`) VALUES
	(18, 'kuya', 'cancel', 500000, '2024-08-13 07:56:53'),
	(19, 'cinta', 'purchased', 100000, '2024-08-14 01:08:16'),
	(24, 'cinta', 'purchased', 200000, '2024-09-09 18:38:03'),
	(25, 'cinta', 'purchased', 200000, '2024-09-11 02:30:44'),
	(26, 'coba', 'pending', 100000, '2025-03-08 10:43:08'),
	(27, 'coba', 'pending', 200000, '2025-03-08 11:01:11'),
	(28, 'coba', 'pending', 200000, '2025-03-08 11:02:16'),
	(29, 'coba', 'pending', 100000, '2025-03-08 11:05:44'),
	(30, 'coba', 'pending', 100000, '2025-03-09 02:33:47'),
	(31, 'aziz', 'pending', 500000, '2025-03-19 02:25:54'),
	(32, 'udin', 'pending', 50000, '2025-04-24 14:46:24'),
	(33, 'udin', 'pending', 100000, '2025-04-24 14:50:31'),
	(34, 'udin', 'pending', 100000, '2025-04-24 14:53:05'),
	(35, 'udin', 'pending', 200000, '2025-04-24 14:53:49'),
	(36, 'udin', 'purchased', 500000, '2025-04-25 16:13:53'),
	(37, 'udin', 'purchased', 500000, '2025-04-26 02:52:07');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_layananmanual
CREATE TABLE IF NOT EXISTS `table_layananmanual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_layanan` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `attachment` varchar(200) DEFAULT NULL,
  `username_owned` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('pending','cancelled','completed','in progress') DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_layananmanual: ~1 rows (approximately)
DELETE FROM `table_layananmanual`;
INSERT INTO `table_layananmanual` (`id`, `jenis_layanan`, `quantity`, `attachment`, `username_owned`, `user_id`, `status`, `date_created`) VALUES
	(7, 'format-os-laptop', 22, NULL, 'coba', 22, 'pending', '2025-03-10 01:54:31'),
	(8, 'ketik-dokumen-indonesia', 444, '250310/250310020133_layananmanual.png', 'coba', 22, 'pending', '2025-03-10 02:01:33');

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

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_comment: ~0 rows (approximately)
DELETE FROM `table_order_comment`;

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

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_format_os
CREATE TABLE IF NOT EXISTS `table_order_format_os` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(50) DEFAULT NULL,
  `descriptions` varchar(50) DEFAULT NULL,
  `delivery` varchar(50) DEFAULT NULL,
  `contact_person_name` varchar(50) DEFAULT NULL,
  `contact_person_wa` varchar(50) DEFAULT NULL,
  `contact_type` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_format_os: ~0 rows (approximately)
DELETE FROM `table_order_format_os`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_jasa
CREATE TABLE IF NOT EXISTS `table_order_jasa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `order_client_reff` varchar(50) DEFAULT NULL,
  `order_type` enum('comment','view','follow_marketplace','pembuatanaplikasi','rating','subscriber','upgrade_fituraplikasi','virtualvisitors','wishlist_marketplace','format_os','ketik_document','upload_aplikasi','wa_chat_rotator','landing_page') DEFAULT NULL,
  `status` enum('cancel','pending','approved') DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_jasa: ~18 rows (approximately)
DELETE FROM `table_order_jasa`;
INSERT INTO `table_order_jasa` (`id`, `order_id`, `order_client_reff`, `order_type`, `status`, `username`, `date_created`) VALUES
	(34, 5, 'x1moqr', 'wishlist_marketplace', 'approved', 'cinta', '2024-09-08 08:57:21'),
	(35, 10, 'vd2vw9', 'view', 'pending', 'cinta', '2024-09-11 03:48:04'),
	(37, 2, 'sxg7bz', 'wa_chat_rotator', 'pending', 'aziz', '2025-03-19 01:53:34'),
	(38, 3, 'cvfy4o', 'wa_chat_rotator', 'approved', 'aziz', '2025-03-19 01:57:45'),
	(40, 5, 'tcd695', 'wa_chat_rotator', 'approved', 'fgroupindonesia', '2025-04-12 18:54:32'),
	(41, 7, '64srmy', 'wa_chat_rotator', 'pending', 'fgroupindonesia', '2025-04-12 20:02:14'),
	(42, 8, 'rzav1c', 'wa_chat_rotator', 'pending', 'fgroupindonesia', '2025-04-12 20:02:44'),
	(43, 9, 'mz2vw2', 'wa_chat_rotator', 'pending', 'fgroupindonesia', '2025-04-12 20:03:31'),
	(44, 10, 'k7rhff', 'wa_chat_rotator', 'pending', 'fgroupindonesia', '2025-04-12 20:03:40'),
	(45, 11, '3wxtpw', 'wa_chat_rotator', 'pending', 'fgroupindonesia', '2025-04-12 20:04:46'),
	(46, 12, 'qe7e2e', 'wa_chat_rotator', 'approved', 'gumuruh', '2025-04-15 16:51:08'),
	(51, 17, 'kkfyut', 'wa_chat_rotator', 'approved', 'udin', '2025-04-25 15:49:39'),
	(52, 18, 'beg7vp', 'wa_chat_rotator', 'approved', 'udin', '2025-04-25 16:23:04'),
	(53, 19, '7yhmdx', 'wa_chat_rotator', 'approved', 'udin', '2025-04-25 16:27:56'),
	(54, 20, '5efuhe', 'wa_chat_rotator', 'pending', 'udin', '2025-04-25 18:18:09'),
	(55, 21, 'fjzo3w', 'wa_chat_rotator', 'approved', 'udin', '2025-04-25 20:37:55'),
	(56, 22, 'm3xeu0', 'wa_chat_rotator', 'pending', 'udin', '2025-04-25 20:38:53'),
	(57, 23, 'bhptbr', 'wa_chat_rotator', 'approved', 'udin', '2025-04-25 20:42:14'),
	(58, 24, 'enwjf3', 'wa_chat_rotator', 'approved', 'udin', '2025-04-25 21:29:22'),
	(59, 25, 'm0m387', 'wa_chat_rotator', 'approved', 'udin', '2025-04-26 02:53:38'),
	(60, 26, 'pk7agn', 'wa_chat_rotator', 'approved', 'udin', '2025-04-26 03:06:51');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_ketik_document
CREATE TABLE IF NOT EXISTS `table_order_ketik_document` (
  `id` int(11) NOT NULL,
  `document_name` varchar(50) DEFAULT NULL,
  `total_pages` int(11) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_limit` date DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_ketik_document: ~0 rows (approximately)
DELETE FROM `table_order_ketik_document`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_landingpage
CREATE TABLE IF NOT EXISTS `table_order_landingpage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package` enum('gratis','developer','bisnis','premium C','premium B','premium A+') DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `theme` varchar(50) DEFAULT NULL,
  `integrasi` enum('ya','tidak') DEFAULT NULL,
  `platform_integrasi` enum('drupal','wordpress','joomla','laravel','codeigniter','lain-lain','tidak') DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_landingpage: ~0 rows (approximately)
DELETE FROM `table_order_landingpage`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_pembuatanaplikasi
CREATE TABLE IF NOT EXISTS `table_order_pembuatanaplikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_base` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_pembuatanaplikasi: ~0 rows (approximately)
DELETE FROM `table_order_pembuatanaplikasi`;

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

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_upgrade_fituraplikasi
CREATE TABLE IF NOT EXISTS `table_order_upgrade_fituraplikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_base` varchar(50) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_upgrade_fituraplikasi: ~0 rows (approximately)
DELETE FROM `table_order_upgrade_fituraplikasi`;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_view: ~0 rows (approximately)
DELETE FROM `table_order_view`;
INSERT INTO `table_order_view` (`id`, `social_media`, `url`, `title`, `package`, `gender`, `question`, `valid_answer`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `username`, `date_created`) VALUES
	(10, 'tiktok', 'asd', 'asd', 'hemat', 'lelaki', 'asd', 'd', 'asd', 'asd', 'asd', 'asd', 'cinta', '2024-09-11 03:48:03');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_virtualvisitors
CREATE TABLE IF NOT EXISTS `table_order_virtualvisitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `website` varchar(50) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `business_name` varchar(75) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_virtualvisitors: ~0 rows (approximately)
DELETE FROM `table_order_virtualvisitors`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_wa_chat_rotator
CREATE TABLE IF NOT EXISTS `table_order_wa_chat_rotator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package` enum('gratis','bisnis','developer','vip') DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `rotator_mode` enum('random','order','schedule','origin','device') DEFAULT 'random',
  `custom_name` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `identifier_mode` enum('button contains','link contains','all buttons','all links','manual') DEFAULT 'manual',
  `identifier_tag` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_wa_chat_rotator: ~16 rows (approximately)
DELETE FROM `table_order_wa_chat_rotator`;
INSERT INTO `table_order_wa_chat_rotator` (`id`, `package`, `username`, `rotator_mode`, `custom_name`, `message`, `identifier_mode`, `identifier_tag`, `date_created`) VALUES
	(2, 'developer', 'aziz', 'origin', NULL, 'saya mau pesan merpati', NULL, NULL, '2025-03-19 01:53:34'),
	(3, 'developer', 'aziz', 'schedule', 'Salju', 'saya mau pesan pesawat sss di bulan salju', 'link contains', 'Coba 2', '2025-03-19 01:57:45'),
	(5, 'gratis', 'fgroupindonesia', 'random', NULL, NULL, 'manual', NULL, '2025-04-12 18:54:32'),
	(6, 'bisnis', 'fgroupindonesia', 'random', NULL, NULL, 'manual', NULL, '2025-04-12 20:01:55'),
	(7, 'bisnis', 'fgroupindonesia', 'random', NULL, NULL, 'manual', NULL, '2025-04-12 20:02:14'),
	(8, 'bisnis', 'fgroupindonesia', 'random', NULL, NULL, 'manual', NULL, '2025-04-12 20:02:44'),
	(9, 'bisnis', 'fgroupindonesia', 'random', NULL, NULL, 'manual', NULL, '2025-04-12 20:03:31'),
	(10, 'bisnis', 'fgroupindonesia', 'random', NULL, NULL, 'manual', NULL, '2025-04-12 20:03:40'),
	(11, 'bisnis', 'fgroupindonesia', 'random', NULL, NULL, 'manual', NULL, '2025-04-12 20:04:45'),
	(12, 'gratis', 'gumuruh', 'random', NULL, NULL, 'manual', NULL, '2025-04-15 16:51:08'),
	(17, 'gratis', 'udin', 'random', NULL, NULL, 'manual', NULL, '2025-04-25 15:49:39'),
	(18, 'bisnis', 'udin', 'random', NULL, NULL, 'manual', NULL, '2025-04-25 16:23:04'),
	(19, 'bisnis', 'udin', 'random', NULL, NULL, 'manual', NULL, '2025-04-25 16:27:56'),
	(20, 'bisnis', 'udin', 'random', NULL, NULL, 'manual', NULL, '2025-04-25 18:18:09'),
	(21, 'bisnis', 'udin', 'random', NULL, NULL, 'manual', NULL, '2025-04-25 20:37:55'),
	(22, 'bisnis', 'udin', 'random', NULL, NULL, 'manual', NULL, '2025-04-25 20:38:53'),
	(23, 'bisnis', 'udin', 'random', NULL, NULL, 'manual', NULL, '2025-04-25 20:42:14'),
	(24, 'bisnis', 'udin', 'random', NULL, NULL, 'manual', NULL, '2025-04-25 21:29:22'),
	(25, 'bisnis', 'udin', 'random', NULL, NULL, 'manual', NULL, '2025-04-26 02:53:38'),
	(26, 'bisnis', 'udin', 'device', 'Tema Otomatis', 'bla bla blaa', 'all buttons', '', '2025-04-26 03:06:51');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_wishlist_marketplace: ~0 rows (approximately)
DELETE FROM `table_order_wishlist_marketplace`;
INSERT INTO `table_order_wishlist_marketplace` (`id`, `marketplace`, `url`, `shop_name`, `package`, `gender`, `notes`, `username`, `date_created`) VALUES
	(5, '', '', '', NULL, 'lelaki', '', 'cinta', '2024-09-08 08:57:20');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_packages
CREATE TABLE IF NOT EXISTS `table_packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `quota` int(11) DEFAULT NULL,
  `base_price` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `order_type` enum('comment','view','follow_marketplace','pembuatanaplikasi','rating','subscriber','upgrade_fituraplikasi','virtualvisitors','wishlist_marketplace','format_os','ketik_document','upload_aplikasi','wa_chat_rotator','landingpage') DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_packages: ~22 rows (approximately)
DELETE FROM `table_packages`;
INSERT INTO `table_packages` (`id`, `name`, `quota`, `base_price`, `total_price`, `order_type`, `date_created`) VALUES
	(21, 'hemat', 1000, 200, 200000, 'comment', '2024-09-08 16:16:56'),
	(22, 'bisnis', 2000, 300, 600000, 'comment', '2024-09-08 16:18:00'),
	(23, 'hemat', 100, 400, 40000, 'view', '2024-09-08 16:21:56'),
	(24, 'bisnis', 300, 400, 120000, 'view', '2024-09-08 16:22:09'),
	(25, 'hemat', 200, 400, 80000, 'follow_marketplace', '2024-09-08 16:23:05'),
	(26, 'bisnis', 300, 500, 150000, 'follow_marketplace', '2024-09-08 16:23:18'),
	(27, 'hemat', 40, 300, 12000, 'subscriber', '2024-09-08 16:23:36'),
	(28, 'bisnis', 200, 1500, 300000, 'subscriber', '2024-09-08 16:23:56'),
	(29, 'hemat', 300, 200, 60000, 'wishlist_marketplace', '2024-09-08 16:24:36'),
	(30, 'bisnis', 400, 500, 200000, 'wishlist_marketplace', '2024-09-08 16:24:52'),
	(31, 'hemat', 300, 400, 120000, 'virtualvisitors', '2024-09-08 16:25:55'),
	(32, 'bisnis', 4000, 300, 1200000, 'virtualvisitors', '2024-09-08 16:26:07'),
	(33, 'hemat', 300, 500, 150000, 'rating', '2024-09-08 16:28:50'),
	(34, 'bisnis', 4000, 200, 800000, 'rating', '2024-09-08 16:29:04'),
	(35, 'developer', 100, 5000, 500000, 'wa_chat_rotator', '2025-03-18 16:45:21'),
	(36, 'bisnis', 20, 7500, 150000, 'wa_chat_rotator', '2025-03-18 16:41:45'),
	(37, 'gratis', 2, 0, 0, 'wa_chat_rotator', '2025-03-18 16:47:13'),
	(39, 'starter', 1, 199000, 199000, 'landingpage', '2025-03-22 15:53:43'),
	(40, 'bisnis', 1, 999000, 999000, 'landingpage', '2025-03-22 15:54:07'),
	(41, 'premium C', 1, 1999000, 1999000, 'landingpage', '2025-03-22 15:56:37'),
	(42, 'premium B', 1, 2999000, 2999000, 'landingpage', '2025-03-22 15:57:00'),
	(43, 'premium A+', 1, 6399000, 6399000, 'landingpage', '2025-03-22 15:57:58');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_purchased_order
CREATE TABLE IF NOT EXISTS `table_purchased_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_type` enum('comment','view','follow_marketplace','pembuatanaplikasi','rating','subscriber','upgrade_fituraplikasi','virtualvisitors','wishlist_marketplace','format_os','ketik_document','upload_aplikasi','wa_chat_rotator','landing_page') DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_purchased_order: ~4 rows (approximately)
DELETE FROM `table_purchased_order`;
INSERT INTO `table_purchased_order` (`id`, `order_type`, `total_price`, `username`, `date_created`) VALUES
	(4, 'wa_chat_rotator', 150000, 'udin', '2025-04-25 18:16:58'),
	(5, 'wa_chat_rotator', 150000, 'udin', '2025-04-25 21:29:23'),
	(6, 'wa_chat_rotator', 150000, 'udin', '2025-04-26 02:53:39'),
	(7, 'wa_chat_rotator', 150000, 'udin', '2025-04-26 03:06:52'),
	(8, 'wa_chat_rotator', 150000, 'udin', '2025-04-27 21:49:46');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_request_team_transfer
CREATE TABLE IF NOT EXISTS `table_request_team_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_request_team_transfer: ~0 rows (approximately)
DELETE FROM `table_request_team_transfer`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_system_works
CREATE TABLE IF NOT EXISTS `table_system_works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `approval_mode` enum('manual','automatic') DEFAULT NULL,
  `email_activity_notification` enum('on','off') DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_system_works: ~0 rows (approximately)
DELETE FROM `table_system_works`;
INSERT INTO `table_system_works` (`id`, `approval_mode`, `email_activity_notification`, `date_created`, `date_modified`) VALUES
	(1, 'automatic', 'on', '2025-04-25 19:23:05', '2025-04-25 21:29:16');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_themes_landingpage
CREATE TABLE IF NOT EXISTS `table_themes_landingpage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `genre` enum('free','premium') DEFAULT NULL,
  `url` text DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `file_preview` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_themes_landingpage: ~3 rows (approximately)
DELETE FROM `table_themes_landingpage`;
INSERT INTO `table_themes_landingpage` (`id`, `name`, `genre`, `url`, `description`, `file_preview`, `date_created`) VALUES
	(4, 'cobain', 'free', 'https://picsum.photos/id/1084/536/354?grayscale', 'cobain', '250323/250323070143_themes.jpgx', '2025-03-23 06:20:56'),
	(8, 'dd', 'free', 'https://picsum.photos/seed/picsum/536/354', 'ddd', '250323/250323065437_themes.jpeg', '2025-03-23 07:03:09');

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

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_uploads_landingpage
CREATE TABLE IF NOT EXISTS `table_uploads_landingpage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `theme` varchar(50) DEFAULT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_uploads_landingpage: ~0 rows (approximately)
DELETE FROM `table_uploads_landingpage`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_users
CREATE TABLE IF NOT EXISTS `table_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `sex` enum('male','female') DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `propic` varchar(50) DEFAULT NULL,
  `role` enum('team','admin','client') DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `balance` int(20) DEFAULT 0,
  `points` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_users: ~7 rows (approximately)
DELETE FROM `table_users`;
INSERT INTO `table_users` (`id`, `username`, `pass`, `fullname`, `sex`, `occupation`, `email`, `propic`, `role`, `whatsapp`, `balance`, `points`, `date_created`) VALUES
	(18, 'cinta', 'cinta', 'as', 'male', NULL, 'cinta@gmail.com', 'default-female.png', 'team', '2222', 0, NULL, '2024-10-01 03:48:41'),
	(19, 'aziz', 'aziz', 'asd', 'male', '', 'gumuruh@gmail.com', 'default-male.png', 'admin', '123', 0, NULL, '2024-10-01 04:06:01'),
	(20, 'aziz', 'gugum', 'Gumuruh', 'male', NULL, 'fgroupindonesia@gmail.com', 'default-male.png', 'admin', '09123', 0, NULL, '2024-10-01 04:06:38'),
	(21, 'udin', 'udin', 'udin markopolo', 'male', NULL, 'udin@home.com', 'default-male.png', 'client', '123', 100000, NULL, '2024-10-01 04:07:51'),
	(22, 'coba', 'coba', 'coba', 'female', NULL, 'coba@gmail.com', 'default-female.png', 'client', '0828282', 0, NULL, '2025-03-08 10:40:03'),
	(23, 'gumuruh', 'coba', 'coba', 'male', NULL, 'gumuruh@y.com', 'default-male.png', 'team', '282828', 0, NULL, '2025-04-12 09:24:13'),
	(31, 'fgroupindonesia', '7t2v9mo', 'gumuruh', 'male', 'none', 'testing@test.com', 'default-male.png', 'client', '828282', 0, NULL, '2025-04-12 11:13:18'),
	(34, 'gumuruh8376', 'mikail', 'mikail', 'male', 'none', 'gumuruhx@gmail.com', 'default-male.png', 'client', '0857121212', 0, NULL, '2025-04-20 06:53:56');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_web_wa_chat_rotator
CREATE TABLE IF NOT EXISTS `table_web_wa_chat_rotator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_web_wa_chat_rotator: ~4 rows (approximately)
DELETE FROM `table_web_wa_chat_rotator`;
INSERT INTO `table_web_wa_chat_rotator` (`id`, `order_id`, `url`, `date_created`) VALUES
	(20, 3, 'situs0mantap.com', '2025-03-22 03:39:58'),
	(21, 3, 'situskeren.com', '2025-03-22 03:39:58'),
	(22, 0, 'situskeren.com', '2025-04-25 13:54:24'),
	(26, 26, 'www.cintaidup.com', '2025-04-27 03:33:41');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
