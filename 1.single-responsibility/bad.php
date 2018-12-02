<?php

require_once('./shared.php');

class AreaCalculator {
    
    /**********************************
     * AreaCalculator class has responsibility
     * to sum up the areas of all provided shapes.
     *********************************/
    
    protected $shapes;

    function __construct($shapes = array()) {
        $this->shapes = $shapes;
    }

    public function sum() {
        // logic to sum the areas
        // temporarily set a hard-coded number here
        // will improve in next principle
        return 10;
    }

    public function output() {
        return implode('', array(
            "Sum of the areas of provided shapes: ",
            $this->sum(),
        ));
    }

    /**
     * The problem with the output method is that the AreaCalculator handles the logic to output the data.
     * Therefore, what if the user wanted to output the data as json or something else?
     * They will have to do like this:
     */
    
    public function toHTML() {
        return "<div>". $this->output() . "</div>";
    }
    public function toJson() {
        $data = array(
            'sum' => $this->sum()
        );

        return json_encode($data);
    }
    public function toXml() {
        return "<data><sum>". $this->sum() . "</sum></data>";
    }
}

$shapes = array(
    new Circle(2),
    new Square(5),
    new Square(6)
);

$areas = new AreaCalculator($shapes);

echo $areas->output() . "\n";
echo $areas->toHTML() . "\n";
echo $areas->toJson() . "\n";
echo $areas->toXml() . "\n";