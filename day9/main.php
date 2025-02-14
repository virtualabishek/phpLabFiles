<?php
interface connectDB {
    public function connect();
    public function disconnect();
}

class connectDatabase implements connectDB {
    private $server = "localhost";
    private $user = "root";
    private $password = "imp2083";
    private $databse = "exampleDB";
    public $connection;
    
    public function __construct()
    {
        $this->connect();
    }
    
    public function connect()
    {
        $this->connection = new mysqli($this->server, $this->user, $this->password, $this->databse);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        return true;
    }
    
    public function disconnect()
    {
        if($this->connection) {
            $this->connection->close();
        }
    }
}

class InsertData {
    private $database;
    
    public function __construct()
    {
        $this->database = new connectDatabase();
    }
    
    public function insert($filePath) {
        if (!file_exists($filePath)) {
            echo "Error: File not found";
            return false;
        }
        
        $file = fopen($filePath, 'r');
        if (!$file) {
            echo "Error: Unable to open file";
            return false;
        }
        
        // Skip the header 
        fgetcsv($file);
        
        $successCount = 0;
        $errorCount = 0;
        
        while (($row = fgetcsv($file)) !== FALSE) {
        // Sanitize input data
        $id = $this->database->connection->real_escape_string($row[0]);
        $fname = $this->database->connection->real_escape_string($row[1]);
        $lname = $this->database->connection->real_escape_string($row[2]);
        $phone = $this->database->connection->real_escape_string($row[3]);
        $email = $this->database->connection->real_escape_string($row[4]);
        $age = $this->database->connection->real_escape_string($row[5]);
        $degree = $this->database->connection->real_escape_string($row[6]);
        $course = $this->database->connection->real_escape_string($row[7]);
        
        // Convert date format from m/d/Y to Y-m-d
        $date = DateTime::createFromFormat('n/j/Y', $row[8]);
        $joined_date = $date ? $date->format('Y-m-d') : null;
        
        if ($joined_date === null) {
            echo "Error: Invalid date format in row for ID: $id<br>";
            $errorCount++;
            continue;
        }

        $query = "INSERT INTO courseStudents (id, fname, lname, phone, email, age, degree, course, joined_date) 
                 VALUES ('$id', '$fname', '$lname', '$phone', '$email', '$age', '$degree', '$course', '$joined_date')";
        
        if ($this->database->connection->query($query)) {
            $successCount++;
        } else {
            $errorCount++;
            echo "Error inserting row: " . $this->database->connection->error . "<br>";
        }
    }
        
        fclose($file);
        
        echo "<div style='margin: 20px;'>";
        echo "Insert Summary:<br>";
        echo "Successfully inserted rows: $successCount<br>";
        echo "Failed rows: $errorCount<br>";
        echo "</div>";
        
        // Redirect back to display.php after 3 seconds
        header("refresh:3;url=/phpLab/day9/display.php");
    }
    
    public function __destruct()
    {
        $this->database->disconnect();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['csvFile'])) {
    $filePath = $_FILES['csvFile']['tmp_name'];
    $insertData = new InsertData();
    $insertData->insert($filePath);
} else {
    echo "No file uploaded or invalid request method.";
}
?>