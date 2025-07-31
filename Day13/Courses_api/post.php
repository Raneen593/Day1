<?php
header("Content-Type: application/json");
include "db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    
    $title = $data['title'] ?? null;
    $description = $data['description'] ?? null;
    $hours = $data['hours'] ?? null;
    $price = $data['price'] ?? null;
    
    
    if (!$title || !$description || !$hours || !$price ) {
        echo json_encode(['status' => 'error', 'message' => 'missing data']);
        exit;
    }
    
    $sql = "INSERT INTO courses (title, description , price, hours) 
            VALUES ('$title', '$description','$price',  '$hours')";
    
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 'inserted', 'message' => 'course added successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>