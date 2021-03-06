<?php

require_once('../1.single-responsibility/shared.php');

class AreaCalculator {
    
    protected $shapes;

    function __construct($shapes = array()) {
        $this->shapes = $shapes;
    }

    /**********************************
     * Here we define the way to calculate the area of each type of shape
     * and then compute the array_sum.
     * If we wanted the sum method to be able to sum the areas of more shapes,
     * we would have to add more if/else blocks
     * and that goes against the Open-closed principle.
     *********************************/
    public function sum() {
        foreach($this->shapes as $shape) {
            if(is_a($shape, 'Square')) {
                $area[] = pow($shape->length, 2);
            } else if(is_a($shape, 'Circle')) {
                $area[] = pi() * pow($shape->radius, 2);
            }
        }
    
        return array_sum($area);
    }
}

$shapes = array(
    new Circle(2),
    new Square(5),
    new Square(6)
);

$areas = new AreaCalculator($shapes);

echo $areas->sum() . "\n";