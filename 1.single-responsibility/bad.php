<?php

require_once('./shared.php');

class AreaCalculator {
    
    /**********************************
     * AreaCalculator class has responsibility
     * to sum up the areas of all provided shapes.
     *********************************/
    
    protected $shapes;

    public function __construct($shapes = array()) {
        $this->shapes = $shapes;
    }

    public function sum() {
        // logic to sum the areas
    }

    public function output() {
        return implode('', array(
            "",
                "Sum of the areas of provided shapes: ",
                $this->sum(),
            ""
        ));
    }

    /**
     * The problem with the output method is that the AreaCalculator handles the logic to output the data.
     * Therefore, what if the user wanted to output the data as json or something else?
     * They will have to do like this:
     */
    
    public function toHTML() {}
    public function toJson() {}
    public function toXml() {}
    public function toCsv() {}
}
