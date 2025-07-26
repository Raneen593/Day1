<?php
$con = mysqli_connect("localhost:3310", "root", "test123root", "product");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>