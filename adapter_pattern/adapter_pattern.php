<?php
/**
 * Simple example of PHP Adapter Design Pattern:
 * "An adapter allows us to convert (translate) one interface for use with another" (Jeffrey Way)
 * -  
 */

require 'Book.php'; 

use adapter_pattern\Book;

// a person needs to Read a Book.
class Person {
 
 public function read($book) {
     $book->open();
     $book->turnPage();
 }
 
}

(new Person)->read(new Book);