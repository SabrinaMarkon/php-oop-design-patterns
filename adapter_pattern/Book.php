<?php
/**
 * Book vs eReader example for Adapter Design Pattern. 
 */
 
 class Book implements BookInterface {
     
     public function open() {
         print('<br>opening the PAPER book');
     }
     
     public function turnPage() {
         print('<br>turning the page of the PAPER book');
     }
     
 }