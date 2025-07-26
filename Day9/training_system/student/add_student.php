<?php
require("../index.php");
require("../navbar.php");?>
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
            <form class="was-validated " method="POST" enctype="multipart/form-data" action="insert_student.php">
                <div class="row justify-content-center d-flex mt-3">

                    <div class="  mt-3  ">
                        <label for="validationServerUsername" class="form-label text-light"> Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="  mt-3 ">
                        <label for="validationServerUsername" class="form-label text-light">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="  mt-3 ">
                        <label for="validationServerUsername" class="form-label text-light">Phone</label>
                        <input type="number" class="form-control" name="phone" required>
                    </div>

                    <div class="  mt-3">
                        <label for="validationServer04" class="form-label">date_of_birth </label>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                    <div class="  col-md-12 d-flex mt-5 gap-2">
                        <button type="submit" class="btn  btn-success  col-md-6 mr-5"> add</button>

                    </div>

                </div>
        </div>

        </form>

    </div>
    </div>
</body>

</html>