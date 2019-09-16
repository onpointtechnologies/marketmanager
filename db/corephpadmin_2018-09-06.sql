# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.38)
# Database: corephpadmin
# Generation Time: 2018-09-06 21:19:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `admin_type` varchar(10) DEFAULT '',
  `name` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `first_name` varchar(30) NOT NULL DEFAULT '',
  `last_name` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `password`, `admin_type`, `name`, `email`, `first_name`, `last_name`)
VALUES
	(1,'3b8ebe34e784a3593693a37baaacb016','super','','','',''),
	(4,'8bda8e915e629a9fd1bbca44f8099c81','admin','','','',''),
	(6,'17c4520f6cfd1ab53d8745e84681eb49','super','','','',''),
	(8,'5f4dcc3b5aa765d61d8327deb882cf99','super','','','',''),
	(9,'$2y$10$inNKRL200t8ohgDZPTdgI.v9csZSy6tg/RuNlD2GPzR','','','cam@arkitu.com','',''),
	(10,'$2y$10$nZkVi1pFo4LVa9.bT/S43OZkCnFYIKakBEPRVIeAwXb','','','c@b.com','carso','b'),
	(11,'$2y$10$W.JzXu1HVvzZg1rgpvi7hefI6JfKkgCLOruHUg5XolB','','','cam@arkitu.com9','s','t'),
	(12,'$2y$10$KqcusBUY6fUtLCszF3QFP.VkxpnfP/J7p5e.23YOcUs','','','cam@arkitu.com90','s','t'),
	(13,'$2y$10$3jTQEHYP9PAGQPVik7qRAeDWExKvzSVMFFusu/Z1A9w','','','f@ff.c','f','f'),
	(19,'$2y$10$uCI3I.EudoQqrBX7P6S06.2gzJBh4.So4LTWbn/QmUM','','cam','cam@arkitu.c','',''),
	(20,'$2y$10$hnWPA1WDpB.lM7QgjA7ePu5qgPMR8XXzpzdpiMdBZW.','','annie','annie@test.com','',''),
	(22,'password','','test','pete@test.com','',''),
	(23,'$2y$10$gVNb/hnNpv3R8wNh2HiBuuHjBpm9j9tR6f8LM4XZSb.','','teet','asdsa@ll.com','',''),
	(24,'$2y$10$OJtDWG62H32wX1aexoH8nOC0enfhmHdhdYildD3/H6vdgIYJb8R.2','','pass','cam@arkit.co','',''),
	(25,'$2y$10$2Ty0/hTO4i4wlfDOqlq/t.QWUexrd5K9QU.2f1VYZgLBK4.s4EmDW','','Cameron','cam@arkitu.co','','');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table checkout
# ------------------------------------------------------------

DROP TABLE IF EXISTS `checkout`;

CREATE TABLE `checkout` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `vendor_name_checkout` varchar(25) DEFAULT '',
  `checkout_date` varchar(100) DEFAULT NULL,
  `sellers_fee` varchar(15) DEFAULT '',
  `ebt_tokens` varchar(30) DEFAULT '',
  `ebt_match` varchar(15) DEFAULT '',
  `atm_tokens` varchar(50) DEFAULT '',
  `vendor_type` varchar(25) DEFAULT NULL,
  `market_id` varchar(500) DEFAULT NULL,
  `flat_fee` int(11) DEFAULT NULL,
  `percentage_fee` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `total_owed` int(11) DEFAULT NULL,
  `checkout_market_name` varchar(255) DEFAULT NULL,
  `total_sales` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `checkout` WRITE;
/*!40000 ALTER TABLE `checkout` DISABLE KEYS */;

INSERT INTO `checkout` (`id`, `vendor_name_checkout`, `checkout_date`, `sellers_fee`, `ebt_tokens`, `ebt_match`, `atm_tokens`, `vendor_type`, `market_id`, `flat_fee`, `percentage_fee`, `created_at`, `total_owed`, `checkout_market_name`, `total_sales`)
VALUES
	(1,'cam','2018-8-1','$2','$2','$2','$2','certified','3',NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `checkout` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table market_currency
# ------------------------------------------------------------

DROP TABLE IF EXISTS `market_currency`;

CREATE TABLE `market_currency` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `market_id` varchar(4) DEFAULT NULL,
  `market_currency_name` varchar(25) DEFAULT NULL,
  `market_currency_value` varchar(25) DEFAULT NULL,
  `market_currency_dollar_value` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `market_currency` WRITE;
/*!40000 ALTER TABLE `market_currency` DISABLE KEYS */;

INSERT INTO `market_currency` (`id`, `market_id`, `market_currency_name`, `market_currency_value`, `market_currency_dollar_value`)
VALUES
	(1,'138','EBT','1',1);

/*!40000 ALTER TABLE `market_currency` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table markets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `markets`;

CREATE TABLE `markets` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `public_id` varchar(10) DEFAULT NULL,
  `market_name` varchar(50) DEFAULT '',
  `certified` varchar(6) DEFAULT '',
  `market_address` varchar(100) DEFAULT NULL,
  `market_city` varchar(30) DEFAULT '',
  `state` varchar(30) DEFAULT '',
  `phone` varchar(15) DEFAULT '',
  `manager_name` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `flat_fee` varchar(255) DEFAULT NULL,
  `percentage_fee` varchar(255) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `markets` WRITE;
/*!40000 ALTER TABLE `markets` DISABLE KEYS */;

INSERT INTO `markets` (`id`, `public_id`, `market_name`, `certified`, `market_address`, `market_city`, `state`, `phone`, `manager_name`, `start_date`, `end_date`, `created_at`, `updated_at`, `flat_fee`, `percentage_fee`, `notes`)
VALUES
	(1,NULL,'DON\'T DELETE THIS ROW','',NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(3,NULL,'Cambria','yes','highway 1','Cambria, CA','','4154650298','Jeff Nielson','2018-07-30','2018-08-01','2018-07-30 02:50:16',NULL,NULL,'5%','Fees are $20 if sales are under $400, or 5% if over'),
	(138,NULL,'Morro Bay Saturday','no',NULL,'Morro Bay, CA','','4154650298','Jeff Nielson','2018-01-01','2018-12-31',NULL,NULL,'$5',NULL,'Fees are $20 if sales are under $400, or 5% if over');

/*!40000 ALTER TABLE `markets` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table markets_vendors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `markets_vendors`;

CREATE TABLE `markets_vendors` (
  `markets_id` int(11) NOT NULL,
  `vendors_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`markets_id`,`vendors_id`),
  KEY `markets_vendors_ibfk_2` (`vendors_id`),
  CONSTRAINT `markets_vendors_ibfk_1` FOREIGN KEY (`markets_id`) REFERENCES `Markets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `markets_vendors_ibfk_2` FOREIGN KEY (`vendors_id`) REFERENCES `Vendors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `markets_vendors` WRITE;
/*!40000 ALTER TABLE `markets_vendors` DISABLE KEYS */;

INSERT INTO `markets_vendors` (`markets_id`, `vendors_id`)
VALUES
	(3,72),
	(3,84),
	(3,85),
	(3,86),
	(3,87),
	(138,87),
	(3,88),
	(138,88),
	(138,112);

/*!40000 ALTER TABLE `markets_vendors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vendors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vendors`;

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(25) DEFAULT '',
  `business_name` varchar(25) DEFAULT '',
  `vendor_city` varchar(15) DEFAULT '',
  `vendor_state` varchar(30) DEFAULT '',
  `vendor_phone` varchar(15) DEFAULT '',
  `vendor_email` varchar(50) DEFAULT '',
  `certificate_expiration` date DEFAULT NULL,
  `certificate_number` decimal(10,0) DEFAULT NULL,
  `vendor_type` varchar(25) DEFAULT NULL,
  `products_sold` varchar(500) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;

INSERT INTO `vendors` (`id`, `vendor_name`, `business_name`, `vendor_city`, `vendor_state`, `vendor_phone`, `vendor_email`, `certificate_expiration`, `certificate_number`, `vendor_type`, `products_sold`)
VALUES
	(72,'Vendors 2','9',NULL,NULL,'2096798265','11','0000-00-00',0,'certified',''),
	(84,'Cameron Sluggett','Cams Jams',NULL,NULL,'2096798265','cam@arkitu.co','0000-00-00',20111111,'certified',''),
	(85,'test','cams','paia','ca','1111','cam@test','0000-00-00',0,'111','nonw'),
	(86,'Jeff Nielson','Jeffs Fruits',NULL,NULL,'111111111','jeffnielson@me.com','0000-00-00',20111111,'certified',''),
	(87,'Annie Foote','Annies Juices',NULL,NULL,'2908408814','anniefoote@hotmail.com','0000-00-00',0,'non-certified','juices, jellys, fruites, test'),
	(88,'Jordan Sluggett','Sluggett Farmers','Oakdale','CA','2095857322','jsluggett@csumb.edu','2020-10-03',12345,'certified',''),
	(112,'Mckenzie Sluggett','Full Time Mermaid',NULL,NULL,'11111111111','mmmm@mmm.com','0000-00-00',0,'non-certified','jewelry, necklaces, pearls');

/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
