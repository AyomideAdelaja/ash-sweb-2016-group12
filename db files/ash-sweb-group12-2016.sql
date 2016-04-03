-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2016 at 03:21 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ash-sweb-group12-2016`
--

-- --------------------------------------------------------

--
-- Table structure for table `PersonInfo`
--

CREATE TABLE IF NOT EXISTS `PersonInfo` (
  `PID` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `OtherNames` varchar(30) DEFAULT NULL,
  `DateOfBirth` date NOT NULL,
  `Height` decimal(10,0) DEFAULT NULL,
  `Weight` decimal(10,0) DEFAULT NULL,
  `PriorIssues` varchar(50) NOT NULL,
  `KnownAllergies` varchar(50) DEFAULT NULL,
  `StatusID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `StatusInfo`
--

CREATE TABLE IF NOT EXISTS `StatusInfo` (
  `StatusID` int(11) NOT NULL,
  `StatusName` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `StatusInfo`
--

INSERT INTO `StatusInfo` (`StatusID`, `StatusName`) VALUES
(1, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `UsersInfo`
--

CREATE TABLE IF NOT EXISTS `UsersInfo` (
  `UID` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `VisitLogs`
--

CREATE TABLE IF NOT EXISTS `VisitLogs` (
  `VIP` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `DateOfVisit` date NOT NULL,
  `Observations` varchar(50) NOT NULL,
  `VitalsInfo` varchar(50) DEFAULT NULL,
  `Symptoms` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `PersonInfo`
--
ALTER TABLE `PersonInfo`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `StatusInfo`
--
ALTER TABLE `StatusInfo`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `UsersInfo`
--
ALTER TABLE `UsersInfo`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `VisitLogs`
--
ALTER TABLE `VisitLogs`
  ADD PRIMARY KEY (`VIP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `StatusInfo`
--
ALTER TABLE `StatusInfo`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `VisitLogs`
--
ALTER TABLE `VisitLogs`
  MODIFY `VIP` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
