<?php include '../db/dp.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">
    <?php include '../navbar.php' ;?>
    <div class="container mt-4">
        <h3 class="mb-3">Add New Student</h3>
        <form action="insert_student.php" method="POST" class="card p-4 shadow-sm">
            <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
            <input type="phone" name="phone" class="form-control mb-2" placeholder="Phone" required>
            <input type="date" name="dob" class="form-control mb-2" placeholder="Date of Birth" required>
            <button class="btn btn-success">Add Student</button>
        </form>
    </div>
</body>

</html>