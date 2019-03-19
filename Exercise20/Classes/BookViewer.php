<?php

namespace BookViewer{
    include 'Book.php';
    use Book\Book;
    
    class BookViewer{
        public function viewbook(book $book){
            echo "Book ID: ".$book->getbookID()."\n";
            echo "Book Title: ".$book->getTitle()."\n";
            echo "Book Author: ";
            foreach($book->getAuthors() as $author) {
                echo $author . ", ";
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
