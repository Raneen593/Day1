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
        <h3 class="mb-3">Add New Courses</h3>
        <form action="insert_courses.php" method="POST" class="card p-4 shadow-sm">
            <input name="title" class="form-control mb-2" placeholder="Title" required>
            <input name="description" class="form-control mb-2" placeholder="Description" required>
            <input name="hourse" class="form-control mb-2" placeholder="Hourse" required>
            <input name="price" class="form-control mb-2" placeholder="Price" required>
            <button class="btn btn-success">Add Courses</button>
        </form>
    </div>
</body>

</html>