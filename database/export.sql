--
-- MySQL 5.5.48
-- Tue, 26 Apr 2016 13:00:10 +0000
--

CREATE DATABASE `ashesics_youssouf_dasilva` DEFAULT CHARSET latin1;

USE `ashesics_youssouf_dasilva`;

CREATE TABLE `ash_sweb_diagnosis` (
   `DID` int(11) not null auto_increment,
   `DiagnosisName` varchar(50) not null,
   PRIMARY KEY (`DID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;

INSERT INTO `ash_sweb_diagnosis` (`DID`, `DiagnosisName`) VALUES ('1', 'Malaria');
INSERT INTO `ash_sweb_diagnosis` (`DID`, `DiagnosisName`) VALUES ('2', 'Typhoid');
INSERT INTO `ash_sweb_diagnosis` (`DID`, `DiagnosisName`) VALUES ('3', 'Diarrhea');

CREATE TABLE `ash_sweb_person` (
   `PID` int(11) not null,
   `FirstName` varchar(20) not null,
   `LastName` varchar(20) not null,
   `OtherNames` varchar(30),
   `DateOfBirth` date not null,
   `Height` decimal(10,0),
   `Weight` decimal(10,0),
   `PriorIssues` varchar(50) not null,
   `KnownAllergies` varchar(50),
   `StatusID` int(11),
   PRIMARY KEY (`PID`),
   KEY `StatusID` (`StatusID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `ash_sweb_person` (`PID`, `FirstName`, `LastName`, `OtherNames`, `DateOfBirth`, `Height`, `Weight`, `PriorIssues`, `KnownAllergies`, `StatusID`) VALUES ('61992017', 'Youssouf', 'da Silva', 'Olatunde', '1995-10-31', '200', '60', 'Asthma', 'Pollen', '1');
INSERT INTO `ash_sweb_person` (`PID`, `FirstName`, `LastName`, `OtherNames`, `DateOfBirth`, `Height`, `Weight`, `PriorIssues`, `KnownAllergies`, `StatusID`) VALUES ('66772017', 'Momodu', 'Jallow', 'K', '1994-10-02', '1', '2', 'Foolishness', 'Anything Sensible', '1');
INSERT INTO `ash_sweb_person` (`PID`, `FirstName`, `LastName`, `OtherNames`, `DateOfBirth`, `Height`, `Weight`, `PriorIssues`, `KnownAllergies`, `StatusID`) VALUES ('12349999', 'Iddriss', 'Adbul', 'Mushin', '1990-07-09', '160', '64', 'Anemia', 'Dairy Products', '2');

CREATE TABLE `ash_sweb_status` (
   `SID` int(11) not null auto_increment,
   `StatusName` varchar(20) not null,
   PRIMARY KEY (`SID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3;

INSERT INTO `ash_sweb_status` (`SID`, `StatusName`) VALUES ('1', 'Student');
INSERT INTO `ash_sweb_status` (`SID`, `StatusName`) VALUES ('2', 'Faculty Intern');

CREATE TABLE `ash_sweb_users` (
   `UID` int(11) not null,
   `FirstName` varchar(20) not null,
   `LastName` varchar(20) not null,
   `Username` varchar(20) not null,
   `Password` varchar(50) not null,
   PRIMARY KEY (`UID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `ash_sweb_users` (`UID`, `FirstName`, `LastName`, `Username`, `Password`) VALUES ('12340000', 'Testfname', 'Testlname', 'u', 'p');
INSERT INTO `ash_sweb_users` (`UID`, `FirstName`, `LastName`, `Username`, `Password`) VALUES ('23450000', 'Joel', 'da Silva', 'joel', 'qwerty');
INSERT INTO `ash_sweb_users` (`UID`, `FirstName`, `LastName`, `Username`, `Password`) VALUES ('55550000', 'Aelaf', 'Dafla', 'adafla', 'webtech');

CREATE TABLE `ash_sweb_visit` (
   `VID` int(11) not null auto_increment,
   `PID` int(11) not null,
   `UID` int(11) not null,
   `DID` int(11) not null,
   `DateOfVisit` date not null,
   `Observations` varchar(50) not null,
   `VitalsInfo` varchar(50),
   `Symptoms` varchar(50),
   `Prescriptions` varchar(50),
   PRIMARY KEY (`VID`),
   KEY `PID` (`PID`),
   KEY `UID` (`UID`),
   KEY `DID` (`DID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=9;

INSERT INTO `ash_sweb_visit` (`VID`, `PID`, `UID`, `DID`, `DateOfVisit`, `Observations`, `VitalsInfo`, `Symptoms`, `Prescriptions`) VALUES ('1', '61992017', '12340000', '1', '2016-03-17', 'Headache', '', '', '');
INSERT INTO `ash_sweb_visit` (`VID`, `PID`, `UID`, `DID`, `DateOfVisit`, `Observations`, `VitalsInfo`, `Symptoms`, `Prescriptions`) VALUES ('2', '66772017', '23450000', '2', '2016-04-18', 'Fever', '', '', '');
INSERT INTO `ash_sweb_visit` (`VID`, `PID`, `UID`, `DID`, `DateOfVisit`, `Observations`, `VitalsInfo`, `Symptoms`, `Prescriptions`) VALUES ('3', '12349999', '23450000', '3', '2016-04-19', 'Lots of Cough', '', '', '');
INSERT INTO `ash_sweb_visit` (`VID`, `PID`, `UID`, `DID`, `DateOfVisit`, `Observations`, `VitalsInfo`, `Symptoms`, `Prescriptions`) VALUES ('4', '1234999', '23450000', '2', '2016-04-19', 'Red Urine', '', '', '');
INSERT INTO `ash_sweb_visit` (`VID`, `PID`, `UID`, `DID`, `DateOfVisit`, `Observations`, `VitalsInfo`, `Symptoms`, `Prescriptions`) VALUES ('5', '61992017', '23450000', '2', '2015-01-02', 'Dizzyness', '', '', '');
INSERT INTO `ash_sweb_visit` (`VID`, `PID`, `UID`, `DID`, `DateOfVisit`, `Observations`, `VitalsInfo`, `Symptoms`, `Prescriptions`) VALUES ('6', '61992917', '12340000', '1', '2016-04-20', 'Not eating', '', '', '');
INSERT INTO `ash_sweb_visit` (`VID`, `PID`, `UID`, `DID`, `DateOfVisit`, `Observations`, `VitalsInfo`, `Symptoms`, `Prescriptions`) VALUES ('7', '66772017', '12340000', '2', '2016-04-21', 'Cold body', '', '', '');
INSERT INTO `ash_sweb_visit` (`VID`, `PID`, `UID`, `DID`, `DateOfVisit`, `Observations`, `VitalsInfo`, `Symptoms`, `Prescriptions`) VALUES ('8', '61992017', '55550000', '1', '2016-04-23', 'Coughing blood', 'Beyond measurable', '', '');

CREATE TABLE `webtech_pract3_users` (
   `USERCODE` int(11) not null auto_increment,
   `USERNAME` varchar(30),
   `PWORD` varchar(36),
   `FIRSTNAME` varchar(30) not null,
   `LASTNAME` varchar(30) not null,
   `USERGROUP` int(11),
   `STATUS` enum('DISABLED','ENABLE','NEWUSER'),
   `PERMISSION` set('VIEW','ADD','DELETE','UPDATE'),
   PRIMARY KEY (`USERCODE`),
   UNIQUE KEY (`USERNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;

INSERT INTO `webtech_pract3_users` (`USERCODE`, `USERNAME`, `PWORD`, `FIRSTNAME`, `LASTNAME`, `USERGROUP`, `STATUS`, `PERMISSION`) VALUES ('4', 'enyo', 'enyopword', 'Enyo', 'The Awesome', '2', 'DISABLED', 'DELETE');

CREATE TABLE `webtech_pract4_usergroups` (
   `usergroup_id` int(11) not null auto_increment,
   `usergroup_name` varchar(30) not null,
   PRIMARY KEY (`usergroup_id`),
   UNIQUE KEY (`usergroup_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3;

INSERT INTO `webtech_pract4_usergroups` (`usergroup_id`, `usergroup_name`) VALUES ('1', 'Admin');
INSERT INTO `webtech_pract4_usergroups` (`usergroup_id`, `usergroup_name`) VALUES ('2', 'Guest');

CREATE TABLE `webtech_pract4_users` (
   `USERCODE` int(11) not null auto_increment,
   `USERNAME` varchar(50) not null,
   `FIRSTNAME` varchar(50),
   `LASTNAME` varchar(50),
   `PWORD` varchar(50) not null,
   `PERMISSION` set('ADD','EDIT','DELETE','VIEW') not null default 'VIEW',
   `USERGROUP` int(11) not null default '1',
   `STATUS` enum('NEW USER','ENABLED','DISABLED','') not null default 'NEW USER',
   PRIMARY KEY (`USERCODE`),
   UNIQUE KEY (`USERNAME`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6;

INSERT INTO `webtech_pract4_users` (`USERCODE`, `USERNAME`, `FIRSTNAME`, `LASTNAME`, `PWORD`, `PERMISSION`, `USERGROUP`, `STATUS`) VALUES ('2', 'youdasilva', 'Youssouf', 'da Silva', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'EDIT,DELETE', '1', 'ENABLED');
INSERT INTO `webtech_pract4_users` (`USERCODE`, `USERNAME`, `FIRSTNAME`, `LASTNAME`, `PWORD`, `PERMISSION`, `USERGROUP`, `STATUS`) VALUES ('3', 'Does not work from index page', 'Naofal', 'da Silva', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'EDIT', '2', 'DISABLED');
INSERT INTO `webtech_pract4_users` (`USERCODE`, `USERNAME`, `FIRSTNAME`, `LASTNAME`, `PWORD`, `PERMISSION`, `USERGROUP`, `STATUS`) VALUES ('4', 'yousso', 'Yousso', 'Silver', 'e86fdc2283aff4717103f2d44d0610f7', 'VIEW', '2', 'ENABLED');