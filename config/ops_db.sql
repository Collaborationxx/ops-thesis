-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 04:08 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ops_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `stock_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `quantity`, `stock_date`) VALUES
(1, 1, 23, '2017-02-18 03:02:53'),
(2, 2, 6, '2017-02-18 03:28:53'),
(3, 4, 9, '2017-02-18 03:29:03'),
(4, 5, 5, '2017-02-18 03:29:12'),
(5, 7, 10, '2017-02-18 03:29:22'),
(6, 6, 0, '2017-02-18 03:29:35'),
(7, 10, 100, '2017-02-19 09:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_history`
--

CREATE TABLE IF NOT EXISTS `inventory_history` (
  `inventory_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `stock_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory_history`
--

INSERT INTO `inventory_history` (`inventory_id`, `quantity`, `stock_date`) VALUES
(1, 10, '2017-02-18 03:02:53'),
(1, 5, '2017-02-18 03:03:21'),
(2, 10, '2017-02-18 03:28:53'),
(3, 10, '2017-02-18 03:29:03'),
(4, 5, '2017-02-18 03:29:12'),
(5, 100, '2017-02-18 03:29:22'),
(6, 1, '2017-02-18 03:29:35'),
(5, 5, '2017-02-18 14:30:32'),
(1, 5, '2017-02-19 05:03:18'),
(1, 5, '2017-02-19 05:03:26'),
(1, 1, '2017-02-19 05:03:34'),
(1, 3, '2017-02-19 05:03:42'),
(7, 100, '2017-02-19 09:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`) VALUES
(1, 1, 1, 1500.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE IF NOT EXISTS `order_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `order_type` tinyint(1) NOT NULL COMMENT '0=counter;1=online',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=pending;1=paid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`id`, `customer_id`, `customer_name`, `order_type`, `order_date`, `payment_status`) VALUES
(1, 30, NULL, 1, '2017-02-27 14:23:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `deposit_number` int(11) NOT NULL,
  `deposit_amount` float(11,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_mode` tinyint(1) NOT NULL COMMENT '0=partial;1=payment',
  `payment_for` tinyint(1) NOT NULL COMMENT '0=order;1=reservation',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = idle; 1 = confirmed; 2=rejected',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `order_id`, `reservation_id`, `deposit_number`, `deposit_amount`, `payment_date`, `payment_mode`, `payment_for`, `status`) VALUES
(1, 1, NULL, 123546, 1501.00, '2017-02-27 15:39:13', 1, 0, 2),
(2, NULL, 1, 2545, 4000.00, '2017-02-27 15:39:32', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` float(255,2) NOT NULL,
  `picture` text NOT NULL,
  `category` int(2) NOT NULL,
  `availability` tinyint(1) DEFAULT '0' COMMENT '0=on hand; 2= for reservation',
  `phase_out` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=No; 1=Yes',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `picture`, `category`, `availability`, `phase_out`) VALUES
(1, 'BP Monitor', 'Digital bp monitor, small, wired,', 1500.00, 'Blood-Pressure-Monitor.jpg', 1, 0, 0),
(2, 'Nebulizer', 'electric small and durable', 2500.00, 'nebulizer.png', 2, 0, 0),
(4, 'Oxygen Tank', 'heavy metal', 500.00, 'oxygen-tank.jpg', 5, 0, 0),
(5, 'Wheelchair (black)', 'black', 9000.00, 'wheelchair.jpg', 9, 1, 1),
(6, 'Walker Boots', 'black', 25000.00, 'walker-boots.jpg', 9, 1, 1),
(7, 'Bandage', 'cotton', 150.00, 'bandage.jpg', 2, 0, 0),
(9, 'gloves', '', 150.00, 'STERILE-LATEX-GLOVES.png', 4, 1, 0),
(10, 'ear thermometer', 'battery powered', 250.00, 'ear thermometer.png', 2, 0, 0),
(11, 'head immobilizer', 'red', 5000.00, 'head immobilizer.png', 9, 1, 0),
(12, 'Cotton', '500pcs', 150.00, 'cotton balls.png', 2, 0, 0),
(13, 'Hospital bed', 'large', 15000.00, 'hospital bed.png', 8, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE IF NOT EXISTS `product_gallery` (
  `product_id` int(11) NOT NULL,
  `photo` blob NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE IF NOT EXISTS `receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_details`
--

CREATE TABLE IF NOT EXISTS `reservation_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reservation_details`
--

INSERT INTO `reservation_details` (`id`, `reservation_id`, `product_id`, `price`, `quantity`) VALUES
(1, 1, 1, 1500.00, 1),
(2, 1, 2, 2500.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_tbl`
--

CREATE TABLE IF NOT EXISTS `reservation_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `reservation_type` tinyint(1) NOT NULL COMMENT '0=counter;1=online',
  `reserved_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=pending;1=partial;2=full',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reservation_tbl`
--

INSERT INTO `reservation_tbl` (`id`, `customer_id`, `customer_name`, `reservation_type`, `reserved_date`, `payment_status`) VALUES
(1, 30, NULL, 1, '2017-02-27 13:48:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `contact_number` text,
  `email` varchar(255) NOT NULL,
  `user_role` tinyint(1) NOT NULL COMMENT '0=staff; 1=admin; 2 = customer',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `user_account`
--



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
