<?php
session_start();
require("../index.php");
require("../navbar.php");
$id=$_GET["id"];
$student=mysqli_fetch_assoc(mysqli_query($con,"SELECT `NAME`, `email`, `phone`, `date_of_birth` FROM `students` WHERE id=$id"));?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 bg-info">
        <div class=" row ">
            <form class="was-validated " method="POST" enctype="multipart/form-data"
                action="update_student.php?id=<?=$id?>">
                <div class="row justify-content-center d-flex mt-5">

                    <div class="  mt-3  ">
                        <label for="validationServerUsername" class="form-label text-light"> name</label>
                        <input type="text" class="form-control" name="name"
                            value="<?= htmlspecialchars($student["NAME"]) ?>" required>
                    </div>

                    <div class="  mt-3 ">
                        <label for="validationServerUsername" class="form-label text-light">email</label>
                        <input type="email" class="form-control" name="email" value=<?=$student["email"] ?> required>
                    </div>
                    <div class="  mt-3 ">
                        <label for="validationServerUsername" class="form-label text-light">phone</label>
                        <input type="number" class="form-control" name="phone" value=<?=$student["phone"] ?> required>
                    </div>

                    <div class="  mt-3">
                        <label for="validationServer04" class="form-label">date_of_birth </label>
                        <input type="date" class="form-control" name="date" value=<?=$student["date_of_birth"] ?>
                            required>
                    </div>
                    <div class="  col-md-12 d-flex mt-5 gap-2">
                        <button type="submit" class="btn  btn-success  col-md-6 mr-5"> edit</button>

                    </div>

                </div>
        </div>

        </form>

    </div>
    </div>
</body>

</html>