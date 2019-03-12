# Sprint 2 review (focus on the functionality of the application)

## New features added

- Normalised address tables further, merged staff and library card holders, normalised authors and book copy.
- User permissions added for library user, database admin, library staff, and library manager.
- Stored procedures added for finding a book by title, but author, finding book availability, and changing password.
- An abundance of scripts generated related to user stories.


## Summary of feedback from Victoria

- Consider adding a BookID in addition to ISBN number as the ISBN number is rather large, improve performance
- Add wildcards to Stored Procedures (search by book title, author)
- Create stored procedures for multiple update statements
- Consider adding permissions to stored procedures


## Any comments from team

- (FE) I'm not sure that we need an IsAvailable column in the copy table now that we have a stored procedure that can calculate availability.
- (CS) Need to try more complicated scripts to develop skills and thinking


