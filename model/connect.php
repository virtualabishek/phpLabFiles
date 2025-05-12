<?php 
// host address, userName, password, dbName
$conn = new mysqli("localhost", "root", "", "exam");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Fix: put connection error inside die()
}

$sql = 'SELECT * FROM users';
$result = $conn->query($sql);
?>

<html>
<head>
    <title>Show data</title>
</head>
<body>
<table border='1' cellpadding='5' cellspacing='0'>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
    </tr>

    <?php 
    while ($data = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($data['id']) . "</td>";
        echo "<td>" . htmlspecialchars($data['name']) . "</td>";
        echo "<td>" . htmlspecialchars($data['email']) . "</td>";
        echo "</tr>";
    }
    ?>

</table>
</body>
</html>
