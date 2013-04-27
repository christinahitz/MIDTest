-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2013 at 08:28 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

-- Added SCHEMA references CHitz 04/27/13 09:30

DROP SCHEMA IF EXISTS `Interlock` ;
CREATE SCHEMA IF NOT EXISTS `Interlock` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Interlock` ;


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `interlock`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appID` int(11) NOT NULL AUTO_INCREMENT,
  `servCenterID` int(11) DEFAULT NULL,
  `custID` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`appID`),
  KEY `Customer_idx` (`custID`),
  KEY `DealerID_idx` (`servCenterID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

DROP TABLE IF EXISTS `device`;
CREATE TABLE IF NOT EXISTS `device` (
  `deviceID` int(11) NOT NULL,
  `serialNum` varchar(45) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `lastCal` datetime DEFAULT NULL,
  `lastServ` datetime DEFAULT NULL,
  `lastDraegerServ` datetime DEFAULT NULL,
  `leased` tinyint(1) DEFAULT NULL,
  `locationID` int(11) DEFAULT NULL COMMENT 'Could be located at dealer or customer',
  PRIMARY KEY (`deviceID`),
  UNIQUE KEY `serialNum_UNIQUE` (`serialNum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoiceNum` int(11) NOT NULL AUTO_INCREMENT,
  `serviceDate` date NOT NULL,
  `servTypeID` int(11) NOT NULL,
  `subTotal` decimal(5,2) DEFAULT NULL,
  `total` decimal(5,2) DEFAULT NULL,
  `lesseeID` int(11) NOT NULL,
  `servCenterID` int(11) DEFAULT NULL,
  `techID` int(11) DEFAULT NULL,
  `handsetID` int(11) DEFAULT NULL,
  `controlboxID` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`invoiceNum`),
  KEY `ServiceID_idx` (`servTypeID`),
  KEY `CustomerID_idx` (`lesseeID`),
  KEY `DealerID_idx` (`servCenterID`),
  KEY `TechnicianID_idx` (`techID`),
  KEY `HandsetID_idx` (`handsetID`),
  KEY `ControlboxID_idx` (`controlboxID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lessee`
--

DROP TABLE IF EXISTS `lessee`;
CREATE TABLE IF NOT EXISTS `lessee` (
  `userID` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `homePhone` varchar(25) DEFAULT NULL,
  `mobilePhone` varchar(25) DEFAULT NULL,
  `homeDealer` int(11) DEFAULT NULL,
  `discount` decimal(10,0) DEFAULT NULL,
  `Comment` varchar(255) DEFAULT NULL,
  `removeDate` datetime DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `HomeDealer_idx` (`homeDealer`),
  KEY `userID_idx` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessee`
--

INSERT INTO `lessee` (`userID`, `address`, `homePhone`, `mobilePhone`, `homeDealer`, `discount`, `Comment`, `removeDate`) VALUES
(6, '', '', '', NULL, NULL, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`roleID`),
  UNIQUE KEY `roleName_UNIQUE` (`roleName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `roleName`) VALUES
(1, 'ADMIN'),
(2, 'TECHNICIAN'),
(3, 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `servicecenter`
--

DROP TABLE IF EXISTS `servicecenter`;
CREATE TABLE IF NOT EXISTS `servicecenter` (
  `servCenterID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`servCenterID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicecenter`
--

INSERT INTO `servicecenter` (`servCenterID`, `name`, `address`, `city`, `state`, `zip`, `phone`, `website`, `fax`, `email`) VALUES
(1, 'Churchill Tire', '2703 Stout Road', 'Menomonie', 'WI', '54751', '7152356118', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `servicetype`
--

DROP TABLE IF EXISTS `servicetype`;
CREATE TABLE IF NOT EXISTS `servicetype` (
  `servID` int(11) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL COMMENT 'Number of days before next service due.',
  PRIMARY KEY (`servID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

DROP TABLE IF EXISTS `technician`;
CREATE TABLE IF NOT EXISTS `technician` (
  `userID` int(11) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `servCenterID` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `DealerID_idx` (`servCenterID`),
  KEY `userID_idx` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`userID`, `phone`, `servCenterID`) VALUES
(4, '7153080995', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `verification` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `salt` varchar(45) DEFAULT NULL,
  `fName` varchar(45) DEFAULT NULL,
  `lName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `role_idx` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `verification`, `role`, `salt`, `fName`, `lName`) VALUES
(1, 'admin', 'password', NULL, NULL, 1, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'nhusby', '$1$ly..Km2.$WZcXvokmjSMUwtKBE0YCy0', 'nhusby@gmail.com', NULL, 2, NULL, 'Nick', 'Husby'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'user', '$1$eQ4.PY4.$RX80JmS.fUxTukRsdmRer.', 'drinkydrinky@drunk.com', NULL, 3, NULL, 'Drunken', 'Client');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointmentDealer` FOREIGN KEY (`servCenterID`) REFERENCES `servicecenter` (`servCenterID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `appointmentCustomer` FOREIGN KEY (`custID`) REFERENCES `lessee` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `serviceID` FOREIGN KEY (`servTypeID`) REFERENCES `servicetype` (`servID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lesseeID` FOREIGN KEY (`lesseeID`) REFERENCES `lessee` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dealerID` FOREIGN KEY (`servCenterID`) REFERENCES `servicecenter` (`servCenterID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `technicianID` FOREIGN KEY (`techID`) REFERENCES `technician` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `handsetID` FOREIGN KEY (`handsetID`) REFERENCES `device` (`deviceID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `controlboxID` FOREIGN KEY (`controlboxID`) REFERENCES `device` (`deviceID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lessee`
--
ALTER TABLE `lessee`
  ADD CONSTRAINT `homeDealer` FOREIGN KEY (`homeDealer`) REFERENCES `servicecenter` (`servCenterID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lUserID` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `technician`
--
ALTER TABLE `technician`
  ADD CONSTRAINT `techDealer` FOREIGN KEY (`servCenterID`) REFERENCES `servicecenter` (`servCenterID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tUserID` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role` FOREIGN KEY (`role`) REFERENCES `role` (`roleID`) ON DELETE NO ACTION ON UPDATE NO ACTION;


