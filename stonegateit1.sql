/*
SQLyog Community v12.3.1 (64 bit)
MySQL - 5.7.16-log : Database - stonegateit1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`stonegateit1` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `stonegateit1`;

/*Table structure for table `iteration1` */

DROP TABLE IF EXISTS `iteration1`;

CREATE TABLE `iteration1` (
  `email` varchar(100) NOT NULL DEFAULT '',
  `sites` varchar(1000) DEFAULT '',
  `subject_line` varchar(1000) DEFAULT NULL,
  `header` varchar(1000) DEFAULT NULL,
  `copy` varchar(1000) DEFAULT NULL,
  `voucher` varchar(50) DEFAULT NULL,
  `valid_to` varchar(50) DEFAULT NULL,
  `sign_off_copy` varchar(1000) DEFAULT NULL,
  `terms_and_conditions` varchar(10000) DEFAULT NULL,
  `voucher_instruction` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `iteration1` */

insert  into `iteration1`(`email`,`sites`,`subject_line`,`header`,`copy`,`voucher`,`valid_to`,`sign_off_copy`,`terms_and_conditions`,`voucher_instruction`) values 
('Ad-Hoc\r\n','',NULL,'Header\r\n','Copy goes here\r\n','Voucher\r\n',NULL,'Sign off message here\r\n','Terms and conditions?\r\n',NULL),
('Auto Welcome  - Immediate (Scot)\r\n','Scottish branded bars only\r\n','Thanks for signing up!\r\n','Thanks for signing up!\r\n','\"##Hi $forename$,##\n##Thanks for signing up to receive news of our events, offers and promotions.##\n##Look out for a range of free drinks, birthday treats and booking discounts coming your way soon!##\"\r\n',NULL,NULL,NULL,NULL,NULL),
('Auto Welcome - Bounce back for first WIFI sign in\r\n','All branded bars\r\n','Starting today - Great News from $dynamic1$!\r\n','Thanks for signing up!\r\n','\"##Hi $forename$,##\n##Thanks for signing up to receive news of our events, offers and promotions.##\n##Look out for a range of free drinks, birthday treats and booking discounts coming your way!##\"\r\n',NULL,NULL,'\"##Come in and party again soon.##\n##Enjoy!##\n##The $dynamic1$ team.##\"\r\n',NULL,NULL),
('Auto Welcome - Immediate\r\n','All branded bars\r\n','Starting today - Great News from $dynamic1$!\r\n','Thanks for signing up!\r\n','\"##Hi $forename$,##\n##Thanks for signing up to receive news of our events, offers and promotions.##\n##Look out for a range of free drinks, birthday treats and booking discounts coming your way soon!##\"\r\n',NULL,NULL,'\"##Enjoy!##\n##The $dynamic1$ team.##\"\r\n',NULL,NULL),
('Birthday -1 week\r\n','All branded bars\r\n','Save 10% on the perfect package and VIP booth for your birthday celebration\r\n','There\'s no party like a $dynamic2$ party\r\n','\"##Hi $forename$,##\n##We sent you a voucher for free birthday Woo Woo cocktail a couple of weeks ago.##\n##Hope you enjoyed it!##\n##If your still wondering how to celebrate, then we can help with birthday packages to make your night go with a bang!##\n##Save 10% when you book your party with us*.##\"\r\n','Save 10% when you book your party with us.\r\n','Plus 2 weeks post the birthdate\r\n','\"##Click here to book one of our great value packages.##\n##Call us, or pop in and see us, to find out how we can make it the perfect party for you.##\n##Your best ever party for less!##\n##The $dynamic1$ team.##\"\r\n','\"Over 18\'s only. Minimum spend £100. Offer not available in Scotland. Offer must be redeemed within 2 weeks of your birthdate.\nOffer is subject to availability. Management reserves the right to remove this offer at any time.\"\r\n','Simply present your voucher on your phone, or quote your unique promo code, to claim your free Birthday Woo Woo.\r\n'),
('Birthday -3 weeks\r\n','All branded bars\r\n','Free birthday Woo Woo cocktail waiting for you  @ $dynamic1$\r\n','Claim your free Woo Woo cocktail and 10% off your party booking\r\n','\"##Hi $forename$,##\n##The countdown to your birthday is on, and we\'d love to see you to celebrate.##\n##So, to get the party started, there\'s a free birthday Woo Woo cocktail waiting for you @ $dynamic1$!##\n##And if you\'re having a party, find out how you can make it your best ever, with our perfect packages, VIP booths - and save 10% *##\"\r\n','Free Woo Woo cocktail\r\n','Plus 2 weeks post the birthdate\r\n','\"##Call us, or click here to book one of our great value packages.##\n##Come party at $dynamic1$ again soon.##\n##Enjoy!##\n##The $dynamic1$ team.##\"\r\n','\"Over 18\'s only. Minimum spend £100. Offer not available in Scotland. Offer must be redeemed within 2 weeks of your birthdate.\nFree cocktail is offer is subject to availability, there is no cash alternative, and Management reserves the right to remove this offer at any time.\"\r\n','Simply present your voucher on your phone, or quote your unique promo code, to claim your free Birthday Woo Woo.\r\n'),
('Birthday -6 weeks\r\n','All branded bars\r\n','Let us help plan your best ever birthday celebration!\r\n','Perfect packages, VIP booths - and save 10%\r\n','\"##Hi $forename$,##\n##A little bird tells us it’s your birthday soon, and we\'d love to help you celebrate in style.##\n##Save 10% when you book your party with us.##\"\r\n','Save 10% when you book your party with us.\r\n','Plus 2 weeks post the birthdate\r\n','\"##Call us, or pop in and see us, to find out how we can make it the perfect party for you.##\n##Or click here to book one of our great value packages.##\n##Your best ever party awaits!##\n##The $dynamic1$ team##\"\r\n','\"Over 18\'s only. Minimum spend £100. Offer not available in Scotland. Offer must be redeemed within 2 weeks of your birthdate.\nOffer is subject to availability, there is no cash alternative, and Management reserves the right to remove this offer at any time.\"\r\n',NULL),
('Booking Launch – 1\r\n','All branded bars\r\n','Your chance to win a magnum of Ciroc Ignite\r\n','Celebrate $dynamic2$ new website launch\r\n','\"##Hi $forename$,##\n##We at $dynamic1$ are celebrating the launch of our ##new website.##\n##We\'ve made it easier than ever to find out ##what’s going on##, and plan, book and pay for your great nights out with us.##\n##Booking your VIP booth or money saving drinks packages has never been easier.##\"\r\n','Click here to see how it works (Video link)\r\n',NULL,'\"##Book in September and you\'ll be entered into our prize draw to win a VIP evening, booth and magnum of Ciroc for up to 10.##\n##Book now! It could be you…##\n##The $dynamic1$ team##\"\r\n','Over 18\'s only. Offer not available in Scotland. Winner will be drawn at random from bookings received from 5th Sept 2016 to 30th September 2016, and notified within 7 days of the draw being made. Offer is subject to availability, there is no cash alternative, and Management reserves the right to remove this offer at any time. If you wish to enter the competition, please write to Ciroc Competition, Stonegate Pub Company 500 Capability Green LU1 3LS.\r\n',NULL),
('Booking Launch – 2\r\n','All branded bars\r\n','Celebrate $dynamic2$ new website launch\r\n','Your chance to win a magnum of Ciroc Ignite\r\n','\"##Hi $forename$,##\n##Check out just how easy it is to plan, book and pay for you next great night out at $dynamic1$.##\n##Booking your VIP booth, or money saving drinks package, has never been easier.##\n##See how it works here##.(Video link)##\"\r\n',NULL,NULL,'\"##Book in October  and you\'ll be entered into our prize draw to win a VIP evening, booth and magnum of Ciroc for up to 10.##\n##Book your best night out, and the Ciroc could be yours!##\n##The $dynamic1$ team.##\"\r\n','Over 18\'s only. Offer not available in Scotland. Winner will be drawn at random from bookings received from 1st October 2016 to 31st October 2016, and notified within 7 days of the draw being made. Offer is subject to availability, there is no cash alternative, and Management reserves the right to remove this offer at any time. If you wish to enter the competition, please write to Ciroc Competition, Stonegate Pub Company 500 Capability Green LU1 3LS.\r\n',NULL),
('Booking Launch – 3\r\n','All branded bars\r\n','Book your best ever party for less @ $dynamic1$\r\n','There\'s no party like a $dynamic2$ party\r\n','\"##Hi $forename$,##\n##Planning a party? There\'s no party like a $dynamic2$ party.##\n##Save 10% when you book your party with us*. We have VIP booths and money saving drinks packages to suit all party sizes.##\"\r\n','Save 10% when you book your party with us.\r\n','Dynamic - 28 days from date of send\r\n','\"##Book in November and you\'ll be entered into our prize draw to win a VIP evening, booth and magnum of Ciroc for up to 10.##\n##Book your best night out, and the Ciroc could be yours!##\nPROMOCODE\n##The $dynamic1$ team.##\"\r\n','Over 18\'s only. Offer not available in Scotland. Winner will be drawn at random from bookings received from 1 November 2016 to 30th November 2016, and notified within 7 days of the draw being made. Offer is subject to availability, there is no cash alternative, and Management reserves the right to remove this offer at any time. If you wish to enter the competition, please write to Ciroc Competition, Stonegate Pub Company 500 Capability Green LU1 3LS.\r\n',NULL),
('Empty Belly\r\n','',NULL,'Header\r\n','Copy goes here\r\n','Voucher\r\n',NULL,'Sign off message here\r\n','Terms and conditions?\r\n',NULL),
('Forgotten Password\r\n','All venues\r\n','Reset password on your $dynamic1$ account\r\n','Password Reset\r\n','\"##Hi $forename$,##\n##We have had a password reset request.##\n##Your password has now been reset to xxxpasswordxxxx.##\n##Click here## to login, access your account and change this temporary password to something more memorable.##\n##Come see us again soon!##\n##Thank you.##\"\r\n',NULL,NULL,'The $dynamic1$ Team\r\n',NULL,NULL),
('Welcome 1 + 1 Day\r\n','All branded bars\r\n','Your Free Glass Of Fizz   awaits @ $dynamic1$!\r\n','Free Glass Of Fizz  !\r\n','\"##Hi $forename$,##\n##As promised  - here\'s a little something to get the party started.##\n##Come and see us in the next 14 days and claim your Free Glass Of Fizz !##\"\r\n','Free Glass Of Fizz  \r\n','Dynamic - 14 days after date of send\r\n','\"##Come see us again soon!##\n##The $dynamic1$ team##\"\r\n','\"Only one voucher per customer. Over 18\'s only. Offer not available in Scotland. Offer must be redeemed within 14 days of receipt.\nOffer is subject to availability, there is no cash alternative, and Management reserves the right to remove this offer at any time.\"\r\n','Simply present your voucher on your phone, or quote your unique promo code, to claim your Free Glass Of Fizz .\r\n'),
('Welcome 1 + 1 Day (Scot)\r\n','Scottish branded bars only\r\n','Your best ever party for less @ $dynamic1$\r\n','Save 10% when you book your party with us.\r\n','\"##Hi $forename$,##\n##As promised  - here\'s a little something to get the party started.##\n##And there\'s no party like a $dynamic2$ party.##\n##GET THE PARTY STARTED## \"\r\n','Save 10% when you book your party with us.\r\n','Dynamic - 3 months from date of send\r\n','\"##Call us, or pop in and see us, to find out how we can make it the perfect party for you.##\n##Or click here to book one of our great value packages.##\n##Your best ever party for less!##\n##The $dynamic1$ team.##\"\r\n','\"Terms and conditions: Over 18\'s only. Minimum spend £100. Offer must be redeemed within 3 months of receipt.\nOffer is subject to availability. Management reserves the right to remove this offer at any time.\"\r\n','Save 10% when you book your party with us. Simply quote your unique voucher code when you contact us to claim your 10% party discount.\r\n'),
('Welcome 2 + 7 Days\r\n','All branded bars\r\n','Have you claimed your Free Glass Of Fizz   @ $dynamic1$ yet?\r\n','Claimed your free fizz  yet?\r\n','\"##Hi $forename$,##\n##Don\'t forget - you\'ve got just seven nights left to redeem the \"\"free fizz\"\" voucher we sent you last week.##\n##Simply show your voucher at the bar, or quote your unique promo code.##\n##Having a party? ##\n##Find out how we can make it your best ever.##\nLook out for more great offers coming your way!\"\r\n',NULL,NULL,'\"##Come party again soon.##\n##Enjoy!##\n##The $dynamic1$ team##\"\r\n',NULL,NULL),
('Welcome 2 + 7 Days (Scot)\r\n','Scottish branded bars only\r\n','Save 10% on the best party ever @ $dynamic1$\r\n','Save 10% when you book your party with us.\r\n','\"##Hi $forename$,##\n##Just a reminder - you can get 10% off party bookings##\n##at $dynamic2$.## \"\r\n','Save 10% when you book your party with us.\r\n','Dynamic - 3 months from date of send\r\n','\"##Call us, or pop in and see us, to find out how we can make it the perfect party for you.##\n##Or click here to book one of our great value packages.##\n##Your best ever party for less!##\n##The $dynamic1$ team.##\"\r\n','\"Terms and conditions: Over 18\'s only. Minimum spend £100. Offer must be redeemed within 3 months of receipt.\nOffer is subject to availability. Management reserves the right to remove this offer at any time.\"\r\n','Save 10% when you book your party with us. Simply quote your unique voucher code when you contact us to claim your 10% party discount.\r\n'),
('Welcome 3 + 21 Days\r\n','All branded bars\r\n','Your best ever party for less @ $dynamic1$\r\n','There\'s no party like a $dynamic2$ party\r\n','\"##Hi $forename$,##\n##Planning a party? There\'s no party like a $dynamic2$ party. ##\n##And here\'s our latest deal for you!##\n##Save 10% when you book your party with us*.##\"\r\n','##Save 10% when you book your party with us.##\r\n','Dynamic - 3 months from date of send\r\n','\"##Call us, or pop in and see us, to find out how we can make it the perfect party for you.##\n##Or click here to book one of our great value packages.##\n##Your best ever party for less!##\n##The $dynamic1$ team##\"\r\n','\"Terms and conditions: Over 18\'s only. Minimum spend £100. Offer not available in Scotland. Offer must be redeemed within 3 months of receipt.\nOffer is subject to availability. Management reserves the right to remove this offer at any time.\"\r\n','Simply quote your unique promo code when you contact us to claim your 10% party discount.\r\n'),
('Welcome 3 + 21 Days (Scot)\r\n','Scottish branded bars only\r\n','Still not to late - Save 10% on the best party ever @ $dynamic1$\r\n','Save 10% when you book your party with us.\r\n','\"##Hi $forename$,##\n##Birthday, big night out, or just because…##\n##We don’t want you to miss out!##\n##CLAIM YOUR 10% SAVING NOW##\"\r\n','Save 10% when you book your party with us.\r\n','Dynamic - 3 months from date of send\r\n','\"\n##Call us, or pop in and see us, to find out how we can make it the perfect party for you.##\n##Or click here to book one of our great value packages.##\n##Your best ever party for less!##\n##The $dynamic1$ team.##\"\r\n','\"Terms and conditions: Over 18\'s only. Minimum spend £100. Offer must be redeemed within 3 months of receipt.\nOffer is subject to availability. Management reserves the right to remove this offer at any time.\"\r\n','Save 10% when you book your party with us. Simply quote your unique voucher code when you contact us to claim your 10% party discount.\r\n'),
('WIFI sign in 1 + 1 Day\r\n','All branded bars\r\n','Free Sourz shot with your next round in $dynamic1$\r\n','Free Sourz shot with your next round\r\n','\"##Hi $forename$,##\n##Good to see you again. Hope you had a great night!##\n##Next time you’re in, have a free shot of SOURZ on us, when you buy your next round.##\"\r\n','Free shot of SOURZ\r\n','Dynamic - 14 days after date of send\r\n','\"##Come in and party again soon.##\n##Enjoy!##\n##The $dynamic1$ team.##\"\r\n','\"Only one voucher per customer. Over 18\'s only. Offer not available in Scotland. Offer must be redeemed within 14 days of receipt.\nOffer is subject to availability, there is no cash alternative, and Management reserves the right to remove this offer at any time.\"\r\n','Simply present your voucher on your phone, or quote your unique promo code, to claim your free Sourz with your next round.\r\n'),
('WIFI sign in 2 + 7 Days\r\n','All branded bars\r\n','Have you claimed your free Sourz shot @ $dynamic1$ yet?\r\n','Claimed your free Sourz yet?\r\n','\"##Hi $forename$,##\n##Don\'t forget - you\'ve got just seven nights left to claim you free Sourz shot with your next round.##\n##Having a party? Find out how we can make it your best ever. Look out for more great offers coming your way!##\"\r\n',NULL,NULL,'\"##Come in and party again soon.##\n##Enjoy!##\n##The $dynamic1$ team.##\"\r\n','\"Only one voucher per customer. Over 18\'s only. Offer not available in Scotland. Offer must be redeemed within 7 days of receipt.\nOffer is subject to availability, there is no cash alternative, and Management reserves the right to remove this offer at any time.\"\r\n','Simply present your voucher on your phone, or quote your unique promo code, to claim your free Sourz with your next round.\r\n'),
('WIFI sign in 3 + 21 Days\r\n','All branded bars\r\n','Your best ever party for less @ $dynamic1$\r\n','There\'s no party like a $dynamic2$ party\r\n','\"##Hi $forename$,##\n##Planning a party? There\'s no party like a $dynamic2$ party. And here\'s our latest deal for you!##\n##Save 10% when you book your party with us*.##\"\r\n','Save 10% when you book your party with us.\r\n','Dynamic - 3 months from date of send\r\n','\"##Call us, or pop in and see us, to find out how we can make it the perfect party for you.##\n##Or click here to book one of our great value packages.##\n##Your best ever party for less!##\n##The $dynamic1$ team.##\"\r\n','\"Over 18\'s only. Minimum spend £100. Offer not available in Scotland. Offer must be redeemed within 3 months of receipt.\nOffer is subject to availability. Management reserves the right to remove this offer at any time.\"\r\n',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;