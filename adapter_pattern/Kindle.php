<?php
/**
 * Book vs eReader example for Adapter Design Pattern. 
 */
  
 class Kindle implements eReaderInterface {
     
     public function turnOn() {
         print('<br>turn the KINDLE on');
     }
     
     public function pressNextButton() {
         print('<br>press the next button on the KINDLE');
     }
     
 }