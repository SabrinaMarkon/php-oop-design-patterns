<?php

class TurkeySub extends Sub {
    
    public function addPrimaryToppings()
    {
        print('Add some turkey<br>');
        return $this;
    }
    
}