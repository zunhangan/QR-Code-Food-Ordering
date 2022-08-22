-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 08:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `southernbistro`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodaddon`
--

CREATE TABLE `foodaddon` (
  `id` varchar(80) NOT NULL,
  `info` text DEFAULT NULL,
  `money` float(100,0) DEFAULT 0,
  `time` datetime DEFAULT NULL,
  `succ` bit(1) DEFAULT b'0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `foodadmin`
--

CREATE TABLE `foodadmin` (
  `id` varchar(10) NOT NULL COMMENT 'id',
  `user` varchar(20) DEFAULT NULL COMMENT 'username',
  `pass` varchar(60) DEFAULT NULL COMMENT 'password'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `foodadmin`
--

INSERT INTO `foodadmin` (`id`, `user`, `pass`) VALUES
('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `foodmenu`
--

CREATE TABLE `foodmenu` (
  `id` int(10) NOT NULL,
  `foodtype` int(10) NOT NULL COMMENT 'foodtype',
  `name` text NOT NULL COMMENT 'foodname',
  `money` double(10,2) DEFAULT NULL COMMENT 'unitPrice',
  `pic` varchar(100) DEFAULT NULL COMMENT 'picURL',
  `info` text DEFAULT NULL COMMENT 'description',
  `push` varchar(4) NOT NULL DEFAULT '0' COMMENT 'isRecommended'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `foodmenu`
--

INSERT INTO `foodmenu` (`id`, `foodtype`, `name`, `money`, `pic`, `info`, `push`) VALUES
(1, 1, 'Cheese Balls', 15.90, 'upload/cheeseballs.jpg', 'Our outstanding cheese balls are all about the crunch and so sinful yet simple.', '0'),
(2, 3, 'Bhuna Masala Chicken Wings', 17.90, 'upload/chicwings.jpg', 'Recipe with dry red chillies, cumin and coriander', '0'),
(3, 1, 'Tangri Kebabs', 20.90, 'upload/kebabs.jpg', 'Our delicious chicken drumsticks are microwave-friendly and just too good to be true.', '0'),
(4, 3, 'Signature Fried Chicken', 21.90, 'upload/friedchic.jpg', 'Crunchy, crispy and just divine.', '1'),
(5, 2, 'Mushroom Soup', 10.00, 'upload/mushroomsoup.jpg', 'Delicious and Creamy Mushroom Soup', '0'),
(6, 2, 'Vegetable Soup', 8.00, 'upload/img_16610187173468.jpg', 'Healthy and Sweet Vegetable Soup', '0'),
(8, 3, 'Kampung Fried Rice', 15.00, 'upload/img_16610190496513.jpg', 'Delicious Fried Rice served with Egg', '0'),
(9, 3, 'Seafood Kampung Fried Rice', 25.00, 'upload/img_16610190988326.jpg', 'Kampung Fried Rice served with seafood', '0'),
(10, 3, 'Steak', 88.00, 'upload/img_16610191383977.jpg', 'Japanese A5 Wagyu Steak', '1'),
(11, 4, 'Tomato Spaghetti', 13.00, 'upload/img_16610192328085.jpg', 'Sweet and Sour delicious spaghetti', '0'),
(12, 4, 'Carbonara', 14.00, 'upload/img_16610192844736.jpg', 'Creamy and Cheesy Carbonara', '0'),
(13, 5, 'CocaCola', 4.00, 'upload/img_16610193435886.jpg', 'Chilled and Ice CocaCola', '0'),
(14, 5, 'Pepsi', 4.00, 'upload/img_16610193768380.jpg', 'Refreshing Pepsi', '0'),
(15, 6, 'Lava Brownie', 12.00, 'upload/img_16610194339349.jpg', 'Bold Chocolate from Belgium', '0');

-- --------------------------------------------------------

--
-- Table structure for table `foodorder`
--

CREATE TABLE `foodorder` (
  `id` varchar(80) NOT NULL COMMENT 'orderid',
  `num` int(10) NOT NULL COMMENT 'table',
  `info` text NOT NULL COMMENT 'orderitems',
  `money` float(100,0) NOT NULL DEFAULT 0 COMMENT 'totalprice',
  `pnum` int(10) NOT NULL COMMENT 'pax(s)',
  `time` date NOT NULL COMMENT 'time',
  `succ` bit(1) NOT NULL DEFAULT b'0' COMMENT 'iscompleted',
  `addon` varchar(80) NOT NULL DEFAULT '0' COMMENT 'addonid',
  `addonsucc` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `foodtype`
--

CREATE TABLE `foodtype` (
  `id` int(8) NOT NULL,
  `name` text DEFAULT NULL COMMENT 'FoodType'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `foodtype`
--

INSERT INTO `foodtype` (`id`, `name`) VALUES
(1, 'Starter'),
(2, 'Soup'),
(3, 'Main Course'),
(4, 'Spaghetti'),
(5, 'Beverage'),
(6, 'Dessert');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `pic` text NOT NULL,
  `info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `name`, `pic`, `info`) VALUES
(1, 'Southern Bistro', 'upload/southernlogo.jpg', 'Customer satisfaction is our best motivation. Enjoy!');

-- --------------------------------------------------------

--
-- Table structure for table `shopqr`
--

CREATE TABLE `shopqr` (
  `id` int(2) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `shopqr`
--

INSERT INTO `shopqr` (`id`, `url`) VALUES
(1, 'upload/payqr.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foodaddon`
--
ALTER TABLE `foodaddon`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `foodadmin`
--
ALTER TABLE `foodadmin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `foodmenu`
--
ALTER TABLE `foodmenu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `foodorder`
--
ALTER TABLE `foodorder`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `addon` (`addon`) USING BTREE;

--
-- Indexes for table `foodtype`
--
ALTER TABLE `foodtype`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `shopqr`
--
ALTER TABLE `shopqr`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foodmenu`
--
ALTER TABLE `foodmenu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `foodtype`
--
ALTER TABLE `foodtype`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shopqr`
--
ALTER TABLE `shopqr`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
