<?php
$host = "localhost:3310";
$username = "root";
$password = "test123root";
$dbname = "training_system";
$conn=mysqli_connect($host,$username,$password,$dbname);

$email="[ali@gmail.com]";
$sql="SELECT * FROM students WHERE email= ? ";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"s",$email);
mysqli_stmt_execute($stmt);
$res=mysqli_stmt_get_result($stmt);
while ($row = mysqli_fetch_assoc($res)){
    echo $row['name']."<br>";
}