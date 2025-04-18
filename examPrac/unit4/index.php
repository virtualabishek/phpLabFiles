<?php 

echo "is this the end?";

// Create a class
class Car {
    public $brand = "Tata";
    public function drive() {
        echo "i am driving {$this->brand}";
    }
}

$mycar = new Car();

echo $mycar->brand;
echo "<br>";

echo $mycar->drive();

echo "<br>";
// creating objects

class myDetail {
    public $name;
    public $roll;
    public function __construct($name, $roll) {
        $this->name = $name;
        $this->roll = $roll;
    }
    
    public function getDetails() {
        echo "Name: {$this->name} & Roll: {$this->roll}";
    }
}


$abi = new myDetail("Abi", 1);
echo $abi->getDetails();

echo "<br>";

// Anonymous class

$myAno = new Class {
    public $name = "abi";
    public function sayHi() {
        echo "Hi {$this->name}";
    }
};

echo $myAno->name;

echo "<br>";
echo $myAno->sayHi();



echo "<br>";
class Animal {
    public $species = "Dog";
    public function makeSound() {
        return "Woof!";
    }
}

$dog = new Animal();

// Examine the object
echo get_class($dog); // Output: Animal
print_r(get_class_methods('Animal')); // Output: Array([0] => makeSound)
print_r(get_class_vars('Animal')); // Output: Array([species] => Dog)
var_dump($dog instanceof Animal); // Output: bool(true)
var_dump(class_exists('Animal')); // Output: bool(true)
echo "<br>";
echo "<br>";


?>

