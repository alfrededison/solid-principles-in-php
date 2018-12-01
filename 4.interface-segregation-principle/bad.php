<?php

/**********************************
* We know that we also have solid shapes,
* so since we would also want to calculate the volume of the shape,
* we can add another contract to the ShapeInterface
*********************************/
interface ShapeInterface {
    public function area();
    /**********************************
    * Any shape we create must implement the volume method,
    * but we know that squares are flat shapes and that they do not have volumes,
    * so this interface would force the Square class to implement a method that it has no use of.
    * Any shape we create must implement the volume method,
    * but we know that squares are flat shapes and that they do not have volumes,
    * so this interface would force the Square class to implement a method that it has no use of.
    *********************************/
    public function volume();
}