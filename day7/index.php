<?php


class Fruit {
    // Properties
    public $name;
    public $color;
    // Methods
    function set_name($name) {
        $this->name = $name;
    }
    function get_name() {
      return  $this->name;
    }
    function set_color($color) {
        $this->color = $color;
    }
    function get_color() {
        return $this->color;
    }
    // $this keyword represents to the current objects and only available inside methods.
    // In a class variables are called properties and functions are called methods
}
$apple = new Fruit();
$banana = new Fruit();

$apple->set_name("Apple");
$apple->set_color("Red");
$banana->set_name("Banana");
$banana->set_color("Yellow");


echo $apple->get_name();
echo "<br>";
echo $banana->get_name();
echo "<br>";
echo $apple->get_color();
echo "<br>";
echo $banana->get_color();
echo "<br>";
// Two ways of changing value of name properties. One is above and
// one is below
class Fruits {
    public $name;
}
$orange = new Fruits();
$orange->name = "Orange";

echo $orange->name;
echo "<br>";
// Use Instanceof keyword to check if object is assigned to a specific class.
var_dump($apple instanceof Fruit);
echo "<br>";
// Constructor
// It will call automatically methods or functio when object is created.

class Family {
    public $name;
    public $member;
    function __construct($name, $member) {
        $this->name = $name;
        $this->member = $member;
    }
    function get_Name() {
        return $this->name;
    }
    function get_Size() {
        return $this->member;
    }
}

$myFamily = new Family("Abi", 3);
echo $myFamily->get_Name();
echo "<br>";

echo $myFamily->get_Size();
echo "<br>";
// Distructure.
// Calls the automatically AT THE END


class Books {
    public $name;
    public $author;
    function __construct($name, $author) {
        $this->name = $name;
        $this->author = $author;
    }
    function __destruct()
    {
        echo "Name of Book is {$this->name} and the author is {$this->author}";
    }
}

$zen = new Books("ZEN", 'UNKNOWN');
echo "Hey";
echo "<br>";




?>