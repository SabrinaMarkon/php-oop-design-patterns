<?php
/**
 * Simple example of PHP Adapter Design Pattern:
 * "An adapter allows us to convert (translate) one interface for use with another" (Jeffrey Way)
 * We are creating a class to allow two different interfaces to communicate.
 */

// the adapter should implement the interface that already works to adapt the other interfaces
class eReaderAdapter implements BookInterface {
    
    // we want to translate these methods over to what we use in the other version (the eReaderInterface)
    private $ereader;
    
    public function __construct(eReaderInterface $ereader) {
        $this->ereader = $ereader;    
    }
    
    public function open() {
        return $this->ereader->turnOn();
    }
    
    public function turnPage() {
        return $this->ereader->pressNextButton();
    }
    
}