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

INSERT INTO `AgeRanges` (`AgeCode`, `AgeRange`) VALUES
(0, 'Under 3'),
(1, '3-5 years'),
(2, '5-7'),
(3, '7-9'),
(4, '9-11'),
(5, 'Preteen'),
(6, 'Teen'),
(7, 'Young Adult'),
(8, 'Adult'),
(9, 'Any');

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

INSERT INTO `Books` (`BookID`, `BookISBN`, `Title`, `Author1`, `Author2`, `Author3`, `YearPublished`, `BookStatus`, `LibraryBranch`, `AgeRange`, `Genre`) VALUES
(000000002, '978-1408855669', 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', '', '', 2002, 2, 3, 4, 1),
(000000003, '978-1408855652', 'Harry Potter and the Philosophers Stone', 'J.K. Rowling', '', '', 2000, 1, 3, 4, 1),
(000000004, '978-0008342579', 'A Clockwork Orange', 'Anthony Burgess', '', '', 1962, 4, 2, 8, 5),
(000000005, '978-1529014068', 'Pinch of Nom: 100 Slimming, Home-style Recipes', 'Kate Allinson', 'Kay Featherstone', '', 2019, 1, 1, 9, 3),
(000000006, '978-1509858637', 'This is Going to Hurt: Secret Diaries of a Junior Doctor', 'Adam Kay', '', '', 2018, 3, 1, 9, 3),
(000000009, '978-1408855652', 'Harry Potter and the Philosophers Stone', 'J.K. Rowling', '', '', 2000, 1, 1, 4, 1);

CREATE TABLE `BookStatus` (
  `BookStatusKey` tinyint(3) UNSIGNED NOT NULL,
  `BookStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `BookStatus` (`BookStatusKey`, `BookStatus`) VALUES
(1, 'Available'),
(2, 'Loaned'),
(3, 'Overdue'),
(4, 'In repair'),
(5, 'Reserved');

CREATE TABLE `Cities` (
  `CityCode` tinyint(3) UNSIGNED NOT NULL,
  `City` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Cities` (`CityCode`, `City`) VALUES
(0, 'London'),
(1, 'Bath'),
(2, 'Manchester');

CREATE TABLE `Genres` (
  `GenreCode` tinyint(3) UNSIGNED NOT NULL,
  `GenreName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Genres` (`GenreCode`, `GenreName`) VALUES
(1, 'Children'),
(2, 'Fantasy'),
(3, 'Health'),
(4, 'Cookery'),
(5, 'Thriller');

CREATE TABLE `LibraryBranches` (
  `BranchCode` tinyint(3) UNSIGNED NOT NULL,
  `LibraryBranch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `LibraryBranches` (`BranchCode`, `LibraryBranch`) VALUES
(1, 'Clapham'),
(2, 'Kentish Town'),
(3, 'Hackney');

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
(000000004, 'Elliot', 'Dorsey', '02077859030', 'Flat 2a', 'Church Street', 0, 'NW10 9QS', '2018-12-11', 'Elliot123', 'e.dorsey@hotmail.com', 'KMKm5fCm'),
(000000005, 'James', 'Parnell', '07412889212', 'Flat 14', 'Hendon Lane', 0, 'SW3 4RW', '0000-00-00', 'James14', 'j.parnell@test.com', '45dsfsdfs'),
(000000006, 'Clare', 'Smith', '07412889444', 'Flat 78', 'Church Lane', 2, 'KT12 4BR', '2012-01-02', 'Clare23', 'clare.smith@test.com', 'kjhkjhig45'),
(000000007, 'Marjoree', 'Ellis', '07456889444', 'Flat 15', 'High Road', 0, 'N3 5BS', '2015-03-10', 'MEllis24', 'm.ellis@hotmail.com', 'HIKdfs48'),
(000000008, 'Jayne', 'Brown', '07784688944', 'Flat 45', 'Temple Row', 1, 'LE5 7EW', '1901-12-25', 'JayneB19', 'jayne.brown@aol.com', 'HGRT741jgf'),
(000000009, 'Melissa', 'Johnson', '07845654125', '14 The Pines', 'Brighton Road', 0, 'BR15 7EW', '1989-03-09', 'MelJo78', 'mel.johnson@aol.com', 'HGRTNYTR12');

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

INSERT INTO `LibraryStaff` (`StaffID`, `Forename`, `Surname`, `PhoneNumber`, `AddressNumber`, `AddressRoad`, `City`, `Postcode`, `StartDate`) VALUES
(000000001, 'Regina', 'King', '02077859122', '24', 'Sunny Lane', 0, 'NW8 5HY', '0000-00-00'),
(000000002, 'Peter', 'Jackson', '02077859121', '3', 'Livington Street', 0, 'NW10 6TY', '0000-00-00'),
(000000003, 'Olivia', 'Coleman', '02077859123', '3', 'Clumber Street', 0, 'NW3 3LO', '0000-00-00'),
(000000004, 'Remi', 'Remi', '02077859124', '53', 'Milton Road', 0, 'NW22 4PS', '0000-00-00');

CREATE TABLE `Loans` (
  `LoanID` tinyint(9) UNSIGNED ZEROFILL NOT NULL,
  `UserCardID` tinyint(9) UNSIGNED ZEROFILL DEFAULT NULL,
  `BookID` tinyint(9) UNSIGNED ZEROFILL DEFAULT NULL,
  `DateLoaned` date NOT NULL,
  `DateDueBack` date NOT NULL,
  `DateReturned` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Loans` (`LoanID`, `UserCardID`, `BookID`, `DateLoaned`, `DateDueBack`, `DateReturned`) VALUES
(000000001, 000000004, 000000009, '2019-01-21', '2019-02-20', NULL),
(000000002, 000000005, 000000006, '2019-02-25', '2019-03-24', NULL),
(000000003, 000000004, 000000002, '2018-12-23', '2019-01-22', '2019-01-21'),
(000000004, 000000009, 000000005, '2016-07-13', '2016-08-12', NULL),
(000000005, 000000007, 000000003, '2018-10-03', '2018-11-02', '2018-11-07');


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
  MODIFY `AgeCode` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `Books`
  MODIFY `BookID` tinyint(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `BookStatus`
  MODIFY `BookStatusKey` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `Cities`
  MODIFY `CityCode` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `Genres`
  MODIFY `GenreCode` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `LibraryBranches`
  MODIFY `BranchCode` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `LibraryCardHolders`
  MODIFY `UserCardID` tinyint(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `LibraryStaff`
  MODIFY `StaffID` tinyint(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `Loans`
  MODIFY `LoanID` tinyint(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


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
