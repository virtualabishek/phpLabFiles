<?php 

interface connectingDB {
    public function connect();
    public function disconnect();
}


class ConnectDB implements connectingDB {
    private $server = "localhost";
    private $user = "root";
    private $pwd = "imp2083";
    private $database = "exampleDB";
    public $connection;

    public function __construct()
    {
        $this->connect();
    }

    public function connect() {
        $this->connection = new mysqli($this->server, $this->user, $this->pwd, $this->database);
        if($this->connection->connect_error) {
            die ("Error Found".$this->connection->connect_error);
        }
        else {
            echo "Connected succesfully.";
        }
    }
}

?>