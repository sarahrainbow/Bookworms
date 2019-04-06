-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2019 at 11:34 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE libraryapp;
USE libraryapp; 


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraryapp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `FindBookByTitle` (IN `thisBookTitle` VARCHAR(120))  BEGIN
  SELECT concat(Author.FirstName,' ', Author.LastName) as 'Author', Book.*, CopyAvailibility.IsAvailable, LibraryBranch.LibraryBranch
  FROM bookisbn_authorid
  INNER JOIN Book
  ON bookisbn_authorid.BookISBN=Book.BookISBN
  INNER JOIN Author
  ON bookisbn_authorid.AuthorID = Author.AuthorID
  INNER JOIN CopyAvailibility
  ON bookisbn_authorid.BookISBN = CopyAvailibility.BookISBN
  INNER JOIN LibraryBranch 
  ON CopyAvailibility.BranchID = LibraryBranch.BranchID
  WHERE Book.Title= thisBookTitle;                       
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `FindUserByFirstName` (IN `thisForename` VARCHAR(50))  BEGIN
  SELECT * 
  FROM LibraryCardholder
    WHERE LibraryCardholder.FirstName = thisForename;                          
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePassword` (IN `thisPassword` VARCHAR(20), IN `thisUserID` INT(10))  BEGIN

UPDATE librarycardholder
SET librarycardholder.Password  = thisPassword

WHERE librarycardholder.librarycardid = thisUserID;

END$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `searchBookAvailability` (IN `searchTerm` VARCHAR(100))  BEGIN

SELECT  
			B.BookISBN
			,B.Title 
			,concat(A.FirstName,' ', A.LastName) as 'Author'
			,B.YearPublished
	        ,LB.LibraryBranch
			,Count(DISTINCT C.BookID) as 'CopiesAvailable' #Distinct needed to prevent counting the same book twice (in case that a book has been returned multiple times)


	FROM Book AS B
	INNER JOIN bookisbn_authorid as AB
		ON AB.BookISBN=B.BookISBN
	INNER JOIN Author AS A
		ON AB.AuthorID = A.AuthorID
	INNER JOIN copy as C
		ON AB.BookISBN = C.BookISBN
	INNER JOIN librarybranch as LB 
		ON LB.BranchID = C.BranchID
	INNER JOIN Loan as L 
		ON C.BookID=L.BookID


	WHERE DateReturned IS NOT NULL AND Title LIKE concat('%',searchTerm,'%')
		

	GROUP BY B.BookISBN, B.Title,concat(A.FirstName,' ', A.LastName),B.YearPublished, C.BranchID;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `AddressID` int(9) UNSIGNED ZEROFILL NOT NULL,
  `AddressNumber` varchar(20) NOT NULL,
  `RoadID` int(9) UNSIGNED ZEROFILL DEFAULT NULL,
  `CityID` int(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `PostcodeID` int(9) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`AddressID`, `AddressNumber`, `RoadID`, `CityID`, `PostcodeID`) VALUES
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
(000000013, '23', 000000011, 005, 000000012);

-- --------------------------------------------------------

--
-- Table structure for table `agerange`
--

CREATE TABLE `agerange` (
  `AgeID` tinyint(3) UNSIGNED NOT NULL,
  `AgeRange` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agerange`
--

INSERT INTO `agerange` (`AgeID`, `AgeRange`) VALUES
(1, 'Under 3'),
(2, '3-5 years'),
(3, '5-7 years'),
(4, '7-9 years'),
(5, '9-11 years'),
(6, 'Preteen'),
(7, 'Teen'),
(8, 'Young adult'),
(9, 'Adult'),
(10, 'Any');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `AuthorID` int(9) UNSIGNED ZEROFILL NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `SecondName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`AuthorID`, `FirstName`, `SecondName`, `LastName`) VALUES
(000000001, 'Michelle', NULL, 'Obama'),
(000000002, 'Rachel', NULL, 'Hollis'),
(000000003, 'Craig', NULL, 'Smith'),
(000000004, 'Michael', NULL, 'Wolff'),
(000000005, 'Bob', NULL, 'Woodward'),
(000000006, 'Jill', NULL, 'Twiss'),
(000000007, 'Jordan', 'B', 'Peterson'),
(000000008, 'Joanna', NULL, 'Gaines'),
(000000009, 'Mark', NULL, 'Manson'),
(000000010, 'James', NULL, 'Comey'),
(000000011, 'Amy', NULL, 'Ramos'),
(000000012, 'Jeff', NULL, 'Kinney'),
(000000013, 'Gary', NULL, 'Chapman'),
(000000014, 'Neil', NULL, 'Gaiman'),
(000000015, 'Terry', NULL, 'Pratchett'),
(000000016, 'Marlon', NULL, 'Bundo'),
(000000017, 'Malcolm', '', 'Gladwell');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookISBN` char(14) NOT NULL,
  `Title` varchar(120) NOT NULL,
  `YearPublished` year(4) NOT NULL,
  `AgeID` tinyint(3) UNSIGNED DEFAULT NULL,
  `GenreID` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookISBN`, `Title`, `YearPublished`, `AgeID`, `GenreID`) VALUES
('978-0062457714', 'The Subtle Art of Not Giving a F*ck', 2018, 1, 1),
('978-0062801975', 'Homebody: A Guide to Creating Spaces You Never Want to Leave', 2018, 1, 1),
('978-0141036250', 'Outliers', 2009, 10, 12),
('978-0141044804', 'What the dog saw', 2010, 10, 12),
('978-0241321980', 'Diary of a Wimpy Kid: The Meltdown (book 13', 2018, 1, 1),
('978-0241321988', 'Good Omens', 1990, 2, 2),
('978-0241334140', 'Becoming', 2018, 1, 1),
('978-0241351635', '12 Rules for Life: An Antidote to Chaos', 2018, 1, 1),
('978-0349113463', 'The Tipping Point', 2002, 10, 12),
('978-0802418104', 'Loving Your Spouse When You Feel Like Walking Away', 2018, 1, 1),
('978-1400201655', 'Girl, wash your face', 2018, 5, 4),
('978-1407195575', 'The Wonky Donkey', 2018, 3, 3),
('978-1408711408', 'Fire and fury', 2018, 1, 1),
('978-1452173801', 'Last week tonight', 2018, 1, 1),
('978-1471181290', 'Fear: Trump in the White House', 2018, 1, 1),
('978-1529000825', 'A Higher Loyalty: Truth, Lies, and Leadership', 2018, 1, 1),
('978-1592338153', 'The Beginners KetoDiet Cookbook', 2018, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `bookisbn_authorid`
--

CREATE TABLE `bookisbn_authorid` (
  `BookISBN` char(14) NOT NULL,
  `AuthorID` int(9) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookisbn_authorid`
--

INSERT INTO `bookisbn_authorid` (`BookISBN`, `AuthorID`) VALUES
('978-1408711408', 000000004),
('978-0062457714', 000000009),
('978-0062801975', 000000008),
('978-0241321980', 000000012),
('978-1592338153', 000000011),
('978-0802418104', 000000013),
('978-0241321988', 000000014),
('978-0241321988', 000000015),
('978-0241351635', 000000007),
('978-1400201655', 000000002),
('978-1407195575', 000000003),
('978-1452173801', 000000006),
('978-1452173801', 000000016),
('978-1471181290', 000000005),
('978-1529000825', 000000010),
('978-0141036250', 000000017),
('978-0141044804', 000000017),
('978-0349113463', 000000017);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CityID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `CityName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityID`, `CityName`) VALUES
(001, 'Bath'),
(002, 'Bristol'),
(003, 'Cambridge'),
(004, 'Gloucester'),
(005, 'London'),
(006, 'Manchester');

-- --------------------------------------------------------

--
-- Table structure for table `copy`
--

CREATE TABLE `copy` (
  `BookId` int(9) UNSIGNED ZEROFILL NOT NULL,
  `BookISBN` char(14) NOT NULL,
  `IsAvailable` bit(1) NOT NULL DEFAULT b'1',
  `BranchID` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `copy`
--

INSERT INTO `copy` (`BookId`, `BookISBN`, `IsAvailable`, `BranchID`) VALUES
(000000001, '978-0062457714', b'1', 2),
(000000002, '978-0062457714', b'1', 2),
(000000003, '978-0062457714', b'0', 2),
(000000004, '978-0062801975', b'1', 1),
(000000005, '978-0241321980', b'1', 3),
(000000006, '978-0241321988', b'1', 1),
(000000007, '978-0241334140', b'1', 1),
(000000008, '978-0241351635', b'0', 7),
(000000009, '978-0802418104', b'1', 3),
(000000010, '978-1400201655', b'1', 3),
(000000011, '978-1407195575', b'1', 3),
(000000012, '978-1408711408', b'1', 1),
(000000013, '978-1452173801', b'1', 4),
(000000014, '978-1471181290', b'0', 5),
(000000015, '978-1529000825', b'1', 1),
(000000016, '978-1529000825', b'1', 6),
(000000017, '978-1471181290', b'1', 6),
(000000018, '978-0141036250', b'1', 1),
(000000019, '978-0141044804', b'1', 1),
(000000020, '978-0349113463', b'1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `GenreID` tinyint(3) UNSIGNED NOT NULL,
  `GenreName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`GenreID`, `GenreName`) VALUES
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
(12, 'Other Non-Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `librarybranch`
--

CREATE TABLE `librarybranch` (
  `BranchID` tinyint(3) UNSIGNED NOT NULL,
  `LibraryBranch` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarybranch`
--

INSERT INTO `librarybranch` (`BranchID`, `LibraryBranch`) VALUES
(1, 'Tottenham'),
(2, 'Walworth'),
(3, 'Chelsea'),
(4, 'Woolwich'),
(5, 'Lewisham'),
(6, 'Bath'),
(7, 'Bristol');

-- --------------------------------------------------------

--
-- Table structure for table `librarycardholder`
--

CREATE TABLE `librarycardholder` (
  `LibraryCardID` int(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `ContactNumber` bigint(11) NOT NULL,
  `AddressID` int(9) UNSIGNED ZEROFILL DEFAULT NULL,
  `DateJoined` date NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `IsStaff` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarycardholder`
--

INSERT INTO `librarycardholder` (`LibraryCardID`, `FirstName`, `LastName`, `ContactNumber`, `AddressID`, `DateJoined`, `Email`, `Username`, `Password`, `IsStaff`) VALUES
(1, 'Elliot', 'Dorsey', 2077859030, 000000001, '2018-12-10', 'e.dorsey@hotmail.com', 'Elliot123', 'KMKm5fCm', b'0'),
(2, 'Amy', 'Moses', 2077859031, 000000002, '2018-08-07', 'amymoses@gmail.com', 'AM2345', 'sQwvr6Ja', b'0'),
(3, 'Maria', 'Esparza', 2077859032, 000000003, '2019-01-15', 'marespar@yahoo.com', 'MarEsp9', 'Gcf6eTez', b'0'),
(4, 'John', 'Reeves', 2077859033, 000000013, '2016-03-25', 'reeveyboy@hotmail.co.uk', 'Rooney10', '3aGHEUDz', b'0'),
(5, 'Toby', 'Allen', 2077859034, 000000005, '2015-09-15', 'tobyallen@gmail.com', 'batman97', 'W7vMVyJt', b'0'),
(6, 'Mary', 'Overy', 2077859035, 000000012, '2017-10-03', 'MaryOvery65@hotmail.com', 'MOvery65', 'GRWJSPBS', b'0'),
(7, 'Hope', 'Onwuka', 2077859036, 000000007, '2018-11-29', 'Honwuka@example.com', 'Hwuka2006', 'vgpj6rvp', b'0'),
(8, 'Simon', 'Solomon', 2077859037, 000000008, '2019-03-01', 'Sillysimon@hotmail.co.uk', 'SimSol23', 'cXCSmTge', b'0'),
(9, 'George', 'Washington', 2147483647, 000000006, '2016-05-13', 'g.washington@gmail.com', 'GWash', 'LM0KLoP', b'1'),
(10, 'Elizabeth', 'Windsor', 2147483647, 000000006, '2016-05-13', 'E.Windsor@gmail.com', 'Queenie', 'NhM09LgV', b'1'),
(11, 'Mary', 'Scots', 2147483647, 000000005, '2016-05-13', 'ScotsM@gmail.com', 'Stuart1542', 'Pl1G5Fv', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `LoanID` int(12) UNSIGNED ZEROFILL NOT NULL,
  `LibraryCardID` int(10) NOT NULL,
  `BookID` int(9) UNSIGNED ZEROFILL NOT NULL,
  `DateOut` date NOT NULL,
  `DateReturned` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`LoanID`, `LibraryCardID`, `BookID`, `DateOut`, `DateReturned`) VALUES
(000000000001, 2, 000000012, '2018-08-07', '2018-09-07'),
(000000000002, 2, 000000002, '2018-08-07', '2018-09-07'),
(000000000003, 4, 000000002, '2018-09-15', '2018-10-12'),
(000000000004, 8, 000000002, '2019-03-01', NULL),
(000000000005, 6, 000000011, '2019-02-11', NULL),
(000000000006, 6, 000000009, '2019-02-11', '2019-03-01'),
(000000000007, 5, 000000003, '2019-02-21', NULL),
(000000000008, 4, 000000009, '2019-02-27', NULL),
(000000000009, 7, 000000016, '2018-02-01', NULL),
(000000000010, 9, 000000018, '2018-01-31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `postcode`
--

CREATE TABLE `postcode` (
  `PostcodeID` int(9) UNSIGNED ZEROFILL NOT NULL,
  `Postcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postcode`
--

INSERT INTO `postcode` (`PostcodeID`, `Postcode`) VALUES
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
(000000013, 'NW22 5QX');

-- --------------------------------------------------------

--
-- Table structure for table `road`
--

CREATE TABLE `road` (
  `RoadID` int(9) UNSIGNED ZEROFILL NOT NULL,
  `RoadName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `road`
--

INSERT INTO `road` (`RoadID`, `RoadName`) VALUES
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
(000000011, 'York Road');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`AddressID`),
  ADD KEY `RoadID` (`RoadID`),
  ADD KEY `CityID` (`CityID`),
  ADD KEY `PostcodeID` (`PostcodeID`);

--
-- Indexes for table `agerange`
--
ALTER TABLE `agerange`
  ADD PRIMARY KEY (`AgeID`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookISBN`),
  ADD KEY `AgeID` (`AgeID`),
  ADD KEY `GenreID` (`GenreID`);

--
-- Indexes for table `bookisbn_authorid`
--
ALTER TABLE `bookisbn_authorid`
  ADD KEY `BookISBN` (`BookISBN`),
  ADD KEY `AuthorID` (`AuthorID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CityID`);

--
-- Indexes for table `copy`
--
ALTER TABLE `copy`
  ADD PRIMARY KEY (`BookId`),
  ADD KEY `BookISBN` (`BookISBN`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`GenreID`);

--
-- Indexes for table `librarybranch`
--
ALTER TABLE `librarybranch`
  ADD PRIMARY KEY (`BranchID`);

--
-- Indexes for table `librarycardholder`
--
ALTER TABLE `librarycardholder`
  ADD PRIMARY KEY (`LibraryCardID`),
  ADD KEY `AddressID` (`AddressID`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`LoanID`),
  ADD KEY `LibraryCardID` (`LibraryCardID`),
  ADD KEY `BookID` (`BookID`);

--
-- Indexes for table `postcode`
--
ALTER TABLE `postcode`
  ADD PRIMARY KEY (`PostcodeID`);

--
-- Indexes for table `road`
--
ALTER TABLE `road`
  ADD PRIMARY KEY (`RoadID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `AddressID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `agerange`
--
ALTER TABLE `agerange`
  MODIFY `AgeID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `AuthorID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `CityID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `copy`
--
ALTER TABLE `copy`
  MODIFY `BookId` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `GenreID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `librarybranch`
--
ALTER TABLE `librarybranch`
  MODIFY `BranchID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `librarycardholder`
--
ALTER TABLE `librarycardholder`
  MODIFY `LibraryCardID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `LoanID` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `postcode`
--
ALTER TABLE `postcode`
  MODIFY `PostcodeID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `road`
--
ALTER TABLE `road`
  MODIFY `RoadID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`RoadID`) REFERENCES `road` (`RoadID`),
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`CityID`) REFERENCES `city` (`CityID`),
  ADD CONSTRAINT `address_ibfk_3` FOREIGN KEY (`PostcodeID`) REFERENCES `postcode` (`PostcodeID`);

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`AgeID`) REFERENCES `agerange` (`AgeID`),
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`GenreID`) REFERENCES `genre` (`GenreID`);

--
-- Constraints for table `bookisbn_authorid`
--
ALTER TABLE `bookisbn_authorid`
  ADD CONSTRAINT `bookisbn_authorid_ibfk_1` FOREIGN KEY (`BookISBN`) REFERENCES `book` (`BookISBN`),
  ADD CONSTRAINT `bookisbn_authorid_ibfk_2` FOREIGN KEY (`AuthorID`) REFERENCES `author` (`AuthorID`);

--
-- Constraints for table `copy`
--
ALTER TABLE `copy`
  ADD CONSTRAINT `copy_ibfk_1` FOREIGN KEY (`BookISBN`) REFERENCES `book` (`BookISBN`);

--
-- Constraints for table `librarycardholder`
--
ALTER TABLE `librarycardholder`
  ADD CONSTRAINT `librarycardholder_ibfk_1` FOREIGN KEY (`AddressID`) REFERENCES `address` (`AddressID`);

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`LibraryCardID`) REFERENCES `librarycardholder` (`LibraryCardID`),
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `copy` (`BookId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
