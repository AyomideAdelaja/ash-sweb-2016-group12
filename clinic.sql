-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2016 at 12:46 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `NurseInfo`
--

CREATE TABLE `NurseInfo` (
  `nurseID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `NurseInfo`
--

INSERT INTO `NurseInfo` (`nurseID`, `Username`, `Password`) VALUES
(1, 'mary.adjei', 'mary'),
(2, 'adobea.armah', 'adobes');

-- --------------------------------------------------------

--
-- Table structure for table `PersonInfo`
--

CREATE TABLE `PersonInfo` (
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

CREATE TABLE `StatusInfo` (
  `StatusID` int(11) NOT NULL,
  `StatusName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UsersInfo`
--

CREATE TABLE `UsersInfo` (
  `UID` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `VisitLogs`
--

CREATE TABLE `VisitLogs` (
  `VID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `DateOfVisit` date NOT NULL,
  `Observations` varchar(50) NOT NULL,
  `VitalsInfo` varchar(50) DEFAULT NULL,
  `Symptons` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `NurseInfo`
--
ALTER TABLE `NurseInfo`
  ADD PRIMARY KEY (`nurseID`);

--
-- Indexes for table `PersonInfo`
--
ALTER TABLE `PersonInfo`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `StatusID` (`StatusID`);

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
  ADD PRIMARY KEY (`VID`),
  ADD KEY `PID` (`PID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `NurseInfo`
--
ALTER TABLE `NurseInfo`
  MODIFY `nurseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `StatusInfo`
--
ALTER TABLE `StatusInfo`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `VisitLogs`
--
ALTER TABLE `VisitLogs`
  MODIFY `VID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `PersonInfo`
--
ALTER TABLE `PersonInfo`
  ADD CONSTRAINT `personinfo_ibfk_1` FOREIGN KEY (`StatusID`) REFERENCES `StatusInfo` (`StatusID`);

--
-- Constraints for table `VisitLogs`
--
ALTER TABLE `VisitLogs`
  ADD CONSTRAINT `visitlogs_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `PersonInfo` (`PID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
