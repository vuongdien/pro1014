-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for pro1014
CREATE DATABASE IF NOT EXISTS `pro1014` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pro1014`;

-- Dumping structure for table pro1014.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT 'ID người viết',
  `title` char(255) NOT NULL DEFAULT '' COMMENT 'Tiêu đề',
  `created` datetime NOT NULL COMMENT 'Ngày giờ đăng bài viết',
  `update` datetime DEFAULT NULL COMMENT 'Ngày giờ cập nhật bài viết',
  `thumb` char(255) DEFAULT NULL COMMENT 'Hình mô tả',
  `description` varchar(500) DEFAULT NULL COMMENT 'Mô tả',
  `content` text COMMENT 'Bài viết',
  `view` int(11) unsigned DEFAULT NULL COMMENT 'Lượt xem',
  `show` bit(1) DEFAULT NULL COMMENT '(0) Ẩn, (1) Hiện',
  `priority` int(10) unsigned DEFAULT NULL COMMENT 'Thứ tự sắp xếp',
  PRIMARY KEY (`id`),
  KEY `FK_blog_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.blog_comment
CREATE TABLE IF NOT EXISTS `blog_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `content` varchar(1000) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_comment_user` (`user_id`) USING BTREE,
  KEY `FK_comment_product` (`blog_id`) USING BTREE,
  CONSTRAINT `FK_blog_comment_blog` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_blog_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT 'Tên hãng giày',
  `show` bit(1) DEFAULT NULL COMMENT '(0) Ẩn, (1) Hiện',
  `priority` int(11) unsigned DEFAULT NULL COMMENT 'thứ tụ sắp xếp',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.color
CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) DEFAULT NULL COMMENT 'Tên màu',
  `colorCode` char(20) DEFAULT NULL COMMENT 'Mã HEX color',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.config
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `config` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.deal
CREATE TABLE IF NOT EXISTS `deal` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `end_time` datetime NOT NULL,
  `start_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Bản khuyến mãi, khuyến mãi sẽ bắt đầu từ start_time, đến hết end_time, trong thời gian khuyến mãi, sản phẩm sẽ được bán với giá deal_price với số lượng quantity.';

-- Data exporting was unselected.

-- Dumping structure for table pro1014.deal_detail
CREATE TABLE IF NOT EXISTS `deal_detail` (
  `deal_id` int(255) unsigned NOT NULL DEFAULT '0' COMMENT 'Mã đợt khuyến mãi',
  `product_id` int(255) unsigned NOT NULL DEFAULT '0' COMMENT 'Sản phẩm được khuyến mãi',
  `quantity` int(255) unsigned NOT NULL COMMENT 'Số lượng sản phẩm',
  `deal_thumb` text COMMENT 'Hình ảnh khuyến mãi',
  `deal_price` float unsigned DEFAULT NULL COMMENT 'Giá khuyến mãi',
  `sold` int(11) DEFAULT NULL COMMENT 'Số lượng đã bán',
  KEY `FK_product_of_deal_deal` (`deal_id`),
  KEY `FK_product_of_deal_product` (`product_id`),
  CONSTRAINT `FK_product_of_deal_deal` FOREIGN KEY (`deal_id`) REFERENCES `deal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_product_of_deal_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT 'Mới(0), đang giao(1), đã hoàn thành (2), Hủy(3)',
  `created` datetime DEFAULT NULL,
  `name` char(100) DEFAULT NULL,
  `address` char(255) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_order_user` (`user_id`),
  CONSTRAINT `FK_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.order_detail
CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int(11) unsigned NOT NULL COMMENT 'Mã đơn hàng',
  `product_id` int(11) unsigned NOT NULL COMMENT 'Mã sản phẩm',
  `size_id` int(11) unsigned NOT NULL COMMENT 'Mã size',
  `quantity` int(11) unsigned DEFAULT NULL COMMENT 'Số lượng',
  `price` float unsigned DEFAULT NULL COMMENT 'Giá sản phẩm lúc đặt hàng',
  KEY `FK_order_detail_product` (`order_id`),
  KEY `FK_order_detail_product_2` (`product_id`),
  KEY `FK_order_detail_size` (`size_id`),
  CONSTRAINT `FK_order_detail_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm',
  `name` char(255) NOT NULL DEFAULT '' COMMENT 'Tên sản phẩm',
  `cost` float unsigned NOT NULL COMMENT 'Giá gốc chưa giảm',
  `price` float unsigned DEFAULT NULL COMMENT 'Giá bán ra, đã giảm giá',
  `description` varchar(20000) DEFAULT '' COMMENT 'Mô tả sản phẩm',
  `thumb` char(255) DEFAULT '' COMMENT 'Ảnh bìa sản phẩm, không nền, .PNG, ít nhất 2 hình',
  `images` text COMMENT 'Hình ảnh thực tế của sản phẩm',
  `update` datetime NOT NULL COMMENT 'Thời gian update mới nhất',
  `show` bit(1) DEFAULT NULL COMMENT '(0) Ẩn, (1) Hiện',
  `priority` int(10) unsigned DEFAULT NULL COMMENT 'Thứ tự sắp xếp',
  `view` int(10) unsigned DEFAULT NULL COMMENT 'Lượt xem',
  `brand_id` int(10) unsigned DEFAULT NULL COMMENT 'Mã nhãn hàng',
  `color_id` int(10) unsigned DEFAULT NULL COMMENT 'Mã màu',
  PRIMARY KEY (`id`),
  KEY `FK_product_brand` (`brand_id`),
  KEY `FK_product_color` (`color_id`) USING BTREE,
  CONSTRAINT `FK_product_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_product_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.product_comment
CREATE TABLE IF NOT EXISTS `product_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `content` varchar(1000) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_product` (`product_id`),
  KEY `FK_comment_user` (`user_id`),
  CONSTRAINT `FK_comment_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.product_detail
CREATE TABLE IF NOT EXISTS `product_detail` (
  `product_id` int(10) unsigned NOT NULL COMMENT 'Mã sản phẩm',
  `size_id` int(10) unsigned NOT NULL COMMENT 'Size sản phẩm',
  `quantity` int(10) unsigned NOT NULL COMMENT 'Số lượng',
  KEY `FK__product` (`product_id`),
  KEY `FK__size` (`size_id`),
  CONSTRAINT `FK__product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_product_detail_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.review
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `review` varchar(1000) DEFAULT NULL,
  `rate` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_review_product` (`product_id`),
  KEY `FK_review_user` (`user_id`),
  CONSTRAINT `FK_review_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_review_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.size
CREATE TABLE IF NOT EXISTS `size` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `size` int(11) unsigned NOT NULL COMMENT 'Size giày',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.slider
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) unsigned NOT NULL COMMENT 'Sản phẩm của slider',
  `img` text NOT NULL COMMENT 'Đường dẫn hình ảnh',
  `description` text COMMENT 'Mô tả slider',
  `title` text COMMENT 'Tiêu đề slider',
  `show` bit(1) DEFAULT NULL COMMENT '(0) Ẩn,(1) Hiện',
  `priority` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Thứ tự slider',
  PRIMARY KEY (`id`),
  KEY `FK_slider_product` (`product_id`),
  CONSTRAINT `FK_slider_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.tag_blog
CREATE TABLE IF NOT EXISTS `tag_blog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '',
  `show` bit(1) DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.tag_of_blog
CREATE TABLE IF NOT EXISTS `tag_of_blog` (
  `blog_id` int(11) unsigned NOT NULL,
  `tag_id` int(11) unsigned NOT NULL,
  KEY `FK_tag_of_blog_blog` (`blog_id`),
  KEY `FK_tag_of_blog_tag_blog` (`tag_id`),
  CONSTRAINT `FK_tag_of_blog_blog` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tag_of_blog_tag_blog` FOREIGN KEY (`tag_id`) REFERENCES `tag_blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.tag_of_product
CREATE TABLE IF NOT EXISTS `tag_of_product` (
  `product_id` int(11) unsigned DEFAULT NULL,
  `tag_id` int(11) unsigned DEFAULT NULL,
  KEY `FK_tag_of_product_product` (`product_id`),
  KEY `FK_tag_of_product_tag` (`tag_id`),
  CONSTRAINT `FK_tag_of_product_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tag_of_product_tag` FOREIGN KEY (`tag_id`) REFERENCES `tag_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.tag_product
CREATE TABLE IF NOT EXISTS `tag_product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '' COMMENT 'Tên danh mục',
  `show` bit(1) DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table pro1014.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(255) NOT NULL DEFAULT '',
  `password` char(255) NOT NULL DEFAULT '',
  `email` char(255) NOT NULL,
  `phone` char(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `fullname` char(255) DEFAULT NULL,
  `avartar` char(255) DEFAULT NULL,
  `rank` tinyint(255) unsigned DEFAULT NULL,
  `address` char(255) DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
