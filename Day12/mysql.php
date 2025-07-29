<?php
class Database {
    private $host = "localhost:3310";
    private $username = "root";
    private $password = "test123root";
    private $dbname = "training_system";
    private $port = 3310;
    public $conn;
    public function connect() {
        $this->conn = new mysqli(
        $this->host, $this->username,
        $this->password, $this->dbname,
        $this->port
        );
    if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
    }
    return $this->conn;
    }
}
$connect=new Database();
$connect->connect();
$email="[ali@gmail.com]";
$sql="SELECT * FROM students WHERE email= ? ";

$stmt=$connect->conn->prepare( $sql);
$stmt->bind_param( "s",$email);
$stmt->execute();
$res=$stmt->get_result();
while ($row = $res->fetch_assoc()){
    echo $row['name']."<br>";
}