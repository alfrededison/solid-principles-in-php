<?php

interface ShapeInterface {
    public function area();
}

/**********************************
* We should create another interface called SolidShapeInterface
* that has the volume contract and solid shapes like cubes e.t.c can implement this interface
*********************************/
interface SolidShapeInterface {
    public function volume();
}

class Circle implements ShapeInterface {
    public $radius;

    function __construct($radius) {
        $this->radius = $radius;
    }

    public function area() {
        return pi() * pow($this->radius, 2);
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
}

class Cube implements ShapeInterface, SolidShapeInterface {
    
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
           /**********************************
            * We use SolidShapeInterface here instead
            *********************************/
            if(is_a($shape, 'SolidShapeInterface')) {
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