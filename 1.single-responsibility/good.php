<?php

require_once('./shared.php');

class AreaCalculator {
    
    /**********************************
     * AreaCalculator class should only sum the areas of provided shapes,
     * it should not care whatever the user wants the ouput is
     *********************************/
    
    protected $shapes;

    public function __construct($shapes = array()) {
        $this->shapes = $shapes;
    }

    public function sum() {
        // logic to sum the areas
        // temporarily set a hard-coded number here
        // will improve in next principle
        return 10;
    }
}

class SumCalculatorOutputter {

    /**********************************
     * SumCalculatorOutputter class handles how the sum areas of all provided shapes are displayed.
     *********************************/
    
    protected $area;

    function __construct($area) {
        $this->area = $area;
    }
    
    public function toHTML() {
        return "<div>Sum of the areas of provided shapes: ". $this->area->sum() . "</div>";
    }
    public function toJson() {
        $data = array(
            'sum' => $this->area->sum()
        );

        return json_encode($data);
    }
    public function toXml() {
        return "<data><sum>". $this->area->sum() . "</sum></data>";
    }
}

$shapes = array(
    new Circle(2),
    new Square(5),
    new Square(6)
);

$areas = new AreaCalculator($shapes);
$output = new SumCalculatorOutputter($areas);

echo $output->toHTML() . "\n";
echo $output->toJson() . "\n";
echo $output->toXml() . "\n";
