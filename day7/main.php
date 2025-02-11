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
            die("Connection failed and error is: ").$this->connection->connect_error;
        }
        else {
            echo "Connected Successfully.";
        }
    }
    public function disconnect()
    {
        if($this->connection) {
            $this->connection->close();
            echo "Disconnected Succesfully.";
        }
    }
}
 
$db = new connectDatabase();
echo "<br>";
$db->disconnect();

?>