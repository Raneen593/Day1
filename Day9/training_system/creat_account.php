<?php 
include("index.php"); 
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class=" bg-dark text-light">
    <div class="container mt-3">
        <div class="row">
            <div class="col-4 mx-auto mt-5 container">
                <?php 
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_FILES["image"]["error"] == 4) {
            ?>
                <div class="alert alert-danger" role="alert">
                    ❌ Please upload an image.
                </div>
                <?php 
                } else {
                    $username = $_POST["username"];
                    $email = $_POST["email"];
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                        if (!file_exists('img')) {
                        mkdir('img', 0777, true);
                    }
                    
                    $image_name = time() . '_' . str_replace(' ', '_', $_FILES["image"]["name"]);
                    $target_path = '/training_system/img/' . $image_name;
                    
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_path)) {
                        $query = "INSERT INTO `admin` (`username`, `email`, `password`) 
                                VALUES ('$username', '$email', '$password')";
                        $result = mysqli_query($con, $query);
                        
                        if ($result) {
            ?>
                <div class="card" style="width: 18rem;">
                    <img src="<?= $target_path ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $username ?></h5>
                        <p class="card-text"><?= $email ?></p>
                    </div>
                </div>
                <div class="alert alert-success" role="alert">
                    ✅ Account created successfully
                </div>
                <?php
                        } else {
                            echo '<div class="alert alert-danger">Error: ' . mysqli_error($con) . '</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Failed to upload image</div>';
                    }
                }
            }
            ?>

                <form class="row g-3 needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="col-md-12 mt-3"> Username
                        <input type="text" class="form-control" name="username" required placeholder="Username">
                    </div>
                    <div class="col-md-12 mt-3"> Email
                        <input type="email" class="form-control" name="email" required placeholder="Email">
                    </div>
                    <div class="col-md-12 mt-3"> Password
                        <input type="password" class="form-control" name="password" required placeholder="Password">
                    </div>
                    <div class="col-md-12 mt-3"> Image
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="col-md-12 mt-2">
                        <button type="submit" class="btn btn-primary w-100 mt-3">Sign up</button>
                        <a href="register.php" class="btn btn-primary w-100 mt-3">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>