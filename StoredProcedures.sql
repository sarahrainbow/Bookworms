-- Find User by forename

CREATE PROCEDURE FindUserByForename(IN thisForename varchar(50))
BEGIN
	SELECT * 
	FROM LibraryCardHolder
    WHERE LibraryCardHolder.forename = thisForename;                          
END //

CALL FindUserByForename('Elliot');

-- exported from MySQL 

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `FindUserByForename`(IN thisForename varchar(50))
BEGIN
	SELECT * 
	FROM LibraryCardholder
    WHERE LibraryCardholder.Forename = thisForename;                          
END$$
DELIMITER ;



-- Find book by title

CREATE PROCEDURE FindBookByTitle(IN thisBookTitle varchar(120))
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
	ON CopyAvailibility.BranchCode = LibraryBranch.BranchCode
	WHERE Book.Title= thisBookTitle;                       
END //

CALL `FindBookByTitle`('Good Omens');


-- exported from MySQL 

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `FindBookByTitle`(IN thisBookTitle varchar(120))
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
	ON CopyAvailibility.BranchCode = LibraryBranch.BranchCode
	WHERE Book.Title= thisBookTitle;                       
END$$
DELIMITER ;