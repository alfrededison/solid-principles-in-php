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
        // logic to calculate the volumes and then return summed data as a float, double or integer
        return $summedData;
    }
}
