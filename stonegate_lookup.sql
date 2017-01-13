/*
SQLyog Community v12.3.1 (64 bit)
MySQL - 5.7.16-log : Database - stonegate_lookup
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`stonegate_lookup` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `stonegate_lookup`;

/*Table structure for table `stonegate_lookup` */

DROP TABLE IF EXISTS `stonegate_lookup`;

CREATE TABLE `stonegate_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(100) DEFAULT NULL,
  `account_id` varchar(10) DEFAULT NULL,
  `profile_id` varchar(10) DEFAULT NULL,
  `brand_id` varchar(10) DEFAULT NULL,
  `venue_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `stonegate_lookup` */

insert  into `stonegate_lookup`(`id`,`brand`,`account_id`,`profile_id`,`brand_id`,`venue_id`) values 
(1,'Admiral Duncan','1222','2115','1703','1704'),
(2,'Beduin','1222','2115','1705','1706'),
(3,'Charles Street','1222','2115','1707','1708'),
(4,'Colors','1222','2115','1709','1710'),
(5,'Duke Of Wellington','1222','2115','1711','1712'),
(6,'Edwards','1222','2121','1713','1714'),
(7,'Finnegans Wake','1222','2115','1715','1716'),
(8,'Flares','1222','2117','1717','1718'),
(9,'Halfway To Heaven','1222','2115','1719','1720'),
(10,'Kings Arms','1222','2115','1721','1722'),
(11,'Luna','1222','2115','1723','1723'),
(12,'Marys','1222','2115','1725','1726'),
(13,'Missoula','1222','2123','1727','1728'),
(14,'Pit And Pendulum','1222','2115','1729','1730'),
(15,'Popworld','1222','2127','1731','1732'),
(16,'Queens Court','1222','2115','1733','1734'),
(17,'Reflex','1222','2129','1735','1736'),
(18,'Retro Bar','1222','2115','1737','1738'),
(19,'Rosies','1222','2115','1739','1740'),
(20,'Rupert Street','1222','2115','1741','1742'),
(21,'Slains Castle','1222','2115','1743','1744'),
(22,'Slug','1222','2131','1745','1746'),
(23,'Two Brewers','1222','2115','1747','1748'),
(24,'Via','1222','2115','1749','1750');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
