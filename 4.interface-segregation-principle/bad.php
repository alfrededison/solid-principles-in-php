<?php

/**********************************
* We know that we also have solid shapes,
* so since we would also want to calculate the volume of the shape,
* we can add another contract to the ShapeInterface
*********************************/
interface ShapeInterface {
    public function area();
    /**********************************
    * Any shape we create must implement the volume method,
    * but we know that squares are flat shapes and that they do not have volumes,
    * so this interface would force the Square class to implement a method that it has no use of.
    *********************************/
    public function volume();
}

class Cube implements ShapeInterface {
    
    public $length;

    function __construct($length) {
        $this->length = $length;
    }
    
    public function area() {
        return 6 * pow($this->length, 2);
    }

    public function volume() {
        return pow($this->length, 3);
    }
}

/**********************************
* Any shape we create must implement the volume method,
* but we know that squares are flat shapes and that they do not have volumes,
* so this interface would force the Square class to implement a method that it has no use of.
*********************************/
class Circle implements ShapeInterface {
    public $radius;

    function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * pow($this->radius, 2);
    }
    
    public function volume() {
        echo 'do nothing';
    }
}

class Square implements ShapeInterface {
    public $length;

    function __construct($length) {
        $this->length = $length;
    }

    public function area() {
        return pow($this->length, 2);
    }
    
    public function volume() {
        echo 'do nothing';
    }
}

//we have calculators here
class AreaCalculator {
    
    protected $shapes;

    function __construct($shapes = array()) {
        $this->shapes = $shapes;
    }

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
class VolumeCalculator extends AreaCalculator {
    
    public function sum() {
       foreach($this->shapes as $shape) {
            if(is_a($shape, 'ShapeInterface')) {
                $area[] = $shape->volume();
                continue;
            }
    
            throw new VolumeCalculatorInvalidShapeException;
        }
    
        return array_sum($area);
    }
}

$shapes = array(
    new Circle(2),
    new Square(5),
    new Square(6)
);

$solidShapes = array(
    new Cube(3),
    new Cube(4),
);

$areas = new AreaCalculator($shapes);
$volumes = new VolumeCalculator($solidShapes);

echo $areas->sum() . "\n";
echo $volumes->sum() . "\n";