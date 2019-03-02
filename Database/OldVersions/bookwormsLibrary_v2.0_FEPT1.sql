###DATABASE CREATION###

CREATE DATABASE IF NOT EXISTS LibraryApp;
USE LibraryApp;

###TABLE CREATION###
	#Postcode#
CREATE TABLE IF NOT EXISTS Postcode(
		PostcodeID INT(9) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,
		Postcode VARCHAR(10) NOT NULL);

INSERT INTO Postcode(
    Postcode)
    
VALUES('BA2 0AA'),
		('N20 0RH'),
		('NW1 8UJ'),
		('NW3 0LQ'),
		('NW3 3LO'),
		('NW8 5NA'),
		('NW8 5HY'),
		('NW10 6TY'),
		('NW10 9QS'),
		('NW11 1TR'),
		('NW22 4LJ'),
		('NW22 4PS'),
		('NW22 5QX');


		#City#
CREATE TABLE IF NOT EXISTS City(
		CityID INT(3) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,
		CityName VARCHAR(50) NOT NULL);

INSERT INTO City(
    CityName)
    
VALUES('Bath'),
		('Bristol'),
		('Cambridge'),
		('Gloucester'),
		('London'),
		('Manchester');


	#Road#
CREATE TABLE IF NOT EXISTS Road(
		RoadID INT(9) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,
		RoadName VARCHAR(100) NOT NULL);

INSERT INTO Road(
    RoadName)
    
VALUES('Broadway'),
		('Church Road'),
		('High Street'),
		('Main Street'),
		('Mill Road'),
		('New Road'),
		('Park Road'),
		('Springfield Road'),
		('The Avenue'),
		('The Green'),
		('York Road');


	#Address#
CREATE TABLE IF NOT EXISTS Address(
		AddressID INT(9) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,
		AddressNumber VARCHAR(20) NOT NULL,
		Road INT(9) UNSIGNED ZEROFILL,#Remember that this needs to read exactly how it does in the parent table otherwise error
		City INT(3) UNSIGNED ZEROFILL,
		Postcode INT(9) UNSIGNED ZEROFILL,
		FOREIGN KEY (Road) references Road(RoadID),
		FOREIGN KEY (City) references City(CityID),
		FOREIGN KEY (Postcode) references Postcode(PostcodeID)
		) engine=InnoDB;

INSERT INTO Address(
    AddressNumber, Road, City, Postcode)
    
VALUES('Flat 2a','000000002','005','000000003'),
		('13','000000001','005','000000004'),
		('22','000000009','005','000000002'),
		('24','000000009','005','000000002'),
		('8','000000004','005','000000005'),
		('7','000000003','005','000000008'),
		('152','000000005','005','000000006'),
		('98','000000006','005','000000009'),
		('3','000000007','005','000000010'),
		('3','000000008','001','000000001'),
		('311','000000005','005','000000007'),
		('Flat 6','000000010','005','000000011'),
		('23','000000011','005','000000012');



###TABLE CREATION###
	#Author#
CREATE TABLE IF NOT EXISTS Author(
    AuthorID INT(9) UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    SecondName VARCHAR(50) NULL,
    LastName VARCHAR(50) NOT NULL
    ) engine=InnoDB;
    
    INSERT INTO Author(FirstName, SecondName, LastName)
    
  VALUES('Michelle', '', 'Obama'),
    ('Rachel', '', 'Hollis'),
    ('Craig', '', 'Smith'),
    ('Michael', 'NULL', 'Wolff'),
    ('Bob', '', 'Woodward'),
    ('Jill', '', 'Twiss'),
    ('Jordan', 'B', 'Peterson'),
    ('Joanna', '', 'Gaines'),
    ('Mark', '', 'Manson'),
    ('James', '', 'Comey'),
    ('Amy', '', 'Ramos'),
    ('Jeff', '', 'Kinney'),
    ('Gary', '', 'Chapman');


###TABLE CREATION###
	#Genre#
CREATE TABLE IF NOT EXISTS Genre(
  GenreCode TINYINT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    GenreName VARCHAR(50) NOT NULL
    ) engine=InnoDB;
    
 INSERT INTO Genre(GenreName)
 
 VALUES('Biographical'),
 ('Fiction'),
 ('Crime'),
 ('Children'),
 ('Fantasy'),
 ('Health'),
 ('DIY'),
 ('Cookery'),
 ('Arts & Photography'),
 ('History'),
 ('Humour');
    
    
###TABLE CREATION###
	#AgeRange#
CREATE TABLE IF NOT EXISTS AgeRange(
    AgeCode TINYINT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    AgeRange VARCHAR(50) NOT NULL
) engine=InnoDB;

INSERT INTO AgeRange(AgeRange)

VALUES('Under 3'),
('3-5 years'),
('5-7 years'),
('7-9 years'),
('9-11 years'),
('Preteen'),
('Teen'),
('Young adult'),
('Adult'),
('Any');

###TABLE CREATION###
	#LibraryBranch#
CREATE TABLE IF NOT EXISTS LibraryBranch(
    BranchCode TINYINT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    LibraryBranch VARCHAR(50) NULL
    ) engine=InnoDB;
    
    INSERT INTO LibraryBranch(LibraryBranch)
    
    VALUES('Tottenham'),
    ('Walworth'),
    ('Chelsea'),
    ('Woolwich'),
    ('Lewisham'),
    ('Bath'),
    ('Bristol');
    
    
    
    ###TABLE CREATION###
	#Book#
CREATE TABLE IF NOT EXISTS Book(
    BookISBN CHAR(14) NOT NULL PRIMARY KEY,
    Title VARCHAR(120) NOT NULL,
    YearPublished YEAR NOT NULL,
    LibraryBranch TINYINT(3) UNSIGNED,
    AgeRange TINYINT(3) UNSIGNED,
    Genre TINYINT(3) UNSIGNED,
    FOREIGN KEY (LibraryBranch) references LibraryBranch(BranchCode),
    FOREIGN KEY (AgeRange) references AgeRange(AgeCode),
    FOREIGN KEY (Genre) references Genre(GenreCode)
) engine=InnoDB;
    
    INSERT INTO Book(BookISBN, Title, YearPublished, LibraryBranch, AgeRange, Genre)
    
    VALUES('978-0241334140', 'Becoming', '2018', '1', '1', '1'),
    ('978-1400201655', 'Girl, wash your face',  '2018', '1', '1', '1'),
    ('978-1407195575', 'The Wonky Donkey', '2018', '1', '1', '1'),
    ('978-1408711408', 'Fire and fury', '2018', '1', '1', '1'),
    ('978-1471181290', 'Fear: Trump in the White House', '2018', '1', '1', '1'),
    ('978-1452173801', 'Last week tonight', '2018', '1', '1', '1'),
    ('978-0241351635', '12 Rules for Life: An Antidote to Chaos', '2018', '1', '1', '1'),
    ('978-0062801975', 'Homebody: A Guide to Creating Spaces You Never Want to Leave', '2018', '1', '1', '1'),
    ('978-0062457714', 'The Subtle Art of Not Giving a F*ck', '2018', '1', '1', '1'),
    ('978-1529000825', 'A Higher Loyalty: Truth, Lies, and Leadership', '2018', '1', '1', '1'),
    ('978-1592338153','The Beginners KetoDiet Cookbook', '2018', '1', '1', '1'),
    ('978-0241321980','Diary of a Wimpy Kid: The Meltdown (book 13', '2018', '1', '1', '1'),
    ('978-0802418104', 'Loving Your Spouse When You Feel Like Walking Away', '2018', '1', '1', '1');
    
  
  
  ---###IGNORE FOR NOW###
    ###TABLE CREATION###
    #Copy#
    CREATE TABLE IF NOT EXISTS Copy(
    BookID TINYINT(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT PRIMARY KEY,
    BookISBN CHAR(14) NOT NULL,
    Copies TINYINT(3),
    FOREIGN KEY (BookISBN) references Book(BookISBN)  
    ) engine=InnoDB;
    
    INSERT INTO Copy(Copies)
    
    VALUES('978-0062457714','4')---
 