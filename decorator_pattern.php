<?php
/**
 * Simple example of PHP Decorator Pattern: 
 * - Automotive Service Example but might work for shopping carts or other
 * systems where items are randomly added to a collection that has a base item
 * always included.
 */

interface CarService {
    
    public function getCost();
    
    public function getDescription();
    
}

// always have the BasicInspection for every order:
class BasicInspection implements CarService {
    
    public function getCost() {
        return 25;
    }
    
    public function getDescription() {
        return 'Basic inspection';
    }
    
}

// add DECORATORS to stack on other services:

class OilChange implements CarService {
    
    // Inject an instance of CarService to the constructor to make sure it is added to the BasicInspection cost:
    public function __construct(CarService $carService) {
        $this->carService = $carService;
    }
    
    public function getCost() {
        // $this->carService is the "new BasicInspection()" argument provided  (see first echo command) so we getCost() for that to add on.
        return 29 + $this->carService->getCost();
    }
    
    public function getDescription() {
        return $this->carService->getDescription() . ', and oil change';
    }    
    
}

// another DECORATOR:
class TireRotation implements CarService {
    
    // Inject an instance of CarService to the constructor to make sure it is added to the BasicInspection cost:
    public function __construct(CarService $carService) {
        $this->carService = $carService;
    }
    
    public function getCost() {
        // $this->carService is the "new OilChange(new BasicInspection()))" argument provided  (see second echo command) so we getCost() for that to add on.
        return 16 + $this->carService->getCost();
    }

    public function getDescription() {
        return $this->carService->getDescription() . ', and a tire rotation';
    }      
    
}

// new BasicInspection()) is the $carService argument so a BasicInspection is always included in the price.
echo (new OilChange(new BasicInspection()))->getCost();

// Add another decorator using the one above now as an argument so TireRotation is just added onto it:
echo '<br />';
echo (new TireRotation(new OilChange(new BasicInspection())))->getCost();

// Alternatively, we can ONLY get a TireRotation WITHOUT an OilChange:
echo '<br />';
echo (new TireRotation(new BasicInspection()))->getCost();

// So to make it nice, and use the getDescription() methods as well as getCost()
// Simply set the ordered service variable to what we want for the order:
echo '<br /><br />';
$ordered_service = new TireRotation(new OilChange(new BasicInspection()));

// Then:

echo $ordered_service->getDescription() . ': ' . $ordered_service->getCost();


/*
EXTRA NOTES:
Another way might be with the Composite Pattern as suggested by Kalssin on Laracasts: 
A VehicleServiceCollection class with the method:

public function addServiceComponent(Chargeable $component)
{
$this->components[] = $component;
}

Then each component will implement the Chargeable interface which includes the getCost()
method and you can pass each of the service components to the VehicleServiceCollection instance.
*/