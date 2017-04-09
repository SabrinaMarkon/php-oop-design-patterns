<?php
/**
 * Simple example of PHP Chain of Responsibility Design Pattern:
 * 
 * Allows us to chain any number of objects, where each has the option of either
 * handling a particular request, or deferring to the next object in the cycle.
 * The client can make a request without having to know how that request is going
 * to be handled.
 */
 
function autoloader($class) {
	require $class . ".php";
}
spl_autoload_register("autoloader");


// inherit from the base class so all classes adhere to the same contract:
 abstract class HomeChecker {
     
     protected $successor;
     
     public abstract function check(HomeStatus $home);
     
     public function setSuccessor(HomeChecker $successor) {
         $this->successor = $successor;
     }
     
     public function next(HomeStatus $home) {
         if ($this->successor) {
             $this->successor->check($home);
         }
     }
 }
 

class Locks extends HomeChecker {
  public function check(HomeStatus $home) {
      if (! $home->locked) {
          throw new Exception('The doors are not locked! Abort.');
      }
      // if the doors ARE locked, defer to the next object in the chain.
      $this->next($home);
  }  
}

class Lights extends HomeChecker {
  public function check(HomeStatus $home) {
      if (! $home->lightsOff) {
          throw new Exception('The lights were left on! Abort.');
      }
      // if the lights ARE off, defer to the next object in the chain.
      $this->next($home);
  }   
}

class Alarm extends HomeChecker {
  public function check(HomeStatus $home) {
      if (! $home->alarmOn) {
          throw new Exception('The alarm has not been set! Abort.');
      }
      // if the alarm IS set, defer to the next object in the chain.
      $this->next($home);
  } 
}

class HomeStatus {
    // example 1: the below three lines would result in no exceptions:
    /*
    public $alarmOn = true; // these could come from a form etc. (rather than being hardcoded)
    public $locked = true;
    public $lightsOff = true;
    */
    
    // example 2: the below three lines would result in an exception, since the lights were left on:
    public $alarmOn = true; // these could come from a form etc. (rather than being hardcoded)
    public $locked = true;
    public $lightsOff = false;
}


// Entry point:
$locks = new Locks;
$lights = new Lights;
$alarm = new Alarm;

// set the successor for each to hook the objects (links or rings) in the chain together.
$locks->setSuccessor($lights);
$lights->setSuccessor($alarm);

$status = new HomeStatus;
// to set the chain in motion, all we have to do is call the method (check) on the
// first object (link or ring) in the chain.
$locks->check($status);