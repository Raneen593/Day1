<?php 
include '../db/dp.php';
$id=$_GET['id'];
$sql=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM students WHERE id=$id"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>

<body>
    <?php include '../navbar.php';?>
    <div class="container mt-4">
        <h3 class="mb-3">Edit Student</h3>
        <form action="update_student.php?id=<?=$id?>" class="card p-4" method="POST">
            <input name="name" value="<?=$sql['name'] ?>" class="form-control mb-2" required>
            <input name="email" value="<?=$sql['email'] ?>" class="form-control mb-2" required>
            <input name="phone" value="<?=$sql['phone'] ?>" class="form-control mb-2" required>
            <input type="date" name="dob" value="<?=$sql['date_of_birth'] ?>" class="form-control mb-2" required>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>