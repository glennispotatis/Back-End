<?php
include_once("model/book.php");

class Model {
    public function getBookList(){
        return array(
            "Jungle" => new Book("Jungle", "R. Kipling", "A classic."),
            "Moonwalker" => new Book("Moonwalker", "J. Walker", ""),
            "PHP" => new Book("PHP", "Some Smart Guy", "")
        );
    }

    public function  getBook($title){
        $allBooks = $this->getBookList();
        return $allBooks[$title];
    }
}