SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `AgeRanges` (
  `AgeCode` tinyint(3) UNSIGNED NOT NULL,
  `AgeRange` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Books` (
  `BookID` tinyint(9) UNSIGNED ZEROFILL NOT NULL,
  `BookISBN` char(14) NOT NULL,
  `Title` varchar(120) NOT NULL,
  `Author1` varchar(50) NOT NULL,
  `Author2` varchar(50) NOT NULL,
  `Author3` varchar(50) NOT NULL,
  `YearPublished` year(4) NOT NULL,
  `BookStatus` tinyint(3) UNSIGNED NOT NULL,
  `LibraryBranch` tinyint(3) UNSIGNED NOT NULL,
  `AgeRange` tinyint(3) UNSIGNED NOT NULL,
  `Genre` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `BookStatus` (
  `BookStatusKey` tinyint(3) UNSIGNED NOT NULL,
  `BookStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Cities` (
  `CityCode` tinyint(3) UNSIGNED NOT NULL,
  `City` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Genres` (
  `GenreCode` tinyint(3) UNSIGNED NOT NULL,
  `GenreName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `LibraryBranches` (
  `BranchCode` tinyint(3) UNSIGNED NOT NULL,
  `LibraryBranch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `LibraryCardHolders` (
  `UserCardID` tinyint(9) UNSIGNED ZEROFILL NOT NULL,
  `Forename` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `PhoneNumber` char(11) NOT NULL,
  `AddressNumber` varchar(30) NOT NULL,
  `AddressRoad` varchar(50) NOT NULL,
  `City` tinyint(3) UNSIGNED DEFAULT NULL,
  `Postcode` varchar(10) NOT NULL,
  `DateJoined` date NOT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `LibraryCardHolders` (`UserCardID`, `Forename`, `Surname`, `PhoneNumber`, `AddressNumber`, `AddressRoad`, `City`, `Postcode`, `DateJoined`, `Username`, `Email`, `Password`) VALUES
(000000004, 'Elliot', 'Dorsey', '02077859030', 'Flat 2a', 'Church Street', NULL, 'NW10 9QS', '0000-00-00', 'Elliot123', 'e.dorsey@hotmail.com', 'KMKm5fCm');

CREATE TABLE `LibraryStaff` (
  `StaffID` tinyint(9) UNSIGNED ZEROFILL NOT NULL,
  `Forename` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `PhoneNumber` char(11) NOT NULL,
  `AddressNumber` varchar(30) NOT NULL,
  `AddressRoad` varchar(50) NOT NULL,
  `City` tinyint(3) UNSIGNED DEFAULT NULL,
  `Postcode` varchar(10) NOT NULL,
  `StartDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Loans` (
  `LoanID` tinyint(9) UNSIGNED ZEROFILL NOT NULL,
  `UserCardID` tinyint(9) UNSIGNED ZEROFILL DEFAULT NULL,
  `BookID` tinyint(9) UNSIGNED ZEROFILL DEFAULT NULL,
  `DateLoaned` date NOT NULL,
  `DateReturned` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `AgeRanges`
  ADD PRIMARY KEY (`AgeCode`);

ALTER TABLE `Books`
  ADD PRIMARY KEY (`BookID`),
  ADD KEY `BookStatus` (`BookStatus`),
  ADD KEY `LibraryBranch` (`LibraryBranch`),
  ADD KEY `AgeRange` (`AgeRange`),
  ADD KEY `Genre` (`Genre`);

ALTER TABLE `BookStatus`
  ADD PRIMARY KEY (`BookStatusKey`);

ALTER TABLE `Cities`
  ADD PRIMARY KEY (`CityCode`);

ALTER TABLE `Genres`
  ADD PRIMARY KEY (`GenreCode`);

ALTER TABLE `LibraryBranches`
  ADD PRIMARY KEY (`BranchCode`);

ALTER TABLE `LibraryCardHolders`
  ADD PRIMARY KEY (`UserCardID`),
  ADD KEY `City` (`City`);

ALTER TABLE `LibraryStaff`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `City` (`City`);

ALTER TABLE `Loans`
  ADD PRIMARY KEY (`LoanID`),
  ADD KEY `UserCardID` (`UserCardID`),
  ADD KEY `BookID` (`BookID`);


ALTER TABLE `AgeRanges`
  MODIFY `AgeCode` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `Books`
  MODIFY `BookID` tinyint(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

ALTER TABLE `BookStatus`
  MODIFY `BookStatusKey` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `Cities`
  MODIFY `CityCode` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `Genres`
  MODIFY `GenreCode` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `LibraryBranches`
  MODIFY `BranchCode` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `LibraryCardHolders`
  MODIFY `UserCardID` tinyint(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `LibraryStaff`
  MODIFY `StaffID` tinyint(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

ALTER TABLE `Loans`
  MODIFY `LoanID` tinyint(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;


ALTER TABLE `Books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`BookStatus`) REFERENCES `BookStatus` (`BookStatusKey`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`LibraryBranch`) REFERENCES `LibraryBranches` (`BranchCode`),
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`AgeRange`) REFERENCES `AgeRanges` (`AgeCode`),
  ADD CONSTRAINT `books_ibfk_4` FOREIGN KEY (`Genre`) REFERENCES `Genres` (`GenreCode`),
  ADD CONSTRAINT `books_ibfk_5` FOREIGN KEY (`BookStatus`) REFERENCES `BookStatus` (`BookStatusKey`),
  ADD CONSTRAINT `books_ibfk_6` FOREIGN KEY (`LibraryBranch`) REFERENCES `LibraryBranches` (`BranchCode`),
  ADD CONSTRAINT `books_ibfk_7` FOREIGN KEY (`AgeRange`) REFERENCES `AgeRanges` (`AgeCode`),
  ADD CONSTRAINT `books_ibfk_8` FOREIGN KEY (`Genre`) REFERENCES `Genres` (`GenreCode`);

ALTER TABLE `LibraryCardHolders`
  ADD CONSTRAINT `librarycardholders_ibfk_1` FOREIGN KEY (`City`) REFERENCES `Cities` (`CityCode`);

ALTER TABLE `LibraryStaff`
  ADD CONSTRAINT `librarystaff_ibfk_1` FOREIGN KEY (`City`) REFERENCES `Cities` (`CityCode`);

ALTER TABLE `Loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`UserCardID`) REFERENCES `LibraryCardHolders` (`UserCardID`),
  ADD CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `Books` (`BookID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
