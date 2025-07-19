<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    foreach ($_SESSION['users'] as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
            exit();
        }
    }
    $error = "البريد الإلكتروني أو كلمة المرور غير صحيحة";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    .header h1 {
        margin: 0;
        font-size: 24px;
    }


    .content {
        max-width: 500px;
        margin: 30px auto;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .submit-btn {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    .error {
        color: #e74c3c;
        margin-bottom: 15px;
        padding: 10px;
        background-color: #fadbd8;
        border-radius: 4px;
    }
    </style>
</head>

<body>
    <!-- <div class="header">
        <h1>Media Player</h1>
    </div> -->

    <!-- <div class="menu">
        <a href="login.php">login</a>
        <a href="register.php">create account</a>
    </div> -->

    <div class="content">
        <?php if (isset($error)): ?>
        <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="submit-btn">Login</button>
        </form>

        <div style="margin-top: 20px; text-align: center;">
            <p>بيانات الدخول للاختبار:</p>
            <p>admin@example.com / 123456</p>
        </div>
    </div>
</body>

</html>