<?php

namespace Model{

    class Book {
        private $bookID;
        private $title; 
        private $authors=[];
        private $ISBN;
        private $publishdate;
        private $genre;
        private $isAvailable;
        
        public function __construct(int $bookID, string $title, array $authors, int $ISBN, int $publishdate, string $genre, bool $isAvailable=true){
            $this->bookID = $bookID;
            $this->title = $title;
            $this->authors = $authors;
            $this->ISBN = $ISBN;
            $this->publishdate = $publishdate;
            $this->genre = $genre;
            $this->isAvailable=$isAvailable;
        }
        
        public function getBookID(){
            return $this->bookID;
        }
        
        public function setBookID($newBookID){
            $this->bookID=$newBookID;
        }        
    
        public function getTitle(){
            return $this->title;
        }
        
        public function setTitle($newTitle){
            $this->title=$newTitle;
        }
        
        public function getAuthors(){
            return $this->authors;
        }
        
        public function setAuthors($newAuthors){
            $this->authors=$newAuthors;
        }
        
        public function getISBN(){
            return $this->ISBN;
        }
        
        public function setISBN($newISBN){
            $this->ISBN=$newISBN;
        }
        
        public function getGenre(){
            return $this->genre;
        }
        
        public function setGenre($newGenre){
            $this->genre=$newGenre;
        }
        
        public function getPublishDate(){
            return $this->publishdate;
        }
        
        public function setPublishDate($newPublishDate){
            $this->publishdate=$newPublishDate;
        }
        
        public function getIsAvailable() {
            return $this->isAvailable;
        }
        
        public function setIsAvailable($isAvailable) {
            $this->isAvailable = $isAvailable;
        }
    }
    
//    $mybook=new Book('Harry Potter', ['J.K. Rowling','Stephen King'], 283429858432,  1996, 'Children');
//    echo $mybook->getTitle();
//    
//    $mybook->setTitle('James Bond');
//    echo $mybook->getTitle();
//    
//    var_dump($mybook);
}

