SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

Create database if not exists LibraryApp;
Use LibraryApp;


CREATE TABLE `Address` (
  `AddressID` int(9) UNSIGNED ZEROFILL NOT NULL,
  `AddressNumber` varchar(20) NOT NULL,
  `Road` int(9) UNSIGNED ZEROFILL DEFAULT NULL,
  `City` int(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `Postcode` int(9) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(000000013, '23', 000000011, 005, 000000012);

CREATE TABLE `AgeRange` (
  `AgeCode` tinyint(3) UNSIGNED NOT NULL,
  `AgeRange` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(10, 'Any');

CREATE TABLE `Author` (
  `AuthorID` int(9) UNSIGNED ZEROFILL NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `SecondName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Author` (`AuthorID`, `FirstName`, `SecondName`, `LastName`) VALUES
(000000001, 'Michelle', '', 'Obama'),
(000000002, 'Rachel', '', 'Hollis'),
(000000003, 'Craig', '', 'Smith'),
(000000004, 'Michael', '', 'Wolff'),
(000000005, 'Bob', '', 'Woodward'),
(000000006, 'Jill', '', 'Twiss'),
(000000007, 'Jordan', 'B', 'Peterson'),
(000000008, 'Joanna', '', 'Gaines'),
(000000009, 'Mark', '', 'Manson'),
(000000010, 'James', '', 'Comey'),
(000000011, 'Amy', '', 'Ramos'),
(000000012, 'Jeff', '', 'Kinney'),
(000000013, 'Gary', '', 'Chapman'),
(000000014, 'Neil', NULL, 'Gaiman'),
(000000015, 'Terry', NULL, 'Pratchett');

CREATE TABLE `Book` (
  `BookISBN` char(14) NOT NULL,
  `Title` varchar(120) NOT NULL,
  `YearPublished` year(4) NOT NULL,
  `AgeRange` tinyint(3) UNSIGNED DEFAULT NULL,
  `Genre` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `CopyAvailibility` (
  `BookID` int(9) UNSIGNED ZEROFILL NOT NULL,
  `BookISBN` char(14) NOT NULL,
  `IsAvailable` bit(1) NOT NULL DEFAULT 1,  
  `BranchCode` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Book` (`BookISBN`, `Title`, `YearPublished`, `AgeRange`, `Genre`) VALUES
('978-0062457714', 'The Subtle Art of Not Giving a F*ck', 2018, 1, 1),
('978-0062801975', 'Homebody: A Guide to Creating Spaces You Never Want to Leave', 2018, 1, 1),
('978-0241321980', 'Diary of a Wimpy Kid: The Meltdown (book 13', 2018, 1, 1),
('978-0241321988', 'Good Omens', 1990, 2, 2),
('978-0241334140', 'Becoming', 2018, 1, 1),
('978-0241351635', '12 Rules for Life: An Antidote to Chaos', 2018, 1, 1),
('978-0802418104', 'Loving Your Spouse When You Feel Like Walking Away', 2018, 1, 1),
('978-1400201655', 'Girl, wash your face', 2018, 5, 4),
('978-1407195575', 'The Wonky Donkey', 2018, 3, 3),
('978-1408711408', 'Fire and fury', 2018, 1, 1),
('978-1452173801', 'Last week tonight', 2018, 1, 1),
('978-1471181290', 'Fear: Trump in the White House', 2018, 1, 1),
('978-1529000825', 'A Higher Loyalty: Truth, Lies, and Leadership', 2018, 1, 1),
('978-1592338153', 'The Beginners KetoDiet Cookbook', 2018, 9, 4);

CREATE TABLE `BookISBN_AuthorID` (
  `BookISBN` char(14) NOT NULL,
  `AuthorID` int(9) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `BookISBN_AuthorID` (`BookISBN`, `AuthorID`) VALUES
('978-1408711408', 000000004),
('978-0062457714', 000000009),
('978-0062801975', 000000008),
('978-0241321980', 000000012),
('978-1592338153', 000000011),
('978-0241321980', 000000012),
('978-0802418104', 000000013),
('978-0241321988', 000000014),
('978-0241321988', 000000015);

CREATE TABLE `City` (
  `CityID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `CityName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `City` (`CityID`, `CityName`) VALUES
(001, 'Bath'),
(002, 'Bristol'),
(003, 'Cambridge'),
(004, 'Gloucester'),
(005, 'London'),
(006, 'Manchester');

CREATE TABLE `Genre` (
  `GenreCode` tinyint(3) UNSIGNED NOT NULL,
  `GenreName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(11, 'Humour');

CREATE TABLE `LibraryBranch` (
  `BranchCode` tinyint(3) UNSIGNED NOT NULL,
  `LibraryBranch` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `LibraryBranch` (`BranchCode`, `LibraryBranch`) VALUES
(1, 'Tottenham'),
(2, 'Walworth'),
(3, 'Chelsea'),
(4, 'Woolwich'),
(5, 'Lewisham'),
(6, 'Bath'),
(7, 'Bristol');

CREATE TABLE `LibraryCardholder` (
  `LibraryCardID` int(10) NOT NULL,
  `Forename` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `ContactNumber` bigint(11) NOT NULL,
  `AddressID` int(9) UNSIGNED ZEROFILL DEFAULT NULL,
  `DateJoined` date NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `LibraryCardholder` (`LibraryCardID`, `Forename`, `Surname`, `ContactNumber`, `AddressID`, `DateJoined`, `Email`, `Username`, `Password`) VALUES
(1, 'Elliot', 'Dorsey', 2077859030, 000000001, '2018-12-10', 'e.dorsey@hotmail.com', 'Elliot123', 'KMKm5fCm'),
(2, 'Amy', 'Moses', 2077859031, 000000002, '2018-08-07', 'amymoses@gmail.com', 'AM2345', 'sQwvr6Ja'),
(3, 'Maria', 'Esparza', 2077859032, 000000003, '2019-01-15', 'marespar@yahoo.com', 'MarEsp9', 'Gcf6eTez'),
(4, 'John', 'Reeves', 2077859033, 000000013, '2016-03-25', 'reeveyboy@hotmail.co.uk', 'Rooney10', '3aGHEUDz'),
(5, 'Toby', 'Allen', 2077859034, 000000005, '2015-09-15', 'tobyallen@gmail.com', 'batman97', 'W7vMVyJt'),
(6, 'Mary', 'Overy', 2077859035, 000000012, '2017-10-03', 'MaryOvery65@hotmail.com', 'MOvery65', 'GRWJSPBS'),
(7, 'Hope', 'Onwuka', 2077859036, 000000007, '2018-11-29', 'Honwuka@example.com', 'Hwuka2006', 'vgpj6rvp'),
(8, 'Simon', 'Solomon', 2077859037, 000000008, '2019-03-01', 'Sillysimon@hotmail.co.uk', 'SimSol23', 'cXCSmTge'),
(9, 'George', 'Washington', 2147483647, 000000006, '2016-05-13', 'g.washington@gmail.com', 'GWash', 'LM0KLoP'),
(10, 'Elizabeth', 'Windsor', 2147483647, 000000006, '2016-05-13', 'E.Windsor@gmail.com', 'Queenie', 'NhM09LgV'),
(11, 'Mary', 'Scots', 2147483647, 000000005, '2016-05-13', 'ScotsM@gmail.com', 'Stuart1542', 'Pl1G5Fv');

CREATE TABLE `libraryUsers` (
  `userID` int(11) NOT NULL,
  `userForename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Postcode` (
  `PostcodeID` int(9) UNSIGNED ZEROFILL NOT NULL,
  `Postcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(000000013, 'NW22 5QX');

CREATE TABLE `Road` (
  `RoadID` int(9) UNSIGNED ZEROFILL NOT NULL,
  `RoadName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(000000011, 'York Road');


ALTER TABLE `Address`
  ADD PRIMARY KEY (`AddressID`),
  ADD KEY `Road` (`Road`),
  ADD KEY `City` (`City`),
  ADD KEY `Postcode` (`Postcode`);

ALTER TABLE `AgeRange`
  ADD PRIMARY KEY (`AgeCode`);

ALTER TABLE `Author`
  ADD PRIMARY KEY (`AuthorID`);

ALTER TABLE `Book`
  ADD PRIMARY KEY (`BookISBN`),
  ADD KEY `AgeRange` (`AgeRange`),
  ADD KEY `Genre` (`Genre`);

ALTER TABLE `BookISBN_AuthorID`
  ADD KEY `BookISBN` (`BookISBN`),
  ADD KEY `AuthorID` (`AuthorID`);

ALTER TABLE `City`
  ADD PRIMARY KEY (`CityID`);

ALTER TABLE `Genre`
  ADD PRIMARY KEY (`GenreCode`);

ALTER TABLE `LibraryBranch`
  ADD PRIMARY KEY (`BranchCode`);

ALTER TABLE `LibraryCardholder`
  ADD PRIMARY KEY (`LibraryCardID`),
  ADD KEY `AddressID` (`AddressID`);

ALTER TABLE `libraryUsers`
  ADD PRIMARY KEY (`userID`);

ALTER TABLE `Postcode`
  ADD PRIMARY KEY (`PostcodeID`);

ALTER TABLE `Road`
  ADD PRIMARY KEY (`RoadID`);


ALTER TABLE `Address`
  MODIFY `AddressID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `AgeRange`
  MODIFY `AgeCode` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `Author`
  MODIFY `AuthorID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `City`
  MODIFY `CityID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `Genre`
  MODIFY `GenreCode` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `LibraryBranch`
  MODIFY `BranchCode` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `LibraryCardholder`
  MODIFY `LibraryCardID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `libraryUsers`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Postcode`
  MODIFY `PostcodeID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `Road`
  MODIFY `RoadID` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


ALTER TABLE `Address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`Road`) REFERENCES `Road` (`RoadID`),
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`City`) REFERENCES `City` (`CityID`),
  ADD CONSTRAINT `address_ibfk_3` FOREIGN KEY (`Postcode`) REFERENCES `Postcode` (`PostcodeID`);

ALTER TABLE `Book`
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`AgeRange`) REFERENCES `AgeRange` (`AgeCode`),
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`Genre`) REFERENCES `Genre` (`GenreCode`);

ALTER TABLE `BookISBN_AuthorID`
  ADD CONSTRAINT `bookisbn_authorid_ibfk_1` FOREIGN KEY (`BookISBN`) REFERENCES `book` (`BookISBN`),
  ADD CONSTRAINT `bookisbn_authorid_ibfk_2` FOREIGN KEY (`AuthorID`) REFERENCES `author` (`AuthorID`);

ALTER TABLE `LibraryCardholder`
  ADD CONSTRAINT `librarycardholder_ibfk_1` FOREIGN KEY (`AddressID`) REFERENCES `Address` (`AddressID`);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
