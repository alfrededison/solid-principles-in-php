<?php

require_once('./shared.php');

/**********************************
 * We have a VolumeCalculator class that extends the AreaCalculator class
 *********************************/
class VolumeCalculator extends AreaCalculator {
    
    public function sum() {
        // logic to calculate the volumes and then return summed data as a float, double or integer
        // temporarily use area sum
        // will calculate real volume in next principle
        $summedData = parent::sum();
        return $summedData;
    }
}

$shapes = array(
    new Circle(2),
    new Square(5),
    new Square(6)
);

// If we tried to run an example like this:
$areas = new AreaCalculator($shapes);
$volumes = new VolumeCalculator($shapes); // temporarily use 2D shapes

$output = new SumCalculatorOutputter($areas);
$output2 = new SumCalculatorOutputter($volumes);

// turn on error reporting to see NOTICE
error_reporting(E_ALL);

// these work well
echo $output->toHTML() . "\n";

echo $output2->toHTML() . "\n";
