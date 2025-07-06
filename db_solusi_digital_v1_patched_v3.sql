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


-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_affiliate_carts
CREATE TABLE IF NOT EXISTS `table_affiliate_carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_user_id` int(11) DEFAULT NULL COMMENT 'ID pengguna pelanggan yang memiliki keranjang ini (bisa NULL jika pembeli adalah tamu)',
  `affiliate_user_id` int(11) DEFAULT NULL COMMENT 'ID klien afiliasi yang membawa pelanggan ini (untuk pelacakan komisi)',
  `cart_status` enum('active','completed','abandoned') NOT NULL DEFAULT 'active' COMMENT 'Status keranjang: aktif, selesai, atau ditinggalkan',
  `date_created` datetime DEFAULT current_timestamp(),
  `date_modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `customer_user_id` (`customer_user_id`),
  KEY `affiliate_user_id` (`affiliate_user_id`),
  CONSTRAINT `table_affiliate_carts_ibfk_1` FOREIGN KEY (`customer_user_id`) REFERENCES `table_users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `table_affiliate_carts_ibfk_2` FOREIGN KEY (`affiliate_user_id`) REFERENCES `table_users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_affiliate_carts: ~0 rows (approximately)
DELETE FROM `table_affiliate_carts`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_affiliate_cart_items
CREATE TABLE IF NOT EXISTS `table_affiliate_cart_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1 COMMENT 'Jumlah produk dalam item keranjang ini',
  `price_per_item` decimal(10,2) NOT NULL COMMENT 'Harga produk per unit saat ditambahkan ke keranjang. Penting untuk akurasi komisi jika harga berubah.',
  `descriptions` varchar(200) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `cart_id` (`cart_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `table_affiliate_cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `table_affiliate_carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `table_affiliate_cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `table_affiliate_products` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_affiliate_cart_items: ~0 rows (approximately)
DELETE FROM `table_affiliate_cart_items`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_affiliate_custom_prices
CREATE TABLE IF NOT EXISTS `table_affiliate_custom_prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `custom_price` decimal(10,2) NOT NULL COMMENT 'Harga jual produk yang diset oleh Client B',
  `markup_percentage` decimal(5,2) NOT NULL,
  `date_modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`product_id`) COMMENT 'Memastikan satu klien hanya memiliki satu harga kustom per produk',
  KEY `product_id` (`product_id`),
  CONSTRAINT `table_affiliate_custom_prices_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `table_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `table_affiliate_custom_prices_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `table_affiliate_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_affiliate_custom_prices: ~0 rows (approximately)
DELETE FROM `table_affiliate_custom_prices`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_affiliate_products
CREATE TABLE IF NOT EXISTS `table_affiliate_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Nama produk',
  `description` text DEFAULT NULL COMMENT 'Deskripsi detail produk',
  `short_info` text DEFAULT NULL,
  `base_price` decimal(10,2) NOT NULL COMMENT 'Harga dasar produk yang ditentukan admin',
  `status` varchar(50) DEFAULT NULL,
  `admin_commission_rate` decimal(5,2) NOT NULL DEFAULT 0.00 COMMENT 'Persentase komisi standar untuk Client A (misal: 10.00 untuk 10%)',
  `views_count` int(11) DEFAULT NULL,
  `rating_overall` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `table_affiliate_products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `table_affiliate_product_categories` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_affiliate_products: ~2 rows (approximately)
DELETE FROM `table_affiliate_products`;
INSERT INTO `table_affiliate_products` (`id`, `category_id`, `name`, `description`, `short_info`, `base_price`, `status`, `admin_commission_rate`, `views_count`, `rating_overall`, `date_created`, `date_modified`) VALUES
	(2, 2, 'ss', 'sss', NULL, 22.00, 'active', 22.00, NULL, NULL, '2025-06-11 14:45:13', '2025-06-11 14:45:13'),
	(3, 2, 'ss', 'sss', NULL, 22.00, 'active', 22.00, NULL, NULL, '2025-06-11 14:45:51', '2025-06-11 14:45:51');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_affiliate_product_categories
CREATE TABLE IF NOT EXISTS `table_affiliate_product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Nama kategori produk',
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_affiliate_product_categories: ~3 rows (approximately)
DELETE FROM `table_affiliate_product_categories`;
INSERT INTO `table_affiliate_product_categories` (`id`, `name`, `slug`) VALUES
	(1, 'test', 'test'),
	(2, 'asd', 'asd'),
	(3, 'korma emas', 'korma-emas');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_affiliate_product_images
CREATE TABLE IF NOT EXISTS `table_affiliate_product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_url` text NOT NULL COMMENT 'URL atau path ke gambar produk',
  `image_title` varchar(255) DEFAULT NULL COMMENT 'Judul atau nama gambar (opsional)',
  `image_description` text DEFAULT NULL COMMENT 'Deskripsi singkat tentang gambar (opsional)',
  `is_thumbnail` tinyint(1) DEFAULT 0 COMMENT 'Flag jika gambar ini adalah thumbnail utama produk',
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `table_affiliate_product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `table_affiliate_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_affiliate_product_images: ~3 rows (approximately)
DELETE FROM `table_affiliate_product_images`;
INSERT INTO `table_affiliate_product_images` (`id`, `product_id`, `image_url`, `image_title`, `image_description`, `is_thumbnail`, `date_created`) VALUES
	(6, 2, 'http://sd.fgroupindonesia.com/uploads/affiliateproducts/250611100150.jpg', 'te', 'tee', 0, '2025-06-11 17:01:50'),
	(7, 2, 'http://sd.fgroupindonesia.com/uploads/affiliateproducts/250611101530.jpeg', 'test', 'tessss', 0, '2025-06-11 17:15:30'),
	(8, 2, 'http://sd.fgroupindonesia.com/uploads/affiliateproducts/250611101928.jpeg', 'ga', 'ggg', 1, '2025-06-11 17:19:28');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_affiliate_product_reviews
CREATE TABLE IF NOT EXISTS `table_affiliate_product_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL COMMENT 'Rating produk, biasanya skala 1-5',
  `comment` text DEFAULT NULL COMMENT 'Teks ulasan atau komentar tentang produk',
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `table_affiliate_product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `table_affiliate_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `table_affiliate_product_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `table_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_affiliate_product_reviews: ~0 rows (approximately)
DELETE FROM `table_affiliate_product_reviews`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_affiliate_product_submissions
CREATE TABLE IF NOT EXISTS `table_affiliate_product_submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `estimated_price` decimal(15,2) NOT NULL,
  `image_filenames` varchar(255) DEFAULT NULL COMMENT 'Store comma-separated filenames if multiple images are uploaded',
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  `status` enum('pending','reviewed','approved','rejected') DEFAULT 'pending',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_affiliate_product_submissions: ~0 rows (approximately)
DELETE FROM `table_affiliate_product_submissions`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_affiliate_sales
CREATE TABLE IF NOT EXISTS `table_affiliate_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` varchar(50) DEFAULT NULL,
  `sale_date` datetime DEFAULT current_timestamp(),
  `quantity` int(11) NOT NULL DEFAULT 1 COMMENT 'Jumlah produk yang terjual dalam transaksi ini',
  `price_at_sale` decimal(10,2) NOT NULL COMMENT 'Harga jual produk oleh klien pada saat transaksi',
  `commission_amount` decimal(10,2) NOT NULL COMMENT 'Jumlah komisi yang didapat klien dari penjualan ini',
  `customer_name` varchar(255) DEFAULT NULL COMMENT 'Nama pembeli (opsional)',
  `customer_email` varchar(255) DEFAULT NULL COMMENT 'Email pembeli (opsional)',
  `date_created` datetime DEFAULT current_timestamp(),
  `date_modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `table_affiliate_sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `table_affiliate_products` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `table_affiliate_sales_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `table_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_affiliate_sales: ~0 rows (approximately)
DELETE FROM `table_affiliate_sales`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_affiliate_shop_profile
CREATE TABLE IF NOT EXISTS `table_affiliate_shop_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `affiliate_reff_code` varchar(50) DEFAULT NULL,
  `shop_title` varchar(50) DEFAULT NULL,
  `shop_banner_url_1` text DEFAULT NULL,
  `shop_banner_url_2` text DEFAULT NULL,
  `shop_banner_url_3` text DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_affiliate_shop_profile: ~1 rows (approximately)
DELETE FROM `table_affiliate_shop_profile`;
INSERT INTO `table_affiliate_shop_profile` (`id`, `user_id`, `affiliate_reff_code`, `shop_title`, `shop_banner_url_1`, `shop_banner_url_2`, `shop_banner_url_3`, `date_created`, `date_modified`) VALUES
	(2, 21, 'v23u1vm', 'Toko Keren', 'uploads/affiliateshops/250612043701_684a596def66a.jpg', 'uploads/affiliateshops/250612043701_684a596df0200.jpg', 'uploads/affiliateshops/250612043701_684a596df0f41.jpg', '2025-06-12 10:30:20', '2025-06-12 11:37:01');

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

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_cs_map_wa_chat_rotator: ~0 rows (approximately)
DELETE FROM `table_cs_map_wa_chat_rotator`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_cs_record_wa_chat_rotator
CREATE TABLE IF NOT EXISTS `table_cs_record_wa_chat_rotator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `total_cs_numbers` int(11) DEFAULT NULL,
  `last_index` int(11) DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_cs_record_wa_chat_rotator: ~1 rows (approximately)
DELETE FROM `table_cs_record_wa_chat_rotator`;
INSERT INTO `table_cs_record_wa_chat_rotator` (`id`, `order_id`, `group_id`, `total_cs_numbers`, `last_index`, `date_modified`) VALUES
	(5, 30, 8, 2, 0, '2025-06-13 09:03:49');

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

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_cs_schedule_wa_chat_rotator: ~0 rows (approximately)
DELETE FROM `table_cs_schedule_wa_chat_rotator`;

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_cs_wa_chat_rotator
CREATE TABLE IF NOT EXISTS `table_cs_wa_chat_rotator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `cs_nama` varchar(50) DEFAULT NULL,
  `cs_number` varchar(50) DEFAULT NULL,
  `cs_status` enum('enabled','disabled') DEFAULT NULL,
  `client_target_device` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `day_mode` enum('all','custom') DEFAULT 'all',
  `day_selected` varchar(50) DEFAULT NULL,
  `hour_open` varchar(5) DEFAULT NULL,
  `hour_closed` varchar(5) DEFAULT NULL,
  `total_leads` int(11) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_modified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_cs_wa_chat_rotator: ~2 rows (approximately)
DELETE FROM `table_cs_wa_chat_rotator`;
INSERT INTO `table_cs_wa_chat_rotator` (`id`, `order_id`, `group_id`, `cs_nama`, `cs_number`, `cs_status`, `client_target_device`, `country`, `city`, `region`, `day_mode`, `day_selected`, `hour_open`, `hour_closed`, `total_leads`, `date_created`, `date_modified`) VALUES
	(35, 30, 8, 'kentang', '0982128', 'enabled', 'all', NULL, NULL, NULL, 'all', NULL, NULL, NULL, 0, '2025-06-13 09:03:45', '2025-06-13 09:03:47'),
	(36, 30, 8, 'tomat', '21212', 'enabled', 'all', NULL, NULL, NULL, 'all', NULL, NULL, NULL, 0, '2025-06-13 09:03:49', '2025-06-13 09:03:50');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_data_virtualvisitors
CREATE TABLE IF NOT EXISTS `table_data_virtualvisitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `client_name` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `product_bought` varchar(50) DEFAULT NULL,
  `product_url` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `theme_display` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=338 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_data_virtualvisitors: ~9 rows (approximately)
DELETE FROM `table_data_virtualvisitors`;
INSERT INTO `table_data_virtualvisitors` (`id`, `order_id`, `client_name`, `city`, `product_bought`, `product_url`, `username`, `theme_display`, `date_created`) VALUES
	(329, 9, 'cinta', NULL, 'kerupuk', '#', 'coba', NULL, '2025-06-14 04:44:17'),
	(330, 9, 'cinta', NULL, 'mobil', '#', 'coba', NULL, '2025-06-14 04:44:18'),
	(331, 9, 'cinta', NULL, 'pesawat', '#', 'coba', NULL, '2025-06-14 04:44:18'),
	(332, 9, 'cintaku', NULL, 'kerupuk', '#', 'coba', NULL, '2025-06-14 04:44:18'),
	(333, 9, 'cintaku', NULL, 'mobil', '#', 'coba', NULL, '2025-06-14 04:44:18'),
	(334, 9, 'cintaku', NULL, 'pesawat', '#', 'coba', NULL, '2025-06-14 04:44:18'),
	(335, 9, 'cintamu', NULL, 'kerupuk', '#', 'coba', NULL, '2025-06-14 04:44:18'),
	(336, 9, 'cintamu', NULL, 'mobil', '#', 'coba', NULL, '2025-06-14 04:44:18'),
	(337, 9, 'cintamu', NULL, 'pesawat', '#', 'coba', NULL, '2025-06-14 04:44:18');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_deposits
CREATE TABLE IF NOT EXISTS `table_deposits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `amount` int(20) NOT NULL DEFAULT 0,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_deposits: ~30 rows (approximately)
DELETE FROM `table_deposits`;
INSERT INTO `table_deposits` (`id`, `username`, `status`, `amount`, `date_created`) VALUES
	(18, 'kuya', 'cancel', 500000, '2024-08-13 07:56:53'),
	(19, 'cinta', 'purchased', 100000, '2024-08-14 01:08:16'),
	(24, 'cinta', 'purchased', 200000, '2024-09-09 18:38:03'),
	(25, 'cinta', 'purchased', 200000, '2024-09-11 02:30:44'),
	(26, 'coba', 'purchased', 100000, '2025-03-08 10:43:08'),
	(27, 'coba', 'purchased', 200000, '2025-03-08 11:01:11'),
	(28, 'coba', 'purchased', 200000, '2025-03-08 11:02:16'),
	(29, 'coba', 'purchased', 100000, '2025-03-08 11:05:44'),
	(30, 'coba', 'purchased', 100000, '2025-03-09 02:33:47'),
	(31, 'aziz', 'purchased', 500000, '2025-03-19 02:25:54'),
	(32, 'udin', 'purchased', 50000, '2025-04-24 14:46:24'),
	(33, 'udin', 'purchased', 100000, '2025-04-24 14:50:31'),
	(34, 'udin', 'purchased', 100000, '2025-04-24 14:53:05'),
	(35, 'udin', 'purchased', 200000, '2025-04-24 14:53:49'),
	(36, 'udin', 'purchased', 500000, '2025-04-25 16:13:53'),
	(37, 'udin', 'purchased', 500000, '2025-04-26 02:52:07'),
	(38, 'udin', 'purchased', 1000000, '2025-05-21 09:27:08'),
	(39, 'udin', 'purchased', 1000000, '2025-05-21 09:27:43'),
	(40, 'udin', 'purchased', 1000000, '2025-05-29 01:12:41'),
	(41, 'udin', 'purchased', 200000, '2025-05-29 01:53:44'),
	(42, 'udin', 'purchased', 1000000, '2025-05-29 08:04:31'),
	(43, 'udin', 'purchased', 500000, '2025-05-29 08:06:25'),
	(44, 'udin', 'purchased', 1000000, '2025-05-29 08:50:38'),
	(45, 'udin', 'purchased', 1000000, '2025-05-29 08:51:42'),
	(46, 'udin', 'purchased', 1000000, '2025-05-29 08:52:39'),
	(47, 'udin', 'purchased', 1000000, '2025-05-29 08:53:31'),
	(48, 'udin', 'purchased', 500000, '2025-05-29 10:15:01'),
	(49, 'udin', 'purchased', 1000000, '2025-05-29 10:16:22'),
	(50, 'udin', 'purchased', 1000000, '2025-05-29 10:31:36'),
	(51, 'udin', 'purchased', 200000, '2025-05-29 10:31:46'),
	(52, 'udin', 'purchased', 1000000, '2025-05-29 11:21:10'),
	(53, 'coba', 'purchased', 500000, '2025-06-13 22:44:59');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_group_wa_chat_rotator
CREATE TABLE IF NOT EXISTS `table_group_wa_chat_rotator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `group_code_reff` varchar(50) DEFAULT NULL COMMENT 'group code reff is similar to order client reff it just used for the code generated access for client',
  `nama` varchar(50) DEFAULT NULL,
  `distribusi` varchar(50) DEFAULT NULL,
  `client_target_device` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `total_clicks` int(11) DEFAULT 0,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_group_wa_chat_rotator: ~1 rows (approximately)
DELETE FROM `table_group_wa_chat_rotator`;
INSERT INTO `table_group_wa_chat_rotator` (`id`, `order_id`, `group_code_reff`, `nama`, `distribusi`, `client_target_device`, `country`, `city`, `region`, `total_clicks`, `date_created`) VALUES
	(8, 30, '83y4fem', 'coba lagi', 'order', '', NULL, NULL, NULL, 0, '2025-06-13 08:48:10');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_comment: ~2 rows (approximately)
DELETE FROM `table_order_comment`;
INSERT INTO `table_order_comment` (`id`, `social_media`, `url`, `title`, `package`, `gender`, `notes`, `username`, `date_created`) VALUES
	(6, 'instagram-live, tiktok-live', 'asd', 'asd', 'hemat', 'lelaki', 'asdasd', 'udin', '2025-05-29 10:46:45'),
	(7, 'instagram-live, tiktok-live', 'sd', 'sd', 'hemat', 'perempuan', 'asdwewe', 'udin', '2025-05-29 10:48:52');

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
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_format_os: ~13 rows (approximately)
DELETE FROM `table_order_format_os`;
INSERT INTO `table_order_format_os` (`id`, `model`, `descriptions`, `delivery`, `contact_person_name`, `contact_person_wa`, `contact_type`, `package`, `username`, `date_created`) VALUES
	(1, 'samsung', 'blabla', 'ya', 'saya', '0808', 'blablabla', 'test aja', 'udin', NULL),
	(2, 'pentium 4', 'sobcaaa', 'pickup', 'udin markopolo', '123', NULL, 'Reguler', 'udin', NULL),
	(3, 'pentium 5', 'coba', 'pickup', 'udin markopolo', '123', NULL, 'Reguler', 'udin', NULL),
	(4, 'samsung', 'blabla', 'ya', 'saya', '0808', 'blablabla', 'Reguler', 'udin', NULL),
	(5, 'samsung', 'blabla', 'ya', 'saya', '0808', 'blablabla', 'Reguler', 'udin', NULL),
	(6, 'samsung', 'blabla', 'ya', 'saya', '0808', 'blablabla', 'Reguler', 'udin', NULL),
	(7, 'samsung', 'blabla', 'ya', 'saya', '0808', 'blablabla', 'Reguler', 'udin', NULL),
	(8, 'samsung', 'blabla', 'ya', 'saya', '0808', 'blablabla', 'Reguler', 'udin', NULL),
	(9, 'samsung', 'blabla', 'ya', 'saya', '0808', 'blablabla', 'Reguler', 'udin', NULL),
	(10, 'samsung', 'blabla', 'ya', 'saya', '0808', 'blablabla', 'Reguler', 'udin', '2025-05-19 02:45:43'),
	(11, 'samsung', 'blabla', 'ya', 'saya', '0808', 'blablabla', 'Reguler', 'udin', '2025-05-19 02:47:27'),
	(12, 'samsung', 'blabla', 'ya', 'saya', '0808', 'blablabla', 'Reguler', 'udin', '2025-05-19 03:01:39'),
	(19, 'pentium 4', 'coba', 'pickup', 'udin markopolo', '123', NULL, 'Reguler', 'udin', '2025-05-21 04:23:29');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_jasa
CREATE TABLE IF NOT EXISTS `table_order_jasa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `purchased_order_id` int(11) DEFAULT NULL,
  `order_client_reff` varchar(50) DEFAULT NULL,
  `order_type` varchar(50) DEFAULT NULL,
  `status` enum('cancel','pending','approved','on progress','delivered','revision','completed') DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `has_revision` tinyint(4) DEFAULT NULL,
  `max_revisions` tinyint(4) DEFAULT NULL,
  `admin_descriptions` text DEFAULT NULL,
  `end_result_type` enum('manual','upload') DEFAULT NULL,
  `end_result_link` text DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_jasa: ~28 rows (approximately)
DELETE FROM `table_order_jasa`;
INSERT INTO `table_order_jasa` (`id`, `order_id`, `purchased_order_id`, `order_client_reff`, `order_type`, `status`, `username`, `has_revision`, `max_revisions`, `admin_descriptions`, `end_result_type`, `end_result_link`, `date_created`, `date_updated`) VALUES
	(79, 19, 21, 'guzeox', 'format_os', 'completed', 'udin', NULL, NULL, 'ssss', 'upload', 'http://sd.fgroupindonesia.com/uploads/endresults/250527043751.png', '2025-05-21 04:23:29', '2025-05-28 15:44:08'),
	(84, 6, 26, 'fz8ygv', 'ketik_document', 'completed', 'udin', NULL, NULL, '222', 'manual', 'http://sd.fgroupindonesia.com/uploads/endresults/250527043751x.png', '2025-05-21 09:26:29', '2025-05-27 17:44:35'),
	(87, 7, 30, '1jvf34', 'ketik_document', 'completed', 'udin', NULL, NULL, 'yah', 'manual', 'http://www.com.com', '2025-05-27 18:08:01', '2025-05-29 08:27:49'),
	(88, 8, 31, 'dcvzez', 'ketik_document', 'approved', 'udin', 1, 2, NULL, NULL, NULL, '2025-05-28 00:24:15', '2025-05-28 00:24:15'),
	(89, 9, 32, 'vaydq9', 'ketik_document', 'completed', 'udin', 1, 2, 'coba lagi', 'manual', 'http://cobain.com', '2025-05-28 00:26:59', '2025-05-29 05:34:34'),
	(97, 8, 33, '5x5db6', 'uploadaplikasi', 'approved', 'udin', 0, 0, NULL, NULL, NULL, '2025-05-29 01:51:23', '2025-05-29 01:51:23'),
	(98, 9, 34, 'owwrhv', 'uploadaplikasi', 'completed', 'udin', 0, 0, 'coba lagi', 'manual', 'http://cobain.com', '2025-05-29 01:52:02', '2025-05-29 05:34:34'),
	(99, 10, 35, '546hm3', 'uploadaplikasi', 'delivered', 'udin', 0, 0, 'testing ya sedang diproses', 'manual', 'http://cobain.com', '2025-05-29 05:52:00', '2025-05-29 06:56:57'),
	(100, 4, 36, 'quf7bv', 'upgrade_fituraplikasi', 'approved', 'udin', NULL, NULL, NULL, NULL, NULL, '2025-05-29 07:51:10', '2025-05-29 07:51:11'),
	(103, 7, 37, 'egugv4', 'upgrade_fituraplikasi', 'completed', 'udin', 1, 2, 'yah', 'manual', 'http://www.com.com', '2025-05-29 08:14:08', '2025-05-29 08:27:49'),
	(104, 3, 38, 'j51xrw', 'pembuatanaplikasi', 'approved', 'udin', NULL, NULL, NULL, NULL, NULL, '2025-05-29 09:43:53', '2025-05-29 09:43:54'),
	(105, 4, 39, '63m054', 'pembuatanaplikasi', 'approved', 'udin', NULL, NULL, NULL, NULL, NULL, '2025-05-29 09:46:17', '2025-05-29 09:46:18'),
	(106, 5, 40, 'zmayoh', 'pembuatanaplikasi', 'approved', 'udin', NULL, NULL, NULL, NULL, NULL, '2025-05-29 10:32:35', '2025-05-29 10:32:36'),
	(107, 6, 41, '1z9xv6', 'comment', 'approved', 'udin', NULL, NULL, NULL, NULL, NULL, '2025-05-29 10:46:45', '2025-05-29 10:46:46'),
	(108, 7, 42, '52n3ke', 'comment', 'approved', 'udin', NULL, NULL, NULL, NULL, NULL, '2025-05-29 10:48:52', '2025-05-29 10:48:52'),
	(109, 4, 43, '5n5pq7', 'subscriber', 'approved', 'udin', NULL, NULL, NULL, NULL, NULL, '2025-05-29 10:55:11', '2025-05-29 10:55:11'),
	(110, 5, 44, '3oc3ky', 'subscriber', 'approved', 'udin', NULL, NULL, NULL, NULL, NULL, '2025-05-29 10:56:36', '2025-05-29 10:56:36'),
	(111, 3, 45, 'v79cs7', 'rating', 'approved', 'udin', NULL, NULL, NULL, NULL, NULL, '2025-05-29 11:16:46', '2025-05-29 11:16:46'),
	(112, 5, 46, 'rw83sv', 'virtualvisitors', 'approved', 'udin', NULL, NULL, NULL, NULL, NULL, '2025-05-29 11:19:44', '2025-05-29 11:19:45'),
	(113, 6, 47, 'kfnac8', 'virtualvisitors', 'approved', 'udin', NULL, NULL, NULL, NULL, NULL, '2025-05-29 11:21:50', '2025-05-29 11:21:50'),
	(114, 27, 48, '1b9bh4', 'wa_chat_rotator', 'approved', 'udin', NULL, NULL, NULL, NULL, NULL, '2025-05-29 11:29:11', '2025-05-29 11:29:12'),
	(115, 28, 49, 'qoe968', 'wa_chat_rotator', 'approved', 'udin', NULL, NULL, NULL, NULL, NULL, '2025-05-29 11:31:02', '2025-05-29 11:31:03'),
	(118, 7, 50, 'kowt4y', 'virtualvisitors', 'approved', 'udin', NULL, NULL, NULL, NULL, NULL, '2025-05-29 14:50:54', '2025-05-29 14:50:54'),
	(122, 6, 51, 'hxhuf4', 'landing_page', 'approved', 'udin', 1, 2, NULL, NULL, NULL, '2025-05-29 14:57:56', '2025-05-29 14:57:56'),
	(123, 7, 52, 'tqz1cw', 'landing_page', 'approved', 'udin', 1, 2, NULL, NULL, NULL, '2025-05-29 14:58:54', '2025-05-29 14:58:54'),
	(124, 29, 53, 'q9rnu2', 'wa_chat_rotator', 'approved', 'udin', NULL, NULL, NULL, NULL, NULL, '2025-05-29 15:16:17', '2025-05-29 15:16:17'),
	(128, 9, 57, 'yfcu49', 'virtualvisitors', 'approved', 'coba', NULL, NULL, NULL, NULL, NULL, '2025-06-14 02:47:05', '2025-06-14 02:47:05'),
	(129, 32, 58, 'vnrnur', 'wa_chat_rotator', 'approved', 'coba', NULL, NULL, NULL, NULL, NULL, '2025-06-14 02:57:51', '2025-06-14 02:57:51');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_ketik_document
CREATE TABLE IF NOT EXISTS `table_order_ketik_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_name` varchar(50) DEFAULT NULL,
  `total_pages` int(11) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `descriptions` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_limit` date DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_ketik_document: ~3 rows (approximately)
DELETE FROM `table_order_ketik_document`;
INSERT INTO `table_order_ketik_document` (`id`, `document_name`, `total_pages`, `package`, `descriptions`, `username`, `date_limit`, `date_created`) VALUES
	(6, 'ssd', 22, 'paket B', 'coba', 'udin', '2025-05-03', '2025-05-21 09:26:29'),
	(7, 'coba lagi', 22, 'paket B', 'yah ini dia', 'udin', '2025-05-08', '2025-05-27 18:08:01'),
	(8, 'coba lagixxxxx', 22, 'paket A', 'ss', 'udin', '2025-05-06', '2025-05-28 00:24:15'),
	(9, 'kotakx', 3, 'paket A', 'yeah', 'udin', '2025-05-10', '2025-05-28 00:26:59');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_landing_page
CREATE TABLE IF NOT EXISTS `table_order_landing_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `integrasi` enum('ya','tidak') DEFAULT NULL,
  `platform_integrasi` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_landing_page: ~5 rows (approximately)
DELETE FROM `table_order_landing_page`;
INSERT INTO `table_order_landing_page` (`id`, `package`, `username`, `integrasi`, `platform_integrasi`, `date_created`) VALUES
	(2, 'Paket Gratisan', 'udin', 'tidak', NULL, '2025-05-29 14:50:21'),
	(3, 'Paket Gratisan', 'udin', 'tidak', NULL, '2025-05-29 14:51:28'),
	(4, 'Paket Gratisan', 'udin', 'tidak', '', '2025-05-29 14:52:18'),
	(5, 'Paket Gratisan', 'udin', 'tidak', NULL, '2025-05-29 14:55:48'),
	(6, 'Paket Gratisan', 'udin', 'tidak', NULL, '2025-05-29 14:57:56'),
	(7, 'Paket Gratisan', 'udin', 'tidak', NULL, '2025-05-29 14:58:54');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_pembuatanaplikasi: ~2 rows (approximately)
DELETE FROM `table_order_pembuatanaplikasi`;
INSERT INTO `table_order_pembuatanaplikasi` (`id`, `app_base`, `title`, `package`, `notes`, `username`, `date_created`) VALUES
	(3, 'cpp', 'asd', 'Paket UMKM', 'asdasd', 'udin', '2025-05-29 09:43:53'),
	(4, 'java, csharp', 'asdsad', 'Paket UMKM', 'asdasd', 'udin', '2025-05-29 09:46:17'),
	(5, 'vb', 'sadsda', 'Paket UMKM', 'oke keren', 'udin', '2025-05-29 10:32:35');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_rating: ~0 rows (approximately)
DELETE FROM `table_order_rating`;
INSERT INTO `table_order_rating` (`id`, `social_media`, `url`, `business_name`, `package`, `gender`, `notes`, `username`, `date_created`) VALUES
	(3, 'google-map', 'https://netmovies.to/', 'asdasd', 'hemat', 'lelaki', 'asdasd', 'udin', '2025-05-29 11:16:46');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_revisions
CREATE TABLE IF NOT EXISTS `table_order_revisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `order_type` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `client_descriptions` text DEFAULT NULL,
  `status` enum('on progress','accepted','rejected','completed') DEFAULT NULL,
  `end_result_link` text DEFAULT NULL,
  `admin_descriptions` text DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_revisions: ~1 rows (approximately)
DELETE FROM `table_order_revisions`;
INSERT INTO `table_order_revisions` (`id`, `order_id`, `order_type`, `username`, `client_descriptions`, `status`, `end_result_link`, `admin_descriptions`, `date_created`, `date_updated`) VALUES
	(12, 9, 'ketik_document', 'udin', 'cobain yah', 'accepted', 'ss', 'asdx', '2025-05-28 11:29:25', '2025-05-28 15:00:33'),
	(15, 9, 'ketik_document', 'udin', 'hahaha thanks broo! keren', 'accepted', 'sss', 'ddd', '2025-05-28 14:26:06', '2025-05-28 15:23:19');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_subscriber: ~4 rows (approximately)
DELETE FROM `table_order_subscriber`;
INSERT INTO `table_order_subscriber` (`id`, `social_media`, `url`, `account_name`, `package`, `gender`, `username`, `date_created`) VALUES
	(2, 'tiktok, youtube', 'asd', 'asd', 'hemat', 'lelaki', 'udin', '2024-08-12 21:48:06'),
	(3, 'instagram', 'sss', 'sss', 'bisnis', 'perempuan', 'cinta', '2024-08-16 01:05:25'),
	(4, 'tiktok', 'asdasd', 'asdasd', 'hemat', 'lelaki', 'udin', '2025-05-29 10:55:11'),
	(5, 'youtube', 'asda', 'sd', 'hemat', 'lelaki', 'udin', '2025-05-29 10:56:36');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_types
CREATE TABLE IF NOT EXISTS `table_order_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) DEFAULT NULL,
  `slug_name` varchar(75) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_types: ~16 rows (approximately)
DELETE FROM `table_order_types`;
INSERT INTO `table_order_types` (`id`, `name`, `slug_name`, `date_created`) VALUES
	(4, 'test yah', 'test_yah', '2025-05-19 00:23:29'),
	(5, 'format os', 'format_os', '2025-05-19 00:24:11'),
	(6, 'comment', 'comment', '2025-05-19 00:25:44'),
	(7, 'view', 'view', '2025-05-19 00:25:55'),
	(8, 'follow marketplace', 'follow_marketplace', '2025-05-19 00:26:02'),
	(9, 'pembuatanaplikasi', 'pembuatanaplikasi', '2025-05-19 00:26:10'),
	(10, 'rating', 'rating', '2025-05-19 00:26:22'),
	(11, 'subscriber', 'subscriber', '2025-05-19 00:26:32'),
	(12, 'upgrade fituraplikasi', 'upgrade_fituraplikasi', '2025-05-19 00:26:40'),
	(13, 'virtualvisitors', 'virtualvisitors', '2025-05-19 00:26:48'),
	(14, 'wishlist marketplace', 'wishlist_marketplace', '2025-05-19 00:26:54'),
	(15, 'ketik document', 'ketik_document', '2025-05-19 00:27:00'),
	(16, 'upload aplikasi', 'upload_aplikasi', '2025-05-19 00:27:15'),
	(17, 'wa chat rotator', 'wa_chat_rotator', '2025-05-19 00:27:21'),
	(18, 'landing page', 'landing_page', '2025-05-19 00:27:27'),
	(19, 'uploadaplikasi', 'uploadaplikasi', '2025-05-28 19:29:08');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_upgrade_fituraplikasi: ~4 rows (approximately)
DELETE FROM `table_order_upgrade_fituraplikasi`;
INSERT INTO `table_order_upgrade_fituraplikasi` (`id`, `app_base`, `url`, `title`, `package`, `notes`, `username`, `date_created`) VALUES
	(4, 'csharp', 'myweb.com', 'apps saya', 'Paket Perdana', 'apps saya ini belum ada fungsi :\r\nA. yaitu\r\nB. yaitu \r\nC. yaitu\r\ntolong direvisi segera!', 'udin', '2025-05-29 07:51:10'),
	(5, '', NULL, NULL, NULL, NULL, NULL, '2025-05-29 08:11:06'),
	(6, 'csharp, webapp', NULL, NULL, NULL, NULL, NULL, '2025-05-29 08:13:08'),
	(7, 'csharp, vb', 'asd', 'asd', 'Paket Perdana', 'asd', 'udin', '2025-05-29 08:14:08');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_order_uploadaplikasi
CREATE TABLE IF NOT EXISTS `table_order_uploadaplikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `app_name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `privacy_url` text DEFAULT NULL,
  `icon_path` text DEFAULT NULL,
  `screenshot_path` text DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_uploadaplikasi: ~8 rows (approximately)
DELETE FROM `table_order_uploadaplikasi`;
INSERT INTO `table_order_uploadaplikasi` (`id`, `username`, `package`, `app_name`, `description`, `privacy_url`, `icon_path`, `screenshot_path`, `date_created`) VALUES
	(1, 'udin', 'iPhone App', 'cobain', 'cobain lagi', 'sss.com', 'uploads/apps/6837b71c42874_approved.png', 'uploads/apps/6837b71c429ec_qrcode__.gif', '2025-05-29 01:23:40'),
	(2, 'udin', 'Android App', 'ssss', 'waw', 'www', 'http://sd.fgroupindonesia.com/uploads/apps/250529013522_icon.png', 'http://sd.fgroupindonesia.com/uploads/apps/250529013523_screenshot.jpg', '2025-05-29 01:35:23'),
	(3, 'udin', 'Android App', 'ssss', 'waw', 'www', 'http://sd.fgroupindonesia.com/uploads/apps/250529013936_icon.png', 'http://sd.fgroupindonesia.com/uploads/apps/250529013936_screenshot.jpg', '2025-05-29 01:39:36'),
	(4, 'udin', 'Android App', 'ssss', 'waw', 'www', 'http://sd.fgroupindonesia.com/uploads/apps/250529014552_icon.png', 'http://sd.fgroupindonesia.com/uploads/apps/250529014553_screenshot.jpg', '2025-05-29 01:45:53'),
	(5, 'udin', 'Android App', 'ssss', 'waw', 'www', 'http://sd.fgroupindonesia.com/uploads/apps/250529014846_icon.png', 'http://sd.fgroupindonesia.com/uploads/apps/250529014846_screenshot.jpg', '2025-05-29 01:48:46'),
	(6, 'udin', 'Android App', 'ssss', 'waw', 'www', 'http://sd.fgroupindonesia.com/uploads/apps/250529014939_icon.png', 'http://sd.fgroupindonesia.com/uploads/apps/250529014939_screenshot.jpg', '2025-05-29 01:49:39'),
	(7, 'udin', 'Android App', 'ssss', 'waw', 'www', 'http://sd.fgroupindonesia.com/uploads/apps/250529014953_icon.png', 'http://sd.fgroupindonesia.com/uploads/apps/250529014953_screenshot.jpg', '2025-05-29 01:49:53'),
	(8, 'udin', 'Android App', 'ssss', 'waw', 'www', 'http://sd.fgroupindonesia.com/uploads/apps/250529015123_icon.png', 'http://sd.fgroupindonesia.com/uploads/apps/250529015123_screenshot.jpg', '2025-05-29 01:51:23'),
	(9, 'udin', 'iPhone App', 'cobainxxx', 'cobain lagixxxx', 'sss.com', 'http://sd.fgroupindonesia.com/uploads/apps/250529015202_icon.png', 'http://sd.fgroupindonesia.com/uploads/apps/250529015202_screenshot.gif', '2025-05-29 01:52:02'),
	(10, 'udin', 'iPhone App', 'cobain', 'coba.com', 'web.com', 'http://sd.fgroupindonesia.com/uploads/apps/250529055159_icon.png', 'http://sd.fgroupindonesia.com/uploads/apps/250529055159_screenshot.jpeg', '2025-05-29 05:51:59');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_virtualvisitors: ~1 rows (approximately)
DELETE FROM `table_order_virtualvisitors`;
INSERT INTO `table_order_virtualvisitors` (`id`, `website`, `url`, `business_name`, `package`, `gender`, `username`, `date_created`) VALUES
	(9, 'joomla', 'https://netmovies.to/', 'toko saya', 'hemat', NULL, 'coba', '2025-06-14 02:47:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_order_wa_chat_rotator: ~0 rows (approximately)
DELETE FROM `table_order_wa_chat_rotator`;
INSERT INTO `table_order_wa_chat_rotator` (`id`, `package`, `username`, `rotator_mode`, `custom_name`, `message`, `identifier_mode`, `identifier_tag`, `date_created`) VALUES
	(32, 'gratis', 'coba', 'random', NULL, NULL, 'manual', NULL, '2025-06-14 02:57:51');

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

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_packages
CREATE TABLE IF NOT EXISTS `table_packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `quota` int(11) DEFAULT NULL,
  `base_price` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `order_type` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_packages: ~28 rows (approximately)
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
	(45, 'Reguler', 1, 50000, 50000, 'format_os', '2025-05-19 00:41:24'),
	(46, 'paket A', 10, 5000, 50000, 'ketik_document', '2025-05-21 09:17:38'),
	(47, 'paket B', 100, 2000, 200000, 'ketik_document', '2025-05-21 09:17:56'),
	(49, 'Android App', 1, 300000, 300000, 'uploadaplikasi', '2025-05-29 00:29:14'),
	(50, 'iPhone App', 1, 450000, 450000, 'uploadaplikasi', '2025-05-29 00:31:47'),
	(51, 'Paket Perdana', 1, 150000, 150000, 'upgrade_fituraplikasi', '2025-05-29 06:59:04'),
	(52, 'Paket VIP', 3, 175000, 525000, 'upgrade_fituraplikasi', '2025-05-29 07:11:10'),
	(53, 'Paket UMKM', 1, 2500000, 2500000, 'pembuatanaplikasi', '2025-05-29 08:29:51'),
	(54, 'Paket Premium', 1, 5500000, 5500000, 'pembuatanaplikasi', '2025-05-29 08:30:12'),
	(55, 'Paket Gratisan', 1, 0, 0, 'landing_page', '2025-05-29 11:40:43'),
	(56, 'Paket Premium', 1, 2500000, 2500000, 'landing_page', '2025-05-29 11:41:20');

-- Dumping structure for table db_fgi_sistem_solusi_digital_v1.table_purchased_order
CREATE TABLE IF NOT EXISTS `table_purchased_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_type` varchar(50) DEFAULT NULL,
  `package_name` varchar(50) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_purchased_order: ~47 rows (approximately)
DELETE FROM `table_purchased_order`;
INSERT INTO `table_purchased_order` (`id`, `order_type`, `package_name`, `total_price`, `username`, `date_created`) VALUES
	(9, 'format_os', 'Reguler', 50000, 'udin', '2025-05-19 02:44:21'),
	(10, 'format_os', 'Reguler', 50000, 'udin', '2025-05-19 02:45:43'),
	(11, 'format_os', 'Reguler', 50000, 'udin', '2025-05-19 02:47:27'),
	(12, 'format_os', 'Reguler', 50000, 'udin', '2025-05-19 03:01:39'),
	(13, 'format_os', 'Reguler', 50000, 'udin', '2025-05-19 03:02:58'),
	(14, 'format_os', 'Reguler', 50000, 'udin', '2025-05-19 03:05:04'),
	(15, 'format_os', 'Reguler', 50000, 'udin', '2025-05-20 03:19:29'),
	(16, 'format_os', 'Reguler', 50000, 'udin', '2025-05-20 03:19:29'),
	(17, 'format_os', 'Reguler', 50000, 'udin', '2025-05-20 03:22:39'),
	(18, 'format_os', 'Reguler', 50000, 'udin', '2025-05-20 03:27:57'),
	(19, 'format_os', 'Reguler', 50000, 'udin', '2025-05-20 03:28:21'),
	(20, 'format_os', 'Reguler', 50000, 'udin', '2025-05-20 03:29:05'),
	(21, 'format_os', 'Reguler', 50000, 'udin', '2025-05-21 04:23:29'),
	(22, 'ketik_document', 'paket B', 200000, 'udin', '2025-05-21 09:20:43'),
	(23, 'ketik_document', 'paket B', 200000, 'udin', '2025-05-21 09:22:18'),
	(24, 'ketik_document', 'paket B', 200000, 'udin', '2025-05-21 09:23:40'),
	(25, 'ketik_document', 'paket B', 200000, 'udin', '2025-05-21 09:24:01'),
	(26, 'ketik_document', 'paket B', 200000, 'udin', '2025-05-21 09:26:29'),
	(27, 'format_os', 'Reguler', 50000, 'udin', '2025-05-21 10:02:56'),
	(28, 'format_os', 'Reguler', 50000, 'udin', '2025-05-23 16:31:25'),
	(29, 'ketik_document', 'paket B', 200000, 'udin', '2025-05-23 18:16:27'),
	(30, 'ketik_document', 'paket B', 200000, 'udin', '2025-05-27 18:08:01'),
	(31, 'ketik_document', 'paket A', 50000, 'udin', '2025-05-28 00:24:15'),
	(32, 'ketik_document', 'paket A', 50000, 'udin', '2025-05-28 00:27:00'),
	(33, 'uploadaplikasi', 'Android App', 300000, 'udin', '2025-05-29 01:51:23'),
	(34, 'uploadaplikasi', 'iPhone App', 450000, 'udin', '2025-05-29 01:52:02'),
	(35, 'uploadaplikasi', 'iPhone App', 450000, 'udin', '2025-05-29 05:52:00'),
	(36, 'upgrade_fituraplikasi', 'Paket Perdana', 150000, 'udin', '2025-05-29 07:51:10'),
	(37, 'upgrade_fituraplikasi', 'Paket Perdana', 150000, 'udin', '2025-05-29 08:14:08'),
	(38, 'pembuatanaplikasi', 'Paket UMKM', 2500000, 'udin', '2025-05-29 09:43:53'),
	(39, 'pembuatanaplikasi', 'Paket UMKM', 2500000, 'udin', '2025-05-29 09:46:17'),
	(40, 'pembuatanaplikasi', 'Paket UMKM', 2500000, 'udin', '2025-05-29 10:32:36'),
	(41, 'comment', 'hemat', 200000, 'udin', '2025-05-29 10:46:45'),
	(42, 'comment', 'hemat', 200000, 'udin', '2025-05-29 10:48:52'),
	(43, 'subscriber', 'hemat', 12000, 'udin', '2025-05-29 10:55:11'),
	(44, 'subscriber', 'hemat', 12000, 'udin', '2025-05-29 10:56:36'),
	(45, 'rating', 'hemat', 150000, 'udin', '2025-05-29 11:16:46'),
	(46, 'virtualvisitors', 'hemat', 120000, 'udin', '2025-05-29 11:19:44'),
	(47, 'virtualvisitors', 'hemat', 120000, 'udin', '2025-05-29 11:21:50'),
	(48, 'wa_chat_rotator', 'developer', 500000, 'udin', '2025-05-29 11:29:12'),
	(49, 'wa_chat_rotator', 'gratis', 0, 'udin', '2025-05-29 11:31:03'),
	(50, 'virtualvisitors', 'hemat', 120000, 'udin', '2025-05-29 14:50:54'),
	(51, 'landing_page', 'Paket Gratisan', 0, 'udin', '2025-05-29 14:57:56'),
	(52, 'landing_page', 'Paket Gratisan', 0, 'udin', '2025-05-29 14:58:54'),
	(53, 'wa_chat_rotator', 'bisnis', 150000, 'udin', '2025-05-29 15:16:17'),
	(54, 'wa_chat_rotator', 'gratis', 0, 'coba', '2025-06-13 07:55:55'),
	(55, 'wa_chat_rotator', 'developer', 500000, 'coba', '2025-06-13 18:42:46'),
	(56, 'virtualvisitors', 'hemat', 120000, 'coba', '2025-06-13 18:43:42'),
	(57, 'virtualvisitors', 'hemat', 120000, 'coba', '2025-06-14 02:47:05'),
	(58, 'wa_chat_rotator', 'gratis', 0, 'coba', '2025-06-14 02:57:51');

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
  `propic` text DEFAULT NULL,
  `role` enum('team','admin','client') DEFAULT NULL,
  `is_affiliator` tinyint(1) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `balance` int(20) DEFAULT 0,
  `points` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping data for table db_fgi_sistem_solusi_digital_v1.table_users: ~8 rows (approximately)
DELETE FROM `table_users`;
INSERT INTO `table_users` (`id`, `username`, `pass`, `fullname`, `sex`, `occupation`, `email`, `propic`, `role`, `is_affiliator`, `whatsapp`, `balance`, `points`, `date_created`) VALUES
	(18, 'cinta', 'cinta', 'as', 'male', NULL, 'cinta@gmail.com', 'default-female.png', 'team', NULL, '2222', 0, NULL, '2024-10-01 03:48:41'),
	(19, 'aziz', 'jojon', 'asd', 'male', '', 'gumuruh@gmail.com', 'default-male.png', 'admin', NULL, '123', 500000, NULL, '2024-10-01 04:06:01'),
	(20, 'aziz1', 'aziz1', 'Gumuruh', 'male', NULL, 'fgroupindonesia@gmail.com', 'default-male.png', 'admin', NULL, '09123', 0, NULL, '2024-10-01 04:06:38'),
	(21, 'udin', 'udin', 'udin markopolo', 'male', NULL, 'udin@home.com', 'default-male.png', 'client', 1, '123', 116000, NULL, '2024-10-01 04:07:51'),
	(22, 'coba', 'coba', 'coba', 'female', NULL, 'coba@gmail.com', 'default-female.png', 'client', NULL, '0828282', 460000, NULL, '2025-03-08 10:40:03'),
	(23, 'gumuruh', 'coba', 'coba', 'male', NULL, 'gumuruh@y.com', 'default-male.png', 'team', NULL, '282828', 0, NULL, '2025-04-12 09:24:13'),
	(31, 'fgroupindonesia', '7t2v9mo', 'gumuruh', 'male', 'none', 'testing@test.com', 'default-male.png', 'client', NULL, '828282', 0, NULL, '2025-04-12 11:13:18'),
	(34, 'gumuruh8376', 'mikail', 'mikail', 'male', 'none', 'gumuruhx@gmail.com', 'default-male.png', 'client', NULL, '0857121212', 0, NULL, '2025-04-20 06:53:56');

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
