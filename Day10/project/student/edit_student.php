<?php
include("../db.php");
$id = $_GET['id'];
$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$phone = $_POST["phone"] ?? "";
$data_of_birth = $_POST["data_of_birth"] ?? "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && $name && $email && $phone && $data_of_birth) {
    $sql = "UPDATE students SET name='$name', email='$email', phone='$phone', data_of_birth='$data_of_birth' WHERE id='$id'";

    mysqli_query($connective, $sql);
    header("Location: student.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-white">
    <?php include("../navbar.php"); ?>
    <div class="container mt-5">
        <h2>Edit Student</h2>
        <form action="edit_student.php?id=<?php echo $id; ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="data_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="data_of_birth" name="data_of_birth" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>

</html>