-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2021 at 07:07 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `okzpatelsons`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `add_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(10) NOT NULL,
  `alt_mobile` varchar(13) NOT NULL,
  `pincode` decimal(10,0) NOT NULL,
  `address` varchar(70) NOT NULL,
  `city` varchar(20) NOT NULL,
  `landmark` varchar(20) NOT NULL,
  PRIMARY KEY (`add_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`add_id`, `c_id`, `alt_mobile`, `pincode`, `address`, `city`, `landmark`) VALUES
(6, 1, '09712169979', '396580', 'navafaliya', 'vansda', 'madresani bajuma');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(20) NOT NULL,
  `pass` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `pass`) VALUES
('okzpatelsons@2108', 652323);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `scale` varchar(10) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `pass` varchar(10) NOT NULL,
  `auth_token` varchar(70) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`u_id`, `name`, `email`, `mobile`, `pass`, `auth_token`) VALUES
(1, 'Sarjil Shaikh', 'sarjilshaikh02@gmail.com', '9712169979', '9712169979', '18UTdrDD0ZBfYUlVVh4s1C4K9WDkmuu34K3sJ7nZosWd5g8hVW'),
(2, 'Antrix Patel', 'hardhebro@gmail.com', '9979460606', '9979460606', ''),
(3, 'salman ansari', 'somu@gmail.com', '7046328328', 'remember', '0'),
(4, 'Sarjil Shaikh', 'somu@gmail.comm', '7046328327', '7046328327', '8BglA4vsWyP0VoDhT4Jo9T8bbc2KEAkqaP4dkM7mAzjdOrMuQd'),
(5, 'Sarjil Shaikh', 'hardhaebro@gmail.com', '6712169979', '9712469979', '0'),
(6, 'Sarjil Shaikh', 'hardh6ebro@gmail.com', '9714169979', '9714169979', '0');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `ord_id` int(20) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `address_id` int(10) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  PRIMARY KEY (`ord_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `c_id`, `amount`, `date`, `time`, `address_id`, `payment_status`, `order_status`) VALUES
(1, 1, 340, '02-09-2021', '06:57:54am', 4, 'COD', 'Placed'),
(2, 1, 310, '02-09-2021', '06:58:06am', 4, 'COD', 'Placed'),
(3, 1, 2765, '02-09-2021', '07:05:51am', 6, 'COD', 'Placed');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` decimal(20,0) NOT NULL,
  `weight` decimal(20,0) NOT NULL,
  `scale` varchar(20) NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `subtotal` decimal(20,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `p_id`, `qty`, `weight`, `scale`, `price`, `subtotal`) VALUES
(1, 3, '1', '250', 'Gram', '200', '200'),
(1, 9, '1', '500', 'Gram', '120', '120'),
(2, 7, '1', '100', 'Gram', '50', '50'),
(2, 7, '1', '500', 'Gram', '240', '240'),
(3, 1, '3', '250', 'Gram', '875', '2625'),
(3, 9, '1', '500', 'Gram', '120', '120');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(30) NOT NULL,
  `group` varchar(20) NOT NULL,
  `thumbnail` varchar(30) NOT NULL,
  `keywords` varchar(300) NOT NULL,
  `opening_stock` decimal(10,0) NOT NULL,
  `closing_stock` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `group`, `thumbnail`, `keywords`, `opening_stock`, `closing_stock`) VALUES
(1, 'Cardamom / Elaichi', 'w_spice', 'cardamom123.jpg', 'elchi, elaichi, cardamom, elcha, gree elchi, alci, alchi', '10', '6'),
(2, 'Star Anise / Badiya', 'w_spice', 'star_anise123.jpg', 'badiya, badiyan, star, anise, aniseed', '10', '5'),
(3, 'Cinnamon / Taj', 'w_spice', 'cinnamon123.jpg', 'taj, cinmon, taj, bhungli,', '10', '7'),
(4, 'Red Chilli Powder', 'g_spice', 'chilli_powder.jpg', 'marcha, bhukhi, powder, chilly,', '10', '8'),
(5, 'Dhana Powder', 'g_spice', 'dhana_powder.jpg', 'dhana, powder, jeera,dhanya, dhyan,', '5', '4'),
(6, 'Turmeric Powder', 'g_spice', 'turmeric_powder.jpg', 'haldi, haldar, hardar, haddar, turmeric, turmeric, powder', '10', '5'),
(7, 'Chicken Masala', 'g_spice', 'chicken_masala.jpg', 'chicken, marghi, masala, powder', '8', '7'),
(8, 'Rajwadi Garam Masala', 'g_spice', 'rajwadi_garam_masala.jpg', 'garam masala, masalo, spice', '9', '8'),
(9, 'Dhana Jeera Powder', 'g_spice', 'dhanajeera_powder.jpg', 'dhanajeeru, dhana, jeeru, dhana jiru', '5', '4'),
(10, 'Cashew Nuts', 'dry_fruits', 'cashew_nuts.jpg', 'kaju, kaaju, kajoo, nuts, cashew,', '10', '5'),
(11, 'Almond', 'dry_fruits', 'almonds.jpg', 'badam, badaam, baadam, almonds', '7', '5'),
(12, 'Cloves / Laving', 'w_spice', 'cloves.jpg', 'loveng, lavang, lavag, clove', '10', '9');

-- --------------------------------------------------------

--
-- Table structure for table `products_unit`
--

CREATE TABLE IF NOT EXISTS `products_unit` (
  `id` int(11) NOT NULL,
  `qty` decimal(20,0) NOT NULL,
  `unit` varchar(10) NOT NULL DEFAULT 'Gram',
  `price` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_unit`
--

INSERT INTO `products_unit` (`id`, `qty`, `unit`, `price`) VALUES
(1, '100', 'Gram', '350'),
(1, '250', 'Gram', '875'),
(1, '500', 'Gram', '1750'),
(1, '1', 'KG', '3500'),
(2, '100', 'Gram', '200'),
(2, '250', 'Gram', '500'),
(2, '500', 'Gram', '1000'),
(2, '1', 'KG', '2000'),
(3, '100', 'Gram', '80'),
(3, '250', 'Gram', '200'),
(3, '500', 'Gram', '400'),
(3, '1', 'KG', '800'),
(4, '250', 'Gram', '75'),
(4, '500', 'Gram', '140'),
(4, '1', 'KG', '280'),
(4, '100', 'Gram', '30'),
(5, '100', 'Gram', '20'),
(5, '250', 'Gram', '50'),
(5, '500', 'Gram', '90'),
(5, '1', 'KG', '180'),
(6, '100', 'Gram', '20'),
(6, '250', 'Gram', '50'),
(6, '500', 'Gram', '90'),
(6, '1', 'KG', '180'),
(7, '100', 'Gram', '50'),
(7, '250', 'Gram', '120'),
(7, '500', 'Gram', '240'),
(7, '1', 'KG', '480'),
(8, '100', 'Gram', '60'),
(8, '250', 'Gram', '150'),
(8, '500', 'Gram', '290'),
(8, '1', 'KG', '580'),
(9, '100', 'Gram', '25'),
(9, '250', 'Gram', '60'),
(9, '500', 'Gram', '120'),
(9, '1', 'KG', '240'),
(10, '250', 'Gram', '250'),
(10, '500', 'Gram', '480'),
(10, '1', 'KG', '950'),
(11, '250', 'Gram', '350'),
(11, '500', 'Gram', '690'),
(11, '1', 'KG', '1380'),
(1, '50', 'Gram', '180'),
(12, '50', 'Gram', '80'),
(12, '100', 'Gram', '150');

-- --------------------------------------------------------

--
-- Table structure for table `pro_img`
--

CREATE TABLE IF NOT EXISTS `pro_img` (
  `pro_id` int(11) NOT NULL,
  `img` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pro_img`
--

INSERT INTO `pro_img` (`pro_id`, `img`) VALUES
(1, 'almonds.jpg'),
(1, 'cardamom123.jpg'),
(1, 'cashew_nuts.jpg');
