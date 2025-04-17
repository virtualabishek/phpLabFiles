# PHP Functions - Unit 2 (5th Sem Board Exam)

## 📘 Functions in PHP
Functions are blocks of code that can be reused throughout your PHP scripts. They allow developers to organize code into manageable, reusable pieces.

### ✅ Defining and Calling Functions
A function is defined using the `function` keyword.

```php
function greet() {
    echo "Hello, Abishek!";
}

greet(); // Calling the function
```

### 📦 Variable Scope
Scope refers to the context in which a variable is accessible.

- **Local Scope**: Declared inside a function and cannot be accessed outside.
- **Global Scope**: Declared outside all functions. Use `global` keyword to access inside functions.

```php
$name = "Abishek";

function display() {
    global $name;
    echo "Name: $name";
}

display();
```

### 🎯 Function Parameters
You can pass values to a function through parameters.

```php
function add($a, $b) {
    return $a + $b;
}

echo add(5, 10); // Output: 15
```

### 🔁 Return Values
Functions can return values using the `return` keyword.

```php
function multiply($x, $y) {
    return $x * $y;
}

$result = multiply(4, 3);
echo $result; // Output: 12
```

### 🔧 Variable Functions
You can assign function names to variables and call them.

```php
function sayHello() {
    echo "Hello from variable function!";
}

$func = "sayHello";
$func(); // Output: Hello from variable function!
```

### 🙈 Anonymous Functions (Closures)
Functions without names, often used as callback functions.

```php
$greet = function($name) {
    return "Hello, $name!";
};

echo $greet("Abishek"); // Output: Hello, Abishek!
```

### 🕒 Date and Time Functions
Used to work with date and time in PHP.

- **`date()`** – Format a local date/time
- **`time()`** – Returns current Unix timestamp
- **`mktime()`** – Get timestamp for a date

```php
echo date("Y-m-d H:i:s"); // Output: current date and time

echo time(); // Output: Unix timestamp

echo date("l", mktime(0, 0, 0, 4, 17, 2025)); // Output: Thursday
```

---

Keep practicing these examples, Abi! They’ll help you master PHP functions and rock your board exams! 💪

