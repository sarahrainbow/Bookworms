## USER STORY - SQL SCRIPTS ##

#UserStory6 As a customer I want to search for books by title so that I can quickly find what I am looking for


SELECT concat(Author.FirstName,' ', Author.LastName) as 'Author', Book.*
FROM Book_Author
INNER JOIN Book
	ON Book_Author.BookID=Book.BookID
INNER JOIN Author
	ON Book_Author.AuthorID = Author.AuthorID
Where Book.Title= 'The Subtle Art of Not Giving a F*ck';



#UserStory7  As a customer I want to search for books by author so that I can see everything they have published


SELECT concat(Author.FirstName,' ', Author.LastName) as 'Author', Book.*
FROM Book_Author
INNER JOIN Book
	ON Book_Author.BookID=Book.BookID
INNER JOIN Author
	ON Book_Author.AuthorID = Author.AuthorID
Where Author.FirstName = 'Gary' AND Author.LastName = 'Chapman';

#UserStory8 As a customer I want to search for books by ISBN so that I can quickly find what I am looking for

SELECT concat(Author.FirstName,' ', Author.LastName) as 'Author', Book.*
FROM Book_Author
INNER JOIN Book
	ON Book_Author.BookID=Book.BookID
INNER JOIN Author
	ON Book_Author.AuthorID = Author.AuthorID
Where Book.BookISBN = '978-0062457714';


#UserStory9  As a customer I want to have a 'my account' area So that I can see personal and borrowing information

-- Book needs BookLoanHistory field, LibraryCardHolder also needs CustomerLoanHistory



#UserStory10  As a customer I want to delete reserved books from my account so that I can change my mind

-- perhaps lets 'shelve' this idea for now, seems a non-vital step at this point to have a reserve book option… 


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