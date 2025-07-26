<?php
session_start();
require("../index.php");
require("../navbar.php");
$email=$_GET["email"];
$admin=mysqli_fetch_assoc(mysqli_query($con,"SELECT `username`, `email`, `role` FROM `admin` WHERE email='$email'"));?>
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
                action="update_admin.php?email=<?=$email?>">
                <div class="row justify-content-center d-flex mt-5">
                    <div class="  mt-3  ">
                        <label for="validationServerUsername" class="form-label text-light"> username</label>
                        <input type="text" class="form-control" name="name"
                            value="<?= htmlspecialchars($admin["username"]) ?>" required>
                    </div>

                    <div class="  mt-3 ">
                        <label for="validationServerUsername" class="form-label text-light">email</label>
                        <input type="email" class="form-control" name="email" value=<?=$admin["email"] ?> required>
                    </div>

                    <div class="  mt-3 ">
                        <label for="validationServerUsername" class="form-label text-light">role</label>
                        <?php if($admin['role']=="user" ){?>
                        <select class="form-select is-invalid " name="role" required>
                            <option selected value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
                    <?php } else{?>
                    <select class="form-select is-invalid " name="role" required>
                        <option selected value="admin">admin</option>
                        <option value="user">user</option>
                    </select>
                </div> <?php }?>


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