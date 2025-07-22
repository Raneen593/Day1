<?php include '../db/dp.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">
    <?php include '../navbar.php' ;?>
    <div class="container mt-4">
        <h3 class="mb-3">Courses List</h3>
        <a href="add_course.php" class="btn btn-success mb-3">Add Courses</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Hours</th>
                    <th>Price</th>
                    <th>Action
                    <th>
                </tr>
            </thead>
            <tbody>
                <?php 
            $res =mysqli_query($conn,"SELECT * FROM courses");
            while ($row=mysqli_fetch_assoc($res)){
                echo " <tr>
                <td>{$row['title']}</td>
                <td>{$row['description']}</td>
                <td>{$row['hours']}</td>
                <td>{$row['price']}</td>
                <td>
                <a href='edit_courses.php?id={$row['id']}' class='btn btn-waring btn-sm'>Edit</a>
                <a href='delet_courses.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delet</a>
                </td>
                </tr>
                ";
            }
            ?>
            </tbody>
        </table>
    </div>
</body>

</html>