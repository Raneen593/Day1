<?php
require 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    // معالجة رفع الصورة
    $imagePath = '';
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, ALLOWED_TYPES)) {
            $filename = uniqid() . '.' . $ext;
            $target = UPLOAD_DIR . $filename;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $imagePath = $target;
            }
        }
    }

    $newProduct = [
        'id' => uniqid(),
        'name' => $name,
        'description' => $description,
        'image' => $imagePath,
        'added_by' => $_SESSION['user']['email'],
        'created_at' => date('Y-m-d H:i:s')
    ];

    array_unshift($_SESSION['products'], $newProduct);
    $_SESSION['success'] = "تم إضافة المنتج بنجاح!";
    header("Location: products.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: gray;
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
        padding: 20px;
        max-width: 1200px;
        margin: 20px auto;
    }

    .product-form {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
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
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .product-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .product-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .product-details {
        padding: 15px;
    }

    .product-name {
        margin-top: 0;
        margin-bottom: 10px;
    }

    .product-description {
        color: #666;
        margin-bottom: 10px;
    }

    .product-added-by {
        font-size: 14px;
        color: #888;
    }

    .success-message {
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
    }
    </style>
</head>

<body>
    <div class="header">
        <h1>Welcome, <?= $_SESSION['user']['name'] ?> (<?= $_SESSION['user']['name'] ?>)</h1>
    </div>

    <div class="menu">
        <a href="logout.php">logout</a>
        <a href="products.php">products</a>
        <a href="register.php">create account</a>
    </div>

    <div class="content">
        <?php if (isset($_SESSION['success'])): ?>
        <div class="success-message">
            <?= $_SESSION['success'] ?>
        </div>
        <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <div class="product-form">
            <h2>Add New Product</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label>Product Image</label>
                    <input type="file" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="submit-btn">Add Product</button>
            </form>
        </div>

        <h2>Products List</h2>
        <div class="product-grid">
            <?php foreach ($_SESSION['products'] as $product): ?>
            <div class="product-card">
                <?php if ($product['image']): ?>
                <img src="<?= $product['image'] ?>" class="product-image" alt="Product Image">
                <?php else: ?>
                <div
                    style="height: 200px; background: #eee; display: flex; align-items: center; justify-content: center;">
                    No Image
                </div>
                <?php endif; ?>
                <div class="product-details">
                    <h3 class="product-name"><?= htmlspecialchars($product['name']) ?></h3>
                    <p class="product-description"><?= htmlspecialchars($product['description']) ?></p>
                    <p class="product-added-by">Added by: <?= $product['added_by'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>