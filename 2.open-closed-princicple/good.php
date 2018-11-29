<?php

/**********************************
 * A way we can make the sum method better is to
 * let each shape class calculate the area itself.
 *
 * Coding to an interface is an integral part of S.O.L.I.D
 * We can make sure the object passed into the AreaCalculator
 * is actually a shape and has area method
 *********************************/

interface ShapeInterface {
    public function area();
}

class Circle implements ShapeInterface {
    public $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * pow($this->radius, 2);
    }
}

class Square implements ShapeInterface {
    public $length;

    public function __construct($length) {
        $this->length = $length;
    }

    public function area() {
        return pow($this->length, 2);
    }
}

class AreaCalculator {
    
    protected $shapes;

    public function __construct($shapes = array()) {
        $this->shapes = $shapes;
    }

    /**********************************
     * In our AreaCalculator sum method we can check if
     * the shapes provided are actually instances of the ShapeInterface,
     * otherwise we throw an exception
     *********************************/
    public function sum() {
        foreach($this->shapes as $shape) {
            if(is_a($shape, 'ShapeInterface')) {
                $area[] = $shape->area();
                continue;
            }
    
            throw new AreaCalculatorInvalidShapeException;
        }
    
        return array_sum($area);
    }
}
