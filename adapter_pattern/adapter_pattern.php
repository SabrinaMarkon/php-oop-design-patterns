<?php
/**
 * Simple example of PHP Adapter Design Pattern:
 * "An adapter allows us to convert (translate) one interface for use with another" (Jeffrey Way)
 * We are creating a class to allow two different interfaces to communicate.
 
 */

function autoloader($class) {
	require $class . ".php";
}
spl_autoload_register("autoloader");

// a person needs to Read a Book.
class Person {
 
 // by specifying BookInterface type, we decouple our code, so we aren't locked
 // to a specific concrete implementation. We just need SOME kind of IMPLMENTATION
 // for this contract:
 public function read(BookInterface $book) {
     $book->open();
     $book->turnPage();
 }
 
}

// Person should be able to read a paper book:
(new Person)->read(new Book);

//(new Person)->read(new Kindle); // DOES NOT WORK because its interface does not match the BookInterface given.
// We have to make an ADAPTER to also be able to 'plug in' the eReaderInterface as we can with the BookInterface.

// NOW Person should be able to read a Kindle without changing the class Person client-code at all, by
// wrapping it in an adapter:
(new Person)->read(new eReaderAdapter(new Kindle));

// Or another kind of ereader can also use the eReaderAdapter:
(new Person)->read(new eReaderAdapter(new Nook));
