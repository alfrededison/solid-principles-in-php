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
    }
}

class SumCalculatorOutputter {

    /**********************************
     * SumCalculatorOutputter class handles how the sum areas of all provided shapes are displayed.
     *********************************/
    
    protected $area;

    public function __construct($area) {
        $this->area = $area;
    }
    
    public function toHTML() {}
    public function toJson() {}
    public function toXml() {}
    public function toCsv() {}
}