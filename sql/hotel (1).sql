-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 30, 2019 at 07:08 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `hotel_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `hotel_name` varchar(255) DEFAULT NULL,
  `location` text,
  `description` text,
  `meals` int(1) DEFAULT NULL,
  `s_pool` int(1) DEFAULT NULL,
  PRIMARY KEY (`hotel_id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `user_id`, `hotel_name`, `location`, `description`, `meals`, `s_pool`) VALUES
(1, 11, 'Radhika Regency', 'Rourkela', 'Super Deluxe Hotel', 1, 1),
(2, 12, 'Central Park', 'Rourkela', 'good one', 1, 1),
(3, 15, 'MV residency', 'Rourkela', 'fkjfjfjfjhj', 1, 1),
(4, 16, 'Wander Lust', 'Pune', 'Free hotel', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `hotel_id` int(10) UNSIGNED NOT NULL,
  `room_type` int(1) UNSIGNED NOT NULL,
  `luxury` int(1) UNSIGNED NOT NULL,
  `extra_beds` int(1) UNSIGNED DEFAULT NULL,
  `availability` int(10) UNSIGNED DEFAULT NULL,
  `base_cost` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`hotel_id`,`room_type`,`luxury`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`hotel_id`, `room_type`, `luxury`, `extra_beds`, `availability`, `base_cost`) VALUES
(2, 0, 0, 1, 9, 1234),
(3, 1, 0, 1, 0, 700),
(3, 0, 0, 0, 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbooking`
--

DROP TABLE IF EXISTS `tbooking`;
CREATE TABLE IF NOT EXISTS `tbooking` (
  `booking_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `hotel_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_name` varchar(100) NOT NULL,
  `room_type` int(1) UNSIGNED DEFAULT NULL,
  `luxury` int(1) UNSIGNED DEFAULT NULL,
  `booking_date` date NOT NULL,
  `check_in_date` date NOT NULL DEFAULT '2019-04-29',
  `day_no` int(10) UNSIGNED DEFAULT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `cost` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `fk_user_id` (`user_id`),
  KEY `fk_hotel_id` (`hotel_id`),
  KEY `fk_room_type` (`room_type`),
  KEY `fk_luxury` (`luxury`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbooking`
--

INSERT INTO `tbooking` (`booking_id`, `user_id`, `hotel_id`, `booking_name`, `room_type`, `luxury`, `booking_date`, `check_in_date`, `day_no`, `no_of_rooms`, `cost`) VALUES
(30, 13, 2, 'Roshan Shaw', 0, 0, '2019-04-30', '2008-05-13', 2, 3, 7404);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `aadhar_no` varchar(20) DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `DOB`, `email`, `password`, `aadhar_no`, `role`) VALUES
(12, 'Roshan', 'Kumar Shaw', '1998-08-13', 'roshankushaw1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '987654321', 1),
(11, 'Jimmy', 'Anderson', '1998-08-13', '117cs0268@nitrkl.ac.in', 'e10adc3949ba59abbe56e057f20f883e', '11223346', 1),
(9, 'Jimmy', 'Anderson', '1998-08-13', '117cs0266@nitrkl.ac.in', 'e10adc3949ba59abbe56e057f20f883e', '11223344', 1),
(10, 'Jimmy', 'Anderson', '1998-08-13', '117cs0267@nitrkl.ac.in', 'e10adc3949ba59abbe56e057f20f883e', '11223345', 1),
(13, 'Roshan', 'Shaw', '1998-08-13', 'roshankushaw2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '12233445566', 0),
(14, 'Sandeep', 'Shiraskar', '1998-05-10', 'sandepshiraskar@gmail.com', 'cbbe2af7db7f398dfdaec3eaa687e8ca', '14701223', 0),
(15, 'Sandeep', 'Shiraskar', '1998-05-10', 'sandeepsh98@gmail.com', 'cbbe2af7db7f398dfdaec3eaa687e8ca', '192846981', 1),
(16, 'Sandeep', 'Shiraskar', '1998-05-10', 'sandeepshiraskar@gmail.com', '45ad013466040d704a86b174664ce807', '904710371837', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
