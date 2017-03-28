<?php
/**
 * Book example for Adapter Design Pattern. 
 */
 
namespace adapter_pattern;
  
 class Book {
     
     public function open() {
         var_dump('opening the PAPER book');
     }
     
     public function turnPage() {
         var_dump('turning the page of the PAPER book');
     }
     
 }