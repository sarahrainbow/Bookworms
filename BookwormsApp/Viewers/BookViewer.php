<?php

namespace Viewers{
   #For Cynthuja  
   #include '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/Exercise20/Model/Book.php';
    
   #For Windows
   require_once 'C:\xampp\htdocs\Exercise20\Models\Book.php';
   use Models\Book;
    
    class BookViewer{
        public function viewbook(book $book){
            echo "Book ID: ".$book->getbookID()."\n";
            echo "Book Title: ".$book->getTitle()."\n";
            echo "Book Author: ";
            $authorList='';
            foreach($book->getAuthors() as $author) {
                if ($authorList === ""){//ie if this is the first match then start off the list, if hint has now changed to something other than null (started being populated with names, then add more onto the end with a comma)
                $authorList=$author;
                      }
                else {
                    $authorList .= ", $author";
                    echo $authorList."\n";
                }
                #echo $author . ", ";
            }
            
            echo "Book Genre: ".$book->getGenre()."\n";
            echo "Book Publish Date: ".$book->getPublishDate()."\n";
            echo "Book ISBN: ".$book->getISBN()."\n";
        }
    }
    
$mybook=new Book(9, 'Harry Potter', ['J.K. Rowling','Stephen King'], 28342432, 1996, 'Children'); //BookID cannot start with 0 as PHP recognises numeric literal
$myBookViewer = new BookViewer();
$myBookViewer->ViewBook($mybook);    
}
