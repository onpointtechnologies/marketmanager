# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.38)
# Database: corephpadmin
# Generation Time: 2018-09-24 18:34:50 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table checkout
# ------------------------------------------------------------

DROP TABLE IF EXISTS `checkout`;

CREATE TABLE `checkout` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(25) DEFAULT '',
  `checkout_date` varchar(100) DEFAULT NULL,
  `sellers_fee` varchar(15) DEFAULT '',
  `ebt_tokens` varchar(30) DEFAULT '',
  `ebt_match` varchar(15) DEFAULT '',
  `atm_tokens` varchar(50) DEFAULT '',
  `vendor_type` varchar(25) DEFAULT NULL,
  `market_id` varchar(10) DEFAULT NULL,
  `flat_fee` int(11) DEFAULT NULL,
  `percentage_fee` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `total_owed` int(11) DEFAULT NULL,
  `checkout_market_name` varchar(255) DEFAULT NULL,
  `total_sales` varchar(255) DEFAULT NULL,
  `week` varchar(255) DEFAULT NULL,
  `public_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `checkout` WRITE;
/*!40000 ALTER TABLE `checkout` DISABLE KEYS */;

INSERT INTO `checkout` (`id`, `business_name`, `checkout_date`, `sellers_fee`, `ebt_tokens`, `ebt_match`, `atm_tokens`, `vendor_type`, `market_id`, `flat_fee`, `percentage_fee`, `created_at`, `total_owed`, `checkout_market_name`, `total_sales`, `week`, `public_id`)
VALUES
	(1,'cam','2018-8-1','$2','$2','$2','$2','certified','3',NULL,NULL,NULL,NULL,'Madonna Saturday Market',NULL,'7',NULL),
	(242,'Vendors 2','2018-09-06',NULL,'1','1','3',NULL,NULL,NULL,NULL,NULL,-5,'Morro Bay Saturday','','6',NULL),
	(245,'11','2018-09-15',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,0,'Madonna Saturday Market','','5',NULL),
	(254,'Jordan Sluggett','2018-09-16',NULL,'','','',NULL,'',NULL,NULL,NULL,0,'Cambria','','4',NULL),
	(304,'','2018-09-17',NULL,'','','',NULL,'',NULL,NULL,NULL,0,'Cambria','','3',NULL),
	(305,'Cameron Sluggett','2018-09-18',NULL,'','','',NULL,'',NULL,NULL,NULL,0,'Cambria','','18',NULL),
	(333,'Cameron Sluggett','2018-09-17',NULL,'9','2','17',NULL,'',NULL,NULL,NULL,22,'Cambria','1000','5',NULL),
	(360,'Cameron Sluggett','2018-09-19',NULL,'','','',NULL,'',NULL,NULL,NULL,0,'Cambria','','3',NULL),
	(410,'dragon s[rings','2018-09-19',NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,5,'Morro Bay Saturday','100','2',NULL),
	(411,'Cams Jams','2018-09-23',NULL,'','','',NULL,'',NULL,NULL,NULL,20,'Cambria','250','4',NULL),
	(412,'Cams Jams','2018-09-23',NULL,'','','',NULL,'',NULL,NULL,NULL,20,'Cambria','300','1',NULL),
	(413,'cam@arkitu.co','2018-09-23',NULL,'','','',NULL,'',NULL,NULL,NULL,0,'Cambria','','3',NULL),
	(414,'','2018-09-23',NULL,'','','',NULL,'',NULL,NULL,NULL,0,'Cambria','','',NULL),
	(415,'Cams Jams','2018-09-23',NULL,'','','',NULL,'',NULL,NULL,NULL,0,'Cambria','','8',NULL),
	(416,'','2018-09-23',NULL,'','','',NULL,'',NULL,NULL,NULL,0,'Cambria','','6',NULL),
	(417,'Jeffs Fruits','2018-09-23',NULL,'','','',NULL,'',NULL,NULL,NULL,50,'Cambria','1000','4',NULL),
	(418,'','2018-09-23',NULL,'','','',NULL,'',NULL,NULL,NULL,0,'Cambria','','4',NULL),
	(419,'Jeffs Fruits','2018-09-23',NULL,'','','',NULL,'',NULL,NULL,NULL,0,'Cambria','','8',NULL),
	(420,'Cams Jams','2018-09-23',NULL,'','','',NULL,'',NULL,NULL,NULL,0,'Cambria','','8',NULL),
	(421,'Cams Jams','2018-09-23',NULL,'','','',NULL,'',NULL,NULL,NULL,0,'Cambria','','',NULL),
	(422,'','2018-09-23',NULL,'','','',NULL,'',NULL,NULL,NULL,0,'Cambria','','',NULL),
	(423,'Cams Jams','2018-09-23',NULL,'','','',NULL,'',NULL,NULL,NULL,125,'Cambria','2500','',NULL),
	(424,'Sluggett Farmers','2018-09-23',NULL,'','','',NULL,'',NULL,NULL,NULL,150,'Cambria','3000','',NULL),
	(425,'Annies Juices','2018-09-23',NULL,'','','',NULL,'',NULL,NULL,NULL,20,'Cambria','10','',NULL),
	(426,'Cams Jams','2018-09-24',NULL,'','','',NULL,'',NULL,NULL,NULL,50,'Cambria','1000','',NULL),
	(427,'9','2018-09-24',NULL,'','','',NULL,'',NULL,NULL,NULL,50,'Cambria','1000','',NULL),
	(428,'dragon s[rings','2018-09-24',NULL,'','','',NULL,'',NULL,NULL,NULL,23,'Cambria','450','',NULL),
	(429,'9','2018-09-24',NULL,'','','',NULL,'',NULL,NULL,NULL,20,'Cambria','123','',NULL);

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
	(1,'3','EBT Match','2',1),
	(2,'3','EBT Tokens','1',1),
	(4,'161','1','2',NULL),
	(5,'162','EBT','30',20),
	(29,'3','ATM','1',1),
	(31,'257','1','1',1),
	(32,'258','1','2',3),
	(33,'258','1','2',3),
	(34,'259','1','1',1),
	(35,'261','EBT Match','1',1),
	(36,'138','EBT Match','1',1),
	(37,'176','','',0);

/*!40000 ALTER TABLE `market_currency` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table markets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `markets`;

CREATE TABLE `markets` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
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
  `flat_fee` varchar(10) DEFAULT NULL,
  `percentage_fee` varchar(3) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `certificate_number` varchar(255) DEFAULT NULL,
  `cdfa_app_id` varchar(255) DEFAULT NULL,
  `market_hours` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `markets` WRITE;
/*!40000 ALTER TABLE `markets` DISABLE KEYS */;

INSERT INTO `markets` (`id`, `user_id`, `public_id`, `market_name`, `certified`, `market_address`, `market_city`, `state`, `phone`, `manager_name`, `start_date`, `end_date`, `flat_fee`, `percentage_fee`, `notes`, `img_url`, `certificate_number`, `cdfa_app_id`, `market_hours`)
VALUES
	(3,25,'5b920b9041','Cambria','yes','highway 1','Cambria, CA','','4154650298','Jeff Nielson','2018-07-30','2018-08-01','2000','5','Fees are $20 if sales are under $400, or 5% if over','cambria.png',NULL,NULL,NULL),
	(138,25,'5b9f075407','Morro Bay Saturday','no',NULL,'Morro Bay, CA','','4154650298','Jeff Nielson','2018-01-01','2018-12-31',NULL,'5','notes','morrobay.png',NULL,NULL,NULL),
	(165,25,'5b920c4195','Madonna Saturday Market','yes',NULL,'San Luis Obispo, CA','',NULL,'Peter Jankay','2018-07-30',NULL,'500',NULL,'this is note','slocounty.png',NULL,NULL,NULL),
	(175,29,'5ba92160e8','Arcata Plaza','yes',NULL,'Arcata CA','',NULL,'','2018-01-01',NULL,'0','','','northcoast.png','','','9am - 2pm'),
	(176,29,'5ba9219ee6','Fortuna','yes',NULL,'','',NULL,'','2018-06-06',NULL,'0','','','fortuna.png','','','3-6pm');

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
	(3,88),
	(3,123),
	(3,124),
	(3,125),
	(3,126),
	(3,127),
	(3,128),
	(3,129),
	(3,130),
	(3,131),
	(3,132),
	(3,133),
	(138,134),
	(138,135);

/*!40000 ALTER TABLE `markets_vendors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `admin_type` varchar(10) DEFAULT '',
  `name` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `association` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `password`, `admin_type`, `name`, `email`, `association`, `city`, `state`)
VALUES
	(1,'3b8ebe34e784a3593693a37baaacb016','super','','',NULL,NULL,NULL),
	(4,'8bda8e915e629a9fd1bbca44f8099c81','admin','','',NULL,NULL,NULL),
	(6,'17c4520f6cfd1ab53d8745e84681eb49','super','','',NULL,NULL,NULL),
	(8,'5f4dcc3b5aa765d61d8327deb882cf99','super','','',NULL,NULL,NULL),
	(9,'$2y$10$inNKRL200t8ohgDZPTdgI.v9csZSy6tg/RuNlD2GPzR','','','cam@arkitu.com',NULL,NULL,NULL),
	(10,'$2y$10$nZkVi1pFo4LVa9.bT/S43OZkCnFYIKakBEPRVIeAwXb','','','c@b.com',NULL,NULL,NULL),
	(11,'$2y$10$W.JzXu1HVvzZg1rgpvi7hefI6JfKkgCLOruHUg5XolB','','','cam@arkitu.com9',NULL,NULL,NULL),
	(12,'$2y$10$KqcusBUY6fUtLCszF3QFP.VkxpnfP/J7p5e.23YOcUs','','','cam@arkitu.com90',NULL,NULL,NULL),
	(13,'$2y$10$3jTQEHYP9PAGQPVik7qRAeDWExKvzSVMFFusu/Z1A9w','','','f@ff.c',NULL,NULL,NULL),
	(19,'$2y$10$uCI3I.EudoQqrBX7P6S06.2gzJBh4.So4LTWbn/QmUM','','cam','cam@arkitu.c',NULL,NULL,NULL),
	(22,'password','','test','pete@test.com',NULL,NULL,NULL),
	(23,'$2y$10$gVNb/hnNpv3R8wNh2HiBuuHjBpm9j9tR6f8LM4XZSb.','','teet','asdsa@ll.com',NULL,NULL,NULL),
	(24,'$2y$10$OJtDWG62H32wX1aexoH8nOC0enfhmHdhdYildD3/H6vdgIYJb8R.2','','pass','cam@arkit.co',NULL,NULL,NULL),
	(25,'Rokenbok2016','','Cameron','cam@arkitu.com','test','',''),
	(26,'$2y$10$0jnTFCsEiBnihHyO0YUPQ.K/N/E.Q4KdBtysGbwIB/TZbt/9VILdu','','Jeff Nielson','jeff@neilsenconsulting.com',NULL,NULL,NULL),
	(27,'$2y$10$kIpyppvNOp7pFp882volg.UBmvFQroUVmdVougmCcATNpwnX9tdUu','','test','tes@test.com',NULL,NULL,NULL),
	(28,'$2y$10$QTWFXtgcfCqL0NEtR1Pu0usH4HUqEwPH1fG7GINwfH.dxRawldEWu','','annie','annie@test.com',NULL,NULL,NULL),
	(29,'$2y$10$34Oemm2yr6ZmAtPtpHfDwOx5jUQu4PyTtebYcI8z4cF1f8cKtrJbK','','North Coast Growers','northcoastgrowers@gmail.com',NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vendors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vendors`;

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(60) DEFAULT '',
  `business_name` varchar(25) DEFAULT '',
  `address` varchar(255) DEFAULT NULL,
  `vendor_city` varchar(15) DEFAULT '',
  `vendor_state` varchar(30) DEFAULT '',
  `vendor_phone` varchar(15) DEFAULT '',
  `vendor_email` varchar(50) DEFAULT '',
  `certificate_expiration` date DEFAULT NULL,
  `certificate_number` decimal(10,0) DEFAULT NULL,
  `vendor_type` varchar(25) DEFAULT NULL,
  `products_sold` varchar(500) DEFAULT '',
  `website` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;

INSERT INTO `vendors` (`id`, `vendor_name`, `business_name`, `address`, `vendor_city`, `vendor_state`, `vendor_phone`, `vendor_email`, `certificate_expiration`, `certificate_number`, `vendor_type`, `products_sold`, `website`, `facebook`, `instagram`)
VALUES
	(72,'Vendors 2','9',NULL,NULL,NULL,'2096798265','11','0000-00-00',0,'certified','',NULL,NULL,NULL),
	(84,'Cameron Sluggett','Cams Jams',NULL,NULL,NULL,'2096798265','cam@arkitu.co','0000-00-00',20111111,'certified','',NULL,NULL,NULL),
	(85,'test','cams',NULL,'paia','ca','1111','cam@test','0000-00-00',0,'111','nonw',NULL,NULL,NULL),
	(86,'Jeff Nielson','Jeffs Fruits',NULL,NULL,NULL,'111111111','jeffnielson@me.com','0000-00-00',20111111,'certified','',NULL,NULL,NULL),
	(87,'Annie Foote','Annies Juices',NULL,NULL,NULL,'2908408814','anniefoote@hotmail.com','0000-00-00',0,'non-certified','juices, jellys, fruites, test',NULL,NULL,NULL),
	(88,'Jordan Sluggett','Sluggett Farmers',NULL,'Oakdale','CA','2095857322','jsluggett@csumb.edu','2020-10-03',12345,'certified','',NULL,NULL,NULL),
	(112,'Mckenzie Sluggett','Full Time Mermaid',NULL,NULL,NULL,'11111111111','mmmm@mmm.com','0000-00-00',0,'non-certified','jewelry, necklaces, pearls',NULL,NULL,NULL),
	(123,'Jeff Nielson','dragon s[rings',NULL,NULL,NULL,'1111111111111','jeffnielson@me.com','0000-00-00',0,'ancillary','',NULL,NULL,NULL),
	(124,'a','dragon s[rings',NULL,NULL,NULL,'1111111111111','jeffnielson@me.com','0000-00-00',0,'ancillary','',NULL,NULL,NULL),
	(125,'b','dragon s[rings',NULL,NULL,NULL,'1111111111111','jeffnielson@me.com','0000-00-00',0,'ancillary','',NULL,NULL,NULL),
	(126,'c','dragon s[rings',NULL,NULL,NULL,'1111111111111','jeffnielson@me.com','0000-00-00',0,'ancillary','',NULL,NULL,NULL),
	(127,'d','dragon s[rings',NULL,NULL,NULL,'1111111111111','jeffnielson@me.com','0000-00-00',0,'ancillary','',NULL,NULL,NULL),
	(128,'e','dragon s[rings',NULL,NULL,NULL,'1111111111111','jeffnielson@me.com','0000-00-00',0,'ancillary','',NULL,NULL,NULL),
	(129,'f','dragon s[rings',NULL,NULL,NULL,'1111111111111','jeffnielson@me.com','0000-00-00',0,'ancillary','',NULL,NULL,NULL),
	(130,'k','dragon s[rings',NULL,NULL,NULL,'1111111111111','jeffnielson@me.com','0000-00-00',0,'ancillary','',NULL,NULL,NULL),
	(131,'g','dragon s[rings',NULL,NULL,NULL,'1111111111111','jeffnielson@me.com','0000-00-00',0,'ancillary','',NULL,NULL,NULL),
	(132,'super long super long sup super long ','dragon s[rings',NULL,NULL,NULL,'1111111111111','jeffnielson@me.com','0000-00-00',0,'ancillary','',NULL,NULL,NULL),
	(133,'m','dragon s[rings',NULL,NULL,NULL,'1111111111111','jeffnielson@me.com','0000-00-00',0,'ancillary','',NULL,NULL,NULL),
	(134,'n','dragon s[rings',NULL,NULL,NULL,'1111111111111','jeffnielson@me.com','0000-00-00',0,'ancillary','',NULL,NULL,NULL),
	(135,'o','dragon s[rings',NULL,NULL,NULL,'1111111111111','jeffnielson@me.com','0000-00-00',0,'ancillary','',NULL,NULL,NULL);

/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table weeks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weeks`;

CREATE TABLE `weeks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `week_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `weeks` WRITE;
/*!40000 ALTER TABLE `weeks` DISABLE KEYS */;

INSERT INTO `weeks` (`id`, `week_name`)
VALUES
	(1,'Week of 1/1'),
	(2,'Week of 1/8'),
	(3,'Week of 1/15'),
	(4,'Week of 1/22'),
	(5,'Week of 1/29'),
	(6,'Week of 2/5'),
	(7,'Week of 2/12'),
	(8,'Week of 2/19'),
	(9,'Week of 2/26'),
	(10,'Week of 3/5'),
	(11,'Week of 3/12'),
	(12,'Week of 3/19'),
	(13,'Week of 3/26'),
	(14,'Week of 4/2'),
	(15,'Week of 4/9'),
	(16,'Week of 4/16'),
	(17,'Week of 4/23'),
	(18,'Week of 4/30');

/*!40000 ALTER TABLE `weeks` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
