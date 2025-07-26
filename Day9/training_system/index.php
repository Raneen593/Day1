<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

$con=mysqli_connect("localhost:3310","root","test123root","training_system");
if(!isset($con)){
    echo error;
} ?>