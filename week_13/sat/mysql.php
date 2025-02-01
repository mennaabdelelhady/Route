<<<<<<< HEAD
<?php

$connection = mysqli_connect("localhost", "root", "", "mysql");
$query = "SELECT * FROM customers";
$result = mysqli_query($connection, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);


$mysql = new mysqli("localhost, root, '', 'mysql");
$query = "SELECT * FROM customers";
$result = $mysql->query($query);
$data = $result->fetch_all(MYSQLI_ASSOC);

require_once "pdo.php";

class Mysql implements Database{
    private $connection;

    public function __construct($dsn, $username, $password)
    {
        $this->connection = new pdo($dsn,$root,$password);
    }       

    public function query($query)
    {
        $result = $this->connection->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($query)
    {
        $query = "INSERT INTO customers (name, email) VALUES ('Menna')";
        $result = $this->connection->query($query);
        return $result->rowCount();
    }

    public function update($query)
    {
        $query = "UPDATE FROM customers SET name = 'Menna' WHERE id = 1";
        $result = $this->connection->query($query);
        return $result;
    }

    public function delete($query)
    {
        $query = "DELETE FROM customers SET name = 'Menna' WHERE id = 1";
        $result = $this->connection->query($query);
        return $result;
    }



    public function get_connection()
    {
        $pdo = new PDO("mysql:host=localhost";dbname=mysql, 'root', '');
        return $pdo;
    }
}
$mysql = new Mysql("mysql:host=localhost;dbname=mysql", "root", "");    

echo "<pre>";
print_r($mysql->Select('firstname', 'customers', 'id = 1'));
=======
<?php

$connection = mysqli_connect("localhost", "root", "", "mysql");
$query = "SELECT * FROM customers";
$result = mysqli_query($connection, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);


$mysql = new mysqli("localhost, root, '', 'mysql");
$query = "SELECT * FROM customers";
$result = $mysql->query($query);
$data = $result->fetch_all(MYSQLI_ASSOC);

require_once "pdo.php";

class Mysql implements Database{
    private $connection;

    public function __construct($dsn, $username, $password)
    {
        $this->connection = new pdo($dsn,$root,$password);
    }       

    public function query($query)
    {
        $result = $this->connection->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($query)
    {
        $query = "INSERT INTO customers (name, email) VALUES ('Menna')";
        $result = $this->connection->query($query);
        return $result->rowCount();
    }

    public function update($query)
    {
        $query = "UPDATE FROM customers SET name = 'Menna' WHERE id = 1";
        $result = $this->connection->query($query);
        return $result;
    }

    public function delete($query)
    {
        $query = "DELETE FROM customers SET name = 'Menna' WHERE id = 1";
        $result = $this->connection->query($query);
        return $result;
    }



    public function get_connection()
    {
        $pdo = new PDO("mysql:host=localhost";dbname=mysql, 'root', '');
        return $pdo;
    }
}
$mysql = new Mysql("mysql:host=localhost;dbname=mysql", "root", "");    

echo "<pre>";
print_r($mysql->Select('firstname', 'customers', 'id = 1'));
>>>>>>> ad06a688 (Route)
print_r($mysql->update('customers', 'name,'email', 'Menna,'id','=','1'));