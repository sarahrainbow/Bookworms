## USER STORY - SQL SCRIPTS ##


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

SELECT Title, Author.FirstName, Author.LastName, AgeRange.AgeRange
FROM Book
INNER JOIN Author
ON Author.AuthorID=Book.BookID
INNER JOIN AgeRange
ON AgeRange.AgeID=book.AgeID
Where AgeRange.AgeID='1';

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
WHERE Loan.LibraryCardID = '6'

#UserStory10  As a customer I want to see just my current loans so I know which books I have to return and when.

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




#NB - have written these without access to latest version of database so may need to update column/table names and rectify errors

#UserStory16 - select overdue books (have kept simple for now but could also add LCHolder details to it too)

SELECT B.BookID #Have written Book ID assuming we create a Copy table (BookID primary key, ISBN foreign key inbooks)
		,B.Title
		,concat (A.FirstName, ' ', A.SecondName) as 'Author' #may need changing depending on author table

From Author_Book as AB
INNER JOIN Book as B
	ON AB.ISBN=B.ISBN
INNER JOIN Author as B
	ON AB.AuthorID=A.AuthorID
INNER JOIN Loan as L
	ON L.BookID=B.BookID
	AND L.DateReturned IS NULL #we want it to join to currently on loan books only, not any historical loans
#Need to check what this join looks like if a book has multiple authors, do we still get distinct rows? tweak as appropriate


WHERE GETDATE() > DATEADD(day,30,DateOut) #this function adds 30 days to the date in the DateOut column
;



#UserStory17 - get contact details of a library card holder

SELECT LCH.FirstName
		,LCH.LastName
		,LCH.PhoneNumber
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
ON A.AddressRoad = R.RoadID

INNER JOIN City as C
ON A.City = C.CityID

INNER JOIN Postcode as P
ON A.Postcode = C.PostcodeID


WHERE LibraryCardID = '000000001' #can be changed as necessary
;



#UserStory18 - see what books are available in our branch
	#NB this assumes that we have a separate book copies table

SELECT  B.Title 
		,Author#may need to update based on db structure
		,B.Year
		,Count (DISTINCT `B.BookID`) as 'CopiesAvailable' #Distinct needed to prevent counting the samebook twice

FROM Book as B
RIGHT OUTER JOIN Loan as L
ON L.BookID=B.BookID


WHERE DateReturned IS NOT NULL #means only pulls back books that are not checked out
		AND BranchID=0 #can be changed

GROUP BY ISBN,Title,Author,Year,Branch #group statement necessary for count function to work

;



#UserStory19 - securely store details of staff on payroll
	#Haven't done this yet as we have not yet created a HR table (on could have list)


#User story - see what books are available across branches
		#NB this is very similar to user story 18

SELECT  B.Title 
		,Author#may need to update based on db structure
		,B.Year
		,Br.Branch
		,Count (DISTINCT `B.BookID`) as 'CopiesAvailable' #Distinct needed to prevent counting the samebook twice

FROM Book as B
RIGHT OUTER JOIN Loan as L
ON L.BookID=B.BookID

INNER JOIN Branch as Br
on B.BranchID=Br.BranchID


WHERE DateReturned IS NOT NULL #means only pulls back books that are not checked out
		AND BranchID='Sky'#can be changed

GROUP BY ISBN,Title,Author,Year #group statement necessary for count function to work

;


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



