<?php
interface connectDB {
    public function connect();
    public function disconnect();
}

class connectDatabase implements connectDB {
    private $server = "localhost";
    private $user = "root";
    private $password = "imp2083";
    private $database = "exampleDB";
    public $connection;
    
    public function __construct()
    {
        $this->connect();
    }
    
    public function connect()
    {
        $this->connection = new mysqli($this->server, $this->user, $this->password, $this->database);
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
        
        // Skip the header --> cause first column i have id, fname, lname etc. I dont need that so, i need to escape
        fgetcsv($file);
        
        
        
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
        
        

        $query = "INSERT INTO testStudents (id, fname, lname, phone, email, age, degree, course, joined_date) 
                 VALUES ('$id', '$fname', '$lname', '$phone', '$email', '$age', '$degree', '$course', '$joined_date')";
        
        if ($this->database->connection->query($query)) {
            continue;
        } else {
            
            echo "Error inserting row: " . $this->database->connection->error . "<br>";
        }
    }
        
        fclose($file);
        
        echo "<div style='margin: 20px;'>";
        echo "Insert Summary:<br>";
        echo "</div>";
        
        // Redirect back to display.php after 3 seconds
        header("refresh:3;url=/phpLab/day10/index.php");
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