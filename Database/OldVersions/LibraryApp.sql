-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2019 at 08:47 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS LibraryApp;
USE LibraryApp;

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE `Address` (
  `AddressID` int(9) UNSIGNED ZEROFILL NOT NULL,
  `AddressNumber` varchar(20) NOT NULL,
  `Road` int(9) UNSIGNED ZEROFILL DEFAULT NULL,
  `City` int(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `Postcode` int(9) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`AddressID`, `AddressNumber`, `Road`, `City`, `Postcode`) VALUES
(000000001, 'Flat 2a', 000000002, 005, 000000003),
(000000002, '13', 000000001, 005, 000000004),
(000000003, '22', 000000009, 005, 000000002),
(000000004, '24', 000000009, 005, 000000002),
(000000005, '8', 000000004, 005, 000000005),
(000000006, '7', 000000003, 005, 000000008),
(000000007, '152', 000000005, 005, 000000006),
(000000008, '98', 000000006, 005, 000000009),
(000000009, '3', 000000007, 005, 000000010),
(000000010, '3', 000000008, 001, 000000001),
(000000011, '311', 000000005, 005, 000000007),
(000000012, 'Flat 6', 000000010, 005, 000000011),
(000000013, '23', 000000011, 005, 000000012),
(000000014, 'Flat 2a', 000000002, 005, 000000003),
(000000015, '13', 000000001, 005, 000000004),
(000000016, '22', 000000009, 005, 000000002),
(000000017, '24', 000000009, 005, 000000002),
(000000018, '8', 000000004, 005, 000000005),
(000000019, '7', 000000003, 005, 000000008),
(000000020, '152', 000000005, 005, 000000006),
(000000021, '98', 000000006, 005, 000000009),
(000000022, '3', 000000007, 005, 000000010),
(000000023, '3', 000000008, 001, 000000001),
(000000024, '311', 000000005, 005, 000000007),
(000000025, 'Flat 6', 000000010, 005, 000000011),
(000000026, '23', 000000011, 005, 000000012),
(000000027, 'Flat 2a', 000000002, 005, 000000003),
(000000028, '13', 000000001, 005, 000000004),
(000000029, '22', 000000009, 005, 000000002),
(000000030, '24', 000000009, 005, 000000002),
(000000031, '8', 000000004, 005, 000000005),
(000000032, '7', 000000003, 005, 000000008),
(000000033, '152', 000000005, 005, 000000006),
(000000034, '98', 000000006, 005, 000000009),
(000000035, '3', 000000007, 005, 000000010),
(000000036, '3', 000000008, 001, 000000001),
(000000037, '311', 000000005, 005, 000000007),
(000000038, 'Flat 6', 000000010, 005, 000000011),
(000000039, '23', 000000011, 005, 000000012),
(000000040, 'Flat 2a', 000000002, 005, 000000003),
(000000041, '13', 000000001, 005, 000000004),
(000000042, '22', 000000009, 005, 000000002),
(000000043, '24', 000000009, 005, 000000002),
(000000044, '8', 000000004, 005, 000000005),
(000000045, '7', 000000003, 005, 000000008),
(000000046, '152', 000000005, 005, 000000006),
(000000047, '98', 000000006, 005, 000000009),
(000000048, '3', 000000007, 005, 000000010),
(000000049, '3', 000000008, 001, 000000001),
(000000050, '311', 000000005, 005, 000000007),
(000000051, 'Flat 6', 000000010, 005, 000000011),
(000000052, '23', 000000011, 005, 000000012);

-- --------------------------------------------------------

--
-- Table structure for table `AgeRange`
--

CREATE TABLE `AgeRange` (
  `AgeCode` tinyint(3) UNSIGNED NOT NULL,
  `AgeRange` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AgeRange`
--

INSERT INTO `AgeRange` (`AgeCode`, `AgeRange`) VALUES
(1, 'Under 3'),
(2, '3-5 years'),
(3, '5-7 years'),
(4, '7-9 years'),
(5, '9-11 years'),
(6, 'Preteen'),
(7, 'Teen'),
(8, 'Young adult'),
(9, 'Adult'),
(10, 'Any'),
(11, 'Under 3'),
(12, '3-5 years'),
(13, '5-7 years'),
(14, '7-9 years'),
(15, '9-11 years'),
(16, 'Preteen'),
(17, 'Teen'),
(18, 'Young adult'),
(19, 'Adult'),
(20, 'Any'),
(21, 'Under 3'),
(22, '3-5 years'),
(23, '5-7 years'),
(24, '7-9 years'),
(25, '9-11 years'),
(26, 'Preteen'),
(27, 'Teen'),
(28, 'Young adult'),
(29, 'Adult'),
(30, 'Any'),
(31, 'Under 3'),
(32, '3-5 years'),
(33, '5-7 years'),
(34, '7-9 years'),
(35, '9-11 years'),
(36, 'Preteen'),
(37, 'Teen'),
(38, 'Young adult'),
(39, 'Adult'),
(40, 'Any');

-- --------------------------------------------------------

--
-- Table structure for table `Author`
--

CREATE TABLE `Author` (
  `AuthorID` int(9) UNSIGNED ZEROFILL NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `SecondName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Author`
--

INSERT INTO `Author` (`AuthorID`, `FirstName`, `SecondName`, `LastName`) VALUES
(000000001, 'Michelle', '', 'Obama'),
(000000002, 'Rachel', '', 'Hollis'),
(000000003, 'Craig', '', 'Smith'),
(000000004, 'Michael', 'NULL', 'Wolff'),
(000000005, 'Bob', '', 'Woodward'),
(000000006, 'Jill', '', 'Twiss'),
(000000007, 'Jordan', 'B', 'Peterson'),
(000000008, 'Joanna', '', 'Gaines'),
(000000009, 'Mark', '', 'Manson'),
(000000010, 'James', '', 'Comey'),
(000000011, 'Amy', '', 'Ramos'),
(000000012, 'Jeff', '', 'Kinney'),
(000000013, 'Gary', '', 'Chapman'),
(000000014, 'Michelle', '', 'Obama'),
(000000015, 'Rachel', '', 'Hollis'),
(000000016, 'Craig', '', 'Smith'),
(000000017, 'Michael', 'NULL', 'Wolff'),
(000000018, 'Bob', '', 'Woodward'),
(000000019, 'Jill', '', 'Twiss'),
(000000020, 'Jordan', 'B', 'Peterson'),
(000000021, 'Joanna', '', 'Gaines'),
(000000022, 'Mark', '', 'Manson'),
(000000023, 'James', '', 'Comey'),
(000000024, 'Amy', '', 'Ramos'),
(000000025, 'Jeff', '', 'Kinney'),
(000000026, 'Gary', '', 'Chapman'),
(000000027, 'Michelle', '', 'Obama'),
(000000028, 'Rachel', '', 'Hollis'),
(000000029, 'Craig', '', 'Smith'),
(000000030, 'Michael', 'NULL', 'Wolff'),
(000000031, 'Bob', '', 'Woodward'),
(000000032, 'Jill', '', 'Twiss'),
(000000033, 'Jordan', 'B', 'Peterson'),
(000000034, 'Joanna', '', 'Gaines'),
(000000035, 'Mark', '', 'Manson'),
(000000036, 'James', '', 'Comey'),
(000000037, 'Amy', '', 'Ramos'),
(000000038, 'Jeff', '', 'Kinney'),
(000000039, 'Gary', '', 'Chapman'),
(000000040, 'Michelle', '', 'Obama'),
(000000041, 'Rachel', '', 'Hollis'),
(000000042, 'Craig', '', 'Smith'),
(000000043, 'Michael', 'NULL', 'Wolff'),
(000000044, 'Bob', '', 'Woodward'),
(000000045, 'Jill', '', 'Twiss'),
(000000046, 'Jordan', 'B', 'Peterson'),
(000000047, 'Joanna', '', 'Gaines'),
(000000048, 'Mark', '', 'Manson'),
(000000049, 'James', '', 'Comey'),
(000000050, 'Amy', '', 'Ramos'),
(000000051, 'Jeff', '', 'Kinney'),
(000000052, 'Gary', '', 'Chapman');

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `BookISBN` char(14) NOT NULL,
  `Title` varchar(120) NOT NULL,
  `YearPublished` year(4) NOT NULL,
  `LibraryBranch` tinyint(3) UNSIGNED DEFAULT NULL,
  `AgeRange` tinyint(3) UNSIGNED DEFAULT NULL,
  `Genre` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`BookISBN`, `Title`, `YearPublished`, `LibraryBranch`, `AgeRange`, `Genre`) VALUES
('978-0062457714', 'The Subtle Art of Not Giving a F*ck', 2018, 1, 1, 1),
('978-0062801975', 'Homebody: A Guide to Creating Spaces You Never Want to Leave', 2018, 1, 1, 1),
('978-0241321980', 'Diary of a Wimpy Kid: The Meltdown (book 13', 2018, 1, 1, 1),
('978-0241334140', 'Becoming', 2018, 1, 1, 1),
('978-0241351635', '12 Rules for Life: An Antidote to Chaos', 2018, 1, 1, 1),
('978-0802418104', 'Loving Your Spouse When You Feel Like Walking Away', 2018, 1, 1, 1),
('978-1400201655', 'Girl, wash your face', 2018, 1, 1, 1),
('978-1407195575', 'The Wonky Donkey', 2018, 1, 1, 1),
('978-1408711408', 'Fire and fury', 2018, 1, 1, 1),
('978-1452173801', 'Last week tonight', 2018, 1, 1, 1),
('978-1471181290', 'Fear: Trump in the White House', 2018, 1, 1, 1),
('978-1529000825', 'A Higher Loyalty: Truth, Lies, and Leadership', 2018, 1, 1, 1),
('978-1592338153', 'The Beginners KetoDiet Cookbook', 2018, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `City`
--

CREATE TABLE `City` (
  `CityID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `CityName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `City`
--

INSERT INTO `City` (`CityID`, `CityName`) VALUES
(001, 'Bath'),
(002, 'Bristol'),
(003, 'Cambridge'),
(004, 'Gloucester'),
(005, 'London'),
(006, 'Manchester'),
(007, 'Bath'),
(008, 'Bristol'),
(009, 'Cambridge'),
(010, 'Gloucester'),
(011, 'London'),
(012, 'Manchester'),
(013, 'Bath'),
(014, 'Bristol'),
(015, 'Cambridge'),
(016, 'Gloucester'),
(017, 'London'),
(018, 'Manchester'),
(019, 'Bath'),
(020, 'Bristol'),
(021, 'Cambridge'),
(022, 'Gloucester'),
(023, 'London'),
(024, 'Manchester');

-- --------------------------------------------------------

--
-- Table structure for table `Copy`
--

CREATE TABLE `Copy` (
  `BookID` tinyint(9) UNSIGNED ZEROFILL NOT NULL,
  `BookISBN` char(14) NOT NULL,
  `Copies` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Genre`
--

CREATE TABLE `Genre` (
  `GenreCode` tinyint(3) UNSIGNED NOT NULL,
  `GenreName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Genre`
--

INSERT INTO `Genre` (`GenreCode`, `GenreName`) VALUES
(1, 'Biographical'),
(2, 'Fiction'),
(3, 'Crime'),
(4, 'Children'),
(5, 'Fantasy'),
(6, 'Health'),
(7, 'DIY'),
(8, 'Cookery'),
(9, 'Arts & Photography'),
(10, 'History'),
(11, 'Humour'),
(12, 'Biographical'),
(13, 'Fiction'),
(14, 'Crime'),
(15, 'Children'),
(16, 'Fantasy'),
(17, 'Health'),
(18, 'DIY'),
(19, 'Cookery'),
(20, 'Arts & Photography'),
(21, 'History'),
(22, 'Humour'),
(23, 'Biographical'),
(24, 'Fiction'),
(25, 'Crime'),
(26, 'Children'),
(27, 'Fantasy'),
(28, 'Health'),
(29, 'DIY'),
(30, 'Cookery'),
(31, 'Arts & Photography'),
(32, 'History'),
(33, 'Humour'),
(34, 'Biographical'),
(35, 'Fiction'),
(36, 'Crime'),
(37, 'Children'),
(38, 'Fantasy'),
(39, 'Health'),
(40, 'DIY'),
(41, 'Cookery'),
(42, 'Arts & Photography'),
(43, 'History'),
(44, 'Humour');

-- --------------------------------------------------------

--
-- Table structure for table `LibraryBranch`
--

CREATE TABLE `LibraryBranch` (
  `BranchCode` tinyint(3) UNSIGNED NOT NULL,
  `LibraryBranch` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LibraryBranch`
--

INSERT INTO `LibraryBranch` (`BranchCode`, `LibraryBranch`) VALUES
(1, 'Tottenham'),
(2, 'Walworth'),
(3, 'Chelsea'),
(4, 'Woolwich'),
(5, 'Lewisham'),
(6, 'Bath'),
(7, 'Bristol'),
(8, 'Tottenham'),
(9, 'Walworth'),
(10, 'Chelsea'),
(11, 'Woolwich'),
(12, 'Lewisham'),
(13, 'Bath'),
(14, 'Bristol'),
(15, 'Tottenham'),
(16, 'Walworth'),
(17, 'Chelsea'),
(18, 'Woolwich'),
(19, 'Lewisham'),
(20, 'Bath'),
(21, 'Bristol'),
(22, 'Tottenham'),
(23, 'Walworth'),
(24, 'Chelsea'),
(25, 'Woolwich'),
(26, 'Lewisham'),
(27, 'Bath'),
(28, 'Bristol');

-- --------------------------------------------------------

--
-- Table structure for table `LibraryCardholder`
--

CREATE TABLE `LibraryCardholder` (
  `LibraryCardID` int(10) NOT NULL,
  `Forename` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `ContactNumber` bigint(11) NOT NULL,
  `AddressCode` int(9) UNSIGNED ZEROFILL DEFAULT NULL,
  `DateJoined` date NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LibraryCardholder`
--

INSERT INTO `LibraryCardholder` (`LibraryCardID`, `Forename`, `Surname`, `ContactNumber`, `AddressCode`, `DateJoined`, `Email`, `Username`, `Password`) VALUES
(1, 'Elliot', 'Dorsey', 2077859030, 000000001, '2018-12-10', 'e.dorsey@hotmail.com', 'Elliot123', 'KMKm5fCm'),
(2, 'Amy', 'Moses', 2077859031, 000000002, '2018-08-07', 'amymoses@gmail.com', 'AM2345', 'sQwvr6Ja'),
(3, 'Maria', 'Esparza', 2077859032, 000000003, '2019-01-15', 'marespar@yahoo.com', 'MarEsp9', 'Gcf6eTez'),
(4, 'John', 'Reeves', 2077859033, 000000014, '2016-03-25', 'reeveyboy@hotmail.co.uk', 'Rooney10', '3aGHEUDz'),
(5, 'Toby', 'Allen', 2077859034, 000000005, '2015-09-15', 'tobeallen@gmail.com', 'batman97', 'W7vMVyJt'),
(6, 'Mary', 'Overy', 2077859035, 000000016, '2017-10-03', 'MaryOvery65@hotmail.com', 'MOvery65', 'GRWJSPBS'),
(7, 'Hope', 'Onwuka', 2077859036, 000000007, '2018-11-29', 'Honwuka@example.com', 'Hwuka2006', 'vgpj6rvp'),
(8, 'Simon', 'Solomon', 2077859037, 000000008, '2019-03-01', 'Sillysimon@hotmail.co.uk', 'SimSol23', 'cXCSmTge'),
(9, 'George', 'Washington', 2147483647, 000000020, '2016-05-13', 'g.washington@gmail.com', 'GWash', 'LM0KLoP'),
(10, 'Elizabeth', 'Windsor', 2147483647, 000000021, '2016-05-13', 'E.Windsor@gmail.com', 'Queenie', 'NhM09LgV'),
(11, 'Mary', 'Scots', 2147483647, 000000022, '2016-05-13', 'ScotsM@gmail.com', 'Stuart1542', 'Pl1G5Fv');

-- --------------------------------------------------------

--
-- Table structure for table `Postcode`
--

CREATE TABLE `Postcode` (
  `PostcodeID` int(9) UNSIGNED ZEROFILL NOT NULL,
  `Postcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Postcode`
--

INSERT INTO `Postcode` (`PostcodeID`, `Postcode`) VALUES
(000000001, 'BA2 0AA'),
(000000002, 'N20 0RH'),
(000000003, 'NW1 8UJ'),
(000000004, 'NW3 0LQ'),
(000000005, 'NW3 3LO'),
(000000006, 'NW8 5NA'),
(000000007, 'NW8 5HY'),
(000000008, 'NW10 6TY'),
(000000009, 'NW10 9QS'),
(000000010, 'NW11 1TR'),
(000000011, 'NW22 4LJ'),
(000000012, 'NW22 4PS'),
(000000013, 'NW22 5QX'),
(000000014, 'BA2 0AA'),
(000000015, 'N20 0RH'),
(000000016, 'NW1 8UJ'),
(000000017, 'NW3 0LQ'),
(000000018, 'NW3 3LO'),
(000000019, 'NW8 5NA'),
(000000020, 'NW8 5HY'),
(000000021, 'NW10 6TY'),
(000000022, 'NW10 9QS'),
(000000023, 'NW11 1TR'),
(000000024, 'NW22 4LJ'),
(000000025, 'NW22 4PS'),
(000000026, 'NW22 5QX'),
(000000027, 'BA2 0AA'),
(000000028, 'N20 0RH'),
(000000029, 'NW1 8UJ'),
(000000030, 'NW3 0LQ'),
(000000031, 'NW3 3LO'),
(000000032, 'NW8 5NA'),
(000000033, 'NW8 5HY'),
(000000034, 'NW10 6TY'),
(000000035, 'NW10 9QS'),
(000000036, 'NW11 1TR'),
(000000037, 'NW22 4LJ'),
(000000038, 'NW22 4PS'),
(000000039, 'NW22 5QX'),
(000000040, 'BA2 0AA'),
(000000041, 'N20 0RH'),
(000000042, 'NW1 8UJ'),
(000000043, 'NW3 0LQ'),
(000000044, 'NW3 3LO'),
(000000045, 'NW8 5NA'),
(000000046, 'NW8 5HY'),
(000000047, 'NW10 6TY'),
(000000048, 'NW10 9QS'),
(000000049, 'NW11 1TR'),
(000000050, 'NW22 4LJ'),
(000000051, 'NW22 4PS'),
(000000052, 'NW22 5QX');

-- --------------------------------------------------------

--
-- Table structure for table `Road`
--

CREATE TABLE `Road` (
  `RoadID` int(9) UNSIGNED ZEROFILL NOT NULL,
  `RoadName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Road`
--

INSERT INTO `Road` (`RoadID`, `RoadName`) VALUES
(000000001, 'Broadway'),
(000000002, 'Church Road'),
(000000003, 'High Street'),
(000000004, 'Main Street'),
(000000005, 'Mill Road'),
(000000006, 'New Road'),
(000000007, 'Park Road'),
(000000008, 'Springfield Road'),
(000000009, 'The Avenue'),
(000000010, 'The Green'),
(000000011, 'York Road'),
(000000012, 'Broadway'),
(000000013, 'Church Road'),
(000000014, 'High Street'),
(000000015, 'Main Street'),
(000000016, 'Mill Road'),
(000000017, 'New Road'),
(000000018, 'Park Road'),
(000000019, 'Springfield Road'),
(000000020, 'The Avenue'),
(000000021, 'The Green'),
(000000022, 'York Road'),
(000000023, 'Broadway'),
(000000024, 'Church Road'),
(000000025, 'High Street'),
(000000026, 'Main Street'),
(000000027, 'Mill Road'),
(000000028, 'New Road'),
(000000029, 'Park Road'),
(000000030, 'Springfield Road'),
(000000031, 'The Avenue'),
(000000032, 'The Green'),
(000000033, 'York Road'),
(000000034, 'Broadway'),
(000000035, 'Church Road'),
(000000036, 'High Street'),
(000000037, 'Main Street'),
(000000038, 'Mill Road'),
(000000039, 'New Road'),
(000000040, 'Park Road'),
(000000041, 'Springfield Road'),
(000000042, 'The Avenue'),
(000000043, 'The Green'),
(000000044, 'York Road');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`AddressID`),
  ADD KEY `Road` (`Road`),
  ADD KEY `City` (`City`),
  ADD KEY `Postcode` (`Postcode`);

--
-- Indexes for table `AgeRange`
--
ALTER TABLE `AgeRange`
  ADD PRIMARY KEY (`AgeCode`);

--
-- Indexes for table `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`BookISBN`),
  ADD KEY `LibraryBranch` (`LibraryBranch`),
  ADD KEY `AgeRange` (`AgeRange`),
  ADD KEY `Genre` (`Genre`);

--
-- Indexes for table `City`
--
ALTER TABLE `City`
  ADD PRIMARY KEY (`CityID`);

--
-- Indexes for table `Copy`
--
ALTER TABLE `Copy`
  ADD PRIMARY KEY (`BookID`),
  ADD KEY `BookISBN` (`BookISBN`);

--
-- Indexes for table `Genre`
--
ALTER TABLE `Genre`
  ADD PRIMARY KEY (`GenreCode`);

--
-- Indexes for table `LibraryBranch`
--
ALTER TABLE `LibraryBranch`
  ADD PRIMARY KEY (`BranchCode`);

--
-- Indexes for table `LibraryCardholder`
--
ALTER TABLE `LibraryCardholder`
  ADD PRIMARY KEY (`LibraryCardID`),
  ADD KEY `AddressCode` (`AddressCode`);

--
-- Indexes for table `Postcode`
--
ALTER TABLE `Postcode`
  ADD PRIMARY KEY (`PostcodeID`);

--
-- Indexes for table `Road`
--
ALTER TABLE `Road`
  ADD PRIMARY KEY (`RoadID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Address`
--
ALTER TABLE `Address`
  MODIFY `AddressID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `AgeRange`
--
ALTER TABLE `AgeRange`
  MODIFY `AgeCode` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `Author`
--
ALTER TABLE `Author`
  MODIFY `AuthorID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `City`
--
ALTER TABLE `City`
  MODIFY `CityID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `Copy`
--
ALTER TABLE `Copy`
  MODIFY `BookID` tinyint(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Genre`
--
ALTER TABLE `Genre`
  MODIFY `GenreCode` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `LibraryBranch`
--
ALTER TABLE `LibraryBranch`
  MODIFY `BranchCode` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `LibraryCardholder`
--
ALTER TABLE `LibraryCardholder`
  MODIFY `LibraryCardID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Postcode`
--
ALTER TABLE `Postcode`
  MODIFY `PostcodeID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `Road`
--
ALTER TABLE `Road`
  MODIFY `RoadID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Address`
--
ALTER TABLE `Address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`Road`) REFERENCES `Road` (`RoadID`),
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`City`) REFERENCES `City` (`CityID`),
  ADD CONSTRAINT `address_ibfk_3` FOREIGN KEY (`Postcode`) REFERENCES `Postcode` (`PostcodeID`);

--
-- Constraints for table `Book`
--
ALTER TABLE `Book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`LibraryBranch`) REFERENCES `LibraryBranch` (`BranchCode`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`AgeRange`) REFERENCES `AgeRange` (`AgeCode`),
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`Genre`) REFERENCES `Genre` (`GenreCode`);

--
-- Constraints for table `Copy`
--
ALTER TABLE `Copy`
  ADD CONSTRAINT `copy_ibfk_1` FOREIGN KEY (`BookISBN`) REFERENCES `Book` (`BookISBN`);

--
-- Constraints for table `LibraryCardholder`
--
ALTER TABLE `LibraryCardholder`
  ADD CONSTRAINT `librarycardholder_ibfk_1` FOREIGN KEY (`AddressCode`) REFERENCES `Address` (`AddressID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
