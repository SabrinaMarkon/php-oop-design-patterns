<?php
/**
 * Put the code that would be duplicated to an ABSTRACT CLASS, then
 * just put specific differences in subclasses.
 * Include an ABSTRACT METHOD to make sure the subclasses are REQUIRED
 * to include their specific detail unique to each of them.
 */
 
abstract class Sub {
    
    public function make()
    {
        return $this
        ->layBread()
        ->addLettuce()
        ->addPrimaryToppings()
        ->addSauces();
    }
    
    protected function layBread()
    {
       print ('Laying down the bread<br>');
       return $this;
    }
    
    protected function addLettuce()
    {
       print ('Add some lettuce<br>');
       return $this;  
    }
    
    protected function addSauces()
    {
       print ('Add oil and vinegar<br>');
       return $this;  
    }
    
    // ABSTRACT METHOD means to REQUIRE subclasses to offer this method.
    // If this is not here, it means you are just trusting all subclasses
    // to include their unique details, which is easier to break.
    protected abstract function addPrimaryToppings();
    
}