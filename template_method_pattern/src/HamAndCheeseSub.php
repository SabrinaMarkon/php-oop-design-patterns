<?php

class HamAndCheeseSub extends Sub {
    
    public function addPrimaryToppings()
    {
        print('Add some ham and cheese slices<br>');
        return $this;
    }
    
}