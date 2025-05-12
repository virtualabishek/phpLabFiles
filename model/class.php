<?php

class Car {
    public $brand;
    public $color;
    
    public function __construct($brand, $color) {
        $this->brand = $brand;
        $this->color = $color;
    }
    
    public function display() {
        echo "Brand is: " . $this->brand;
        echo "Color is: " . $this->color;
    }
}

$myCar = new Car("Tata", "Red");
$myCar->display();

?>