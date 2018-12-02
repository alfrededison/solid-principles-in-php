<?php

interface ShapeInterface {
    public function area();
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

class AreaCalculator {
    
    protected $shapes;

    function __construct($shapes = array()) {
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

class SumCalculatorOutputter {
    protected $calculator;

    function __construct(AreaCalculator $calculator) {
        $this->calculator = $calculator;
    }

    public function toJSON() {
        $data = array(
            'sum' => $this->calculator->sum()
        );

        return json_encode($data);
    }

    public function toHTML() {
        return implode('', array(
            '<div>',
            'Sum of the areas of provided shapes: ',
            $this->calculator->sum(),
            '</div>'
        ));
    }
}
