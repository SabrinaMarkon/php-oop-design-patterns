<?php
/**
 * Book vs eReader example for Adapter Design Pattern. 
 */
  
 class Nook implements eReaderInterface {
     
     public function turnOn() {
         print('<br>turn the NOOK on');
     }
     
     public function pressNextButton() {
         print('<br>press the next button on the NOOK');
     }
     
 }