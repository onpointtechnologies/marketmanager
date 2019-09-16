# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.38)
# Database: corephpadmin
# Generation Time: 2018-09-25 21:05:35 +0000
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
	(39,'175','EBT Tokens','1',1),
	(40,'176','EBT Tokens','1',1),
	(41,'175','MM Tokens','1',1),
	(42,'176','MM Tokens','1',1),
	(43,'175','MM Vouchers','1',1),
	(44,'176','MM Vouchers','1',1),
	(45,'175','FMNP FVC','1',1),
	(46,'176','FMNP FVC','1',1),
	(47,'175','Open Door','1',1),
	(48,'176','Open Door','1',1),
	(49,'175','Piersons','1',1),
	(50,'176','Piersons','1',1);

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
  `custom_fee` varchar(255) DEFAULT NULL,
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

INSERT INTO `markets` (`id`, `user_id`, `public_id`, `market_name`, `certified`, `market_address`, `market_city`, `state`, `phone`, `manager_name`, `start_date`, `end_date`, `flat_fee`, `custom_fee`, `percentage_fee`, `notes`, `img_url`, `certificate_number`, `cdfa_app_id`, `market_hours`)
VALUES
	(3,25,'5b920b9041','Cambria','yes','highway 1','Cambria, CA','','4154650298','Jeff Nielson','2018-07-30','2018-08-01','2000',NULL,'5','Fees are $20 if sales are under $400, or 5% if over','cambria.png',NULL,NULL,NULL),
	(138,25,'5b9f075407','Morro Bay Saturday','no',NULL,'Morro Bay, CA','','4154650298','Jeff Nielson','2018-01-01','2018-12-31',NULL,NULL,'5','notes','morrobay.png',NULL,NULL,NULL),
	(165,25,'5b920c4195','Madonna Saturday Market','yes',NULL,'San Luis Obispo, CA','',NULL,'Peter Jankay','2018-07-30',NULL,'500',NULL,NULL,'this is note','slocounty.png',NULL,NULL,NULL),
	(175,29,'5ba92160e8','Arcata Plaza','yes',NULL,'Arcata CA','',NULL,'','2018-01-01',NULL,NULL,'yes',NULL,'','northcoast.png','','','9am - 2pm');

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
	(175,136),
	(175,137),
	(175,138),
	(175,139),
	(175,140),
	(175,141),
	(175,142),
	(175,143),
	(175,144),
	(175,145),
	(175,146),
	(175,147),
	(175,148),
	(175,149),
	(175,150),
	(175,151),
	(175,152),
	(175,153),
	(175,154),
	(175,155),
	(175,156),
	(175,157),
	(175,158),
	(175,159),
	(175,160),
	(175,161),
	(175,162),
	(175,163),
	(175,164),
	(175,165),
	(175,166),
	(175,167),
	(175,168),
	(175,169),
	(175,170),
	(175,171),
	(175,172),
	(175,173),
	(175,174),
	(175,175),
	(175,176),
	(175,177),
	(175,178),
	(175,179),
	(175,180),
	(175,181),
	(175,182),
	(175,183),
	(175,184),
	(175,185),
	(175,186),
	(175,187),
	(175,188),
	(175,189),
	(175,190),
	(175,191),
	(175,192),
	(175,193),
	(175,194),
	(175,195),
	(175,196),
	(175,197),
	(175,198),
	(175,199),
	(175,200),
	(175,201),
	(175,202),
	(175,203),
	(175,204),
	(175,205),
	(175,206),
	(175,207),
	(175,208),
	(175,209),
	(175,210),
	(175,211),
	(175,212),
	(175,213),
	(175,214),
	(175,215),
	(175,216),
	(175,217),
	(175,218),
	(175,219),
	(175,220),
	(175,221),
	(175,222),
	(175,223),
	(175,224),
	(175,225),
	(175,226),
	(175,227),
	(175,228),
	(175,229),
	(175,230),
	(175,231),
	(175,232),
	(175,233),
	(175,234),
	(175,235),
	(175,236),
	(175,237),
	(175,238),
	(175,239),
	(175,240),
	(175,241),
	(175,242),
	(175,243),
	(175,244),
	(175,245),
	(175,246),
	(175,247),
	(175,248),
	(175,249);

/*!40000 ALTER TABLE `markets_vendors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `name` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `association` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `password`, `name`, `email`, `association`, `city`, `state`)
VALUES
	(25,'$2y$10$l8dc7WHruzFx9LpBVz/iouQ41V6zQKqbBmMNvZYLQeu3eqF8x2Z6W','Cameron','cam@arkitu.co','test','',''),
	(26,'$2y$10$0jnTFCsEiBnihHyO0YUPQ.K/N/E.Q4KdBtysGbwIB/TZbt/9VILdu','Jeff Nielson','jeff@neilsenconsulting.com',NULL,NULL,NULL),
	(27,'$2y$10$kIpyppvNOp7pFp882volg.UBmvFQroUVmdVougmCcATNpwnX9tdUu','test','tes@test.com',NULL,NULL,NULL),
	(28,'$2y$10$QTWFXtgcfCqL0NEtR1Pu0usH4HUqEwPH1fG7GINwfH.dxRawldEWu','annie','annie@test.com',NULL,NULL,NULL),
	(29,'$2y$10$l8dc7WHruzFx9LpBVz/iouQ41V6zQKqbBmMNvZYLQeu3eqF8x2Z6W','North Coast Growers','northcoastgrowers@gmail.com',NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vendors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vendors`;

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` varchar(10) DEFAULT NULL,
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

INSERT INTO `vendors` (`id`, `users_id`, `vendor_name`, `business_name`, `address`, `vendor_city`, `vendor_state`, `vendor_phone`, `vendor_email`, `certificate_expiration`, `certificate_number`, `vendor_type`, `products_sold`, `website`, `facebook`, `instagram`)
VALUES
	(72,'25','Vendors 2','9',NULL,NULL,NULL,'2096798265','11','0000-00-00',0,'certified','',NULL,NULL,NULL),
	(84,'25','Cameron Sluggett','Cams Jams',NULL,NULL,NULL,'2096798265','cam@arkitu.co','0000-00-00',20111111,'certified','',NULL,NULL,NULL),
	(85,'25','test','cams',NULL,'paia','ca','1111','cam@test','0000-00-00',0,'111','nonw',NULL,NULL,NULL),
	(86,'25','Jeff Nielson','Jeffs Fruits',NULL,NULL,NULL,'111111111','jeffnielson@me.com','0000-00-00',20111111,'certified','',NULL,NULL,NULL),
	(87,'25','Annie Foote','Annies Juices',NULL,NULL,NULL,'2908408814','anniefoote@hotmail.com','0000-00-00',0,'non-certified','juices, jellys, fruites, test',NULL,NULL,NULL),
	(88,'25','Jordan Sluggett','Sluggett Farmers',NULL,'Oakdale','CA','2095857322','jsluggett@csumb.edu','2020-10-03',12345,'certified','',NULL,NULL,NULL),
	(112,'25','Mckenzie Sluggett','Full Time Mermaid',NULL,NULL,NULL,'11111111111','mmmm@mmm.com','0000-00-00',0,'non-certified','jewelry, necklaces, pearls',NULL,NULL,NULL),
	(123,'25','Jeff Nielson','dragon s[rings',NULL,NULL,NULL,'1111111111111','jeffnielson@me.com','0000-00-00',0,'ancillary','',NULL,NULL,NULL),
	(136,'29','Nicole & Doug Almand','Almand Dahlia Gardens','PO Box 1253','Ferndale, CA','CA','786-4130','almandahliagardens@gmail.com','0000-00-00',NULL,'Ag','','n/a','www.facebook.com/Almand.Dahlia.Gardens',''),
	(137,'29','Sherria Tyler','Arcata Bay Llamas','3508 Spear Ave/ PO Box 412','Arcata, CA','CA','707-822-8661/ 8','sheriyarn@gmail.com; arcatabayllamas@msn.com','0000-00-00',NULL,'Ag','','humboldthandspun.etsy.com','n/a',''),
	(138,'29','Leota Day','Aurora Acres','497 Shively Flat Road','Scotia, CA','CA','616-2226','leota_day@yahoo.com','0000-00-00',NULL,'Ag','','N/A','https://www.facebook.com/Aurora-Acres-1631474500510280/?fref=ts',''),
	(139,'29','Jayme Buckley','Bayside Park Farm','736 F Street','Arcata, CA','CA','707-822-7091/61','baysideparkfarm@cityofarcata.org','0000-00-00',NULL,'Ag','','www.cityofarcata.org/rec','Bayside Park Farm',''),
	(140,'29','Betty Teasley','Betty\'s Country Store','PO Box 250','Weott, CA','CA','707-946-2465','','0000-00-00',NULL,'Ag','','none','none','no'),
	(141,'29','Bob Filbey','BIGFOOT Collections','PO Box 1025','Blue Lake, CA','CA','707-668-1829','bigfoot95525@yahoo.com; bigfootcollections@yahoo.c','0000-00-00',NULL,'Ag','','bigfootcollections.com','none',''),
	(142,'29','Sarah and Matt Brunner','Brunner Family Farm','3628 Fieldbrook Rd/ PO Box 977 (public)','Fieldbrook, CA/','CA','707-845-4718','sarahjobrunner@gmail.com','0000-00-00',NULL,'Ag','','n/a','Brunner Family Farm','n/a'),
	(143,'29','Jane Laddusaw','Carlotta Flowers','7032 HWY 36','Carlotta, CA','CA','707-768-3779','','0000-00-00',NULL,'Ag','','n/a','n/a',''),
	(144,'29','Claire Biggin','CCC Farm','4510 Chaffin Rd./PO Box 2311','McKinleyville, ','CA','707-633-4200','biggin2007@gmail.com','0000-00-00',NULL,'Ag','','','',''),
	(145,'29','Chris Byers','Chris\'s Carnivores','8556 Holmes Davis Ranch Rd., Unit C','Arcata, CA','CA','707-601-7155','mountainwookie.cb@gmail.com','0000-00-00',NULL,'Ag','','trippyplants.com','Chris\'s Carnivores','@Chriscarnivoresplants'),
	(146,'29','Claudia Holzinger and Von Tunstall','Claudia\'s Organic Herbs','PO Box 233','Orleans, CA','CA','530-627-3712','claudiaholzinger13@gmail.com','0000-00-00',NULL,'Ag','','http://www.claudiasherbs.com/','',''),
	(147,'29','Julia & Brett McFarland','Crazy River Ranch','PO Box 101','Korbel, CA','CA','916-751-6192/ 7','crazyriverranch@gmail.com','0000-00-00',NULL,'Ag','','n/a','Crazy River Ranch','@berriesnbasil'),
	(148,'29','Dawson Darling','Darlingest Lil Nursery, T','1736 Balboa Rd.','McKinleyville, ','CA','707-499-4562','dawsondarling@gmail.com','0000-00-00',NULL,'Ag','','n/a','n/a','n/a'),
	(149,'29','Mike Beck','Degrees of Green','4550 Woods Ln','McKinleyville, ','CA','707-839-5167/ 7','unclemikefishon@gmail.com','0000-00-00',NULL,'Ag','','n/a','',''),
	(150,'29','Dean Gilkerson','Earth N Hands Farm','3555 Thorpe Ln','Kneeland, CA','CA','707-599-4458','dean.enhfarm@gmail.com','0000-00-00',NULL,'Ag','','n/a','n\'a','no'),
	(151,'29','Ed Cohen','Earthly Edibles','PO Box 5184','Arcata, CA','CA','707-502-5833 (t','earthlyediblescsa@gmail.com','0000-00-00',NULL,'Ag','','earthly-edibles.com','',''),
	(152,'29','Jamie & Ben Cohoon','Ewe So Dirty Farm','212 Belleview Ave/ PO Box 194','Rio Dell, CA','CA','707-499-2150 ja','jamie@ewesodirty.com; jamie_cohoon@yahoo.com; b.co','0000-00-00',NULL,'Ag','','www.ewesodirty.com','/ewesodirty',''),
	(153,'29','Matt Mikel','Feisty Dog Orchard','PO Box 598','Garberville, CA','CA','223-6288','fdomikel@gmail.com','0000-00-00',NULL,'Ag','','','Feisty Dog Orchard',''),
	(154,'29','Dave, Autumn, Ray and Misha Feral','Feral Family Farm','134 Esther Ln.','Arcata, CA','CA','707-382-6162/70','theferals@suddenlink.net','0000-00-00',NULL,'Ag','','none','none','no'),
	(155,'29','Janet Winzler','Fernbridge Honey Co.','6000 McKenny Lane','Eureka, CA','CA','707-498-2681/ H','jumpingjanny@hotmail.com','0000-00-00',NULL,'Ag','','n/a','n/a','n/a'),
	(156,'29','Cynthia Graebner','Fickle Hill Old Rose Nurs','282 Fickle Hill Rd.','Arcata, CA','CA','707-826-0708','ficklehillrose@gmail.com','0000-00-00',NULL,'Ag','','n/a','https://www.facebook.com/pages/Fickle-Hill-Old-Rose-Nursery/126269564053351?fref=ts&ref=br_tf','N/A'),
	(157,'29','Jim Polly','Fieldbrook Nursery','155 Cider Mill Rd','McKinleyville, ','CA','707-839-0524','n/a','0000-00-00',NULL,'Ag','','n/a','n/a','no'),
	(158,'29','Richard Lovie and Arley Smith','Fieldbrook Valley Apple F','336 Rock Pit Rd.','Fieldbrook, CA','CA','707-839-4288/70','loviesgotapples@suddenlink.net','0000-00-00',NULL,'Ag','','http://fieldbrookfarms.tripod.com/','Fieldbrook Apple Farm','no'),
	(159,'29','Alex Pepe & Ben Kaplan-Good','Fields Forever Farm','4415 Woods Ln.','McKinleyville, ','CA','714-313-1796 Al','alexpeps760@gmail.com; bkaplang@gmail.com','0000-00-00',NULL,'Ag','','','',''),
	(160,'29','Andreas, Lisa & Emma Zierer','Flora Organica','PO Box 206/5015 Dows Prarie Rd','Arcata, CA/ McK','CA','707-839-3405, l','floraorganicafarm@gmail.com','0000-00-00',NULL,'Ag','','n/a','https://www.facebook.com/pages/Flora-Organica/1725360587688507?fref=ts','@floraorganicafarm'),
	(161,'29','Laurie Levey and Rita Jacinto','Flying Blue Dog Farm & Nu','PO Box 1486, 101 Christain School Rd.','Willow Creek, C','CA','530-629-1177','flyingbluedog@flyingbluedog.com','0000-00-00',NULL,'Ag','','www.flyingbluedog.com','https://www.facebook.com/pages/Flying-Blue-Dog-Farm-and-Nursery/287381935863?fref=ts',''),
	(162,'29','George Waller','Fog Farm','2966 Springer Dr.','Mckinleyville, ','CA','839-3436','wallergm@sitestar.net','0000-00-00',NULL,'Ag','','none','none','no'),
	(163,'29','Steven and Julia Roper','Forest Lakes Nursery','2300 Hillcrest Ave.','Fortuna, CA','CA','726-9371/ 707-8','forestlakesnursery@att.net','0000-00-00',NULL,'Ag','','www.forestlakesnursery.com','https://www.facebook.com/pages/Forest-Lakes-Nursery/183690405025229?fref=ts',''),
	(164,'29','Bchio Saechao','Fortuna Strawberries','262 Sunnybrook Dr.','Fortuna, CA','CA','707-572-7417/70','lilmi3nboi87@aol.com','0000-00-00',NULL,'Ag','','n/a','none','N/A'),
	(165,'29','Tammy Southard','Freshwater Gardens','450 Redmond Rd./ 5851 Myrtle Ave.','Eureka, CA','CA','707-407-7123','freshwatergardens@yahoo.com','0000-00-00',NULL,'Ag','','n/a','facebook.com/farminglocal','n/a'),
	(166,'29','Maria and Tom Krenek','Glenmar Heather Nursery','PO Box 479','Bayside, CA','CA','707-268-5560','glenmarheather@yahoo.com','0000-00-00',NULL,'Ag','','none','none',''),
	(167,'29','Brian & Ann Barbata','Golden Bee Apiaries','1773 Ambrosini Ln','Ferndale, CA','CA','707-786-4382/ 8','barbatabeefarm@gmail.com; goldenbee.annie@gmail.co','0000-00-00',NULL,'Ag','','none','none','n/a'),
	(168,'29','Robert Ducate','Gopher Gardens','1469 Walker Pt Rd','Bayside, CA','CA','707-502-1663','bdredsmile@gmail.com','0000-00-00',NULL,'Ag','','n/a','none','n/a'),
	(169,'29','Thom Lindholm','Grampa Thom\'s Backyard Fa','551 Scenic Dr.','Loleta, CA','CA','707-845-2063','thomlindholm@yahoo.com','0000-00-00',NULL,'Ag','','n/a','n/a','na'),
	(170,'29','Grady Walker','Green Fire Farm','PO Box 608','Hoopa, CA','CA','707-502-0045','greenfireorganics@gmail.com','0000-00-00',NULL,'Ag','','none','none',''),
	(171,'29','River Walker and Jessica Brown','Happy Hearts Farm','1596 Gross Rd','Fieldbrook, CA','CA','707-496-8596','happyheartsfarming@gmail.com','0000-00-00',NULL,'Ag','','instagram: happy hearts farm','happy hearts farm','@happyheartsfarm'),
	(172,'29','Ty Johnson','Hillbelly Farm','PO Box 248','Scotia, CA','CA','707-764-3670','hillbelly@live.com','0000-00-00',NULL,'Ag','','none','none','no'),
	(173,'29','Laurence and Lisa Hindley','Hindley Ranch (2nd produc','320 Schirman Way','Fortuna, CA','CA','707-725-9266/70','lhindley@yahoo.com','0000-00-00',NULL,'Ag','','www.hindleyranch.com','https://www.facebook.com/Hindley-Ranch-177026192490002/?fref=ts',''),
	(174,'29','Ron and Shelly Honig','Honey Apple Farms','11251 West End Rd.','Arcata, CA','CA','707-822-6186','honeyapplefarms@gmail.com; ronald.honig@gmail.com','0000-00-00',NULL,'Ag','','n/a','none',''),
	(175,'29','Paul and Heidi Leslie','Humboldt Honey Wine','1480 Riverbar Road','Fortuna, CA','CA','707 599 7973','humboldthoneywine@yahoo.com','0000-00-00',NULL,'Ag','','humboldthoneywine.com','www.facebook.com/humboldthoneywine',''),
	(176,'29','Ino and Lauren Riley','I and I Farm','2335 1/2 Hooven Rd.','McKinleyville, ','CA','707-840-0336/60','lauren_ballard@yahoo.com; iasthai@att.net; ino707r','0000-00-00',NULL,'Ag','','n/a','I&I Farm','iasthaiherbs'),
	(177,'29','Karina Gilkerson','Jacob\'s Greens','PO Box 1273','Blue Lake','CA','707-845-0293','arugula22@gmail.com','0000-00-00',NULL,'Ag','','n/a','n/a','n/a'),
	(178,'29','Marsha and John Maxwell','Jameson Creek Nursery','3901 Rohnerville Rd','Fortuna, CA','CA','707-725-5084/ 6','jamesoncreek@att.net; jamesoncreeknursery@gmail.co','0000-00-00',NULL,'Ag','','none','none','no'),
	(179,'29','Leslie G. and Doug McMurray','Jameson Creek Ranch','400 Dick Smith Rd.','Fortuna, CA','CA','707-725-8616, 5','lcmcmurray@mcmurray-law.com','0000-00-00',NULL,'Ag','','www.jamesoncreekranch.com','/jamesoncreekranch','no'),
	(180,'29','\"Paco\" Francisco Diaz Reche','La Huerta Del Perro Produ','HC 11 PO Box 715/ 1473 Red Cap Road','Somes Bar, CA/ ','CA','707-296-5536','flotaryvolar@hotmail.com','0000-00-00',NULL,'Ag','','n/a','n/a',''),
	(181,'29','Leonard J. Melendez','Leo\'s Plants','1521 Railroad Dr.','McKinleyville, ','CA','839-0622','melendezno7@att.net','0000-00-00',NULL,'Ag','','n/a','Leo\'s Plants',''),
	(182,'29','John Severn','Little River Farm','140 Ole Hanson Rd','Eureka, CA','CA','707-441-9286/ 4','littleriverfarm@sbcglobal.net','0000-00-00',NULL,'Ag','','n/a','yes','n/a'),
	(183,'29','Frederic Diekmeyer & Amy Barnes','Luna Farm','PO Box 184','Willow Creek','CA','530-355-4191/ 7','farmfred@gmail.com','0000-00-00',NULL,'Ag','','n/a','Luna Farm','@lunafarm'),
	(184,'29','Kashi Albertsen','Luscious Gardens','PO Box 2793/ 1766 Wolf Road','McKinleyville, ','CA','707-834-2698','lusciousgardens@gmail.com','0000-00-00',NULL,'Ag','','n/a','Luscious Gardens',''),
	(185,'29','Brad and Adrianne Werren','Magic Rabbit (previously ','3385 Middlefield Ln.','Eureka, CA','CA','707-442-5002','magicrabbitgo@gmail.com','0000-00-00',NULL,'Ag','','n/a','n/a','no'),
	(186,'29','Loren McIntosh','McIntosh Farm','PO Box 296','Willow Creek, C','CA','530-629-4145/ 5','vistarose@netzero.net','0000-00-00',NULL,'Ag','','n/a','n/a','n/a'),
	(187,'29','Christine Bernard','Moonstone Bee Sweet (2nd ','PO Box 1009','Trinidad, CA','CA','707-822-5425/70','junechris6@yahoo.com','0000-00-00',NULL,'Ag','','n/a','n/a','n/a'),
	(188,'29','Michael Egan','Mycality Mushroom','2577 Fickle Hill Rd','Arcata, CA','CA','707-834-6396','mycality77@yahoo.com','0000-00-00',NULL,'Ag','','mycalitymushrooms.com','n/a','@Mycality Mushrooms'),
	(189,'29','Jacques & Amy Neukom','Neukom Family Farms','PO Box 312','Willow Creek, C','CA','530-629-1909','spinningweb@hotmail.com','0000-00-00',NULL,'Ag','','n/a','n/a','no'),
	(190,'29','Jill VanderLinden','New Moon Organics','125 Shively Flat Rd.','Shively, CA','CA','707-722-4439/ 5','newmoonorganics@gmail.com','0000-00-00',NULL,'Ag','','newmoonorganics.org','none','no'),
	(191,'29','David Wilbur','Noble Berry Farm','PO Box 1134/3563 Fieldbrook Rd.','Blue Lake, CA/ ','CA','707-834-6299/ S','klnoble@suddenlink.net (RLnoble?)','0000-00-00',NULL,'Ag','','','','no'),
	(192,'29','Blaine Maynor & Jennifer Rishel','Orchids For The People','1975 Blake Rd','McKinleyville, ','CA','840-0223/ 496-9','orchidpeople@suddenlink.net; orchidmom@suddenlink.','0000-00-00',NULL,'Ag','','www.orchidpeople.com','facebook.com/orchidsforthepeople','@orchidsforthepeople'),
	(193,'29','John Gary and Heather Plaza','Organic Matters Ranch','6743 Myrtle Ave','Eureka, CA','CA','707-407-3276; 7','info@organicmattersranch.com','0000-00-00',NULL,'Ag','','www.organicmattersranch.com','https://www.facebook.com/pages/Organic-Matters-Ranch/218632264820493?fref=ts','@organicmattersranch'),
	(194,'29','Catherine Peterson','The Oyster Lady (formerly','238 Lois Lane/ PO Box 183','Trinidad, CA','CA','707-677-2043/ 7','micatjoy@aol.com','0000-00-00',NULL,'Ag','','n/a','n/a',''),
	(195,'29','Pam E. Van Fleet','Pam E Van Fleet','2900 Kenwood Dr.','Fortuna, CA','CA','845-9004','tannervanfleet1@suddenlink.net','0000-00-00',NULL,'Ag','','n/a','none','no'),
	(196,'29','Elizabeth Dunlap','Paradise Flat Farm','78 Shively Flat Road','Scotia, CA','CA','707-599-2555','farmerbethie@yahoo.com','0000-00-00',NULL,'Ag','','n/a','n/a','n/a'),
	(197,'29','Paul Lohse','Paul Lohse','PO Box 429','Arcata, CA','CA','707-668-5432/50','','0000-00-00',NULL,'Ag','','n/a','none',''),
	(198,'29','Marguerite and Patrick Pierce','Pierce Family Farm','PO Box 93/ 3,000 Red Cap Road','Orleans, CA','CA','530-627-3320','piercefarm@toast.net','0000-00-00',NULL,'Ag','','none','none',''),
	(199,'29','Marcellene Norton','Quail Run Farm','PO Box 545','Hoopa, Ca','CA','530-351-3246/ 5','marcellenenorton@yahoo.com','0000-00-00',NULL,'Ag','','n/a','Marcellene Norton','no'),
	(200,'29','Benjamin and Kelsey Perone','Rain Frog Farm','PO Box 684','Blue Lake, CA','CA','707-498-9837','rainfrogfarm@yahoo.com','0000-00-00',NULL,'Ag','','n/a','no',''),
	(201,'29','David Reed','Reed\'s Bees','911 Bayview St','Arcata, CA','CA','707-826-0544','','0000-00-00',NULL,'Ag','','no website','no',''),
	(202,'29','Henry and Mody Holloman','Ridgetop Garden','569 Elizabeth Dr.','Arcata, CA','CA','707-822-4756','hnrymody@yahoo.com','0000-00-00',NULL,'Ag','','no','yes. ridge top garden',''),
	(203,'29','James Cortazar, Shaniah Williams','Rio Dell Farms','625 Monument Road','Rio Dell, CA','CA','707-273-0663','shaniah.williams@ymail.com','0000-00-00',NULL,'Ag','','n/a','n/a',''),
	(204,'29','Seth Rick','River Bees','156 Ewan Ave','Shively, CA','CA','707-722-4669; 7','onemorebee@yahoo.com','0000-00-00',NULL,'Ag','','talltreesbees.com','',''),
	(205,'29','Sheree Hugli','Rivernook','PO Box 1546; 851 E. Sultana Bay','Willow Creek, C','CA','530-629-2063/ 9','rivernook1@outlook.com; sherleeakak@outlook.com','0000-00-00',NULL,'Ag','','n/a','',''),
	(206,'29','Cynthia Annotto','Rock N Rose','1785 Mygina Ave','McKinleyville, ','CA','707-599-2005/ 8','cindyannotto@yahoo.com','0000-00-00',NULL,'Ag','','n/a','n/a',''),
	(207,'29','Chan Yan Saechao','Saechao Strawberries','1665 Thelma St','Fortuna, CA','CA','707-845-3930','','0000-00-00',NULL,'Ag','','n/a','',''),
	(208,'29','William Sanford','Sanco Farms','2231 Albee Street','Eureka, CA','CA','707-798-1499/83','williamsanford19@yahoo.com; williamsanford@yahoo.c','0000-00-00',NULL,'Ag','','N/A','','n/a'),
	(209,'29','Gene, Ginger, Alissa, Casey & Silas Sarvinski','Sarvinski Family Farm','441 Dillon Rd','Ferndale, CA','CA','707-786-9240/ 4','gsarvinski@gmail.com','0000-00-00',NULL,'Ag','','n/a','The Corn Crib','no'),
	(210,'29','Marilyn Kelly','Seaside Herbs','170 Garden Ln.','Bayside, CA','CA','707-845-9353','mtoad60@gmail.com','0000-00-00',NULL,'Ag','','','','no'),
	(211,'29','Melanie and Kevin Cunningham','Shakefork Community Farm','7914 State HWY 36','Carlotta, CA','CA','707-498-3546/21','shakeforkcommunityfarm@gmail.com','0000-00-00',NULL,'Ag','','shakeforkcommunityfarm.com','shakefork_community_farm','@shakeforkcommunityfarm.com AND @westcoastoxen'),
	(212,'29','Spencer & Jules Hill','Small Fruits','PO Box 526','Hoopa, CA','CA','707-499-9756','spencerhill29@outlook.com','0000-00-00',NULL,'Ag','','n/a','n/a','no'),
	(213,'29','Karin Eide','Spring Hill Farmstead Goa','1721 Spring Hill Lane','Bayside, CA','CA','707-616-1093','springhillfarmstead@gmail.com','0000-00-00',NULL,'Ag','','','','no'),
	(214,'29','Bethsheba & Jeremiah Goldstein','Swallowtail Gardens','4870 Walnut Dr.','Eureka, CA','CA','707-572-8776','humboldtheart@gmail.com','0000-00-00',NULL,'Ag','','n/a','n/a','n/a'),
	(215,'29','Shelley Ruhlen Ponce','Sweet Pea Gardens','1433 Freshwater Rd','Eureka, CA','CA','707-499-3363; 7','sweetpgardens@gmail.com','0000-00-00',NULL,'Ag','','','SweetPeaGardens.tea','@sweetpeagardens'),
	(216,'29','Patty Clary & Bill Verick','Tanoak Hill Farm (2nd pro','PO Box 1447','Hoopa, CA','CA','530-625-5153/70','patty@tanoakhill.com','0000-00-00',NULL,'Ag','','n/a','n/a',''),
	(217,'29','Danielle Newman and Will Randall','Trident Lightning Farm','1202 Chester Court','Arcata, CA','CA','707-826-0490/40','danielle@penandquilt.com','0000-00-00',NULL,'Ag','','n/a','n/a','@TridentLightningFarms'),
	(218,'29','William Fales','Valley Flower Vegetables','665 Centerville Rd.','Ferndale, CA','CA','707-786-9827; 7','valleyflower@frontiernet.net','0000-00-00',NULL,'Ag','','none','facebook.com/valleyflowervegetables','no'),
	(219,'29','Paul Giuntoli','Warren Creek Farms','1264 Warren Creek Rd.','Arcata, CA','CA','707-822-6017','giuntolifarms@suddenlink.net','0000-00-00',NULL,'Ag','','n/a','none','no'),
	(220,'29','Blake Richard','Wild Rose Farm','PO BOX 1233','Blue lake, CA','CA','707-834-4115 Bl','blakerichard3967@gmail.com','0000-00-00',NULL,'Ag','','','',''),
	(221,'29','Michael and Jennifer Peterson','Willow Creek Farms','PO Box 1392','Willow Creek, C','CA','530-623-7151','info@willowcreekorganicfarms.com','0000-00-00',NULL,'Ag','','www.willowcreekorganicfarms.com','https://www.facebook.com/pages/Willow-Creek-Farms/84946086062?fref=ts','@Willowcreekfarms'),
	(222,'29','Chris Moore & Amber Ryno','Woody Ryno','1675 Woody Road','McKinleyville, ','CA','707 601 9547','woodyryno@gmail.com','0000-00-00',NULL,'Ag','','www.woodyrynofarms.com','https://www.facebook.com/woodyrynofarms/?fref=ts','@woodyryno'),
	(223,'29','','Test Farm B','','','','','','0000-00-00',NULL,'Ag','','','',''),
	(224,'29','','Arise Bakery','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(225,'29','','Beck\'s Bakery','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(226,'29','','Brio Baking','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(227,'29','','Buck and Daisy (DBA: Tang','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(228,'29','','Celebrations Tamales','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(229,'29','','Ethiopian International C','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(230,'29','','Food is Love, Love is Foo','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(231,'29','','Foodwise - Winter Mkt','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(232,'29','','Greatful Granola Co. - we','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(233,'29','','Henry\'s Olives','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(234,'29','','Hooked Kettle Corn','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(235,'29','','Humboldt Hot Dogs','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(236,'29','','Humboldt Kimchi','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(237,'29','','Jerk Kitchen','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(238,'29','','Kneeland Glen Goats','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(239,'29','','Kodiak Catch','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(240,'29','','The Lighthouse Grill','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(241,'29','','Los Bagels','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(242,'29','','Louise\'s Gourmet Seasoned','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(243,'29','','Momma Gerty\'s Goat Milk S','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(244,'29','','Pizza Gago - weekday afte','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(245,'29','','Planet Teas','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(246,'29','','Sistah\'s Vegan','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(247,'29','','Amy Pollock','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(248,'29','','Roland','','','','','','0000-00-00',NULL,'NonAg','','','',''),
	(249,'29','','Mike Olmstead','','','','','','0000-00-00',NULL,'NonAg','','','','');

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
