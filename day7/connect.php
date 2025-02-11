<?php 
echo "Checking <br>";

// Different ways

// Interface, i have this function, i use this on class.

interface connectToDb {
    public function connect();
    public function disconnect();
}

class ConnectingDB implements connectDB {
    private $server = 'localhost';
    private $user = "abi";
    private $password = "imp2083";
    private $dbName = "exampleDB";
    public $connection;

    public function __construct()
    {
        $this->connection;
    }


    public function connect() {
        $this->connection = new mysqli($this->server, $this->user, $this->password, $this->dbName);
        if ($this->connection->connect_error) {
            die("Error found at: " . $this->connection->connect_error); 
        } else {
            echo "Connected Successfully"; 
        }
    }


    }



}



?>