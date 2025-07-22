<?php 
include '../db/dp.php';
$id=$_GET['id'];
$sql=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM courses WHERE id=$id"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Courses</title>
</head>

<body>
    <?php include '../navbar.php';?>
    <div class="container mt-4">
        <h3 class="mb-3">Edit Student</h3>
        <form action="update_courses.php?id=<?=$id?>" class="card p-4" method="POST">
            <input name="title" value="<?=$sql['title'] ?>" class="form-control mb-2" required>
            <input name="description" value="<?=$sql['description'] ?>" class="form-control mb-2" required>
            <input name="hours" value="<?=$sql['hours'] ?>" class="form-control mb-2" required>
            <input name="price" value="<?=$sql['price'] ?>" class="form-control mb-2" required>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>