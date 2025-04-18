Below is a detailed explanation of **Unit 5: Handling Forms (4 Hrs.)** in PHP, tailored for your BIT 5th semester board exam preparation for the subject WT-2 (Web Technology 2). The content is structured as a README.md file, formatted in Markdown, with definitions, explanations, and examples for each topic: Building Forms, Retrieving Form Data, Processing Forms, and Setting Response Headers. This note is designed to be comprehensive, beginner-friendly, and savable for further study, aligning with your goal of mastering PHP for your exam.

# PHP Handling Forms: Unit 5 Notes for BIT 5th Semester (WT-2)

This document provides detailed notes on **Unit 5: Handling Forms (4 Hrs.)** for the Web Technology 2 (WT-2) syllabus. It covers Building Forms, Retrieving Form Data, Processing Forms, and Setting Response Headers in PHP, with definitions, explanations, and examples. The content is designed to help you prepare for your board exam and understand form handling in PHP thoroughly.

## 1. Building Forms

### Definition

**Building forms** involves creating HTML forms to collect user input, such as text, selections, or files, which are then sent to a PHP script for processing. Forms use the `<form>` tag with attributes like `action` (the PHP file to process the form) and `method` (typically `GET` or `POST`).

### Key Components

- **`<form>` Tag**: Defines the form, specifying `action` (target PHP script) and `method` (`GET` or `POST`).
- **Input Elements**: Include `<input>`, `<textarea>`, `<select>`, etc., for user data.
- **Attributes**:
  - `name`: Identifies the input for PHP processing.
  - `type`: Specifies input type (e.g., `text`, `email`, `submit`).
  - `value`: Sets default or submitted value.
- **Submit Button**: Triggers form submission using `<input type="submit">`.

### Example: Simple Registration Form

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Registration Form</title>
  </head>
  <body>
    <h2>Register</h2>
    <form action="process.php" method="POST">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required /><br /><br />

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required /><br /><br />

      <label for="gender">Gender:</label>
      <select id="gender" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option></select
      ><br /><br />

      <input type="submit" value="Register" />
    </form>
  </body>
</html>
```

### Explanation

- The form submits data to `process.php` using the `POST` method (secure for sensitive data).
- Inputs have `name` attributes (`username`, `email`, `gender`) for PHP to access.
- The `required` attribute ensures fields aren’t submitted empty.
- The `<select>` element provides a dropdown for gender selection.

## 2. Retrieving Form Data

### Definition

**Retrieving form data** involves accessing the data submitted by a form in a PHP script using superglobals like `$_GET`, `$_POST`, or `$_REQUEST`. These arrays store form input values based on the form’s `method` attribute.

### Superglobals

- `$_GET`: Retrieves data sent via the `GET` method (visible in URL, less secure).
- `$_POST`: Retrieves data sent via the `POST` method (not visible in URL, secure for sensitive data).
- `$_REQUEST`: Retrieves data from either `GET` or `POST` (less specific, use cautiously).

### Best Practices

- Check if data exists using `isset()` to avoid undefined index errors.
- Sanitize inputs to prevent security issues (e.g., SQL injection, XSS).

### Example: Retrieving Form Data

```php
<?php
// process.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if fields are set and not empty
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";

    // Basic validation
    if (!empty($username) && !empty($email)) {
        echo "Username: " . htmlspecialchars($username) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Gender: " . htmlspecialchars($gender) . "<br>";
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
```

### Explanation

- `$_SERVER["REQUEST_METHOD"]` checks if the form used `POST`.
- `isset()` ensures the form fields exist in `$_POST`.
- `htmlspecialchars()` sanitizes output to prevent XSS attacks.
- Basic validation checks for non-empty fields.

## 3. Processing Forms

### Definition

**Processing forms** involves handling the retrieved form data, such as validating inputs, performing actions (e.g., saving to a database), and providing feedback to the user. This step ensures data is secure, valid, and used appropriately.

### Steps in Form Processing

1. **Retrieve Data**: Use `$_POST` or `$_GET`.
2. **Validate Data**: Check for required fields, correct formats (e.g., email), and security.
3. **Sanitize Data**: Remove or escape harmful characters.
4. **Perform Actions**: Save to a database, send an email, etc.
5. **Provide Feedback**: Display success or error messages.

### Example: Processing Form with Database

```php
<?php
// process.php
// Database connection (MySQLi)
$conn = new mysqli("localhost", "root", "", "mydb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize inputs
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_STRING);

    // Validate inputs
    if (empty($username) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid input. Please check your data.";
    } else {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO users (username, email, gender) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $gender);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>
```

### Explanation

- **Database Connection**: Connects to a MySQL database using MySQLi.
- **Sanitization**: Uses `filter_input()` to clean inputs.
- **Validation**: Checks for empty fields and valid email format.
- **Prepared Statements**: Prevents SQL injection by binding parameters.
- **Feedback**: Displays success or error messages.

### Database Setup (SQL for Reference)

```sql
CREATE DATABASE mydb;
USE mydb;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    gender VARCHAR(10) NOT NULL
);
```

## 4. Setting Response Headers

### Definition

**Setting response headers** involves using PHP’s `header()` function to modify the HTTP response sent to the client, such as redirecting to another page, setting content type, or controlling caching. Headers must be set before any output (e.g., HTML, echo statements).

### Common Uses

- **Redirection**: Send users to another page.
- **Content Type**: Specify the response format (e.g., JSON, PDF).
- **Status Codes**: Set HTTP status (e.g., 404, 403).
- **Caching**: Control browser caching behavior.

### Rules

- Call `header()` before any output (even whitespace).
- Use `exit()` after redirection to prevent further script execution.

### Example: Redirection and JSON Response

```php
<?php
// redirect.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? "";

    if (!empty($username)) {
        // Redirect to success page
        header("Location: success.php?username=" . urlencode($username));
        exit();
    } else {
        // Set JSON response for error
        header("Content-Type: application/json");
        echo json_encode(["error" => "Username is required"]);
    }
}
?>

<!-- success.php -->
<?php
$username = $_GET["username"] ?? "Guest";
echo "Welcome, " . htmlspecialchars($username) . "!";
?>
```

### Explanation

- **Redirection**: `header("Location: ...")` redirects to `success.php` with the username in the URL.
- **JSON Response**: `header("Content-Type: application/json")` sets the response as JSON for errors.
- **Security**: `urlencode()` and `htmlspecialchars()` prevent URL and XSS issues.
- **`exit()`**: Stops script execution after redirection.

## Key Points for Board Exam

- **Building Forms**: Use HTML `<form>` with `action`, `method`, and `name` attributes. Include inputs like `text`, `email`, and `select`.
- **Retrieving Form Data**: Access data via `$_POST` or `$_GET`, using `isset()` and `htmlspecialchars()` for safety.
- **Processing Forms**: Validate and sanitize inputs, use prepared statements for database interactions, and provide user feedback.
- **Setting Response Headers**: Use `header()` for redirects, content types, or status codes, ensuring no output precedes it.

## Tips for Study

- **Practice**: Create a form, process it with PHP, and save data to a MySQL database.
- **Test Redirection**: Write scripts to redirect based on form success or failure.
- **Security**: Always sanitize inputs and use prepared statements to prevent injection attacks.
- **Debugging**: Use `var_dump($_POST)` to inspect form data during development.
- **Environment**: Set up XAMPP to test PHP and MySQL locally.

## Additional Notes

- **File Uploads**: For forms with file inputs (`<input type="file">`), use `$_FILES` to retrieve file data. Ensure `enctype="multipart/form-data"` in the `<form>` tag.
- **Validation**: Use PHP’s `filter_var()` for email and URL validation, and regular expressions for custom patterns.
- **Error Handling**: Display user-friendly error messages while logging detailed errors for debugging.

---

**Save this README.md** to your study folder for quick reference. You can view it in Visual Studio Code, GitHub, or any Markdown viewer. Test the code examples in a PHP environment like XAMPP, ensuring you have a MySQL database set up for the database example. Practice these concepts hands-on to ace your board exam. Good luck with your preparation!
