<?php
namespace BookController{
    include 'Book.php';
    use Book\Book;
    
    class BookController{
        public $books=[]; //Declares book type i.e. like Pen in notes
        
        public function addbook(Book $book){ //Book is considered a type similar to string which is a defined type
            array_push($this->books, $book); //Arraypush is premade function which adds variables to the end of established array. Argument $books is from the array function defined which needs to be added into, $book is the variable which is the new book tht will be defined 
        //$this->books, refers to the object instances (instantiation), so that it considers it as an attribute to relate to the book, $book is the variable
        }
        
        public function countCopies($ISBN){ 
           $copycount = 0;
            foreach ($this->books as $book){
                if ($book->getISBN() === $ISBN){
                    $copycount++;
                }
            }
            echo $copycount;
        }   
    }
    
    $mybookcontroller=new BookController();
    $mybookcontroller->addbook(new Book('The Shining', ['Stephen King'], 3894234, 2034, 'horror'));
    var_dump($mybookcontroller->books);
    
    $mybookcontroller->countCopies(3894234);
 
    
    
}
    
    
    

