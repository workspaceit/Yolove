-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2015 at 09:57 PM
-- Server version: 5.5.41-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `admin_yolove_my`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `to_user_id` int(11) DEFAULT '0',
  `act_code` varchar(50) NOT NULL DEFAULT '',
  `act_title` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `is_read` tinyint(4) DEFAULT '0',
  `rel_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `user_id`, `to_user_id`, `act_code`, `act_title`, `create_time`, `is_read`, `rel_id`) VALUES
(1, 10, 10, 'postcomment', 'Fancyqube Jewelry Womens Crystal Angel Tears Drop Water Pendant Necklace Light Blue ', 1436169582, 0, 19),
(2, 10, 10, 'postcomment', 'Fancyqube Jewelry Womens Crystal Angel Tears Drop Water Pendant Necklace Light Blue ', 1436169657, 0, 19),
(3, 10, 10, 'postcomment', 'Sora Twisted bodice with cut out waist', 1436169720, 0, 13),
(4, 20, 10, 'addlike', 'Pleated Skirt', 1436330516, 0, 1),
(5, 20, 10, 'addlike', 'New Romantic Patched Dress', 1436330521, 0, 6),
(6, 20, 10, 'addlike', 'mc889 Dorothy Cut in halter 1 piece dress', 1436330851, 0, 2),
(7, 20, 10, 'addlike', 'Designer Inspired Checks Dress', 1436330862, 0, 3),
(8, 20, 10, 'addlike', 'Zelias Peplum Top In Navy', 1436330876, 0, 5),
(9, 20, 10, 'postcomment', 'Zelias Peplum Top In Navy', 1436330905, 0, 5),
(10, 20, 10, 'postcomment', 'Zelias Peplum Top In Navy', 1436330955, 0, 5),
(11, 6, 10, 'postcomment', 'Azalea Origami Skorts', 1436779701, 0, 20),
(12, 6, 10, 'postcomment', 'Azalea Origami Skorts', 1436779709, 0, 20),
(13, 6, 10, 'postcomment', 'Azalea Origami Skorts', 1436779754, 0, 20),
(14, 6, 10, 'postcomment', 'Azalea Origami Skorts', 1436779769, 0, 20),
(15, 152, 10, 'addlike', ' Elsa Textured Shorts', 1437543233, 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT '0',
  `album_title` varchar(255) NOT NULL,
  `album_desc` text,
  `create_time` int(10) NOT NULL,
  `update_time` int(10) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `album_cover` text,
  `total_share` int(11) DEFAULT '0',
  `total_like` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `category_id`, `album_title`, `album_desc`, `create_time`, `update_time`, `user_id`, `album_cover`, `total_share`, `total_like`) VALUES
(1, 20, 'Skirts', '', 1436157103, 1436157116, 10, NULL, 1, 0),
(2, 17, 'Dress', '', 1436157252, 1436159805, 10, NULL, 7, 0),
(3, 15, 'Tops', '', 1436157569, 1436160213, 10, NULL, 4, 0),
(4, 24, 'Shorts', '', 1436157922, 1436157932, 10, NULL, 1, 0),
(5, 21, 'Jackets', '', 1436158008, 1436158097, 10, NULL, 1, 0),
(6, 30, 'Concealer', '', 1436158263, 1436158282, 10, NULL, 1, 0),
(7, 15, 'Blouse', '', 1436159905, 1436159919, 10, NULL, 1, 0),
(8, 30, 'Lips', '', 1436160024, 1436160031, 10, NULL, 1, 0),
(9, 15, 'Pullover', '', 1436160120, 1436160138, 10, NULL, 1, 0),
(10, 18, 'Necklace', '', 1436160310, 1436160324, 10, NULL, 1, 0),
(11, 24, 'Skort', '', 1436160457, 1436160472, 10, NULL, 1, 0),
(12, 15, 'Tops', '', 1436331303, 1436331317, 20, NULL, 1, 0),
(13, 17, 'Dress', '', 1436331621, 1436331621, 20, NULL, 0, 0),
(14, 25, 'Jaylisa Romper', '', 1436331782, 1436331782, 20, NULL, 0, 0),
(15, 17, 'new clothes lov''in it', '', 1436764231, 1436764231, 6, NULL, 0, 0),
(16, 17, 'lovin it', '', 1436764257, 1436764257, 6, NULL, 0, 0),
(17, 17, 'Dresses', '', 1436782403, 1437540532, 152, NULL, 8, 0),
(18, 24, 'Skort', '', 1437031778, 1437031871, 152, NULL, 1, 0),
(19, 5, 'Summer Collection', '', 1437041241, 1437041405, 99, NULL, 1, 0),
(20, 15, 'Blouses', '', 1437369215, 1437369242, 152, NULL, 1, 0),
(21, 15, 'Tops', '', 1437451848, 1437540472, 152, NULL, 2, 0),
(22, 19, 'Bags', '', 1437538230, 1437538258, 152, NULL, 1, 0),
(23, 5, 'Wish List', NULL, 1437818636, 1437818636, 360, NULL, 0, 0),
(24, 5, 'Wish List', NULL, 1437819540, 1437819540, 166, NULL, 0, 0),
(25, 5, 'Wish List', NULL, 1437994037, 1437994037, 167, NULL, 0, 0),
(26, 5, 'Wish List', NULL, 1438000791, 1438000791, 168, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) unsigned NOT NULL DEFAULT '0',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `fileext` varchar(50) NOT NULL DEFAULT '',
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `attachment` varchar(255) NOT NULL DEFAULT '',
  `remote` varchar(255) NOT NULL DEFAULT '',
  `source` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL,
  `readperm` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `isimage` tinyint(1) NOT NULL DEFAULT '0',
  `width` smallint(6) unsigned NOT NULL DEFAULT '0',
  `height` smallint(6) unsigned NOT NULL DEFAULT '0',
  `thumb` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `downloads` mediumint(8) NOT NULL DEFAULT '0',
  `cloud` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_item_id` (`item_id`),
  KEY `idx_user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`id`, `item_id`, `user_id`, `create_time`, `filename`, `fileext`, `filesize`, `attachment`, `remote`, `source`, `description`, `readperm`, `isimage`, `width`, `height`, `thumb`, `downloads`, `cloud`) VALUES
(1, 1, 10, 1436157116, '10_559a04bbece50.jpg', 'jpg', 32818, 'uploads/attachments/products/large/10_559a04bbece50.jpg', 'https://tr.styles.my/?type=deeplink&id=17135&media=251', 'tr.styles.my', '', 0, 1, 400, 600, 0, 0, ''),
(2, 2, 10, 1436157259, '10_559a054b1475f.jpg', 'jpg', 38621, 'uploads/attachments/products/large/10_559a054b1475f.jpg', 'https://tr.styles.my/?type=deeplink&id=17136&media=251', 'tr.styles.my', '', 0, 1, 400, 666, 0, 0, ''),
(3, 3, 10, 1436157388, '10_559a05cc1a8c0.jpg', 'jpg', 14798, 'uploads/attachments/products/large/10_559a05cc1a8c0.jpg', 'https://tr.styles.my/?type=deeplink&id=17137&media=251', 'tr.styles.my', '', 0, 1, 371, 514, 0, 0, ''),
(4, 4, 10, 1436157511, '10_559a064701786.jpg', 'jpg', 7986, 'uploads/attachments/products/large/10_559a064701786.jpg', 'https://tr.styles.my/?type=deeplink&id=17138&media=251', 'tr.styles.my', '', 0, 1, 340, 510, 0, 0, ''),
(5, 5, 10, 1436157579, '10_559a068ad3893.jpg', 'jpg', 35601, 'uploads/attachments/products/large/10_559a068ad3893.jpg', 'http://www.anylove.my/index.php?route=product/product&product_id=326&sg_type_pg=latest&sort=p.sort_order&order=ASC&sg_type_pg=latest', 'www.anylove.my', '', 0, 1, 300, 430, 0, 0, ''),
(6, 6, 10, 1436157710, '10_559a070e25c70.jpg', 'jpg', 99629, 'uploads/attachments/products/large/10_559a070e25c70.jpg', 'http://coccha.com/product/new-romantic-patched-dress/', 'coccha.com', '', 0, 1, 482, 726, 0, 0, ''),
(7, 7, 10, 1436157831, '10_559a0787833b9.jpg', 'jpg', 79710, 'uploads/attachments/products/large/10_559a0787833b9.jpg', 'https://tr.styles.my/?type=deeplink&id=17139&media=251', 'tr.styles.my', '', 0, 1, 598, 817, 0, 0, ''),
(8, 8, 10, 1436157932, '10_559a07ebec85e.jpg', 'jpg', 29527, 'uploads/attachments/products/large/10_559a07ebec85e.jpg', 'https://tr.styles.my/?type=deeplink&id=17140&media=251', 'tr.styles.my', '', 0, 1, 400, 600, 0, 0, ''),
(9, 9, 10, 1436158097, '10_559a0891bea82.jpg', 'jpg', 27080, 'uploads/attachments/products/large/10_559a0891bea82.jpg', 'https://tr.styles.my/?type=deeplink&id=17141&media=251', 'tr.styles.my', '', 0, 1, 300, 575, 0, 0, ''),
(10, 10, 10, 1436158166, '10_559a08d65b72c.jpg', 'jpg', 92525, 'uploads/attachments/products/large/10_559a08d65b72c.jpg', 'http://coccha.com/product/nomad-femme-coloured-stitches-shift-dress/', 'coccha.com', '', 0, 1, 482, 726, 0, 0, ''),
(11, 11, 10, 1436158282, '10_559a094a70b4b.jpg', 'jpg', 9334, 'uploads/attachments/products/large/10_559a094a70b4b.jpg', 'https://tr.styles.my/?type=deeplink&id=17143&media=251', 'tr.styles.my', '', 0, 1, 371, 514, 0, 0, ''),
(12, 12, 10, 1436159686, '10_559a0ec656f8e.jpg', 'jpg', 116166, 'uploads/attachments/products/large/10_559a0ec656f8e.jpg', 'https://tr.styles.my/?type=deeplink&id=17144&media=251', 'tr.styles.my', '', 0, 1, 340, 510, 0, 0, ''),
(13, 13, 10, 1436159805, '10_559a0f3d8c75b.jpg', 'jpg', 31207, 'uploads/attachments/products/large/10_559a0f3d8c75b.jpg', 'https://tr.styles.my/?type=deeplink&id=17145&media=251', 'tr.styles.my', '', 0, 1, 400, 666, 0, 0, ''),
(14, 14, 10, 1436159919, '10_559a0faf7f1cb.jpg', 'jpg', 27759, 'uploads/attachments/products/large/10_559a0faf7f1cb.jpg', 'https://tr.styles.my/?type=deeplink&id=17146&media=251', 'tr.styles.my', '', 0, 1, 598, 817, 0, 0, ''),
(15, 15, 10, 1436160031, '10_559a101f67b1e.jpg', 'jpg', 9904, 'uploads/attachments/products/large/10_559a101f67b1e.jpg', 'https://tr.styles.my/?type=deeplink&id=17147&media=251', 'tr.styles.my', '', 0, 1, 371, 514, 0, 0, ''),
(16, 16, 10, 1436160074, '10_559a1049bee70.jpg', 'jpg', 53718, 'uploads/attachments/products/large/10_559a1049bee70.jpg', 'http://www.anylove.my/index.php?route=product/product&product_id=328&sg_type_pg=latest&sort=p.sort_order&order=ASC&sg_type_pg=latest', 'www.anylove.my', '', 0, 1, 300, 430, 0, 0, ''),
(17, 17, 10, 1436160138, '10_559a1089e4364.jpg', 'jpg', 105529, 'uploads/attachments/products/large/10_559a1089e4364.jpg', 'http://coccha.com/product/nomad-femme-asymmetrical-pullover/', 'coccha.com', '', 0, 1, 482, 726, 0, 0, ''),
(18, 18, 10, 1436160213, '10_559a10d00a28d.jpg', 'jpg', 33999, 'uploads/attachments/products/large/10_559a10d00a28d.jpg', 'https://tr.styles.my/?type=deeplink&id=17148&media=251', 'tr.styles.my', '', 0, 1, 400, 600, 0, 0, ''),
(19, 19, 10, 1436160324, '10_559a114449346.jpg', 'jpg', 17800, 'uploads/attachments/products/large/10_559a114449346.jpg', 'https://tr.styles.my/?type=deeplink&id=17150&media=251', 'tr.styles.my', '', 0, 1, 340, 510, 0, 0, ''),
(20, 20, 10, 1436160472, '10_559a11d764139.jpg', 'jpg', 36779, 'uploads/attachments/products/large/10_559a11d764139.jpg', 'https://tr.styles.my/?type=deeplink&id=17151&media=251', 'tr.styles.my', '', 0, 1, 400, 598, 0, 0, ''),
(21, 21, 20, 1436331317, '20_559cad34cbb97.jpg', 'jpg', 11220, 'uploads/attachments/products/large/20_559cad34cbb97.jpg', 'https://tr.styles.my/?type=deeplink&id=17328&media=251', 'tr.styles.my', '', 0, 1, 340, 510, 0, 0, ''),
(22, 22, 152, 1436782443, '152_55a38f6a8ac9b.jpg', 'jpg', 35324, 'uploads/attachments/products/large/152_55a38f6a8ac9b.jpg', 'https://tr.styles.my/?type=deeplink&id=17763&media=251', 'tr.styles.my', '', 0, 1, 340, 510, 0, 0, ''),
(23, 23, 152, 1437024881, '152_55a7426fad6b6.jpg', 'jpg', 12422, 'uploads/attachments/products/large/152_55a7426fad6b6.jpg', 'https://tr.styles.my/?type=deeplink&id=18049&media=251', 'tr.styles.my', '', 0, 1, 340, 510, 0, 0, ''),
(26, 26, 152, 1437025241, '152_55a743d9220b1.jpg', 'jpg', 9730, 'uploads/attachments/products/large/152_55a743d9220b1.jpg', 'https://tr.styles.my/?type=deeplink&id=18050&media=251', 'tr.styles.my', '', 0, 1, 340, 510, 0, 0, ''),
(25, 25, 152, 1437025086, '152_55a7433dc0eb1.jpg', 'jpg', 11334, 'uploads/attachments/products/large/152_55a7433dc0eb1.jpg', 'https://tr.styles.my/?type=deeplink&id=18051&media=251', 'tr.styles.my', '', 0, 1, 340, 510, 0, 0, ''),
(27, 27, 152, 1437025301, '152_55a74414bd17d.jpg', 'jpg', 14138, 'uploads/attachments/products/large/152_55a74414bd17d.jpg', 'https://tr.styles.my/?type=deeplink&id=18052&media=251', 'tr.styles.my', '', 0, 1, 340, 510, 0, 0, ''),
(29, 29, 152, 1437031871, '152_55a75dbf2d498.jpg', 'jpg', 45988, 'uploads/attachments/products/large/152_55a75dbf2d498.jpg', 'http://www.anylove.my/index.php?route=product/product&product_id=343&sg_type_pg=latest&sort=p.sort_order&order=ASC&sg_type_pg=latest', 'www.anylove.my', '', 0, 1, 300, 430, 0, 0, ''),
(30, 30, 99, 1437041405, '99_55a782fca5f47.jpg', 'jpg', 29492, 'uploads/attachments/products/large/99_55a782fca5f47.jpg', 'http://keimag.com.my/best-seller/frinde-lace-romper-navy', 'keimag.com.my', '', 0, 1, 400, 600, 0, 0, ''),
(31, 31, 152, 1437369242, '152_55ac8399b607d.jpg', 'jpg', 40619, 'uploads/attachments/products/large/152_55ac8399b607d.jpg', 'http://www.anylove.my/index.php?route=product/product&product_id=327&sg_type_pg=latest&sort=p.sort_order&order=ASC&sg_type_pg=latest', 'www.anylove.my', '', 0, 1, 300, 430, 0, 0, ''),
(32, 32, 152, 1437372646, '152_55ac90e605ef9.jpg', 'jpg', 29279, 'uploads/attachments/products/large/152_55ac90e605ef9.jpg', 'http://emceecouture.com/shop/mc890-abigail/', 'emceecouture.com', '', 0, 1, 400, 666, 0, 0, ''),
(34, 34, 152, 1437374505, '152_55ac9828681dd.jpg', 'jpg', 33545, 'uploads/attachments/products/large/152_55ac9828681dd.jpg', 'http://www.anylove.my/index.php?route=product/product&product_id=331&sg_type_pg=latest&sort=p.sort_order&order=ASC&sg_type_pg=latest', 'www.anylove.my', '', 0, 1, 300, 430, 0, 0, ''),
(35, 35, 152, 1437451889, '152_55adc66fb6f89.jpg', 'jpg', 23656, 'uploads/attachments/products/large/152_55adc66fb6f89.jpg', 'https://tr.styles.my/?type=deeplink&id=18225&media=251', 'tr.styles.my', '', 0, 1, 340, 510, 0, 0, ''),
(36, 36, 152, 1437460363, '152_55ade78ab81dc.jpg', 'jpg', 168187, 'uploads/attachments/products/large/152_55ade78ab81dc.jpg', 'https://tr.styles.my/?type=deeplink&id=18237&media=251', 'tr.styles.my', '', 0, 1, 340, 510, 0, 0, ''),
(37, 37, 152, 1437538258, '152_55af17d14b9bc.jpg', 'jpg', 11145, 'uploads/attachments/products/large/152_55af17d14b9bc.jpg', 'https://tr.styles.my/?type=deeplink&id=18288&media=251', 'tr.styles.my', '', 0, 1, 340, 510, 0, 0, ''),
(40, 40, 152, 1437540532, '152_55af20b3d9091.jpg', 'jpg', 150338, 'uploads/attachments/products/large/152_55af20b3d9091.jpg', 'http://keimag.com.my/new-in/maquelle-dress', 'keimag.com.my', '', 0, 1, 800, 1200, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name_cn` varchar(80) NOT NULL,
  `category_name_en` varchar(80) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `parent_name` varchar(80) DEFAULT NULL,
  `is_system` tinyint(4) NOT NULL DEFAULT '0',
  `is_open` tinyint(4) DEFAULT '1',
  `is_home` tinyint(1) DEFAULT '1',
  `description` text,
  `category_hot_words` varchar(255) DEFAULT NULL,
  `category_home_shares` varchar(255) DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT '100',
  `total_share` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_category_name_en` (`category_name_en`),
  KEY `idx_display_order` (`display_order`),
  KEY `idx_parent_id` (`parent_id`),
  KEY `idx_is_system` (`is_system`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name_cn`, `category_name_en`, `parent_id`, `parent_name`, `is_system`, `is_open`, `is_home`, `description`, `category_hot_words`, `category_home_shares`, `display_order`, `total_share`) VALUES
(5, 'Clothing', 'apparel', 0, '0', 1, 0, 0, '0', '0', '', 112, 61),
(19, 'Bags', 'handbags', 0, '0', 0, 1, 1, '0', 'Backpacks,Handbags,Messenger Bags,Wallets', 'a:7:{s:5:"style";s:6:"home_3";s:2:"s1";s:4:"3792";s:2:"s3";s:4:"4777";s:2:"s4";s:4:"4782";s:2:"s2";s:4:"3806";s:2:"s5";s:4:"4132";s:2:"s6";s:4:"4780";}', 120, 1125),
(15, 'Tops', 'top', 0, 'Please select', 0, 1, 1, '0', 'Blouses,Cardigans,Sweaters,Sweatshirts & Hoodies,Tanks,T-Shirts,Tunics', 'a:7:{s:5:"style";s:6:"home_2";s:2:"s1";s:4:"2835";s:2:"s2";s:4:"3819";s:2:"s3";s:4:"2852";s:2:"s4";s:4:"2829";s:2:"s5";s:3:"674";s:2:"s6";s:3:"675";}', 124, 6015),
(17, 'Dresses', 'dresses', 0, 'Please select', 0, 1, 1, '0', 'Day, Cocktail,Gowns', 'a:6:{s:5:"style";s:6:"home_2";s:2:"s1";s:4:"4868";s:2:"s2";s:4:"3788";s:2:"s3";s:4:"4307";s:2:"s4";s:4:"3790";s:2:"s5";s:3:"184";}', 122, 5897),
(18, 'Accessories', 'accessories', 0, '0', 0, 1, 1, '0', 'Belts,Eyewear,Gloves,Hair Accessories,Hats,Scarves,Tech,Umbrellas', 'a:8:{s:5:"style";s:5:"false";s:2:"s1";s:4:"4300";s:2:"s5";s:4:"3432";s:2:"s2";s:4:"3801";s:2:"s4";s:4:"4981";s:2:"s6";s:4:"4855";s:2:"s7";s:4:"3528";s:2:"s3";s:4:"4131";}', 121, 2337),
(21, 'Outerwear', 'outerwear', 0, 'Please select', 0, 1, 1, '0', 'Coats,Jackets,Vests', 'a:7:{s:5:"style";s:6:"home_2";s:2:"s1";s:4:"2241";s:2:"s2";s:4:"2239";s:2:"s3";s:4:"2240";s:2:"s4";s:4:"2405";s:2:"s5";s:3:"580";s:2:"s6";s:4:"2356";}', 0, 702),
(20, 'Skirts', 'skirts', 0, 'Please select', 0, 1, 0, '0', 'Mini,Knee Length,Long', 'a:2:{s:5:"style";s:5:"false";s:2:"s1";s:3:"206";}', 0, 931),
(22, 'Jeans', 'jeans', 0, 'Please select', 0, 1, 0, '0', 'Bootcut,Boyfriend,Flared,Skinny,Straight Leg,Wide Leg', NULL, 0, 1011),
(23, 'Pants', 'pants', 0, 'Please select', 0, 1, 0, '0', 'Capri & Cropped,Leggings', NULL, 0, 674),
(24, 'Shorts', 'shorts', 0, 'Please select', 0, 1, 0, '0', 'Shorts', NULL, 0, 674),
(25, 'Jumpsuits & Rompers', 'jumpsuits_and_rompers', 0, 'Please select', 0, 1, 0, '0', 'Jumpsuits,Rompers', NULL, 0, 1138),
(26, 'Intimates', 'intimates', 0, 'Please select', 0, 1, 0, '0', 'Bras,Camisoles,Chemises,Hosiery,Sleepwear,Panties & Thongs,Robes', NULL, 0, 266),
(27, 'Swimwear', 'swimwear', 0, 'Please select', 0, 1, 0, '0', 'Bikinis,One Piece,Cover-Ups', NULL, 0, 598),
(28, 'Activewear', 'activewear', 0, 'Please select', 0, 1, 0, '0', 'Jackets,Pants,Shorts,Skirts,Sports Bras,Tank Tops,Tops', 'a:3:{s:5:"style";s:5:"false";s:2:"s2";s:3:"544";s:2:"s3";s:3:"538";}', 0, 151),
(30, 'Cosmetics', 'cosmetics', 0, NULL, 0, 1, 0, NULL, 'Lipstick,Cream & Nailpolish', NULL, 132, 5);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `share_id` int(11) NOT NULL,
  `comment_txt` text,
  `search_en` text,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_comment_id` (`id`),
  KEY `idx_share_id` (`share_id`),
  KEY `idx_user_id` (`user_id`),
  FULLTEXT KEY `idx_comment_search` (`search_en`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `share_id`, `comment_txt`, `search_en`, `create_time`) VALUES
(2, 10, 19, '@ckhaimun#necklace ', 'a:1:{i:0;i:6;}', 1436169657),
(3, 10, 13, '@ckhaimun#dress #elegant  ', 'a:1:{i:0;i:6;}', 1436169720),
(5, 20, 5, '@ckhaimun@ck.cheng #tops ', 'a:1:{i:0;i:6;}', 1436330955),
(6, 6, 20, 'this is a nice dress from the veronica', '', 1436779701),
(7, 6, 20, 'www.test.com', '', 1436779709),
(8, 6, 20, '@Veronicawhat do you think about this dress? ', 'a:1:{i:0;i:10;}', 1436779754),
(9, 6, 20, '#bluedress', '', 1436779769);

-- --------------------------------------------------------

--
-- Table structure for table `connector`
--

CREATE TABLE IF NOT EXISTS `connector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `social_userid` varchar(100) NOT NULL,
  `vendor` varchar(40) NOT NULL,
  `vendor_info` text,
  `name` varchar(80) DEFAULT NULL,
  `username` varchar(80) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `homepage` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `location` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `connector`
--

INSERT INTO `connector` (`id`, `user_id`, `social_userid`, `vendor`, `vendor_info`, `name`, `username`, `description`, `homepage`, `avatar`, `email`, `gender`, `location`) VALUES
(5, 97, '1439778806285606', 'facebook', 'b:1;', 'Dev Workspace', 'Dev Workspace', NULL, 'https://www.facebook.com/app_scoped_user_id/1439778806285606/', 'https://graph.facebook.com/1439778806285606/picture?type=large', 'workspaceinfotech@gmail.com', 'male', ''),
(37, 154, '853082908119170', 'facebook', NULL, 'Shuvo Bhuiyan', 'Shuvo.Bhuiyan', NULL, 'https://www.facebook.com/app_scoped_user_id/853082908119170/', 'https://graph.facebook.com/853082908119170/picture?width=150&height=150', 'xmenfc@hotmail.com', 'male', NULL),
(7, 6, '988036999111', 'facebook', 'b:1;', 'Khaimun Chan', 'Khaimun Chan', NULL, 'https://www.facebook.com/app_scoped_user_id/988036999111/', 'https://graph.facebook.com/988036999111/picture?type=large', 'ckhaimun@hotmail.com', 'male', ''),
(8, 102, '154197975', 'twitter', 'a:4:{s:11:"oauth_token";s:50:"154197975-Ixf0fhZCrreiNBslfFFSfHzpD0ZXtvIC6ZEHEZg2";s:18:"oauth_token_secret";s:42:"V7yMygkV4CGLjAMlBYFARcvVKVJslGuHQq83Gy3bNM";s:7:"user_id";s:9:"154197975";s:11:"screen_name";s:8:"ckhaimun";}', 'Khaimun Chan', 'ckhaimun', '', NULL, 'http://abs.twimg.com/sticky/default_profile_images/default_profile_1_normal.png', NULL, 'none', ''),
(19, 18, '754499044638969', 'facebook', 'b:1;', 'Wendy Yap', 'Wendy Yap', NULL, 'https://www.facebook.com/app_scoped_user_id/754499044638969/', 'https://graph.facebook.com/754499044638969/picture?type=large', 'pandayapps@gmail.com', 'none', ''),
(10, 104, '282214085313205', 'facebook', 'b:1;', '徐筱敏', '徐筱敏', NULL, 'https://www.facebook.com/app_scoped_user_id/282214085313205/', 'https://graph.facebook.com/282214085313205/picture?type=large', 'symantha@pinkals.com', 'none', ''),
(11, 105, '2803079292', 'twitter', 'a:4:{s:11:"oauth_token";s:50:"2803079292-w6uwaksHxHXKFPpAcx7qYf6r2mNu81nsRCHhHQB";s:18:"oauth_token_secret";s:45:"5LFRSA0nHXVSLhVzpiPSzvA1n1Kz2WM6USbyGYkGG9yzx";s:7:"user_id";s:10:"2803079292";s:11:"screen_name";s:10:"AiubMahedi";}', 'Zahedul Alam', 'AiubMahedi', '', NULL, 'http://pbs.twimg.com/profile_images/509944920367312896/utEtgAOV.jpeg', NULL, 'none', ''),
(20, 117, '10205816567800370', 'facebook', 'b:1;', 'Meiching Loh', 'Meiching Loh', NULL, 'https://www.facebook.com/app_scoped_user_id/10205816567800370/', 'https://graph.facebook.com/10205816567800370/picture?type=large', 'beekim5192@gmail.com', 'none', ''),
(21, 120, '978209165527134', 'facebook', 'b:1;', 'Sangeithz D Shutz', 'Sangeithz D Shutz', NULL, 'https://www.facebook.com/app_scoped_user_id/978209165527134/', 'https://graph.facebook.com/978209165527134/picture?type=large', 'sangeetha.9292@yahoo.com.my', 'none', ''),
(13, 107, '2803177070', 'twitter', 'a:4:{s:11:"oauth_token";s:50:"2803177070-MyJgTvjpinpQkUcw317o4DT34m638sk5u2AoD8s";s:18:"oauth_token_secret";s:45:"WO29hdH4GhufA3MGsf9CUT52iyV2Obow3vd4qVy4o5lfI";s:7:"user_id";s:10:"2803177070";s:11:"screen_name";s:7:"aiub807";}', 'Mahedi hasan', 'aiub807', '', NULL, 'http://pbs.twimg.com/profile_images/509957396328747008/ACVa3pcz.jpeg', NULL, 'none', ''),
(14, 108, '10152458629967869', 'facebook', 'b:1;', 'Jieqiang Tan', 'Jieqiang Tan', NULL, 'https://www.facebook.com/app_scoped_user_id/10152458629967869/', 'https://graph.facebook.com/10152458629967869/picture?type=large', 'tanjq87@yahoo.com', 'male', ''),
(15, 109, '365126153643504', 'facebook', 'b:1;', 'Joon Mun', 'Joon Mun', NULL, 'https://www.facebook.com/app_scoped_user_id/365126153643504/', 'https://graph.facebook.com/365126153643504/picture?type=large', 'jnkmfx@gmail.com', 'male', ''),
(16, 112, '764377343633360', 'facebook', 'b:1;', 'Izzati Athirah Fauzi', 'Izzati Athirah Fauzi', NULL, 'https://www.facebook.com/app_scoped_user_id/764377343633360/', 'https://graph.facebook.com/764377343633360/picture?type=large', 'izzati.athirah23@gmail.com', 'none', ''),
(17, 113, '10152380426812587', 'facebook', 'b:1;', 'Renne Siow', 'Renne Siow', NULL, 'https://www.facebook.com/app_scoped_user_id/10152380426812587/', 'https://graph.facebook.com/10152380426812587/picture?type=large', 'renne_siow@hotmail.com', 'none', ''),
(22, 125, '10152998650004861', 'facebook', 'b:1;', 'Larry Velasquez', 'Larry Velasquez', NULL, 'https://www.facebook.com/app_scoped_user_id/10152998650004861/', 'https://graph.facebook.com/10152998650004861/picture?type=large', 'larrygrinch100@hotmail.com', 'male', ''),
(23, 126, '10152918142286620', 'facebook', 'b:1;', 'Eleen Yong', 'Eleen Yong', NULL, 'https://www.facebook.com/app_scoped_user_id/10152918142286620/', 'https://graph.facebook.com/10152918142286620/picture?type=large', 'eleenyong10@gmail.com', 'none', ''),
(24, 129, '10205856582437782', 'facebook', 'b:1;', 'S''heauen Teoh', 'S''heauen Teoh', NULL, 'https://www.facebook.com/app_scoped_user_id/10205856582437782/', 'https://graph.facebook.com/10205856582437782/picture?type=large', 'sheauen06@hotmail.com', 'none', ''),
(25, 131, '895576150476395', 'facebook', 'b:1;', 'Wei Zhi', 'Wei Zhi', NULL, 'https://www.facebook.com/app_scoped_user_id/895576150476395/', 'https://graph.facebook.com/895576150476395/picture?type=large', 'weizhiyeong@gmail.com', 'none', ''),
(26, 132, '10205906152996841', 'facebook', 'b:1;', 'Lindy Tan', 'Lindy Tan', NULL, 'https://www.facebook.com/app_scoped_user_id/10205906152996841/', 'https://graph.facebook.com/10205906152996841/picture?type=large', 'sweelin63@yahoo.com', 'none', ''),
(27, 133, '1023958384284690', 'facebook', 'b:1;', 'Dee Fir', 'Dee Fir', NULL, 'https://www.facebook.com/app_scoped_user_id/1023958384284690/', 'https://graph.facebook.com/1023958384284690/picture?type=large', 'dewirose.fir@gmail.com', 'none', ''),
(28, 137, '10205995995325065', 'facebook', 'b:1;', 'Joanna Yap', 'Joanna Yap', NULL, 'https://www.facebook.com/app_scoped_user_id/10205995995325065/', 'https://graph.facebook.com/10205995995325065/picture?type=large', 'joannayap_1995@hotmail.com', 'none', ''),
(29, 138, '10152996139690139', 'facebook', 'b:1;', 'Rachel Nirmala Sivapragasam', 'Rachel Nirmala Sivapragasam', NULL, 'https://www.facebook.com/app_scoped_user_id/10152996139690139/', 'https://graph.facebook.com/10152996139690139/picture?type=large', 'trinazact@yahoo.com', 'none', ''),
(30, 139, '10202258301658162', 'facebook', 'b:1;', 'Elys ChOng', 'Elys ChOng', NULL, 'https://www.facebook.com/app_scoped_user_id/10202258301658162/', 'https://graph.facebook.com/10202258301658162/picture?type=large', 'elys_chong@hotmail.com', 'none', ''),
(31, 140, '614331491', 'twitter', 'a:4:{s:11:"oauth_token";s:50:"614331491-xTYxH6fUiDIgMiEvPWKQDhQIyJ3jn4IOgLIyhtzn";s:18:"oauth_token_secret";s:45:"jBc8zdABK7lDF6pJqWd4NuHe1TYrLljuz9mcdKpw9ZMHc";s:7:"user_id";s:9:"614331491";s:11:"screen_name";s:9:"SiewyeeNg";}', 'SY♥BB', 'SiewyeeNg', 'V.I.P', NULL, 'http://pbs.twimg.com/profile_images/378800000388476925/0c716d7556c19726aa06a0621ade105d.jpeg', NULL, 'none', 'Malaysia'),
(32, 142, '10204425248526344', 'facebook', 'b:1;', 'Yeng Ng', 'Yeng Ng', NULL, 'https://www.facebook.com/app_scoped_user_id/10204425248526344/', 'https://graph.facebook.com/10204425248526344/picture?type=large', 'yengyeng1@hotmail.com', 'none', ''),
(33, 143, '931116333567641', 'facebook', 'b:1;', 'Hui Ming', 'Hui Ming', NULL, 'https://www.facebook.com/app_scoped_user_id/931116333567641/', 'https://graph.facebook.com/931116333567641/picture?type=large', 'huiming2199@hotmail.com', 'none', ''),
(34, 147, '519491564857491', 'facebook', 'b:1;', 'Melissa Wong', 'Melissa Wong', NULL, 'https://www.facebook.com/app_scoped_user_id/519491564857491/', 'https://graph.facebook.com/519491564857491/picture?type=large', 'iammelissawong@gmail.com', 'none', ''),
(35, 150, '1563177327274914', 'facebook', 'b:1;', 'Minic Minic', 'Minic Minic', NULL, 'https://www.facebook.com/app_scoped_user_id/1563177327274914/', 'https://graph.facebook.com/1563177327274914/picture?type=large', 'minicstudio@gmail.com', 'none', ''),
(36, 152, '10205393855064009', 'facebook', 'b:1;', 'Ck Cheng', 'Ck Cheng', NULL, 'https://www.facebook.com/app_scoped_user_id/10205393855064009/', 'https://graph.facebook.com/10205393855064009/picture?type=large', 'ccket0055@yahoo.com', 'male', ''),
(38, 155, '1587920058138146', 'facebook', NULL, 'Dev Workspace', 'Dev.Workspace', NULL, 'https://www.facebook.com/app_scoped_user_id/1587920058138146/', 'https://graph.facebook.com/1587920058138146/picture?width=150&height=150', 'workspaceinfotech@gmail.com', 'male', NULL),
(42, 159, '850477348370287', 'facebook', NULL, 'Jam Jussi', 'Jam.Jussi', NULL, 'https://www.facebook.com/app_scoped_user_id/850477348370287/', 'https://graph.facebook.com/850477348370287/picture?width=150&height=150', 'jamilbd11@gmail.com', 'female', NULL),
(40, 157, '880635788674259', 'facebook', NULL, 'Jam Jackson', 'Jam.Jackson', NULL, 'https://www.facebook.com/app_scoped_user_id/880635788674259/', 'https://graph.facebook.com/880635788674259/picture?width=150&height=150', 'jam.jackson.143@gmail.com', 'male', NULL),
(43, 159, '848363398581682', 'facebook', NULL, 'Jam Jussi', 'Jam.Jussi', NULL, 'https://www.facebook.com/app_scoped_user_id/848363398581682/', 'https://graph.facebook.com/848363398581682/picture?width=150&height=150', 'jamilbd11@gmail.com', 'female', NULL),
(44, 152, '10205012277684813', 'facebook', NULL, 'Ck Cheng', 'Ck.Cheng', NULL, 'https://www.facebook.com/app_scoped_user_id/10205012277684813/', 'https://graph.facebook.com/10205012277684813/picture?width=150&height=150', 'ccket0055@yahoo.com', 'male', NULL),
(45, 162, '1897105500', 'twitter', NULL, 'YOLOVE.IT ', 'YOLOVE_IT', NULL, 'http://twitter.com/YOLOVE_IT', 'http://pbs.twimg.com/profile_images/477259539822018561/DwOefSIv_normal.png', '559df53c793b9@yolve.it', NULL, NULL),
(46, 6, '10100212669111531', 'facebook', NULL, 'Khaimun Chan', 'Khaimun.Chan', NULL, 'https://www.facebook.com/app_scoped_user_id/10100212669111531/', 'https://graph.facebook.com/10100212669111531/picture?width=150&height=150', 'ckhaimun@hotmail.com', 'male', NULL),
(47, 104, '344367532431193', 'facebook', NULL, 'Symantha Chai', 'Symantha.Chai', NULL, 'https://www.facebook.com/app_scoped_user_id/344367532431193/', 'https://graph.facebook.com/344367532431193/picture?width=150&height=150', 'symantha@pinkals.com', 'female', NULL),
(48, 18, '869662579789281', 'facebook', NULL, 'Wendy Yap', 'Wendy.Yap', NULL, 'https://www.facebook.com/app_scoped_user_id/869662579789281/', 'https://graph.facebook.com/869662579789281/picture?width=150&height=150', 'pandayapps@gmail.com', 'female', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `above` float NOT NULL,
  `type` varchar(100) NOT NULL,
  `discount` float NOT NULL,
  `free_shipping` tinyint(2) NOT NULL,
  `date_start` int(10) NOT NULL,
  `date_end` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_code` varchar(50) NOT NULL DEFAULT '',
  `event_name` varchar(100) NOT NULL DEFAULT '',
  `cycletype` enum('onetime','everyday','notimelimit') NOT NULL DEFAULT 'everyday',
  `cycletime` int(10) NOT NULL DEFAULT '0',
  `rewardnum` tinyint(2) NOT NULL DEFAULT '1',
  `ext_credits_1` int(10) NOT NULL DEFAULT '0',
  `ext_credits_2` int(10) NOT NULL DEFAULT '0',
  `ext_credits_3` int(10) NOT NULL DEFAULT '0',
  `send_message` tinyint(1) NOT NULL DEFAULT '0',
  `send_tip` tinyint(1) NOT NULL DEFAULT '0',
  `message_tpl` text,
  PRIMARY KEY (`id`),
  KEY `idx_event_id` (`id`),
  KEY `idx_event_code` (`event_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_code`, `event_name`, `cycletype`, `cycletime`, `rewardnum`, `ext_credits_1`, `ext_credits_2`, `ext_credits_3`, `send_message`, `send_tip`, `message_tpl`) VALUES
(1, 'daylogin', 'Login Everyday', 'everyday', 0, 1, 0, 0, 1, 0, 0, NULL),
(2, 'setavatar', 'Upload Avatar', 'onetime', 0, 1, 0, 0, 1, 0, 0, NULL),
(3, 'postshare', 'Post Share', 'everyday', 0, 10, 0, 0, 2, 0, 0, NULL),
(4, 'postvideo', 'Post Video', 'everyday', 0, 10, 0, 0, 3, 0, 0, NULL),
(5, 'postcomment', 'Post Comment', 'everyday', 0, 10, 0, 0, 1, 0, 0, NULL),
(6, 'realemail', 'Active Email', 'onetime', 0, 0, 1, 0, 1, 0, 0, NULL),
(7, 'addlike', 'Add Like to users', 'everyday', 0, 10, 0, 1, 0, 0, 0, NULL),
(8, 'beenlike', 'Your share/album has been liked', 'everyday', 0, 10, 0, 1, 0, 0, 0, NULL),
(9, 'digist', 'Add fine tag to you', 'everyday', 0, 2, 1, 0, 0, 0, 0, NULL),
(10, 'top', 'Made a top', 'everyday', 0, 1, 1, 0, 0, 0, 0, NULL),
(11, 'follow', 'Focus On Friend', 'everyday', 0, 5, 1, 0, 0, 0, 0, NULL),
(12, 'beenfollow', 'Been Focus', 'everyday', 0, 5, 1, 0, 0, 0, 0, NULL),
(13, 'register', 'Register', 'onetime', 0, 1, 10, 10, 10, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

CREATE TABLE IF NOT EXISTS `event_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `total` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cyclenum` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `ext_credits_1` int(10) NOT NULL DEFAULT '0',
  `ext_credits_2` int(10) NOT NULL DEFAULT '0',
  `ext_credits_3` int(10) NOT NULL DEFAULT '0',
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `starttime` int(10) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_is_read` (`is_read`),
  KEY `idx_dateline` (`dateline`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=437 ;

--
-- Dumping data for table `event_log`
--

INSERT INTO `event_log` (`id`, `event_id`, `user_id`, `total`, `cyclenum`, `ext_credits_1`, `ext_credits_2`, `ext_credits_3`, `is_read`, `starttime`, `dateline`) VALUES
(1, 3, 1, 7, 2, 0, 0, 4, 1, 1417495433, 1417498986),
(2, 13, 2, 1, 1, 10, 10, 10, 1, 1373968834, 1373968834),
(3, 3, 2, 8, 2, 0, 0, 4, 1, 1374636212, 1374636403),
(4, 7, 1, 3, 1, 0, 1, 0, 1, 1417524040, 1417524040),
(5, 11, 1, 1, 1, 1, 0, 0, 1, 1374052766, 1374052766),
(6, 12, 2, 1, 1, 1, 0, 0, 1, 1374052766, 1374052766),
(7, 13, 3, 1, 1, 10, 10, 10, 1, 1374221672, 1374221672),
(8, 1, 3, 1, 1, 0, 0, 1, 1, 1374221715, 1374221715),
(9, 13, 4, 1, 1, 10, 10, 10, 1, 1377758570, 1377758570),
(10, 1, 4, 47, 1, 0, 0, 1, 1, 1405325959, 1405325959),
(11, 13, 5, 1, 1, 10, 10, 10, 1, 1377758685, 1377758685),
(12, 13, 6, 1, 1, 10, 10, 10, 1, 1377758697, 1377758697),
(13, 1, 6, 243, 1, 0, 0, 1, 1, 1413102617, 1413102617),
(14, 1, 5, 66, 1, 0, 0, 1, 0, 1413345009, 1413345009),
(15, 2, 4, 1, 1, 0, 0, 1, 1, 1377758783, 1377758783),
(16, 2, 5, 1, 1, 0, 0, 1, 1, 1377758831, 1377758831),
(17, 13, 7, 1, 1, 10, 10, 10, 1, 1377758924, 1377758924),
(18, 11, 4, 2, 2, 2, 0, 0, 1, 1377758990, 1377759022),
(19, 12, 5, 4, 1, 1, 0, 0, 1, 1393923651, 1393923651),
(20, 12, 6, 7, 1, 1, 0, 0, 1, 1393923647, 1393923647),
(21, 11, 5, 5, 3, 3, 0, 0, 1, 1380533026, 1380533053),
(22, 12, 4, 2, 1, 1, 0, 0, 1, 1379914049, 1379914049),
(23, 3, 5, 83, 10, 0, 0, 20, 1, 1402042803, 1402043481),
(24, 7, 4, 1, 1, 0, 1, 0, 1, 1377763198, 1377763198),
(25, 3, 6, 108, 2, 0, 0, 4, 1, 1412930105, 1412930118),
(26, 1, 7, 2, 1, 0, 0, 1, 1, 1379997627, 1379997627),
(27, 2, 6, 1, 1, 0, 0, 1, 1, 1377855613, 1377855613),
(28, 13, 8, 1, 1, 10, 10, 10, 1, 1378200338, 1378200338),
(29, 3, 4, 32, 1, 0, 0, 2, 1, 1400559798, 1400559798),
(30, 7, 6, 49, 1, 0, 1, 0, 1, 1411967770, 1411967770),
(31, 13, 9, 1, 1, 10, 10, 10, 1, 1378723815, 1378723815),
(32, 1, 9, 6, 1, 0, 0, 1, 1, 1379584782, 1379584782),
(33, 3, 9, 20, 5, 0, 0, 10, 1, 1379070874, 1379071334),
(34, 13, 10, 1, 1, 10, 10, 10, 1, 1379063265, 1379063265),
(35, 11, 10, 20, 5, 5, 0, 0, 1, 1413303178, 1413307669),
(36, 7, 10, 122, 4, 0, 4, 0, 1, 1413031265, 1413031280),
(37, 1, 10, 158, 1, 0, 0, 1, 1, 1413290142, 1413290142),
(38, 3, 10, 617, 10, 0, 0, 20, 1, 1413296130, 1413298836),
(39, 5, 5, 2, 2, 0, 0, 2, 1, 1379398887, 1379412463),
(40, 7, 5, 12, 1, 0, 1, 0, 1, 1398311620, 1398311620),
(41, 9, 6, 2, 2, 2, 0, 0, 1, 1379479030, 1379479043),
(42, 13, 11, 1, 1, 10, 10, 10, 1, 1379479197, 1379479197),
(43, 3, 11, 207, 1, 0, 0, 2, 1, 1405671914, 1405671914),
(44, 13, 12, 1, 1, 10, 10, 10, 1, 1379480511, 1379480511),
(45, 13, 13, 1, 1, 10, 10, 10, 1, 1379485744, 1379485744),
(46, 1, 13, 2, 1, 0, 0, 1, 1, 1379747389, 1379747389),
(47, 13, 14, 1, 1, 10, 10, 10, 1, 1379564014, 1379564014),
(48, 2, 14, 1, 1, 0, 0, 1, 1, 1379564176, 1379564176),
(49, 3, 14, 10, 10, 0, 0, 20, 1, 1379564876, 1379566215),
(50, 1, 14, 1, 1, 0, 0, 1, 1, 1379571160, 1379571160),
(51, 13, 15, 1, 1, 10, 10, 10, 1, 1379574053, 1379574053),
(52, 1, 15, 1, 1, 0, 0, 1, 1, 1379574054, 1379574054),
(53, 7, 15, 2, 1, 0, 1, 0, 1, 1380015291, 1380015291),
(54, 3, 15, 2, 2, 0, 0, 4, 1, 1379648120, 1379648225),
(55, 11, 13, 1, 1, 1, 0, 0, 1, 1379747514, 1379747514),
(56, 11, 6, 20, 1, 1, 0, 0, 1, 1400086736, 1400086736),
(57, 12, 1, 1, 1, 1, 0, 0, 1, 1379914040, 1379914040),
(58, 13, 16, 1, 1, 10, 10, 10, 1, 1379934087, 1379934087),
(59, 1, 16, 6, 1, 0, 0, 1, 1, 1381443576, 1381443576),
(60, 3, 16, 30, 10, 0, 0, 20, 1, 1380089757, 1380090458),
(61, 2, 16, 1, 1, 0, 0, 1, 1, 1379934972, 1379934972),
(62, 13, 17, 1, 1, 10, 10, 10, 1, 1379939339, 1379939339),
(63, 3, 17, 25, 10, 0, 0, 20, 1, 1380096146, 1380099082),
(64, 5, 13, 3, 3, 0, 0, 3, 1, 1379996741, 1379996810),
(65, 1, 1, 1, 1, 0, 0, 1, 1, 1379996874, 1379996874),
(66, 5, 1, 5, 1, 0, 0, 1, 1, 1418027742, 1418027742),
(67, 11, 15, 1, 1, 1, 0, 0, 1, 1380005826, 1380005826),
(68, 1, 17, 2, 1, 0, 0, 1, 1, 1380091900, 1380091900),
(69, 2, 17, 1, 1, 0, 0, 1, 1, 1380049827, 1380049827),
(70, 12, 17, 2, 1, 1, 0, 0, 0, 1409150607, 1409150607),
(71, 13, 18, 1, 1, 10, 10, 10, 1, 1380265677, 1380265677),
(72, 3, 18, 326, 10, 0, 0, 20, 1, 1400648429, 1400650212),
(73, 1, 18, 70, 1, 0, 0, 1, 1, 1412241019, 1412241019),
(74, 12, 18, 10, 1, 1, 0, 0, 1, 1401186517, 1401186517),
(75, 13, 19, 1, 1, 10, 10, 10, 1, 1380709430, 1380709430),
(76, 1, 19, 1, 1, 0, 0, 1, 1, 1380709432, 1380709432),
(77, 13, 20, 1, 1, 10, 10, 10, 1, 1382513251, 1382513251),
(78, 3, 20, 728, 10, 0, 0, 20, 1, 1412930526, 1412932597),
(79, 1, 20, 127, 1, 0, 0, 1, 1, 1413015218, 1413015218),
(80, 13, 21, 1, 1, 10, 10, 10, 1, 1382607056, 1382607056),
(81, 1, 21, 4, 1, 0, 0, 1, 1, 1385632915, 1385632915),
(82, 5, 21, 1, 1, 0, 0, 1, 1, 1382607207, 1382607207),
(83, 13, 22, 1, 1, 10, 10, 10, 1, 1382948658, 1382948658),
(84, 3, 22, 1, 1, 0, 0, 2, 1, 1382952293, 1382952293),
(85, 13, 23, 1, 1, 10, 10, 10, 1, 1382954369, 1382954369),
(86, 3, 23, 1, 1, 0, 0, 2, 1, 1382962261, 1382962261),
(87, 11, 18, 3, 1, 1, 0, 0, 1, 1396845592, 1396845592),
(88, 12, 20, 7, 1, 1, 0, 0, 1, 1403375037, 1403375037),
(89, 5, 18, 8, 1, 0, 0, 1, 1, 1397813636, 1397813636),
(90, NULL, 18, 0, 0, 0, 0, 0, 1, 1383904520, 0),
(91, 7, 25, 7, 1, 0, 1, 0, 1, 1391808018, 1391808018),
(92, 1, 25, 17, 1, 0, 0, 1, 1, 1392373127, 1392373127),
(93, 3, 25, 6, 1, 0, 0, 2, 1, 1392218961, 1392218961),
(94, 5, 10, 3, 1, 0, 0, 1, 1, 1404448214, 1404448214),
(95, 2, 10, 1, 1, 0, 0, 1, 1, 1389859652, 1389859652),
(96, 11, 25, 2, 1, 1, 0, 0, 1, 1391810475, 1391810475),
(97, 12, 25, 8, 1, 1, 0, 0, 1, 1392264170, 1392264170),
(98, 12, 10, 8, 1, 1, 0, 0, 1, 1405066099, 1405066099),
(99, 13, 26, 1, 1, 10, 10, 10, 0, 1392474845, 1392474845),
(100, 12, 14, 3, 1, 1, 0, 0, 0, 1409150633, 1409150633),
(101, 7, 20, 96, 1, 0, 1, 0, 1, 1412932381, 1412932381),
(102, 2, 20, 1, 1, 0, 0, 1, 1, 1392614577, 1392614577),
(103, 13, 27, 1, 1, 10, 10, 10, 0, 1393373237, 1393373237),
(104, 2, 18, 1, 1, 0, 0, 1, 1, 1393389850, 1393389850),
(105, 7, 18, 57, 3, 0, 3, 0, 1, 1400054928, 1400054931),
(106, 11, 20, 8, 1, 1, 0, 0, 1, 1412270425, 1412270425),
(107, 5, 20, 7, 2, 0, 0, 2, 1, 1398523422, 1398523439),
(108, 9, 4, 1, 1, 1, 0, 0, 1, 1393843264, 1393843264),
(109, 5, 6, 1, 1, 0, 0, 1, 1, 1394000519, 1394000519),
(110, 13, 30, 1, 1, 10, 10, 10, 1, 1394874542, 1394874542),
(111, 13, 32, 1, 1, 10, 10, 10, 1, 1394879666, 1394879666),
(112, 1, 32, 1, 1, 0, 0, 1, 1, 1394879685, 1394879685),
(113, 1, 12, 1, 1, 0, 0, 1, 0, 1395299716, 1395299716),
(114, 13, 33, 1, 1, 10, 10, 10, 0, 1395330432, 1395330432),
(115, 1, 33, 2, 1, 0, 0, 1, 0, 1395402175, 1395402175),
(116, 13, 34, 1, 1, 10, 10, 10, 0, 1395641956, 1395641956),
(117, 13, 35, 1, 1, 10, 10, 10, 0, 1395642492, 1395642492),
(118, 13, 36, 1, 1, 10, 10, 10, 0, 1395659423, 1395659423),
(119, 13, 37, 1, 1, 10, 10, 10, 0, 1395668825, 1395668825),
(120, 13, 38, 1, 1, 10, 10, 10, 0, 1395669900, 1395669900),
(121, 13, 39, 1, 1, 10, 10, 10, 0, 1395670167, 1395670167),
(122, 13, 40, 1, 1, 10, 10, 10, 0, 1395670911, 1395670911),
(123, 13, 41, 1, 1, 10, 10, 10, 0, 1395676605, 1395676605),
(124, 13, 42, 1, 1, 10, 10, 10, 0, 1395681824, 1395681824),
(125, 13, 43, 1, 1, 10, 10, 10, 0, 1395684499, 1395684499),
(126, 13, 44, 1, 1, 10, 10, 10, 0, 1395686408, 1395686408),
(127, 13, 45, 1, 1, 10, 10, 10, 0, 1395697638, 1395697638),
(128, 13, 46, 1, 1, 10, 10, 10, 0, 1395699629, 1395699629),
(129, 13, 47, 1, 1, 10, 10, 10, 0, 1395705615, 1395705615),
(130, 1, 44, 12, 1, 0, 0, 1, 0, 1396675577, 1396675577),
(131, 1, 41, 4, 1, 0, 0, 1, 0, 1396803586, 1396803586),
(132, 1, 45, 15, 1, 0, 0, 1, 0, 1397107164, 1397107164),
(133, 1, 38, 9, 1, 0, 0, 1, 0, 1396674812, 1396674812),
(134, 1, 47, 12, 1, 0, 0, 1, 0, 1396674135, 1396674135),
(135, 1, 40, 12, 1, 0, 0, 1, 0, 1396674298, 1396674298),
(136, 1, 37, 10, 1, 0, 0, 1, 0, 1396613112, 1396613112),
(137, 1, 36, 12, 1, 0, 0, 1, 0, 1396677488, 1396677488),
(138, 1, 34, 12, 1, 0, 0, 1, 0, 1396677577, 1396677577),
(139, 1, 35, 10, 1, 0, 0, 1, 0, 1396679335, 1396679335),
(140, 13, 48, 1, 1, 10, 10, 10, 0, 1395891782, 1395891782),
(141, 13, 49, 1, 1, 10, 10, 10, 0, 1395905404, 1395905404),
(142, 13, 50, 1, 1, 10, 10, 10, 0, 1395949530, 1395949530),
(143, 13, 51, 1, 1, 10, 10, 10, 0, 1396382868, 1396382868),
(144, 13, 52, 1, 1, 10, 10, 10, 0, 1396422461, 1396422461),
(145, 13, 53, 1, 1, 10, 10, 10, 0, 1396617124, 1396617124),
(146, 13, 54, 1, 1, 10, 10, 10, 1, 1396724299, 1396724299),
(147, 7, 54, 1, 1, 0, 1, 0, 1, 1396724339, 1396724339),
(148, 2, 54, 1, 1, 0, 0, 1, 1, 1396724407, 1396724407),
(149, 12, 54, 3, 1, 1, 0, 0, 0, 1401275537, 1401275537),
(150, 13, 55, 1, 1, 10, 10, 10, 0, 1396962759, 1396962759),
(151, 13, 56, 1, 1, 10, 10, 10, 0, 1397026269, 1397026269),
(152, 13, 57, 1, 1, 10, 10, 10, 0, 1397288218, 1397288218),
(153, 13, 58, 1, 1, 10, 10, 10, 0, 1397901369, 1397901369),
(154, 13, 59, 1, 1, 10, 10, 10, 0, 1397963184, 1397963184),
(155, 13, 60, 1, 1, 10, 10, 10, 0, 1398200185, 1398200185),
(156, 13, 61, 1, 1, 10, 10, 10, 0, 1398547641, 1398547641),
(157, 13, 62, 1, 1, 10, 10, 10, 0, 1398581803, 1398581803),
(158, 13, 63, 1, 1, 10, 10, 10, 0, 1398592043, 1398592043),
(159, 13, 64, 1, 1, 10, 10, 10, 0, 1398604800, 1398604800),
(160, 13, 65, 1, 1, 10, 10, 10, 0, 1398637816, 1398637816),
(161, 13, 66, 1, 1, 10, 10, 10, 0, 1398820066, 1398820066),
(162, 13, 67, 1, 1, 10, 10, 10, 0, 1398838332, 1398838332),
(163, 13, 68, 1, 1, 10, 10, 10, 0, 1398921239, 1398921239),
(164, 13, 69, 1, 1, 10, 10, 10, 0, 1398977957, 1398977957),
(165, 13, 70, 1, 1, 10, 10, 10, 0, 1399045113, 1399045113),
(166, 13, 71, 1, 1, 10, 10, 10, 0, 1399051879, 1399051879),
(167, 13, 72, 1, 1, 10, 10, 10, 0, 1399054648, 1399054648),
(168, 13, 73, 1, 1, 10, 10, 10, 0, 1399155972, 1399155972),
(169, 13, 74, 1, 1, 10, 10, 10, 0, 1399365988, 1399365988),
(170, 13, 75, 1, 1, 10, 10, 10, 0, 1399404780, 1399404780),
(171, 13, 76, 1, 1, 10, 10, 10, 0, 1399506959, 1399506959),
(172, 13, 77, 1, 1, 10, 10, 10, 0, 1399510489, 1399510489),
(173, 13, 78, 1, 1, 10, 10, 10, 0, 1399530654, 1399530654),
(174, 13, 79, 1, 1, 10, 10, 10, 0, 1399629100, 1399629100),
(175, 13, 80, 1, 1, 10, 10, 10, 0, 1399644412, 1399644412),
(176, 13, 81, 1, 1, 10, 10, 10, 0, 1399788937, 1399788937),
(177, 13, 82, 1, 1, 10, 10, 10, 0, 1399942258, 1399942258),
(178, 13, 83, 1, 1, 10, 10, 10, 0, 1399942272, 1399942272),
(179, 13, 84, 1, 1, 10, 10, 10, 0, 1400012495, 1400012495),
(180, 13, 85, 1, 1, 10, 10, 10, 0, 1400185563, 1400185563),
(181, 13, 87, 1, 1, 10, 10, 10, 0, 1400367153, 1400367153),
(182, 13, 86, 1, 1, 10, 10, 10, 0, 1400367153, 1400367153),
(183, 13, 88, 1, 1, 10, 10, 10, 0, 1400401734, 1400401734),
(184, 13, 89, 1, 1, 10, 10, 10, 0, 1400585563, 1400585563),
(185, 13, 90, 1, 1, 10, 10, 10, 0, 1400619082, 1400619082),
(186, 1, 90, 1, 1, 0, 0, 1, 0, 1400774833, 1400774833),
(187, 1, 11, 27, 1, 0, 0, 1, 1, 1410837945, 1410837945),
(188, 13, 91, 1, 1, 10, 10, 10, 0, 1400859493, 1400859493),
(189, 13, 92, 1, 1, 10, 10, 10, 0, 1400953720, 1400953720),
(190, 13, 93, 1, 1, 10, 10, 10, 0, 1400979166, 1400979166),
(191, 13, 94, 1, 1, 10, 10, 10, 0, 1401033267, 1401033267),
(192, 13, 95, 1, 1, 10, 10, 10, 0, 1401141656, 1401141656),
(193, 13, 96, 1, 1, 10, 10, 10, 0, 1401153539, 1401153539),
(194, 13, 97, 1, 1, 10, 10, 10, 1, 1401164545, 1401164545),
(195, 11, 97, 3, 1, 1, 0, 0, 1, 1415850468, 1415850468),
(196, 3, 97, 29, 1, 0, 0, 2, 1, 1416461549, 1416461549),
(197, 1, 97, 101, 1, 0, 0, 1, 1, 1418027551, 1418027551),
(198, 13, 98, 1, 1, 10, 10, 10, 0, 1401198243, 1401198243),
(199, 13, 99, 1, 1, 10, 10, 10, 1, 1401326778, 1401326778),
(200, 13, 100, 1, 1, 10, 10, 10, 1, 1401355461, 1401355461),
(201, 13, 101, 1, 1, 10, 10, 10, 0, 1401367938, 1401367938),
(202, 13, 102, 1, 1, 10, 10, 10, 0, 1401499566, 1401499566),
(203, 13, 103, 1, 1, 10, 10, 10, 0, 1401500359, 1401500359),
(204, 13, 104, 1, 1, 10, 10, 10, 0, 1401507192, 1401507192),
(205, 13, 105, 1, 1, 10, 10, 10, 0, 1401556545, 1401556545),
(206, 13, 106, 1, 1, 10, 10, 10, 0, 1401696540, 1401696540),
(207, 13, 107, 1, 1, 10, 10, 10, 1, 1401701562, 1401701562),
(208, 13, 108, 1, 1, 10, 10, 10, 0, 1401757603, 1401757603),
(209, 13, 109, 1, 1, 10, 10, 10, 0, 1401775072, 1401775072),
(210, 13, 110, 1, 1, 10, 10, 10, 0, 1401788933, 1401788933),
(211, 13, 111, 1, 1, 10, 10, 10, 0, 1401821388, 1401821388),
(212, 13, 112, 1, 1, 10, 10, 10, 0, 1401827203, 1401827203),
(213, 1, 112, 1, 1, 0, 0, 1, 0, 1401837979, 1401837979),
(214, 13, 113, 1, 1, 10, 10, 10, 0, 1401920710, 1401920710),
(215, 13, 114, 1, 1, 10, 10, 10, 0, 1401946168, 1401946168),
(216, 13, 115, 1, 1, 10, 10, 10, 1, 1401956979, 1401956979),
(217, 13, 116, 1, 1, 10, 10, 10, 0, 1402003037, 1402003037),
(218, 13, 117, 1, 1, 10, 10, 10, 0, 1402308338, 1402308338),
(219, 1, 117, 11, 1, 0, 0, 1, 0, 1408358308, 1408358308),
(220, 13, 118, 1, 1, 10, 10, 10, 1, 1402627717, 1402627717),
(221, 2, 118, 1, 1, 0, 0, 1, 1, 1402631967, 1402631967),
(222, 13, 119, 1, 1, 10, 10, 10, 1, 1402633532, 1402633532),
(223, 1, 115, 44, 1, 0, 0, 1, 1, 1418020444, 1418020444),
(224, 13, 120, 1, 1, 10, 10, 10, 1, 1403069683, 1403069683),
(225, 13, 121, 1, 1, 10, 10, 10, 0, 1403143396, 1403143396),
(226, 1, 121, 2, 1, 0, 0, 1, 0, 1403360520, 1403360520),
(227, 7, 115, 4, 1, 0, 1, 0, 1, 1415681025, 1415681025),
(228, 13, 122, 1, 1, 10, 10, 10, 1, 1403293193, 1403293193),
(229, 7, 122, 10, 10, 0, 10, 0, 1, 1403293332, 1403293472),
(230, 11, 122, 1, 1, 1, 0, 0, 1, 1403293425, 1403293425),
(231, 12, 11, 14, 1, 1, 0, 0, 0, 1418027507, 1418027507),
(232, 13, 123, 1, 1, 10, 10, 10, 0, 1403300434, 1403300434),
(233, 11, 11, 6, 3, 3, 0, 0, 0, 1410838114, 1410838219),
(234, 13, 124, 1, 1, 10, 10, 10, 1, 1403383715, 1403383715),
(235, 7, 124, 10, 10, 0, 10, 0, 1, 1403383772, 1403384247),
(236, 11, 124, 1, 1, 1, 0, 0, 1, 1403383914, 1403383914),
(237, 5, 124, 2, 2, 0, 0, 2, 1, 1403385744, 1403385934),
(238, 13, 125, 1, 1, 10, 10, 10, 1, 1403436776, 1403436776),
(239, 7, 125, 11, 1, 0, 1, 0, 1, 1404469797, 1404469797),
(240, 11, 125, 1, 1, 1, 0, 0, 1, 1403436862, 1403436862),
(241, 5, 125, 1, 1, 0, 0, 1, 1, 1403436891, 1403436891),
(242, 13, 126, 1, 1, 10, 10, 10, 1, 1403453217, 1403453217),
(243, 7, 126, 10, 10, 0, 10, 0, 1, 1403453398, 1403454078),
(244, 11, 126, 1, 1, 1, 0, 0, 1, 1403453416, 1403453416),
(245, 5, 126, 1, 1, 0, 0, 1, 1, 1403453443, 1403453443),
(246, 13, 127, 1, 1, 10, 10, 10, 0, 1403734384, 1403734384),
(247, 13, 128, 1, 1, 10, 10, 10, 0, 1403931300, 1403931300),
(248, 13, 129, 1, 1, 10, 10, 10, 0, 1404128948, 1404128948),
(249, 13, 130, 1, 1, 10, 10, 10, 0, 1404276827, 1404276827),
(250, 1, 130, 3, 1, 0, 0, 1, 0, 1406508821, 1406508821),
(251, 13, 131, 1, 1, 10, 10, 10, 0, 1404421333, 1404421333),
(252, 1, 125, 1, 1, 0, 0, 1, 1, 1404469447, 1404469447),
(253, 3, 125, 1, 1, 0, 0, 2, 1, 1404470356, 1404470356),
(254, 1, 131, 1, 1, 0, 0, 1, 0, 1404495274, 1404495274),
(255, 13, 132, 1, 1, 10, 10, 10, 0, 1404748046, 1404748046),
(256, 7, 11, 3, 3, 0, 3, 0, 1, 1404794590, 1404794599),
(257, 13, 133, 1, 1, 10, 10, 10, 1, 1404842061, 1404842061),
(258, 1, 133, 25, 1, 0, 0, 1, 1, 1407385929, 1407385929),
(259, 3, 133, 260, 10, 0, 0, 20, 1, 1407398530, 1407399295),
(260, 2, 133, 1, 1, 0, 0, 1, 1, 1404855283, 1404855283),
(261, 7, 97, 10, 1, 0, 1, 0, 1, 1418027561, 1418027561),
(262, 3, 100, 1, 1, 0, 0, 2, 1, 1404895335, 1404895335),
(263, 7, 100, 1, 1, 0, 1, 0, 1, 1404933979, 1404933979),
(264, 11, 133, 2, 2, 2, 0, 0, 1, 1405066099, 1405066237),
(265, 12, 133, 5, 2, 2, 0, 0, 0, 1410888149, 1410940528),
(266, 13, 134, 1, 1, 10, 10, 10, 1, 1405118079, 1405118079),
(267, 7, 134, 2, 2, 0, 2, 0, 1, 1405118223, 1405118836),
(268, 13, 135, 1, 1, 10, 10, 10, 0, 1405218623, 1405218623),
(269, 1, 135, 12, 1, 0, 0, 1, 0, 1406382108, 1406382108),
(270, 13, 136, 1, 1, 10, 10, 10, 0, 1405287324, 1405287324),
(271, 13, 137, 1, 1, 10, 10, 10, 1, 1405473106, 1405473106),
(272, 13, 138, 1, 1, 10, 10, 10, 1, 1405482102, 1405482102),
(273, 7, 138, 10, 10, 0, 10, 0, 1, 1405482158, 1405482528),
(274, 13, 139, 1, 1, 10, 10, 10, 1, 1405529911, 1405529911),
(275, 13, 140, 1, 1, 10, 10, 10, 1, 1405548296, 1405548296),
(276, 7, 140, 10, 10, 0, 10, 0, 1, 1405548392, 1405549613),
(277, 1, 140, 1, 1, 0, 0, 1, 1, 1405557927, 1405557927),
(278, 13, 141, 1, 1, 10, 10, 10, 1, 1405670210, 1405670210),
(279, 7, 139, 3, 3, 0, 3, 0, 1, 1405704932, 1405705020),
(280, 13, 142, 1, 1, 10, 10, 10, 1, 1405924501, 1405924501),
(281, 7, 142, 7, 1, 0, 1, 0, 1, 1407578603, 1407578603),
(282, 1, 142, 8, 1, 0, 0, 1, 1, 1409049199, 1409049199),
(283, 11, 142, 2, 1, 1, 0, 0, 1, 1406021324, 1406021324),
(284, 12, 97, 4, 1, 1, 0, 0, 1, 1418027529, 1418027529),
(285, 13, 146, 1, 1, 10, 10, 10, 0, 1406018552, 1406018552),
(286, 5, 142, 2, 1, 0, 0, 1, 1, 1407996971, 1407996971),
(287, 2, 97, 1, 1, 0, 0, 1, 1, 1406038165, 1406038165),
(288, 13, 147, 1, 1, 10, 10, 10, 1, 1406171994, 1406171994),
(289, 5, 97, 5, 1, 0, 0, 1, 1, 1418027579, 1418027579),
(290, 13, 148, 1, 1, 10, 10, 10, 0, 1406344112, 1406344112),
(291, 1, 148, 2, 1, 0, 0, 1, 0, 1409916435, 1409916435),
(292, 13, 149, 1, 1, 10, 10, 10, 1, 1406400304, 1406400304),
(293, 7, 149, 10, 10, 0, 10, 0, 1, 1406400330, 1406400479),
(294, 13, 150, 1, 1, 10, 10, 10, 0, 1406431650, 1406431650),
(295, 13, 151, 1, 1, 10, 10, 10, 0, 1406499700, 1406499700),
(296, 13, 152, 1, 1, 10, 10, 10, 0, 1406562764, 1406562764),
(297, 13, 153, 1, 1, 10, 10, 10, 1, 1406574847, 1406574847),
(298, 1, 151, 15, 1, 0, 0, 1, 0, 1408453261, 1408453261),
(299, 13, 154, 1, 1, 10, 10, 10, 1, 1406649100, 1406649100),
(300, 1, 154, 3, 1, 0, 0, 1, 1, 1406827424, 1406827424),
(301, 3, 154, 20, 10, 0, 0, 20, 1, 1406827694, 1406827948),
(302, 13, 155, 1, 1, 10, 10, 10, 1, 1406656761, 1406656761),
(303, 13, 156, 1, 1, 10, 10, 10, 1, 1406910492, 1406910492),
(304, 13, 157, 1, 1, 10, 10, 10, 0, 1407401169, 1407401169),
(305, 13, 158, 1, 1, 10, 10, 10, 0, 1407416824, 1407416824),
(306, 13, 159, 1, 1, 10, 10, 10, 1, 1407594032, 1407594032),
(307, 3, 159, 323, 10, 0, 0, 20, 1, 1410841012, 1410841147),
(308, 13, 160, 1, 1, 10, 10, 10, 1, 1407604077, 1407604077),
(309, 3, 160, 192, 1, 0, 0, 2, 1, 1412509585, 1412509585),
(310, 1, 160, 21, 1, 0, 0, 1, 1, 1412509560, 1412509560),
(311, 1, 159, 34, 1, 0, 0, 1, 1, 1410840651, 1410840651),
(312, 2, 159, 1, 1, 0, 0, 1, 1, 1407743727, 1407743727),
(313, 13, 161, 1, 1, 10, 10, 10, 0, 1407749652, 1407749652),
(314, 13, 162, 1, 1, 10, 10, 10, 0, 1407750216, 1407750216),
(315, 1, 161, 7, 1, 0, 0, 1, 0, 1411043007, 1411043007),
(316, 1, 162, 1, 1, 0, 0, 1, 0, 1407843296, 1407843296),
(317, 13, 163, 1, 1, 10, 10, 10, 1, 1407993733, 1407993733),
(318, 2, 163, 1, 1, 0, 0, 1, 1, 1407993763, 1407993763),
(319, 3, 163, 2, 2, 0, 0, 4, 1, 1407993952, 1407994018),
(320, 13, 164, 1, 1, 10, 10, 10, 0, 1408039161, 1408039161),
(321, 13, 165, 1, 1, 10, 10, 10, 1, 1408086982, 1408086982),
(322, 2, 165, 1, 1, 0, 0, 1, 1, 1408087155, 1408087155),
(323, 13, 166, 1, 1, 10, 10, 10, 0, 1408178599, 1408178599),
(324, 13, 167, 1, 1, 10, 10, 10, 0, 1408179298, 1408179298),
(325, 1, 158, 1, 1, 0, 0, 1, 0, 1408195087, 1408195087),
(326, 13, 168, 1, 1, 10, 10, 10, 1, 1408367825, 1408367825),
(327, 13, 169, 1, 1, 10, 10, 10, 0, 1408409561, 1408409561),
(328, 13, 170, 1, 1, 10, 10, 10, 0, 1408465686, 1408465686),
(329, 13, 171, 1, 1, 10, 10, 10, 0, 1408894425, 1408894425),
(330, 13, 172, 1, 1, 10, 10, 10, 0, 1408941513, 1408941513),
(331, 13, 173, 1, 1, 10, 10, 10, 1, 1408942263, 1408942263),
(332, 3, 173, 1, 1, 0, 0, 2, 1, 1408942446, 1408942446),
(333, 2, 173, 1, 1, 0, 0, 1, 1, 1408942564, 1408942564),
(334, 7, 159, 7, 4, 0, 4, 0, 1, 1410059276, 1410059297),
(335, 12, 13, 1, 1, 1, 0, 0, 0, 1409150063, 1409150063),
(336, 12, 123, 1, 1, 1, 0, 0, 0, 1409150112, 1409150112),
(337, 12, 118, 1, 1, 1, 0, 0, 0, 1409150117, 1409150117),
(338, 12, 137, 1, 1, 1, 0, 0, 0, 1409150125, 1409150125),
(339, 12, 109, 2, 2, 2, 0, 0, 0, 1409150129, 1409150489),
(340, 12, 146, 1, 1, 1, 0, 0, 0, 1409150140, 1409150140),
(341, 12, 160, 5, 2, 2, 0, 0, 1, 1410888146, 1410940525),
(342, 12, 159, 5, 2, 2, 0, 0, 0, 1410888142, 1410940518),
(343, 12, 173, 1, 1, 1, 0, 0, 0, 1409150368, 1409150368),
(344, 12, 165, 1, 1, 1, 0, 0, 0, 1409150440, 1409150440),
(345, 12, 154, 6, 1, 1, 0, 0, 0, 1415850468, 1415850468),
(346, 12, 155, 1, 1, 1, 0, 0, 0, 1409150450, 1409150450),
(347, 12, 150, 1, 1, 1, 0, 0, 0, 1409150456, 1409150456),
(348, 12, 120, 1, 1, 1, 0, 0, 0, 1409150478, 1409150478),
(349, 12, 115, 1, 1, 1, 0, 0, 1, 1409150480, 1409150480),
(350, 12, 139, 1, 1, 1, 0, 0, 0, 1409150491, 1409150491),
(351, 12, 21, 1, 1, 1, 0, 0, 0, 1409150601, 1409150601),
(352, 13, 174, 1, 1, 10, 10, 10, 0, 1409170656, 1409170656),
(353, 1, 174, 1, 1, 0, 0, 1, 0, 1409226473, 1409226473),
(354, 13, 175, 1, 1, 10, 10, 10, 0, 1409230483, 1409230483),
(355, 13, 176, 1, 1, 10, 10, 10, 0, 1409317962, 1409317962),
(356, 1, 176, 2, 1, 0, 0, 1, 0, 1409387310, 1409387310),
(357, 1, 166, 2, 1, 0, 0, 1, 0, 1411282755, 1411282755),
(358, 13, 177, 1, 1, 10, 10, 10, 0, 1409338006, 1409338006),
(359, 13, 178, 1, 1, 10, 10, 10, 0, 1409413505, 1409413505),
(360, 1, 171, 8, 1, 0, 0, 1, 0, 1410426461, 1410426461),
(361, 13, 179, 1, 1, 10, 10, 10, 0, 1409487668, 1409487668),
(362, 13, 180, 1, 1, 10, 10, 10, 0, 1409535514, 1409535514),
(363, 1, 178, 1, 1, 0, 0, 1, 0, 1409536044, 1409536044),
(364, 13, 181, 1, 1, 10, 10, 10, 0, 1409567436, 1409567436),
(365, 13, 182, 1, 1, 10, 10, 10, 0, 1409594046, 1409594046),
(366, 1, 179, 1, 1, 0, 0, 1, 0, 1409598327, 1409598327),
(367, 1, 182, 2, 1, 0, 0, 1, 0, 1409774034, 1409774034),
(368, 1, 181, 1, 1, 0, 0, 1, 0, 1409645240, 1409645240),
(369, 3, 115, 4, 1, 0, 0, 2, 1, 1417684347, 1417684347),
(370, 1, 167, 1, 1, 0, 0, 1, 0, 1409776660, 1409776660),
(371, 13, 183, 1, 1, 10, 10, 10, 0, 1409777048, 1409777048),
(372, 1, 180, 1, 1, 0, 0, 1, 0, 1409781812, 1409781812),
(373, 13, 184, 1, 1, 10, 10, 10, 0, 1409823341, 1409823341),
(374, 1, 184, 4, 1, 0, 0, 1, 0, 1410677017, 1410677017),
(375, 13, 185, 1, 1, 10, 10, 10, 1, 1409903111, 1409903111),
(376, 13, 186, 1, 1, 10, 10, 10, 1, 1409909719, 1409909719),
(377, 2, 186, 1, 1, 0, 0, 1, 1, 1409916441, 1409916441),
(378, 13, 187, 1, 1, 10, 10, 10, 1, 1409916914, 1409916914),
(379, 13, 189, 1, 1, 10, 10, 10, 1, 1410151776, 1410151776),
(380, 13, 190, 1, 1, 10, 10, 10, 1, 1410160062, 1410160062),
(381, 11, 159, 6, 2, 2, 0, 0, 1, 1410840684, 1410840726),
(382, 13, 191, 1, 1, 10, 10, 10, 1, 1410252762, 1410252762),
(383, 11, 160, 1, 1, 1, 0, 0, 1, 1410350782, 1410350782),
(384, 13, 192, 1, 1, 10, 10, 10, 1, 1410415375, 1410415375),
(385, 13, 193, 1, 1, 10, 10, 10, 1, 1410451509, 1410451509),
(386, 7, 193, 1, 1, 0, 1, 0, 1, 1410451661, 1410451661),
(387, 13, 194, 1, 1, 10, 10, 10, 0, 1410630243, 1410630243),
(388, 13, 195, 1, 1, 10, 10, 10, 0, 1410676367, 1410676367),
(389, 1, 195, 1, 1, 0, 0, 1, 0, 1410789114, 1410789114),
(390, 13, 196, 1, 1, 10, 10, 10, 0, 1410790581, 1410790581),
(391, 1, 196, 1, 1, 0, 0, 1, 0, 1410872490, 1410872490),
(392, 13, 197, 1, 1, 10, 10, 10, 0, 1410872829, 1410872829),
(393, 1, 197, 2, 1, 0, 0, 1, 0, 1410946548, 1410946548),
(394, 13, 198, 1, 1, 10, 10, 10, 1, 1410888087, 1410888087),
(395, 11, 198, 6, 1, 1, 0, 0, 1, 1410942046, 1410942046),
(396, 2, 198, 1, 1, 0, 0, 1, 1, 1410893412, 1410893412),
(397, 1, 198, 13, 1, 0, 0, 1, 1, 1412491533, 1412491533),
(398, 3, 198, 129, 10, 0, 0, 20, 1, 1412496296, 1412502755),
(399, 13, 199, 1, 1, 10, 10, 10, 1, 1410940270, 1410940270),
(400, 11, 199, 6, 1, 1, 0, 0, 1, 1410941244, 1410941244),
(401, 2, 199, 1, 1, 0, 0, 1, 1, 1410940653, 1410940653),
(402, 12, 198, 1, 1, 1, 0, 0, 1, 1410941244, 1410941244),
(403, 3, 199, 20, 10, 0, 0, 20, 1, 1411032093, 1411032270),
(404, 12, 199, 1, 1, 1, 0, 0, 1, 1410942046, 1410942046),
(405, 1, 199, 4, 1, 0, 0, 1, 1, 1411366569, 1411366569),
(406, 13, 200, 1, 1, 10, 10, 10, 0, 1410947574, 1410947574),
(407, 13, 201, 1, 1, 10, 10, 10, 0, 1410989403, 1410989403),
(408, 13, 202, 1, 1, 10, 10, 10, 0, 1411041064, 1411041064),
(409, 13, 203, 1, 1, 10, 10, 10, 0, 1411120550, 1411120550),
(410, 1, 200, 3, 1, 0, 0, 1, 0, 1411289430, 1411289430),
(411, 13, 204, 1, 1, 10, 10, 10, 0, 1411263375, 1411263375),
(412, 1, 169, 1, 1, 0, 0, 1, 0, 1411329525, 1411329525),
(413, 13, 205, 1, 1, 10, 10, 10, 0, 1411350551, 1411350551),
(414, 1, 204, 3, 1, 0, 0, 1, 0, 1411571849, 1411571849),
(415, 13, 206, 1, 1, 10, 10, 10, 1, 1411401269, 1411401269),
(416, 7, 206, 11, 1, 0, 1, 0, 1, 1412477717, 1412477717),
(417, 1, 205, 1, 1, 0, 0, 1, 0, 1411472696, 1411472696),
(418, 13, 207, 1, 1, 10, 10, 10, 1, 1411655612, 1411655612),
(419, 13, 208, 1, 1, 10, 10, 10, 0, 1412093771, 1412093771),
(420, 13, 209, 1, 1, 10, 10, 10, 0, 1412198193, 1412198193),
(421, 12, 206, 1, 1, 1, 0, 0, 1, 1412270425, 1412270425),
(422, 13, 210, 1, 1, 10, 10, 10, 0, 1412481287, 1412481287),
(423, 13, 211, 1, 1, 10, 10, 10, 0, 1412847078, 1412847078),
(424, 13, 212, 1, 1, 10, 10, 10, 0, 1412858879, 1412858879),
(425, 13, 213, 1, 1, 10, 10, 10, 1, 1413177435, 1413177435),
(426, 13, 214, 1, 1, 10, 10, 10, 1, 1413245658, 1413245658),
(427, 7, 214, 1, 1, 0, 1, 0, 1, 1413245754, 1413245754),
(428, 12, 214, 1, 1, 1, 0, 0, 0, 1413303178, 1413303178),
(429, 12, 193, 1, 1, 1, 0, 0, 0, 1413307589, 1413307589),
(430, 12, 149, 1, 1, 1, 0, 0, 0, 1413307601, 1413307601),
(431, 12, 138, 1, 1, 1, 0, 0, 0, 1413307636, 1413307636),
(432, 12, 125, 1, 1, 1, 0, 0, 0, 1413307669, 1413307669),
(433, 11, 115, 3, 2, 2, 0, 0, 1, 1418027507, 1418027529),
(434, 13, 215, 1, 1, 10, 10, 10, 1, 1417434434, 1417434434),
(435, 1, 215, 3, 1, 0, 0, 1, 1, 1417580446, 1417580446),
(436, 7, 215, 1, 1, 0, 1, 0, 1, 1417581936, 1417581936);

-- --------------------------------------------------------

--
-- Table structure for table `favorite_album`
--

CREATE TABLE IF NOT EXISTS `favorite_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_album_id` (`album_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_sharing`
--

CREATE TABLE IF NOT EXISTS `favorite_sharing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `share_id` int(11) NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_share_id` (`share_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `favorite_sharing`
--

INSERT INTO `favorite_sharing` (`id`, `user_id`, `share_id`, `create_time`) VALUES
(1, 20, 1, 1436330516),
(2, 20, 6, 1436330521),
(3, 20, 2, 1436330851),
(4, 20, 3, 1436330862),
(5, 20, 5, 1436330876),
(6, 152, 8, 1437543233);

-- --------------------------------------------------------

--
-- Table structure for table `favorite_store`
--

CREATE TABLE IF NOT EXISTS `favorite_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_store_id` (`store_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `favorite_store`
--

INSERT INTO `favorite_store` (`id`, `user_id`, `store_id`, `create_time`) VALUES
(1, 152, 1, 1437541489);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_nickname` varchar(80) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `reference_url` varchar(255) NOT NULL,
  `keyword` text,
  `keyword_search` text,
  `summary` text,
  `color` varchar(20) DEFAULT '',
  `image_large` varchar(255) DEFAULT NULL,
  `image_middle` varchar(255) DEFAULT NULL,
  `image_square` varchar(255) DEFAULT NULL,
  `width` varchar(20) DEFAULT NULL,
  `height` varchar(20) DEFAULT NULL,
  `item_type` varchar(10) DEFAULT NULL,
  `share_type` varchar(10) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `is_show` tinyint(4) NOT NULL,
  `create_time` int(10) NOT NULL,
  `is_deleted` tinyint(4) DEFAULT '0',
  `total_images` tinyint(2) DEFAULT '0',
  `cloud` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_is_show` (`is_show`),
  KEY `idx_item_type` (`item_type`),
  KEY `idx_share_type` (`share_type`),
  KEY `idx_is_deleted` (`is_deleted`),
  KEY `idx_create_time` (`create_time`),
  FULLTEXT KEY `idx_keyword_search` (`keyword_search`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `user_id`, `user_nickname`, `title`, `reference_url`, `keyword`, `keyword_search`, `summary`, `color`, `image_large`, `image_middle`, `image_square`, `width`, `height`, `item_type`, `share_type`, `price`, `is_show`, `create_time`, `is_deleted`, `total_images`, `cloud`) VALUES
(1, 10, 'Veronica', 'Pleated Skirt', 'https://tr.styles.my/?type=deeplink&id=17135&media=251', NULL, NULL, NULL, 'purple', 'uploads/attachments/products/large/10_559a04bbece50.jpg', 'uploads/attachments/products/middle/10_559a04bbece50.jpg', 'uploads/attachments/products/square/10_559a04bbece50.jpg', '400', '600', 'image', 'web', 59, 1, 1436157116, 0, 1, ''),
(2, 10, 'Veronica', 'mc889 Dorothy Cut in halter 1 piece dress', 'https://tr.styles.my/?type=deeplink&id=17136&media=251', NULL, NULL, NULL, 'gray', 'uploads/attachments/products/large/10_559a054b1475f.jpg', 'uploads/attachments/products/middle/10_559a054b1475f.jpg', 'uploads/attachments/products/square/10_559a054b1475f.jpg', '400', '666', 'image', 'web', 99, 1, 1436157259, 0, 1, ''),
(3, 10, 'Veronica', 'Designer Inspired Checks Dress', 'https://tr.styles.my/?type=deeplink&id=17137&media=251', NULL, NULL, NULL, 'yellow', 'uploads/attachments/products/large/10_559a05cc1a8c0.jpg', 'uploads/attachments/products/middle/10_559a05cc1a8c0.jpg', 'uploads/attachments/products/square/10_559a05cc1a8c0.jpg', '371', '514', 'image', 'web', 159, 1, 1436157388, 0, 1, ''),
(4, 10, 'Veronica', 'Dressabelle 3/4 Sleeve Textured Skater Dress ', 'https://tr.styles.my/?type=deeplink&id=17138&media=251', NULL, NULL, NULL, 'blue', 'uploads/attachments/products/large/10_559a064701786.jpg', 'uploads/attachments/products/middle/10_559a064701786.jpg', 'uploads/attachments/products/square/10_559a064701786.jpg', '340', '510', 'image', 'web', 52.5, 1, 1436157511, 0, 1, ''),
(5, 10, 'Veronica', 'Zelias Peplum Top In Navy', 'http://www.anylove.my/index.php?route=product/product&product_id=326&sg_type_pg=latest&sort=p.sort_order&order=ASC&sg_type_pg=latest', NULL, NULL, NULL, 'blue', 'uploads/attachments/products/large/10_559a068ad3893.jpg', 'uploads/attachments/products/middle/10_559a068ad3893.jpg', 'uploads/attachments/products/square/10_559a068ad3893.jpg', '300', '430', 'image', 'web', 69, 1, 1436157579, 0, 1, ''),
(6, 10, 'Veronica', 'New Romantic Patched Dress', 'http://coccha.com/product/new-romantic-patched-dress/', NULL, NULL, NULL, 'gray', 'uploads/attachments/products/large/10_559a070e25c70.jpg', 'uploads/attachments/products/middle/10_559a070e25c70.jpg', 'uploads/attachments/products/square/10_559a070e25c70.jpg', '482', '726', 'image', 'web', 222.9, 1, 1436157710, 0, 1, ''),
(7, 10, 'Veronica', 'Dockside Floral Party Flare Dress ', 'https://tr.styles.my/?type=deeplink&id=17139&media=251', NULL, NULL, NULL, 'black', 'uploads/attachments/products/large/10_559a0787833b9.jpg', 'uploads/attachments/products/middle/10_559a0787833b9.jpg', 'uploads/attachments/products/square/10_559a0787833b9.jpg', '598', '817', 'image', 'web', 75, 1, 1436157831, 0, 1, ''),
(8, 10, 'Veronica', ' Elsa Textured Shorts', 'https://tr.styles.my/?type=deeplink&id=17140&media=251', NULL, NULL, NULL, 'green', 'uploads/attachments/products/large/10_559a07ebec85e.jpg', 'uploads/attachments/products/middle/10_559a07ebec85e.jpg', 'uploads/attachments/products/square/10_559a07ebec85e.jpg', '400', '600', 'image', 'web', 45, 1, 1436157932, 0, 1, ''),
(9, 10, 'Veronica', 'Blue Ferns Bomber Jacket ', 'https://tr.styles.my/?type=deeplink&id=17141&media=251', NULL, NULL, NULL, 'gray', 'uploads/attachments/products/large/10_559a0891bea82.jpg', 'uploads/attachments/products/middle/10_559a0891bea82.jpg', 'uploads/attachments/products/square/10_559a0891bea82.jpg', '300', '575', 'image', 'web', 66, 1, 1436158097, 0, 1, ''),
(10, 10, 'Veronica', 'Nomad Femme Coloured Stitches Shift Dress | Coccha', 'http://coccha.com/product/nomad-femme-coloured-stitches-shift-dress/', NULL, NULL, NULL, 'gray', 'uploads/attachments/products/large/10_559a08d65b72c.jpg', 'uploads/attachments/products/middle/10_559a08d65b72c.jpg', 'uploads/attachments/products/square/10_559a08d65b72c.jpg', '482', '726', 'image', 'web', 180.9, 1, 1436158166, 0, 1, ''),
(11, 10, 'Veronica', '3CE Waterful Concealer ', 'https://tr.styles.my/?type=deeplink&id=17143&media=251', NULL, NULL, NULL, 'red', 'uploads/attachments/products/large/10_559a094a70b4b.jpg', 'uploads/attachments/products/middle/10_559a094a70b4b.jpg', 'uploads/attachments/products/square/10_559a094a70b4b.jpg', '371', '514', 'image', 'web', 48, 1, 1436158282, 0, 1, ''),
(12, 10, 'Veronica', 'Mystery Triangles Printed Round Neck Long Sleeves Top', 'https://tr.styles.my/?type=deeplink&id=17144&media=251', NULL, NULL, NULL, 'black', 'uploads/attachments/products/large/10_559a0ec656f8e.jpg', 'uploads/attachments/products/middle/10_559a0ec656f8e.jpg', 'uploads/attachments/products/square/10_559a0ec656f8e.jpg', '340', '510', 'image', 'web', 32, 1, 1436159686, 0, 1, ''),
(13, 10, 'Veronica', 'Sora Twisted bodice with cut out waist', 'https://tr.styles.my/?type=deeplink&id=17145&media=251', NULL, NULL, NULL, 'red', 'uploads/attachments/products/large/10_559a0f3d8c75b.jpg', 'uploads/attachments/products/middle/10_559a0f3d8c75b.jpg', 'uploads/attachments/products/square/10_559a0f3d8c75b.jpg', '400', '666', 'image', 'web', 299, 1, 1436159805, 0, 1, ''),
(14, 10, 'Veronica', 'Royal Elegant High Neck Blouse with Ruffles - Black ', 'https://tr.styles.my/?type=deeplink&id=17146&media=251', NULL, NULL, NULL, 'gray', 'uploads/attachments/products/large/10_559a0faf7f1cb.jpg', 'uploads/attachments/products/middle/10_559a0faf7f1cb.jpg', 'uploads/attachments/products/square/10_559a0faf7f1cb.jpg', '598', '817', 'image', 'web', 55, 1, 1436159919, 0, 1, ''),
(15, 10, 'Veronica', '3CE Creamy Lip Color - #6 JAZZY PINK', 'https://tr.styles.my/?type=deeplink&id=17147&media=251', NULL, NULL, NULL, 'gray', 'uploads/attachments/products/large/10_559a101f67b1e.jpg', 'uploads/attachments/products/middle/10_559a101f67b1e.jpg', 'uploads/attachments/products/square/10_559a101f67b1e.jpg', '371', '514', 'image', 'web', 68, 1, 1436160031, 0, 1, ''),
(16, 10, 'Veronica', 'Maroon Top In White', 'http://www.anylove.my/index.php?route=product/product&product_id=328&sg_type_pg=latest&sort=p.sort_order&order=ASC&sg_type_pg=latest', NULL, NULL, NULL, 'black', 'uploads/attachments/products/large/10_559a1049bee70.jpg', 'uploads/attachments/products/middle/10_559a1049bee70.jpg', 'uploads/attachments/products/square/10_559a1049bee70.jpg', '300', '430', 'image', 'web', 69, 1, 1436160074, 0, 1, ''),
(17, 10, 'Veronica', 'Nomad Femme Asymmetrical Pullover', 'http://coccha.com/product/nomad-femme-asymmetrical-pullover/', NULL, NULL, NULL, 'black', 'uploads/attachments/products/large/10_559a1089e4364.jpg', 'uploads/attachments/products/middle/10_559a1089e4364.jpg', 'uploads/attachments/products/square/10_559a1089e4364.jpg', '482', '726', 'image', 'web', 159.9, 1, 1436160138, 0, 1, ''),
(18, 10, 'Veronica', 'Maquelle Peplum Top', 'https://tr.styles.my/?type=deeplink&id=17148&media=251', NULL, NULL, NULL, 'red', 'uploads/attachments/products/large/10_559a10d00a28d.jpg', 'uploads/attachments/products/middle/10_559a10d00a28d.jpg', 'uploads/attachments/products/square/10_559a10d00a28d.jpg', '400', '600', 'image', 'web', 58, 1, 1436160213, 0, 1, ''),
(19, 10, 'Veronica', 'Fancyqube Jewelry Womens Crystal Angel Tears Drop Water Pendant Necklace Light Blue ', 'https://tr.styles.my/?type=deeplink&id=17150&media=251', NULL, NULL, NULL, 'gray', 'uploads/attachments/products/large/10_559a114449346.jpg', 'uploads/attachments/products/middle/10_559a114449346.jpg', 'uploads/attachments/products/square/10_559a114449346.jpg', '340', '510', 'image', 'web', 9.4, 1, 1436160324, 0, 1, ''),
(20, 10, 'Veronica', 'Azalea Origami Skorts', 'https://tr.styles.my/?type=deeplink&id=17151&media=251', NULL, NULL, NULL, 'black', 'uploads/attachments/products/large/10_559a11d764139.jpg', 'uploads/attachments/products/middle/10_559a11d764139.jpg', 'uploads/attachments/products/square/10_559a11d764139.jpg', '400', '598', 'image', 'web', 72, 1, 1436160472, 0, 1, ''),
(21, 20, 'wendy', ' Peplum Top (Cream) ', 'https://tr.styles.my/?type=deeplink&id=17328&media=251', NULL, NULL, NULL, 'yellow', 'uploads/attachments/products/large/20_559cad34cbb97.jpg', 'uploads/attachments/products/middle/20_559cad34cbb97.jpg', 'uploads/attachments/products/square/20_559cad34cbb97.jpg', '340', '510', 'image', 'web', 149, 1, 1436331317, 0, 1, ''),
(22, 152, 'Ck.Cheng', 'Dressabelle Waist Detail Textured Dress (Blue) ', 'https://tr.styles.my/?type=deeplink&id=17763&media=251', NULL, NULL, NULL, 'blue', 'uploads/attachments/products/large/152_55a38f6a8ac9b.jpg', 'uploads/attachments/products/middle/152_55a38f6a8ac9b.jpg', 'uploads/attachments/products/square/152_55a38f6a8ac9b.jpg', '340', '510', 'image', 'web', 89, 1, 1436782443, 0, 1, ''),
(23, 152, 'Ck.Cheng', 'Sanwood Formal Bridesmaid Dress (Blue)', 'https://tr.styles.my/?type=deeplink&id=18049&media=251', NULL, NULL, NULL, 'blue', 'uploads/attachments/products/large/152_55a7426fad6b6.jpg', 'uploads/attachments/products/middle/152_55a7426fad6b6.jpg', 'uploads/attachments/products/square/152_55a7426fad6b6.jpg', '340', '510', 'image', 'web', 93.8, 1, 1437024880, 0, 1, ''),
(26, 152, 'Ck.Cheng', 'Zada Lia Jubah (Dusty Blue)', 'https://tr.styles.my/?type=deeplink&id=18050&media=251', NULL, NULL, NULL, 'purple', 'uploads/attachments/products/large/152_55a743d9220b1.jpg', 'uploads/attachments/products/middle/152_55a743d9220b1.jpg', 'uploads/attachments/products/square/152_55a743d9220b1.jpg', '340', '510', 'image', 'web', 120, 1, 1437025241, 0, 1, ''),
(25, 152, 'Ck.Cheng', 'Gene Martino Duo Tone Pattern Baju Kurung Green', 'https://tr.styles.my/?type=deeplink&id=18051&media=251', NULL, NULL, NULL, 'blue', 'uploads/attachments/products/large/152_55a7433dc0eb1.jpg', 'uploads/attachments/products/middle/152_55a7433dc0eb1.jpg', 'uploads/attachments/products/square/152_55a7433dc0eb1.jpg', '340', '510', 'image', 'web', 102, 1, 1437025086, 0, 1, ''),
(27, 152, 'Ck.Cheng', 'ZADA Nadya Baju Kurung Lovely Blue ', 'https://tr.styles.my/?type=deeplink&id=18052&media=251', NULL, NULL, NULL, 'blue', 'uploads/attachments/products/large/152_55a74414bd17d.jpg', 'uploads/attachments/products/middle/152_55a74414bd17d.jpg', 'uploads/attachments/products/square/152_55a74414bd17d.jpg', '340', '510', 'image', 'web', 179, 1, 1437025301, 0, 1, ''),
(29, 152, 'Ck.Cheng', 'Traxia Skort In Blossom Floral Print', 'http://www.anylove.my/index.php?route=product/product&product_id=343&sg_type_pg=latest&sort=p.sort_order&order=ASC&sg_type_pg=latest', NULL, NULL, NULL, 'black', 'uploads/attachments/products/large/152_55a75dbf2d498.jpg', 'uploads/attachments/products/middle/152_55a75dbf2d498.jpg', 'uploads/attachments/products/square/152_55a75dbf2d498.jpg', '300', '430', 'image', 'web', 59, 1, 1437031871, 0, 1, ''),
(30, 99, 'mahedi', '| Best Seller | : Frinde Lace Romper - Navy', 'http://keimag.com.my/best-seller/frinde-lace-romper-navy', NULL, NULL, NULL, 'black', 'uploads/attachments/products/large/99_55a782fca5f47.jpg', 'uploads/attachments/products/middle/99_55a782fca5f47.jpg', 'uploads/attachments/products/square/99_55a782fca5f47.jpg', '400', '600', 'image', 'web', 64, 1, 1437041405, 0, 1, ''),
(31, 152, 'Ck.Cheng', 'Zelias Peplum Top In Red', 'http://www.anylove.my/index.php?route=product/product&product_id=327&sg_type_pg=latest&sort=p.sort_order&order=ASC&sg_type_pg=latest', NULL, NULL, NULL, 'red', 'uploads/attachments/products/large/152_55ac8399b607d.jpg', 'uploads/attachments/products/middle/152_55ac8399b607d.jpg', 'uploads/attachments/products/square/152_55ac8399b607d.jpg', '300', '430', 'image', 'web', 69, 1, 1437369242, 0, 1, ''),
(32, 152, 'Ck.Cheng', 'mc890 Abigail Lace insert dress with cap sleeves', 'http://emceecouture.com/shop/mc890-abigail/', NULL, NULL, NULL, 'black', 'uploads/attachments/products/large/152_55ac90e605ef9.jpg', 'uploads/attachments/products/middle/152_55ac90e605ef9.jpg', 'uploads/attachments/products/square/152_55ac90e605ef9.jpg', '400', '666', 'image', 'web', 119, 1, 1437372646, 0, 1, ''),
(34, 152, 'Ck.Cheng', 'Premium Sonia Pencil Dress In Green', 'http://www.anylove.my/index.php?route=product/product&product_id=331&sg_type_pg=latest&sort=p.sort_order&order=ASC&sg_type_pg=latest', NULL, NULL, NULL, 'black', 'uploads/attachments/products/large/152_55ac9828681dd.jpg', 'uploads/attachments/products/middle/152_55ac9828681dd.jpg', 'uploads/attachments/products/square/152_55ac9828681dd.jpg', '300', '430', 'image', 'web', 95, 1, 1437374505, 0, 1, ''),
(35, 152, 'Ck.Cheng', 'Retro Style Rome Long Sleeves Top (Blue) ', 'https://tr.styles.my/?type=deeplink&id=18225&media=251', NULL, NULL, NULL, 'black', 'uploads/attachments/products/large/152_55adc66fb6f89.jpg', 'uploads/attachments/products/middle/152_55adc66fb6f89.jpg', 'uploads/attachments/products/square/152_55adc66fb6f89.jpg', '340', '510', 'image', 'web', 29.9, 1, 1437451889, 0, 1, ''),
(36, 152, 'Ck.Cheng', 'Korean Style Leopard Printed Long Sleeves Top (Khaki)', 'https://tr.styles.my/?type=deeplink&id=18237&media=251', NULL, NULL, NULL, 'black', 'uploads/attachments/products/large/152_55ade78ab81dc.jpg', 'uploads/attachments/products/middle/152_55ade78ab81dc.jpg', 'uploads/attachments/products/square/152_55ade78ab81dc.jpg', '340', '510', 'image', 'web', 24.9, 1, 1437460363, 0, 1, ''),
(37, 152, 'Ck.Cheng', 'SoKaNo Trendz 12007 PU Leather Tote Bag- Brown ', 'https://tr.styles.my/?type=deeplink&id=18288&media=251', NULL, NULL, NULL, 'red', 'uploads/attachments/products/large/152_55af17d14b9bc.jpg', 'uploads/attachments/products/middle/152_55af17d14b9bc.jpg', 'uploads/attachments/products/square/152_55af17d14b9bc.jpg', '340', '510', 'image', 'web', 45, 1, 1437538258, 0, 1, ''),
(40, 152, 'Ck.Cheng', ' Maquelle Dress', 'http://keimag.com.my/new-in/maquelle-dress', NULL, NULL, NULL, 'purple', 'uploads/attachments/products/large/152_55af20b3d9091.jpg', 'uploads/attachments/products/middle/152_55af20b3d9091.jpg', 'uploads/attachments/products/square/152_55af20b3d9091.jpg', '800', '1200', 'image', 'web', 62, 1, 1437540532, 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `item_color`
--

CREATE TABLE IF NOT EXISTS `item_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size_id` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item_size`
--

CREATE TABLE IF NOT EXISTS `item_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE IF NOT EXISTS `relationship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `relation_status` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_relation_id` (`id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_friend_id` (`friend_id`),
  KEY `idx_user_friend_id` (`user_id`,`friend_id`),
  KEY `idx_user_id_status` (`user_id`,`relation_status`),
  KEY `idx_friend_id_status` (`friend_id`,`relation_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`id`, `user_id`, `friend_id`, `relation_status`) VALUES
(1, 10, 6, 1),
(2, 20, 10, 1),
(3, 20, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `set_key` varchar(100) NOT NULL,
  `set_value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_setting_id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `set_key`, `set_value`) VALUES
(1, 'ui_styles', 'a:4:{s:5:"style";s:7:"puzzing";s:5:"color";s:7:"default";s:7:"puzzing";a:6:{s:3:"red";a:39:{s:10:"themecolor";s:7:"#9d261d";s:11:"bordercolor";s:4:"#DDD";s:9:"smallFont";s:4:"13px";s:10:"mediumFont";s:4:"14px";s:9:"largeFont";s:4:"15px";s:4:"gray";s:4:"#999";s:4:"blue";s:7:"#049cdb";s:5:"green";s:7:"#46a546";s:3:"red";s:7:"#9d261d";s:6:"yellow";s:7:"#ffc40d";s:6:"orange";s:7:"#f89406";s:4:"pink";s:7:"#c3325f";s:6:"purple";s:7:"#7a43b6";s:9:"puzzColor";s:7:"#9d261d";s:14:"bodyBackground";s:4:"#fff";s:9:"textColor";s:9:"@grayDark";s:9:"linkColor";s:7:"#9d261d";s:15:"contentBackPath";s:24:"@{imagePath}/bgnoise.gif";s:17:"contentBackGround";s:45:"#F0F0F0 url(@{contentBackPath}) repeat -70% 0";s:22:"contentInnerBackGround";s:46:"url(@{imagePath}/big-fade.png) repeat-x -70% 0";s:14:"boldFontFamily";s:17:"''Microsoft YaHei''";s:14:"baseFontFamily";s:71:"tahoma,''Helvetica Neue'', Arial, ''Liberation Sans'', FreeSans, sans-serif";s:14:"baseLineHeight";s:4:"18px";s:15:"inputBackground";s:4:"#fff";s:11:"inputBorder";s:4:"#ccc";s:18:"dropdownBackground";s:6:"@white";s:14:"dropdownBorder";s:14:"rgba(0,0,0,.1)";s:17:"dropdownLinkColor";s:5:"@gray";s:22:"dropdownLinkColorHover";s:4:"#fff";s:27:"dropdownLinkBackgroundHover";s:10:"@puzzColor";s:15:"dropdownDivider";s:19:"lighten(@gray, 20%)";s:12:"navbarHeight";s:4:"51px";s:16:"navbarBackground";s:16:"darken(@red, 5%)";s:25:"navbarBackgroundHighlight";s:17:"darken(@red, 15%)";s:10:"navbarText";s:6:"@white";s:15:"navbarLinkColor";s:6:"@white";s:20:"navbarLinkColorHover";s:4:"#fff";s:12:"navtxtshadow";s:24:"0 -1px 0 rgba(0,0,0,.25)";s:22:"navbarSearchBackground";s:31:"lighten(@navbarBackground, 25%)";}s:5:"white";a:39:{s:10:"themecolor";s:7:"#f5f5f5";s:11:"bordercolor";s:4:"#DDD";s:9:"smallFont";s:4:"13px";s:10:"mediumFont";s:4:"14px";s:9:"largeFont";s:4:"15px";s:4:"gray";s:4:"#999";s:4:"blue";s:7:"#049cdb";s:5:"green";s:7:"#46a546";s:3:"red";s:7:"#9d261d";s:6:"yellow";s:7:"#ffc40d";s:6:"orange";s:7:"#f89406";s:4:"pink";s:7:"#c3325f";s:6:"purple";s:7:"#7a43b6";s:9:"puzzColor";s:7:"#EA4C89";s:14:"bodyBackground";s:4:"#fff";s:9:"textColor";s:9:"@grayDark";s:9:"linkColor";s:7:"#EA4C89";s:15:"contentBackPath";s:24:"@{imagePath}/bgnoise.gif";s:17:"contentBackGround";s:45:"#F0F0F0 url(@{contentBackPath}) repeat -70% 0";s:22:"contentInnerBackGround";s:4:"none";s:14:"boldFontFamily";s:17:"''Microsoft YaHei''";s:14:"baseFontFamily";s:71:"tahoma,''Helvetica Neue'', Arial, ''Liberation Sans'', FreeSans, sans-serif";s:14:"baseLineHeight";s:4:"18px";s:15:"inputBackground";s:4:"#fff";s:11:"inputBorder";s:4:"#ccc";s:18:"dropdownBackground";s:4:"#fff";s:14:"dropdownBorder";s:14:"rgba(0,0,0,.2)";s:17:"dropdownLinkColor";s:5:"@gray";s:22:"dropdownLinkColorHover";s:4:"#fff";s:27:"dropdownLinkBackgroundHover";s:10:"@puzzColor";s:15:"dropdownDivider";s:19:"lighten(@gray, 20%)";s:12:"navbarHeight";s:4:"51px";s:16:"navbarBackground";s:6:"@white";s:25:"navbarBackgroundHighlight";s:6:"@white";s:10:"navbarText";s:9:"@grayDark";s:15:"navbarLinkColor";s:9:"@grayDark";s:20:"navbarLinkColorHover";s:10:"@puzzColor";s:12:"navtxtshadow";s:4:"none";s:22:"navbarSearchBackground";s:31:"lighten(@navbarBackground, 25%)";}s:4:"blue";a:39:{s:10:"themecolor";s:7:"#0899d9";s:11:"bordercolor";s:4:"#DDD";s:9:"smallFont";s:4:"13px";s:10:"mediumFont";s:4:"14px";s:9:"largeFont";s:4:"15px";s:4:"gray";s:4:"#999";s:4:"blue";s:7:"#0899d9";s:5:"green";s:7:"#46a546";s:3:"red";s:7:"#9d261d";s:6:"yellow";s:7:"#ffc40d";s:6:"orange";s:7:"#f89406";s:4:"pink";s:7:"#c3325f";s:6:"purple";s:7:"#7a43b6";s:9:"puzzColor";s:7:"#0899d9";s:14:"bodyBackground";s:4:"#fff";s:9:"textColor";s:5:"@gray";s:9:"linkColor";s:18:"darken(@blue, 10%)";s:15:"contentBackPath";s:24:"@{imagePath}/bgnoise.gif";s:17:"contentBackGround";s:45:"#F0F0F0 url(@{contentBackPath}) repeat -70% 0";s:22:"contentInnerBackGround";s:46:"url(@{imagePath}/big-fade.png) repeat-x -70% 0";s:14:"boldFontFamily";s:17:"''Microsoft YaHei''";s:14:"baseFontFamily";s:71:"tahoma,''Helvetica Neue'', Arial, ''Liberation Sans'', FreeSans, sans-serif";s:14:"baseLineHeight";s:4:"18px";s:15:"inputBackground";s:4:"#fff";s:11:"inputBorder";s:4:"#ccc";s:18:"dropdownBackground";s:6:"@white";s:14:"dropdownBorder";s:14:"rgba(0,0,0,.2)";s:17:"dropdownLinkColor";s:19:"lighten(@gray, 10%)";s:22:"dropdownLinkColorHover";s:4:"#fff";s:27:"dropdownLinkBackgroundHover";s:10:"@puzzColor";s:15:"dropdownDivider";s:19:"lighten(@gray, 20%)";s:12:"navbarHeight";s:4:"51px";s:16:"navbarBackground";s:18:"darken(@blue, 10%)";s:25:"navbarBackgroundHighlight";s:18:"darken(@blue, 15%)";s:10:"navbarText";s:19:"lighten(@blue, 50%)";s:15:"navbarLinkColor";s:19:"lighten(@blue, 50%)";s:20:"navbarLinkColorHover";s:4:"#fff";s:12:"navtxtshadow";s:24:"0 -1px 0 rgba(0,0,0,.25)";s:22:"navbarSearchBackground";s:31:"lighten(@navbarBackground, 25%)";}s:6:"orange";a:39:{s:10:"themecolor";s:7:"#f89406";s:11:"bordercolor";s:4:"#DDD";s:9:"smallFont";s:4:"13px";s:10:"mediumFont";s:4:"14px";s:9:"largeFont";s:4:"15px";s:4:"gray";s:4:"#999";s:4:"blue";s:7:"#049cdb";s:5:"green";s:7:"#46a546";s:3:"red";s:7:"#9d261d";s:6:"yellow";s:7:"#ffc40d";s:6:"orange";s:7:"#f89406";s:4:"pink";s:7:"#c3325f";s:6:"purple";s:7:"#7a43b6";s:9:"puzzColor";s:7:"#f89406";s:14:"bodyBackground";s:4:"#fff";s:9:"textColor";s:9:"@grayDark";s:9:"linkColor";s:7:"#f89406";s:15:"contentBackPath";s:24:"@{imagePath}/bgnoise.gif";s:17:"contentBackGround";s:45:"#F0F0F0 url(@{contentBackPath}) repeat -70% 0";s:22:"contentInnerBackGround";s:46:"url(@{imagePath}/big-fade.png) repeat-x -70% 0";s:14:"boldFontFamily";s:17:"''Microsoft YaHei''";s:14:"baseFontFamily";s:71:"tahoma,''Helvetica Neue'', Arial, ''Liberation Sans'', FreeSans, sans-serif";s:14:"baseLineHeight";s:4:"18px";s:15:"inputBackground";s:4:"#fff";s:11:"inputBorder";s:4:"#ccc";s:18:"dropdownBackground";s:6:"@white";s:14:"dropdownBorder";s:14:"rgba(0,0,0,.1)";s:17:"dropdownLinkColor";s:5:"@gray";s:22:"dropdownLinkColorHover";s:4:"#fff";s:27:"dropdownLinkBackgroundHover";s:10:"@puzzColor";s:15:"dropdownDivider";s:19:"lighten(@gray, 25%)";s:12:"navbarHeight";s:4:"51px";s:16:"navbarBackground";s:23:"darken(@puzzColor, 10%)";s:25:"navbarBackgroundHighlight";s:23:"darken(@puzzColor, 15%)";s:10:"navbarText";s:24:"lighten(@puzzColor, 50%)";s:15:"navbarLinkColor";s:24:"lighten(@puzzColor, 60%)";s:20:"navbarLinkColorHover";s:4:"#fff";s:12:"navtxtshadow";s:24:"0 -1px 0 rgba(0,0,0,.25)";s:22:"navbarSearchBackground";s:31:"lighten(@navbarBackground, 15%)";}s:4:"gray";a:39:{s:10:"themecolor";s:4:"#666";s:11:"bordercolor";s:4:"#DDD";s:9:"smallFont";s:4:"13px";s:10:"mediumFont";s:4:"14px";s:9:"largeFont";s:4:"15px";s:4:"gray";s:4:"#999";s:4:"blue";s:7:"#049cdb";s:5:"green";s:7:"#46a546";s:3:"red";s:7:"#9d261d";s:6:"yellow";s:7:"#ffc40d";s:6:"orange";s:7:"#f89406";s:4:"pink";s:7:"#c3325f";s:6:"purple";s:7:"#7a43b6";s:9:"puzzColor";s:4:"#999";s:14:"bodyBackground";s:4:"#fff";s:9:"textColor";s:9:"@grayDark";s:9:"linkColor";s:10:"@puzzColor";s:15:"contentBackPath";s:24:"@{imagePath}/bgnoise.gif";s:17:"contentBackGround";s:45:"#F0F0F0 url(@{contentBackPath}) repeat -70% 0";s:22:"contentInnerBackGround";s:46:"url(@{imagePath}/big-fade.png) repeat-x -70% 0";s:14:"boldFontFamily";s:17:"''Microsoft YaHei''";s:14:"baseFontFamily";s:71:"tahoma,''Helvetica Neue'', Arial, ''Liberation Sans'', FreeSans, sans-serif";s:14:"baseLineHeight";s:4:"18px";s:15:"inputBackground";s:4:"#fff";s:11:"inputBorder";s:4:"#ccc";s:18:"dropdownBackground";s:6:"@white";s:14:"dropdownBorder";s:14:"rgba(0,0,0,.2)";s:17:"dropdownLinkColor";s:5:"@gray";s:22:"dropdownLinkColorHover";s:4:"#fff";s:27:"dropdownLinkBackgroundHover";s:10:"@puzzColor";s:15:"dropdownDivider";s:19:"lighten(@gray, 25%)";s:12:"navbarHeight";s:4:"51px";s:16:"navbarBackground";s:23:"darken(@puzzColor, 15%)";s:25:"navbarBackgroundHighlight";s:23:"darken(@puzzColor, 20%)";s:10:"navbarText";s:24:"lighten(@puzzColor, 50%)";s:15:"navbarLinkColor";s:24:"lighten(@puzzColor, 60%)";s:20:"navbarLinkColorHover";s:4:"#fff";s:12:"navtxtshadow";s:24:"0 -1px 0 rgba(0,0,0,.25)";s:22:"navbarSearchBackground";s:31:"lighten(@navbarBackground, 15%)";}s:4:"pink";a:39:{s:10:"themecolor";s:7:"#ff72a0";s:11:"bordercolor";s:4:"#DDD";s:9:"smallFont";s:4:"13px";s:10:"mediumFont";s:4:"14px";s:9:"largeFont";s:4:"15px";s:4:"gray";s:4:"#999";s:4:"blue";s:7:"#049cdb";s:5:"green";s:7:"#46a546";s:3:"red";s:7:"#9d261d";s:6:"yellow";s:7:"#ffc40d";s:6:"orange";s:7:"#f89406";s:4:"pink";s:7:"#c3325f";s:6:"purple";s:7:"#7a43b6";s:9:"puzzColor";s:7:"#ff72a0";s:14:"bodyBackground";s:4:"#fff";s:9:"textColor";s:9:"@grayDark";s:9:"linkColor";s:10:"@puzzColor";s:15:"contentBackPath";s:24:"@{imagePath}/bgnoise.gif";s:17:"contentBackGround";s:45:"#F0F0F0 url(@{contentBackPath}) repeat -70% 0";s:22:"contentInnerBackGround";s:46:"url(@{imagePath}/big-fade.png) repeat-x -70% 0";s:14:"boldFontFamily";s:17:"''Microsoft YaHei''";s:14:"baseFontFamily";s:71:"tahoma,''Helvetica Neue'', Arial, ''Liberation Sans'', FreeSans, sans-serif";s:14:"baseLineHeight";s:4:"18px";s:15:"inputBackground";s:4:"#fff";s:11:"inputBorder";s:4:"#ccc";s:18:"dropdownBackground";s:6:"@white";s:14:"dropdownBorder";s:14:"rgba(0,0,0,.2)";s:17:"dropdownLinkColor";s:5:"@gray";s:22:"dropdownLinkColorHover";s:4:"#fff";s:27:"dropdownLinkBackgroundHover";s:10:"@puzzColor";s:15:"dropdownDivider";s:19:"lighten(@gray, 25%)";s:12:"navbarHeight";s:4:"51px";s:16:"navbarBackground";s:23:"lighten(@puzzColor, 5%)";s:25:"navbarBackgroundHighlight";s:24:"lighten(@puzzColor, 10%)";s:10:"navbarText";s:24:"lighten(@puzzColor, 50%)";s:15:"navbarLinkColor";s:24:"lighten(@puzzColor, 60%)";s:20:"navbarLinkColorHover";s:4:"#fff";s:12:"navtxtshadow";s:4:"none";s:22:"navbarSearchBackground";s:31:"lighten(@navbarBackground, 15%)";}}s:12:"custom_theme";a:1:{s:7:"skyblue";a:39:{s:10:"themecolor";s:7:"#46bfc4";s:11:"bordercolor";s:4:"#DDD";s:9:"smallFont";s:4:"13px";s:10:"mediumFont";s:4:"14px";s:9:"largeFont";s:4:"15px";s:4:"gray";s:4:"#999";s:4:"blue";s:7:"#049cdb";s:5:"green";s:7:"#46a546";s:3:"red";s:7:"#9d261d";s:6:"yellow";s:7:"#ffc40d";s:6:"orange";s:7:"#f89406";s:4:"pink";s:7:"#c3325f";s:6:"purple";s:7:"#7a43b6";s:9:"puzzColor";s:7:"#46bfc4";s:14:"bodyBackground";s:4:"#fff";s:9:"textColor";s:9:"@grayDark";s:9:"linkColor";s:10:"@puzzColor";s:15:"contentBackPath";s:24:"@{imagePath}/bgnoise.gif";s:17:"contentBackGround";s:45:"#F0F0F0 url(@{contentBackPath}) repeat -70% 0";s:22:"contentInnerBackGround";s:46:"url(@{imagePath}/big-fade.png) repeat-x -70% 0";s:14:"boldFontFamily";s:23:"''Open Sans'', sans-serif";s:14:"baseFontFamily";s:23:"''Open Sans'', sans-serif";s:14:"baseLineHeight";s:4:"18px";s:15:"inputBackground";s:4:"#fff";s:11:"inputBorder";s:4:"#ccc";s:18:"dropdownBackground";s:6:"@white";s:14:"dropdownBorder";s:14:"rgba(0,0,0,.1)";s:17:"dropdownLinkColor";s:5:"@gray";s:22:"dropdownLinkColorHover";s:4:"#fff";s:27:"dropdownLinkBackgroundHover";s:10:"@puzzColor";s:15:"dropdownDivider";s:19:"lighten(@gray, 25%)";s:12:"navbarHeight";s:4:"51px";s:16:"navbarBackground";s:22:"darken(@puzzColor, 0%)";s:25:"navbarBackgroundHighlight";s:22:"darken(@puzzColor, 0%)";s:10:"navbarText";s:23:"lighten(@puzzColor, 0%)";s:15:"navbarLinkColor";s:24:"lighten(@puzzColor, 60%)";s:20:"navbarLinkColorHover";s:4:"#fff";s:12:"navtxtshadow";s:24:"0 -1px 0 rgba(0,0,0,.25)";s:22:"navbarSearchBackground";s:4:"#fff";}}}'),
(2, 'credit_name', 'a:4:{s:7:"credits";s:6:"Credits";s:13:"ext_credits_1";s:6:"Repute";s:13:"ext_credits_2";s:6:"Strength";s:13:"ext_credits_3";s:6:"Passion";}'),
(3, 'global_setting', 'a:5:{s:10:"siteclosed";b:0;s:7:"vendors";a:6:{s:6:"taobao";a:6:{s:5:"param";s:6:"Taobao";s:4:"open";b:0;s:6:"appkey";s:0:"";s:9:"appsecret";s:0:"";s:8:"callback";s:0:"";s:3:"pid";s:0:"";}s:4:"sina";a:6:{s:5:"param";s:4:"Sina";s:4:"open";b:0;s:6:"appkey";s:0:"";s:9:"appsecret";s:0:"";s:8:"callback";s:0:"";s:3:"pid";s:0:"";}s:6:"renren";a:6:{s:5:"param";s:6:"Renren";s:4:"open";b:0;s:6:"appkey";s:0:"";s:9:"appsecret";s:0:"";s:8:"callback";s:0:"";s:3:"pid";s:0:"";}s:2:"qq";a:6:{s:5:"param";s:2:"QQ";s:4:"open";b:0;s:6:"appkey";s:0:"";s:9:"appsecret";s:0:"";s:8:"callback";s:0:"";s:3:"pid";s:0:"";}s:8:"facebook";a:6:{s:5:"param";s:8:"Facebook";s:4:"open";b:0;s:6:"appkey";s:0:"";s:9:"appsecret";s:0:"";s:8:"callback";s:0:"";s:3:"pid";s:0:"";}s:7:"twitter";a:6:{s:5:"param";s:7:"Twitter";s:4:"open";b:0;s:6:"appkey";s:0:"";s:9:"appsecret";s:0:"";s:8:"callback";s:0:"";s:3:"pid";s:0:"";}}s:13:"vcode_setting";a:2:{s:5:"login";b:1;s:8:"register";b:1;}s:5:"style";s:7:"puzzing";s:5:"color";s:7:"default";}'),
(4, 'upload', 'a:13:{s:17:"allow_upload_size";s:7:"2048000";s:17:"allow_upload_type";s:15:"jpg|gif|png|zip";s:19:"upload_image_size_w";s:4:"4028";s:19:"upload_image_size_h";s:4:"4028";s:18:"fetch_image_size_w";s:2:"50";s:18:"fetch_image_size_h";s:2:"50";s:13:"allow_max_num";s:2:"10";s:21:"allow_upload_type_swf";s:24:"*.jpg;*.gif;*.png;*.zip;";s:26:"allow_upload_type_swf_desc";s:44:"JPG Files; GIF Files; PNG Files; ZIP Files; ";s:8:"wftwidth";s:3:"220";s:10:"largewidth";s:3:"600";s:11:"squarewidth";s:3:"200";s:13:"delete_source";s:1:"0";}'),
(5, 'vcode_setting', 'a:2:{s:8:"register";s:1:"1";s:5:"login";s:1:"1";}'),
(6, 'share', 'a:11:{s:6:"verify";s:1:"0";s:6:"tagnum";s:1:"1";s:15:"domainwhitelist";s:4:"test";s:13:"title_range_s";s:1:"1";s:13:"title_range_l";s:3:"300";s:15:"content_range_s";s:1:"1";s:15:"content_range_l";s:2:"50";s:15:"comment_range_s";s:1:"5";s:15:"comment_range_l";s:3:"100";s:13:"album_range_s";s:1:"1";s:13:"album_range_l";s:2:"50";}'),
(7, 'global', 'a:29:{s:9:"site_name";s:18:"Yolove.it Malaysia";s:11:"site_domain";s:23:"Http://www.yolove.it/my";s:10:"site_beian";s:0:"";s:10:"siteclosed";s:1:"0";s:17:"site_analyze_code";s:0:"";s:5:"price";s:1:"1";s:9:"priceunit";s:2:"RM";s:13:"priceunitname";s:17:"malaysian ringgit";s:15:"uidefault_login";s:1:"0";s:7:"counter";a:1:{i:0;s:5:"click";}s:10:"store_open";s:1:"1";s:9:"star_open";s:1:"0";s:13:"existedstyles";a:2:{s:12:"custom_theme";a:2:{s:7:"skyblue";i:1;s:7:"default";i:1;}s:7:"puzzing";a:7:{s:3:"red";i:1;s:5:"white";i:1;s:4:"blue";i:1;s:6:"orange";i:1;s:4:"gray";i:1;s:4:"pink";i:1;s:7:"default";i:1;}}s:5:"style";s:12:"custom_theme";s:5:"color";s:7:"skyblue";s:6:"colors";a:8:{s:3:"red";a:39:{s:10:"themecolor";s:7:"#9d261d";s:11:"bordercolor";s:4:"#DDD";s:9:"smallFont";s:4:"13px";s:10:"mediumFont";s:4:"14px";s:9:"largeFont";s:4:"15px";s:4:"gray";s:4:"#999";s:4:"blue";s:7:"#049cdb";s:5:"green";s:7:"#46a546";s:3:"red";s:7:"#9d261d";s:6:"yellow";s:7:"#ffc40d";s:6:"orange";s:7:"#f89406";s:4:"pink";s:7:"#c3325f";s:6:"purple";s:7:"#7a43b6";s:9:"puzzColor";s:7:"#9d261d";s:14:"bodyBackground";s:4:"#fff";s:9:"textColor";s:9:"@grayDark";s:9:"linkColor";s:7:"#9d261d";s:15:"contentBackPath";s:24:"@{imagePath}/bgnoise.gif";s:17:"contentBackGround";s:45:"#F0F0F0 url(@{contentBackPath}) repeat -70% 0";s:22:"contentInnerBackGround";s:46:"url(@{imagePath}/big-fade.png) repeat-x -70% 0";s:14:"boldFontFamily";s:17:"''Microsoft YaHei''";s:14:"baseFontFamily";s:71:"tahoma,''Helvetica Neue'', Arial, ''Liberation Sans'', FreeSans, sans-serif";s:14:"baseLineHeight";s:4:"18px";s:15:"inputBackground";s:4:"#fff";s:11:"inputBorder";s:4:"#ccc";s:18:"dropdownBackground";s:6:"@white";s:14:"dropdownBorder";s:14:"rgba(0,0,0,.1)";s:17:"dropdownLinkColor";s:5:"@gray";s:22:"dropdownLinkColorHover";s:4:"#fff";s:27:"dropdownLinkBackgroundHover";s:10:"@puzzColor";s:15:"dropdownDivider";s:19:"lighten(@gray, 20%)";s:12:"navbarHeight";s:4:"51px";s:16:"navbarBackground";s:16:"darken(@red, 5%)";s:25:"navbarBackgroundHighlight";s:17:"darken(@red, 15%)";s:10:"navbarText";s:6:"@white";s:15:"navbarLinkColor";s:6:"@white";s:20:"navbarLinkColorHover";s:4:"#fff";s:12:"navtxtshadow";s:24:"0 -1px 0 rgba(0,0,0,.25)";s:22:"navbarSearchBackground";s:31:"lighten(@navbarBackground, 25%)";}s:5:"white";a:39:{s:10:"themecolor";s:7:"#f5f5f5";s:11:"bordercolor";s:4:"#DDD";s:9:"smallFont";s:4:"13px";s:10:"mediumFont";s:4:"14px";s:9:"largeFont";s:4:"15px";s:4:"gray";s:4:"#999";s:4:"blue";s:7:"#049cdb";s:5:"green";s:7:"#46a546";s:3:"red";s:7:"#9d261d";s:6:"yellow";s:7:"#ffc40d";s:6:"orange";s:7:"#f89406";s:4:"pink";s:7:"#c3325f";s:6:"purple";s:7:"#7a43b6";s:9:"puzzColor";s:7:"#EA4C89";s:14:"bodyBackground";s:4:"#fff";s:9:"textColor";s:9:"@grayDark";s:9:"linkColor";s:7:"#EA4C89";s:15:"contentBackPath";s:24:"@{imagePath}/bgnoise.gif";s:17:"contentBackGround";s:45:"#F0F0F0 url(@{contentBackPath}) repeat -70% 0";s:22:"contentInnerBackGround";s:4:"none";s:14:"boldFontFamily";s:17:"''Microsoft YaHei''";s:14:"baseFontFamily";s:71:"tahoma,''Helvetica Neue'', Arial, ''Liberation Sans'', FreeSans, sans-serif";s:14:"baseLineHeight";s:4:"18px";s:15:"inputBackground";s:4:"#fff";s:11:"inputBorder";s:4:"#ccc";s:18:"dropdownBackground";s:4:"#fff";s:14:"dropdownBorder";s:14:"rgba(0,0,0,.2)";s:17:"dropdownLinkColor";s:5:"@gray";s:22:"dropdownLinkColorHover";s:4:"#fff";s:27:"dropdownLinkBackgroundHover";s:10:"@puzzColor";s:15:"dropdownDivider";s:19:"lighten(@gray, 20%)";s:12:"navbarHeight";s:4:"51px";s:16:"navbarBackground";s:6:"@white";s:25:"navbarBackgroundHighlight";s:6:"@white";s:10:"navbarText";s:9:"@grayDark";s:15:"navbarLinkColor";s:9:"@grayDark";s:20:"navbarLinkColorHover";s:10:"@puzzColor";s:12:"navtxtshadow";s:4:"none";s:22:"navbarSearchBackground";s:31:"lighten(@navbarBackground, 25%)";}s:4:"blue";a:39:{s:10:"themecolor";s:7:"#0899d9";s:11:"bordercolor";s:4:"#DDD";s:9:"smallFont";s:4:"13px";s:10:"mediumFont";s:4:"14px";s:9:"largeFont";s:4:"15px";s:4:"gray";s:4:"#999";s:4:"blue";s:7:"#0899d9";s:5:"green";s:7:"#46a546";s:3:"red";s:7:"#9d261d";s:6:"yellow";s:7:"#ffc40d";s:6:"orange";s:7:"#f89406";s:4:"pink";s:7:"#c3325f";s:6:"purple";s:7:"#7a43b6";s:9:"puzzColor";s:7:"#0899d9";s:14:"bodyBackground";s:4:"#fff";s:9:"textColor";s:5:"@gray";s:9:"linkColor";s:18:"darken(@blue, 10%)";s:15:"contentBackPath";s:24:"@{imagePath}/bgnoise.gif";s:17:"contentBackGround";s:45:"#F0F0F0 url(@{contentBackPath}) repeat -70% 0";s:22:"contentInnerBackGround";s:46:"url(@{imagePath}/big-fade.png) repeat-x -70% 0";s:14:"boldFontFamily";s:17:"''Microsoft YaHei''";s:14:"baseFontFamily";s:71:"tahoma,''Helvetica Neue'', Arial, ''Liberation Sans'', FreeSans, sans-serif";s:14:"baseLineHeight";s:4:"18px";s:15:"inputBackground";s:4:"#fff";s:11:"inputBorder";s:4:"#ccc";s:18:"dropdownBackground";s:6:"@white";s:14:"dropdownBorder";s:14:"rgba(0,0,0,.2)";s:17:"dropdownLinkColor";s:19:"lighten(@gray, 10%)";s:22:"dropdownLinkColorHover";s:4:"#fff";s:27:"dropdownLinkBackgroundHover";s:10:"@puzzColor";s:15:"dropdownDivider";s:19:"lighten(@gray, 20%)";s:12:"navbarHeight";s:4:"51px";s:16:"navbarBackground";s:18:"darken(@blue, 10%)";s:25:"navbarBackgroundHighlight";s:18:"darken(@blue, 15%)";s:10:"navbarText";s:19:"lighten(@blue, 50%)";s:15:"navbarLinkColor";s:19:"lighten(@blue, 50%)";s:20:"navbarLinkColorHover";s:4:"#fff";s:12:"navtxtshadow";s:24:"0 -1px 0 rgba(0,0,0,.25)";s:22:"navbarSearchBackground";s:31:"lighten(@navbarBackground, 25%)";}s:6:"orange";a:39:{s:10:"themecolor";s:7:"#f89406";s:11:"bordercolor";s:4:"#DDD";s:9:"smallFont";s:4:"13px";s:10:"mediumFont";s:4:"14px";s:9:"largeFont";s:4:"15px";s:4:"gray";s:4:"#999";s:4:"blue";s:7:"#049cdb";s:5:"green";s:7:"#46a546";s:3:"red";s:7:"#9d261d";s:6:"yellow";s:7:"#ffc40d";s:6:"orange";s:7:"#f89406";s:4:"pink";s:7:"#c3325f";s:6:"purple";s:7:"#7a43b6";s:9:"puzzColor";s:7:"#f89406";s:14:"bodyBackground";s:4:"#fff";s:9:"textColor";s:9:"@grayDark";s:9:"linkColor";s:7:"#f89406";s:15:"contentBackPath";s:24:"@{imagePath}/bgnoise.gif";s:17:"contentBackGround";s:45:"#F0F0F0 url(@{contentBackPath}) repeat -70% 0";s:22:"contentInnerBackGround";s:46:"url(@{imagePath}/big-fade.png) repeat-x -70% 0";s:14:"boldFontFamily";s:17:"''Microsoft YaHei''";s:14:"baseFontFamily";s:71:"tahoma,''Helvetica Neue'', Arial, ''Liberation Sans'', FreeSans, sans-serif";s:14:"baseLineHeight";s:4:"18px";s:15:"inputBackground";s:4:"#fff";s:11:"inputBorder";s:4:"#ccc";s:18:"dropdownBackground";s:6:"@white";s:14:"dropdownBorder";s:14:"rgba(0,0,0,.1)";s:17:"dropdownLinkColor";s:5:"@gray";s:22:"dropdownLinkColorHover";s:4:"#fff";s:27:"dropdownLinkBackgroundHover";s:10:"@puzzColor";s:15:"dropdownDivider";s:19:"lighten(@gray, 25%)";s:12:"navbarHeight";s:4:"51px";s:16:"navbarBackground";s:23:"darken(@puzzColor, 10%)";s:25:"navbarBackgroundHighlight";s:23:"darken(@puzzColor, 15%)";s:10:"navbarText";s:24:"lighten(@puzzColor, 50%)";s:15:"navbarLinkColor";s:24:"lighten(@puzzColor, 60%)";s:20:"navbarLinkColorHover";s:4:"#fff";s:12:"navtxtshadow";s:24:"0 -1px 0 rgba(0,0,0,.25)";s:22:"navbarSearchBackground";s:31:"lighten(@navbarBackground, 15%)";}s:4:"gray";a:39:{s:10:"themecolor";s:4:"#666";s:11:"bordercolor";s:4:"#DDD";s:9:"smallFont";s:4:"13px";s:10:"mediumFont";s:4:"14px";s:9:"largeFont";s:4:"15px";s:4:"gray";s:4:"#999";s:4:"blue";s:7:"#049cdb";s:5:"green";s:7:"#46a546";s:3:"red";s:7:"#9d261d";s:6:"yellow";s:7:"#ffc40d";s:6:"orange";s:7:"#f89406";s:4:"pink";s:7:"#c3325f";s:6:"purple";s:7:"#7a43b6";s:9:"puzzColor";s:4:"#999";s:14:"bodyBackground";s:4:"#fff";s:9:"textColor";s:9:"@grayDark";s:9:"linkColor";s:10:"@puzzColor";s:15:"contentBackPath";s:24:"@{imagePath}/bgnoise.gif";s:17:"contentBackGround";s:45:"#F0F0F0 url(@{contentBackPath}) repeat -70% 0";s:22:"contentInnerBackGround";s:46:"url(@{imagePath}/big-fade.png) repeat-x -70% 0";s:14:"boldFontFamily";s:17:"''Microsoft YaHei''";s:14:"baseFontFamily";s:71:"tahoma,''Helvetica Neue'', Arial, ''Liberation Sans'', FreeSans, sans-serif";s:14:"baseLineHeight";s:4:"18px";s:15:"inputBackground";s:4:"#fff";s:11:"inputBorder";s:4:"#ccc";s:18:"dropdownBackground";s:6:"@white";s:14:"dropdownBorder";s:14:"rgba(0,0,0,.2)";s:17:"dropdownLinkColor";s:5:"@gray";s:22:"dropdownLinkColorHover";s:4:"#fff";s:27:"dropdownLinkBackgroundHover";s:10:"@puzzColor";s:15:"dropdownDivider";s:19:"lighten(@gray, 25%)";s:12:"navbarHeight";s:4:"51px";s:16:"navbarBackground";s:23:"darken(@puzzColor, 15%)";s:25:"navbarBackgroundHighlight";s:23:"darken(@puzzColor, 20%)";s:10:"navbarText";s:24:"lighten(@puzzColor, 50%)";s:15:"navbarLinkColor";s:24:"lighten(@puzzColor, 60%)";s:20:"navbarLinkColorHover";s:4:"#fff";s:12:"navtxtshadow";s:24:"0 -1px 0 rgba(0,0,0,.25)";s:22:"navbarSearchBackground";s:31:"lighten(@navbarBackground, 15%)";}s:4:"pink";a:39:{s:10:"themecolor";s:7:"#ff72a0";s:11:"bordercolor";s:4:"#DDD";s:9:"smallFont";s:4:"13px";s:10:"mediumFont";s:4:"14px";s:9:"largeFont";s:4:"15px";s:4:"gray";s:4:"#999";s:4:"blue";s:7:"#049cdb";s:5:"green";s:7:"#46a546";s:3:"red";s:7:"#9d261d";s:6:"yellow";s:7:"#ffc40d";s:6:"orange";s:7:"#f89406";s:4:"pink";s:7:"#c3325f";s:6:"purple";s:7:"#7a43b6";s:9:"puzzColor";s:7:"#ff72a0";s:14:"bodyBackground";s:4:"#fff";s:9:"textColor";s:9:"@grayDark";s:9:"linkColor";s:10:"@puzzColor";s:15:"contentBackPath";s:24:"@{imagePath}/bgnoise.gif";s:17:"contentBackGround";s:45:"#F0F0F0 url(@{contentBackPath}) repeat -70% 0";s:22:"contentInnerBackGround";s:46:"url(@{imagePath}/big-fade.png) repeat-x -70% 0";s:14:"boldFontFamily";s:17:"''Microsoft YaHei''";s:14:"baseFontFamily";s:71:"tahoma,''Helvetica Neue'', Arial, ''Liberation Sans'', FreeSans, sans-serif";s:14:"baseLineHeight";s:4:"18px";s:15:"inputBackground";s:4:"#fff";s:11:"inputBorder";s:4:"#ccc";s:18:"dropdownBackground";s:6:"@white";s:14:"dropdownBorder";s:14:"rgba(0,0,0,.2)";s:17:"dropdownLinkColor";s:5:"@gray";s:22:"dropdownLinkColorHover";s:4:"#fff";s:27:"dropdownLinkBackgroundHover";s:10:"@puzzColor";s:15:"dropdownDivider";s:19:"lighten(@gray, 25%)";s:12:"navbarHeight";s:4:"51px";s:16:"navbarBackground";s:23:"lighten(@puzzColor, 5%)";s:25:"navbarBackgroundHighlight";s:24:"lighten(@puzzColor, 10%)";s:10:"navbarText";s:24:"lighten(@puzzColor, 50%)";s:15:"navbarLinkColor";s:24:"lighten(@puzzColor, 60%)";s:20:"navbarLinkColorHover";s:4:"#fff";s:12:"navtxtshadow";s:4:"none";s:22:"navbarSearchBackground";s:31:"lighten(@navbarBackground, 15%)";}s:7:"default";a:2:{s:4:"name";s:7:"default";s:10:"themecolor";s:4:"#000";}s:7:"skyblue";a:2:{s:4:"name";s:7:"skyblue";s:10:"themecolor";s:7:"#46bfc4";}}s:13:"show_coloridx";s:1:"1";s:16:"show_price_range";s:1:"1";s:19:"price_range_1_label";s:5:"  $  ";s:15:"price_range_1_s";s:1:"0";s:15:"price_range_1_l";s:2:"49";s:19:"price_range_2_label";s:4:" $$ ";s:15:"price_range_2_s";s:2:"50";s:15:"price_range_2_l";s:2:"99";s:19:"price_range_3_label";s:3:"$$$";s:15:"price_range_3_s";s:3:"100";s:15:"price_range_3_l";s:4:"2000";s:10:"site_email";s:0:"";s:11:"site_banner";s:37:"uploads/attachments/banner/banner.png";}'),
(8, 'layoutpin', 'a:12:{s:16:"uipin_numperpage";s:2:"20";s:16:"uipin_numcomment";s:1:"0";s:17:"uipin_columnwidth";s:3:"235";s:14:"uipin_animated";s:1:"1";s:9:"uipin_ads";s:1:"0";s:17:"uipin_showforward";s:1:"1";s:10:"uipin_auto";s:1:"1";s:11:"uipin_multi";s:1:"0";s:17:"uipin_showarticle";s:1:"0";s:12:"uipin_layout";s:10:"ls_article";s:14:"uipin_timesort";s:11:"create_time";s:20:"uipin_numbershowpage";s:1:"0";}'),
(9, 'layouthome', 'a:9:{s:25:"uihome_hotshare_cachetime";s:1:"7";s:12:"uihome_album";s:1:"0";s:11:"uihome_user";s:1:"1";s:10:"uihome_ads";s:1:"0";s:17:"uihome_albumorder";s:6:"shares";s:15:"uihome_category";s:1:"1";s:16:"uihome_album_num";s:1:"4";s:21:"uihome_album_sharenum";s:1:"1";s:15:"uihome_user_num";s:1:"4";}'),
(10, 'layoutalbum', 'a:6:{s:18:"uialbum_numperpage";s:2:"20";s:14:"uialbum_minnum";s:1:"1";s:14:"uialbum_layout";s:1:"4";s:16:"uialbum_animated";s:1:"1";s:12:"uialbum_auto";s:1:"1";s:22:"uialbum_numbershowpage";s:1:"0";}'),
(11, 'layoutdetail', 'a:7:{s:14:"uidetail_album";s:1:"1";s:17:"uidetail_samefrom";s:1:"1";s:19:"uidetail_recentview";s:1:"1";s:14:"uidetail_guess";s:1:"1";s:15:"uidetail_layout";s:4:"mini";s:12:"uidetail_ads";s:1:"0";s:24:"uidetail_comment_pagenum";s:1:"5";}'),
(14, 'register', 'a:2:{s:11:"verify_type";s:2:"no";s:9:"emailopen";s:1:"1";}'),
(12, 'colorindex', 'a:7:{s:3:"red";s:7:"#872119";s:6:"purple";s:7:"#d366a0";s:6:"yellow";s:7:"#dc9e46";s:4:"blue";s:7:"#28779c";s:5:"green";s:7:"#4d9315";s:5:"black";s:7:"#000000";s:4:"gray";s:7:"#cccccc";}'),
(13, 'vcode', 'a:2:{s:8:"register";s:1:"1";s:5:"login";s:1:"0";}'),
(15, 'credit', 'a:5:{s:14:"credit_formula";s:92:"total_followers + total_shares + total_likes + ext_credits_1 + ext_credits_2 + ext_credits_3";s:13:"ext_credits_1";s:14:"Fashion Repute";s:13:"ext_credits_2";s:16:"Fashion Strength";s:13:"ext_credits_3";s:15:"Fashion Passion";s:18:"credit_formula_exe";s:98:"$total_followers + $total_shares + $total_likes + $ext_credits_1 + $ext_credits_2 + $ext_credits_3";}'),
(16, 'email', 'a:7:{s:8:"protocol";s:4:"mail";s:4:"from";s:16:"info@pinkals.com";s:6:"sender";s:11:"Pinkals.com";s:9:"smtp_host";s:1:"0";s:9:"smtp_user";s:0:"";s:9:"smtp_pass";s:0:"";s:9:"smtp_port";s:2:"25";}'),
(17, 'sharebutton', 'a:4:{s:7:"twitter";a:6:{s:4:"name";s:7:"Twitter";s:4:"link";s:100:"https://twitter.com/intent/tweet?original_referer={url}&source=tweetbutton&text={sitename}&url={url}";s:12:"displayorder";b:0;s:5:"width";s:3:"505";s:6:"height";s:3:"634";s:4:"open";s:1:"1";}s:8:"facebook";a:6:{s:4:"name";s:8:"Facebook";s:4:"link";s:121:"http://www.facebook.com/sharer/sharer.php?s=100&p[url]={url}&p[images][0]={imgurl}&p[title]={sitename}&p[summary]={title}";s:12:"displayorder";b:0;s:5:"width";s:3:"550";s:6:"height";s:3:"750";s:4:"open";s:1:"1";}s:9:"pinterest";a:6:{s:4:"name";s:9:"Pinterest";s:4:"link";s:68:"http://www.pinterest.com/pin/create/button/?url={url}&media={imgurl}";s:12:"displayorder";b:0;s:5:"width";s:3:"550";s:6:"height";s:3:"750";s:4:"open";s:1:"1";}s:6:"google";a:6:{s:4:"name";s:8:"Google +";s:4:"link";s:39:"https://plus.google.com/share?url={url}";s:12:"displayorder";b:0;s:5:"width";s:3:"550";s:6:"height";s:3:"750";s:4:"open";s:1:"1";}}'),
(18, 'message', 'a:2:{s:19:"site_closed_heading";s:16:"Site maintenance";s:19:"site_closed_content";s:48:"Sorry, Site maintenance, Please come back later.";}'),
(19, 'pzglobal', 'a:13:{s:17:"cachetime_default";s:3:"500";s:19:"cachetime_homealbum";s:3:"500";s:18:"cachetime_homeuser";s:3:"500";s:21:"cachetime_footercount";s:3:"500";s:16:"pathinfo_support";s:1:"1";s:12:"rewrite_open";s:1:"0";s:9:"gzip_open";s:1:"1";s:11:"url_rewrite";s:1:"1";s:15:"compress_output";s:1:"1";s:8:"language";s:2:"en";s:14:"default_module";s:9:"pin/index";s:10:"timeoffset";s:2:"-8";s:11:"date_format";s:5:"Y-m-d";}'),
(20, 'optimizer', 'a:5:{s:17:"cachetime_default";s:3:"500";s:19:"cachetime_homealbum";s:3:"500";s:18:"cachetime_homeuser";s:3:"500";s:21:"cachetime_footercount";s:3:"500";s:11:"like_search";s:1:"1";}'),
(21, 'homeslide', 'a:1:{i:0;a:6:{s:3:"key";i:1399279892;s:9:"image_url";s:63:"data/attachments/homeslide/46facdac135cb1b51e4e0488a48fb6ea.jpg";s:8:"link_url";b:0;s:5:"order";b:0;s:5:"title";s:12:"Hello Summer";s:4:"desc";b:0;}}'),
(22, 'ads', 'a:2:{s:10:"pinpage_ad";a:1:{i:0;a:6:{s:3:"key";i:1400086652;s:7:"ad_name";s:4:"Page";s:5:"width";s:3:"200";s:6:"height";s:3:"200";s:8:"position";s:10:"pinpage_ad";s:9:"ad_source";s:341:"<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>\n<!-- Pinkals -->\n<ins class="adsbygoogle"\n     style="display:inline-block;width:200px;height:200px"\n     data-ad-client="ca-pub-3691668397282190"\n     data-ad-slot="4822774483"></ins>\n<script>\n(adsbygoogle = window.adsbygoogle || []).push({});\n</script>";}}s:13:"detailpage_ad";a:1:{i:0;a:6:{s:3:"key";i:1400086641;s:7:"ad_name";s:21:"Detail Page - Sidebar";s:5:"width";s:3:"200";s:6:"height";s:3:"200";s:8:"position";s:13:"detailpage_ad";s:9:"ad_source";s:341:"<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>\n<!-- Pinkals -->\n<ins class="adsbygoogle"\n     style="display:inline-block;width:200px;height:200px"\n     data-ad-client="ca-pub-3691668397282190"\n     data-ad-slot="4822774483"></ins>\n<script>\n(adsbygoogle = window.adsbygoogle || []).push({});\n</script>";}}}'),
(38, 'modules', 'a:3:{s:3:"mmg";a:3:{s:4:"name";s:3:"mmg";s:7:"version";s:5:"0.0.1";s:5:"title";s:13:"Module Manage";}s:11:"cloudattach";a:4:{s:4:"name";s:11:"cloudattach";s:7:"version";s:5:"0.0.1";s:7:"console";b:1;s:5:"title";s:9:"Cloud CDN";}s:6:"mobile";a:4:{s:4:"name";s:6:"mobile";s:7:"version";s:5:"0.0.1";s:7:"console";b:1;s:5:"title";s:16:"Mobile interface";}}'),
(24, 'usertheme', 'a:8:{s:5:"cloud";a:3:{s:4:"name";s:5:"cloud";s:3:"css";s:29:"assets/themes/cloud/style.css";s:5:"thumb";s:28:"assets/themes/cloud/skin.png";}s:8:"greenway";a:3:{s:4:"name";s:8:"greenway";s:3:"css";s:32:"assets/themes/greenway/style.css";s:5:"thumb";s:31:"assets/themes/greenway/skin.png";}s:12:"happyforever";a:3:{s:4:"name";s:12:"happyforever";s:3:"css";s:36:"assets/themes/happyforever/style.css";s:5:"thumb";s:35:"assets/themes/happyforever/skin.png";}s:6:"icesea";a:3:{s:4:"name";s:6:"icesea";s:3:"css";s:30:"assets/themes/icesea/style.css";s:5:"thumb";s:29:"assets/themes/icesea/skin.png";}s:4:"lark";a:3:{s:4:"name";s:4:"lark";s:3:"css";s:28:"assets/themes/lark/style.css";s:5:"thumb";s:27:"assets/themes/lark/skin.png";}s:10:"outerspace";a:3:{s:4:"name";s:10:"outerspace";s:3:"css";s:34:"assets/themes/outerspace/style.css";s:5:"thumb";s:33:"assets/themes/outerspace/skin.png";}s:9:"rainnight";a:3:{s:4:"name";s:9:"rainnight";s:3:"css";s:33:"assets/themes/rainnight/style.css";s:5:"thumb";s:32:"assets/themes/rainnight/skin.png";}s:9:"starrysky";a:3:{s:4:"name";s:9:"starrysky";s:3:"css";s:33:"assets/themes/starrysky/style.css";s:5:"thumb";s:32:"assets/themes/starrysky/skin.png";}}'),
(25, 'seo-home', 'a:3:{s:9:"seo_title";s:35:"Yolove.it - Fashion Shopping Online";s:11:"seo_keyword";s:58:"Online fashion store,Online Boutique,Fashion trend,Fashion";s:15:"seo_description";s:92:"Better Shopping Experience for all girls. Pinkals.com make your shopping easier and happier.";}'),
(26, 'seo-category', 'a:3:{s:9:"seo_title";s:35:"Yolove.it - Clothes Shopping Online";s:11:"seo_keyword";s:58:"Online fashion store,Online Boutique,Fashion trend,Fashion";s:15:"seo_description";s:71:"Yolove.it is an online fashion network tailored to your shopping style.";}'),
(27, 'seo-store', 'a:3:{s:9:"seo_title";s:44:"Yolove.it - Fashion Stores - Shopping Online";s:11:"seo_keyword";s:58:"Online fashion store,Online Boutique,Fashion trend,Fashion";s:15:"seo_description";s:50:"Browse the fashion stores for your online shopping";}'),
(28, 'socialapi', 'a:2:{s:8:"facebook";a:7:{s:3:"key";s:8:"facebook";s:4:"name";s:8:"Facebook";s:6:"appkey";s:16:"1506533822896989";s:9:"appsecret";s:32:"21d8a830bb0dc7b2bcfdd47fa2e33db4";s:8:"callback";s:51:"http://yolove.it/my/social/callback/vendor/facebook";s:7:"unionid";s:0:"";s:4:"open";s:1:"1";}s:7:"twitter";a:7:{s:3:"key";s:7:"twitter";s:4:"name";s:7:"Twitter";s:6:"appkey";s:22:"fg4e2XjPOAV4BpVfZktUgA";s:9:"appsecret";s:43:"WhCTabQiqQXMTeVY8zhBDpkdX8kBbqLhNPvMTHgMcSI";s:8:"callback";s:50:"http://yolove.it/my/social/callback/vendor/twitter";s:7:"unionid";s:0:"";s:4:"open";s:1:"1";}}'),
(29, 'taobaorule', 'a:14:{s:11:"start_price";i:1;s:9:"end_price";i:99999;s:9:"auto_send";s:3:"NAN";s:4:"area";s:3:"NAN";s:12:"start_credit";s:6:"1heart";s:10:"end_credit";s:6:"1heart";s:4:"sort";s:10:"price_desc";s:9:"guarantee";s:3:"NAN";s:20:"start_commissionRate";s:3:"NAN";s:18:"end_commissionRate";s:3:"NAN";s:19:"start_commissionNum";s:3:"NAN";s:17:"end_commissionNum";s:3:"NAN";s:14:"start_totalnum";s:3:"NAN";s:12:"end_totalnum";s:3:"NAN";}'),
(30, 'seo-star', 'a:3:{s:9:"seo_title";s:22:"Online Fashion Network";s:11:"seo_keyword";s:58:"Online fashion store,Online Boutique,Fashion trend,Fashion";s:15:"seo_description";s:71:"Yolove.it is an online fashion network tailored to your shopping style.";}'),
(31, 'seo-album', 'a:3:{s:9:"seo_title";s:23:"Yolove.it - Collection ";s:11:"seo_keyword";s:58:"Online fashion store,Online Boutique,Fashion trend,Fashion";s:15:"seo_description";s:83:"Yolove.it - Save and organise all your favourite fashion items in the way you like.";}'),
(32, 'seo-group', 'a:3:{s:9:"seo_title";s:22:"Online Fashion Network";s:11:"seo_keyword";s:58:"Online fashion store,Online Boutique,Fashion trend,Fashion";s:15:"seo_description";s:71:"Yolove.it is an online fashion network tailored to your shopping style.";}'),
(33, 'seo-topic', 'a:3:{s:9:"seo_title";s:22:"Online Fashion Network";s:11:"seo_keyword";s:58:"Online fashion store,Online Boutique,Fashion trend,Fashion";s:15:"seo_description";s:71:"Yolove.it is an online fashion network tailored to your shopping style.";}'),
(36, 'dzucenter', 'a:9:{s:7:"UC_OPEN";s:1:"0";s:6:"UC_API";s:4:"test";s:9:"UC_DBHOST";s:3:"sdf";s:9:"UC_DBNAME";s:3:"sdf";s:13:"UC_DBTABLEPRE";s:4:"fggf";s:9:"UC_DBUSER";s:5:"gfgfg";s:7:"UC_DBPW";s:8:"sdsgdsfg";s:8:"UC_APPID";s:5:"34534";s:6:"UC_KEY";s:15:"dfgdfsghdhghfgh";}'),
(37, 'dzforum', 'a:6:{s:4:"open";s:1:"0";s:8:"hostname";s:3:"sss";s:8:"username";s:4:"aaaa";s:8:"password";s:5:"fffff";s:8:"database";s:4:"dddd";s:8:"dbprefix";s:6:"sdfsdf";}'),
(39, 'mobile', 'a:5:{s:11:"thumb_width";s:4:"1024";s:12:"thumb_height";s:3:"768";s:7:"quality";s:3:"0.7";s:11:"showarticle";s:1:"0";s:10:"postverify";s:1:"0";}'),
(40, 'registeredEvents', 'a:5:{s:14:"afterpostshare";a:1:{i:0;s:11:"cloudattach";}s:12:"deleteAttach";a:1:{i:0;s:11:"cloudattach";}s:14:"aftereditshare";a:1:{i:0;s:11:"cloudattach";}s:14:"cropimagestart";a:1:{i:0;s:11:"cloudattach";}s:12:"cropimageend";a:1:{i:0;s:11:"cloudattach";}}'),
(41, 'cloudattach', 'b:0;');

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE IF NOT EXISTS `share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `poster_id` int(11) NOT NULL,
  `poster_nickname` varchar(80) DEFAULT NULL,
  `original_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `user_nickname` varchar(80) DEFAULT NULL,
  `total_comment` int(11) DEFAULT '0',
  `total_click` int(11) DEFAULT '0',
  `total_like` int(11) DEFAULT '0',
  `total_forwarding` int(11) DEFAULT '0',
  `create_time` int(10) NOT NULL,
  `comments` text,
  `category_id` int(11) NOT NULL,
  `album_id` int(11) DEFAULT '0',
  `channel` varchar(40) DEFAULT NULL,
  `store_id` int(11) DEFAULT '0',
  `ismixup` tinyint(1) NOT NULL DEFAULT '0',
  `isnew` tinyint(1) NOT NULL DEFAULT '0',
  `dtype` tinyint(4) DEFAULT '0',
  `lastcomment_time` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_item` (`item_id`),
  KEY `idx_poster_id` (`poster_id`),
  KEY `idx_original_id` (`original_id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_create_time` (`create_time`),
  KEY `idx_total_comment` (`total_comment`),
  KEY `idx_total_like` (`total_like`),
  KEY `idx_dtype` (`dtype`),
  KEY `idx_total_forward` (`total_forwarding`),
  KEY `idx_category_id` (`category_id`),
  KEY `idx_album_id` (`album_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`id`, `item_id`, `poster_id`, `poster_nickname`, `original_id`, `user_id`, `user_nickname`, `total_comment`, `total_click`, `total_like`, `total_forwarding`, `create_time`, `comments`, `category_id`, `album_id`, `channel`, `store_id`, `ismixup`, `isnew`, `dtype`, `lastcomment_time`) VALUES
(1, 1, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 1, 0, 1436157116, NULL, 20, 1, NULL, 1, 1, 0, 0, 0),
(2, 2, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 1, 0, 1436157259, NULL, 17, 2, NULL, 1, 0, 1, 0, 0),
(3, 3, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 1, 0, 1436157388, NULL, 17, 2, NULL, 1, 0, 0, 0, 0),
(4, 4, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 0, 0, 1436157511, NULL, 17, 2, NULL, 1, 0, 0, 0, 0),
(5, 5, 10, 'Veronica', NULL, 10, 'Veronica', 1, 0, 1, 0, 1436157579, NULL, 15, 3, NULL, 2, 0, 0, 0, 0),
(6, 6, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 1, 0, 1436157710, NULL, 17, 2, NULL, 3, 0, 0, 0, 0),
(7, 7, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 0, 0, 1436157831, NULL, 17, 2, NULL, 1, 0, 0, 0, 0),
(8, 8, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 1, 0, 1436157932, NULL, 24, 4, NULL, 1, 0, 0, 0, 0),
(9, 9, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 0, 0, 1436158097, NULL, 21, 5, NULL, 1, 0, 0, 0, 0),
(10, 10, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 0, 0, 1436158166, NULL, 17, 2, NULL, 3, 0, 0, 0, 0),
(11, 11, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 0, 0, 1436158282, NULL, 30, 6, NULL, 1, 0, 0, 0, 0),
(12, 12, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 0, 0, 1436159686, NULL, 15, 3, NULL, 1, 0, 0, 0, 0),
(13, 13, 10, 'Veronica', NULL, 10, 'Veronica', 1, 0, 0, 0, 1436159805, NULL, 17, 2, NULL, 1, 0, 0, 0, 0),
(14, 14, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 0, 0, 1436159919, NULL, 15, 7, NULL, 1, 0, 0, 0, 0),
(15, 15, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 0, 0, 1436160031, NULL, 30, 8, NULL, 1, 0, 0, 0, 0),
(16, 16, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 0, 0, 1436160074, NULL, 15, 3, NULL, 2, 0, 0, 0, 0),
(17, 17, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 0, 0, 1436160138, NULL, 15, 9, NULL, 3, 0, 0, 0, 0),
(18, 18, 10, 'Veronica', NULL, 10, 'Veronica', 0, 0, 0, 0, 1436160213, NULL, 15, 3, NULL, 1, 0, 0, 0, 0),
(19, 19, 10, 'Veronica', NULL, 10, 'Veronica', 1, 0, 0, 0, 1436160324, NULL, 18, 10, NULL, 1, 0, 0, 0, 0),
(20, 20, 10, 'Veronica', NULL, 10, 'Veronica', 4, 0, 0, 0, 1436160472, NULL, 24, 11, NULL, 1, 0, 0, 0, 0),
(21, 21, 20, 'wendy', NULL, 20, 'wendy', 0, 0, 0, 0, 1436331317, NULL, 15, 12, NULL, 1, 0, 0, 0, 0),
(22, 22, 152, 'Ck.Cheng', NULL, 152, 'Ck.Cheng', 0, 0, 0, 0, 1436782443, NULL, 5, 17, NULL, 1, 0, 0, 0, 0),
(23, 23, 152, 'Ck.Cheng', NULL, 152, 'Ck.Cheng', 0, 0, 0, 0, 1437024881, NULL, 17, 17, NULL, 1, 0, 0, 0, 0),
(26, 26, 152, 'Ck.Cheng', NULL, 152, 'Ck.Cheng', 0, 0, 0, 0, 1437025241, NULL, 17, 17, NULL, 1, 0, 0, 0, 0),
(25, 25, 152, 'Ck.Cheng', NULL, 152, 'Ck.Cheng', 0, 0, 0, 0, 1437025086, NULL, 17, 17, NULL, 1, 0, 0, 0, 0),
(27, 27, 152, 'Ck.Cheng', NULL, 152, 'Ck.Cheng', 0, 0, 0, 0, 1437025301, NULL, 17, 17, NULL, 1, 0, 0, 0, 0),
(29, 29, 152, 'Ck.Cheng', NULL, 152, 'Ck.Cheng', 0, 0, 0, 0, 1437031871, NULL, 24, 18, NULL, 2, 0, 0, 0, 0),
(30, 30, 99, 'mahedi', NULL, 99, 'mahedi', 0, 0, 0, 0, 1437041405, NULL, 5, 19, NULL, 4, 0, 0, 0, 0),
(31, 31, 152, 'Ck.Cheng', NULL, 152, 'Ck.Cheng', 0, 0, 0, 0, 1437369242, NULL, 15, 20, NULL, 2, 0, 0, 0, 0),
(32, 32, 152, 'Ck.Cheng', NULL, 152, 'Ck.Cheng', 0, 0, 0, 0, 1437372646, NULL, 17, 17, NULL, 5, 0, 0, 0, 0),
(34, 34, 152, 'Ck.Cheng', NULL, 152, 'Ck.Cheng', 0, 0, 0, 0, 1437374505, NULL, 17, 17, NULL, 2, 0, 0, 0, 0),
(35, 35, 152, 'Ck.Cheng', NULL, 152, 'Ck.Cheng', 0, 0, 0, 0, 1437451889, NULL, 15, 21, NULL, 1, 0, 0, 0, 0),
(36, 36, 152, 'Ck.Cheng', NULL, 152, 'Ck.Cheng', 0, 0, 0, 0, 1437460363, NULL, 15, 21, NULL, 1, 0, 0, 0, 0),
(37, 37, 152, 'Ck.Cheng', NULL, 152, 'Ck.Cheng', 0, 0, 0, 0, 1437538258, NULL, 5, 22, NULL, 1, 0, 0, 0, 0),
(40, 40, 152, 'Ck.Cheng', NULL, 152, 'Ck.Cheng', 0, 0, 0, 0, 1437540532, NULL, 17, 17, NULL, 4, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_info`
--

CREATE TABLE IF NOT EXISTS `shipping_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_token_id` varchar(100) NOT NULL,
  `product_cost` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `return_from_paypal` text NOT NULL,
  `shipping_cost` float NOT NULL,
  `total_cost` float NOT NULL,
  `shipping_address` text NOT NULL,
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_product`
--

CREATE TABLE IF NOT EXISTS `shipping_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `share_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `shipping_cost` float NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(50) NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `smile`
--

CREATE TABLE IF NOT EXISTS `smile` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` smallint(6) unsigned NOT NULL DEFAULT '1',
  `displayorder` tinyint(1) NOT NULL DEFAULT '0',
  `code` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `smile`
--

INSERT INTO `smile` (`id`, `typeid`, `displayorder`, `code`, `url`) VALUES
(1, 1, 1, ':)', 'smile.gif'),
(2, 1, 2, ':(', 'sad.gif'),
(3, 1, 3, ':D', 'biggrin.gif'),
(4, 1, 4, ':cry:', 'cry.gif'),
(5, 1, 5, ':huf:', 'huffy.gif'),
(6, 1, 6, ':shock:', 'shocked.gif'),
(7, 1, 7, ':P', 'tongue.gif'),
(8, 1, 8, ':shy:', 'shy.gif'),
(9, 1, 9, ':P', 'titter.gif'),
(10, 1, 10, ':L', 'sweat.gif'),
(11, 1, 11, ':Q', 'mad.gif'),
(12, 1, 12, ':lol', 'lol.gif'),
(13, 1, 13, ':loveliness:', 'loveliness.gif'),
(14, 1, 14, ':funk:', 'funk.gif'),
(15, 1, 15, ':curse:', 'curse.gif'),
(16, 1, 16, ':dizzy:', 'dizzy.gif'),
(17, 1, 17, ':shutup:', 'shutup.gif'),
(18, 1, 18, ':sleepy:', 'sleepy.gif'),
(19, 1, 19, ':hug:', 'hug.gif'),
(20, 1, 20, ':victory:', 'victory.gif'),
(21, 1, 21, ':time:', 'time.gif'),
(22, 1, 22, ':kiss:', 'kiss.gif'),
(23, 1, 23, ':handshake', 'handshake.gif'),
(24, 1, 24, ':call:', 'call.gif');

-- --------------------------------------------------------

--
-- Table structure for table `staruser`
--

CREATE TABLE IF NOT EXISTS `staruser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `star_cover` text,
  `star_reason` text,
  `display_order` int(11) NOT NULL DEFAULT '100',
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_star_id` (`id`),
  KEY `idx_category_id` (`category_id`),
  KEY `idx_user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `poster_id` int(11) DEFAULT NULL,
  `poster_nickname` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `store_name` varchar(100) DEFAULT NULL,
  `domain_name` varchar(100) DEFAULT NULL,
  `theme` varchar(45) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `phone2` varchar(45) DEFAULT NULL,
  `phone3` varchar(45) DEFAULT NULL,
  `recent_post` text,
  `store_desc` text,
  `total_like` int(11) DEFAULT '0',
  `total_review` int(11) DEFAULT '0',
  `total_visit` int(11) DEFAULT '0',
  `display_order` int(11) NOT NULL DEFAULT '100',
  `create_time` int(10) NOT NULL,
  `keyword` text,
  `keyword_search` text,
  `settings` text,
  `shipping_fee` float DEFAULT NULL,
  `zip_code` varchar(100) NOT NULL,
  `isregister` tinyint(1) NOT NULL DEFAULT '0',
  `isverified` tinyint(1) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_category_id` (`category_id`),
  KEY `idx_user_id` (`user_id`),
  FULLTEXT KEY `idx_keyword_search` (`keyword_search`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `user_id`, `poster_id`, `poster_nickname`, `category_id`, `store_name`, `domain_name`, `theme`, `province`, `city`, `address`, `country`, `phone`, `phone2`, `phone3`, `recent_post`, `store_desc`, `total_like`, `total_review`, `total_visit`, `display_order`, `create_time`, `keyword`, `keyword_search`, `settings`, `shipping_fee`, `zip_code`, `isregister`, `isverified`, `update_time`) VALUES
(1, NULL, 10, 'Veronica', 20, 'tr', 'tr.styles.my', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 100, 1436157116, NULL, NULL, NULL, NULL, '', 0, 0, 1437538258),
(2, NULL, 10, 'Veronica', 15, 'anylove', 'www.anylove.my', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 100, 1436157579, NULL, NULL, NULL, NULL, '', 0, 0, 1437374505),
(3, NULL, 10, 'Veronica', 17, 'coccha', 'coccha.com', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 100, 1436157710, NULL, NULL, NULL, NULL, '', 0, 0, 1436160138),
(4, NULL, 99, 'mahedi', 5, 'keimag', 'keimag.com.my', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 100, 1437041405, NULL, NULL, NULL, NULL, '', 0, 0, 1437540532),
(5, NULL, 152, 'Ck.Cheng', 17, 'emceecouture', 'emceecouture.com', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 100, 1437372646, NULL, NULL, NULL, NULL, '', 0, 0, 1437372646);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) NOT NULL,
  `share_id` text NOT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag_name`, `share_id`, `is_show`, `create_time`) VALUES
(1, 'necklace', 'a:1:{i:0;s:2:"19";}', 0, 1436169582),
(2, 'dress', 'a:1:{i:0;s:2:"13";}', 0, 1436169720),
(3, 'elegant', 'a:1:{i:0;s:2:"13";}', 0, 1436169720),
(4, 'tops', 'a:1:{i:0;s:1:"5";}', 0, 1436330905),
(5, 'bluedress', 'a:1:{i:0;s:2:"20";}', 0, 1436779769);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uc_id` int(11) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `nickname` varchar(80) NOT NULL,
  `uc_nickname` varchar(80) DEFAULT NULL,
  `domain` varchar(80) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL,
  `user_title` varchar(50) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `create_time` int(10) NOT NULL,
  `total_follow` int(11) DEFAULT '0',
  `total_follower` int(11) DEFAULT '0',
  `total_share` int(11) DEFAULT '0',
  `total_album` int(11) DEFAULT '0',
  `total_like` int(11) DEFAULT '0',
  `total_favorite_share` int(11) DEFAULT '0',
  `total_favorite_album` int(11) DEFAULT '0',
  `lost_password_key` varchar(40) DEFAULT NULL,
  `lost_password_expire` int(11) DEFAULT NULL,
  `last_login_time` int(10) DEFAULT NULL,
  `credits` int(10) DEFAULT '0',
  `ext_credits_1` int(10) DEFAULT '0',
  `ext_credits_2` int(10) DEFAULT '0',
  `ext_credits_3` int(10) DEFAULT '0',
  `is_social` tinyint(4) DEFAULT '0',
  `is_star` tinyint(4) DEFAULT '0',
  `has_store` tinyint(4) DEFAULT '0',
  `is_deleted` tinyint(4) DEFAULT '0',
  `theme` varchar(50) DEFAULT NULL,
  `follow_you` tinyint(4) DEFAULT '1',
  `like_collection` tinyint(4) DEFAULT '1',
  `like_item` tinyint(4) DEFAULT '1',
  `mentions_you` tinyint(4) DEFAULT '1',
  `store_follow` tinyint(4) DEFAULT '1',
  `user_follow` tinyint(4) DEFAULT '1',
  `collection_follow` tinyint(4) DEFAULT '1',
  `user_credits` float NOT NULL,
  `access_key` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_login` (`email`,`passwd`),
  KEY `idx_nickname` (`nickname`),
  KEY `idx_lost_password_key` (`lost_password_key`),
  KEY `idx_domain` (`domain`),
  KEY `idx_email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=169 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uc_id`, `email`, `passwd`, `nickname`, `uc_nickname`, `domain`, `gender`, `province`, `city`, `location`, `user_title`, `bio`, `create_time`, `total_follow`, `total_follower`, `total_share`, `total_album`, `total_like`, `total_favorite_share`, `total_favorite_album`, `lost_password_key`, `lost_password_expire`, `last_login_time`, `credits`, `ext_credits_1`, `ext_credits_2`, `ext_credits_3`, `is_social`, `is_star`, `has_store`, `is_deleted`, `theme`, `follow_you`, `like_collection`, `like_item`, `mentions_you`, `store_follow`, `user_follow`, `collection_follow`, `user_credits`, `access_key`) VALUES
(1, NULL, 'admin@pinkals.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1373314324, 0, 0, 0, 0, 0, 0, 0, '5afb0b129dfaed3219187242143445bd', 1374579873, 1379996874, 23, 2, 2, 15, 0, 0, 1, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(5, NULL, 'symantha0325@gmail.com', 'a04f9c86b6eaed851b047e0974f381b0', 'smoon', NULL, '0', 'female', 'Penang', NULL, NULL, NULL, NULL, 1377758685, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1426127395, 245, 19, 27, 198, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(6, NULL, 'ckhaimun@hotmail.com', 'ffa10eb02ca0d6f4648bc58aa01bb8d4', 'Khaimun.Chan', NULL, 'jenny', 'female', 'New York', 'New york City', NULL, NULL, 'The most trendy women', 1377758697, 0, 2, 0, 2, 0, 0, 0, 'e6b7747a5a63f0b75b834fccfe12afce', 1400842337, 1401245261, 465, 52, 64, 347, 1, 1, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(4, NULL, 'joonyeow@live.com', '639ab96495d7739f212181c1dfd4337f', 'Joon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1377758570, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1401236021, 165, 15, 11, 110, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(8, NULL, 'joanne1@hotmail.com', 'e99a18c428cb38d5f260853678922e03', 'Naurisa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1378200338, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(9, NULL, 'kute_mute@yahoo.com', 'e467eeac047e4596cff953be5609ca13', 'Zain', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1378723815, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1379585168, 81, 10, 10, 56, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(10, NULL, 'karchooncheng@gmail.com', '745184d14bbcb8cc285aefb3c3cf4563', 'Veronica', NULL, '', 'none', NULL, '', '', NULL, NULL, 1379063265, 1, 1, 20, 0, 0, 0, 0, NULL, NULL, 1430887546, 2440, 36, 95, 1714, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(11, NULL, 'mebina@live.com', 'bc980cfc3b7d6dbba09205904c5e2789', 'SuperVA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1379479197, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1401186190, 44, 10, 10, 23, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(12, NULL, 'ckhaimun@gmail.com', 'ffa10eb02ca0d6f4648bc58aa01bb8d4', 'angel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1379480511, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1395299716, 31, 10, 10, 11, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(13, NULL, '86d9cf2af541186f16324f10ade618ff@puzzing.com', 'b8cd02eac73ad0e60310b19a2622c9ce', 'chengchoonket', NULL, NULL, 'male', NULL, NULL, '', NULL, NULL, 1379485744, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1379747389, 36, 11, 10, 15, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(14, NULL, 'symantha_chai@yahoo.com', 'a04f9c86b6eaed851b047e0974f381b0', 'Symantha ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1379564014, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1379646701, 106, 12, 10, 32, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(15, NULL, '6fb3ddc6feee1ce9e74abf91da758194@puzzing.com', '23efd0f4c941105e7a51a23458b7aeee', 'jenny', NULL, NULL, 'none', NULL, NULL, '', NULL, '', 1379574053, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1379646628, 39, 11, 12, 15, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(16, NULL, 'jackie_chai95@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Michiyo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1379934087, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1381443576, 228, 10, 10, 79, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(17, NULL, 'crystal_hoong@hotmail.com', 'f25a2fc72690b780b2a14e140ef6a9e0', 'shine', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1379939339, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1380133941, 139, 11, 10, 63, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(18, NULL, 'pandayapps@gmail.com', '745184d14bbcb8cc285aefb3c3cf4563', 'Wendy.Yap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1380265677, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1434341922, 1477, 39, 80, 1083, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(19, NULL, 'b6cb773f83bc2565520f108fb5658537@puzzing.com', 'f93de327774ad96ede805dbd83f66b96', 'kumarskm2291', NULL, NULL, 'none', NULL, NULL, 'Karachi, Pakistan', NULL, 'Be happy... :)', 1380709430, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1380709432, 31, 10, 10, 11, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(20, NULL, 'chengchoonket@gmail.com', '745184d14bbcb8cc285aefb3c3cf4563', 'wendy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1382513251, 2, 0, 1, 0, 0, 5, 0, '', 0, 1435294606, 1712, 25, 113, 1428, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(21, NULL, 'snips_jamilla@hotmail.com', 'c31be0fdc26868544607a19bf517f871', 'jamilla.zubac.3', NULL, NULL, 'none', NULL, NULL, 'Mullumbimby, New Sou', NULL, NULL, 1382607056, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1385632915, 37, 11, 10, 15, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(22, NULL, 'princess_sahar2011@hotmail.com', '99323f4be57bb9c833613fd981a2c624', 'princess', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1382948658, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 32, 10, 10, 12, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(23, NULL, 'zhanyaoshang@outlook.com', '0f0a470a6b2bbfb449efc7566ddcec26', 'Carina', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1382954369, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 32, 10, 10, 12, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(27, NULL, 'walburgwalburgmum@u03.gmailmirror.com', '08b6255f8cebca22c8eca5741341619a', 'funkyhairimageser', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1393373237, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(26, NULL, 'javascripbuttonTets@u03.gmailmirror.com', '08b6255f8cebca22c8eca5741341619a', 'newiconimageRono', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1392474845, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(28, NULL, 'test@puzzing.com', '20ac3de8467f864f60e8f928c914125c', 'puzz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1394849478, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(29, NULL, 'test222@puzzing.com', '3ebd347a2e9975c63d167233851be2ac', 'puzz222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1394850112, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(30, NULL, 'puzz@puzzing.com', '361bb5cfbd57130c6f91d3feb5d8bd2d', 'puzzing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1394874542, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(31, NULL, 'testaaa@puzzing.com', 'a80ffc00af4ab5725dc9ead74e95f701', 'aaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1394879417, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(32, NULL, 'testpuzz@puzzing.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'testpuzz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1394879666, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1394879700, 31, 10, 10, 11, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(33, NULL, 'miragliaefx@hotmail.com', 'fbafaf06d26e011357d76476c7a6973b', 'NugAssist', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395330432, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1395443389, 32, 10, 10, 12, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(34, NULL, 'maganseo357@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'tqfaxerr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395641956, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1396697849, 42, 10, 10, 22, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(35, NULL, 'agustinatyl535@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'nuimbesz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395642492, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1396679335, 40, 10, 10, 20, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(36, NULL, 'jestinewuy865@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'fypelsyq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395659423, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1396688692, 42, 10, 10, 22, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(37, NULL, 'shantellxpm428@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'yzsxwkqk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395668825, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1396645780, 40, 10, 10, 20, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(38, NULL, 'carlotagxm106@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'uzkrwagt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395669900, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1396696292, 39, 10, 10, 19, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(39, NULL, 'glennalxj321@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'fnnwyjff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395670167, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(40, NULL, 'pageysnrexmegwe91@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'qzdmkkwl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395670911, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1396708834, 42, 10, 10, 22, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(41, NULL, 'rickieiex325@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'isrqxayw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395676605, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1396835981, 34, 10, 10, 14, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(42, NULL, 'mirianmxn724@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'luagcprm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395681824, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(43, NULL, 'libertypcl312@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'rlbevjse', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395684499, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(44, NULL, 'tanjatvr249@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'sonxzoli', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395686408, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1396688348, 42, 10, 10, 22, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(45, NULL, 'chungqog937@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'fxvbzpsc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395697638, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1397178022, 45, 10, 10, 25, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(46, NULL, 'stellatuy518@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'iyhdogfh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395699629, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(47, NULL, 'penneykdh167@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'hzgsjnqo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395705615, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1396711432, 42, 10, 10, 22, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(48, NULL, 'twannaome767@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'hudiscib', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395891782, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(49, NULL, 'ladyitw295@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'srpubtod', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395905404, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(50, NULL, 'raelenebluvixmtin35@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'uprzznre', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1395949530, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(51, NULL, 'sharondaofmib90@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'gwevbqwg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1396382868, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(52, NULL, 'andriakdbnhgiohr65@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'hvrevqwp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1396422461, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(53, NULL, 'mireillengf596@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'swknvatc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1396617124, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(54, NULL, 'destinychkw4763@gmail.com', '9808c251efd53058819f820a70f85b0d', 'Madison Moore', NULL, '', 'none', '0', '', '', '', 'I know your guessing who I look like, but I am not her! :)', 1396724299, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 36, 12, 11, 11, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(55, NULL, 'patriciad.miller@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'wpapsuvn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1396962759, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(56, NULL, 'noahm.elliott@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'vlechbqr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1397026269, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(57, NULL, 'nathanielk.meyers@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'ggzshlzo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1397288218, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(58, NULL, 'glennad.davis@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'rjvnxhvt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1397901369, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(59, NULL, 'melissaj.pettaway@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'kwxbbnul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1397963184, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(60, NULL, 'crystaln.dixion@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'qrxzxlld', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1398200185, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(61, NULL, 'jonathanj.hetrick@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'wiuzfntr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1398547641, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(62, NULL, 'vupryqe@hotmail.com', '06fd3a6d51f45c1d2f2bf211b9bdacfb', 'hlyerpjt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1398581803, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(63, NULL, 'westonboy@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'hrkuluup', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1398592043, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(64, NULL, 'bonniec.obrien@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'yykmdewv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1398604800, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(65, NULL, 'lukefords@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'vpbzcrni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1398637816, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(66, NULL, 'noelhickman@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'iszccplg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1398820066, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(67, NULL, 'luellaroach@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'vfisutvo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1398838332, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(68, NULL, 'frank_amede@aol.fr', 'f56b1d630a25e4ede4b0a86b7de0ceae', 'czsymirq978', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1398921239, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(69, NULL, 'ldiabdn@hotmail.com', 'bad8651bcd225e674ddfe01fc8f9c28f', 'sunygxi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1398977957, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(70, NULL, 'dolliekane@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'gugduajp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1399045113, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(71, NULL, 'juliuslindsey@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'uzizwhhj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1399051879, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(72, NULL, 'madelynfoster@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'pyvoxhhx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1399054648, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(73, NULL, 'concettalane@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'iuorqejp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1399155972, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(74, NULL, 'mariem.washington@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'zksidurf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1399365988, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(75, NULL, 'johng.bellows@hotmail.com', 'b4f5dfd621a840f10b51ce5024cf5529', 'diqcsima', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1399404780, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(76, NULL, 'sherer0851@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'dibsrtyz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1399506959, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(77, NULL, 'qnjpjuij299@veedeepee.com', '9594371115d15eab6741fc86247d7ccd', 'owecxaur193', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1399510489, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(78, NULL, 'glendaratliff@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'fiopllfr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1399530654, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(79, NULL, 'daisyramiro.ramiro@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'gupucgiy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1399629100, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(80, NULL, 'guymiles@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'rredzqob', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1399644412, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(81, NULL, 'charlottealonzo@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'yzdyinwq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1399788937, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(82, NULL, 'rebabradford@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'kggnyixt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1399942258, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(83, NULL, 'sondrabriana@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'kpuoaokc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1399942272, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(84, NULL, 'stellanell@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'vkdpifgh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1400012495, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(85, NULL, 'joanwheeler@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'yuonjtgg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1400185563, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(86, NULL, 'leahelvia@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'grnabjrn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1400367153, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(87, NULL, 'alineknight@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'exnflszh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1400367153, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(88, NULL, 'madelinepeter@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'glwlftwm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1400401734, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(89, NULL, 'emoryjasper@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'esnlipkv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1400585563, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(90, NULL, 'coolrklimat54ee@gmail.com', '308bc03a0429d4173def6d34cf6b5ff2', 'Robertphew', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1400619082, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1400774833, 31, 10, 10, 11, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(91, NULL, 'randalweber@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'gnsiqejq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1400859493, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(92, NULL, 'charlenebenton@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'zjkglksf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1400953720, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(93, NULL, 'morrisschultz@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'mqbegake', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1400979166, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(94, NULL, 'howardbyrd@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'lndtxjfy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1401033267, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(95, NULL, 'rodneypearson@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'oiidqlyz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1401141656, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(96, NULL, 'bradbrock@mail.ru', 'b4f5dfd621a840f10b51ce5024cf5529', 'kgtzqhyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1401153539, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(97, NULL, 'hasanmahedi291@gmail.com', 'e5dd6ec1ea0801166de973bed5e36b81', 'mahedi007', NULL, '', 'male', '0', '', '', '', '      ', 1401164545, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1410341847, 135, 17, 11, 88, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(98, NULL, 'ecokompleks@gmail.com', '33fc638f511d561f2a4d0b72fe4633f7', 'Josephhert', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1401198243, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(99, NULL, 'mahedi302@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'mahedi', NULL, '', 'male', '0', '', '', '', '', 1401358702, 0, 0, 1, 1, 0, 0, 0, NULL, NULL, 1434446034, 113, 16, 16, 81, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(102, NULL, '2f5d46d6a826811c1e1ad3e3e60f01ae@puzzing.com', 'd569b869f60f511b899a9928ffcbe351', 'NicoleT', NULL, NULL, 'none', NULL, NULL, '', NULL, '', 1410158039, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(154, NULL, 'xmenfc@hotmail.com', '26530a972b62b376465d2c8f2c5072b3', 'Shuvo.Bhuiyan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1436246041, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(115, NULL, 'ismahismail97@gmail.com', '48283d77ef623a345ea64683b759406a', 'ismahismailarshad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1418305096, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(104, NULL, 'symantha@pinkals.com', '8b4ced9a4ce5d5728cf9552cab76c8ce', 'Symantha.Chai', NULL, NULL, 'none', NULL, NULL, '', '0', '0', 1410404172, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 40, 10, 20, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(105, NULL, 'f4bee2349e9a462d4457c60a1c5344f3@puzzing.com', 'ade157af1858f68ff3cca0d63913b2b7', 'AiubMahedi', NULL, NULL, 'none', NULL, NULL, '', NULL, '', 1410417586, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(116, NULL, '7sammi7@gmail.com', 'bc9c18e2cd182149e5e6700389cf94a9', 'zingtinpar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1418445540, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 33, 10, 13, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(107, NULL, '0960986da0637b3b5f18c0e7958abe3c@puzzing.com', 'c01a99fa2c3a4f546dd3f380ba650b5e', 'aiub807', NULL, NULL, 'none', NULL, NULL, '', NULL, '', 1410418433, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(108, NULL, 'tanjq87@yahoo.com', '3adc984f0619aaa495273781f85ef977', 'Jieqiang Tan', NULL, NULL, 'male', NULL, NULL, '', NULL, NULL, 1411445912, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(109, NULL, 'jnkmfx@gmail.com', '028174b362fe0817e93c79c220e14d09', 'vanns', NULL, NULL, 'male', NULL, NULL, '', NULL, NULL, 1411660305, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 31, 10, 10, 11, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(110, NULL, 'eelynlin@hotmail.com', 'a22d48bc8e78d81fbf78e5d5ff25d365', 'eelynlin', NULL, '', 'none', '0', '', '', '0', '0', 1414989630, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1422115067, 3438, 11, 10, 950, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(111, NULL, 'kelvin.flip@hotmail.com', 'a22d48bc8e78d81fbf78e5d5ff25d365', 'MickeyMouse', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1415195288, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1415757668, 114, 10, 10, 57, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(112, NULL, 'izzati.athirah23@gmail.com', '2e210db733c90dcd5a82a4265ba059c2', 'Izzati Athirah Fauzi', NULL, NULL, 'none', NULL, NULL, '', NULL, NULL, 1415621449, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 34, 11, 12, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(113, NULL, 'sales@myladiescorner.com', 'ac586db3d00d260a0e42a02559b99afd', 'My Ladies Corner', NULL, 'MLC', 'female', 'Kuala Lumpur', 'Kuala Lumpur', '', 'Renne Siow', '', 1415724961, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 31, 10, 10, 11, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(117, NULL, 'beekim5192@gmail.com', '2674218060bdee8324932f70cc4a9c78', 'Meiching Loh', NULL, NULL, 'none', NULL, NULL, '', NULL, NULL, 1418724707, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(118, NULL, 'ysylst@yahoo.com', '0e52332e2167cfdb4eb963c3bea39aab', 'Fennie', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1418967355, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(119, NULL, 'jessllimf@hotmail.com', '4a9210481c07b38eff76784d767a8287', 'jessllimf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1419045795, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(120, NULL, 'sangeetha.9292@yahoo.com.my', 'fe0bd0521b8ce51a70d8d8e8841c084e', 'Sangeithz D Shutz', NULL, NULL, 'none', NULL, NULL, '', NULL, NULL, 1419089702, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(121, NULL, 'reneerini99@gmail.com', '87634e906e59f6bb65411a2a35853ca6', 'RiniAlisaputri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1419915551, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 32, 11, 11, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(122, NULL, 'shannonchan205@gmail.com', '05371c479ea7472ce226a9a4c73406b8', 'shannonchan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1419945356, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(123, NULL, 'tiongflora@gmail.com', 'bf1900fa303940718e006e515b91f652', 'hhtiong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1420168776, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1424002687, 35, 10, 10, 15, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(124, NULL, 'rachellsrobin@yahoo.com', '4e25e510bb73f379d9059e5c69d958be', 'rachhhs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1420519660, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(125, NULL, 'larrygrinch100@hotmail.com', '4880c12278e10033537766ffed1bd092', 'Larry Velasquez', NULL, NULL, 'male', NULL, NULL, '', NULL, NULL, 1420523257, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 32, 11, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(126, NULL, 'eleenyong10@gmail.com', 'f4fa3a2c1207173147b7e22ca24dc8d1', 'E.L.Y', NULL, '', 'female', '0', '', '', '0', 'I ONLY PICK SOMETHING NICE! ', 1420529475, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 216, 12, 35, 115, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(127, NULL, 'picturemaniac2013@gmail.com', '18b5adc08b3dfd1aa0f292b035086879', 'kimbu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1420538457, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(128, NULL, 'sharonbsl12@gmail.com', '4ea7cbdca791fab570f8fc1aec9ae8f0', 'sharonbsl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1420605165, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(129, NULL, 'sheauen06@hotmail.com', '9ba8ad21114171c66fe7b845dc58cca2', 'S''heauen Teoh', NULL, NULL, 'none', NULL, NULL, '', NULL, NULL, 1420644703, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 34, 12, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(130, NULL, 'chiakai80@yahoo.com', 'cd23ba3111d228012de01231a7859a71', 'DODO FF', NULL, 'DODO', 'none', 'KL', 'WP', '', '', 'Fashion Fanatic', 1420700422, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1422590216, 35, 11, 10, 13, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(131, NULL, 'weizhiyeong@gmail.com', '69a06070a2d9a1bf331f7af99182b7c1', 'Wei Zhi', NULL, NULL, 'none', NULL, NULL, '', NULL, NULL, 1420728710, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 34, 12, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(132, NULL, 'sweelin63@yahoo.com', '7b9d942cb634b461d64686cd7d31da9c', 'Lindy Tan', NULL, NULL, 'none', NULL, NULL, '', NULL, NULL, 1421131480, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 32, 11, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(133, NULL, 'dewirose.fir@gmail.com', '9619c0df3a2e9b09747448ecd92475cf', 'Dee Fir', NULL, NULL, 'none', NULL, NULL, '', NULL, NULL, 1421135135, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 32, 11, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(134, NULL, 'mzchoo92@gmail.com', '17223732a083b8f861b8275b70250d27', 'mzchoo92', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1421244109, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1421424511, 31, 10, 10, 11, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(135, NULL, 'estee0223@yahoo.com', 'f6733c6910644636f3eb20140097044a', 'estee0223', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1421652306, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1421652712, 40, 11, 17, 11, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(136, NULL, 'zypperfashion@gmail.com', 'c2917eeaa78ed79027ba6a1905373ac6', 'zypper', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1421724007, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 32, 11, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(137, NULL, 'joannayap_1995@hotmail.com', 'd3bb9c1db174f248bc9fbeba1d593f39', 'Joanna Yap', NULL, NULL, 'none', NULL, NULL, '', NULL, NULL, 1422105173, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 32, 11, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(138, NULL, 'trinazact@yahoo.com', '10f6543b4c00ccd42b2d7553b5741dd1', 'Rachel Nirmala', NULL, NULL, 'none', NULL, NULL, '', NULL, NULL, 1422233571, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(139, NULL, 'elys_chong@hotmail.com', '0dec2a23635a6f0b0b0549e4229a0bcc', 'Elys ChOng', NULL, NULL, 'none', NULL, NULL, '', NULL, NULL, 1422268031, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 32, 11, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(140, NULL, '6bd18c1fac978c67857100fbac2b5416@puzzing.com', '8e89ad015f163029602835ebdf5292b9', 'SiewyeeNg', NULL, NULL, 'none', NULL, NULL, 'Malaysia', NULL, 'V.I.P', 1422365768, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(141, NULL, 'tansy82@gmail.com', '2f8af2bc0a030392e3dcb951f969bd28', 'tansy82', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1422627063, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(142, NULL, 'yengyeng1@hotmail.com', '0e8871e46ed4d353c272d200b965ed43', 'Yeng Ng', NULL, NULL, 'none', NULL, NULL, '', NULL, NULL, 1422702926, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 34, 12, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(143, NULL, 'huiming2199@hotmail.com', 'f674c3105cf345009525b11dd88c2dc5', 'Hui Ming', NULL, NULL, 'none', NULL, NULL, '', NULL, NULL, 1422882989, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 34, 12, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(144, NULL, 'iris_zee@yahoo.com', 'a47b625814d08e5235d2925f617e10c5', 'njwzee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1422984442, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(145, NULL, 'cloryanasmith@yahoo.com', '0596983def5712456c5c67b4288d9009', 'IamYana', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', 1423126334, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1423182919, 44, 11, 20, 12, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(146, NULL, 'Elise_koh93@yahoo.com', '0a5b1c75f1e24e1dc720a62fa7f4b2e1', 'Elise ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1423303697, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(147, NULL, 'iammelissawong@gmail.com', '1c66d412877ecd9684c80294b651ce92', 'Melissa Wong', NULL, NULL, 'none', NULL, NULL, '', NULL, NULL, 1423560674, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 34, 12, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(148, NULL, 'seowpeibei@gmail.com', 'ff25733b6c9fa023c81ac33008a9f3aa', 'alexisseow', NULL, 'alexiss', 'female', '0', '', '', '0', '0', 1426245482, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1432563706, 53, 12, 12, 27, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(149, NULL, 'wongzhaozi@gmail.com', '4a1fea2c9f8c64be8778f4dc196a8217', 'Wong_ZhaoZi', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', 1427125774, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1434645339, 35, 11, 10, 13, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(150, NULL, 'minicstudio@gmail.com', '5324c4c1883e8a2436e54d3925bc4d27', 'Minic Minic', NULL, NULL, 'none', NULL, NULL, '', NULL, NULL, 1427177405, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 34, 12, 10, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(151, NULL, 'shirleylee_0626@hotmail.com', 'abbeafa75721c60803277e1952613697', 'Shirleylee0626', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', 1427254836, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(152, NULL, 'ccket0055@yahoo.com', 'ca98c949193d1025ebc3f825fc1393c0', 'Ck.Cheng', NULL, NULL, 'male', NULL, NULL, '', NULL, NULL, 1428029756, 0, 0, 13, 5, 0, 1, 0, NULL, NULL, NULL, 42, 11, 20, 10, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(153, NULL, 'chacereg@gmail.com', '034152a23ed356e67c303ecdf1c56be2', 'chaceciela', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1430283965, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 30, 10, 10, 10, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(155, NULL, 'workspaceinfotech@gmail.com', '385a4f56db93c34061be0e7565bfe530', 'Dev.Workspace', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1436246839, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(159, NULL, 'jamilbd11@gmail.com', '805a51389f2178a20a1ef621d1a0ef05', 'Jam.Jussi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1436248286, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(157, NULL, 'jam.jackson.143@gmail.com', '539cb9a89ef20c9acf9310be69b2a44f', 'Jam.Jackson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1436247749, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(160, NULL, 'siam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'siam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1436251784, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(161, NULL, 'fayme.shahriar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'fay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1436256491, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(162, NULL, '559df53c793b9@yolve.it', 'fecc0c03a4eef0d47aac5dc2314cfefd', 'YOLOVE_IT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1436415292, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(163, NULL, 'faymeKhan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'faymeKhan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1437812776, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, ''),
(164, NULL, 'gada@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'gada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1437815243, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, '56068f1b702b0bf2d4938635abc3a4ea'),
(165, NULL, 'newShuvo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'newShuvo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1437818636, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, 'aa03b3476eccccf377d2e80a8966bdb7'),
(166, NULL, 'newMahedi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'newMahedi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1437819540, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, '8dd724526e157d24097a1b479f42b087'),
(167, NULL, '55b60c358750b@yolve.it', 'a4529019f1ff41f5704c66bd17ac1b0f', 'mahedi8073', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1437994037, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, '43107bf969efbad3bef6846344ef18e4'),
(168, NULL, 'mahedi807@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'shadat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1438000791, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 0, 'a596a9208ff831247a2c64bb8dc0fa9e');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `usergroup_type` enum('system','special','member') NOT NULL DEFAULT 'member',
  `usergroup_key` varchar(255) NOT NULL DEFAULT '',
  `usergroup_name` varchar(255) NOT NULL DEFAULT '',
  `credits_lower` int(10) NOT NULL DEFAULT '0',
  `credits_higher` int(10) NOT NULL DEFAULT '0',
  `stars` tinyint(3) NOT NULL DEFAULT '0',
  `color` varchar(255) NOT NULL DEFAULT '',
  `icon` varchar(255) NOT NULL DEFAULT '',
  `allow_visit` tinyint(1) NOT NULL DEFAULT '1',
  `allow_share` tinyint(1) NOT NULL DEFAULT '1',
  `need_verify` tinyint(1) NOT NULL DEFAULT '1',
  `other_permission` text,
  PRIMARY KEY (`id`),
  KEY `idx_credits_range` (`credits_higher`,`credits_lower`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id`, `usergroup_type`, `usergroup_key`, `usergroup_name`, `credits_lower`, `credits_higher`, `stars`, `color`, `icon`, `allow_visit`, `allow_share`, `need_verify`, `other_permission`) VALUES
(1, 'system', 'admin', 'Administrator', 0, 0, 9, '', '', 1, 1, 1, 'a:10:{s:11:"allowvisite";s:3:"200";s:12:"allowmessage";s:1:"1";s:12:"allowposturl";s:1:"3";s:9:"allowpost";s:1:"1";s:10:"postverify";s:1:"0";s:12:"allowcomment";s:1:"1";s:11:"allowupload";s:1:"1";s:7:"allowat";s:1:"1";s:13:"allowdownload";s:1:"1";s:12:"ignorecensor";s:1:"1";}'),
(2, 'system', 'editer', 'Editor', 0, 0, 8, '', '', 1, 1, 1, 'a:10:{s:11:"allowvisite";s:3:"200";s:12:"allowmessage";s:1:"1";s:12:"allowposturl";s:1:"3";s:9:"allowpost";s:1:"1";s:10:"postverify";s:1:"0";s:12:"allowcomment";s:1:"1";s:11:"allowupload";s:1:"1";s:7:"allowat";s:1:"1";s:13:"allowdownload";s:1:"1";s:12:"ignorecensor";s:1:"1";}'),
(3, 'system', 'banned_visit', 'Banned Visit', 0, 0, 0, '', '', 0, 0, 1, 'a:10:{s:11:"allowvisite";s:4:"-100";s:12:"allowmessage";s:1:"0";s:12:"allowposturl";s:1:"0";s:9:"allowpost";s:1:"0";s:10:"postverify";s:1:"0";s:12:"allowcomment";s:1:"0";s:11:"allowupload";s:1:"0";s:7:"allowat";s:1:"0";s:13:"allowdownload";s:1:"0";s:12:"ignorecensor";s:1:"0";}'),
(4, 'system', 'banned_post', 'Banned Post', 0, 0, 0, '', '', 1, 0, 1, 'a:10:{s:11:"allowvisite";s:3:"100";s:12:"allowmessage";s:1:"0";s:12:"allowposturl";s:1:"0";s:9:"allowpost";s:1:"0";s:10:"postverify";s:1:"0";s:12:"allowcomment";s:1:"0";s:11:"allowupload";s:1:"0";s:7:"allowat";s:1:"0";s:13:"allowdownload";s:1:"1";s:12:"ignorecensor";s:1:"0";}'),
(5, 'system', 'waiting_verify', 'Waiting Verify', 0, 0, 0, '', '', 1, 0, 1, 'a:10:{s:11:"allowvisite";s:3:"100";s:12:"allowmessage";s:1:"1";s:12:"allowposturl";s:1:"0";s:9:"allowpost";s:1:"0";s:10:"postverify";s:1:"1";s:12:"allowcomment";s:1:"1";s:11:"allowupload";s:1:"0";s:7:"allowat";s:1:"0";s:13:"allowdownload";s:1:"1";s:12:"ignorecensor";s:1:"0";}'),
(6, 'system', 'member', 'Member', 0, 0, 0, '', '', 1, 1, 1, 'a:10:{s:11:"allowvisite";s:3:"100";s:12:"allowmessage";s:1:"1";s:12:"allowposturl";s:1:"3";s:9:"allowpost";s:1:"1";s:10:"postverify";s:1:"0";s:12:"allowcomment";s:1:"1";s:11:"allowupload";s:1:"1";s:7:"allowat";s:1:"1";s:13:"allowdownload";s:1:"1";s:12:"ignorecensor";s:1:"0";}'),
(7, 'system', 'guest', 'Guest', 0, 0, 0, '', '', 1, 1, 1, 'a:10:{s:11:"allowvisite";s:3:"100";s:12:"allowmessage";s:1:"0";s:12:"allowposturl";s:1:"0";s:9:"allowpost";s:1:"0";s:10:"postverify";s:1:"0";s:12:"allowcomment";s:1:"0";s:11:"allowupload";s:1:"0";s:7:"allowat";s:1:"0";s:13:"allowdownload";s:1:"1";s:12:"ignorecensor";s:1:"0";}'),
(16, '', 'da', 'asd', 0, 0, 0, '', '', 1, 1, 1, NULL),
(17, '', 'sdf', 'df', 0, 0, 0, '', '', 1, 1, 1, NULL),
(18, '', 'Grownup', 'asd', 0, 0, 0, '', '', 1, 1, 1, NULL),
(19, 'system', 'Grownup', 'Grownup', 0, 0, 0, '', '', 1, 1, 1, NULL),
(9, 'member', 'learner', '', 50, 200, 2, '0', '', 1, 1, 1, 'a:12:{s:8:"allowurl";s:1:"1";s:12:"allowposturl";s:1:"3";s:8:"maxalbum";s:2:"20";s:9:"maxfollow";s:3:"100";s:12:"maxattachnum";s:2:"10";s:13:"maxattachsize";s:7:"2048000";s:10:"maxmessage";s:3:"100";s:10:"allowvideo";s:1:"1";s:10:"allowfetch";s:1:"1";s:12:"allowfileext";s:15:"jpg|png|gif|zip";s:10:"maxcrgroup";s:2:"10";s:10:"maxcrtopic";s:2:"20";}'),
(10, 'member', 'Grownup', 'Fashion Grownup', 200, 500, 3, '0', '', 1, 1, 1, 'a:12:{s:8:"allowurl";s:1:"1";s:12:"allowposturl";s:1:"3";s:8:"maxalbum";s:2:"20";s:9:"maxfollow";s:3:"100";s:12:"maxattachnum";s:2:"10";s:13:"maxattachsize";s:7:"2048000";s:10:"maxmessage";s:3:"100";s:10:"allowvideo";s:1:"1";s:10:"allowfetch";s:1:"1";s:12:"allowfileext";s:15:"jpg|png|gif|zip";s:10:"maxcrgroup";s:2:"10";s:10:"maxcrtopic";s:2:"20";}'),
(11, 'member', 'explorer', 'Fashion Explorer', 500, 1000, 4, '0', '', 1, 1, 1, 'a:12:{s:8:"allowurl";s:1:"1";s:12:"allowposturl";s:1:"3";s:8:"maxalbum";s:3:"200";s:9:"maxfollow";s:3:"100";s:12:"maxattachnum";s:2:"10";s:13:"maxattachsize";s:7:"2048000";s:10:"maxmessage";s:3:"100";s:10:"allowvideo";s:1:"1";s:10:"allowfetch";s:1:"1";s:12:"allowfileext";s:15:"jpg|png|gif|zip";s:10:"maxcrgroup";s:2:"10";s:10:"maxcrtopic";s:2:"20";}'),
(12, 'member', 'stylist', 'Fashion Stylist', 1000, 3000, 6, '0', '', 1, 1, 1, 'a:12:{s:8:"allowurl";s:1:"1";s:12:"allowposturl";s:1:"3";s:8:"maxalbum";s:2:"20";s:9:"maxfollow";s:3:"100";s:12:"maxattachnum";s:2:"10";s:13:"maxattachsize";s:7:"2048000";s:10:"maxmessage";s:3:"200";s:10:"allowvideo";s:1:"1";s:10:"allowfetch";s:1:"1";s:12:"allowfileext";s:15:"jpg|png|gif|zip";s:10:"maxcrgroup";s:2:"10";s:10:"maxcrtopic";s:2:"20";}'),
(14, 'special', 'star', 'Star', 0, 9999999, 8, '', '', 1, 1, 1, ''),
(15, 'special', 'store', 'Store', 0, 9999999, 8, '', '', 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_newsletter`
--

CREATE TABLE IF NOT EXISTS `user_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_usergroup`
--

CREATE TABLE IF NOT EXISTS `user_usergroup` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`,`user_id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_group_id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_usergroup`
--

INSERT INTO `user_usergroup` (`id`, `user_id`, `create_time`) VALUES
(1, 1, 1373314324),
(8, 1, 1379914040),
(1, 2, 1376499764),
(8, 2, 1376499764),
(6, 3, 1374221672),
(8, 3, 1374221672),
(1, 4, 1377758638),
(9, 4, 1379928652),
(1, 5, 1377758848),
(10, 5, 1393923651),
(1, 6, 1418372417),
(10, 6, 1428992587),
(1, 7, 1378194281),
(8, 7, 1378194281),
(6, 8, 1378200338),
(8, 8, 1378200338),
(6, 9, 1378723815),
(9, 9, 1378798616),
(1, 10, 1394000425),
(12, 10, 1428992313),
(6, 11, 1379479197),
(12, 11, 1403453416),
(6, 12, 1379480511),
(8, 12, 1379480511),
(6, 13, 1379485744),
(8, 13, 1379485744),
(1, 14, 1424142690),
(9, 14, 1424142690),
(6, 15, 1379574053),
(8, 15, 1389300029),
(6, 16, 1379934087),
(10, 16, 1380168767),
(6, 17, 1379939339),
(9, 17, 1380102597),
(6, 18, 1418372901),
(12, 18, 1431510418),
(6, 19, 1380709430),
(8, 19, 1380709430),
(6, 20, 1382513251),
(12, 20, 1411658253),
(6, 21, 1382607056),
(8, 21, 1420710895),
(6, 22, 1382948658),
(8, 22, 1382948658),
(6, 23, 1382954369),
(8, 23, 1382954369),
(1, 25, 1388684691),
(9, 25, 1392264170),
(6, 26, 1392474845),
(8, 26, 1392474845),
(6, 27, 1393373237),
(8, 27, 1393373237),
(15, 10, 1394000425),
(6, 30, 1394874542),
(8, 30, 1394874542),
(6, 32, 1394879666),
(8, 32, 1394879666),
(6, 33, 1395330432),
(8, 33, 1395330432),
(6, 34, 1395641956),
(8, 34, 1395641956),
(6, 35, 1395642492),
(8, 35, 1395642492),
(6, 36, 1395659423),
(8, 36, 1395659423),
(6, 37, 1395668825),
(8, 37, 1395668825),
(6, 38, 1395669900),
(8, 38, 1395669900),
(6, 39, 1395670167),
(8, 39, 1395670167),
(6, 40, 1395670911),
(8, 40, 1395670911),
(6, 41, 1395676605),
(8, 41, 1395676605),
(6, 42, 1395681824),
(8, 42, 1395681824),
(6, 43, 1395684499),
(8, 43, 1395684499),
(6, 44, 1395686408),
(8, 44, 1395686408),
(6, 45, 1395697638),
(8, 45, 1395697638),
(6, 46, 1395699629),
(8, 46, 1395699629),
(6, 47, 1395705615),
(8, 47, 1395705615),
(6, 48, 1395891782),
(8, 48, 1395891782),
(6, 49, 1395905404),
(8, 49, 1395905404),
(6, 50, 1395949530),
(8, 50, 1395949530),
(6, 51, 1396382868),
(8, 51, 1396382868),
(6, 52, 1396422461),
(8, 52, 1396422461),
(6, 53, 1396617124),
(8, 53, 1396617124),
(6, 54, 1396724299),
(8, 54, 1401275537),
(6, 55, 1396962759),
(8, 55, 1396962759),
(6, 56, 1397026269),
(8, 56, 1397026269),
(6, 57, 1397288218),
(8, 57, 1397288218),
(6, 58, 1397901369),
(8, 58, 1397901369),
(6, 59, 1397963184),
(8, 59, 1397963184),
(6, 60, 1398200185),
(8, 60, 1398200185),
(6, 61, 1398547641),
(8, 61, 1398547641),
(6, 62, 1398581803),
(8, 62, 1398581803),
(6, 63, 1398592043),
(8, 63, 1398592043),
(6, 64, 1398604800),
(8, 64, 1398604800),
(6, 65, 1398637816),
(8, 65, 1398637816),
(6, 66, 1398820066),
(8, 66, 1398820066),
(6, 67, 1398838332),
(8, 67, 1398838332),
(6, 68, 1398921239),
(8, 68, 1398921239),
(6, 69, 1398977957),
(8, 69, 1398977957),
(6, 70, 1399045113),
(8, 70, 1399045113),
(6, 71, 1399051879),
(8, 71, 1399051879),
(6, 72, 1399054648),
(8, 72, 1399054648),
(6, 73, 1399155972),
(8, 73, 1399155972),
(6, 74, 1399365988),
(8, 74, 1399365988),
(6, 75, 1399404780),
(8, 75, 1399404780),
(6, 76, 1399506959),
(8, 76, 1399506959),
(6, 77, 1399510489),
(8, 77, 1399510489),
(6, 78, 1399530654),
(8, 78, 1399530654),
(6, 79, 1399629100),
(8, 79, 1399629100),
(6, 80, 1399644412),
(8, 80, 1399644412),
(6, 81, 1399788937),
(8, 81, 1399788937),
(6, 82, 1399942258),
(8, 82, 1399942258),
(6, 83, 1399942272),
(8, 83, 1399942272),
(6, 84, 1400012495),
(8, 84, 1400012495),
(6, 85, 1400185563),
(8, 85, 1400185563),
(6, 87, 1400367153),
(8, 87, 1400367153),
(6, 86, 1400367153),
(8, 86, 1400367153),
(6, 88, 1400401734),
(8, 88, 1400401734),
(6, 89, 1400585563),
(8, 89, 1400585563),
(6, 90, 1400619082),
(8, 90, 1400619082),
(6, 91, 1400859493),
(8, 91, 1400859493),
(6, 92, 1400953720),
(8, 92, 1400953720),
(6, 93, 1400979166),
(8, 93, 1400979166),
(6, 94, 1401033267),
(8, 94, 1401033267),
(6, 95, 1401141656),
(8, 95, 1401141656),
(6, 96, 1401153539),
(8, 96, 1401153539),
(6, 97, 1401164545),
(9, 97, 1407841064),
(6, 98, 1401198243),
(8, 98, 1401198243),
(1, 99, 1401326778),
(9, 99, 1408428564),
(6, 100, 1404803657),
(8, 100, 1401355461),
(6, 101, 1410156067),
(8, 101, 1410156067),
(6, 102, 1410158039),
(8, 102, 1410158039),
(6, 103, 1410327771),
(8, 103, 1410327771),
(6, 104, 1424142755),
(8, 104, 1424142755),
(6, 105, 1401556545),
(8, 105, 1401556545),
(6, 106, 1401696540),
(8, 106, 1401696540),
(6, 107, 1401701562),
(8, 107, 1401701562),
(6, 108, 1411445912),
(8, 108, 1411445912),
(6, 109, 1411660305),
(8, 109, 1411660305),
(1, 110, 1418372062),
(13, 110, 1419915925),
(6, 111, 1415195288),
(9, 111, 1415197332),
(6, 112, 1415621449),
(8, 112, 1420710891),
(6, 113, 1415724961),
(8, 113, 1415724961),
(6, 155, 1436246839),
(6, 154, 1436246041),
(6, 115, 1418305096),
(8, 115, 1418305096),
(6, 116, 1418445540),
(8, 116, 1418445540),
(6, 117, 1418724707),
(8, 117, 1418724707),
(6, 118, 1418967355),
(8, 118, 1418967355),
(6, 119, 1419045795),
(8, 119, 1419045795),
(6, 120, 1419089702),
(8, 120, 1419089702),
(6, 121, 1419915551),
(8, 121, 1419916387),
(6, 122, 1419945356),
(8, 122, 1419945356),
(6, 123, 1420168776),
(8, 123, 1420168776),
(6, 124, 1420519660),
(8, 124, 1420519660),
(6, 125, 1420523257),
(8, 125, 1420523257),
(1, 126, 1422349557),
(10, 126, 1426839317),
(6, 127, 1420538457),
(8, 127, 1420538457),
(6, 128, 1420605165),
(8, 128, 1420605165),
(6, 129, 1420644703),
(8, 129, 1428992291),
(6, 130, 1420700422),
(8, 130, 1420710908),
(6, 131, 1420728710),
(8, 131, 1428992302),
(6, 132, 1421131480),
(8, 132, 1421131480),
(6, 133, 1421135135),
(8, 133, 1421746016),
(6, 134, 1421244109),
(8, 134, 1421244109),
(6, 135, 1421652306),
(8, 135, 1421662396),
(6, 136, 1421724007),
(8, 136, 1421746019),
(6, 137, 1422105173),
(8, 137, 1422105173),
(6, 138, 1422233571),
(8, 138, 1422233571),
(6, 139, 1422268031),
(8, 139, 1428387734),
(6, 140, 1422365768),
(8, 140, 1422365768),
(6, 141, 1422627063),
(8, 141, 1422627063),
(6, 142, 1422702926),
(8, 142, 1428387744),
(6, 143, 1422882989),
(8, 143, 1428992307),
(6, 144, 1422984442),
(8, 144, 1422984442),
(6, 145, 1423566483),
(8, 145, 1423566483),
(6, 146, 1423303697),
(8, 146, 1423303697),
(6, 147, 1423560674),
(8, 147, 1428992313),
(6, 148, 1429607819),
(9, 148, 1432086613),
(6, 149, 1429607780),
(8, 149, 1429607780),
(6, 150, 1427177405),
(8, 150, 1427177405),
(6, 151, 1429607802),
(8, 151, 1429607802),
(6, 152, 1428029756),
(8, 152, 1428992599),
(6, 153, 1430283965),
(8, 153, 1430283965),
(6, 159, 1436248286),
(6, 157, 1436247749),
(6, 160, 1436251784),
(6, 161, 1436256491),
(6, 162, 1436415292),
(6, 163, 1437812776),
(6, 164, 1437815244),
(6, 165, 1437818636),
(8, 165, 1437818637),
(6, 166, 1437819540),
(8, 166, 1437819541),
(6, 167, 1437994037),
(8, 167, 1437994038),
(6, 168, 1438000791),
(8, 168, 1438000792);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
