<?php 
// Connecting to a database using class.

interface connectDB {
    public function connect();
    public function disconnect();
}

class ConnectDatabase implements connectDB {
    private $server  = "localhost";
    private $user  = "root";
    private $pwd  = "";
    private $db = "exampleDB";
    public $connection;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $this->connection  = new mysqli($this->server, $this->user, $this->pwd, $this->db);
        if ($this->connection->connect_error) {
            die ("Error found at: ".$this->connection->connect_error);
        }
        else {
            echo("Connected to the database succesfully.");
        }
    }
    public function disconnect()
    {
        if($this->connection) {
            $this->connection->close();
            echo("Disconnected Succesfully.");
        }
    }
    public function insertData() {
        $
    }
    
}


?>