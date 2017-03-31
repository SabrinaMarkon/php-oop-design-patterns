<?php

class VeggieSub extends Sub {
    
    public function addPrimaryToppings()
    {
        print('Add some veggies<br>');
        return $this;
    }
    
}