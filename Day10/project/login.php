<?php
session_start();
$conn = mysqli_connect("localhost:3310", "root", "test123root", "training_system");

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected = "SELECT * FROM admin WHERE email='$email'";
    $result = mysqli_query($conn, $selected);
    $user = mysqli_fetch_assoc($result);

    $_SESSION["role"] = $user["role"] ?? '';
    $_SESSION["name"] = $user["name"] ?? '';

    if ($user) {
        if (password_verify($password, $user["password"])) {
            $_SESSION["email"] = $email;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Wrong password";
        }
    } else {
        $error = "Email not found";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4 bg-dark">
    <div class="container">
        <div class="row mt-3 d-flex justify-content-center">
            <div class="col-md-6 p-4 mt-5 shadow bg-dark rounded-4">
                <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form class="m-4" method="POST">
                    <div class="mb-3">
                        <label class="form-label text-white">Email address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Submit</button>
                    </div>
                    <div class="text-center mt-4">
                        <a href="logout.php" class="text-white">
                            <h6>New User? Register</h6>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>