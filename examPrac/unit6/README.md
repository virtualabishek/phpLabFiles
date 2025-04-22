Below is a detailed explanation of **Unit 6: Working with Database (5 Hrs.)** in PHP, tailored for your BIT 5th semester board exam preparation for the subject WT-2 (Web Technology 2). The content is structured as a README.md file, formatted in Markdown, with definitions, explanations, and examples for each topic: Using PHP to Access Database, Querying a Database with PHP, and CRUD Operations Using Forms. This note is designed to be comprehensive, beginner-friendly, and savable for further study, aligning with your goal of mastering PHP for your exam. The examples are practical and exam-focused, and the content can be visualized on Canva by copying the Markdown into a Markdown viewer or using the code snippets in a PHP environment.

# PHP Working with Database: Unit 6 Notes for BIT 5th Semester (WT-2)

This document provides detailed notes on **Unit 6: Working with Database (5 Hrs.)** for the Web Technology 2 (WT-2) syllabus. It covers Using PHP to Access Database, Querying a Database with PHP, and CRUD Operations Using Forms, with definitions, explanations, and examples. The content is designed to help you prepare for your board exam and understand database handling in PHP thoroughly.

## 1. Using PHP to Access Database

### Definition

**Using PHP to access a database** involves connecting a PHP script to a database (e.g., MySQL) to perform operations like storing, retrieving, updating, or deleting data. PHP provides extensions like **MySQLi** (MySQL Improved) and **PDO** (PHP Data Objects) to interact with databases securely and efficiently.

### Key Steps to Access a Database

1. **Establish a Connection**: Use MySQLi or PDO to connect to the database server.
2. **Handle Errors**: Check for connection failures.
3. **Close Connection**: Free resources after operations are complete.
4. **Security**: Use prepared statements to prevent SQL injection.

### MySQLi vs. PDO

- **MySQLi**: Specific to MySQL databases, supports both procedural and object-oriented styles.
- **PDO**: Database-agnostic, supports multiple databases (MySQL, PostgreSQL, SQLite), and is more portable.

### Example: Connecting to MySQL with MySQLi

```php
<?php
// Database credentials
$host = "localhost";
$username = "root";
$password = "";
$dbname = "school";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";

// Close connection
$conn->close();
?>
```

### Example: Connecting with PDO

```php
<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "school";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Close connection
$conn = null;
?>
```

### Explanation

- **MySQLi**: Creates a connection using `new mysqli()` and checks for errors with `$conn->connect_error`.
- **PDO**: Uses a DSN (Data Source Name) and try-catch for error handling, with `setAttribute()` to enable exception-based errors.
- **Closing**: MySQLi uses `$conn->close()`, while PDO sets `$conn = null`.

### Database Setup (SQL for Reference)

```sql
CREATE DATABASE school;
USE school;
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    age INT NOT NULL
);
```

## 2. Querying a Database with PHP

### Definition

**Querying a database with PHP** involves executing SQL queries (e.g., SELECT, INSERT, UPDATE, DELETE) to interact with database data. Queries can be executed using MySQLi or PDO, with prepared statements recommended for security.

### Types of Queries

- **SELECT**: Retrieve data.
- **INSERT**: Add new data.
- **UPDATE**: Modify existing data.
- **DELETE**: Remove data.

### Best Practices

- Use **prepared statements** to prevent SQL injection.
- Validate and sanitize inputs.
- Handle errors gracefully.

### Example: Querying with MySQLi (SELECT)

```php
<?php
$conn = new mysqli("localhost", "root", "", "school");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute SELECT query
$stmt = $conn->prepare("SELECT id, name, email, age FROM students WHERE age > ?");
$minAge = 18;
$stmt->bind_param("i", $minAge);
$stmt->execute();
$result = $stmt->get_result();

// Fetch and display data
while ($row = $result->fetch_assoc()) {
    echo "ID: {$row['id']}, Name: {$row['name']}, Email: {$row['email']}, Age: {$row['age']}<br>";
}

$stmt->close();
$conn->close();
?>
```

### Example: Querying with PDO (INSERT)

```php
<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=school", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute INSERT query
    $stmt = $conn->prepare("INSERT INTO students (name, email, age) VALUES (:name, :email, :age)");
    $stmt->execute([
        ':name' => 'Alice Smith',
        ':email' => 'alice@example.com',
        ':age' => 20
    ]);

    echo "New student added successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
```

### Explanation

- **MySQLi SELECT**: Uses prepared statements with `bind_param()` to safely query students older than 18, fetching results with `fetch_assoc()`.
- **PDO INSERT**: Uses named parameters (`:name`, `:email`, `:age`) for clarity and security, executed with an associative array.
- **Security**: Both examples prevent SQL injection by binding parameters.

## 3. CRUD Operations Using Forms

### Definition

**CRUD Operations Using Forms** refers to creating a web interface with HTML forms to perform **Create**, **Read**, **Update**, and **Delete** operations on a database using PHP. This combines form handling (Unit 5) with database interactions.

### CRUD Breakdown

- **Create**: Insert new records (e.g., add a student).
- **Read**: Retrieve and display records (e.g., list students).
- **Update**: Modify existing records (e.g., edit student details).
- **Delete**: Remove records (e.g., delete a student).

### Example: Full CRUD Application

This example includes an HTML form for creating and updating students, a table to read students, and buttons for editing and deleting, all processed by a single PHP script.

#### index.php (Form and Display)

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Student Management</h2>

    <!-- Create/Update Form -->
    <form action="index.php" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($editId) ? $editId : ''; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($editName) ? $editName : ''; ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($editEmail) ? $editEmail : ''; ?>" required><br><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo isset($editAge) ? $editAge : ''; ?>" required><br><br>
        <input type="submit" name="submit" value="Save Student">
    </form>

    <!-- Display Students -->
    <h3>Student List</h3>
    <?php
    $conn = new mysqli("localhost", "root", "", "school");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle Create/Update
    if (isset($_POST['submit'])) {
        $id = $_POST['id'] ?? '';
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);

        if (!empty($name) && !empty($email) && !empty($age)) {
            if ($id) {
                // Update
                $stmt = $conn->prepare("UPDATE students SET name=?, email=?, age=? WHERE id=?");
                $stmt->bind_param("ssii", $name, $email, $age, $id);
            } else {
                // Create
                $stmt = $conn->prepare("INSERT INTO students (name, email, age) VALUES (?, ?, ?)");
                $stmt->bind_param("ssi", $name, $email, $age);
            }
            if ($stmt->execute()) {
                echo "<p style='color: green;'>Operation successful!</p>";
            } else {
                echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
            }
            $stmt->close();
        } else {
            echo "<p style='color: red;'>All fields are required.</p>";
        }
    }

    // Handle Delete
    if (isset($_GET['delete'])) {
        $id = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
        $stmt = $conn->prepare("DELETE FROM students WHERE id=?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "<p style='color: green;'>Student deleted successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
        }
        $stmt->close();
    }

    // Handle Edit (Populate Form)
    if (isset($_GET['edit'])) {
        $id = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_NUMBER_INT);
        $stmt = $conn->prepare("SELECT name, email, age FROM students WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $editId = $id;
            $editName = $row['name'];
            $editEmail = $row['email'];
            $editAge = $row['age'];
        }
        $stmt->close();
    }

    // Read (Display Table)
    $result = $conn->query("SELECT id, name, email, age FROM students");
    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Age</th><th>Actions</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['age']}</td>
                <td>
                    <a href='index.php?edit={$row['id']}'>Edit</a> |
                    <a href='index.php?delete={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No students found.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
```

### Explanation

- **Create**: The form submits data to itself (`index.php`). If no `id` is present, it inserts a new student using a prepared `INSERT` statement.
- **Read**: A `SELECT` query fetches all students and displays them in a table with edit and delete links.
- **Update**: Clicking "Edit" populates the form with the student’s data (via `$_GET['edit']`). Submitting with an `id` updates the record using a prepared `UPDATE` statement.
- **Delete**: Clicking "Delete" sends a `$_GET['delete']` parameter, triggering a prepared `DELETE` statement with confirmation.
- **Security**: Uses `filter_input()` for sanitization and prepared statements to prevent SQL injection.
- **Feedback**: Success or error messages are displayed in green or red.

## Key Points for Board Exam

- **Using PHP to Access Database**: Connect with MySQLi or PDO, check for errors, and close connections. PDO is preferred for portability.
- **Querying a Database**: Use prepared statements for SELECT, INSERT, UPDATE, and DELETE queries to ensure security and efficiency.
- **CRUD Operations Using Forms**: Combine HTML forms with PHP to perform Create, Read, Update, and Delete operations, handling user input safely.
- **Security**: Always sanitize inputs (`filter_input()`) and use prepared statements to prevent SQL injection.
- **Error Handling**: Display user-friendly messages and log detailed errors for debugging.

## Tips for Study

- **Practice**: Set up XAMPP, create the `school` database, and test the CRUD application locally.
- **Debugging**: Use `var_dump()` or `print_r()` to inspect query results or form data during development.
- **Security**: Experiment with invalid inputs to understand how sanitization and validation work.
- **Visualization**: Copy the code into a PHP file and run it on a local server to see the form and table in action.
- **Canva Visualization**: To visualize on Canva, create a presentation or infographic:
  - **Slide 1**: Overview of Unit 6 with key topics.
  - **Slide 2**: Diagram of PHP-MySQL connection (e.g., client -> PHP -> MySQL).
  - **Slide 3**: Flowchart of CRUD operations (Form -> PHP -> Database -> Response).
  - **Slide 4**: Screenshot of the CRUD app or code snippets with annotations.
  - Use Canva’s code block templates or text boxes to paste key code snippets (e.g., connection, query, form).

## Additional Notes

- **File Uploads**: For advanced CRUD, add file inputs to store images in the database or server, using `$_FILES` and `enctype="multipart/form-data"`.
- **Pagination**: For large datasets, implement pagination in the Read operation to limit rows displayed per page.
- **AJAX**: For a modern touch, use AJAX to submit forms without page reloads, though this may be beyond the syllabus.

---

**Save this README.md** to your study folder for quick reference. View it in Visual Studio Code, GitHub, or a Markdown viewer. Test the code in a PHP environment like XAMPP with the provided SQL to create the `school` database. For Canva, use the Markdown content as a guide to create visual study aids, such as diagrams or code screenshots, to reinforce your understanding. Practice the CRUD application hands-on to master Unit 6 for your board exam. Good luck with your preparation!
