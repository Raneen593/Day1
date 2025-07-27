<?php
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"] ?? "";
    $description = $_POST["description"] ?? "";
    $hours = $_POST["hours"] ?? "";
    $price = $_POST["price"] ?? "";

    if ($title && $description && $hours && $price) {
        $query = "INSERT INTO courses (title, description, hours, price)
                  VALUES ('$title', '$description', '$hours', '$price')";
        mysqli_query($connective, $query);
        header("Location: course.php?status=success");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-white">
    <?php include("../navbar.php"); ?>
    <div class="container mt-5">
        <h2>Add Course</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="description" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Hour</label>
                <input type="number" step="0.01" class="form-control" name="hours" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Course</button>
        </form>
    </div>
</body>

</html>