# PHP Objects: Unit 4 Notes for BIT 5th Semester (WT-2)

This document provides detailed notes on **Unit 4: Objects (6 Hrs.)** for the Web Technology 2 (WT-2) syllabus. It covers Objects, Creating Objects, Accessing Properties and Methods, Declaring Classes, Anonymous Classes, and Examining Classes and Objects in PHP, with definitions, explanations, and examples.

## 1. Objects in PHP

### Definition

An **object** in PHP is an instance of a class, which is a blueprint defining properties (data) and methods (functions) that the object can have. Objects allow for **Object-Oriented Programming (OOP)**, enabling modular, reusable, and maintainable code.

### Why Use Objects?

- Encapsulation: Bundles data and methods together.
- Inheritance: Allows classes to inherit properties and methods from others.
- Polymorphism: Enables objects to be treated as instances of their parent class.

### Example

```php
// Define a class
class Car {
    public $brand = "Toyota";
    public function drive() {
        return "The {$this->brand} is driving!";
    }
}

// Create an object
$myCar = new Car();
echo $myCar->brand; // Output: Toyota
echo $myCar->drive(); // Output: The Toyota is driving!
```

## 2. Creating Objects

### Definition

Creating an object involves instantiating a class using the `new` keyword. This allocates memory for the object and calls the class's constructor (if defined) to initialize it.

### Steps to Create an Object

1. Define a class with properties and methods.
2. Use the `new` keyword followed by the class name to create an object.
3. Optionally, pass arguments to the constructor.

### Example

```php
class Student {
    public $name;
    public $rollNo;

    // Constructor
    public function __construct($name, $rollNo) {
        $this->name = $name;
        $this->rollNo = $rollNo;
    }

    public function getDetails() {
        return "Name: {$this->name}, Roll No: {$this->rollNo}";
    }
}

// Creating an object
$student1 = new Student("Alice", 101);
echo $student1->getDetails(); // Output: Name: Alice, Roll No: 101
```

## 3. Accessing Properties and Methods

### Definition

- **Properties**: Variables defined within a class, accessed using the `->` operator on an object.
- **Methods**: Functions defined within a class, also accessed using the `->` operator.
- The `$this` keyword refers to the current object within the class.

### Access Modifiers

- `public`: Accessible from anywhere.
- `protected`: Accessible within the class and its subclasses.
- `private`: Accessible only within the class.

### Example

```php
class Book {
    public $title = "PHP Basics";
    private $price = 500;

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
}

$book = new Book();
echo $book->title; // Output: PHP Basics
echo $book->getPrice(); // Output: 500
$ book->setPrice(600);
echo $book->getPrice(); // Output: 600
// echo $book->price; // Error: Cannot access private property
```

## 4. Declaring Class

### Definition

A **class** is a template for creating objects, defining their properties and methods. It is declared using the `class` keyword, followed by the class name and a block containing properties and methods.

### Syntax

```php
class ClassName {
    // Properties
    public $propertyName;

    // Methods
    public function methodName() {
        // Code
    }
}
```

### Example

```php
class Laptop {
    public $brand;
    public $ram;

    public function __construct($brand, $ram) {
        $this->brand = $brand;
        $this->ram = $ram;
    }

    public function showSpecs() {
        return "Brand: {$this->brand}, RAM: {$this->ram}GB";
    }
}

$laptop = new Laptop("Dell", 8);
echo $laptop->showSpecs(); // Output: Brand: Dell, RAM: 8GB
```

## 5. Anonymous Class

### Definition

An **anonymous class** is a class without a name, created and instantiated in a single expression. It is useful for one-off objects or when a class is needed temporarily, introduced in PHP 7.

### Use Cases

- Creating quick mock objects for testing.
- Implementing interfaces or extending classes on the fly.

### Example

```php
// Creating an anonymous class
$person = new class {
    public $name = "John";

    public function sayHello() {
        return "Hello, {$this->name}!";
    }
};

echo $person->name; // Output: John
echo $person->sayHello(); // Output: Hello, John!
```

### Anonymous Class Implementing an Interface

```php
interface Greeter {
    public function greet();
}

$greeter = new class implements Greeter {
    public function greet() {
        return "Hi there!";
    }
};

echo $greeter->greet(); // Output: Hi there!
```

## 6. Examining Class and Object

### Definition

PHP provides functions and methods to inspect classes and objects, such as their properties, methods, and relationships. This is useful for debugging or dynamic code execution.

### Common Functions for Examination

- `get_class($object)`: Returns the class name of an object.
- `get_class_methods($class)`: Returns an array of method names.
- `get_class_vars($class)`: Returns an array of properties.
- `instanceof`: Checks if an object is an instance of a class or interface.
- `class_exists($class)`: Checks if a class exists.

### Example

```php
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
```

## Key Points for Board Exam

- **Objects** are instances of classes, created using the `new` keyword.
- **Properties and Methods** are accessed using the `->` operator, with visibility controlled by access modifiers (`public`, `private`, `protected`).
- **Classes** are declared using the `class` keyword and can include constructors for initialization.
- **Anonymous Classes** are nameless classes for one-time use, useful for quick implementations.
- **Examination Functions** like `get_class()`, `get_class_methods()`, and `instanceof` help inspect classes and objects.

## Tips for Study

- Practice writing classes with properties, methods, and constructors.
- Experiment with anonymous classes to understand their flexibility.
- Use PHP’s built-in functions to inspect objects and classes in a script.
- Review access modifiers and their impact on encapsulation.

---

**Save this README.md** to your study folder for quick reference. You can also use tools like Visual Studio Code or GitHub to view and edit Markdown files. For visualization, paste the code examples into a PHP environment (e.g., XAMPP) to test them. Good luck with your board exam preparation!