<?php

require_once('./shared.php');

/**********************************
 * We have a VolumeCalculator class that extends the AreaCalculator class
 *********************************/
class VolumeCalculator extends AreaCalulator {
    public function construct($shapes = array()) {
        parent::construct($shapes);
    }

    public function sum() {
        // logic to calculate the volumes and then return an array of output
        return array($summedData);
    }
}

// If we tried to run an example like this:
$areas = new AreaCalculator($shapes);
$volumes = new VolumeCalculator($solidShapes);

$output = new SumCalculatorOutputter($areas);
$output2 = new SumCalculatorOutputter($volumes);

// this works well
$output->toHTML();

// but we will get an E_NOTICE error informing us of an array to string conversion
$output2->toHTML();
