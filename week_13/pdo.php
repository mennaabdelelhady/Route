<<<<<<< HEAD
<?php

$pdo=new PDO("mysql:host=localhost;dbname=mysql",'root','');
$query = "SELECT * FROM customers";
$result = $pdo->query($query);
$data = $result->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($data);


Interface Database{
    public function query($query);
    public function insert($query);
    public function update($query);
    public function delete($query);
    public function get_connection();
}
=======
<?php

$pdo=new PDO("mysql:host=localhost;dbname=mysql",'root','');
$query = "SELECT * FROM customers";
$result = $pdo->query($query);
$data = $result->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($data);


Interface Database{
    public function query($query);
    public function insert($query);
    public function update($query);
    public function delete($query);
    public function get_connection();
}
>>>>>>> ad06a688 (Route)
