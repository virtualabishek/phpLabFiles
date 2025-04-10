# WT-II Notes: Server-Side Scripting & PHP Basics

## 1. Server-Side Scripting

Server-side scripting is a technique used in web development where scripts are executed on the server rather than the client’s browser. This allows dynamic content generation, database interactions, and security management.

### Advantages of Server-Side Scripting:

- **Security**: Code is hidden from users.
- **Dynamic Content**: Pages can change based on user input.
- **Database Interaction**: Fetch and manipulate data.
- **Cross-browser Compatibility**: Works the same across all browsers.

### Common Server-Side Languages:

- PHP
- Node.js
- Python (Django, Flask)
- Ruby on Rails
- Java (Spring, JSP)

---

## 2. Introduction to PHP

**PHP (Hypertext Preprocessor)** is a widely-used open-source scripting language designed for web development and can be embedded into HTML.

### Features of PHP:

- Open-source and cross-platform
- Simple and easy to learn
- Supports databases like MySQL
- Server-side execution
- Supports object-oriented programming (OOP)
- Has built-in functions for file handling, sessions, and form processing

### Basic PHP Syntax:

- PHP code is written inside `<?php ... ?>` tags.
- Statements end with a semicolon `;`.
- Comments:
  - Single-line: `//` or `#`
  - Multi-line: `/* */`

Example:

```php
<?php
  echo "Hello, World!";
?>
```

---

## 3. Language Basics

### Lexical Structure

- **Whitespace**: Ignored except inside strings.
- **Identifiers**: Variable and function names (must start with a letter or `_` and cannot be a PHP keyword).
- **Keywords**: Reserved words like `if`, `else`, `function`, `echo`.
- **Comments**: `//`, `#`, `/* */`

### Data Types

PHP supports the following data types:

1. **String**: `$str = "Hello";`
2. **Integer**: `$num = 10;`
3. **Float (Double)**: `$price = 99.99;`
4. **Boolean**: `$isTrue = true;`
5. **Array**: `$arr = array("Apple", "Banana");`
6. **Object**: `$obj = new ClassName();`
7. **NULL**: `$var = NULL;`
8. **Resource**: Used for database connections, file handles, etc.

### Variables

- Declared using `$` (e.g., `$name = "Abi";`)
- Loosely typed (no need to define type explicitly)
- Case-sensitive
- Cannot start with a number

### Expressions & Operators

- **Arithmetic**: `+`, `-`, `*`, `/`, `%`
- **Comparison**: `==`, `!=`, `>`, `<`, `>=`, `<=`, `===`, `!==`
- **Logical**: `&&`, `||`, `!`
- **Assignment**: `=`, `+=`, `-=`, `*=`, `/=`, `%=`
- **String Concatenation**: `.` (e.g., `$str1 . $str2`)

### Flow Control Statements

- **Conditional Statements**:
  ```php
  if ($x > 0) {
      echo "Positive";
  } elseif ($x < 0) {
      echo "Negative";
  } else {
      echo "Zero";
  }
  ```
- **Switch Case**:
  ```php
  switch ($day) {
      case "Monday": echo "Start of the week"; break;
      case "Friday": echo "Weekend coming"; break;
      default: echo "Regular day";
  }
  ```
- **Loops**:
  ```php
  while ($i < 5) { echo $i++; }
  for ($i = 0; $i < 5; $i++) { echo $i; }
  foreach ($arr as $value) { echo $value; }
  ```

---

## 4. Including PHP Code

PHP code can be included in different ways:

- Using `include 'file.php';`
- Using `require 'file.php';`
- Using `include_once` and `require_once` to prevent multiple inclusions

---

## 5. Embedding PHP in Web Pages

PHP can be embedded directly into HTML.
Example:

```php
<!DOCTYPE html>
<html>
<head>
    <title>PHP Example</title>
</head>
<body>
    <h1>Welcome, <?php echo "Abhi!"; ?></h1>
</body>
</html>
```

---

This covers the first chapter! Let me know if you need any clarifications. 🚀
