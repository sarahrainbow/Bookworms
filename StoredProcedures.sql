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

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `FindBookByTitle`(IN `thisBookTitle` VARCHAR(120))
BEGIN
  SELECT DISTINCT concat(Author.FirstName,' ', Author.LastName) as 'Author', Book.*, copy.IsAvailable, LibraryBranch.LibraryBranch
  FROM bookisbn_authorid
  INNER JOIN Book
  ON bookisbn_authorid.BookISBN=Book.BookISBN
  INNER JOIN Author
  ON bookisbn_authorid.AuthorID = Author.AuthorID
  INNER JOIN copy
  ON bookisbn_authorid.BookISBN = copy.BookISBN
  INNER JOIN LibraryBranch 
  ON copy.BranchID = LibraryBranch.BranchID
  WHERE Book.Title LIKE CONCAT('%', thisBookTitle, '%');                       
END$$
DELIMITER ;


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

--look up availability of a book across branches
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

-- Find loans by libraryCardID

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `FindLoansByLibraryCardID`(IN `thisLoanID` INT(10))
    NO SQL
BEGIN
SELECT DISTINCT
  concat(librarycardholder.FirstName, ' ', librarycardholder.SecondName) as 'Customer name', 
  Book.Title,
  concat(Author.FirstName,' ', Author.LastName) as 'Author',
  Loan.DateOut, 
  Loan.DateReturned,
  DATE_ADD(DateOut, INTERVAL 1 MONTH) as 'Due back' 

FROM Loan
INNER JOIN LibraryCardHolder
  ON LibraryCardHolder.LibraryCardID = Loan.LibraryCardID
INNER JOIN copy
  ON copy.BookID=loan.BookID 
INNER JOIN bookisbn_authorid
  ON copy.BookISBN=bookisbn_authorid.BookISBN
INNER JOIN book
  ON book.BookISBN=bookisbn_authorid.BookISBN
INNER JOIN Author
  ON bookisbn_authorid.AuthorID = Author.AuthorID
WHERE Loan.LibraryCardID = thisLoanID;
END$$
DELIMITER ;