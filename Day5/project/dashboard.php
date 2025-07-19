<?php
require 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #2a2929;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        margin-top: 100px;
        text-align: center;

    }


    .welcome-header {
        font-size: 24px;
        margin-bottom: 30px;
        color: black;
        background-color: white;
        border-radius: 30px;
    }

    .menu-links {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .menu-links a {
        color: white;
        background-color: blue;
        text-decoration: none;
        font-size: 16px;
        padding: 5px 10px;
        transition: color 0.3s;
        border-radius: 15px;
    }

    .menu-links a:hover {
        color: #3498db;
    }

    h5 {
        padding: 12px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="welcome-header">
            <h5> Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?>
                (<?= htmlspecialchars($_SESSION['user']['name']) ?>) </h5>
        </div>

        <div class="menu-links">
            <a href="logout.php">logout</a>
            <a href="products.php">products</a>
            <a href="register.php">create account</a>
        </div>
    </div>
</body>

</html>