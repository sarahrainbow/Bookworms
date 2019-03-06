-- Find User by forename

CREATE PROCEDURE FindUserByFirstName (IN thisForename VARCHAR(50))
BEGIN
	SELECT * 
	FROM LibraryCardHolder
    WHERE LibraryCardholder.FirstName = thisForename;                           
END //

CALL FindUserByFirstName('Elliot');

-- exported from MySQL 

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `FindUserByFirstName` (IN `thisForename` VARCHAR(50))  BEGIN
  SELECT * 
  FROM LibraryCardholder
    WHERE LibraryCardholder.FirstName = thisForename;                          
END$$
DELIMITER ;



-- Find book by title

CREATE PROCEDURE FindBookByTitle (IN thisBookTitle VARCHAR(120))
BEGIN
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
END //

CALL `FindBookByTitle`('Good Omens');


-- exported from MySQL 

DELIMITER $$
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
DELIMITER ;



--change user Password

CREATE PROCEDURE updatePassword
 (IN thisPassword varchar(20)
  ,IN thisUserID int(10))
 
 BEGIN

UPDATE librarycardholder
SET librarycardholder.Password  = thisPassword

WHERE librarycardholder.librarycardid = thisUserID;

END

CALL updatePassword('TestProcedure','1');


-- exported from MySQL 
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePassword` (IN `thisPassword` VARCHAR(20), IN `thisUserID` INT(10))  BEGIN

UPDATE librarycardholder
SET librarycardholder.Password  = thisPassword

WHERE librarycardholder.librarycardid = thisUserID;

END$$
DELIMITER ;
