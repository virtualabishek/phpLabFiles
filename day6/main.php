<?php 

class Circle {
    public $r;

    public function __construct($r) {
        $this->r = $r;
    }

    public function getArea() {
        return 3.14 * $this->r * $this->r;
    }
}

$c = new Circle(20);
echo $c->getArea();



// Polymorphism (Same name but different work)

class Animal {
    public function makeSound() {
        return "Some Sound";
    }
}


class Dog extends Animal {
    public function makeSound() {
        return "Bark!";
    }
}

class Cat extends Animal {
    public function makeSound() {
        return "Meow!";
    }
}
$dog = new Dog();
$cat = new Cat();

$dog->makeSound(); // Bark
$cat->makeSound(); // Meow



/*

Interface (Rules or agrement)

- fixed methods, but not implement



*/
interface Animal {
    public function makeSound();
    }


class Dog extends Animal {
    // makeSound(); 
    //should be define here.
}

// php has no multiple inheritence
//  ALternate or this is Trairts


trait EngineTrait {
    public function startEngine() {
        return "Engine Startech!";
    }
}

class Car {
    use EngineTrait;
}

$myCar = new Car();

echo $myCar -> startEngine();
// Output Engine Started!

// Write a class connectDB with given interface.

/* 
interface connectDB {
public function connect();
public function disconnect();
}
*/
class ConnectDB {
    private $server = "localhost";
    private $user = "root";
    private $password = "imp2083";
    private $database = "testDB";
    public $connec;
    public function __construct() {
        $this->connect();
    }
//     private function connect() {
//     //     $connect = new mysqli mysqli($server, $user, $password, $database) ;
//     //     if ($connect) {
//     //         die "Error in dbCOnnect";
//     //     }
//     // }
// }

// close a connection 
/* 
public function disconenct() {
$conn->Close();
$conn->null;}
*/

?>
