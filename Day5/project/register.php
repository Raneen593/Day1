<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    foreach ($_SESSION['users'] as $user) {
        if ($user['email'] === $email) {
            $error = "هذا البريد الإلكتروني مسجل بالفعل";
            break;
        }
    }
    
    if (!isset($error)) {
        $newUser = [
            'id' => uniqid(),
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        $_SESSION['users'][] = $newUser;
        $_SESSION['user'] = $newUser;
        $_SESSION['success'] = "تم إنشاء الحساب بنجاح!";
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create Account</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    .header {
        background-color: #2c3e50;
        color: white;
        padding: 15px 20px;
        border-bottom: 4px solid #3498db;
    }

    .header h1 {
        margin: 0;
        font-size: 24px;
    }

    .menu {
        background-color: #34495e;
        padding: 10px 20px;
    }

    .menu a {
        color: white;
        text-decoration: none;
        margin-right: 20px;
        font-size: 16px;
        padding: 5px 10px;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .menu a:hover {
        background-color: #3498db;
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
    <div class="header">
        <h1>Create Account</h1>
    </div>

    <div class="menu">
        <a href="login.php">login</a>
    </div>

    <div class="content">
        <?php if (isset($error)): ?>
        <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="submit-btn">Create Account</button>
        </form>
    </div>
</body>

</html>