/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.25-MariaDB : Database - vietnamopening
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `auth_assignment` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`slug`,`parent_id`,`visible`) values (1,'Bất động sản','',0,1),(2,'Đồ điện tử','',0,1),(3,'Thực phẩm','thuc-pham',0,1),(4,'Thời trang','',0,1),(5,'Nội thất','noi-that',7,1),(6,'Dịch vụ','dich-vu',NULL,0),(7,'Xây dựng','xay-dung',NULL,1),(8,'Ngoại thất','ngoai-that',7,1);

/*Table structure for table `image` */

DROP TABLE IF EXISTS `image`;

CREATE TABLE `image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `image` */

insert  into `image`(`id`,`name`,`extension`,`size`,`created_at`,`created_by`) values (1,'958_P_1374456212167','png','91608',1502335474,1),(2,'0621-123','png','145418',1502359561,1),(3,'Index','jpg','290021',1502359569,1),(4,'2017-08-08_14-15-09','png','324783',1502359578,1),(5,'2017-08-08_14-15-52','png','344150',1502359579,1),(6,'earth-clipart-transparent-background-14','jpg','470297',1502359580,1),(7,'TTG_eBayVaYahooNhatHopTac_inside','jpg','12061',1502359581,1),(8,'photo6062241399824295890','jpg','102708',1502360492,1),(9,'imgpress_635314208067550080_635314208503102845_635314209020399754','jpg','363500',1502360492,1),(10,'photo6062241399824295891','jpg','87785',1502360493,1),(11,'photo6062241399824295893','jpg','113706',1502360494,1),(12,'photo6062241399824295897','jpg','156482',1502360494,1),(13,'3d-world-map-png-2','png','124217',1502360584,1),(14,'360px-Vietnam_map','png','32273',1502360585,1),(15,'13055460_1029079893846288_636276461657517137_n','jpg','48055',1502360585,1),(16,'globe-35584_960_720','png','134788',1502360586,1),(17,'Map_of_Vietnam (1)','png','29703',1502360586,1),(18,'Map_of_Vietnam','png','9257',1502360587,1),(19,'sale-now-on','jpg','28204',1502360587,1),(20,'store-keeper-md','png','43612',1502360587,1),(21,'13055460_1029079893846288_636276461657517137_n','jpg','48055',1502691979,1),(22,'globe-35584_960_720','png','134788',1502692088,1),(23,'sale-now-on','jpg','28204',1502692088,1),(24,'Map_of_Vietnam','png','9257',1502692784,1),(25,'store-keeper-md','png','43612',1502692784,1),(26,'Map_of_Vietnam (1)','png','29703',1502694162,1),(27,'Map_of_Vietnam','png','9257',1502694162,1),(28,'Map_of_Vietnam (1)','png','29703',1502694205,1),(29,'Map_of_Vietnam','png','9257',1502694206,1),(30,'13055460_1029079893846288_636276461657517137_n','jpg','48055',1502694214,1),(31,'sale-now-on','jpg','28204',1502694214,1),(32,'3d-world-map-png-2','png','124217',1502694292,1),(33,'13055460_1029079893846288_636276461657517137_n','jpg','48055',1502694515,1),(34,'Map_of_Vietnam (1)','png','29703',1502694529,1),(35,'Chrysanthemum','jpg','879394',1502694632,1),(36,'Desert','jpg','845941',1502694633,1),(37,'Hydrangeas','jpg','595284',1502694634,1),(38,'Jellyfish','jpg','775702',1502694650,1),(39,'Koala','jpg','780831',1502694651,1),(40,'Lighthouse','jpg','561276',1502694652,1),(41,'Tulips','jpg','620888',1502694657,1),(42,'Tulips','jpg','620888',1502701579,1);

/*Table structure for table `location` */

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `visible` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `location` */

insert  into `location`(`id`,`name`,`slug`,`parent_id`,`visible`) values (1,'Hồ Chí Minh','ho-chi-minh',NULL,1),(2,'Hà Nội','ha-noi',NULL,0),(3,'Hà Tây','ha-tay',2,1),(4,'Củ Chi','cu-chi',1,1);

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values ('m000000_000000_base',1502335364),('m140506_102106_rbac_init',1502335371);

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(2) NOT NULL COMMENT '0: Dealer. 1: Cooperation',
  `category_id` int(11) DEFAULT NULL,
  `organization` tinyint(4) DEFAULT '0',
  `location_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `checked_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `contact_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_facebook` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_zalo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `post` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT '0',
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT '0',
  `year_of_birth` int(11) DEFAULT '0',
  `gender` tinyint(2) DEFAULT '0',
  `avatar` int(11) DEFAULT '0',
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_staff` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`phone`,`address`,`year_of_birth`,`gender`,`avatar`,`username`,`password_hash`,`password_reset_token`,`email`,`auth_key`,`status`,`created_at`,`updated_at`,`password`,`is_staff`) values (1,'admin','0986803325','159 Lò Siêu, Quận 11',1988,0,42,'admin','$2y$13$9xvBZOa2.f66XTKEguRTPe8LGeOxx39DarcDtCG3yvIogJweH/rfu','','admin@gmail.com','_gSHFD3lTDmLvjGliBrmhTZP5Cs2Nr5K',10,1502335200,1502701584,'',0);

/*Table structure for table `user_auth` */

DROP TABLE IF EXISTS `user_auth`;

CREATE TABLE `user_auth` (
  `user_id` int(11) NOT NULL,
  `client` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `client_user_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_auth` */

/*Table structure for table `user_transaction` */

DROP TABLE IF EXISTS `user_transaction`;

CREATE TABLE `user_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `transaction_date` int(11) NOT NULL,
  `transaction_type` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_transaction` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
