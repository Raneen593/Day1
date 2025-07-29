<?php
$host = "localhost:3310";
$username = "root";
$password = "test123root";
$dbname = "training_system";
$conn=new mysqli($host,$username,$password,$dbname);

$email="[ali@gmail.com]";
$sql="SELECT * FROM students WHERE email= ? ";

$stmt=$conn->prepare($sql);
$stmt->bind_param("s",$email);
$stmt->execute();
$res=$stmt->get_result();
while ($row = $res->fetch_assoc()){
    echo $row['name']."<br>";
}