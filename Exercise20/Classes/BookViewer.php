<?php

namespace BookViewer{
    include 'Book.php';
    use Book\Book;
    include 'BookController.php';
    use BookController\BookController;
    
    class BookViewer{
        public function viewbook(book $book){
            echo "Book Title: ".$book->getTitle().'\n';
            echo "Book Author: ".$book->getAuthor().'\n';
            echo "Book Genre: ".$book->getGenre().'\n';
            echo "Book Publish Date: ".$book->getPublishDate().'\n';
            echo "Book ISBN: ".$book->getISBN().'\n';
        }
    }
    
    $mybook=new Book('Harry Potter', ['J.K. Rowling','Stephen King'], 283429858432,  1996, 'Children');
    $myBookViewer = new ViewBook();
    $myBookViewer->ViewBook($mybook);
    
    
}