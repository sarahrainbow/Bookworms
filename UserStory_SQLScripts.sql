## USER STORY - SQL SCRIPTS ##

#UserStory 1 As a customer I want to borrow a couple of books per month so that I can read for pleasure

UPDATE copy
SET copy.IsAvailable = 0
where copy.BookID = '000000001';

INSERT into loan (`LibraryCardID`, `BookID`, `DateOut`, `DateReturned`) 
VALUES ('2', '000000001', '2019/03/31', '2019/04/30')

#UserStory 2 As a customer I want to find books by genre so that I can plan for lessons

SELECT Title, concat(Author.FirstName,' ', Author.LastName) as 'Author', Genre.GenreName
FROM Book
Inner join Genre
ON Genre.GenreCode = Book.Genre
Inner Join BookISBN_AuthorID
ON Book.BookISBN = BookISBN_AuthorID.BookISBN
INNER JOIN Author
ON bookisbn_authorid.AuthorID = Author.AuthorID
WHERE Genre.GenreName = 'Biographical'

#UserStory 3 As a customer I want to find books by age range so that my child has suitable reading material

SELECT Title, concat(Author.FirstName,' ', Author.LastName) as 'Author', Agerange.AgeRange
FROM Book
Inner join agerange
ON Agerange.ageID = Book.AgeID
Inner Join BookISBN_AuthorID
ON Book.BookISBN = BookISBN_AuthorID.BookISBN
INNER JOIN Author
ON bookisbn_authorid.AuthorID = Author.AuthorID
WHERE Agerange.AgeRange = 'Under 3'

#UserStory 4 As a student I want to reserve books out on loan so that I can borrow them by a specified date 
Need to create a reservation table

#UserStory 5 As a university professor I want to see a list of previously borrowed books in my account area so I can borrow them by a specified date
Similar to user story 9. 

#UserStory6 As a customer I want to search for books by title so that I can quickly find what I am looking for

SELECT concat(Author.FirstName,' ', Author.LastName) as 'Author', Book.*, Copy.IsAvailable, LibraryBranch.LibraryBranch
FROM bookisbn_authorid
INNER JOIN Book
	ON bookisbn_authorid.BookISBN=Book.BookISBN
INNER JOIN Author
	ON bookisbn_authorid.AuthorID = Author.AuthorID
INNER JOIN copy
	ON bookisbn_authorid.BookISBN = copy.BookISBN
INNER JOIN LibraryBranch 
	ON Copy.BranchID = LibraryBranch.BranchID
Where Book.Title= 'The Subtle Art of Not Giving a F*ck' AND Copy.IsAvailable = 1;

#UserStory7  As a customer I want to search for books by author so that I can see everything they have published

SELECT concat(Author.FirstName,' ', Author.LastName) as 'Author', Book.*, Copy.IsAvailable, LibraryBranch.LibraryBranch
FROM bookisbn_authorid
INNER JOIN Book
	ON bookisbn_authorid.BookISBN=Book.BookISBN
INNER JOIN Author
	ON bookisbn_authorid.AuthorID = Author.AuthorID
INNER JOIN copy
	ON bookisbn_authorid.BookISBN = copy.BookISBN
INNER JOIN LibraryBranch 
	ON Copy.BranchID = LibraryBranch.BranchID
Where Author.FirstName = 'Gary' AND Author.LastName = 'Chapman' AND copy.IsAvailable = 1;

#UserStory8 As a customer I want to search for books by ISBN so that I can quickly find what I am looking for

SELECT concat(Author.FirstName,' ', Author.LastName) as 'Author', Book.*, copy.IsAvailable, LibraryBranch.LibraryBranch
FROM bookisbn_authorid
INNER JOIN Book
	ON bookisbn_authorid.BookISBN=Book.BookISBN
INNER JOIN Author
	ON bookisbn_authorid.AuthorID = Author.AuthorID
INNER JOIN copy
	ON bookisbn_authorid.BookISBN = copy.BookISBN
INNER JOIN LibraryBranch 
	ON copy.BranchID= LibraryBranch.BranchID
Where Book.BookISBN = '978-0062457714' AND copy.IsAvailable = 1;


#UserStory9  As a customer I want to see all my loan activity so I have it for my records

-- Need Loan table to be created. Book needs BookLoanHistory field, LibraryCardHolder also needs CustomerLoanHistory

SELECT DISTINCT
	concat(librarycardholder.FirstName, ' ', librarycardholder.LastName) as 'Customer name', 
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
WHERE Loan.LibraryCardID = '6'

#UserStory10  As a customer I want to see just my current loans so I know which books I have to return and when.

SELECT DISTINCT
	concat(librarycardholder.FirstName, ' ', librarycardholder.LastName) as 'Customer name', 
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
WHERE Loan.LibraryCardID = '6' 
	AND DateReturned IS NULL


#UserStory11 As a customer I want to be able to update my name and address information
-- name update--
UPDATE librarycardholder
SET librarycardholder.FirstName = 'Ell'
WHERE librarycardholder.librarycardid = 1

--address update--
UPDATE Address, Road, City, Postcode
SET Address.AddressNumber = '15',
Road.RoadName = 'High Street',
City.CityName = 'Bath',
Postcode.Postcode = 'BA2 0AA'
Where Address.AddressID =  000000001  

#User story 12 As a customer I want to be able to change my password

UPDATE librarycardholder
SET librarycardholder.Password  = '745845'
WHERE librarycardholder.librarycardid = 1

#User story 13 As a library website administrator I want to search for user accounts

SELECT * FROM librarycardholder
WHERE LibraryCardID = 1

#User story 14 As a library website administrator I want add new book titles to the database as they become available

INSERT INTO book(BookISBN, Title, YearPublished, AgeID, GenreID)
VALUES ('978-1405288508', 'Tall tales', '2017', '2', '4');

INSERT INTO author(FirstName, LastName)
VALUES ('Janet', 'Blogs');

INSERT INTO bookisbn_authorID(BookISBN, AuthorID)
VALUES ('978-1405288508', 000000019);

INSERT INTO copy(BookISBN, IsAvailable, BranchID)
VALUES ('978-1405288508', '1', '3');

#User story 15 As a library website administrator I want to set a control on the maximum number of books a user can borrow

We need a loans table for this but think it could look something like this. Out of scope for now

SELECT LibraryCardID
FROM librarycardholder
WHERE LibraryCardID = ANY (SELECT FROM Loan  WHERE LoanQuantity = <=5);






#UserStory16 - select overdue books (have kept simple for now but could also add LCHolder details to it too)

	SELECT 
			C.BookID
			,B.Title
			,concat (A.FirstName, ' ', A.LastName) as 'Author' 
	        ,L.LibraryCardID
	        ,L.DateOut
	        ,DATE_ADD(DateOut, INTERVAL 30 DAY) as 'Expected_Return'
	        

		FROM Book AS B
		INNER JOIN bookisbn_authorid as AB
			ON AB.BookISBN=B.BookISBN
		INNER JOIN Author AS A
			ON AB.AuthorID = A.AuthorID
		INNER JOIN copy as C
			ON AB.BookISBN = C.BookISBN
		INNER JOIN Loan as L 
			ON C.BookID=L.BookID
	        AND L.DateReturned IS NULL

	    
	 WHERE CURRENT_DATE > DATE_ADD(DateOut, INTERVAL 30 DAY) #this function adds 30 days to the date in the DateOut column



#UserStory17 - get contact details of a library card holder

	SELECT LCH.FirstName
			,LCH.LastName
			,LCH.ContactNumber
			,COALESCE(LCH.Email,'No email provided')
			,A.AddressNumber
			,R.RoadName
			,C.CityName
			,P.Postcode

	#joining all the address tables
	FROM LibraryCardHolder as LCH
	INNER JOIN Address as A
	ON LCH.AddressID = A.AddressID

	INNER JOIN Road as R
	ON A.RoadID = R.RoadID

	INNER JOIN City as C
	ON A.CityID = C.CityID

	INNER JOIN Postcode as P
	ON A.PostcodeID = P.PostcodeID


	WHERE LibraryCardID = '1' #can be changed as necessary
	;



#UserStory18 - see what books are available in our branch
	
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


	WHERE DateReturned IS NOT NULL #means only pulls back books that are not checked out
			AND C.BranchID=1 #can be changed

	GROUP BY B.BookISBN, B.Title,concat(A.FirstName,' ', A.LastName),B.YearPublished, C.BranchID
	#group statement necessary for count function to work



#UserStory19 - securely store details of staff on payroll
	#Havent done this yet as we have not yet created a HR table (on could have list)



#User story 20- see what books are available across branches
		#NB this is very similar to user story 18, have just removed the where filter for branchID so thatnow pulling all branches

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


	WHERE DateReturned IS NOT NULL #means only pulls back books that are not checked out
		

	GROUP BY B.BookISBN, B.Title,concat(A.FirstName,' ', A.LastName),B.YearPublished, C.BranchID
	#group statement necessary for count function to work



#USER STORY 20
I want to be able to see stock levels of books across the city

SELECT concat(Author.FirstName,' ', Author.LastName) as 'Author', Book.*, copy.IsAvailable, LibraryBranch.LibraryBranch
FROM bookisbn_authorid
INNER JOIN Book
	ON bookisbn_authorid.BookISBN=Book.BookISBN
INNER JOIN Author
	ON bookisbn_authorid.AuthorID = Author.AuthorID
INNER JOIN copy
	ON bookisbn_authorid.BookISBN = copy.BookISBN
INNER JOIN LibraryBranch 
	ON copy.BranchCode = LibraryBranch.BranchCode
WHERE copy.IsAvailable = 1;



#USER STORY 21 ######## to be changed - we have a loans table!
#21 As I customer I want to check out a book

UPDATE Book
SET IsAvailable = 0
where Book.BookID = 000000001;

#USER STORY 22 ######## to be changed - we have a loans table!
#As a customer I want to check in a book

UPDATE Book
SET IsAvailable = 1
where Book.BookID = 000000001;

#USER STORY 23
# As a library staff member I want to check the return date of a loaned book from the branch I work at so I know when to expect it back

SELECT concat(LibraryCardHolder.Forename, ' ', LibraryCardHolder.Surname) as 'Customer Name', 
		Book.*, 
		LibraryBranch.LibraryBranch, 
		GETDATE() > DATEADD(day, 30, DateOut) as 'Due Back'

WHERE LibraryBranch.LibraryBranch = 'Walworth'



