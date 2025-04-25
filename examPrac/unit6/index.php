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