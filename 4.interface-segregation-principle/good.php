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

class Cuboid implements ShapeInterface, SolidShapeInterface {
    public function area() {
        // calculate the surface area of the cuboid
    }

    public function volume() {
        // calculate the volume of the cuboid
    }
}