<?php
namespace Controllers{
    
    #For Cynthujaa  
   #include '/Users/getintotech/Applications/XAMPP/xamppfiles/htdocs/Exercise20/Model/Book.php';
    
   #For Windows
   require_once 'C:\xampp\htdocs\Exercise20\Models\Book.php';
   use Models\Book;
    
    class BookController{
        public $books=[]; //Declares book type i.e. like Pen in notes
        
        public function getBook(){
            return $this->books;
        }
        
        public function addbook(Book $book){ //Book is considered a type similar to string which is a defined type
            array_push($this->books, $book);//Arraypush is premade function which adds variables to the end of established array. Argument $books is from the array function defined which needs to be added into, $book is the variable which is the new book tht will be defined 
            //$this->books, refers to the object instances (instantiation), so that it considers it as an attribute to relate to the book, $book is the variable
        }
        
        public function deleteBook(Book $deletebook){
            foreach($this->getBook() as $key => $books){ //use of associative array and therefore can use keys help identify book to be removed
                if($books->getBookID() === $deletebook -> getBookID()){ //if BookID matches the deleted book ID then delete book
                    unset($this->books[$key]);
                    echo "Book ID ". $deletebook->getBookID(). " has been removed from library ";
                }
            }
        }
        
        public function countCopies($ISBN){ 
           $copycount = 0; //Starting value of 0 
            foreach ($this->books as $book){ //iterates through library and if bookISBN matches with search then counts the number of instances
                if ($book->getISBN() === $ISBN){
                    $copycount++;
                }
            }
            echo $copycount;
        }
    }		
  
//    $testbook=new Book(56776678, 'The Shining', ['Stephen King'], 3894234, 2034, 'horror');	//assign new book as a variable
//    
//    $mybook1=new BookController(); //Need to call class
//    
//    $mybook1->addbook($testbook); //add assigned variable to addbook method 
//    var_dump($mybook1->books); 
//    
//    $mybook1->countCopies(3894234); //Count the instances of books with this ISBN
//    
//    $mybook1->deletebook($testbook); //deletes book
    

}
