<?php
$connective = mysqli_connect("localhost:3310","root","test123root","training_system");
if (!$connective) {
    die("Connection failed: " . mysqli_connect_error());
}