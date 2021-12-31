-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 11:41 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `res_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_chair`
--

CREATE TABLE `booking_chair` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(200) DEFAULT NULL,
  `chair_id` int(11) DEFAULT NULL,
  `chair_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_chair`
--

INSERT INTO `booking_chair` (`id`, `booking_id`, `chair_id`, `chair_no`) VALUES
(1, '5ccbd8f5609b3', 38, 'TBL-4-1'),
(2, '5ccbd8f5609b3', 39, 'TBL-4-2'),
(3, '5ea89e1a75e6e', 56, 'TBL-1-2'),
(4, '5ea89e1a75e6e', 57, 'TBL-1-3'),
(5, '5ea89f17417d4', 24, 'TBL-1-1');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(200) DEFAULT NULL,
  `res_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `make_date` date DEFAULT NULL,
  `make_time` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` varchar(30) DEFAULT NULL,
  `bill` float DEFAULT NULL,
  `transactionid` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0- reject, 1-confirmed',
  `reject` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `booking_id`, `res_id`, `c_id`, `make_date`, `make_time`, `name`, `phone`, `booking_date`, `booking_time`, `bill`, `transactionid`, `status`, `reject`) VALUES
(1, '5ccbd8f5609b3', 4, 9, '2019-05-03', '12:00:21pm', 'Ratan', '01516189260', '2019-05-04', '1:15pm', 230, 'trxoodkf', 1, 0),
(2, '5ea89e1a75e6e', 7, 9, '2020-04-29', '03:20:26am', 'gg', '09165063741', '2020-04-30', '10:00am', 0, '37868364232tdnqwewytgeasldasfdywsd', 0, 0),
(3, '5ea89f17417d4', 4, 9, '2020-04-29', '03:24:39am', 'gg', '09165063741', '2020-04-30', '10:00am', 90, '37868364232tdnqwewytgeasldasfdywsd', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking_menus`
--

CREATE TABLE `booking_menus` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(200) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_menus`
--

INSERT INTO `booking_menus` (`id`, `booking_id`, `item_id`, `qty`) VALUES
(1, '5ccbd8f5609b3', 4, 2),
(2, '5ccbd8f5609b3', 5, 2),
(3, '5ea89f17417d4', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`) VALUES
(1, 'Mumbai'),
(2, 'Delhi'),
(3, 'Pune'),
(4, 'Goa'),
(5, 'Raipur'),
(6, 'Bhilai'),
(7, 'Durg');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `id` int(11) NOT NULL,
  `res_id` int(11) DEFAULT NULL,
  `item_name` varchar(200) DEFAULT NULL,
  `madeby` varchar(300) DEFAULT NULL,
  `food_type` varchar(100) NOT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`id`, `res_id`, `item_name`, `madeby`, `food_type`, `price`, `image`) VALUES
(4, 4, 'Barbecue chicken (Quarter)', 'Broiler Chicken', 'Fast Food', 90, 'barbecue.jpg'),
(5, 4, 'Naan', 'Wheat flour (Atta, Maida)', 'Fast Food', 25, 'naan.jpg'),
(6, 4, 'Chicken Biryani', 'Rice and Chicken', 'Fast Food', 120, 'chicken birayni.jpg'),
(7, 5, 'Rice (Normal)', 'Rice', 'Fast Food', 30, 'rice.jpg'),
(8, 5, 'Moong Dal', 'Moong dal', 'Fast Food', 30, 'moong dal.jpg'),
(9, 5, 'Fish Curry', 'Rui Fish', 'Fast Food', 120, 'fish curry.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_chair`
--

CREATE TABLE `restaurant_chair` (
  `id` int(11) NOT NULL,
  `tbl_id` int(11) DEFAULT NULL,
  `chair_no` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_chair`
--

INSERT INTO `restaurant_chair` (`id`, `tbl_id`, `chair_no`) VALUES
(24, 3, 'TBL-1-1'),
(25, 3, 'TBL-1-2'),
(26, 3, 'TBL-1-3'),
(27, 3, 'TBL-1-4'),
(28, 3, 'TBL-1-5'),
(29, 3, 'TBL-1-6'),
(30, 4, 'TBL-2-1'),
(31, 4, 'TBL-2-2'),
(32, 4, 'TBL-2-3'),
(33, 4, 'TBL-2-4'),
(34, 5, 'TBL-3-1'),
(35, 5, 'TBL-3-2'),
(36, 5, 'TBL-3-3'),
(37, 5, 'TBL-3-4'),
(38, 6, 'TBL-4-1'),
(39, 6, 'TBL-4-2'),
(40, 6, 'TBL-4-3'),
(41, 7, 'TBL-1-1'),
(42, 7, 'TBL-1-2'),
(43, 7, 'TBL-1-3'),
(44, 7, 'TBL-1-4'),
(45, 7, 'TBL-1-5'),
(46, 8, 'TBL-2-1'),
(47, 8, 'TBL-2-2'),
(48, 8, 'TBL-2-3'),
(49, 9, 'TBL-3-1'),
(50, 9, 'TBL-3-2'),
(51, 9, 'TBL-3-3'),
(52, 9, 'TBL-3-4'),
(53, 10, 'TBL-4-1'),
(54, 10, 'TBL-4-2'),
(55, 11, 'TBL-1-1'),
(56, 11, 'TBL-1-2'),
(57, 11, 'TBL-1-3'),
(58, 11, 'TBL-1-4');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_info`
--

CREATE TABLE `restaurant_info` (
  `id` int(11) NOT NULL,
  `restaurent_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `location` int(11) NOT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `bkashnumber` varchar(20) DEFAULT NULL,
  `approve_status` int(11) NOT NULL DEFAULT '0' COMMENT '0-not approve,1-approve ',
  `role` int(20) DEFAULT NULL COMMENT '1 = restaurant, 2 = customer '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_info`
--

INSERT INTO `restaurant_info` (`id`, `restaurent_name`, `email`, `phone`, `address`, `location`, `logo`, `password`, `bkashnumber`, `approve_status`, `role`) VALUES
(4, 'Park View Restaurant', 'park@gmail.com', '01821356478', '26 Indira Rd, Dhaka 1215', 2, 'park.jpg', '123', '01821356478', 0, 1),
(5, 'New Purabi Hotel And Restaurant', 'newpurabi@gmail.com', '01751235864', 'Farmgate - Tejturi Bazar Rd, 49, East Tejturi Bazar, Farmgate, Tejgaon, Dhaka 1215', 2, 'new purobi.jpg', '123', '01751235864', 0, 1),
(6, 'Bibiana Tehari & Biriyani Ghar', 'bibiana@gmail.com', '01514569852', '27/1, Indira Road, Farm Gate, Dhaka 1215', 2, 'bibiana.jpg', '123', '01514569852', 0, 1),
(7, 'Ancholik Khana', 'ancholik@gmail.com', '01614552245', 'H.No 69, Road, R/A, 2 Niribili Project, Dhaka 1207', 1, 'ancholik.jpg', '123', '01614552245', 0, 1),
(8, 'Bar B Q Tonite', 'barbq@gmail.com', '01711555263', 'House No.58, Road No.16 (NEW) , 27(OLD Dhanmondi R/A, Dhaka 1209', 1, 'barbq.jpg', '123', '01711555263', 0, 1),
(9, 'Ratan', 'ratan.hazra004@gmail.com', '01516189260', '44/2, Indira Road, Rajabazar, Farmgate', 0, 'chicken birayni.jpg', '123', NULL, 0, 2),
(10, 'Cloud Bistro', 'cloud@gmail.com', '01811555666', 'Rowshan Tower, 152/2A-2 (1st Floor, Panthapath Road, Dhaka 1205', 3, 'cloud.jpg', '123', '01811555666', 0, 1),
(11, 'Panthasala', 'panthasala@gmial.com', '01511444852', '57/8, East Rajabazar, West, Panthapath, Dhaka 1215', 3, 'panthasala.jpg', '123', '01511444852', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_tables`
--

CREATE TABLE `restaurant_tables` (
  `id` int(11) NOT NULL,
  `res_id` int(11) DEFAULT NULL,
  `table_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_tables`
--

INSERT INTO `restaurant_tables` (`id`, `res_id`, `table_name`) VALUES
(3, 4, 'TBL-1'),
(4, 4, 'TBL-2'),
(5, 4, 'TBL-3'),
(6, 4, 'TBL-4'),
(7, 5, 'TBL-1'),
(8, 5, 'TBL-2'),
(9, 5, 'TBL-3'),
(10, 5, 'TBL-4'),
(11, 7, 'TBL-1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_chair`
--
ALTER TABLE `booking_chair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_menus`
--
ALTER TABLE `booking_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_chair`
--
ALTER TABLE `restaurant_chair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_info`
--
ALTER TABLE `restaurant_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_tables`
--
ALTER TABLE `restaurant_tables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_chair`
--
ALTER TABLE `booking_chair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking_menus`
--
ALTER TABLE `booking_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `restaurant_chair`
--
ALTER TABLE `restaurant_chair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `restaurant_info`
--
ALTER TABLE `restaurant_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `restaurant_tables`
--
ALTER TABLE `restaurant_tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
