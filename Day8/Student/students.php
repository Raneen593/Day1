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
        <h3 class="mb-3">Student List</h3>
        <a href="add_student.php" class="btn btn-success mb-3">Add Student</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Emil</th>
                    <th>Phone</th>
                    <th>DOB</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
            $res =mysqli_query($conn,"SELECT * FROM students");
            while ($row=mysqli_fetch_assoc($res)){
                echo " <tr>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['date_of_birth']}</td>
                <td>
                <a href='edit_student.php?id={$row['id']}' class='btn btn-waring btn-sm'>Edit</a>
                <a href='delet_student.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delet</a>
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