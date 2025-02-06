4 methods of connecting a db,

1. Procedural MEthod, using mysqli
2. Class method, Using Class
3. Using PDO (PHP data object)

try {
$connec = new PDO("mysql:host = $servername, dbname=$dbname", $userName, $password)
}

catch (pdoException $e) {
    echo("Connection Method".e$->getMessage())
}
