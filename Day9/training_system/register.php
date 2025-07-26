<?php 
include("index.php");

// بداية الجلسة إذا لم تكن بدأت
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// تهيئة المتغيرات لتجنب أخطاء undefined
$_SESSION['username'] = $_SESSION['username'] ?? '';
$_SESSION['role'] = $_SESSION['role'] ?? '';
$_SESSION['logstate'] = $_SESSION['logstate'] ?? false;
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <div class="container mt-2 p-2">
        <div class="row justifiy-content-center d-flex mt-3">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['email']) && isset($_POST['password'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $_SESSION["logstate"] = false;
                    
                    $admin = mysqli_query($con, "SELECT * FROM `admin` WHERE email='".mysqli_real_escape_string($con, $email)."'");
                    
                    if(mysqli_num_rows($admin) > 0) {
                        $row = mysqli_fetch_assoc($admin);
                        if(password_verify($password, $row['password'])) {
                            $_SESSION["username"] = $row["username"];
                            $_SESSION["role"] = $row["role"];
                            $_SESSION["logstate"] = true;
                        }
                    }

                    if($_SESSION["logstate"] == false) {
                        $log = mysqli_query($con, "INSERT INTO `log`(`email`, `state`) VALUES ('".mysqli_real_escape_string($con, $email)."','fail')");
                        ?>
            <div class="container mt-5 p-4">
                <div class="row justify-content-center d-flex mt-2">
                    <div class="alert alert-danger" role="alert">
                        ⚠️ Wrong password or email
                    </div>
                </div>
            </div>
            <?php 
                    } else { 
                        $log = mysqli_query($con, "INSERT INTO `log`(`email`, `state`) VALUES ('".mysqli_real_escape_string($con, $email)."','Successful')"); 
                        header("Location: project.php");
                        exit();
                    }
                }
            }
            ?>

            <form class="was-validated" method="POST">
                <div class="row justifiy-content-center d-flex mt-2">
                    <div class="mt-3">
                        <label for="email" class="form-label text-light">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                        <div class="invalid-feedback">Please enter a valid email</div>
                    </div>

                    <div class="mt-3">
                        <label for="password" class="form-label text-light">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                        <div class="invalid-feedback">Please enter a password</div>
                    </div>

                    <div class="row mt-5">
                        <button type="submit" class="btn btn-success col-md-6">Login</button>
                        <a href="creat_account.php" class="btn btn-primary col-md-6">Create Account</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>