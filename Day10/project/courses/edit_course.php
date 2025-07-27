<?php
include("../db.php");
$id = $_GET['id'];
$title = $_POST["title"] ?? "";
$description = $_POST["description"] ?? "";
$hours = $_POST["hours"] ?? "";
$price = $_POST["price"] ?? "";

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $sql = "UPDATE courses SET title='$title', description='$description', hours ='$hours', price='$price' WHERE id='$id'";

    mysqli_query($connective, $sql);
    header("Location:course.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-white">
    <?php include("../navbar.php"); ?>
    <div class="container mt-5">
        <h2>Edit Course</h2>
        <form action="edit_course.php?id=<?php echo $id; ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Hours</label>
                <input type="number" step="0.01" class="form-control" id="hours" name="hours" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Course</button>
        </form>
    </div>

</html>