# PHP Strings and Arrays - Unit 3 (5th Sem Board Exam)

## 🧵 Strings in PHP

### 🔡 String Constants

PHP has two main string constants:

- **Single-quoted**: `'Hello'` (no variable interpolation)
- **Double-quoted**: "Hello $name" (variables are parsed)

### 🖨️ Printing Strings

You can print strings using `echo` or `print`.

```php
$name = "Abishek";
echo "Hello, $name!"; // Output: Hello, Abishek!
```

### 🔠 Accessing Characters in Strings

Strings are treated like arrays of characters.

```php
$str = "PHP";
echo $str[0]; // Output: P
```

### 🧹 Cleaning Strings

Use `trim()`, `ltrim()`, `rtrim()` to remove whitespaces.

```php
$name = "  Abishek  ";
echo trim($name); // Output: Abishek
```

### 🔐 Encoding and Escaping

Use `htmlspecialchars()` to convert HTML characters.

```php
echo htmlspecialchars("<h1>Hello</h1>"); // Output: &lt;h1&gt;Hello&lt;/h1&gt;
```

### 📏 Comparing Strings

- `strcmp()`, `strcasecmp()` for case-sensitive/insensitive comparisons.

```php
strcmp("abc", "ABC"); // Output: >0 (not equal)
```

### 🧰 Manipulating and Searching Strings

- `strlen()`, `strtolower()`, `strtoupper()`, `substr()`, `strpos()`

```php
echo strlen("Abishek"); // Output: 7
```

### 🔍 Regular Expressions

Use `preg_match()` or `preg_replace()` for pattern matching.

```php
$email = "test@mail.com";
if (preg_match("/^[\w.-]+@[\w.-]+\.\w+$/", $email)) {
    echo "Valid email";
}
```

---

## 🧮 Arrays in PHP

### 🧷 Indexed vs. Associative Arrays

- **Indexed Array**: Numeric indexes
- **Associative Array**: Named keys

```php
$indexed = ["Apple", "Banana"];
$assoc = ["name" => "Abishek", "age" => 22];
```

### 📌 Defining Arrays

```php
$fruits = array("Mango", "Pineapple");
```

### 💾 Storing Data in Array

Just assign to an index or key:

```php
$fruits[2] = "Orange";
$assoc["city"] = "Chitwan";
```

### 🧩 Multidimensional Arrays

Arrays within arrays:

```php
$students = [
    ["name" => "Abishek", "age" => 22],
    ["name" => "Ram", "age" => 23]
];
```

### 🧲 Extracting Multiple Values

Use `list()` for indexed arrays:

```php
$info = ["Abishek", 22];
list($name, $age) = $info;
echo $name; // Output: Abishek
```

### 🔄 Conversion between Array and Variables

Use `extract()` to convert keys to variables, and `compact()` to do the reverse.

```php
$data = ["name" => "Abishek", "city" => "Chitwan"];
extract($data);
echo $name; // Output: Abishek
```

### 🔁 Traversing Arrays

Use `foreach()` for both indexed and associative arrays.

```php
foreach ($assoc as $key => $value) {
    echo "$key: $value\n";
}
```

---

You're doing awesome, Abishek Neupane! Keep this up and you'll ace your exam in no time! 💪📚
